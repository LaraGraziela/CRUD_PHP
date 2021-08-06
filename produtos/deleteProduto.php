<?php  
    $id = $_GET['id'];

    include_once('../conexao.php');

    $sql = "DELETE FROM produtos WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        session_start();
        $_SESSION['feedback'] = '
        <div class="alert alert-success alert-dismissible fade show">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <strong>Sucesso!</strong> Cliente deletado!
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