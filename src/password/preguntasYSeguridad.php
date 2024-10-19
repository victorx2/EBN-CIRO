<?php 
    session_start();

require '../barralateral.php';

$datos = unserialize($_SESSION['datos']);
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
    <link href="../../css/sb-admin-2.css" rel="stylesheet">
</head>
<body id="page-top">

  <form action="preguntasYSeguridad.inc.php" method="POST" id="create_usuario" class="card p-4 m-5">

  <div class="col">
      <label for="datos">
        USUARIO: <?php echo $datos['usuario'] . ' NIVEL: ' . $datos['nivel']; ?>
        <br>
        ESTADO: <?php echo $datos['activo']; ?>
      </label>
    </div>

    <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
    <input type="hidden" name="usuario" value="<?php echo $datos['usuario']; ?>">
    <input type="hidden" name="activo" value="<?php echo $datos['activo2']; ?>">
    <input type="hidden" name="nivel" value="<?php echo $datos['nivel']; ?>">

        <div class="container-fluid">
            <center>
                <section class="row align-items-center">
                    <div class="col">

                                <div class="col navbar navbar-expand-sm navbar-light">
                                    <div class="card-body">
                                      <div class="table">
                
                                        <h4 class="mb-4">Pregunta de Seguridad</h4>
                
                                            <div class="row">
                                              <div class="col-sm-12">
                                                <div class="form-group row">
                
                                                <div class="col">
                                                    <label for="pregunta1">Color Favorito:</label>
                                                    <input type="text" name="pregunta1" id="pregunta1" pattern="[a-zA-Z ]*" class="form-control">
                                                  </div>
                
                                                  <br>
                
                                                  <div class="col">
                                                    <label for="pregunta2">Mascota Favorita:</label>
                                                    <input type="text" name="pregunta2" id="pregunta2" pattern="[a-zA-Z ]*" class="form-control">
                                                  </div>
                
                                                  <br>
                
                                                  <div class="col">
                                                    <label for="pregunta3">Hijo Favorito:</label>
                                                    <input type="text" name="pregunta3" id="pregunta3" pattern="[a-zA-Z ]*" class="form-control" >
                                                  </div>
                
                                                </div>
                                              </div>
                                            </div>
                
                                        </div>
                                        </div>
                                    </div>
                                </div>
        </section>
    </center>
</div>

                        <center>
                          <input type="submit" class="btn btn-outline-primary col-2 p-3 justify-content-center"
                            id="save" name="save" value="ENVIAR">         
                        </center>
                      </form>

        <script src="../../vendor/sweetalert/sweetalert2.js"></script>
        <script src="../../vendor/sweetalert/sweetalert2.all.min.js"></script>
            <script>
                const form = document.getElementById("create_usuario");
                const eBtn = document.getElementById("save");
                form.addEventListener("submit", (event) => {
                    event.preventDefault()
                    const data = new FormData(form)
                    const info = Object.fromEntries(data)
                    console.log(info)
                    if (info.pregunta1 == "" || pregunta2 == "" || pregunta3 == "") {
                        Swal.fire(
                            'ERROR!',
                            'debes ingresar todos los datos!',
                            'error'
                        )
                    } else {
                        fetch('preguntasYSeguridad.inc.php', {
                                method: 'POST',
                                body: JSON.stringify(info)
                            })
                            .then(response => response.json())
                            .then(data => {
                                console.log(data);
                                if (data.status === "success") {
                                    Swal.fire(
                                        'EXITOSO!',
                                        data.message,
                                        'success'
                                    )
                                    setTimeout(() => {
                                        window.location.href = "cambiarContraseña.php"
                                    }, 1000);
                                } else if (data.status === "invalid") {
                                    Swal.fire(
                                        'ERROR!',
                                        data.message,
                                        'error'
                                    )
                                } else {
                                    Swal.fire(
                                        'EXITOSO!',
                                        data.message,
                                        'warning'
                                    )
                                }
                            })
                            .catch(error => {
                                console.error('Error:', error);
                            });
                    }
                })
            </script>
</body>
</html>