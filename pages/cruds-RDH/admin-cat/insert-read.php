<?php
include_once("./conexion/conexion.php");

// Manejar la inserción de datos
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['categoria'])) {
    $categoria = $_POST['categoria'];
    
    $stmt = $dbh->prepare("INSERT INTO categorias (categoria) VALUES (?)");
    $stmt->execute([$categoria]);
}

// Obtener todos los registros de la tabla 'categorias'
$stmt = $dbh->query("SELECT * FROM categorias");
$categorias = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html>

<head>
    <title>Formulario y Tabla de Categorías</title>
    <!-- Enlace a Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <h3>Insertar nueva categoría</h3>
                <form method="post">
                    <div class="mb-3">
                        <input type="text" class="form-control" id="categoria" name="categoria" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Agregar</button>
                </form>
            </div>
        </div>

        <div class="row mt-5">
            <div class="col-md-6">
                <h3>Categorías existentes</h3>
                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Categoría</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($categorias as $cat): ?>
                        <tr>
                            <td><?php echo $cat['id']; ?></td>
                            <td><?php echo $cat['categoria']; ?></td>
                            <td>
                                <a href='/purple/pages/cruds-RDH/admin-cat/update.php?id=<?php echo $cat['id']; ?>'
                                    class='btn btn-primary'>Update</a>
                                <a href='/purple/pages/cruds-RDH/admin-cat/delete.php?id=<?php echo $cat['id']; ?>'
                                    class='btn btn-danger'>Delete</a>

                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Enlace a Bootstrap JS (opcional, si lo necesitas) -->
    <script src=" https://stackpath.bootstrapcdn.com/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>

</html>