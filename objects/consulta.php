<?php
class Consulta{
    private $conn;
    public function __construct(){
        $db = new Database();
        $this->conn=$db->getConection();
    }
    public function getAll(){
        $rows = null;
        $sql="Select * from usuarios";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        while($result = $stmt->fetch()){
            $rows[]=$result;
        }
        return $rows;
    }
}
?>