-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-04-2014 a las 10:45:58
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `todo_maniac`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `id_categoria` int(11) NOT NULL AUTO_INCREMENT,
  `categoria` varchar(90) NOT NULL,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`) VALUES
(1, 'IMPRENTA'),
(2, 'DISEÑO WEB'),
(3, 'POSICIONAMIENTO WEB'),
(4, 'MANTENIMIENTO WEB'),
(5, 'WEB HOTEL'),
(6, 'WEB INMOBILIARIA'),
(7, 'CAPTAR CLIENTES'),
(8, 'GESTIÓNES CASHUBA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_clientes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(90) NOT NULL,
  `telefono` varchar(90) NOT NULL,
  PRIMARY KEY (`id_clientes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nombre`, `telefono`) VALUES
(1, 'MENYBER GLOBAL', '95.252.40.19'),
(2, 'SALABLANCA', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `prioridad` varchar(15) NOT NULL,
  `tarea` varchar(150) NOT NULL,
  `importe` int(15) NOT NULL,
  `isdeleted` int(11) NOT NULL,
  PRIMARY KEY (`num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`num`, `fecha`, `cliente`, `categoria`, `prioridad`, `tarea`, `importe`, `isdeleted`) VALUES
(1, '2013-12-27 22:05:41', 1, 0, 'CRITICO', 'DISEÑO CARTEL SON DEL ARTE', 135, 0),
(2, '2013-12-27 22:05:41', 2, 0, 'CRITICO', 'DISEÑO TARJETONES PARA BOTELLAS', 195, 0),
(3, '2013-12-27 22:05:41', 1, 0, 'CRITICO', 'DISEÑO BOTELLAS', 195, 0),
(4, '2013-12-27 22:05:41', 1, 0, 'CRITICO', 'DISEÑO LOGO INTEGRAL', 195, 0),
(5, '2013-12-27 22:05:41', 1, 0, 'CRITICO', 'WEB CORPORATIVA', 195, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
