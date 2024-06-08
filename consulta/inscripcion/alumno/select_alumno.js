
$(document).ready(function(){

    $('#select_estado_alumno').change(function(){

        recargarListaAlumno();

    });
})

function recargarListaAlumno(){
    $.ajax({
        type:"POST",
        url:"alumno/select_ciudad_alumno.php",
        data: "estado_alumno=" + $('#select_estado_alumno').val(),
        
        success:function(r){

            $('#ciudad_alumno').html(r);

            $.ajax({
                type:"POST",
                url:"alumno/select_municipio_alumno.php",
                data: "estado_alumno=" + $('#select_estado_alumno').val(),
                
                success:function(r){

                    $('#municipio_alumno').html(r);
                    
                }
            });
        }
    });
}