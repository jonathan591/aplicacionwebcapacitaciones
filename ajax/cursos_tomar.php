<?php
$link=$_POST['cursos'];
session_start();
$idrolusuario= $_SESSION['idRolUsuario_S'];
if($idrolusuario==1){
echo $link;

}


if($link!=null){
   
$presentar="<iframe src='$link' width='100%' height='900px' style='border:0;' allowfullscreen='' loading='lazy'></iframe>";
echo $presentar;

}

?>



