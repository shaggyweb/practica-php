-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-10-2014 a las 16:39:25
-- Versión del servidor: 5.6.20
-- Versión de PHP: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `envios`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envio`
--

CREATE TABLE IF NOT EXISTS `envio` (
`cod` tinyint(4) NOT NULL,
  `destinatario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `poblacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `postal` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` tinyint(3) DEFAULT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creacion` date NOT NULL,
  `entrega` date NOT NULL,
  `observaciones` varchar(90) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
 ADD PRIMARY KEY (`cod`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
MODIFY `cod` tinyint(4) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
