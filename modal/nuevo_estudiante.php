<?php
//Contiene las variables de configuracion para conectar a la base de datos
require_once ("../conf/confconexion.php");//Contiene funcion que conecta a la base de datos
session_start();
$idrolUsuario=$_SESSION['idRolUsuario_S'];
$id=$_POST['id_p'];
if($id==0){
    $titulo="Nuevo Estudiante";
    $color='#63baf1';
}
if($id>0){
     $color='#63EBF1';
    $titulo="Editar Estudiante";
    $sql="select * from tb_estudiantes where id_estudiantes=$id";
    $result= mysqli_query($objConexion, $sql);
    if($result!=null){
        if(mysqli_num_rows($result)>0){
            $usuarioA= mysqli_fetch_array($result);
            $NombresApellidos=$usuarioA['nombres_apellidos'];
             $Cedula=$usuarioA['cedula'];
             $Telefono=$usuarioA['telefono'];
             $Correo=$usuarioA['correo'];
             $direccion=$usuarioA['direccion'];
             
             $idCarrerasEditar=$usuarioA['id_canton'];
              $edad=$usuarioA['edad'];
              $fechnacm=$usuarioA['fecha_nacimiento'];
//              $idJornadasEditar=$usuarioA['id_jornadas'];
            $Estado=$usuarioA['estado'];
            if($Estado=='1'){
                $seleccionaA="selected";
//                $seleccionaI="";
            }
              elseif($Estado=='0'){
                $seleccionaI="selected";
//                $seleccionaA="";
            }else{
                  $seleccionaF="selected";
            }
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
           url:'ajax/grabar_estudiante.php',
           data:$(this).serialize(),
           success: function (data){
               $("#resultados_usuario").html(data);
               listar('ajax/listar_estudiante.php');
           }
       }); 
       return false;
    });
});


</script>

<html>
<div class="modal fade  bd-example-modal-lg" id="MyModal" tabindex="" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class=" modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header" style="background:<?php echo$color ?>;">
                <h5 class="modal-title" id="myModalLabel" style="color:#fff"><i class='fas fa-edit'></i> <?php echo $titulo; ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                
            </div>
           <div class="modal-body">
                <form class="form-horizontal" method="post" id="guardar_estudiante" name="guardar_estudiante">
                    <div class="row">
                        <div class="col-lg-6">
                    <div class="form-group"> 
                        <label for="Nombres_Apellidos" class="col-control-label font-weight-bold Negrita">Nombres y Apellidos:</label>
                        
                            <input type="text" minlength="10" id="myInput"  autocapitalize="words" name="Nombres_Apellidos_txt" class="form-control" value="<?php echo $NombresApellidos; ?>" required placeholder="ingrese su nombre y apellidos"/>
                        </div>
                    </div>
                        <div class="col-lg-6">
                     <div class="form-group">
                        <label for="Cedula" class="col-control-label font-weight-bold Negrita">Cedula:</label>
                        
                            <input type="number" minlength="10" id="Nombres"  name="Cedula_txt" class="form-control" value="<?php echo $Cedula; ?>" required placeholder="ingrese su cedula"/>
                        </div>
                    </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-6">
                     <div class="form-group">
                        <label for="Telefono" class="col-control-label font-weight-bold Negrita">N.Celular:</label>
                        
                            <input type="number" minlength="10" id="Nombres" name="Telefono_txt" class="form-control" value="<?php echo $Telefono; ?>" required placeholder="ingrese su numero de celular"/>
                        </div>
                    </div>
                         <div class="col-lg-6">
                     <div class="form-group">
                        <label for="Correo" class="col-control-label font-weight-bold Negrita"> Correo:</label>
                       
                            <input type="email" id="" name="Correo_txt" class="form-control" value="<?php echo $Correo; ?>" required placeholder="ingrese su correo"/>
                        </div>
                    </div>
                 </div>
                    <div class="row">
                         <div class="col-lg-6">
                    <div class="form-group">
                        <label for="Carreras" class="col-control-label font-weight-bold Negrita">Canton:</label>
                      
                         <select class="custom-select" id="carreras" name="Canton_txt" required>
                             <option value="">seleccione.....................</option>
                            <?php
                                $sql_carreras="select * from tb_canton;";
                                $result_carreras= mysqli_query($objConexion, $sql_carreras);
                                while($carrerasA=mysqli_fetch_array($result_carreras)){
                                    $DescripcionCarreras=$carrerasA['NombreCanton'];
                                    $idCarreras=$carrerasA['id_canton'];
                                    $seleccionaCarreras='';
                                    if($idCarreras==$idCarrerasEditar){
                                        $seleccionaCarreras='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idCarreras; ?>" <?php echo $seleccionaCarreras; ?>><?php echo $DescripcionCarreras; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
                        </div>
                    </div>
   <div class="col-lg-6">
                            <div class="form-group">
                        <label for="Cursos" class="col-control-label font-weight-bold Negrita">Fecha Nacimiento: </label>
                    
                        <input  type="date" name="fechanac_txt" class="form-control" value="<?php echo $fechnacm ?>" required>
                        
                        </div>
                    </div>
                        </div>
                    <div class="row">
                        <div class="col-lg-6">
                          <div class="form-group">
                        <label for="Paralelos" class="col-control-label font-weight-bold Negrita">Edad:</label>
                       
                        <input type="number" name="edad_txt" class="form-control" value="<?php echo $edad ?>" required placeholder="ingrese su edad">
                        </div>
                    </div>
<div class="col-lg-6">
                           
                     <div class="form-group">
                        <label for="Correo" class="col-control-label font-weight-bold Negrita"> Direccion:</label>
                        
                            <input type="text" minlength="8" id="Nombres" name="Direccion_txt" class="form-control" value="<?php echo $direccion; ?>" required placeholder="ingrese su direccion"/>
                        </div>    
                 
                    </div>
                        </div>
                    <div class="row">
                        
                    
                     
                     <div class="col-lg-6">
                    <div class="form-group">
                        <label for="estado" class="col-control-label font-weight-bold Negrita">Estado:</label>
                       
                         <select class="custom-select" id="estado" name="Estado_txt" required>
                             <?php if ($idrolUsuario==1 ) {?>
                             <option value="1" <?php echo $seleccionaA; ?>>Activo</option>
                             <option value="0" <?php echo $seleccionaI; ?>>Inactivo</option>
                           
                              
                             <?php }?>
                                <?php if ($idrolUsuario==2) {?>
                             
                           <option value="1" <?php echo $seleccionaA; ?>>Activo</option>
                             <?php }?>
                            
                             
                          </select>
                        </div>
                    </div>
                        </div>
                    <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                <button type="submit" class="btn btn-primary" id="guardar_estudiante"><i class="bi bi-hdd-fill"></i> Guardar Datos</button>
            </div>
                     <div id="resultados_usuario"></div>
                     <input id="IdUsuario" name="IdUsuario" type="hidden">
                </form>
            </div>
            
        </div>
    </div>
</div>
</html>
<!-- <script src="./js/letras.js"></script> -->