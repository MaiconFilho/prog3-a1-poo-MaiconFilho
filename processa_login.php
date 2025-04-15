<?php
// Inclui os arquivos necessários
include 'classes/Sessao.php';
include 'classes/Autenticador.php';
include 'classes/Usuario.php';

// Inicia a sessão
Sessao::iniciar();

// Verifica se é uma requisição POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Pega os dados do formulário
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $senha = isset($_POST['senha']) ? $_POST['senha'] : '';
    $lembrar = isset($_POST['lembrar']) ? true : false;

    // Verifica se os campos estão preenchidos
    if (empty($email) || empty($senha)) {
        // Redireciona com erro
        header('Location: login.php?erro=2');
        exit;
    }

    // Tenta fazer o login
    if (Autenticador::login($email, $senha)) {
        // Se o checkbox estiver marcado, salva o email no cookie
        if ($lembrar) {
            setcookie('email_lembrado', $email, time() + 300, "/");
        }
        
        // Redireciona para o dashboard
        header('Location: dashboard.php');
        exit;
    } else {
        // Redireciona com erro
        header('Location: login.php?erro=1');
        exit;
    }
} else {
    // Se não for POST, volta para o login
    header('Location: login.php');
    exit;
} 