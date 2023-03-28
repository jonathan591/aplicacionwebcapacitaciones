<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos

$id=$_POST['id_p'];
if($id==0){
    $titulo="Nuevo curso";
     $color='#63baf1';
}
if($id>0){
     $color='#63EBF1';
    $titulo="Editar cursos";
    $sql="select * from tb_cursos where id_cursos=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $descripcion=$usuarioA['descripcion'];
             $jornada=$usuarioA['id_jornadas'];
              $fechaini=$usuarioA['fecha_inicio'];
               $fechafinn=$usuarioA['fecha_fin'];
                $horaini=$usuarioA['hora_inicio'];
                 $horafinn=$usuarioA['hora_fin'];
                  $cupo=$usuarioA['cupos'];
               $colors=$usuarioA['color'];
               $imagens=$usuarioA['imagen'];
            
     
          
             
           
             
          
        }else{
            echo "No se encontró registro con el código: ".$id;
            exit();
        }
    }else{
        echo "Ocurrió un problema al momento de ejecutar la consulta".mysqli_error_list();
        exit();
    }
}
?>
<script>
$(document).ready(function(){
    // capturar el valor del id que se recibe
    $('#IdUsuario').val(<?php echo $id; ?>);
     $('#guardar_estudiante').bind("submit", function (){
          var data = $(this).serialize(); 
        //alert(123);
       $.ajax({
           type: 'Post',
           url:'ajax/grabar_curso.php',
           data:  new FormData(this),
            contentType: false,
                  cache: false,
            processData:false,
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_curso.php');
           }
       }); 
       return false;
    });
});

</script>
<html>
<div class="modal fade" id="MyModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header"  style="background:<?php echo$color ?>;">
                
                <h5 class="modal-title" id="myModalLabel" style="color:#fff"><i class='fas fa-edit'></i> <?php echo $titulo; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
           <div class="modal-body">
                <form class="form-horizontal" method="post" id="guardar_estudiante" name="guardar_estudiante" enctype="multipart/form-data">
                    <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">descripcion</label>
                       
                        <input id="Nombres" name="descripcion_txt" class="form-control" value="<?php echo $descripcion; ?>" required placeholder="ingresa la descripcion "/>
                        </div>
                    </div>
                     <div class="col-lg-6">
                     <div class="form-group">
                        <label for="Jornada" class="col-control-label font-weight-bold Negrita">Jornada</label>
                     
                         <select class="custom-select" id="jornadas" name="Jornadas_txt" required>
                               <option value="">Selecionar......................</option>
                            <?php
                                $sql_jornadas="select * from tb_jornadas;";
                                $result_jornadas= mysqli_query($objConexion, $sql_jornadas);
                                while($jornadasA=mysqli_fetch_array($result_jornadas)){
                                    $DescripcionJornadas=$jornadasA['descripcion'];
                                    $idJornadas=$jornadasA['id_jornadas'];
                                    $seleccionaJornadas='';
                                    if($idJornadas==$jornada){
                                        $seleccionaJornadas='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idJornadas; ?>" <?php echo $seleccionaJornadas; ?>><?php echo $DescripcionJornadas; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
                    </div> 
                    <div class="row">
                   <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">Fecha_inicio</label>
                       
                        <input id="fecha" type="date" name="fecha_inicio_txt" class="form-control" value="<?php echo $fechaini; ?>" required />
                        </div>
                    </div>
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">Fecha_final</label>
                       
                        <input id="fecha" type="date" name="fecha_fin_txt" class="form-control" value="<?php echo $fechafinn; ?>" required/>
                        </div>
                    </div>
                        </div>
                    <div class="row">
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">hora_inicio</label>
                       
                        <input id="fecha" type="time" name="hora_inicio_txt" class="form-control" value="<?php echo $horaini; ?>" required />
                        </div>
                    </div>
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">hora_final</label>
                       
                        <input id="fecha" type="time" name="hora_fin_txt" class="form-control" value="<?php echo $horafinn; ?>" required />
                        </div>
                    </div>
                        </div>
                    <div class="row">
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">Cupos</label>
                       
                        <input id="fecha" type="number" name="cupos_txt" class="form-control" value="<?php echo $cupo; ?>" required />
                        </div>
                    </div>
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">Color</label>
                       
                        <input  type="color" name="color_txt" class="form-control" value="<?php echo $colors; ?>" required/>
                        </div>
                    </div>
                        </div>
     <?php
                        if($id>0){
                        
                    
                        ?>
                        <div class="text-center col-lg-4">
                            
                            <img  style="width: 200px; height: 150px;" src="data:image/jpg;base64,<?php echo base64_encode($imagens)?>" alt="">
                          <br>
                        <!-- <p> Foto de paciente</p> -->
                        </div>
                        <?php 
                             }?>
                    <div class="form-group">
                        <label for="fecha" class="col-control-label font-weight-bold Negrita">Imagen</label>
                       
                        <input id="fecha" type="file" name="Imagen" class="form-control"   />
                        </div>
                  
                   
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardar_estudiante"><i class="glyphicon glyphicon-floppy-disk"></i> Guardar Datos</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>


