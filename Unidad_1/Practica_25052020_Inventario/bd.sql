/*Creacion de base de datos*/
CREATE DATABASE practica1;
/*Utilizando la base de datos practica1*/
USE practica1;
/*Tabla para el usuario*/
CREATE TABLE tusuario(
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(45),
    contrasena VARCHAR(45),
    email VARCHAR(45)
);
/*Tabla para la empresa*/
CREATE TABLE tempresa(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45)
);
/*Tabla para las categorias*/
CREATE TABLE tcategoria(
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(45)
);
/*Tabla para el proveedor*/
CREATE TABLE tproveedor(
    id INT AUTO_INCREMENT PRIMARY KEY,
    clave VARCHAR(45),
    nombre VARCHAR(45),
    rfc VARCHAR(45),
    email VARCHAR(45),
    id_empresa INT,
    id_categoria INT,
    FOREIGN KEY (id_empresa) REFERENCES tempresa (id),
    FOREIGN KEY (id_categoria) REFERENCES tcategoria (id)
);
