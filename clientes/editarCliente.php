<?php
    $id = $_GET['id'];

    include_once('../conexao.php');
    session_start();

    $sql = "SELECT * FROM clientes WHERE id = '$id'";
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
    <title>Editar Cliente</title>
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
            <h2>Editar Cliente:</h2>
                <form action="updateClientes.php" method="POST" class="was-validated">

                    <?php
                        foreach ($_SESSION['inputUpdate'] as $key => $value) 
                        {
                    ?>
                        <div class="form-group">
                                <label for="nome">Nome:</label>
                                <input type="text" class="form-control" id="nome" value="<?php echo $value['nome'];?>"  name="nome" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="email" class="form-control" id="email" value="<?php echo $value['email'];?>" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="cpf">CPF:</label>
                                <input type="text" class="form-control" id="cpf" value="<?php echo $value['cpf'];?>" name="cpf" required>
                        </div>
                                <input type="hidden" name="id" value="<?php echo $id; ?>">
                    <?php
                        }
                    ?>

                        <button type="submit" class="btn btn-primary">Atualizar Cliente</button>
                </form>
            </div>
        </div>
        <div class="col-sm-2">

        </div>
    </div><br><br><br><br>

</body>    
</html>