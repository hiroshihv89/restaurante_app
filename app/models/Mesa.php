<?php
require_once __DIR__ . '/../../config/database.php';

class Mesa {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function crear($numero, $capacidad) {
        $query = "INSERT INTO mesas (numero, capacidad) VALUES (:numero, :capacidad)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':numero', $numero);
        $stmt->bindParam(':capacidad', $capacidad);
        return $stmt->execute();
    }

    public function listar() {
        $query = "SELECT * FROM mesas";
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
