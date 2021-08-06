<?php
    include_once ("../conexao.php");
    session_start();

    $sql = "SELECT * FROM produtos";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $array = [];
      while($row = $result->fetch_assoc()) {
        array_push($array, $row);
        
      }

      $_SESSION['listaProdutos'] = $array;
      
    } else {
      echo "0 results";
    }
    $conn->close();


    //$_SESSION['listaProdutos'] = $row;

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
            <a class="nav-link" href="#">Produtos</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../pedidos/pedidos.php">Pedidos de Compra</a>
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
            <h2>Cadastrar produto:</h2>
                <form action="cadastroProduto.php" method="POST" class="was-validated">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" placeholder="Digite o nome do produto" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor:</label>
                            <input type="text" class="form-control" id="valor" placeholder="Digite o valor do produto" name="valor" required>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Data atual:</label>
                            <input type="date" class="form-control" id="created_at" name="created_at" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar Produto</button>
                </form>
            </div>
        </div>
        <div class="col-sm-2">

        </div>
    </div><br><br><br><br>

    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <h2>Produtos cadastrados:</h2>
                <p>Produtos que foram cadastrados no banco de dados: </p>            
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Valor</th>
                        <th>Criado em (yyyy/mm/dd)</th>
                        <th>Editar/Deletar</th>
                    </tr>
                    </thead>    
                    <tbody>
                        <?php
                            foreach ($_SESSION['listaProdutos'] as $key => $value) {
                                echo '<tr> 
                                           <td>'.$value['nome'].'</td>
                                           <td>'.$value['valor'].'</td>
                                           <td>'.$value['created_at'].'</td>
                                           <td>
                                           <a href="editarProduto.php?id='.$value['id'].'" class="btn btn-warning">Editar</a>
                                           <a href="deleteProduto.php?id='.$value['id'].'" class="btn btn-danger">Deletar</a>
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