<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos
session_start();
  $cedulaUsuar= $_SESSION['cedulasuserio_s'];
      $idrolUsuario=$_SESSION['idRolUsuario_S'];

$id=$_POST['id_p'];
if($id==0){
    $titulo="Registrar inscripcion";
     $color='#63baf1';
  
    
     
}
if($id>0){
     $color='#63EBF1';
    $titulo="Editar inscripcion";
    $sql="select * from tb_inscripcion where id_inscripcion=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
         
            $estudiante=$usuarioA['id_estudiantes'];
           
             $jornada=$usuarioA['id_jornadas'];
             $Cursos=$usuarioA['id_cursos'];
             $fecha_i=$usuarioA['fecha_inicio'];
               $hora_i=$usuarioA['hora_inicio'];
                 $hora_fi=$usuarioA['hora_fin'];
           
             
          
         
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
        //alert(123);
       $.ajax({
           type: $(this).attr("method"),
           url:'ajax/actu_inscripcion.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
              listar('ajax/listar_inscripcion.php');
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
                <strong><h5 class="modal-title" id="myModalLabel" style="color:#fff"><i class='fas fa-edit'></i> <?php echo $titulo; ?></h5></strong>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
           <div class="modal-body">
                <form  class="form-horizontal" method="post" id="guardar_estudiante" name="guardar_estudiante">
                   
                      <div class="col-lg-12">
                    <div class="form-group">
                        <label for="Jornadas" class="col-control-label font-weight-bold Negrita">Nombres de Estudiantes </label>
                     
                           
                         <select class="custom-select" id="estudiante" name="txt_est" >
                            
                    
                             <!--<option value="">Selecionar......................</option>-->
                             <?php
                          
                              $sql_jornadas="select * from tb_estudiantes where estado=1;";  
                           
                                
                                $result_jornadas= mysqli_query($objConexion, $sql_jornadas);
                                while($jornadasA=mysqli_fetch_array($result_jornadas)){
                                    $DescripcionJornadas=$jornadasA['nombres_apellidos'];
                                     $idJornadas=$jornadasA['id_estudiantes'];
                                   $seleccionaJornadas='';
                                    if($idJornadas==$estudiante){
                                        $seleccionaJornadas='selected';
                                    }
                                   
                                    ?>
                              
                                    <option value="<?php echo $idJornadas; ?>" <?php echo $seleccionaJornadas; ?> ><?php echo $DescripcionJornadas; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                                   
                          </select>
                           
                        </div>
                        
                        
      
               
                         </div>
                                          <div class="col-lg-12">
                     <div class="form-group">
                        <label for="Correo" class="col-control-label font-weight-bold Negrita"> Cursos</label>
                      
                       <select   class="custom-select" id="jornadas" name="cursos_txt" required>
                               <!--<option  value="">Selecionar......................</option>-->
                            <?php
                                $sql_curos="select * from tb_cursos;";
                                $result_cursos= mysqli_query($objConexion, $sql_curos);
                                while($cursosA=mysqli_fetch_array($result_cursos)){
                                    $Descripcioncursos=$cursosA['descripcion'];
                                    $idcursos=$cursosA['id_cursos'];
                                    $seleccionacursos='';
                                    if($idcursos==$Cursos){
                                        $seleccionacursos='selected';
                                    }
                                    ?>
                                    <option  value="<?php echo $idcursos; ?>" <?php echo $seleccionacursos; ?>><?php echo $Descripcioncursos; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                          
                    </div>
                       <div class="col-lg-12">
                     <div class="form-group">
                        <label for="Jornada" class="col-control-label font-weight-bold Negrita">Jornada</label>
                     
                        <select  class="custom-select"  id="jornadas" name="Jornadas_txt" required>
                               <!--<option value="0">Selecionar......................</option>-->
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
               

                    
                     <div class="col-lg-12">
                    <div class="form-group">
                        <label for="tipo" class="col-control-label font-weight-bold Negrita"> fecha_inicio</label>
                      
                        <input  readonly type="date" class="form-control" name="fecha_inicoo" id="fecha_inic" value="<?php echo $fecha_i ?>">
                        </div>
                    </div>
                     <div class="col-lg-12">
                    <div class="form-group">
                        <label for="tipo" class="col-control-label font-weight-bold Negrita"> hora_inicio</label>
                      
                        <input  readonly type="time" class="form-control" name="hora_inicoo" id="fecha_inic" value="<?php echo $hora_i ?>">
                        </div>
                    </div>
                     <div class="col-lg-12">
                    <div class="form-group">
                        <label for="tipo" class="col-control-label font-weight-bold Negrita"> hora_inicio</label>
                      
                        <input  readonly type="time" class="form-control" name="hora_fin" id="fecha_inic" value="<?php echo $hora_fi ?>">
                        </div>
                    </div>
                    <?php 
//                    if($idrolUsuario==1){
//                        $etiqye='';
//                    } else {
//                        $etiqye='disabled';
//                    }
                    ?>
                   
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardar_estudiante"><i class="bi bi-hdd-fill"></i> guardar inscripcion</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>


