<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
$fechaAactual=date('Y-m-d');
session_start();
   $cedulaUsuar= $_SESSION['cedulasuserio_s'];
      $idrolUsuario=$_SESSION['idRolUsuario_S'];
    $sql = "SELECT * FROM tb_estudiantes where cedula=$cedulaUsuar;"; 
    $result = mysqli_query($objConexion, $sql);
    if($idrolUsuario==2){
    while ($rowx = mysqli_fetch_array($result)) {
        $id_asitencia=$rowx['id_estudiantes'];
    }
    }

if($idrolUsuario==1){
   $sql = "SELECT * FROM tb_inscripcion ORDER BY id_inscripcion desc;";
$result = mysqli_query($objConexion, $sql); 
}
if($idrolUsuario==2){
  
   $sql = "SELECT * FROM tb_inscripcion where id_estudiantes=$id_asitencia;";
$result = mysqli_query($objConexion, $sql); 
}
?>
<html>
    <head>
        <meta charset="UTF-8">
       <link rel="stylesheet" type="text/css" href="datatables/datatables.min.css"/>
        <script type="text/javascript" src="datatables/datatables.min.js"></script>   
    <!--datables estilo bootstrap 4 CSS-->  
    <link rel="stylesheet"  type="text/css" href="datatables/DataTables-1.10.18/css/dataTables.bootstrap4.min.css">       

    </head>
    
    <script>
    $(document).ready(function() {    
    $('#tablaListar').DataTable({
    //para cambiar el lenguaje a español
        "language": {
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "info": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "infoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sFirst": "Primero",
                    "sLast":"Último",
                    "sNext":"Siguiente",
                    "sPrevious": "Anterior"
			     },
			     "sProcessing":"Procesando...",
            }
    });     
});
    </script>
    <body>
        <div class="">
         <!--<div class="col-lg-12">-->
                    <div class="table-responsive">  
        
        <table id="tablaListar" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
               <th>Estudiante</th>
                <th>Cursos</th>
                 <th>Jornada</th>
               
             
                
                      <th>Fecha_inicio</th>
                      <th>hora_inicio</th>
                      <th>hora_final</th>
                  
                      
                 
                       <th>Opciones</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
               <th>ID</th>
               <th>Estudiante</th>
                <th>Cursos</th>
                 <th>Jornada</th>
               
             
                
                      <th>Fecha_inicio</th>
                      <th>hora_inicio</th>
                      <th>hora_final</th>
                  
                      
                 
                       <th>Opciones</th>
            </tr>
        </tfoot>
        
         <tbody>
					<?php  while ($fila = $result->fetch_assoc()) { 
                                            
                       
                                            
                                            
                                            ?>
                                         
						<tr>
                                                    <td><?php echo $fila['id_inscripcion']; ?></td>
                                                    <?php
                                                              $idcarreras=$fila['id_estudiantes'];
                                                             $sqlCarreras="select * from tb_estudiantes where id_estudiantes=$idcarreras;";
                                                                $resultCarreras= mysqli_query($objConexion, $sqlCarreras);
                                                                    $CarrerasArray= mysqli_fetch_array($resultCarreras);
                                                                    $DescripcionCarreras=$CarrerasArray['nombres_apellidos'];
                                                                         ?>
                                                           <td><?php echo $DescripcionCarreras?></td>
                                                        
                                                 <?php
                                                              $idcuros=$fila['id_cursos'];
                                                             $sqlCarreras="select * from tb_cursos where id_cursos=$idcuros;";
                                                                $resultC= mysqli_query($objConexion, $sqlCarreras);
                                                                    $CarrerasArray= mysqli_fetch_array($resultC);
                                                                    $DescripcionC=$CarrerasArray['descripcion'];
                                                                         ?>
                                                           <td><?php echo $DescripcionC?></td>
                                                     
                                                        <?php
                                                              $idjornadas=$fila['id_jornadas'];
                                                             $sqlJornadas="select * from tb_jornadas where id_jornadas=$idjornadas;";
                                                                $resultJornadas= mysqli_query($objConexion, $sqlJornadas);
                                                                    $JornadasArray= mysqli_fetch_array($resultJornadas);
                                                                    $DescripcionJornadas=$JornadasArray['descripcion'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionJornadas?></td>          
                                                           
                                                                
                                                                 
                                                                    
                                                         <td><?php echo $fila['fecha_inicio']; ?></td>
                                                        <td><?php echo $fila['hora_inicio']; ?></td>
                                                        <td><?php echo $fila['hora_fin']; ?></td>
                                                     
                                                        
                                                       
<!--							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>-->
                                                        <td>
                                     <button  class='btn btn-primary' title='Descargar Inscripcion' onclick="descargarInscripcion(<?php echo $fila['id_inscripcion']?>)"><i class="fas  fa-download"></i> </button>
                                                            <?php 
                                                             
                                                            if($idrolUsuario==1){
                                                                
                                                         
                                                            ?>
                                                             <button  class='btn btn-info' title='Editar Asistencia' onclick="editarInscripcion(<?php echo $fila['id_inscripcion']?>)"><i class="fas  fa-edit"></i> </button>
                                                            <button  class='btn btn-danger' title='Eliminar Asistencia' onclick="eliminarInscripcion(<?php echo $fila['id_inscripcion']?>)"><i class="fas fa fa-solid fa-trash"></i></button>
                                                       
                                                        
                                                        </td>
							<!--<td> </td>-->
						</tr>
					 <?php 
                                            }
                                                            }
                                         ?> 
				</tbody>
        
    </table>
                
         </div>
        </div>
        <!--</div>-->        
    </body>
</html>



