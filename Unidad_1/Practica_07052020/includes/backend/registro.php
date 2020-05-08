<?php 
	//Agarro el valor para ver a que modulo pertenece
	$valor = $_POST['val'];
	switch ($valor) {
		case 1:
			registrarCarrera();
			break;
		case 2:
			registrarAlumno();
			break;
		case 3:
			registrarProfesor();
			break;
	}
	//Registrar Carrera
	function registrarCarrera(){
		require_once 'conexion.php';
		try{
			//Hacemos la consulta
		$sql = "INSERT INTO tcarrera (clave, nombre) VALUES (?,?)";
		$result = $db->prepare($sql);
		//La ejecutamos
		$result->execute([
	            $_POST['claveV'],
	            $_POST['nombreV']
	        ]);
		}catch(PDOException $e){
        	echo $e;
    	}
	}
	//Registrar alumno
	function registrarAlumno(){
		require_once 'conexion.php';
		try{
			//Hacemos la consulta
		$sql = "INSERT INTO talumno (nombre, matricula, email, telefono, edad, id_carrera) VALUES (?,?,?,?,?,?)";
		$result = $db->prepare($sql);
		//La ejecutamos
		$result->execute([
	            $_POST['nombreV'],
	            $_POST['matriculaV'],
	            $_POST['emailV'],
	            $_POST['telefonoV'],
	            $_POST['edadV'],
	            $_POST['carreraV']
	        ]);
		}catch(PDOException $e){
        	echo $e;
    	}
	}
	//Registrar alumno
	function registrarProfesor(){
		require_once 'conexion.php';
		try{
			//Hacemos la consulta
		$sql = "INSERT INTO tprofesor (numero_empleado, nombre, email, telefono, id_carrera) VALUES (?,?,?,?,?,?)";
		$result = $db->prepare($sql);
		//La ejecutamos
		$result->execute([
	            $_POST['nombreV'],
	            $_POST['matriculaV'],
	            $_POST['emailV'],
	            $_POST['telefonoV'],
	            $_POST['carreraV']
	        ]);
		}catch(PDOException $e){
        	echo $e;
    	}
	}
	
    
 ?>