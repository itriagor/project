<?php
session_start();
if (isset ($_SESSION['nivel'])){
    if($_SESSION['nivel']== "1" and $_SESSION['status']== "1" ){
        
    }
header('Content-Type: text/html; charset=UTF-8');
include('/WEB_APP_PHP/xajax/xajax.php');
include('../../clases/ClsUsuario.php');
include('../../control_paginas/control_registrar_usuario.php'); // Aquí es donde esta la función xajax
 $xajax->printJavascript("http://$_SERVER[SERVER_NAME]/xajax");
 include('../disenio/encabezado.php');

 if($_SESSION['nivel']== "1" and $_SESSION['status']== "1" ){
    include('../disenio/menu_usuario.php');    
    }

if($_SESSION['nivel']== "2" and $_SESSION['status']== "1" ){
include('../disenio/menu_usuario2.php');
}

if($_SESSION['nivel']== "3" and $_SESSION['status']== "1" ){
include('../disenio/menu_usuario3.php');
}
 ?>
<head>
<link href="../../css/sitdoc.css" rel="stylesheet" type="text/css">
<script src="../../js/jquery-1.3.2.min.js" type="text/javascript"></script>
<link href="../../jquery/sitdoc.css" rel="stylesheet" type="text/css">
<script>
function sf(ID){
document.getElementById(ID).focus();
}
</script>
<script>
function confirmar(ID){
var preg=confirm ("¿Está seguro que desea elmininar este usuario?");
if (preg==true){
xajax_borrar_usuario(ID);
}
else{
return false;
}
}
</script>
<script>
function confirmar_edit(ID){
var preg=confirm ("¿Está seguro que desea editar este usuario?");
if (preg==true){
xajax_editar_usuario(ID);
}
else{
return false;
}
}
</script>
<script>
function validar_texto(e){
    tecla = (document.all) ? e.keyCode : e.which;

    //Tecla de retroceso para borrar, siempre la permite
    if (tecla==8){
        return true;
    }
        
    // Patron de entrada, en este caso solo acepta numeros
    patron =/[0-9]/;
    
    tecla_final = String.fromCharCode(tecla);
    
    return patron.test(tecla_final);
}
</script> 
</head>
<body onload="xajax_listar_usuarios();sf('cedula_t');">
<form name="Form" method="post" action="" id="Form"> 
<fieldset>
	<legend><strong><h3>REGISTRAR USUARIO</h3></strong></legend>
        <div id="tablax" name="tablax">
<table border="0" align="center">
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
		<td><input class="campo3" name="cedula_t" type="text" id="cedula_t" value="" size="20" onkeypress="return validar_texto(event)" maxlength="9"></td>
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
   <input  class="boton" align="top" name="boton1" type="button" id="boton1" value="Nuevo" onclick="xajax_blanquear();sf('cedula_t');"/>
    </td>   
</TR>
</table></div>
 <br>
 <div id="tabla" name="tabla" value=""> </div>
</form>
</fieldset>
  <?php
}else{
    header("location: ../inicio/index.php");
    }
?> 