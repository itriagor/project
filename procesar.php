<?php
if (isset($_GET['search'])){
	$algo=trim(strtoupper($_GET['search']));
	include ('../../clases/Clsconexion_bd.php');
	$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql = "SELECT *
    FROM (SELECT descripcion FROM tablasobrero.cargos WHERE tablasobrero.cargos.descripcion like '%%$algo%%' LIMIT 5) s1
UNION ALL
  SELECT *
    FROM (SELECT descripcion FROM tablasmaestras.cargos where tablasmaestras.cargos.descripcion like '%%$algo%%' LIMIT 5) s2
LIMIT 5";
	$consulta = $conectar->query($sql);
	
	$bs = $_GET['search'];	

	$f = "<li>";
	$e = "</li>";
	$salida  = "";
	while($reg= $consulta->fetch())
    {
	    //if (strpos(mb_convert_encoding($reg['nombre'], "UTF-8"),$bs) !== false){
			$salida .= $f.mb_convert_encoding($reg['descripcion'], "UTF-8").$e;
		//}			   
	}
	echo $salida;
}
?>