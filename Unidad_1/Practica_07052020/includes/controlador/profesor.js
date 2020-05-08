//Invocamos de primeras la consulta para mostrar la tabla
$.ajax({
    url: 'includes/backend/leer.php',
    type: 'POST',
    data: {
        val:3
    },
    success: function (r) {
        $('#tablaProfesor').html(r);
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
function tablaProfesor(){
    $.ajax({
        url: 'includes/backend/leer.php',
        type: 'POST',
        data: {
            val:3
        },
        success: function (r) {
            $('#tablaProfesor').html(r);
        }
    });
}
//Funcion para eliminar
function btnEliminarProfesor(id) {
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
                    val:3
                },
                type: 'POST',
                success: function () {
                    Swal.fire({
                        icon: 'success',
                        title: 'Profesor Eliminado',
                        text: 'Profesor Eliminado Correctamente.'
                    });
                    tablaProfesor();
                }
            });
        }
    })
}
//Funcion para agregar Alumno
function registrarProfesor() {
    var datos = false;
    var numEmpl = $('#numEmpleado').val();
    var nombre = $('#nombreProfesor').val();
    var email = $('#emailProfesor').val();
    var telefono = $('#telefonoProfesor').val();
    var carrera = $('#carrera').val();

    if (numEmpl != '' && nombre != '' && email != '' && telefono != '' && carrera != '') {
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
                val:3,
                numEmplV: numEmpl,
                nombreV: nombre,
                emailV: email,
                telefonoV: telefono,
                carreraV: carrera
            },
            type: 'POST',
            success: function () {
                Swal.fire({
                    icon: 'success',
                    title: 'Profesor Creado',
                    text: 'Profesor Creado Correctamente.'
                });
                tablaProfesor();
            }
        });
    }
}