<?php
    $id = $_GET['id'];

    include_once('../conexao.php');
    session_start();

    $sql = "SELECT * FROM pedidos WHERE id = '$id'";
    $result = $conn->query($sql);
    
    if ($result->num_rows > 0) {
      
      $array = [];
      while($row = $result->fetch_assoc()) {
        array_push($array, $row);
        
      }

      $_SESSION['inputUpdate'] = $array;
      
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
    <title>Editar Pedido
    </title>
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
    <div class="row">
        
        <div class="col-sm-2">

        </div>
        <div class="col-sm-8">
            <div class="box-cadastro">
            <h2>Editar Pedido:</h2>
                <form action="updatePedidos.php" method="POST" class="was-validated">

                    <?php
                        foreach ($_SESSION['inputUpdate'] as $key => $value) 
                        {
                    ?>
                        <div class="form-group">
                            <h2>Edição de Pedido de Compra</h2>
                            <label for="ordem">Ordem do pedido:</label>
                            <input type="text" class="form-control" id="ordem" value="<?php echo $value['ordem'];?>" name="ordem" required>
                        </div>
                        <div class="form-group">
                            <label for="valor">Valor do pedido:</label>
                            <input type="text" class="form-control" id="valor" value="<?php echo $value['valor'];?>" name="valor" required>
                        </div>
                        <div class="form-group">
                            <label for="produto_id">ID do produto:</label>
                            <input type="number" class="form-control" id="produto_id" value="<?php echo $value['produto_id'];?>" name="produto_id" required>
                        </div>
                        <div class="form-group">
                            <label for="status">Status: (Aberto, Pago, Cancelado)</label>
                            <input type="text" class="form-control" id="status" value="<?php echo $value['status'];?>" name="status" required>
                        </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <?php
                        }
                    ?>

                        <button type="submit" class="btn btn-primary">Atualizar Pedido</button>
                </form>
            </div>
        </div>
        <div class="col-sm-2">

        </div>
    </div><br><br><br><br>

</body>    
</html>