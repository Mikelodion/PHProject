<?php
class Results{
    private $conn;
    public function __construct(){
        $db = new Database();
        $this->conn=$db->getConection();
    }
    
    public function showAll(){ //Muestra una tabla con todos los usuarios.
        $consulta = new Consulta();
        $filas = $consulta->getAll();
        echo "<div id='userstable'>";
        echo "<h1>Usuarios</h1>";
        echo "<table class='table table-bordered' id='seeallusers'>";
            echo "<tr>";
            echo "<thead class='thead-light'>";
                echo "<th>Nombre</th>";
                echo "<th>Admin</th>";
                echo "<th>Email</th>";
                echo  "<th>Borrar</th>";
                echo  "<th>Modificar</th>";
            echo "</thead>";
            echo "</tr>";
        if(!empty($filas)){
        foreach ($filas as $fila) {
                echo "<tr>";
                echo "<td>".$fila['usuario']."</td>";
                echo "<td>".$fila['access_level']."</td>";
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