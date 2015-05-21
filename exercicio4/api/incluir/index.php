<?php
include "../../autoload.php";
include "../../resposta.php";

header("Content-Type:application/json");

try {
    $json = json_decode($_GET['dados']);
    
    $tarefa = new Tarefa();

    $tarefa->tarefa_id = $json->tarefa_id;
    $tarefa->titulo = $json->titulo;
    $tarefa->descricao = $json->descricao;
    $tarefa->prioridade = $json->prioridade;

    $tarefa->conn->startTransaction();
    $tarefa->insereTarefa();
    $id = $tarefa->conn->insertId();
    $tarefa->conn->commit();
    
    resposta("100", "Tarefa inserida com sucesso.", $id);    
} catch (Exception $exc) {
    resposta("-100", "Erro ao inserir tarefa.", $exc->getMessage());    
}
?>

