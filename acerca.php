<?php
session_start();
if (isset ($_SESSION['nivel'])){
    if($_SESSION['nivel']== "1" and $_SESSION['status']== "1" ){
        
    }
header('Content-Type: text/html; charset=UTF-8');
include('../disenio/encabezado.php');
  if($_SESSION['nivel']== "1" and $_SESSION['status']== "1" ){
    include('../disenio/menu_usuario.php');    
    }else{
include('../disenio/menu_usuario2.php');}
?>
<head>
<link href="../../css/sitdoc.css" rel="stylesheet" type="text/css"/>
<link href="../../jquery/sitdoc.css" rel="stylesheet" type="text/css"/>
<script language="javascript" src="../../jquery/jquery-1.7.1.min.js"></script>
<script language="javascript" src="../../jquery/jquery.autocomplete.js"></script>
<script language="javascript" src="../../jquery/jquery.autocomplete.css"></script>
<script>
var j = jQuery.noConflict()
j(document).ready(function(){
   
  j("#img1").click(function() {
  j("#imgx1").fadeToggle('slow', function() {
    // Animation complete.
  });
}); 

});
</script>
<script>
var j = jQuery.noConflict()
j(document).ready(function(){
   
  j("#imgx1").click(function() {
  j("#img1").toggle('slow', function() {
    // Animation complete.
  });
}); 

});
</script>
</head>
<fieldset class="fieldset">
	<legend><strong><h3>SISTEMA PERSONAL EGRESADO</h3></strong></legend>
		
		<table class="tcuadroformulario" align="center">
		<TR>
                <TD>
<!-- Inicio de los paneles de contenidos -->

    <div id="acerca_de"  align="center" style="background: #ffffFF url(../../imagenes/cvglogo_background.png) center;">
		<br>
<!-- Informacion de la aplicacion -->
        <table border="0">
          <colgroup>
            <col width="200">
            <col width="200">
            <col width="100">
          </colgroup>
          <tbody>
            <tr>
              <td colspan="3" align="center" class="eticampofor">SISTEMA PERSONAL EGRESADO</td>
            </tr>
            <tr>
              <td colspan="3"><hr></td>
            </tr>
            <tr>
              <td colspan="3" align="center" class="eticampofor">Creditos</td>
            </tr>
           <!-- <tr>
              <td colspan="3">&nbsp;</td>
            </tr>-->
            <tr>
              <td></td>
              <td class="eticampofor">Desarrollado por:</td>
              <td class="campodesc">Tclgo. Rafael Itriago (UNEG)</td>
            </tr>
            <tr>
              <td colspan="3">&nbsp;</td>
            </tr>
            <tr>
              <td></td>
              <td class="eticampofor">Supervisi&oacute;n:</td>
              <td class="campodesc">Ing. Iliana Silva(CVG)</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
              <td class="campodesc">Ing. Hugo Fernández(CVG)</td>
            </tr>
	  
            <tr>
              <td colspan="3"><hr></td>
            </tr>
            <tr>
              <td colspan="3" align="center" class="eticampofor">Desarrollado en la Gerencia de Archivo Central</td>
            </tr>
            <tr>
              <td colspan="3" align="center" class="campodesc">&copy;2012 Corporaci&oacute;n Venezolana de Guayana. Algunos derechos reservados.</td>
            </tr>
          </tbody>
        </table>
        <br>
        
	</div>

	
<!-- Fin de los paneles de contenidos -->
				</TD>
			</TR>
		</table>
	</div>
</fieldset>
<?php
}else{
    header("location: ../inicio/index.php");
    }
?>
