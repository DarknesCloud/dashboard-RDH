<?php

include_once("../../../conexion/conexion.php");


// Verificar si se ha enviado el formulario de actualización
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $id = $_POST['id'];
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $categoria = $_POST['categoria'];
        $contenido = $_POST['contenido'];
        $imagen = $_POST['imagen'];
        $fecha = $_POST['fecha'];

        // Actualizar el registro con los nuevos valores
        $stmt = $dbh->prepare("UPDATE noticia SET titulo = ?, subtitulo = ?, categoria = ?, contenido = ?, image = ?, fecha = ? WHERE id = ?");
        $stmt->execute([$titulo, $subtitulo, $categoria, $contenido, $imagen, $fecha, $id]);

        // Redireccionar de vuelta a la página principal o a donde desees después de la actualización
        header("Location: /purple/dashboard-main");
        exit();
    }
} else {
    echo "Método no válido";
}

?>