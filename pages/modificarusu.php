<?php //Añadimos la cabecera y el sesionStart.
    require_once("../conf/core.php");
    require_once("../resources/cabecera.php");
?>
<?php
    $usu = new User();
    $usu->id = $_GET["modificar"];
    setcookie("idtochange",$_GET["modificar"],time() + (30 * 60 * 60 * 1000), "/");
    $usuinfo = $usu->buscarUsuario();
    
    if($usuinfo != false){
        $usu->usuario = $usuinfo["usuario"];
        $usu->email = $usuinfo["email"];
        $usu->clave = $usuinfo["clave"];
        $usu->access_level = $usuinfo["access_level"];
?>
    <form action="../controlador/modificarusu.php" method="GET" id="registro">
        <h3>Modificar Usuario: <?php echo $usu->usuario; ?></h3>
        <span>Cambiar Nombre:<input type="text" value="<?= $usu->usuario;?>" name="usuario"></span>
        <span>Cambiar Contraseña:<input type="password" name="clave"></span>
        <span>Repetir Contraseña:<input type="password" name="repeatclave"></span>
        <span>Cambiar Email:<input type="email" value="<?= $usu->email;?>" name="email"></span>
        <span>Cambiar nivel de acceso: </span>
        <input type="checkbox" name="admin" <?php if($usu->access_level == true) echo "checked"; ?>>
        <br>

        <div id="buttons">
            <a href="login.php" class="btn btn-primary">Volver</a>
            <input type="submit" value="Cambiar" class='btn btn-primary'>
        </div>
    </form>
<?php
    }
    else{
		//en caso de no encontrar usuario, aparece un alert
		echo "<div class='alert alert-danger' role='alert'>";
			echo "Usuario no encontrado";
		echo "</div>";
        echo "<br>";
        $result = new Results();
        $result->showAll();
    }
?>
    
<?php
require_once("../resources/footer.php");
?>
