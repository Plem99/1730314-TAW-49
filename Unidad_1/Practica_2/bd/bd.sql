/*Creacion de base de datos*/
CREATE DATABASE practica2;
/*Utilizando la base de datos practica1*/
USE practica2;
/*Tabla para el universidad*/
CREATE TABLE universidad(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45)
);
/*Tabla para el carrera*/
CREATE TABLE carrera(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45),
    codigo VARCHAR(45),
    descripcion VARCHAR(45),
    id_universidad INT,
    FOREIGN KEY (id_universidad) REFERENCES universidad (id)
);
/*Tabla para el estudiante*/
CREATE TABLE estudiante(
    id INT AUTO_INCREMENT PRIMARY KEY,
    cedula VARCHAR(45),
    nombre VARCHAR(45),
    apellidos VARCHAR(45),
    promedio float(5,2),
    edad int(11),
    fecha DATE,
    id_carrera INT,
    FOREIGN KEY (id_carrera) REFERENCES carrera (id)
);
/*Tabla para el usuario*/
CREATE TABLE usuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45),
    contrasena VARCHAR(45)
);

