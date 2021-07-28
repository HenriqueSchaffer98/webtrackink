-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema webtrackink
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema webtrackink
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `webtrackink` DEFAULT CHARACTER SET utf8mb4 ;
USE `webtrackink` ;

-- -----------------------------------------------------
-- Table `webtrackink`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webtrackink`.`usuarios` (
  `id` INT(10) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(50) NOT NULL,
  `username` VARCHAR(100) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `webtrackink`.`link`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webtrackink`.`link` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `url` VARCHAR(300) NULL DEFAULT NULL,
  `status` TINYINT(1) NULL DEFAULT NULL,
  `user_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id` (`user_id` ASC) VISIBLE,
  CONSTRAINT `link_ibfk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `webtrackink`.`usuarios` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


-- -----------------------------------------------------
-- Table `webtrackink`.`hist_link`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `webtrackink`.`hist_link` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `cod_http` VARCHAR(100) NULL DEFAULT NULL,
  `rest` TEXT NULL DEFAULT NULL,
  `user_id` INT(11) NULL DEFAULT NULL,
  `link_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `user_id` (`user_id` ASC) VISIBLE,
  INDEX `link_id` (`link_id` ASC) VISIBLE,
  CONSTRAINT `hist_link_ibfk_1`
    FOREIGN KEY (`user_id`)
    REFERENCES `webtrackink`.`usuarios` (`id`),
  CONSTRAINT `hist_link_ibfk_2`
    FOREIGN KEY (`link_id`)
    REFERENCES `webtrackink`.`link` (`id`))
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8mb4;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
