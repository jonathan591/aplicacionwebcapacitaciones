<?php
  session_start();
require './conf/confconexion.php';
include './ajax/UserInfo.php';
 $ipusuario= UserInfo::get_ip();
 $dispositivo=UserInfo::get_device();
$sitema=UserInfo::get_os();
$navegador=UserInfo::get_browser();

 $correo=$_SESSION['correousuario'];
$NombresUsuario=$_SESSION['nombreUsuario_S'];
$usuariocde= $_SESSION['cedulasuserio_s'];
$idrol=$_SESSION['idRolUsuario_S'];
$sql="select * from tb_tipo_usuario where id_tipo_usuario=$idrol";
$resultda= mysqli_query($objConexion, $sql);
$arrayRol= mysqli_fetch_array($resultda);
$NombreRol=$arrayRol['descripcion'];

$fechaRegistro=date('Y-m-d H:i:s');
// include 'enviar_correo.php';
//insert

    $sql="insert into tb_ipusuario(usuario,nombre,tipo_usuario,ip_usuario,dispositivo,so,navegador,fecha) values('$usuariocde','$NombresUsuario','$NombreRol','$ipusuario','$dispositivo','$sitema','$navegador','$fechaRegistro');";
$result=mysqli_query($objConexion,$sql);

