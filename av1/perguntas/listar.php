
<?php
$linha = "";
$file = fopen("pergunta.txt","r");
$i = 0;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="d-flex p-3">
    <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">Pergunta</th>
      <th scope="col">Tipo</th>
      <th scope="col">Responder</th>
      <th scope="col">Ver Respostas</th>
    </tr>
</thead>
</tbody>
    <?php
        while (!feof($file)){
            $linha = fgets($file);
            $valores = explode(';',$linha);
            $pergunta = $valores[0];    
            $tipo = $valores[1];
            echo("<tr>
            <th> $pergunta </th>
            <th> $tipo </th>
            <th> <form action=\"$tipo.php\" method=\"POST\">
                <input type=\"hidden\" name=\"linha\" value=\"$i\">
                <button type=\"submit\" class=\"btn btn-primary\">Responder</button>
            </form></th>
            <th>
                <form action=\"verRespostas.php\" method=\"POST\">
                <input type=\"hidden\" name=\"linha\" value=\"$i\">
                <button type=\"submit\" class=\"btn btn-info\">Ver Respostas</button>
            </tr>");
            $i += 1;
        }
    ?>  
</tbody>
</table>
</div>
</body>
</html>