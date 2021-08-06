<?php
    var_dump($_POST);
    include_once ("../conexao.php");

    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $cpf = $_POST['cpf'];



    $sql = "INSERT INTO clientes (nome, email, cpf)
    VALUES ('$nome', '$email', '$cpf')";

    if ($conn->query($sql) === TRUE) {

    session_start();
    $_SESSION['feedback'] = '
    <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Sucesso!</strong> Cadastro realizado!
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
    }

    $conn->close();


    
?>