//Invocamos de primeras la consulta para mostrar la tabla
$.ajax({
    url: 'includes/backend/leer.php',
    type: 'POST',
    data: {
        val:4
    },
    success: function (r) {
        $('#tablaCarreraProfesor').html(r);
    }
});
//Funcion para mostrar la tabla
function tablaCarreraProfesor(){
    $.ajax({
        url: 'includes/backend/leer.php',
        type: 'POST',
        data: {
            val:4
        },
        success: function (r) {
            $('#tablaCarreraProfesor').html(r);
        }
    });
}