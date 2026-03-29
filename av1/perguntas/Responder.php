<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        $titulo = tratar_dado($_POST["titulo"]);
        $resposta = tratar_dado($_POST["resposta"]);

        $file = fopen("respostas.txt",'a');
        fwrite($file, "$titulo; $resposta \n");
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
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Resposta</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="card shadow-sm">
            <div class="card-body text-center">
                <h3>Resposta salva!</h3>
                <a href="Objetiva.php" class="btn btn-primary mt-3">Voltar</a>
            </div>
        </div>
    </div>
</body>
</html>
