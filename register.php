<?php 
  require_once ("./conf/confconexion.php");
?>

<html>
    <head>
        <title>Registrase | El Laurel</title>
       <link rel="icon" href="img/puntodeencuentro.jpeg">
       <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
      <link rel="stylesheet" href="css/bootstrap4.6.2.min.css" >
        <link rel="stylesheet" href="css/login.css">
        <link rel="stylesheet" href="css/carga.css">
      <script src="js/loader.js"></script>
     </head> 
     <style>         
     body{
            background: rgb(68 221 223);
    background: linear-gradient(135deg, rgb(56 204 206) 23%, rgb(98 156 232) 100%);
         }
     </style> 
        
     <body >
  
<div id="load-content" class="loader-wrapper">
    <div id="id-loading" class="loader-small"></div>
</div>
      <div class="navbar navbar-dark " style="background: white">
    <div class="container d-flex justify-content-between">
      
        <img class="img-fluid" src="img/punto.jpeg" width="504px" >
       
     
      
    </div>
  </div>
        <!--<div class="col-lg-5 col-lg-offset-6"></div>--> 
        <div class="container">
            <div class="login-form ">
<!--                <div class="form-header ">
                    <img src="img/logotipo.jpeg" class="img-circle" width="170px" >
                </div>-->
<form class="form-signin"  >
    <strong> Nombre</strong>  <input class="form-control" type="text" id="UsuarioTxt" name="Nombres_txt" placeholder="ingrese el usuario" required>
    <strong> Usuario</strong>  <input class="form-control" type="number" id="CeddulaTxt" name="cedula_txt" placeholder="ingrese la cedula" required>
    <strong> Correo </strong>  <input class="form-control" type="email" id="CorreoTxt" name="Correo_txt" placeholder="ingrese el correo" required>
    <strong>Contraseña</strong><input class="form-control" type="password" id="claveTxt" name=" Clave_txt" placeholder="ingrese la contraseña" required>
     <strong> tipo_usuario</strong>
                       
     <select class="form-control" id="tipo" name="tipo_txt">
          <option value="" >Selecione............................</option>
                            <?php
                                $sql_canton="select * from tb_tipo_usuario where id_tipo_usuario=2;";
                                $result_canton= mysqli_query($objConexion, $sql_canton);
                                while($cantonA=mysqli_fetch_array($result_canton)){
                                    $Nombretipo=$cantonA['descripcion'];
                                   
                                  
                                    
                                    ?>
                                    <option value="2" ><?php echo $Nombretipo; ?></option>
                                    <?php
                                }////fin del while
                            ?>
                          </select>
     
  
              
</form>
          
 <div class="form-footer">
                    <button id="ingresarBtn" name="Ingresar" class="btn btn-success" onclick="registrar()"> <i class="fas fa-sign-in-alt"></i>  Registrar</button>
                    <a href="login.php"> <button id="ingresarBtn" name="Ingresar" class="btn  btn-info" > iniciar session</button></a>
                </div>
                <div id="mensaje"></div>
              
                
            </div>
        </div>
    </body>
</html>
<!--<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>-->
<?php 
$sql="select * from tb_usuario";
$query=mysqli_query($objConexion,$sql);

$cedulas = array();
while($arry=mysqli_fetch_array($query)){
    $cedulas[] = $arry['cedula'];
}

?>

 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
  
    
function registrar(){
    var cedula=$('#CeddulaTxt').val();




 var expresion = /^[a-z][\w.-]+@\w[\w.-]+\.[\w.-]*[a-z][a-z]$/i;
   var email = document.getElementById('CorreoTxt').value;
      if (!expresion.test(email)){
     Swal.fire({
  icon: 'error',
  title: 'Correo',
  text: 'El correo es invalido introduzca uno valido',
  footer: ''
})
}else if(cedula.length>=10){
        
        var usuario=$('#UsuarioTxt').val();
        var cedula=$('#CeddulaTxt').val();
         var correo=$('#CorreoTxt').val();
          var tipo=$('#tipo').val();
        var clave=$('#claveTxt').val();
        $.ajax({
            type:'POST',
            url:'ajax/grabar_usuario.php',
            data: ({
                Nombres_txt: usuario,
                cedula_txt:cedula,
                Correo_txt:correo,
                tipo_txt:tipo,
                Clave_txt: clave
            }),
            success: function(data){
                
                $('#mensaje').html(data);
            var usuario=$('#UsuarioTxt').val("");
            var cedula=$('#CeddulaTxt').val("");
            var correo=$('#CorreoTxt').val("");
            var tipo=$('#tipo').val("");
            var clave=$('#claveTxt').val("");
                
            }
        });
    }else{
     Swal.fire({
  icon: 'error',
  title: 'Cedula',
  text: 'la cedula debe de tener minito 10 digitos',
  footer: ''
})
        
    }
    }

</script>


<script src="js/sweetalert2@11.js"></script>
