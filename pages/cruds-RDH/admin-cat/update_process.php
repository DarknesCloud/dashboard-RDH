<?php

include_once("../../../conexion/conexion.php");


// Verificar si se ha enviado el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $categoria = $_POST['categoria'];

        // Actualizar el registro con los nuevos valores
        $stmt = $dbh->prepare("UPDATE categorias SET categoria = ? WHERE id = ?");
        $stmt->execute([$categoria, $id]);

        // Redireccionar de vuelta a la página principal o a donde desees después de la actualización
        header("Location: /purple/admin-cat");
        exit();
    }
} else {
    echo "Método no válido";
}

?>