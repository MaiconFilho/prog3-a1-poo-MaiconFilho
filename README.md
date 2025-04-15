# Sistema de Login com PHP e POO

## Informações do Aluno
- **Nome:** [Seu Nome Completo]
- **Turma:** [Sua Turma]

## Descrição do Projeto
Sistema de login desenvolvido em PHP utilizando Programação Orientada a Objetos (POO). O sistema inclui:
- Cadastro de usuários
- Login com autenticação
- Dashboard após login
- Funcionalidade de "Lembrar e-mail"
- Gerenciamento de sessões
- Armazenamento de dados em cookies

## Estrutura do Projeto
```
/
├── classes/
│   ├── Usuario.php
│   ├── Sessao.php
│   └── Autenticador.php
├── index.php
├── login.php
├── processa_login.php
├── cadastro.php
├── processa_cadastro.php
├── dashboard.php
└── logout.php
```

## Requisitos
- PHP 7.0 ou superior
- Servidor web (Apache, XAMPP, etc.)

## Instruções para Execução Local

1. **Instalação do XAMPP**
   - Baixe e instale o XAMPP em seu computador
   - Inicie os serviços Apache e MySQL

2. **Configuração do Projeto**
   - Clone este repositório para a pasta `htdocs` do XAMPP:
     ```
     C:\xampp\htdocs\prog3-a1-poo-[seunome]
     ```

3. **Acesso ao Sistema**
   - Abra seu navegador
   - Acesse: `http://localhost/prog3-a1-poo-[seunome]`

4. **Uso do Sistema**
   - Na página inicial, você pode:
     - Cadastrar um novo usuário
     - Fazer login com usuário existente
     - Usar a funcionalidade "Lembrar e-mail"

## Observações
- O sistema utiliza cookies para armazenar dados temporários
- As senhas são criptografadas usando password_hash
- Não é necessário banco de dados, os dados são armazenados em memória 