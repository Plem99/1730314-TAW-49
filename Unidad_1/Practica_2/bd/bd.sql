/*Creacion de base de datos*/
CREATE DATABASE practica2;
/*Utilizando la base de datos practica1*/
USE practica2;
/*Tabla para el estudiante*/
CREATE TABLE estudiante(
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(45),
    nombre VARCHAR(45),
    apellidos VARCHAR(45),
    promedio float(5,2),
    edad int(11),
    fecha TIMESTAMP
);

