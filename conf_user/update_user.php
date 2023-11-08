<?php
include './conexion/conexion.php'; // Incluir el archivo de conexión a la base de datos
ob_start();
// Verificar si se ha enviado un ID válido a través de GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Obtener los datos del usuario de la tabla 'users'
    $stmt = $dbh->prepare("SELECT * FROM users WHERE id = :id");
    $stmt->bindParam(':id', $id);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    // Redireccionar o mostrar un mensaje de error si no se proporciona un ID válido
    // Por ejemplo: header('Location: lista_usuarios.php');
    exit('ID de usuario no válido');
}

// Verificar si se envió el formulario para actualizar los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $last_name = $_POST['last_name'];
    $email = $_POST['email'];

    // Actualizar los datos del usuario en la base de datos
    $updateStmt = $dbh->prepare("UPDATE users SET name = :name, last_name = :last_name, email = :email WHERE id = :id");
    $updateStmt->bindParam(':name', $name);
    $updateStmt->bindParam(':last_name', $last_name);
    $updateStmt->bindParam(':email', $email);
    $updateStmt->bindParam(':id', $id);
    
    if ($updateStmt->execute()) {
        // Redireccionar a alguna página de éxito o mostrar un mensaje de éxito
        header('Location: /purple/configuracion');
        ob_end_flush();
        exit();
    } else {
        exit('Hubo un error al actualizar el usuario');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-4">
        <h1>Editar Usuario</h1>
        <form method="post">
            <div class="mb-3">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="name" value="<?= $user['name'] ?>">
            </div>
            <div class="mb-3">
                <label for="last_name" class="form-label">Apellido</label>
                <input type="text" class="form-control" id="last_name" name="last_name" value="<?= $user['last_name'] ?>">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>">
            </div>
            <button type="submit" class="btn btn-primary">Actualizar Usuario</button>
        </form>
    </div>
</body>

</html>
