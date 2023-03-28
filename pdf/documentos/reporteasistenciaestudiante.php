<?php 
	/* Connect To Database*/
	include("../../conf/confconexion.php");
	require_once(dirname(__FILE__).'/../html2pdf.class.php');//no tocar
		
	//Variables por GET
	
	$idestudiante=$_GET['idestudiante_p'];
//        $prueba=$_GET['prueba_p'];
	
	//Fin de variables por GET
        
        //procesar la información
//	include '../../navg.php';
        
        
	// get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/reporteasistenciaestudiante_html.php');
     $content = ob_get_clean();

    try
    {
        // init HTML2PDF
        $html2pdf = new HTML2PDF('P', 'LETTER', 'es', true, 'UTF-8', array(0, 0, 0, 0));
        // display the full page
        $html2pdf->pdf->SetDisplayMode('fullpage');
        // convert
        $html2pdf->writeHTML($content, isset($_GET['vuehtml']));
        // send the PDF
        $html2pdf->Output('Reporte_Asistencia.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
	
	//}//fin del if $queimprimo
?>
