<?php
include_once("../../../conexion/conexion.php");

// Verificar si se ha recibido un ID válido por GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el registro con el ID proporcionado
    $stmt = $dbh->prepare("SELECT * FROM noticia WHERE id = ?");
    $stmt->execute([$id]);
    $noticia = $stmt->fetch();

    if ($noticia) {
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
            <input type="hidden" name="id" value="<?php echo $noticia['id']; ?>">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $noticia['titulo']; ?>">
            </div>
            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtítulo:</label>
                <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="<?php echo $noticia['subtitulo']; ?>">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <input type="text" class="form-control" id="categoria" name="categoria" value="<?php echo $noticia['categoria']; ?>">
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido:</label>
                <textarea class="form-control" id="contenido" name="contenido"><?php echo $noticia['contenido']; ?></textarea>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" id="imagen" name="imagen" value="<?php echo $noticia['image']; ?>">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha" value="<?php echo $noticia['fecha']; ?>">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Actualizar Noticia</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
<?php
    } else {
        echo "No se encontró la noticia.";
    }
} else {
    echo "ID no válido";
}

?>