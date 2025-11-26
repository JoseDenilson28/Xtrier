<?php
require_once __DIR__ . '/../config/database.php';

class Doutor {
    private $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    /**
     * Lista doutores por status com limite
     */
    public function listarPorStatus($status = 'livre', $limite = 5) {
        $sql = "SELECT 
                    d.id,
                    u.nome,
                    u.email,
                    d.status
                FROM doutores d
                INNER JOIN users u ON d.user_id = u.id
                WHERE d.status = :st
                LIMIT :limite";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':st', $status);
        $stmt->bindValue(':limite', (int)$limite, PDO::PARAM_INT);

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
