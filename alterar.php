<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $linhaNum = $_POST["linha"];
    $linhas = file("dados.txt"); 

    $dados = explode(";", trim($linhas[$linhaNum]));

    $nome = $dados[0];
    $sigla = $dados[1];
    $carga = $dados[2];
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Alterar Registro</title>
</head>
<body>
    <h2>Alterar Registro</h2>
    <form action="salvar.php" method="POST">
        <input type="hidden" name="linha" value="<?php echo $linhaNum; ?>">
        <input type="text" name="nome" value="<?php echo $nome; ?>">
        <input type="text" name="sigla" value="<?php echo $sigla; ?>">
        <input type="number" name="carga" value="<?php echo $carga; ?>">
        <input type="submit" value="Salvar Alteração">
    </form>
</body>
</html>
