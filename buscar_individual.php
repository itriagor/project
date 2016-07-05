<?php
session_start();
if (isset ($_SESSION['nivel'])){
    if($_SESSION['nivel']== "1" and $_SESSION['status']== "1" ){
        
    }
header('Content-Type: text/html; charset=UTF-8');
include('/WEB_APP_PHP/xajax/xajax.php');
include('../../clases/ClsEgresado.php');
include('../../control_paginas/control_buscar_individual.php'); // Aquí es donde esta la función xajax
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
<link href="../../jquery/sitdoc.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../../jquery/jquery-1.7.1.min.js"></script>
<script language="javascript" src="../../jquery/jquery.autocomplete.js"></script>
<script language="javascript" src="../../jquery/jquery.autocomplete.css"></script>
<script language='javascript' >
 $(document).ready(function(){
      var x = jQuery.noConflict()
    x("#cedula").autocomplete("../../jquery/buscar_individual.php", {
        width: 320,
        matchContains: true,
        selectFirst: false

    });});
</script>
<script language='javascript' >
 $(document).ready(function(){
      var y = jQuery.noConflict()
    y("#cargo_edit").autocomplete("../../jquery/buscar_cargo.php", {
        width: 320,
        matchContains: true,
        selectFirst: false

    });});
</script>
<script language='javascript' >
 $(document).ready(function(){
      var y = jQuery.noConflict()
    y("#nomina_edit").autocomplete("../../jquery/buscar_nomina.php", {
        width: 320,
        matchContains: true,
        selectFirst: false

    });});
</script>
<script language='javascript' >
 $(document).ready(function(){
      var y = jQuery.noConflict()
    y("#condicion_edit").autocomplete("../../jquery/buscar_tipo.php", {
        width: 320,
        matchContains: true,
        selectFirst: false

    });});
</script>
<script language='javascript' >
 $(document).ready(function(){
      var y = jQuery.noConflict()
    y("#estado_edit").autocomplete("../../jquery/buscar_estado.php", {
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
<script type="text/javascript" >
function validaCampo(){
	if (document.getElementById('fecha_ing_edit').value.length == 2){
		document.getElementById('fecha_ing_edit').value = document.getElementById('fecha_ing_edit').value + "-";
	}
	if (document.getElementById('fecha_ing_edit').value.length == 5){
		document.getElementById('fecha_ing_edit').value = document.getElementById('fecha_ing_edit').value + "-";
	}
}
</script>
<script type="text/javascript" >
function validaCampor(){
	if (document.getElementById('fecha_egr_edit').value.length == 2){
		document.getElementById('fecha_egr_edit').value = document.getElementById('fecha_egr_edit').value + "-";
	}
	if (document.getElementById('fecha_egr_edit').value.length == 5){
		document.getElementById('fecha_egr_edit').value = document.getElementById('fecha_egr_edit').value + "-";
	}
}
</script>
</head>
<body onload="sf('cedula');">
    <form name="Form" method="post" action="" id="Form">
<fieldset>


	<legend><strong><h3>BUSCAR EGRESADO</h3></strong></legend>
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
    <input maxlength="" class="campo"  name="cedula" type="text" id="cedula" tabindex onkeyup = "if(event.keyCode == 13) xajax_buscar_egresado(document.Form.cedula.value);"/>
</td>
<td>
    <img src="../../imagenes/boton_buscar.png" width="49" height="22" border="0" alt="Buscar"  onclick="xajax_buscar_egresado(document.Form.cedula.value);sf('cedula');" class="boton"/>
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
		<td><input readonly="true" class="campo3" name="cedula_t" type="text" id="cedula_t" value="" size="20"></td>
		<td><input readonly="true" class="campo3" name="nombres_t" type="text" id="nombres_t" value="" size="20"></td>
		<td><input readonly="true" class="campo3" name="sexo" type="text" id="sexo" value="" size="14"></td>
		<td><input readonly="true" class="campo3" name="nomina" type="text" id="nomina" value="" size="14"></td>
		<td><input readonly="true" class="campo3" name="condicion" type="text" id="condicion" value="" size="22"></td>

</tr>
		<th>Profesión</th> 
		<th>Fecha de Ingreso</th> 
		<th>Fecha de Egreso</th>
		<th>Ultimo Cargo</th>
		<th>Estado</th>
<tr>	
		<td><input readonly="true" class="campo3" name="profesion" type="text" id="profesion" value="" size="10"></td>
		<td><input readonly="true" class="campo3" name="fecha_ing" type="text" id="fecha_ing" value="" size="10"></td>
		<td><input readonly="true" class="campo3" name="fecha_egr" type="text" id="fecha_egr" value="" size="14"></td>
		<td><input readonly="true" class="campo3" name="cargo" type="text" id="cargo" value="" size="22"></td>
		<td><input readonly="true" class="campo3" name="estado" type="text" id="estado" value="" size="22"></td>
</tr>
</TABLE>
<br>
<label>Observación</label>
<br>
<TEXTAREA  maxlength="300" style="width:360px" name="obs" id="obs" readonly="true"></TEXTAREA>
</td>
</tr>
<table align="center">
    <TR>
        <td>
        <input  class="boton" align="top" name="boton1" type="button" id="boton1" value="Nuevo" onclick="xajax_blanquear();sf('cedula');"/>
        </td>
    <TD>
<?php
if($_SESSION['nivel']== "1"){
echo '<input class="boton" type="Button" id="boton" value="Editar">';
}
?>
    </TD>
    </TR>
</table>
<br><br><br>
<div id="div" style="display: none">
<table align="center" border="0">
<tr align="center"><TD colspan="5">
<label>DATOS  A EDITAR DEL EXPEDIENTE</label>
</TD></tr>	
		<th>Cédula</th> 
		<th>Nombre</th> 
		<th>Sexo</th>
		<th>Nomina</th> 
		<th>Tipo de Contratacion</th>
<tr>	
		<td><input  readonly="true" class="campo3" name="cedula_t_edit" type="text" id="cedula_t_edit" value="" size="20"/></td>
		<td><input  class="campo3" name="nombres_t_edit" type="text" id="nombres_t_edit" value="" size="20"/></td>
		<td><input  class="campo3" name="sexo_edit" type="text" id="sexo_edit" value="" size="14"/></td>
		<td><input  class="campo3" name="nomina_edit" type="text" id="nomina_edit" value="" size="14"/></td>
		<td><input  class="campo3" name="condicion_edit" type="text" id="condicion_edit" value="" size="22"/></td>

</tr>
</TD>
</tr>
		<th>Profesión</th> 
		<th>Fecha de Ingreso</th> 
		<th>Fecha de Egreso</th>
		<th>Ultimo Cargo</th>
		<th>Estado</th>
<tr>	
		<td><input  class="campo3" name="profesion_edit" type="text" id="profesion_edit" value="" size="10"/></td>
		<td><input  class="campo3" name="fecha_ing_edit" type="text" id="fecha_ing_edit" value="" size="10" onkeypress="return validar_texto(event)" maxlength="10" onkeyUp="validaCampo()"/></td>
		<td><input  class="campo3" name="fecha_egr_edit" type="text" id="fecha_egr_edit" value="" size="14" onkeypress="return validar_texto(event)" maxlength="10" onkeyUp="validaCampo()"/></td>
		<td><input  class="campo3" name="cargo_edit" type="text" id="cargo_edit" value="" size="22"/></td>
		<td><input  class="campo3" name="estado_edit" type="text" id="estado_edit" value="" size="22"/></td>
</tr>
</table>
<table align="center"><TR><TD>
<input type="Button" id="boton2" value="Guardar" tabindex class="boton"  onclick="xajax_editar_egresado
    (document.Form.cedula_t_edit.value,document.Form.nombres_t_edit.value,document.Form.sexo_edit.value,document.Form.nomina_edit.value,document.Form.condicion_edit.value,
document.Form.profesion_edit.value,document.Form.fecha_ing_edit.value,document.Form.fecha_egr_edit.value,document.Form.cargo_edit.value,document.Form.estado_edit.value);sf('cedula');"/>
</TD></TR></table>
</div>	 
</fieldset>
<?php
}else{
    header("location: ../inicio/index.php");
    }
?>
