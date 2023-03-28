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
           		<td style="width:100%;" class='midnight-blue'>REPORTE DE ESTUDIANTES POR CARRERA</td>
           </tr>
</table>

    <br>
<table cellspacing="0" style="width: 100%; text-align: left; font-size: 23px;" >
        
    <tr>
               <td style="width: 20%;" class='silver'>Nombre Apellido</td>
               <td style="width: 15%;" class='silver'>Cedula</td>
               <td style="width: 25%;" class='silver'>Correo</td>
                <td style="width: 11%;" class='silver'>Direccion</td>
               <td style="width: 10%;" class='silver'>Periodo</td>
                <td style="width: 10%;" class='silver'>Jornada</td>
                 <td style="width: 9%;" class='silver'>Carrera</td>
           </tr>    
</table>
    
    
     <?php 
    
//      $prueba=$_GET['prueba_p'];
     $nums=1;
    $sql="select tb_estudiantes.nombres_apellidos,tb_estudiantes.cedula,tb_estudiantes.correo,tb_cursos.descripcion as periodo,tb_jornadas.descripcion as jornada,tb_carreras.descripcion as carrera
        ,tb_estudiantes.direccion
from tb_estudiantes ,tb_jornadas, tb_carreras,tb_cursos where  tb_estudiantes.id_jornadas = tb_jornadas.id_jornadas
and tb_estudiantes.id_carreras= tb_carreras.id_carreras and tb_estudiantes.id_cursos= tb_cursos.id_cursos and tb_estudiantes.estado=1 and tb_carreras.id_carreras='$idCarreraa';";
        $result= mysqli_query($objConexion, $sql);
        while($sqlArray= mysqli_fetch_array($result)){
            
            $NombrePersona=$sqlArray['nombres_apellidos'];
            $cedulaa=$sqlArray['cedula'];
            $correoe=$sqlArray['correo'];
            $dirrecion=$sqlArray['direccion'];
            $periedo=$sqlArray['periodo'];
            $jornadass=$sqlArray['jornada'];
            $carrea=$sqlArray['carrera'];
               if ($$nums%2==0){
		$clase="border-top";
	} else {
		$clase="silver";
	}
       
        ?>
    <!--<br>-->
<table cellspacing="0"style="width: 100%; text-align: left; font-size: 12px;">
     
    <tr>
        <td style="width: 20%; " class='<?php echo $clase;?>'><?php echo $NombrePersona; ?></td>
               <td style="width: 15%;" class='<?php echo $clase;?>'><?php echo $cedulaa; ?></td>
               <td style="width: 25%;" class='<?php echo $clase;?>'><?php echo $correoe; ?></td>
                 <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $dirrecion; ?></td>
               <td style="width: 10%;" class='<?php echo $clase;?>'><?php echo $periedo; ?></td>
               <td style="width: 11%;" class='<?php echo $clase;?>'><?php echo $jornadass; ?></td>
               <td style="width: 9%;" class='<?php echo $clase;?>'><?php echo $carrea; ?></td>
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

