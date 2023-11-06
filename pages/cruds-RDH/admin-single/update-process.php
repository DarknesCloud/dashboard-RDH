<?php

include_once("../../../conexion/conexion.php");


// Verificar si se ha enviado el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $subtitulo_dos = $_POST['subtitulo_dos'];
        $categoria = $_POST['categoria'];
        $image_main = $_POST['image_main'];
        $image_content = $_POST['image_content'];
        $image_content_dos = $_POST['image_content_dos'];
        $fecha = $_POST['fecha'];

        // Actualizar el registro con los nuevos valores
        $stmt = $dbh->prepare("UPDATE single SET titulo = ?, subtitulo = ?, subtitulo_dos = ?, categoria = ?, image_main = ?, image_content = ?, image_content_dos = ?, fecha = ? WHERE id = ?");
        $stmt->execute([$titulo, $subtitulo, $subtitulo_dos, $categoria, $image_main, $image_content, $image_content_dos, $fecha, $id]);

        // Redireccionar de vuelta a la página principal o a donde desees después de la actualización
        header("Location: /purple/admin-single");
        exit();
    }
} else {
    echo "Método no válido";
}


?>