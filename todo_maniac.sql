-- phpMyAdmin SQL Dump
-- version 3.5.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2014 a las 14:26:43
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

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
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE IF NOT EXISTS `mensajes` (
  `ID` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `para` varchar(180) DEFAULT NULL,
  `de` varchar(180) DEFAULT NULL,
  `leido` varchar(180) DEFAULT NULL,
  `fecha` varchar(180) DEFAULT NULL,
  `asunto` varchar(180) DEFAULT NULL,
  `texto` text,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`ID`, `para`, `de`, `leido`, `fecha`, `asunto`, `texto`) VALUES
(1, 'juanico', 'admin', 'si', '19/05/2014, 1:16 pm', 'Hola', 'Holaaaa'),
(2, 'juanico', 'admin', 'si', '20/05/2014, 10:22 am', 'Hi', 'asdfadsfadsf'),
(10, 'admin', 'juanico', 'si', '20/05/2014, 2:08 pm', 'RE: Hi', 'respuesta para admin de juanico'),
(19, 'maria', 'juanico', NULL, '21/05/2014, 10:14 am', 'esto es una prueba', 'ummmm a ver que tal churula esto... tiene buena pinta ;O  ;)'),
(20, 'admin', 'juanico', 'si', '21/05/2014, 10:24 am', 'RE: Hola', 'dfsdfsdfsadf'),
(21, 'juanico', 'admin', NULL, '22/05/2014, 10:10 am', 'RE: RE: Hi', 'asdasd');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menuid` int(11) NOT NULL,
  `nombremenu` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`menuid`, `nombremenu`) VALUES
(1, 'Tareas'),
(2, 'Clientes'),
(3, 'Configuración'),
(4, 'Usuarios'),
(5, 'Mensajes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menusu`
--

CREATE TABLE IF NOT EXISTS `menusu` (
  `usuid` int(11) NOT NULL,
  `menuid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menusu`
--

INSERT INTO `menusu` (`usuid`, `menuid`) VALUES
(3, 1),
(3, 2),
(3, 3),
(3, 4),
(3, 5),
(1, 1),
(1, 5),
(2, 1),
(2, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfiles`
--

CREATE TABLE IF NOT EXISTS `perfiles` (
  `id_perfil` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_perfil` varchar(50) NOT NULL,
  `descripcion` text NOT NULL,
  `isborradop` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_perfil`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `perfiles`
--

INSERT INTO `perfiles` (`id_perfil`, `nombre_perfil`, `descripcion`, `isborradop`) VALUES
(1, 'Administrador', 'Tiene acceso a todos los menus.', 0),
(2, 'Trabajador', 'Tiene acceso a tareas y notificaciones-Chat.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prioridades`
--

CREATE TABLE IF NOT EXISTS `prioridades` (
  `id_prioridad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_prioridad` varchar(45) NOT NULL DEFAULT '0',
  `isborrao` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_prioridad`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `prioridades`
--

INSERT INTO `prioridades` (`id_prioridad`, `nombre_prioridad`, `isborrao`) VALUES
(1, 'CRITICAS', 0),
(2, 'MEDIA', 0),
(3, 'BAJA', 0),
(5, 'MUY BAJA', 0),
(6, 'FIN DE SEMANA', 0);

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
(8, '2014-04-22 11:39:36', 1, 4, 2, 'WEB CORPORATIVA', 195, 0),
(15, '2014-05-06 12:42:33', 0, 0, 0, '', 0, 0),
(16, '2014-05-19 11:03:31', 1, 1, 1, 'fghfghfgh', 3333, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `codusu` int(11) NOT NULL,
  `nombreusu` varchar(45) DEFAULT NULL,
  `contrasena` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telef` varchar(13) DEFAULT NULL,
  `esborrado` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codusu`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codusu`, `nombreusu`, `contrasena`, `email`, `telef`, `esborrado`) VALUES
(1, 'juanico', '2800df1531c5d6431fe5be95aa98d06b', 'juanico@hola.com', '95.252.00.01', 0),
(2, 'maria', '263bce650e68ab4e23f28263760b9fa5', 'maria@hola.com', NULL, 0),
(3, 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'adminl@hola.com', '95.252.00.00', 0),
(4, 'amparo', '9e515968f859f259fbed85f45a56bc2c', 'amparo@cashuba.com', '95.252.66.66', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
