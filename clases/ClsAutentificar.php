<?php
include ("ClsUsuario.php");
/* ------------------------------------------------------------------- */
/*                                                                     */
/*                Autentificador del Sistema                           */
/*             Solo para Administrador y sistema              ver.b120 */
/*                                                            20090702 */
/* ------------------------------------------------------------------- */
class autentificacion
{
    //verifica si existe el login y la clave ingresada por el usuario 
    function autentificar($login,$pass)
    {
//       $datos = $this->verificacion($login,$clave);
   //     if ($datos) {

            $usuario = new ClsUsuario();
            $salida=$usuario->existe_usuario($login,$clave);
	    if($salida)
            {
//echo "login==",$login; 
                //Antes de continuar, debemos validar si el usuario esta activo
                //$usuario->leer_usuario($datos[0]);
               // if ($usuario->getActivo() == 1) {
                    //El usuario esta activo. Iniciamos sesion...
                    session_start();
                    $_SESSION["cedula"]=$salida[0];
                    $_SESSION["nivel"]=$salida[2];
                    $_SESSION["status"]=$salida[1];
                    return true;
                //} else return false;    //inactivo
            } else return false;        //no existe
    //    } else return false;            //autenticacion fallida
    }


}//fin de la clase
?>