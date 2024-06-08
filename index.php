<?php 

    session_start();

    if (!isset($_SESSION["session_id"])){

        header('location: login.php');
        exit;

    }

    include "src/index.class.php";

    $index = new Index;

    include "Vista/parte.superior.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" href="img/Retro.png">

     <!-- Importa los archivos de Bootstrap 5 -->

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

</head>
<body>

<div class="container">

    <div class="row justify-content-center" >
        <div class="col-lg-12">
            <div id="myCarousel" class="carousel carousel-dark slide mt-5" data-bs-ride="carousel">

            <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="false"></span>
                <span class="visually-hidden">Anterior</span>
            </button>
            
    <center>
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 2"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 3"></button>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4" aria-label="Slide 4"></button>
            </div>
  
    
        <div class="carousel-inner">
            <div class="carousel-item active" id="carouselExampleIndicators" >
                <!-- Aquí va tu primera imagen -->
                <img src="img/1.jpeg" alt="">
            </div>
      
            <div class="carousel-item" id="carouselExampleIndicators"  width="100" height="100">
                <!-- Aquí va tu segunda imagen -->
                <img src="img/2.jpeg" alt="">
            </div>
 
            <div class="carousel-item" id="carouselExampleIndicators"  width="100" height="100">
              <!-- Aquí va tu tercera imagen -->
              <img src="img/3.jpeg" alt="">
            </div>

            <div class="carousel-item" id="carouselExampleIndicators">
              <!-- Aquí va tu quinta imagen -->
              <img src="img/escuela2.jpg" alt="">
            </div>
        </div>
    </center>
    
    
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Siguiente</span>
    </button>
    
</div>
</div>
</div>

<br>
    <i class="fa fa-cloud mr-2"></i>

    <div class="card">
        <div class="card-body btn btn-outline-success">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">

                        <div class="col">
                            Primer Grado <br> <i class="fa fa-users ml-2 mr-2"></i>
                            <?php 
                                $index->get1();
                            ?>
                        </div>


                        <div class="col">
                           Segundo Grado <br> <i class="fa fa-users ml-2 mr-2"></i>
                            <?php 
                                $index->get2();
                            ?>
                        </div>


                        <div class="col">
                           Tercer Grado <br> <i class="fa fa-users ml-2 mr-2"></i>
                            <?php 
                                $index->get3();
                            ?>
                        </div>

                    </div>
                </div>
            </div>

            <br>

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">

                        <div class="col">
                           Cuarto Grado <br> <i class="fa fa-users ml-2 mr-2"></i>
                            <?php 
                                $index->get4();
                            ?>
                        </div>


                        <div class="col">
                           Quinto Grado <br> <i class="fa fa-users ml-2 mr-2"></i>
                            <?php 
                                $index->get5();
                            ?>
                        </div>


                        <div class="col">
                           Sexto Grado <br> <i class="fa fa-users ml-2 mr-2"></i>
                            <?php 
                                $index->get6();
                            ?>
                        </div>
                </div>
            </div>
        </div>

    </div>
</div>

<br>
    <i class="fa fa-cloud mr-2"></i>
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group row">

                        <div class="col-4 btn btn-outline-primary">
                            Niños Registrados <br> <i class="fa fa-users mr-2"></i>
                            <?php 
                                $index->getNinos();
                            ?>
                        </div>

                        <div class="col-4"></div>

                        <div class="col btn btn-outline-danger">
                            Niñas Registradas <br> <i class="fa fa-users mr-2"></i>
                            <?php 
                                $index->getNinas();
                            ?>
                        </div>

                    </div>
                </div>
            </div>
        <center>
            <div class="col-4 btn btn-outline-info mt-5"> 
                TOTAL <br> <i class="fa fa-users mr-2"></i>
                    <?php 
                        $index->getFull();
                    ?>
            </div>
        </center>

        </div>
    </div>

<br>
<br>
<br>
</div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.php">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>


    <script src="vendor/sweetalert/sweetalert2.js"></script>
    <script src="vendor/sweetalert/sweetalert2.all.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script> 

   <!--  <script>
    swal({
      title: "BIENVENIDO AL USUARIO Y TAL LA MAMA DE PANTOJAS",
      text: "No podrás deshacer este paso...",
      type: "warning",
      showCancelButton: true,
      cancelButtonText: "Mmm... mejor no",
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Adelante!",
      closeOnConfirm: false
    }, function() {
      swal("Hecho!", "mensaje de confirmación.", "success");
    });
    </script> -->

    <?php require_once "Vista/parte_inferior.php" ?>    
</body>
</html> 
     