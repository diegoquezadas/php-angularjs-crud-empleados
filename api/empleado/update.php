<?php
require_once '../../app/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_GET['id_empleado'])) {
    $data = json_decode(file_get_contents("php://input"), true);
    try {
        $resultado = $empleadoModel->updateEmpleado(
            $_GET['id_empleado'],
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
            $data['salario'],
            $data['observaciones_ficha'],
            $data['id_provincia_cargo'],
            $data['jornada_parcial']
        );
        
        if ($resultado) {
            echo json_encode(['message' => 'Empleado actualizado correctamente']);
        } else {
            throw new Exception("No se pudo actualizar el empleado");
        }
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['message' => $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
