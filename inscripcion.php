
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Inscripcion | El Laurel</title>
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
   <?php 

   session_start();
    $idrolUsuario=$_SESSION['idRolUsuario_S'];
    require_once ("./conf/confconexion.php");
   ?>
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
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-fw fa-clipboard-list"></i> Gestion Inscripciones </h1>
                        
                    </div>

                    <!-- Content Row -->
                    

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-12">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                         <?php 
                         if($idrolUsuario==1){
                             
                         
                         ?>
                                    <div class="btn-group pull-left">
                        
                                        <!--<button  type='button' class="btn btn-primary" data-toggle="modal" onclick="NuevoAsignacion();"><span class="fas fa fa-solid fa-plus"></span> Registar Inscripcion</button>-->
                    </div>
                                    <?php 
                         }
                         if($idrolUsuario==1){
                             
                         
                                    ?>
                                    <div class="btn-group pull-right">
                                <button type='button' class="btn btn-success" data-toggle="modal" onclick="reporteInscripcion();" ><span class="fas fa-file-excel"></span> Excel</button>
                            </div>
                   
                     <div class="col-xl-4">
                     <div class="btn-group pull-right">
                        <label for="Correo" class="col-control-label"> </label>
                      
                         <select class="form-control" id="cursos" name="Carreras_camd" required>
                            <?php
                                $sql_carreras="select * from tb_cursos;";
                                $result_carreras= mysqli_query($objConexion, $sql_carreras);
                                while($carrerasA=mysqli_fetch_array($result_carreras)){
                                    $DescripcionCarreras=$carrerasA['descripcion'];
                                    $idCarreras=$carrerasA['id_cursos'];
                                    $seleccionaCarreras='';
                                    if($idCarreras){
                                        $seleccionaCarreras='selected';
                                    }
                                    ?>
                                    <option value="<?php echo $idCarreras; ?>" <?php echo $seleccionaCarreras; ?>><?php echo $DescripcionCarreras; ?></option>
                                    <?php
                                }////fin del while
                                
                                
                            ?>
                          </select>
                        </div>
                    </div>
                                    <div class="btn-group pull-right">
                                <!--<button type='button' class="btn btn-danger" data-toggle="modal" onclick="ImprimirAsistencia();" ><span class="fas fa-file-pdf"></span> Reporte carrera</button>-->
                            </div>
                    <div class="btn-group pull-right">
                                <button type='button' class="btn btn-danger" data-toggle="modal" onclick="Inscripcionreporte();" ><span class="fas fa-file-pdf"></span> Reporte Cursos</button>
                            </div>
                                    <?php 
                         }
                                    ?>
                    
                      

                             
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                       <div id="resultados"></div> 
                        <div id='presentarTabla'></div> 
                                </div>
                            </div>
                        </div>
 
                        <!-- Pie Chart -->
                      
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
    <div id="show"></div>
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
<script type="text/javascript" src="js/VentanaCentrada.js"></script>
<script>
$(document).ready(function(){
    listar('ajax/listar_inscripcion.php');
    //prueba();
});
function listar(url){
    $.ajax({
      type: 'POST',
      url:url,
      success:function(data){
          $('#presentarTabla').html(data);
      },
   });
}
function reporteInscripcion(){
   location.href='exportararInscripciones.php';
    }
//function NuevoAsignacion(){
//    MostrarModal(0, 'modal/nuevo_inscripcion.php');
//}
function eliminarInscripcion(id){
  Swal.fire({
  title: '¿Está seguro de eliminar el registro?',
  text: "   ",
  icon: 'warning',
  showCancelButton: true,
  confirmButtonColor: '#3085d6',
  cancelButtonColor: '#d33',
  confirmButtonText: 'Si, Eliminar!'
}).then((result) => {
  if (result.isConfirmed) {
        $.ajax({
            type:'POST',
            url:'ajax/actu_inscripcion.php',
            data:{
                id_p:id,
                mensaje:'eliminar'
            },
            success: function(data){
                $('#resultados').html(data);
                listar('ajax/listar_inscripcion.php');
            }
        });
    }
})
}
function editarInscripcion(id){
    //alert(id);
    MostrarModal(id, 'modal/nuevo_inscripcion.php');
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

function descargarInscripcion(id){
    var idInscripcion=id;
    var parametro="";
    VentanaCentrada('./pdf/documentos/reporteinscripcion.php?idinscripcion_p='+idInscripcion,'Reporte_Estudiante','','1024','768','true');
}

function Inscripcionreporte(){
    var idcursos=$('#cursos').val();
//    var parametro="Reporte_Asistencia";
    VentanaCentrada('./pdf/documentos/reportecursos.php?id_cursos='+idcursos,'Reporte_Estudiante','','1024','768','true');
}
</script>




