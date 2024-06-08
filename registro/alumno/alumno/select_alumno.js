
$(document).ready(function(){

    $('#id_estado_a').change(function(){

        recargarListaAlumno();

    });
})

function recargarListaAlumno(){
    $.ajax({
        type:"POST",
        url:"alumno/select_ciudad_alumno.php",
        data: "estado_alumno=" + $('#id_estado_a').val(),
        
        success:function(r){

            $('#ciudad_alumno').html(r);

            $.ajax({
                type:"POST",
                url:"alumno/select_municipio_alumno.php",
                data: "estado_alumno=" + $('#id_estado_a').val(),
                
                success:function(r){

                    $('#municipio_alumno').html(r);
                    
                }
            });
        }
    });
}