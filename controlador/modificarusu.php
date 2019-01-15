<?php
    session_start();
    include_once "../conf/database.php";
    include_once "../objects/user.php";
    if(isset($_GET["cambiar"])||isset($_COOKIE["idtochange"])){
            $usu = new User();
            if(isset($_COOKIE["idtochange"])){
                $usu->id = $_COOKIE["idtochange"];
            }
            else{
                $usu->id = $_SESSION["id"];
            }
            

            if(isset($_GET["usuario"])){
                $usu->usuario = $_GET["usuario"];
            }
            if(isset($_GET["clave"])&&isset($_GET["repeatclave"])){
                if($_GET["clave"]==$_GET["repeatclave"]){
                    $usu ->clave = $_GET["repeatclave"];
                }
                else{
                    $usu->clave = null;
                    echo'<script type="text/javascript">
                    alert("¡Las contraseñas no coinciden!");
                    window.location.href="../modificarusu.php?";
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
                    window.location.href="../pages/modificarusu.php?";
                </script>';
        }
    }
    
?>