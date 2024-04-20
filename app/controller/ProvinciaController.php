<?php

class ProvinciaController {
    private $provinciaModel;

    public function __construct() {
        $this->provinciaModel = new Provincia(Database::getInstance()->getConnection());
    }

    public function index() {
        $provincias = $this->provinciaModel->getAllProvincias();
        require_once __DIR__ . '/../view/provincias/index.php';
    }

    public function show($id) {
        $provincia = $this->provinciaModel->getProvinciaById($id);
        require_once __DIR__ . '/../../view/provincias/show.php';
    }

    public function create() {
        require_once __DIR__ . '/../../view/provincias/create.php';
    }

    public function store($request) {
        $this->provinciaModel->createProvincia(
            $request['nombre'], 
            $request['capital'], 
            $request['descripcion'], 
            $request['poblacion'], 
            $request['superficie'], 
            $request['latitud'], 
            $request['longitud'], 
            $request['id_region']
        );
        header('Location: /provincias');
    }

    public function edit($id) {
        $provincia = $this->provinciaModel->getProvinciaById($id);
        require_once __DIR__ . '/../../view/provincias/edit.php';
    }

    public function update($id, $request) {
        $this->provinciaModel->updateProvincia(
            $id,
            $request['nombre'], 
            $request['capital'], 
            $request['descripcion'], 
            $request['poblacion'], 
            $request['superficie'], 
            $request['latitud'], 
            $request['longitud'], 
            $request['id_region']
        );
        header('Location: /provincias');
    }

    public function destroy($id) {
        $this->provinciaModel->deleteProvincia($id);
        header('Location: /provincias');
    }
}

