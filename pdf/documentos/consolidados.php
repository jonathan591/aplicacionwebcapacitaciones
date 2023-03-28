<?php

	session_start();
	if (!isset($_SESSION['user_login_status']) AND $_SESSION['user_login_status'] != 1) {
        header("location: ../../login.php");
		exit;
    }
	
	
	/* Connect To Database*/
	include("../../config/db.php");
	include("../../config/conexion.php");
	/*$session_id= session_id();
	$sql_count=mysqli_query($con,"select * from tmp where session_id='".$session_id."'");
	$count=mysqli_num_rows($sql_count);
	if ($count==0)
	{
	echo "<script>alert('No hay productos agregados a la factura')</script>";
	echo "<script>window.close();</script>";
	exit;
	}*/

	require_once(dirname(__FILE__).'/../html2pdf.class.php');
		
	//Variables por GET
	
	$id_PeriodLect=intval($_GET['id_PeriodLect']);
	/*$id_PeriodLect_Comp=intval($_GET['id_PeriodLect_Comp']);*/
	$id_opcion=intval($_GET['id_opcion']);
		
	$sql_periodoLect=mysqli_query($con,"select * from periodolectivo where IdPeriodoLectivo='".$id_PeriodLect."'");
	$rw_periodoLect=mysqli_fetch_array($sql_periodoLect);
	$des_periodoLect=$rw_periodoLect['DescripPeriodoLect'];
	
	/*$sql_periodoLect_Comp=mysqli_query($con,"select * from periodolectivo where IdPeriodoLectivo='".$id_PeriodLect_Comp."'");
	$rw_periodoLect_Comp=mysqli_fetch_array($sql_periodoLect_Comp);
	$des_periodoLect_Comp=$rw_periodoLect_Comp['DescripPeriodoLect'];*/
	
	
	//Fin de variables por GET
	
	// get the HTML
     ob_start();
     include(dirname('__FILE__').'/res/consolidados_html.php');
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
        $html2pdf->Output('EditarMatricula.pdf');
    }
    catch(HTML2PDF_exception $e) {
        echo $e;
        exit;
    }
	
	//}//fin del if $queimprimo
	