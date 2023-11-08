<?php
include_once("./conexion/conexion.php");
// Función para obtener y mostrar todas las noticias
function mostrarNoticias($dbh)
{
    $stmt = $dbh->prepare("SELECT * FROM noticia");
    $stmt->execute();
    $noticias = $stmt->fetchAll();

    echo "<h2>Noticias</h2>";
    echo "<div class='table-responsive'>";
    echo "<table class='table table-striped table-hover'>"; // Agregar clases de Bootstrap para diseño de tabla
    
    echo "<thead class='table-dark'>"; // Encabezado oscuro
    echo "<tr>
            <th>ID</th>
            <th>Título</th>
            <th>Subtítulo</th>
            <th>Categoría</th>
            <th>Contenido</th>
            <th>Imagen</th>
            <th>Fecha</th>
            <th>Acciones</th>
        </tr>";
    echo "</thead>";
    
    echo "<tbody>";
    
    foreach ($noticias as $noticia) {
        echo "<tr>";
        echo "<td>" . $noticia['id'] . "</td>";
        echo "<td>" . $noticia['titulo'] . "</td>";
        echo "<td>" . $noticia['subtitulo'] . "</td>";
        echo "<td>" . $noticia['categoria'] . "</td>";
        echo "<td>" . $noticia['contenido'] . "</td>";
        echo "<td>" . $noticia['image'] . "</td>";
        echo "<td>" . $noticia['fecha'] . "</td>";
        echo "<td>
                <a href='/purple/pages/cruds-RDH/admin-main/update.php?id=" . $noticia['id'] . "' class='btn btn-primary'>Update</a>
                <a href='/purple/pages/cruds-RDH/admin-main/delete.php?id=" . $noticia['id'] . "' class='btn btn-danger'>Delete</a>
                <form action='/purple/admin-single' method='post' style='display: inline;'>
                    <input type='hidden' name='id' value='" . $noticia['id'] . "'>
                    <input type='hidden' name='titulo' value='" . $noticia['titulo'] . "'>
                    <input type='hidden' name='categoria' value='" . $noticia['categoria'] . "'>
                    <input type='hidden' name='fecha' value='" . $noticia['fecha'] . "'>
                    <button type='submit' class='btn btn-info' name='post_single'>Crear Blog</button>
                </form>
            </td>";
        echo "</tr>";
    }
    
    echo "</tbody>";
    
    echo "</table>";
    echo "</div>";
    
}

// Comprobación si se ha enviado el formulario de inserción
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submit'])) {
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $categoria = $_POST['categoria'];
        $contenido = $_POST['contenido'];
        $imagen = $_POST['imagen'];
        $fecha = $_POST['fecha'];

        $stmt = $dbh->prepare("INSERT INTO noticia (titulo, subtitulo, categoria, contenido, image, fecha) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->execute([$titulo, $subtitulo, $categoria, $contenido, $imagen, $fecha]);
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>CRUD de Noticias</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>CRUD de Noticias</h1>

        <!-- Formulario de inserción -->
        <form method="post" action="">
            <div class="mb-3">
                <label for="titulo" class="form-label">Título:</label>
                <input type="text" class="form-control" id="titulo" name="titulo">
            </div>
            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtítulo:</label>
                <input type="text" class="form-control" id="subtitulo" name="subtitulo">
            </div>
            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría:</label>
                <input type="text" class="form-control" id="categoria" name="categoria">
            </div>
            <div class="mb-3">
                <label for="contenido" class="form-label">Contenido:</label>
                <textarea class="form-control" id="contenido" name="contenido"></textarea>
            </div>
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen:</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
            </div>
            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha:</label>
                <input type="date" class="form-control" id="fecha" name="fecha">
            </div>
            <button type="submit" class="btn btn-primary" name="submit">Insertar Noticia</button>
        </form>

        <!-- Mostrar todas las noticias -->
        <?php mostrarNoticias($dbh); ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
