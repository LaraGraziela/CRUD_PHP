<?php
var_dump($_POST);
include_once ("../conexao.php");

$nome = $_POST['nome'];
$valor = $_POST['valor'];
$created_at = $_POST['created_at'];

$sql = "INSERT INTO produtos (nome, valor, created_at)
VALUES ('$nome', '$valor', '$created_at')";

if ($conn->query($sql) === TRUE) {

    session_start();
    $_SESSION['feedback'] = '
    <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Sucesso!</strong> Cadastro realizado!
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
    }

    $conn->close();


?>