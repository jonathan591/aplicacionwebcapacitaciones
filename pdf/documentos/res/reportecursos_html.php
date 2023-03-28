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
<?php 
    
    $dir = '../../img/';
        
        //Si no existe la carpeta la creamos
        if (!file_exists($dir))
            mkdir($dir);
        
            //Declaramos la ruta y nombre del archivo a generar
        $filename = $dir.'test.png';
    
            //Parametros de Condiguración
        
        $tamaño = 3; //Tamaño de Pixel
        $level = 'H'; //Precisión Baja
        $framSize = 3; //Tamaño en blanco
        $contenido = "punto de encuentro laurel"; //Texto
        
            //Enviamos los parametros a la Función para generar código QR 
        QRcode::png($contenido, $filename, $level, $tamaño, $framSize); 
        
            //Mostramos la imagen generada
        
        
        ?>
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
       
      <table cellspacing="0" style="width: 100%;">
        <tr>
            <td style="width: 22.44%; color: #444444; ">
                  <img style="width: 80%;" src="../../img/puntodeencuentro.jpeg">   
            </td>
             <td style="width: 50%; color: #34495e;font-size:12px; text-align: center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo "PUNTO ENCUENTRO LAUREL";?></span>
				<br> Direccion :<?php echo "Parroquia El Laurel Av. Santa María y Arcadia Espinoza Mz#38 
                                                         Oficina #1 Casa Comuna";?><br> 
<!--				Teléfono: <?php echo "5555-5555";?><br>-->
             </td>
                
<td style="width: 40.44%; text-align: center; ">
            <?php 
                echo '<img   src="'.$dir.basename($filename).'" /><br>'; 
                ?>
            </td>
            
        </tr>
    </table>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
           <tr>
           		<td style="width:100%;" class='midnight-blue'>REPORTE DE INSCRIPCIONES POR CURSO </td>
           </tr>
</table>

    <br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 23px;" >
        
    <tr>
               <td style="width: 20%;" class='silver'>Nombre Estudiante</td>
               <td style="width: 12%;" class='silver'>Curso</td>
               <td style="width: 10%;" class='silver'>Jornada</td>
               <td style="width: 10%;" class='silver'>N.Celular</td>
                <td style="width: 18%;" class='silver'>Correo</td>
                 <td style="width: 10%;" class='silver'>Fecha inicio</td>
                 <td style="width: 10%;" class='silver'>Hora inicio</td>
                  <td style="width: 10%;" class='silver'>Hora fin</td>
           </tr>    
</table>
    
    
     <?php 
     $nums=1;
    $sql="SELECT tb_estudiantes.nombres_apellidos, tb_jornadas.descripcion AS jornadas,tb_cursos.descripcion,tb_estudiantes.telefono,tb_estudiantes.correo,
tb_cursos.fecha_inicio,tb_cursos.hora_inicio,tb_cursos.hora_fin FROM tb_inscripcion,tb_cursos,tb_estudiantes,tb_jornadas
WHERE tb_inscripcion.id_estudiantes = tb_estudiantes.id_estudiantes AND tb_inscripcion.id_cursos = tb_cursos.id_cursos
AND tb_inscripcion.id_jornadas= tb_jornadas.id_jornadas
AND tb_cursos.id_cursos=$idCursos;";
        $result= mysqli_query($objConexion, $sql);
        while($sqlArray= mysqli_fetch_array($result)){
            
            $NombrePersona=$sqlArray['nombres_apellidos'];
            $jornadass=$sqlArray['jornadas'];
            $curso=$sqlArray['descripcion'];
            $telefono=$sqlArray['telefono'];
            $correo=$sqlArray['correo'];
             $fechas=$sqlArray['fecha_inicio'];
            $horaentra=$sqlArray['hora_inicio'];
            $horasalida=$sqlArray['hora_fin'];
//            $emergejc=$sqlArray['emergencia'];
            
         if ($$nums%2==0){
		$clase="border-top";
	} else {
		$clase="silver";
	}
        ?>
    <!--<br>-->
<table cellspacing="0"style="width: 100%; text-align: center; font-size: 11px;">
     
    <tr>
        <td style="width: 20%; " class='<?php echo $clase;?>'><?php echo $NombrePersona; ?></td>
               <td style="width: 12%;" class='<?php echo $clase;?>'><?php echo $curso; ?></td>
               <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $jornadass; ?></td>
               <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $telefono; ?></td>
               <td style="width: 18%;" class='<?php echo $clase;?>'><?php echo $correo; ?></td>
               <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $fechas; ?></td>
                <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $horaentra; ?></td>
                <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $horasalida; ?></td>
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

