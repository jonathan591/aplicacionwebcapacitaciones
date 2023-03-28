<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
session_start();
  $cedulaUsuar= $_SESSION['cedulasuserio_s'];
      $idrolUsuario=$_SESSION['idRolUsuario_S'];
//$idrolUsuar=$_SESSION['idRolUsuari'];
 if($idrolUsuario==1){
    $sql = "SELECT * FROM tb_estudiantes;"; 
    $result = mysqli_query($objConexion, $sql);
 }
 if($idrolUsuario==2){
    $sql = "SELECT * FROM tb_estudiantes where cedula=$cedulaUsuar;"; 
    $result = mysqli_query($objConexion, $sql);
   
 }

//     $sql = "SELECT nombres_apellidos,cedula,correo,telefono,id_carreras,id_cursos,id_paralelos,id_jornadas,direccion,estado
//FROM tb_estudiantes WHERE cedula=$idrolUsuar"; 
//    
//
//echo $idrolUsuar;

// $result = mysqli_query($objConexion, $sql);

 


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
            <!--<div class="dataTables_scroll">-->
            
        
        <table id="tablaListar" class="table table-striped table-bordered dataTable" style="width:100%" cellspacing="0" role="grid" aria-describedby="tablaListar_info">
        <thead>
            <tr >
               <th >ID</th>
                <th >Nombres Apellidos</th>
                <th>Cedula</th>
                 <th>N.Celular</th>
                <th>Correo</th>
                <th>Fecha Nacimiento</th>
                 <th> Edad </th>
                  <th>Canton</th>
             
                    <th>Direccion</th>
                     <!--<th>fecha</th>-->
                      <th>Estado</th>
                       <th>Opciones</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        
        
         <tbody>
					<?php 
                                        
                                       while ($fila = $result->fetch_assoc()){
                                                  
                                         
                                            
                                             if($fila['estado'] == '1'){
                                                 $estado = "ACTIVO";
                                                    $class = " btn btn-success";
                                            }elseif ($fila['estado'] == '0') {
        
    
                                                    $estado = "INACTIVO";
                                                      $class = " btn btn-warning";    
                                                    } else {
                                                        $estado = "FINALIZO";
                                                      $class = " btn btn-info";
                                                    }
                     
                                            
                                            
                                            ?>
                                                       
						<tr>
                                                    <td><?php echo $fila['id_estudiantes']?></td>
							<td><?php echo $fila['nombres_apellidos']; ?></td>
							
                                                        <td><?php echo $fila['cedula']; ?></td>
                                                        <td><?php echo $fila['telefono']; ?></td>
                                                        <td><?php echo $fila['correo']; ?></td>
                                                      
                                                        <td><?php echo $fila['fecha_nacimiento']?></td>
                                                        
                                                       
                                                         <td><?php echo $fila['edad']?></td>
                                                                    
                                                         <?php
                                                              $idparalelos=$fila['id_canton'];
                                                             $sqlParalelos="select * from tb_canton where id_canton=$idparalelos;";
                                                                $resultParalelos= mysqli_query($objConexion, $sqlParalelos);
                                                                    $ParalelosArray= mysqli_fetch_array($resultParalelos);
                                                                    $DescripcionParalelos=$ParalelosArray['NombreCanton'];
                                                                         ?>
                                                                    <td><?php echo $DescripcionParalelos?></td> 
                                                                    
                                                                  
                                                                    
                                                         <td><?php echo $fila['direccion']; ?></td>
                                                        <!--<td><?php echo $fila['fecha_registro']; ?></td>-->
                                                        
                                                       
							<td><span class="label label-<?php echo $class; ?>"><?php echo $estado?></span></td>
							
                                                        <td> <?php 
                                                        if($idrolUsuario==1||$idrolUsuario==2){
                                                            
                                                       
                                                        ?>
                                                         <button  class='btn btn-info' title='Editar Estudiante' onclick="editarEstudiante(<?php echo $fila['id_estudiantes']?>)"><i class="fas fa-edit"></i></button>
                                                            <?php 
                                                           }
                                                           if($idrolUsuario==1){
                                                               
                                                          
                                                            ?>
                                                            <button  class='btn btn-danger' title='Eliminar Estudiante' onclick="eliminarEstudiante(<?php echo $fila['id_estudiantes']?>)"><i class="fas fa fa-solid fa-trash"></i></button>
                                                       <?php  }?>
                                                                 
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php  
                                             
                                      }
                                          ?>
				</tbody>
                                <tfoot>
            <tr>
                 <th >ID</th>
                <th>Nombres Apellidos</th>
                <th>Cedula</th>
                 <th>N.Celular</th>
                <th>Correo</th>
                <th>Fecha Nacimiento</th>
                 <th> Edad </th>
                  <th>Canton</th>
               
                    <th>Direccion</th>
                     <!--<th>fecha</th>-->
                      <th>Estado</th>
                       <th>Opciones</th>
<!--                <th>Salary</th>-->
            </tr>
        </tfoot>
        
    </table>
                     </div>
       
        
        
    </body>
</html>


