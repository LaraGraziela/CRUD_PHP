<?php
    include_once('../conexao.php');
    
    $id = $_POST['id'];
    $ordem = $_POST['ordem'];
    $valor = $_POST['valor'];
    $produto_id = $_POST['produto_id'];
    $status = $_POST['status'];

    $sql = "UPDATE pedidos SET ordem='$ordem', valor='$valor', produto_id='$produto_id', status = '$status'
    WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['feedback'] = '
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sucesso!</strong> Atualização realizada!
        </div>';    
        header('Location: pedidos.php');
        } else {
    
        session_start();
        $_SESSION['feedback'] = '
        <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Erro!</strong> Error: ' . $sql . '<br>' . $conn->error.'
        </div>';
        header('Location: pedidos.php');
        };

    $conn->close();
?>