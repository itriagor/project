<?php
function cancelar(){
     $tabla2.='<table border="0" align="center">
<tr align="center">    
<TD colspan="5">
    <br><br>
    <label>USUARIO NUEVO</label>
    <img src="../../imagenes/User.png" width="30" height="30"/>
</TD>

</tr>
		<th>Cédula</th> 
		<th>Usuario</th> 
		<th>Clave</th>
		<th>Nivel</th> 
		<th>Estado</th>
<tr>	
		<td><input class="campo3" name="cedula_t" type="text" id="cedula_t" value="" size="20"></td>
		<td><input class="campo3" name="log" type="tex" id="log" value="" size="20"></td>
		<td><input class="campo3" name="pwd" type="text" id="pwd" value="" size="14"></td>
		<td>
                    <SELECT id="nivel" name="nivel">
                   <OPTION VALUE="">Seleccione</OPTION>
                   <OPTION VALUE="1">Adminitrador</OPTION>
                   <OPTION VALUE="2">Analista</OPTION>
                   <OPTION VALUE="3">Analista II</OPTION> 
                    </SELECT> 
                </td>
		<td>
                    <SELECT id="status" name="status">
                   <OPTION VALUE="">Seleccione</OPTION>
                   <OPTION VALUE="1">Activo</OPTION>
                   <OPTION VALUE="2">Inactivo</OPTION>                  
                    </SELECT>
                </td>

</tr>
</TABLE>
        
        <table align="center">
    <TR>
    <td id="guardar" name="guardar">
        <input  class="boton" align="top" name="boton" type="button" id="boton" value="Guardar" onclick="xajax_guardar_usuario
    (document.Form.cedula_t.value,document.Form.log.value,document.Form.pwd.value,document.Form.nivel.value,document.Form.status.value);"/>
    </td> 
        <td>
   <input  class="boton" align="top" name="boton1" type="button" id="boton1" value="Nuevo" onclick="xajax_blanquear();"/>
    </td>
</TR>
</table>';
     $egre= new ClsUsuario();
		$datos_usuario= $egre->listar_usuarios();
      		if ($datos_usuario)
      		{
        $objeto = new xajaxResponse();
        $tabla.='<TABLE   border="0" align="center" class="tabla1" id="resultados" name="resultados">';
	$tabla.='<tr align="center">';
	$tabla.= '<TD colspan="5">';
	$tabla.='<label>LISTADO DE USUARIOS</label>';
	$tabla.='</TD>';
	$tabla.='</tr>';
	$tabla.='<th>Cédula</th>';
	$tabla.='<th>Usuario</th>';
	$tabla.='<th>Nivel</th>';
	$tabla.='<th>Estado</th>';
        $tabla.='<th>Editar</th>';
        $tabla.='<th>Borrar</th>';
        $tabla.= $datos_usuario;
        $tabla.='</TABLE>';
	$objeto->addAssign('tabla',"innerHTML",$tabla);
        $objeto->addAssign('tablax',"innerHTML",$tabla2);
                }
return $objeto;
}
function listar_usuarios(){
		$objeto = new xajaxResponse();
		$egre= new ClsUsuario();
		$datos_usuario= $egre->listar_usuarios();
      		if ($datos_usuario)
      		{
        $tabla.='<TABLE   border="0" align="center" class="tabla1" id="resultados" name="resultados">';
	$tabla.='<tr align="center">';
	$tabla.= '<TD colspan="5">';
	$tabla.='<label>LISTADO DE USUARIOS</label>';
	$tabla.='</TD>';
	$tabla.='</tr>';
	$tabla.='<th>Cédula</th>';
	$tabla.='<th>Usuario</th>';
	$tabla.='<th>Nivel</th>';
	$tabla.='<th>Estado</th>';
        $tabla.='<th>Editar</th>';
        $tabla.='<th>Borrar</th>';
        $tabla.= $datos_usuario;
        $tabla.='</TABLE>';
	$objeto->addAssign('tabla',"innerHTML",$tabla);
	}	
	
return $objeto; 
}

