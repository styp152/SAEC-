-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-05-2011 a las 12:59:21
-- Versión del servidor: 5.1.41
-- Versión de PHP: 5.3.2-1ubuntu4.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `creativomerida_prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulo`
--

CREATE TABLE IF NOT EXISTS `Articulo` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Precio` float NOT NULL,
  `Descripcion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Cantidad` int(11) NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=43 ;

--
-- Volcar la base de datos para la tabla `Articulo`
--

INSERT INTO `Articulo` (`Id`, `Nombre`, `Precio`, `Descripcion`, `Cantidad`) VALUES
(1, 'Tazas', 100, 'alkdalskdjalsdm', 15),
(2, 'Camisa MD', 85, '        Camisa Talla M para Dama      ', 7),
(3, 'Camisa LD', 85, '        Camisa Talla L para Dama      ', 14),
(5, 'Camisa XLD', 85, 'Camisa Talla XL para Dama      ', 16),
(6, 'Camisa SD', 85, 'Camisa Talla S para Dama', 10),
(9, 'dalkdjasÃ±kdjalÃ±', 2, 'Ã±sjmsÃ±aldaÃ±s', 2),
(10, 'lkasjdlkas', 2, 'Ã±lkasjdlkasm', 2),
(11, 'laksdjlksjd', 2, 'lkjasldkajlsdk', 2),
(12, 'saldjaslkdjas', 2, 'kajsldkjasldka', 2),
(13, 'ksjhdksahd', 2, 'jasdlashdlas', 2),
(14, 'kasklasj', 8, 'laskjdasdjlkasjd', 8),
(15, 'pasjdasjd', 1, 'adnlaskdnalsd', 0),
(16, 'Ã±alskdaksd', 1, 'klsndlkansdlkasnd', 2),
(17, 'lkanldjkasl', 1, 'kjasldkjsldkj', 1),
(18, 'poskjdpojasdpj', 111, 'lksdjlsakdjlasdkj', 2),
(19, 'klasjdlksdjlaskjd', 0, 'laskdalskdnlasdn', 0),
(21, 'oijaodjoasidj', 9, 'saksdjsadjs', 9),
(22, 'lkjlkjlkj', 1, 'lksdnlakdnslsaknd', 2),
(23, '89798798', 8, 'ljkhasdjashdkjh', 8),
(24, 'jasjdjasdj', 7, 'amsdaksjdhsajd', 7),
(26, 'siajdasoijdoasijd', 7, 'laksjdlaskjdlaskjd', 8),
(27, 'sdaushdash', 1, 'asjdalsdjlaskdj', 2),
(28, 'osidjasoidj', 8, 'lksadnlaskdjsal', 2),
(30, 'uisdjasjd', 7, 'lskdjalsdjlaskjd', 7),
(31, 'ljkdslasjkd', 7, 'ljajdlaskdjaslkdj', 16),
(32, 'TÃ¡zas', 2, 'lkdalsdkml', 2),
(38, '                          ', 7, '79', 7),
(39, '                              ', 8, '8', 8),
(40, '           ', 7, '7', 7),
(41, '            ', 7, 'klajsdkjsad      Aqui Agregar una PequeÃ±a Descripcion del Articulo\r\n      ', 7),
(42, 'prueba', 5, 'kjasdhkasjdksajd', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulo_Factura`
--

