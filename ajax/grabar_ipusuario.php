<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
$id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
if($mensaje=='eliminar'){
        $sql="delete from tb_ipusuario where id=$id_p";
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
