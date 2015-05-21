<?php

class Conexao
{

    const HOST = "localhost";
    const USER = "root";
    const PASS = "";
    const DB = "exercicio4";

    protected $conn;
    protected $result;
    public $erro;
    public $conexao_bem_sucedida;

    /**
     * Metodo construtor
     */
    public function Conexao()
    {
        $this->conn = mysql_connect(Conexao::HOST, Conexao::USER, Conexao::PASS);
        $this->conexao_bem_sucedida = mysql_select_db(Conexao::DB,$this->conn);
    }

    /**
     * Executa uma query
     *
     * @param String $sql
     */
    function query($sql)
    {
        $this->result = mysql_query($sql,$this->conn);
        return $this->result;
    }

    /**
     * Inicia a trasacao da base de dados
     *
     * @return result
     */
    public function startTransaction()
    {

        return $this->result = $this->query(" START TRANSACTION ");
    }

    /**
     * Comita a transacao aberta com a base de dados
     *
     * @return result
     */
    public function commit()
    {

        return $this->query(" COMMIT ");
    }

    /**
     * executa a instrucao de rollback na transacao aberta
     *
     * @return resultset
     */
    public function rollback()
    {

        return $this->query(" ROLLBACK ");
    }

    /**
     * Retorna um objeto dos resultados da ultima consulta
     *
     * @return Object
     */
    public function fetchObject()
    {

        $line = mysql_fetch_object($this->result);

        return $line;
    }

    /**
     * Retorna um objeto dos resultados
     *
     * @param unknown_type $rs
     * @return Object
     */
    public function fetchObjectRS($rs)
    {

        $line = mysql_fetch_object($rs);

        return $line;
    }

    /**
     * Fecha conexao com o banco
     */
    public function close()
    {

        @mysqli_close($this->conn);
    }

    /**
     * Retorna o ultimo erro ocorrido
     *
     * @return String
     */
    public function erro()
    {
        return mysql_error($this->conn);
    }

    /**
     * Retorna o codigo da ultima insert realizada
     *
     * @return int
     */
    public function insertId()
    {

        return mysql_insert_id($this->conn);
    }

    /**
     * Insere na base de dados retornando ID inserido;
     *
     * @param String $sql
     * @return Integer
     */
    public function executa($sql)
    {

        $this->result = $this->query($sql);

        if (!$this->result)
            return false;
        return mysqli_insert_id($this->conn);
    }

    /**
     * @param resource $conn
     * @return integer
     */
    public function affectedRows()
    {
        $conn = $this->conn;

        return mysqli_affected_rows($conn);
    }

    /**
     * Pegar o resource da connexao
     * @return resource
     */
    public function getConnResource()
    {
        return $this->conn;
    }

}

?>
