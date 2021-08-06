<?php
    include_once("../conexao.php");
    session_start();

    $sql = "SELECT * FROM pedidos";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $array = [];
      while($row = $result->fetch_assoc()) {
        array_push($array, $row);
        
      }

      $_SESSION['listaPedidos'] = $array;
      
    } else {
      echo "0 results";
    }
    $conn->close();

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
    <title>Cadastro de Pedidos</title>
</head>

<style>
    .box-cadastro{
        margin-top: 30px;
        box-shadow: 1px 1px 10px 1px gray;
        padding: 30px;
        border-radius: 5px;
    }
</style>
<body>
    <nav class="navbar navbar-expand-sm bg-light">
      
        <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" href="../clientes/clientes.php">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../produtos/produtos.php">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Pedidos de Compra</a>
        </li>
        </ul>
    </nav>

    <?php
            echo $_SESSION['feedback'];
            $_SESSION['feedback'] = '';
    ?>

    <div class="row">
        
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
            <div class="box-cadastro">
                <form action="cadastroPedidos.php" method="POST" class="was-validated">
                    <div class="form-group">
                        <h2>Cadastro de Pedido de Compra</h2>
                        <label for="ordem">Ordem do pedido:</label>
                        <input type="text" class="form-control" id="ordem" placeholder="Digite a ordem do pedido" name="ordem" required>
                    </div>
                    <div class="form-group">
                        <label for="valor">Valor do pedido:</label>
                        <input type="text" class="form-control" id="valor" placeholder="Digite o valor do pedido no formato: R$XXX,XX" name="valor" required>
                    </div>
                    <div class="form-group">
                        <label for="produto_id">ID do produto:</label>
                        <input type="number" class="form-control" id="produto_id" placeholder="Digite o id do produto" name="produto_id" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Cadastrar Pedido</button>
                </form>
            </div>
        </div>
        <div class="col-sm-2">

        </div>
        
    </div><br><br><br><br>
    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <h2>Pedidos cadastrados:</h2>
                <p>Pedidos que foram cadastrados no banco de dados: </p>            
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Ordem do pedido</th>
                        <th>Valor</th>
                        <th>ID do Produto</th>
                        <th>Status</th>
                        <th>Editar/Deletar</th>
                    </tr>
                    </thead>    
                    <tbody>
                    <?php
                        foreach ($_SESSION['listaPedidos'] as $key => $value) {
                            echo '<tr>
                                    <td>'.$value['ordem'].'</td>
                                    <td>'.$value['valor'].'</td>
                                    <td>'.$value['produto_id'].'</td>
                                    <td>'.$value['status'].'</td>
                                    <td>
                                        <a href="editarPedido.php?id='.$value['id'].'" class="btn btn-warning">Editar</a>
                                        <a href="deletePedido.php?id='.$value['id'].'" class="btn btn-danger">Deletar</a>
                                    </td>
                                  </tr>';
                        }

                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>