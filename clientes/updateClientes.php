<?php
    include_once('../conexao.php');
    
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];

    $sql = "UPDATE clientes SET nome='$nome', email='$email', cpf='$cpf'
    WHERE id='$id'";
    
    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['feedback'] = '
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sucesso!</strong> Atualização realizada!
        </div>';    
        header('Location: clientes.php');
        } else {
    
        session_start();
        $_SESSION['feedback'] = '
        <div class="alert alert-danger alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Erro!</strong> Error: ' . $sql . '<br>' . $conn->error.'
        </div>';
        header('Location: clientes.php');
        };

    $conn->close();
?>