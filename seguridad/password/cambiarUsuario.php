<?php 
require_once '../barralateral.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="../../css/sb-admin-2.css" rel="stylesheet">
</head>
<body>

    <div class="container-fluid col-md-6 mb-4 p-3">
        <center>
            <div class="p-3">
            <section class="row align-items-center justify-content-center p-3">

                    <div class="card-body">
                        <div class="table">

                            <form action="cambiarUsuario.inc.php" method= "POST" id="create_usuario" class="card p-3 m-2 ">
                
                            <div class="form-group p-3">                                
                                <div class="col">
                                    <div class="form-group p-3">
                                    <div class="col">
                                        <label class="form-label"><legend>USUARIO</legend></label>
                                        <input type="text" name="txtusuarioactual" id="txtusuarioactual" class="form-control" placeholder="USUARIO" aria-describedby="helpId">
                                    </div>
                                    </div>
                                </div>
                            </div>
<br>
                                        <div class="mb-3">
                                            <input type="submit" name="eBtn" id="eBtn" class="form-control btn-primary" value="ENVIAR" aria-describedby="helpId">
                                        </div>
                            </form>

                        </div>
                    </div>


            </section>
            </div>
        </center>
    </div>

        <script src="../../vendor/sweetalert/sweetalert2.js"></script>
        <script src="../../vendor/sweetalert/sweetalert2.all.min.js"></script>
        
            <script>
                const form = document.getElementById("create_usuario");
                const eBtn = document.getElementById("eBtn");
                form.addEventListener("submit", (event) => {
                    event.preventDefault()
                    const data = new FormData(form)
                    const info = Object.fromEntries(data)
                    console.log(info)
                    if (info.txtusuarioactual == "") {
                        Swal.fire(
                            'ERROR!',
                            'debes ingresar todos los datos!',
                            'error'
                        )
                    } else {
                        fetch('cambiarUsuario.inc.php', {
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
                                        window.location.href = "preguntasYSeguridad.php"
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