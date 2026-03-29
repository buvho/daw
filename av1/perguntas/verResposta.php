<?php
if (isset($_GET["id"])) {
    $id = (int) $_GET["id"];

    $perguntas = file("pergunta.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    if (isset($perguntas[$id])) {
        $linhaPergunta = $perguntas[$id];
        $valores = explode(";", $linhaPergunta);
        $titulo = $valores[0];

        $respostas = file("respostas.txt", FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

        $respostasFiltradas = [];
        foreach ($respostas as $resp) {
            $partes = explode(";", $resp, 2);
            if ($partes[0] === $titulo) {
                $respostasFiltradas[] = $partes[1] ?? "(sem conteúdo)";
            }
        }
    } else {
        $titulo = "Pergunta não encontrada";
        $respostasFiltradas = [];
    }
} else {
    $titulo = "Nenhuma pergunta selecionada";
    $respostasFiltradas = [];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" 
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" 
        crossorigin="anonymous">
  <title>Ver Respostas</title>
</head>
<body style="margin:20px">
  <h1>Respostas para: <span class="text-primary"><?php echo ($titulo); ?></span></h1>

  <?php if (!empty($respostasFiltradas)): ?>
    <ul class="list-group mt-3">
      <?php foreach ($respostasFiltradas as $r): ?>
        <li class="list-group-item"><?php echo ($r); ?></li>
      <?php endforeach; ?>
    </ul>
  <?php else: ?>
    <p class="text-muted mt-3">Nenhuma resposta encontrada.</p>
  <?php endif; ?>

</body>
</html>
