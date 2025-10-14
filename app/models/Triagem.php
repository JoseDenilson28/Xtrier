<?php
// app/models/Triagem.php
require_once __DIR__ . '/../config/database.php';

class Triagem {
    private $db;

    // pesos definidos (os mesmos que passaste)
    private $pesos = [
        "dor_intensa" => 40,
        "sangramento" => 30,
        "mastigacao" => 20,
        "fala" => 20,
        "trauma" => 50,
        "aparelho_quebrado" => 15
    ];

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    // calcula pontos e prioridade a partir de um array de sintomas
    public function calcularScoreEPrioridade(array $sintomas): array {
        $score = 0;
        foreach ($sintomas as $s) {
            if (isset($this->pesos[$s])) $score += $this->pesos[$s];
        }
        if ($score > 100) $score = 100;

        if ($score < 40) $prioridade = 'baixa';
        elseif ($score < 70) $prioridade = 'media';
        else $prioridade = 'alta';

        return ['pontos' => (int)$score, 'prioridade' => $prioridade];
    }

    // salva triagem (sintomas: array)
    public function salvar(int $paciente_id, array $sintomas, string $historico = ''): bool {
        $calc = $this->calcularScoreEPrioridade($sintomas);
        $pontos = $calc['pontos'];
        $prioridade = $calc['prioridade'];

        // armazena sintomas em JSON para preservar informação estruturada
        $sintomas_json = json_encode(array_values($sintomas), JSON_UNESCAPED_UNICODE);

        $sql = "INSERT INTO triagens (paciente_id, sintomas, historico, prioridade, pontos)
                VALUES (:paciente_id, :sintomas, :historico, :prioridade, :pontos)";
        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            ':paciente_id' => $paciente_id,
            ':sintomas'    => $sintomas_json,
            ':historico'   => $historico,
            ':prioridade'  => $prioridade,
            ':pontos'      => $pontos
        ]);
    }

    // listar triagens por paciente (exemplo)
    public function listarPorPaciente(int $paciente_id) {
        $sql = "SELECT t.*, p.user_id, p.data_nascimento, p.genero 
                FROM triagens t
                JOIN pacientes p ON p.id = t.paciente_id
                WHERE t.paciente_id = :paciente_id
                ORDER BY t.criado_em DESC";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':paciente_id' => $paciente_id]);
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // decodificar sintomas JSON
        foreach ($rows as &$r) {
            $r['sintomas'] = json_decode($r['sintomas'], true) ?? [];
        }
        return $rows;
    }
}
