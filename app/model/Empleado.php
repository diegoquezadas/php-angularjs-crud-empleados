<?php
class Empleado {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function getAllEmpleados() {
        $stmt = $this->db->prepare("SELECT * FROM Empleado");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getEmpleadoById($id) {
        $stmt = $this->db->prepare("SELECT * FROM Empleado WHERE id_empleado = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function createEmpleado($nombre, $apellido, $cedula, $id_provincia, $fecha_nacimiento, $email, $observaciones, $ruta_fotografia, $fecha_ingreso, $cargo, $salario) {
        $stmt = $this->db->prepare("INSERT INTO Empleado (nombre, apellido, cedula, id_provincia, fecha_nacimiento, email, observaciones, ruta_fotografia, fecha_ingreso, cargo, salario) VALUES (:nombre, :apellido, :cedula, :id_provincia, :fecha_nacimiento, :email, :observaciones, :ruta_fotografia, :fecha_ingreso, :cargo, :salario)");
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':id_provincia', $id_provincia, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':observaciones', $observaciones);
        $stmt->bindParam(':ruta_fotografia', $ruta_fotografia);
        $stmt->bindParam(':fecha_ingreso', $fecha_ingreso);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':salario', $salario);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function updateEmpleado($id_empleado, $nombre, $apellido, $cedula, $id_provincia, $fecha_nacimiento, $email, $observaciones, $ruta_fotografia, $fecha_ingreso, $cargo, $salario) {
        $stmt = $this->db->prepare("UPDATE Empleado SET nombre = :nombre, apellido = :apellido, cedula = :cedula, id_provincia = :id_provincia, fecha_nacimiento = :fecha_nacimiento, email = :email, observaciones = :observaciones, ruta_fotografia = :ruta_fotografia, fecha_ingreso = :fecha_ingreso, cargo = :cargo, salario = :salario WHERE id_empleado = :id_empleado");
        $stmt->bindParam(':id_empleado', $id_empleado, PDO::PARAM_INT);
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':cedula', $cedula);
        $stmt->bindParam(':id_provincia', $id_provincia, PDO::PARAM_INT);
        $stmt->bindParam(':fecha_nacimiento', $fecha_nacimiento);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':observaciones', $observaciones);
        $stmt->bindParam(':ruta_fotografia', $ruta_fotografia);
        $stmt->bindParam(':fecha_ingreso', $fecha_ingreso);
        $stmt->bindParam(':cargo', $cargo);
        $stmt->bindParam(':salario', $salario);
        $stmt->execute();
        return $stmt->rowCount();
    }

    public function deleteEmpleado($id) {
        $stmt = $this->db->prepare("DELETE FROM Empleado WHERE id_empleado = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->rowCount();
    }
}
