<?php
//validación de que la sesión esté activa
$alert = '';
   session_start();
   $idrolUsuario=$_SESSION['idRolUsuario_S'];
if(!empty($_SESSION['activa'])){
        header('location: header.php');
   }   

require './conf/confconexion.php';


?>
<?php 

$sql="select * from tb_cursos ORDER BY id_cursos desc";
$ress= mysqli_query($objConexion, $sql);
// traemos la cantidad de usurios
$sqluser="SELECT COUNT(*) AS cantidad FROM  tb_usuario  ;";
$resultado=mysqli_query($objConexion,$sqluser);
$arryuser= mysqli_fetch_array($resultado);
$cantidauser=$arryuser['cantidad'];

// traemos la cantidad de los estudisntes
$sqlestu="SELECT COUNT(*) AS cantidad FROM  tb_estudiantes  ;";
$resultad=mysqli_query($objConexion,$sqlestu);
$arryestu= mysqli_fetch_array($resultad);
$cantida=$arryestu['cantidad'];

// traemos la cantidad de asistencia
$sqlasite="SELECT COUNT(*) AS cantidad FROM  tb_cursos  ;";
$resultass=mysqli_query($objConexion,$sqlasite);
$arryasi= mysqli_fetch_array($resultass);
$cantidadasiste=$arryasi['cantidad'];

// traemos la cantidad de cursos
$sqlfor="SELECT COUNT(*) AS cantidad FROM  tb_inscripcion ;";
$resul=mysqli_query($objConexion,$sqlfor);
$arry= mysqli_fetch_array($resul);
$cant=$arry['cantidad'];


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel | El Laurel</title>
    <link rel="icon" href="img/puntodeencuentro.jpeg">

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/carga.css">
      <script src="js/loader.js"></script>
</head>

<body id="page-top">
<div id="load-content" class="loader-wrapper">
    <div id="id-loading" class="loader-small"></div>
</div>
    <!-- Page Wrapper -->
    <div id="wrapper">

   <?php include 'menu.php'; ?>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

               <?php include 'header.php';?>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    
<?php 
if($idrolUsuario==1){


?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                       
                    </div>
                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Usuarios</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo$cantidauser ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-users-cog fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                               ESTUDIANTES</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cantida ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">CURSOS
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800"><?php echo $cantidadasiste ?></div>
                                                </div>
                                                <div class="col">
                                                    
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                               INSCRIPCIONES</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $cant?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-fw fa-file-contract fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
<?php 
}
?>
                      <div class="d-sm-flex align-items-center justify-content-between mb-3">
                        <h5 class="h3 mb-0 text-gray-800">Cursos</h5>
                        
                       
                    </div>
                    <div class="row">
                       <?php 
                       foreach ($ress as $data){
                           
                       
                       ?>
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-bottom-info shadow h-100 py-2"style="color: <?php echo $data['color']; ?>" >
                                <div class="card-body">
                                    <button type='button' style="text-decoration: none;" data-toggle="modal" onclick="Nuevocurso(<?php echo $data['id_cursos'] ?>);" class="btn btn-link">  <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold  text-uppercase mb-1 " style="color: <?php echo $data['color']; ?>">
                                               <?php echo $data['descripcion']?></div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo "Cupos ".$data['cupos']?></div>
                                        </div>
                                        <div class="col-12">
                                            <!-- <img src="img/bachillerato-4.jpg" alt="" srcset="" class="img-fluid"> -->
                                            <img  style="width: 130px; height: 90px;" src="data:image/jpg;base64,<?php echo base64_encode($data['imagen'])?>" alt="" class="img-fluid">

                                           <!-- <i class="fas fa-fw fa-file-contract fa-2x text-gray-300"></i>   -->
                                        </div>
                                    </div></button>
                                </div>
                            </div>
                        </div>
                        <?php }?>
                          
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h5 class="m-0 font-weight-bold text-info"> <i class="fas fa-fw fa-home"></i>Bienvenid@s</h5>
                                    
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div class="chart-area">
                                       <img src="img/PUNTOS.jpg" class="img-fluid">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div id="show"></div>
                    </div>

                    <!-- Content Row -->
                   

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           <?php include 'fooder.php';?>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

  

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
  

</body>

</html>
<script>
function Nuevocurso(id){
    MostrarModal(id, 'modal/inscripcion_nueva.php');
}
function MostrarModal(id, url){
    $.ajax({
        type: 'POST',
        url: url,
        data:{
            id_p:id
        },
        success: function (data) {          
           $('#show').html(data);  
           $('#MyModal').modal();
        }
    });
}
</script>