-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-09-2016 a las 06:32:21
-- Versión del servidor: 5.5.52-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `Clientes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nacionalidades`
--

CREATE TABLE IF NOT EXISTS `nacionalidades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  `iso` char(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `nacionalidades`
--

INSERT INTO `nacionalidades` (`id`, `descripcion`, `iso`) VALUES
(1, 'Argentina', 'AR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE IF NOT EXISTS `personas` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `apellido` varchar(50) CHARACTER SET latin1 NOT NULL,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  `documento` int(11) NOT NULL,
  `fecha_nac` date NOT NULL,
  `edad` int(4) NOT NULL,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `nacionalidad_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `nacionalidad_id` (`nacionalidad_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `apellido`, `nombre`, `documento`, `fecha_nac`, `edad`, `activo`, `nacionalidad_id`) VALUES
(1, 'Flores', 'Montoto', 0, '0000-00-00', 0, 1, 1),
(2, 'Perez', 'Jose', 0, '0000-00-00', 0, 1, 1),
(22, 'h', 'jose', 0, '0000-00-00', 2, 1, 1),
(23, 'marga', 'jose', 0, '0000-00-00', 19, 1, 1),
(24, 'parra', 'amilcar', 0, '0000-00-00', 28, 1, 1),
(25, 'garay', 'jose', 0, '1997-06-02', 19, 1, 1),
(26, 'garay', 'jose', 0, '1997-06-02', 19, 1, 1),
(27, 'garay', 'maria', 0, '2009-04-06', 7, 1, 1);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `fk_clientes_1` FOREIGN KEY (`nacionalidad_id`) REFERENCES `nacionalidades` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
