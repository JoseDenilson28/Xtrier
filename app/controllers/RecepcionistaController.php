<?php
require_once __DIR__ . '/../config/database.php';
require_once __DIR__ . '/../models/paciente.php';

class RecepcionistaController extends Controller {

    public function index() {
        $this->dashboard();
    }

    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'recepcionista') {
            header("Location: /Xtrier/public/auth/login");
            exit;
        }

        $this->view("recepcionista/dashboard");
    }

    public function pacientes() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'recepcionista') {
            header("Location: /Xtrier/public/auth/login");
            exit;
        }

        $db = new Database();
        $conn = $db->getConnection();
        $pacienteModel = new Paciente($conn);

        $porPagina = 5;
        $paginaAtual = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
        if ($paginaAtual < 1) $paginaAtual = 1;
        $offset = ($paginaAtual - 1) * $porPagina;

        $busca = $_GET['busca'] ?? '';

        $pacientes = $pacienteModel->listar($porPagina, $offset, $busca);
        $totalPacientes = $pacienteModel->contar($busca);
        $totalPaginas = ceil($totalPacientes / $porPagina);

        $this->view("recepcionista/pacientes", [
            'pacientes' => $pacientes,
            'paginaAtual' => $paginaAtual,
            'totalPaginas' => $totalPaginas
        ]);
    }

    public function cadastrarPaciente() {
        session_start();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $telefone = trim($_POST['telefone'] ?? '');
            $genero = trim($_POST['genero'] ?? '');
            $endereco = trim($_POST['endereco'] ?? '');
            $idade = (int) ($_POST['idade'] ?? 0);

            // ⚡ Calcula a data de nascimento com base na idade
            $anoAtual = (int) date('Y');
            $anoNascimento = $anoAtual - $idade;
            $dataNascimento = $anoNascimento . "-01-01";

            $db = new Database();
            $conn = $db->getConnection();

            // 🔐 Criar usuário (tabela users)
            $stmtUser = $conn->prepare("INSERT INTO users (nome, email, senha, tipo, criado_em) VALUES (:n, :e, :s, 'paciente', NOW())");
            $senhaPadrao = password_hash('123456', PASSWORD_DEFAULT);
            $stmtUser->execute([
                ':n' => $nome,
                ':e' => $email,
                ':s' => $senhaPadrao
            ]);
            $userId = $conn->lastInsertId();

            // 🧍 Inserir dados do paciente (tabela pacientes)
            $stmtPaciente = $conn->prepare("
                INSERT INTO pacientes (user_id, data_nascimento, genero, telefone, endereco, status, criado_em) 
                VALUES (:uid, :dn, :g, :t, :end, 'ativo', NOW())
            ");
            $stmtPaciente->execute([
                ':uid' => $userId,
                ':dn' => $dataNascimento,
                ':g' => $genero,
                ':t' => $telefone,
                ':end' => $endereco
            ]);

            header("Location: /Xtrier/public/recepcionista/pacientes");
            exit;
        }
    }

    public function editarPaciente($id) {
        session_start();
        $db = new Database();
        $conn = $db->getConnection();

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome = trim($_POST['nome'] ?? '');
            $email = trim($_POST['email'] ?? '');
            $telefone = trim($_POST['telefone'] ?? '');
            $genero = trim($_POST['genero'] ?? '');
            $endereco = trim($_POST['endereco'] ?? '');
            $idade = (int) ($_POST['idade'] ?? 0);

            $anoAtual = (int) date('Y');
            $anoNascimento = $anoAtual - $idade;
            $dataNascimento = $anoNascimento . "-01-01";

            // Atualiza paciente + usuário
            $stmt = $conn->prepare("
                UPDATE users u
                JOIN pacientes p ON u.id = p.user_id
                SET u.nome = :n, u.email = :e, p.telefone = :t, p.genero = :g, p.endereco = :end, p.data_nascimento = :dn
                WHERE p.id = :id
            ");
            $stmt->execute([
                ':n' => $nome,
                ':e' => $email,
                ':t' => $telefone,
                ':g' => $genero,
                ':end' => $endereco,
                ':dn' => $dataNascimento,
                ':id' => $id
            ]);

            header("Location: /Xtrier/public/recepcionista/pacientes");
            exit;
        } else {
            $stmt = $conn->prepare("
                SELECT p.id, u.nome, u.email, p.telefone, p.genero, p.endereco, p.data_nascimento
                FROM pacientes p
                INNER JOIN users u ON u.id = p.user_id
                WHERE p.id = :id
            ");
            $stmt->execute([':id' => $id]);
            $paciente = $stmt->fetch(PDO::FETCH_ASSOC);

            $this->view("recepcionista/editar_paciente", ['paciente' => $paciente]);
        }
    }

    public function deletarPaciente($id) {
        session_start();
        $db = new Database();
        $conn = $db->getConnection();

        // Obtem o user_id antes de deletar
        $stmt = $conn->prepare("SELECT user_id FROM pacientes WHERE id = :id");
        $stmt->execute([':id' => $id]);
        $userId = $stmt->fetchColumn();

        // Deleta paciente
        $stmtDelPac = $conn->prepare("DELETE FROM pacientes WHERE id = :id");
        $stmtDelPac->execute([':id' => $id]);

        // Deleta usuário vinculado
        $stmtDelUser = $conn->prepare("DELETE FROM users WHERE id = :uid");
        $stmtDelUser->execute([':uid' => $userId]);

        header("Location: /Xtrier/public/recepcionista/pacientes");
        exit;
    }
}
