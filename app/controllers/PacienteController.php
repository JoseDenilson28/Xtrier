<?php
class PacienteController extends Controller {
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

        $this->view("paciente/triagem");
    }
}
