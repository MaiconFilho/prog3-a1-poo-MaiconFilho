<?php

class Usuario implements Serializable {
    private $nome;
    private $email;
    private $senha;

    public function __construct($nome, $email, $senha) {
        $this->nome = $nome;
        $this->email = $email;
        $this->senha = password_hash($senha, PASSWORD_DEFAULT);
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function verificarSenha($senha) {
        return password_verify($senha, $this->senha);
    }

    public function serialize() {
        return serialize([
            'nome' => $this->nome,
            'email' => $this->email,
            'senha' => $this->senha
        ]);
    }

    public function unserialize($data) {
        $data = unserialize($data);
        $this->nome = $data['nome'];
        $this->email = $data['email'];
        $this->senha = $data['senha'];
    }
} 