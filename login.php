<?php
if(session_id()==''){
    session_start();
}
//limpiamos el array de la variable de ssesion. 
$_SESSION = array();
// permite destruir la sesión activa
session_destroy();
?>

<html>
    <head>
        <title>Iniciar Session | El Laurel</title>
        <link rel="icon" href="img/puntodeencuentro.jpeg">
         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
       <!--<link rel="stylesheet" href="css/bootstrap.min.css">-->
        <!-- <link rel="stylesheet" href="css/login.css"> -->
        <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="css/bootstrap4.6.2.min.css" >
<link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/carga.css">
      <script src="js/loader.js"></script>
     </head>          
    
     <style>

         body{
            background: rgb(68 221 223);
    background: linear-gradient(135deg, rgb(56 204 206) 23%, rgb(98 156 232) 100%);
         }
     </style>   
     <body  >
  
<div id="load-content" class="loader-wrapper">
    <div id="id-loading" class="loader-small"></div>
</div>
     
         <div class="navbar navbar-dark " style="background: white">
    <div class="container d-flex justify-content-between">
      
        <img class="img-fluid" src="img/punto.jpeg" width="504px" >
       
     
      
    </div>
  </div>

       
        <!--<div class="col-lg-5 col-lg-offset-6"></div>--> 
        <div class="container-fluid mt-3">
        <div class="row">
            <article class="col-lg-8 d-none d-md-block d-sm-block">
                <div class="card">
                    <div class="card-header">
                       Servicios Academicos.
                    </div>
                    <div class="card-body">
                        <div class="slider">
                        <!-- <iframe src="https://repelis24.se/inicio/" style='border:0;' allowfullscreen='' loading='lazy' width='100%' height='400px'></iframe> -->
                           <ul>
                               
                               <li><img class="img-fluid" src="img/12.jpg" ></li>
                               <li><img class="img-fluid" src="img/13.jpg" ></li>
                               <li><img class="img-fluid" src="img/14.jpg" ></li>
                               <li><img class="img-fluid" src="img/bachillerato-4.jpg" ></li>
                           </ul>
                            
                        </div>
                    </div>
                </div>
            </article>


            <aside class="col-lg-4">
                <div class="card shadow">
                    <div class="card-body">
                        <form id="envia_login" class="form-signin p-4">
                            <input type="hidden" name="action" value="login">
                            <div class="text-center">
                                <i class="fa fa-graduation-cap fa-4x text-primary"></i>
                            </div>

                            <h4 class="mb-2 font-weight-normal text-center">Iniciar Sesion</h4>
                            <hr>
                            <div id="mensaje">
                                
                            </div>

                            <label for="inputEmail" class=""><i class="fas fa-users"></i> Usuario</label>
                            <input type="text" name="usuario_p" class="form-control mt-2" placeholder="ingrese el numero de cedula " required=""
                                   autofocus="">

                            <label for="inputPassword" ><i class="fas fa-lock"></i> Contraseña</label>
                            <div class="input-group">
                            <input type="password" id="txtPassword" name="clave_p" class="form-control" placeholder="ingrese la Contraseña"
                                   required="">
                                   <div class="input-group-append">
                               <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                           </div>
                            </div>
        
        
      
                            <div class="checkbox mb-3 mt-1">
                                <label>
                                    <a href="register.php"><i class="fas fa-user"></i> Registrase</a>
                                </label>
                            </div>
                            <button  id="envia_login" type="submit" class="btn btn-lg btn-primary btn-block">
                                <i class="fa fa-sign-in-alt"></i> Inicias Sesión
                            </button>
                           
                        </form>
                    </div>
                </div>
            </aside>


        </div>
    </div>
    </body>
</html>
<!--<script src="js/jquery-3.6.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>-->
 <script src="vendor/jquery/jquery.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script>
    $(document).ready(function(){
    // capturar el valor del id que se recibe
     $('#envia_login').bind("submit", function (){
       // alert(123);
       $.ajax({
           type: 'Post',
           url:'ajax/verificalogin.php',
           data:$(this).serialize(),
           success: function (data){
                 if(data==1){
                  
                    window.location='inicio.php';
                     Login('ip_insert.php');
             
                }else{
                    $('#mensaje').html(data);
                }
              
           }
       }); 
       return false;
    });
});

function Login(url){
    $.ajax({
      type: 'POST',
      url:url,
      success:function(data){
          $('#mensaje').html(data);
      },
   });
}

function mostrarPassword(){
		var cambio = document.getElementById("txtPassword");
		if(cambio.type == "password"){
			cambio.type = "text";
			$('.icon').removeClass('fa fa-eye-slash').addClass('fa fa-eye');
		}else{
			cambio.type = "password";
			$('.icon').removeClass('fa fa-eye').addClass('fa fa-eye-slash');
		}
	} 
</script>

<script src="js/sweetalert2@11.js"></script>