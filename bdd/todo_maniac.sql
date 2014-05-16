-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 09-05-2014 a las 14:21:25
-- Versión del servidor: 5.5.25a
-- Versión de PHP: 5.4.4

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
  `isborrao2` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `categoria`, `isborrao2`) VALUES
(1, 'IMPRENTA', 0),
(2, 'DISEÑO WEB', 0),
(3, 'POSICIONAMIENTO WEB', 0),
(4, 'MANTENIMIENTO WEB', 0),
(5, 'WEB HOTEL', 0),
(6, 'WEB INMOBILIARIA', 0),
(7, 'CAPTAR CLIENTES', 0),
(8, 'GESTIÓNES CASHUBA', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_clientes` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cliente` varchar(90) NOT NULL,
  `telefono` varchar(90) NOT NULL,
  `isborrado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_clientes`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `nombre_cliente`, `telefono`, `isborrado`) VALUES
(1, 'MENYBER GLOBAL', '95.252.40.19', 0),
(2, 'SALABLANCA', '', 0),
(3, 'PRUEBA', '95.252.44.44', 0),
(4, 'prueba2', '95.252.33.33', 0),
(5, 'prueba2', '95.252.00.00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id_menu` int(11) NOT NULL AUTO_INCREMENT,
  `etiqueta` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `padre` int(11) NOT NULL,
  `orden` int(11) NOT NULL,
  `publicado` int(11) NOT NULL,
  PRIMARY KEY (`id_menu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id_menu`, `etiqueta`, `url`, `padre`, `orden`, `publicado`) VALUES
(1, 'Tareas', '#', 0, 1, 1),
(2, 'Lista de Tareas', '/2/maniac4/index.php?&sec=tareas&view=listar-tareas', 1, 1, 1),
(3, 'Nueva Tarea', '/2/maniac4/index.php?&sec=tareas&view=finsertar', 1, 2, 1),
(4, 'Clientes', '#', 0, 2, 1),
(5, 'Lista de Clientes', '/2/maniac4/index.php?&sec=clientes&view=listar-clientes', 4, 1, 1),
(6, 'Nuevo Cliente', '/2/maniac4/index.php?&sec=clientes&view=finsertar', 4, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE IF NOT EXISTS `permisos` (
  `id_permiso` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  PRIMARY KEY (`id_permiso`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`id_permiso`, `usuario`, `menu_id`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 2, 3),
(4, 2, 4),
(5, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridades`
--

CREATE TABLE IF NOT EXISTS `prioridades` (
  `id_prioridad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_prioridad` varchar(45) NOT NULL DEFAULT '0',
  `isborrao` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_prioridad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `prioridades`
--

INSERT INTO `prioridades` (`id_prioridad`, `nombre_prioridad`, `isborrao`) VALUES
(1, 'CRITICA', 0),
(2, 'MEDIA', 0),
(3, 'BAJA', 0),
(4, 'MUY BAJA', 0),
(5, 'FIN DE SEMANA', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tareas`
--

CREATE TABLE IF NOT EXISTS `tareas` (
  `num` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cliente` int(11) NOT NULL,
  `categoria` int(11) NOT NULL,
  `prioridad` int(11) NOT NULL,
  `tarea` varchar(150) NOT NULL,
  `importe` int(15) NOT NULL,
  `isdeleted` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`num`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `tareas`
--

INSERT INTO `tareas` (`num`, `fecha`, `cliente`, `categoria`, `prioridad`, `tarea`, `importe`, `isdeleted`) VALUES
(1, '2013-12-27 22:05:41', 2, 3, 1, 'ttttttto', 135, 0),
(2, '2013-12-27 22:05:41', 2, 2, 1, 'DISEÑO TARJETONES PARA BOTELLAS', 195, 0),
(3, '2013-12-27 22:05:41', 1, 1, 1, 'DISEÑO BOTELLAS', 195, 0),
(4, '2013-12-27 22:05:41', 2, 3, 1, 'DISEÑO LOGO INTEGRAL', 195, 0),
(5, '2013-12-27 22:05:41', 1, 4, 1, 'WEB CORPORATIVA', 195, 0),
(6, '2014-04-22 10:07:52', 2, 2, 2, 'Prueba', 10, 0),
(7, '2014-04-22 11:37:42', 2, 2, 2, 'DISEÑO TARJETONES PARA BOTELLAS', 195, 0),
(8, '2014-04-22 11:39:36', 1, 4, 2, 'WEB CORPORATIVA', 195, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codusu` int(11) NOT NULL AUTO_INCREMENT,
  `nombreusu` varchar(45) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telef` varchar(13) DEFAULT NULL,
  PRIMARY KEY (`codusu`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codusu`, `nombreusu`, `contrasena`, `email`, `telef`) VALUES
(2, 'juanico', '2800df1531c5d6431fe5be95aa98d06b', 'email@hola.com', '95.252.00.01'),
(3, 'maria', '263bce650e68ab4e23f28263760b9fa5', NULL, NULL),
(4, 'admin', '050248cd2efad770e194ca0e12d44264', 'email@hola.com', '95.252.00.00');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;