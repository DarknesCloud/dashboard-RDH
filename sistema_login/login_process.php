<?php
session_start();
include '../conexion/conexion.php'; // Asegúrate de tener un archivo de conexión con el nombre 'conexion.php'

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $password = $_POST['password'];

    // Hashear la contraseña ingresada por el usuario
$hashedPasswordInput = hash('sha256', $password);

try {
    // Consultar la base de datos para obtener el usuario con el nombre proporcionado
    $stmt = $dbh->prepare("SELECT * FROM users WHERE name = :name");
    $stmt->bindParam(':name', $name);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user) {
        // Comparar el hash de la contraseña ingresada con el hash almacenado en la base de datos
        if (hash_equals($user['password'], $hashedPasswordInput)) {
            // Contraseña válida, se inicia la sesión
            $_SESSION['name'] = $name;

            // Luego de validar credenciales y antes de redirigir a la página principal
            if ($user) {
                $_SESSION['name'] = $name;

                // Obtener más detalles del usuario desde la base de datos
                $stmt = $dbh->prepare("SELECT name, last_name, id FROM users WHERE name = :name");
                $stmt->bindParam(':name', $name);
                $stmt->execute();
                $userDetails = $stmt->fetch(PDO::FETCH_ASSOC);

                // Almacenar los detalles adicionales en la sesión
                $_SESSION['user_details'] = $userDetails;

                header("Location: /purple/"); // Redirigir a la página principal
                exit;
            }

        } else {
            echo "Error: Usuario o contraseña incorrectos";
        }
    } else {
        echo "Error: Usuario o contraseña incorrectos";
    }
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

}
?>
