<?php
require_once '../../app/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'DELETE' && isset($_GET['id'])) {
    $resultado = $empleadoModel->deleteEmpleado($_GET['id']);
    
    if ($resultado) {
        echo json_encode(['message' => 'Empleado eliminado correctamente']);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Error al eliminar el empleado']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
