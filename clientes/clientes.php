<?php
    include_once("../conexao.php");
    session_start();

    $sql = "SELECT * FROM clientes";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $array = [];
      while($row = $result->fetch_assoc()) {
        array_push($array, $row);
        
      }

      $_SESSION['listaClientes'] = $array;
      
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
    <title>Cadastro de Clientes</title>
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
            <a class="nav-link" href="#">Clientes</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="../produtos/produtos.php">Produtos</a>
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
            <h2>Cadastrar novo cliente:</h2>
                <form action="cadastroCliente.php" method="POST" class="was-validated">
                        <div class="form-group">
                            <label for="nome">Nome:</label>
                            <input type="text" class="form-control" id="nome" placeholder="Digite o nome do cliente" name="nome" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email:</label>
                            <input type="email" class="form-control" id="email" placeholder="Digite o email do cliente" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="cpf">CPF:</label>
                            <input type="text" class="form-control" id="cpf" placeholder="Digite o CPF do cliente" name="cpf" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
                </form>
            </div>
        </div>
        <div class="col-sm-2">

        </div>
    </div><br><br><br><br>

    <div class="row">
        <div class="col-sm-12">
            <div class="container">
                <h2>Clientes cadastrados:</h2>
                <p>Clientes que foram cadastrados no banco de dados: </p>            
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>CPF</th>
                        <th>Editar/Deletar</th>
                    </tr>
                    </thead>    
                    <tbody>
                    <?php
                        foreach ($_SESSION['listaClientes'] as $key => $value) {
                            echo '<tr>
                                    <td>'.$value['nome'].'</td>
                                    <td>'.$value['email'].'</td>
                                    <td>'.$value['cpf'].'</td>
                                    <td>
                                        <a href="editarCliente.php?id='.$value['id'].'" class="btn btn-warning">Editar</a>
                                        <a href="deleteCliente.php?id='.$value['id'].'" class="btn btn-danger">Deletar</a>
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