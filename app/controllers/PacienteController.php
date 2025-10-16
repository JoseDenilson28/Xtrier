<?php
// app/controllers/PacienteController.php
require_once __DIR__ . '/../models/Triagem.php';
require_once __DIR__ . '/../config/database.php';

class PacienteController extends Controller {
    public function index() {
        header("Location: /Xtrier/public/paciente/dashboard");
        exit;
    }
    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'paciente') {
            header("Location: /Xtrier/public/auth/login");
            exit;
        }

        $this->view("paciente/dashboard");
    }

    public function triagem() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'paciente') {
            header("Location: /Xtrier/public/auth/login");
            exit;
        }

        $db = new Database();
        $conn = $db->getConnection();
        $userId = (int) $_SESSION['user']['id'];

        // Verifica se paciente já existe
        $stmt = $conn->prepare("SELECT id FROM pacientes WHERE user_id = :user_id LIMIT 1");
        $stmt->execute([':user_id' => $userId]);
        $pac = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pac) {
            $paciente_id = (int)$pac['id'];
        } else {
            // Cria paciente automaticamente se não existir
            $insert = $conn->prepare("INSERT INTO pacientes (user_id, criado_em) VALUES (:user_id, NOW())");
            $insert->execute([':user_id' => $userId]);
            $paciente_id = (int)$conn->lastInsertId();
        }

        // Se for POST → salvar triagem
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $sintomas = isset($_POST['sintomas']) && is_array($_POST['sintomas']) 
                        ? array_map('trim', $_POST['sintomas']) : [];
            $historico = trim($_POST['historico'] ?? '');

            $permitidos = ["dor_intensa","sangramento","mastigacao","fala","trauma","aparelho_quebrado"];
            $validados = array_values(array_intersect($sintomas, $permitidos));

            $triagemModel = new Triagem();
            $salvo = $triagemModel->salvar($paciente_id, $validados, $historico);

            if ($salvo) {
                $_SESSION['alert'] = [
                    'icon' => 'success',
                    'title' => 'Triagem enviada com sucesso!',
                    'text' => 'Sua triagem foi registrada e será avaliada em breve.'
                ];
            } else {
                $_SESSION['alert'] = [
                    'icon' => 'error',
                    'title' => 'Erro ao enviar!',
                    'text' => 'Ocorreu um problema ao registrar sua triagem. Tente novamente.'
                ];
            }

            header("Location: /Xtrier/public/paciente/triagem");
            exit;
        }

        $this->view("paciente/triagem");
    }
    
    public function historico() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'paciente') {
            header("Location: /Xtrier/public/auth/login");
            exit;
        }

        $this->view("paciente/historico");
    }

    public function consultas() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'paciente') {
            header("Location: /Xtrier/public/auth/login");
            exit;
        }

        $this->view("paciente/consultas");
    }
    
    public function perfil() {
        session_start();
        if (!isset($_SESSION['user']) || $_SESSION['user']['tipo'] !== 'paciente') {
            header("Location: /Xtrier/public/auth/login");
            exit;
        }

        $this->view("paciente/perfil");
    }
}
