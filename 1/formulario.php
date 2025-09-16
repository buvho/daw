<?php
$msg = "";
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga"];
    $arq = "dados.txt";
    if (!file_exists($arq)) {
        $aq = fopen($arq, "w") or die("erro ao abrir o arquivo");
        $linha = "nome;sigla;carga\n";
        fwrite($aq, $linha);
        fclose($aq);
    }
    $aq = fopen($arq, "a") or die("erro ao abrir o arquivo");
    $linha = "$nome;$sigla;$carga\n";
    fwrite($aq, $linha);
    fclose($aq);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="formulario.php" method="POST">
        <input type="text" name="nome" placeholder="nome">
        <input type="text" name="sigla" placeholder="sigla">
        <input type="number" name="carga" placeholder="carga horaria">
        <input type="submit" value="enviar">
    </form>
</body>
</html