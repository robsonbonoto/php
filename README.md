Para a execu��o dos c�digos fonte, basta adicionar as pastas no diret�rio em que o PHP possa interpretar e acessar o "index.php".
Ex:
http://localhost/exercicio2/index.php.

Exerc�cio 1: 
A sa�da encontrada � a proposta no enunciado.

Exerc�cio 2:
Apenas refatora��o do c�digo apresentado.

Exerc�cio 3:
Apenas refatora��o do c�digo apresentado.

Exerc�cio 4:
Foram implementados os m�todos de inser��o, edi��o, exclus�o e busca das tarefas.

Segue o c�digo da cria��o da Tabela Tarefa:
CREATE TABLE `exercicio4`.`tarefa` (
  `tarefa_id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(50) NOT NULL,
  `descricao` VARCHAR(200) NOT NULL,
  `prioridade` INT NOT NULL,
  PRIMARY KEY (`tarefa_id`))
COMMENT = '	';

Dados para conex�o devem ser:
HOST = "localhost";
USER = "root";
PASSWORD = "";

Para consumir o webservice, deve-se utilizar o seguinte c�digo fonte:

<?php
    //inclus�o
    $dados['tarefa_id'] = "";
    $dados['titulo'] = "titulo";
    $dados['descricao'] = "descricao";
    $dados['prioridade'] = "1";

    $data = json_encode($dados);
    
    $url = "http://localhost/exercicio4/api/incluir/?dados={$data}";
 
    $client = curl_init($url);
    
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
            
    $response = curl_exec($client);
    $result = json_decode($response);  
	
	//edi��o
	$dados['tarefa_id'] = "1";
    $dados['titulo'] = "tituloeditado";
    $dados['descricao'] = "descricaoeditada";
    $dados['prioridade'] = "0";

    $data = json_encode($dados);
    
    $url = "http://localhost/exercicio4/api/editar/?dados={$data}";
 
    $client = curl_init($url);
    
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
            
    $response = curl_exec($client);
    $result = json_decode($response);    
	
	
	//exclus�o
	$dados['tarefa_id'] = "1";
    
    $data = json_encode($dados);
    
    $url = "http://localhost/exercicio4/api/excluir/?dados={$data}";
 
    $client = curl_init($url);
    
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
            
    $response = curl_exec($client);
    $result = json_decode($response);    
	
	
	//listar
	$dados['tarefa_id'] = "";
    
    $data = json_encode($dados);
    
    $url = "http://localhost/exercicio4/api/listar/?dados={$data}";
 
    $client = curl_init($url);
    
    curl_setopt($client, CURLOPT_RETURNTRANSFER, 1);
            
    $response = curl_exec($client);
    $result = json_decode($response);    
?>






