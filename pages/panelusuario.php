<?php //Añadimos la cabecera y el sesionStart.
    require_once("../conf/core.php");
    require_once("../resources/cabecera.php");
?>
<?php
     $result = new Results();
     $result->showSession();
?>
<?php
require_once("../resources/footer.php");
?>
