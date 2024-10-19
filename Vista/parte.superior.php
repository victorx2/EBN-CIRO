<?php

$usuario = $_SESSION['user'];
$nivel = $_SESSION['nivel'];

require 'src/periodo.class.php';
$fils = new periodoEscolar;
$filas = $fils->echo2022();

$menu = '';

if($filas == false){
  switch ($nivel)
  {
    case 'A':
      $menu = '
                      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  
                          <div class="sidebar-brand-text mx-4"><sub>Ciro Maldonado Zerpa<sub></div>
  
                      </a>
  
                      <!-- Divider -->
                      <hr class="sidebar-divider my-0">
  
                      <!-- Divider -->
                      <hr class="sidebar-divider">
  
                      <!-- Nav Item - Pages Collapse Menu -->
  
                      <li class="nav-item">
                          <a class="nav-link collapsed" href="proceso/periodo_escolar/periodoescolar.php" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                            <i class="fa fa-plus"></i>
                            <span> AÑO ESCOLAR</span><hr>
                            se necesita crear periodo escolar
                          </a>

  
                      </li>
                      <li class="nav-item">

                       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#seguridad" aria-expanded="true" aria-controls="seguridad">
                           <i class="fa fa-lock"></i>
                           <span>SEGURIDAD</span>
                       </a>

                       <div id="seguridad" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                           <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">Opciones de seguridad :</h6>
                                <a class="collapse-item" href="seguridad/perfil/perfil.php"><i class="fa fa-cogs"></i> AJUSTES DE CUENTA</a>
                                <a class="collapse-item" href="seguridad/perfil/cambiarContraseña.php"><i class="fa fa-cogs"></i> CAMBIAR CONTRASEÑA</a>
                           </div>
                       </div>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ficha_acomulativa" aria-expanded="true" aria-controls="ficha_acomulativa">
                            <i class="fa fa-cogs"></i>
                            <span>SERVICIOS</span>
                        </a>

                        <div id="ficha_acomulativa" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones de servicios :</h6>
                                  <a class="collapse-item" href="auditoria.php">AUDITORIA</a>
                                  <a class="collapse-item" href="signup.php">REGISTRO DE USUARIO</a>
                                  <a class="collapse-item" href="servicios/respaldo/respaldo.bd.php">RESPALDO BD</a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                            <i class="fa fa-question-circle"></i>
                            <span>AYUDA</span>
                        </a>

                        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones de ayuda :</h6>
                                  <a class="collapse-item" href="ayuda/manuales.php"> <i class="fa fa-book-open"></i> MANUAL DE USUARIO</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="graficas.php" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                          <i class="fa fa-chart-bar"></i>
                          <span>ESTADISTICAS</span>
                        </a>

                    </li>';
      break;
  
    case 'I':
      $menu = '
  
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
  
      <div class="sidebar-brand-text mx-4"><sub>Ciro Maldonado Zerpa<sub></div>
  
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Divider -->
      <hr class="sidebar-divider">

      <i class="fa fa-warning"></i>No Hay Periodo Escolar Activo';

      break;
    }
}else{

switch ($nivel)
{
  case 'A':
    $menu = '
                    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

                        <div class="sidebar-brand-text mx-4"><sub>Ciro Maldonado Zerpa<sub></div>

                    </a>

                    <!-- Divider -->
                    <hr class="sidebar-divider my-0">

                    <!-- Divider -->
                    <hr class="sidebar-divider">

                    <!-- Nav Item - Pages Collapse Menu -->

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#inscripcion" aria-expanded="true" aria-controls="inscripcion">
                          <i class="fa fa-folder"></i>
                          <span>REGISTROS</span>
                        </a>
                        <div id="inscripcion" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">Opciones :</h6>
                                <a class="collapse-item" href="registro/alumno/alumno.php"><i class="fa fa-plus"></i> ALUMNO</a>
                                
                                  <h6 class="collapse-header">PROFESOR :</h6>

                                    <a class="collapse-item" href="registro/aula/profesor.php"><i class="fa fa-plus"></i> AULA</a>
                                    <a class="collapse-item"  data-toggle="modal" data-target="#verDetalles-"><i class="fas fa-plus"></i> ESPECIALISTA</a>

                            </div>
                        </div>
                    </li>

                    <li class="nav-item">

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#proceso" aria-expanded="true" aria-controls="proceso">
                            <i class="fa fa-folder"></i>
                            <span>PROCESOS</span>
                        </a>

                        <div id="proceso" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones de procesos :</h6>
                                  <a class="collapse-item" href="proceso/periodo_escolar/periodoescolar.php"><i class="fa fa-plus"></i> AÑO ESCOLAR</a>
                                  <a class="collapse-item" href="proceso/inscripcion/registro.php"><i class="fa fa-plus"></i> INSCRIPCION</a>
                                  <a class="collapse-item" href="proceso/reinscripcion/registro.php"><i class="fa fa-plus"></i> RE-INSCRIPCION</a>
                                  <a class="collapse-item" href="proceso/ficha/ficha.php"><i class="fa fa-plus"></i> FICHA</a>
                                  <a class="collapse-item" href="proceso/horario/registro.php"><i class="fa fa-plus"></i> HORARIO</a>

                            </div>
                        </div>
                    </li>

                    <!-- Nav Item - Pages Collapse Menu -->

                    <li class="nav-item">

                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#consulta" aria-expanded="true" aria-controls="consulta">
                          <i class="fa fa-search"></i>
                          <span>CONSULTAS</span>
                        </a>

                        <div id="consulta" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones de consultas :</h6>

                                  <a class="collapse-item" href="consulta/alumno/alumno.php">ALUMNO</a>
                                  <a class="collapse-item" href="consulta/ficha/ficha.php">FICHA</a>
                                  <a class="collapse-item" href="consulta/inscripcion/registro.php">INSCRIPCION</a>
                                  <a class="collapse-item" href="consulta/matricula/matricula.php">MATRICULA</a>
                                  <a class="collapse-item" href="consulta/profesor/profesor.php">PROFESOR</a>

                            </div>
                        </div>
                    </li>

                    <li class="nav-item">

                       <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#seguridad" aria-expanded="true" aria-controls="seguridad">
                           <i class="fa fa-lock"></i>
                           <span>SEGURIDAD</span>
                       </a>

                       <div id="seguridad" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                           <div class="bg-white py-2 collapse-inner rounded">
                              <h6 class="collapse-header">Opciones de seguridad :</h6>
                                <a class="collapse-item" href="seguridad/perfil/perfil.php"><i class="fa fa-cogs"></i> AJUSTES DE CUENTA</a>
                                <a class="collapse-item" href="seguridad/perfil/cambiarContraseña.php"><i class="fa fa-cogs"></i> CAMBIAR CONTRASEÑA</a>
                           </div>
                       </div>

                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#ficha_acomulativa" aria-expanded="true" aria-controls="ficha_acomulativa">
                            <i class="fa fa-cogs"></i>
                            <span>SERVICIOS</span>
                        </a>

                        <div id="ficha_acomulativa" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones de servicios :</h6>
                                  <a class="collapse-item" href="auditoria.php">AUDITORIA</a>
                                  <a class="collapse-item" href="signup.php">REGISTRO DE USUARIO</a>
                                  <a class="collapse-item" href="servicios/respaldo/respaldo.bd.php">RESPALDO BD</a>
                            </div>
                        </div>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                            <i class="fa fa-question-circle"></i>
                            <span>AYUDA</span>
                        </a>

                        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                            <div class="bg-white py-2 collapse-inner rounded">
                                <h6 class="collapse-header">Opciones de ayuda :</h6>
                                  <a class="collapse-item" href="ayuda/manuales.php"> <i class="fa fa-book-open"></i> MANUAL DE USUARIO</a>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link collapsed" href="graficas.php" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
                          <i class="fa fa-chart-bar"></i>
                          <span>ESTADISTICAS</span>
                        </a>

                    </li>';
    break;

  case 'I':
    $menu = '

    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">

    <div class="sidebar-brand-text mx-4"><sub>Ciro Maldonado Zerpa<sub></div>

    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#inscripcion" aria-expanded="true" aria-controls="inscripcion">
          <i class="fa fa-folder"></i>
          <span>REGISTROS</span>
        </a>
        <div id="inscripcion" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
              <h6 class="collapse-header">Opciones :</h6>
                <a class="collapse-item" href="registro/alumno/alumno.php"><i class="fa fa-plus"></i> ALUMNO</a>

                  <h6 class="collapse-header">PROFESOR :</h6>

                    <a class="collapse-item" href="registro/aula/profesor.php"><i class="fa fa-plus"></i> AULA</a>
                    <a class="collapse-item" href="registro/especialista/especialista.php"><i class="fas fa-plus"></i> ESPECIALISTA</a>

            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->

    <li class="nav-item">

        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#consulta" aria-expanded="true" aria-controls="consulta">
          <i class="fa fa-search"></i>
          <span>CONSULTAS</span>
        </a>

        <div id="consulta" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones de consultas :</h6>

                  <a class="collapse-item" href="consulta/alumno/alumno.php">ALUMNO</a>
                  <a class="collapse-item" href="consulta/ficha/ficha.php">FICHA</a>
                  <a class="collapse-item" href="consulta/inscripcion/registro.php">INSCRIPCION</a>
                  <a class="collapse-item" href="consulta/matricula/matricula.php">MATRICULA</a>
                  <a class="collapse-item" href="consulta/profesor/profesor.php">PROFESOR</a>

            </div>
        </div>
    </li>

    <li class="nav-item">

      <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#seguridad" aria-expanded="true" aria-controls="seguridad">
          <i class="fa fa-lock"></i>
          <span>SEGURIDAD</span>
      </a>

      <div id="seguridad" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
             <h6 class="collapse-header">Opciones de seguridad :</h6>
               <a class="collapse-item" href="seguridad/perfil/cambiarContraseña.php"><i class="fa fa-cogs"></i> CAMBIAR CONTRASEÑA</a>
          </div>
      </div>

    /li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
            <i class="fa fa-question-circle"></i>
            <span>AYUDA</span>
        </a>

        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Opciones de ayuda :</h6>
                  <a class="collapse-item" href="ayuda/manuales.php"> <i class="fa fa-book-open"></i> MANUAL DE USUARIO</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="graficas.php" data-target="#collapsePages2" aria-expanded="true" aria-controls="collapsePages2">
          <i class="fa fa-chart-bar"></i>ESTADISTICAS
        </a>
    </li>';

    break;
  }

}

