<?php

    include('protect.php');
    include('conec.php');

    date_default_timezone_set('UTC');   
            
?>

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

    <img src="img/dashboard.jpg" id="img-dashboard">

    <header class="dashboard">
            <h1>Painel do administrador</h1>
            <a href="logout.php" class="logout">Sair</a>
    </header>

    <div class="search">
        <form action="" method="post">
            <input type="text" name="search"  id="" placeholder="Pesquise Cliente">
            <input type="submit" class="btn btn-warning" name="btnSearch" value="search">
        </form>
    </div>

    <div class="registro">

        <form action="" method="post">

            <input type="text" name="nomeClient" placeholder="Nome do Cliente">
            <input type="submit" class="btn btn-warning" value="registrar" name="registrar">
            <?php 
            
                if (isset($_POST['registrar'])) {

                    $nomeClient = $_POST['nomeClient'];
                    $qtdDias = 30;
            
                    $hoje = date('Y-m-d');
                    $pagamento = date('Y-m-d', strtotime("+{$qtdDias} days",strtotime($hoje)));
            
                    $add = "insert into cliente(nomeClient,ProxPagamento,UltPagamento)values('$nomeClient','$pagamento','$hoje')";
                    $resulAdd = $mysqli->query($add) or die($mysqli->error);
                    
                    header('location:dashboard.php');
                }

            ?>
        </form>

    </div>

    <div class="table-centro">
        <table class="table table-bordered border-dark">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Prox Pagamento</th>
                <th scope="col">Ultimo pagamento</th>
                <th scope="col">Pagar</th>
                <th scope="col">Excluir</th>
                </tr>
            </thead>
            <?php while($dado = $con->fetch_array()) { ?>
            <tbody>
                <form action="" method="POST">
                <tr>
                <th scope="row"><?php echo $dado['id']; ?><input type="hidden" name="id" value="<?php echo $dado['id']; ?>"></th>
                <td><?php echo $dado['nomeClient']; ?></td>
                <td><?php echo $dado['ProxPagamento']; ?></td>
                <td><?php echo $dado['UltPagamento']; ?></td>
                <td><input type="submit"  class="btn btn-dark" value="pagar" name="pagar"></td>
                <td><input type="submit" class="btn btn-danger" value="Excluir" name="excluir"></td>
                </form>
            </tbody>
            <?php } ?>
        </table>
    </div>

</body>
</html>