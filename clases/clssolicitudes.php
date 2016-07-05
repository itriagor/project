<?php
class Clssolicitudes
{

   public $fechasolicitud;
	public $cedula;
	public $tipo;
	public $estatus;
	public $cantidad;
	public $especial;
	
	public $msg="";
	
	public function setfechasolicitud($efechasolicitud){$this->fechasolicitud=$efechasolicitud;}
	public function setcedula($ecedula){$this->cedula=$ecedula;}
	public function settipo($etipo){$this->tipo=$etipo;}
	public function setestatus($eestatus){$this->estatus=$eestatus;}
	public function setcantidad($ecantidad){$this->cantidad=$ecantidad;}
	public function setespecial($eespecial){$this->especial=$eespecial;}
	
	
	public function getfechasolicitud(){return $this->fechasolicitud;}
	public function getcedula(){return $this->cedula;}
	public function gettipo(){return $this->tipo;}
	public function getestatus(){return $this->estatus;}
	public function getcantidad(){return $this->cantidad;}
	public function getespecial(){return $this->especial;}
	
	
	function msg($str)
	{
		echo "<script language=\"JavaScript\" type=\"text/javascript\">alert('$str')</script>";
	}

	function llamarxajax($var)
	{
		echo "<script language=\"JavaScript\" type=\"text/javascript\">llamarxajax2($var);</script>";
	}
	
	
	function listar_nuevas($consulta,$nomina,$status)
	{

		$conexion = new Clsconexion_bd();
      $conectar = $conexion->conexion();
    	$sql = "SELECT cod_solicitud,
		cedula_emp,
		tipo_nomina,
		tipo_solicitud,
		destinatario,
		cantidad,
		 to_char(fecha,'dd/mm/yyyy') as fecha,
		status,observacion FROM solicitudes WHERE  status='$status' ORDER BY COD_SOLICITUD ASC";
		$consulta = $conectar->query($sql);	
		//$row= $consulta->fetch();
		$conexion=null;
		return ($consulta);
		//$fecha=date("Y-m-d");
	
	}

	function ListarSolicitudeSinProcesar($cedula)
	{

		$conexion = new Clsconexion_bd();
      $conectar = $conexion->conexion();
    	$sql = "SELECT cod_solicitud,
		cedula_emp,
		tipo_nomina,
		tipo_solicitud,
		destinatario,
		cantidad,
		 to_char(fecha,'dd/mm/yyyy') as fecha,
		status,observacion,cod_solicitud FROM solicitudes WHERE  cedula_emp='$cedula' and status='NUEVA' ORDER BY COD_SOLICITUD ASC";
		$consulta = $conectar->query($sql);	
		//$row= $consulta->fetch();
		$conexion=null;
		return ($consulta);
		//$fecha=date("Y-m-d");
	
	}


	function EliminarSolicitudeSinProcesar($codigo)
	{

		$conexion = new Clsconexion_bd();
      $conectar = $conexion->conexion();
    	$sql = "delete  FROM solicitudes WHERE  cod_solicitud='$codigo'  ";
		$consulta = $conectar->query($sql);	
		//$row= $consulta->fetch();
		$conexion=null;
		return ($consulta);
		//$fecha=date("Y-m-d");
	
	}

	function EditarSolicitudeSinProcesar($codigo)
	{

		$conexion = new Clsconexion_bd();
      		$conectar = $conexion->conexion();
    		$sql = "select cod_solicitud,
		cedula_emp,
		tipo_nomina,
		tipo_solicitud,
		destinatario,
		cantidad,
		 to_char(fecha,'dd/mm/yyyy') as fecha,
		status,observacion  FROM solicitudes WHERE  cod_solicitud='$codigo' and status='NUEVA'";
		$consulta = $conectar->query($sql);	
		//$row= $consulta->fetch();
		$conexion=null;
		return ($consulta);
		//$fecha=date("Y-m-d");
	
	}


