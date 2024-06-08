
    $(document).on('change','#select_municipio_alumno',function () {

        recargarListaAlumno2();

    });

    function recargarListaAlumno2(){

        $.ajax({
            type:"POST",
            url:"alumno/select_parroquia_alumno.php",
            data:"municipio_alumno=" + $('#select_municipio_alumno').val(),

            success:function(r){

                $('#parroquia_alumno').html(r);

            }

        });
                    
    }