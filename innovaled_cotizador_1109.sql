-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 11-09-2017 a las 17:03:23
-- Versión del servidor: 5.5.34
-- Versión de PHP: 5.3.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `innovaled_cotizador`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizador`
--

CREATE TABLE IF NOT EXISTS `cotizador` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime NOT NULL,
  `nombre_cliente` varchar(45) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `telefono` varchar(45) NOT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `mensaje` varchar(1000) DEFAULT NULL,
  `estado` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `cotizador`
--

INSERT INTO `cotizador` (`id`, `fecha`, `nombre_cliente`, `correo`, `telefono`, `empresa`, `mensaje`, `estado`) VALUES
(1, '2017-08-22 11:11:13', 'Mario Delgado', 'madadehu@gmail.com', '950330576', 'TEAYUDO', '', '2'),
(2, '2017-08-22 11:35:54', 'Mario Delgado', 'madadehu@gmail.com', '950330576', 'TEAYUDO', 'Correo 2', '2'),
(3, '2017-08-22 12:30:26', 'David Delgado', 'madadehu@gmail.com', '9303243242', 'NUEVAEMPRESA', '', '2'),
(4, '2017-08-22 14:44:35', 'ANTONIO', 'madadehu@gmail.com', '950330576', 'FERRETERO', '', '2'),
(5, '2017-08-22 15:27:09', 'JESUS', 'mariodavid.delgado@outlook.com', '950330576', 'PERU MAGICO', '', '2'),
(6, '2017-08-28 02:11:39', 'CARLOS', 'mariodavid.delgado@outlook.com', '950330576', 'TEAYUDO', 'PRUEBA DE ENVIO DE COTIZACION', '2'),
(7, '2017-08-28 02:12:47', 'MARCCO', 'mariodavid.delgado@outlook.com', '950330576', 'TEAYUDO', 'PRUEBA DE ENVIO DE COTIZACION', '2'),
(8, '2017-08-28 02:13:51', 'MARCO', 'mariodavid.delgado@outlook.com', '950330576', 'TEAYUDO', 'ENVIO DE COTIZACION\n', '2'),
(9, '2017-08-28 02:14:28', 'JAVIER', 'mariodavid.delgado@outlook.com', '950330576', 'TEAYUDO', 'PRUEBA DE ENVIO', '2'),
(10, '2017-09-11 16:00:03', 'RICARDO', 'mariodavid.delgado@outlook.com', '950330576', 'INNOVALED', '', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizador_producto`
--

CREATE TABLE IF NOT EXISTS `cotizador_producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cotizador_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio` float NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `cotizador_producto`
--

