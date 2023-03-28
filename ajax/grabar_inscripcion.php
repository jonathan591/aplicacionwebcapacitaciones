<?php

require '../conf/confconexion.php';
$id=$_POST['IdUsuario'];
  $id_hora=$_POST['hora_txt'];
  $id_p=$_POST['id_p'];
$mensaje=$_POST['mensaje'];
$id_estudiante=$_POST['txt_est'];
$query="select * from tb_estudiantes where id_estudiantes=$id_estudiante";
$resuk= mysqli_query($objConexion, $query);
$arrayes= mysqli_fetch_array($resuk);
 $correo=$arrayes['correo'];
 $teleno=$arrayes['telefono'];

$rescupo=1;
   $cruso=$_POST['cursos_txt'];
  $sqlcr="select * from tb_cursos where id_cursos=$cruso";
  $res= mysqli_query($objConexion, $sqlcr);
  $cuposs= mysqli_fetch_array($res);
  $cup=$cuposs['cupos'];
   $resucupo=$cup-$rescupo;

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




//insert
if($id>0){
    $sql="insert into tb_inscripcion(id_estudiantes,id_cursos,telefono,correo,id_jornadas,fecha_inicio,hora_inicio,hora_fin) values('$id_estudiante','$cruso','$teleno','$correo','$Jornadas','$Fecha_registro','$horaincio','$horafin');";


   if($cruso>0){        
    
   $sqlc="update tb_cursos set cupos='$resucupo' where id_cursos=$cruso";
   $resp= mysqli_query($objConexion, $sqlc);
    
    }
}
  
//    if($id>0){
//    $sql="update tb_inscripcion set id_estudiantes='$id_estudiante',id_cursos='$cruso',telefono='telefono',correo='$correo',id_jornadas='$Jornadas',fecha_inicio='$Fecha_registro',hora_inicio='$horaincio',hora_fin='$horafin' where id_inscripcion=$id";
//    }elseif ($id_hora==2) {
//   $sql="update tb_asistencia set emergencia='$emergencia',estado='$Estado' where id_asistencia=$id";


//ejecuto
$result=mysqli_query($objConexion,$sql);
if($result){
   

//        echo "<div class='alert alert-success' rol='alert'>Registro Eliminado Correctamente</div>";
    if($id>0){
        
       ?>
<script>
Swal.fire(
      'Registrado!',
      'Registro Guardado Correctamente.',
      'success'
    )
    setTimeout(function(){
         window.location='./inscripcion.php';
    },2000);
   
</script>

<?php

//        echo "<div class='alert alert-success' rol='alert'>Registro Guardado Correctamente</div>";
    }
}
else{
    echo "<div class='alert alert-danger' rol='alert'>Ocurrió un problema al momento de guardar. Favor intentar de nuevo</div>". mysqli_error();
}
}