<?php
class HomeController extends Controller {
    public function index() {
        // Carrega a página inicial
        $this->view("home/index");
    }

    public function faq() {
        // Carrega a página FAQ
        $this->view("home/faq");
    }
}
