<?php
session_start();
if (isset ($_SESSION['nivel'])){
    if($_SESSION['nivel']== "1" and $_SESSION['status']== "1" ){
        
    }
header('Content-Type: text/html; charset=UTF-8');
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
<script type="text/javascript" src="../formularios/slider/js/jquery-1.7.1.min.js"></script> 
<link rel="stylesheet" type="text/css" href="../formularios/slider/css/styleSlider2.css" media="screen" />
</head>
<fieldset class="fieldset">
	<legend><strong><h3>¡Bienvenidos!</h3></strong></legend>
        	<table width="100%" border="0">
                    <tr>
                        <TD></TD> 
                        <TD class="titulox"> 
                   <img src="../../imagenes/titulo.jpg"/>
                        </TD>
                        
                    </tr>
                <TR>                  
		<TD width="30%" colspan="2" height="50%" >
                    <div style="text-align: right; width: 20%">
                    <div id="wowslider-container1">
                    <div class="ws_images">
                    <a href="#"><img src="../formularios/slider/images/imagen1.png"  alt="img0" id="wows0"/></a>
                    <a href="#"><img src="../formularios/slider/images/imagen4.png" alt="img1" id="wows1"/></a>                   
                     </div>            
                    </div>
                    </div>
                    <script type="text/javascript" src="../formularios/slider/js/script7.js"></script>
		</TD> 
			
                    <TD width="40%"  height="10%"><br><br><br><br><br><br><br>
                        <img src="../../imagenes/carpetas.jpg" width="400" height="244" align="right"/>
                    </TD> 
		</TR>
		</table>
</fieldset>
<?php
}else{
    header("location: ../inicio/index.php");
    }
?>