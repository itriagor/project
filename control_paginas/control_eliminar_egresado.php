<?php
function eliminar_egresado($cedula){
        $conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql="delete from personal_egresado.egresado where cedula=$cedula";
	$consulta = $conectar->query($sql);
        if (($consulta)){
            $objeto = new xajaxResponse();
            $objeto->addAlert('Expediente eliminado satisfactoriamente');
        }else{
            $objeto = new xajaxResponse();
            $objeto->addAlert('Expediente no eliminado'); 
        }
           
return $objeto; 
}

function buscar_egresado($cedula){
	$egr= new ClsEgresado();
	$existe= $egr->existe_egresado($cedula);
	if(!$cedula)
	{
		$objeto = new xajaxResponse();
		$objeto->addAlert('Ingrese cédula');
	}else{
         if ($existe){
             $objeto = new xajaxResponse();
		//$objeto->addAlert('Expediente ya registrado');
        $egre= new ClsEgresado();
        if(is_numeric($cedula)){
	$datos_egresado= $egre->data_egresado($cedula);}
        else{
            $datos_egresado= $egre->data_egresado_letra($cedula);
        }
        $nombre=$datos_egresado[0];
	$sexo=$datos_egresado[1];
	$nomina= $datos_egresado[2];
	$fecha_ingreso=$datos_egresado[3];
	$fecha_egreso=$datos_egresado[4];
	$condicion=$datos_egresado[5];
	$cargo=$datos_egresado[6];
	$status=$datos_egresado[7];
	$cedula_t=$datos_egresado[8];
        $profesion=$datos_egresado[9];
         $obs=$datos_egresado[10];
			$objeto->addAssign('cedula_t',"value",$cedula_t);
			$objeto->addAssign('nombres_t',"value",trim(mb_strtoupper($nombre,'utf-8')));                 
			$objeto->addAssign('sexo',"value",$sexo);
			$objeto->addAssign('nomina',"value",trim(strtoupper(($nomina))));                        
			$objeto->addAssign('fecha_ing',"value",$fecha_ingreso);                        
			$objeto->addAssign('condicion',"value",trim(strtoupper(($condicion))));
			$objeto->addAssign('cargo',"value",  trim(strtoupper(($cargo))));                        
			$objeto->addAssign('fecha_egr',"value",$fecha_egreso);
			$objeto->addAssign('estado',"value",trim(strtoupper($status)));
                        $objeto->addAssign('profesion',"value",trim(strtoupper($profesion)));
                         $objeto->addAssign('obs',"value",trim(strtoupper($obs)));	
                       $boton.= '<td>';
                       $boton.='<input  class="boton" align="top" name="boton" type="button" id="boton" value="Eliminar" onclick="confimar()";';
                       $boton.='</td>';
//                       $boton.='<td>';
//                       $boton.='<input class="boton" type="Button" id="boton" value="Nuevo" onclick="xajax_blanquear();"/>';
//                       $boton.='</td>';                      
                       //$per='PERSONA YA REGISTRADA';
                        $objeto->addAssign('msg',"innerHTML",$per);
                        $objeto->addAssign('botones',"innerHTML",$boton);
                        $objeto->addAssign('guardar',"innerHTML",'');
                   
         }else{
           $objeto = new xajaxResponse();
		$objeto->addAlert('Expediente no registrado en el sistema');  
         }	
	}

	
return $objeto; 
}


function blanquear(){
$objeto = new xajaxResponse();
$objeto->addAssign("cedula_t","value",'');
$objeto->addAssign("nombres_t","value",'');
$objeto->addAssign("sexo","value",'');
$objeto->addAssign("nomina","value",'');
$objeto->addAssign("condicion","value",'');
$objeto->addAssign("fecha_ing","value",'');
$objeto->addAssign("fecha_egr","value",'');
$objeto->addAssign("cargo","value",'');
$objeto->addAssign("cedula","value",'');
$objeto->addAssign("estado","value",'');
$objeto->addAssign("profesion","value",'');
$objeto->addAssign("obs","value",'');
$objeto->addAssign('msg',"innerHTML",'');
$objeto->addAssign('boton',"innerHTML",'');
//$boton.= '<td>';
//$boton.='<input  class="boton" align="top" name="boton" type="button" id="boton" value="Guardar" onclick="xajax_guardar_egresado
//(document.Form.cedula_t.value,document.Form.nombres_t.value,document.Form.sexo.value,document.Form.nomina.value,document.Form.condicion.value,
//document.Form.profesion.value,document.Form.fecha_ing.value,document.Form.fecha_egr.value,document.Form.cargo.value,document.Form.estado.value);"/>';
//$boton.='</td>';
$objeto->addAssign('guardar',"innerHTML",$boton);
$objeto->addAssign('botones',"innerHTML",'');
                   

return $objeto;
}

$xajax = new xajax();
$xajax->registerFunction("eliminar_egresado");
$xajax->registerFunction("restaurar_egresado");
$xajax->registerFunction("editar_egresado");
$xajax->registerFunction("buscar_egresado");
$xajax->registerFunction("blanquear");
$xajax->registerFunction("guardar_egresado");
$xajax->processRequests();
?>


