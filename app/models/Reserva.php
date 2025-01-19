<?php
require_once __DIR__ . '/../../config/database.php';

class Reserva {
    private $conn;

    public function __construct() {
        $database = new Database();
        $this->conn = $database->connect();
    }

    public function crear($id_usuario, $id_mesa, $fecha, $hora) {
        $query = "INSERT INTO reservas (id_usuario, id_mesa, fecha, hora) VALUES (:id_usuario, :id_mesa, :fecha, :hora)";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->bindParam(':id_mesa', $id_mesa);
        $stmt->bindParam(':fecha', $fecha);
        $stmt->bindParam(':hora', $hora);
        return $stmt->execute();
    }

    public function listar($id_usuario) {
        $query = "SELECT reservas.*, mesas.numero FROM reservas JOIN mesas ON reservas.id_mesa = mesas.id_mesa WHERE reservas.id_usuario = :id_usuario";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_usuario', $id_usuario);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
