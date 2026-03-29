<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $i = (int) tratar_dado($_POST["linha"]);

    $linhas = file("pergunta.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (isset($linhas[$i])) {
        $pergunta = $linhas[$i];
        $valores = explode(";", $pergunta);
        $titulo = $valores[0];
    } else {
        $titulo = "Pergunta não encontrada";
    }
}

function tratar_dado($data) {
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
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous">
  <title>Document</title>
</head>
<body style="margin: 20px">
  <h1>Responda a pergunta:</h1>
  <h3><?php echo ($titulo ?? "Nenhuma pergunta carregada."); ?></h3>

  <div class="col-md-6">
    <form action="responderObjetiva.php" method="POST">
      <div class="form-group">
        <label>Resposta</label>
        <input type="hidden" name="titulo" value="<?php $titulo ?>">
        <input type="text" class="form-control" name="resposta" placeholder="Resposta">
      </div>
      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</body>
</html>
