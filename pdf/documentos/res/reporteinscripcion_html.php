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
            <img style="width: 70%;" src="../../img/puntodeencuentro.jpeg" > 
            </td>
             <td style="width: 50%; color: #34495e;font-size:12px; text-align: center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo "PUNTO ENCUENTRO LAUREL";?></span>
				<br> Direccion :<?php echo "Parroquia El Laurel Av. Santa María y Arcadia Espinoza Mz#38 
                                                         Oficina #1 Casa Comuna";?><br> 
<!--				Teléfono: <?php echo "5555-5555";?><br>-->
				
                
            </td>
<td style="width: 25%;text-align:center">
			COMPROBANTE<?php echo "<br>"?>Nº <?php echo $idInscripcion;?>
			</td>
            
        </tr>
    </table>
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
    <?php 
     $nums=1;
    $sql="SELECT tb_estudiantes.id_estudiantes,tb_jornadas.descripcion AS jornadas,tb_cursos.descripcion,tb_estudiantes.telefono,tb_estudiantes.correo,
tb_cursos.fecha_inicio,tb_cursos.hora_inicio,tb_cursos.hora_fin FROM tb_inscripcion,tb_cursos,tb_estudiantes,tb_jornadas
WHERE tb_inscripcion.id_estudiantes = tb_estudiantes.id_estudiantes AND tb_inscripcion.id_cursos = tb_cursos.id_cursos
AND tb_inscripcion.id_jornadas= tb_jornadas.id_jornadas
AND tb_inscripcion.id_inscripcion='$idInscripcion' ;";
        $result= mysqli_query($objConexion, $sql);
        $sqlArray= mysqli_fetch_array($result);
            
            $Cursos=$sqlArray['descripcion'];
            $jornadass=$sqlArray['jornadas'];
            $telefono=$sqlArray['telefono'];
             $correo=$sqlArray['correo'];
            $horaentra=$sqlArray['fecha_inicio'];
            $horasalida=$sqlArray['hora_inicio'];
            $emergejc=$sqlArray['hora_fin'];
            $idestudiante=$sqlArray['id_estudiantes'];
            
            if ($$nums%2==0){
		$clase="border-top";
	} else {
		$clase="silver";
	}
        ?>
     <br>
    <table cellspacing="0"  style="width: 50%; text-align: left; font-size: 10pt;">
      
           <tr>
           		<td style="width:100%;" class='midnight-blue'>DATOS DEL ESTUDIANTE</td>
           </tr>
          
           <br>
           <tr>
          
               <td style="width: 100%">
                   <?php
                   $sql="select * from tb_estudiantes,tb_canton where tb_estudiantes.id_canton = tb_canton.id_canton and id_estudiantes= $idestudiante";
                   $resulya= mysqli_query($objConexion, $sql);
                   $pacr= mysqli_fetch_array($resulya);
                   
                   echo " <strong><br>Nombre Estudiante</strong> :";
                   echo $mobre=$pacr['nombres_apellidos'];
                    echo " <strong><br>Edad :</strong> ";
                    echo $edas=$pacr['edad'];
                     echo " <strong><br>Direccion :</strong> ";
                     echo $direcion=$pacr['direccion'];
                      echo " <strong><br>Correo :</strong> ";
                      echo $correos=$pacr['correo'];
                        echo " <strong><br>Canton :</strong> ";
                          echo $cantosn=$pacr['NombreCanton'];
                       echo " <strong><br>Cedula :</strong> ";
                       echo $historia=$pacr['cedula'];
                   ?>
        
                
               </td>
           
           </tr>
           
</table>
     <br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
           <tr>
           		<td style="width:100%;" class='midnight-blue'>COMPROBANTE DE INSCRIPCION</td>
           </tr>
</table>

    <br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 23px;" >
        
    <tr>
               <td style="width: 20%;" class='silver'>Cursos</td>
               <td style="width: 12%;" class='silver'>Jornada</td>
               <td style="width: 11%;" class='silver'>N.Celular</td>
               <td style="width: 27%;" class='silver'>Correo</td>
                <td style="width: 10%;" class='silver'>fecha Inicio</td>
                 <td style="width: 10%;" class='silver'>Hora Inicio</td>
                 <td style="width: 10%;" class='silver'>Hora fin</td>
           </tr>    
</table>
    
   
   
     
    <!--<br>-->
<table cellspacing="0"style="width: 100%; text-align: center; font-size: 12px;">
     
    <tr>
        <td style="width: 20%; " class='<?php echo $clase;?>'><?php echo $Cursos; ?></td>
               <td style="width: 12%;" class='<?php echo $clase;?>'><?php echo $jornadass; ?></td>
               <td style="width: 11%;" class='<?php echo $clase;?>'><?php echo $telefono; ?></td>
               <td style="width: 27%;" class='<?php echo $clase;?>'><?php echo $correo; ?></td>
               <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $horaentra; ?></td>
               <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $horasalida; ?></td>
                <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $emergejc; ?></td>
           </tr>
     
</table>
   
   <br>
      <br>
      <br>
              <table style="width: 100%;">
              <tr>
              <td style="width: 100%;text-align: center"">
               <?php 
       echo '<img   src="'.$dir.basename($filename).'" /><br>';
      ?>
      
               </td>
              </tr>
              </table>
      
    <div style="font-size:11pt;text-align:center;font-weight:bold">Gracias por visitar nuestro punto de encuentro laurel !</div>
  
 </page>
<page_footer>
        <table cellspacing="0" class="page_footer" style="width: 100%;">          
           <tr>
                <td style="width: 10%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
           
                <td style="width: 90%; text-align: right">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                    <?php echo "<br> ";?>&copy;<?php echo " SYS_PEL "; echo  $anio=date('Y'); ?>
                </td>
                
            </tr>
            
        </table>
 </page_footer>

