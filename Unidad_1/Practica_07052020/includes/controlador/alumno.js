//Invocamos de primeras la consulta para mostrar la tabla
$.ajax({
    url: 'includes/backend/leer.php',
    type: 'POST',
    data: {
        val:2
    },
    success: function (r) {
        $('#tablaAlumno').html(r);
    }
});
//Invocamos para que cargue las carreras que existen para posteriormente registrarla
$.ajax({
    url: 'includes/backend/leer.php',
    type: 'POST',
    data: {
        val:5
    },
    success: function (r) {
        $('#carrera').html(r);
    }
});
//Funcion para mostrar la tabla
function tablaAlumno(){
    $.ajax({
        url: 'includes/backend/leer.php',
        type: 'POST',
        data: {
            val:2
        },
        success: function (r) {
            $('#tablaAlumno').html(r);
        }
    });
}
//Funcion para eliminar
function btnEliminarAlumno(id) {
    var idEliminar = id;
    Swal.fire({
        title: 'Estas seguro que deseas eliminar?',
        text: "No podras revertirlo!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#2CC11D',
        confirmButtonText: 'Si, Eliminar!'
    }).then((result) => {
        if (result.value) {
            $.ajax({
                url: 'includes/backend/eliminar.php',
                data: {
                    idEliminarV: idEliminar,
                    val:2
                },
                type: 'POST',
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Alumno Eliminado',
                        text: 'Alumno Eliminado Correctamente.'
                    });
                    tablaAlumno();
                }
            });
        }
    })
}
