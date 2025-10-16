<?php
class AuthController extends Controller {

    // Página de login
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            require_once "../app/config/database.php";
            $db = new Database();
            $conn = $db->getConnection();

            $email = trim($_POST['email']);
            $senha = $_POST['senha'];

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($senha, $user['senha'])) {
                session_start();

                // 🔒 Remover a senha do array antes de salvar na sessão
                unset($user['senha']);
                $_SESSION['user'] = $user;

                // Redireciona de acordo com o tipo
                switch ($user['tipo']) {
                    case 'paciente':
                        header("Location: /Xtrier/public/paciente/dashboard");
                        break;
                    case 'recepcionista':
                        header("Location: /Xtrier/public/recepcionista/dashboard");
                        break;
                    case 'doutor':
                        header("Location: /Xtrier/public/doutor/dashboard");
                        break;
                    case 'admin':
                        header("Location: /Xtrier/public/admin/dashboard");
                        break;
                    default:
                        // Caso tipo não seja reconhecido
                        header("Location: /Xtrier/public/auth/login");
                        break;
                }
                exit;
            } else {
                echo "<script>alert('Email ou senha inválidos');</script>";
            }
        }

        $this->view("auth/login");
    }

    // Página de registro
    public function register() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            require_once "../app/config/database.php";
            $db = new Database();
            $conn = $db->getConnection();

            try {
                // 📥 Coleta os dados do formulário
                $nome  = trim($_POST['nome']);
                $email = trim($_POST['email']);
                $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
                $tipo  = "paciente";

                // ✨ Inicia transação
                $conn->beginTransaction();

                // 👤 1. Inserir usuário na tabela users
                $stmtUser = $conn->prepare("
                    INSERT INTO users (nome, email, senha, tipo, criado_em)
                    VALUES (:nome, :email, :senha, :tipo, NOW())
                ");
                $stmtUser->bindParam(":nome", $nome);
                $stmtUser->bindParam(":email", $email);
                $stmtUser->bindParam(":senha", $senha);
                $stmtUser->bindParam(":tipo", $tipo);
                $stmtUser->execute();

                // 📌 Pegar o ID do usuário recém criado
                $userId = $conn->lastInsertId();

                // 🏥 2. Criar registro em pacientes com campos vazios
                $status = "ativo"; // pode ajustar para "pendente" se quiser
                $stmtPaciente = $conn->prepare("
                    INSERT INTO pacientes (
                        user_id,
                        data_nascimento,
                        genero,
                        telefone,
                        endereco,
                        documento,
                        contato_emergencia,
                        status,
                        criado_em
                    ) VALUES (
                        :user_id,
                        NULL,
                        NULL,
                        NULL,
                        NULL,
                        NULL,
                        NULL,
                        :status,
                        NOW()
                    )
                ");
                $stmtPaciente->bindParam(":user_id", $userId);
                $stmtPaciente->bindParam(":status", $status);
                $stmtPaciente->execute();

                // 💾 Confirma transação
                $conn->commit();

                echo "<script>
                        alert('Cadastro realizado com sucesso! Faça login.');
                        window.location.href='/Xtrier/public/auth/login';
                    </script>";

            } catch (Exception $e) {
                $conn->rollBack();
                error_log('Erro no cadastro: ' . $e->getMessage());
                echo "<script>alert('Erro ao cadastrar. Tente novamente.');</script>";
            }
        }

        $this->view("auth/register");
    }

    // Logout
    public function logout() {
        session_start();

        $_SESSION = [];

        if (ini_get("session.use_cookies")) {
            $params = session_get_cookie_params();
            setcookie(session_name(), '', time() - 42000,
                $params["path"], $params["domain"],
                $params["secure"], $params["httponly"]
            );
        }

        session_destroy();

        header("Location: /Xtrier/public/auth/login");
        exit;
    }
}
