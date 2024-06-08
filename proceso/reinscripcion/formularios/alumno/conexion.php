<?php

class direccion{

    public $db;
    
        public function __construct() {
        
            $this->db = new baseData;
        }
        
        public function estado(){
            $sql_statement = "SELECT * FROM estados";
            $account = $this->db->conexion()->query($sql_statement);
            return $account;
        }
   
        public function ciudad($id_estado){
            $sql = "SELECT * FROM ciudades
                              WHERE id_estado='$id_estado'";
            $account = $this->db->conexion()->query($sql);
            return $account;
        }

        public function municipio($id_estado){
            $sql = "SELECT * FROM municipios
                              WHERE id_estado='$id_estado'";
            $account = $this->db->conexion()->query($sql);
            return $account;
        }

        public function parroquia($id_municipio){
            $sql = "SELECT * FROM parroquias
                              WHERE id_municipio='$id_municipio'";
            $account = $this->db->conexion()->query($sql);
            return $account;
        }

    }
?>