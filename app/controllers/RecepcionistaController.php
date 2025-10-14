<?php
class RecepcionistaController extends Controller {
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

        $this->view("recepcionista/pacientes");
    }
    
}
