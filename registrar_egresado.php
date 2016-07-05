<?php
session_start();
if (isset ($_SESSION['nivel'])){
    if($_SESSION['nivel']== "1" and $_SESSION['status']== "1" ){
        
    }
header('Content-Type: text/html; charset=UTF-8');
include('/WEB_APP_PHP/xajax/xajax.php');
include('../../clases/ClsEgresado.php');
include('../../control_paginas/control_registrar_egresado.php'); // Aquí es donde esta la función xajax
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
<script language="javascript" src="../../jquery/jquery-1.7.1.min.js"></script>
<script language="javascript" src="../../jquery/jquery.autocomplete.js"></script>
<script language="javascript" src="../../jquery/jquery.autocomplete.css"></script>
<script language='javascript' >
 $(document).ready(function(){
      var x = jQuery.noConflict()
    x("#cedula").autocomplete("../../jquery/buscar_egresado.php", {
        width: 320,
        matchContains: true,
        selectFirst: false

    });});
</script>
<script language='javascript' >
 $(document).ready(function(){
      var y = jQuery.noConflict()
    y("#cargo").autocomplete("../../jquery/buscar_cargo.php", {
        width: 320,
        matchContains: true,
        selectFirst: false

    });});
</script>
<script language='javascript' >
 $(document).ready(function(){
      var y = jQuery.noConflict()
    y("#nomina").autocomplete("../../jquery/buscar_nomina.php", {
        width: 320,
        matchContains: true,
        selectFirst: false

    });});
</script>
<script language='javascript' >
 $(document).ready(function(){
      var y = jQuery.noConflict()
    y("#condicion").autocomplete("../../jquery/buscar_tipo.php", {
        width: 320,
        matchContains: true,
        selectFirst: false

    });});
</script>
<script language='javascript' >
 $(document).ready(function(){
      var y = jQuery.noConflict()
    y("#estado").autocomplete("../../jquery/buscar_estado.php", {
        width: 320,
        matchContains: true,
        selectFirst: false

    });});
</script>
<script>
 var j = jQuery.noConflict()
j(document).ready(function(){
 
  j("#boton").click(function() {
  j("#div").toggle('slow', function() {
    // Animation complete.
  });
}); 

});
</script>
<script type="text/javascript" >
function validarCampo(ID){
	if (document.getElementById(ID).value.length == 2){
		document.getElementById(ID).value = document.getElementById(ID).value + "-";
	}
	if (document.getElementById(ID).value.length == 5){
		document.getElementById(ID).value = document.getElementById(ID).value + "-";
	}
}
</script>
<script type="text/javascript" >
function pasar_valor(ID){
        aidi=ID + "_edit";
	document.getElementById(ID).value = document.getElementById(aidi).value;
}
</script>
<script>
var j = jQuery.noConflict()
j(document).ready(function(){
   
  j("#boton2").click(function() {
  j("#div").toggle('slow', function() {
    // Animation complete.
  });
}); 

});
</script>
<script>
function sf(ID){
document.getElementById(ID).focus();
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
<body onload="sf('cedula');">
<form name="Form" method="post" action="" id="Form"> 
<fieldset>
    <div id="msg" name="msg" align="center"></div>
	<legend><strong><h3>REGISTRAR EGRESADO</h3></strong></legend>			
<TABLE border="0" align="center">
<tr>
<td> 
    <tr>
        <td>
<TABLE border="0" align="left">
<tr>
<td align="left">
   Escriba cédula ó nombre
</td>
</tr>
<tr>
<td>
    <input  class="campo"  name="cedula" type="text" id="cedula" tabindex onkeyup = "if(event.keyCode == 13) xajax_buscar_egresado(document.Form.cedula.value);"/>
</td>
<td>
    <img src="../../imagenes/boton_buscar.png" width="49" height="22" border="0" alt="Buscar"  onclick="xajax_buscar_egresado(document.Form.cedula.value);" class="boton"/>
</td>
</tr>
<tr>
<td align="left">
   Última cédula consultada
</td>
</tr>
<tr>
<td>
    <input readonly="true" class="campo"  name="cedula_2" id="cedula_2" type="text" id="cedula"/>
</td>
</tr>
</table>
        </td>
        </tr>
        
        <tr>
        <td>
        <table border="0" align="center">
<tr align="center">
<TD colspan="5">
    <label>DATOS DEL EXPEDIENTE</label>
    <img src="../../imagenes/carpeta33.png" width="30" height="30"/>
</TD>
</tr>
		<th>Cédula</th> 
		<th>Nombre</th> 
		<th>Sexo</th>
		<th>Nomina</th> 
		<th>Tipo de Contratacion</th>
<tr>	
		<td><input class="campo3" name="cedula_t" type="text" id="cedula_t" value="" size="20"></td>
		<td><input class="campo3" name="nombres_t" type="text" id="nombres_t" value="" size="20"></td>
		<td><input class="campo3" name="sexo" type="text" id="sexo" value="" size="14"></td>
                <td><input ondblclick="pasar_valor('nomina')" class="campo3" name="nomina" type="text" id="nomina" value="" size="14"></td>
		<td><input ondblclick="pasar_valor('condicion')" class="campo3" name="condicion" type="text" id="condicion" value="" size="22"></td>

</tr>
		<th>Profesión</th> 
		<th>Fecha de Ingreso</th> 
		<th>Fecha de Egreso</th>
		<th>Ultimo Cargo</th>
		<th>Estado</th>
<tr>	
		<td><input ondblclick="pasar_valor('profesion')" class="campo3" name="profesion" type="text" id="profesion" value="" size="10"/></td>
                <td><input ondblclick="pasar_valor('fecha_ing')" class="campo3" name="fecha_ing" type="text" id="fecha_ing" value="" size="10" onkeyUp="validarCampo('fecha_ing')" onkeypress="return validar_texto(event)" maxlength="10"></td>
                <td><input ondblclick="pasar_valor('fecha_egr')" class="campo3" name="fecha_egr" type="text" id="fecha_egr" value="" size="14" onkeyUp="validarCampo('fecha_egr')" onkeypress="return validar_texto(event)" maxlength="10"></td>
		<td><input ondblclick="pasar_valor('cargo')" class="campo3" name="cargo" type="text" id="cargo" value="" size="22"></td>
		<td><input ondblclick="pasar_valor('estado')" class="campo3" name="estado" type="text" id="estado" value="" size="22"></td>
</tr>
</TABLE>
<br>
<label>Observación</label>
<br>
<TEXTAREA  maxlength="300" style="width:360px" name="obs" id="obs"></TEXTAREA>
<table align="center">
    <TR>
        <td id="guardar" name="guardar">
        <input  class="boton" align="top" name="boton" type="button" id="boton" value="Guardar" onclick="xajax_guardar_egresado
    (document.Form.cedula_t.value,document.Form.nombres_t.value,document.Form.sexo.value,document.Form.nomina.value,document.Form.condicion.value,
document.Form.profesion.value,document.Form.fecha_ing.value,document.Form.fecha_egr.value,document.Form.cargo.value,document.Form.estado.value,document.Form.obs.value);sf('cedula');"/>
    </td>
        <td>
   <input  class="boton" align="top" name="boton1" type="button" id="boton1" value="Nuevo" onclick="xajax_blanquear(document.Form.cedula_t.value)"/>
    </td>
    
       <td id="botones" name="botones" value=""></td>
</TR>
</table>
<BR></br>
<table align="center" border="0">
<tr align="center"><TD colspan="5">
<label>DATOS DE RECURSOS HUMANOS</label>
<img src="../../imagenes/database.png" width="30" height="30"/>
</TD></tr>	
		<th>Cédula</th> 
		<th>Nombre</th> 
		<th>Sexo</th>
		<th>Nomina</th> 
		<th>Tipo de Contratacion</th>
<tr>	
		<td><input  readonly="true" class="campo3" name="cedula_t_edit" type="text" id="cedula_t_edit" value="" size="20"/></td>
		<td><input  readonly="true" class="campo3" name="nombres_t_edit" type="text" id="nombres_t_edit" value="" size="20"/></td>
		<td><input  readonly="true" class="campo3" name="sexo_edit" type="text" id="sexo_edit" value="" size="14"/></td>
		<td><input  readonly="true" class="campo3" name="nomina_edit" type="text" id="nomina_edit" value="" size="14"/></td>
		<td><input  readonly="true" class="campo3" name="condicion_edit" type="text" id="condicion_edit" value="" size="22"/></td>

</tr>
</TD>
</tr>
		<th>Profesión</th> 
		<th>Fecha de Ingreso</th> 
		<th>Fecha de Egreso</th>
		<th>Ultimo Cargo</th>
		<th>Estado</th>
<tr>	
		<td><input  readonly="true" class="campo3" name="profesion_edit" type="text" id="profesion_edit" value="" size="10"/></td>
		<td><input  readonly="true" class="campo3" name="fecha_ing_edit" type="text" id="fecha_ing_edit" value="" size="10" /></td>
		<td><input  readonly="true" class="campo3" name="fecha_egr_edit" type="text" id="fecha_egr_edit" value="" size="14" /></td>
		<td><input  readonly="true" class="campo3" name="cargo_edit" type="text" id="cargo_edit" value="" size="22"/></td>
		<td><input  readonly="true" class="campo3" name="estado_edit" type="text" id="estado_edit" value="" size="22"/></td>
</tr>
</table>
<table align="center">
    <TR>
<td id="botones1" name="botones1" value=""></td>
</TR>
</table>
</fieldset>
</form>
</body>
 <?php
}else{
    header("location: ../inicio/index.php");
    }
?>  
