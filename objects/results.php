<?php
class Results{
    private $conn;
    public function __construct(){
        $db = new Database();
        $this->conn=$db->getConection();
    }
    
    public function showAll($filas){ //Muestra una tabla con todos los usuarios.
        echo "<div id='userstable'>";
        echo "<h1 class='border-bottom'>Usuarios</h1>";
        echo "<div class='row mb-2>";
        echo    "<div class='col-md-3 float-left'>";
        echo    "<form action='/login/pages/login.php' id='srch-form'>";
        echo        "<div class='input-group-sm input-group-append'>";
        echo            "<input type='text' class='form-control' placeholder='Introduzca su nombre ...' name='usuario' id='srch-term'>";
        echo            "<button class='btn btn-primary btn-sm' type='submit'><i class='fa fa-search'></i></button>";        
        echo        "</div>";        
        echo    "</form>";                
        echo    "<div class='float-right ml-3'>";   
        echo        "<a href='/login/controlador/crearusuario.php' class='btn btn-primary btn-sm'>";   
        echo            "<i class='fa fa-plus'></i> Crear Usuario";   
        echo        "</a>";   
        echo    "</div>";
        echo    "</div>";   
        echo "</div>";    
        echo "<table class='table table-bordered table-hover table-striped' id='seeallusers'>";
            echo "<tr>";
            echo "<thead class='thead-light'>";
                echo "<th>Nombre</th>";
                echo "<th>Nivel de Acceso</th>";
                echo "<th>Email</th>";
                echo  "<th>Borrar</th>";
                echo  "<th>Modificar</th>";
            echo "</thead>";
            echo "</tr>";
        if(!empty($filas)){
        foreach ($filas as $fila) {
                echo "<tr>";
                echo "<td>".$fila['usuario']."</td>";
                            $accesslevel = ($fila["access_level"]==1) ? "Admin":"Usuario";
                echo "<td>".$accesslevel."</td>";
                echo "<td>".$fila['email']."</td>";
                echo "<td><a href='../controlador/eliminarusu.php?eliminar=".$fila['id']."'>X</a></td>";
                echo "<td><a href='modificarusu.php?modificar=".$fila['id']."'><i class='fa fa-cog'></i></a></td>";
            echo "</tr>";
            } 
        }
        echo "</table>";
        echo "</div>";
    }
    public function showSession(){
        $usu = new User();
        $usu ->id = $_SESSION["id"];
        $filas = $usu ->buscarUsuario();
        if(!empty($filas)){
?>
                    <form action="/login/controlador/modificarusu.php" method="get" id="acceso">
                        <img src="/login/img/login-icon.png" id="usericon">
                        <!--Formulario de login-->
                        <span>Nombre:<input type="text" name="usuario" value="<?=$filas['usuario']?>"></span>
                        <span>Email<input type="text" name="email" value="<?=$filas['email']?>"></span>
                        <span>Nivel de acceso: </span>
                        <input type="checkbox" name="admin" <?php if($_SESSION["admin"] == true) echo "checked"; ?>>
                        <input type="submit" value="Cambiar" name="cambiar" class='btn btn-primary'>
                    </form> 
<?php
        }
    }
}
?>