CREATE TABLE IF NOT EXISTS `Articulo_Factura` (
  `ArticuloId` int(11) NOT NULL,
  `FacturaCodigo` int(11) NOT NULL,
  `Cantidad_Vendida` int(11) NOT NULL,
  `Precio_Venta` float NOT NULL,
  KEY `ArticuloId` (`ArticuloId`,`FacturaCodigo`),
  KEY `FacturaCodigo` (`FacturaCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `Articulo_Factura`
--

INSERT INTO `Articulo_Factura` (`ArticuloId`, `FacturaCodigo`, `Cantidad_Vendida`, `Precio_Venta`) VALUES
(32, 1, 10, 100),
(32, 3, 10, 100),
(32, 1, 2, 2),
(1, 1, 5, 100),
(5, 1, 5, 85),
(1, 1, 10, 100),
(6, 1, 6, 85),
(1, 1, 10, 100),
(6, 1, 6, 85),
(1, 1, 10, 100),
(6, 1, 6, 85),
(1, 1, 10, 100),
(6, 1, 6, 85),
(1, 1, 10, 100),
(6, 1, 6, 85),
(1, 1, 10, 100),
(6, 1, 6, 85),
(1, 1, 10, 100),
(6, 1, 6, 85),
(1, 1, 10, 100),
(6, 1, 6, 85),
(1, 1, 10, 100),
(1, 1, 10, 100),
(1, 1, 10, 100),
(1, 1, 10, 100),
(1, 1, 10, 100),
(1, 1, 100, 100),
(3, 27, 10, 85),
(1, 27, 19, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulo_Presupuesto`
--

CREATE TABLE IF NOT EXISTS `Articulo_Presupuesto` (
  `ArticuloId` int(11) NOT NULL,
  `PresupuestoCodigo` int(11) NOT NULL,
  `Cantidad_Pedida` int(11) NOT NULL,
  `Precio_Presupuesto` float NOT NULL,
  KEY `ArticuloId` (`ArticuloId`,`PresupuestoCodigo`),
  KEY `PresupuestoCodigo` (`PresupuestoCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `Articulo_Presupuesto`
--

INSERT INTO `Articulo_Presupuesto` (`ArticuloId`, `PresupuestoCodigo`, `Cantidad_Pedida`, `Precio_Presupuesto`) VALUES
(1, 10, 10, 100),
(1, 10, 10, 100);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asistencia`
--

CREATE TABLE IF NOT EXISTS `Asistencia` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `Fecha` date NOT NULL,
  `Hora_Entrada` time NOT NULL,
  `mHora_Entrada` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Hora_Salida` time NOT NULL,
  `mHora_Salida` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Cedula_Vendedor` int(11) NOT NULL,
  `Nota` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Cedula_Vendedor` (`Cedula_Vendedor`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcar la base de datos para la tabla `Asistencia`
--

INSERT INTO `Asistencia` (`Id`, `Fecha`, `Hora_Entrada`, `mHora_Entrada`, `Hora_Salida`, `mHora_Salida`, `Cedula_Vendedor`, `Nota`) VALUES
(1, '2011-05-24', '21:32:23', 'PM', '00:00:00', '', 18964136, ''),
(2, '2011-05-25', '12:56:32', 'AM', '01:12:25', 'AM', 18964136, ''),
(3, '2011-05-25', '01:12:51', 'AM', '00:00:00', '', 18964136, ''),
(4, '2011-05-25', '19:50:17', 'PM', '19:50:26', 'PM', 8074725, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE IF NOT EXISTS `Cliente` (
  `Cedula` int(11) NOT NULL,
  `Nacionalidad` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `Cliente`
--

INSERT INTO `Cliente` (`Cedula`, `Nacionalidad`, `Nombre`, `Telefono`, `Direccion`, `Correo`) VALUES
(18964136, '', 'Typson Sanchez Meza', '02742442424', 'Av. 1 Hoyada de Milla, Pasaje MuÃ±oz #1-54', 'styp152@gmail.com'),
(19096583, '', 'Anna Lezama', '02742442424', 'Av. 1 Hoyada de Milla, Pasaje MuÃ±oz #1-54', 'annitap4@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Factura`
--

CREATE TABLE IF NOT EXISTS `Factura` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula_Clientes` int(11) NOT NULL,
  `Cedula_Vendedor` int(11) NOT NULL,
  `Fecha_Registro` date NOT NULL,
  `Fecha_Entrega` date NOT NULL,
  `Tipo_Pago` varchar(30) COLLATE utf8_spanish2_ci NOT NULL,
  `nTipo_Pago` varchar(20) COLLATE utf8_spanish2_ci NOT NULL,
  `Detalles` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Cedula_Clientes` (`Cedula_Clientes`,`Cedula_Vendedor`),
  KEY `Cedula_Vendedor` (`Cedula_Vendedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=28 ;

--
-- Volcar la base de datos para la tabla `Factura`
--

INSERT INTO `Factura` (`Codigo`, `Cedula_Clientes`, `Cedula_Vendedor`, `Fecha_Registro`, `Fecha_Entrega`, `Tipo_Pago`, `nTipo_Pago`, `Detalles`, `Estado`) VALUES
(1, 18964136, 8074725, '2011-05-27', '2011-05-30', '', '0', ' Aqui se agregan los detalles del pedido. ', 'Facturado'),
(3, 18964136, 8074725, '2011-05-27', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(4, 18964136, 8074725, '2011-05-27', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(5, 18964136, 8074725, '2011-05-27', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(6, 18964136, 8074725, '2011-05-27', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(7, 18964136, 8074725, '2011-05-27', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(8, 18964136, 8074725, '2011-05-27', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(9, 18964136, 8074725, '2011-05-27', '2011-05-30', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(10, 18964136, 8074725, '2011-05-27', '2011-05-30', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(11, 18964136, 8074725, '2011-05-27', '2011-05-30', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(12, 18964136, 8074725, '2011-05-28', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(13, 18964136, 8074725, '2011-05-28', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(14, 18964136, 8074725, '2011-05-28', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(15, 18964136, 8074725, '2011-05-28', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(16, 18964136, 8074725, '2011-05-28', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(17, 18964136, 8074725, '2011-05-28', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(18, 18964136, 8074725, '2011-05-28', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(19, 18964136, 8074725, '2011-05-28', '2011-05-31', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Anulada'),
(20, 18964136, 8074725, '2011-05-28', '2011-06-01', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Facturado'),
(21, 18964136, 8074725, '2011-05-28', '2011-06-01', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Facturado'),
(22, 18964136, 8074725, '2011-05-28', '2011-06-01', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Facturado'),
(23, 18964136, 8074725, '2011-05-28', '2011-06-01', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Facturado'),
(24, 18964136, 8074725, '2011-05-28', '2011-06-01', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Facturado'),
(25, 18964136, 8074725, '2011-05-28', '0000-00-00', '', '0', '        Aqui se agregan los detalles del pedido.\r\n        ', 'Facturado'),
(26, 18964136, 8074725, '2011-05-28', '2011-05-31', 'Efectivo', '0', 'Prueba', 'Facturado'),
(27, 18964136, 8074725, '2011-05-28', '2011-05-30', 'Deposito', '', 'prueba', 'Facturado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Presupuesto`
--

CREATE TABLE IF NOT EXISTS `Presupuesto` (
  `Codigo` int(11) NOT NULL AUTO_INCREMENT,
  `Cedula_Cliente` int(11) NOT NULL,
  `Cedula_Vendedor` int(11) NOT NULL,
  `Fecha_Registro` date NOT NULL,
  `Detalles` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Cedula_Cliente` (`Cedula_Cliente`,`Cedula_Vendedor`),
  KEY `Cedula_Vendedor` (`Cedula_Vendedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=12 ;

--
-- Volcar la base de datos para la tabla `Presupuesto`
--

INSERT INTO `Presupuesto` (`Codigo`, `Cedula_Cliente`, `Cedula_Vendedor`, `Fecha_Registro`, `Detalles`) VALUES
(10, 18964136, 8074725, '2011-05-29', '        Aqui se agregan los detalles del pedido.\r\n        '),
(11, 18964136, 8074725, '2011-05-29', '        Aqui se agregan los detalles del pedido.\r\n        ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Vendedor`
--

CREATE TABLE IF NOT EXISTS `Vendedor` (
  `Cedula` int(11) NOT NULL,
  `Nombre` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `Apellido` varchar(32) COLLATE utf8_spanish2_ci NOT NULL,
  `Cargo` varchar(25) COLLATE utf8_spanish2_ci NOT NULL,
  `Nivel` int(1) NOT NULL,
  `Clave` blob NOT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `Vendedor`
--

INSERT INTO `Vendedor` (`Cedula`, `Nombre`, `Apellido`, `Cargo`, `Nivel`, `Clave`) VALUES
(123, '123', '123', 'Asesor de Ventas', 1, 0xc162818f77861534dd28462f59842e81),
(8074725, 'Yudit', 'Sanchez', 'Asesor de Ventas1', 2, 0xd027a9bafc758ffb5b7ee5ac746ebe59),
(18964136, 'Typson', 'Sanchez', 'Asesor de Ventas', 1, 0xaaf8d53eb56a0d4c610cdbd055757a23),
(19096583, 'Anna', 'Lezama', 'Comelon', 2, 0x871543e675a90f6350f00aac47e4c87f);

--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `Articulo_Factura`
--
ALTER TABLE `Articulo_Factura`
  ADD CONSTRAINT `Articulo_Factura_ibfk_1` FOREIGN KEY (`ArticuloId`) REFERENCES `Articulo` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Articulo_Factura_ibfk_2` FOREIGN KEY (`FacturaCodigo`) REFERENCES `Factura` (`Codigo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `Articulo_Presupuesto`
--
ALTER TABLE `Articulo_Presupuesto`
  ADD CONSTRAINT `Articulo_Presupuesto_ibfk_1` FOREIGN KEY (`ArticuloId`) REFERENCES `Articulo` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Articulo_Presupuesto_ibfk_2` FOREIGN KEY (`PresupuestoCodigo`) REFERENCES `Presupuesto` (`Codigo`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `Factura`
--
ALTER TABLE `Factura`
  ADD CONSTRAINT `Factura_ibfk_1` FOREIGN KEY (`Cedula_Clientes`) REFERENCES `Cliente` (`Cedula`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Factura_ibfk_2` FOREIGN KEY (`Cedula_Vendedor`) REFERENCES `Vendedor` (`Cedula`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `Presupuesto`
--
ALTER TABLE `Presupuesto`
  ADD CONSTRAINT `Presupuesto_ibfk_1` FOREIGN KEY (`Cedula_Cliente`) REFERENCES `Cliente` (`Cedula`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Presupuesto_ibfk_2` FOREIGN KEY (`Cedula_Vendedor`) REFERENCES `Vendedor` (`Cedula`) ON DELETE NO ACTION ON UPDATE CASCADE;
