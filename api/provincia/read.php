<?php
require_once '../../app/init.php';

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['id'])) {
        $provincia = $provinciaModel->getProvinciaById($_GET['id']);
        echo json_encode($provincia);
    } else {
        $provincias = $provinciaModel->getAllProvincias();
        echo json_encode($provincias);
    }
} else {
    http_response_code(405);
    echo json_encode(['message' => 'Método no permitido']);
}
?>
