<?php
// Caminho base da aplicação (URL base do projeto)
define("BASE_URL", "/Xtrier/public");

// Caminhos físicos (no disco do servidor)
define("APP_PATH", dirname(__DIR__));          // Ex: C:/xampp/htdocs/Xtrier/app
define("PUBLIC_PATH", APP_PATH . "/../public"); // Ex: C:/xampp/htdocs/Xtrier/public
define("ASSETS_PATH", BASE_URL . "/assets");

// Configurações de ambiente
define("APP_NAME", "Xtrier - Triagem Clínica Odonto");
define("APP_VERSION", "1.0.0");

// Exemplo de debug (desativar em produção)
define("DEBUG", true);
