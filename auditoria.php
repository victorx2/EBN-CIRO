<?php

    session_start();

    include "Vista/parte.superior.php";
    include "src/auditoria.class.php";
    $registro = new auditoria;

    if (isset($_POST['save'])){

        $valor1 = $_POST['fecha1'];
		$valor2 = $_POST['fecha2'];

    }else{

        $valor1 = $registro->fecha();
		$valor2 = date("d/m/Y");

    }
?>   
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/Retro.png">
    <title>Registro de Alumno</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <div class="col-3">
                        <a class="nav-link  btn btn-outline-secondary" href="index.php">
                        <span class="fa fa-arrow-left"></span> MENU PRINCIPAL</a>
                    </div>
                    
                    <br>

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800"><i class="fa fa-users"></i> Auditoria</h1>
                    
                    <br>

                    <p class="mb-4">Historial de los usuarios, donde muestra su <b>Nivel de usuario</b>, su <b>Nombre de usuario</b> y la <b>Fecha</b>, hora de entrada y salida de sesion 
                        donde podra filtrar por <b>Rango de Fechas</b>, <b>Accion</b> y <b>Nombre de Usuario</b>.</p>


                            <form method="POST" action="auditoria.php" id="miform" name="miform">

                                <span>Introduzca los <b>datos</b> para el filtrado:</span><hr>

                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="form-group row">

                                            
                                            <div class="col">
                                                <span><b>Fecha</b> 1:</span>
                                                <input type="text" class="buscador form-control mb-3" id="fecha2" name="fecha2" value="<?php echo $valor2; ?>">
                                            </div>

                                            
                                            <div class="col">
                                                <span><b>Fecha</b> 2:</span>
                                                <input type="text" class="buscador form-control mb-3" id="fecha1" name="fecha1" value="<?php echo $valor1; ?>">
                                            </div>

                                            

                                            
                                            
                                        </div>
                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary" id="save" name="save">Filtrar</button>

                                <br>
                                <br>

                            </form>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4" id="grado2Abajo" style="display:block;">
                        <div class="card-body">

                            <div class="col-4">
                              <label for="accion" class="form-label">Accion</label>
                              <select id="accion" name="accion" class="form-control">
                                <option value="">seleccione una Accion</option>
                                <option value="ninguna accion">Ninguna Accion</option>
                                <option value="registro">Registro</option>
                                <option value="exportacion">Exportacion</option>
                                <option value="inscripcion">Inscripcion</option>
                                <option value="reinscripcion">Reinscripcion</option>
                                <option value="ficha acomulativa">Ficha Acomulativa</option>
                                <option value="horario">Horario</option>
                              </select>
                            </div>

                            <br>

                            <div class="table-responsive">
                                <table class="table table-bordered" width="100%" cellspacing="0" id="myTable2">

                                    <thead>

                                        <tr>
                                            <th><center>Nivel de Acceso</center></th>
                                            <th><center>Usuario</center></th>
                                            <th><center>Fecha</center></th>
                                            <th><center>Hora de Entrada</center></th>
                                            <th><center>Acciones</center></th>
                                            <th><center>Hora de Salida</center></th>
                                        </tr>
                                        
                                    </thead>
                                 
                                    <tbody>

                                        <?php 

                                            $registro->search1($valor1, $valor2);

                                        ?>
                                
                                    </tbody>

                                    <tfoot>

                                        <tr>
                                            <th>Nivel de Acceso</th>
                                            <th>Usuario</th>
                                            <th>Fecha</th>
                                            <th>Entrada</th>
                                            <th>Acciones</th>
                                            <th>Salida</th>
                                        </tr>

                                    </tfoot>

                                </table>
                            </div>
                        </div>
                    </div>

                </div>

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <?php
                        include "Vista/parte_inferior.php";
                    ?>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

    <script>
        $(document).ready(function() {
          $('#myTable2').DataTable({
            paging: true,
            pageLength: 10,
          });
        });
    </script>

    <script>
        document.addEventListener('change', e => {
            console.log(e.target.value);
            if (e.target.matches('#accion')) {
                document.querySelectorAll('.articulos').forEach(fruta =>{
                    fruta.textContent.toLowerCase().includes(e.target.value)
                    ? fruta.classList.remove('filtro')
                    :fruta.classList.add('filtro');
                })
            }
        })
    </script>

</body>

</html>