<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
$sql = "SELECT * FROM tb_docentes;";
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
        <div class="table-responsive">
     
        <table id="tablaListar" class="table table-striped table-bordered dataTable" style="width:100%" cellspacing="0" role="grid" aria-describedby="tablaListar_info">       
        

        <thead>
            <tr>
               
                <th>Nombre Apellidos</th>
                <th>N.Celular</th>
                 <!--<th>telefono</th>-->
                <th>Correo</th>
<!--                <th>carrera</th>
                 <th>curso</th>
                  <th>paralelo</th>
                   <th>jornada</th>
                    <th>direccion</th>-->
                     <th>Fecha_registro</th>
                      <th>Estado</th>
                       <th>Opc</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
              
                  <th>Nombre Apellidos</th>
                <th>N.Celular</th>
                 <!--<th>telefono</th>-->
                <th>Correo</th>
<!--                <th>carrera</th>
                 <th>curso</th>
                  <th>paralelo</th>
                   <th>jornada</th>
                    <th>direccion</th>-->
                     <th>Fecha_registro</th>
                      <th>Estado</th>
                       <th>Opc</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </tfoot>
        
         <tbody>
					<?php while($fila = $result->fetch_assoc()) { 
                                            
                                             if($fila['estado'] == '1'){
                                                 $estado = "ACTIVO";
                                                    $class = "success";
                                            }elseif ($fila['estado'] == '0') {
        
    
                                                    $estado = "INACTIVO";
                                                      $class = "warning";    
                                                    } else {
                                                        $estado = "FINALIZO";
                                                      $class = "info";
                                                    }
                     
                                            
                                            
                                            ?>
                                                       
						<tr>
							
							<td><?php echo $fila['nombre_apellidos']; ?></td>
							
                                                        <td><?php echo $fila['celular']; ?></td>
                                                        <!--<td><?php echo $fila['telefono']; ?></td>-->
                                                        <td><?php echo $fila['correo']; ?></td>
                                                      
                                                        
                                                        <td><?php echo $fila['fecha_registro']; ?></td>
                                                        
                                                       
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
							<td> <a  class='btn btn-info' title='Editar Estudiante' onclick="editarEstudiante(<?php echo $fila['id_docentes']?>)"><i class="glyphicon glyphicon-edit"></i></a>
                                                            <?php 
                                                            if($idrolUsuario==1){
                                                            ?>
                <a  class='btn btn-danger' title='Eliminar Estudiante' onclick="eliminarEstudiante(<?php echo $fila['id_docentes']?>)"><i class="glyphicon glyphicon-trash"></i></a>
                                                       
                                                            <?php }?>             
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php } ?>
				</tbody>
        
    </table>
         </div>
    
    </body>
</html>




