/*Creacion de base de datos*/
CREATE DATABASE taw_07_05_2020;
/*Utilizando la base de datos taw_07_05_2020*/
USE taw_07_05_2020;
/*Tabla para la carrera*/
CREATE TABLE tcarrera(
    id INT AUTO_INCREMENT PRIMARY KEY,
    clave VARCHAR(45),
    nombre VARCHAR(45)
);
/*Tabla para el alumno*/
CREATE TABLE talumno(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45),
    matricula VARCHAR(45),
    email VARCHAR(45),
    telefono VARCHAR(20),
    edad INT,
    id_carrera INT,
    FOREIGN KEY (id_carrera) REFERENCES tcarrera (id)
);
/*Tabla para el profesor*/
CREATE TABLE tprofesor(
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_empleado VARCHAR(45),
    nombre VARCHAR(45),
    email VARCHAR(45),
    telefono VARCHAR(20),
    id_carrera INT,
    FOREIGN KEY (id_carrera) REFERENCES tcarrera (id)
);
