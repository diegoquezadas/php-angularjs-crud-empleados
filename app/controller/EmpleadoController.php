<?php
require_once __DIR__ . '/../../model/Empleado.php';

class EmpleadoController {
    private $empleadoModel;

    public function __construct() {
        $this->empleadoModel = new Empleado(Database::getInstance()->getConnection());
    }

    public function index() {
        $empleados = $this->empleadoModel->getAllEmpleados();
        require_once __DIR__ . '/../view/empleado/index.php';
    }

    public function show($id) {
        $empleado = $this->empleadoModel->getEmpleadoById($id);
        require_once 'path/to/view/empleados/show.php';
    }

    public function create() {
        require_once 'path/to/view/empleados/create.php';
    }

    public function store($request) {
        $this->empleadoModel->createEmpleado(
            $request['nombre'], 
            $request['apellido'], 
            $request['cedula'], 
            $request['id_provincia'], 
            $request['fecha_nacimiento'], 
            $request['email'], 
            $request['observaciones'], 
            $request['ruta_fotografia'], 
            $request['fecha_ingreso'], 
            $request['cargo'], 
            $request['salario']
        );
        header('Location: /empleados');
    }

    public function edit($id) {
        $empleado = $this->empleadoModel->getEmpleadoById($id);
        require_once 'path/to/view/empleados/edit.php';
    }

    public function update($id, $request) {
        $this->empleadoModel->updateEmpleado(
            $id,
            $request['nombre'], 
            $request['apellido'], 
            $request['cedula'], 
            $request['id_provincia'], 
            $request['fecha_nacimiento'], 
            $request['email'], 
            $request['observaciones'], 
            $request['ruta_fotografia'], 
            $request['fecha_ingreso'], 
            $request['cargo'], 
            $request['salario']
        );
        header('Location: /empleados');
    }

    public function destroy($id) {
        $this->empleadoModel->deleteEmpleado($id);
        header('Location: /empleados');
    }
}
