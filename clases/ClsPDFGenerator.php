<?php

	/******************************************************************
	 * SIAC - Convertidor de XHTML a PDF                              *
	 * Version: b065                                                  *
	 ******************************************************************/

class PDFGenerator {

    /** Crea un nuevo PDF a partir de un archivo XHTML y lo retorna al navegador
     *
     * @param string $input Archivo XHTML a convertir. Debe ser XHTML 1.0 Strict VALIDO.
     * @param string $output Lugar para colocar el PDF generado
     * @return mixed El PDF generado, o un mensjaje de error si la conversion falla
     * 
     */
    public static function convert($input, $output) {

        //Generar el PDF y almacenar lo que devuelva el comando en un vector
        $msg = array();
        $ret = -1;

        exec("/java/jre1.6.0_01/bin/java -jar /WEB_APP_PHP/genpdf/genpdf.jar $input $output 2>&1", &$msg, &$ret);

        if ($ret == 0) {
            //El generador funciono, todo bien...
            $fn = explode("/", $output);
            $pfn = count($fn) - 1;
            //leemos el PDF...
            $pdf = file_get_contents($output);
            //...lo volamos del disco...
            unlink($output);
            //...y finalmente se lo enviamos a nuestro usuario
            header("Content-Type: application/pdf");
            header("Content-Length: " . strlen($pdf));
            header("Content-Disposition: inline; filename=" . $fn[$pfn]);
            header("Content-Transfer-Encoding: binary");
            header("Cache-Control: private");
            echo $pdf;
        } else {
            //vector cargado de mensajes - no pdf :(
            header('Content-Type: text/html; charset=UTF-8');
?>
<html>
    <head>
        <title>Error del generador de PDF</title>
    </head>
    <body>
        <h1>Error al convertir el documento a PDF!</h1>
        <p>Detalles del error:</p>
        <pre>
<?php
            foreach($msg as $linea) {
                echo "$linea\n";
            }
?>
        </pre>
    </body>
</html>
<?php
        }
        
    }
}

?>
