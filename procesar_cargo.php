<?php
if (isset($_GET['search'])){
	$algo=trim(strtoupper($_GET['search']));
	include ('../../clases/Clsconexion_bd.php');
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql = "SELECT *
    FROM (SELECT descripcion FROM tablasobrero.cargos WHERE tablasobrero.cargos.descripcion like '%%$algo%%' LIMIT 10) s1
UNION ALL
  SELECT *
    FROM (SELECT descripcion FROM tablasmaestras.cargos where tablasmaestras.cargos.descripcion like '%%$algo%%' LIMIT 10) s2
LIMIT 10";
	$consulta = $conectar->query($sql);
	
	$bs = $_GET['search'];	

	$f = "<li>";
	$e = "</li>";
	$salida  = "";
	while($reg= $consulta->fetch())
    {
	$nombre= trim(strtoupper(mb_convert_encoding($reg['descripcion'], "UTF-8")));
			$salida .= $f.$nombre.$e;
				   
	}
	echo $salida;
}
?>