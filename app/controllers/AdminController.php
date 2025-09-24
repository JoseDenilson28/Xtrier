<?php
class AdminController extends Controller {
    public function dashboard() {
        session_start();
        if (!isset($_SESSION['user_id']) || $_SESSION['user_tipo'] !== 'admin') {
            header("Location: /Xtrier/public/auth/login");
            exit;
        }

        $this->view("admin/dashboard");
    }
}
