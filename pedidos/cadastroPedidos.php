<?php
var_dump($_POST);
include_once ("../conexao.php");

$ordem = $_POST['ordem'];
$valor = $_POST['valor'];
$produto_id = $_POST['produto_id'];

$sql = "INSERT INTO pedidos (ordem, valor, produto_id)
VALUES ('$ordem', '$valor', '$produto_id')";

if ($conn->query($sql) === TRUE) {
    session_start();
    $_SESSION['feedback'] = '
    <div class="alert alert-success alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Sucesso!</strong> Cadastro de pedido realizado!
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
}

$conn->close();

?>