<?php 
	//Agarro el valor para ver a que modulo pertenece
	$valor = $_POST['val'];
	switch ($valor) {
		case 1:
			eliminarCarrera();
			break;
		case 2:
			eliminarAlumno();
			break;
		case 3:
			eliminarProfesor();
			break;
	}
	
    
 ?>