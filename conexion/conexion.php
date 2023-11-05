<?php
// Cargar las variables de entorno
$host = 'localhost';
$dbname = 'noticias';
$username = 'root';
$password = '';

try {
    // Crear una nueva instancia de PDO
    $dbh = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

    // Configurar PDO para que lance excepciones en caso de errores
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Opcional: Configurar el juego de caracteres
    $dbh->exec("SET NAMES 'utf8'");
} catch (PDOException $e) {
    // En caso de error, mostrar un mensaje de error
    die("Error de conexión a la base de datos: " . $e->getMessage());
}

// La conexión se ha establecido correctamente
// Puedes utilizar $dbh para realizar consultas a la base de datos

?>