if ($nivel == 'A')
{

  $nivel = "Director(a)";
}
else
{

  $nivel = "Secretario(a)";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>E.B.N BOLIVARIANA</title>

  <!-- Custom fonts for this template-->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.css" rel="stylesheet">

</head>


<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">
      <center>
        <img src="img/Retro.png" class="m-3" width="70" height="70">
      </center>
      <!-- Sidebar - Brand -->

      <?php

      echo $menu;

      ?>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <?php $P1 = date("d / m / Y");
          echo $P1; ?>
          <!-- Sidebar Toggle (Topbar) -->

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">

            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 mediun">
                  <?php if (!empty($usuario)) : ?>
                    USUARIO: <?= $usuario ?><br>
                    NIVEL: <?= $nivel ?>
                  <?php endif; ?>
                </span>

                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">Welcome, <?php echo $_SESSION["user"]; ?>!</span>
                <img src="img/Retro.png" width="50" height="50">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="logout.php">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  CERRAR SESION
                </a>
                <div class="dropdown-divider"></div>

              </div>
            </li>

      <div class="modal fade" id="verDetalles-" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="false">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content">

            <div class="modal-header">
              <h5 class="modal-title text-danger" id="exampleModalLabel"><i class="fa fa-exclamation-triangle"></i> <b>Atención:</b></h5>
            </div>
            <div class="text-dark modal-body">

            Al registrar un profesor especialista, se eliminarán los horarios de los profesores actuales. Esto se debe a que nuestro sistema funciona de la siguiente manera:

            <ul>
              <br>
              
              <i class="fa fa-exclamation-circle"></i>Paso 1°. <br> Se crean los horarios de los profesores especialistas.
              
              <br>
              <br>
              
              <i class="fa fa-exclamation-circle"></i>Paso 2°. <br> Se crean los horarios de los profesores de aula.
             
            </ul> 
            
            <hr>
              Al agregar un especialista se debe agregar sus hora laborales y acomodar la de los demas profesores ya que los
              horarios de los profesores de aula se basan en los horarios de los profesores especialistas. Por lo tanto, si se desabilita un profesor especialista, los horarios de los profesores de aula también se eliminarán.
            
              <br>
              <br>

              Si está seguro de querer registrar un profesor especialista, haga clic en "Confirmar".

            </div>

            <div class="modal-footer">
              <button class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              <a href="registro/especialista/especialista.php"><button type="submit" id="cerrar" name="cerrar" class="btn btn-primary">Confirmar</button></a>
            </div>

          </div>
        </div>
      <div> 

          </ul>

        </nav>
        <!-- End of Topbar -->

</body>

</html>
