<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  
  <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
  rel="stylesheet">
  <link href="../../css/sb-admin-2.css" rel="stylesheet">


</head>

<body id="page-top">
  <div id="wrapper">
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
        Fecha Actual: <?php $P1 = date("d / m / Y");
          echo $P1; ?> 
      <a class="navbar-brand TitleContrasena ml-3 " href="#">CAMBIOS DE CONTRASENA</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarID"
                        aria-controls="navbarID" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarID">
          <div class="navbar-nav">
          <a class="nav-link  btn btn-outline-secondary mr-4" href="../../login.php">
          <span class="fa fa-arrow-left"></span>REGRESAR</a>
          </div>
          <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown no-arrow">
          <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                aria-haspopup="true" aria-expanded="false">
          </a>
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="../../../logout.php">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar Sesion
                </a>
                <div class="dropdown-divider"></div>

              </div>
            </li>

          </ul>
        </nav>
        <!-- End of Topbar -->

</body>

</html>