<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nome = tratar($_POST["nome"]);
        $cpf = tratar($_POST["cpf"]);
        $matricula = tratar($_POST["matricula"]);
        if(!preg_match('/\p{L}/',$nome)){
            echo "nome invalido";
            return;
        };
        if(!preg_match('/^[\w.-]+@[\w-]+\.[A-z]$/',$cpf)){
            echo "email invalido";
            return;
        };
        if(preg_match('/[^0-9]/',$matricula)){
            echo "matricula invalida";
            return;
        };
        $file = fopen("lista.txt","a");
        $line = "\n$nome;$cpf;$matricula";
        fwrite($file,$line);
        fclose($file);
        echo "valor adcionado!";
    };

    function tratar($data){
        $data = trim($data);
        $data = htmlspecialchars($data);
        return $data;
    }
?>

<!DOCTYPE html>
<html lang="pt">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <title>Document</title>
    </head>
    <body>
        <div class="container mt-5">
            <form action="inserir.php" method="POST">
                <div class="form-group">
                    <label for="nome">Nome</label>
                    <input type="text" class="form-control" id="nome" name="nome">
                </div>
                <div class="form-group">
                    <label for="cpf">email</label>
                    <input type="text" class="form-control" id="cpf" name="cpf">
                </div>
                <div class="form-group">
                    <label for="matricula">matricula</label>
                    <input type="text" class="form-control" id="matricula" name="matricula">
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div> 
    </body>
</html>