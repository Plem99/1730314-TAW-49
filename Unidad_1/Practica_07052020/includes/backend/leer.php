<?php 
	//Agarro el valor para ver a que modulo pertenece
	$valor = $_POST['val'];
	switch ($valor) {
		case 1:
			carrera();
			break;
		case 2:
			alumno();
			break;
		case 3:
			profesor();
			break;
		case 4:
			carreraProfesor();
			break;
		case 5:
			carreras();
			break;
	}
	//Funcion para consultar todas las carreras
	function carreras(){
		//Se conecta a la base de datos
		require_once 'conexion.php';
		//Hace la consulta
		$sql = "SELECT * FROM tcarrera";
		//A la variable resultado se le da el valor de la ejecucion de la consulta
		$result = $db->query($sql);

		if ($result) {
		    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    	echo " <option value='". $row['id'] ."'>". $row['nombre'] ."</option>";
		    }
		} else {
		    echo "0 results";
		}
		$result->closeCursor();

	
	}
	//Funcion para desplegar la tabla de carrera
	function carrera(){
		//Se conecta a la base de datos
		require_once 'conexion.php';
		//Hace la consulta
		$sql = "SELECT * FROM tcarrera";
		//A la variable resultado se le da el valor de la ejecucion de la consulta
		$result = $db->query($sql);
		//Valida si esta existe
		if ($result) {
			//Este es un contador para las id de modificar y eliminar
			$i=0;
			//Ciclo para imprimir todos los datos
		    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    	//Agarramos el id de cada registro
		    	$_SESSION['id'] = $row['id'];
		    	//En este arreglo se guardaran estos id
		    	$valor[$i] = $_SESSION['id'];
		    	//Imprimimos Cada registro
		        echo "<tr>";
			    	echo "<td>".$row["id"]."</td>";
			    	echo "<td>".$row["clave"]."</td>";
			    	echo "<td>".$row["nombre"]."</td>";
			    	echo "<td>".
			        	"<div style='display:flex;'>".
				        	"<button onclick='btnModificarCarrera(".$valor[$i].")' class='btn  btn-success' >"." Modificar".
				        	"</button>".
				        	"<button onclick='btnEliminarCarrera(".$valor[$i].")' class='btn  btn-danger' >"." Eliminar".
				        	"</button>".
				        "<div>";
			    	echo "</td>";
			    //Teerminamos la fila
		        echo "</tr>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}
		//Cerramos la consulta
		$result->closeCursor();
	}
	//Funcion para desplegar la tabla de alumnos
	function alumno(){
		//Se conecta a la base de datos
		require_once 'conexion.php';
		//Hace la consulta
		$sql = "SELECT a.id, a.nombre, a.matricula, a.email, a.telefono, a.edad, c.nombre 'nombrecarrera' FROM talumno a, tcarrera c WHERE a.id_carrera=c.id ";
		//A la variable resultado se le da el valor de la ejecucion de la consulta
		$result = $db->query($sql);
		//Valida si esta existe
		if ($result) {
			//Este es un contador para las id de modificar y eliminar
			$i=0;
			//Ciclo para imprimir todos los datos
		    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    	//Agarramos el id de cada registro
		    	$_SESSION['id'] = $row['id'];
		    	//En este arreglo se guardaran estos id
		    	$valor[$i] = $_SESSION['id'];
		    	//Imprimimos Cada registro
		        echo "<tr>";
			    	echo "<td>".$row["id"]."</td>";
			    	echo "<td>".$row["nombre"]."</td>";
			    	echo "<td>".$row["matricula"]."</td>";
			    	echo "<td>".$row["email"]."</td>";
			    	echo "<td>".$row["telefono"]."</td>";
			    	echo "<td>".$row["edad"]."</td>";
			    	echo "<td>".$row["nombrecarrera"]."</td>";
			    	echo "<td>".
			        	"<div style='display:flex;'>".
				        	"<button onclick='btnModificarAlumno(".$valor[$i].")' class='btn  btn-success' >"." Modificar".
				        	"</button>".
				        	"<button onclick='btnEliminarAlumno(".$valor[$i].")' class='btn  btn-danger' >"." Eliminar".
				        	"</button>".
				        "<div>";
			    	echo "</td>";
			    //Teerminamos la fila
		        echo "</tr>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}
		//Cerramos la consulta
		$result->closeCursor();
	}

	//Funcion para desplegar la tabla de alumnos
	function profesor(){
		//Se conecta a la base de datos
		require_once 'conexion.php';
		//Hace la consulta
		$sql = "SELECT p.id, p.numero_empleado, p.nombre, p.email, p.telefono, c.nombre 'nombrecarrera' FROM tprofesor p, tcarrera c WHERE p.id_carrera=c.id ";
		//A la variable resultado se le da el valor de la ejecucion de la consulta
		$result = $db->query($sql);
		//Valida si esta existe
		if ($result) {
			//Este es un contador para las id de modificar y eliminar
			$i=0;
			//Ciclo para imprimir todos los datos
		    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    	//Agarramos el id de cada registro
		    	$_SESSION['id'] = $row['id'];
		    	//En este arreglo se guardaran estos id
		    	$valor[$i] = $_SESSION['id'];
		    	//Imprimimos Cada registro
		        echo "<tr>";
			    	echo "<td>".$row["id"]."</td>";
			    	echo "<td>".$row["numero_empleado"]."</td>";
			    	echo "<td>".$row["nombre"]."</td>";
			    	echo "<td>".$row["email"]."</td>";
			    	echo "<td>".$row["telefono"]."</td>";
			    	echo "<td>".$row["nombrecarrera"]."</td>";
			    	echo "<td>".
			        	"<div style='display:flex;'>".
				        	"<button onclick='btnModificarProfesor(".$valor[$i].")' class='btn  btn-success' >"." Modificar".
				        	"</button>".
				        	"<button onclick='btnEliminarProfesor(".$valor[$i].")' class='btn  btn-danger' >"." Eliminar".
				        	"</button>".
				        "<div>";
			    	echo "</td>";
			    //Terminamos la fila
		        echo "</tr>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}
		//Cerramos la consulta
		$result->closeCursor();
	}

	//Funcion para desplegar la tabla de alumnos
	function carreraProfesor(){
		//Se conecta a la base de datos
		require_once 'conexion.php';
		//Hace la consulta
		$sql = "SELECT p.nombre 'nombreprofesor', c.nombre 'nombrecarrera' FROM tprofesor p, tcarrera c WHERE c.id=p.id_carrera";
		//A la variable resultado se le da el valor de la ejecucion de la consulta
		$result = $db->query($sql);
		//Valida si esta existe
		if ($result) {
			//Este es un contador para las id de modificar y eliminar
			$i=0;
			//Ciclo para imprimir todos los datos
		    while($row = $result->fetch(PDO::FETCH_ASSOC)) {
		    	//Imprimimos Cada registro
		        echo "<tr>";
			    	echo "<td>".$row["nombrecarrera"]."</td>";
			    	echo "<td>".$row["nombreprofesor"]."</td>";
			    //Terminamos la fila
		        echo "</tr>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}
		
	}

	
 ?>