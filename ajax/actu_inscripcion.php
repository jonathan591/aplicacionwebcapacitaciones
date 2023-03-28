<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
  $id_hora=$_POST['hora_txt'];
  $id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];

 $id_estudiante=$_POST['txt_est'];
if($id_estudiante!=null){
$query="select * from tb_estudiantes where id_estudiantes=$id_estudiante";
$resuk= mysqli_query($objConexion, $query);
$arrayes= mysqli_fetch_array($resuk);
 $correo=$arrayes['correo'];
 $teleno=$arrayes['telefono'];
}
$rescupo=1;
   $cruso=$_POST['cursos_txt'];
   if($cruso>0){

   
  $sqlcr="select * from tb_cursos where id_cursos=$cruso";
  $res= mysqli_query($objConexion, $sqlcr);
  $cuposs= mysqli_fetch_array($res);
  $cup=$cuposs['cupos'];
   $resucupo=$cup-$rescupo;
 
}
   $Jornadas=$_POST['Jornadas_txt'];

   $Fecha_registro=$_POST['fecha_inicoo'];
   $horaincio=$_POST['hora_inicoo'];
   $horafin=$_POST['hora_fin'];
if($cup=='0'){
    ?>
  <script>
    Swal.fire(
          'Cupos Agotados!',
          'Se Agotaron los cupos actualmente .',
          'error'
        )
    </script>
  <?php
}else{



  if($mensaje=='eliminar'){
        $sql="delete from tb_inscripcion where id_inscripcion=$id_p";
    }
    if($id>0){
    $sql="update tb_inscripcion set id_estudiantes='$id_estudiante',id_cursos='$cruso',telefono='$teleno',correo='$correo',id_jornadas='$Jornadas',fecha_inicio='$Fecha_registro',hora_inicio='$horaincio',hora_fin='$horafin' where id_inscripcion=$id";
   
}
if($cruso>0 && $rescupo==1){
    $sqlc="update tb_cursos set cupos='$resucupo' where id_cursos=$cruso";
    $resp= mysqli_query($objConexion, $sqlc);
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
      'Registro Actualizado Correctamente.',
      'success'
    )

   
</script>

<?php

//        echo "<div class='alert alert-success' rol='alert'>Registro Guardado Correctamente</div>";
    }
}
else{
    echo "<div class='alert alert-danger' rol='alert'>Ocurrió un problema al momento de guardar. Favor intentar de nuevo</div>".mysqli_error();
}
}
