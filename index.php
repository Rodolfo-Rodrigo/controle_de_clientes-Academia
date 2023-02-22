<?php

    include('login_controller.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/style.css">

    <title>Academia</title>
</head>
<body>
    
   <img src="img/img-login.jpg" id="img-login" alt="">

   <div class="centro">
    <h1>Login</h1>
    <hr>
    <form action="login_controller" method="post">
        <div class="mb-3 ">
            <label for="login" class="form-label">Login</label>
            <input type="text" class="form-control" name="login" id="login" required>
        </div>
        <div class="mb-3">
            <label for="senha" class="form-label">Senha</label>
            <input type="password" class="form-control" name="senha" id="senha" required>
        </div>
        <button type="submit" value="entrar" class="btn btn-dark button mt-2">Entrar</button>
    </form>
   </div>

</body>
</html>