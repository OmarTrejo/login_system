-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema sistema_control
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema sistema_control
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `sistema_control` DEFAULT CHARACTER SET utf8 ;
USE `sistema_control` ;

-- -----------------------------------------------------
-- Table `sistema_control`.`usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_control`.`usuario` (
  `idusuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NULL,
  `email` VARCHAR(100) NULL,
  `telefono` VARCHAR(10) NULL,
  PRIMARY KEY (`idusuario`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_control`.`control_password`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_control`.`control_password` (
  `idcontrol_password` INT NOT NULL AUTO_INCREMENT,
  `fk_usuario` INT NULL,
  `fecha_registro` DATETIME NULL,
  `password` VARCHAR(100) NULL,
  `estatus` VARCHAR(45) NULL,
  PRIMARY KEY (`idcontrol_password`),
  INDEX `usuario_control_idx` (`fk_usuario` ASC) VISIBLE,
  CONSTRAINT `usuario_control`
    FOREIGN KEY (`fk_usuario`)
    REFERENCES `sistema_control`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `sistema_control`.`acceso`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `sistema_control`.`acceso` (
  `idacceso` INT NOT NULL AUTO_INCREMENT,
  `fk_usuario` INT NULL,
  `fecha_registro` DATETIME NULL,
  `estatus` VARCHAR(10) NULL,
  PRIMARY KEY (`idacceso`),
  INDEX `usuario_acceso_idx` (`fk_usuario` ASC) VISIBLE,
  CONSTRAINT `usuario_acceso`
    FOREIGN KEY (`fk_usuario`)
    REFERENCES `sistema_control`.`usuario` (`idusuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
