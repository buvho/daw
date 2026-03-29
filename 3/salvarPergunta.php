<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    function tratar_dado($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $pergunta = tratar_dado($_POST["pergunta"] ?? "");
    $a = tratar_dado($_POST["a"] ?? "");
    $b = tratar_dado($_POST["b"] ?? "");
    $c = tratar_dado($_POST["c"] ?? "");
    $d = tratar_dado($_POST["d"] ?? "");
    $e = tratar_dado($_POST["e"] ?? "");
    $correta = tratar_dado($_POST["correta"] ?? "");
    $tipo = "multipla";

    if (empty($pergunta) || empty($a) || empty($b) || empty($correta)) {
        echo "Preencha todos os campos!";
        exit;
    }

    $linha = "\n$pergunta; $tipo; $a; $b; $c; $d; $e; $correta";
    $file = fopen("pergunta.txt", "a");
    fwrite($file, $linha);
    fclose($file);

    echo "Pergunta salva com sucesso!";
} else {
    echo "Método inválido!";
}
?>
