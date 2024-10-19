<?php
    session_start();

    include "../barralateral.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CAMBIO DE CONTRASEÑA</title>
    <link href="../../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

    <!-- Custom styles for this template-->
    <link href="../../css/sb-admin-2.css" rel="stylesheet">
</head>

<body class = "bg-light">
 
    <style>
        .TitleContrasena{
           display: block;
            
        }
    </style>
            
<section class="container px-4">
<main class="row-gx5">

  
    
    <form action="cambiarContraseña.inc.php" method="POST" id="create_contrasena" class="card p-4 m-5">
    <input type="hidden" name="id" value="<?php echo $_SESSION['session_id']; ?>">
    <input type="hidden" name="usuario" value="<?php echo $_SESSION['user']; ?>">
    <input type="hidden" name="nivel" value="<?php echo $_SESSION['nivel']; ?>">

    <div class="col">
      <label for="datos">
        USUARIO: <?php echo $_SESSION['user']; ?>
        <br>
        NIVEL: <?php echo $_SESSION['nivel']; ?>
      </label>
    </div>
    <hr>
    <center>
        <div class="col-sm-8 mb-4">
            <label class="form-label">CONTRASEÑA ACTUAL</label>
            <input type="password" name="txtclaveactual" id="txtclaveactual" class="form-control">
        </div>
    </center>

    <div class="row">
        <div class="col-sm-12">
            <div class="form-group row">
                
            <div class="col mb-3">
                <label for="" class="form-label">CONTRASEÑA NUEVA <i class="fa fa-lock"></i></label>
                <input type="password" name="txtclavenueva" id="txtclavenueva" class="form-control" aria-describedby="helpId">
            </div>
            <div class="col mb-3">
                <label for="" class="form-label">CONFIRMAR CONTRASENA NUEVA <i class="fa fa-lock"></i></label>
                <input type="password" name="txtclavenuevaconfirm" id="txtclavenuevaconfirm" class="form-control" aria-describedby="helpId">
            </div>     

            </div>
        </div>
    </div>

    <center>
        <div class="col-sm-3">
            <input type="submit" name="modificarContrasena" id="btn_contrasena" class="form-control" value="ENVIAR">           
        </div>
    </center>

        </div>
    </form>

</main>
</section>



<div class="modal fade modal-sm" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        
      </div>
       
    </div>
  </div>
</div>


    <script src="../../vendor/sweetalert/sweetalert2.js"></script>
    <script src="../../vendor/sweetalert/sweetalert2.all.min.js"></script>


    <script>
    const form = document.getElementById("create_contrasena");
    const btn_contrasena = document.getElementById("btn_contrasena");

    form.addEventListener("submit", (event) => {
        event.preventDefault()
        const data = new FormData(form)
        const info = Object.fromEntries(data)
        /* const txtid = document.getElementById("txtid").value;
        info.txtid = txtid;
        console.log(txtid); */
        console.log(info)
        if (info.txtclavenueva == "" || info.txtclaveactual == "" || info.txtclavenuevaconfirm == "") {
            Swal.fire(
                'ERROR!',
                'debes ingresar todos los datos!',
                'error'
            )
        } else {
            /* C:\xampp\htdocs\EBN19102023\cambiarContraseña.inc.php */
            fetch('cambiarContraseña.inc.php', {
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
                            window.location.href = "../../login.php"
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