<?php 

include('../clases/Clsconexion_bd.php');
include('../clases/ClsAutentificar.php');
 
if (isset ($_POST['log'])&& isset ($_POST['pwd']) ){
    $login=$_POST['log'];
    $pass=$_POST['pwd'];
    $usu = new autentificacion();
    $datos_usu= $usu->autentificar($login,$pass);
    if($datos_usu){
        header("location: ../paginas/pantallas/pant_buscar_individual.php");
    }
  
}

?>


