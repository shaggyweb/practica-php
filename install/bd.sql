-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-12-2014 a las 19:01:54
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
`cod_envio` tinyint(4) NOT NULL,
  `destinatario` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `poblacion` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `postal` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `provincia` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `creacion` date NOT NULL,
  `entrega` date NOT NULL,
  `observaciones` varchar(90) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `envio`
--

INSERT INTO `envio` (`cod_envio`, `destinatario`, `telefono`, `direccion`, `poblacion`, `postal`, `provincia`, `email`, `estado`, `creacion`, `entrega`, `observaciones`) VALUES
(1, 'Antonio España', '959231955', 'Av Francisco Montenegro', 'Huelva', '21007', '21', 'antonio_spain@hotmail.es', 'E', '2014-11-11', '2014-11-25', 'entregado el 25 de noviembre de 2014'),
(2, 'destinatario', '959236565', 'casa', 'Lepe', '21110', '21', 'correo@email.com', 'E', '2014-11-12', '2014-12-02', 'entregado el 02 de diciembre'),
(3, 'destinatario89', '959363636', 'casa', 'San Juan Del Puerto', '21158', '21', 'email@web.com', 'E', '2014-11-12', '2014-11-21', 'entregado OK'),
(4, 'Isabel', '952223214', 'Glorieta Sur', 'Camas', '21888', '41', 'prueba@email.com', 'E', '2014-11-12', '2014-11-21', 'entregado'),
(10, 'Hipercor', '955896396', 'Plaza Autonomía', 'Xerez', '21110', '11', 'hipercor@hotmail.com', 'P', '0000-00-00', '2014-12-26', 'Pendiente de entrega'),
(11, 'Andrés López', '956236565', 'Parque Industrial, nº2', 'Montoro', '21500', '14', 'lepe@gmail.com', 'P', '2014-11-18', '0000-00-00', 'Pendiente de envío'),
(12, 'Javier León Pérez', '959232365', 'Calle Almirante', 'Gibraleón', '21785', '21', 'gibra@hotmail.com', 'P', '2014-11-18', '0000-00-00', ''),
(13, 'Frutas Encarni', '954656536', 'Parque Empresarial', 'Arroyo', '27889', '03', 'anton@yahoo.es', 'D', '2014-11-18', '0000-00-00', 'devuelto'),
(14, 'Talleres Bogado', '959221232', 'Avenida Andalucía', 'Moguer', '21003', '21', 'talleres@gmail.com', 'P', '2014-11-28', '0000-00-00', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_provincias`
--

CREATE TABLE IF NOT EXISTS `tbl_provincias` (
  `cod` char(2) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL DEFAULT '00' COMMENT 'Código de la provincia de dos digitos',
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci NOT NULL DEFAULT '' COMMENT 'Nombre de la provincia'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Provincias de españa; 99 para seleccionar a Nacional';

--
-- Volcado de datos para la tabla `tbl_provincias`
--

INSERT INTO `tbl_provincias` (`cod`, `nombre`) VALUES
('01', 'Alava'),
('02', 'Albacete'),
('03', 'Alicante'),
('04', 'Almera'),
('33', 'Asturias'),
('05', 'Avila'),
('06', 'Badajoz'),
('07', 'Balears (Illes)'),
('08', 'Barcelona'),
('09', 'Burgos'),
('10', 'Cáceres'),
('11', 'Cádiz'),
('39', 'Cantabria'),
('12', 'Castellón'),
('51', 'Ceuta'),
('13', 'Ciudad Real'),
('14', 'Córdoba'),
('15', 'Coruña (A)'),
('16', 'Cuenca'),
('17', 'Girona'),
('18', 'Granada'),
('19', 'Guadalajara'),
('20', 'Guipzcoa'),
('21', 'Huelva'),
('22', 'Huesca'),
('23', 'Jaén'),
('24', 'León'),
('25', 'Lleida'),
('27', 'Lugo'),
('28', 'Madrid'),
('29', 'Málaga'),
('52', 'Melilla'),
('30', 'Murcia'),
('31', 'Navarra'),
('32', 'Ourense'),
('34', 'Palencia'),
('35', 'Palmas (Las)'),
('36', 'Pontevedra'),
('26', 'Rioja (La)'),
('37', 'Salamanca'),
('38', 'Santa Cruz de Tenerife'),
('40', 'Segovia'),
('41', 'Sevilla'),
('42', 'Soria'),
('43', 'Tarragona'),
('44', 'Teruel'),
('45', 'Toledo'),
('46', 'Valencia'),
('47', 'Valladolid'),
('48', 'Vizcaya'),
('49', 'Zamora'),
('50', 'Zaragoza');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
`codigo` tinyint(4) NOT NULL,
  `nombre` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(30) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`codigo`, `nombre`, `clave`) VALUES
(1, 'usuario', '1111'),
(2, 'usuario2', '2222'),
(4, 'usuario3', '3333');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `envio`
--
ALTER TABLE `envio`
 ADD PRIMARY KEY (`cod_envio`);

--
-- Indices de la tabla `tbl_provincias`
--
ALTER TABLE `tbl_provincias`
 ADD PRIMARY KEY (`cod`), ADD KEY `nombre` (`nombre`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`codigo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `envio`
--
ALTER TABLE `envio`
MODIFY `cod_envio` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
MODIFY `codigo` tinyint(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
