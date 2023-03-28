<?php

require '../conf/confconexion.php';
 $id=$_POST['IdUsuario'];
 $id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$desci=$_POST['descripcion_txt'];
$jornaa=$_POST['Jornadas_txt'];

$fechainci=$_POST['fecha_inicio_txt'];

$fechafin=$_POST['fecha_fin_txt'];

$horainicio=$_POST['hora_inicio_txt'];

$horafin=$_POST['hora_fin_txt'];

$cupos=$_POST['cupos_txt'];

$color=$_POST['color_txt'];

$imagen=$_FILES["Imagen"]["size"];
if($imagen>1048576){
   echo "<div class='alert alert-danger' rol='alert'>la imagen  es muy grande debe ser menor o igual a 1M </div>"; 
}else{
    if(!empty($_FILES['Imagen']['tmp_name']) 
     && file_exists($_FILES['Imagen']['tmp_name'])) {
    $imagen = addslashes(file_get_contents($_FILES['Imagen']['tmp_name']));
}
//insert
if($id==0){
    $sql="insert into tb_cursos(descripcion,id_jornadas,fecha_inicio,fecha_fin,hora_inicio,hora_fin,cupos,color,imagen) values('$desci','$jornaa','$fechainci','$fechafin','$horainicio','$horafin','$cupos','$color','$imagen');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_cursos where id_cursos=$id_p";
    }else{
    if($id>0){
        if($imagen==''){

        
        $sql="update tb_cursos set descripcion='$desci', id_jornadas='$jornaa', fecha_inicio='$fechainci',fecha_fin='$fechafin',hora_inicio='$horainicio',hora_fin='$horafin',cupos='$cupos',color='$color' where id_cursos=$id";
    }else{
        $sql="update tb_cursos set descripcion='$desci', id_jornadas='$jornaa', fecha_inicio='$fechainci',fecha_fin='$fechafin',hora_inicio='$horainicio',hora_fin='$horafin',cupos='$cupos',color='$color', imagen='$imagen' where id_cursos=$id";
    }
}
}
//ejecuto
$result=mysqli_query($objConexion,$sql);

if($result){
    if($mensaje=='eliminar'){
       ?> 
<script>
Swal.fire(
      'Eliminado!',
      'eliminado existosamente .',
      'success'
    )
</script>
<?php
//        echo "<div class='alert alert-success' rol='alert'>Registro Eliminado Correctamente</div>";
    }else{
        
       ?>
<script>
Swal.fire(
      'Registrado!',
      'Registro Guardado Correctamente.',
      'success'
    )
</script>
<?php
//        echo "<div class='alert alert-success' rol='alert'>Registro Guardado Correctamente</div>";
    }
}
else{
    echo "<div class='alert alert-danger' rol='alert'>Ocurrió un problema al momento de guardar. Favor intentar de nuevo</div>". mysqli_error();
}
}