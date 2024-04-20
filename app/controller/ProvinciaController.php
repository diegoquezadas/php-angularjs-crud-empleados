<?php
require_once __DIR__ . '/../model/Provincia.php';
class ProvinciaController {
    private $provinciaModel;

    public function __construct() {
        $this->provinciaModel = new Provincia(Database::getInstance()->getConnection());
    }

    public function index() {
        $provincias = $this->provinciaModel->getAllProvincias();
        header('Content-Type: application/json');
        echo json_encode($provincias);
    }

    public function show($id) {
        $provincia = $this->provinciaModel->getProvinciaById($id);
        header('Content-Type: application/json');
        echo json_encode($provincia);
    }

}

