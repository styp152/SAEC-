-- phpMyAdmin SQL Dump
-- version 3.3.2deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2011 a las 10:51:23
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `Articulo`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulo_Factura`
--

CREATE TABLE IF NOT EXISTS `Articulo_Factura` (
  `ArticuloId` int(11) NOT NULL,
  `FacturaCodigo` int(11) NOT NULL,
  `Cantidad_Vendida` int(11) NOT NULL,
  KEY `ArticuloId` (`ArticuloId`,`FacturaCodigo`),
  KEY `FacturaCodigo` (`FacturaCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `Articulo_Factura`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Articulo_Presupuesto`
--

CREATE TABLE IF NOT EXISTS `Articulo_Presupuesto` (
  `ArticuloId` int(11) NOT NULL,
  `PresupuestoCodigo` int(11) NOT NULL,
  `Cantidad_Pedida` int(11) NOT NULL,
  KEY `ArticuloId` (`ArticuloId`,`PresupuestoCodigo`),
  KEY `PresupuestoCodigo` (`PresupuestoCodigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `Articulo_Presupuesto`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asistencia`
--

CREATE TABLE IF NOT EXISTS `Asistencia` (
  `Id` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora_Entrada` time NOT NULL,
  `mHora_Entrada` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Hora_Salida` time NOT NULL,
  `mHora_Salida` varchar(2) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `Cedula_Vendedor` int(11) NOT NULL,
  `Nota` varchar(255) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Id`),
  KEY `Cedula_Vendedor` (`Cedula_Vendedor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `Asistencia`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Cliente`
--

CREATE TABLE IF NOT EXISTS `Cliente` (
  `Cedula` int(11) NOT NULL,
  `Nacionalidad` varchar(1) COLLATE utf8_spanish2_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `Telefono` varchar(11) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `Direccion` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Correo` varchar(100) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcar la base de datos para la tabla `Cliente`
--


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
  `nTipo_Pago` bigint(20) NOT NULL,
  `Detalles` varchar(255) COLLATE utf8_spanish2_ci NOT NULL,
  `Estado` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`Codigo`),
  KEY `Cedula_Clientes` (`Cedula_Clientes`,`Cedula_Vendedor`),
  KEY `Cedula_Vendedor` (`Cedula_Vendedor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `Factura`
--


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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `Presupuesto`
--


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


--
-- Filtros para las tablas descargadas (dump)
--

--
-- Filtros para la tabla `Articulo_Factura`
--
ALTER TABLE `Articulo_Factura`
  ADD CONSTRAINT `Articulo_Factura_ibfk_2` FOREIGN KEY (`FacturaCodigo`) REFERENCES `Factura` (`Codigo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Articulo_Factura_ibfk_1` FOREIGN KEY (`ArticuloId`) REFERENCES `Articulo` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `Articulo_Presupuesto`
--
ALTER TABLE `Articulo_Presupuesto`
  ADD CONSTRAINT `Articulo_Presupuesto_ibfk_2` FOREIGN KEY (`PresupuestoCodigo`) REFERENCES `Presupuesto` (`Codigo`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Articulo_Presupuesto_ibfk_1` FOREIGN KEY (`ArticuloId`) REFERENCES `Articulo` (`Id`) ON DELETE NO ACTION ON UPDATE CASCADE;

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
  ADD CONSTRAINT `Presupuesto_ibfk_2` FOREIGN KEY (`Cedula_Vendedor`) REFERENCES `Vendedor` (`Cedula`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `Presupuesto_ibfk_1` FOREIGN KEY (`Cedula_Cliente`) REFERENCES `Cliente` (`Cedula`) ON DELETE NO ACTION ON UPDATE CASCADE;
