<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $linhaNum = $_POST["linha"];
    $nome = $_POST["nome"];
    $sigla = $_POST["sigla"];
    $carga = $_POST["carga"];

    $linhas = file("dados.txt");
    $linhas[$linhaNum] = "$nome;$sigla;$carga\n";

    file_put_contents("dados.txt", implode("", $linhas));

    header("Location: exibir.php");
    exit;
}
?>
