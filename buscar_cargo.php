<?php
header('Content-Type: text/html; charset=UTF-8');
include('/WEB_APP_PHP/xajax/xajax.php');
include('../../clases/ClsEgresado.php');
include('../../clases/Clsconexion_bd.php');
include('../../control_paginas/control_buscar_cargo.php'); // Aquí es donde esta la función xajax
 $xajax->printJavascript("http://$_SERVER[SERVER_NAME]/xajax");

?>
<link href="../../css/sitdoc.css" rel="stylesheet" type="text/css">
<script src="../../js/jquery-1.3.2.min.js" type="text/javascript"></script>
<script src="../../js/right.js"></script>
<script src="../../js/right-autocompleter.js"></script>
<script> 
new Autocompleter('cargo', {
  url: 'procesar_cargo.php',
  param: 'search'
});
</script>

<script>
$(document).ready(function(){
   
  $("#lupa").click(function() {
  $("#div").fadeIn('slow', function() {
    // Animation complete.
  });
}); 

});
</script>
<script>
$(document).ready(function(){
   
  $("#boton2").click(function() {
  $("#div").toggle('slow', function() {
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

<body onload="sf('cargo');">
<form name="Form" method="post" action="" id="Form"> 
<fieldset>
<div id="div" name="div" value="" ></div>

	<legend><strong><h3>Buscar Egresado por Cargo</h3></strong></legend>			
	Ingrese Cargo:<br>
	
	<input  class="campo4"   name="cargo" type="text" id="cargo"   onkeyup = "if(event.keyCode == 13) xajax_buscar_cargo(document.Form.cargo.value);" tabindex data-autocompleter="{url:'../formularios/procesar_cargo.php'}">
	<img src="../../imagenes/lupa.png" width="28" height="26" border="0" alt="Buscar" id="lupa" name="lupa" onclick="xajax_buscar_cargo(document.Form.cargo.value);">
	<div id="NavPosicion" name="NavPosicion"></div>
	
<table align="center"><TR><TD>
<input  class="boton" align="top" name="boton1" type="button" id="boton1" value="Nueva Búsqueda" onclick="xajax_blanquear();">
</TD></TR></table>	
</form>
</fieldset>
