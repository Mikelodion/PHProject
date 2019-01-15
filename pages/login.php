<?php //Añadimos la cabecera y el sesionStart.
    require_once("../conf/core.php");
    require_once("../resources/cabecera.php");
?>
<?php //Controles de Log.
        if(isset($_GET["logout"])){
            session_destroy();
            $_GET = array();
            header("Location: login.php");
        }
        if(isset($_SESSION["usuario"])){
            if($_SESSION["admin"]){
                $consulta = new Consulta();
                if(isset($_GET["usuario"])&& !empty($_GET["usuario"])){
                    $filas = $consulta->searchUser($_GET["usuario"]);
                }else{
                    $filas = $consulta->getAll();   
                }   
            $result = new Results();
            $result->showAll($filas);
            }
            else{
                echo "<h1>Ya has iniciado sesión</h1>"; 
            }
?>
<?php //Si no hay una sesion iniciada y no se quiere registrar un nuevo usuario.
        }else{
            if(!isset($_GET["register"])){
?> <!--Formulario de Iniciar Sesion-->
                <h1>Iniciar Sesión</h1>
                <form action="/login/controlador/login.php" method="get" id="acceso">
                    <img src="/login/img/login-icon.png" id="usericon">
                    <!--Formulario de login-->
                    <span>Nombre:<input type="text" name="usuario"></span>
                    <span>Contraseña:<input type="password" name="clave"></span>
                    <input type="submit" value="Iniciar Sesión" class="btn btn-primary" id="inicio">
                </form>
<?php //Si se quiere registrar un nuevo usuario.
            }else{ 
?><!--Registrar Usuario-->
                <h1>Registrar Usuario</h1>
                <!--Formulario de registro-->
                <form action="/login/controlador/newuser.php" method="GET" id="registro">
                    <span>Nombre:<input type="text" name="usuario"></span>
                    <span>Contraseña:<input type="password" name="clave"></span>
                    <span>Repetir Contraseña:<input type="password" name="repeatclave"></span>
                    <span>Email:<input type="email" name="email"></span>
                    <input type="submit" value="Nuevo usuario" class="btn btn-primary" id="registrar">
                </form>
<?php //Cerramos condicionales.
            }
        }
?>
<?php
    require_once("../resources/footer.php");
?>