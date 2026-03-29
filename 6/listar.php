<?php
header('Content-Type: application/json; charset=utf-8');
require 'db.php';
$stmt = $pdo->query('SELECT id,nome,cpf,matricula FROM alunos ORDER BY id DESC');
$rows = $stmt->fetchAll();
echo json_encode($rows, JSON_UNESCAPED_UNICODE);
?>
