<?php

class baseData{

    public function conexion() {
        try{
            $dbuser = 'root'; 
            $dbpass = '';

            $pdo = new PDO('mysql:host=localhost;dbname=100', $dbuser, $dbpass);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            $pdo->exec("SET NAMES 'utf8'");
            
            return $pdo;
        } catch (PDOException $e) {
            print "ERROR!: ". $e->getmessage() . "<br/>";
            die();
        }
    
    }
    
}   
