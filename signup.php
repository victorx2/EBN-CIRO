<?php

session_start();

include "Vista/parte.superior.php";

if (isset($_SESSION["users"])) {
}

$nivel = $_SESSION['nivel'];

if ($nivel == 'A') {

    $nivel = "DIRECTOR(A)";
} else {

    $nivel = "Secretario(a)";
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
    <title>REGISTRO</title>


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"></script>

    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.css" rel="stylesheet">

    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <script src="vendor/jquery/jquery-3.6.4.min.js"></script>


    <link href="vendor/sweetalert/sweetalert2.css" rel="stylesheet">

    <link rel="stylesheet" href="vendor/sweetalert/sweetalert2.min.css">

</head>

<body>

    <div class="row d-flex justify-content-center align-items-center ">
        <div class="col-xl-10">
            <div class="card rounded-3 text-black card-shadow">
                <div class="row g-0">
                    <div class="card-body p-md-5 mx-md-4">
                        <div class="mt-1 mb-2 pb-1">

                            <center>
                                <div class="mt-1 mb-2 pb-1">
                                    <img src="img/Retro.png" alt="logo" style="width:15%"
                                        class="align-content-lg-center">
                                </div>
                            </center>

                            <form id="FormCiro" class="container-fluid" action="signup.inc.php" method="POST">

                                <div class="col-form-label">
                                    <h5 class="mt-1 mb-3 pb-1 text"
                                        style="font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">
                                        <?php if (!empty($usuario)): ?>
                                        <emmet>Usuario:</emmet><?=$usuario?><br>
                                        <emmet>Nivel</emmet> <?=$nivel?>
                                        <?php endif;?><button class="badge-success rounded-pill" disabled>
                                            N</button>
                                    </h5>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">

                                            <div class="col form-outline mb-4">
                                                <label class="form-label d-flex justify-content-center"
                                                    for="usuario">USUARIO</label>
                                                <input type="text" id="usuario" name="usuario" class="form-control"
                                                    placeholder="NOMBRE DE USUARIO" required>
                                            </div>

                                            <div class="col">
                                                <label class="form-label d-flex justify-content-center"
                                                    for="cedula">CEDULA</label>
                                                <input type="text" name="cedula" id="cedula" class="form-control"
                                                    pattern="[0-9]+" maxlength="9" placeholder="CEDULA DEL USUARIO"
                                                    required>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">
                                            <i class="fa fa-lock"></i>

                                            <div class="col form-outline mb-4">
                                                <label class="form-label d-flex justify-content-center"
                                                    for="clave">CONTRASEÑA</label>
                                                <input type="password" id="clave" class="form-control" name="clave"
                                                    placeholder="CONTRASEÑA" required>
                                            </div>

                                            <br>

                                            <div class="col form-outline mb-2">
                                                <label class="form-label d-flex justify-content-center"
                                                    for="confirm_clave">CONFIRMAR CONTRASEÑA</label>
                                                <input type="password" id="confirm_clave" class="form-control"
                                                    name="confirm_clave" placeholder="CONFIRMAR CONTRASEÑA" required>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-outline mb-4">
                                    <label>
                                        <input id="ver" name="ver" type="checkbox" onclick="togglepassword()"
                                            class="form-control-user text-lg-center">
                                        <embed>MOSTRAR CONTRASEÑA</embed>
                                    </label>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group row">

                                            <div class="col form-check">
                                                <label class="form-check-label d-inline" for="nivelA1">
                                                    <input class="form-check-input" type="radio" name="nivel"
                                                        id="nivelA1" value="A" onchange="mostrarFormulario5()">
                                                    <emmet class="">DIRECTOR<br class=" text-lg-center">(A)</emmet>
                                                </label>
                                            </div>

                                            <div class="col form-check">
                                                <label class="form-check-label" for="nivelI1">
                                                    <input class="form-check-input" type="radio" name="nivel"
                                                        id="nivelI1" value="I" onchange="mostrarFormulario5()">
                                                    <emmet class="">SECRETARIO<br class="text-lg-center">(I)</emmet>
                                                </label>
                                            </div>

                                        </div>
                                    </div>
                                </div>

                                <br>

                                <div class="col-lg-12 gradient-custom-2">
                                    <div class="px-3 py-4 p-md-5 mx-md-4">

                                        <div class="card shadow mb-4" id="nivelA1Abajo" style="display:none;">
                                            <div class="card-body">
                                                <div class="table">
                                                    <table class="table table-bordered" width="100%" cellspacing="0">
                                                        <h4 class="mb-4">Registro de Directora</h4>

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group row">

                                                                    <div class="col">
                                                                        <label for="nombre1">Primer Nombre:</label>
                                                                        <input type="text" name="nombre1" id="nombre1"
                                                                            pattern="[a-zA-Z]*" class="form-control">
                                                                    </div>
                                                                    <br>
                                                                    <div class="col">
                                                                        <label for="nombre2">Segundo Nombre:</label>
                                                                        <input type="text" name="nombre2" id="nombre2"
                                                                            pattern="[a-zA-Z]*" class="form-control">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group row">

                                                                    <div class="col">
                                                                        <label for="apellido1">Primer Apellido:</label>
                                                                        <input type="text" name="apellido1"
                                                                            id="apellido1" pattern="[a-zA-Z]*"
                                                                            class="form-control">
                                                                    </div>
                                                                    <br>
                                                                    <div class="col">
                                                                        <label for="apellido2">Segundo Apellido:</label>
                                                                        <input type="text" name="apellido2"
                                                                            id="apellido2" pattern="[a-zA-Z]*"
                                                                            class="form-control">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card shadow mb-4" id="nivelA1Abajo2" style="display:none;">
                                            <div class="card-body">
                                                <div class="table">
                                                    <table class="table table-bordered" width="100%" cellspacing="0">

                                                        <h4 class="mb-4">Pregunta de Seguridad</h4>

                                                        <div class="row">
                                                            <div class="col-sm-12">
                                                                <div class="form-group row">

                                                                    <div class="col">
                                                                        <label for="pregunta1">Color Favorito:</label>
                                                                        <input type="text" name="pregunta1"
                                                                            id="pregunta1" pattern="[a-zA-Z]*"
                                                                            class="form-control">
                                                                    </div>

                                                                    <br>

                                                                    <div class="col">
                                                                        <label for="pregunta2">Mascota Favorita:</label>
                                                                        <input type="text" name="pregunta2"
                                                                            id="pregunta2" pattern="[a-zA-Z]*"
                                                                            class="form-control">
                                                                    </div>

                                                                    <br>

                                                                    <div class="col">
                                                                        <label for="pregunta3">Hijo Favorito:</label>
                                                                        <input type="text" name="pregunta3"
                                                                            id="pregunta3" pattern="[a-zA-Z]*"
                                                                            class="form-control">
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <center>
                                            <button type="submit"
                                                class="btn btn-outline-primary col-2 p-3 justify-content-center"
                                                id="save" name="save">ENVIAR</button>
                                        </center>
                            </form>


                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <script src="vendor/sweetalert/sweetalert2.all.js"></script>
    <script src="vendor/sweetalert/sweetalert2.all.min.js"></script>

    <script>
    function togglepassword() {
        var password = document.getElementById("clave");
        var confirm_password = document.getElementById("confirm_clave");
        if (password.type === "password") {
            password.type = "text";
            confirm_password.type = "text"
        } else {
            confirm_password.type = "password"
            password.type = "password";
        }
    }
    </script>


    <script>
    function mostrarFormulario5() {
        var opcion = document.querySelector('input[name="nivel"]:checked').value;
        var formulario = document.getElementById("nivelA1Abajo");
        var formulario2 = document.getElementById("nivelA1Abajo2");

        if (opcion === "A") {
            formulario.style.display = "block";
            formulario2.style.display = "block";
        } else {
            formulario2.style.display = "block";
            formulario.style.display = "none";
        }
    }
    </script>



    <script>
    //id form general 5 tablas=id myForm

    const generalForm = document.getElementById("FormCiro");
    //id="submitBtn"
    const generalBtnForm = document.getElementById("save");
    //Efecto de sonido jeje, para determinar el evento del
    generalForm.addEventListener("submit", (event) => {
        // EventoPredeterminado
        event.preventDefault()
        const dataGeneralForm = new FormData(generalForm)
        const InfoGeneralForm = Object.fromEntries(dataGeneralForm)

        console.log(InfoGeneralForm)


        if (InfoGeneralForm.usuario == "" || InfoGeneralForm.clave == "" || InfoGeneralForm.confirm_clave ==
            " " ||
            InfoGeneralForm.nivelA1 == "" || InfoGeneralForm.nivelI1 == "" || (!nivelA1.checked && !nivelI1
                .checked)) {

            Swal.fire({
                title: 'DATOS INCOMPLETOS',
                width: 600,

                imageUrl: "img/1.jpeg",
                imageWidth: 400,
                imageAlt: 200,
                imageAlt: 'Custom image',
            })

        } else {
            fetch("signup.inc.php", {
                    method: 'POST',
                    body: JSON.stringify(InfoGeneralForm)
                })

                .then(response => response.json())
                .then(dataGeneralForm => {

                    console.log(dataGeneralForm);

                    // Respuesta de exitoso
                    if (dataGeneralForm.status == "success") {
                        Swal.fire(
                            "EXITOSO!",
                            dataGeneralForm.message,
                            "success"
                        )

                        //Conteo de tiempo de alert
                        setTimeout(() => {
                            window.location.href = "index.php"
                        }, 2000);

                    } else if (dataGeneralForm.status == "invalid") {
                        Swal.fire(
                            "ERROR!",
                            dataGeneralForm.message,
                            "error"
                        )

                    } else {
                        Swal.fire(
                            "ERROR!",
                            dataGeneralForm.message,
                            "warning"
                        )
                    }

                }).catch(error => {
                    console.error("Error", error);
                });
        }
    })
    </script>


    <script>
    /* Obtén el elemento por su id */

    let enlace = document.getElementById("Enlance");

    /* Modifica el estilo del enlace */

    enlace.style.color = "blue";

    enlace.style.textDecoration = "none";

    enlace.style.fontWeight = "bold";
    </script>




    <script>
    let registrateMerliz = document.getElementById("registrateMerliz");

    registrateMerliz.addEventListener("click", r)




    function r() {

        //Swal fire trabaja con promesa para extraer valor

        /* (async() => {
            const {value:nivel}  = await;
         })(); */


        (async () => {
            const {
                value: Nivel
            } = await Swal.fire({
                title: "REGISTRO",
                /*   input: "select",
                  inputPlaceholder: 'Nivel de usuario', */

                html: '<div class="row">' +
                    '<div class="col-lg-6 mb-3"><input type="text" class="form-control" name="nameMerliz" id="nameMerliz" placeholder="usuario" value=""></div>' +
                    '<div class="col-lg-6 mb-3"><input type="text" class="form-control" name="email" id="email" placeholder="correo electrónico" value=""></div>' +
                    '</div>' +
                    '<div class="row">' +
                    '<div class="col-lg-6 mb-3"><input type="password" class="form-control" name="password" id="password" placeholder="contraseña" value=""></div>' +
                    '<div class="col-lg-6 mb-3"><input type="text" class="form-control" name="phone" id="phone" placeholder="teléfono" value=""></div>' +
                    '</div>',
                icon: 'question',
                confirmButtonText: 'REGISTRAR',
                footer: 'Es necesario registrarse para poder iniciar sesión',
                /*  width: '90%', */
                /* padding: '12rem', */
                /* background: '#500', */
                grow: 'column',
                backdrop: false,
                /* timer: 6000, */
                /* timerProgressBar: true */
                /* toast:true */
                /* position: 'bottom-end,top,bottom' */
                allowOutsideClick: false,
                allowEscapeKey: false,
                allowEnterKey: false,
                stopKeydownPropagation: false,

                input: "select",
                inputPlaceholder: 'Nivel',
                inputValue: '',
                inputOptions: {
                    usuario: 'Usuario',
                    admin: 'administrador'
                },

                /*   customClass: {
                  container: '...',
                  popup: '...',
                  header: '...',
                  title: '...',
                  closeButton: '...',
                  icon: '...',
                  image: '...',
                  htmlContainer: '...',
                  input: '...',
                  inputLabel: '...',
                  validationMessage: '...',
                  actions: '...',
                  confirmButton: '...',
                  denyButton: '...',
                  cancelButton: '...',
                  loader: '...',
                  footer: '....',
                  timerProgressBar: '....',
                } */

                showConfirmButton: true,
                confirmButtonColor: '#43435',
                confirmButtonAriaLabel: 'Confirmar',

                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                cancelButtonAriaLabel: 'Cancelar',

                buttonsStyling: true,
                showCloseButton: true,
                closeButtonAriaLabel: 'Cerrar Alerta',

                /* imageUrl : "",
                imageWidth: '200px',
                imageAlt: "" */


            });

            if (Nivel) {
                {
                    Swal.fire(

                        '...',
                        Nivel,
                        'success'
                    )
                }
            }
        })();




    }
    </script>




</body>

</html>