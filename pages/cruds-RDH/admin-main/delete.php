<?php
include_once("../../../conexion/conexion.php");

// Verificar si se ha recibido un ID válido por GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Eliminar el registro con el ID proporcionado
    $stmt = $dbh->prepare("DELETE FROM noticia WHERE id = ?");
    $stmt->execute([$id]);

    // Redireccionar de vuelta a la página principal o a donde desees después de eliminar
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit();
} else {
    echo "ID no válido";
}

?>