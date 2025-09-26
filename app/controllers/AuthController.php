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

            $nome = trim($_POST['nome']);
            $email = trim($_POST['email']);
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (nome, email, senha, tipo) 
                                    VALUES (:nome, :email, :senha, :tipo)");

            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":senha", $senha);

            // 🔑 Por padrão, todo novo cadastro entra como "paciente"
            $tipo = "paciente";
            $stmt->bindParam(":tipo", $tipo);

            if ($stmt->execute()) {
                echo "<script>
                        alert('Cadastro realizado com sucesso! Faça login.');
                        window.location.href='/Xtrier/public/auth/login';
                      </script>";
            } else {
                echo "<script>alert('Erro ao cadastrar');</script>";
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
