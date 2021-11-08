<?php

session_start();

class conectarBase 
{

    private $dbh;

    private $server;
    private $user; 
    private $password; 
    private $database; 
    

   
    
    public function conexion()
    {

    try
    {

        $conectar = $this ->dbh = new PDO("mysql:local=localhost;dbname=dbproyecto","root","");


        return $conectar ;
    

    } catch(Exception $e)
    
    {

        print "ERROR".$e -> getMessage()."<br/>";
        die();

    }


    }

    public function set_names()
    {

        return $this->dbh->query("SET NAMES 'utf8'");

    }

    public function ruta()
    {

        return "http://localhost/ejercicios/Tecnicas/SistemaPizzeria/";

    }



}


?>