create database gestor

CREATE TABLE `gestor`.`tb_usuarios` (
  `Id_Usuario` INT NOT NULL AUTO_INCREMENT,
  `NombrePersona` VARCHAR(50) NULL,
  `FechaNacimiento` DATE NULL,
  `Email` VARCHAR(50) NULL,
  `NombreUsuario` VARCHAR(50) NULL,
  `Password` TEXT NULL,
  `Insert` DATETIME NOT NULL DEFAULT now(),
  PRIMARY KEY (`Id_Usuario`));
