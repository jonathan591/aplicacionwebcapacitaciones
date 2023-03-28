<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
$id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
 $NombresApellidos=$_POST['Nombres_txt'];
 $cedula=$_POST['cedula_txt'];
 $Correoa=$_POST['Correo_txt'];
$Clavea=$_POST['Clave_txt'];
$passs=password_hash($Clavea, PASSWORD_DEFAULT);;
 $estado=$_POST['estado_txt'];
 $tipo=$_POST['tipo_txt'];
if($estado==''){
    $estado=1;
}

$fechaRegistro=date('Y-m-d');

//insert
if($id==0){
    $sql="insert into tb_usuario(nombre,cedula,correo,clave,fecha,id_tipo_usuario,estado) values('$NombresApellidos','$cedula','$Correoa','$passs','$fechaRegistro','$tipo','$estado');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_usuario where id_usuario=$id_p";
    }else{
    if($id>0){
        $sql="update tb_usuario set nombre='$NombresApellidos',cedula='$cedula', correo='$Correoa', id_tipo_usuario='$tipo',estado='$estado' where id_usuario=$id";
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
