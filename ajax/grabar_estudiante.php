<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
$id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$NombresApellidos=$_POST['Nombres_Apellidos_txt'];
$Cedula=$_POST['Cedula_txt'];
$Telefono=$_POST['Telefono_txt'];
$Correo=$_POST['Correo_txt'];
$Canton=$_POST['Canton_txt'];
$edad=$_POST['edad_txt'];
$fecha_na=$_POST['fechanac_txt'];

$Direccion=$_POST['Direccion_txt'];
$Fecha_registro=date('Y-m-d');
$Estado=$_POST['Estado_txt'];

if($id==0){
$sqles="SELECT * FROM tb_estudiantes where cedula ='$Cedula' limit 1";
$res=mysqli_query($objConexion,$sqles);
if(mysqli_num_rows($res)>0){
    echo "<div class='alert alert-danger' rol='alert'>El estudiante ya esta registrado</div>";
    return;
}else{


//insert
if($id==0){
   
    
    $sql="insert into tb_estudiantes(nombres_apellidos,cedula,telefono,correo,fecha_nacimiento,id_canton,edad,direccion,fecha_registro,estado) values('$NombresApellidos','$Cedula','$Telefono','$Correo','$fecha_na','$Canton','$edad','$Direccion','$Fecha_registro','$Estado');";
}
}
}
if($mensaje=='eliminar'){
        $sql="delete from tb_estudiantes where id_estudiantes=$id_p";
    }else{
    if($id>0){
        $sql="update tb_estudiantes set nombres_apellidos='$NombresApellidos', cedula='$Cedula',correo='$Correo',telefono='$Telefono', id_canton='$Canton',fecha_nacimiento='$fecha_na',edad='$edad',direccion='$Direccion',fecha_registro='$Fecha_registro',estado='$Estado' where id_estudiantes=$id";
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
