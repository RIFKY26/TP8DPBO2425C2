<?php
include "connection.php";

// Routing sederhana
$controller = isset($_GET['controller']) ? $_GET['controller'] : 'Lecturer';
$action = isset($_GET['action']) ? $_GET['action'] : 'index';
$id = isset($_GET['id']) ? $_GET['id'] : null;

$controllerName = $controller . 'Controller';
$controllerFile = "controllers/" . $controllerName . ".php";

if (file_exists($controllerFile)) {
    include $controllerFile;
    // Instansiasi controller dengan mengirimkan koneksi DB
    $class = new $controllerName($conn);

    if (method_exists($class, $action)) {
        if ($id) {
            $class->$action($id);
        } else {
            $class->$action();
        }
    } else {
        echo "Method tidak ditemukan.";
    }
} else {
    echo "Controller tidak ditemukan.";
}
?>