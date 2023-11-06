<?php
include_once("../../../conexion/conexion.php");

// Verificar si se ha recibido un ID válido por GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el registro con el ID proporcionado
    $stmt = $dbh->prepare("SELECT * FROM single WHERE id = ?");
    $stmt->execute([$id]);
    $registro = $stmt->fetch();

    if ($registro) {
        // Mostrar el formulario con los datos del registro para actualizar
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Actualizar Noticia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Actualizar Noticia</h1>
        <form method="post" action="update-process.php">
            <div class="mb-3">
                <label for="id" class="form-label">ID:</label>
                <input type="text" class="form-control" id="id" name="id" value="<?php echo $registro['id']; ?>">
            </div>
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $registro['titulo']; ?>">
            </div>
            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtítulo:</label>
                <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?php echo $registro['subtitulo']; ?>">
            </div>
            <div class="mb-3">
                <label for="subtitulo_dos" class="form-label">Subtítulo Dos:</label>
                <input type="text" class="form-control" id="subtitulo_dos" name="subtitulo_dos" value="<?php echo $registro['subtitulo_dos']; ?>">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $registro['categoria']; ?>">
            </div>
            <div class="mb-3">
                <label for="image_main" class="form-label">Imagen Principal:</label>
                <input type="file" class="form-control" id="image_main" name="image_main" value="<?php echo $registro['image_main']; ?>">
            </div>
            <div class="mb-3">
                <label for="image_content" class="form-label">Imagen de Contenido 1:</label>
                <input type="file" class="form-control" id="image_content" name="image_content" value="<?php echo $registro['image_content']; ?>">
            </div>
            <div class="mb-3">
                <label for="image_content_dos" class="form-label">Imagen de Contenido 2:</label>
                <input type="file" class="form-control" id="image_content_dos" name="image_content_dos" value="<?php echo $registro['image_content_dos']; ?>">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $registro['fecha']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Actualizar Noticia</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    } else {
        echo "No se encontró el registro.";
    }
} else {
    echo "ID no válido";
}

?>