<?php
include_once("./conexion/conexion.php");

// Procesamiento del formulario
    if (isset($_POST['post_single'])) {
        $titulo = $_POST['titulo'];
        $categoria = $_POST['categoria'];
        $fecha = $_POST['fecha'];
        $id = $_POST['id'];

    }else{
        $titulo = '';
        $categoria = '';
        $fecha = '';
        $id = '';
    }


    if (isset($_POST['insert_single'])) {
        $titulo = $_POST['titulo'];
        $subtitulo = $_POST['subtitulo'];
        $subtitulo_dos = $_POST['subtitulo_dos'];
        $categoria = $_POST['categoria'];
        $image_main = $_POST['image_main'];
        $image_content = $_POST['image_content'];
        $image_content_dos = $_POST['image_content_dos'];
        $fecha = $_POST['fecha'];
        $id = $_POST['id'];
    
        // Insertar los datos en la tabla 'single'
        $stmt = $dbh->prepare("INSERT INTO single (titulo, subtitulo, subtitulo_dos, categoria, image_main, image_content, image_content_dos, fecha, id) 
                                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$titulo, $subtitulo, $subtitulo_dos, $categoria, $image_main, $image_content, $image_content_dos, $fecha, $id]);
        exit();
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
            <div class="mb-3">
                <label for="id" class="form-label">ID</label>
                <input type="text" id="id" name="id" value="<?php echo $id; ?>" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Título</label>
                <input type="text" id="titulo" name="titulo" value="<?php echo $titulo; ?>" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="subtitulo" class="form-label">Subtítulo</label>
                <input type="text" id="subtitulo" name="subtitulo" class="form-control" placeholder="Subtítulo">
            </div>

            <div class="mb-3">
                <label for="subtitulo_dos" class="form-label">Subtítulo Dos</label>
                <input type="text" id="subtitulo_dos" name="subtitulo_dos" class="form-control" placeholder="Subtítulo Dos">
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label">Categoría</label>
                <input type="text" id="categoria" name="categoria" value="<?php echo $categoria; ?>" class="form-control" readonly>
            </div>

            <div class="mb-3">
                <label for="image_main" class="form-label">Imagen Principal</label>
                <input type="file" id="image_main" name="image_main" class="form-control"  placeholder="Imagen Principal">
            </div>

            <div class="mb-3">
                <label for="image_content" class="form-label">Imagen de Contenido</label>
                <input type="file" id="image_content" name="image_content" class="form-control"  placeholder="Imagen de Contenido">
            </div>

            <div class="mb-3">
                <label for="image_content_dos" class="form-label">Imagen de Contenido Dos</label>
                <input type="file" id="image_content_dos" name="image_content_dos" class="form-control"  placeholder="Imagen de Contenido Dos">
            </div>

            <div class="mb-3">
                <label for="fecha" class="form-label">Fecha</label>
                <input type="date" id="fecha" name="fecha" class="form-control" placeholder="Fecha">
            </div>

            <button type="submit" class="btn btn-primary" name="insert_single">Insertar en 'single'</button>
        </form>


        <!-- Mostrar registros de la tabla 'single' -->
        <h2>Registros en 'single'</h2>
        <div class="table-responsive">
    <table class='table table-striped'>
        <thead>
            <tr>
                <th>ID</th>
                <th>Título</th>
                <th>Subtítulo</th>
                <th>Subtítulo Dos</th>
                <th>Categoría</th>
                <th>Imagen Principal</th>
                <th>Imagen de Contenido</th>
                <th>Imagen de Contenido Dos</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $stmt = $dbh->prepare("SELECT * FROM single");
            $stmt->execute();
            $registros = $stmt->fetchAll();

            foreach ($registros as $registro) {
                echo "<tr>";
                echo "<td>" . $registro["id"] . "</td>";
                echo "<td>" . $registro['titulo'] . "</td>";
                echo "<td>" . $registro['subtitulo'] . "</td>";
                echo "<td>" . $registro['subtitulo_dos'] . "</td>";
                echo "<td>" . $registro['categoria'] . "</td>";
                echo "<td>" . $registro['image_main'] . "</td>";
                echo "<td>" . $registro['image_content'] . "</td>";
                echo "<td>" . $registro['image_content_dos'] . "</td>";
                echo "<td>" . $registro['fecha'] . "</td>";
                echo "<td>
                        <a href='/purple/pages/cruds-RDH/admin-single/update.php?id=" . $registro['id'] . "' class='btn btn-primary'>Update</a>
                        <a href='/purple/pages/cruds-RDH/admin-single/delete.php?id=" . $registro['id'] . "' class='btn btn-danger'>Delete</a>
                    </td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
