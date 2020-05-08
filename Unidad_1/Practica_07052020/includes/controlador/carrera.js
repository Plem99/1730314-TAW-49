//Invocamos de primeras la consulta para mostrar la tabla
$.ajax({
    url: 'includes/backend/leer.php',
    type: 'POST',
    data: {
        val:1
    },
    success: function (r) {
        $('#tablaCarrera').html(r);
    }
});
//Funcion para mostrar la tabla
function tablaCarrera(){
    $.ajax({
        url: 'includes/backend/leer.php',
        type: 'POST',
        data: {
            val:1
        },
        success: function (r) {
            $('#tablaCarrera').html(r);
        }
    });
}
//Funcion para eliminar
function btnEliminarCarrera(id) {
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
                    val:1
                },
                type: 'POST',
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Carrera Eliminada',
                        text: 'Carrera Eliminada Correctamente.'
                    });
                    tablaCarrera();
                }
            });
        }
    })
}