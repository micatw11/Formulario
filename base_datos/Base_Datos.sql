SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `Base_Datos` ;
CREATE SCHEMA IF NOT EXISTS `Base_Datos` DEFAULT CHARACTER SET latin1 ;
USE `Base_Datos` ;

-- -----------------------------------------------------
-- Table `Base_Datos`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`usuarios` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_usuario` VARCHAR(45) NOT NULL,
  `password` VARCHAR(100) NOT NULL,
  `estado` ENUM('activo','inactivo') NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`id`),
  UNIQUE INDEX `nombre_UNIQUE` (`nombre_usuario` ASC),
  UNIQUE INDEX `contraseña_UNIQUE` (`password` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Base_Datos`.`aplicaciones_web`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`aplicaciones_web` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `titulo` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(500) NOT NULL,
  `fecha_habilitacion` DATETIME NULL DEFAULT NULL,
  `url` VARCHAR(100) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Base_Datos`.`permisos`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`permisos` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Base_Datos`.`Permisos_adicionales`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`Permisos_adicionales` (
  `id` INT(11) NOT NULL,
  `usuarios_id` INT(11) NOT NULL,
  `permisos_id` INT(11) NOT NULL,
  `aplicaciones_web_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_Permisos_adicionales_usuarios1_idx` (`usuarios_id` ASC),
  INDEX `fk_Permisos_adicionales_aplicaciones_web1_idx` (`aplicaciones_web_id` ASC),
  INDEX `fk_Permisos_adicionales_permisos1_idx` (`permisos_id` ASC),
  CONSTRAINT `fk_Permisos_adicionales_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `Base_Datos`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Permisos_adicionales_aplicaciones_web1`
    FOREIGN KEY (`aplicaciones_web_id`)
    REFERENCES `Base_Datos`.`aplicaciones_web` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_Permisos_adicionales_permisos1`
    FOREIGN KEY (`permisos_id`)
    REFERENCES `Base_Datos`.`permisos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Base_Datos`.`roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`roles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(45) NOT NULL,
  `descripcion` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Base_Datos`.`gestion_roles`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`gestion_roles` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `usuario_id` INT(9) NOT NULL,
  `aplicaciones_web_id` INT(11) NOT NULL,
  `roles_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_gestion_roles_permisos_roles1_idx` (`roles_id` ASC),
  INDEX `fk_gestion_usuarios_idx` (`usuario_id` ASC),
  INDEX `fk_aplicaciones_web_idx` (`aplicaciones_web_id` ASC),
  CONSTRAINT `fk_gestion_roles_permisos_roles1`
    FOREIGN KEY (`roles_id`)
    REFERENCES `Base_Datos`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gestion_roles_permisos_aplicaciones_web1`
    FOREIGN KEY (`aplicaciones_web_id`)
    REFERENCES `Base_Datos`.`aplicaciones_web` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_gestion_roles_permisos_usuarios1`
    FOREIGN KEY (`usuario_id`)
    REFERENCES `Base_Datos`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 13
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Base_Datos`.`log`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`log` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nombre_tabla` VARCHAR(45) NOT NULL,
  `usuarios_id` INT(11) NOT NULL,
  `registros_id` INT(11) NOT NULL,
  `evento` ENUM('INSERT','UPDATE','DELETE','CREATE') NOT NULL,
  `fecha_evento` DATETIME NOT NULL,
  `valor_antiguo` VARCHAR(500) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_log_usuarios1_idx` (`usuarios_id` ASC),
  CONSTRAINT `fk_log_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `Base_Datos`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 4
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Base_Datos`.`nacionalidades`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`nacionalidades` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `descripcion` VARCHAR(100) NOT NULL,
  `iso` CHAR(2) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Base_Datos`.`persona_usuario`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`persona_usuario` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `documento` INT(9) UNSIGNED NOT NULL,
  `apellido` TEXT NOT NULL,
  `nombre` TEXT NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `doc_unico` (`documento` ASC))
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `Base_Datos`.`perfil`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`perfil` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `usuarios_id` INT(11) NOT NULL,
  `personas_id` INT(11) NOT NULL,
  `referido_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_perfil_personas1_idx` (`personas_id` ASC),
  INDEX `fk_perfil_usuarios2_idx` (`referido_id` ASC),
  INDEX `fk_perfil_usuarios1_idx` (`usuarios_id` ASC),
  CONSTRAINT `fk_perfil_personas1`
    FOREIGN KEY (`personas_id`)
    REFERENCES `Base_Datos`.`persona_usuario` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_usuarios2`
    FOREIGN KEY (`referido_id`)
    REFERENCES `Base_Datos`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_perfil_usuarios1`
    FOREIGN KEY (`usuarios_id`)
    REFERENCES `Base_Datos`.`usuarios` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Base_Datos`.`permisos_x_rol`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`permisos_x_rol` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `roles_id` INT(11) NOT NULL,
  `permisos_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE INDEX `id_UNIQUE` (`id` ASC),
  INDEX `fk_permisos_x_rol_permisos1_idx` (`permisos_id` ASC),
  INDEX `fk_permisos_x_rol_roles1_idx` (`roles_id` ASC),
  CONSTRAINT `fk_permisos_x_rol_permisos1`
    FOREIGN KEY (`permisos_id`)
    REFERENCES `Base_Datos`.`permisos` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_permisos_x_rol_roles1`
    FOREIGN KEY (`roles_id`)
    REFERENCES `Base_Datos`.`roles` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = latin1;


-- -----------------------------------------------------
-- Table `Base_Datos`.`persona_cliente`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `Base_Datos`.`persona_cliente` (
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `apellido` VARCHAR(50) CHARACTER SET 'latin1' NOT NULL,
  `nombre` VARCHAR(50) CHARACTER SET 'latin1' NOT NULL,
  `documento` INT(11) NOT NULL,
  `fecha_nac` DATE NOT NULL,
  `edad` INT(4) NOT NULL,
  `activo` TINYINT(1) NOT NULL DEFAULT '1',
  `nacionalidades_id` INT(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_personas_nacionalidades_idx` (`nacionalidades_id` ASC),
  CONSTRAINT `fk_personas_nacionalidades`
    FOREIGN KEY (`nacionalidades_id`)
    REFERENCES `Base_Datos`.`nacionalidades` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 28
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
