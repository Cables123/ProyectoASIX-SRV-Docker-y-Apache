<?php
$host = getenv('DB_HOST'); // Ús de variables d'entorn
$user = getenv('DB_USER');
$pass = getenv('DB_PASS');
$dbname = getenv('DB_NAME');
$redis_host = getenv('REDIS_HOST');

// MySQL
$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) die("Connexió fallida: " . $conn->connect_error);

// Redis
$redis = new Redis();
$redis->connect($redis_host, 6379);
?>