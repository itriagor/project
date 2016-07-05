<?php
class ClsEgresado
{
function guardar_egresado($cedula,$nombre,$sexo,$nomina,$condicion,$profesion,$fecha_ing,$fecha_egr,$cargo,$estado,$obs){
        $obs=strtoupper($obs);
        $conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="insert into personal_egresado.egresado (cedula,ult_cargo,fecha_egreso,profesion,estado,nombres_apellidos,sexo,nomina,fecha_ingreso,tipo_contratacion)
values ($cedula,'$cargo','$fecha_egr','$profesion','$estado','$nombre','$sexo','$nomina','$fecha_ing','$estado','$obs')";
	$consulta = $conectar->query($sql);
        if (($consulta) and ($row= $consulta->fetch())){
			$cod_cargo=$row['descripcion'];
		}
}
function buscar_egresado_letra($nombre){
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="select cedula,nombres,apellidos,estado,sexo,nomina,cod_condicion,fecha_ing,fecha_egr,cod_cargo from tablasmaestras.maestra where (trim(nombres) || ' ' || trim(apellidos)) ='$nombre'
UNION ALL
select cedula,nombres,apellidos,cast (status as char),sexo,nomina,condicion,fec_ing_obr,fec_egr_obr,cod_cargo from tablasobrero.maestra where (trim(nombres) || ' ' || trim(apellidos)) ='$nombre'";
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		$nombre=trim($row['apellidos']).", ".trim($row['nombres']);
		if($row['sexo']==M or $row['sexo']==1){
		$sexo='MASCULINO';
		}
		else{
                    if($row['sexo']==F or $row['sexo']==2){
		$sexo='FEMENINO';
		}else{
                  $sexo='';  
                }}
		$nomina= $row['nomina'];
		$fecha1=$row['fecha_ing'];
		$fecha_ingreso=date("d-m-Y",strtotime($fecha1));
		$fecha2=$row['fecha_egr'];
		if(empty($fecha2)){
		$fecha_egreso='';
		}else{
		$fecha_egreso=date("d-m-Y",strtotime($fecha2));
		}
		$cod_condicion= $row['cod_condicion'];
		$cod_cargo= $row['cod_cargo'];
		$status= $row['estado'];
	}
return array ($nombre,$sexo,$nomina,$fecha_ingreso,$fecha_egreso,$cod_condicion,$cod_cargo,$status,$cedula);
}  
function buscar_egresado($cedula){
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="SELECT nombres,apellidos,estado,sexo,nomina,cod_condicion,fecha_ing,fecha_egr,cod_cargo
        FROM tablasmaestras.maestra 
        WHERE tablasmaestras.maestra.cedula=$cedula 
        UNION ALL 
        SELECT nombres,apellidos,cast (status as char),sexo,nomina,condicion,fec_ing_obr,fec_egr_obr,cod_cargo 
        FROM tablasobrero.maestra 
        WHERE tablasobrero.maestra.cedula=$cedula";
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		$nombre=trim($row['apellidos']).", ".trim($row['nombres']);
		$sexo=$row['sexo'];
                $nomina= $row['nomina'];
		$fecha1=$row['fecha_ing'];
		if(empty($fecha1)){
		$fecha_ingreso='';
		}else{
		$fecha_ingreso=date("d-m-Y",strtotime($fecha1));
		}
		$fecha2=$row['fecha_egr'];
		if(empty($fecha2)){
		$fecha_egreso='';
		}else{
		$fecha_egreso=date("d-m-Y",strtotime($fecha2));
		}
		$cod_condicion= $row['cod_condicion'];
		$cod_cargo= $row['cod_cargo'];
		$status= $row['estado'];
	}
return array ($nombre,$sexo,$nomina,$fecha_ingreso,$fecha_egreso,$cod_condicion,$cod_cargo,$status,$cedula);
}    
    	
function data_egresado_letra1($nombre,$apellido){
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="select cedula,nombres,apellidos,estado,sexo,nomina,cod_condicion,fecha_ing,fecha_egr,cod_cargo from tablasmaestras.maestra where (trim(nombres) || ' ' || trim(apellidos)) ='$nombre'
UNION ALL
select cedula,nombres,apellidos,cast (status as char),sexo,nomina,condicion,fec_ing_obr,fec_egr_obr,cod_cargo from tablasobrero.maestra where (trim(nombres) || ' ' || trim(apellidos)) ='$nombre'";
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		$nombre=trim($row['apellidos']).", ".trim($row['nombres']);
		$sexo=$row['sexo'];
		$nomina= $row['nomina'];
		$fecha1=$row['fecha_ing'];
		if(empty($fecha1)){
		$fecha_ingreso='';
		}else{
		$fecha_ingreso=date("d-m-Y",strtotime($fecha1));
		}
		$fecha2=$row['fecha_egr'];
		if(empty($fecha2)){
		$fecha_egreso='';
		}else{
		$fecha_egreso=date("d-m-Y",strtotime($fecha2));
		}
		$condicion= $row['cod_condicion'];
		$cargo= $row['cod_cargo'];
		$status= $row['estado'];
                $cedula=$row['cedula'];
	}
