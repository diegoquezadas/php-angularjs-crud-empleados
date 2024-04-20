<?php
header('Content-Type: application/json');
require_once '../../app/init.php';

$empleadoModel = new Empleado(Database::getInstance()->getConnection());
echo json_encode($empleadoModel->getAllEmpleados());
