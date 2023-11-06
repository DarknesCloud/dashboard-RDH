<?php
include_once("./conexion/conexion.php");

// Procesamiento del formulario
    if (isset($_POST['post_single'])) {
        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $fecha = $_POST['fecha'];
        $id = $_POST['id'];

    }


    if (isset($_POST['insert_single'])) {
        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $fecha = $_POST['fecha'];
        $id = $_POST['id'];

        // Insertar los datos en la tabla 'single'
        $stmt = $dbh->prepare("INSERT INTO single (titulo, categoria,fecha,id) VALUES (?, ?, ?, ?)");
        $stmt->execute([$titulo, $categoria,$fecha, $id]);
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Insertar y Leer de la tabla 'single'</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Insertar en 'single' y Mostrar Registros</h1>

        <!-- Formulario para insertar en 'single' -->
        <form method="post" action="">
            <input type="text" name="id" value="<?php echo $id; ?>" readonly>
            <input type="text" name="titulo" value="<?php echo $titulo; ?>" readonly>
            <input type="text" name="subtitulo" placeholder="Subtítulo">
            <input type="text" name="subtitulo_dos" placeholder="Subtítulo Dos">
            <input type="text" name="categoria" value="<?php echo $categoria; ?>" readonly>
            <input type="file" name="image_main" placeholder="Imagen Principal">
            <input type="file" name="image_content" placeholder="Imagen de Contenido">
            <input type="file" name="image_content_dos" placeholder="Imagen de Contenido Dos">
            <input type="date" name="fecha" placeholder="Fecha">
            <button type="submit" class="btn btn-primary" name="insert_single">Insertar en 'single'</button>
        </form>

        <!-- Mostrar registros de la tabla 'single' -->
        <h2>Registros en 'single'</h2>
        <table class='table'>
            <tr>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Subtítulo Dos</th>
                <th>Categoría</th>
                <th>Imagen Principal</th>
                <th>Imagen de Contenido</th>
                <th>Imagen de Contenido Dos</th>
                <th>Fecha</th>
            </tr>
            <?php
            $stmt = $dbh->prepare("SELECT * FROM single");
            $stmt->execute();
            $registros = $stmt->fetchAll();

            foreach ($registros as $registro) {
                echo "<tr>";
                echo "<td>" . $registro['titulo'] . "</td>";
                echo "<td>" . $registro['subtitulo'] . "</td>";
                echo "<td>" . $registro['subtitulo_dos'] . "</td>";
                echo "<td>" . $registro['categoria'] . "</td>";
                echo "<td>" . $registro['image_main'] . "</td>";
                echo "<td>" . $registro['image_content'] . "</td>";
                echo "<td>" . $registro['image_content_dos'] . "</td>";
                echo "<td>" . $registro['fecha'] . "</td>";
                echo "</tr>";
            }
            ?>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
