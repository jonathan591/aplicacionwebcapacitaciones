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
	background:white;
	padding: 3px 4px 3px;
}
.clouds{
	background:#ecf0f1;
	padding: 3px 4px 3px;
}
.border-top{
	border-top: solid 1px #bdc3c7;
	
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
<page backtop="15mm" backbottom="15mm" backleft="15mm" backright="15mm" style="font-size: 12pt; font-family: arial" >
       
    <table cellspacing="0" style="width: 100%;">
        <tr>

            <td style="width: 25%; color: #444444;">
                <img style="width: 100%;" src="../../img/logoo.jpg" alt="Logo"><br>
                
            </td>
			<td style="width: 50%; color: #34495e;font-size:12px;text-align:center">
                <span style="color: #34495e;font-size:14px;font-weight:bold"><?php echo NOMBRE_EMPRESA;?></span>
				<br><?php echo DIRECCION_EMPRESA;?><br> 
				Teléfono: <?php echo TELEFONO_EMPRESA;?><br>
				Email: <?php echo EMAIL_EMPRESA;?>
                
            </td>
			<td style="width: 25%;text-align:right">
            <img style="width: 100%;" src="../../img/senescyt.png" alt="Logo"><br>
            </td>
        </tr>
            </table>
    <br>

<table cellspacing="0" style="width: 100%; text-align: left; font-size: 11pt;">
           <tr>
           		<td style="width:100%;" class='midnight-blue'>PARÁMETROS DEL REPORTE CONSOLIDADO</td>
           </tr>
           <tr>
           	<td style="width:100%;" >
			<?php 
				$id_opcion=intval($_GET['id_opcion']);
				echo "<br> Fecha Generación de Reporte: ";
				echo date('Y-m-d H:i:s');
				echo "<br> Periodo Lectivo: ";
				echo $des_periodoLect;
				echo "<br> Tipo de Reporte: ";
				if($id_opcion==1)
				{
					echo "Consolidado Por Carrera";
				}
				else
				{
					if($id_opcion==2)
					{
						echo "Consolidado Carrera - Jornada";
					}
					else
					{
                                            if($id_opcion==3)
                                            {
                                                echo "Consolidado Carrera - Jornada - Perido Académico - Paralelo";
                                            }else{
                                                echo "Consolidado Carrera - Perido Académico";
                                            }
					}
				}
				
			?>
		   </td>   
        </tr>
    </table>
    <br>
    <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
        <?php
		if($id_opcion==1)
				{
		?>
		<tr>
            <th style="width: 4%;text-align: center" class='midnight-blue'>No.</th>
            <th style="width: 60%;text-align: center" class='midnight-blue'>CARRERA</th>
            <th style="width: 18%;text-align: center" class='midnight-blue'>CANTIDAD</th>
            
        </tr>
		<?php
				}
				else
				{
					if($id_opcion==2)
					{
			?>
		<tr>
            <th style="width: 4%;text-align: center" class='midnight-blue'>No.</th>
            <th style="width: 50%;text-align: center" class='midnight-blue'>CARRERA</th>
            <th style="width: 10%;text-align: center" class='midnight-blue'>JORNADA</th>
            <th style="width: 18%;text-align: center" class='midnight-blue'>CANTIDAD</th>
            
        </tr>
        <?php
					}
					else
					{
                                            if($id_opcion==3)
                                        {
		?>
		<tr>
            <th style="width: 4%;text-align: center" class='midnight-blue'>No.</th>
            <th style="width: 40%;text-align: center" class='midnight-blue'>CARRERA</th>
            <th style="width: 10%;text-align: center" class='midnight-blue'>JORNADA</th>
            <th style="width: 10%;text-align: center" class='midnight-blue'>PERIODO ACAD.</th>
            <th style="width: 10%;text-align: center" class='midnight-blue'>PARALELO</th>
            <th style="width: 18%;text-align: center" class='midnight-blue'>CANTIDAD</th>
            
        </tr>
        <?php
                                        }else{
                                            ?>
		<tr>
                    <th style="width: 4%;text-align: center" class='midnight-blue'>No.</th>
                    <th style="width: 71%;text-align: center" class='midnight-blue'>CARRERA</th>
                    <th style="width: 15%;text-align: center" class='midnight-blue'>PERIODO ACAD.</th>
                    <th style="width: 10%;text-align: center" class='midnight-blue'>CANTIDAD</th>
                </tr>
        <?php
                                        }
					}
				}
		?>
        

						
<?php
$acu=0;

if($id_opcion==1)
{
   	$nums=1;
	$id_PeriodLect=intval($_GET['id_PeriodLect']);
	
   $sql_Opcion=mysqli_query($con,"select matricula.IdCarrera as Idcar, carrera.NombreCarrera,count(*) as Periodo_II_2016_2017 "
           ."from matricula,carrera where matricula.IdCarrera=carrera.IdCarrera and matricula.IdTipoMatricula in(1,2,3,5,6,7) and "
           ."matricula.IdPeriodoLectivo='".$id_PeriodLect."' group by matricula.IdCarrera;"); 
   
   while ($row_opcion=mysqli_fetch_array($sql_Opcion))
	{
	$carrera=$row_opcion["NombreCarrera"];
	$periodo_lect=$row_opcion["Periodo_II_2016_2017"];
		if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 4%; text-align: center"><?php echo $nums; ?></td>
            <td class='<?php echo $clase;?>' style="width: 60%; text-align: center"><?php echo $carrera;?></td>
            <td class='<?php echo $clase;?>' style="width: 18%; text-align: center"><?php echo $periodo_lect;?></td>
            
            
        </tr>

	<?php 
	$nums++;
        $acu=$acu+$periodo_lect;
        
	}
?>
        

<?php        
 }
	?>
<?php
if($id_opcion==2)
{
   	$nums=1;
	$id_PeriodLect=intval($_GET['id_PeriodLect']);
	$id_PeriodLect_Comp=intval($_GET['id_PeriodLect_Comp']);
   $sql_Opcion=mysqli_query($con,"select carrera.IdCarrera as IdCar,carrera.NombreCarrera,matricula.IdJornada as IdJor,"
           ."jornada.DescripJornada as Jornada,count(*) as Periodo_II_2016_2017 "
           ."from matricula, carrera, jornada where matricula.IdCarrera=carrera.IdCarrera and matricula.IdJornada=jornada.IdJornada and "
           ."matricula.IdTipoMatricula in(1,2,3,5,6,7) and matricula.IdPeriodoLectivo='".$id_PeriodLect."' group by carrera.IdCarrera,"
           ."jornada.IdJornada;"); 

   while ($row_opcion=mysqli_fetch_array($sql_Opcion))
	{
	$carrera=$row_opcion["NombreCarrera"];
	$jornada=$row_opcion["Jornada"];
	$periodo_lect=$row_opcion["Periodo_II_2016_2017"];
		if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 4%; text-align: center"><?php echo $nums; ?></td>
            <td class='<?php echo $clase;?>' style="width: 50%; text-align: center"><?php echo $carrera;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $jornada;?></td>
            <td class='<?php echo $clase;?>' style="width: 18%; text-align: center"><?php echo $periodo_lect;?></td>
            
        </tr>

	<?php 
	$nums++;
        $acu=$acu+$periodo_lect;
	}	  
}
	?>

<?php
if($id_opcion==3)
{
   	$nums=1;
	$id_PeriodLect=intval($_GET['id_PeriodLect']);
	$id_PeriodLect_Comp=intval($_GET['id_PeriodLect_Comp']);
   $sql_Opcion=mysqli_query($con,"select carrera.IdCarrera as IdCar, carrera.NombreCarrera, jornada.IdJornada as IdJor, "
           ."matricula.IdPeriodoAcademico as IdPerAcd,matricula.ParaleloMatricula,jornada.DescripJornada as Jornada,count(*) as Periodo_II_2016_2017 "
           ."from matricula, carrera, jornada where matricula.IdCarrera=carrera.IdCarrera and "
           ."matricula.IdJornada=jornada.IdJornada and "
           ."matricula.IdTipoMatricula in(1,2,3,5,6,7) and matricula.IdPeriodoLectivo='".$id_PeriodLect."' group by carrera.IdCarrera,"
           ."jornada.IdJornada, matricula.IdPeriodoAcademico,matricula.ParaleloMatricula;"); 

   while ($row_opcion=mysqli_fetch_array($sql_Opcion))
	{
	$carrera=$row_opcion["NombreCarrera"];
	$jornada=$row_opcion["Jornada"];
	$period_acad=$row_opcion["IdPerAcd"];
	$periodo_lect=$row_opcion["Periodo_II_2016_2017"];
	$idparalelo=$row_opcion["ParaleloMatricula"];
	
	$sql_paralelo=mysqli_query($con,"select * from paralelo where idParalelo=$idparalelo;"); 

   while ($row_paralelo=mysqli_fetch_array($sql_paralelo))
	{
        $paralelo=$row_paralelo["DescripParalelo"];
	}	
	
	
	
		if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 4%; text-align: center"><?php echo $nums; ?></td>
            <td class='<?php echo $clase;?>' style="width: 40%; text-align: center"><?php echo $carrera;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $jornada;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $period_acad;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $paralelo;?></td>
            <td class='<?php echo $clase;?>' style="width: 18%; text-align: center"><?php echo $periodo_lect;?></td>
            
        </tr>

	<?php 
	$nums++;
        $acu=$acu+$periodo_lect;
	}	  
}
	?>
<?php
if($id_opcion==4)
{
   	$nums=1;
	$id_PeriodLect=intval($_GET['id_PeriodLect']);
	$id_PeriodLect_Comp=intval($_GET['id_PeriodLect_Comp']);
   $sql_Opcion=mysqli_query($con,"select carrera.IdCarrera as IdCar, carrera.NombreCarrera,periodoacademico.NombrePeriodoAcademico, 
matricula.IdPeriodoAcademico as IdPerAcd, COUNT(matricula.IdPeriodoAcademico) as CantPeriodoAcad
from matricula,carrera,periodoacademico where matricula.IdCarrera=carrera.IdCarrera and matricula.IdPeriodoAcademico=periodoacademico.IdPeriodoAcademico and 
matricula.IdTipoMatricula in(1,2,3,5,6,7) and matricula.IdPeriodoLectivo=29 
group by carrera.IdCarrera,matricula.IdPeriodoAcademico
order by carrera.IdCarrera,matricula.IdPeriodoAcademico ASC;"); 

   while ($row_opcion=mysqli_fetch_array($sql_Opcion))
	{
	$carrera=$row_opcion["NombreCarrera"];
	$period_acad=$row_opcion["NombrePeriodoAcademico"];
	$periodo_lect=$row_opcion["CantPeriodoAcad"];
	
	if ($nums%2==0){
		$clase="clouds";
	} else {
		$clase="silver";
	}
	?>

        <tr>
            <td class='<?php echo $clase;?>' style="width: 4%; text-align: center"><?php echo $nums; ?></td>
            <td class='<?php echo $clase;?>' style="width: 71%; text-align: center"><?php echo $carrera;?></td>
            <td class='<?php echo $clase;?>' style="width: 15%; text-align: center"><?php echo $period_acad;?></td>
            <td class='<?php echo $clase;?>' style="width: 10%; text-align: center"><?php echo $periodo_lect;?></td> 
        </tr>

	<?php 
	$nums++;
        $acu=$acu+$periodo_lect;
	}	  
}
	?>        
    	</table>
<br>	
        <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
            <tr>
                <td class='<?php echo $clase;?>' style="width: 50%; text-align: right"><?php echo "TOTAL" ?></td>
                <td class='<?php echo $clase;?>' style="width: 25%; text-align: right"><?php echo $acu;?></td>
            </tr>
        </table>
    <br>
   <br>
   <table cellspacing="0" style="width: 100%; text-align: left; font-size: 10pt;">
     <tr> 	        
         <td style="width:100%;" align="center">
			<?php
				echo "<br> ______________________________________";
				echo "<br> Ab. ROMERO MACÍAS JOSÉ EDUARDO";
				echo "<br> SECRETARIO GENERAL";
			?>    
    	</td>
          
          </tr>    
   </table>
    
 <page_footer>
        <table cellspacing="0" class="page_footer" style="width: 100%;">          
           <tr>
                <td style="width: 10%; text-align: left">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                </td>
           
                <td style="width: 90%; text-align: right">
                    P&aacute;gina [[page_cu]]/[[page_nb]]
                    <?php echo "<br> ";?>&copy;<?php echo " SIGA JBA "; echo  $anio=date('Y'); ?>
                </td>
                
            </tr>
            
        </table>
    </page_footer>

</page>

