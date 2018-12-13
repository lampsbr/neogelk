-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema neogelk
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema neogelk
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `neogelk` DEFAULT CHARACTER SET utf8mb4 ;
USE `neogelk` ;

-- -----------------------------------------------------
-- Table `neogelk`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `neogelk`.`users` (
  `id` CHAR(36) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NULL,
  `deleted` DATETIME NULL,
  `email` VARCHAR(100) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`));


-- -----------------------------------------------------
-- Table `neogelk`.`tipo_titulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `neogelk`.`tipo_titulos` (
  `id` CHAR(36) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NULL,
  `deleted` DATETIME NULL,
  `descricao` VARCHAR(100) NOT NULL,
  `user_id` CHAR(36) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tipo_titulos_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_tipo_titulos_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `neogelk`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `neogelk`.`titulos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `neogelk`.`titulos` (
  `id` CHAR(36) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NULL,
  `deleted` DATETIME NULL,
  `nome` VARCHAR(100) NOT NULL,
  `ticker` VARCHAR(15) NULL,
  `tipo_titulo_id` CHAR(36) NOT NULL,
  `moeda` VARCHAR(45) NOT NULL DEFAULT 'real',
  `user_id` CHAR(36) NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ativos_tipo_ativos_idx` (`tipo_titulo_id` ASC),
  INDEX `fk_titulos_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_ativos_tipo_ativos`
    FOREIGN KEY (`tipo_titulo_id`)
    REFERENCES `neogelk`.`tipo_titulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_titulos_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `neogelk`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `neogelk`.`ativos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `neogelk`.`ativos` (
  `id` CHAR(36) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NULL,
  `deleted` DATETIME NULL,
  `dt_compra` DATETIME NOT NULL,
  `dt_venda` DATETIME NULL,
  `quantidade` DECIMAL(15,4) NOT NULL DEFAULT 0,
  `titulo_id` CHAR(36) NOT NULL,
  `user_id` CHAR(36) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_ativos_titulos1_idx` (`titulo_id` ASC),
  INDEX `fk_ativos_users1_idx` (`user_id` ASC),
  CONSTRAINT `fk_ativos_titulos1`
    FOREIGN KEY (`titulo_id`)
    REFERENCES `neogelk`.`titulos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_ativos_users1`
    FOREIGN KEY (`user_id`)
    REFERENCES `neogelk`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);


-- -----------------------------------------------------
-- Table `neogelk`.`cotacaos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `neogelk`.`cotacaos` (
  `id` CHAR(36) NOT NULL,
  `created` DATETIME NOT NULL,
  `modified` DATETIME NULL,
  `deleted` DATETIME NULL,
  `data` DATETIME NOT NULL,
  `valor` DECIMAL(15,2) NOT NULL,
  `ativos_id` CHAR(36) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_cotacaos_ativos1_idx` (`ativos_id` ASC),
  CONSTRAINT `fk_cotacaos_ativos1`
    FOREIGN KEY (`ativos_id`)
    REFERENCES `neogelk`.`ativos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
