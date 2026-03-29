<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $i = (int) tratar_dado($_POST["linha"]);

    // Lê todas as linhas do arquivo em array
    $linhas = file("pergunta.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (isset($linhas[$i])) {
        $pergunta = $linhas[$i];
        $valores = explode(";", $pergunta);

        // Atenção: no adicionarMultipla.php você salvou como
        // pergunta ; tipo ; a ; b ; c ; d ; e ; correta
        $titulo  = trim($valores[0]);
        $tipo    = trim($valores[1]);
        $a       = trim($valores[2]);
        $b       = trim($valores[3]);
        $c       = trim($valores[4]);
        $d       = trim($valores[5]);
        $e       = trim($valores[6]);
        $correta = trim($valores[7]); // para checar depois
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
  <title>Responder Múltipla</title>
</head>
<body style="margin: 20px">
  <h1>Responda a pergunta:</h1>
  <h3><?php ($titulo ?? "Nenhuma pergunta carregada."); ?></h3>

  <div class="col-md-6">
    <form action="responderMultipla.php" method="POST">
      <input type="hidden" name="titulo" value="<?php echo $titulo; ?>">

      <div class="form-group">
        <p><input type="radio" name="resposta" value="A"> A <?php echo ($a ?? ""); ?></p>
        <p><input type="radio" name="resposta" value="B"> B <?php echo ($b ?? ""); ?></p>
        <p><input type="radio" name="resposta" value="C"> C <?php echo ($c ?? ""); ?></p>
        <p><input type="radio" name="resposta" value="D"> D <?php echo ($d ?? ""); ?></p>
        <p><input type="radio" name="resposta" value="E"> E <?php echo ($e ?? ""); ?></p>
      </div>

      <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>
</body>
</html>
