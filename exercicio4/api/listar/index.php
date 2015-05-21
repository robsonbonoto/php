<?php

header("Content-Type:application/json");
include "../../autoload.php";

function resposta($status, $status_message, $data)
{
    header("HTTP/1.1 $status $status_message");

    $resposta['status'] = $status;
    $resposta['status_message'] = $status_message;
    $resposta['data'] = $data;

    $json_response = json_encode($resposta,1);
    print_r($json_response);
}    
  
try {
    $json = json_decode($_GET['dados']);
    
    $tarefa = new Tarefa();

    $tarefa->tarefa_id = $json->tarefa_id;
    
    $tarefa->listaTarefas();
    
    $result = "";
    $i = 0;
    while ($tarefa->fetchObject()) {
        $result[$i]["tarefa_id"] = $tarefa->tarefa_id;
        $result[$i]["titulo"] = $tarefa->titulo;
        $result[$i]["descricao"] = $tarefa->descricao;
        $result[$i]["prioridade"] = $tarefa->prioridade;
        $i++;
    }
    
    resposta("000", "Consulta realizada com sucesso.", $result);    
} catch (Exception $exc) {
    resposta("-000", "Erro ao realizar consulta.", $exc->getMessage());    
}
?>