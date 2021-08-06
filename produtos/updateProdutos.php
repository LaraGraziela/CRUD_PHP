<?php
    include_once('../conexao.php');
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $valor = $_POST['valor'];
    $created_at = $_POST['created_at'];

    $sql = "UPDATE produtos SET nome='$nome', valor='$valor', created_at='$created_at'
    WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['feedback'] = '
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sucesso!</strong> Atualização realizada!
        </div>';    
        header('Location: produtos.php');
        } else {
    
        session_start();
        $_SESSION['feedback'] = '
        <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Erro!</strong> Error: ' . $sql . '<br>' . $conn->error.'
        </div>';
        header('Location: produtos.php');
        };

    $conn->close();
?>