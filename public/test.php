<?php
require_once '../core/Database.php';


$pdo = Database::getInstance()->getConnection();

$query = "SELECT * FROM Provincia";
$stmt = $pdo->query($query);

if ($stmt) {
    $provincias = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($provincias as $provincia) {
        echo "Nombre: " . htmlspecialchars($provincia['nombre_provincia']) . "<br>";
    }
} else {
    echo "No se pudo ejecutar la consulta.";
}
?>
