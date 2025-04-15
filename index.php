<?php
require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';

Sessao::iniciar();

if (Autenticador::estaLogado()) {
    header('Location: dashboard.php');
    exit;
} else {
    header('Location: login.php');
    exit;
} 