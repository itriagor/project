<?php
/* ************************************************************************************************
Clase: ClsUsuario.php
Descripcion: Clase que contiene todas las operaciones necesarias para manejar la informacion de los usuarios
Revision: b200
*********************************************************************************** */
class ClsUsuario {

function listar_usuarios(){
         $conexion = new Clsconexion_bd();
         $conectar = $conexion->conex_intranet();
	 $sql = "select * from personal_egresado.usuario";
	$consulta = $conectar->query($sql);
        $id=0;
	while($row= $consulta->fetch()){
                $pass=$row['password'];
                $cedula=$row['cedula'];
                $login=$row['login'];
                $nivel=$row['nivel'];
                $status=$row['status'];
                if($nivel==1){
                    $nivelu='ADMINISTRADOR';
                }
                 if($nivel==2){
                    $nivelu='ANALISTA';
                }
                if($nivel==3){
                    $nivelu='ANALISTA II';
                }
                if($status==1){
                    $statusu='ACTIVO';
                }else{
                    $statusu='INACTIVO';
                }        
	$tabla.='<tr>';
	$tabla.='<td class="campo33" id="cedula'.$id.'" name="cedula'.$id.'" value="">'.strtoupper($cedula).'</td>';
	$tabla.='<td class="campo33"">'.strtoupper($login).'</td>';
	$tabla.='<td class="campo33">'.strtoupper($nivelu).'</td>';
	$tabla.='<td class="campo33">'.strtoupper($statusu).'</td>';
        $tabla.='<td align="center" class="campo34"><img src="../../imagenes/editar.gif" border="0" alt="Buscar"  onclick="confirmar_edit('.$cedula.')" class="boton"/></td>';
	$tabla.='<td align="center" class="campo34"><img src="../../imagenes/borrar.gif" border="0" alt="Buscar"  onclick="confirmar('.$cedula.')" class="boton"/></td>';
        $tabla.='</tr>';
        $id++;
	}
return $tabla;
}

function buscar_usuario($cedula){
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="select * from personal_egresado.usuario where cedula=$cedula";
	$consulta = $conectar->query($sql);
	if($consulta){
            $row= $consulta->fetch();
            $login= $row['login'];
            $nivel= $row['nivel'];
	    $status= $row['status'];
	}
return array ($cedula,$login,$nivel,$status);
} 

function update_usuario($cedula,$log,$nivel,$status){
        $conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="update personal_egresado.usuario 
                set login='$log',nivel=$nivel,status=$status where cedula =$cedula";
	$consulta = $conectar->query($sql);
  
}

function existe_usuario($login,$pass){
        $pwd=md5($pass);
        $loginx=strtoupper($login);
	$existe=false;
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
        $sql="select cedula,nivel,status from personal_egresado.usuario where login='$loginx' and password='$pwd'";
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		if($row[cedula]>0)
                    $nivel=$row['nivel'];
                    $status=$row['status'];
                    $cedula=$row['cedula'];
	}
return array($cedula,$status,$nivel);
}

}// Fin de la clase
?>