	function listar_consulta($cedula,$tipo){

		$conexion = new Clsconexion_bd();
     	        $conectar = $conexion->conexion();
    		$sql = "SELECT cod_solicitud,
			cedula_emp,
			tipo_nomina,
			tipo_solicitud,
			destinatario,
			cantidad,
			to_char(fecha,'dd/mm/yyyy') as fecha,
			status,observacion FROM solicitudes WHERE tipo_solicitud='$tipo'AND cedula_emp='$cedula')";
		$consulta = $conectar->query($sql);	
		while ($row= $consulta->fetch()){
		$nombres=$this->nombre($row["cedula_emp"]);
	         $id = "<a href=\"../../control_paginas/control_generar_const.php?codigo=$row[cod_solicitud]&cedula=$row[cedula_emp]&const=$row[tipo_solicitud]&nomina=$nomina&destinatario=$row[destinatario]\" >firmar</a>"; 
            printf("<tr><td>&nbsp;%s</td><td>&nbsp;%s</td><td>&nbsp;%s</td><td>&nbsp;%s&nbsp;</td><td>&nbsp;%s&nbsp;</td></tr>",$row["fecha"], $row["cedula_emp"],$row["tipo_nomina"],$row["tipo_solicitud"],$id);
          }
}


  function nombre($cedula) // para nomina mensual,ejecutivo y contratado
	{

     $conexion = new Clsconexion_bd();
      $conectar = $conexion->conexion_maestra(); 
      $sql = "SELECT nombres,apellidos FROM tablasmaestras.maestra WHERE tablasmaestras.maestra.cedula=$cedula union all SELECT nombres,apellidos FROM tablasobrero.maestra WHERE tablasobrero.maestra.cedula=$cedula";

      $consulta = $conectar->query($sql);
   	$row= $consulta->fetch();
        $nombre= trim($row[apellidos])." ".trim($row[nombres]);
	return $nombre;

        }




	function listar_procesadas($consulta,$nomina)
	{

		$conexion = new Clsconexion_bd();
      $conectar = $conexion->conexion();
    	$sql = "SELECT * FROM solicitudes WHERE tipo_nomina='$nomina'AND (status='procesada' OR status='PROCESADA')";
		$consulta = $conectar->query($sql);	
		//$row= $consulta->fetch();
		$conexion=null;
		return ($consulta);
		//$fecha=date("Y-m-d");
	  
	
	}
	
	
		function listar_firmadas($consulta,$nomina)
	{

		$conexion = new Clsconexion_bd();
      $conectar = $conexion->conexion();
    	$sql = "SELECT * FROM solicitudes WHERE tipo_nomina='$nomina' AND (status='firmada' OR status='FIRMADA')";
		$consulta = $conectar->query($sql);	
		//$row= $consulta->fetch();
		 $conexion=null;
		return ($consulta);
		//$fecha=date("Y-m-d");
	  
	
	}

	function listar_entregadas($consulta,$nomina)
	{

		$conexion = new Clsconexion_bd();
      $conectar = $conexion->conexion();
    	$sql = "SELECT * FROM solicitudes WHERE tipo_nomina='$nomina' AND (status='entregada' OR status='ENTREGADA')";
		$consulta = $conectar->query($sql);	
		//$row= $consulta->fetch();
		 $conexion=null;
		return ($consulta);
		//$fecha=date("Y-m-d");
	  
	
	}
	function guardar_solicitud($codigo,$cedula,$nomina,$destinatario,$t_solicitud,$cantidad,$observacion)
	{
		//include('../clases/Clsconexion_bd.php');
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();
		if(!$destinatario) $destinatario="";
		$fecha=date("Y-m-d");
		$sql = "INSERT INTO solicitudes(cod_solicitud,cedula_emp,tipo_nomina,tipo_solicitud,destinatario,cantidad,fecha,status,observacion)VALUES(nextval('cod_solicitud'),'$cedula','$nomina','$t_solicitud','$destinatario','$cantidad','$fecha','NUEVA','$observacion')";
		if($codigo>0)
			$sql="update solicitudes set tipo_solicitud='$t_solicitud',destinatario='$destinatario',observacion='$observacion' where cod_solicitud=$codigo";
		$consulta = $conectar->query($sql);	
		$conexion=null;
		return ($consulta);
	}
	  	
	  	
