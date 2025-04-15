<?php
require_once 'classes/Sessao.php';
require_once 'classes/Autenticador.php';

Sessao::iniciar();

if (Autenticador::estaLogado()) {
    header('Location: dashboard.php');
    exit;
}

$erro = $_GET['erro'] ?? '';
$mensagem = '';
if ($erro == '1') {
    $mensagem = 'Cadastro incorreto!';
} elseif ($erro == '2') {
    $mensagem = 'Por favor, preencha todos os campos!';
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="text-center">Cadastro</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($mensagem): ?>
                            <div class="alert alert-danger">
                                <?php echo htmlspecialchars($mensagem); ?>
                            </div>
                        <?php endif; ?>
                        <form action="processa_cadastro.php" method="POST">
                            <div class="mb-3">
                                <label for="nome" class="form-label">Nome</label>
                                <input type="text" class="form-control" id="nome" name="nome" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">E-mail</label>
                                <input type="email" class="form-control" id="email" name="email" required>
                            </div>
                            <div class="mb-3">
                                <label for="senha" class="form-label">Senha</label>
                                <input type="password" class="form-control" id="senha" name="senha" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Cadastrar</button>
                            </div>
                        </form>
                        <div class="text-center mt-3">
                            <a href="login.php">Já tem uma conta? Faça login</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 