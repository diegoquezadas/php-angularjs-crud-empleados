<?php
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'empleados_db';

function getPDO() {
    global $host, $database, $username, $password; 

    static $pdo = null;
    if ($pdo === null) {
        try {
            $pdo = new PDO("mysql:host=$host;dbname=$database;charset=utf8", $username, $password);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            die("Conexión fallida: " . $e->getMessage());
        }
    }
    return $pdo;
}
