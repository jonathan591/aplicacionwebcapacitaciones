<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
$id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$NombresApellidos=$_POST['Nombres_Apellidos_txt'];
$Cedula=$_POST['Celular_txt'];

$Correo=$_POST['Correo_txt'];


$Fecha_registro=$_POST['fecha_txt'];
$Estado=$_POST['Estado_txt'];



//insert
if($id==0){
    $sql="insert into tb_docentes(nombre_apellidos,celular,correo,fecha_registro,estado) values('$NombresApellidos','$Cedula','$Correo','$Fecha_registro','$Estado');";
}
if($mensaje=='eliminar'){
        $sql="delete from tb_docentes where id_docentes=$id_p";
    }else{
    if($id>0){
        $sql="update tb_docentes set nombre_apellidos='$NombresApellidos', celular='$Cedula',correo='$Correo',fecha_registro='$Fecha_registro',estado='$Estado' where id_docentes=$id";
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
