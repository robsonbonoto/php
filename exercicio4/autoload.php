<?php

//ini_set("display_errors", true);
//error_reporting(E_ALL ^ E_NOTICE);

session_start();

function __autoload($className)
{
    require_once "classes/" . $className . ".class.php";
}

?>
