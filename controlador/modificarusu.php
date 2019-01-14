<?php
    session_start();
    include_once "../conf/database.php";
    include_once "../objects/user.php";
    if(isset($_GET)&&isset($_COOKIE["idtochange"])){
            $usu = new User();
            $usu->id = $_COOKIE["idtochange"];

            if(isset($_GET["usuario"])){
                $usu->usuario = $_GET["usuario"];
            }
            if(isset($_GET["clave"])&&isset($_GET["repeatclave"])){
                if($_GET["clave"]==$_GET["repeatclave"]){
                    $usu ->clave = $_GET["repeatclave"];
                }
                else{
                    $usu->clave= null; 
                    echo'<script type="text/javascript">
                    alert("¡Las contraseñas no coinciden!");
                    window.location.href="../pages/modificarusu.php?";
                    </script>';
                }
            }
            if(isset($_GET["email"])){
                $usu->email = $_GET["email"];
            }

            if(isset($_GET['admin'])){
                $usu->access_level = "true";
            }else{
                $usu->access_level = "false";
            }
            

        if($usu->modificarUsuario()){
            echo'<script type="text/javascript">
                    alert("¡Usuario modificado!");
                    window.location.href="../pages/login.php?";
                </script>';
        }
        else{
            echo'<script type="text/javascript">
                    alert("¡Ha habido un error!");
                    window.location.href="../modificarusu.php?";
                </script>';
        }
    }
    
?>