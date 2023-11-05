<?php
// Obtén la URL solicitada
$requestUri = $_SERVER['REQUEST_URI'];

// Limpiar la URL de parámetros
$urlComponents = parse_url($requestUri);
$path = $urlComponents['path'];

// Comparar la ruta
if ($path === '/purple/') {
    // Redirigir internamente a main.php sin cambiar la URL
    include('main.php');
} elseif ($path === '/purple/dashboard-main') {
    include('./pages/cruds-RDH/admin-main/admin-main.php');
} elseif ($path === '/purple/admin-cat') {
    include('./pages/cruds-RDH/admin-cat/admin-cat.php');
}  elseif ($path === '/purple/admin-single') {
    include('./pages/cruds-RDH/admin-single/admin-single.php');
} else {
    echo "404 - Página no encontrada";
}
