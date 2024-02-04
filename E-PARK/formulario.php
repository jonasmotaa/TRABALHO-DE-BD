<?php
include_once('config.php');
if(isset($_POST['cadastrar']))
{
    

    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $telefone = $_POST['telefone'];
    $endereço = $_POST['endereço'];
    $placa = $_POST['placa'];
    $genero = $_POST['genero'];

    $result = mysqli_query($conexao, "INSERT INTO usuarios(nome, cpf, telefone, endereço, genero)
    VALUES ('$nome', '$cpf', '$telefone', '$endereço','$genero')");

  //  $row =  mysqli_query($conexao, "SELECT * FROM usuarios order by idusuarios desc limit 1");
   // $id = mysqli_fetch_assoc($row);

    $result2 = mysqli_query($conexao, "INSERT INTO carro(idcarro, placa, estacionado)
    VALUES (LAST_INSERT_ID(),'$placa', 0)");
    
  //  $result2 = mysqli_query($conexao, "SET foreign_key_checks = 1");

}   
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="assets/icon.ico" type="image/x-icon">
    <title>Formulário E-Park</title>
    <style>
                @import url('https://fonts.googleapis.com/css2?family=Raleway:wght@100;700&family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap');

        body{
            border: 300px;
                font-family:Verdana, Geneva, Tahoma, sans-serif;   
                text-align: center;     
            }

        .formulario{
            font-family:Verdana, Geneva, Tahoma, sans-serif;    
            
            text-align: center;
        }

    </style>
    <link href = "css/style.css" rel = "stylesheet"/>
</head>
<body>
    
    <header>
    <div class="center">
    <a href="home.html"><img src="assets/logo epark2.png" class="media-object  img-responsive img-thumbnail"></a>
            
        </div>
    </header> 
    
<br \>
    <h1>Formulário do cliente</h1>
<form action = "formulario.php" method = "POST">
    <div class="formulario">
        
        <br \>
        <label for = "nome">NOME: </label>
        <br \>
        <input type = "text" name = "nome" placeholder= "Digite o nome do cliente" id = "nome" class = "input" required>
        <br \>
        <br \>
        <label for = "cpf">CPF: </label>
        <br \>
        <input type="number" name = "cpf" placeholder= "Digite o CPF do cliente" id = "cpf" class = "input" required>
        <br \>
        <br \>
        <label for = "endereço">ENDEREÇO: </label>
        <br \>
        <input type = "text" name = "endereço" placeholder= "Digite o endereço do cliente" id = "endereço" class = "input" required>
        <br \>
        <br \>
        <label for = "telefone">TELEFONE: </label>
        <br \>
        <input type = "number" name = "telefone" placeholder= "Digite o telefone do cliente" id = "telefone" class = "input" required>
        <br \>
        <br \>
        <label for = "placa">PLACA: </label>
        <br \>
        <input type = "text" name = "placa" placeholder= "Digite a placa do cliente" id = "placa" class = "input" required>
        <br \>
        <br \>
        <p>GÊNERO:</p>
        <br \>
            <input type = "radio" name = "genero" id = "Masculino" value = "Masculino" required>
            <label for = "Masculino">Masculino </label>
            <input type = "radio" name = "genero" id = "Feminino" value = "Feminino" required>
            <label for = "Feminino">Feminino </label>
            <input type = "radio" name = "genero" id = "Outro" value = "Outro" required>
            <label for = "Outro">Outro </label>
        <br \>
        <br \>
        <button class ="btn1" type ="submit" name = cadastrar id = "cadastrar">CADASTRAR</button>
        
    </div>
</form>

</body>
</html>