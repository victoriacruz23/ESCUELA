CREATE DATABASE escuela CHARACTER SET utf8 COLLATE utf8_general_ci;
USE escuela;
CREATE TABLE rol(
    RolId INT PRIMARY KEY AUTO_INCREMENT,
    RolNombre CHARACTER(25) NOT NULL
);
CREATE TABLE usuario(
    UsuarioId INT PRIMARY KEY AUTO_INCREMENT,
    UsuarioRollId INT,
    UsuarioNickName varchar(50) NOT NULL,
    UsuarioPassword varchar(80) NOT NULL,
    FOREIGN KEY rol (UsuarioRollId) REFERENCES rol (RolId)
);
