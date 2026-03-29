<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";

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

    if (empty($pergunta) || empty($a) || empty($b) || empty($correta)) {
        echo "Preencha todos os campos!";
        exit;
    }

  $conn = new mysqli($servidor,$username,$senha,$database);
    if ($conn->connect_error) {
       die("Conexao falhou, avise o administrador do sistema");
    }
    
    $comandoSQL = "INSERT INTO `Perguntas_Multiplas` (`pergunta`, `a`, `b`, `c`, `d`, `e`, `correta`) 
    VALUES ('" . $pergunta . "', '" . $a . "', '" . $b . "', '" . $c . "', '" . $d . "', '" . $e . "', '" . $correta . "')";

    $resultado = $conn->query($comandoSQL);
        
    if ($resultado){
        echo ("adicionado com sucesso");
    } else {
        echo ("algo erro correu");
    }
}
?>
