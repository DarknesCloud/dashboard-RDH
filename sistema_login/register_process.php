<?php
include '../conexion/conexion.php'; // Asegúrate de tener un archivo de conexión con el nombre 'conexion.php'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $firstname = $_POST['name'];
    $lastname = $_POST['last_name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirmPassword'];
    // Realizar la validación del lado del servidor
    if ($password !== $confirmPassword) {
        echo "Las contraseñas no coinciden. Por favor, inténtalo de nuevo.";
        exit;
    }

    // Encriptar la contraseña con SHA-256
    $hashedPassword = hash('sha256', $password);

    try {
        // Preparar la consulta SQL para la inserción
        $stmt = $dbh->prepare("INSERT INTO users (name, last_name, email, password) VALUES (:name, :last_name, :email, :password)");
        $stmt->bindParam(':name', $firstname);
        $stmt->bindParam(':last_name', $lastname);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $hashedPassword);

        // Ejecutar la consulta
        $stmt->execute();

        // Redirigir a la página de inicio de sesión
        header("Location: /inicio");
        exit;
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>
