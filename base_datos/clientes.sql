-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 12-09-2016 a las 07:06:21
-- Versión del servidor: 5.5.50-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aplicaciones_web`
--

CREATE TABLE IF NOT EXISTS `aplicaciones_web` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `fecha_habilitacion` datetime DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url_UNIQUE` (`url`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `aplicaciones_web`
--

INSERT INTO `aplicaciones_web` (`id`, `titulo`, `descripcion`, `fecha_habilitacion`, `url`) VALUES
(1, 'Aplicacion 1', 'Lavadero de autos', '2016-09-07 03:17:11', 'www.lavadero.com.ar'),
(2, 'Aplicacion 2', 'Videoclub', '2016-09-05 02:15:18', 'www.videoclub.com.ar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gestion_roles_permisos`
--

CREATE TABLE IF NOT EXISTS `gestion_roles_permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `permisos_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gestion_roles_permisos_permisos1_idx` (`permisos_id`),
  KEY `fk_gestion_roles_permisos_roles1_idx` (`roles_id`),
  KEY `permisos_id` (`permisos_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Volcado de datos para la tabla `gestion_roles_permisos`
--

INSERT INTO `gestion_roles_permisos` (`id`, `permisos_id`, `roles_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 1, 2),
(5, 4, 1),
(6, 4, 2),
(7, 5, 3),
(8, 5, 2),
(9, 5, 1),
(10, 6, 3),
(11, 7, 2),
(12, 7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id1` int(11) NOT NULL,
  `nombre_tabla` varchar(45) NOT NULL,
  `registro_id` int(11) NOT NULL,
  `evento` enum('INSERT','UPDATE','DELETE','CREATE') NOT NULL,
  `fecha_evento` datetime NOT NULL,
  `valor_antiguo` varchar(500) DEFAULT NULL,
  PRIMARY KEY (`id`,`usuarios_id1`),
  KEY `fk_log_usuarios1_idx` (`usuarios_id1`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `log`
--

INSERT INTO `log` (`id`, `usuarios_id1`, `nombre_tabla`, `registro_id`, `evento`, `fecha_evento`, `valor_antiguo`) VALUES
(1, 1, 'usuarios_permisos_adicionales', 2, 'UPDATE', '2016-09-07 11:41:04', '21'),
(2, 2, 'usuarios_permisos_adicionales', 9, 'UPDATE', '2016-09-07 11:45:29', 'permisos id:7 usuario id:2'),
(3, 3, 'usuarios_permisos_adicionales', 1, 'UPDATE', '2016-09-07 11:54:38', 'objeto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidad`
--

CREATE TABLE IF NOT EXISTS `nacionalidad` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) CHARACTER SET utf8 NOT NULL,
  `iso` varchar(3) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `nacionalidad`
--

INSERT INTO `nacionalidad` (`id`, `descripcion`, `iso`) VALUES
(1, 'Argentina', 'ARG'),
(2, 'Brasil', 'BRA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aplicaciones_web_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id`,`aplicaciones_web_id`),
  KEY `fk_permisos_aplicaciones_web1_idx` (`aplicaciones_web_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id`, `aplicaciones_web_id`, `nombre`, `descripcion`) VALUES
(1, 1, 'editar_cliente', 'Se realizaran cambios en los registros de los clientes.'),
(2, 1, 'baja_cliente', 'Se dará de baja al registro del cliente.'),
(3, 1, 'crear_cliente', 'se creará un cliente.'),
(4, 2, 'crear_pelicula', 'se registran películas nuevas'),
(5, 2, 'crear_comentarios', 'Podrán dejar comentarios en las sinopsis de las películas'),
(6, 2, 'editar_comentario', 'Podrá editar el comentario publicado'),
(7, 2, 'borrar_comentario', 'Borrar un comentario.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos_adicionales`
--

CREATE TABLE IF NOT EXISTS `permisos_adicionales` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `permisos_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`usuarios_id`,`permisos_id`),
  KEY `fk_usuarios_permisos_adicionales_usuarios1_idx` (`usuarios_id`),
  KEY `fk_usuarios_permisos_adicionales_permisos1_idx` (`permisos_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- Disparadores `permisos_adicionales`
--
DROP TRIGGER IF EXISTS `log_usuarios_adicionalesInsert`;
DELIMITER //
CREATE TRIGGER `log_usuarios_adicionalesInsert` AFTER INSERT ON `permisos_adicionales`
 FOR EACH ROW BEGIN 
INSERT INTO log 
(`usuarios_id1`,`nombre_tabla`,`registro_id`,`evento`,`fecha_evento`,`valor_antiguo`) 
VALUES (  
       @usuarioID,
       'usuarios_permisos_adicionales',
        NEW.id,
     
        'INSERT',
        NOW(),
        @objeto);

END
//
DELIMITER ;
DROP TRIGGER IF EXISTS `log_usuarios_adicionalesUpdate`;
DELIMITER //
CREATE TRIGGER `log_usuarios_adicionalesUpdate` AFTER UPDATE ON `permisos_adicionales`
 FOR EACH ROW BEGIN 
INSERT INTO log 
(`usuarios_id1`,`nombre_tabla`,`registro_id`,`evento`,`fecha_evento`,`valor_antiguo`) 
VALUES (  
       @usuarioID,
       'usuarios_permisos_adicionales',
        OLD.id,
     
        'UPDATE',
        NOW(),
        'objeto');

END
//
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuarios_id` int(11) NOT NULL,
  `documento` varchar(11) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `fecha_nac` date NOT NULL,
  `edad` int(11) NOT NULL,
  `nacionalidad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`,`usuarios_id`),
  UNIQUE KEY `dni_UNIQUE` (`documento`),
  KEY `fk_perfiles_usuarios_idx` (`usuarios_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=20 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `usuarios_id`, `documento`, `apellido`, `nombre`, `fecha_nac`, `edad`, `nacionalidad_id`) VALUES
(1, 1, '32656666', 'Garcia', 'Anabel', '2000-09-21', 15, 0),
(3, 2, '12121211', 'Ojeda', 'Oscar', '1960-09-15', 55, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', 'Es el encargado de la gestión general del sitio'),
(2, 'Moderador', 'Encargado de gestionar areas especificas del sitio.'),
(3, 'Usuario', 'No tiene responsabilidades administrativas en el sitio');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roles_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `password` varchar(100) NOT NULL,
  `estado` enum('activo','inactivo') NOT NULL DEFAULT 'activo',
  PRIMARY KEY (`id`,`roles_id`),
  UNIQUE KEY `nombre_UNIQUE` (`nombre`),
  UNIQUE KEY `contraseña_UNIQUE` (`password`),
  KEY `fk_usuarios_roles1_idx` (`roles_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `roles_id`, `nombre`, `password`, `estado`) VALUES
(1, 1, 'root', '2b394801841d46816593047353319f2e4ad7eae1', 'activo'),
(2, 3, 'oscar', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'activo'),
(3, 2, 'juan', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'activo');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `gestion_roles_permisos`
--
ALTER TABLE `gestion_roles_permisos`
  ADD CONSTRAINT `fk_gestion_roles_permisos_permisos1` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_gestion_roles_permisos_roles1` FOREIGN KEY (`roles_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `fk_log_usuarios1` FOREIGN KEY (`usuarios_id1`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD CONSTRAINT `fk_permisos_aplicaciones_web1` FOREIGN KEY (`aplicaciones_web_id`) REFERENCES `aplicaciones_web` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `permisos_adicionales`
--
ALTER TABLE `permisos_adicionales`
  ADD CONSTRAINT `fk_usuarios_permisos_adicionales_permisos1` FOREIGN KEY (`permisos_id`) REFERENCES `permisos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_usuarios_permisos_adicionales_usuarios1` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_perfiles_usuarios` FOREIGN KEY (`usuarios_id`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
