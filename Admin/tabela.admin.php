<?php
// Configurações de conexão com o banco de dados
$servidor = "localhost";
$usuario = "root"; // Usuário padrão do XAMPP
$senha = "";       // Senha padrão do XAMPP é vazia
$banco = "bd_biblioteca"; // Substitua pelo nome do banco de dados

// Criar conexão
$conexao = new mysqli($servidor, $usuario, $senha, $banco);

// Verificar conexão
if ($conexao->connect_error) {
    die("Falha na conexão: " . $conexao->connect_error);
}

// SQL para criar uma tabela
$sql = "CREATE TABLE usuarios (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(255) NOT NULL,
    data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

// Executar a query
if ($conexao->query($sql) === TRUE) {
    echo "Tabela 'usuarios' criada com sucesso!";
} else {
    echo "Erro ao criar tabela: " . $conexao->error;
}

// Fechar conexão
$conexao->close();
?>
