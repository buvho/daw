<?php
header('Content-Type: application/json; charset=utf-8');
require 'db.php';
$input = json_decode(file_get_contents('php://input'), true);
if(!is_array($input)){
  echo json_encode(['success'=>false,'error'=>'dados invalidos']);
  exit;
}
$nome = isset($input['nome']) ? trim($input['nome']) : '';
$cpf = isset($input['cpf']) ? trim($input['cpf']) : '';
$matricula = isset($input['matricula']) ? trim($input['matricula']) : '';
if(!preg_match('/^[\p{L}\s]+$/u',$nome)){
  echo json_encode(['success'=>false,'error'=>'nome invalido']);
  exit;
}
if(!filter_var($cpf, FILTER_VALIDATE_EMAIL)){
  echo json_encode(['success'=>false,'error'=>'email invalido']);
  exit;
}
if(!ctype_digit($matricula)){
  echo json_encode(['success'=>false,'error'=>'matricula invalida']);
  exit;
}
$stmt = $pdo->prepare('INSERT INTO alunos (nome,cpf,matricula) VALUES (:nome,:cpf,:matricula)');
try{
  $stmt->execute([':nome'=>$nome,':cpf'=>$cpf,':matricula'=>$matricula]);
  echo json_encode(['success'=>true]);
}catch(PDOException $e){
  echo json_encode(['success'=>false,'error'=>'erro ao inserir']);
}
?>
