<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";

header("Content-Type: application/json; charset=utf-8");

$id = $_GET["id"] ?? "";
$tipo = $_GET["tipo"] ?? "";

if (!$id || !$tipo) {
    echo json_encode(["erro" => "ID ou tipo não enviados"]);
    exit;
}

$conn = new mysqli($servidor, $username, $senha, $database);
if ($conn->connect_error) {
    echo json_encode(["erro" => "Falha na conexão"]);
    exit;
}

if ($tipo === "objetiva") {
    $sql = "SELECT id, pergunta FROM Perguntas_Objetivas WHERE id = $id LIMIT 1";
} else {
    $sql = "SELECT id, pergunta, a, b, c, d, e FROM Perguntas_Multiplas WHERE id = $id LIMIT 1";
}

$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    echo json_encode($result->fetch_assoc());
} else {
    echo json_encode(["erro" => "Pergunta não encontrada"]);
}
?>
