<?php
// conexion SERVIDOR - BD
require_once '../conf/confconexion.php';
if($estadoconexion==0){
   
    echo "<div class='alert alert-danger' role='alert'>No se pudo conectar al servidor, favor comunicar a TICS</div>";
    exit();
}
// recibo usuario y clave
$usuario=$_POST['usuario_p'];
$clave=$_POST['clave_p'];
$pass= md5($clave);
$query="select * from tb_usuario where cedula ='$usuario' and estado=0";
$resuk=mysqli_query($objConexion,$query);
$estado=mysqli_num_rows($resuk);

if($estado==1){
    ?>
<script>
    Swal.fire({
  icon: 'error',
  title: 'Su Cuenta esta inactiva actualmente ,comunicarse con el admin',
  text: '',
  footer: ''
})
</script>
    <?php
}else{



    $sql = "SELECT * FROM tb_usuario WHERE cedula = '$usuario'";
    $resultado = mysqli_query($objConexion, $sql);
    
    if (mysqli_num_rows($resultado) > 0) {
        $fila = mysqli_fetch_assoc($resultado);
    
        // Verificar si la contraseña ingresada coincide con la contraseña almacenada en la base de datos
        if (password_verify($clave, $fila['clave'])) {
            session_start();
      $_SESSION['idusuario_S']= $fila['id_usuario'];
    $_SESSION['nombreUsuario_S']= $fila['nombre'];
    $_SESSION['idRolUsuario_S']= $fila['id_tipo_usuario'];
    $_SESSION['cedulasuserio_s']= $fila['cedula'];
     $_SESSION['correousuario']= $fila['correo'];
            echo "1"; // Usuario logueado correctamente
        } else {
           ?>
           <script>
    Swal.fire({
  icon: 'error',
  title: ' Contraseña Incorrecta. Favor Intete de Nuevo',
  text: '',
  footer: ''
})
</script>
           <?php 
        }
    } else {
        ?>
        <script>
    Swal.fire({
  icon: 'error',
  title: 'Usuario Incorrecta. Favor Intete de Nuevo',
  text: '',
  footer: ''
})
</script>
        <?php 

       
    }

}
?>


   
    
 
     
   
   
  