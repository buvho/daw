<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $pergunta = tratar_dado($_POST["pergunta"]);
        $tipo = "Objetiva";
        $file = fopen("pergunta.txt",'a');
        fwrite($file,"$pergunta; $tipo");
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
    <title></title>
</head>
<body style="margin: 20px">
    <h1>Adicionar Pergunta</h1>
    <div class="col-md-6">
        <form action="adicionarObjetiva.php" method="POST">
        <div class="form-group">
            <label>Pergunta</label>
            <input type="text" class="form-control" name="pergunta" placeholder="Insira a pergunta">
        </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</div>
</body>
</html>