INSERT INTO `cotizador_producto` (`id`, `cotizador_id`, `producto_id`, `precio`, `cantidad`) VALUES
(1, 1, 1, 49, 1),
(2, 2, 2, 49, 1),
(3, 2, 1, 49, 1),
(4, 4, 1, 100, 1),
(5, 4, 6, 100, 1),
(6, 5, 5, 38, 1),
(7, 6, 76, 264.37, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `precio_escala`
--

CREATE TABLE IF NOT EXISTS `precio_escala` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `desde` int(11) NOT NULL,
  `porciento_descuento` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `precio_escala`
--

INSERT INTO `precio_escala` (`id`, `producto_id`, `desde`, `porciento_descuento`) VALUES
(1, 1, 10, 1),
(2, 1, 100, 2),
(3, 5, 15, 1.5),
(4, 1, 1000, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE IF NOT EXISTS `producto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `imagen_1` varchar(255) NOT NULL,
  `imagen_2` varchar(255) NOT NULL,
  `linea` int(11) NOT NULL,
  `sublinea` int(11) NOT NULL,
  `marca` varchar(45) NOT NULL,
  `precio` decimal(18,2) NOT NULL,
  `mostrar_precio` varchar(45) NOT NULL,
  `moneda` varchar(45) NOT NULL,
  `ficha` varchar(255) DEFAULT NULL,
  `descripcion_corta` varchar(255) NOT NULL,
  `descripcion_larga` longtext NOT NULL,
  `estado` varchar(45) NOT NULL,
  `orden` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=96 ;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `slug`, `imagen_1`, `imagen_2`, `linea`, `sublinea`, `marca`, `precio`, `mostrar_precio`, `moneda`, `ficha`, `descripcion_corta`, `descripcion_larga`, `estado`, `orden`) VALUES
(1, 'CINTA LED SMD5050 IP20 4000-4500K, 15-18 lm', 'CINTA-LED-SMD5050-IP20-4000-4500K-15-18-lm', '1-imagen_1.jpg', '1-imagen_2.jpg', 1, 1, 'INNOVALED', '49.00', '1', '1', '', '.', '', '1', 0),
(2, 'CINTA LED SMD5050 IP20  6500K, 14-16 lm ', 'CINTA-LED-SMD5050-IP20-6500K-14-16-lm', '2-imagen_1.jpg', '2-imagen_2.jpg', 1, 1, 'INNOVALED', '49.00', '1', '1', '', '.', '', '1', 2),
(3, 'CINTA LED RGB  IP20, 14-16 lm ', 'CINTA-LED-RGB-IP20-14-16-lm', '3-imagen_1.jpg', '3-imagen_2.jpg', 1, 1, 'INNOVALED', '55.00', '1', '1', '', '.', '', '1', 1),
(4, 'CINTA LED RGB  IP20, 15-18 lm', 'CINTA-LED-RGB-IP20-15-18-lm', '4-imagen_1.jpg', '4-imagen_2.jpg', 1, 1, 'INNOVALED', '55.00', '1', '1', '', '.', '', '1', 0),
(5, 'CINTA LED ZIGZAG SMD2835 IP20', 'CINTA-LED-ZIGZAG-SMD2835-IP20', '5-imagen_1.jpg', '5-imagen_2.jpg', 1, 1, 'INNOVALED', '38.00', '1', '1', '5-ficha.pdf', '.', '', '1', 0),
(6, 'MODULO LED SMD2835 6500K', 'MODULO-LED-SMD2835-6500K', '6-imagen_1.png', '6-imagen_2.png', 1, 2, 'INNOVALED', '100.00', '1', '1', '6-ficha.pdf', '3 LEDS', '', '1', 0),
(7, 'MODULO LED SMD2835 7500K', 'MODULO-LED-SMD2835-7500K', '7-imagen_1.png', '7-imagen_2.png', 1, 2, 'INNOVALED', '2.60', '1', '1', '7-ficha.pdf', '3 LEDS', '', '1', 0),
(8, 'MODULO LED SMD5050 10 000K, 14-16 lm', 'MODULO-LED-SMD5050-10-000K-14-16-lm', '8-imagen_1.png', '8-imagen_2.png', 1, 2, 'INNOVALED', '1.80', '1', '1', '8-ficha.pdf', '3 LEDS', '', '1', 0),
(9, 'MODULO LED SMD5050 RGB', 'MODULO-LED-SMD5050-RGB', '9-imagen_1.png', '9-imagen_2.png', 1, 2, 'INNOVALED', '2.00', '1', '1', '9-ficha.pdf', '3 LEDS', '', '1', 0),
(10, 'MODULO LED SMD5050 DIGITAL', 'MODULO-LED-SMD5050-DIGITAL', '10-imagen_1.png', '10-imagen_2.png', 1, 2, 'INNOVALED', '0.00', '1', '1', '10-ficha.pdf', '3 LEDS', '', '1', 0),
(11, 'MODULO LED COB 10 000K', 'MODULO-LED-COB-10-000K', '11-imagen_1.png', '11-imagen_2.png', 1, 2, 'INNOVALED', '2.80', '1', '1', '11-ficha.pdf', '3 LEDS', '', '1', 0),
(12, 'MODULO LED SMD2835 7500K', 'MODULO-LED-SMD2835-7500K', '12-imagen_1.png', '12-imagen_2.png', 1, 2, 'INNOVALED', '3.80', '1', '1', '12-ficha.pdf', '4 LEDS', '', '1', 0),
(13, 'MODULO LED SMD2835 9000K', 'MODULO-LED-SMD2835-9000K', '13-imagen_1.png', '13-imagen_2.png', 1, 2, 'INNOVALED', '0.00', '1', '1', NULL, '4 LEDS', '', '1', 0),
(14, 'MODULO LED SMD5050 10 000K, 14-16 lm', 'MODULO-LED-SMD5050-10-000K-14-16-lm', '14-imagen_1.png', '14-imagen_2.png', 1, 2, 'INNOVALED', '2.00', '1', '1', '14-ficha.pdf', '4 LEDS', '', '1', 0),
(15, 'MODULO LED SMD5050 RGB', 'MODULO-LED-SMD5050-RGB', '15-imagen_1.png', '15-imagen_2.png', 1, 2, 'INNOVALED', '2.10', '1', '1', '15-ficha.pdf', '4 LEDS', '', '1', 0),
(16, 'BOMBILLA LITEHOME 5W', 'BOMBILLA-LITEHOME-5W', '16-imagen_1.png', '16-imagen_2.png', 1, 3, 'INNOVALED', '2.10', '1', '1', '16-ficha.pdf', '.', '', '1', 0),
(17, 'BOMBILLA LITEHOME 7W', 'BOMBILLA-LITEHOME-7W', '17-imagen_1.png', '17-imagen_2.png', 1, 3, 'INNOVALED', '2.50', '1', '1', '17-ficha.pdf', '.', '', '1', 0),
(18, 'BOMBILLA LITEHOME 9W', 'BOMBILLA-LITEHOME-9W', '18-imagen_1.png', '18-imagen_2.png', 1, 3, 'INNOVALED', '3.00', '1', '1', '18-ficha.pdf', '.', '', '1', 0),
(19, 'BOMBILLA LITEHOME 12W', 'BOMBILLA-LITEHOME-12W', '19-imagen_1.png', '19-imagen_2.png', 1, 3, 'INNOVALED', '3.50', '1', '1', '19-ficha.pdf', '.', '', '1', 0),
(20, 'BOMBILLA DAXSO 7W ', 'BOMBILLA-DAXSO-7W', '20-imagen_1.png', '20-imagen_2.png', 1, 3, 'INNOVALED', '7.00', '1', '1', '20-ficha.pdf', '.', '', '1', 0),
(21, 'BOMBILLA DAXSO 9W ', 'BOMBILLA-DAXSO-9W', '21-imagen_1.png', '21-imagen_2.png', 1, 3, 'INNOVALED', '7.70', '1', '1', '21-ficha.pdf', '.', '', '1', 0),
(22, 'BOMBILLA DAXSO 12W ', 'BOMBILLA-DAXSO-12W', '22-imagen_1.png', '22-imagen_2.png', 1, 3, 'INNOVALED', '8.50', '1', '1', '22-ficha.pdf', '.', '', '1', 0),
(23, 'BOMBILLA UFO 26W', 'BOMBILLA-UFO-26W', '23-imagen_1.png', '23-imagen_2.png', 1, 3, 'INNOVALED', '25.00', '1', '1', '23-ficha.pdf', '.', '', '1', 0),
(24, 'BOMBILLA UFO 42W', 'BOMBILLA-UFO-42W', '24-imagen_1.png', '24-imagen_2.png', 1, 3, 'INNOVALED', '42.00', '1', '1', '24-ficha.pdf', '.', '', '1', 0),
(25, 'BOMBILLA CORN 10W', 'BOMBILLA-CORN-10W', '25-imagen_1.png', '25-imagen_2.png', 1, 1, 'INNOVALED', '13.00', '1', '1', '25-ficha.pdf', '.', '', '1', 0),
(26, 'BOMBILLA CORN 20W', 'BOMBILLA-CORN-20W', '26-imagen_1.png', '26-imagen_2.png', 1, 3, 'INNOVALED', '20.00', '1', '1', '26-ficha.pdf', '.', '', '1', 0),
(27, 'BOMBILLA CORN 30W', 'BOMBILLA-CORN-30W', '27-imagen_1.png', '27-imagen_2.png', 1, 3, 'INNOVALED', '29.00', '1', '1', '27-ficha.pdf', '.', '', '1', 0),
(28, 'BOMBILLA CORN 80W', 'BOMBILLA-CORN-80W', '28-imagen_1.png', '28-imagen_2.png', 1, 3, 'INNOVALED', '62.00', '1', '1', '28-ficha.pdf', '.', '', '1', 0),
(29, 'DICROICO 5W GU10 ', 'DICROICO-5W-GU10', '29-imagen_1.png', '29-imagen_2.png', 1, 4, 'INNOVALED', '6.50', '1', '1', '29-ficha.pdf', '.', '', '1', 0),
(30, 'DICROICO 7W GU10 ', 'DICROICO-7W-GU10', '30-imagen_1.png', '30-imagen_2.png', 1, 4, 'INNOVALED', '8.90', '1', '1', '30-ficha.pdf', '.', '', '1', 0),
(31, 'DICROICO 7W GU5.3/MRU16', 'DICROICO-7W-GU53MRU16', '31-imagen_1.png', '31-imagen_2.png', 1, 4, 'INNOVALED', '8.90', '1', '1', '31-ficha.pdf', '.', '', '1', 0),
(32, 'PAR LED 30 35W 4000K', 'PAR-LED-30-35W-4000K', '32-imagen_1.png', '32-imagen_2.png', 1, 5, 'INNOVALED', '39.00', '1', '1', '32-ficha.pdf', '.', '', '1', 0),
(33, 'PAR LED 30 35W 6000K', 'PAR-LED-30-35W-6000K', '33-imagen_1.png', '33-imagen_2.png', 1, 5, 'INNOVALED', '39.00', '1', '1', '33-ficha.pdf', '.', '', '1', 0),
(34, 'PAR LED 30 45W 4000K', 'PAR-LED-30-45W-4000K', '34-imagen_1.png', '34-imagen_2.png', 1, 5, 'INNOVALED', '55.00', '1', '1', '34-ficha.pdf', '.', '', '1', 0),
(35, 'PAR LED 30 45W 6000K', 'PAR-LED-30-45W-6000K', '35-imagen_1.png', '35-imagen_2.png', 1, 5, 'INNOVALED', '55.00', '1', '1', '35-ficha.pdf', '.', '', '1', 0),
(36, 'TUBO 20W ', 'TUBO-20W', '36-imagen_1.png', '36-imagen_2.png', 1, 6, 'INNOVALED', '15.00', '1', '1', '36-ficha.pdf', '.', '', '1', 0),
(37, 'TUBO INTEGRADO 9W ', 'TUBO-INTEGRADO-9W', '37-imagen_1.png', '37-imagen_2.png', 1, 6, 'INNOVALED', '12.00', '1', '1', '37-ficha.pdf', '.', '', '1', 0),
(38, 'TUBO INTEGRADO 18W', 'TUBO-INTEGRADO-18W', '38-imagen_1.png', '38-imagen_2.png', 1, 6, 'INNOVALED', '15.00', '1', '1', '38-ficha.pdf', '.', '', '1', 0),
(39, 'EQUIPO LINEAL 16W 0.60 cm', 'EQUIPO-LINEAL-16W-060-cm', '39-imagen_1.png', '39-imagen_2.png', 1, 7, 'INNOVALED', '19.00', '1', '1', '39-ficha.pdf', '.', '', '1', 0),
(40, 'EQUIPO LINEAL 32W 120 cm', 'EQUIPO-LINEAL-32W-120-cm', '40-imagen_1.png', '40-imagen_2.png', 1, 7, 'INNOVALED', '26.00', '1', '1', '40-ficha.pdf', '.', '', '1', 0),
(41, 'REFLECTOR 20W', 'REFLECTOR-20W', '41-imagen_1.png', '41-imagen_2.png', 1, 8, 'INNOVALED', '48.00', '1', '1', '41-ficha.pdf', '.', '', '1', 0),
(42, 'REFLECTOR 30W', 'REFLECTOR-30W', '42-imagen_1.png', '42-imagen_2.png', 1, 8, 'INNOVALED', '59.00', '1', '1', '42-ficha.pdf', '.', '', '1', 0),
(43, 'REFLECTOR 50W', 'REFLECTOR-50W', '43-imagen_1.png', '43-imagen_2.png', 1, 8, 'INNOVALED', '91.00', '1', '1', '43-ficha.pdf', '.', '', '1', 0),
(44, 'REFLECTOR 100W', 'REFLECTOR-100W', '44-imagen_1.png', '44-imagen_2.png', 1, 8, 'INNOVALED', '160.00', '1', '1', '44-ficha.pdf', '.', '', '1', 0),
(45, 'REFLECTOR 150W', 'REFLECTOR-150W', '45-imagen_1.png', '45-imagen_2.png', 1, 8, 'INNOVALED', '265.00', '1', '1', '45-ficha.pdf', '.', '', '1', 0),
(46, 'REFLECTOR 200W', 'REFLECTOR-200W', '46-imagen_1.png', '46-imagen_2.png', 1, 8, 'INNOVALED', '370.00', '1', '1', '46-ficha.pdf', '.', '', '1', 0),
(47, 'PANEL LED 6W ADOSABLE ', 'PANEL-LED-6W-ADOSABLE', '47-imagen_1.jpg', '47-imagen_2.jpg', 1, 9, 'INNOVALED', '14.50', '1', '1', '47-ficha.pdf', '.', '', '1', 0),
(48, 'PANEL LED 12W ADOSABLE ', 'PANEL-LED-12W-ADOSABLE', '48-imagen_1.png', '48-imagen_2.png', 1, 9, 'INNOVALED', '20.50', '1', '1', '48-ficha.pdf', '.', '', '1', 0),
(49, 'PANEL LED 18W ADOSABLE ', 'PANEL-LED-18W-ADOSABLE', '49-imagen_1.png', '49-imagen_2.png', 1, 9, 'INNOVALED', '23.00', '1', '1', '49-ficha.pdf', '.', '', '1', 0),
(50, 'PANEL LED 6W EMPOTRABLE ', 'PANEL-LED-6W-EMPOTRABLE', '50-imagen_1.png', '50-imagen_2.png', 1, 9, 'INNOVALED', '11.00', '1', '1', '50-ficha.pdf', '.', '', '1', 0),
(51, 'PANEL LED 12W EMPOTRABLE ', 'PANEL-LED-12W-EMPOTRABLE', '51-imagen_1.png', '51-imagen_2.png', 1, 9, 'INNOVALED', '16.00', '1', '1', '51-ficha.pdf', '.', '', '1', 0),
(52, 'PANEL LED 18W EMPOTRABLE ', 'PANEL-LED-18W-EMPOTRABLE', '52-imagen_1.png', '52-imagen_2.png', 1, 9, 'INNOVALED', '19.50', '1', '1', '52-ficha.pdf', '.', '', '1', 0),
(53, 'PANEL LED 36W ADOSABLE', 'PANEL-LED-36W-ADOSABLE', '53-imagen_1.png', '53-imagen_2.png', 1, 9, 'INNOVALED', '115.00', '1', '1', '53-ficha.pdf', '.', '', '1', 0),
(54, 'PANEL LED 36W ADOSABLE', 'PANEL-LED-36W-ADOSABLE', '54-imagen_1.png', '54-imagen_2.png', 1, 9, 'INNOVALED', '115.00', '1', '1', '54-ficha.pdf', '.', '', '1', 0),
(55, 'PANEL LED 40W ADOSABLE', 'PANEL-LED-40W-ADOSABLE', '55-imagen_1.png', '55-imagen_2.png', 1, 9, 'INNOVALED', '0.00', '1', '1', '55-ficha.pdf', '.', '', '1', 0),
(56, 'PANEL LED 48W ADOSABLE', 'PANEL-LED-48W-ADOSABLE', '56-imagen_1.png', '56-imagen_2.png', 1, 9, 'INNOVALED', '125.00', '1', '1', '56-ficha.pdf', '.', '', '1', 0),
(57, 'PANEL LED 48W EMPOTRABLE', 'PANEL-LED-48W-EMPOTRABLE', '57-imagen_1.png', '57-imagen_2.png', 1, 9, 'INNOVALED', '115.00', '1', '1', '57-ficha.pdf', '.', '', '1', 0),
(58, 'CONTROLADOR RGB, 24K', 'CONTROLADOR-RGB-24K', '58-imagen_1.png', '58-imagen_2.png', 1, 10, 'INNOVALED', '14.00', '1', '1', '58-ficha.pdf', '.', '', '1', 0),
(59, 'TRANSFORMADORES LED 150W 12.5A IP20', 'TRANSFORMADORES-LED-150W-125A-IP20', '59-imagen_1.png', '59-imagen_2.png', 1, 10, 'INNOVALED', '52.00', '1', '1', '59-ficha.pdf', '.', '', '1', 0),
(60, 'TRANSFORMADORES LED 240W 20A IP20', 'TRANSFORMADORES-LED-240W-20A-IP20', '60-imagen_1.png', '60-imagen_2.png', 1, 10, 'INNOVALED', '65.00', '1', '1', '60-ficha.pdf', '.', '', '1', 0),
(61, 'TRANSFORMADORES LED 360W 30A IP20', 'TRANSFORMADORES-LED-360W-30A-IP20', '61-imagen_1.png', '61-imagen_2.png', 1, 10, 'INNOVALED', '79.00', '1', '1', '61-ficha.pdf', '.', '', '1', 0),
(62, 'TRANSFORMADORES LED 200W 16A IP67', 'TRANSFORMADORES-LED-200W-16A-IP67', '62-imagen_1.png', '62-imagen_2.png', 1, 10, 'INNOVALED', '145.00', '1', '1', '62-ficha.pdf', '.', '', '1', 0),
(63, 'TRANSFORMADORES LED 250W 20A IP67', 'TRANSFORMADORES-LED-250W-20A-IP67', '63-imagen_1.png', '63-imagen_2.png', 1, 10, 'INNOVALED', '195.00', '1', '1', '63-ficha.pdf', '.', '', '1', 0),
(64, 'TRANSFORMADOR MEANWELL HLG-240H-12A ', 'TRANSFORMADOR-MEANWELL-HLG-240H-12A', '64-imagen_1.png', '64-imagen_2.png', 1, 10, 'INNOVALED', '351.64', '1', '1', '64-ficha.pdf', '.', '', '1', 0),
(65, 'TRANSFORMADOR MEANWELL HLG-320H-12A ', 'TRANSFORMADOR-MEANWELL-HLG-320H-12A', '65-imagen_1.png', '65-imagen_2.png', 1, 10, 'INNOVALED', '454.30', '1', '1', '65-ficha.pdf', '.', '', '1', 0),
(66, 'TRANSFORMADOR MEANWELL LPV-60-12   ', 'TRANSFORMADOR-MEANWELL-LPV-60-12', '66-imagen_1.png', '66-imagen_2.png', 1, 10, 'INNOVALED', '83.78', '1', '1', '66-ficha.pdf', '.', '', '1', 0),
(67, 'TRANSFORMADOR MEANWELL  LPV-100-12', 'TRANSFORMADOR-MEANWELL-LPV-100-12', '67-imagen_1.png', '67-imagen_2.png', 1, 10, 'INNOVALED', '141.60', '1', '1', '67-ficha.pdf', '.', '', '1', 0),
(68, 'LUCES DE EMERGENCIA 8h', 'LUCES-DE-EMERGENCIA-8h', '68-imagen_1.png', '68-imagen_2.png', 1, 11, 'INNOVALED', '0.00', '1', '1', '68-ficha.pdf', '.', '', '1', 0),
(69, 'FOCO LED V8 H4', 'FOCO-LED-V8-H4', '69-imagen_1.png', '69-imagen_2.png', 1, 12, 'INNOVALED', '196.13', '1', '1', '69-ficha.pdf', '.', '', '1', 0),
(70, 'FOCO LED V8 H13', 'FOCO-LED-V8-H13', '70-imagen_1.png', '70-imagen_2.png', 1, 12, 'INNOVALED', '196.13', '1', '1', '70-ficha.pdf', '.', '', '1', 0),
(71, 'FOCO LED V6 H1 ', 'FOCO-LED-V6-H1', '71-imagen_1.png', '71-imagen_2.png', 1, 12, 'INNOVALED', '103.90', '1', '1', '71-ficha.pdf', '.', '', '1', 0),
(72, 'FOCO LED V6 H3', 'FOCO-LED-V6-H3', '72-imagen_1.png', '72-imagen_2.png', 1, 12, 'INNOVALED', '103.90', '1', '1', '72-ficha.pdf', '.', '', '1', 0),
(73, 'FOCO LED V6 H4', 'FOCO-LED-V6-H4', '73-imagen_1.png', '73-imagen_2.png', 1, 12, 'INNOVALED', '121.92', '1', '1', '73-ficha.pdf', '.', '', '1', 0),
(74, 'FOCO LED V6 H7', 'FOCO-LED-V6-H7', '74-imagen_1.png', '74-imagen_2.png', 1, 12, 'INNOVALED', '103.90', '1', '1', '74-ficha.pdf', '.', '', '1', 0),
(75, 'FOCO LED V6 H11', 'FOCO-LED-V6-H11', '75-imagen_1.png', '75-imagen_2.png', 1, 12, 'INNOVALED', '103.90', '1', '1', '75-ficha.pdf', '.', '', '1', 0),
(76, 'PANEL SOLAR 85W', 'PANEL-SOLAR-85W', '76-imagen_1.png', '76-imagen_2.png', 2, 14, 'INNOVALED', '264.37', '1', '1', '76-ficha.pdf', '.', '', '1', 0),
(77, 'PANEL SOLAR 150W', 'PANEL-SOLAR-150W', '77-imagen_1.png', '77-imagen_2.png', 2, 14, 'INNOVALED', '440.61', '1', '1', '77-ficha.pdf', '.', '', '1', 0),
(78, 'PANEL SOLAR 220W', 'PANEL-SOLAR-220W', '78-imagen_1.png', '78-imagen_2.png', 2, 14, 'INNOVALED', '646.22', '1', '1', '78-ficha.pdf', '.', '', '1', 0),
(79, 'CONTROLADOR 12V 10A ', 'CONTROLADOR-12V-10A', '79-imagen_1.png', '79-imagen_2.png', 2, 16, 'INNOVALED', '52.09', '1', '1', '79-ficha.pdf', '.', '', '1', 0),
(80, 'CONTROLADOR 12V 10A TIPO LCD', 'CONTROLADOR-12V-10A-TIPO-LCD', '80-imagen_1.png', '80-imagen_2.png', 2, 16, 'INNOVALED', '78.71', '1', '1', '80-ficha.pdf', '.', '', '1', 0),
(81, 'CONTROLADOR 12V 20A ', 'CONTROLADOR-12V-20A', '81-imagen_1.png', '81-imagen_2.png', 2, 16, 'INNOVALED', '65.66', '1', '1', '81-ficha.pdf', '.', '', '1', 0),
(82, 'CONTROLADOR 12V 20A TIPO LCD', 'CONTROLADOR-12V-20A-TIPO-LCD', '82-imagen_1.png', '82-imagen_2.png', 2, 16, 'INNOVALED', '87.18', '1', '1', '82-ficha.pdf', '.', '', '1', 0),
(83, 'CONTROLADOR 24V 30A ', 'CONTROLADOR-24V-30A', '83-imagen_1.png', '83-imagen_2.png', 2, 16, 'INNOVALED', '138.65', '1', '1', '83-ficha.pdf', '.', '', '1', 0),
(84, 'CONTROLADOR 24V 30A TIPO LCD ', 'CONTROLADOR-24V-30A-TIPO-LCD', '84-imagen_1.png', '84-imagen_2.png', 2, 16, 'INNOVALED', '105.40', '1', '1', '84-ficha.pdf', '.', '', '1', 0),
(85, 'INVERSOR 300W ', 'INVERSOR-300W', '85-imagen_1.png', '85-imagen_2.png', 2, 18, 'INNOVALED', '130.27', '1', '1', '85-ficha.pdf', '.', '', '1', 0),
(86, 'INVERSOR 600W', 'INVERSOR-600W', '86-imagen_1.png', '86-imagen_2.png', 2, 18, 'INNOVALED', '202.06', '1', '1', '86-ficha.pdf', '.', '', '1', 0),
(87, 'PANTALLAS LED', 'PANTALLAS-LED', '87-imagen_1.png', '87-imagen_2.png', 3, 19, 'INNOVALED', '55.00', '1', '1', '87-ficha.pdf', '.', '', '1', 0),
(88, 'TOTEM (VARIADADES)', 'TOTEM-VARIADADES', '88-imagen_1.png', '88-imagen_2.png', 3, 20, 'INNOVALED', '1542.00', '1', '1', '88-ficha.pdf', '.', '', '1', 0),
(89, 'VIDEOWALL', 'VIDEOWALL', '89-imagen_1.png', '89-imagen_2.png', 3, 21, 'INNOVALED', '2636.00', '1', '1', '89-ficha.pdf', '.', '', '1', 0),
(90, 'ALARMA DE INCENDIO', 'ALARMA-DE-INCENDIO', '90-imagen_1.png', '90-imagen_2.png', 4, 22, 'INNOVALED', '21.14', '1', '1', '90-ficha.pdf', '.', '', '1', 0),
(91, 'SIRENA DE ALARMA', 'SIRENA-DE-ALARMA', '91-imagen_1.png', '91-imagen_2.png', 4, 23, 'INNOVALED', '42.28', '1', '1', '91-ficha.pdf', '.', '', '1', 0),
(92, 'ARLENE', 'ARLENE', '92-imagen_1.png', '92-imagen_2.png', 4, 23, 'NEWLEVEL', '10.00', '1', '1', '92-ficha.pdf', '.', '', '1', 0),
(95, 'RICARDO', 'RICARDO', '95-imagen_1.png', '95-imagen_2.png', 1, 1, 'TEAYUDO', '100.00', '1', '1', '95-ficha.pdf', '.', '', '1', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_dato`
--

CREATE TABLE IF NOT EXISTS `producto_dato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `producto_id` int(11) NOT NULL,
  `dato` varchar(50) NOT NULL DEFAULT '',
  `valor` varchar(100) NOT NULL DEFAULT '',
  `orden` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='latin1_swedish_ci' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `is_super` varchar(45) NOT NULL DEFAULT '0',
  `status` varchar(45) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `is_super`, `status`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '1', '1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
