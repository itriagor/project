<?php 
function buscar_egresado_cargo($cargo){
	if(!$cargo)
	{
		$objeto = new xajaxResponse();
		$objeto->addAlert('Ingrese cargo');
	}else{
		$objeto = new xajaxResponse();
   		$egre= new ClsEgresado();
		$datos_egresado= $egre->egresados_por_cargo($cargo);
      		if ($datos_egresado)
      		{
			
	$cedula=$datos_egresado[0];
	$nombre=$datos_egresado[1];
	$nomina= $datos_egresado[3];
	$fecha_ingreso=$datos_egresado[4];
	$fecha_egreso=$datos_egresado[5];
	$objeto->addAssign('cedula',"value",$cedula);
	$objeto->addAssign('nombres_t',"value",$nombre);
		$egre2= new ClsEgresado();
		$descrip= $egre2->cambiar_nomina($nomina);
	$objeto->addAssign('nomina',"value",$descrip);
	$objeto->addAssign('fecha_ing',"value",$fecha_ingreso);
	$objeto->addAssign('fecha_egr',"value",$fecha_egreso);
	}}	
	
return $objeto; 
}

function blanquear(){
	$objeto = new xajaxResponse();
	$objeto->addAssign('search',"value",'');
	$objeto->addAssign('nombres_t',"value",'');
	$objeto->addAssign('nomina',"value",'');
	$objeto->addAssign('fecha_ing',"value",'');
	$objeto->addAssign('fecha_egr',"value",'');

return $objeto; 
}


$xajax = new xajax();
$xajax->registerFunction("buscar_egresado_cargo");
$xajax->registerFunction("blanquear");
$xajax->processRequests();
?>