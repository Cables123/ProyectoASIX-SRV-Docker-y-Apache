<?php
header("Content-Type: application/json");
require_once '../frontend/db.php'; // Reutilitzem la connexió

$method = $_SERVER['REQUEST_METHOD'];
$request_uri = $_SERVER['REQUEST_URI'];

// Endpoint: GET /api/stats
if ($request_uri == '/api/stats' && $method == 'GET') {
    $visits = $redis->get('visites_web') ?: 0;
    $articles = $conn->query("SELECT COUNT(*) as c FROM articles")->fetch_assoc()['c'];
    echo json_encode(["visites" => $visits, "total_articles" => $articles]);
    exit;
}

// Endpoint: GET /api/articles
if ($request_uri == '/api/articles' && $method == 'GET') {
    $result = $conn->query("SELECT * FROM articles ORDER BY id DESC");
    $articles = [];
    while($row = $result->fetch_assoc()) {
        $articles[] = $row;
    }
    echo json_encode($articles);
    exit;
}

// Endpoint: POST /api/articles
if ($request_uri == '/api/articles' && $method == 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    if(isset($data['titol']) && isset($data['contingut'])) {
        $stmt = $conn->prepare("INSERT INTO articles (titol, contingut) VALUES (?, ?)");
        $stmt->bind_param("ss", $data['titol'], $data['contingut']);
        $stmt->execute();
        echo json_encode(["status" => "creat", "id" => $conn->insert_id]);
    } else {
        http_response_code(400);
        echo json_encode(["error" => "Dades incompletes"]);
    }
    exit;
}
?>