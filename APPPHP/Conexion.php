<?php
$host = 'localhost';
$dbname = 'dbcitas';
$username = 'root';
$password = '12345678';
$port = 3306;

try {
    // Crear una conexión PDO
    $conn = new PDO("mysql:host=$host;dbname=$dbname;port=$port", $username, $password);
    // Configurar PDO para que lance excepciones en caso de error
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejar error de conexión
    die("Error de conexión: " . $e->getMessage());
}
?>

