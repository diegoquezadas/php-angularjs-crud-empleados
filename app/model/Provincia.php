<?php
class Provincia {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllProvincias() {
        $stmt = $this->db->prepare("SELECT * FROM Provincia");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getProvinciaById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Provincia WHERE id_provincia = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createProvincia($nombre, $capital, $descripcion, $poblacion, $superficie, $latitud, $longitud, $id_region) {
        $stmt = $this->db->prepare("INSERT INTO Provincia (nombre_provincia, capital_provincia, descripcion_provincia, poblacion_provincia, superficie_provincia, latitud_provincia, longitud_provincia, id_region) VALUES (:nombre, :capital, :descripcion, :poblacion, :superficie, :latitud, :longitud, :id_region)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':capital', $capital);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':poblacion', $poblacion);
        $stmt->bindParam(':superficie', $superficie);
        $stmt->bindParam(':latitud', $latitud);
        $stmt->bindParam(':longitud', $longitud);
        $stmt->bindParam(':id_region', $id_region);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updateProvincia($id, $nombre, $capital, $descripcion, $poblacion, $superficie, $latitud, $longitud, $id_region) {
        $stmt = $this->db->prepare("UPDATE Provincia SET nombre_provincia = :nombre, capital_provincia = :capital, descripcion_provincia = :descripcion, poblacion_provincia = :poblacion, superficie_provincia = :superficie, latitud_provincia = :latitud, longitud_provincia = :longitud, id_region = :id_region WHERE id_provincia = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':capital', $capital);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':poblacion', $poblacion);
        $stmt->bindParam(':superficie', $superficie);
        $stmt->bindParam(':latitud', $latitud);
        $stmt->bindParam(':longitud', $longitud);
        $stmt->bindParam(':id_region', $id_region);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteProvincia($id) {
        $stmt = $this->db->prepare("DELETE FROM Provincia WHERE id_provincia = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
