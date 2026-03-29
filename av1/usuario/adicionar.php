<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $nome = tratar_dado($_POST["nome"]);
        $email = tratar_dado($_POST["email"]);
        $senha = tratar_dado($_POST["senha"]);

        $file = fopen("usuarios.txt",'a');
        fwrite($file,"$nome; $email: $senha");
        fclose($file);
    }
    function tratar_dado($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
    }  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="margin: 20px">
    <h1>Cadastrar Usuário</h1>
    <div class="col-md-6">
        <form action="adicionar.php" method="POST">
        <div class="form-group">
            <label>Nome</label>
            <input type="text" class="form-control" name="nome" placeholder="Nome">
        </div>
            <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" placeholder="Email">
        </div>
            <div class="form-group">
            <label>Senha</label>
            <input type="password" class="form-control" name="senha" placeholder="Senha">
    </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</body>
</html>