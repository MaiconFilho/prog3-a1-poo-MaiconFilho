<?php
// Inclui os arquivos necessários
include 'classes/Sessao.php';
include 'classes/Autenticador.php';

// Inicia a sessão
Sessao::iniciar();

// Verifica se já está logado
if (Autenticador::estaLogado()) {
    // Redireciona para o dashboard
    header('Location: dashboard.php');
    exit;
}

// Pega o erro da URL
$erro = isset($_GET['erro']) ? $_GET['erro'] : '';
$sucesso = isset($_GET['sucesso']) ? $_GET['sucesso'] : '';
$mensagem = '';
$emailSalvo = isset($_COOKIE['email_lembrado']) ? $_COOKIE['email_lembrado'] : '';

// Define a mensagem de erro
if ($erro == '1') {
    $mensagem = 'Email ou senha incorretos!';
} else if ($erro == '2') {
    $mensagem = 'Por favor, preencha todos os campos!';
} else if ($sucesso == '1') {
    $mensagem = 'Cadastro realizado com sucesso! Faça login para continuar.';
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f0f0f0;
            padding-top: 50px;
        }
        .card {
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h3 class="text-center">Login</h3>
                    </div>
                    <div class="card-body">
                        <?php if ($mensagem != ''): ?>
                            <div class="alert <?php echo $sucesso ? 'alert-success' : 'alert-danger'; ?>">
                                <?php echo $mensagem; ?>
                            </div>
                        <?php endif; ?>
                        <form method="POST" action="processa_login.php">
                            <div class="form-group mb-3">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" value="<?php echo $emailSalvo; ?>" required>
                            </div>
                            <div class="form-group mb-3">
                                <label>Senha</label>
                                <input type="password" class="form-control" name="senha" required>
                            </div>
                            <div class="form-check mb-3">
                                <input type="checkbox" class="form-check-input" id="lembrar" name="lembrar">
                                <label class="form-check-label" for="lembrar">Lembrar e-mail</label>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Entrar</button>
                        </form>
                        <div class="text-center mt-3">
                            <a href="cadastro.php">Não tem uma conta? Cadastre-se</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html> 