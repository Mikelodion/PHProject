<?php
    session_start();
    include_once "../conf/database.php";
    include_once "../objects/user.php";
    if(isset($_GET)){
           $usu = new User();
           //Añadimos los valores a las propiedades del objeto user.
            $usu->id=$_GET["eliminar"];
            if($usu->id != $_SESSION["id"]){
                if($usu->eliminarUsuario()){
                    echo'<script type="text/javascript">
                            alert("¡Usuario eliminado!");
                            window.location.href="../pages/login.php";
                        </script>';
                }
                else{
                    echo'<script type="text/javascript">
                            alert("¡No se ha podido eliminar el usuario!");
                            window.location.href="../pages/login.php?";
                        </script>';
                }
            }
            else{
                echo'<script type="text/javascript">
                        alert("¡No puede eliminar el usuario con el que ha iniciado sesion!");
                        window.location.href="../pages/login.php?";
                    </script>';
            }
       }
?>