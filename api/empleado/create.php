<?php
require_once '../../app/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    $resultado = $empleadoModel->createEmpleado(
        $data['nombre'],
        $data['apellido'],
        $data['cedula'],
        $data['id_provincia'],
        $data['fecha_nacimiento'],
        $data['email'],
        $data['observaciones'],
        $data['ruta_fotografia'],
        $data['fecha_ingreso'],
        $data['cargo'],
        $data['salario']
    );
    
    if ($resultado) {
        echo json_encode(['message' => 'Empleado creado correctamente']);
    } else {
        http_response_code(500);
        echo json_encode(['message' => 'Error al crear el empleado']);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
