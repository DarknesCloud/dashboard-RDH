<?php
// Inicia la sesión
session_start();

// Si no hay una sesión iniciada y la ruta no es la página de inicio de sesión o registro
if (!isset($_SESSION['name']) && $_SERVER['REQUEST_URI'] !== '/purple/inicio' && $_SERVER['REQUEST_URI'] !== '/purple/register') {
    header("Location: /purple/inicio"); // Redirige a la página de inicio de sesión
    exit;
}else{
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
} elseif ($path === '/purple/admin-single') {
    include('./pages/cruds-RDH/admin-single/admin-single.php');
} elseif($path === '/purple/inicio'){
    include('./sistema_login/login.php');
} elseif($path === '/purple/register'){
    include('./sistema_login/register.php');
} elseif($path === '/purple/graficos'){
    include('./graficos.php');
}

else {
    echo "404 - Página no encontrada";
}
}


