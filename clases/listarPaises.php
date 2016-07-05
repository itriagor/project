<?php 
header('Content-Type: text/html; charset=UTF-8');
$fecha1='2010-01-01';
$fecha2='2010-12-31';
$conexion = new Clsconexion_bd();
	$conectar = $conexion->conex_intranet();
	$sql = "SELECT cedula, nombres,apellidos,estado,sexo,nomina,cod_condicion,fecha_ing,fecha_egr,cod_cargo FROM tablasmaestras.maestra WHERE tablasmaestras.maestra.fecha_egr<='$fecha1' and tablasmaestras.maestra.fecha_egr>='$fecha2' union all SELECT cedula, nombres,apellidos,cast(status as char),sexo,nomina,condicion,fec_ing_obr,fec_egr_obr,cod_cargo FROM tablasobrero.maestra WHERE tablasobrero.maestra.fec_egr_obr>='$fecha1' and tablasobrero.maestra.fec_egr_obr<='$fecha2'";
	$consulta = $conectar->query($sql);	
?>

 <script type="text/javascript" language="javascript" src="../js/jslistadopaises.js"></script>
            <table cellpadding="0" cellspacing="0" border="1" class="display" id="tabla_lista_paises">
                <thead>
                    <tr>
		<th>Cédula</th> 
 		<th>Nombre</th> 
		<th>Sexo</th>
		<th>Nomina</th> 
		<th>Tipo de Contratacion</th>
		<th>Fecha de Ingreso</th> 
		<th>Fecha de Egreso</th>
		<th>Ultimo Cargo</th>
		<th>Estado</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th></th>
                        <th></th>
                       
                     
                    </tr>
                </tfoot>
                  <tbody>
                    <?php

     
                   while($reg= $consulta->fetch())
                   {
 			echo '<tr>';
			echo '<td>'.mb_convert_encoding($reg['cedula'], "UTF-8").'</td>';
			echo '<td >'.mb_convert_encoding($reg['nombres'].''.$reg['apellidos'], "UTF-8").'</td>';
			echo '<td>'.mb_convert_encoding($reg['sexo'], "UTF-8").'</td>';
			echo '<td>'.mb_convert_encoding($reg['nomina'], "UTF-8").'</td>';
			echo '<td>'.mb_convert_encoding($reg['cod_condicion'], "UTF-8").'</td>';
			echo '<td >'.mb_convert_encoding($reg['fecha_ing'], "UTF-8").'</td>';
			echo '<td>'.mb_convert_encoding($reg['fecha_egr'], "UTF-8").'</td>';
			echo '<td>'.mb_convert_encoding($reg['cod_cargo'], "UTF-8").'</td>';
			echo '<td>'.mb_convert_encoding($reg['estado'], "UTF-8").'</td>';
                               echo '</tr>';
                     
                        }
                    ?>
                <tbody>
            </table>
