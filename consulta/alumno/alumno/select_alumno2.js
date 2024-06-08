
    $(document).on('change','#id_municipio_a',function () {

        recargarListaAlumno2();

    });

    function recargarListaAlumno2(){

        $.ajax({
            type:"POST",
            url:"alumno/select_parroquia_alumno.php",
            data:"municipio_alumno=" + $('#id_municipio_a').val(),

            success:function(r){

                $('#id_parroquia_a').html(r);

            }

        });
                    
    }