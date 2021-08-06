<?php


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>SG2</title>
</head>

<style>
    .box-cadastro{
        margin-top: 30px;
        box-shadow: 1px 1px 10px 1px gray;
        padding: 30px;
        border-radius: 5px;
        text-align: center;
    }
</style>
<body>
    <nav class="navbar navbar-expand-sm bg-light">
      
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="./clientes/clientes.php">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./produtos/produtos.php">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="./pedidos/pedidos.php">Pedidos de Compra</a>
        </li>
        </ul>
    </nav>

    <div class="row">
        
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
            <div class="box-cadastro">
                <h2>Welcome to SG2 CRUD!</h2>
                <p>Selecione no menu do topo o CRUD de sua escolha para navegar.</p>
            </div>
        </div>
        <div class="col-sm-2">

        </div>
    </div>
</body>
</html>