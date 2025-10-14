<?php
class Paciente {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function listar($limite, $offset, $busca = '') {
        $sql = "
            SELECT 
                p.id,
                u.nome,
                u.email,
                p.telefone,
                p.genero,
                p.data_nascimento,
                TIMESTAMPDIFF(YEAR, p.data_nascimento, CURDATE()) AS idade
            FROM pacientes p
            INNER JOIN users u ON u.id = p.user_id
            WHERE u.nome LIKE :busca OR p.telefone LIKE :busca
            ORDER BY u.nome ASC
            LIMIT :limite OFFSET :offset
        ";
        $stmt = $this->conn->prepare($sql);
        $buscaTermo = "%$busca%";
        $stmt->bindParam(':busca', $buscaTermo, PDO::PARAM_STR);
        $stmt->bindParam(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindParam(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function contar($busca = '') {
        $sql = "
            SELECT COUNT(*) as total
            FROM pacientes p
            INNER JOIN users u ON u.id = p.user_id
            WHERE u.nome LIKE :busca OR p.telefone LIKE :busca
        ";
        $stmt = $this->conn->prepare($sql);
        $buscaTermo = "%$busca%";
        $stmt->bindParam(':busca', $buscaTermo, PDO::PARAM_STR);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC)['total'];
    }
}
