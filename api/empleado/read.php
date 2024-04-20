<?php
require_once '../../app/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $empleado = $empleadoModel->getEmpleadoById($_GET['id']);
        echo json_encode($empleado);
    } else {
        $empleados = $empleadoModel->getAllEmpleados();
        echo json_encode($empleados);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
