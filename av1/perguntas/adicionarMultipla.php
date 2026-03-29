<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $pergunta = tratar_dado($_POST["pergunta"]);
        $tipo = "multipla";
        $a = tratar_dado($_POST["a"]);
        $b = tratar_dado($_POST["b"]);
        $c = tratar_dado($_POST["c"]);
        $d = tratar_dado($_POST["d"]);
        $e = tratar_dado($_POST["e"]);
        $correta = tratar_dado($_POST["correta"]);

        $file = fopen("pergunta.txt",'a');
        fwrite($file,"\n $pergunta; $tipo; $a; $b; $c; $d; $e; $correta");
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
        <form action="adicionarMultipla.php" method="POST">
        <div class="form-group">
            <label>Pergunta</label>
            <input type="text" class="form-control" name="pergunta" placeholder="Insira a pergunta">
        </div>
        <div class="form-group">
            <label>opção A</label>
            <input type="text" class="form-control" name="a" placeholder="Insira a opção A">
        </div>
        <div class="form-group">
            <label>opção B</label>
            <input type="text" class="form-control" name="b" placeholder="Insira a opção B">
        </div>
        <div class="form-group">
            <label>opção C</label>
            <input type="text" class="form-control" name="c" placeholder="Insira a opção C">
        </div>
        <div class="form-group">
            <label>opção D</label>
            <input type="text" class="form-control" name="d" placeholder="Insira a opção D">
        </div>
        <div class="form-group">
            <label>opção E</label>
            <input type="text" class="form-control" name="e" placeholder="Insira a opção E">
        </div>
        <div class="form-group">
        <p>qual a resposta correta?</p>
        <input type="radio" name="correta" value="1"> A
        <input type="radio" name="correta" value="2"> B
        <input type="radio" name="correta" value="3"> C 
        <input type="radio" name="correta" value="4"> D
        <input type="radio" name="correta" value="5"> E
        <br>
        </div>
  <button type="submit" class="btn btn-primary">Enviar</button>
</form>
</body>
</html>