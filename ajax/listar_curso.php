<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
$sql = "SELECT * FROM tb_cursos;";
$result = mysqli_query($objConexion, $sql);
session_start();
 $idrolUsuario=$_SESSION['idRolUsuario_S'];
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
         <?php 
             if($idrolUsuario==1){
         ?>
        <div class="table-responsive">
     
        <table id="tablaListar" class="table table-striped table-bordered dataTable" style="width:100%" cellspacing="0" role="grid" aria-describedby="tablaListar_info">       
        

        <thead>
            <tr>
               
                <th>ID</th>
                <th>Descripcion</th>
                 <th>Jornada</th>
                  <th>Fecha_inicio</th>
                   <th>Fecha_fin</th>
                    <th>Hora_inicio</th>
                     <th>Hora_final</th>
                      <th>Cupos</th>
                      <th>Imagen</th>
                       <th>Opc</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
              
              <th>ID</th>
                <th>Descripcion</th>
                 <th>Jornada</th>
                  <th>Fecha_inicio</th>
                   <th>Fecha_fin</th>
                    <th>Hora_inicio</th>
                     <th>Hora_final</th>
                      <th>Cupos</th>
                     <th>Imagen</th>
                       <th>Opc</th>
                
            </tr>
        </tfoot>
        
         <tbody>
					<?php while($fila = $result->fetch_assoc()) { 
                                            
                                             
                                            
                                            
                                            ?>
                                                       
						<tr>
							
							<td><?php echo $fila['id_cursos']; ?></td>
							
                                                        <td><?php echo $fila['descripcion']; ?></td>
                                                        <?php 
                                                        $idjornada=$fila['id_jornadas'];
                                                        $sql_jornada="select * from tb_jornadas where id_jornadas=$idjornada";
                                                        $resulta= mysqli_query($objConexion, $sql_jornada);
                                                        $jornadd= mysqli_fetch_array($resulta);
                                                        $nombrejornada=$jornadd['descripcion'];
                                                        ?>
                                                        <td><?php echo   $nombrejornada; ?></td>
                                                        <td><?php echo $fila['fecha_inicio']; ?></td>
                                                        <td><?php echo $fila['fecha_fin']; ?></td>
                                                        <td><?php echo $fila['hora_inicio']; ?></td>
                                                        <td><?php echo $fila['hora_fin']; ?></td>
                                                        <td><?php echo $fila['cupos']; ?></td>
                                                        <td> <img  style="width: 100px; height: 80px;" src="data:image/jpg;base64,<?php echo base64_encode($fila['imagen'])?>" alt=""></td>
                                                        <td> <button  class='btn btn-info' title='Editar Curso' onclick="editarCurso(<?php echo $fila['id_cursos']?>)"><i class="fas fa-edit"></i></button>
                                                           
                                                            <button  class='btn btn-danger' title='Eliminar curso' onclick="eliminarCurso(<?php echo $fila['id_cursos']?>)"><i class="fas fa fa-solid fa-trash"></i></button>
                                                       
                                                                    
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php } ?>
				</tbody>
        
    </table>
         </div>
      <?php }?>   
    </body>
</html>




