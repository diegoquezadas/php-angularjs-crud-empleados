<?php
require_once '../../app/init.php';

$database = Database::getInstance();
$pdo = $database->getConnection();
$empleadoModel = new Empleado($pdo);

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    // Verifica que cada campo esté presente antes de usarlo
    $nombre = isset($data['nombre']) ? $data['nombre'] : null;
    $apellido = isset($data['apellido']) ? $data['apellido'] : null;
    // Repite para los demás campos...

    try {
        $resultado = $empleadoModel->createEmpleado(
            $nombre,
            $apellido,
            isset($data['cedula']) ? $data['cedula'] : null,
            isset($data['id_provincia']) ? $data['id_provincia'] : null,
            isset($data['fecha_nacimiento']) ? $data['fecha_nacimiento'] : null,
            isset($data['email']) ? $data['email'] : null,
            isset($data['observaciones']) ? $data['observaciones'] : null,
            isset($data['ruta_fotografia']) ? $data['ruta_fotografia'] : null,
            isset($data['fecha_ingreso']) ? $data['fecha_ingreso'] : null,
            isset($data['cargo']) ? $data['cargo'] : null,
            isset($data['salario']) ? $data['salario'] : null,
            isset($data['observaciones_ficha']) ? $data['observaciones_ficha'] : null,
            isset($data['id_provincia_cargo']) ? $data['id_provincia_cargo'] : null,
            isset($data['jornada_parcial']) ? $data['jornada_parcial'] : null
        );
        echo json_encode(['message' => 'Empleado creado correctamente']);
    } catch (Exception $e) {
        http_response_code(500);
        echo json_encode(['message' => 'Error al crear el empleado: ' . $e->getMessage()]);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>