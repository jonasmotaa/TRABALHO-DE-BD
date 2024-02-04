<?php

if(isset($_POST['checkin']))
{
    include_once('config.php');

    $id= $_POST['idcheckin'];
    $hoje = date('Y/m/d');

  
    $result = mysqli_query($conexao, "SELECT * FROM carro WHERE idcarro = $id AND estacionado = 0");

    if($result->num_rows > 0 ){
     
        $SqlUpdate = mysqli_query($conexao, "UPDATE carro SET estacionado = 1 , dia = '$hoje'
        WHERE idcarro = $id");
        print_r("Check-in realizado com sucesso.");
    }else{
        print_r("ID inexistente ou carro já estacionado.");
    }

}
  
if(isset($_POST['checkout']))
{
    include_once('config.php');

    $id= $_POST['idcheckout'];
    $hoje = date('Y/m/d');
  
    $result = mysqli_query($conexao, "SELECT * FROM carro WHERE idcarro = $id AND estacionado = 1");

    if($result->num_rows > 0 ){
     
        $SqlUpdate = mysqli_query($conexao, "UPDATE carro SET estacionado = 0 , dia = '$hoje'
        WHERE idcarro = $id");
        print_r("Check-out realizado com sucesso.");
    }else{
        print_r("ID inexistente ou carro nao estacionado.");
    }

}
 
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/icon.ico" type="image/x-icon">
    <title>Check-in/Chek-out</title>
    <style>
        .check-in{
            font-family:Verdana, Geneva, Tahoma, sans-serif;    
            
            text-align: center;
        }
        .check-out{
            font-family:Verdana, Geneva, Tahoma, sans-serif;    
            
            text-align: center;
        }
    </style>
    <link href = "css/style.css" rel = "stylesheet"/>
</head>
<body>
    <header>
        <div class="center">
            <div class="logo"> 
             
                <a href="home.html"><img src="assets/logo epark2.png" class="media-object  img-responsive img-thumbnail"></a>
            </div>
            
        </div>
    </header>
    <form action = "check.php" method = "POST">
        <div class="check-in">
            <h1>CHECK IN</h1>
            <br \>
            <label for = "idcheckin">ID DO CLIENTE: </label>
            <br \>
            <input type ="number" name = "idcheckin" placeholder= "Digite o ID do cliente" id = "idcheckin" class = "input" required>
            <br \>
            <br \>

            <button class ="btn1" type ="submit" name = checkin id = "checkin">FAZER CHECK-IN</button>
            
        </div>
    </form>
    <br \>
    <br \>
    <form action = "check.php" method = "POST">
        <div class="check-out">
            <h1>CHECK OUT</h1>
            <br \>
            <label for = "idcheckout">ID DO CLIENTE: </label>
            <br \>
            <input type ="number" name = "idcheckout" placeholder= "Digite o ID do cliente" id = "idcheckout" class = "input" required>
            <br \>
            <br \>

            <button class ="btn1" type ="submit" name = checkout id = "checkout">FAZER CHECK-OUT</button>
            
        </div>
    </form>

</body>
</html>