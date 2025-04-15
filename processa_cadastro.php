<?php
require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';
require_once 'classes/Usuario.php';

Sessao::iniciar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (empty($nome) || empty($email) || empty($senha)) {
        header('Location: cadastro.php?erro=2');
        exit;
    }

    if (Autenticador::registrar($nome, $email, $senha)) {
        header('Location: login.php?sucesso=1');
        exit;
    } else {
        header('Location: cadastro.php?erro=1');
        exit;
    }
} else {
    header('Location: cadastro.php');
    exit;
} 