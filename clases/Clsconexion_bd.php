<?php

/****************************************************************************************************
//Función que contiene toda la información para establecer la conexión a la Base de datos
*********************************************************************************************** */
class Clsconexion_bd
{	
	function conexion() //Conexion con Base de datos Intranet.servidor desarrollo
	{
		$driver="pgsql";
		$host="pzosdgstdeb30.pzo.cvg.com";
		$dbname="rrhh";
		$port="5432";
		$user="cintranet";
		$clave="step4fab";
		$conexion= new PDO("$driver:host=$host;dbname=$dbname;port=$port","$user","$clave");
		return $conexion;
	}

}


?>
