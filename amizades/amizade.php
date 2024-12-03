<?php
include_once("config.inc.php");
include_once("acesso/sessao.php");

// Verifica se está logado
if (!logado()) {
    echo "<script>alert('Você não está logado!'); window.location.href = 'index.php?pg=acesso/login/form-login';</script>";
    exit();
}

$usuario_id = $_SESSION['id_usuario'];

echo "<div class='containerr'>";

// Exibir amigos
$sql_amigos = "SELECT usuarios.nome FROM amizades 
            JOIN usuarios ON amizades.amigo_id = usuarios.id 
            WHERE amizades.usuario_id = $usuario_id AND amizades.status = 'aceito'";
$query_amigos = mysqli_query($conexao, $sql_amigos);

echo "<div class='amigos'>";
echo "<h2>Meus Amigos</h2>";
if (mysqli_num_rows($query_amigos) > 0) {
    while ($amigo = mysqli_fetch_assoc($query_amigos)) {
        echo "<p class='amigo-item'>{$amigo['nome']}</p>";
    }
} else {
    echo "<p class='amigo-item'>Você ainda não tem amigos.</p>";
}
echo "</div>";

// Enviar solicitação de amizade
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nome_usuario'])) {
    $nome_usuario = $_POST['nome_usuario'];
    $sql_usuario = "SELECT id FROM usuarios WHERE nome = ?";
    $stmt_usuario = mysqli_prepare($conexao, $sql_usuario);
    mysqli_stmt_bind_param($stmt_usuario, "s", $nome_usuario);
    mysqli_stmt_execute($stmt_usuario);
    $result_usuario = mysqli_stmt_get_result($stmt_usuario);

    if (mysqli_num_rows($result_usuario) > 0) {
        $usuario = mysqli_fetch_assoc($result_usuario);
        $amigo_id = $usuario['id'];

        // Verificar se já existe uma solicitação pendente ou amizade aceita
        $sql_verificar = "SELECT * FROM amizades WHERE usuario_id = ? AND amigo_id = ? AND status IN ('pendente', 'aceito')";
        $stmt_verificar = mysqli_prepare($conexao, $sql_verificar);
        mysqli_stmt_bind_param($stmt_verificar, "ii", $usuario_id, $amigo_id);
        mysqli_stmt_execute($stmt_verificar);
        $result_verificar = mysqli_stmt_get_result($stmt_verificar);

        if (mysqli_num_rows($result_verificar) == 0) {
            $sql_solicitacao = "INSERT INTO amizades (usuario_id, amigo_id, status) VALUES (?, ?, 'pendente')";
            $stmt_solicitacao = mysqli_prepare($conexao, $sql_solicitacao);
            mysqli_stmt_bind_param($stmt_solicitacao, "ii", $usuario_id, $amigo_id);
            if (mysqli_stmt_execute($stmt_solicitacao)) {
                echo "<p>Solicitação de amizade enviada para $nome_usuario.</p>";
            } else {
                echo "<p>Erro ao enviar solicitação de amizade.</p>";
            }
            mysqli_stmt_close($stmt_solicitacao);
        } else {
            echo "<p>Já existe uma solicitação pendente ou amizade com $nome_usuario.</p>";
        }
        mysqli_stmt_close($stmt_verificar);
    } else {
        echo "<p>Usuário não encontrado.</p>";
    }
    mysqli_stmt_close($stmt_usuario);
}

// Formulário para enviar solicitação de amizade
echo "<div class='formulario'>";
echo "<h2>Enviar Solicitação de Amizade</h2>";
echo "<form method='post'>";
echo "<input type='text' name='nome_usuario' class='input-text' placeholder='Nome do usuário' required>";
echo "<input type='submit' class='input-submit' value='Enviar Solicitação'>";
echo "</form>";
echo "</div>";

// Exibir solicitações de amizade recebidas
$sql_solicitacoes = "SELECT amizades.id, usuarios.nome, usuarios.id AS usuario_solicitante_id FROM amizades 
                    JOIN usuarios ON amizades.usuario_id = usuarios.id 
                    WHERE amizades.amigo_id = $usuario_id AND amizades.status = 'pendente'";
$query_solicitacoes = mysqli_query($conexao, $sql_solicitacoes);

echo "<div class='solicitacoes'>";
echo "<h2>Solicitações de Amizade</h2>";
if (mysqli_num_rows($query_solicitacoes) > 0) {
    while ($solicitacao = mysqli_fetch_assoc($query_solicitacoes)) {
        echo "<div class='solicitacao-item'>";
        echo "<p>{$solicitacao['nome']}</p>";
        echo "<form method='post' action='index.php?pg=amizades/amizade'>";
        echo "<input type='hidden' name='solicitacao_id' value='{$solicitacao['id']}'>";
        echo "<input type='hidden' name='usuario_solicitante_id' value='{$solicitacao['usuario_solicitante_id']}'>";
        echo "<button type='submit' name='acao' value='aceitar' class='button-aceitar'>Aceitar</button>";
        echo "<button type='submit' name='acao' value='recusar' class='button-recusar'>Recusar</button>";
        echo "</form>";
        echo "</div>";
    }
} else {
    echo "<p class='solicitacao-item'>Você não tem solicitações de amizade pendentes.</p>";
}
echo "</div>";

echo "</div>"; // Fechar container

// Processar ações de aceitar ou recusar
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['acao']) && isset($_POST['solicitacao_id'])) {
    $acao = $_POST['acao'];
    $solicitacao_id = intval($_POST['solicitacao_id']);
    $usuario_solicitante_id = intval($_POST['usuario_solicitante_id']);

    if ($acao === 'aceitar') {
        // Atualizar o status da solicitação original para 'aceito'
        $sql_aceitar = "UPDATE amizades SET status = 'aceito' WHERE id = ?";
        $stmt = mysqli_prepare($conexao, $sql_aceitar);
        mysqli_stmt_bind_param($stmt, "i", $solicitacao_id);
        if (mysqli_stmt_execute($stmt)) {
            // Criar um registro de amizade no sentido inverso
            $sql_inserir = "INSERT INTO amizades (usuario_id, amigo_id, status) VALUES (?, ?, 'aceito')";
            $stmt_inserir = mysqli_prepare($conexao, $sql_inserir);
            mysqli_stmt_bind_param($stmt_inserir, "ii", $usuario_id, $usuario_solicitante_id);
            mysqli_stmt_execute($stmt_inserir);
            mysqli_stmt_close($stmt_inserir);

            echo "<p>Solicitação de amizade aceita!</p>";
        } else {
            echo "<p>Erro ao aceitar solicitação.</p>";
        }
        mysqli_stmt_close($stmt);
    } elseif ($acao === 'recusar') {
        $sql_recusar = "DELETE FROM amizades WHERE id = ?";
        $stmt = mysqli_prepare($conexao, $sql_recusar);
        mysqli_stmt_bind_param($stmt, "i", $solicitacao_id);
        if (mysqli_stmt_execute($stmt)) {
            echo "<p>Solicitação de amizade recusada!</p>";
        } else {
            echo "<p>Erro ao recusar solicitação.</p>";
        }
        mysqli_stmt_close($stmt);
    }

    // Redirecionar para evitar reenvio do formulário
    header("Location: index.php?pg=amizades/amizade");
    exit();
}

mysqli_close($conexao);
?>