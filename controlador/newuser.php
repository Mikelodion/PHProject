<?php
    include_once "../conf/database.php";
    include_once "../objects/user.php";
    if(isset($_GET)){
        $database = new Database();
        $db = $database -> getConection();
        $usu = new User();    
        
        //Añadimos los valores a las propiedades del objeto user.
        $usu->usuario= $_GET["usuario"];
        $usu->clave= $_GET["clave"];
        $usu->email= $_GET["email"];

        if($_GET["clave"]==$_GET["repeatclave"]){
            if($usu->create()){
                echo'<script type="text/javascript">
                    alert("Usuario Creado correctamente");
                    window.location.href="../pages/login.php";
                    </script>';
                $_GET=array();
            }
            else{
                echo'<script type="text/javascript">
                alert("Inténtelo de nuevo");
                window.location.href="../pages/login.php?register=Register";
                </script>';
            }
        }
        else{
            echo'<script type="text/javascript">
            alert("Las contraseñas no coinciden");
            window.location.href="../pages/login.php?register=Register";
            </script>';
        }    
    }
?>