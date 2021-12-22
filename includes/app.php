<?php

require __DIR__ . '/../vendor/autoload.php';


use \App\Utils\View;
use \WilliamCosta\DotEnv\Environment;
use \WilliamCosta\DatabaseManager\Database;

// CARREGA VARIAVEIS DE AMBIENTE
Environment::load(__DIR__ . '/../');

// DEFINE AS CONFIGURAÇÕES DE BANCO DE DADOS
Database::config(
    getenv('DB_HOST'),
    getenv('DB_NAME'),
    getenv('DB_USER'),
    getenv('DB_PASS'),
    getenv('DB_PORT')
);

define('URL', getenv('URL'));

// DEFINE O VALOR PADRÃO DAS VARIAVEIS obs: usado nos botões
View::init([
    'URL' => URL
]);