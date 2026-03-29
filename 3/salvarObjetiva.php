<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    function tratar_dado($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $pergunta = tratar_dado($_POST["pergunta"] ?? "");
    $tipo = "Objetiva";

    if (empty($pergunta)) {
        echo "o campo pergunta é obrigatório!";
        exit;
    }

    $file = fopen("pergunta.txt", 'a');
    fwrite($file, "\n$pergunta; $tipo");
    fclose($file);

    echo "Pergunta objetiva salva com sucesso!";
} else {
    echo "Método inválido!";
}
?>