return array ($nombre,$sexo,$nomina,$fecha_ingreso,$fecha_egreso,$condicion,$cargo,$status,$cedula);
}

function data_egresado($cedula){
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="select * from personal_egresado.egresado where cedula=$cedula";
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		$nombre=trim($row['nombres_apellidos']);
		$sexo=$row['sexo'];
		$nomina= $row['nomina'];
		$fecha1=$row['fecha_ingreso'];
		if(empty($fecha1)){
		$fecha_ingreso='';
		}else{
		$fecha_ingreso=date("d-m-Y",strtotime($fecha1));
		}
		$fecha2=$row['fecha_egreso'];
		if(empty($fecha2)){
		$fecha_egreso='';
		}else{
		$fecha_egreso=date("d-m-Y",strtotime($fecha2));
		}
		$condicion= $row['tipo_contratacion'];
		$cargo= $row['ult_cargo'];
		$status= $row['estado'];
                $profesion= $row['profesion'];
                $obs=$row['obs'];
	}
return array ($nombre,$sexo,$nomina,$fecha_ingreso,$fecha_egreso,$condicion,$cargo,$status,$cedula,$profesion,$obs);
}

function data_egresado_letra($nombre){
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="select * from personal_egresado.egresado where nombres_apellidos='$nombre'";
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		$nombre=trim($row['nombres_apellidos']);
		$sexo=$row['sexo'];
		$nomina= $row['nomina'];
		$fecha1=$row['fecha_ingreso'];
		if(empty($fecha1)){
		$fecha_ingreso='';
		}else{
		$fecha_ingreso=date("d-m-Y",strtotime($fecha1));
		}
		$fecha2=$row['fecha_egreso'];
		if(empty($fecha2)){
		$fecha_egreso='';
		}else{
		$fecha_egreso=date("d-m-Y",strtotime($fecha2));
		}
		$condicion= $row['tipo_contratacion'];
		$cargo= $row['ult_cargo'];
		$status= $row['estado'];
                $profesion= $row['profesion'];
                $cedula=$row['cedula'];
                $obs=$row['obs'];
	}
return array ($nombre,$sexo,$nomina,$fecha_ingreso,$fecha_egreso,$condicion,$cargo,$status,$cedula,$profesion,$obs);
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
	$conectar = $conexion->conex_intranet();
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

function buscar_cod_cargo($descrip){
		$conexion = new Clsconexion_bd();
		$conectar = $conexion->conex_intranet();
		$sql = "SELECT codigo FROM tablasmaestras.cargos WHERE tablasmaestras.cargos.descripcion like UPPER('%%$descrip%%')UNION ALL 
SELECT codigo FROM tablasobrero.cargos WHERE tablasobrero.cargos.descripcion like UPPER('%%$descrip%%')";
		$consulta = $conectar->query($sql);
		if (($consulta) and ($row= $consulta->fetch())){
			$codigo=$row['codigo'];
		}

return $codigo;
}

function existe_egresado($cedula){
	$existe=false;
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
        if( is_numeric($cedula)){
	$sql="select cedula from personal_egresado.egresado where personal_egresado.egresado.cedula =$cedula";
        }else{
        $sql="select cedula from personal_egresado.egresado where personal_egresado.egresado.nombres_apellidos='$cedula'";    
        }
	$consulta = $conectar->query($sql);
	if($consulta){
	 	$row= $consulta->fetch();
		if($row[cedula]>0)
			$existe=true;
	}
return $existe;
}

function existe_maestra($cedula){
	$existe=false;
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
        if( is_numeric($cedula)){
	$sql="SELECT cedula
		FROM tablasmaestras.maestra 
		WHERE tablasmaestras.maestra.cedula=$cedula		
		UNION ALL		
		SELECT cedula
		FROM tablasobrero.maestra 
		WHERE tablasobrero.maestra.cedula=$cedula";
        }else{  
        $sql="select cedula 
              from tablasmaestras.maestra 
              where (trim(nombres) || ' ' || trim(apellidos)) ='$cedula'
              UNION ALL
              select cedula 
              from tablasobrero.maestra 
              where (trim(nombres) || ' ' || trim(apellidos)) ='$cedula'";    
        }
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
}
?>
