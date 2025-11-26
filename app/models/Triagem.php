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

    public function listarPaginado(int $pagina, int $limite = 4) {
        $offset = ($pagina - 1) * $limite;

        $sql = "SELECT 
                    t.id AS triagem_id,
                    t.sintomas,
                    t.historico,
                    t.prioridade,
                    t.pontos,
                    t.criado_em,
                    u.nome AS paciente_nome
                FROM triagens t
                INNER JOIN pacientes p ON t.paciente_id = p.id
                INNER JOIN users u ON p.user_id = u.id
                WHERE t.status = 'aberta'
                ORDER BY 
                    FIELD(t.prioridade, 'alta', 'media', 'baixa'), 
                    t.criado_em ASC
                LIMIT :limite OFFSET :offset";

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':limite', $limite, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as &$r) {
            $r['sintomas'] = implode(", ", json_decode($r['sintomas'], true) ?? []);
        }

        // total para paginação
        $total = $this->db->query("SELECT COUNT(*) FROM triagens WHERE status = 'aberta'")->fetchColumn();
        $totalPaginas = ceil($total / $limite);

        return [
            "triagens" => $rows,
            "paginaAtual" => $pagina,
            "totalPaginas" => $totalPaginas
        ];
    }

    public function getTriagensAbertas() {
        $sql = "SELECT 
                    t.id AS triagem_id,
                    t.sintomas,
                    t.historico,
                    t.prioridade,
                    t.pontos,
                    t.criado_em,
                    u.nome AS paciente_nome
                FROM triagens t
                INNER JOIN pacientes p ON t.paciente_id = p.id
                INNER JOIN users u ON p.user_id = u.id
                WHERE t.status = 'aberta'
                ORDER BY 
                    FIELD(t.prioridade, 'alta', 'media', 'baixa'), 
                    t.criado_em ASC";

        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

        foreach ($rows as &$r) {
            $r['sintomas'] = implode(", ", json_decode($r['sintomas'], true) ?? []);
        }

        return $rows;
    }

}
