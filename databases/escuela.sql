CREATE DATABASE escuela CHARACTER SET utf8 COLLATE utf8_general_ci;
USE escuela;
CREATE TABLE rol(
    RolId INT PRIMARY KEY AUTO_INCREMENT,
    RolNombre CHARACTER(25) NOT NULL
);
CREATE TABLE usuario(
    UsuarioId INT PRIMARY KEY AUTO_INCREMENT,
    UsuarioRolId INT,
    UsuarioNickName varchar(50) NOT NULL,
    UsuarioPassword varchar(80) NOT NULL,
    FOREIGN KEY rol (UsuarioRollId) REFERENCES rol (RolId)
);

-- SELECT * FROM usuario INNER JOIN rol ON usuario.UsuarioRolId = rol.RolId; 

create table alumno(
    Dni_Alum INT PRIMARY KEY AUTO_INCREMENT,
    Nombre CHAR (20),
    Apellido CHAR(25),
    Direccion CHAR (50),
    Poblacion CHAR(30),
    F_Nacimiento date,
    Cod_Postal numeric(5),
    Telefono char (10),
    Dni char (25)
    );

