<!DOCTYPE html>
<?php
// Asegúrate de que 'db.php' inicializa $conn y $redis
require_once 'db.php';

// --- Lógica de Negocio ---

// Aumentar y obtener el contador de visitas de Redis
$redis->incr('visites_web');
$visites = $redis->get('visites_web');

// Para insertar el artículo a la BBDD (solo si hay datos POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && !empty($_POST['titol']) && !empty($_POST['contingut'])) {
    // Usamos 'title' y 'content' que asumimos son los nombres correctos de columna
    $stmt = $conn->prepare("INSERT INTO `ddbb_proyecte`.articles (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $_POST['titol'], $_POST['contingut']);
    $stmt->execute();
    
    // Redireccionamos para evitar re-envío del formulario al recargar

}
?>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Frontend.local - Gestor d'Articles</title>
    <link rel="stylesheet" href="style.css"> 
</head>
<body>
    <header class="main-header">
        <h1>Benvingut a Frontend.local</h1>
        <p class="visites"><strong>Visites totals (Redis):</strong> <span><?php echo htmlspecialchars($visites); ?></span></p>
    </header>

    <main class="content-wrapper">
        <section class="articles-list">
            <h2>Últims 5 articles (MySQL)</h2>
            <ul class="article-ul">
            <?php
                $result = $conn->query("SELECT id, title, content FROM `ddbb_proyecte`.articles ORDER BY id DESC LIMIT 5");
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        // Usamos title y content que deberían ser los nombres correctos
                        $titol = $row['title'] ?? 'Sense Títol';
                        $contingut = $row['content'] ?? 'Sense Contingut';
                        
                        echo "<li class='article-item'>";
                        echo "<span class='article-id'>#{$row['id']}</span>";
                        echo "<strong class='article-title'>" . htmlspecialchars($titol) . ":</strong> ";
                        echo "<p class='article-content'>" . htmlspecialchars($contingut) . "</p>";
                        echo "</li>";
                    }
                } else {
                    echo "<p class='no-articles'>Encara no hi ha articles publicats.</p>";
                }
            ?>
            </ul>
        </section>

        <section class="new-article-form">
            <h2>Publicar Nou Article</h2>
            <form method="POST" class="article-form">
                <input type="text" name="titol" placeholder="Títol de l'article" required>
                <textarea name="contingut" placeholder="Contingut de l'article" required></textarea>
                <button type="submit">Guardar Article</button>
            </form>
        </section>
    </main>

    <footer class="main-footer">
        <p>&copy; <?php echo date("Y"); ?> ASIX Lab. Docker Project.</p>
    </footer>
</body>
</html>