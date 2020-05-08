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
//Funcion para agregar Alumno
function registrarCarrera() {
    var datos = false;
    var clave = $('#claveCarrera').val();
    var nombre = $('#nombreCarrera').val();

    if (clave != '' && nombre != '' ) {
        datos = true;
    } else {
        Swal.fire(
            'Ingresa todos los campos necesarios',
            'Porfavor ingresa los campos necesarios',
            'question'
        )
    }
    if (datos) {
        $.ajax({
            url: 'includes/backend/registro.php',
            data: {
                val:1,
                claveV: clave,
                nombreV: nombre
            },
            type: 'POST',
            success: function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Carrera Creado',
                    text: 'Carrera Creado Correctamente.'
                });
                tablaCarrera();
            }
        });
    }
}