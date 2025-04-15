<?php

class Autenticador {
    private static $usuarios = [];

    public static function carregarUsuarios() {
        // Inclui a classe Usuario antes de tentar desserializar
        include_once 'Usuario.php';
        
        if (isset($_COOKIE['usuarios'])) {
            $usuariosSerializados = $_COOKIE['usuarios'];
            self::$usuarios = unserialize($usuariosSerializados);
        }
    }

    public static function salvarUsuarios() {
        $usuariosSerializados = serialize(self::$usuarios);
        setcookie('usuarios', $usuariosSerializados, time() + (86400 * 30), "/"); // Cookie válido por 30 dias
    }

    public static function registrar($nome, $email, $senha) {
        if (empty($nome) || empty($email) || empty($senha)) {
            return false;
        }

        self::carregarUsuarios();

        if (isset(self::$usuarios[$email])) {
            return false;
        }
        
        self::$usuarios[$email] = new Usuario($nome, $email, $senha);
        self::salvarUsuarios();
        return true;
    }

    public static function login($email, $senha) {
        if (empty($email) || empty($senha)) {
            return false;
        }

        self::carregarUsuarios();

        if (!isset(self::$usuarios[$email])) {
            return false;
        }

        $usuario = self::$usuarios[$email];
        if ($usuario->verificarSenha($senha)) {
            Sessao::set('usuario', [
                'nome' => $usuario->getNome(),
                'email' => $usuario->getEmail()
            ]);
            return true;
        }

        return false;
    }

    public static function estaLogado() {
        return Sessao::get('usuario') !== null;
    }
} 