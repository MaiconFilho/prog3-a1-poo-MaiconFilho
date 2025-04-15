<?php
require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';

Sessao::iniciar();

if (!Autenticador::estaLogado()) {
    header('Location: login.php');
    exit;
}

$usuario = Sessao::get('usuario');
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h3>Bem-vindo, <?php echo htmlspecialchars($usuario['nome']); ?>!</h3>
                        <a href="logout.php" class="btn btn-danger">Sair</a>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success">
                            Você está logado com sucesso!
                        </div>
                        <p>Seu e-mail: <?php echo htmlspecialchars($usuario['email']); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 