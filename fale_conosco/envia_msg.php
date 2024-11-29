<?php
include_once("acesso/sessao.php");

// Verifica se a conexão com o banco de dados foi estabelecida
if (!isset($pdo)) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=bd_biblioteca', 'root', '');
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Erro na conexão com o banco de dados: " . $e->getMessage());
    }
}

// Verifica se o usuário está logado
if (!logado()) {
    header("Location: ../index.php?pg=bate-papo/bate-papo_serie");
    exit;
}

// Verifica se o formulário foi enviado
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtém os dados enviados no formulário
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $tipo_mensagem = $_POST['tipo_mensagem'];
    $mensagem = $_POST['mensagem'];
    $usuario_id = $_SESSION['id_usuario'];

    try {
        // Conexão com o banco usando PDO
        $sql = "INSERT INTO mensagem (nome, email, telefone, tipo_mensagem, mensagem, usuario_id) 
                VALUES (:nome, :email, :telefone, :tipo_mensagem, :mensagem, :usuario_id)";
        $stmt = $pdo->prepare($sql);

        // Bind dos parâmetros para evitar SQL Injection
        $stmt->bindParam(':nome', $nome);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':telefone', $telefone);
        $stmt->bindParam(':tipo_mensagem', $tipo_mensagem);
        $stmt->bindParam(':mensagem', $mensagem);
        $stmt->bindParam(':usuario_id', $usuario_id);

        // Executa o comando
        if ($stmt->execute()) {
            echo "<script>alert('Mensagem Enviada com Sucesso!'); window.location.href = 'index.php';</script>";
        } else {
            echo "<h3>Erro ao enviar mensagem. Por favor, tente novamente.</h3>";
        }
    } catch (PDOException $e) {
        echo "<h3>Erro no Banco de Dados: " . $e->getMessage() . "</h3>";
    }
}