function cambiar_nomina($nomina){
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql = "select descripcion from tablasmaestras.tipo_nomina where tablasmaestras.tipo_nomina.codigo='$nomina'";
	$consulta = $conectar->query($sql);
	if (($consulta) and ($row= $consulta->fetch())){
		$nomina_descrip=$row['descripcion'];			
	}
return $nomina_descrip;
}

function cambiar_motivo($egreso){
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_rrhh();
	$sql = "select descripcion from tablasmaestras.motivo_egreso where codigo='$egreso'";
	$consulta = $conectar->query($sql);
	if (($consulta) and ($row= $consulta->fetch())){
		$motivo_descrip=$row['descripcion'];			
	}
return $motivo_descrip;
}

function tipo_contratacion($cod_contrat){
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conex_intranet();
		$sql = "SELECT descripcion FROM recibopago.condicion WHERE recibopago.condicion.cod_condicion=$cod_contrat";
		$consulta = $conectar->query($sql);
		if (($consulta) and ($row= $consulta->fetch())){
			$cod_contrat=$row['descripcion'];			
		}
return $cod_contrat;
}

function descrip_status($cod_contrat){
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conex_intranet();
		$sql = "SELECT descripcion FROM recibopago.condicion WHERE recibopago.condicion.cod_condicion=$cod_contrat";
		$consulta = $conectar->query($sql);
		if (($consulta) and ($row= $consulta->fetch())){
			$cod_contrat=$row['descripcion'];			
		}
return $cod_contrat;
}


function buscar_cargo($cod_cargo){
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conex_intranet();
		$sql = "SELECT descripcion FROM tablasmaestras.cargos WHERE tablasmaestras.cargos.codigo='$cod_cargo' UNION ALL SELECT descripcion FROM tablasobrero.cargos WHERE tablasobrero.cargos.codigo='$cod_cargo'";
		$consulta = $conectar->query($sql);
		if (($consulta) and ($row= $consulta->fetch())){
			$cod_cargo=$row['descripcion'];
		}

return $cod_cargo;
}

function existe_egresado($cedula){
	$existe=false;
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="select * from personal_egresado.egresado where personal_egresado.egresado.cedula =$cedula";
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		if($row[cedula]>0)
			$existe=true;
	}
return $existe;
}

function esta_editado($cedula){
	$editado=false;
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="select editado from personal_egresado.egresado where personal_egresado.egresado.cedula =$cedula";
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		if($row['editado']==1){
			$editado=true;}
	}
return $editado;
}

function data_editado($cedula){
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="select ult_cargo, fecha_egreso, estado from personal_egresado.egresado where personal_egresado.egresado.cedula =$cedula";
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		$cargo= $row['ult_cargo'];	
		$fecha= $row['fecha_egreso'];
		$estado= $row['estado'];
			
	}
return array ($cargo,$fecha,$estado);
}

function exite_movimiento($status,$cod_const,$conectar){
	$existe=false;
	$sql="select id_const from movimientos where id_const=$cod_const and status='$status'";
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		if($row[cod_const]>0)
			$existe=true;
	}
return $existe;
}
		  
	function cambiar_status($status,$cod_const){
		$fecha=date("d-m-Y");
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conexion();
		$sql1="UPDATE solicitudes SET status='$status' WHERE cod_solicitud='$cod_const'";
		$consulta = $conectar->query($sql1);	
		if(!$this->exite_movimiento($status,$cod_const,$conectar)){
			$sql="insert into movimientos (id_const,status,fecha)values($cod_const,'$status','$fecha')";
			$consulta = $conectar->query($sql);	
		}
		$conexion=null;	
		return "Estatus actualizado";
	}
}
		
	
	?>