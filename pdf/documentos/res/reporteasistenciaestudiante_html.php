<style type="text/css">
<!--
table { vertical-align: top; }
tr    { vertical-align: top; }
td    { vertical-align: top; }
.midnight-blue{
	background:#85C4DF;
	padding: 4px 4px 4px;
	color:white;
	font-weight:bold;
	font-size:12px;
}
.silver{
	background:#8FDAEA;
	padding: 8px 4px 12px;
	color:white;
	font-weight:bold;
	font-size:13px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	/*border-top: solid 1px #bdc3c7;*/
        padding: 8px 4px 12px;
        border: solid 1px #080808;
	
}
.border-left{
	border-left: solid 1px #bdc3c7;
}
.border-right{
	border-right: solid 1px #bdc3c7;
}
.border-bottom{
	border-bottom: solid 1px #bdc3c7;
}
table.page_footer {width: 100%; border: none; background-color: white; padding: 2mm;border-collapse:collapse; border: none;}


#avatar2{
width: 10px;
height: 105px;
float: left;
margin-right: 0px;
padding: 1px;
border: 5px solid #CCCCCC;
 } 


-->
</style>
<!--
<link rel="stylesheet" href="../../../css/jquery.dataTables.min.css">
<link rel="stylesheet" href="../../../css/bootstrap-theme.min.css">-->
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
       
      <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 30%; color: #444444;">
            <img style="width: 70%;" src="../../img/logotipo.jpeg" > 
            </td>
             <td style="width: 50%; color: #34495e;font-size:12px; text-align: center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo "GAD-PARROQUIAL EL LAUREL";?></span>
				<br> Direccion :<?php echo "Parroquia El Laurel Av. Santa María y Arcadia Espinoza Mz#38 
                                                         Oficina #1 Casa Comuna";?><br> 
<!--				Teléfono: <?php echo "5555-5555";?><br>-->
				
                
            </td>
             <td style="width: 22.44%; color: #444444; ">
                  <img style="width: 80%;" src="../../img/puntodeencuentro.jpeg">   
            </td>
            
        </tr>
    </table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
           <tr>
           		<td style="width:100%;" class='midnight-blue'>REPORTE DE ASISTENCIA POR ESTUDIANTE </td>
           </tr>
</table>

    <br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 23px;" >
        
    <tr>
               <td style="width: 20%;" class='silver'>Nombre Estudiante</td>
               <td style="width: 12%;" class='silver'>Jornada</td>
               <td style="width: 10%;" class='silver'>Carrera</td>
               <td style="width: 13%;" class='silver'>Fecha</td>
                <td style="width: 15%;" class='silver'>Hora entrada</td>
                 <td style="width: 15%;" class='silver'>Hora salida</td>
                 <td style="width: 15%;" class='silver'>Emergencia</td>
           </tr>    
</table>
    
    
     <?php 
     $nums=1;
    $sql="SELECT tb_estudiantes.nombres_apellidos,tb_carreras.descripcion AS carrera,tb_jornada2.descripcion AS jornada,tb_asistencia.fecha,
tb_asistencia.hora_entrada,tb_asistencia.hora_salida,tb_asistencia.emergencia from tb_estudiantes,tb_asistencia,tb_carreras,tb_jornada2
WHERE tb_asistencia.id_jornada2 = tb_jornada2.id_jornada2 and  tb_asistencia.id_estudiantes = tb_estudiantes.id_estudiantes AND tb_asistencia.id_carreras = tb_carreras.id_carreras
and tb_estudiantes.id_estudiantes='$idestudiante';";
        $result= mysqli_query($objConexion, $sql);
        while($sqlArray= mysqli_fetch_array($result)){
            
            $NombrePersona=$sqlArray['nombres_apellidos'];
            $jornadass=$sqlArray['jornada'];
            $careee=$sqlArray['carrera'];
             $fechas=$sqlArray['fecha'];
            $horaentra=$sqlArray['hora_entrada'];
            $horasalida=$sqlArray['hora_salida'];
            $emergejc=$sqlArray['emergencia'];
            
            if ($$nums%2==0){
		$clase="border-top";
	} else {
		$clase="silver";
	}
        ?>
    <!--<br>-->
<table cellspacing="0"style="width: 100%; text-align: center; font-size: 13px;">
     
    <tr>
        <td style="width: 20%; " class='<?php echo $clase;?>'><?php echo $NombrePersona; ?></td>
               <td style="width: 12%;" class='<?php echo $clase;?>'><?php echo $jornadass; ?></td>
               <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $careee; ?></td>
               <td style="width: 13%;" class='<?php echo $clase;?>'><?php echo $fechas; ?></td>
               <td style="width: 15%;" class='<?php echo $clase;?>'><?php echo $horaentra; ?></td>
               <td style="width: 15%;" class='<?php echo $clase;?>'><?php echo $horasalida; ?></td>
                <td style="width: 15%;" class='<?php echo $clase;?>'><?php echo $emergejc; ?></td>
           </tr>
        <?php  $nums++; ?>  
</table>
    <?php
    }
    ?>
    <!--<br>-->
 </page>
<page_footer>
        <table cellspacing="0" class="page_footer" style="width: 100%;">          
           <tr>
                <td style="width: 10%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
           
                <td style="width: 90%; text-align: right">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                    <?php echo "<br> ";?>&copy;<?php echo " SYS_PRAC "; echo  $anio=date('Y'); ?>
                </td>
                
            </tr>
            
        </table>
 </page_footer>

