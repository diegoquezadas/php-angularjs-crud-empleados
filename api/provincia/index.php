// api/provincia/index.php
<?php
header('Content-Type: application/json');
require_once '../../../app/init.php';

$provinciaModel = new Provincia(Database::getInstance()->getConnection());
echo json_encode($provinciaModel->getAllProvincias());

