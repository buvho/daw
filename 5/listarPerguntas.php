<?php
$servidor = "localhost";
$username = "root";
$senha = "";
$database = "faeterj3dawmanha";

header("Content-Type: application/json; charset=utf-8");

$conn = new mysqli($servidor, $username, $senha, $database);
if ($conn->connect_error) {
    echo json_encode(["erro" => "Falha na conexão ao banco"]);
    exit;
}

$sqlMultipla = "SELECT id, pergunta, 'multipla' AS tipo FROM Perguntas_Multiplas";
$sqlObjetiva = "SELECT id, pergunta, 'objetiva' AS tipo FROM Perguntas_Objetivas";

$lista = [];

$result1 = $conn->query($sqlMultipla);
if ($result1 && $result1->num_rows > 0) {
    while ($row = $result1->fetch_assoc()) {
        $lista[] = $row;
    }
}

$result2 = $conn->query($sqlObjetiva);
if ($result2 && $result2->num_rows > 0) {
    while ($row = $result2->fetch_assoc()) {
        $lista[] = $row;
    }
}

echo json_encode($lista);
?>
