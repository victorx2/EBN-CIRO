<?php

  session_start();

  if (isset($_SESSION['user'])){   

      require_once 'src/logout.class.php';
      $Logout = new Logout;

      $usuario = $_SESSION['session_id'];

      $nivel = $_SESSION['nivel'];

      $entrada = $_SESSION['entrada'];

      $fecha = $_SESSION['fecha'];

      date_default_timezone_set('America/Caracas');
      $salida = date('H:m:s');

      switch (true) {
      //en caso que sean todas vacias 
        case empty($_SESSION['inscripcion']) && empty($_SESSION['ficha_acomulativa']) && empty($_SESSION['horario']):
          $accion = 'Ninguna Accion Realizada.';
          break;

      //en caso que sean 2 vacias 
        case empty($_SESSION['inscripcion']) && empty($_SESSION['ficha_acomulativa']):
          $accion = $_SESSION['horario'];
          break;

        case empty($_SESSION['inscripcion']) && empty($_SESSION['horario']):
          $accion = $_SESSION['ficha_acomulativa'];
          break;

        case empty($_SESSION['ficha_acomulativa']) && empty($_SESSION['horario']):
          $accion = $_SESSION['inscripcion'];
          break;
          
      //en caso que sean 1 vacias 
        case empty($_SESSION['inscripcion']):
          $accion = $_SESSION['ficha_acomulativa'] . ' ' . $_SESSION['horario'];
          break;

        case empty($_SESSION['ficha_acomulativa']):
          $accion = $_SESSION['inscripcion'] . ' ' . $_SESSION['horario'];
          break;
          
        case empty($_SESSION['horario']):
          $accion = $_SESSION['inscripcion'] . ' ' . $_SESSION['ficha_acomulativa'];
          break;

        default:
          $accion = $_SESSION['inscripcion'] . ' ' . $_SESSION['ficha_acomulativa'] . ' ' . $_SESSION['horario'];
          break;

      }

      $Logout->cerrarSesion($usuario, $nivel, $fecha, $entrada, $accion, $salida);

    }else{

      echo "ERROR: NO SE CONECTO CORRECTAMENTE";
      exit();
      
    }

?>