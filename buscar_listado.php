<?php
header('Content-Type: text/html; charset=UTF-8');
 include('/WEB_APP_PHP/xajax/xajax.php');
 include('../../clases/ClsEgresado.php');
 include('../../control_paginas/control_buscar_listado.php'); // Aquí es donde esta la función xajax
 $xajax->printJavascript("http://$_SERVER[SERVER_NAME]/xajax");

?>
        <meta charset="utf-8">
	<script src="../../js/jquery-1.3.2.min.js" type="text/javascript"></script>
        <link type="text/css" href="../../css/style.css" rel="stylesheet" />
        <script type="text/javascript" src="../../js/jquery.js"></script>
        <script type="text/javascript" language="javascript" src="../../js/funciones.js"></script>
        <link type="text/css" href="../../css/demo_table.css" rel="stylesheet" />
        <script type="text/javascript" language="javascript" src="../../js/jquery.dataTables.js"></script>

</head>
<form name="Form" method="post" action="" id="Form"> 
<fieldset width="750">
	<legend><strong><h3>Buscar Egresado por Cargo</h3></strong></legend>			
	Ingrese Cargo:<br>
	<TABLE   border="1" align="center">
	<input  class="campo"  name="search" type="text" id="search"  size="20" onkeyup= "if(event.keyCode == 13) xajax_buscar_egresado_cargo(document.Form.search.value);" tabindex>
	<img src="../../imagenes/lupa.png" width="28" height="26" border="0" alt="Buscar"  onclick="xajax_buscar_egresado_cargo(document.Form.search.value);">
 
<article id="contenido"></article>

</TABLE>
<table align="center"><TR><TD>
<input  class="boton" align="top" name="boton1" type="button" id="boton1" value="Nueva Búsqueda" onclick="xajax_blanquear();">
</TD></TR></table>
<br><br><br>
	
</form>
</fieldset>