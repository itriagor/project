<?php 
function buscar_cargo($descrip_cargo){
	$descripcion= trim(strtoupper($descrip_cargo));
	if(!$descripcion)
	{
		$objeto = new xajaxResponse();
		$objeto->addAlert('Ingrese cargo');
	}else{
		$objeto = new xajaxResponse();
		$eg= new ClsEgresado();
		$codigo_cargo= $eg->buscar_cod_cargo($descripcion);
		$egre= new ClsEgresado();
		$datos_egresado= $egre->egresados_por_cargo($codigo_cargo);
      		if ($datos_egresado)
      		{
        $tabla.='<TABLE   border="0" align="center" class="tabla1" id="resultados" name="resultados">';
	$tabla.='<tr align="center">';
	$tabla.= '<TD colspan="5">';
	$tabla.='<label>LISTADO DE EGRESADOS POR CARGO</label>';
	$tabla.='</TD>';
	$tabla.='</tr>';
	$tabla.='<th>Cédula</th>';
	$tabla.='<th>Nombre</th>';
	$tabla.='<th>Nómina</th>';
	$tabla.='<th>Fecha Ingreso</th>';
	$tabla.='<th>Fecha Egreso</th>';
        $tabla.= $datos_egresado;
        $tabla.='</TABLE>';
	$objeto->addAssign('tabla',"innerHTML",$tabla);
	$objeto->addAssign('NavPosicion',"innerHTML",$tabla);
	$objeto->addAssign('div',"innerHTML",$codigo_cargo);
	}
}	
	
return $objeto; 
}

function blanquear(){
	$objeto = new xajaxResponse();
	$objeto->addAssign('cargo',"value",'');
	$objeto->addAssign('cedula',"value",'');
	$objeto->addAssign('nombres_t',"value",'');
	$objeto->addAssign('nomina',"value",'');
	$objeto->addAssign('fecha_ing',"value",'');
	$objeto->addAssign('fecha_egr',"value",'');

return $objeto; 
}


$xajax = new xajax();
$xajax->registerFunction("buscar_cargo");
$xajax->registerFunction("blanquear");
$xajax->processRequests();
?>