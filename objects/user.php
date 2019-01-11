<?php
class User{
    private $conn;
    private $table_name = "usuarios";

    public $id;
    public $usuario;
    public $clave;
    public $email;
    
    public $access_level;
    

    public function __construct(){
        $db = new Database();
        $this->conn=$db->getConection();
    }
    function create(){
        $sql="Insert into " .$this->table_name." (usuario, clave, email) values(:argusuario, :argclave, :argemail)";
        $stmt = $this->conn->prepare($sql);

        $this->usuario=htmlspecialchars(strip_tags($this->usuario));
        $this->clave=htmlspecialchars(strip_tags($this->clave));
        $this->email=htmlspecialchars(strip_tags($this->email));
        
        //Bind Values
        $stmt-> bindParam(":argusuario", $this->usuario);
        $hashedclave = password_hash($this->clave, PASSWORD_BCRYPT);
        $stmt-> bindParam(":argclave", $hashedclave);
        $stmt-> bindParam(":argemail", $this->email);

        if($stmt->execute()){
            return true;
        }
        else{
            $this->showError($stmt);  
            return false;  
        }
           
    }
    public function showError($stmt){
        echo "<pre>";
            print_r($stmt->errorInfo());
        echo "</pre>";
    }
    public function checkLog(){
        $sql = "Select * from ".$this->table_name." where usuario=:argusuario";
        $stmt = $this->conn->prepare($sql);

        $this->usuario=htmlspecialchars(strip_tags($this->usuario));

        $stmt-> bindParam(":argusuario",$this->usuario);

        $stmt->execute();
        $user = $stmt->rowCount();

        if($user > 0){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            $this->id = $row["id"];
            $this->usuario = $row["usuario"];
            $this->clave = $row["clave"];
            $this->email = $row["email"];
            $this->access_level =$row["access_level"];
            return true;
        }
        else
        return false;
    }
    public function esAdmin(){
        $sql = "Select access_level from ".$this->table_name." where usuario=:argusuario";
        $stmt = $this->conn->prepare($sql);

        $stmt-> bindParam(":argusuario", $this->usuario);

        $stmt ->execute();
        $result = $stmt->fetch();

        if($result["access_level"]==true){
            return true;
        }
        else
        return false;
    }
    public function eliminarUsuario(){
        $sql="Delete from usuarios where id=:argid";

        $stmt = $this->conn->prepare($sql);

        $stmt->bindParam(":argid", $this->id);

        if($stmt->execute()){
            return true;
        }
        else{
            $this->showError($stmt);  
            return false;  
        }
    }
    public function buscarUsuario(){
        $sql="Select * from usuarios where id=:argid";

        $stmt=$this->conn->prepare($sql);

        $stmt->bindParam(":argid", $this->id);
        
        if($stmt->execute()){
            $user = $stmt -> fetch();
            return $user;
        }
        else{
            $this->showError($stmt);  
            return false;  
        }

    }
    public function modificarUsuario(){
        if(!empty($this->clave)){
            $sql =  "Update usuarios set usuario=:argusuario, clave=:argclave, email=:argemail, access_level=:argaccess_level where id=:argid";
            $stmt=$this->conn->prepare($sql);
            $hashedclave = password_hash($this->clave, PASSWORD_BCRYPT);
            $stmt-> bindParam(":argclave", $hashedclave);
        }
        else{
            $sql =  "Update usuarios set usuario=:argusuario, email=:argemail, access_level=:argaccess_level where id=:argid";
            $stmt=$this->conn->prepare($sql);
        }
        
        $stmt->bindParam(":argid", $this->id);
        $stmt-> bindParam(":argusuario", $this->usuario);
        $stmt-> bindParam(":argemail", $this->email);
        $stmt->bindParam(":argaccess_level", $this->access_level);

        if($stmt->execute()){
            return true;
        }
        else{
            $this->showError($stmt);  
            return false;  
        }

    }
}
?>