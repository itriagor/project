<?php
if (isset($_GET['search'])){
	$algo=trim(strtoupper($_GET['search']));
	include ('../../clases/Clsconexion_bd.php');
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql = "SELECT *
    FROM (SELECT nombres,apellidos FROM tablasobrero.maestra WHERE tablasobrero.maestra.apellidos like '%%$algo%%'OR tablasobrero.maestra.nombres like '%%$algo%%' LIMIT 10) s1
UNION ALL
  SELECT *
    FROM (SELECT nombres,apellidos FROM tablasmaestras.maestra where tablasmaestras.maestra.apellidos like '%%$algo%%' OR tablasmaestras.maestra.nombres like '%%$algo%%' LIMIT 10) s2
LIMIT 10";
	$consulta = $conectar->query($sql);
	
	$bs = $_GET['search'];	

	$f = "<li>";
	$e = "</li>";
	$salida  = "";
	while($reg= $consulta->fetch())
    {
	$nombre= trim(strtoupper(mb_convert_encoding($reg['nombres'], "UTF-8")));
	$apellido=trim(strtoupper(mb_convert_encoding($reg['apellidos'], "UTF-8")));
			$salida .= $f.$nombre.'&nbsp;'.$apellido.$e;
				   
	}
	echo $salida;
}
?>