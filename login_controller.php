<?php

    include('conec.php');

    if (isset($_POST['login']) || isset($_POST['senha'])) {
        if (strlen($_POST['login']) == 0) {
           echo"Preencha seu Login";
        }elseif (strlen($_POST['senha']) == 0) {
            echo "Preencha sua senha";
        }else {
            $login = $mysqli->real_escape_string($_POST['login']);
            $senha = $mysqli->real_escape_string($_POST['senha']);

            $sql = "SELECT * FROM user WHERE nome = '$login' AND senha = '$senha'";
            $sql_query = $mysqli->query($sql) or die("Falha na execução do código SQL: " . $mysqli->error);

            $quantidade = $sql_query->num_rows;

            if ($quantidade == 1) {

                $usuario = $sql_query->fetch_assoc();

                if (!isset($_SESSION)) {
                    session_start();
                }

                $_SESSION['login'] = $usuario['nome'];
                
                header("Location: dashboard.php");

            }else{
                echo "Falha ao logar! Login ou senha incorretos";
            }
  
        }
    }

?>

