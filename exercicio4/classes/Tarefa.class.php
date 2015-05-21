<?php

class Tarefa
{

    public $tarefa_id;
    public $titulo;
    public $descricao;
    public $prioridade;
    public $conn;
    public $result;
    public $rs;

    /**
     * Construtor, manda uma conexao especifica ou conectapor padrao na base da empresa
     *
     * @param Conexao [opcional] $conn
     */
    function Tarefa($conn = null)
    {

        if (!empty($conn)) {

            $this->conn = $conn;
        } else {

            $this->conn = new Conexao();
        }

        $objVar = get_class_vars(__CLASS__);
        unset($objVar['conn']);
        unset($objVar['result']);
        unset($objVar['rs']);

        foreach ($objVar as $atributo => $valor) {
            $this->{$atributo} = '';
        }
    }

    /**
     * Fetchobject interno da classe (muda o valor no objeto)
     *
     * @return boolean
     */
    function fetchObject()
    {

        if ($this->rs = $this->conn->fetchObjectRS($this->result)) {

            foreach (get_object_vars($this->rs) as $var => $value)
                $this->$var = $value;

            return true;
        } else
            return false;
    }

    /**
     * Adiciona registro da tabela tarefa
     * @return resulSet
     */
    public function insereTarefa()
    {

        $sql = "INSERT INTO tarefa 
                  (tarefa_id, titulo, descricao, prioridade) 
		VALUES 
		  ('{$this->tarefa_id}', '{$this->titulo}', '{$this->descricao}', {$this->prioridade})";

        $this->result = $this->conn->query($sql);
        
        if (!$this->result) {
            throw new Exception($this->conn->erro());
        }

        return $this->result;
    }

    
    /**
     * Altera uma tarefa
     * @return resulSet
     */
    public function alteraTarefa()
    {

        $sql = "UPDATE tarefa 
                   SET titulo = '{$this->titulo}' 
                     , descricao = '{$this->descricao}'   
                     , prioridade = {$this->prioridade}
                 WHERE tarefa_id = '{$this->tarefa_id}'";

        $this->result = $this->conn->query($sql);
        
        if (!$this->result) {
            throw new Exception($this->conn->erro());
        }
        
        return $this->result;
    }

    
    /**
     * Excluir uma tarefa
     * @return resulSet
     */
    public function excluiTarefa()
    {

        $sql = "DELETE from tarefa
	         WHERE tarefa_id = {$this->tarefa_id}";

        $this->result = $this->conn->query($sql);

        return $this->result;
    }
    
    /**
     * Lista tarefas
     * @return resulSet
     */
    public function listaTarefas()
    {
        
        $sql = "SELECT *
                  FROM tarefa ";
	$sql .= (! empty($this->tarefa_id)) ? "WHERE tarefa_id = {$this->tarefa_id} " : "";

        $sql .= " ORDER BY prioridade";

        
        $this->result = $this->conn->query($sql);

        return $this->result;
    }

}

?>	