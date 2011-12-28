SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

DROP SCHEMA IF EXISTS `mereside_meresidencio` ;
CREATE SCHEMA IF NOT EXISTS `mereside_meresidencio` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci ;
USE `mereside_meresidencio` ;

-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`estados`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`estados` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`estados` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`ciudades`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`ciudades` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`ciudades` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  `estado_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `estado_id`) ,
  INDEX `fk_ciudad_estado` (`estado_id` ASC) ,
  CONSTRAINT `fk_ciudad_estado`
    FOREIGN KEY (`estado_id` )
    REFERENCES `mereside_meresidencio`.`estados` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`zonas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`zonas` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`zonas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `ciudad_id` INT NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`, `ciudad_id`) ,
  INDEX `fk_zona_ciudad1` (`ciudad_id` ASC) ,
  CONSTRAINT `fk_zona_ciudad1`
    FOREIGN KEY (`ciudad_id` )
    REFERENCES `mereside_meresidencio`.`ciudades` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`usuarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`usuarios` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fecha_sucrip` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `login` VARCHAR(50) NOT NULL ,
  `clave` VARCHAR(20) NOT NULL ,
  `correo` VARCHAR(60) NOT NULL ,
  `nombre` VARCHAR(45) NOT NULL ,
  `apellido` VARCHAR(45) NOT NULL ,
  `fecha_nac` DATE NULL ,
  `telefono` VARCHAR(45) NULL ,
  `tipo` INT NOT NULL ,
  `activo` TINYINT(1)  NOT NULL DEFAULT 1 COMMENT 'Para hacer las eliminaciones logicamente y no fisicamente' ,
  `confirmado` TINYINT(1)  NOT NULL DEFAULT 1 ,
  `estado_id` INT NULL ,
  `ciudad_id` INT NULL ,
  `zona_id` INT NULL ,
  PRIMARY KEY (`id`, `login`) ,
  INDEX `fk_usuario_estado1` (`estado_id` ASC) ,
  INDEX `fk_usuario_ciudad1` (`ciudad_id` ASC) ,
  INDEX `fk_usuario_zona1` (`zona_id` ASC) ,
  CONSTRAINT `fk_usuario_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `mereside_meresidencio`.`estados` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_ciudad1`
    FOREIGN KEY (`ciudad_id` )
    REFERENCES `mereside_meresidencio`.`ciudades` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_usuario_zona1`
    FOREIGN KEY (`zona_id` )
    REFERENCES `mereside_meresidencio`.`zonas` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`tipoinmuebles`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`tipoinmuebles` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`tipoinmuebles` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`publicaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`publicaciones` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`publicaciones` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NOT NULL ,
  `direccion` VARCHAR(200) NOT NULL DEFAULT 'No especificada' ,
  `habitaciones` INT NOT NULL DEFAULT 1 ,
  `mts` DOUBLE NOT NULL DEFAULT 0 ,
  `descripcion` TEXT NULL ,
  `precio` DOUBLE NOT NULL DEFAULT 0 ,
  `deposito` INT NOT NULL DEFAULT 0 ,
  `activo` TINYINT(1)  NOT NULL DEFAULT 1 ,
  `visitas` INT NOT NULL DEFAULT 0 ,
  `sexo` ENUM('Mixto', 'Masculino', 'Femenino') NOT NULL ,
  `usuario_id` INT NOT NULL ,
  `zona_id` INT NOT NULL ,
  `tipoinmueble_id` INT NOT NULL ,
  `telefono` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`, `usuario_id`, `zona_id`, `tipoinmueble_id`, `sexo`, `fecha`) ,
  INDEX `fk_publicacion_usuario1` (`usuario_id` ASC) ,
  INDEX `fk_publicacion_zona1` (`zona_id` ASC) ,
  INDEX `fk_publicacion_tipoinmueble1` (`tipoinmueble_id` ASC) ,
  CONSTRAINT `fk_publicacion_usuario1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `mereside_meresidencio`.`usuarios` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_publicacion_zona1`
    FOREIGN KEY (`zona_id` )
    REFERENCES `mereside_meresidencio`.`zonas` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_publicacion_tipoinmueble1`
    FOREIGN KEY (`tipoinmueble_id` )
    REFERENCES `mereside_meresidencio`.`tipoinmuebles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`servicios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`servicios` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`servicios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`cercanias`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`cercanias` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`cercanias` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`cercanias_publicaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`cercanias_publicaciones` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`cercanias_publicaciones` (
  `publicacion_id` INT NOT NULL ,
  `cercania_id` INT NOT NULL ,
  `distancia` FLOAT NULL ,
  PRIMARY KEY (`publicacion_id`, `cercania_id`) ,
  INDEX `fk_publicacion_has_cercania_publicacion1` (`publicacion_id` ASC) ,
  INDEX `fk_publicacion_has_cercania_cercania1` (`cercania_id` ASC) ,
  CONSTRAINT `fk_publicacion_has_cercania_publicacion1`
    FOREIGN KEY (`publicacion_id` )
    REFERENCES `mereside_meresidencio`.`publicaciones` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_publicacion_has_cercania_cercania1`
    FOREIGN KEY (`cercania_id` )
    REFERENCES `mereside_meresidencio`.`cercanias` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`publicaciones_servicios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`publicaciones_servicios` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`publicaciones_servicios` (
  `publicacion_id` INT NOT NULL ,
  `servicio_id` INT NOT NULL ,
  `uso` ENUM('Individual','Compartido') NULL COMMENT '0 = null;\n1 = Individual;\n2 = Compartido;' ,
  PRIMARY KEY (`publicacion_id`, `servicio_id`) ,
  INDEX `fk_publicacion_has_servicios_publicacion1` (`publicacion_id` ASC) ,
  INDEX `fk_publicacion_has_servicios_servicios1` (`servicio_id` ASC) ,
  CONSTRAINT `fk_publicacion_has_servicios_publicacion1`
    FOREIGN KEY (`publicacion_id` )
    REFERENCES `mereside_meresidencio`.`publicaciones` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_publicacion_has_servicios_servicios1`
    FOREIGN KEY (`servicio_id` )
    REFERENCES `mereside_meresidencio`.`servicios` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`calificaciones`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`calificaciones` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`calificaciones` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fecha` DATE NOT NULL COMMENT 'Fecha en que el usuario hace la SOLICITUD de los datos de la publicacion' ,
  `puntos` INT NOT NULL ,
  `razon` VARCHAR(255) NULL ,
  `fecha_cliente` DATE NULL COMMENT 'Fecha en que el cliente realiza la calificacion' ,
  `respuesta` VARCHAR(255) NULL ,
  `fecha_usuario` DATE NULL COMMENT 'Fecha en que el usuario propietario responde a la calificacion del cliente' ,
  `activa` TINYINT(1)  NOT NULL DEFAULT 1 ,
  `cliente_id` INT NOT NULL ,
  `usuario_id` INT NOT NULL ,
  `publicacion_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `cliente_id`, `publicacion_id`, `usuario_id`) ,
  INDEX `fk_calificacion_usuario1` (`cliente_id` ASC) ,
  INDEX `fk_calificacion_publicacion1` (`publicacion_id` ASC) ,
  INDEX `fk_calificacion_usuario2` (`usuario_id` ASC) ,
  CONSTRAINT `fk_calificacion_usuario1`
    FOREIGN KEY (`cliente_id` )
    REFERENCES `mereside_meresidencio`.`usuarios` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_calificacion_publicacion1`
    FOREIGN KEY (`publicacion_id` )
    REFERENCES `mereside_meresidencio`.`publicaciones` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_calificacion_usuario2`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `mereside_meresidencio`.`usuarios` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`alertas`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`alertas` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`alertas` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `zona_id` INT NULL ,
  `ciudad_id` INT NULL ,
  `estado_id` INT NULL ,
  `tipoinmueble_id` INT NULL ,
  `usuario_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `usuario_id`) ,
  INDEX `fk_alerta_zona1` (`zona_id` ASC) ,
  INDEX `fk_alerta_ciudad1` (`ciudad_id` ASC) ,
  INDEX `fk_alerta_estado1` (`estado_id` ASC) ,
  INDEX `fk_alerta_tipoinmueble1` (`tipoinmueble_id` ASC) ,
  INDEX `fk_alertas_usuarios1` (`usuario_id` ASC) ,
  CONSTRAINT `fk_alerta_zona1`
    FOREIGN KEY (`zona_id` )
    REFERENCES `mereside_meresidencio`.`zonas` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_alerta_ciudad1`
    FOREIGN KEY (`ciudad_id` )
    REFERENCES `mereside_meresidencio`.`ciudades` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_alerta_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `mereside_meresidencio`.`estados` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_alerta_tipoinmueble1`
    FOREIGN KEY (`tipoinmueble_id` )
    REFERENCES `mereside_meresidencio`.`tipoinmuebles` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_alertas_usuarios1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `mereside_meresidencio`.`usuarios` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`imagenes`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`imagenes` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`imagenes` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `img_p` VARCHAR(255) NOT NULL ,
  `img_g` VARCHAR(255) NOT NULL ,
  `publicacion_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `publicacion_id`) ,
  INDEX `fk_imagenes_publicaciones1` (`publicacion_id` ASC) ,
  CONSTRAINT `fk_imagenes_publicaciones1`
    FOREIGN KEY (`publicacion_id` )
    REFERENCES `mereside_meresidencio`.`publicaciones` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mereside_meresidencio`.`comentarios`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `mereside_meresidencio`.`comentarios` ;

CREATE  TABLE IF NOT EXISTS `mereside_meresidencio`.`comentarios` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `fecha` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ,
  `nombre` VARCHAR(45) NOT NULL ,
  `contenido` VARCHAR(250) NOT NULL ,
  `revisado` TINYINT(1)  NOT NULL DEFAULT FALSE ,
  `publicacion_id` INT NOT NULL ,
  PRIMARY KEY (`id`, `publicacion_id`) ,
  INDEX `fk_comentarios_publicaciones1` (`publicacion_id` ASC) ,
  CONSTRAINT `fk_comentarios_publicaciones1`
    FOREIGN KEY (`publicacion_id` )
    REFERENCES `mereside_meresidencio`.`publicaciones` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;

-- -----------------------------------------------------
-- Data for table `mereside_meresidencio`.`usuarios`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `mereside_meresidencio`;
INSERT INTO `mereside_meresidencio`.`usuarios` (`id`, `fecha_sucrip`, `login`, `clave`, `correo`, `nombre`, `apellido`, `fecha_nac`, `telefono`, `tipo`, `activo`, `confirmado`, `estado_id`, `ciudad_id`, `zona_id`) VALUES ('1', NULL, 'admin', '1234', 'erickcion@gmail.com', 'Erick', 'Birbe', '0', '', '1', '1', NULL, '0', '0', '0');

COMMIT;

-- -----------------------------------------------------
-- Data for table `mereside_meresidencio`.`tipoinmuebles`
-- -----------------------------------------------------
SET AUTOCOMMIT=0;
USE `mereside_meresidencio`;
INSERT INTO `mereside_meresidencio`.`tipoinmuebles` (`id`, `nombre`) VALUES ('1', 'Habitacion');
INSERT INTO `mereside_meresidencio`.`tipoinmuebles` (`id`, `nombre`) VALUES ('2', 'Apartamento');
INSERT INTO `mereside_meresidencio`.`tipoinmuebles` (`id`, `nombre`) VALUES ('3', 'Anexo');
INSERT INTO `mereside_meresidencio`.`tipoinmuebles` (`id`, `nombre`) VALUES ('4', 'Apartamento Tipo Estudio');
INSERT INTO `mereside_meresidencio`.`tipoinmuebles` (`id`, `nombre`) VALUES ('5', 'Casa');

COMMIT;