function update_usuario($cedula,$log,$nivel,$status){
    $egre= new ClsUsuario();
    $datos_usuario= $egre->update_usuario($cedula, $log, $nivel, $status);
    if(!$datos_usuario){
        $objeto = new xajaxResponse();
        $egre= new ClsUsuario();
		$datos_usuario= $egre->listar_usuarios();
      		if ($datos_usuario)
      		{
        $tabla.='<TABLE   border="0" align="center" class="tabla1" id="resultados" name="resultados">';
	$tabla.='<tr align="center">';
	$tabla.= '<TD colspan="5">';
	$tabla.='<label>LISTADO DE USUARIOS</label>';
	$tabla.='</TD>';
	$tabla.='</tr>';
	$tabla.='<th>Cédula</th>';
	$tabla.='<th>Usuario</th>';
	$tabla.='<th>Nivel</th>';
	$tabla.='<th>Estado</th>';
        $tabla.='<th>Editar</th>';
        $tabla.='<th>Borrar</th>';
        $tabla.= $datos_usuario;
        $tabla.='</TABLE>';
	$objeto->addAssign('tabla',"innerHTML",$tabla);
        $tabla2.='<table border="0" align="center">
<tr align="center">    
<TD colspan="5">
    <br><br>
    <label>USUARIO NUEVO</label>
    <img src="../../imagenes/User.png" width="50" height="50"/>
</TD>

</tr>
		<th>Cédula</th> 
		<th>Usuario</th> 
		<th>Clave</th>
		<th>Nivel</th> 
		<th>Estado</th>
<tr>	
		<td><input class="campo3" name="cedula_t" type="text" id="cedula_t" value="" size="20"></td>
		<td><input class="campo3" name="log" type="tex" id="log" value="" size="20"></td>
		<td><input class="campo3" name="pwd" type="text" id="pwd" value="" size="14"></td>
		<td>
                    <SELECT id="nivel" name="nivel">
                   <OPTION VALUE="">Seleccione</OPTION>
                   <OPTION VALUE="1">Adminitrador</OPTION>
                   <OPTION VALUE="2">Analista</OPTION>
                   <OPTION VALUE="3">Analista II</OPTION> 
                    </SELECT> 
                </td>
		<td>
                    <SELECT id="status" name="status">
                   <OPTION VALUE="">Seleccione</OPTION>
                   <OPTION VALUE="1">Activo</OPTION>
                   <OPTION VALUE="2">Inactivo</OPTION>                  
                    </SELECT>
                </td>

</tr>
</TABLE>
        
        <table align="center">
    <TR>
      <td id="guardar" name="guardar">
        <input  class="boton" align="top" name="boton" type="button" id="boton" value="Guardar" onclick="xajax_guardar_usuario
    (document.Form.cedula_t.value,document.Form.log.value,document.Form.pwd.value,document.Form.nivel.value,document.Form.status.value);"/>
    </td>
        <td>
   <input  class="boton" align="top" name="boton1" type="button" id="boton1" value="Nuevo" onclick="xajax_blanquear();"/>
    </td>
</TR>
</table>';
        $objeto->addAssign('tablax',"innerHTML",$tabla2);
        $objeto->addAlert('Edición Exitosa');
	}	
    }else{
       $objeto = new xajaxResponse();
       $objeto->addAlert('Edición Fallida');
       
    }
    return $objeto; 
}
function editar_usuario($cedula){
        if($cedula=='18961117'){
            $objeto = new xajaxResponse();
            $objeto->addAlert('Este usuario no puede ser editado');
        }else{
        $egre= new ClsUsuario();
        $datos_usuario= $egre->buscar_usuario($cedula);
        $objeto = new xajaxResponse();
        $per='EDITAR USUARIO';
        $objeto->addAssign('msg',"innerHTML",$per);
        $objeto->addAssign('cedula_t',"value",$datos_usuario[0]);
        $objeto->addAssign('log',"value",$datos_usuario[1]);
        $objeto->addAssign('nivel',"value",$datos_usuario[2]);
        $objeto->addAssign('status',"value",$datos_usuario[3]);
        if($datos_usuario[2]==1 or $datos_usuario[2]==2 or $datos_usuario[2]==3){
        
            if($datos_usuario[2]==1){
        $select='<SELECT id="nivel" name="nivel">                  
                   <OPTION VALUE="1">Adminitrador</OPTION>
                   <OPTION VALUE="2">Analista</OPTION>
                   <OPTION VALUE="3">Analista II</OPTION> 
                    </SELECT> '; 
        }
            
            if($datos_usuario[2]==2){
                 $select='<SELECT id="nivel" name="nivel">
                   <OPTION VALUE="2">Analista</OPTION>   
                   <OPTION VALUE="1">Adminitrador</OPTION>
                   <OPTION VALUE="3">Analista II</OPTION> 
                    </SELECT> ';
        }
        
        if($datos_usuario[2]==3){
                 $select='<SELECT id="nivel" name="nivel">
                   <OPTION VALUE="3">Analista II</OPTION> 
                   <OPTION VALUE="2">Analista</OPTION>   
                   <OPTION VALUE="1">Adminitrador</OPTION>                                  
                    </SELECT> ';
        }
        }
        
        if($datos_usuario[3]==1){
         $select2='<SELECT id="status" name="status">                 
                   <OPTION VALUE="1">Activo</OPTION>
                   <OPTION VALUE="2">Inactivo</OPTION>                  
                    </SELECT>';   
        }
        else{
             $select2='<SELECT id="status" name="status">
                   <OPTION VALUE="2">Inactivo</OPTION> 
                   <OPTION VALUE="1">Activo</OPTION>                                    
                    </SELECT>';
        }
        
       $tabla.= '<table border="0" align="center">
<tr align="center">    
<TD colspan="5">
    <br><br>
    <label>EDITAR USUARIO</label>
    <img src="../../imagenes/User.png" width="30" height="30"/>
</TD>

</tr>
		<th>Cédula</th> 
		<th>Usuario</th> 
		<th>Nivel</th> 
		<th>Status</th>
<tr>	
		<td><input readonly="true" class="campo3" name="cedula_t" type="text" id="cedula_t" value="'.$datos_usuario[0].'" size="20"></td>
		<td><input readonly="true" class="campo3" name="log" type="tex" id="log" value="'.$datos_usuario[1].'" size="20"></td>
		<td>
                    '.$select.'
                </td>
		<td>
                    '.$select2.'
                </td>

</tr>
</TABLE>
<table align="center">
    <TR>
   <td id="guardar" name="guardar">
        <input  class="boton" align="top" name="boton" type="button" id="boton" value="Guardar" onclick="xajax_update_usuario
    (document.Form.cedula_t.value,document.Form.log.value,document.Form.nivel.value,document.Form.status.value);"/>
    </td>
    <td id="cancelar" name="cancelar">
        <input  class="boton" align="top" name="botonz" type="button" id="botonz" value="Cancelar" onclick="xajax_cancelar()
    </td>
</TR>
</table>';
         $objeto->addAssign('tablax',"innerHTML",$tabla);
        }
        
 return $objeto;   
}
function guardar_usuario($cedula,$login,$pass,$nivel,$status){
                  
    if((empty($cedula)) or (empty($login)) or (empty($pass)) or (empty($nivel)) or (empty($status)) ){
        $objeto = new xajaxResponse();
          if(empty($cedula)){
         $objeto->addAlert('Ingrese cédula');     
        }
        if(empty($login)){
         $objeto->addAlert('Ingrese nombre de usuario');   
        }
        if(empty($pass)){
         $objeto->addAlert('Ingrese clave de acceso');   
        }
        if(empty($nivel)){
         $objeto->addAlert('Seleccione un nivel');
        }
        if(empty($status)){
         $objeto->addAlert('Seleccione un estado');
        }
        
    }else{
        $cedula=strtoupper($cedula);
        $login=strtoupper($login);
        $pass=md5($pass);
        $nivel=strtoupper($nivel);
        $status=strtoupper($status);       
        
        $sql="insert into personal_egresado.usuario (cedula,login,password,nivel,status)
values ($cedula,'$login','$pass','$nivel','$status')"; 
        $conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
        $consulta = $conectar->query($sql);
        if($consulta){
             $objeto = new xajaxResponse();
             $egre= new ClsUsuario();
		$datos_usuario= $egre->listar_usuarios();
      		if ($datos_usuario)
      		{
        $tabla.='<TABLE   border="0" align="center" class="tabla1" id="resultados" name="resultados">';
	$tabla.='<tr align="center">';
	$tabla.= '<TD colspan="5">';
	$tabla.='<label>LISTADO DE USUARIOS</label>';
	$tabla.='</TD>';
	$tabla.='</tr>';
	$tabla.='<th>Cédula</th>';
	$tabla.='<th>Usuario</th>';
	$tabla.='<th>Nivel</th>';
	$tabla.='<th>Estado</th>';
        $tabla.='<th>Editar</th>';
        $tabla.='<th>Borrar</th>';
        $tabla.= $datos_usuario;
        $tabla.='</TABLE>';
	$objeto->addAssign('tabla',"innerHTML",$tabla);
        $objeto->addAlert('Registro Exitoso');
        }
        }else{
             $objeto = new xajaxResponse();
             $objeto->addAlert('Falla en el registro'); 
        }
    }
        
        
 return $objeto;   
}
function borrar_usuario($cedula){
        if($cedula=='18961117'){
            $objeto = new xajaxResponse();
            $objeto->addAlert('Este usuario no puede ser eliminado');
        }else{
        $sql="delete from personal_egresado.usuario where cedula=$cedula"; 
        $conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
        $consulta = $conectar->query($sql);
        if($consulta){
             $objeto = new xajaxResponse();
             $egre= new ClsUsuario();
		$datos_usuario= $egre->listar_usuarios();
      		if ($datos_usuario)
      		{
        $objeto = new xajaxResponse();
        $tabla.='<TABLE   border="0" align="center" class="tabla1" id="resultados" name="resultados">';
	$tabla.='<tr align="center">';
	$tabla.= '<TD colspan="5">';
	$tabla.='<label>LISTADO DE USUARIOS</label>';
	$tabla.='</TD>';
	$tabla.='</tr>';
	$tabla.='<th>Cédula</th>';
	$tabla.='<th>Usuario</th>';
	$tabla.='<th>Nivel</th>';
	$tabla.='<th>Estado</th>';
        $tabla.='<th>Editar</th>';
        $tabla.='<th>Borrar</th>';
        $tabla.= $datos_usuario;
        $tabla.='</TABLE>';
	$objeto->addAssign('tabla',"innerHTML",$tabla);
        $objeto->addAlert('Registro Eliminado');
        }
        }else{
             $objeto = new xajaxResponse();
             $objeto->addAlert('Falla en eliminación'); 
        }
        }
        
 return $objeto;   
}

function blanquear(){
$objeto = new xajaxResponse();
$objeto->addAssign("cedula_t","value",'');
$objeto->addAssign("log","value",'');
$objeto->addAssign("pwd","value",'');
$objeto->addAssign("nivel","value",'');
$objeto->addAssign("status","value",'');
return $objeto;
}

$xajax = new xajax();
$xajax->registerFunction("cancelar");
$xajax->registerFunction("update_usuario");
$xajax->registerFunction("borrar_usuario");
$xajax->registerFunction("listar_usuarios");
$xajax->registerFunction("editar_usuario");
$xajax->registerFunction("blanquear");
$xajax->registerFunction("guardar_usuario");
$xajax->processRequests();
?>