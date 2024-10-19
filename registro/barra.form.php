<?php 
    $usuario = $_SESSION['user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="../../css/sb-admin-2.css" rel="stylesheet">

</head>

<body id="page-top" >
    <div id="wrapper">
        <div id="content-wrapper" class="d-flex flex-column">
            <div id="content">
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <a class="nav-link  btn btn-outline-secondary mr-4" href="../../index.php">
                    <span class="fa fa-arrow-left"></span> MENU PRINCIPAL</a>
                    Fecha Actual: <?php $P1 = date("d / m / Y"); echo $P1;?>
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">
                                    <?php if (!empty($usuario)):?>
                                    <?= $usuario ?>
                                    <?php endif; ?>
                                </span>
                                <img class="img-profile rounded-circle"
                                    src="../../img/undraw_profile.svg">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="../../logout.php">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Cerrar Sesion
                                </a>
                                <div class="dropdown-divider"></div>
                            </div>
                        </li>
                        
                    </ul>
                </nav>




</body>
</html>