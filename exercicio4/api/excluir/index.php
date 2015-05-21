<?php
include "../../autoload.php";
include "../../resposta.php";

header("Content-Type:application/json");

try {

    $json = json_decode($_GET['dados']);

    $tarefa = new Tarefa();
    
    $tarefa->tarefa_id = $json->tarefa_id;

    $tarefa->conn->startTransaction();
    $tarefa->excluiTarefa();
    $tarefa->conn->commit();
    resposta("300", "Tarefa excluída com sucesso.", $tarefa->tarefa_id);
    
} catch (Exception $exc) {
    $tarefa->conn->rollback();
    resposta("-300", "Erro ao excluir tarefa.", $exc->getMessage());
}
?>



