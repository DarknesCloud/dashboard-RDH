<?php
include_once("../../../conexion/conexion.php");

// Verificar si se ha recibido un ID válido por GET
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Consultar el registro con el ID proporcionado
    $stmt = $dbh->prepare("SELECT * FROM categorias WHERE id = ?");
    $stmt->execute([$id]);
    $result = $stmt->fetch();

    if ($result) {
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
        <h1>Actualizar Categoria</h1>
        <form method="post" action="update_process.php">
            <input type="hidden" name="id" value="<?php echo $result['id']; ?>">
            <div class="mb-3">
                <br />
                <label for="categoria" class="form-label">Categoria:</label>
                <br />
                <input type="text" class="form-control" id="titulo" name="categoria"
                    value="<?php echo $result['categoria']; ?>">
                <br />
                <button type="submit" class="btn btn-primary" name="submit">Actualizar Categoria</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
<?php
    } else {
        echo "No se encontró la categoria.";
    }
} else {
    echo $id;
    echo "ID no válido";
}

?>