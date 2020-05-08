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
	//Funcion para eliminar una carrera
	function eliminarCarrera(){
		require_once 'conexion.php';

		$idEliminar = $_POST['idEliminarV'];
		try{
			$sql = "DELETE FROM tcarrera WHERE id='$idEliminar'";
			$result = $db->query($sql);
		}catch(PDOException $e){
	        echo $e;
	    }
    }
    //Funcion para eliminar un alumno
	function eliminarAlumno(){
		require_once 'conexion.php';

		$idEliminar = $_POST['idEliminarV'];
		try{
			$sql = "DELETE FROM talumno WHERE id='$idEliminar'";
			$result = $db->query($sql);
		}catch(PDOException $e){
	        echo $e;
	    }
    }
    //Funcion para eliminar un profesor
	function eliminarProfesor(){
		require_once 'conexion.php';

		$idEliminar = $_POST['idEliminarV'];
		try{
			$sql = "DELETE FROM tprofesor WHERE id='$idEliminar'";
			$result = $db->query($sql);
		}catch(PDOException $e){
	        echo $e;
	    }
    }
    
 ?>