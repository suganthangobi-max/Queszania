<?php
$host = "mysql.railway.internal";
$user = "root";
$password = "UlkLxQTzEEzAIDbKWKQhpgKkOtoVobXR";
$database = "railway";
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$database", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conn = $pdo;
} catch(PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>