<?php
require_once __DIR__ . '/../model/Empleado.php';

class EmpleadoController {
    private $empleadoModel;

    public function __construct() {
        $this->empleadoModel = new Empleado(Database::getInstance()->getConnection());
    }

    public function index() {
        $empleados = $this->empleadoModel->getAllEmpleados();
        header('Content-Type: application/json');
        echo json_encode($empleados);
    }

    public function show($id) {
        $empleado = $this->empleadoModel->getEmpleadoById($id);
        header('Content-Type: application/json');
        echo json_encode($empleado);
    }

    public function store() {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->empleadoModel->createEmpleado(
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
        header('Content-Type: application/json');
        if ($result) {
            echo json_encode(['message' => 'Empleado creado exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al crear el empleado']);
        }
    }
    
    public function update($id) {
        $data = json_decode(file_get_contents("php://input"), true);
        $result = $this->empleadoModel->updateEmpleado(
            $id,
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
        header('Content-Type: application/json');
        if ($result) {
            echo json_encode(['message' => 'Empleado actualizado exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al actualizar el empleado']);
        }
    }
    
    public function destroy($id) {
        $result = $this->empleadoModel->deleteEmpleado($id);
        header('Content-Type: application/json');
        if ($result) {
            echo json_encode(['message' => 'Empleado eliminado exitosamente']);
        } else {
            http_response_code(500);
            echo json_encode(['message' => 'Error al eliminar el empleado']);
        }
    }
}
