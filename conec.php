<?php

    $host = 'localhost';
    $dbname = 'academia';
    $user = 'root';
    $pass = '';

    $mysqli = new mysqli($host, $user, $pass, $dbname);

    if($mysqli->error){
        die("Falha ao conectar com o banco de dados:" . $mysqli->error);
    }

    $consulta = "SELECT * FROM cliente"; 
    $con = $mysqli->query($consulta) or die($mysqli->error);

    date_default_timezone_set('UTC');   
            
                        
    if (isset($_POST['pagar'])) {

        $qtdDias = 30;

        $idclient = $_POST['id'];

        $hoje = date('Y-m-d');
        $pagamento = date('Y-m-d', strtotime("+{$qtdDias} days",strtotime($hoje)));
        
        $query = "UPDATE cliente set UltPagamento = '$hoje' where id = '$idclient'";
        $resultadoQuery = $mysqli->query($query) or die($mysqli->error);

        $query1 = "UPDATE cliente set ProxPagamento = '$pagamento' where id = '$idclient'";
        $resultadoQuery1 = $mysqli->query($query1) or die($mysqli->error);
    } 


    if (isset($_POST['excluir'])) {
        
        $id = $_POST['id'];
        $delete = "DELETE from cliente where id = '$id'";
        $resuldelet = $mysqli->query($delete) or die($mysqli->error);

        header('location:dashboard.php');
    }

    if (isset($_POST['btnSearch'])) {

        $nomeCliente = $_POST['search'];
        $search = "SELECT * from cliente where nomeClient like '%$nomeCliente%'";
        $con = $mysqli->query($search) or die($mysqli->error);

    }

    
?>