<?php

class MyUserClass
{

    const HOST = "localhost";
    const USER = "user";
    const PASSWORD = "password";

    public $dbconn;

    public function MyUserClass()
    {
        $this->dbconn = new DatabaseConnection(MyUserClass::HOST, MyUserClass::USER, MyUserClass::PASSWORD);
    }

    public function getUserList()
    {
        $results = $this->dbconn->query('select name from user');
        
        sort($results);
        
        return $results;
    }

}

?>
