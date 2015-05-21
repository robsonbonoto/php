Para a execução dos códigos fonte, basta adicionar as pastas no diretório em que o PHP possa interpretar e acessar o "index.php".
Ex:
http://localhost/exercicio2/index.php.

Exercício 1: 
A saída encontrada é a proposta no enunciado.

Exercício 2:
Apenas refatoração do código apresentado.

Exercício 3:
Apenas refatoração do código apresentado.

Exercício 4:
Foram implementados os métodos de inserção, edição, exclusão e busca das tarefas.

Segue o código da criação da Tabela Tarefa:
CREATE TABLE `exercicio4`.`tarefa` (
  `tarefa_id` INT NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(50) NOT NULL,
  `descricao` VARCHAR(200) NOT NULL,
  `prioridade` INT NOT NULL,
  PRIMARY KEY (`tarefa_id`))
COMMENT = '	';

Dados para conexão devem ser:
HOST = "localhost";
USER = "root";
PASSWORD = "";

Para consumir o webservice, deve-se utilizar o seguinte código fonte:

<?php
    //inclusão
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
	
	//edição
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
	
	
	//exclusão
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






