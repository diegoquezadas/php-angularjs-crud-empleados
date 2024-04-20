<?php
require_once '../app/init.php';

// Lógica para decidir qué controlador y método llamar basado en la URL
if (isset($_GET['controller'])) {
    $controllerName = $_GET['controller'] . 'Controller';
    if (class_exists($controllerName)) {
        $controller = new $controllerName();
        $controller->index();
    } else {
        echo "El controlador especificado no existe.";
    }
} else {
    echo "No se especificó un controlador.";
}
?>
