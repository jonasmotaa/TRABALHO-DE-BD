
<?php
    include_once('config.php');
    $result = mysqli_query($conexao, "SELECT * FROM usuarios ORDER BY idusuarios DESC");


    if(!empty($_GET['search']))
    {
        $data = $_GET['search'];
        $sql = "SELECT *
        FROM usuarios
        INNER JOIN carro ON idusuarios = idcarro
        WHERE nome LIKE '%$data%' or cpf LIKE '%$data%'
        ORDER BY idusuarios DESC";
    
    }
    else
    {
        $sql = "SELECT idusuarios, nome, cpf, telefone, endereço, placa, genero, estacionado, dia
        FROM usuarios 
        INNER JOIN carro ON idusuarios = idcarro
        ORDER BY idusuarios DESC";
    }
    $result = $conexao->query($sql);



?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesquisar</title>
    <link rel="shortcut icon" href="assets/icon.ico" type="image/x-icon">
    <style>
    .pesquisa{
        text-align: center;
    }
    .table{
        border-spacing:25px 0;
        padding:20px;
    margin-left: auto;
    margin-right: auto;
    }
   
    </style>
</head>
<header>
    <div class="center">
        <a href="home.html"><img src="assets/logo epark2.png" class="media-object  img-responsive img-thumbnail"></a>
                
            </div>
</header>
<body>
    <div class="pesquisa">
    <input type="search" class="form-control w-25" placeholder="Pesquisar" id="pesquisar">       
    <button onclick = "searchData()" class="btn btn-primary">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001q.044.06.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1 1 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0"/>
            </svg>
        </button>

    </div>

    
    <table class = "table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Telefone</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Placa</th>
                    <th scope="col">Gênero</th>
                    <th scope="col">Estacionado</th>
                    <th scope="col">Dia</th>

                </tr>    
            </thead>
            <tbody>
            <?php 
            while($user_data = mysqli_fetch_assoc($result)){
                echo"<tr>"; 
                echo"<td>" .$user_data['idusuarios']. "</td>";
                echo"<td>" .$user_data['nome']. "</td>";
                echo"<td>" .$user_data['cpf']. "</td>";
                echo"<td>" .$user_data['telefone']. "</td>";
                echo"<td>" .$user_data['endereço']. "</td>";
                echo"<td>" .$user_data['placa']. "</td>";

                
                echo"<td>" .$user_data['genero']. "</td>";
                if($user_data['estacionado'] == 1){
                   $sim = 'Sim';
                   
                    echo"<td>" .$sim. "</td>";
   
                   }else{
                    $nao = 'Não';
                    echo"<td>" .$nao. "</td>";
   
                   }      
                
               echo"<td>" .$user_data['dia']. "</td>";


            }

            ?>
            </tbody>
        </table>

</body>

<<script>
    var search = document.getElementById('pesquisar');

    search.addEventListener("keydown", function(event) {
        if (event.key === "Enter") 
        {
            searchData();
        }
    });

    function searchData()
    {
        window.location = 'pesquisar.php?search='+search.value;
    }
</script>

</html>