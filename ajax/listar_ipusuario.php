<?php
require_once '../conf/confconexion.php';//conexion a la base de datos
if($estadoconexion==0){
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
session_start();
 
$idrolUsuario=$_SESSION['idRolUsuario_S'];
$sql = "SELECT * FROM tb_ipusuario;";
$result = mysqli_query($objConexion, $sql);

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
                <th>Usuario</th>
                <th>Nombre</th>
                 <th>Tipo_Usario</th>
                  <th>IP_Usuario</th>
                <th>Dispositivo</th>
               
                
                     <th>Sistema_O</th>
                      <th>Navegador</th>
                       <th>Fecha_hora</th>
                       <th>Opc</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </thead>
        
        
        <tfoot>
            <tr>
              
               <th>ID</th>
                <th>Usuario</th>
                <th>Nombre</th>
                 <th>Tipo_Usario</th>
                  <th>IP_Usuario</th>
                <th>Dispositivo</th>
               
                
                     <th>Sistema_O</th>
                      <th>Navegador</th>
                       <th>Fecha_hora</th>
                       <th>Opc</th>
                
                <!--<th>Salary</th>-->
            </tr>
        </tfoot>
        
         <tbody>
					<?php while($fila = $result->fetch_assoc()) { 
                                            
                                             
                                            
                                            
                                            ?>
                                                       
						<tr>
							
							<td><?php echo $fila['id']; ?></td>
							
                                                        <td><?php echo $fila['usuario']; ?></td>
                                                        <td><?php echo $fila['nombre']; ?></td>
                                                        <td><?php echo $fila['tipo_usuario']; ?></td>
                                                       <td><?php echo $fila['ip_usuario']; ?></td>
                                                        <td><?php echo $fila['dispositivo']; ?></td>
                                                         <td><?php echo $fila['so']; ?></td>
                                                          <td><?php echo $fila['navegador']; ?></td>

                                                        
                                                        <td><?php echo $fila['fecha']; ?></td>
                                                        
                                                       
							
							<td> 
                                                            <button  class='btn btn-danger' title='Eliminar ' onclick="eliminar(<?php echo $fila['id']?>)"><i class="fa fas fa-solid fa-trash"></i></button>
                                                       
                                                                     
                                                        </td>
							<!--<td> </td>-->
						</tr>
					<?php } ?>
				</tbody>
        
    </table>
         </div>
    <?php 
    }
    ?>
    </body>
    
</html>






