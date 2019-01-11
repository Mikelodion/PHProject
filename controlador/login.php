<?php
     session_start();
     include_once "../conf/database.php";
     include_once "../objects/user.php";
     if(isset($_GET)){
            $usu = new User();
            //Añadimos los valores a las propiedades del objeto user.
            $usu->usuario= $_GET["usuario"];
            $usuexist = $usu->checkLog();
            
            if($usuexist && password_verify($_GET["clave"],$usu->clave)){
                $_SESSION["id"]=$usu->id;
                $_SESSION["usuario"]=$usu->usuario;
                $_SESSION["email"]=$usu->email;
                if($usu->esAdmin()){
                    $_SESSION["admin"]= true;
                    header('Location: ../pages/login.php');
                    
                }
                else{
                    $_SESSION["admin"]= false;
                    header('Location: ../pages/login.php');
                }
            }
            else{
                echo'<script type="text/javascript">
                        alert("¡Usuario no encontrado!");
                        window.location.href="../pages/login.php?register=Register";
                    </script>';
            }
        }
?>