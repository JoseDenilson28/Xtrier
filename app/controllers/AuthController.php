<?php
class AuthController extends Controller {

    // Página de login
    public function login() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            require_once "../app/config/database.php";
            $db = new Database();
            $conn = $db->getConnection();

            $email = $_POST['email'];
            $senha = $_POST['senha'];

            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email LIMIT 1");
            $stmt->bindParam(":email", $email);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($senha, $user['senha'])) {
                session_start();
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_tipo'] = $user['tipo'];

                // Redireciona para o painel correto
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

            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

            $stmt = $conn->prepare("INSERT INTO users (nome, email, senha) VALUES (:nome, :email, :senha)");
            $stmt->bindParam(":nome", $nome);
            $stmt->bindParam(":email", $email);
            $stmt->bindParam(":senha", $senha);

            if ($stmt->execute()) {
                echo "<script>alert('Cadastro realizado com sucesso! Faça login.'); window.location.href='/Xtrier/public/auth/login';</script>";
            } else {
                echo "<script>alert('Erro ao cadastrar');</script>";
            }
        }

        $this->view("auth/register");
    }

    public function logout() {
    // Inicia a sessão atual
    session_start();

    // Limpa todas as variáveis da sessão
    $_SESSION = [];

    // Destroi o cookie de sessão, se existir
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Destroi a sessão
    session_destroy();

    // Redireciona para a página de login
    header("Location: /Xtrier/public/auth/login");
    exit;
}

}
