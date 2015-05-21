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
    $tarefa->alteraTarefa();
    $tarefa->conn->commit();
    resposta("200", "Tarefa editada com sucesso.", $tarefa->tarefa_id);
    
} catch (Exception $exc) {
    $tarefa->conn->rollback();
    resposta("-200", "Erro ao editar tarefa.", $exc->getMessage());
}
?>



