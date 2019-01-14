<?php
    //Cojer la conexion de la base de datos.
    class Database{
        //Credenciales de nuestra db.
        private $usu = "daw2a";
        private $pass = "abc123.";
        private $host = "randion.es";
        private $db = "daw2a_comunidades";
        private $conn;
        //Cojer la conexion con la db.
        public function getConection(){
            $this->conn = null;
            try{
                $this->conn = new PDO("pgsql:host=".$this->host.";dbname=".$this->db,$this->usu,$this->pass);
            }catch(PDOException $exception){
                echo "Connection error: ".$exception->getMessage();
            }
            return $this->conn;
        }
    }

?>