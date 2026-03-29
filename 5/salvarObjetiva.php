<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    function tratar_dado($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $pergunta = tratar_dado($_POST["pergunta"] ?? "");

    if (empty($pergunta)) {
        echo "o campo pergunta é obrigatório!";
        exit;
    }

    $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       echo("Conexao falhou, avise o administrador do sistema");
       exit;
    }
    
    $comandoSQL = "INSERT INTO `Perguntas_Objetivas`(`pergunta`) VALUES ('" . $pergunta . "') ";
        $resultado = $conn->query($comandoSQL);
            
    if ($resultado){
        echo ("adicionado com sucesso");
    } else {
        echo ("algo erro correu");
    }
}
?>
