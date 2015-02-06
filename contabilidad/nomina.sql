-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-07-2012 a las 21:49:38
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `xtrasport_nomina`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `concepto_profi`
--

CREATE TABLE IF NOT EXISTS `concepto_profi` (
  `cod_con` varchar(5) NOT NULL,
  `descrip` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_con`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_acceso`
--

CREATE TABLE IF NOT EXISTS `control_acceso` (
  `cod_compania` varchar(4) NOT NULL,
  `cod_nomina` varchar(4) NOT NULL,
  `cod_trabajador` varchar(10) NOT NULL,
  `fecha` date NOT NULL,
  `concepto` varchar(5) NOT NULL,
  `valor` varchar(12) NOT NULL,
  `cod_enca` int(11) NOT NULL,
  `conse` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`conse`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `control_acceso`
--

INSERT INTO `control_acceso` (`cod_compania`, `cod_nomina`, `cod_trabajador`, `fecha`, `concepto`, `valor`, `cod_enca`, `conse`) VALUES
('1', '3', '1', '0000-00-00', '102', '13', 1, 1),
('1', '3', '1', '0000-00-00', '103', '0', 1, 2),
('1', '3', '1', '0000-00-00', '104', '0', 1, 3),
('1', '3', '1', '0000-00-00', '105', '0', 1, 4),
('1', '3', '1', '0000-00-00', '206', '2', 1, 5),
('1', '3', '2', '0000-00-00', '102', '12', 1, 6),
('1', '3', '2', '0000-00-00', '103', '0', 1, 7),
('1', '3', '2', '0000-00-00', '104', '0', 1, 8),
('1', '3', '2', '0000-00-00', '105', '0', 1, 9),
('1', '3', '2', '0000-00-00', '206', '3', 1, 10),
('1', '3', '3', '0000-00-00', '102', '0', 1, 11),
('1', '3', '3', '0000-00-00', '103', '0', 1, 12),
('1', '3', '3', '0000-00-00', '104', '0', 1, 13),
('1', '3', '3', '0000-00-00', '105', '0', 1, 14),
('1', '3', '3', '0000-00-00', '206', '15', 1, 15),
('1', '3', '4', '0000-00-00', '102', '12', 1, 16),
('1', '3', '4', '0000-00-00', '103', '0', 1, 17),
('1', '3', '4', '0000-00-00', '104', '0', 1, 18),
('1', '3', '4', '0000-00-00', '105', '0', 1, 19),
('1', '3', '4', '0000-00-00', '206', '3', 1, 20),
('1', '3', '5', '0000-00-00', '102', '12', 1, 21),
('1', '3', '5', '0000-00-00', '103', '0', 1, 22),
('1', '3', '5', '0000-00-00', '104', '0', 1, 23),
('1', '3', '5', '0000-00-00', '105', '0', 1, 24),
('1', '3', '5', '0000-00-00', '206', '3', 1, 25),
('1', '3', '6', '0000-00-00', '102', '13', 1, 26),
('1', '3', '6', '0000-00-00', '103', '0', 1, 27),
('1', '3', '6', '0000-00-00', '104', '0', 1, 28),
('1', '3', '6', '0000-00-00', '105', '0', 1, 29),
('1', '3', '6', '0000-00-00', '206', '2', 1, 30),
('1', '3', '7', '0000-00-00', '102', '11', 1, 31),
('1', '3', '7', '0000-00-00', '103', '0', 1, 32),
('1', '3', '7', '0000-00-00', '104', '0', 1, 33),
('1', '3', '7', '0000-00-00', '105', '0', 1, 34),
('1', '3', '7', '0000-00-00', '206', '4', 1, 35),
('1', '3', '8', '0000-00-00', '102', '11', 1, 36),
('1', '3', '8', '0000-00-00', '103', '0', 1, 37),
('1', '3', '8', '0000-00-00', '104', '0', 1, 38),
('1', '3', '8', '0000-00-00', '105', '0', 1, 39),
('1', '3', '8', '0000-00-00', '206', '4', 1, 40),
('1', '3', '9', '0000-00-00', '102', '1', 1, 41),
('1', '3', '9', '0000-00-00', '103', '0', 1, 42),
('1', '3', '9', '0000-00-00', '104', '0', 1, 43),
('1', '3', '9', '0000-00-00', '105', '0', 1, 44),
('1', '3', '9', '0000-00-00', '206', '14', 1, 45),
('1', '3', '10', '0000-00-00', '102', '0', 1, 46),
('1', '3', '10', '0000-00-00', '103', '0', 1, 47),
('1', '3', '10', '0000-00-00', '104', '0', 1, 48),
('1', '3', '10', '0000-00-00', '105', '0', 1, 49),
('1', '3', '10', '0000-00-00', '206', '15', 1, 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_encabezado`
--

CREATE TABLE IF NOT EXISTS `control_encabezado` (
  `cod_enca` int(11) NOT NULL AUTO_INCREMENT,
  `fecha_reg` date NOT NULL,
  `fecha_ini` date NOT NULL,
  `fecha_fin` date NOT NULL,
  PRIMARY KEY (`cod_enca`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `control_encabezado`
--

INSERT INTO `control_encabezado` (`cod_enca`, `fecha_reg`, `fecha_ini`, `fecha_fin`) VALUES
(1, '2012-06-30', '2012-06-16', '2012-06-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE IF NOT EXISTS `cuenta` (
  `cedula` int(10) NOT NULL,
  `cuenta` varchar(15) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconcue`
--

CREATE TABLE IF NOT EXISTS `cwconcue` (
  `Cuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nivel` int(11) NOT NULL DEFAULT '0',
  `Tipo` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `Descrip` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Bancos` int(11) NOT NULL DEFAULT '0',
  `MonPre` float NOT NULL DEFAULT '0',
  `MonModif` float NOT NULL DEFAULT '0',
  `FechaNuevo` date NOT NULL DEFAULT '0000-00-00',
  `CtaNueva` int(11) NOT NULL DEFAULT '0',
  `Auxunico` varchar(4) COLLATE utf8_spanish_ci NOT NULL,
  `Monetaria` int(11) NOT NULL DEFAULT '0',
  `Ctaajuste` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Marca` int(11) NOT NULL DEFAULT '0',
  `MonPreu` float NOT NULL DEFAULT '0',
  `MonModify` float NOT NULL DEFAULT '0',
  `Ccostos` int(11) NOT NULL DEFAULT '0',
  `Terceros` int(11) NOT NULL DEFAULT '0',
  `Cuentalt` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Descripalt` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Fiscaltipo` int(11) NOT NULL DEFAULT '0',
  `Tipocosto` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Maestro en Cuentas Contables';

--
-- Volcado de datos para la tabla `cwconcue`
--

INSERT INTO `cwconcue` (`Cuenta`, `Nivel`, `Tipo`, `Descrip`, `Bancos`, `MonPre`, `MonModif`, `FechaNuevo`, `CtaNueva`, `Auxunico`, `Monetaria`, `Ctaajuste`, `Marca`, `MonPreu`, `MonModify`, `Ccostos`, `Terceros`, `Cuentalt`, `Descripalt`, `Fiscaltipo`, `Tipocosto`) VALUES
('1.', 1, 'T', 'ACTIVO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.', 2, 'T', 'ACTIVO CIRCULANTE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.', 3, 'T', 'ACTIVO DISPONIBLE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.', 4, 'T', 'CAJA Y BANCOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.01.', 5, 'T', 'CAJA CHICA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.02.', 5, 'T', 'BANCOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.02.01.', 6, 'T', 'BANCOS PUBLICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.02.01.001.', 7, 'P', 'Banco Bicentenario Gasto de Funcionamiento', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 0),
('1.1.1.01.02.01.002.', 7, 'P', 'Banco Bicentenario Comercializacion', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.02.01.003.', 7, 'P', 'Banco del Tesoro Convenio Cuba-Venezuela', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.02.01.004.', 7, 'P', 'Banco del Tesoro', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 0, '', '', 0, 0),
('1.1.1.01.02.01.005.', 7, 'P', 'Banco del Tesoro FAOV-BANAVIH', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 0),
('1.1.1.01.02.01.006.', 7, 'P', 'FIDEICOMISO BANDES 065301', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.02.01.007.', 7, 'P', 'FIDEICOMISO BANCO DEL TESORO COMPROMISO DE RESPONSABILIDAD SOCIAL C.R.S.', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.02.01.008.', 7, 'P', 'FONDO DE CONTINGENCIA EN DOLLARES EXPRESADOS EN BOLIVARES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.02.02.', 6, 'T', 'BANCOS PRIVADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.1.01.02.02.001.', 7, 'P', 'Banco provincial', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 0),
('1.1.1.01.02.02.002.', 7, 'P', 'Banco CaronÃ­', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.2.', 3, 'T', 'ACTIVO EXIGIBLE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.2.03.', 4, 'T', 'CUENTAS POR COBRAR A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 0),
('1.1.2.03.01.', 5, 'T', 'Cuentas Comreciales por Cobrar a Corto Plazo', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.2.03.01.01.', 6, 'P', 'Cuentas por cobrar Cliente', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.2.03.01.03.', 6, 'P', 'Otras cuentas por cobrar a corto plazo', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.2.03.02.', 5, 'T', 'DEUDAS DE CORTO PLAZO POR RENDIR DE FONDOS EN ANTICIPO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.2.04.', 4, 'P', 'EFECTOS COMERCIALES POR COBRAR A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.2.05.', 4, 'T', 'FONDO DE AVANCE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.2.06.', 4, 'P', 'FONDO DE ANTICIPO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.2.07.', 4, 'P', 'FONDOS DE BIENES EN FIDEICOMISO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.2.08.', 4, 'P', 'ANTICIPOS A PROVEEDORES A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.3.', 3, 'T', 'ACTIVO REALIZABLE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.3.01.', 4, 'P', 'INVENTARIO DE MATERIA PRIMA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.3.02.', 4, 'P', 'INVENTARIO DE PRODUCTOS TERMINADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.3.03.', 4, 'P', 'INVENTARIO DE PRODUCTOS EN PROCESOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.3.04.', 4, 'P', 'INVENTARIO DE MERCANCÃAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.3.05.', 4, 'P', 'INVENTARIO DE MATERIALES Y SUMINISTROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.9.', 3, 'T', 'OTROS ACTIVOS CIRCULANTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.1.9.99.', 4, 'P', 'OTROS ACTIVOS CIRCULANTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.', 2, 'T', 'ACTIVO NO CIRCULANTE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.', 3, 'T', 'ACTIVOS FIJOS (PROPIEDAD, PLANTA Y EQUIPOS)', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.', 4, 'T', 'BIENES DE USO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.01.', 5, 'P', 'EDIFICIOS E INSTALACIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.02.', 5, 'T', 'MAQUINARIAS Y DEMAS  EQUIPOS DE CONSTRUCCION, CAMPO, INDUSTRIA Y TALLER', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.02.01.', 6, 'P', 'MAQUINARIAS Y DEMAS EQUIPOS DE CONSTRUCCION Y DE MANTENIMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.02.02.', 6, 'P', 'MAQUINARIAS Y DEMAS EQUIPOS PARA MANTENIMIENTO DE AUTOMOTORES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.02.03.', 6, 'P', 'MAQUINARIAS Y EQUIPOS DE INDUSTRIA Y TALLER', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.02.04.', 6, 'P', 'EQUIPOS DE ENZEÃ‘ANZA, DEPORTE Y RECREACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.02.99.', 6, 'P', 'OTRAS MAQUINARIAS Y DEMAS EQUIPOS DE CONSTRUCCION, CAMPO INDUSTRIA Y TALLER', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.03.', 5, 'P', 'VEHICULOS AUTOMOTORES TERRESTRES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.04.', 5, 'T', 'EQUIPOS DE COMUNICACIONES Y SEÃ‘ALAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.04.01.', 6, 'P', 'EQUIPOS DE TELECOMUNICACIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.04.02.', 6, 'P', 'EQUIPOS DE SEÃ‘ALAMIENTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.05.', 5, 'T', 'EQUIPOS MEDICOS QUIRURGICOS, DENTALES Y VETERINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.05.01.', 6, 'P', 'EQUIPOS MEDICO-QUIRURGICOS, DENTALES Y VETERINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.05.99.', 6, 'P', 'OTROS EQUIPOS MEDICO-QUIRURGICOS, DENTALES Y VETERINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.06.', 5, 'T', 'EQUIPOS CIENTIFICO,  RELIGIOSOS DE ENSEÃ‘ANZA Y RECREACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.06.01.', 6, 'P', 'EQUIPOS CIENTIFICOS Y DE LABORATORIO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.06.02.', 6, 'P', 'EQUIPOS DE ENSEÃ‘ANZA, DEPORTE Y RECREACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.06.03.', 6, 'P', 'INSTRUMENTOS MUSICALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.06.99.', 6, 'P', 'OTROS EQUIPOS CIENTIFICO, RELIGIOSOS, DE ENSEÃ‘ANZA Y RECREACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.08.', 5, 'T', 'MAQUINAS, MUEBLES Y DEMAS EQUIPOS DE OFICINA Y DE ALOJAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.08.01.', 6, 'P', 'MOBILIARIO Y EQUIPOS DE OFICINA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.08.02.', 6, 'P', 'MOBILIARIO Y EQUIPOS DE ALOJAMIENTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.08.99.', 6, 'P', 'OTRAS MAQUINAS, MUEBLES Y EQUIPOS DE OFICINA Y DE ALOJAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.09.', 5, 'P', 'EQUIPOS DE COMPUTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.01.99.', 5, 'P', 'OTROS BIENES DE USO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.02.', 4, 'P', 'TIERRAS Y TERRENOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.03.', 4, 'T', 'CONSTRUCCION EN PROCESO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.03.01.', 5, 'P', 'CONSTRUCCION EN PROCESO DE BIENES DEL DOMINIO PUBLICO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.1.03.02.', 5, 'P', 'CONSTRUCCION EN PROCESO DE BIENES DEL DOMINIO PRIVADO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.2.', 3, 'T', 'ACTIVO INTANGIBLE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.2.01.', 4, 'P', 'GASTOS DE ORGANIZACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.2.02.', 4, 'P', 'PAQUETES Y PROGRAMAS DE COMPUTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.2.03.', 4, 'P', 'ESTUDIOS Y PROYECTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.2.04.', 4, 'P', 'GASTOS PREOPERACIONALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.2.99.', 4, 'P', 'OTROS ACTIVOS INTANGIBLES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.3.', 3, 'T', 'ACTIVOS  DIFERIDO A MEDIANO Y LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.3.01.', 4, 'T', 'GASTOS PAGADOS POR ANTICIPADO A LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.3.01.01.', 5, 'P', 'IMPUESTOS PAGADOS POR ANTICIPADO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.3.01.99.', 5, 'P', 'OTROS PAGADOS POR ANTICIPADO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.3.02.', 4, 'T', 'DEPOSITO OTORGADO EN GARANTIA A MEDIANO Y LARGO  PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('1.2.4.', 3, 'P', 'OTROS ACTIVOS NO  CIRCULANTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.', 1, 'T', 'PASIVO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.', 2, 'T', 'PASIVO CIRCULANTE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.', 3, 'T', 'CUENTAS Y EFECTOS POR PAGAR A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.01.', 4, 'T', 'GASTOS DE PERSONAL POR PAGAR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.01.01.', 5, 'P', 'SUELDOS, SALARIOS Y OTRAS REMUNERACIONES POR PAGAR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.01.02.', 5, 'P', 'COMPLEMENTOS DE SUELDOS Y SALARIOS POR PAGAR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.01.03.', 5, 'P', 'ASISTENCIA SOCIOECONOMICA POR PAGAR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.01.04.', 5, 'P', 'PRESTACIONES SOCIALES Y OTRAS INDEMNIZACIONES POR PAGAR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.01.05.', 5, 'P', 'CAPACITACION Y ADIESTRAMIENTO POR PAGAR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.01.99.', 5, 'P', 'OTROS GASTOS DE PERSONAL POR PAGAR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.02.', 4, 'T', 'APORTES PATRONALES Y RETENCIONES LABORALES POR PAGAR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.02.01.', 5, 'T', 'APORTES PATRONALES Y RETENCIONES LABORALES POR PAGAR AL IVSS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.02.01.01.', 6, 'T', 'Aportes Patronales y Retenciones Laborales al SSO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 1),
('2.1.1.02.01.01.001.', 7, 'P', 'Aportes patronales y retenciones laborales por pagar al sso a empleados', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.01.01.003.', 7, 'P', 'Aportes patronales y retenciones laborales por  pagar al sso a obreros', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.02.', 5, 'T', 'APORTES PATRONALES Y RETENCIONES LABORALES POR PAGAR AL FONDO DE SEGURO DE PARO FORZOSO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.02.02.01.', 6, 'T', 'Aportes Patronales y Retenciones Laborales Por Pagar al SPF', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.02.01.001.', 7, 'P', 'Aportes patronales y retenciones laborales por pagar al spf a empleado', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.02.01.002.', 7, 'P', 'Aportes patronales y retenciones laborales por pagar al spf a obrero', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.03.', 5, 'T', 'APORTES PATRONALES Y RETENCIONES LABORALES POR PAGAR AL FONDO DE AHORRO HABITACIONAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.02.03.01.', 6, 'T', 'Aportes Patronales y Retenciones Laborales Por Pagar a LPH', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.03.01.002.', 7, 'P', 'Aportes patronales y retenciones laborales por pagar al lph a empleado', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.03.01.003.', 7, 'P', 'Aportes patronales y retenciones laborales por pagar al lph a obrero', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.04.', 5, 'P', 'APORTES PATRONALES Y RETENCIONES LABORALES POR PAGAR AL SEGURO DE VIDA, ACCIDENTES PERSONALES, HOSPITALIZACION, CIRUGIA, MATERNIDAD (HCM) Y GASTOS FUNERARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.02.05.', 5, 'T', 'APORTES PATRONALES Y RETENCIONES LABORALES POR PAGAR CAJA DE AHORRO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.02.05.01.', 6, 'T', 'Aportes Patronales y Retenciones Laborales por Pagar a la Caja de Ahorros', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 1, 1),
('2.1.1.02.05.01.001.', 7, 'P', 'Aportes patronales y retenciones laborales por pagar a la caja de ahorros a empleados', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.05.01.003.', 7, 'P', 'Aportes patronales y retenciones laborales por pagar a la caja de ahorros a obreros', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.06.', 5, 'T', 'APORTES PATRONALES Y RETENCIONES LABORALES POR PAGAR AL INSTITUTO NACIONAL DE COOPERACION EDUCATIVA (INCE)', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.02.06.01.', 6, 'T', 'APORTES PATRONALES Y RETENCIONES LABORALES POR PAGAR AL INSTITUTO NACIONAL DE COOPERACION EDUCATIVA SOCIALISTA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.06.01.001.', 7, 'P', 'APORTES PATRONALES Y RETENCIONES LABORALES POR PAGAR AL INSTITUTO NACIONAL DE COOPERACION EDUCATIVA (INCES)', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.1.02.99.', 5, 'P', 'OTROS APORTES PATRONALES Y RETENCIONES LABORALES POR PAGAR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.03.', 4, 'T', 'CUENTAS POR PAGAR A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.03.01.', 5, 'P', 'CUENTAS POR PAGAR A PROVEEDORES A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.03.02.', 5, 'P', 'OBLIGACIONES DE EJERCICIOS ANTERIORES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.03.03.', 5, 'P', 'OTRAS CUENTAS POR PAGAR  A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.04.', 4, 'T', 'EFECTOS POR PAGAR A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.04.01.', 5, 'P', 'EFECTOS POR PAGAR A PROVEEDORES A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.04.02.', 5, 'P', 'OTROS EFECTOS POR PAGAR A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.05.', 4, 'T', 'INTERESES POR PAGAR A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.05.01.', 5, 'P', 'INTERESES INTERNOS POR PAGAR A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.1.05.02.', 5, 'P', 'INTERESES EXTERNOS POR PAGAR A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.2.', 3, 'T', 'PASIVOS DIFERIDOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.2.01.', 4, 'T', 'PASIVOS DIFERIDOS A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.2.01.01.', 5, 'P', 'RENTAS DIFERIDAS POR RECAUDAR A CORTO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.3.', 3, 'T', 'FONDOS DE TERCEROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.3.01.', 4, 'P', 'DEPOSITOS RECIBIDOS EN GARANTIA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.3.02.', 4, 'T', 'OTROS FONDOS DE TERCEROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.3.02.01.', 5, 'T', 'RETENCIONES  DE IMPUESTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 1),
('2.1.3.02.01.01.', 6, 'T', 'Retenciones I.V.A. ', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.3.02.01.01.001.', 7, 'P', 'Retenciones I.V.A. Credito', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.3.02.01.01.002.', 7, 'P', 'Retenciones I.V.A. Credito', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.3.02.01.02.', 6, 'P', 'RETENCIONES DE IMPUESTO MUNICIPALES 1 POR 1000', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.3.02.01.03.', 6, 'P', 'RETENCION  COMPROMISO DE RESPONSABILIDAD SOCIAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.3.02.02.', 5, 'T', 'RETENCIONES ISLR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.3.02.02.01.', 6, 'T', 'Retenciones I.S.L.R.', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 2, 1),
('2.1.9.', 3, 'T', 'OTROS PASIVOS CIRCULANTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.1.9.99.', 4, 'P', 'OTROS PASIVOS CIRCULANTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.', 2, 'T', 'PASIVO NO CIRCULANTE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.1.', 3, 'T', 'CUENTAS Y EFECTOS POR PAGAR A MEDIANO Y LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.1.01.', 4, 'T', 'CUENTAS POR PAGAR A MEDIANO Y LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.1.01.01.', 5, 'P', 'CUENTAS POR PAGAR A PROVEEDORES A MEDIANO Y LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.1.01.02.', 5, 'P', 'CUENTAS POR PAGAR A CONTRATISTAS A MEDIANO Y LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.1.01.03.', 5, 'P', 'TRANSFERENCIA REEMBOLSABLE FIDEICOMISO FONDEN A LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 1),
('2.2.1.02.', 4, 'T', 'EFECTOS POR PAGAR A MEDIANO Y LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.1.02.01.', 5, 'P', 'EFECTOS POR PAGAR A PROVEEDORES A MEDIANO Y LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.1.02.02.', 5, 'P', 'EFECTOS POR PAGAR A CONTRATISTAS A MEDIANO Y LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.2.', 3, 'T', 'PASIVOS DIFERIDOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.2.01.', 4, 'T', 'PASIVOS DIFERIDOS A MEDIANO Y LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.2.01.01.', 5, 'P', 'CERTIFICADOS DE REINTEGRO TRIBUTARIO A MEDIANO Y LARGO PLAZO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.2.01.02.', 5, 'P', 'BONOS DE EXPORTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.2.01.03.', 5, 'P', 'BONOS EN DACION DE PAGOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.2.01.04.', 5, 'P', 'INGRESO DIFERIDO (COBRO A SIDOR)', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 1),
('2.2.3.', 3, 'T', 'PROVISIONES ACUMULADAS Y RESERVAS TECNICAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.3.01.', 4, 'T', 'PROVISIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.3.01.01.', 5, 'P', 'PROVISION PARA DESPIDOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.3.01.02.', 5, 'P', 'PROVISION PARA BENEFICIOS SOCIALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.3.02.', 4, 'P', 'RESERVAS TECNICAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.3.99.', 4, 'P', 'OTRAS PROVISIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.', 3, 'T', 'DEPRECIACION Y AMORTIZACION ACUMULADAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.01.', 4, 'T', 'DEPRECIACION ACUMULADA DE BIENES DE USO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.01.01.', 5, 'P', 'DEPRECIACION ACUMULADA DE EDIFICIOS E INSTALACIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.01.02.', 5, 'P', 'DEPRECIACION ACUMULADA DE MAQUINARIA Y DEMAS EQUIPOS DE CONSTRUCCION, CAMPO INDUSTRIA Y TALLER', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.01.03.', 5, 'P', 'DEPRECIACION ACUMULADA DE VEHICULOS AUTOMOTORES TERRESTRES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.01.04.', 5, 'P', 'DEPRECIACION ACUMULADA DE EQUIPOS DE COMUNICACIONES Y SEÃ‘ALAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.01.06.', 5, 'P', 'DEPRECIACION ACUMULADA DE EQUIPOS CIENTIFICOS, RELIGIOSOS, DE ENSEÃ‘ANZA Y RECREACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.01.08.', 5, 'P', 'DEPRECIACION ACUMULADA DE MAQUINAS, MUEBLES Y DEMAS EQUIPOS DE OFICINA Y ALOJAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.01.09.', 5, 'P', 'DEPRECIACION ACUMULADA DE EQUIPOS DE COMPUTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.01.99.', 5, 'P', 'DEPRECIACION ACUMULADA DE OTROS BIENES DE USO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.02.', 4, 'T', 'AMORTIZACION ACUMULADA DE ACTIVOS INTANGIBLES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.02.01.', 5, 'P', 'AMORTIZACION ACUMULADA DE GASTOS DE ORGANIZACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.02.02.', 5, 'P', 'AMORTIZACION ACUMULADA DE PAQUETES Y PROGRAMAS DE COMPUTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.02.03.', 5, 'P', 'AMORTIZACION ACUMULADA DE ESTUDIOS Y PROYECTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.4.02.99.', 5, 'P', 'AMORTIZACION ACUMULADA DE OTROS ACTIVOS INTANGIBLES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.9.', 3, 'T', 'OTROS PASIVO NO CIRCULANTE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('2.2.9.99.', 4, 'P', 'OTROS PASIVOS NO CIRCULANTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.', 1, 'T', 'PATRIMONIO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.', 2, 'T', 'HACIENDA PUBLICA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.1.', 3, 'T', 'CAPITAL FISCAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.1.01.', 4, 'P', 'CAPITAL FISCAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.1.02.', 4, 'P', 'CAPITAL INSTITUCIONAL ', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 1),
('3.1.1.04.', 4, 'P', 'CAPITAL SOCIAL SUSCRITO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 1),
('3.1.2.', 3, 'T', 'TRANSFERENCIAS Y DONACIONES DE CAPITAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.2.01.', 4, 'T', 'TRANSFERENCIAS DE CAPITAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.2.01.01.', 5, 'P', 'TRANSFERENCIAS DE CAPITAL DEL SECTOR PRIVADO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.2.01.02.', 5, 'P', 'TRANSFERENCIAS DE CAPITAL DEL SECTOR PUBLICO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.2.01.03.', 5, 'P', 'TRANSFERENCIAS DE CAPITAL DEL EXTERIOR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.2.02.', 4, 'T', 'DONACIONES DE CAPITAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.2.02.01.', 5, 'P', 'DONACIONES DE CAPITAL INTERNAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.2.02.02.', 5, 'P', 'DONACIONES DE CAPITAL EXTERNAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.3.', 3, 'T', 'AJUSTE POR INFLACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.3.01.', 4, 'P', 'AJUSTE POR INFLACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.4.', 3, 'T', 'RESULTADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.4.01.', 4, 'P', 'RESULTADOS ACUMULADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.1.4.02.', 4, 'P', 'RESULTADOS DEL EJERCICIO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.', 2, 'T', 'PATRIMONIO INSTITUCIONAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.1.', 3, 'T', 'CAPITAL INSTITUCIONAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.1.01.', 4, 'P', 'CAPITAL INSTITUCIONAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.2.', 3, 'T', 'TRANSFERENCIAS, DONACIONES DE CAPITAL Y APORTES POR CAPITALIZAR RECIBIDOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.2.01.', 4, 'T', 'TRANSFERENCIAS DE CAPITAL ', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.2.01.01.', 5, 'P', 'TRANSFERENCIAS DE CAPITAL INTERNAS DEL SECTOR PRIVADO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.2.01.02.', 5, 'P', 'TRANSFERENCIAS DE CAPITAL INTERNA DEL SECTOR PUBLICO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.2.01.03.', 5, 'P', 'TRANSFERENCIAS DE CAPITAL DEL EXTERIOR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.2.02.', 4, 'T', 'DONACIONES DE CAPITAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.2.02.01.', 5, 'P', 'DONACIONES DE CAPITAL INTERNAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.2.02.02.', 5, 'P', 'DONACIONES DE CAPITAL EXTERNAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.3.', 3, 'T', 'RESERVAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.3.01.', 4, 'P', 'RESERVAS LEGALES Y ESTATUTARIAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.4.', 3, 'T', 'AJUSTE POR INFLACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.4.01.', 4, 'P', 'AJUSTE POR INFLACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.5.', 3, 'T', 'RESULTADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.5.01.', 4, 'P', 'RESULTADOS ACUMULADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.5.02.', 4, 'T', 'RESULTADOS DEL EJERCICIO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.2.5.02.01.', 5, 'P', 'RESULTADOS DEL EJERCICIO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('3.3.', 2, 'P', 'PATRIMONIO PUBLICO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.', 1, 'T', 'CUENTAS DE ORDEN', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.', 2, 'T', 'CUENTAS DE ORDEN DEUDORAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.', 3, 'T', 'DIVERSOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.01.', 4, 'P', 'COMPROMISOS FUTUROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.02.', 4, 'T', 'FIANZAS Y GARANTIAS A FAVOR DE LA ENTIDAD', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.02.01.', 5, 'P', 'FONDOS EN GARANTIA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.02.02.', 5, 'P', 'TITULOS Y VALORES RECIBIDOS EN GARANTIA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.02.03.', 5, 'P', 'DOCUMENTOS REPRESENTATIVOS DE FIANZAS A FAVOR DE LA ENTIDAD', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.02.99.', 5, 'P', 'OTRAS GARANTIAS A FAVOR DE LA ENTIDAD', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.03.', 4, 'P', 'MERCANCIA DECOMISADA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.04.', 4, 'P', 'MERCANCIA DECOMISADA PERDIDA O EXTRAVIADA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.05.', 4, 'P', 'INMUEBLES DADOS EN COMODATO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.1.1.06.', 4, 'P', 'FIDEICOMISOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.2.', 2, 'T', 'CUENTAS DE ORDEN ACREEDORAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.2.1.', 3, 'T', 'DIVERSOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.2.1.01.', 4, 'P', 'COMPROMISOS FUTUROS-CONTRA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.2.1.02.', 4, 'P', 'FIANZAS Y GARANTIAS A FAVOR DE LA ENTIDAD-CONTRA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.2.1.03.', 4, 'P', 'MERCANCIA DECOMISADA - CONTRA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.2.1.04.', 4, 'P', 'MERCANCIA DECOMISADA PERDIDA O EXTRAVIADA - CONTRA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.2.1.05.', 4, 'P', 'INMUEBLES DADOS EN COMODATO - CONTRA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('4.2.1.06.', 4, 'P', 'FIDEICOMISOS - CONTRA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.', 1, 'T', 'INGRESOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.', 2, 'T', 'INGRESOS ORDINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.1.', 3, 'T', 'INGRESOS TRIBUTARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.1.01.', 4, 'P', 'IMPUESTOS DIRECTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.1.02.', 4, 'T', 'IMPUESTOS INDIRECTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.2.', 3, 'T', 'INGRESOS NO TRIBUTARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.2.01.', 4, 'T', 'TASAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.2.02.', 4, 'T', 'CONTRIBUCIONES ESPECIALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.3.', 3, 'T', 'APORTES Y CONTRIBUCIONES A LA SEGURIDAD SOCIAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.3.01.', 4, 'T', 'APORTES A LA SEGURIDAD SOCIAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.3.02.', 4, 'P', 'CONTRIBUCIONES A LA SEGURIDAD SOCIAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.', 3, 'T', 'INGRESOS DE OPERACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.01.', 4, 'T', 'VENTA DE BIENES Y SERVICIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.01.01.', 5, 'P', 'INGRESO POR VENTA DE BIENES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.01.02.', 5, 'P', 'INGRESO POR VENTA DE SERVICIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.02.', 4, 'T', 'INTERESES POR DEPOSITOS EN INSTITUCIONES FINANCIERAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.02.01.', 5, 'P', 'INTERESES POR DEPOSITOS A LA VISTA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.02.02.', 5, 'P', 'INTERESES POR DEPOSITOS A PLAZO FIJO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.03.', 4, 'T', 'INGRESOS FINANCIEROS DE INSTITUCIONES FINANCIERAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.03.01.', 5, 'P', 'INGRESOS FINANCIEROS DE INSTITUCIONES FINANCIERAS BANCARIAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.03.02.', 5, 'P', 'INGRESOS FINANCIEROS DE INSTITUCIONES FINANCIERAS NO BANCARIA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.4.09.', 4, 'P', 'OTROS INGRESOS DE OPERACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.5.', 3, 'T', 'TRANSFERENCIAS  Y  DONACIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.5.01.', 4, 'T', 'TRANSFERENCIAS  Y  DONACIONES CORRIENTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.5.01.01.', 5, 'T', 'TRANSFERENCIAS CORRIENTES RECIBIDAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.5.01.01.01.', 6, 'P', 'TRANSFERENCIAS CORRIENTES RECIBIDAS MIBAM ONAPRE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 1),
('5.1.5.01.01.02.', 6, 'P', 'TRANSFERENCIAS CORRIENTES RECIBIDAS BANDES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 1),
('5.1.5.01.02.', 5, 'T', 'DONACIONES CORRIENTES RECIBIDAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.5.01.02.01.', 6, 'P', 'DONACIONES CORRIENTES RECIBIDAS DEL SECTOR PRIVADO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.5.01.02.02.', 6, 'P', 'DONACIONES CORRIENTES RECIBIDAS DEL SECTOR PUBLICO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.5.01.02.09.', 6, 'P', 'OTRAS DONACIONES CORRIENTES RECIBIDAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.9.', 3, 'T', 'OTROS INGRESOS ORDINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.9.01.', 4, 'P', 'UTILIDAD POR VENTA DE ACTIVOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.9.02.', 4, 'P', 'INGRESOS EN TRANSITO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.1.9.99.', 4, 'P', 'OTROS INGRESOS ORDINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.2.', 2, 'T', 'INGRESOS EXTRAORDINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.2.1.', 3, 'T', 'INGRESOS POR OPERACIONES DIVERSAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.2.1.01.', 4, 'P', 'INGRESOS PROVENIENTES DE PROCESOS DE LICITACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.2.1.02.', 4, 'P', 'CREDITOS ADICIONALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.2.1.03.', 4, 'P', 'INGRESO POR FIDES Y LAEE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.2.1.04.', 4, 'T', 'REINTEGRO DE FONDOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.2.1.04.01.', 5, 'P', 'REINTEGRO DE FONDOS EFECTUADOS POR PARTICULARES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.2.1.04.02.', 5, 'P', 'REINTEGRO DE FONDOS EFECTUADOS POR TRABAJADORES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('5.2.1.99.', 4, 'P', 'OTROS INGRESOS EXTRAORDINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.', 1, 'T', 'GASTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.', 2, 'T', 'GASTOS DE CONSUMO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.', 3, 'T', 'GASTOS DE PERSONAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.01.', 4, 'T', 'SUELDOS, SALARIOS Y OTRAS REMUNERACIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.01.01.', 5, 'P', 'SUELDOS BASICOS PERSONAL FIJO A TIEMPO COMPLETO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.01.02.', 5, 'P', 'SALARIOS A OBREROS EN PUESTOS PERMANENTES A TIEMPO COMPLETO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.01.03.', 5, 'P', 'REMUNERACION AL PERSONALCONTRATADO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.01.04.', 5, 'P', 'DIETAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.', 4, 'T', 'COMPLEMENTOS DE SUELDOS Y SALARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.01.', 5, 'P', 'COMPENSACIONES PREVISTAS EN LAS ESCALAS DE SUELDOS AL PERSONAL EMPLEADO FIJO A TIEMPO COMPLETO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.02.', 5, 'T', 'PRIMAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.02.01.', 6, 'P', 'PRIMA POR HIJOS A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.02.02.', 6, 'P', 'PRIMA DE PROFESIONALIZACION A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.02.03.', 6, 'P', 'PRIMA POR ANTIGUEDAD A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.02.04.', 6, 'P', 'PRIMA POR JERARQUIA O RESPONSABILIDAD EN EL CARGO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.02.05.', 6, 'P', 'PRIMA POR HIJOS DE OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.02.06.', 6, 'P', 'PRIMA POR ANTIGUEDAD A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.03.', 5, 'T', 'OTROS COMPLEMENTOS DE SUELDOS Y SALARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.03.01.', 6, 'P', 'COMPLEMENTO A EMPLEADOS POR HORAS EXTRAORDINARIAS O POR SOBRE TIEMPO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.03.02.', 6, 'P', 'COMPLEMENTO A EMPLEADOS POR GASTOS DE REPRESENTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.03.03.', 6, 'P', 'COMPLEMENTO A EMPLEADOS POR COMISION DE SERVICIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.03.04.', 6, 'P', 'COMPLEMENTOS A OBREROS POR GASTO DE ALIMENTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.03.05.', 6, 'P', 'OTROS COMPLEMENTOS A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.03.99.', 6, 'P', 'OTROS COMPLEMENTOS A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.04.', 5, 'T', 'BONOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.04.01.', 6, 'P', 'BONO COMPENSATORIO DE ALIMENTACION A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.04.02.', 6, 'P', 'BONO COMPENSATORIO DE ALIMENTACION A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.04.04.', 6, 'P', 'BONO COMPENSATORIO DE TRANSPORTE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.04.05.', 6, 'P', 'BONO VACACIONAL A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.04.06.', 6, 'P', 'BONO VACACIONAL A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.05.', 5, 'T', 'AGUINALDOS, UTILIDADES Y OTROS COMPLEMENTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.05.01.', 6, 'P', 'AGUINALDOS A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.02.05.02.', 6, 'P', 'AGUINALDOS A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.', 4, 'T', 'APORTES PATRONALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.01.', 5, 'T', 'APORTES PATRONAL AL INSTITUTO VENEZOLANO DE LOS SEGUROS SOCIAL(I.V.S.S)', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.01.01.', 6, 'P', 'APORTES PATRONAL AL I.V.S.S A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.01.02.', 6, 'P', 'APORTES PATRONAL AL I.V.S.S A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.02.', 5, 'T', 'APORTE PATRONAL AL FONDO DE SEGUROS DE PARO FORZOSO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.02.01.', 6, 'P', 'APORTE PATRONAL AL FONDO DE SEGUROS DE PARO FORZOSO A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.02.02.', 6, 'P', 'APORTE PATRONAL AL FONDO DE SEGUROS DE PARO FORZOSO A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.03.', 5, 'T', 'APORTE PATRONAL AL FONDO DE SEGUROS DE AHORRO HABITACIONAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.03.01.', 6, 'P', 'APORTE PATRONAL AL FONDO DE SEGUROS DE AHORRO HABITACIONAL A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.03.02.', 6, 'P', 'APORTE PATRONAL AL FONDO DE SEGUROS DE AHORRO HABITACIONAL A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.04.', 5, 'T', 'APORTES A CAJA DE AHORROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.04.01.', 6, 'P', 'APORTES A CAJA DE AHORROS A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.04.02.', 6, 'P', 'APORTES A CAJA DE AHORROS A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.05.', 5, 'T', 'APORTE PATRONAL AL FONDO DE SEGUROS DE VIDA, ACCIDENTES PERSONALES, HOSPITALIZACION, CIRUGIA, MATERNIDAD (HCM) Y GASTOS FUNERARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.05.01.', 6, 'P', 'APORTE PATRONAL AL FONDO DE SEGUROS DE VIDA, ACCIDENTES PERSONALES, HOSPITALIZACION, CIRUGIA, MATERNIDAD (HCM) Y GASTOS FUNERARIOS POR EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.05.02.', 6, 'P', 'APORTE PATRONAL AL FONDO DE SEGUROS DE VIDA, ACCIDENTES PERSONALES, HOSPITALIZACION, CIRUGIA, MATERNIDAD (HCM) Y GASTOS FUNERARIOS POR OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.06.', 5, 'T', 'APORTE PATRONAL PARA GASTOS DE GUARDERIA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.06.01.', 6, 'P', 'APORTE PATRONAL PARA GASTOS DE GUARDERIA A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.06.02.', 6, 'P', 'APORTE PATRONAL PARA GASTOS DE GUARDERIA A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.03.99.', 5, 'P', 'OTROS APORTES PATRONALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.04.', 4, 'T', 'PRESTACIONES SOCIALES Y OTRAS INDEMNIZACIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.04.01.', 5, 'P', 'PRESTACIONES SOCIALES Y OTRAS INDEMNIZACIONES A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.04.02.', 5, 'P', 'PRESTACIONES SOCIALES Y OTRAS INDEMNIZACIONES A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.04.99.', 5, 'P', 'OTRAS PRESTACIONES SOCIALES Y OTRAS INDEMNIZACIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.', 4, 'T', 'ASISTENCIA SOCIOECONOMICA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.01.', 5, 'T', 'AYUDAS POR MATRIMONIO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.01.01.', 6, 'P', 'AYUDAS POR MATRIMONIO A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.01.02.', 6, 'P', 'AYUDAS POR MATRIMONIO A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.02.', 5, 'T', 'AYUDAS POR NACIMIENTO POR HIJOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.02.01.', 6, 'P', 'AYUDAS POR NACIMIENTO POR HIJOS A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.02.02.', 6, 'P', 'AYUDAS POR NACIMIENTO POR HIJOS A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.03.', 5, 'T', 'AYUDAS PARA ADQUISICION DE UNIFORMES Y UTILES ESCOLARES A SUS HIJOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.03.01.', 6, 'P', 'AYUDAS PARA ADQUISICION DE UNIFORMES Y UTILES ESCOLARES A SUS HIJOS DE EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.03.02.', 6, 'P', 'AYUDAS PARA ADQUISICION DE UNIFORMES Y UTILES ESCOLARES A SUS HIJOS DE OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.04.', 5, 'T', 'AYUDAS PARA MEDICINAS, GASTOS MEDICOS, ODONTOLOGICOS Y QUIRURGICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.05.', 5, 'T', 'CAPACITACION Y ADIESTRAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.05.01.', 6, 'P', 'CAPACITACION Y ADIESTRAMIENTO A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.05.02.', 6, 'P', 'CAPACITACION Y ADIESTRAMIENTO A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.06.', 5, 'T', 'DOTACION DE UNIFORMES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.06.01.', 6, 'P', 'DOTACION DE UNIFORMES A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.06.02.', 6, 'P', 'DOTACION DE UNIFORMES A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.07.', 5, 'T', 'BECAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.07.01.', 6, 'P', 'BECAS A EMPLEADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.07.02.', 6, 'P', 'BECAS A OBREROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.08.', 5, 'T', 'APORTES PARA LA ADQUISICION DE JUGUETES PARA LOS HIJOS DEL PERSONAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.08.01.', 6, 'P', 'APORTES PARA LA ADQUISICION DE JUGUETES PARA LOS HIJOS DEL PERSONAL EMPLEADO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.08.02.', 6, 'P', 'APORTES PARA LA ADQUISICION DE JUGUETES PARA LOS HIJOS DEL PERSONAL OBRERO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.05.99.', 5, 'P', 'OTRAS SUBVENCIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.1.99.', 4, 'P', 'OTROS GASTOS DE PERSONAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.', 3, 'T', 'MATERIALES, SUMINISTROS Y MERCANCIAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.', 4, 'T', 'MATERIALES, SUMINISTROS Y MERCANCIAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.01.', 5, 'T', 'PRODUCTOS ALIMENTICIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.01.01.', 6, 'P', 'ALIMENTOS Y BEBIDAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.02.', 5, 'T', 'PRODUCTOS DE MINAS, CANTERAS Y YACIMIENTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.02.01.', 6, 'P', 'MINERAL NO FERROSO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.02.02.', 6, 'P', 'PIEDRA, ARCILLA. ARENA Y TIERRA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.03.', 5, 'T', 'TEXTILES Y VESTUARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.03.01.', 6, 'P', 'TEXTILES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.03.02.', 6, 'P', 'PRENDAS DE VESTIR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.03.03.', 6, 'P', 'CALZADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.04.', 5, 'T', 'PRODUCTOS DE CUERO Y CAUCHO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.04.01.', 6, 'P', 'CAUCHOS Y TRIPAS PARA VEHICULOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.05.', 5, 'T', 'PRODUCTOS DE PAPEL, CARTON E IMPRESOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.05.01.', 6, 'P', 'PULPA DE MADERA, PAPEL Y CARTON', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0);
INSERT INTO `cwconcue` (`Cuenta`, `Nivel`, `Tipo`, `Descrip`, `Bancos`, `MonPre`, `MonModif`, `FechaNuevo`, `CtaNueva`, `Auxunico`, `Monetaria`, `Ctaajuste`, `Marca`, `MonPreu`, `MonModify`, `Ccostos`, `Terceros`, `Cuentalt`, `Descripalt`, `Fiscaltipo`, `Tipocosto`) VALUES
('6.1.2.01.05.02.', 6, 'P', 'PRODUCTOS DE PAPEL Y CARTON PARA OFINA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.05.03.', 6, 'P', 'LIBROS, REVISTAS Y PERIODICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.05.04.', 6, 'P', 'MATERIAL DE ENSEÃ‘ANZA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.05.05.', 6, 'P', 'PRODUCTOS DE PAPEL Y CARTON PARA COMPUTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.05.06.', 6, 'P', 'PRODUCTOS DE PAPEL Y CARTON PARA LA IMPRENTA Y LA REPRODUCCION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.06.', 5, 'T', 'PRODUCTOS QUIMICOS Y DERIVADOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.06.01.', 6, 'P', 'PRODUCTOS FARMACEUTICOS Y MEDICAMENTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.06.02.', 6, 'P', 'COMBUSTIBLES Y LUBRICANTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.06.03.', 6, 'P', 'SUSTANCIAS QUIMICAS Y DE USO INDUSTRIAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.06.04.', 6, 'P', 'TINTAS, PINTURAS Y COLORANTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.06.05.', 6, 'P', 'PRODUCTOS PLASTICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.07.', 5, 'T', 'PRODUCTOS MINERALES NO METALICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.07.01.', 6, 'P', 'VIDRIOS Y PRODUCTOS DE VIDRIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.07.02.', 6, 'P', 'CEMENTO, CAL Y YESO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.07.99.', 6, 'P', 'OTROS PRODUCTOS MINERALES NO METALICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.08.', 5, 'T', 'PRODUCTOS METALICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.08.01.', 6, 'P', 'MATERIAL DE GUERRA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.08.02.', 6, 'P', 'MATERIAL DE SEÃ‘ALAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.08.03.', 6, 'P', 'RESPUESTOS Y ACCESORIOS PARA EQUIPOS DE TRANSPORTE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.08.04.', 6, 'P', 'RESPUESTOS Y ACCESORIOS PARA OTROS EQUIPOS ', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.08.05.', 6, 'P', 'PRODUCTOS PRIMARIOS DE ACERO Y HIERRO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.08.06.', 6, 'P', 'PRODUCTOS DE METALES NO FERROSO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.08.07.', 6, 'P', 'HERRAMIENTAS MENORES, CUCHILLERIAS Y ARTICULOS GENERALES DE FERRETERIA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.08.99.', 6, 'P', 'OTROS PRODUCTOS METALICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.09.', 5, 'T', 'PRODUCTOS DE MADERA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.09.01.', 6, 'P', 'PRODUCTOS PRIMARIOS DE MADERA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.09.02.', 6, 'P', 'MUEBLES Y ACCESORIOS DE MADERA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.', 5, 'T', 'PRODUCTOS VARIOS Y UTILES DIVERSOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.01.', 6, 'P', 'ARTICULOS DE DEPORTE, RECREACION Y JUGUETES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.02.', 6, 'P', 'CONDECORACIONES, OFRENDAS Y SIMILARES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.03.', 6, 'P', 'MATERIALES Y UTILES DE LIMPIEZA Y ASEO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.04.', 6, 'P', 'MATERIALES ELECTRICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.05.', 6, 'P', 'MATERIALES  PARA INSTALACIONES SANITARIAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.06.', 6, 'P', 'UTENSILIOS DE COCINA Y COMEDOR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.07.', 6, 'P', 'UTILES MENORES MEDICO-QUIRURGICOS, DE LABORATORIO, DENTALES Y DE VETERINARIA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.08.', 6, 'P', 'UTILES DE ESCRITORIOS, OFICINA Y MATERIALES DE INSTRUCCION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.09.', 6, 'P', 'MATERIALES PARA EQUIPOS DE COMPUTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.10.', 6, 'P', 'MATERIALES FOTOGRAFICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.10.99.', 6, 'P', 'OTROS PRODUCTOS Y UTILES DIVERSOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.11.', 5, 'T', 'BIENES PARA LA VENTA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.2.01.11.01.', 6, 'P', 'PRODUCTOS Y ARTICULOS PARA LA VENTA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 1),
('6.1.2.01.99.', 5, 'P', 'OTROS MATERIALES Y SUMINISTROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.', 3, 'T', 'SERVICIOS NO PERSONALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.01.', 4, 'T', 'ALQUILERES DE BIENES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.01.01.', 5, 'P', 'ALQUILERES DE BIENES INMUEBLES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.01.02.', 5, 'P', 'ALQUILERES DE BIENES DE USO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.01.03.', 5, 'P', 'ALQUILERES DE MAQUINARIAS Y EQUIPOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.01.04.', 5, 'P', 'ALQUILERES DE OTRAS MAQUINARIAS Y EQUIPOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.02.', 4, 'T', 'SERVICIOS BASICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.02.01.', 5, 'P', 'ELECTRICIDAD', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.02.02.', 5, 'P', 'GAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.02.03.', 5, 'P', 'AGUA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.02.04.', 5, 'P', 'TELEFONOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.02.05.', 5, 'P', 'SERVICIOS DE COMUNICACIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.02.06.', 5, 'P', 'SERVICIOS DE ASEO URBANO Y DOMICILIARIO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.03.', 4, 'T', 'SERVICIOS DE TRANSPORTE Y ALMACENAJE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.03.01.', 5, 'P', 'FLETES Y EMBALAJES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.03.02.', 5, 'P', 'PEAJE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.03.03.', 5, 'P', 'ESTACIONAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.03.04.', 5, 'P', 'SERVICIOS DE PROTECCION EN TRASLADO DE FONDOS Y DE MESAJERIA ', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.04.', 4, 'T', 'SERVICIOS DE INFORMACION, IMPRESION Y RELACIONES PUBLICAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.04.01.', 5, 'P', 'PUBLICIDAD Y PROPAGANDA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.04.02.', 5, 'P', 'IMPRENTA Y REPRODUCCION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.04.03.', 5, 'P', 'RELACIONES SOCIALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.04.04.', 5, 'P', 'AVISOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.05.', 4, 'T', 'PRIMAS, GASTOS DE SEGUROS, COMISIONES Y GASTOS BANCARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.05.01.', 5, 'P', 'PRIMAS Y GASTOS DE SEGURO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.05.02.', 5, 'P', 'COMISIONES Y GASTOS BANCARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.05.03.', 5, 'P', 'COMISIONES Y GASTOS DE ADQUISICION DE SEGUROS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.06.', 4, 'T', 'VIATICOS Y PASAJES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.06.01.', 5, 'P', 'VIATICOS Y PASAJES DENTRO DEL PAIS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.06.02.', 5, 'P', '	VIATICOS Y PASAJES FUERA DEL PAIS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.07.', 4, 'T', 'SERVICIOS PROFESIONALES Y TECNICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.07.01.', 5, 'P', 'SERVICIO DE CAPACITACION Y ADIESTRAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.07.02.', 5, 'P', 'SERVICIOS MEDICOS, ODONTOLOGICOS Y OTROS SERVICIOS DE SANIDAD', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.07.03.', 5, 'P', 'SERVICIOS DE CONTABILIDAD Y AUDITORIA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.07.04.', 5, 'P', 'SERVICIOS DE INGENIERIA Y ARQUITECTONICO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.07.05.', 5, 'P', 'SERVICIOS PARA LA ELABORACION Y SUMINISTRO DE COMIDA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.07.99.', 5, 'P', 'OTROS SERVICIOS PROFESIONALES Y TECNICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.08.', 4, 'T', 'CONSERVACION Y REPARACIONES MENORES DE MAQUINARIA Y EQUIPOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.08.01.', 5, 'P', 'CONSERVACION Y REPARACIONES MENORES DE MAQUINARIA Y DEMAS EQUIPOS DE CONSTRUCCION, CAMPO, INDUSTRIA Y TALLER', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.08.02.', 5, 'P', 'CONSERVACION Y REPARACIONES MENORES DE VEHICULOS AUTOMOTORES TERRESTRES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.08.03.', 5, 'P', 'CONSERVACION Y REPARACIONES MENORES DE EQUIPOS DE COMUNICACIONES Y SEÃ‘ALAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.08.04.', 5, 'P', 'CONSERVACION Y REPARACIONES MENORES DE EQUIPOS MEDICOS QUIRURGICOS, DENTALES Y VETERINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.08.05.', 5, 'P', 'CONSERVACION Y REPARACIONES MENORES DE EQUIPOS CIENTIFICOS, RELIGIOSOS, DE ENSEÃ‘ANZA Y RECREACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.08.06.', 5, 'P', 'CONSERVACION Y REPARACIONES MENORES DE EQUIPOS SEGURIDAD PUBLICA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.08.07.', 5, 'P', 'CONSERVACION Y REPARACIONES MENORES DE MAQUINAS, MUEBLES Y DEMAS EQUIPOS DE OFICINA Y DE ALOJAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.08.08.', 5, 'P', 'CONSERVACION Y REPARACIONES MENORES DE EQUIPOS DE COMPUTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.08.09.', 5, 'P', 'CONSERVACION Y REPARACIONES MENORES DE EQUIPOS MARITIMOS DE TRANSPORTE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.09.', 4, 'T', 'RESPUESTOS Y REPARACIONES MAYORES DE MAQUINARIAS Y EQUIPOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.09.01.', 5, 'P', 'RESPUESTOS Y REPARACIONES MAYORES DE MAQUINARIAS Y DEMAS EQUIPOS DE CONSTRUCCION, CAMPO, INDUSTRIA Y TALLER', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.09.02.', 5, 'P', 'RESPUESTOS Y REPARACIONES MAYORES DE VEHICULOS AUTOMOTORES TERRESTRES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.09.03.', 5, 'P', 'RESPUESTOS Y REPARACIONES MAYORES DE EQUIPOS DE COMUNICACIONES Y SEÃ‘ALAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.09.04.', 5, 'P', 'RESPUESTOS Y REPARACIONES MAYORES DE EQUIPOS MEDICOS, QUIRURGICOS, DENTALES Y VETERINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.09.05.', 5, 'P', 'RESPUESTOS Y REPARACIONES MAYORES DE EQUIPOS CIENTIFICO, RELIGIOSOS, DE ENSEÃ‘ANZA Y RECREACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.09.06.', 5, 'P', 'RESPUESTOS Y REPARACIONES MAYORES DE EQUIPOS PARA LA SEGURIDAD PUBLICA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.09.07.', 5, 'P', 'RESPUESTOS Y REPARACIONES MAYORES DE MAQUINAS, MUEBLES Y DEMAS EQUIPOS DE OFICINA Y DE ALOJAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.09.08.', 5, 'P', 'RESPUESTOS Y REPARACIONES MAYORES DE EQUIPOS DE COMPUTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.09.09.', 5, 'P', 'RESPUESTOS Y REPARACIONES MAYORES DE EQUIPOS MARITIMOS DE TRANSPORTE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.10.', 4, 'P', 'SERVICIOS DE ADMINISTRACION, VIGILANCIA Y MANTENIMIENTO DE LOS SERVICIOS BASICOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.11.', 4, 'P', 'SERVICIOS DE DIVERSION, ESPARCIMIENTO Y CULTURALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.12.', 4, 'T', 'IMPUESTOS INDIRECTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.12.01.', 5, 'T', 'IMPUESTO AL VALOR AGREGADO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.12.01.01.', 6, 'P', 'IMPUESTO AL VALOR AGREGADO PARA GASTOS CORRIENTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.12.01.02.', 6, 'P', 'IMPUESTO AL VALOR AGREGADO PARA GASTOS DE CAPITAL', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.12.02.', 5, 'P', 'DERECHOS DE IMPORTACION Y SERVICIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.12.03.', 5, 'P', 'OTROS IMPUESTOS INDIRECTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.13.', 4, 'T', 'OTROS SERVICIOS NO PERSONALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.3.13.01.', 5, 'P', 'OTROS SERVICIOS NO PERSONALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.', 3, 'T', 'DEPRECIACION Y AMORTIZACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.', 4, 'T', 'DEPRECIACION DE BIENES DE USO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.01.', 5, 'P', 'DEPRECIACION DE EDIFICIOS E INSTALACIONES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.02.', 5, 'P', 'DEPRECIACION DE MAQUINARIA Y DEMAS EQUIPOS DE CONSTRUCCION, CAMPO, INDUSTRIA Y TALLER', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.03.', 5, 'P', 'DEPRECIACION DE VEHICULOS AUTOMOTORES TERRETRES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.04.', 5, 'P', 'DEPRECIACION DE EQUIPOS DE COMUNICACIONES Y SEÃ‘ALAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.05.', 5, 'P', 'DEPRECIACION DE EQUIPOS MEDICO-QUIRURGICOS, DENTALES Y VETERINARIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.06.', 5, 'P', 'DEPRECIACION DE EQUIPOS CIENTIFICOS, RELIGIOSOS, DE ENSEÃ‘ANZA Y RECREACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.07.', 5, 'P', 'DEPRECIACION DE EQUIPOS PARA LA SEGURIDAD PUBLICA', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.08.', 5, 'P', 'DEPRECIACION DE MAQUINAS, MUEBLES Y DEMAS EQUIPOS DE OFICINA Y ALOJAMIENTO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.09.', 5, 'P', 'DEPRECIACION DE EQUIPOS DE COMPUTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.10.', 5, 'P', 'DEPRECIACION DE EQUIPOS MARITIMOS DE TRANSPORTE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.01.99.', 5, 'P', 'DEPRECIACION DE OTROS BIENES DE USO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.02.', 4, 'T', 'AMORTIZACION DE ACTIVOS INTANGIBLES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.02.01.', 5, 'P', 'AMORTIZACION DE GASTOS DE ORGANIZACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.02.02.', 5, 'P', 'AMORTIZACION DE PAQUETES Y PROGRAMAS DE COMPUTACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.02.03.', 5, 'P', 'AMORTIZACION DE ESTUDIOS Y PROYECTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.1.4.02.99.', 5, 'P', 'AMORTIZACION DE OTROS ACTIVOS INTANGIBLES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.', 2, 'T', 'TRANSFERENCIAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.', 3, 'T', 'TRANSFERENCIAS Y DONACIONES CORRIENTES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.01.', 4, 'T', 'TRANSFERENCIAS Y DONACIONES CORRIENTES OTORGADAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.01.01.', 5, 'T', 'TRANSFERENCIAS CORRIENTES INTERNAS OTORGADAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.01.01.01.', 6, 'P', 'TRANSFERENCIAS CORRIENTES OTORGADAS AL SECTOR PRIVADO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.01.01.02.', 6, 'P', 'TRANSFERENCIAS CORRIENTES OTORGADAS AL SECTOR PUBLICO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.01.01.03.', 6, 'P', 'TRANSFERENCIAS CORRIENTES OTORGADAS AL EXTERIOR', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.01.02.', 5, 'P', 'SUBSIDIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.02.', 4, 'T', 'INDEMNIZACIONES Y SANCIONES PECUNIARIAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.02.01.', 5, 'P', 'INDEMNIZACIONES PECUNIARIAS POR DAÃ‘OS Y PERJUICIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.02.02.', 5, 'P', 'SANCIONES PECUNIARIAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.2.1.99.', 4, 'P', 'OTROS GASTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.4.', 2, 'T', 'PÃ‰RDIDAS Y GASTOS DIVERSOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 1, 1),
('6.4.01.', 3, 'T', 'PÃ‰RDIDAS AJENAS A LA OPERACIÃ“N', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.4.01.01.', 4, 'P', 'PÃ‰RDIDAS EN OPERACION DE LOS SERVICIOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.4.01.99.', 4, 'P', 'OTRAS PERDIDAS EN OPERACION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.4.03.', 3, 'T', 'GASTOS DIVERSOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.4.03.02.', 4, 'T', 'INDENNIZACIONES Y SANCIONES PECUNARIAS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('6.4.03.02.01.', 5, 'P', 'SANCIONES PECUNARIAS IMPUESTAS A LOS ENTES DECENTRALIZADOS CON FINES EMPRESARIALES', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('7.', 1, 'T', 'CUENTAS DE CIERRE', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('7.1.', 2, 'T', 'CIERRE DEL EJERCICIO ECONOMICO FINANCIERO', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('7.1.1.', 3, 'T', 'RESUMEN DE INGRESOS Y GASTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('7.1.1.01.', 4, 'P', 'RESUMEN DE INGRESOS Y GASTOS', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('7.1.2.', 3, 'T', 'RESULTADO DE LA GESTION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('7.1.2.01.', 4, 'P', 'AHORRO DE LA GESTION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0),
('7.1.2.02.', 4, 'P', 'DESAHORRO DE LA GESTION', 0, 0, 0, '0000-00-00', 0, '', 0, '', 0, 0, 0, 1, 1, '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwprecue`
--

CREATE TABLE IF NOT EXISTS `cwprecue` (
  `CodCue` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Denominacion` text COLLATE utf8_spanish_ci NOT NULL,
  `Tipocta` int(10) unsigned NOT NULL DEFAULT '0',
  `Tipopuc` char(3) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`CodCue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `cwprecue`
--

INSERT INTO `cwprecue` (`CodCue`, `Denominacion`, `Tipocta`, `Tipopuc`) VALUES
('4.01.', 'Gastos de personal', 1, ''),
('4.01.01.', 'Sueldos, salarios y otras retribuciones', 2, ''),
('4.01.01.01.', 'Sueldos básicos personal fijo a tiempo completo', 3, ''),
('4.01.01.01.00', 'Sueldos básicos personal fijo a tiempo completo', 4, ''),
('4.01.01.02.', 'Sueldos básicos personal fijo a tiempo parcial', 3, ''),
('4.01.01.02.00', 'Sueldos básicos personal fijo a tiempo parcial', 4, ''),
('4.01.01.03.', 'Suplencias a empleados', 3, ''),
('4.01.01.03.00', 'Suplencias a empleados', 4, ''),
('4.01.01.08.', 'Sueldo al personal en trámite de nombramiento', 3, ''),
('4.01.01.08.00', 'Sueldo al personal en trámite de nombramiento', 4, ''),
('4.01.01.09.', 'Remuneraciones al personal en período de disponibilidad', 3, ''),
('4.01.01.09.00', 'Remuneraciones al personal en período de disponibilidad', 4, ''),
('4.01.01.10.', 'Salarios a obreros en puestos permanentes a tiempo completo', 3, ''),
('4.01.01.10.00', 'Salarios a obreros en puestos permanentes a tiempo completo', 4, ''),
('4.01.01.11.', 'Salarios a obreros en puestos permanentes a tiempo parcial', 3, ''),
('4.01.01.11.00', 'Salarios a obreros en puestos permanentes a tiempo parcial', 4, ''),
('4.01.01.12.', 'Salarios a obreros en puestos no permanentes', 3, ''),
('4.01.01.12.00', 'Salarios a obreros en puestos no permanentes', 4, ''),
('4.01.01.13.', 'Suplencias a obreros', 3, ''),
('4.01.01.13.00', 'Suplencias a obreros', 4, ''),
('4.01.01.18.', 'Remuneraciones al personal contratado', 3, ''),
('4.01.01.18.00', 'Remuneraciones al personal contratado', 4, ''),
('4.01.01.19.', 'Retribuciones por becas - salarios, bolsas de trabajo, pasantías y similares', 3, ''),
('4.01.01.19.00', 'Retribuciones por becas - salarios, bolsas de trabajo, pasantías y similares', 4, ''),
('4.01.01.20.', 'Sueldo del personal militar profesional', 3, ''),
('4.01.01.20.00', 'Sueldo del personal militar profesional', 4, ''),
('4.01.01.21.', 'Sueldo o ración del personal militar no profesional', 3, ''),
('4.01.01.21.00', 'Sueldo o ración del personal militar no profesional', 4, ''),
('4.01.01.22.', 'Sueldo del personal militar de reserva', 3, ''),
('4.01.01.22.00', 'Sueldo del personal militar de reserva', 4, ''),
('4.01.01.27.', 'Remuneraciones a parlamentarios', 3, ''),
('4.01.01.27.00', 'Remuneraciones a parlamentarios', 4, ''),
('4.01.01.28.', 'Suplencias a parlamentarios', 3, ''),
('4.01.01.28.00', 'Suplencias a parlamentarios', 4, ''),
('4.01.01.29.', 'Dietas', 3, ''),
('4.01.01.29.00', 'Dietas', 4, ''),
('4.01.01.30.', 'Retribución al personal de reserva', 3, ''),
('4.01.01.30.00', 'Retribución al personal de reserva', 4, ''),
('4.01.01.99.', 'Otras retribuciones ', 3, ''),
('4.01.01.99.00', 'Otras retribuciones ', 4, ''),
('4.01.02.', 'Compensaciones previstas en las escalas de sueldos y salarios', 2, ''),
('4.01.02.01.', 'Compensaciones previstas en las escalas de sueldos al personal empleado fijo a tiempo completo', 3, ''),
('4.01.02.01.00', 'Compensaciones previstas en las escalas de sueldos al personal empleado fijo a tiempo completo', 4, ''),
('4.01.02.02.', 'Compensaciones previstas en las escalas de sueldos al personal empleado fijo a tiempo parcial', 3, ''),
('4.01.02.02.00', 'Compensaciones previstas en las escalas de sueldos al personal empleado fijo a tiempo parcial', 4, ''),
('4.01.02.03.', 'Compensaciones previstas en las escalas de salarios al personal obrero fijo  a tiempo completo', 3, ''),
('4.01.02.03.00', 'Compensaciones previstas en las escalas de salarios al personal obrero fijo  a tiempo completo', 4, ''),
('4.01.02.04.', 'Compensaciones previstas en las escalas de salarios al personal obrero fijo a tiempo parcial', 3, ''),
('4.01.02.04.00', 'Compensaciones previstas en las escalas de salarios al personal obrero fijo a tiempo parcial', 4, ''),
('4.01.02.05.', 'Compensaciones previstas en las escalas de sueldos al personal militar', 3, ''),
('4.01.02.05.00', 'Compensaciones previstas en las escalas de sueldos al personal militar', 4, ''),
('4.01.03.', 'Primas a empleados, obreros, personal militar y parlamentarios', 2, ''),
('4.01.03.01.', 'Primas por mérito a empleados', 3, ''),
('4.01.03.01.00', 'Primas por mérito a empleados', 4, ''),
('4.01.03.02.', 'Primas de transporte a empleados', 3, ''),
('4.01.03.02.00', 'Primas de transporte a empleados', 4, ''),
('4.01.03.03.', 'Primas por hogar a empleados', 3, ''),
('4.01.03.03.00', 'Primas por hogar a empleados', 4, ''),
('4.01.03.04.', 'Primas por hijos a empleados', 3, ''),
('4.01.03.04.00', 'Primas por hijos a empleados', 4, ''),
('4.01.03.05.', 'Primas por alquileres a empleados', 3, ''),
('4.01.03.05.00', 'Primas por alquileres a empleados', 4, ''),
('4.01.03.06.', 'Primas por residencia a empleados', 3, ''),
('4.01.03.06.00', 'Primas por residencia a empleados', 4, ''),
('4.01.03.07.', 'Primas por categoría de escuelas a empleados', 3, ''),
('4.01.03.07.00', 'Primas por categoría de escuelas a empleados', 4, ''),
('4.01.03.08.', 'Primas de profesionalización a empleados', 3, ''),
('4.01.03.08.00', 'Primas de profesionalización a empleados', 4, ''),
('4.01.03.09.', 'Primas por antigüedad a empleados', 3, ''),
('4.01.03.09.00', 'Primas por antigüedad a empleados', 4, ''),
('4.01.03.10.', 'Primas por jerarquía o responsabilidad en el cargo', 3, ''),
('4.01.03.10.00', 'Primas por jerarquía o responsabilidad en el cargo', 4, ''),
('4.01.03.11.', 'Primas al personal en servicio en el exterior', 3, ''),
('4.01.03.11.00', 'Primas al personal en servicio en el exterior', 4, ''),
('4.01.03.16.', 'Primas por mérito a obreros', 3, ''),
('4.01.03.16.00', 'Primas por mérito a obreros', 4, ''),
('4.01.03.17.', 'Primas de transporte a obreros', 3, ''),
('4.01.03.17.00', 'Primas de transporte a obreros', 4, ''),
('4.01.03.18.', 'Primas por hogar a obreros', 3, ''),
('4.01.03.18.00', 'Primas por hogar a obreros', 4, ''),
('4.01.03.19.', 'Primas por hijos de obreros', 3, ''),
('4.01.03.19.00', 'Primas por hijos de obreros', 4, ''),
('4.01.03.20.', 'Primas por residencia a obreros', 3, ''),
('4.01.03.20.00', 'Primas por residencia a obreros', 4, ''),
('4.01.03.21.', 'Primas por antigüedad a obreros', 3, ''),
('4.01.03.21.00', 'Primas por antigüedad a obreros', 4, ''),
('4.01.03.22.', 'Primas de profesionalización a obreros', 3, ''),
('4.01.03.22.00', 'Primas de profesionalización a obreros', 4, ''),
('4.01.03.26.', 'Primas por hijos al personal militar', 3, ''),
('4.01.03.26.00', 'Primas por hijos al personal militar', 4, ''),
('4.01.03.27.', 'Primas de profesionalización al personal militar', 3, ''),
('4.01.03.27.00', 'Primas de profesionalización al personal militar', 4, ''),
('4.01.03.28.', 'Primas por antigüedad al personal militar', 3, ''),
('4.01.03.28.00', 'Primas por antigüedad al personal militar', 4, ''),
('4.01.03.29.', 'Primas por potencial de ascenso al personal militar', 3, ''),
('4.01.03.29.00', 'Primas por potencial de ascenso al personal militar', 4, ''),
('4.01.03.30.', 'Primas por frontera y sitios inhóspitos al personal militar y de seguridad', 3, ''),
('4.01.03.30.00', 'Primas por frontera y sitios inhóspitos al personal militar y de seguridad', 4, ''),
('4.01.03.31.', 'Primas por riesgo al personal militar y de seguridad', 3, ''),
('4.01.03.31.00', 'Primas por riesgo al personal militar y de seguridad', 4, ''),
('4.01.03.36.', 'Primas a parlamentarios', 3, ''),
('4.01.03.36.00', 'Primas a parlamentarios', 4, ''),
('4.01.03.97.', 'Otras primas a empleados', 3, ''),
('4.01.03.97.00', 'Otras primas a empleados', 4, ''),
('4.01.03.98.', 'Otras primas a obreros', 3, ''),
('4.01.03.98.00', 'Otras primas a obreros', 4, ''),
('4.01.03.99.', 'Otras primas al personal militar', 3, ''),
('4.01.03.99.00', 'Otras primas al personal militar', 4, ''),
('4.01.04.', 'Complementos de sueldos y salarios', 2, ''),
('4.01.04.01.', 'Complemento a empleados por horas extraordinarias o por sobre tiempo ', 3, ''),
('4.01.04.01.00', 'Complemento a empleados por horas extraordinarias o por sobre tiempo ', 4, ''),
('4.01.04.02.', 'Complemento a empleados por trabajo nocturno ', 3, ''),
('4.01.04.02.00', 'Complemento a empleados por trabajo nocturno ', 4, ''),
('4.01.04.03.', 'Complemento a empleados por gastos de alimentación ', 3, ''),
('4.01.04.03.00', 'Complemento a empleados por gastos de alimentación ', 4, ''),
('4.01.04.04.', 'Complemento a empleados por gastos de transporte ', 3, ''),
('4.01.04.04.00', 'Complemento a empleados por gastos de transporte ', 4, ''),
('4.01.04.05.', 'Complemento a empleados por gastos de representación ', 3, ''),
('4.01.04.05.00', 'Complemento a empleados por gastos de representación ', 4, ''),
('4.01.04.06.', 'Complemento a empleados por comisión de servicios ', 3, ''),
('4.01.04.06.00', 'Complemento a empleados por comisión de servicios ', 4, ''),
('4.01.04.07.', 'Bonificación a empleados', 3, ''),
('4.01.04.07.00', 'Bonificación a empleados', 4, ''),
('4.01.04.08.', 'BONO COMPENT. DE ALIMENT A EMPLEADOS', 3, 'NO'),
('4.01.04.08.00', 'BONO COMPENT. DE ALIMENT A EMPLEADOS', 4, 'NO'),
('4.01.04.09.', 'Bono compensatorio de transporte a empleados', 3, ''),
('4.01.04.09.00', 'Bono compensatorio de transporte a empleados', 4, ''),
('4.01.04.14.', 'Complemento a obreros por horas extraordinarias o por sobre tiempo ', 3, ''),
('4.01.04.14.00', 'Complemento a obreros por horas extraordinarias o por sobre tiempo ', 4, ''),
('4.01.04.15.', 'Complemento a obreros por trabajo o jornada nocturna ', 3, ''),
('4.01.04.15.00', 'Complemento a obreros por trabajo o jornada nocturna ', 4, ''),
('4.01.04.16.', 'Complemento a obreros por gastos de alimentación ', 3, ''),
('4.01.04.16.00', 'Complemento a obreros por gastos de alimentación ', 4, ''),
('4.01.04.17.', 'Complemento a obreros por gastos de transporte ', 3, ''),
('4.01.04.17.00', 'Complemento a obreros por gastos de transporte ', 4, ''),
('4.01.04.18.', 'Bono compensatorio de alimentación a obreros', 3, ''),
('4.01.04.18.00', 'Bono compensatorio de alimentación a obreros', 4, ''),
('4.01.04.19.', 'Bono compensatorio de transporte a obreros', 3, ''),
('4.01.04.19.00', 'Bono compensatorio de transporte a obreros', 4, ''),
('4.01.04.24.', 'Complemento al personal contratado por horas extraordinarias o por sobre tiempo ', 3, ''),
('4.01.04.24.00', 'Complemento al personal contratado por horas extraordinarias o por sobre tiempo ', 4, ''),
('4.01.04.25.', 'Complemento al personal contratado por gastos de alimentación ', 3, ''),
('4.01.04.25.00', 'Complemento al personal contratado por gastos de alimentación ', 4, ''),
('4.01.04.26.', 'Bono compensatorio de alimentación al personal contratado', 3, ''),
('4.01.04.26.00', 'Bono compensatorio de alimentación al personal contratado', 4, ''),
('4.01.04.27.', 'Bono compensatorio de transporte al personal contratado', 3, ''),
('4.01.04.27.00', 'Bono compensatorio de transporte al personal contratado', 4, ''),
('4.01.04.32.', 'Complemento al personal militar por gastos de alimentación ', 3, ''),
('4.01.04.32.00', 'Complemento al personal militar por gastos de alimentación ', 4, ''),
('4.01.04.33.', 'Complemento al personal militar por gastos de transporte ', 3, ''),
('4.01.04.33.00', 'Complemento al personal militar por gastos de transporte ', 4, ''),
('4.01.04.34.', 'Complemento al personal militar en el exterior ', 3, ''),
('4.01.04.34.00', 'Complemento al personal militar en el exterior ', 4, ''),
('4.01.04.35.', 'Bono compensatorio de alimentación al personal militar', 3, ''),
('4.01.04.35.00', 'Bono compensatorio de alimentación al personal militar', 4, ''),
('4.01.04.40.', 'Complemento a parlamentarios por gastos de alimentación ', 3, ''),
('4.01.04.40.00', 'Complemento a parlamentarios por gastos de alimentación ', 4, ''),
('4.01.04.41.', 'Complemento a parlamentarios por gastos de transporte ', 3, ''),
('4.01.04.41.00', 'Complemento a parlamentarios por gastos de transporte ', 4, ''),
('4.01.04.42.', 'Complemento a parlamentarios por gastos de representación ', 3, ''),
('4.01.04.42.00', 'Complemento a parlamentarios por gastos de representación ', 4, ''),
('4.01.04.96.', 'Otros complementos a empleados', 3, ''),
('4.01.04.96.00', 'Otros complementos a empleados', 4, ''),
('4.01.04.97.', 'Otros complementos a obreros', 3, ''),
('4.01.04.97.00', 'Otros complementos a obreros', 4, ''),
('4.01.04.98.', 'Otros complementos al personal contratado', 3, ''),
('4.01.04.98.00', 'Otros complementos al personal contratado', 4, ''),
('4.01.04.99.', 'Otros complementos al personal militar', 3, ''),
('4.01.04.99.00', 'Otros complementos al personal militar', 4, ''),
('4.01.05.', 'Aguinaldos, utilidades o bonificación legal, y bono vacacional a empleados, obreros, contratados, personal militar y parlamentarios', 2, ''),
('4.01.05.01.', 'Aguinaldos a empleados', 3, ''),
('4.01.05.01.00', 'Aguinaldos a empleados', 4, ''),
('4.01.05.02.', 'Utilidades legales y convencionales a empleados', 3, ''),
('4.01.05.02.00', 'Utilidades legales y convencionales a empleados', 4, ''),
('4.01.05.03.', 'Bono vacacional a empleados', 3, ''),
('4.01.05.03.00', 'Bono vacacional a empleados', 4, ''),
('4.01.05.04.', 'Aguinaldos a obreros', 3, ''),
('4.01.05.04.00', 'Aguinaldos a obreros', 4, ''),
('4.01.05.05.', 'Utilidades legales y convencionales a obreros', 3, ''),
('4.01.05.05.00', 'Utilidades legales y convencionales a obreros', 4, ''),
('4.01.05.06.', 'Bono vacacional a obreros', 3, ''),
('4.01.05.06.00', 'Bono vacacional a obreros', 4, ''),
('4.01.05.07.', 'Aguinaldos al personal contratado', 3, ''),
('4.01.05.07.00', 'Aguinaldos al personal contratado', 4, ''),
('4.01.05.08.', 'Bono vacacional al personal contratado', 3, ''),
('4.01.05.08.00', 'Bono vacacional al personal contratado', 4, ''),
('4.01.05.09.', 'Aguinaldos al personal militar', 3, ''),
('4.01.05.09.00', 'Aguinaldos al personal militar', 4, ''),
('4.01.05.10.', 'Bono vacacional al personal militar', 3, ''),
('4.01.05.10.00', 'Bono vacacional al personal militar', 4, ''),
('4.01.05.11.', 'Aguinaldos a parlamentarios', 3, ''),
('4.01.05.11.00', 'Aguinaldos a parlamentarios', 4, ''),
('4.01.05.12.', 'Bono vacacional a parlamentarios', 3, ''),
('4.01.05.12.00', 'Bono vacacional a parlamentarios', 4, ''),
('4.01.06.', 'Aportes patronales y legales por empleados, obreros, personal militar y parlamentarios', 2, ''),
('4.01.06.01.', 'Aporte patronal al Instituto Venezolano de los Seguros Sociales  (IVSS) por empleados', 3, ''),
('4.01.06.01.00', 'Aporte patronal al Instituto Venezolano de los Seguros Sociales  (IVSS) por empleados', 4, ''),
('4.01.06.02.', 'Aporte patronal al Instituto de Previsión y Asistencia Social para el personal del Ministerio de Educación (IPASME) por empleados', 3, ''),
('4.01.06.02.00', 'Aporte patronal al Instituto de Previsión y Asistencia Social para el personal del Ministerio de Educación (IPASME) por empleados', 4, ''),
('4.01.06.03.', 'Aporte patronal al Fondo de Jubilaciones por empleados', 3, ''),
('4.01.06.03.00', 'Aporte patronal al Fondo de Jubilaciones por empleados', 4, ''),
('4.01.06.04.', 'Aporte patronal al Fondo de Seguro de Paro Forzoso por empleados', 3, ''),
('4.01.06.04.00', 'Aporte patronal al Fondo de Seguro de Paro Forzoso por empleados', 4, ''),
('4.01.06.05.', 'Aporte patronal al Fondo de Ahorro Habitacional por empleados', 3, ''),
('4.01.06.05.00', 'Aporte patronal al Fondo de Ahorro Habitacional por empleados', 4, ''),
('4.01.06.10.', 'Aporte patronal al Instituto Venezolano de los Seguros   Sociales  (IVSS) por obreros', 3, ''),
('4.01.06.10.00', 'Aporte patronal al Instituto Venezolano de los Seguros   Sociales  (IVSS) por obreros', 4, ''),
('4.01.06.11.', 'Aporte patronal al Fondo de Jubilaciones por obreros', 3, ''),
('4.01.06.11.00', 'Aporte patronal al Fondo de Jubilaciones por obreros', 4, ''),
('4.01.06.12.', 'Aporte patronal al Fondo de Seguro de Paro Forzoso por obreros', 3, ''),
('4.01.06.12.00', 'Aporte patronal al Fondo de Seguro de Paro Forzoso por obreros', 4, ''),
('4.01.06.13.', 'Aporte patronal al Fondo de Ahorro Habitacional por obreros', 3, ''),
('4.01.06.13.00', 'Aporte patronal al Fondo de Ahorro Habitacional por obreros', 4, ''),
('4.01.06.18.', 'Aporte patronal a los organismos de seguridad social por los trabajadores locales empleados en las representaciones de Venezuela en el exterior', 3, ''),
('4.01.06.18.00', 'Aporte patronal a los organismos de seguridad social por los trabajadores locales empleados en las representaciones de Venezuela en el exterior', 4, ''),
('4.01.06.19.', 'Aporte patronal al Fondo de Ahorro Habitacional por personal militar', 3, ''),
('4.01.06.19.00', 'Aporte patronal al Fondo de Ahorro Habitacional por personal militar', 4, ''),
('4.01.06.24.', 'Aporte legal al Fondo de Ahorro Habitacional a parlamentarios', 3, ''),
('4.01.06.24.00', 'Aporte legal al Fondo de Ahorro Habitacional a parlamentarios', 4, ''),
('4.01.06.96.', 'Otros aportes legales por empleados', 3, ''),
('4.01.06.96.00', 'Otros aportes legales por empleados', 4, ''),
('4.01.06.97.', 'Otros aportes legales por obreros', 3, ''),
('4.01.06.97.00', 'Otros aportes legales por obreros', 4, ''),
('4.01.06.98.', 'Otros aportes legales por personal militar', 3, ''),
('4.01.06.98.00', 'Otros aportes legales por personal militar', 4, ''),
('4.01.06.99.', 'Otros aportes legales por parlamentarios', 3, ''),
('4.01.06.99.00', 'Otros aportes legales por parlamentarios', 4, ''),
('4.01.07.', 'Asistencia socio-económica a empleados, obreros, contratados, personal militar y parlamentarios', 2, ''),
('4.01.07.01.', 'Capacitación y adiestramiento a empleados', 3, ''),
('4.01.07.01.00', 'Capacitación y adiestramiento a empleados', 4, ''),
('4.01.07.02.', 'Becas a empleados', 3, ''),
('4.01.07.02.00', 'Becas a empleados', 4, ''),
('4.01.07.03.', 'Ayudas por matrimonio a empleados', 3, ''),
('4.01.07.03.00', 'Ayudas por matrimonio a empleados', 4, ''),
('4.01.07.04.', 'Ayudas por nacimiento de hijos a empleados', 3, ''),
('4.01.07.04.00', 'Ayudas por nacimiento de hijos a empleados', 4, ''),
('4.01.07.05.', 'Ayudas por defunción a empleados', 3, ''),
('4.01.07.05.00', 'Ayudas por defunción a empleados', 4, ''),
('4.01.07.06.', 'Ayudas para medicinas, gastos médicos,  odontológicos y de hospitalización a empleados', 3, ''),
('4.01.07.06.00', 'Ayudas para medicinas, gastos médicos,  odontológicos y de hospitalización a empleados', 4, ''),
('4.01.07.07.', 'Aporte patronal a cajas de ahorro por empleados', 3, ''),
('4.01.07.07.00', 'Aporte patronal a cajas de ahorro por empleados', 4, ''),
('4.01.07.08.', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios por empleados', 3, ''),
('4.01.07.08.00', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios por empleados', 4, ''),
('4.01.07.09.', 'Ayudas a empleados para adquisición de uniformes y útiles escolares de sus hijos ', 3, ''),
('4.01.07.09.00', 'Ayudas a empleados para adquisición de uniformes y útiles escolares de sus hijos ', 4, ''),
('4.01.07.10.', 'Dotación de uniformes a empleados', 3, ''),
('4.01.07.10.00', 'Dotación de uniformes a empleados', 4, ''),
('4.01.07.11.', 'Aporte patronal para gastos de guarderías y preescolar para hijos de empleados ', 3, ''),
('4.01.07.11.00', 'Aporte patronal para gastos de guarderías y preescolar para hijos de empleados ', 4, ''),
('4.01.07.12.', 'Aportes para la adquisición de juguetes para los hijos del personal empleado', 3, ''),
('4.01.07.12.00', 'Aportes para la adquisición de juguetes para los hijos del personal empleado', 4, ''),
('4.01.07.17.', 'Capacitación y adiestramiento a obreros', 3, ''),
('4.01.07.17.00', 'Capacitación y adiestramiento a obreros', 4, ''),
('4.01.07.18.', 'Becas a obreros', 3, ''),
('4.01.07.18.00', 'Becas a obreros', 4, ''),
('4.01.07.19.', 'Ayudas por matrimonio de obreros', 3, ''),
('4.01.07.19.00', 'Ayudas por matrimonio de obreros', 4, ''),
('4.01.07.20.', 'Ayudas por nacimiento de hijos de obreros', 3, ''),
('4.01.07.20.00', 'Ayudas por nacimiento de hijos de obreros', 4, ''),
('4.01.07.21.', 'Ayudas por defunción a obreros', 3, ''),
('4.01.07.21.00', 'Ayudas por defunción a obreros', 4, ''),
('4.01.07.22.', 'Ayudas para medicinas, gastos médicos,  odontológicos y de hospitalización a obreros', 3, ''),
('4.01.07.22.00', 'Ayudas para medicinas, gastos médicos,  odontológicos y de hospitalización a obreros', 4, ''),
('4.01.07.23.', 'Aporte patronal a cajas de ahorro por obreros', 3, ''),
('4.01.07.23.00', 'Aporte patronal a cajas de ahorro por obreros', 4, ''),
('4.01.07.24.', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios por obreros', 3, ''),
('4.01.07.24.00', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios por obreros', 4, ''),
('4.01.07.25.', 'Ayudas a obreros para adquisición de uniformes y útiles escolares de sus hijos ', 3, ''),
('4.01.07.25.00', 'Ayudas a obreros para adquisición de uniformes y útiles escolares de sus hijos ', 4, ''),
('4.01.07.26.', 'Dotación de uniformes a obreros', 3, ''),
('4.01.07.26.00', 'Dotación de uniformes a obreros', 4, ''),
('4.01.07.27.', 'Aporte patronal para gastos de guarderías y preescolar para hijos de obreros ', 3, ''),
('4.01.07.27.00', 'Aporte patronal para gastos de guarderías y preescolar para hijos de obreros ', 4, ''),
('4.01.07.28.', 'Aportes para la adquisición de juguetes para los hijos del personal obrero', 3, ''),
('4.01.07.28.00', 'Aportes para la adquisición de juguetes para los hijos del personal obrero', 4, ''),
('4.01.07.33.', 'Asistencia socio-económica al personal contratado ', 3, ''),
('4.01.07.33.00', 'Asistencia socio-económica al personal contratado ', 4, ''),
('4.01.07.34.', 'Capacitación y adiestramiento al personal militar ', 3, ''),
('4.01.07.34.00', 'Capacitación y adiestramiento al personal militar ', 4, ''),
('4.01.07.35.', 'Becas al personal militar ', 3, ''),
('4.01.07.35.00', 'Becas al personal militar ', 4, ''),
('4.01.07.36.', 'Ayudas por matrimonio al personal militar ', 3, ''),
('4.01.07.36.00', 'Ayudas por matrimonio al personal militar ', 4, ''),
('4.01.07.37.', 'Ayudas por nacimiento de hijos al personal militar ', 3, ''),
('4.01.07.37.00', 'Ayudas por nacimiento de hijos al personal militar ', 4, ''),
('4.01.07.38.', 'Ayudas por defunción al personal militar ', 3, ''),
('4.01.07.38.00', 'Ayudas por defunción al personal militar ', 4, ''),
('4.01.07.39.', 'Ayudas para medicinas, gastos médicos, odontológicos y de hospitalización al personal militar ', 3, ''),
('4.01.07.39.00', 'Ayudas para medicinas, gastos médicos, odontológicos y de hospitalización al personal militar ', 4, ''),
('4.01.07.40.', 'Aporte patronal a caja de ahorro por personal militar ', 3, ''),
('4.01.07.40.00', 'Aporte patronal a caja de ahorro por personal militar ', 4, ''),
('4.01.07.41.', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios personal militar ', 3, ''),
('4.01.07.41.00', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios personal militar ', 4, ''),
('4.01.07.42.', 'Ayudas al personal militar para adquisición de uniformes y útiles escolares de sus hijos ', 3, ''),
('4.01.07.42.00', 'Ayudas al personal militar para adquisición de uniformes y útiles escolares de sus hijos ', 4, ''),
('4.01.07.43.', 'Aportes para la adquisición de juguetes para los hijos del personal militar', 3, ''),
('4.01.07.43.00', 'Aportes para la adquisición de juguetes para los hijos del personal militar', 4, ''),
('4.01.07.48.', 'Ayudas para medicinas, gastos médicos, odontológicos y de hospitalización de parlamentarios', 3, ''),
('4.01.07.48.00', 'Ayudas para medicinas, gastos médicos, odontológicos y de hospitalización de parlamentarios', 4, ''),
('4.01.07.49.', 'Aporte a cajas de ahorro por parlamentarios', 3, ''),
('4.01.07.49.00', 'Aporte a cajas de ahorro por parlamentarios', 4, ''),
('4.01.07.50.', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios por parlamentarios', 3, ''),
('4.01.07.50.00', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios por parlamentarios', 4, ''),
('4.01.07.51.', 'Capacitación y Adiestramiento a Parlamentarios', 3, ''),
('4.01.07.51.00', 'Capacitación y Adiestramiento a Parlamentarios', 4, ''),
('4.01.07.96.', 'Otras subvenciones a empleados', 3, ''),
('4.01.07.96.00', 'Otras subvenciones a empleados', 4, ''),
('4.01.07.97.', 'Otras subvenciones a obreros', 3, ''),
('4.01.07.97.00', 'Otras subvenciones a obreros', 4, ''),
('4.01.07.98.', 'Otras subvenciones al personal militar', 3, ''),
('4.01.07.98.00', 'Otras subvenciones al personal militar', 4, ''),
('4.01.07.99.', 'Otras subvenciones a parlamentarios', 3, ''),
('4.01.07.99.00', 'Otras subvenciones a parlamentarios', 4, ''),
('4.01.08.', 'Prestaciones sociales e indemnizaciones a empleados, obreros, contratados, personal militar y parlamentarios ', 2, ''),
('4.01.08.01.', 'Prestaciones sociales e indemnizaciones a empleados', 3, ''),
('4.01.08.01.00', 'Prestaciones sociales e indemnizaciones a empleados', 4, ''),
('4.01.08.02.', 'Prestaciones sociales e indemnizaciones a obreros', 3, ''),
('4.01.08.02.00', 'Prestaciones sociales e indemnizaciones a obreros', 4, ''),
('4.01.08.03.', 'Prestaciones sociales e indemnizaciones al personal contratado', 3, ''),
('4.01.08.03.00', 'Prestaciones sociales e indemnizaciones al personal contratado', 4, ''),
('4.01.08.04.', 'Prestaciones sociales e indemnizaciones al personal militar', 3, ''),
('4.01.08.04.00', 'Prestaciones sociales e indemnizaciones al personal militar', 4, ''),
('4.01.08.05.', 'Prestaciones sociales e indemnizaciones a parlamentarios', 3, ''),
('4.01.08.05.00', 'Prestaciones sociales e indemnizaciones a parlamentarios', 4, ''),
('4.01.09.', 'Capacitación y adiestramiento realizado por personal del organismo', 2, ''),
('4.01.09.01.', 'Capacitación y adiestramiento realizado por personal del organismo', 3, ''),
('4.01.09.01.00', 'Capacitación y adiestramiento realizado por personal del organismo', 4, ''),
('4.01.96.', 'Otros gastos del personal empleado', 2, ''),
('4.01.96.01.', 'Otros gastos del personal empleado', 3, ''),
('4.01.96.01.00', 'Otros gastos del personal empleado', 4, ''),
('4.01.97.', 'Otros gastos del personal obrero', 2, ''),
('4.01.97.01.', 'Otros gastos del personal obrero', 3, ''),
('4.01.97.01.00', 'Otros gastos del personal obrero', 4, ''),
('4.01.98.', 'Otros gastos del personal militar', 2, ''),
('4.01.98.01.', 'Otros gastos del personal militar', 3, ''),
('4.01.98.01.00', 'Otros gastos del personal militar', 4, ''),
('4.01.99.', 'Otros gastos de los parlamentarios', 2, ''),
('4.01.99.01.', 'Otros gastos de los parlamentarios', 3, ''),
('4.01.99.01.00', 'Otros gastos de los parlamentarios', 4, ''),
('4.02.', 'Materiales, suministros y mercancías', 1, ''),
('4.02.01.', 'Productos alimenticios y agropecuarios', 2, ''),
('4.02.01.01.', 'Alimentos y bebidas para personas', 3, ''),
('4.02.01.01.00', 'Alimentos y bebidas para personas', 4, 'NO'),
('4.02.01.02.', 'Alimentos para animales', 3, ''),
('4.02.01.02.00', 'Alimentos para animales', 4, ''),
('4.02.01.03.', 'Productos agrícolas y pecuarios', 3, ''),
('4.02.01.03.00', 'Productos agrícolas y pecuarios', 4, ''),
('4.02.01.04.', 'Productos de la caza y pesca', 3, ''),
('4.02.01.04.00', 'Productos de la caza y pesca', 4, ''),
('4.02.01.99.', 'Otros productos alimenticios y agropecuarios', 3, ''),
('4.02.01.99.00', 'Otros productos alimenticios y agropecuarios', 4, ''),
('4.02.02.', 'Productos de minas, canteras y yacimientos', 2, ''),
('4.02.02.01.', 'Carbón mineral', 3, ''),
('4.02.02.01.00', 'Carbón mineral', 4, ''),
('4.02.02.02.', 'Petróleo crudo y gas natural', 3, ''),
('4.02.02.02.00', 'Petróleo crudo y gas natural', 4, ''),
('4.02.02.03.', 'Mineral de hierro', 3, ''),
('4.02.02.03.00', 'Mineral de hierro', 4, ''),
('4.02.02.04.', 'Mineral no ferroso', 3, ''),
('4.02.02.04.00', 'Mineral no ferroso', 4, ''),
('4.02.02.05.', 'Piedra, arcilla, arena y tierra', 3, ''),
('4.02.02.05.00', 'Piedra, arcilla, arena y tierra', 4, ''),
('4.02.02.06.', 'Mineral para la fabricación de productos químicos', 3, ''),
('4.02.02.06.00', 'Mineral para la fabricación de productos químicos', 4, ''),
('4.02.02.07.', 'Sal para uso industrial', 3, ''),
('4.02.02.07.00', 'Sal para uso industrial', 4, ''),
('4.02.02.99.', 'Otros productos de minas, canteras y yacimientos', 3, ''),
('4.02.02.99.00', 'Otros productos de minas, canteras y yacimientos', 4, ''),
('4.02.03.', 'Textiles y vestuarios', 2, ''),
('4.02.03.01.', 'Textiles', 3, ''),
('4.02.03.01.00', 'Textiles', 4, ''),
('4.02.03.02.', 'Prendas de vestir', 3, ''),
('4.02.03.02.00', 'Prendas de vestir', 4, ''),
('4.02.03.03.', 'Calzados', 3, ''),
('4.02.03.03.00', 'Calzados', 4, ''),
('4.02.03.99.', 'Otros productos textiles y vestuarios', 3, ''),
('4.02.03.99.00', 'Otros productos textiles y vestuarios', 4, ''),
('4.02.04.', 'Productos de cuero y caucho', 2, ''),
('4.02.04.01.', 'Cueros y pieles', 3, ''),
('4.02.04.01.00', 'Cueros y pieles', 4, ''),
('4.02.04.02.', 'Productos de cuero y sucedáneos del cuero', 3, ''),
('4.02.04.02.00', 'Productos de cuero y sucedáneos del cuero', 4, ''),
('4.02.04.03.', 'Cauchos y tripas para vehículos', 3, ''),
('4.02.04.03.00', 'Cauchos y tripas para vehículos', 4, ''),
('4.02.04.99.', 'Otros productos de cuero y caucho', 3, ''),
('4.02.04.99.00', 'Otros productos de cuero y caucho', 4, ''),
('4.02.05.', 'Productos de papel, cartón e impresos', 2, ''),
('4.02.05.01.', 'Pulpa de madera, papel y cartón', 3, ''),
('4.02.05.01.00', 'Pulpa de madera, papel y cartón', 4, ''),
('4.02.05.02.', 'Envases y cajas de papel y cartón', 3, ''),
('4.02.05.02.00', 'Envases y cajas de papel y cartón', 4, ''),
('4.02.05.03.', 'Productos de papel y cartón para oficina', 3, ''),
('4.02.05.03.00', 'Productos de papel y cartón para oficina', 4, ''),
('4.02.05.04.', 'Libros, revistas y periódicos', 3, ''),
('4.02.05.04.00', 'Libros, revistas y periódicos', 4, ''),
('4.02.05.05.', 'Material de enseñanza', 3, ''),
('4.02.05.05.00', 'Material de enseñanza', 4, ''),
('4.02.05.06.', 'Productos de papel y cartón para computación', 3, ''),
('4.02.05.06.00', 'Productos de papel y cartón para computación', 4, ''),
('4.02.05.07.', 'Productos de papel y cartón para la imprenta y reproducción', 3, ''),
('4.02.05.07.00', 'Productos de papel y cartón para la imprenta y reproducción', 4, ''),
('4.02.05.99.', 'Otros productos de pulpa, papel y cartón', 3, ''),
('4.02.05.99.00', 'Otros productos de pulpa, papel y cartón', 4, ''),
('4.02.06.', 'Productos químicos y derivados', 2, ''),
('4.02.06.01.', 'Sustancias químicas y de uso industrial', 3, ''),
('4.02.06.01.00', 'Sustancias químicas y de uso industrial', 4, ''),
('4.02.06.02.', 'Abonos, plaguicidas y otros', 3, ''),
('4.02.06.02.00', 'Abonos, plaguicidas y otros', 4, ''),
('4.02.06.03.', 'Tintas, pinturas y colorantes', 3, ''),
('4.02.06.03.00', 'Tintas, pinturas y colorantes', 4, ''),
('4.02.06.04.', 'Productos farmacéuticos y medicamentos', 3, ''),
('4.02.06.04.00', 'Productos farmacéuticos y medicamentos', 4, ''),
('4.02.06.05.', 'Productos de tocador', 3, ''),
('4.02.06.05.00', 'Productos de tocador', 4, ''),
('4.02.06.06.', 'Combustibles y lubricantes', 3, ''),
('4.02.06.06.00', 'Combustibles y lubricantes', 4, ''),
('4.02.06.07.', 'Productos diversos derivados del petróleo y del carbón', 3, ''),
('4.02.06.07.00', 'Productos diversos derivados del petróleo y del carbón', 4, ''),
('4.02.06.08.', 'Productos plásticos', 3, ''),
('4.02.06.08.00', 'Productos plásticos', 4, ''),
('4.02.06.09.', 'Mezclas explosivas', 3, ''),
('4.02.06.09.00', 'Mezclas explosivas', 4, ''),
('4.02.06.99.', 'Otros productos de la industria química y conexos', 3, ''),
('4.02.06.99.00', 'Otros productos de la industria química y conexos', 4, ''),
('4.02.07.', 'Productos minerales no metálicos', 2, ''),
('4.02.07.01.', 'Productos de barro, loza y porcelana', 3, ''),
('4.02.07.01.00', 'Productos de barro, loza y porcelana', 4, ''),
('4.02.07.02.', 'Vidrios y productos de vidrio', 3, ''),
('4.02.07.02.00', 'Vidrios y productos de vidrio', 4, ''),
('4.02.07.03.', 'Productos de arcilla para construcción', 3, ''),
('4.02.07.03.00', 'Productos de arcilla para construcción', 4, ''),
('4.02.07.04.', 'Cemento, cal  y yeso', 3, ''),
('4.02.07.04.00', 'Cemento, cal  y yeso', 4, ''),
('4.02.07.99.', 'Otros productos minerales no metálicos', 3, ''),
('4.02.07.99.00', 'Otros productos minerales no metálicos', 4, ''),
('4.02.08.', 'Productos metálicos', 2, ''),
('4.02.08.01.', 'Productos primarios de hierro y acero', 3, ''),
('4.02.08.01.00', 'Productos primarios de hierro y acero', 4, ''),
('4.02.08.02.', 'Productos de metales no ferrosos', 3, ''),
('4.02.08.02.00', 'Productos de metales no ferrosos', 4, ''),
('4.02.08.03.', 'Herramientas menores, cuchillería y artículos generales de ferretería', 3, ''),
('4.02.08.03.00', 'Herramientas menores, cuchillería y artículos generales de ferretería', 4, ''),
('4.02.08.04.', 'Productos metálicos estructurales', 3, ''),
('4.02.08.04.00', 'Productos metálicos estructurales', 4, ''),
('4.02.08.05.', 'Materiales de orden público, seguridad y defensa nacional', 3, ''),
('4.02.08.05.00', 'Materiales de orden público, seguridad y defensa nacional', 4, ''),
('4.02.08.06.', 'Material de seguridad pública', 3, ''),
('4.02.08.06.00', 'Material de seguridad pública', 4, ''),
('4.02.08.07.', 'Material de señalamiento', 3, ''),
('4.02.08.07.00', 'Material de señalamiento', 4, ''),
('4.02.08.08.', 'Material de educación', 3, ''),
('4.02.08.08.00', 'Material de educación', 4, ''),
('4.02.08.09.', 'Repuestos y accesorios para equipos de transporte', 3, ''),
('4.02.08.09.00', 'Repuestos y accesorios para equipos de transporte', 4, ''),
('4.02.08.10.', 'Repuestos y accesorios para otros equipos', 3, ''),
('4.02.08.10.00', 'Repuestos y accesorios para otros equipos', 4, ''),
('4.02.08.99.', 'Otros productos metálicos', 3, ''),
('4.02.08.99.00', 'Otros productos metálicos', 4, ''),
('4.02.09.', 'Productos de madera', 2, ''),
('4.02.09.01.', 'Productos primarios de madera', 3, ''),
('4.02.09.01.00', 'Productos primarios de madera', 4, ''),
('4.02.09.02.', 'Muebles y accesorios de madera para edificaciones', 3, ''),
('4.02.09.02.00', 'Muebles y accesorios de madera para edificaciones', 4, ''),
('4.02.09.99.', 'Otros productos de madera', 3, ''),
('4.02.09.99.00', 'Otros productos de madera', 4, ''),
('4.02.10.', 'Productos varios y útiles diversos', 2, ''),
('4.02.10.01.', 'Artículos de deporte, recreación y juguetes', 3, ''),
('4.02.10.01.00', 'Artículos de deporte, recreación y juguetes', 4, ''),
('4.02.10.02.', 'Materiales y útiles de limpieza y aseo', 3, ''),
('4.02.10.02.00', 'Materiales y útiles de limpieza y aseo', 4, ''),
('4.02.10.03.', 'Utensilios de cocina y comedor', 3, ''),
('4.02.10.03.00', 'Utensilios de cocina y comedor', 4, ''),
('4.02.10.04.', 'Útiles menores médico - quirúrgicos de laboratorio, dentales y de veterinaria', 3, ''),
('4.02.10.04.00', 'Útiles menores médico - quirúrgicos de laboratorio, dentales y de veterinaria', 4, ''),
('4.02.10.05.', 'Útiles de escritorio, oficina y materiales de instrucción', 3, ''),
('4.02.10.05.00', 'Útiles de escritorio, oficina y materiales de instrucción', 4, ''),
('4.02.10.06.', 'Condecoraciones, ofrendas y similares', 3, ''),
('4.02.10.06.00', 'Condecoraciones, ofrendas y similares', 4, ''),
('4.02.10.07.', 'Productos de seguridad en el trabajo', 3, ''),
('4.02.10.07.00', 'Productos de seguridad en el trabajo', 4, ''),
('4.02.10.08.', 'Materiales para equipos de computación', 3, ''),
('4.02.10.08.00', 'Materiales para equipos de computación', 4, ''),
('4.02.10.09.', 'Especies timbradas y valores', 3, ''),
('4.02.10.09.00', 'Especies timbradas y valores', 4, ''),
('4.02.10.10.', 'Útiles religiosos', 3, ''),
('4.02.10.10.00', 'Útiles religiosos', 4, ''),
('4.02.10.11.', 'Materiales eléctricos', 3, ''),
('4.02.10.11.00', 'Materiales eléctricos', 4, ''),
('4.02.10.12.', 'Materiales para instalaciones sanitarias', 3, ''),
('4.02.10.12.00', 'Materiales para instalaciones sanitarias', 4, ''),
('4.02.10.13.', 'Materiales fotográficos', 3, ''),
('4.02.10.13.00', 'Materiales fotográficos', 4, ''),
('4.02.10.99.', 'Otros productos y útiles diversos', 3, ''),
('4.02.10.99.00', 'Otros productos y útiles diversos', 4, ''),
('4.02.11.', 'Bienes para la venta', 2, ''),
('4.02.11.01.', 'Productos y artículos para la venta', 3, ''),
('4.02.11.01.00', 'Productos y artículos para la venta', 4, ''),
('4.02.11.02.', 'Maquinarias y equipos para la venta', 3, ''),
('4.02.11.02.00', 'Maquinarias y equipos para la venta', 4, ''),
('4.02.11.99.', 'Otros bienes para la venta', 3, ''),
('4.02.11.99.00', 'Otros bienes para la venta', 4, ''),
('4.02.99.', 'Otros materiales y suministros', 2, ''),
('4.02.99.01.', 'Otros materiales y suministros', 3, ''),
('4.02.99.01.00', 'Otros materiales y suministros', 4, ''),
('4.03.', 'Servicios no personales', 1, ''),
('4.03.01.', 'Alquileres de inmuebles', 2, ''),
('4.03.01.01.', 'Alquileres de edificios y locales', 3, ''),
('4.03.01.01.00', 'Alquileres de edificios y locales', 4, ''),
('4.03.01.02.', 'Alquileres de instalaciones culturales y recreativas', 3, ''),
('4.03.01.02.00', 'Alquileres de instalaciones culturales y recreativas', 4, ''),
('4.03.01.03.', 'Alquileres de tierras y terrenos', 3, ''),
('4.03.01.03.00', 'Alquileres de tierras y terrenos', 4, ''),
('4.03.02.', 'Alquileres de maquinaria y equipos', 2, ''),
('4.03.02.01.', 'Alquileres de maquinaria y demás equipos de construcción, campo, industria y taller', 3, ''),
('4.03.02.01.00', 'Alquileres de maquinaria y demás equipos de construcción, campo, industria y taller', 4, ''),
('4.03.02.02.', 'Alquileres de equipos de transporte, tracción y elevación', 3, ''),
('4.03.02.02.00', 'Alquileres de equipos de transporte, tracción y elevación', 4, ''),
('4.03.02.03.', 'Alquileres de equipos de comunicaciones y de señalamiento', 3, ''),
('4.03.02.03.00', 'Alquileres de equipos de comunicaciones y de señalamiento', 4, ''),
('4.03.02.04.', 'Alquileres de equipos médico - quirúrgicos, dentales y de veterinaria', 3, ''),
('4.03.02.04.00', 'Alquileres de equipos médico - quirúrgicos, dentales y de veterinaria', 4, ''),
('4.03.02.05.', 'Alquileres de equipos científicos, religiosos, de enseñanza y recreación', 3, ''),
('4.03.02.05.00', 'Alquileres de equipos científicos, religiosos, de enseñanza y recreación', 4, ''),
('4.03.02.06.', 'Alquileres de máquinas, muebles y demás equipos de oficina y alojamiento', 3, ''),
('4.03.02.06.00', 'Alquileres de máquinas, muebles y demás equipos de oficina y alojamiento', 4, ''),
('4.03.02.99.', 'Alquileres de otras maquinaria y equipos', 3, ''),
('4.03.02.99.00', 'Alquileres de otras maquinaria y equipos', 4, ''),
('4.03.03.', 'Derechos sobre bienes intangibles', 2, ''),
('4.03.03.01.', 'Marcas de fábrica y patentes de invención', 3, ''),
('4.03.03.01.00', 'Marcas de fábrica y patentes de invención', 4, ''),
('4.03.03.02.', 'Derechos de autor', 3, ''),
('4.03.03.02.00', 'Derechos de autor', 4, ''),
('4.03.03.03.', 'Paquetes y programas de computación', 3, ''),
('4.03.03.03.00', 'Paquetes y programas de computación', 4, ''),
('4.03.03.04.', 'Concesión de bienes y servicios', 3, ''),
('4.03.03.04.00', 'Concesión de bienes y servicios', 4, ''),
('4.03.04.', 'Servicios básicos', 2, ''),
('4.03.04.01.', 'Electricidad', 3, ''),
('4.03.04.01.00', 'Electricidad', 4, ''),
('4.03.04.02.', 'Gas', 3, ''),
('4.03.04.02.00', 'Gas', 4, ''),
('4.03.04.03.', 'Agua', 3, ''),
('4.03.04.03.00', 'Agua', 4, ''),
('4.03.04.04.', 'Teléfonos', 3, ''),
('4.03.04.04.00', 'Teléfonos', 4, ''),
('4.03.04.05.', 'Servicio de comunicaciones', 3, ''),
('4.03.04.05.00', 'Servicio de comunicaciones', 4, ''),
('4.03.04.06.', 'Servicio de aseo urbano y domiciliario', 3, ''),
('4.03.04.06.00', 'Servicio de aseo urbano y domiciliario', 4, ''),
('4.03.04.07.', 'Servicio de condominio', 3, ''),
('4.03.04.07.00', 'Servicio de condominio', 4, ''),
('4.03.05.', 'Servicio de administración, vigilancia y mantenimiento de los servicios básicos', 2, ''),
('4.03.05.01.', 'Servicio de administración, vigilancia y mantenimiento del servicio de electricidad', 3, ''),
('4.03.05.01.00', 'Servicio de administración, vigilancia y mantenimiento del servicio de electricidad', 4, ''),
('4.03.05.02.', 'Servicio de administración, vigilancia y mantenimiento del servicio de gas', 3, ''),
('4.03.05.02.00', 'Servicio de administración, vigilancia y mantenimiento del servicio de gas', 4, ''),
('4.03.05.03.', 'Servicio de administración, vigilancia y mantenimiento del servicio de agua', 3, ''),
('4.03.05.03.00', 'Servicio de administración, vigilancia y mantenimiento del servicio de agua', 4, ''),
('4.03.05.04.', 'Servicio de administración, vigilancia y mantenimiento del servicio de teléfonos', 3, ''),
('4.03.05.04.00', 'Servicio de administración, vigilancia y mantenimiento del servicio de teléfonos', 4, ''),
('4.03.05.05.', 'Servicio de administración, vigilancia y mantenimiento del servicio de comunicaciones', 3, ''),
('4.03.05.05.00', 'Servicio de administración, vigilancia y mantenimiento del servicio de comunicaciones', 4, ''),
('4.03.05.06.', 'Servicio de administración, vigilancia y mantenimiento del servicio de aseo urbano y domiciliario', 3, ''),
('4.03.05.06.00', 'Servicio de administración, vigilancia y mantenimiento del servicio de aseo urbano y domiciliario', 4, ''),
('4.03.06.', 'Servicios de transporte y almacenaje', 2, ''),
('4.03.06.01.', 'Fletes y embalajes', 3, ''),
('4.03.06.01.00', 'Fletes y embalajes', 4, ''),
('4.03.06.02.', 'Almacenaje', 3, ''),
('4.03.06.02.00', 'Almacenaje', 4, ''),
('4.03.06.03.', 'Estacionamiento', 3, ''),
('4.03.06.03.00', 'Estacionamiento', 4, ''),
('4.03.06.04.', 'Peaje', 3, ''),
('4.03.06.04.00', 'Peaje', 4, ''),
('4.03.06.05.', 'Servicios de protección en traslado de fondos y de mensajería', 3, ''),
('4.03.06.05.00', 'Servicios de protección en traslado de fondos y de mensajería', 4, ''),
('4.03.07.', 'Servicios de información, impresión y relaciones públicas', 2, ''),
('4.03.07.01.', 'Publicidad y propaganda', 3, ''),
('4.03.07.01.00', 'Publicidad y propaganda', 4, ''),
('4.03.07.02.', 'Imprenta y reproducción', 3, ''),
('4.03.07.02.00', 'Imprenta y reproducción', 4, ''),
('4.03.07.03.', 'Relaciones sociales', 3, ''),
('4.03.07.03.00', 'Relaciones sociales', 4, ''),
('4.03.07.04.', 'Avisos', 3, ''),
('4.03.07.04.00', 'Avisos', 4, ''),
('4.03.08.', 'Primas y otros gastos de seguros y comisiones bancarias', 2, ''),
('4.03.08.01.', 'Primas y gastos de seguros', 3, ''),
('4.03.08.01.00', 'Primas y gastos de seguros', 4, ''),
('4.03.08.02.', 'Comisiones y gastos bancarios', 3, ''),
('4.03.08.02.00', 'Comisiones y gastos bancarios', 4, ''),
('4.03.08.03.', 'Comisiones y gastos de adquisición de seguros', 3, ''),
('4.03.08.03.00', 'Comisiones y gastos de adquisición de seguros', 4, ''),
('4.03.09.', 'Viáticos y pasajes', 2, ''),
('4.03.09.01.', 'Viáticos y pasajes dentro del país', 3, ''),
('4.03.09.01.00', 'Viáticos y pasajes dentro del país', 4, ''),
('4.03.09.02.', 'Viáticos y pasajes fuera del país', 3, ''),
('4.03.09.02.00', 'Viáticos y pasajes fuera del país', 4, ''),
('4.03.09.03.', 'Asignación por kilómetros recorridos', 3, ''),
('4.03.09.03.00', 'Asignación por kilómetros recorridos', 4, ''),
('4.03.10.', 'Servicios profesionales y técnicos', 2, ''),
('4.03.10.01.', 'Servicios jurídicos', 3, ''),
('4.03.10.01.00', 'Servicios jurídicos', 4, ''),
('4.03.10.02.', 'Servicios de contabilidad y auditoría', 3, ''),
('4.03.10.02.00', 'Servicios de contabilidad y auditoría', 4, ''),
('4.03.10.03.', 'Servicios de procesamiento de datos', 3, ''),
('4.03.10.03.00', 'Servicios de procesamiento de datos', 4, ''),
('4.03.10.04.', 'Servicios de ingeniería y arquitectónicos', 3, ''),
('4.03.10.04.00', 'Servicios de ingeniería y arquitectónicos', 4, ''),
('4.03.10.05.', 'Servicios médicos, odontológicos y otros servicios de sanidad', 3, ''),
('4.03.10.05.00', 'Servicios médicos, odontológicos y otros servicios de sanidad', 4, ''),
('4.03.10.06.', 'Servicios de veterinaria', 3, ''),
('4.03.10.06.00', 'Servicios de veterinaria', 4, ''),
('4.03.10.07.', 'Servicios de capacitación y adiestramiento', 3, ''),
('4.03.10.07.00', 'Servicios de capacitación y adiestramiento', 4, ''),
('4.03.10.08.', 'Servicios presupuestarios', 3, ''),
('4.03.10.08.00', 'Servicios presupuestarios', 4, ''),
('4.03.10.09.', 'Servicios de lavandería y tintorería', 3, ''),
('4.03.10.09.00', 'Servicios de lavandería y tintorería', 4, ''),
('4.03.10.10.', 'Servicios de vigilancia', 3, ''),
('4.03.10.10.00', 'Servicios de vigilancia', 4, ''),
('4.03.10.11.', 'Servicios para la elaboración y suministro de comida ', 3, ''),
('4.03.10.11.00', 'Servicios para la elaboración y suministro de comida ', 4, ''),
('4.03.10.99.', 'Otros servicios profesionales y técnicos', 3, ''),
('4.03.10.99.00', 'Otros servicios profesionales y técnicos', 4, ''),
('4.03.11.', 'Conservación y reparaciones menores de maquinaria y equipos', 2, ''),
('4.03.11.01.', 'Conservación y reparaciones menores de maquinaria y demás equipos de construcción, campo, industria y taller', 3, ''),
('4.03.11.01.00', 'Conservación y reparaciones menores de maquinaria y demás equipos de construcción, campo, industria y taller', 4, ''),
('4.03.11.02.', 'Conservación y reparaciones menores de equipos de transporte, tracción y elevación', 3, ''),
('4.03.11.02.00', 'Conservación y reparaciones menores de equipos de transporte, tracción y elevación', 4, ''),
('4.03.11.03.', 'Conservación y reparaciones menores de equipos de comunicaciones y de señalamiento', 3, ''),
('4.03.11.03.00', 'Conservación y reparaciones menores de equipos de comunicaciones y de señalamiento', 4, ''),
('4.03.11.04.', 'Conservación y reparaciones menores de equipos médico-quirúrgicos, dentales y de veterinaria', 3, ''),
('4.03.11.04.00', 'Conservación y reparaciones menores de equipos médico-quirúrgicos, dentales y de veterinaria', 4, ''),
('4.03.11.05.', 'Conservación y reparaciones menores de equipos científicos, religiosos, de enseñanza y recreación', 3, ''),
('4.03.11.05.00', 'Conservación y reparaciones menores de equipos científicos, religiosos, de enseñanza y recreación', 4, ''),
('4.03.11.06.', 'Conservación y reparaciones menores de equipos y armamentos de orden público, seguridad y defensa nacional', 3, ''),
('4.03.11.06.00', 'Conservación y reparaciones menores de equipos y armamentos de orden público, seguridad y defensa nacional', 4, ''),
('4.03.11.07.', 'Conservación y reparaciones menores de máquinas, muebles y demás equipos de oficina y alojamiento', 3, ''),
('4.03.11.07.00', 'Conservación y reparaciones menores de máquinas, muebles y demás equipos de oficina y alojamiento', 4, ''),
('4.03.11.99.', 'Conservación y reparaciones menores de otras maquinaria y equipos', 3, ''),
('4.03.11.99.00', 'Conservación y reparaciones menores de otras maquinaria y equipos', 4, ''),
('4.03.12.', 'Conservación y reparaciones menores de obras', 2, ''),
('4.03.12.01.', 'Conservación y reparaciones menores de obras en bienes del dominio privado', 3, ''),
('4.03.12.01.00', 'Conservación y reparaciones menores de obras en bienes del dominio privado', 4, ''),
('4.03.12.02.', 'Conservación y reparaciones menores de obras en bienes del dominio público', 3, ''),
('4.03.12.02.00', 'Conservación y reparaciones menores de obras en bienes del dominio público', 4, ''),
('4.03.13.', 'Servicios de construcciones temporales', 2, ''),
('4.03.13.01.', 'Servicios de construcciones temporales', 3, ''),
('4.03.13.01.00', 'Servicios de construcciones temporales', 4, ''),
('4.03.14.', 'Servicios de  construcción de edificios para la venta', 2, ''),
('4.03.14.01.', 'Servicios de construcción de edificios para la venta', 3, ''),
('4.03.14.01.00', 'Servicios de construcción de edificios para la venta', 4, ''),
('4.03.15.', 'Servicios fiscales', 2, ''),
('4.03.15.01.', 'Derechos de importación y servicios aduaneros', 3, ''),
('4.03.15.01.00', 'Derechos de importación y servicios aduaneros', 4, ''),
('4.03.15.02.', 'Tasas y otros derechos obligatorios', 3, ''),
('4.03.15.02.00', 'Tasas y otros derechos obligatorios', 4, ''),
('4.03.15.03.', 'Asignación a  agentes de especies fiscales', 3, ''),
('4.03.15.03.00', 'Asignación a  agentes de especies fiscales', 4, ''),
('4.03.15.99.', 'Otros servicios fiscales ', 3, ''),
('4.03.15.99.00', 'Otros servicios fiscales ', 4, ''),
('4.03.16.', 'Servicios de diversión, esparcimiento y culturales', 2, ''),
('4.03.16.01.', 'Servicios de diversión, esparcimiento y culturales', 3, ''),
('4.03.16.01.00', 'Servicios de diversión, esparcimiento y culturales', 4, ''),
('4.03.17.', 'Servicios de gestión administrativa prestados por organismos de asistencia técnica', 2, ''),
('4.03.17.01.', 'Servicios de gestión administrativa prestados por organismos de asistencia técnica', 3, ''),
('4.03.17.01.00', 'Servicios de gestión administrativa prestados por organismos de asistencia técnica', 4, ''),
('4.03.18.', 'Impuestos indirectos', 2, ''),
('4.03.18.01.', 'Impuesto al valor agregado', 3, ''),
('4.03.18.01.00', 'Impuesto al valor agregado', 4, ''),
('4.03.18.99.', 'Otros impuestos indirectos', 3, ''),
('4.03.18.99.00', 'Otros impuestos indirectos', 4, ''),
('4.03.99.', 'Otros servicios no personales', 2, ''),
('4.03.99.01.', 'Otros servicios no personales', 3, ''),
('4.03.99.01.00', 'Otros servicios no personales', 4, ''),
('4.04.', 'Activos  reales', 1, ''),
('4.04.01.', 'Repuestos  y  reparaciones  mayores', 2, ''),
('4.04.01.01.', 'Repuestos mayores', 3, ''),
('4.04.01.01.01', 'Repuestos mayores para maquinaria y demás equipos de construcción, campo, industria y taller', 4, ''),
('4.04.01.01.02', 'Repuestos mayores para equipos de transporte, tracción y elevación', 4, ''),
('4.04.01.01.03', 'Repuestos mayores para equipos de comunicaciones y de señalamiento', 4, ''),
('4.04.01.01.04', 'Repuestos mayores para equipos médico-quirúrgicos, dentales y de veterinaria', 4, ''),
('4.04.01.01.05', 'Repuestos mayores para equipos científicos, religiosos, de enseñanza y recreación', 4, ''),
('4.04.01.01.06', 'Repuestos mayores para equipos de seguridad pública', 4, ''),
('4.04.01.01.07', 'Repuestos mayores para máquinas, muebles y demás equipos de oficina y alojamiento', 4, ''),
('4.04.01.01.99', 'Repuestos mayores para otras maquinaria y equipos', 4, ''),
('4.04.01.02.', 'Reparaciones mayores de maquinaria y equipos', 3, ''),
('4.04.01.02.01', 'Reparaciones mayores de maquinaria y demás equipos de construcción, campo, industria y taller', 4, '');
INSERT INTO `cwprecue` (`CodCue`, `Denominacion`, `Tipocta`, `Tipopuc`) VALUES
('4.04.01.02.02', 'Reparaciones mayores de equipos de transporte, tracción y elevación', 4, ''),
('4.04.01.02.03', 'Reparaciones mayores de equipos de comunicaciones y de señalamiento', 4, ''),
('4.04.01.02.04', 'Reparaciones mayores de equipos médico - quirúrgicos, dentales y de veterinaria', 4, ''),
('4.04.01.02.05', 'Reparaciones mayores de equipos científicos, religiosos, de enseñanza y recreación', 4, ''),
('4.04.01.02.06', 'Reparaciones mayores de equipos y armamentos de orden público, seguridad y defensa nacional', 4, ''),
('4.04.01.02.07', 'Reparaciones mayores de máquinas, muebles y demás equipos de oficina y alojamiento', 4, ''),
('4.04.01.02.99', 'Reparaciones mayores de otras maquinaria y equipos', 4, ''),
('4.04.02.', 'Conservación, ampliaciones y mejoras mayores de obras', 2, ''),
('4.04.02.01.', 'Conservación, ampliaciones y mejoras mayores de obras en bienes del dominio privado', 3, ''),
('4.04.02.01.00', 'Conservación, ampliaciones y mejoras mayores de obras en bienes del dominio privado', 4, ''),
('4.04.02.02.', 'Conservación, ampliaciones y mejoras mayores de obras en bienes del dominio público', 3, ''),
('4.04.02.02.00', 'Conservación, ampliaciones y mejoras mayores de obras en bienes del dominio público', 4, ''),
('4.04.03.', 'Maquinaria y demás equipos de construcción, campo, industria y taller', 2, ''),
('4.04.03.01.', 'Maquinaria y demás equipos de construcción y mantenimiento', 3, ''),
('4.04.03.01.00', 'Maquinaria y demás equipos de construcción y mantenimiento', 4, ''),
('4.04.03.02.', 'Maquinaria y equipos para mantenimiento de automotores', 3, ''),
('4.04.03.02.00', 'Maquinaria y equipos para mantenimiento de automotores', 4, ''),
('4.04.03.03.', 'Maquinaria y equipos agrícolas y pecuarios', 3, ''),
('4.04.03.03.00', 'Maquinaria y equipos agrícolas y pecuarios', 4, ''),
('4.04.03.04.', 'Maquinaria y equipos de artes gráficas y reproducción', 3, ''),
('4.04.03.04.00', 'Maquinaria y equipos de artes gráficas y reproducción', 4, ''),
('4.04.03.05.', 'Maquinaria y equipos industriales y de taller', 3, ''),
('4.04.03.05.00', 'Maquinaria y equipos industriales y de taller', 4, ''),
('4.04.03.06.', 'Maquinaria y equipos de energía', 3, ''),
('4.04.03.06.00', 'Maquinaria y equipos de energía', 4, ''),
('4.04.03.07.', 'Maquinaria y equipos de riego y acueductos', 3, ''),
('4.04.03.07.00', 'Maquinaria y equipos de riego y acueductos', 4, ''),
('4.04.03.08.', 'Equipos de almacén', 3, ''),
('4.04.03.08.00', 'Equipos de almacén', 4, ''),
('4.04.03.99.', 'Otra maquinaria y demás equipos de construcción, campo, industria y taller ', 3, ''),
('4.04.03.99.00', 'Otra maquinaria y demás equipos de construcción, campo, industria y taller ', 4, ''),
('4.04.04.', 'Equipos de transporte, tracción y elevación', 2, ''),
('4.04.04.01.', 'Vehículos automotores terrestres', 3, ''),
('4.04.04.01.00', 'Vehículos automotores terrestres', 4, ''),
('4.04.04.02.', 'Equipos ferroviarios y de cables aéreos', 3, ''),
('4.04.04.02.00', 'Equipos ferroviarios y de cables aéreos', 4, ''),
('4.04.04.03.', 'Equipos marítimos de transporte', 3, ''),
('4.04.04.03.00', 'Equipos marítimos de transporte', 4, ''),
('4.04.04.04.', 'Equipos aéreos de transporte', 3, ''),
('4.04.04.04.00', 'Equipos aéreos de transporte', 4, ''),
('4.04.04.05.', 'Vehículos de tracción no motorizados', 3, ''),
('4.04.04.05.00', 'Vehículos de tracción no motorizados', 4, ''),
('4.04.04.06.', 'Equipos auxiliares de transporte', 3, ''),
('4.04.04.06.00', 'Equipos auxiliares de transporte', 4, ''),
('4.04.04.99.', 'Otros equipos de transporte, tracción y elevación ', 3, ''),
('4.04.04.99.00', 'Otros equipos de transporte, tracción y elevación ', 4, ''),
('4.04.05.', 'Equipos de comunicaciones y de señalamiento', 2, ''),
('4.04.05.01.', 'Equipos de telecomunicaciones', 3, ''),
('4.04.05.01.00', 'Equipos de telecomunicaciones', 4, ''),
('4.04.05.02.', 'Equipos de señalamiento', 3, ''),
('4.04.05.02.00', 'Equipos de señalamiento', 4, ''),
('4.04.05.03.', 'Equipos de control de tráfico aéreo', 3, ''),
('4.04.05.03.00', 'Equipos de control de tráfico aéreo', 4, ''),
('4.04.05.04.', 'Equipos de correo', 3, ''),
('4.04.05.04.00', 'Equipos de correo', 4, ''),
('4.04.05.99.', 'Otros equipos de comunicaciones y de señalamiento  ', 3, ''),
('4.04.05.99.00', 'Otros equipos de comunicaciones y de señalamiento  ', 4, ''),
('4.04.06.', 'Equipos médico - quirúrgicos, dentales y de veterinaria', 2, ''),
('4.04.06.01.', 'Equipos médico - quirúrgicos, dentales y de veterinaria', 3, ''),
('4.04.06.01.00', 'Equipos médico - quirúrgicos, dentales y de veterinaria', 4, ''),
('4.04.06.99.', 'Otros equipos médico - quirúrgicos, dentales y de veterinaria', 3, ''),
('4.04.06.99.00', 'Otros equipos médico - quirúrgicos, dentales y de veterinaria', 4, ''),
('4.04.07.', 'Equipos científicos, religiosos, de enseñanza y recreación', 2, ''),
('4.04.07.01.', 'Equipos científicos y de laboratorio', 3, ''),
('4.04.07.01.00', 'Equipos científicos y de laboratorio', 4, ''),
('4.04.07.02.', 'Equipos de enseñanza, deporte y recreación', 3, ''),
('4.04.07.02.00', 'Equipos de enseñanza, deporte y recreación', 4, ''),
('4.04.07.03.', 'Obras de arte', 3, ''),
('4.04.07.03.00', 'Obras de arte', 4, ''),
('4.04.07.04.', 'Libros, revistas y otros instrumentos de enseñanzas', 3, ''),
('4.04.07.04.00', 'Libros, revistas y otros instrumentos de enseñanzas', 4, ''),
('4.04.07.05.', 'Equipos religiosos', 3, ''),
('4.04.07.05.00', 'Equipos religiosos', 4, ''),
('4.04.07.06.', 'Instrumentos musicales', 3, ''),
('4.04.07.06.00', 'Instrumentos musicales', 4, ''),
('4.04.07.99.', 'Otros equipos científicos, religiosos, de enseñanza y recreación ', 3, ''),
('4.04.07.99.00', 'Otros equipos científicos, religiosos, de enseñanza y recreación ', 4, ''),
('4.04.08.', 'Equipos y armamentos de orden público, seguridad y defensa nacional', 2, ''),
('4.04.08.01.', 'Equipos y armamentos de orden público, seguridad y defensa nacional', 3, ''),
('4.04.08.01.00', 'Equipos y armamentos de orden público, seguridad y defensa nacional', 4, ''),
('4.04.08.99.', 'Otros equipos y armamentos de orden público, seguridad y defensa nacional', 3, ''),
('4.04.08.99.00', 'Otros equipos y armamentos de orden público, seguridad y defensa nacional', 4, ''),
('4.04.09.', 'Máquinas, muebles y demás equipos de oficina y alojamiento', 2, ''),
('4.04.09.01.', 'Mobiliario y equipos de oficina', 3, ''),
('4.04.09.01.00', 'Mobiliario y equipos de oficina', 4, ''),
('4.04.09.02.', 'Equipos de computación', 3, ''),
('4.04.09.02.00', 'Equipos de computación', 4, ''),
('4.04.09.03.', 'Mobiliario y equipos de alojamiento', 3, ''),
('4.04.09.03.00', 'Mobiliario y equipos de alojamiento', 4, ''),
('4.04.09.99.', 'Otras máquinas, muebles y demás equipos de oficina y alojamiento', 3, ''),
('4.04.09.99.00', 'Otras máquinas, muebles y demás equipos de oficina y alojamiento', 4, ''),
('4.04.10.', 'Semovientes', 2, ''),
('4.04.10.01.', 'Semovientes', 3, ''),
('4.04.10.01.00', 'Semovientes', 4, ''),
('4.04.11.', 'Inmuebles, maquinaria y equipos usados', 2, ''),
('4.04.11.01.', 'Adquisición de tierras y terrenos', 3, ''),
('4.04.11.01.00', 'Adquisición de tierras y terrenos', 4, ''),
('4.04.11.02.', 'Adquisición de edificios e instalaciones', 3, ''),
('4.04.11.02.00', 'Adquisición de edificios e instalaciones', 4, ''),
('4.04.11.03.', 'Expropiación de tierras y terrenos', 3, ''),
('4.04.11.03.00', 'Expropiación de tierras y terrenos', 4, ''),
('4.04.11.04.', 'Expropiación de edificios e instalaciones', 3, ''),
('4.04.11.04.00', 'Expropiación de edificios e instalaciones', 4, ''),
('4.04.11.05.', 'Adquisición de maquinaria y equipos usados', 3, ''),
('4.04.11.05.01', 'Maquinaria y demás equipos de construcción, campo, industria y taller', 4, ''),
('4.04.11.05.02', 'Equipos de transporte, tracción y elevación', 4, ''),
('4.04.11.05.03', 'Equipos de comunicaciones y de señalamiento', 4, ''),
('4.04.11.05.04', 'Equipos médico - quirúrgicos, dentales y  de veterinaria', 4, ''),
('4.04.11.05.05', 'Equipos científicos, religiosos, de enseñanza y recreación', 4, ''),
('4.04.11.05.06', 'Equipos para seguridad pública', 4, ''),
('4.04.11.05.07', 'Máquinas, muebles y demás equipos de oficina y alojamiento', 4, ''),
('4.04.11.99.', ' Otros  inmuebles, maquinaria y equipos usados', 3, ''),
('4.04.11.99.00', ' Otros  inmuebles, maquinaria y equipos usados', 4, ''),
('4.04.12.', 'Activos intangibles', 2, ''),
('4.04.12.01.', 'Marcas de fábrica y patentes de invención', 3, ''),
('4.04.12.01.00', 'Marcas de fábrica y patentes de invención', 4, ''),
('4.04.12.02.', 'Derechos de autor', 3, ''),
('4.04.12.02.00', 'Derechos de autor', 4, ''),
('4.04.12.03.', 'Gastos de organización', 3, ''),
('4.04.12.03.00', 'Gastos de organización', 4, ''),
('4.04.12.04.', 'Paquetes y programas de computación', 3, ''),
('4.04.12.04.00', 'Paquetes y programas de computación', 4, ''),
('4.04.12.05.', 'Estudios y proyectos', 3, ''),
('4.04.12.05.00', 'Estudios y proyectos', 4, ''),
('4.04.12.99.', 'Otros activos intangibles ', 3, ''),
('4.04.12.99.00', 'Otros activos intangibles ', 4, ''),
('4.04.13.', 'Estudios y proyectos para inversión en activos fijos', 2, ''),
('4.04.13.01.', 'Estudios y proyectos aplicables a bienes del dominio privado', 3, ''),
('4.04.13.01.00', 'Estudios y proyectos aplicables a bienes del dominio privado', 4, ''),
('4.04.13.02.', 'Estudios y proyectos aplicables a bienes del dominio público', 3, ''),
('4.04.13.02.00', 'Estudios y proyectos aplicables a bienes del dominio público', 4, ''),
('4.04.14.', 'Contratación de inspección de obras', 2, ''),
('4.04.14.01.', 'Contratación de inspección de obras de bienes del dominio privado', 3, ''),
('4.04.14.01.00', 'Contratación de inspección de obras de bienes del dominio privado', 4, ''),
('4.04.14.02.', 'Contratación de inspección de obras de bienes del dominio público', 3, ''),
('4.04.14.02.00', 'Contratación de inspección de obras de bienes del dominio público', 4, ''),
('4.04.15.', 'Construcciones del dominio privado', 2, ''),
('4.04.15.01.', 'Construcciones de edificios médico-asistenciales', 3, ''),
('4.04.15.01.00', 'Construcciones de edificios médico-asistenciales', 4, ''),
('4.04.15.02.', 'Construcciones de edificios militares y de seguridad', 3, ''),
('4.04.15.02.00', 'Construcciones de edificios militares y de seguridad', 4, ''),
('4.04.15.03.', 'Construcciones de edificios educativos', 3, ''),
('4.04.15.03.00', 'Construcciones de edificios educativos', 4, ''),
('4.04.15.04.', 'Construcciones de edificios culturales', 3, ''),
('4.04.15.04.00', 'Construcciones de edificios culturales', 4, ''),
('4.04.15.05.', 'Construcciones de edificios para oficina', 3, ''),
('4.04.15.05.00', 'Construcciones de edificios para oficina', 4, ''),
('4.04.15.06.', 'Construcciones de edificios industriales', 3, ''),
('4.04.15.06.00', 'Construcciones de edificios industriales', 4, ''),
('4.04.16.', 'Construcciones del dominio público', 2, ''),
('4.04.16.01.', 'Construcción de vialidad', 3, ''),
('4.04.16.01.00', 'Construcción de vialidad', 4, ''),
('4.04.16.02.', 'Construcción de plazas, parques y similares', 3, ''),
('4.04.16.02.00', 'Construcción de plazas, parques y similares', 4, ''),
('4.04.16.03.', 'Construcciones de instalaciones hidráulicas', 3, ''),
('4.04.16.03.00', 'Construcciones de instalaciones hidráulicas', 4, ''),
('4.04.16.04.', 'Construcciones de puertos y aeropuertos', 3, ''),
('4.04.16.04.00', 'Construcciones de puertos y aeropuertos', 4, ''),
('4.04.99.', 'Otros activos reales', 2, ''),
('4.04.99.01.', 'Otros activos reales', 3, ''),
('4.04.99.01.00', 'Otros activos reales', 4, ''),
('4.05.', 'Activos  financieros', 1, ''),
('4.05.01.', 'Aportes en acciones y participaciones de capital', 2, ''),
('4.05.01.01.', 'Aportes en acciones y participaciones de capital al sector privado', 3, ''),
('4.05.01.01.00', 'Aportes en acciones y participaciones de capital al sector privado', 4, ''),
('4.05.01.02.', 'Aportes en acciones y participaciones de capital al sector público', 3, ''),
('4.05.01.02.01', 'Aportes en acciones y participaciones de capital a entes descentralizados sin fines empresariales', 4, ''),
('4.05.01.02.02', 'Aportes en acciones y participaciones de capital a instituciones de protección social', 4, ''),
('4.05.01.02.03', 'Aportes en acciones y participaciones de capital a entes descentralizados con fines empresariales petroleros', 4, ''),
('4.05.01.02.04', 'Aportes en acciones y participaciones de capital a entes descentralizados con fines empresariales no petroleros', 4, ''),
('4.05.01.02.05', 'Aportes en acciones y participaciones de capital a entes descentralizados financieros bancarios', 4, ''),
('4.05.01.02.06', 'Aportes en acciones y participaciones de capital a entes descentralizados financieros no bancarios', 4, ''),
('4.05.01.02.07', 'Aportes en acciones y participaciones de capital  a organismos del sector público para el pago de su deuda', 4, ''),
('4.05.01.03.', 'Aportes en acciones y participaciones de capital al sector externo', 3, ''),
('4.05.01.03.01', 'Aportes en acciones y participaciones de capital a organismos internacionales', 4, ''),
('4.05.01.03.99', 'Otros aportes en acciones y participaciones de capital  al sector  externo', 4, ''),
('4.05.02.', 'Adquisición de títulos y valores que no otorgan propiedad', 2, ''),
('4.05.02.01.', 'Adquisición de títulos y valores a corto plazo', 3, ''),
('4.05.02.01.01', 'Adquisición de títulos y valores privados', 4, ''),
('4.05.02.01.02', 'Adquisición de títulos y valores públicos', 4, ''),
('4.05.02.01.03', 'Adquisición de títulos y valores externos', 4, ''),
('4.05.02.02.', 'Adquisición de títulos y valores a largo plazo', 3, ''),
('4.05.02.02.01', 'Adquisición de títulos y valores privados', 4, ''),
('4.05.02.02.02', 'Adquisición de títulos y valores públicos', 4, ''),
('4.05.02.02.03', 'Adquisición de títulos y valores externos', 4, ''),
('4.05.03.', 'Concesión de préstamos a corto plazo', 2, ''),
('4.05.03.01.', 'Concesión de préstamos al sector privado a corto plazo', 3, ''),
('4.05.03.01.00', 'Concesión de préstamos al sector privado a corto plazo', 4, ''),
('4.05.03.02.', 'Concesión de préstamos al sector público a corto plazo', 3, ''),
('4.05.03.02.01', 'Concesión de préstamos a la República', 4, ''),
('4.05.03.02.02', 'Concesión de préstamos a entes descentralizados sin fines empresariales', 4, ''),
('4.05.03.02.03', 'Concesión de préstamos a instituciones de protección social', 4, ''),
('4.05.03.02.04', 'Concesión de préstamos a entes descentralizados con fines empresariales petroleros', 4, ''),
('4.05.03.02.05', 'Concesión de préstamos a entes descentralizados con fines empresariales no petroleros', 4, ''),
('4.05.03.02.06', 'Concesión de préstamos a entes descentralizados financieros bancarios', 4, ''),
('4.05.03.02.07', 'Concesión de préstamos a entes descentralizados financieras no bancarios', 4, ''),
('4.05.03.02.08', 'Concesión de préstamos al Poder Estadal', 4, ''),
('4.05.03.02.09', 'Concesión de préstamos al Poder Municipal', 4, ''),
('4.05.03.03.', 'Concesión de préstamos al sector externo a corto plazo ', 3, ''),
('4.05.03.03.01', 'Concesión de préstamos a instituciones sin fines de lucro ', 4, ''),
('4.05.03.03.02', 'Concesión de préstamos a gobiernos extranjeros ', 4, ''),
('4.05.03.03.03', 'Concesión de préstamos a organismos internacionales ', 4, ''),
('4.05.04.', 'Concesión de préstamos a largo plazo', 2, ''),
('4.05.04.01.', 'Concesión de préstamos al sector privado a largo plazo', 3, ''),
('4.05.04.01.00', 'Concesión de préstamos al sector privado a largo plazo', 4, ''),
('4.05.04.02.', 'Concesión de préstamos al sector público a largo plazo', 3, ''),
('4.05.04.02.01', 'Concesión de préstamos a la República', 4, ''),
('4.05.04.02.02', 'Concesión de préstamos a entes descentralizados sin fines empresariales', 4, ''),
('4.05.04.02.03', 'Concesión de préstamos a instituciones de protección social', 4, ''),
('4.05.04.02.04', 'Concesión de préstamos a entes descentralizados con fines empresariales petroleros', 4, ''),
('4.05.04.02.05', 'Concesión de préstamos a entes descentralizados con fines empresariales no petroleros', 4, ''),
('4.05.04.02.06', 'Concesión de préstamos a entes descentralizados financieros bancarios', 4, ''),
('4.05.04.02.07', 'Concesión de préstamos a entes descentralizados financieros no bancarios', 4, ''),
('4.05.04.02.08', 'Concesión de préstamos al Poder Estadal', 4, ''),
('4.05.04.02.09', 'Concesión de préstamos al Poder Municipal', 4, ''),
('4.05.04.03.', 'Concesión de préstamos al sector externo a largo plazo ', 3, ''),
('4.05.04.03.01', 'Concesión de préstamos a instituciones sin fines de lucro ', 4, ''),
('4.05.04.03.02', 'Concesión de préstamos a gobiernos extranjeros ', 4, ''),
('4.05.04.03.03', 'Concesión de préstamos a organismos internacionales ', 4, ''),
('4.05.05.', 'Incremento de disponibilidades', 2, ''),
('4.05.05.01.', 'Incremento en caja', 3, ''),
('4.05.05.01.00', 'Incremento en caja', 4, ''),
('4.05.05.02.', 'Incremento en bancos', 3, ''),
('4.05.05.02.01', 'Incremento en bancos públicos', 4, ''),
('4.05.05.02.02', 'Incremento en bancos privados', 4, ''),
('4.05.05.02.03', 'Incremento en bancos del exterior', 4, ''),
('4.05.05.03.', 'Incremento de inversiones temporales', 3, ''),
('4.05.05.03.00', 'Incremento de inversiones temporales', 4, ''),
('4.05.06.', 'Incremento de cuentas por cobrar a corto plazo', 2, ''),
('4.05.06.01.', 'Incremento de cuentas comerciales por cobrar a corto plazo', 3, ''),
('4.05.06.01.00', 'Incremento de cuentas comerciales por cobrar a corto plazo', 4, ''),
('4.05.06.02.', 'Incremento de rentas por recaudar a corto plazo', 3, ''),
('4.05.06.02.00', 'Incremento de rentas por recaudar a corto plazo', 4, ''),
('4.05.06.03.', 'Incremento de deudas por rendir ', 3, ''),
('4.05.06.03.01', 'Incremento de deudas por rendir de fondos en avance', 4, ''),
('4.05.06.03.02', 'Incremento de deudas por rendir de fondos en anticipo', 4, ''),
('4.05.06.99.', 'Incremento de otras cuentas por cobrar a corto plazo', 3, ''),
('4.05.06.99.00', 'Incremento de otras cuentas por cobrar a corto plazo', 4, ''),
('4.05.07.', 'Incremento de efectos por cobrar a corto plazo', 2, ''),
('4.05.07.01.', 'Incremento de efectos comerciales por cobrar a corto plazo', 3, ''),
('4.05.07.01.00', 'Incremento de efectos comerciales por cobrar a corto plazo', 4, ''),
('4.05.07.99.', 'Incremento de otros efectos por cobrar a corto plazo', 3, ''),
('4.05.07.99.00', 'Incremento de otros efectos por cobrar a corto plazo', 4, ''),
('4.05.08.', 'Incremento de cuentas por cobrar a mediano y largo plazo', 2, ''),
('4.05.08.01.', 'Incremento de cuentas comerciales por cobrar a mediano y largo plazo', 3, ''),
('4.05.08.01.00', 'Incremento de cuentas comerciales por cobrar a mediano y largo plazo', 4, ''),
('4.05.08.02.', 'Incremento de rentas por recaudar a mediano y largo plazo', 3, ''),
('4.05.08.02.00', 'Incremento de rentas por recaudar a mediano y largo plazo', 4, ''),
('4.05.08.99.', 'Incremento de otras cuentas por cobrar a mediano y largo plazo', 3, ''),
('4.05.08.99.00', 'Incremento de otras cuentas por cobrar a mediano y largo plazo', 4, ''),
('4.05.09.', 'Incremento de efectos por cobrar a mediano y largo plazo', 2, ''),
('4.05.09.01.', 'Incremento de efectos comerciales por cobrar a mediano y largo plazo', 3, ''),
('4.05.09.01.00', 'Incremento de efectos comerciales por cobrar a mediano y largo plazo', 4, ''),
('4.05.09.99.', 'Incremento de otros efectos por cobrar a mediano y largo plazo', 3, ''),
('4.05.09.99.00', 'Incremento de otros efectos por cobrar a mediano y largo plazo', 4, ''),
('4.05.10.', 'Incremento de fondos en avance, en anticipos y en fideicomiso', 2, ''),
('4.05.10.01.', 'Incremento de fondos en avance', 3, ''),
('4.05.10.01.00', 'Incremento de fondos en avance', 4, ''),
('4.05.10.02.', 'Incremento de fondos en anticipos ', 3, ''),
('4.05.10.02.00', 'Incremento de fondos en anticipos ', 4, ''),
('4.05.10.03.', 'Incremento de fondos en fideicomiso', 3, ''),
('4.05.10.03.00', 'Incremento de fondos en fideicomiso', 4, ''),
('4.05.10.04.', 'Incremento de anticipos a proveedores  ', 3, ''),
('4.05.10.04.00', 'Incremento de anticipos a proveedores  ', 4, ''),
('4.05.10.05.', 'Incremento de anticipos a contratistas por contratos de corto plazo  ', 3, ''),
('4.05.10.05.00', 'Incremento de anticipos a contratistas por contratos de corto plazo  ', 4, ''),
('4.05.10.06.', 'Incremento de anticipos a contratistas por contratos de mediano y largo plazo  ', 3, ''),
('4.05.10.06.00', 'Incremento de anticipos a contratistas por contratos de mediano y largo plazo  ', 4, ''),
('4.05.11.', 'Incremento de activos diferidos a corto plazo', 2, ''),
('4.05.11.01.', 'Incremento de gastos a corto plazo pagados por anticipado', 3, ''),
('4.05.11.01.01', 'Incremento de intereses de la deuda pública interna a corto plazo pagados por anticipado ', 4, ''),
('4.05.11.01.02', 'Incremento de intereses de la deuda pública externa a corto plazo pagados por anticipado', 4, ''),
('4.05.11.01.03', 'Incremento de otros intereses a corto plazo pagados por anticipado', 4, ''),
('4.05.11.01.04', 'Incremento de débitos por apertura de carta de crédito a corto plazo', 4, ''),
('4.05.11.01.99', 'Incremento de otros gastos a corto plazo pagados por anticipado', 4, ''),
('4.05.11.02.', 'Incremento de depósitos otorgados en garantía a corto plazo', 3, ''),
('4.05.11.02.00', 'Incremento de depósitos otorgados en garantía a corto plazo', 4, ''),
('4.05.11.99.', 'Incremento de otros activos diferidos a corto plazo', 3, ''),
('4.05.11.99.00', 'Incremento de otros activos diferidos a corto plazo', 4, ''),
('4.05.12.', 'Incremento de activos diferidos a mediano y largo plazo', 2, ''),
('4.05.12.01.', 'Incremento de gastos a mediano y largo plazo pagados por anticipado', 3, ''),
('4.05.12.01.01', 'Incremento de intereses de la deuda pública interna a largo plazo pagados por anticipado ', 4, ''),
('4.05.12.01.02', 'Incremento de intereses de la deuda pública externa a largo plazo pagados por anticipado', 4, ''),
('4.05.12.01.08', 'Incremento de otros intereses a mediano y largo plazo pagados por anticipado', 4, ''),
('4.05.12.01.99', 'Incremento de otros gastos a mediano y largo plazo pagados por anticipado', 4, ''),
('4.05.12.02.', 'Incremento de depósitos otorgados en garantía a mediano y largo plazo', 3, ''),
('4.05.12.02.00', 'Incremento de depósitos otorgados en garantía a mediano y largo plazo', 4, ''),
('4.05.12.99.', 'Incremento de otros activos diferidos a mediano y largo plazo', 3, ''),
('4.05.12.99.00', 'Incremento de otros activos diferidos a mediano y largo plazo', 4, ''),
('4.05.13.', 'Incremento del Fondo de Estabilización Macroeconómica (FEM)', 2, ''),
('4.05.13.01.', 'Incremento del Fondo de Estabilización Macroeconómica (FEM) de la República', 3, ''),
('4.05.13.01.00', 'Incremento del Fondo de Estabilización Macroeconómica (FEM) de la República', 4, ''),
('4.05.13.02.', 'Incremento del Fondo de Estabilización Macroeconómica (FEM) del Poder Estadal', 3, ''),
('4.05.13.02.00', 'Incremento del Fondo de Estabilización Macroeconómica (FEM) del Poder Estadal', 4, ''),
('4.05.13.03.', 'Incremento del Fondo de Estabilización Macroeconómica (FEM) del Poder Municipal', 3, ''),
('4.05.13.03.00', 'Incremento del Fondo de Estabilización Macroeconómica (FEM) del Poder Municipal', 4, ''),
('4.05.14.', 'Incremento  del Fondo de Ahorro Intergeneracional', 2, ''),
('4.05.14.01.', 'Incremento  del Fondo de Ahorro Intergeneracional', 3, ''),
('4.05.14.01.00', 'Incremento  del Fondo de Ahorro Intergeneracional', 4, ''),
('4.05.15.', 'Incremento del Fondo de Desarrollo Nacional', 2, ''),
('4.05.15.01.', 'Incremento del Fondo de Desarrollo Nacional', 3, ''),
('4.05.15.01.00', 'Incremento del Fondo de Desarrollo Nacional', 4, ''),
('4.05.16.', 'Incremento del Fondo de Aportes del Sector Público ', 2, ''),
('4.05.16.01.', 'Incremento del Fondo de Aportes del Sector Público ', 3, ''),
('4.05.16.01.00', 'Incremento del Fondo de Aportes del Sector Público ', 4, ''),
('4.05.20.', 'Incremento de otros activos financieros circulantes', 2, ''),
('4.05.20.01.', 'Incremento de otros activos financieros circulantes', 3, ''),
('4.05.20.01.00', 'Incremento de otros activos financieros circulantes', 4, ''),
('4.05.21.', 'Incremento de otros activos financieros no circulantes', 2, ''),
('4.05.21.01.', 'Incremento de activos en gestión judicial a mediano y largo plazo', 3, ''),
('4.05.21.01.00', 'Incremento de activos en gestión judicial a mediano y largo plazo', 4, ''),
('4.05.21.02.', 'Incremento de títulos y otros valores de la deuda pública en litigio a largo plazo', 3, ''),
('4.05.21.02.00', 'Incremento de títulos y otros valores de la deuda pública en litigio a largo plazo', 4, ''),
('4.05.21.99.', 'Incremento de otros activos financieros no circulantes', 3, ''),
('4.05.21.99.00', 'Incremento de otros activos financieros no circulantes', 4, ''),
('4.05.99.', 'Otros activos financieros', 2, ''),
('4.05.99.01.', 'Otros activos financieros', 3, ''),
('4.05.99.01.00', 'Otros activos financieros', 4, ''),
('4.06.', 'Gastos de defensa y seguridad del estado', 1, ''),
('4.06.01.', 'Gastos de defensa y seguridad del Estado', 2, ''),
('4.06.01.01.', 'Gastos de defensa y seguridad del Estado', 3, ''),
('4.06.01.01.00', 'Gastos de defensa y seguridad del Estado', 4, ''),
('4.07.', 'Transferencias y donaciones', 1, ''),
('4.07.01.', 'Transferencias y donaciones corrientes internas', 2, ''),
('4.07.01.01.', 'Transferencias corrientes internas al sector privado', 3, ''),
('4.07.01.01.01', 'Pensiones', 4, ''),
('4.07.01.01.02', 'Jubilaciones', 4, ''),
('4.07.01.01.03', 'Becas escolares', 4, ''),
('4.07.01.01.04', 'Becas universitarias en el país', 4, ''),
('4.07.01.01.05', 'Becas de perfeccionamiento profesional en el país', 4, ''),
('4.07.01.01.06', 'Becas para estudios en el extranjero', 4, ''),
('4.07.01.01.07', 'Otras becas', 4, ''),
('4.07.01.01.08', 'Previsión por accidentes de trabajo', 4, ''),
('4.07.01.01.09', 'Aguinaldos al personal pensionado', 4, ''),
('4.07.01.01.10', 'Aportes a caja de ahorro del personal pensionado', 4, ''),
('4.07.01.01.11', 'Aportes al seguro de hospitalización, cirugía y maternidad del personal pensionado', 4, ''),
('4.07.01.01.12', 'Otras subvenciones socio - económicas del personal pensionado', 4, ''),
('4.07.01.01.13', 'Aguinaldos al personal jubilado', 4, ''),
('4.07.01.01.14', 'Aportes a caja de ahorro del personal jubilado', 4, ''),
('4.07.01.01.15', 'Aportes al seguro de hospitalización, cirugía y maternidad del  personal jubilado', 4, ''),
('4.07.01.01.16', 'Otras subvenciones socio - económicas del personal jubilado', 4, ''),
('4.07.01.01.30', 'Incapacidad temporal sin hospitalización ', 4, ''),
('4.07.01.01.31', 'Incapacidad temporal con hospitalización ', 4, ''),
('4.07.01.01.32', 'Reposo por maternidad ', 4, ''),
('4.07.01.01.33', 'Indemnización por paro forzoso ', 4, ''),
('4.07.01.01.34', 'Otros tipos de incapacidad temporal', 4, ''),
('4.07.01.01.35', 'Indemnización por comisión por pensiones ', 4, ''),
('4.07.01.01.36', 'Indemnización por comisión por cesantía ', 4, ''),
('4.07.01.01.37', 'Incapacidad parcial ', 4, ''),
('4.07.01.01.38', 'Invalidez', 4, ''),
('4.07.01.01.39', 'Pensiones por vejez, viudez y orfandad ', 4, ''),
('4.07.01.01.40', 'Indemnización por cesantía ', 4, ''),
('4.07.01.01.41', 'Otras pensiones y demás prestaciones en dinero', 4, ''),
('4.07.01.01.42', 'Incapacidad parcial por accidente común', 4, ''),
('4.07.01.01.43', 'Incapacidad parcial por enfermedades profesionales ', 4, ''),
('4.07.01.01.44', 'Incapacidad parcial por accidente de trabajo ', 4, ''),
('4.07.01.01.45', 'Indemnización única por invalidez ', 4, ''),
('4.07.01.01.46', 'Indemnización única por vejez ', 4, ''),
('4.07.01.01.47', 'Sobrevivientes por enfermedad común ', 4, ''),
('4.07.01.01.48', 'Sobrevivientes por accidente común ', 4, ''),
('4.07.01.01.49', 'Sobrevivientes por enfermedades profesionales', 4, ''),
('4.07.01.01.50', 'Sobrevivientes por accidentes de trabajo ', 4, ''),
('4.07.01.01.51', 'Indemnizaciones por conmutación de renta ', 4, ''),
('4.07.01.01.52', 'Indemnizaciones por conmutación de pensiones', 4, ''),
('4.07.01.01.53', 'Indemnizaciones por comisión de renta', 4, ''),
('4.07.01.01.54', 'Asignación por nupcias ', 4, ''),
('4.07.01.01.55', 'Asignación por funeraria ', 4, ''),
('4.07.01.01.56', 'Otras asignaciones ', 4, ''),
('4.07.01.01.70', 'Subsidios educacionales al sector privado', 4, ''),
('4.07.01.01.71', 'Subsidios a universidades privadas', 4, ''),
('4.07.01.01.72', 'Subsidios culturales al sector privado', 4, ''),
('4.07.01.01.73', 'Subsidios a instituciones benéficas privadas', 4, ''),
('4.07.01.01.74', 'Subsidios a centros de empleados', 4, ''),
('4.07.01.01.75', 'Subsidios a organismos laborales y gremiales', 4, ''),
('4.07.01.01.76', 'Subsidios a entidades religiosas', 4, ''),
('4.07.01.01.77', 'Subsidios a entidades deportivas y recreativas de carácter privado', 4, ''),
('4.07.01.01.78', 'Subsidios científicos al sector privado', 4, ''),
('4.07.01.01.79', 'Subsidios a cooperativas', 4, ''),
('4.07.01.01.80', 'Subsidios a empresas privadas', 4, ''),
('4.07.01.01.99', 'Otras transferencias corrientes internas al sector privado', 4, ''),
('4.07.01.02.', 'Donaciones corrientes internas al sector privado', 3, ''),
('4.07.01.02.01', 'Donaciones corrientes a personas', 4, ''),
('4.07.01.02.02', 'Donaciones corrientes a instituciones sin fines de lucro', 4, ''),
('4.07.01.03.', 'Transferencias corrientes internas al sector público', 3, ''),
('4.07.01.03.01', 'Transferencias corrientes a la República', 4, ''),
('4.07.01.03.02', 'Transferencias corrientes a entes descentralizados sin fines empresariales ', 4, ''),
('4.07.01.03.03', 'Transferencias corrientes a entes descentralizados sin fines empresariales para atender beneficios de la seguridad social', 4, ''),
('4.07.01.03.04', 'Transferencias corrientes a instituciones de protección social ', 4, ''),
('4.07.01.03.05', 'Transferencias corrientes a instituciones de protección social para atender beneficios de la seguridad social', 4, ''),
('4.07.01.03.06', 'Transferencias corrientes a entes descentralizados con fines empresariales petroleros', 4, ''),
('4.07.01.03.07', 'Transferencias corrientes a entes descentralizados con fines empresariales no petroleros', 4, ''),
('4.07.01.03.08', 'Transferencias corrientes a entes descentralizados financieros bancarios', 4, ''),
('4.07.01.03.09', 'Transferencias corrientes a entes descentralizados financieros no bancarios', 4, ''),
('4.07.01.03.10', 'Transferencias corrientes al Poder Estadal', 4, ''),
('4.07.01.03.11', 'Transferencias corrientes  al Poder Municipal', 4, ''),
('4.07.01.03.13', 'Subsidios otorgados por normas externas', 4, ''),
('4.07.01.03.14', 'Incentivos otorgados por normas externas', 4, ''),
('4.07.01.03.15', 'Subsidios otorgados por precios políticos', 4, ''),
('4.07.01.03.16', 'Subsidios de costos sociales por normas externas', 4, ''),
('4.07.01.04.', 'Donaciones corrientes internas al sector público', 3, ''),
('4.07.01.04.01', 'Donaciones corrientes a la República', 4, ''),
('4.07.01.04.02', 'Donaciones corrientes a entes descentralizados sin fines empresariales', 4, ''),
('4.07.01.04.03', 'Donaciones corrientes a instituciones de protección social', 4, ''),
('4.07.01.04.04', 'Donaciones corrientes a entes descentralizados con fines empresariales petroleros', 4, ''),
('4.07.01.04.05', 'Donaciones corrientes a entes descentralizados con fines empresariales no petroleros', 4, ''),
('4.07.01.04.06', 'Donaciones corrientes a entes descentralizados financieros bancarios', 4, ''),
('4.07.01.04.07', 'Donaciones corrientes a entes descentralizados financieros no bancarios', 4, ''),
('4.07.01.04.08', 'Donaciones corrientes al Poder Estadal', 4, ''),
('4.07.01.04.09', 'Donaciones corrientes  al Poder Municipal', 4, ''),
('4.07.02.', 'Transferencias y donaciones corrientes al exterior', 2, ''),
('4.07.02.01.', 'Transferencias corrientes al exterior', 3, ''),
('4.07.02.01.01', 'Becas de capacitación e investigación en el exterior', 4, ''),
('4.07.02.01.02', 'Transferencias corrientes a instituciones sin fines de lucro', 4, ''),
('4.07.02.01.03', 'Transferencias corrientes a gobiernos extranjeros', 4, ''),
('4.07.02.01.04', 'Transferencias corrientes a organismos internacionales', 4, ''),
('4.07.02.02.', 'Donaciones corrientes al exterior', 3, ''),
('4.07.02.02.01', 'Donaciones corrientes a personas', 4, ''),
('4.07.02.02.02', 'Donaciones corrientes a instituciones sin fines de lucro', 4, ''),
('4.07.02.02.03', 'Donaciones corrientes a gobiernos extranjeros', 4, ''),
('4.07.02.02.04', 'Donaciones corrientes a organismos internacionales', 4, ''),
('4.07.03.', 'Transferencias y donaciones de capital internas', 2, ''),
('4.07.03.01.', 'Transferencias de capital internas al sector privado', 3, ''),
('4.07.03.01.01', 'Transferencias de capital a personas', 4, ''),
('4.07.03.01.02', 'Transferencias de capital a instituciones sin fines de lucro', 4, ''),
('4.07.03.01.03', 'Transferencias de capital a empresas privadas', 4, ''),
('4.07.03.02.', 'Donaciones de capital internas al sector privado', 3, ''),
('4.07.03.02.01', 'Donaciones de capital a personas', 4, ''),
('4.07.03.02.02', 'Donaciones de capital a instituciones sin fines de lucro', 4, ''),
('4.07.03.03.', 'Transferencias de capital internas al sector público', 3, ''),
('4.07.03.03.01', 'Transferencias de capital a la República', 4, ''),
('4.07.03.03.02', 'Transferencias de capital a entes descentralizados sin fines empresariales', 4, ''),
('4.07.03.03.03', 'Transferencias de capital a instituciones de protección social', 4, ''),
('4.07.03.03.04', 'Transferencias de capital a entes descentralizados con fines empresariales petroleros', 4, ''),
('4.07.03.03.05', 'Transferencias de capital a entes descentralizados con fines empresariales no petroleros', 4, ''),
('4.07.03.03.06', 'Transferencias de capital a entes descentralizados financieros bancarios', 4, ''),
('4.07.03.03.07', 'Transferencias de capital a entes descentralizados financieros no bancarios', 4, ''),
('4.07.03.03.08', 'Transferencias de capital al Poder Estadal', 4, ''),
('4.07.03.03.09', 'Transferencias de capital al Poder Municipal', 4, ''),
('4.07.03.04.', 'Donaciones de capital internas al sector público ', 3, ''),
('4.07.03.04.01', 'Donaciones de capital a la República', 4, ''),
('4.07.03.04.02', 'Donaciones de capital a entes descentralizados sin fines empresariales', 4, ''),
('4.07.03.04.03', 'Donaciones de capital a instituciones de protección social', 4, ''),
('4.07.03.04.04', 'Donaciones de capital a entes descentralizados con fines empresariales petroleros', 4, ''),
('4.07.03.04.05', 'Donaciones de capital a entes descentralizados con fines empresariales no petroleros', 4, ''),
('4.07.03.04.06', 'Donaciones de capital a entes descentralizados financieros bancarios', 4, ''),
('4.07.03.04.07', 'Donaciones de capital a entes descentralizados financieros no bancarios', 4, ''),
('4.07.03.04.08', 'Donaciones de capital al Poder Estadal', 4, ''),
('4.07.03.04.09', 'Donaciones de capital al Poder Municipal', 4, ''),
('4.07.04.', 'Transferencias y donaciones de capital al exterior', 2, ''),
('4.07.04.01.', 'Transferencias de capital al exterior', 3, ''),
('4.07.04.01.01', 'Transferencias de capital a personas', 4, ''),
('4.07.04.01.02', 'Transferencias de capital a instituciones sin fines de lucro', 4, ''),
('4.07.04.01.03', 'Transferencias de capital a gobiernos extranjeros', 4, ''),
('4.07.04.01.04', 'Transferencias de capital a organismos internacionales', 4, ''),
('4.07.04.02.', 'Donaciones de capital al exterior', 3, ''),
('4.07.04.02.01', 'Donaciones de capital a personas', 4, ''),
('4.07.04.02.02', 'Donaciones de capital a instituciones sin fines de lucro', 4, ''),
('4.07.04.02.03', 'Donaciones de capital a gobiernos extranjeros', 4, ''),
('4.07.04.02.04', 'Donaciones de capital a organismos internacionales', 4, ''),
('4.07.05.', 'Situado', 2, ''),
('4.07.05.01.', 'Situado Constitucional', 3, ''),
('4.07.05.01.01', 'Situado Estadal', 4, ''),
('4.07.05.01.02', 'Situado Municipal', 4, ''),
('4.07.05.01.03', 'Subsidio de régimen especial', 4, ''),
('4.07.05.02.', 'Situado Estadal a Municipal', 3, ''),
('4.07.05.02.00', 'Situado Estadal a Municipal', 4, ''),
('4.07.06.', 'Subsidio de Régimen Especial', 2, ''),
('4.07.06.01.', 'Subsidio de Régimen Especial', 3, ''),
('4.07.06.01.00', 'Subsidio de Régimen Especial', 4, ''),
('4.07.07.', 'Subsidio de capitalidad ', 2, ''),
('4.07.07.01.', 'Subsidio de capitalidad ', 3, ''),
('4.07.07.01.00', 'Subsidio de capitalidad ', 4, ''),
('4.07.08.', 'Asignaciones Económicas Especiales (LAEE)', 2, ''),
('4.07.08.01.', 'Asignaciones Económicas Especiales (LAEE) Estadal', 3, ''),
('4.07.08.01.00', 'Asignaciones Económicas Especiales (LAEE) Estadal', 4, ''),
('4.07.08.02.', 'Asignaciones Económicas Especiales (LAEE) Estadal a Municipal', 3, ''),
('4.07.08.02.00', 'Asignaciones Económicas Especiales (LAEE) Estadal a Municipal', 4, ''),
('4.07.08.03.', 'Asignaciones Económicas Especiales (LAEE) Municipal', 3, ''),
('4.07.08.03.00', 'Asignaciones Económicas Especiales (LAEE) Municipal', 4, ''),
('4.07.08.04.', 'Asignaciones Económicas Especiales - Fondo Nacional de Consejos Comunales', 3, ''),
('4.07.08.04.00', 'Asignaciones Económicas Especiales - Fondo Nacional de Consejos Comunales', 4, ''),
('4.07.09.', 'Aportes a los Estados y Municipios por transferencia de servicios', 2, ''),
('4.07.09.01.', 'Aportes a los Estados por transferencia de servicios', 3, ''),
('4.07.09.01.00', 'Aportes a los Estados por transferencia de servicios', 4, ''),
('4.07.09.02.', 'Aportes a los Municipios por transferencia de servicios', 3, ''),
('4.07.09.02.00', 'Aportes a los Municipios por transferencia de servicios', 4, ''),
('4.07.10.', 'Fondo Intergubernamental para la Descentralización (FIDES)', 2, ''),
('4.07.10.01.', 'Fondo Intergubernamental para la Descentralización (FIDES)', 3, ''),
('4.07.10.01.00', 'Fondo Intergubernamental para la Descentralización (FIDES)', 4, ''),
('4.07.11.', 'Fondo de Compensación Interterritorial', 2, ''),
('4.07.11.01.', 'Fondo de Compensación Interterritorial', 3, ''),
('4.07.11.01.00', 'Fondo de Compensación Interterritorial', 4, ''),
('4.07.12.', 'Transferencias y Donaciones a Consejos Comunales', 2, ''),
('4.07.12.01.', 'Transferencias y Donaciones Corrientes a Consejos Comunales', 3, ''),
('4.07.12.01.01', 'Transferencias Corrientes a Consejos Comunales', 4, ''),
('4.07.12.01.02', 'Donaciones Corrientes a Consejos Comunales', 4, ''),
('4.07.12.02.', 'Transferencias y Donaciones de Capital a Consejos Comunales', 3, ''),
('4.07.12.02.01', 'Transferencias de Capital a Consejos Comunales', 4, ''),
('4.07.12.02.02', 'Donaciones de Capital a Consejos Comunales', 4, ''),
('4.08.', 'Otros gastos', 1, ''),
('4.08.01.', 'Depreciación y amortización ', 2, ''),
('4.08.01.01.', 'Depreciación  ', 3, ''),
('4.08.01.01.01', 'Depreciación de edificios e instalaciones', 4, ''),
('4.08.01.01.02', 'Depreciación de maquinaria y demás equipos de construcción, campo, industria y taller ', 4, ''),
('4.08.01.01.03', 'Depreciación de equipos de transporte, tracción y elevación ', 4, ''),
('4.08.01.01.04', 'Depreciación de equipos de comunicaciones y de señalamiento', 4, ''),
('4.08.01.01.05', 'Depreciación de equipos médico - quirúrgicos, dentales y de veterinaria', 4, ''),
('4.08.01.01.06', 'Depreciación de equipos científicos, religiosos, de enseñanza y recreación', 4, ''),
('4.08.01.01.07', 'Depreciación de equipos para la seguridad pública', 4, ''),
('4.08.01.01.08', 'Depreciación de máquinas, muebles y demás equipos de oficina y alojamiento', 4, ''),
('4.08.01.01.09', 'Depreciación  de semovientes', 4, ''),
('4.08.01.01.99', 'Depreciación  de otros bienes de uso', 4, ''),
('4.08.01.02.', 'Amortización ', 3, ''),
('4.08.01.02.01', 'Amortización de marcas de fábrica y patentes de invención', 4, ''),
('4.08.01.02.02', 'Amortización de derechos de autor', 4, ''),
('4.08.01.02.03', 'Amortización de gastos de organización', 4, ''),
('4.08.01.02.04', 'Amortización de paquetes y programas de computación', 4, ''),
('4.08.01.02.05', 'Amortización de estudios y proyectos', 4, ''),
('4.08.01.02.99', 'Amortización de otros activos intangibles ', 4, ''),
('4.08.02.', 'Intereses por operaciones  financieras ', 2, ''),
('4.08.02.01.', 'Intereses por depósitos internos', 3, ''),
('4.08.02.01.00', 'Intereses por depósitos internos', 4, ''),
('4.08.02.02.', 'Intereses por títulos y valores', 3, ''),
('4.08.02.02.00', 'Intereses por títulos y valores', 4, ''),
('4.08.02.03.', 'Intereses por otros financiamientos', 3, ''),
('4.08.02.03.00', 'Intereses por otros financiamientos', 4, ''),
('4.08.03.', 'Gastos por operaciones de seguro ', 2, ''),
('4.08.03.01.', 'Gastos de siniestros ', 3, ''),
('4.08.03.01.00', 'Gastos de siniestros ', 4, ''),
('4.08.03.02.', 'Gastos de operaciones de reaseguros ', 3, ''),
('4.08.03.02.00', 'Gastos de operaciones de reaseguros ', 4, ''),
('4.08.03.99.', 'Otros gastos de operaciones de seguro ', 3, ''),
('4.08.03.99.00', 'Otros gastos de operaciones de seguro ', 4, ''),
('4.08.04.', 'Pérdida en operaciones de los servicios básicos ', 2, ''),
('4.08.04.01.', 'Pérdidas en el proceso de distribución de los servicios ', 3, ''),
('4.08.04.01.00', 'Pérdidas en el proceso de distribución de los servicios ', 4, ''),
('4.08.04.99.', 'Otras pérdidas en operación ', 3, ''),
('4.08.04.99.00', 'Otras pérdidas en operación ', 4, ''),
('4.08.05.', 'Obligaciones en el ejercicio vigente ', 2, ''),
('4.08.05.01.', 'Devoluciones de cobros indebidos', 3, ''),
('4.08.05.01.00', 'Devoluciones de cobros indebidos', 4, ''),
('4.08.05.02.', 'Devoluciones y reintegros diversos', 3, ''),
('4.08.05.02.00', 'Devoluciones y reintegros diversos', 4, ''),
('4.08.05.03.', 'Indemnizaciones diversas', 3, ''),
('4.08.05.03.00', 'Indemnizaciones diversas', 4, ''),
('4.08.06.', 'Pérdidas ajenas a la operación', 2, ''),
('4.08.06.01.', 'Pérdidas en inventarios', 3, ''),
('4.08.06.01.00', 'Pérdidas en inventarios', 4, ''),
('4.08.06.02.', 'Pérdidas en operaciones cambiarias', 3, ''),
('4.08.06.02.00', 'Pérdidas en operaciones cambiarias', 4, ''),
('4.08.06.03.', 'Pérdidas en ventas de activos', 3, ''),
('4.08.06.03.00', 'Pérdidas en ventas de activos', 4, ''),
('4.08.06.04.', 'Pérdidas por cuentas incobrables', 3, ''),
('4.08.06.04.00', 'Pérdidas por cuentas incobrables', 4, ''),
('4.08.06.05.', 'Participación en pérdidas de otras empresas', 3, ''),
('4.08.06.05.00', 'Participación en pérdidas de otras empresas', 4, ''),
('4.08.06.06.', 'Pérdidas por auto-seguro', 3, ''),
('4.08.06.06.00', 'Pérdidas por auto-seguro', 4, ''),
('4.08.06.07.', 'Impuestos directos', 3, ''),
('4.08.06.07.00', 'Impuestos directos', 4, ''),
('4.08.06.08.', 'Intereses de mora ', 3, ''),
('4.08.06.08.00', 'Intereses de mora ', 4, ''),
('4.08.06.09.', 'Reservas técnicas ', 3, ''),
('4.08.06.09.00', 'Reservas técnicas ', 4, ''),
('4.08.07.', 'Descuentos, bonificaciones y devoluciones', 2, ''),
('4.08.07.01.', 'Descuentos sobre ventas', 3, ''),
('4.08.07.01.00', 'Descuentos sobre ventas', 4, ''),
('4.08.07.02.', 'Bonificaciones por ventas', 3, ''),
('4.08.07.02.00', 'Bonificaciones por ventas', 4, ''),
('4.08.07.03.', 'Devoluciones por ventas', 3, ''),
('4.08.07.03.00', 'Devoluciones por ventas', 4, ''),
('4.08.07.04.', 'Devoluciones por primas de seguro', 3, ''),
('4.08.07.04.00', 'Devoluciones por primas de seguro', 4, ''),
('4.08.08.', 'Indemnizaciones y sanciones pecuniarias', 2, ''),
('4.08.08.01.', 'Indemnizaciones por daños y perjuicios', 3, ''),
('4.08.08.01.01', 'Indemnizaciones por daños y perjuicios ocasionados por organismos de la República, del Poder Estadal y del Poder Municipal', 4, ''),
('4.08.08.01.02', 'Indemnizaciones por daños y perjuicios ocasionados por entes descentralizados sin fines empresariales', 4, ''),
('4.08.08.01.03', 'Indemnizaciones por daños y perjuicios ocasionados por entes descentralizados con fines empresariales', 4, ''),
('4.08.08.02.', 'Sanciones pecuniarias', 3, ''),
('4.08.08.02.01', 'Sanciones pecuniarias impuestas a los organismos de la República, del Poder Estadal y del Poder Municipal', 4, ''),
('4.08.08.02.02', 'Sanciones pecuniarias impuestas a los entes descentralizados sin fines empresariales', 4, ''),
('4.08.08.02.03', 'Sanciones pecuniarias ocasionadas por entes descentralizados con fines empresariales', 4, ''),
('4.08.99.', 'Otros gastos', 2, ''),
('4.08.99.01.', 'Otros gastos', 3, ''),
('4.08.99.01.00', 'Otros gastos', 4, ''),
('4.09.', 'Asignaciones no distribuidas', 1, ''),
('4.09.01.', 'Asignaciones  no distribuidas de la Asamblea Nacional ', 2, ''),
('4.09.01.01.', 'Asignaciones  no distribuidas de la Asamblea Nacional ', 3, ''),
('4.09.01.01.00', 'Asignaciones  no distribuidas de la Asamblea Nacional ', 4, ''),
('4.09.02.', 'Asignaciones no distribuidas de la Contraloría General de la República', 2, ''),
('4.09.02.01.', 'Asignaciones no distribuidas de la Contraloría General de la República', 3, ''),
('4.09.02.01.00', 'Asignaciones no distribuidas de la Contraloría General de la República', 4, ''),
('4.09.03.', 'Asignaciones no distribuidas del Consejo Nacional Electoral', 2, ''),
('4.09.03.01.', 'Asignaciones no distribuidas del Consejo Nacional Electoral', 3, ''),
('4.09.03.01.00', 'Asignaciones no distribuidas del Consejo Nacional Electoral', 4, ''),
('4.09.04.', 'Asignaciones no distribuidas del Tribunal Supremo de Justicia', 2, ''),
('4.09.04.01.', 'Asignaciones no distribuidas del Tribunal Supremo de Justicia', 3, ''),
('4.09.04.01.00', 'Asignaciones no distribuidas del Tribunal Supremo de Justicia', 4, ''),
('4.09.05.', 'Asignaciones no distribuidas del Ministerio Público', 2, ''),
('4.09.05.01.', 'Asignaciones no distribuidas del Ministerio Público', 3, ''),
('4.09.05.01.00', 'Asignaciones no distribuidas del Ministerio Público', 4, ''),
('4.09.06.', 'Asignaciones no distribuidas de la Defensoría del Pueblo', 2, ''),
('4.09.06.01.', 'Asignaciones no distribuidas de la Defensoría del Pueblo', 3, ''),
('4.09.06.01.00', 'Asignaciones no distribuidas de la Defensoría del Pueblo', 4, ''),
('4.09.07.', 'Asignaciones no distribuidas del Consejo Moral Republicano ', 2, ''),
('4.09.07.01.', 'Asignaciones no distribuidas del Consejo Moral Republicano', 3, ''),
('4.09.07.01.00', 'Asignaciones no distribuidas del Consejo Moral Republicano', 4, ''),
('4.09.08.', 'Reestructuración de organismos del sector público ', 2, ''),
('4.09.08.01.', 'Reestructuración de organismos del sector público ', 3, ''),
('4.09.08.01.00', 'Reestructuración de organismos del sector público ', 4, ''),
('4.09.09.', 'Fondo de apoyo al trabajador y su grupo familiar', 2, ''),
('4.09.09.01.', 'Fondo de apoyo al trabajador y su grupo familiar de la Administración Pública Nacional', 3, ''),
('4.09.09.01.00', 'Fondo de apoyo al trabajador y su grupo familiar de la Administración Pública Nacional', 4, ''),
('4.09.09.02.', 'Fondo de apoyo al trabajador y su grupo familiar de los Estados y Municipios', 3, ''),
('4.09.09.02.00', 'Fondo de apoyo al trabajador y su grupo familiar de los Estados y Municipios', 4, ''),
('4.09.10.', 'Reforma de la seguridad social', 2, ''),
('4.09.10.01.', 'Reforma de la seguridad social', 3, ''),
('4.09.10.01.00', 'Reforma de la seguridad social', 4, ''),
('4.09.11.', 'Emergencias en el territorio nacional', 2, ''),
('4.09.11.01.', 'Emergencias en el territorio nacional', 3, ''),
('4.09.11.01.00', 'Emergencias en el territorio nacional', 4, ''),
('4.09.12.', 'Fondo para la cancelación de pasivos laborales', 2, ''),
('4.09.12.01.', 'Fondo para la cancelación de pasivos laborales', 3, ''),
('4.09.12.01.00', 'Fondo para la cancelación de pasivos laborales', 4, ''),
('4.09.13.', 'Fondo para la cancelación de deuda por servicios de electricidad, teléfono, aseo, agua y condominio', 2, ''),
('4.09.13.01.', 'Fondo para la cancelación de deuda por servicios de electricidad, teléfono, aseo, agua y condominio, de los organismos de la Administración Central', 3, ''),
('4.09.13.01.00', 'Fondo para la cancelación de deuda por servicios de electricidad, teléfono, aseo, agua y condominio, de los organismos de la Administración Central', 4, ''),
('4.09.13.02.', 'Fondo para la cancelación de deuda por servicios de electricidad, teléfono, aseo, agua y condominio, de los organismos de la Administración Descentralizada Nacional', 3, ''),
('4.09.13.02.00', 'Fondo para la cancelación de deuda por servicios de electricidad, teléfono, aseo, agua y condominio, de los organismos de la Administración Descentralizada Nacional', 4, ''),
('4.09.14.', 'Fondo para remuneraciones, pensiones y jubilaciones y otras retribuciones', 2, ''),
('4.09.14.01.', 'Fondo para remuneraciones, pensiones y jubilaciones y otras retribuciones', 3, ''),
('4.09.14.01.00', 'Fondo para remuneraciones, pensiones y jubilaciones y otras retribuciones', 4, ''),
('4.09.15.', 'Fondo para atender compromisos generados de la Ley Orgánica del Trabajo', 2, ''),
('4.09.15.01.', 'Fondo para atender compromisos generados de la Ley Orgánica del Trabajo', 3, ''),
('4.09.15.01.00', 'Fondo para atender compromisos generados de la Ley Orgánica del Trabajo', 4, ''),
('4.09.16.', 'Asignaciones para cancelar compromisos pendientes de ejercicios anteriores', 2, ''),
('4.09.16.01.', 'Asignaciones para cancelar compromisos pendientes de ejercicios anteriores', 3, ''),
('4.09.16.01.00', 'Asignaciones para cancelar compromisos pendientes de ejercicios anteriores', 4, ''),
('4.09.17.', 'Asignaciones para cancelar la deuda Fogade ¿ Ministerio de Finanzas ¿ Banco Central de Venezuela (BCV)', 2, ''),
('4.09.17.01.', 'Asignaciones para cancelar la deuda Fogade ¿ Ministerio de Finanzas ¿ Banco Central de Venezuela (BCV)', 3, ''),
('4.09.17.01.00', 'Asignaciones para cancelar la deuda Fogade ¿ Ministerio de Finanzas ¿ Banco Central de Venezuela (BCV)', 4, ''),
('4.09.18.', 'Asignaciones para atender los gastos de la referenda y elecciones', 2, ''),
('4.09.18.01.', 'Asignaciones para atender los gastos de la referenda y elecciones', 3, ''),
('4.09.18.01.00', 'Asignaciones para atender los gastos de la referenda y elecciones', 4, ''),
('4.09.19.', 'Asignaciones para atender los gastos por honorarios profesionales de bufetes internacionales, costas y costos judiciales', 2, ''),
('4.09.19.01.', 'Asignaciones para atender los gastos por honorarios profesionales de bufetes internacionales, costas y costos judiciales', 3, ''),
('4.09.19.01.00', 'Asignaciones para atender los gastos por honorarios profesionales de bufetes internacionales, costas y costos judiciales', 4, ''),
('4.09.20.', 'Fondo para atender compromisos generados por la contratación colectiva', 2, '');
INSERT INTO `cwprecue` (`CodCue`, `Denominacion`, `Tipocta`, `Tipopuc`) VALUES
('4.09.20.01.', 'Fondo para atender compromisos generados por la contratación colectiva', 3, ''),
('4.09.20.01.00', 'Fondo para atender compromisos generados por la contratación colectiva', 4, ''),
('4.09.21.', 'Proyecto social especial', 2, ''),
('4.09.21.01.', 'Proyecto social especial', 3, ''),
('4.09.21.01.00', 'Proyecto social especial', 4, ''),
('4.09.22.', 'Asignaciones para programas y proyectos financiados con recursos de organismos multilaterales y/o bilaterales', 2, ''),
('4.09.22.01.', 'Asignaciones para programas y proyectos financiados con recursos de organismos multilaterales y/o bilaterales', 3, ''),
('4.09.22.01.00', 'Asignaciones para programas y proyectos financiados con recursos de organismos multilaterales y/o bilaterales', 4, ''),
('4.09.23.', 'Asignación para facilitar la preparación de proyectos', 2, ''),
('4.09.23.01.', 'Asignación para facilitar la preparación de proyectos', 3, ''),
('4.09.23.01.00', 'Asignación para facilitar la preparación de proyectos', 4, ''),
('4.09.24.', 'Programas de inversión para las entidades estadales, municipalidades y otras instituciones', 2, ''),
('4.09.24.01.', 'Programas de inversión para las entidades estadales, municipalidades y otras instituciones', 3, ''),
('4.09.24.01.00', 'Programas de inversión para las entidades estadales, municipalidades y otras instituciones', 4, ''),
('4.09.25.', 'Cancelación de compromisos', 2, ''),
('4.09.25.01.', 'Cancelación de compromisos', 3, ''),
('4.09.25.01.00', 'Cancelación de compromisos', 4, ''),
('4.09.26.', 'Asignaciones para atender gastos de los organismos del sector público', 2, ''),
('4.09.26.01.', 'Asignaciones para atender gastos de los organismos del sector público', 3, ''),
('4.09.26.01.00', 'Asignaciones para atender gastos de los organismos del sector público', 4, ''),
('4.09.27.', 'Convenio de Cooperación Especial', 2, ''),
('4.09.27.01.', 'Convenio de Cooperación Especial', 3, ''),
('4.09.27.01.00', 'Convenio de Cooperación Especial', 4, ''),
('4.10.', 'Servicio de la deuda pública', 1, ''),
('4.10.01.', 'Servicio de la deuda pública interna a corto plazo', 2, ''),
('4.10.01.01.', 'Servicio de la deuda pública interna a corto plazo de títulos y valores', 3, ''),
('4.10.01.01.01', 'Amortización de la deuda pública interna a corto plazo de títulos y valores', 4, ''),
('4.10.01.01.02', 'Amortización de la deuda pública interna a corto plazo de letras del tesoro', 4, ''),
('4.10.01.01.03', 'Intereses de la deuda pública interna a corto plazo de títulos y valores', 4, ''),
('4.10.01.01.04', 'Intereses por mora y multas de la deuda pública interna a corto plazo de títulos y valores', 4, ''),
('4.10.01.01.05', 'Comisiones y otros gastos de la deuda pública interna a corto plazo de títulos y valores', 4, ''),
('4.10.01.01.06', 'Descuentos en colocación de títulos y valores de la deuda pública interna a  corto plazo', 4, ''),
('4.10.01.01.07', 'Descuentos en colocación de letras del tesoro a corto plazo  ', 4, ''),
('4.10.01.02.', 'Servicio de la deuda pública interna por préstamos a corto plazo', 3, ''),
('4.10.01.02.01', 'Amortización de la deuda pública interna por préstamos recibidos del sector privado a corto plazo ', 4, ''),
('4.10.01.02.02', 'Amortización de la deuda pública interna por préstamos recibidos de la República a corto plazo ', 4, ''),
('4.10.01.02.03', 'Amortización de la deuda pública interna por préstamos recibidos de entes descentralizados sin fines empresariales a corto plazo', 4, ''),
('4.10.01.02.04', 'Amortización de la deuda pública interna por préstamos recibidos de instituciones de protección social a corto plazo', 4, ''),
('4.10.01.02.05', 'Amortización de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales petroleros a corto plazo ', 4, ''),
('4.10.01.02.06', 'Amortización de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales no petroleros a corto plazo ', 4, ''),
('4.10.01.02.07', 'Amortización de la deuda pública interna por préstamos recibidos de entes descentralizados financieros bancarios a corto plazo  ', 4, ''),
('4.10.01.02.08', 'Amortización de la deuda pública interna por préstamos recibidos de entes descentralizados financieros no bancarios a corto plazo  ', 4, ''),
('4.10.01.02.09', 'Amortización de la deuda pública interna por préstamos recibidos del Poder Estadal a corto plazo ', 4, ''),
('4.10.01.02.10', 'Amortización de la deuda pública interna por préstamos recibidos del Poder Municipal a corto plazo ', 4, ''),
('4.10.01.02.11', 'Intereses de la deuda pública interna por préstamos recibidos del sector privado a corto plazo', 4, ''),
('4.10.01.02.12', 'Intereses de la deuda pública interna por préstamos recibidos de la República a corto plazo', 4, ''),
('4.10.01.02.13', 'Intereses de la deuda pública interna por préstamos recibidos de entes descentralizados sin fines empresariales a corto plazo', 4, ''),
('4.10.01.02.14', 'Intereses de la deuda pública interna por préstamos recibidos de instituciones de protección social a corto plazo', 4, ''),
('4.10.01.02.15', 'Intereses de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales petroleros a corto plazo ', 4, ''),
('4.10.01.02.16', 'Intereses de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales no petroleros a corto plazo ', 4, ''),
('4.10.01.02.17', 'Intereses de la deuda pública interna por préstamos recibidos de entes descentralizados financieros bancarios a corto plazo  ', 4, ''),
('4.10.01.02.18', 'Intereses de la deuda pública interna por préstamos recibidos de entes descentralizados financieros no bancarios a corto plazo  ', 4, ''),
('4.10.01.02.19', 'Intereses de la deuda pública interna por préstamos recibidos del Poder Estadal a corto plazo ', 4, ''),
('4.10.01.02.20', 'Intereses de la deuda pública interna por préstamos recibidos del Poder Municipal a corto plazo ', 4, ''),
('4.10.01.02.21', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos del sector privado a corto plazo', 4, ''),
('4.10.01.02.22', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de la República a corto plazo', 4, ''),
('4.10.01.02.23', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de entes descentralizados sin fines empresariales a corto plazo', 4, ''),
('4.10.01.02.24', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de instituciones de protección social a corto plazo', 4, ''),
('4.10.01.02.25', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales petroleros a corto plazo ', 4, ''),
('4.10.01.02.26', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales no petroleros a corto plazo ', 4, ''),
('4.10.01.02.27', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de entes descentralizados financieros bancarios a corto plazo  ', 4, ''),
('4.10.01.02.28', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de entes descentralizados financieros no bancarios a corto plazo  ', 4, ''),
('4.10.01.02.29', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos del Poder Estadal a corto plazo ', 4, ''),
('4.10.01.02.30', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos del Poder Municipal a corto plazo ', 4, ''),
('4.10.01.02.31', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos del sector privado a corto plazo', 4, ''),
('4.10.01.02.32', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de la República a corto plazo', 4, ''),
('4.10.01.02.33', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de entes descentralizados sin fines empresariales a corto plazo', 4, ''),
('4.10.01.02.34', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de instituciones de protección social a corto  plazo', 4, ''),
('4.10.01.02.35', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales petroleros a corto plazo ', 4, ''),
('4.10.01.02.36', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales no petroleros a corto plazo ', 4, ''),
('4.10.01.02.37', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de entes descentralizados financieros bancarios a corto plazo  ', 4, ''),
('4.10.01.02.38', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de entes descentralizados financieros no bancarios a corto  plazo  ', 4, ''),
('4.10.01.02.39', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos del Poder Estadal a corto plazo ', 4, ''),
('4.10.01.02.40', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos del Poder Municipal a corto  plazo ', 4, ''),
('4.10.01.03.', 'Servicio de la deuda pública interna indirecta por préstamos a corto plazo', 3, ''),
('4.10.01.03.01', 'Amortización de la deuda pública interna indirecta por préstamos recibidos del sector privado a corto plazo', 4, ''),
('4.10.01.03.02', 'Amortización de la deuda pública interna indirecta por préstamos recibidos del sector público a corto plazo', 4, ''),
('4.10.01.03.03', 'Intereses de la deuda pública interna indirecta por préstamos recibidos del sector privado a corto plazo', 4, ''),
('4.10.01.03.04', 'Intereses de la deuda pública interna indirecta por préstamos recibidos del sector público a corto plazo', 4, ''),
('4.10.01.03.05', 'Intereses por mora y multas de la deuda pública interna indirecta por préstamos recibidos del sector privado a corto plazo', 4, ''),
('4.10.01.03.06', 'Intereses por mora y multas de la deuda pública interna indirecta por préstamos recibidos del sector público a corto plazo', 4, ''),
('4.10.01.03.07', 'Comisiones y otros gastos de la deuda pública interna indirecta por préstamos recibidos del sector privado a corto plazo', 4, ''),
('4.10.01.03.08', 'Comisiones y otros gastos de la deuda pública interna indirecta por préstamos recibidos del sector público a corto plazo', 4, ''),
('4.10.02.', 'Servicio de la deuda pública interna a largo plazo', 2, ''),
('4.10.02.01.', 'Servicio de la deuda pública interna a largo plazo de títulos y valores', 3, ''),
('4.10.02.01.01', 'Amortización de la deuda pública interna a largo plazo de títulos y valores', 4, ''),
('4.10.02.01.02', 'Amortización de la deuda pública interna a largo plazo de letras del tesoro', 4, ''),
('4.10.02.01.03', 'Intereses de la deuda pública interna a largo plazo de títulos y valores', 4, ''),
('4.10.02.01.04', 'Intereses por mora y multas de la deuda pública interna a largo plazo de títulos y valores', 4, ''),
('4.10.02.01.05', 'Comisiones y otros gastos de la deuda pública interna a largo plazo de títulos y valores', 4, ''),
('4.10.02.01.06', 'Descuentos en colocación de títulos y valores de la deuda pública interna a largo plazo', 4, ''),
('4.10.02.01.07', 'Descuentos en colocación de letras del tesoro a largo plazo  ', 4, ''),
('4.10.02.02.', 'Servicio de la deuda pública interna por préstamos a largo plazo', 3, ''),
('4.10.02.02.01', 'Amortización de la deuda pública interna por préstamos recibidos del sector privado a largo plazo ', 4, ''),
('4.10.02.02.02', 'Amortización de la deuda pública interna por préstamos recibidos de la República a largo plazo ', 4, ''),
('4.10.02.02.03', 'Amortización de la deuda pública interna por préstamos recibidos de entes descentralizados sin fines empresariales a largo plazo', 4, ''),
('4.10.02.02.04', 'Amortización de la deuda pública interna por préstamos recibidos de instituciones de protección social a largo plazo', 4, ''),
('4.10.02.02.05', 'Amortización de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales petroleros a largo plazo ', 4, ''),
('4.10.02.02.06', 'Amortización de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales no petroleros a largo plazo ', 4, ''),
('4.10.02.02.07', 'Amortización de la deuda pública interna por préstamos recibidos de entes descentralizados financieros bancarios a largo plazo  ', 4, ''),
('4.10.02.02.08', 'Amortización de la deuda pública interna por préstamos recibidos de entes descentralizados financieros no bancarios a largo plazo  ', 4, ''),
('4.10.02.02.09', 'Amortización de la deuda pública interna por préstamos recibidos del Poder Estadal a largo plazo ', 4, ''),
('4.10.02.02.10', 'Amortización de la deuda pública interna por préstamos recibidos del Poder Municipal a largo plazo ', 4, ''),
('4.10.02.02.11', 'Intereses de la deuda pública interna por préstamos recibidos del sector privado a largo plazo', 4, ''),
('4.10.02.02.12', 'Intereses de la deuda pública interna por préstamos recibidos de la República a largo plazo', 4, ''),
('4.10.02.02.13', 'Intereses de la deuda pública interna por préstamos recibidos de entes descentralizados sin fines empresariales a largo plazo', 4, ''),
('4.10.02.02.14', 'Intereses de la deuda pública interna por préstamos recibidos de instituciones de protección social a largo plazo', 4, ''),
('4.10.02.02.15', 'Intereses de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales petroleros a largo plazo ', 4, ''),
('4.10.02.02.16', 'Intereses de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales no petroleros a largo plazo ', 4, ''),
('4.10.02.02.17', 'Intereses de la deuda pública interna por préstamos recibidos de entes descentralizados financieros bancarios a largo plazo  ', 4, ''),
('4.10.02.02.18', 'Intereses de la deuda pública interna por préstamos recibidos de entes descentralizados financieros no bancarios a largo plazo  ', 4, ''),
('4.10.02.02.19', 'Intereses de la deuda pública interna por préstamos recibidos del Poder Estadal a largo plazo ', 4, ''),
('4.10.02.02.20', 'Intereses de la deuda pública interna por préstamos recibidos del Poder Municipal a largo plazo ', 4, ''),
('4.10.02.02.21', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos del sector privado a largo plazo', 4, ''),
('4.10.02.02.22', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de la República a largo plazo', 4, ''),
('4.10.02.02.23', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de entes descentralizados sin fines empresariales a largo plazo', 4, ''),
('4.10.02.02.24', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de instituciones de protección social a largo plazo', 4, ''),
('4.10.02.02.25', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales petroleros a largo plazo ', 4, ''),
('4.10.02.02.26', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales no petroleros a largo plazo ', 4, ''),
('4.10.02.02.27', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de entes descentralizados financieros bancarios a largo plazo  ', 4, ''),
('4.10.02.02.28', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos de entes descentralizados financieros no bancarios a largo plazo  ', 4, ''),
('4.10.02.02.29', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos del Poder Estadal a largo plazo ', 4, ''),
('4.10.02.02.30', 'Intereses por mora y multas de la deuda pública interna por préstamos recibidos del Poder Municipal a largo plazo ', 4, ''),
('4.10.02.02.31', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos del sector privado a largo plazo', 4, ''),
('4.10.02.02.32', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de la República a largo plazo', 4, ''),
('4.10.02.02.33', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de entes descentralizados sin fines empresariales a largo plazo', 4, ''),
('4.10.02.02.34', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de instituciones de protección social a largo plazo', 4, ''),
('4.10.02.02.35', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales petroleros a largo plazo ', 4, ''),
('4.10.02.02.36', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de entes descentralizados con fines empresariales no petroleros a largo plazo ', 4, ''),
('4.10.02.02.37', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de entes descentralizados financieros bancarios a largo plazo  ', 4, ''),
('4.10.02.02.38', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos de entes descentralizados financieros no bancarios a largo plazo  ', 4, ''),
('4.10.02.02.39', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos del Poder Estadal a largo plazo ', 4, ''),
('4.10.02.02.40', 'Comisiones y otros gastos de la deuda pública interna por préstamos recibidos del Poder Municipal a largo plazo ', 4, ''),
('4.10.02.03.', 'Servicio de la deuda pública interna indirecta a largo plazo de títulos y valores', 3, ''),
('4.10.02.03.01', 'Amortización de la deuda pública interna indirecta a largo plazo de títulos y valores', 4, ''),
('4.10.02.03.02', 'Intereses de la deuda pública interna indirecta a largo plazo de títulos y valores', 4, ''),
('4.10.02.03.03', 'Intereses por mora y multas de la deuda pública interna indirecta a largo plazo de títulos y valores', 4, ''),
('4.10.02.03.04', 'Comisiones y otros gastos de la deuda pública interna indirecta a largo plazo de títulos y valores', 4, ''),
('4.10.02.03.05', 'Descuentos en colocación de títulos y valores de la deuda pública interna indirecta de largo plazo', 4, ''),
('4.10.02.04.', 'Servicio de la deuda pública interna indirecta por préstamos a largo plazo', 3, ''),
('4.10.02.04.01', 'Amortización de la deuda pública interna indirecta por préstamos recibidos del sector privado a largo plazo  ', 4, ''),
('4.10.02.04.02', 'Amortización de la deuda pública interna indirecta por préstamos recibidos del sector público a largo plazo  ', 4, ''),
('4.10.02.04.03', 'Intereses de la deuda pública interna indirecta por préstamos recibidos del sector privado a largo plazo', 4, ''),
('4.10.02.04.04', 'Intereses de la deuda pública interna indirecta por préstamos recibidos del sector público a largo plazo', 4, ''),
('4.10.02.04.05', 'Intereses por mora y multas de la deuda pública interna indirecta por préstamos recibidos del sector privado a largo plazo', 4, ''),
('4.10.02.04.06', 'Intereses por mora y multas de la deuda pública interna indirecta por préstamos recibidos del sector público a largo plazo', 4, ''),
('4.10.02.04.07', 'Comisiones y otros gastos de la deuda pública interna indirecta por préstamos recibidos del sector privado a largo plazo', 4, ''),
('4.10.02.04.08', 'Comisiones y otros gastos de la deuda pública interna indirecta por préstamos recibidos del sector público a largo plazo', 4, ''),
('4.10.03.', 'Servicio de la deuda pública externa a corto plazo', 2, ''),
('4.10.03.01.', 'Servicio de la deuda pública externa a corto plazo de títulos y valores', 3, ''),
('4.10.03.01.01', 'Amortización de la deuda pública externa a corto plazo de títulos y valores', 4, ''),
('4.10.03.01.02', 'Intereses de la deuda pública externa a corto plazo de títulos y valores', 4, ''),
('4.10.03.01.03', 'Intereses por mora y multas de la deuda pública externa a corto plazo de títulos y valores', 4, ''),
('4.10.03.01.04', 'Comisiones y otros gastos de la deuda pública externa a corto plazo de títulos y valores', 4, ''),
('4.10.03.01.05', 'Descuentos en colocación de títulos y valores de la deuda pública externa a corto plazo', 4, ''),
('4.10.03.02.', 'Servicio de la deuda pública externa por préstamos a corto plazo', 3, ''),
('4.10.03.02.01', 'Amortización de la deuda pública externa por préstamos recibidos de gobiernos extranjeros a corto plazo ', 4, ''),
('4.10.03.02.02', 'Amortización de la deuda pública externa por préstamos recibidos de organismos internacionales a corto plazo', 4, ''),
('4.10.03.02.03', 'Amortización de la deuda pública externa por préstamos recibidos de instituciones financieras externas a corto plazo', 4, ''),
('4.10.03.02.04', 'Amortización de la deuda pública externa por préstamos recibidos de proveedores de bienes y servicios externos a corto plazo', 4, ''),
('4.10.03.02.05', 'Intereses de la deuda pública externa por préstamos  recibidos de gobiernos extranjeros a corto plazo', 4, ''),
('4.10.03.02.06', 'Intereses de la deuda pública externa por préstamos  recibidos de organismos internacionales a corto plazo', 4, ''),
('4.10.03.02.07', 'Intereses de la deuda pública externa por préstamos  recibidos de instituciones financieras externas a corto plazo', 4, ''),
('4.10.03.02.08', 'Intereses de la deuda pública externa por préstamos  recibidos de proveedores de bienes y servicios externos a corto plazo', 4, ''),
('4.10.03.02.09', 'Intereses por mora y multas de la deuda pública externa por préstamos recibidos de gobiernos extranjeros a corto plazo  ', 4, ''),
('4.10.03.02.10', 'Intereses por mora y multas de la deuda pública externa por préstamos recibidos  de organismos internacionales a corto plazo', 4, ''),
('4.10.03.02.11', 'Intereses por mora y multas de la deuda pública externa por préstamos recibidos de instituciones financieras externas a corto plazo', 4, ''),
('4.10.03.02.12', 'Intereses por mora y multas de la deuda pública externa por préstamos recibidos de proveedores de bienes y servicios externos a corto plazo ', 4, ''),
('4.10.03.02.13', 'Comisiones y otros gastos de la deuda pública externa por préstamos  recibidos de gobiernos extranjeros a corto plazo  ', 4, ''),
('4.10.03.02.14', 'Comisiones y otros gastos de la deuda pública externa por préstamos  recibidos  de organismos internacionales a corto plazo', 4, ''),
('4.10.03.02.15', 'Comisiones y otros gastos de la deuda pública externa por préstamos  recibidos de instituciones financieras externas a corto plazo', 4, ''),
('4.10.03.02.16', 'Comisiones y otros gastos de la deuda pública externa por préstamos recibidos de proveedores de bienes y servicios externos a corto plazo ', 4, ''),
('4.10.03.03.', 'Servicio de la deuda pública externa indirecta por préstamos a corto plazo', 3, ''),
('4.10.03.03.01', 'Amortización de la deuda pública externa indirecta por préstamos recibidos de gobiernos extranjeros a corto plazo ', 4, ''),
('4.10.03.03.02', 'Amortización de la deuda pública externa indirecta por préstamos recibidos de organismos internacionales a corto plazo', 4, ''),
('4.10.03.03.03', 'Amortización de la deuda pública externa indirecta por préstamos recibidos de instituciones financieras externas a corto plazo', 4, ''),
('4.10.03.03.04', 'Amortización de la deuda pública externa indirecta por préstamos  recibidos de proveedores de bienes y servicios externos a corto plazo', 4, ''),
('4.10.03.03.05', 'Intereses de la deuda pública externa indirecta por préstamos recibidos de gobiernos extranjeros a corto plazo', 4, ''),
('4.10.03.03.06', 'Intereses de la deuda pública externa indirecta por préstamos recibidos de organismos internacionales a corto plazo', 4, ''),
('4.10.03.03.07', 'Intereses de la deuda pública externa indirecta por préstamos recibidos de instituciones financieras externas a corto plazo', 4, ''),
('4.10.03.03.08', 'Intereses de la deuda pública externa indirecta por préstamos recibidos de proveedores de bienes y servicios externos a corto plazo', 4, ''),
('4.10.03.03.09', 'Intereses por mora y multas de la deuda pública externa indirecta por préstamos  recibidos de gobiernos extranjeros a corto plazo', 4, ''),
('4.10.03.03.10', 'Intereses por mora y multas de la deuda pública externa indirecta por préstamos recibidos de organismos internacionales a corto plazo ', 4, ''),
('4.10.03.03.11', 'Intereses por mora y multas de la deuda pública externa indirecta por préstamos recibidos de instituciones financieras externas a corto plazo ', 4, ''),
('4.10.03.03.12', 'Intereses por mora y multas de la deuda pública externa indirecta por préstamos  recibidos de proveedores de bienes y servicios externos a corto plazo ', 4, ''),
('4.10.03.03.13', 'Comisiones y otros gastos de la deuda pública externa indirecta por préstamos  recibidos de gobiernos extranjeros a corto plazo', 4, ''),
('4.10.03.03.14', 'Comisiones y otros gastos de la deuda pública externa indirecta por préstamos recibidos de organismos internacionales a corto plazo ', 4, ''),
('4.10.03.03.15', 'Comisiones y otros gastos de la deuda pública externa indirecta por préstamos  recibidos de instituciones financieras externas a corto plazo', 4, ''),
('4.10.03.03.16', 'Comisiones y otros gastos de la deuda pública externa indirecta por préstamos recibidos de proveedores de bienes y servicios externos a corto plazo  ', 4, ''),
('4.10.04.', 'Servicio de la deuda pública externa a largo plazo', 2, ''),
('4.10.04.01.', 'Servicio de la deuda pública externa a largo plazo de títulos y valores', 3, ''),
('4.10.04.01.01', 'Amortización de la deuda pública externa a largo plazo de títulos y valores', 4, ''),
('4.10.04.01.02', 'Intereses de la deuda pública externa a largo plazo de títulos y valores', 4, ''),
('4.10.04.01.03', 'Intereses por mora y multas de la deuda pública externa a largo plazo de títulos y valores', 4, ''),
('4.10.04.01.04', 'Comisiones y otros gastos de la deuda pública externa a largo plazo de títulos y valores', 4, ''),
('4.10.04.01.05', 'Descuentos en colocación de títulos y valores de la deuda pública externa a largo plazo', 4, ''),
('4.10.04.02.', 'Servicio de la deuda pública externa por préstamos a largo plazo', 3, ''),
('4.10.04.02.01', 'Amortización de la deuda pública externa por préstamos recibidos de gobiernos extranjeros a  largo plazo ', 4, ''),
('4.10.04.02.02', 'Amortización de la deuda pública externa por préstamos  recibidos de organismos internacionales a largo plazo', 4, ''),
('4.10.04.02.03', 'Amortización de la deuda pública externa por préstamos recibidos de instituciones financieras externas  a largo plazo', 4, ''),
('4.10.04.02.04', 'Amortización de la deuda pública externa por préstamos recibidos de proveedores de bienes y servicios externos  a largo plazo', 4, ''),
('4.10.04.02.05', 'Intereses de la deuda pública externa por préstamos recibidos de gobiernos extranjeros  a largo plazo ', 4, ''),
('4.10.04.02.06', 'Intereses de la deuda pública externa por préstamos recibidos de organismos internacionales a largo plazo', 4, ''),
('4.10.04.02.07', 'Intereses de la deuda pública externa por préstamos recibidos de instituciones financieras externas  a largo plazo', 4, ''),
('4.10.04.02.08', 'Intereses de la deuda pública externa por préstamos recibidos de proveedores de bienes y servicios externos  a largo plazo', 4, ''),
('4.10.04.02.09', 'Intereses por mora y multas de la deuda pública externa por préstamos  recibidos de gobiernos extranjeros  a largo plazo', 4, ''),
('4.10.04.02.10', 'Intereses por mora y multas de la deuda pública externa por préstamos recibidos de organismos internacionales a largo plazo', 4, ''),
('4.10.04.02.11', 'Intereses por mora y multas de la deuda pública externa por préstamos recibidos de instituciones financieras externas  a largo plazo ', 4, ''),
('4.10.04.02.12', 'Intereses por mora y multas de la deuda pública externa por préstamos recibidos de proveedores de bienes y servicios externos  a largo plazo ', 4, ''),
('4.10.04.02.13', 'Comisiones y otros gastos de la deuda pública externa por préstamos recibidos de gobiernos extranjeros  a largo plazo ', 4, ''),
('4.10.04.02.14', 'Comisiones y otros gastos de la deuda pública externa por préstamos recibidos de organismos internacionales a largo plazo', 4, ''),
('4.10.04.02.15', 'Comisiones y otros gastos de la deuda pública externa por préstamos recibidos de instituciones financieras externas  a largo plazo ', 4, ''),
('4.10.04.02.16', 'Comisiones y otros gastos de la deuda pública externa por préstamos  recibidos de proveedores de bienes y servicios externos  a largo plazo', 4, ''),
('4.10.04.03.', 'Servicio de la deuda pública externa indirecta a largo plazo de títulos y valores', 3, ''),
('4.10.04.03.01', 'Amortización de la deuda pública externa indirecta a largo plazo de títulos y valores', 4, ''),
('4.10.04.03.02', 'Intereses de la deuda pública externa indirecta a largo plazo de títulos y valores', 4, ''),
('4.10.04.03.03', 'Intereses por mora y multas de la deuda pública externa indirecta a largo plazo de títulos y valores', 4, ''),
('4.10.04.03.04', 'Comisiones y otros gastos de la deuda pública externa indirecta a largo plazo de títulos y valores', 4, ''),
('4.10.04.03.05', 'Descuentos en colocación de títulos y valores de la deuda pública externa indirecta a largo plazo', 4, ''),
('4.10.04.04.', 'Servicio de la deuda pública externa indirecta por préstamos a largo plazo', 3, ''),
('4.10.04.04.01', 'Amortización de la deuda pública externa indirecta por préstamos recibidos de gobiernos extranjeros a largo plazo', 4, ''),
('4.10.04.04.02', 'Amortización de la deuda pública externa indirecta por préstamos recibidos de organismos internacionales a largo plazo', 4, ''),
('4.10.04.04.03', 'Amortización de la deuda pública externa indirecta por préstamos recibidos de instituciones financieras externas a largo plazo', 4, ''),
('4.10.04.04.04', 'Amortización de la deuda pública externa indirecta por préstamos recibidos de proveedores de bienes y servicios externos  a largo plazo', 4, ''),
('4.10.04.04.05', 'Intereses de la deuda pública externa indirecta por préstamos recibidos de gobiernos extranjeros a largo plazo', 4, ''),
('4.10.04.04.06', 'Intereses de la deuda pública externa indirecta por préstamos recibidos de organismos internacionales a largo plazo', 4, ''),
('4.10.04.04.07', 'Intereses de la deuda pública externa indirecta por préstamos recibidos de instituciones financieras externas a largo plazo', 4, ''),
('4.10.04.04.08', 'Intereses de la deuda pública externa indirecta por préstamos recibidos de proveedores de bienes y servicios externos  a largo plazo', 4, ''),
('4.10.04.04.09', 'Intereses por mora y multas de la deuda pública externa indirecta por préstamos recibidos de gobiernos extranjeros a largo plazo ', 4, ''),
('4.10.04.04.10', 'Intereses por mora y multas de la deuda pública externa indirecta por préstamos recibidos de organismos internacionales a largo plazo ', 4, ''),
('4.10.04.04.11', 'Intereses por mora y multas de la deuda pública externa indirecta por préstamos recibidos de instituciones financieras externas a largo plazo', 4, ''),
('4.10.04.04.12', 'Intereses por mora y multas de la deuda pública externa indirecta por préstamos recibidos de proveedores de bienes y servicios externos a largo plazo', 4, ''),
('4.10.04.04.13', 'Comisiones y otros gastos de la deuda pública externa indirecta por préstamos recibidos de gobiernos extranjeros a largo plazo', 4, ''),
('4.10.04.04.14', 'Comisiones y otros gastos de la deuda pública externa indirecta por préstamos recibidos de organismos internacionales a largo plazo ', 4, ''),
('4.10.04.04.15', 'Comisiones y otros gastos de la deuda pública externa indirecta por préstamos  recibidos de instituciones financieras externas a largo plazo', 4, ''),
('4.10.04.04.16', 'Comisiones y otros gastos de la deuda pública externa indirecta por préstamos  recibidos de proveedores de bienes y servicios externos  a largo plazo', 4, ''),
('4.10.05.', 'Reestructuración y/o refinanciamiento de la deuda publica', 2, ''),
('4.10.05.01.', 'Disminución por reestructuración y/o refinanciamiento de la deuda interna a largo plazo, en a  corto plazo-', 3, ''),
('4.10.05.01.00', 'Disminución por reestructuración y/o refinanciamiento de la deuda interna a largo plazo, en a  corto plazo-', 4, ''),
('4.10.05.02.', 'Disminución por reestructuración y/o refinanciamiento de la deuda interna a corto plazo, en a largo plazo', 3, ''),
('4.10.05.02.00', 'Disminución por reestructuración y/o refinanciamiento de la deuda interna a corto plazo, en a largo plazo', 4, ''),
('4.10.05.03.', 'Disminución por reestructuración y/o refinanciamiento de la deuda externa a largo plazo, en a corto plazo', 3, ''),
('4.10.05.03.00', 'Disminución por reestructuración y/o refinanciamiento de la deuda externa a largo plazo, en a corto plazo', 4, ''),
('4.10.05.04.', 'Disminución por reestructuración y/o refinanciamiento de la deuda externa a corto plazo, en a largo plazo', 3, ''),
('4.10.05.04.00', 'Disminución por reestructuración y/o refinanciamiento de la deuda externa a corto plazo, en a largo plazo', 4, ''),
('4.10.05.05.', 'Disminución  de la deuda pública por distribuir', 3, ''),
('4.10.05.05.01', 'Disminución  de la deuda pública interna por distribuir   ', 4, ''),
('4.10.05.05.02', 'Disminución de la deuda pública externa por distribuir    ', 4, ''),
('4.10.06.', 'Servicio de la deuda pública por obligaciones de ejercicios anteriores', 2, ''),
('4.10.06.01.', 'Amortización de la deuda pública de obligaciones pendientes de ejercicios anteriores', 3, ''),
('4.10.06.01.00', 'Amortización de la deuda pública de obligaciones pendientes de ejercicios anteriores', 4, ''),
('4.10.06.02.', 'Intereses de la deuda pública de obligaciones pendientes de ejercicios anteriores', 3, ''),
('4.10.06.02.00', 'Intereses de la deuda pública de obligaciones pendientes de ejercicios anteriores', 4, ''),
('4.10.06.03.', 'Intereses por mora y multas de la deuda pública de obligaciones pendientes de ejercicios anteriores', 3, ''),
('4.10.06.03.00', 'Intereses por mora y multas de la deuda pública de obligaciones pendientes de ejercicios anteriores', 4, ''),
('4.10.06.04.', 'Comisiones y otros gastos de la deuda pública de obligaciones pendientes de ejercicios anteriores', 3, ''),
('4.10.06.04.00', 'Comisiones y otros gastos de la deuda pública de obligaciones pendientes de ejercicios anteriores', 4, ''),
('4.11.', 'Disminución de pasivos ', 1, ''),
('4.11.01.', 'Disminución de gastos de personal por pagar', 2, ''),
('4.11.01.01.', 'Disminución de sueldos,  salarios y otras remuneraciones por pagar', 3, ''),
('4.11.01.01.00', 'Disminución de sueldos,  salarios y otras remuneraciones por pagar', 4, ''),
('4.11.02.', 'Disminución de aportes patronales y retenciones laborales por pagar', 2, ''),
('4.11.02.01.', 'Disminución de aportes patronales y retenciones laborales por pagar al Instituto Venezolano de los Seguros Sociales (IVSS)', 3, ''),
('4.11.02.01.00', 'Disminución de aportes patronales y retenciones laborales por pagar al Instituto Venezolano de los Seguros Sociales (IVSS)', 4, ''),
('4.11.02.02.', 'Disminución de aportes patronales y retenciones laborales por pagar al Instituto de Previsión Social del Ministerio de Educación (IPASME)', 3, ''),
('4.11.02.02.00', 'Disminución de aportes patronales y retenciones laborales por pagar al Instituto de Previsión Social del Ministerio de Educación (IPASME)', 4, ''),
('4.11.02.03.', 'Disminución de aportes  patronales  y retenciones laborales por pagar al Fondo de Jubilaciones', 3, ''),
('4.11.02.03.00', 'Disminución de aportes  patronales  y retenciones laborales por pagar al Fondo de Jubilaciones', 4, ''),
('4.11.02.04.', 'Disminución  de aportes patronales y  retenciones laborales por  pagar al Fondo de Seguro de Paro Forzoso', 3, ''),
('4.11.02.04.00', 'Disminución  de aportes patronales y  retenciones laborales por  pagar al Fondo de Seguro de Paro Forzoso', 4, ''),
('4.11.02.05.', 'Disminución  de aportes  patronales  y  retenciones laborales por pagar al Fondo de Ahorro Habitacional', 3, ''),
('4.11.02.05.00', 'Disminución  de aportes  patronales  y  retenciones laborales por pagar al Fondo de Ahorro Habitacional', 4, ''),
('4.11.02.06.', 'Disminución  de  aportes patronales y retenciones laborales por pagar al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios', 3, ''),
('4.11.02.06.00', 'Disminución  de  aportes patronales y retenciones laborales por pagar al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios', 4, ''),
('4.11.02.07.', 'Disminución de aportes patronales y retenciones laborales por pagar a cajas de ahorro', 3, ''),
('4.11.02.07.00', 'Disminución de aportes patronales y retenciones laborales por pagar a cajas de ahorro', 4, ''),
('4.11.02.08.', 'Disminución  de aportes patronales por pagar a organismos de seguridad social', 3, ''),
('4.11.02.08.00', 'Disminución  de aportes patronales por pagar a organismos de seguridad social', 4, ''),
('4.11.02.09.', 'Disminución  de retenciones  laborales  por  pagar  al  Instituto Nacional de Cooperación Educativa (INCE)', 3, ''),
('4.11.02.09.00', 'Disminución  de retenciones  laborales  por  pagar  al  Instituto Nacional de Cooperación Educativa (INCE)', 4, ''),
('4.11.02.10.', 'Disminución de retenciones laborales por  pagar por pensión alimenticia', 3, ''),
('4.11.02.10.00', 'Disminución de retenciones laborales por  pagar por pensión alimenticia', 4, ''),
('4.11.02.98.', 'Disminución de otros aportes legales por pagar', 3, ''),
('4.11.02.98.00', 'Disminución de otros aportes legales por pagar', 4, ''),
('4.11.02.99.', 'Disminución de otras retenciones laborales por  pagar', 3, ''),
('4.11.02.99.00', 'Disminución de otras retenciones laborales por  pagar', 4, ''),
('4.11.03.', 'Disminución de cuentas y efectos por pagar a proveedores', 2, ''),
('4.11.03.01.', 'Disminución de cuentas por pagar a proveedores a corto plazo', 3, ''),
('4.11.03.01.00', 'Disminución de cuentas por pagar a proveedores a corto plazo', 4, ''),
('4.11.03.02.', 'Disminución de efectos por pagar a  proveedores a corto plazo', 3, ''),
('4.11.03.02.00', 'Disminución de efectos por pagar a  proveedores a corto plazo', 4, ''),
('4.11.03.03.', 'Disminución de cuentas por pagar a proveedores a mediano y largo plazo', 3, ''),
('4.11.03.03.00', 'Disminución de cuentas por pagar a proveedores a mediano y largo plazo', 4, ''),
('4.11.03.04.', 'Disminución de efectos por pagar a proveedores a mediano y largo plazo', 3, ''),
('4.11.03.04.00', 'Disminución de efectos por pagar a proveedores a mediano y largo plazo', 4, ''),
('4.11.04.', 'Disminución de cuentas y efectos por pagar a contratistas', 2, ''),
('4.11.04.01.', 'Disminución de cuentas por pagar a contratistas a corto plazo', 3, ''),
('4.11.04.01.00', 'Disminución de cuentas por pagar a contratistas a corto plazo', 4, ''),
('4.11.04.02.', 'Disminución de efectos por pagar a contratistas a corto plazo', 3, ''),
('4.11.04.02.00', 'Disminución de efectos por pagar a contratistas a corto plazo', 4, ''),
('4.11.04.03.', 'Disminución de cuentas por pagar a contratistas a mediano largo y plazo', 3, ''),
('4.11.04.03.00', 'Disminución de cuentas por pagar a contratistas a mediano largo y plazo', 4, ''),
('4.11.04.04.', 'Disminución de efectos por pagar a contratistas a mediano y plazo', 3, ''),
('4.11.04.04.00', 'Disminución de efectos por pagar a contratistas a mediano y plazo', 4, ''),
('4.11.05.', 'Disminución de intereses por pagar    ', 2, ''),
('4.11.05.01.', 'Disminución de intereses internos por pagar', 3, ''),
('4.11.05.01.00', 'Disminución de intereses internos por pagar', 4, ''),
('4.11.05.02.', 'Disminución de intereses externos por pagar', 3, ''),
('4.11.05.02.00', 'Disminución de intereses externos por pagar', 4, ''),
('4.11.06.', 'Disminución de otras cuentas y efectos por pagar a corto plazo', 2, ''),
('4.11.06.01.', 'Disminución de obligaciones de ejercicios anteriores', 3, ''),
('4.11.06.01.00', 'Disminución de obligaciones de ejercicios anteriores', 4, ''),
('4.11.06.02.', 'Disminución de otras cuentas por pagar a corto plazo', 3, ''),
('4.11.06.02.00', 'Disminución de otras cuentas por pagar a corto plazo', 4, ''),
('4.11.06.03.', 'Disminución de otros efectos por pagar a corto plazo', 3, ''),
('4.11.06.03.00', 'Disminución de otros efectos por pagar a corto plazo', 4, ''),
('4.11.07.', 'Disminución de pasivos diferidos', 2, ''),
('4.11.07.01.', 'Disminución de pasivos diferidos a corto plazo', 3, ''),
('4.11.07.01.01', 'Disminución de rentas diferidas por recaudar a corto plazo', 4, ''),
('4.11.07.02.', 'Disminución de pasivos diferidos a mediano y largo plazo', 3, ''),
('4.11.07.02.01', 'Disminución del rescate de certificados de reintegro tributario', 4, ''),
('4.11.07.02.02', 'Disminución del rescate de bonos de exportación', 4, ''),
('4.11.07.02.03', 'Disminución del rescate de bonos en dación de pagos', 4, ''),
('4.11.08.', 'Disminución de provisiones y reservas técnicas', 2, ''),
('4.11.08.01.', 'Disminución de provisiones', 3, ''),
('4.11.08.01.01', 'Disminución de provisiones para cuentas incobrables', 4, ''),
('4.11.08.01.02', 'Disminución de provisiones para despidos', 4, ''),
('4.11.08.01.03', 'Disminución de provisiones para pérdidas en el inventario', 4, ''),
('4.11.08.01.04', 'Disminución de provisiones  para beneficios sociales', 4, ''),
('4.11.08.01.99', 'Disminución de otras  provisiones', 4, ''),
('4.11.08.02.', 'Disminución de reservas técnicas', 3, ''),
('4.11.08.02.00', 'Disminución de reservas técnicas', 4, ''),
('4.11.09.', 'Disminución de fondos de terceros', 2, ''),
('4.11.09.01.', 'Disminución de depósitos recibidos en garantía', 3, ''),
('4.11.09.01.00', 'Disminución de depósitos recibidos en garantía', 4, ''),
('4.11.09.99.', 'Disminución de otros fondos de terceros', 3, ''),
('4.11.09.99.00', 'Disminución de otros fondos de terceros', 4, ''),
('4.11.10.', 'Disminución  de  depósitos  de instituciones financieras', 2, ''),
('4.11.10.01.', 'Disminución de depósitos a la vista', 3, ''),
('4.11.10.01.01', 'Disminución  de  depósitos   de  terceros  a  la  vista  de  organismos  del   sector público', 4, ''),
('4.11.10.01.02', 'Disminución  de depósitos de terceros a la vista de personas naturales y jurídicas del sector privado', 4, ''),
('4.11.10.02.', 'Disminución de depósitos a plazo fijo', 3, ''),
('4.11.10.02.01', 'Disminución de depósitos a plazo fijo de organismos del sector público', 4, ''),
('4.11.10.02.02', 'Disminución de depósitos a plazo fijo de personas naturales y jurídicas del sector privado', 4, ''),
('4.11.11.', 'Obligaciones de ejercicios anteriores', 2, ''),
('4.11.11.01.', 'Devoluciones de cobros indebidos', 3, ''),
('4.11.11.01.00', 'Devoluciones de cobros indebidos', 4, ''),
('4.11.11.02.', 'Devoluciones y reintegros diversos', 3, ''),
('4.11.11.02.00', 'Devoluciones y reintegros diversos', 4, ''),
('4.11.11.03.', 'Indemnizaciones diversas', 3, ''),
('4.11.11.03.00', 'Indemnizaciones diversas', 4, ''),
('4.11.11.04.', 'Compromisos pendientes de ejercicios anteriores', 3, ''),
('4.11.11.04.00', 'Compromisos pendientes de ejercicios anteriores', 4, ''),
('4.11.11.05.', 'Prestaciones de antigüedad originadas por la aplicación de la Ley Orgánica del Trabajo', 3, ''),
('4.11.11.05.00', 'Prestaciones de antigüedad originadas por la aplicación de la Ley Orgánica del Trabajo', 4, ''),
('4.11.98.', 'Disminución de otros pasivos a corto plazo', 2, ''),
('4.11.98.01.', 'Disminución de otros pasivos a corto plazo', 3, ''),
('4.11.98.01.00', 'Disminución de otros pasivos a corto plazo', 4, ''),
('4.11.99.', 'Disminución de otros pasivos a mediano y largo plazo', 2, ''),
('4.11.99.01.', 'Disminución de otros pasivos a mediano y largo plazo', 3, ''),
('4.11.99.01.00', 'Disminución de otros pasivos a mediano y largo plazo', 4, ''),
('4.12.', 'Disminución del patrimonio', 1, ''),
('4.12.01.', 'Disminución del capital  ', 2, ''),
('4.12.01.01.', 'Disminución del capital fiscal e institucional', 3, ''),
('4.12.01.01.00', 'Disminución del capital fiscal e institucional', 4, ''),
('4.12.01.02.', 'Disminución de aportes por capitalizar', 3, ''),
('4.12.01.02.00', 'Disminución de aportes por capitalizar', 4, ''),
('4.12.01.03.', 'Disminución de dividendos a distribuir', 3, ''),
('4.12.01.03.00', 'Disminución de dividendos a distribuir', 4, ''),
('4.12.02.', 'Disminución de reservas', 2, ''),
('4.12.02.01.', 'Disminución de reservas', 3, ''),
('4.12.02.01.00', 'Disminución de reservas', 4, ''),
('4.12.03.', 'Ajuste por inflación', 2, ''),
('4.12.03.01.', 'Ajuste por inflación', 3, ''),
('4.12.03.01.00', 'Ajuste por inflación', 4, ''),
('4.12.04.', 'Disminución de resultados', 2, ''),
('4.12.04.01.', 'Disminución de resultados acumulados', 3, ''),
('4.12.04.01.00', 'Disminución de resultados acumulados', 4, ''),
('4.12.04.02.', 'Disminución de resultados del ejercicio', 3, ''),
('4.12.04.02.00', 'Disminución de resultados del ejercicio', 4, ''),
('4.98.', 'Rectificaciones al presupuesto', 1, ''),
('4.98.01.', 'Rectificaciones al presupuesto  ', 2, ''),
('4.98.01.01.', 'Rectificaciones al presupuesto', 3, ''),
('4.98.01.01.00', 'Rectificaciones al presupuesto', 4, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `log_transacciones`
--

CREATE TABLE IF NOT EXISTS `log_transacciones` (
  `cod_log` int(12) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  `fecha_hora` datetime NOT NULL,
  `modulo` varchar(30) NOT NULL,
  `url` varchar(30) NOT NULL,
  `accion` varchar(20) NOT NULL,
  `valor` varchar(9) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(30) NOT NULL,
  PRIMARY KEY (`cod_log`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `log_transacciones`
--

INSERT INTO `log_transacciones` (`cod_log`, `descripcion`, `fecha_hora`, `modulo`, `url`, `accion`, `valor`, `usuario`) VALUES
(1, 'generacion de campos adicionales', '2012-06-20 23:03:43', 'Personal-campos adicionales', 'DEMONIO_CAMPOS_ADICIONALES.php', 'generar', '1', 'asys'),
(2, 'generacion de campos adicionales', '2012-06-20 23:05:13', 'Personal-campos adicionales', 'DEMONIO_CAMPOS_ADICIONALES.php', 'generar', '3', 'asys'),
(3, 'modificacion de campos adicionales', '2012-06-20 23:05:42', 'Personal-campos adicionales', 'otrosdatos_integrantes.php', 'editar', '3', 'asys'),
(4, 'generacion de campos adicionales', '2012-06-20 23:17:02', 'Personal-campos adicionales', 'DEMONIO_CAMPOS_ADICIONALES.php', 'generar', '4', 'asys'),
(5, 'modificacion de campos adicionales', '2012-06-20 23:17:34', 'Personal-campos adicionales', 'otrosdatos_integrantes.php', 'editar', '4', 'asys'),
(6, 'generacion de campos adicionales', '2012-06-20 23:17:50', 'Personal-campos adicionales', 'DEMONIO_CAMPOS_ADICIONALES.php', 'generar', '5', 'asys'),
(7, 'modificacion de campos adicionales', '2012-06-20 23:18:02', 'Personal-campos adicionales', 'otrosdatos_integrantes.php', 'editar', '5', 'asys'),
(8, 'generacion de campos adicionales', '2012-06-20 23:18:09', 'Personal-campos adicionales', 'DEMONIO_CAMPOS_ADICIONALES.php', 'generar', '6', 'asys'),
(9, 'modificacion de campos adicionales', '2012-06-20 23:18:22', 'Personal-campos adicionales', 'otrosdatos_integrantes.php', 'editar', '6', 'asys'),
(10, 'generacion de campos adicionales', '2012-06-20 23:18:30', 'Personal-campos adicionales', 'DEMONIO_CAMPOS_ADICIONALES.php', 'generar', '7', 'asys'),
(11, 'modificacion de campos adicionales', '2012-06-20 23:18:43', 'Personal-campos adicionales', 'otrosdatos_integrantes.php', 'editar', '7', 'asys'),
(12, 'generacion de campos adicionales', '2012-06-20 23:18:59', 'Personal-campos adicionales', 'DEMONIO_CAMPOS_ADICIONALES.php', 'generar', '8', 'asys'),
(13, 'modificacion de campos adicionales', '2012-06-20 23:19:19', 'Personal-campos adicionales', 'otrosdatos_integrantes.php', 'editar', '8', 'asys'),
(14, 'modificacion de campos adicionales', '2012-06-20 23:23:20', 'Personal-campos adicionales', 'otrosdatos_integrantes.php', 'editar', '2', 'asys'),
(15, 'generacion de campos adicionales', '2012-06-20 23:23:23', 'Personal-campos adicionales', 'DEMONIO_CAMPOS_ADICIONALES.php', 'generar', '2', 'asys'),
(16, 'modificacion de campos adicionales', '2012-06-20 23:23:46', 'Personal-campos adicionales', 'otrosdatos_integrantes.php', 'editar', '2', 'asys'),
(17, 'modificacion de campos adicionales', '2012-06-20 23:38:31', 'Personal-campos adicionales', 'otrosdatos_integrantes.php', 'editar', '8', 'asys');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomacumulados`
--

CREATE TABLE IF NOT EXISTS `nomacumulados` (
  `cod_tac` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `des_tac` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`cod_tac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomacumulados`
--

INSERT INTO `nomacumulados` (`cod_tac`, `des_tac`, `markar`, `ee`) VALUES
('CON', 'POR CONCEPTO', 0, 0),
('ISP', 'INTERESES S/PRESTACIONES', 0, 0),
('PS', 'PRESTACIONES SOCIALES', 0, 0),
('SI', 'SUELDO INTEGRAL', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomacumulados_det`
--

CREATE TABLE IF NOT EXISTS `nomacumulados_det` (
  `ceduda` int(9) NOT NULL,
  `ficha` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `anioa` int(4) NOT NULL,
  `mesa` int(2) NOT NULL,
  `dia` int(2) NOT NULL,
  `cod_tac` varchar(7) CHARACTER SET latin1 NOT NULL,
  `montototal` float(17,2) NOT NULL,
  `montobase` float(17,2) NOT NULL,
  `refer` float(17,2) NOT NULL,
  `montoresul` float(17,2) NOT NULL,
  `codnom` int(5) NOT NULL,
  `tipnom` int(11) NOT NULL,
  `operacion` varchar(2) CHARACTER SET latin1 NOT NULL,
  `codcon` int(5) NOT NULL,
  `unidad` varchar(11) CHARACTER SET latin1 NOT NULL,
  `tipcon` int(2) NOT NULL,
  `sfecha` varchar(9) CHARACTER SET latin1 NOT NULL,
  `montootros` float(17,2) NOT NULL,
  `ee` int(2) NOT NULL,
  `numcontrol` int(6) NOT NULL,
  `codsuc` int(6) NOT NULL,
  `coddir` int(6) NOT NULL,
  `codvp` int(6) NOT NULL,
  `codger` int(6) NOT NULL,
  `coddep` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomaumentos`
--

CREATE TABLE IF NOT EXISTS `nomaumentos` (
  `codlogro` int(11) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codlogro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomaumentos`
--

INSERT INTO `nomaumentos` (`codlogro`, `descrip`, `ee`) VALUES
(1, 'Aumento de Sueldo o Salario', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomaumentos_det`
--

CREATE TABLE IF NOT EXISTS `nomaumentos_det` (
  `cod_aumento` int(6) NOT NULL AUTO_INCREMENT,
  `tipo` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `estatus` varchar(9) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_aplica` date NOT NULL,
  `monto` decimal(6,0) NOT NULL,
  `cod_nomina` varchar(2) NOT NULL,
  `cod_categoria` varchar(2) NOT NULL,
  `cod_cargo` varchar(12) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `ficha` int(6) DEFAULT NULL,
  `usuario` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_aumento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='registros de los aumentos realizados o a realizar al persona' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombancos`
--

CREATE TABLE IF NOT EXISTS `nombancos` (
  `cod_ban` int(11) NOT NULL,
  `des_ban` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `suc_ban` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `gerente` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuentacob` varchar(22) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipocuenta` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `textoinicial` mediumtext COLLATE utf8_spanish_ci,
  `textofinal` mediumtext COLLATE utf8_spanish_ci,
  `markar` tinyint(4) DEFAULT NULL,
  `cod_gban` int(11) NOT NULL,
  `ctacon` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`cod_ban`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nombancos`
--

INSERT INTO `nombancos` (`cod_ban`, `des_ban`, `suc_ban`, `direccion`, `gerente`, `cuentacob`, `tipocuenta`, `textoinicial`, `textofinal`, `markar`, `cod_gban`, `ctacon`, `ee`) VALUES
(1, 'BOD', '', '', '', '', '', '', '', 0, 1, '', 0),
(2, 'BANESCO', '', '', '', '', '', '', '', 0, 1, '', 0),
(3, 'VENEZUELA', '', '', '', '', 'C', '', '', 0, 1, '', 0),
(4, 'FONDO COMUN', '', '', '', '', '', '', '', 0, 1, '', 0),
(5, 'BANCO MERCANTIL', '', '', '', '1193036135', 'C', '', '', 0, 1, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombaremos`
--

CREATE TABLE IF NOT EXISTS `nombaremos` (
  `codigo` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `tipodato` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `nombaremos`
--

INSERT INTO `nombaremos` (`codigo`, `descripcion`, `tipodato`) VALUES
(1, 'Tabulador de Profeciones para el Bono de Profesionalizacion', 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcalendarios_empresa`
--

CREATE TABLE IF NOT EXISTS `nomcalendarios_empresa` (
  `cod_empresa` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `dia_fiesta` int(11) NOT NULL,
  `descripcion_dia_fiesta` varchar(200) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcalendarios_personal`
--

CREATE TABLE IF NOT EXISTS `nomcalendarios_personal` (
  `cod_empresa` int(11) NOT NULL,
  `ficha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `dia_fiesta` int(11) NOT NULL,
  `descripcion_dia_fiesta` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`ficha`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcalendarios_tiposnomina`
--

CREATE TABLE IF NOT EXISTS `nomcalendarios_tiposnomina` (
  `cod_empresa` int(11) NOT NULL,
  `cod_tiponomina` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `dia_fiesta` int(11) NOT NULL,
  `descripcion_dia_fiesta` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_tiponomina`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomcalendarios_tiposnomina`
--

INSERT INTO `nomcalendarios_tiposnomina` (`cod_empresa`, `cod_tiponomina`, `fecha`, `dia_fiesta`, `descripcion_dia_fiesta`) VALUES
(1, 2, '2012-01-01', 1, ''),
(1, 2, '2012-01-02', 0, ''),
(1, 2, '2012-01-03', 0, ''),
(1, 2, '2012-01-04', 0, ''),
(1, 2, '2012-01-05', 0, ''),
(1, 2, '2012-01-06', 3, ''),
(1, 2, '2012-01-07', 0, ''),
(1, 2, '2012-01-08', 0, ''),
(1, 2, '2012-01-09', 0, ''),
(1, 2, '2012-01-10', 0, ''),
(1, 2, '2012-01-11', 0, ''),
(1, 2, '2012-01-12', 0, ''),
(1, 2, '2012-01-13', 0, ''),
(1, 2, '2012-01-14', 0, ''),
(1, 2, '2012-01-15', 0, ''),
(1, 2, '2012-01-16', 0, ''),
(1, 2, '2012-01-17', 0, ''),
(1, 2, '2012-01-18', 0, ''),
(1, 2, '2012-01-19', 0, ''),
(1, 2, '2012-01-20', 0, ''),
(1, 2, '2012-01-21', 0, ''),
(1, 2, '2012-01-22', 0, ''),
(1, 2, '2012-01-23', 0, ''),
(1, 2, '2012-01-24', 0, ''),
(1, 2, '2012-01-25', 0, ''),
(1, 2, '2012-01-26', 0, ''),
(1, 2, '2012-01-27', 0, ''),
(1, 2, '2012-01-28', 0, ''),
(1, 2, '2012-01-29', 0, ''),
(1, 2, '2012-01-30', 0, ''),
(1, 2, '2012-01-31', 0, ''),
(1, 2, '2012-02-01', 0, ''),
(1, 2, '2012-02-02', 0, ''),
(1, 2, '2012-02-03', 3, ''),
(1, 2, '2012-02-04', 0, ''),
(1, 2, '2012-02-05', 0, ''),
(1, 2, '2012-02-06', 0, ''),
(1, 2, '2012-02-07', 0, ''),
(1, 2, '2012-02-08', 0, ''),
(1, 2, '2012-02-09', 0, ''),
(1, 2, '2012-02-10', 0, ''),
(1, 2, '2012-02-11', 0, ''),
(1, 2, '2012-02-12', 0, ''),
(1, 2, '2012-02-13', 0, ''),
(1, 2, '2012-02-14', 0, ''),
(1, 2, '2012-02-15', 0, ''),
(1, 2, '2012-02-16', 0, ''),
(1, 2, '2012-02-17', 0, ''),
(1, 2, '2012-02-18', 0, ''),
(1, 2, '2012-02-19', 0, ''),
(1, 2, '2012-02-20', 0, ''),
(1, 2, '2012-02-21', 0, ''),
(1, 2, '2012-02-22', 0, ''),
(1, 2, '2012-02-23', 0, ''),
(1, 2, '2012-02-24', 0, ''),
(1, 2, '2012-02-25', 0, ''),
(1, 2, '2012-02-26', 0, ''),
(1, 2, '2012-02-27', 0, ''),
(1, 2, '2012-02-28', 0, ''),
(1, 2, '2012-02-29', 0, ''),
(1, 2, '2012-03-01', 0, ''),
(1, 2, '2012-03-02', 0, ''),
(1, 2, '2012-03-03', 0, ''),
(1, 2, '2012-03-04', 0, ''),
(1, 2, '2012-03-05', 0, ''),
(1, 2, '2012-03-06', 0, ''),
(1, 2, '2012-03-07', 0, ''),
(1, 2, '2012-03-08', 0, ''),
(1, 2, '2012-03-09', 0, ''),
(1, 2, '2012-03-10', 0, ''),
(1, 2, '2012-03-11', 0, ''),
(1, 2, '2012-03-12', 0, ''),
(1, 2, '2012-03-13', 0, ''),
(1, 2, '2012-03-14', 0, ''),
(1, 2, '2012-03-15', 0, ''),
(1, 2, '2012-03-16', 0, ''),
(1, 2, '2012-03-17', 0, ''),
(1, 2, '2012-03-18', 0, ''),
(1, 2, '2012-03-19', 0, ''),
(1, 2, '2012-03-20', 0, ''),
(1, 2, '2012-03-21', 0, ''),
(1, 2, '2012-03-22', 0, ''),
(1, 2, '2012-03-23', 0, ''),
(1, 2, '2012-03-24', 0, ''),
(1, 2, '2012-03-25', 0, ''),
(1, 2, '2012-03-26', 0, ''),
(1, 2, '2012-03-27', 0, ''),
(1, 2, '2012-03-28', 0, ''),
(1, 2, '2012-03-29', 0, ''),
(1, 2, '2012-03-30', 0, ''),
(1, 2, '2012-03-31', 0, ''),
(1, 2, '2012-04-01', 0, ''),
(1, 2, '2012-04-02', 0, ''),
(1, 2, '2012-04-03', 0, ''),
(1, 2, '2012-04-04', 0, ''),
(1, 2, '2012-04-05', 0, ''),
(1, 2, '2012-04-06', 0, ''),
(1, 2, '2012-04-07', 0, ''),
(1, 2, '2012-04-08', 0, ''),
(1, 2, '2012-04-09', 0, ''),
(1, 2, '2012-04-10', 0, ''),
(1, 2, '2012-04-11', 0, ''),
(1, 2, '2012-04-12', 0, ''),
(1, 2, '2012-04-13', 0, ''),
(1, 2, '2012-04-14', 0, ''),
(1, 2, '2012-04-15', 0, ''),
(1, 2, '2012-04-16', 0, ''),
(1, 2, '2012-04-17', 0, ''),
(1, 2, '2012-04-18', 0, ''),
(1, 2, '2012-04-19', 3, ''),
(1, 2, '2012-04-20', 0, ''),
(1, 2, '2012-04-21', 0, ''),
(1, 2, '2012-04-22', 0, ''),
(1, 2, '2012-04-23', 0, ''),
(1, 2, '2012-04-24', 0, ''),
(1, 2, '2012-04-25', 0, ''),
(1, 2, '2012-04-26', 0, ''),
(1, 2, '2012-04-27', 0, ''),
(1, 2, '2012-04-28', 0, ''),
(1, 2, '2012-04-29', 0, ''),
(1, 2, '2012-04-30', 0, ''),
(1, 2, '2012-05-01', 0, ''),
(1, 2, '2012-05-02', 0, ''),
(1, 2, '2012-05-03', 0, ''),
(1, 2, '2012-05-04', 0, ''),
(1, 2, '2012-05-05', 0, ''),
(1, 2, '2012-05-06', 0, ''),
(1, 2, '2012-05-07', 0, ''),
(1, 2, '2012-05-08', 0, ''),
(1, 2, '2012-05-09', 0, ''),
(1, 2, '2012-05-10', 0, ''),
(1, 2, '2012-05-11', 0, ''),
(1, 2, '2012-05-12', 0, ''),
(1, 2, '2012-05-13', 0, ''),
(1, 2, '2012-05-14', 0, ''),
(1, 2, '2012-05-15', 0, ''),
(1, 2, '2012-05-16', 0, ''),
(1, 2, '2012-05-17', 0, ''),
(1, 2, '2012-05-18', 0, ''),
(1, 2, '2012-05-19', 0, ''),
(1, 2, '2012-05-20', 0, ''),
(1, 2, '2012-05-21', 0, ''),
(1, 2, '2012-05-22', 0, ''),
(1, 2, '2012-05-23', 0, ''),
(1, 2, '2012-05-24', 0, ''),
(1, 2, '2012-05-25', 0, ''),
(1, 2, '2012-05-26', 0, ''),
(1, 2, '2012-05-27', 0, ''),
(1, 2, '2012-05-28', 0, ''),
(1, 2, '2012-05-29', 0, ''),
(1, 2, '2012-05-30', 0, ''),
(1, 2, '2012-05-31', 0, ''),
(1, 2, '2012-06-01', 0, ''),
(1, 2, '2012-06-02', 0, ''),
(1, 2, '2012-06-03', 0, ''),
(1, 2, '2012-06-04', 0, ''),
(1, 2, '2012-06-05', 0, ''),
(1, 2, '2012-06-06', 0, ''),
(1, 2, '2012-06-07', 0, ''),
(1, 2, '2012-06-08', 0, ''),
(1, 2, '2012-06-09', 0, ''),
(1, 2, '2012-06-10', 0, ''),
(1, 2, '2012-06-11', 0, ''),
(1, 2, '2012-06-12', 0, ''),
(1, 2, '2012-06-13', 0, ''),
(1, 2, '2012-06-14', 0, ''),
(1, 2, '2012-06-15', 0, ''),
(1, 2, '2012-06-16', 0, ''),
(1, 2, '2012-06-17', 0, ''),
(1, 2, '2012-06-18', 0, ''),
(1, 2, '2012-06-19', 0, ''),
(1, 2, '2012-06-20', 0, ''),
(1, 2, '2012-06-21', 0, ''),
(1, 2, '2012-06-22', 0, ''),
(1, 2, '2012-06-23', 0, ''),
(1, 2, '2012-06-24', 3, ''),
(1, 2, '2012-06-25', 0, ''),
(1, 2, '2012-06-26', 0, ''),
(1, 2, '2012-06-27', 0, ''),
(1, 2, '2012-06-28', 0, ''),
(1, 2, '2012-06-29', 0, ''),
(1, 2, '2012-06-30', 0, ''),
(1, 2, '2012-07-01', 0, ''),
(1, 2, '2012-07-02', 0, ''),
(1, 2, '2012-07-03', 0, ''),
(1, 2, '2012-07-04', 0, ''),
(1, 2, '2012-07-05', 0, ''),
(1, 2, '2012-07-06', 0, ''),
(1, 2, '2012-07-07', 0, ''),
(1, 2, '2012-07-08', 0, ''),
(1, 2, '2012-07-09', 0, ''),
(1, 2, '2012-07-10', 0, ''),
(1, 2, '2012-07-11', 0, ''),
(1, 2, '2012-07-12', 0, ''),
(1, 2, '2012-07-13', 0, ''),
(1, 2, '2012-07-14', 0, ''),
(1, 2, '2012-07-15', 0, ''),
(1, 2, '2012-07-16', 0, ''),
(1, 2, '2012-07-17', 0, ''),
(1, 2, '2012-07-18', 0, ''),
(1, 2, '2012-07-19', 0, ''),
(1, 2, '2012-07-20', 0, ''),
(1, 2, '2012-07-21', 0, ''),
(1, 2, '2012-07-22', 0, ''),
(1, 2, '2012-07-23', 0, ''),
(1, 2, '2012-07-24', 0, ''),
(1, 2, '2012-07-25', 0, ''),
(1, 2, '2012-07-26', 0, ''),
(1, 2, '2012-07-27', 0, ''),
(1, 2, '2012-07-28', 0, ''),
(1, 2, '2012-07-29', 0, ''),
(1, 2, '2012-07-30', 0, ''),
(1, 2, '2012-07-31', 0, ''),
(1, 2, '2012-08-01', 0, ''),
(1, 2, '2012-08-02', 0, ''),
(1, 2, '2012-08-03', 0, ''),
(1, 2, '2012-08-04', 0, ''),
(1, 2, '2012-08-05', 0, ''),
(1, 2, '2012-08-06', 0, ''),
(1, 2, '2012-08-07', 0, ''),
(1, 2, '2012-08-08', 0, ''),
(1, 2, '2012-08-09', 0, ''),
(1, 2, '2012-08-10', 0, ''),
(1, 2, '2012-08-11', 0, ''),
(1, 2, '2012-08-12', 0, ''),
(1, 2, '2012-08-13', 0, ''),
(1, 2, '2012-08-14', 0, ''),
(1, 2, '2012-08-15', 0, ''),
(1, 2, '2012-08-16', 0, ''),
(1, 2, '2012-08-17', 0, ''),
(1, 2, '2012-08-18', 0, ''),
(1, 2, '2012-08-19', 0, ''),
(1, 2, '2012-08-20', 0, ''),
(1, 2, '2012-08-21', 0, ''),
(1, 2, '2012-08-22', 0, ''),
(1, 2, '2012-08-23', 0, ''),
(1, 2, '2012-08-24', 0, ''),
(1, 2, '2012-08-25', 0, ''),
(1, 2, '2012-08-26', 0, ''),
(1, 2, '2012-08-27', 0, ''),
(1, 2, '2012-08-28', 0, ''),
(1, 2, '2012-08-29', 0, ''),
(1, 2, '2012-08-30', 0, ''),
(1, 2, '2012-08-31', 0, ''),
(1, 2, '2012-09-01', 0, ''),
(1, 2, '2012-09-02', 0, ''),
(1, 2, '2012-09-03', 0, ''),
(1, 2, '2012-09-04', 0, ''),
(1, 2, '2012-09-05', 0, ''),
(1, 2, '2012-09-06', 0, ''),
(1, 2, '2012-09-07', 0, ''),
(1, 2, '2012-09-08', 0, ''),
(1, 2, '2012-09-09', 0, ''),
(1, 2, '2012-09-10', 0, ''),
(1, 2, '2012-09-11', 0, ''),
(1, 2, '2012-09-12', 0, ''),
(1, 2, '2012-09-13', 0, ''),
(1, 2, '2012-09-14', 0, ''),
(1, 2, '2012-09-15', 0, ''),
(1, 2, '2012-09-16', 0, ''),
(1, 2, '2012-09-17', 0, ''),
(1, 2, '2012-09-18', 0, ''),
(1, 2, '2012-09-19', 0, ''),
(1, 2, '2012-09-20', 0, ''),
(1, 2, '2012-09-21', 0, ''),
(1, 2, '2012-09-22', 0, ''),
(1, 2, '2012-09-23', 0, ''),
(1, 2, '2012-09-24', 0, ''),
(1, 2, '2012-09-25', 0, ''),
(1, 2, '2012-09-26', 0, ''),
(1, 2, '2012-09-27', 0, ''),
(1, 2, '2012-09-28', 0, ''),
(1, 2, '2012-09-29', 0, ''),
(1, 2, '2012-09-30', 0, ''),
(1, 2, '2012-10-01', 0, ''),
(1, 2, '2012-10-02', 0, ''),
(1, 2, '2012-10-03', 0, ''),
(1, 2, '2012-10-04', 0, ''),
(1, 2, '2012-10-05', 0, ''),
(1, 2, '2012-10-06', 0, ''),
(1, 2, '2012-10-07', 0, ''),
(1, 2, '2012-10-08', 0, ''),
(1, 2, '2012-10-09', 0, ''),
(1, 2, '2012-10-10', 0, ''),
(1, 2, '2012-10-11', 0, ''),
(1, 2, '2012-10-12', 0, ''),
(1, 2, '2012-10-13', 0, ''),
(1, 2, '2012-10-14', 0, ''),
(1, 2, '2012-10-15', 0, ''),
(1, 2, '2012-10-16', 0, ''),
(1, 2, '2012-10-17', 0, ''),
(1, 2, '2012-10-18', 0, ''),
(1, 2, '2012-10-19', 0, ''),
(1, 2, '2012-10-20', 0, ''),
(1, 2, '2012-10-21', 0, ''),
(1, 2, '2012-10-22', 0, ''),
(1, 2, '2012-10-23', 0, ''),
(1, 2, '2012-10-24', 0, ''),
(1, 2, '2012-10-25', 0, ''),
(1, 2, '2012-10-26', 0, ''),
(1, 2, '2012-10-27', 0, ''),
(1, 2, '2012-10-28', 0, ''),
(1, 2, '2012-10-29', 0, ''),
(1, 2, '2012-10-30', 0, ''),
(1, 2, '2012-10-31', 0, ''),
(1, 2, '2012-11-01', 0, ''),
(1, 2, '2012-11-02', 0, ''),
(1, 2, '2012-11-03', 0, ''),
(1, 2, '2012-11-04', 0, ''),
(1, 2, '2012-11-05', 0, ''),
(1, 2, '2012-11-06', 0, ''),
(1, 2, '2012-11-07', 0, ''),
(1, 2, '2012-11-08', 0, ''),
(1, 2, '2012-11-09', 0, ''),
(1, 2, '2012-11-10', 0, ''),
(1, 2, '2012-11-11', 0, ''),
(1, 2, '2012-11-12', 0, ''),
(1, 2, '2012-11-13', 0, ''),
(1, 2, '2012-11-14', 0, ''),
(1, 2, '2012-11-15', 0, ''),
(1, 2, '2012-11-16', 0, ''),
(1, 2, '2012-11-17', 0, ''),
(1, 2, '2012-11-18', 0, ''),
(1, 2, '2012-11-19', 0, ''),
(1, 2, '2012-11-20', 0, ''),
(1, 2, '2012-11-21', 0, ''),
(1, 2, '2012-11-22', 0, ''),
(1, 2, '2012-11-23', 0, ''),
(1, 2, '2012-11-24', 0, ''),
(1, 2, '2012-11-25', 0, ''),
(1, 2, '2012-11-26', 0, ''),
(1, 2, '2012-11-27', 0, ''),
(1, 2, '2012-11-28', 0, ''),
(1, 2, '2012-11-29', 0, ''),
(1, 2, '2012-11-30', 0, ''),
(1, 2, '2012-12-01', 0, ''),
(1, 2, '2012-12-02', 0, ''),
(1, 2, '2012-12-03', 0, ''),
(1, 2, '2012-12-04', 0, ''),
(1, 2, '2012-12-05', 0, ''),
(1, 2, '2012-12-06', 0, ''),
(1, 2, '2012-12-07', 0, ''),
(1, 2, '2012-12-08', 0, ''),
(1, 2, '2012-12-09', 0, ''),
(1, 2, '2012-12-10', 0, ''),
(1, 2, '2012-12-11', 0, ''),
(1, 2, '2012-12-12', 0, ''),
(1, 2, '2012-12-13', 0, ''),
(1, 2, '2012-12-14', 0, ''),
(1, 2, '2012-12-15', 0, ''),
(1, 2, '2012-12-16', 0, ''),
(1, 2, '2012-12-17', 0, ''),
(1, 2, '2012-12-18', 0, ''),
(1, 2, '2012-12-19', 0, ''),
(1, 2, '2012-12-20', 0, ''),
(1, 2, '2012-12-21', 0, ''),
(1, 2, '2012-12-22', 0, ''),
(1, 2, '2012-12-23', 0, ''),
(1, 2, '2012-12-24', 0, ''),
(1, 2, '2012-12-25', 0, ''),
(1, 2, '2012-12-26', 0, ''),
(1, 2, '2012-12-27', 0, ''),
(1, 2, '2012-12-28', 0, ''),
(1, 2, '2012-12-29', 0, ''),
(1, 2, '2012-12-30', 0, ''),
(1, 2, '2012-12-31', 0, ''),
(1, 3, '2012-01-01', 0, ''),
(1, 3, '2012-01-02', 0, ''),
(1, 3, '2012-01-03', 0, ''),
(1, 3, '2012-01-04', 0, ''),
(1, 3, '2012-01-05', 0, ''),
(1, 3, '2012-01-06', 0, ''),
(1, 3, '2012-01-07', 0, ''),
(1, 3, '2012-01-08', 0, ''),
(1, 3, '2012-01-09', 0, ''),
(1, 3, '2012-01-10', 0, ''),
(1, 3, '2012-01-11', 0, ''),
(1, 3, '2012-01-12', 0, ''),
(1, 3, '2012-01-13', 0, ''),
(1, 3, '2012-01-14', 0, ''),
(1, 3, '2012-01-15', 0, ''),
(1, 3, '2012-01-16', 0, ''),
(1, 3, '2012-01-17', 0, ''),
(1, 3, '2012-01-18', 0, ''),
(1, 3, '2012-01-19', 0, ''),
(1, 3, '2012-01-20', 0, ''),
(1, 3, '2012-01-21', 0, ''),
(1, 3, '2012-01-22', 0, ''),
(1, 3, '2012-01-23', 0, ''),
(1, 3, '2012-01-24', 0, ''),
(1, 3, '2012-01-25', 0, ''),
(1, 3, '2012-01-26', 0, ''),
(1, 3, '2012-01-27', 0, ''),
(1, 3, '2012-01-28', 0, ''),
(1, 3, '2012-01-29', 0, ''),
(1, 3, '2012-01-30', 0, ''),
(1, 3, '2012-01-31', 0, ''),
(1, 3, '2012-02-01', 0, ''),
(1, 3, '2012-02-02', 0, ''),
(1, 3, '2012-02-03', 0, ''),
(1, 3, '2012-02-04', 0, ''),
(1, 3, '2012-02-05', 0, ''),
(1, 3, '2012-02-06', 0, ''),
(1, 3, '2012-02-07', 0, ''),
(1, 3, '2012-02-08', 0, ''),
(1, 3, '2012-02-09', 0, ''),
(1, 3, '2012-02-10', 0, ''),
(1, 3, '2012-02-11', 0, ''),
(1, 3, '2012-02-12', 0, ''),
(1, 3, '2012-02-13', 0, ''),
(1, 3, '2012-02-14', 0, ''),
(1, 3, '2012-02-15', 0, ''),
(1, 3, '2012-02-16', 0, ''),
(1, 3, '2012-02-17', 0, ''),
(1, 3, '2012-02-18', 0, ''),
(1, 3, '2012-02-19', 0, ''),
(1, 3, '2012-02-20', 0, ''),
(1, 3, '2012-02-21', 0, ''),
(1, 3, '2012-02-22', 0, ''),
(1, 3, '2012-02-23', 0, ''),
(1, 3, '2012-02-24', 0, ''),
(1, 3, '2012-02-25', 0, ''),
(1, 3, '2012-02-26', 0, ''),
(1, 3, '2012-02-27', 0, ''),
(1, 3, '2012-02-28', 0, ''),
(1, 3, '2012-02-29', 0, ''),
(1, 3, '2012-03-01', 0, ''),
(1, 3, '2012-03-02', 0, ''),
(1, 3, '2012-03-03', 0, ''),
(1, 3, '2012-03-04', 0, ''),
(1, 3, '2012-03-05', 0, ''),
(1, 3, '2012-03-06', 0, ''),
(1, 3, '2012-03-07', 0, ''),
(1, 3, '2012-03-08', 0, ''),
(1, 3, '2012-03-09', 0, ''),
(1, 3, '2012-03-10', 0, ''),
(1, 3, '2012-03-11', 0, ''),
(1, 3, '2012-03-12', 0, ''),
(1, 3, '2012-03-13', 0, ''),
(1, 3, '2012-03-14', 0, ''),
(1, 3, '2012-03-15', 0, ''),
(1, 3, '2012-03-16', 0, ''),
(1, 3, '2012-03-17', 0, ''),
(1, 3, '2012-03-18', 0, ''),
(1, 3, '2012-03-19', 0, ''),
(1, 3, '2012-03-20', 0, ''),
(1, 3, '2012-03-21', 0, ''),
(1, 3, '2012-03-22', 0, ''),
(1, 3, '2012-03-23', 0, ''),
(1, 3, '2012-03-24', 0, ''),
(1, 3, '2012-03-25', 0, ''),
(1, 3, '2012-03-26', 0, ''),
(1, 3, '2012-03-27', 0, ''),
(1, 3, '2012-03-28', 0, ''),
(1, 3, '2012-03-29', 0, ''),
(1, 3, '2012-03-30', 0, ''),
(1, 3, '2012-03-31', 0, ''),
(1, 3, '2012-04-01', 0, ''),
(1, 3, '2012-04-02', 0, ''),
(1, 3, '2012-04-03', 0, ''),
(1, 3, '2012-04-04', 0, ''),
(1, 3, '2012-04-05', 0, ''),
(1, 3, '2012-04-06', 0, ''),
(1, 3, '2012-04-07', 0, ''),
(1, 3, '2012-04-08', 0, ''),
(1, 3, '2012-04-09', 0, ''),
(1, 3, '2012-04-10', 0, ''),
(1, 3, '2012-04-11', 0, ''),
(1, 3, '2012-04-12', 0, ''),
(1, 3, '2012-04-13', 0, ''),
(1, 3, '2012-04-14', 0, ''),
(1, 3, '2012-04-15', 0, ''),
(1, 3, '2012-04-16', 0, ''),
(1, 3, '2012-04-17', 0, ''),
(1, 3, '2012-04-18', 0, ''),
(1, 3, '2012-04-19', 0, ''),
(1, 3, '2012-04-20', 0, ''),
(1, 3, '2012-04-21', 0, ''),
(1, 3, '2012-04-22', 0, ''),
(1, 3, '2012-04-23', 0, ''),
(1, 3, '2012-04-24', 0, ''),
(1, 3, '2012-04-25', 0, ''),
(1, 3, '2012-04-26', 0, ''),
(1, 3, '2012-04-27', 0, ''),
(1, 3, '2012-04-28', 0, ''),
(1, 3, '2012-04-29', 0, ''),
(1, 3, '2012-04-30', 0, ''),
(1, 3, '2012-05-01', 0, ''),
(1, 3, '2012-05-02', 0, ''),
(1, 3, '2012-05-03', 0, ''),
(1, 3, '2012-05-04', 0, ''),
(1, 3, '2012-05-05', 0, ''),
(1, 3, '2012-05-06', 0, ''),
(1, 3, '2012-05-07', 0, ''),
(1, 3, '2012-05-08', 0, ''),
(1, 3, '2012-05-09', 0, ''),
(1, 3, '2012-05-10', 0, ''),
(1, 3, '2012-05-11', 0, ''),
(1, 3, '2012-05-12', 0, ''),
(1, 3, '2012-05-13', 0, ''),
(1, 3, '2012-05-14', 0, ''),
(1, 3, '2012-05-15', 0, ''),
(1, 3, '2012-05-16', 0, ''),
(1, 3, '2012-05-17', 0, ''),
(1, 3, '2012-05-18', 0, ''),
(1, 3, '2012-05-19', 0, ''),
(1, 3, '2012-05-20', 0, ''),
(1, 3, '2012-05-21', 0, ''),
(1, 3, '2012-05-22', 0, ''),
(1, 3, '2012-05-23', 0, ''),
(1, 3, '2012-05-24', 0, ''),
(1, 3, '2012-05-25', 0, ''),
(1, 3, '2012-05-26', 0, ''),
(1, 3, '2012-05-27', 0, ''),
(1, 3, '2012-05-28', 0, ''),
(1, 3, '2012-05-29', 0, ''),
(1, 3, '2012-05-30', 0, ''),
(1, 3, '2012-05-31', 0, ''),
(1, 3, '2012-06-01', 0, ''),
(1, 3, '2012-06-02', 0, ''),
(1, 3, '2012-06-03', 1, ''),
(1, 3, '2012-06-04', 0, ''),
(1, 3, '2012-06-05', 0, ''),
(1, 3, '2012-06-06', 0, ''),
(1, 3, '2012-06-07', 0, ''),
(1, 3, '2012-06-08', 0, ''),
(1, 3, '2012-06-09', 0, ''),
(1, 3, '2012-06-10', 1, ''),
(1, 3, '2012-06-11', 0, ''),
(1, 3, '2012-06-12', 0, ''),
(1, 3, '2012-06-13', 0, ''),
(1, 3, '2012-06-14', 0, ''),
(1, 3, '2012-06-15', 0, ''),
(1, 3, '2012-06-16', 0, ''),
(1, 3, '2012-06-17', 1, ''),
(1, 3, '2012-06-18', 0, ''),
(1, 3, '2012-06-19', 0, ''),
(1, 3, '2012-06-20', 0, ''),
(1, 3, '2012-06-21', 0, ''),
(1, 3, '2012-06-22', 0, ''),
(1, 3, '2012-06-23', 0, ''),
(1, 3, '2012-06-24', 1, ''),
(1, 3, '2012-06-25', 0, ''),
(1, 3, '2012-06-26', 0, ''),
(1, 3, '2012-06-27', 0, ''),
(1, 3, '2012-06-28', 0, ''),
(1, 3, '2012-06-29', 0, ''),
(1, 3, '2012-06-30', 0, ''),
(1, 3, '2012-07-01', 1, ''),
(1, 3, '2012-07-02', 0, ''),
(1, 3, '2012-07-03', 0, ''),
(1, 3, '2012-07-04', 0, ''),
(1, 3, '2012-07-05', 3, ''),
(1, 3, '2012-07-06', 0, ''),
(1, 3, '2012-07-07', 0, ''),
(1, 3, '2012-07-08', 1, ''),
(1, 3, '2012-07-09', 0, ''),
(1, 3, '2012-07-10', 0, ''),
(1, 3, '2012-07-11', 0, ''),
(1, 3, '2012-07-12', 0, ''),
(1, 3, '2012-07-13', 0, ''),
(1, 3, '2012-07-14', 0, ''),
(1, 3, '2012-07-15', 1, ''),
(1, 3, '2012-07-16', 0, ''),
(1, 3, '2012-07-17', 0, ''),
(1, 3, '2012-07-18', 0, ''),
(1, 3, '2012-07-19', 0, ''),
(1, 3, '2012-07-20', 0, ''),
(1, 3, '2012-07-21', 0, ''),
(1, 3, '2012-07-22', 1, ''),
(1, 3, '2012-07-23', 0, ''),
(1, 3, '2012-07-24', 3, ''),
(1, 3, '2012-07-25', 0, ''),
(1, 3, '2012-07-26', 0, ''),
(1, 3, '2012-07-27', 0, ''),
(1, 3, '2012-07-28', 0, ''),
(1, 3, '2012-07-29', 1, ''),
(1, 3, '2012-07-30', 0, ''),
(1, 3, '2012-07-31', 0, ''),
(1, 3, '2012-08-01', 0, ''),
(1, 3, '2012-08-02', 0, ''),
(1, 3, '2012-08-03', 0, ''),
(1, 3, '2012-08-04', 0, ''),
(1, 3, '2012-08-05', 1, ''),
(1, 3, '2012-08-06', 0, ''),
(1, 3, '2012-08-07', 0, ''),
(1, 3, '2012-08-08', 0, ''),
(1, 3, '2012-08-09', 0, ''),
(1, 3, '2012-08-10', 0, ''),
(1, 3, '2012-08-11', 0, ''),
(1, 3, '2012-08-12', 1, ''),
(1, 3, '2012-08-13', 0, ''),
(1, 3, '2012-08-14', 0, ''),
(1, 3, '2012-08-15', 0, ''),
(1, 3, '2012-08-16', 0, ''),
(1, 3, '2012-08-17', 0, ''),
(1, 3, '2012-08-18', 0, ''),
(1, 3, '2012-08-19', 1, ''),
(1, 3, '2012-08-20', 0, ''),
(1, 3, '2012-08-21', 0, ''),
(1, 3, '2012-08-22', 0, ''),
(1, 3, '2012-08-23', 0, ''),
(1, 3, '2012-08-24', 0, ''),
(1, 3, '2012-08-25', 0, ''),
(1, 3, '2012-08-26', 1, ''),
(1, 3, '2012-08-27', 0, ''),
(1, 3, '2012-08-28', 0, ''),
(1, 3, '2012-08-29', 0, ''),
(1, 3, '2012-08-30', 0, ''),
(1, 3, '2012-08-31', 0, ''),
(1, 3, '2012-09-01', 0, ''),
(1, 3, '2012-09-02', 1, ''),
(1, 3, '2012-09-03', 0, ''),
(1, 3, '2012-09-04', 0, ''),
(1, 3, '2012-09-05', 0, ''),
(1, 3, '2012-09-06', 0, ''),
(1, 3, '2012-09-07', 0, ''),
(1, 3, '2012-09-08', 0, ''),
(1, 3, '2012-09-09', 1, ''),
(1, 3, '2012-09-10', 0, ''),
(1, 3, '2012-09-11', 0, ''),
(1, 3, '2012-09-12', 0, ''),
(1, 3, '2012-09-13', 0, ''),
(1, 3, '2012-09-14', 0, ''),
(1, 3, '2012-09-15', 0, ''),
(1, 3, '2012-09-16', 1, ''),
(1, 3, '2012-09-17', 0, ''),
(1, 3, '2012-09-18', 0, ''),
(1, 3, '2012-09-19', 0, ''),
(1, 3, '2012-09-20', 0, ''),
(1, 3, '2012-09-21', 0, ''),
(1, 3, '2012-09-22', 0, ''),
(1, 3, '2012-09-23', 1, ''),
(1, 3, '2012-09-24', 0, ''),
(1, 3, '2012-09-25', 0, ''),
(1, 3, '2012-09-26', 0, ''),
(1, 3, '2012-09-27', 0, ''),
(1, 3, '2012-09-28', 0, ''),
(1, 3, '2012-09-29', 0, ''),
(1, 3, '2012-09-30', 1, ''),
(1, 3, '2012-10-01', 0, ''),
(1, 3, '2012-10-02', 0, ''),
(1, 3, '2012-10-03', 0, ''),
(1, 3, '2012-10-04', 0, ''),
(1, 3, '2012-10-05', 0, ''),
(1, 3, '2012-10-06', 0, ''),
(1, 3, '2012-10-07', 1, ''),
(1, 3, '2012-10-08', 0, ''),
(1, 3, '2012-10-09', 0, ''),
(1, 3, '2012-10-10', 0, ''),
(1, 3, '2012-10-11', 0, ''),
(1, 3, '2012-10-12', 3, ''),
(1, 3, '2012-10-13', 0, ''),
(1, 3, '2012-10-14', 1, ''),
(1, 3, '2012-10-15', 0, ''),
(1, 3, '2012-10-16', 0, ''),
(1, 3, '2012-10-17', 0, ''),
(1, 3, '2012-10-18', 0, ''),
(1, 3, '2012-10-19', 0, ''),
(1, 3, '2012-10-20', 0, ''),
(1, 3, '2012-10-21', 1, ''),
(1, 3, '2012-10-22', 0, ''),
(1, 3, '2012-10-23', 0, ''),
(1, 3, '2012-10-24', 0, ''),
(1, 3, '2012-10-25', 0, ''),
(1, 3, '2012-10-26', 0, ''),
(1, 3, '2012-10-27', 0, ''),
(1, 3, '2012-10-28', 1, ''),
(1, 3, '2012-10-29', 0, ''),
(1, 3, '2012-10-30', 0, ''),
(1, 3, '2012-10-31', 0, ''),
(1, 3, '2012-11-01', 0, ''),
(1, 3, '2012-11-02', 0, ''),
(1, 3, '2012-11-03', 0, ''),
(1, 3, '2012-11-04', 1, ''),
(1, 3, '2012-11-05', 0, ''),
(1, 3, '2012-11-06', 0, ''),
(1, 3, '2012-11-07', 0, ''),
(1, 3, '2012-11-08', 0, ''),
(1, 3, '2012-11-09', 0, ''),
(1, 3, '2012-11-10', 0, ''),
(1, 3, '2012-11-11', 1, ''),
(1, 3, '2012-11-12', 0, ''),
(1, 3, '2012-11-13', 0, ''),
(1, 3, '2012-11-14', 0, ''),
(1, 3, '2012-11-15', 0, ''),
(1, 3, '2012-11-16', 0, ''),
(1, 3, '2012-11-17', 0, ''),
(1, 3, '2012-11-18', 1, ''),
(1, 3, '2012-11-19', 0, ''),
(1, 3, '2012-11-20', 0, ''),
(1, 3, '2012-11-21', 0, ''),
(1, 3, '2012-11-22', 0, ''),
(1, 3, '2012-11-23', 0, ''),
(1, 3, '2012-11-24', 0, ''),
(1, 3, '2012-11-25', 1, ''),
(1, 3, '2012-11-26', 0, ''),
(1, 3, '2012-11-27', 0, ''),
(1, 3, '2012-11-28', 0, ''),
(1, 3, '2012-11-29', 0, ''),
(1, 3, '2012-11-30', 0, ''),
(1, 3, '2012-12-01', 0, ''),
(1, 3, '2012-12-02', 1, ''),
(1, 3, '2012-12-03', 0, ''),
(1, 3, '2012-12-04', 0, ''),
(1, 3, '2012-12-05', 0, ''),
(1, 3, '2012-12-06', 0, ''),
(1, 3, '2012-12-07', 0, ''),
(1, 3, '2012-12-08', 0, ''),
(1, 3, '2012-12-09', 1, ''),
(1, 3, '2012-12-10', 0, ''),
(1, 3, '2012-12-11', 0, ''),
(1, 3, '2012-12-12', 0, ''),
(1, 3, '2012-12-13', 0, ''),
(1, 3, '2012-12-14', 0, ''),
(1, 3, '2012-12-15', 0, ''),
(1, 3, '2012-12-16', 1, ''),
(1, 3, '2012-12-17', 0, ''),
(1, 3, '2012-12-18', 0, ''),
(1, 3, '2012-12-19', 0, ''),
(1, 3, '2012-12-20', 0, ''),
(1, 3, '2012-12-21', 0, ''),
(1, 3, '2012-12-22', 0, ''),
(1, 3, '2012-12-23', 1, ''),
(1, 3, '2012-12-24', 0, ''),
(1, 3, '2012-12-25', 3, ''),
(1, 3, '2012-12-26', 0, ''),
(1, 3, '2012-12-27', 0, ''),
(1, 3, '2012-12-28', 0, ''),
(1, 3, '2012-12-29', 0, ''),
(1, 3, '2012-12-30', 0, ''),
(1, 3, '2012-12-31', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcampos_adicionales`
--

CREATE TABLE IF NOT EXISTS `nomcampos_adicionales` (
  `archivo` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `id` int(11) NOT NULL,
  `descrip` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `etiqueta` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codorgh` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `valdefecto1` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `particular` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  `busca` tinyint(1) DEFAULT NULL,
  `tipocamposadic` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomcampos_adicionales`
--

INSERT INTO `nomcampos_adicionales` (`archivo`, `id`, `descrip`, `etiqueta`, `tipo`, `codorgh`, `valdefecto1`, `particular`, `ee`, `busca`, `tipocamposadic`) VALUES
('nompersonal', 1, 'RIF', 'CÃ³digo RIF', 'A', NULL, '', 0, 0, 1, 3),
('nompersonal', 2, 'SEGURO SOCIAL', 'SI/NO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 3, 'REGIMEN DE SEGURIDAD SOCIAL ', 'SI/NO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 4, 'FONDO DE AHORRO OBLIGATORIO P/', 'SI/NO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 5, 'DIAS DOMINGO TRABAJADO ', 'SI/NO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 6, 'HORAS EXTRAS DIURNAS ', 'SI/NO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 7, 'BONO NOCTURNO QUINCENAL', 'SI/NO', 'A', NULL, 'NO', 0, 0, 0, 3),
('nompersonal', 8, 'DIAS FERIADO TRABAJADO ', 'SI/NO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 9, 'DIA RELEVO ', 'SI/NO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 10, 'AUSENCIAS NO JUSTIFICADAS ', 'SI/NO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 11, 'HORAS NO TRABAJADAS ', 'SI/NO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 12, 'BONO VEHICULO/MOTO', 'SI/NO', 'A', NULL, 'NO', 0, 0, 0, 3),
('nompersonal', 13, 'IMPUESTO SOBRE LA RENTA', 'NUMERO', 'N', NULL, '0', 0, 0, 0, 3),
('nompersonal', 14, 'FONDO DE AHORRO DE EMPRESA', '%', 'N', NULL, '0', 0, 0, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcampos_adic_personal`
--

CREATE TABLE IF NOT EXISTS `nomcampos_adic_personal` (
  `ficha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `id` int(11) NOT NULL,
  `valor` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `mascara` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codorgd` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codorgh` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  `tiponom` int(11) NOT NULL,
  PRIMARY KEY (`ficha`,`id`,`tiponom`),
  KEY `fc_idx_133` (`codorgd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomcampos_adic_personal`
--

INSERT INTO `nomcampos_adic_personal` (`ficha`, `id`, `valor`, `mascara`, `tipo`, `codorgd`, `codorgh`, `ee`, `tiponom`) VALUES
('1', 1, '', NULL, 'A', NULL, NULL, NULL, 3),
('1', 2, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('1', 3, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('1', 4, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('1', 5, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('1', 6, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('1', 7, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('1', 8, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('1', 9, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('1', 10, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('1', 11, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('1', 12, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('1', 13, '0', NULL, 'N', NULL, NULL, NULL, 3),
('1', 14, '0', NULL, 'N', NULL, NULL, NULL, 3),
('2', 1, '', NULL, 'A', NULL, NULL, NULL, 3),
('2', 2, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('2', 3, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('2', 4, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('2', 5, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('2', 6, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('2', 7, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('2', 8, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('2', 9, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('2', 10, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('2', 11, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('2', 12, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('2', 13, '0', NULL, 'N', NULL, NULL, NULL, 3),
('2', 14, '0', NULL, 'N', NULL, NULL, NULL, 3),
('3', 1, '', NULL, 'A', NULL, NULL, NULL, 3),
('3', 2, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('3', 3, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('3', 4, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('3', 5, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('3', 6, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('3', 7, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('3', 8, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('3', 9, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('3', 10, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('3', 11, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('3', 12, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('3', 13, '0', NULL, 'N', NULL, NULL, NULL, 3),
('3', 14, '0', NULL, 'N', NULL, NULL, NULL, 3),
('4', 1, '', NULL, 'A', NULL, NULL, NULL, 3),
('4', 2, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('4', 3, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('4', 4, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('4', 5, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('4', 6, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('4', 7, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('4', 8, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('4', 9, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('4', 10, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('4', 11, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('4', 12, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('4', 13, '0', NULL, 'N', NULL, NULL, NULL, 3),
('4', 14, '0', NULL, 'N', NULL, NULL, NULL, 3),
('5', 1, '', NULL, 'A', NULL, NULL, NULL, 3),
('5', 2, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('5', 3, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('5', 4, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('5', 5, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('5', 6, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('5', 7, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('5', 8, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('5', 9, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('5', 10, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('5', 11, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('5', 12, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('5', 13, '0', NULL, 'N', NULL, NULL, NULL, 3),
('5', 14, '0', NULL, 'N', NULL, NULL, NULL, 3),
('6', 1, '', NULL, 'A', NULL, NULL, NULL, 3),
('6', 2, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('6', 3, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('6', 4, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('6', 5, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('6', 6, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('6', 7, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('6', 8, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('6', 9, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('6', 10, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('6', 11, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('6', 12, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('6', 13, '0', NULL, 'N', NULL, NULL, NULL, 3),
('6', 14, '0', NULL, 'N', NULL, NULL, NULL, 3),
('7', 1, '', NULL, 'A', NULL, NULL, NULL, 3),
('7', 2, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('7', 3, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('7', 4, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('7', 5, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('7', 6, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('7', 7, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('7', 8, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('7', 9, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('7', 10, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('7', 11, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('7', 12, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('7', 13, '0', NULL, 'N', NULL, NULL, NULL, 3),
('7', 14, '0', NULL, 'N', NULL, NULL, NULL, 3),
('8', 1, '', NULL, 'A', NULL, NULL, NULL, 3),
('8', 2, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('8', 3, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('8', 4, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('8', 5, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('8', 6, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('8', 7, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('8', 8, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('8', 9, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('8', 10, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('8', 11, 'SI', NULL, 'A', NULL, NULL, NULL, 3),
('8', 12, 'NO', NULL, 'A', NULL, NULL, NULL, 3),
('8', 13, '0', NULL, 'N', NULL, NULL, NULL, 3),
('8', 14, '0', NULL, 'N', NULL, NULL, NULL, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcargos`
--

CREATE TABLE IF NOT EXISTS `nomcargos` (
  `cod_car` varchar(12) COLLATE utf8_spanish_ci NOT NULL,
  `des_car` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `grado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `perfil` mediumtext COLLATE utf8_spanish_ci,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`cod_car`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomcargos`
--

INSERT INTO `nomcargos` (`cod_car`, `des_car`, `grado`, `perfil`, `markar`, `ee`) VALUES
('01', 'ENCARGADO DE TIENDAS', '', '', 0, 0),
('02', 'DEPOSITARIO', '', '', 0, 0),
('03', 'ANALISTA ADMINISTRATIVO', '', '', 0, 0),
('04', 'CAJERA', '', '', 0, 0),
('05', 'VENDEDORA', '', '', 0, 0),
('06', 'JEFE DE ENFERMERIA', '', '', 0, 0),
('07', 'COORDINADOR DE ENFERMERIA', '', '', 0, 0),
('08', 'SUPERVISOR DE ENFERMERIA', '', '', 0, 0),
('09', 'ENFERMERA I', '', '', 0, 0),
('10', 'ENFERMERO I RELEVO', '1', NULL, NULL, NULL),
('100', 'ANALISTA DE COBRANZAS', '', '', 0, 0),
('101', 'JEFE DE COSTOS', '', '', 0, 0),
('11', 'AUXILIAR DE ENFERMERIA', '', '', 0, 0),
('12', 'CAMILLERO', '', '', 0, 0),
('13', 'SUPERVISOR DE HCM', '', '', 0, 0),
('14', 'ANALISTA DE ADMISION', '1', NULL, NULL, NULL),
('15', 'ENCARGADO DE PROTOCOLO', '', '', 0, 0),
('16', 'OPERADOR DE PROTOCOLO', '', '', 0, 0),
('17', 'INSTRUMENTISTA', '', '', 0, 0),
('18', 'CIRCULANTE DE QUIROFANO', '', '', 0, 0),
('19', 'SUPERVISOR DE RECURSOS HUMANOS', '', '', 0, 0),
('2', 'ENFERMERA AUXILIAR', '10', '', 0, 0),
('20', 'ANALISTA DE RECURSOS HUMANOS', '1', NULL, NULL, NULL),
('21', 'ASISTENTE ADMINISTRATIVO', '', '', 0, 0),
('22', 'ASISTENTE DE MANTENIMIENTO', '', '', 0, 0),
('23', 'COORDINADOR DE SISTEMAS', '', '', 0, 0),
('24', 'ANALISTA PROGRAMADOR', '', '', 0, 0),
('25', 'ADMINISTRADOR DE REDES', '1', NULL, NULL, NULL),
('26', 'SUPERVISOR DE CAI', '', '', 0, 0),
('27', 'ASISTENTE DE SERVICIOS MEDICOS', '', '', 0, 0),
('28', 'RECEPCIONISTA                           ', '1', NULL, NULL, NULL),
('29', 'MENSAJERO-MOTORIZADO                               ', '1', NULL, NULL, NULL),
('30', 'MEDICO DE PLANTA', '', '', 0, 0),
('31', 'ASISTENTE ADMINISTRATIVO', '', '', 0, 0),
('32', 'ASISTENTE DE COBRANZAS', '', '', 0, 0),
('33', 'SUPERVISOR DE FACTURACION', '', '', 0, 0),
('34', 'DIRECTOR MEDICO', '', '', 0, 0),
('35', 'SUPERVISOR DE ADMISION', '', '', 0, 0),
('49', 'JEFE DE RR.HH.', '1', NULL, NULL, NULL),
('82', 'COORDINADOR ADMINISTRATIVO', '1', '', 0, 0),
('85', 'DIRECTOR DE SERVICIOS GENERALES', '1', '', 0, 0),
('86', 'COORDINADOR DE SERVICIOS MEDICOS (CAI)', '', '', 0, 0),
('87', 'GERENTE DE SEGURIDAD', '1', '', 0, 0),
('88', 'GERENTE DE COBRANZAS', '1', '', 0, 0),
('89', 'GERENTE DE SISTEMAS', '1', '', 0, 0),
('90', 'ASISTENTE DE JUNTA INTERVENTORA', '1', '', 0, 0),
('91', 'GERENTE DE ADMINISTRACION', '1', '', 0, 0),
('92', 'GERENTE DE RECURSOS HUMANOS', '1', '', 0, 0),
('93', 'GERENTE DE PROYECTOS', '1', '', 0, 0),
('94', 'GERENTE DE SERVICIOS GENERALES', '', '', 0, 0),
('95', 'GERENTE DE COMUNICACIONES INTEGRADAS', '1', '', 0, 0),
('96', 'AUXILIAR DE CONTABILIDAD', '', '', 0, 0),
('97', 'AUXILIAR DE ARCHIVO', '', '', 0, 0),
('99', 'ENFERMERO PROFESIONAL', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcategorias`
--

CREATE TABLE IF NOT EXISTS `nomcategorias` (
  `codorg` int(10) unsigned NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `gr` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  `ocupacion` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_22` (`descrip`),
  KEY `fc_idx_23` (`gr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomcategorias`
--

INSERT INTO `nomcategorias` (`codorg`, `descrip`, `gr`, `ee`, `ocupacion`) VALUES
(1, 'ADMINISTRATIVOS', '', 0, 'E'),
(2, 'PROFESIONAL', '', 0, 'E'),
(3, 'TECNICOS', '', 0, ''),
(4, 'BACHILLER', '', 0, 'E'),
(6, 'TECNICOS / PROFESIONALES', '', 0, ''),
(7, 'DIRECTIVO', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos`
--

CREATE TABLE IF NOT EXISTS `nomconceptos` (
  `codcon` int(11) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipcon` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `unidad` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ctacon` varchar(22) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contractual` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `impdet` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `proratea` tinyint(1) DEFAULT NULL,
  `usaalter` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descalter` mediumtext COLLATE utf8_spanish_ci,
  `formula` mediumtext COLLATE utf8_spanish_ci,
  `modifdef` tinyint(1) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `tercero` tinyint(4) DEFAULT NULL,
  `ccosto` tinyint(4) DEFAULT NULL,
  `codccosto` int(11) DEFAULT NULL,
  `debcre` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bonificable` tinyint(1) DEFAULT NULL,
  `htiempo` tinyint(1) DEFAULT NULL,
  `valdefecto` decimal(17,2) DEFAULT NULL,
  `con_cu_cc` tinyint(4) DEFAULT NULL,
  `con_mcun_cc` tinyint(4) DEFAULT NULL,
  `con_mcuc_cc` tinyint(4) DEFAULT NULL,
  `con_cu_mccn` tinyint(4) DEFAULT NULL,
  `con_cu_mccc` tinyint(4) DEFAULT NULL,
  `con_mcun_mccn` tinyint(4) DEFAULT NULL,
  `con_mcuc_mccc` tinyint(4) DEFAULT NULL,
  `con_mcun_mccc` tinyint(4) DEFAULT NULL,
  `con_mcuc_mccn` tinyint(4) DEFAULT NULL,
  `nivelescuenta` tinyint(4) DEFAULT NULL,
  `nivelesccosto` tinyint(4) DEFAULT NULL,
  `semodifica` tinyint(1) DEFAULT NULL,
  `verref` tinyint(1) DEFAULT NULL,
  `vermonto` tinyint(1) DEFAULT NULL,
  `particular` tinyint(4) DEFAULT NULL,
  `montocero` tinyint(1) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  `fmodif` tinyint(1) DEFAULT NULL,
  `aplicaexcel` tinyint(4) DEFAULT NULL,
  `descripexcel` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ctacon1` varchar(22) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codcon`),
  KEY `fc_idx_53` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomconceptos`
--

INSERT INTO `nomconceptos` (`codcon`, `descrip`, `tipcon`, `unidad`, `ctacon`, `contractual`, `impdet`, `proratea`, `usaalter`, `descalter`, `formula`, `modifdef`, `markar`, `tercero`, `ccosto`, `codccosto`, `debcre`, `bonificable`, `htiempo`, `valdefecto`, `con_cu_cc`, `con_mcun_cc`, `con_mcuc_cc`, `con_cu_mccn`, `con_cu_mccc`, `con_mcun_mccn`, `con_mcuc_mccc`, `con_mcun_mccc`, `con_mcuc_mccn`, `nivelescuenta`, `nivelesccosto`, `semodifica`, `verref`, `vermonto`, `particular`, `montocero`, `ee`, `fmodif`, `aplicaexcel`, `descripexcel`, `ctacon1`) VALUES
(100, ' ************ ASIGNACIONES  ************							', 'A', '', '1.', '', 'N', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(101, 'SUELDO																																																						', 'A', 'M', '1.', '1', 'S', 1, '0', '', '#$REF=DIASTRABAJADOS($CEDULA, 102, $FECHANOMINA, $FECHAFINNOM);\r\n$REF=CONTROL($CEDULA,"102");\r\n$MONTO=($SUELDO/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(102, 'DIAS TRABAJADOS																																													', 'A', 'M', '1.', '1', 'S', 1, '0', '', '$REF=1;\r\n$MONTO=($SUELDO/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(103, 'HORAS EXTRAS DIURNAS																																								', 'A', 'H', '1.', '1', 'S', 1, '0', '', '$T01=(($SUELDO/30)/8)/60;\r\n$REF=CONTROL($CEDULA,"B001");\r\n$T02=$T01*$REF;\r\n$MONTO=SI(CAMPOADICIONALPER(6)=="SI",$T02,0);\r\n$REF=$REF/60;', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(104, 'DIA FERIADO TRABAJADO																																							', 'A', 'M', '1.', '1', 'S', 1, '0', '', '$T01=($SUELDO/30)*1.5;\r\n$REF=CONTROL($CEDULA,"104");\r\n$MONTO=$T01*$REF;', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(105, 'DIA DOMINGO TRABAJADO																																						', 'A', 'M', '1.', '1', 'S', 1, '0', '', '$T01=($SUELDO/30)*1.5;\r\n$REF=CONCEPTO("B0081");\r\n$T04=$T01*$REF*2;\r\n$T03=$T01*$REF;\r\n$T02=SI("((($NIVEL4==4)||($NIVEL4==3)||($NIVEL4==2)||($NIVEL4==1))&&(CAMPOADICIONALPER(7)==NO))",$T04 ,$T03);\r\n$MONTO=SI(CAMPOADICIONALPER(5)=="SI",$T02,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(106, 'BONO DE ALIMENTACION', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$REF=CONTROL($CEDULA, "102");\r\n$MONTO=22.5*$REF;', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(107, 'PRESTACIONES															', 'A', 'M', '1.', '', 'S', 1, '0', '', '$T01=ASIGMESACTUAL($FECHAFINNOM,$FICHA);\r\n\r\n$T02=ANTIGUEDADLIQ($FECHAINGRESO,$FECHAFINNOM,2,0,0,0);\r\n\r\n$T03=(($T01/30)*40)/12;\r\n$T04=(($T01/30)*90)/12;\r\n$T05=($T01+$T03+$T04)/30;\r\n$T06=ANTIGUEDAD($FECHAINGRESO,$FECHAFINNOM,"A");\r\n$T07=ANTIGUEDAD($FECHAINGRESO,$FECHAFINNOM,"M");\r\n$T08=SI("($T07==0)&&($T06>=2)",(($T05)*(($T06-1)*2)),0);\r\n\r\n$REF=SI("$T07==0",((($T06-1)*2)+5),5);\r\n\r\n$T09=SI("($T07>=4)||($T06<>0)",$T05*5,0);\r\n\r\n$MONTO=$T08+$T09;', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(200, '			************ DEDUCCCIONES ************', 'D', '', '1.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(201, 'SEGURO SOCIAL OBLIGATORIO																																			', 'D', 'M', '1.', '1', 'S', 1, '0', '', '$REF=$LUNESPER;\r\n$T01=((($SUELDO*12/52)*(0.02))*$REF);\r\n$MONTO=SI(CAMPOADICIONALPER(2)=="SI",$T01,0);', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(202, 'REGIMEN DE SEGURIDAD SOCIAL																																	', 'D', 'M', '1.', '1', 'S', 1, '0', '', '$REF=$LUNESPER;\r\n$T01=((($SUELDO*12/52)*(0.005))*$REF);\r\n$MONTO=SI(CAMPOADICIONALPER(3)=="SI",$T01,0);\r\n', 0, 0, 0, 0, 0, '', 0, 1, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(203, 'FONDO DE AHORRO OBLIGATORIO PARA LA VIVIENDA (FAOV)									', 'D', 'M', '1.', '1', 'S', 1, '0', '', '$T01=(($SUELDO/2)*(0.01));\r\n$MONTO=SI(CAMPOADICIONALPER(2)=="SI",$T01,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(204, 'PRESTAMO												', 'D', 'M', '1.', '', 'S', 0, '', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(205, 'FALTANTE DE CAJA												', 'D', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(206, 'DIAS NO TRABAJADOS																											', 'D', 'M', '1.', '1', 'S', 0, '0', '', '$REF=CONTROL($CEDULA,"206");\r\n$MONTO=($SUELDO/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, 0.00, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 0, 0, 0, 0, '', '4.01.01.01.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos_acumulados`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_acumulados` (
  `codcon` int(11) NOT NULL,
  `cod_tac` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `operacion` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codcon`,`cod_tac`),
  KEY `fc_idx_60` (`cod_tac`,`codcon`),
  KEY `fc_idx_61` (`codcon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomconceptos_acumulados`
--

INSERT INTO `nomconceptos_acumulados` (`codcon`, `cod_tac`, `operacion`, `ee`) VALUES
(101, 'CON', 'S', 0),
(101, 'PS', 'S', 0),
(101, 'SI', 'S', 0),
(102, 'CON', 'S', 0),
(102, 'PS', 'S', 0),
(102, 'SI', 'S', 0),
(103, 'CON', 'S', 0),
(103, 'PS', 'S', 0),
(103, 'SI', 'S', 0),
(104, 'CON', 'S', 0),
(104, 'PS', 'S', 0),
(104, 'SI', 'S', 0),
(106, 'CON', 'S', 0),
(106, 'SI', 'S', 0),
(107, 'CON', 'S', 0),
(201, 'CON', 'S', 0),
(202, 'CON', 'S', 0),
(203, 'CON', 'S', 0),
(204, 'CON', 'S', 0),
(205, 'CON', 'S', 0),
(206, 'CON', 'S', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos_ctager`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_ctager` (
  `codcon` int(5) NOT NULL,
  `codnivel4` int(7) NOT NULL,
  `ctacon` varchar(50) NOT NULL,
  `tipcon` varchar(1) NOT NULL,
  PRIMARY KEY (`codcon`,`codnivel4`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos_frecuencias`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_frecuencias` (
  `codcon` int(11) NOT NULL,
  `codfre` int(11) NOT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codcon`,`codfre`),
  UNIQUE KEY `fc_idx_43` (`codfre`,`codcon`),
  KEY `fc_idx_44` (`codcon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomconceptos_frecuencias`
--

INSERT INTO `nomconceptos_frecuencias` (`codcon`, `codfre`, `ee`) VALUES
(101, 2, 0),
(101, 3, 0),
(102, 3, 0),
(103, 2, 0),
(103, 3, 0),
(104, 2, 0),
(104, 3, 0),
(106, 16, 0),
(107, 6, 0),
(201, 2, 0),
(201, 3, 0),
(202, 2, 0),
(202, 3, 0),
(203, 2, 0),
(203, 3, 0),
(204, 2, 0),
(204, 3, 0),
(205, 2, 0),
(205, 3, 0),
(206, 2, 0),
(206, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos_situaciones`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_situaciones` (
  `codcon` int(11) NOT NULL,
  `estado` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codcon`,`estado`),
  KEY `fc_idx_40` (`codcon`),
  KEY `estado` (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomconceptos_situaciones`
--

INSERT INTO `nomconceptos_situaciones` (`codcon`, `estado`, `ee`) VALUES
(101, 'Activo', 0),
(101, 'Nuevo', 0),
(102, 'Activo', 0),
(102, 'Nuevo', 0),
(103, 'Activo', 0),
(103, 'Nuevo', 0),
(104, 'Activo', 0),
(104, 'Nuevo', 0),
(106, 'Activo', 0),
(106, 'Nuevo', 0),
(107, 'Activo', 0),
(107, 'Nuevo', 0),
(201, 'Activo', 0),
(201, 'Egresado', 0),
(201, 'Vacaciones', 0),
(202, 'Activo', 0),
(202, 'Egresado', 0),
(203, 'Activo', 0),
(203, 'Egresado', 0),
(204, 'Activo', 0),
(204, 'Nuevo', 0),
(205, 'Activo', 0),
(205, 'Nuevo', 0),
(206, 'Activo', 0),
(206, 'Nuevo', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos_tiponomina`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_tiponomina` (
  `codcon` int(11) NOT NULL,
  `codtip` int(11) NOT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codcon`,`codtip`),
  UNIQUE KEY `fc_idx_64` (`codtip`,`codcon`),
  KEY `fc_idx_65` (`codcon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `nomconceptos_tiponomina`
--

INSERT INTO `nomconceptos_tiponomina` (`codcon`, `codtip`, `ee`) VALUES
(101, 2, 0),
(101, 3, 0),
(102, 2, 0),
(102, 3, 0),
(103, 2, 0),
(103, 3, 0),
(104, 2, 0),
(104, 3, 0),
(106, 2, 0),
(106, 3, 0),
(107, 2, 0),
(107, 3, 0),
(201, 2, 0),
(201, 3, 0),
(202, 2, 0),
(202, 3, 0),
(203, 2, 0),
(203, 3, 0),
(204, 2, 0),
(204, 3, 0),
(205, 2, 0),
(205, 3, 0),
(206, 2, 0),
(206, 3, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomdesempeno`
--

CREATE TABLE IF NOT EXISTS `nomdesempeno` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(60) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomdesempeno`
--

INSERT INTO `nomdesempeno` (`codigo`, `descripcion`) VALUES
(1, 'SEGURIDAD Y VIGILANCIA'),
(2, 'RECURSOS HUMANOS'),
(3, 'CONTABILIDAD'),
(4, 'AUDITORIA'),
(5, 'COMPUTACION'),
(6, 'SISTEMA'),
(7, 'PRESUPUESTO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomelegibles`
--

CREATE TABLE IF NOT EXISTS `nomelegibles` (
  `cedula` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `nombres` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `sexo` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecnac` date NOT NULL,
  `lugarnac` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cod_profesion` int(11) NOT NULL,
  `grado_instruccion` int(11) NOT NULL,
  `area_desempeno` int(11) NOT NULL,
  `anios_exp` int(11) NOT NULL,
  `observacion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `foto` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomempresa`
--

CREATE TABLE IF NOT EXISTS `nomempresa` (
  `cod_emp` int(11) NOT NULL,
  `nom_emp` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `dir_emp` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciu_emp` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `edo_emp` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zon_emp` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel_emp` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rif` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nit` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `pre_sid` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ger_rrhh` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `edadmax` int(11) DEFAULT NULL,
  `amonemax` int(11) DEFAULT NULL,
  `redontip` tinyint(4) DEFAULT NULL,
  `unidadtrib` decimal(17,2) DEFAULT NULL,
  `tipopres` tinyint(4) DEFAULT NULL,
  `munidadtrib` decimal(17,2) DEFAULT NULL,
  `diasbonvac` smallint(6) DEFAULT NULL,
  `diasutilidad` smallint(6) DEFAULT NULL,
  `nivel1` tinyint(1) DEFAULT NULL,
  `nivel2` tinyint(1) DEFAULT NULL,
  `nivel3` tinyint(1) DEFAULT NULL,
  `nivel4` tinyint(1) DEFAULT NULL,
  `nivel5` tinyint(1) DEFAULT NULL,
  `entfederal` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `distrito` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `municipio` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codacteco` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nomacteco` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecfunda` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `capital` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `degravunico` decimal(17,2) DEFAULT NULL,
  `mescambiari` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `utcargafam` decimal(17,2) DEFAULT NULL,
  `monsalmin` decimal(17,2) DEFAULT NULL,
  `codcon` int(11) DEFAULT NULL,
  `codcons` int(11) DEFAULT NULL,
  `demo` tinyint(4) DEFAULT NULL,
  `rutacontab` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `rutadatoscontab` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `serial` varchar(59) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ctacheque` varchar(22) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ctaefectivo` varchar(22) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nrocompro` int(11) DEFAULT NULL,
  `contratos` tinyint(1) DEFAULT NULL,
  `nomniv1` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nomniv2` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nomniv3` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nomniv4` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nomniv5` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `recibovac` text COLLATE utf8_spanish_ci,
  `reciboliq` text COLLATE utf8_spanish_ci,
  `ee` tinyint(4) DEFAULT NULL,
  `fax_emp` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `num_emp` int(11) DEFAULT NULL,
  `num_est` int(11) DEFAULT NULL,
  `num_sso` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `parroquia` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `localidad` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `e_mail` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_entfed` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_distri` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_munici` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_sector` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_acteco` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_orden` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `utilidad` decimal(17,2) DEFAULT NULL,
  `reportdiff` tinyint(4) DEFAULT NULL,
  `porcdiff` decimal(6,2) DEFAULT NULL,
  `netoneg` tinyint(1) DEFAULT NULL,
  `impresora` mediumtext COLLATE utf8_spanish_ci,
  `selector` tinyint(4) DEFAULT NULL,
  `nosueldocero` tinyint(1) DEFAULT NULL,
  `mediajornada` tinyint(1) DEFAULT NULL,
  `nuevassituaciones` tinyint(1) DEFAULT NULL,
  `tipoficha` tinyint(4) NOT NULL,
  `conprestamos` int(11) DEFAULT NULL,
  `confamiliares` int(11) DEFAULT NULL,
  `conficha` int(11) DEFAULT NULL,
  `nomcampo1` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nomcampo2` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nomcampo3` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `recibonom` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipcontab` tinyint(4) NOT NULL,
  `contadorbanesco` int(11) NOT NULL,
  `ctapatronales` varchar(22) COLLATE utf8_spanish_ci DEFAULT NULL,
  `recibopago` text COLLATE utf8_spanish_ci NOT NULL,
  `nivel6` tinyint(1) NOT NULL,
  `nivel7` tinyint(1) NOT NULL,
  `nomniv6` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `nomniv7` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_izq` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_der` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `cod_material` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `unidad` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ccosto` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  `proveedor` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cod_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomempresa`
--

INSERT INTO `nomempresa` (`cod_emp`, `nom_emp`, `dir_emp`, `ciu_emp`, `edo_emp`, `zon_emp`, `tel_emp`, `rif`, `nit`, `pre_sid`, `ger_rrhh`, `edadmax`, `amonemax`, `redontip`, `unidadtrib`, `tipopres`, `munidadtrib`, `diasbonvac`, `diasutilidad`, `nivel1`, `nivel2`, `nivel3`, `nivel4`, `nivel5`, `entfederal`, `distrito`, `municipio`, `codacteco`, `nomacteco`, `fecfunda`, `capital`, `degravunico`, `mescambiari`, `utcargafam`, `monsalmin`, `codcon`, `codcons`, `demo`, `rutacontab`, `rutadatoscontab`, `serial`, `ctacheque`, `ctaefectivo`, `nrocompro`, `contratos`, `nomniv1`, `nomniv2`, `nomniv3`, `nomniv4`, `nomniv5`, `recibovac`, `reciboliq`, `ee`, `fax_emp`, `num_emp`, `num_est`, `num_sso`, `estado`, `parroquia`, `localidad`, `e_mail`, `cod_entfed`, `cod_distri`, `cod_munici`, `cod_sector`, `cod_acteco`, `cod_orden`, `utilidad`, `reportdiff`, `porcdiff`, `netoneg`, `impresora`, `selector`, `nosueldocero`, `mediajornada`, `nuevassituaciones`, `tipoficha`, `conprestamos`, `confamiliares`, `conficha`, `nomcampo1`, `nomcampo2`, `nomcampo3`, `recibonom`, `tipcontab`, `contadorbanesco`, `ctapatronales`, `recibopago`, `nivel6`, `nivel7`, `nomniv6`, `nomniv7`, `imagen_izq`, `imagen_der`, `cod_material`, `unidad`, `ccosto`, `proveedor`) VALUES
(1, 'XTRA SPORT, C.A.', 'Calle Independencia C.C. Doble A, Nivel P.B., Local 2 Sector Centro, Carupano - Estado Sucre', 'Carupano', 'Sucre', '', '', 'J-30713417-8', '', 'J-30713417-8', '', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 0, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1780.45, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'Departamento', '', '', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0.00, 0, NULL, NULL, 1, 0, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, 0, NULL, '', 0, 0, '', '', 'logo_selectra.jpg', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomexpediente`
--

CREATE TABLE IF NOT EXISTS `nomexpediente` (
  `cod_expediente_det` int(8) NOT NULL AUTO_INCREMENT,
  `cedula` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_registro` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_tiporegistro` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `monto_nuevo` decimal(10,2) NOT NULL,
  `dias` int(3) NOT NULL,
  `fecha_retorno` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `cod_cargo` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `cod_cargo_nuevo` varchar(9) COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `usuario` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `pagado_por_emp` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `institucion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_estudio` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nivel_actual` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `costo_persona` decimal(17,2) NOT NULL,
  `num_participantes` int(4) NOT NULL,
  `nombre_especialista` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `gerencia_anterior` int(6) NOT NULL,
  `gerencia_nueva` int(6) NOT NULL,
  `nomina_anterior` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `nomina_nueva` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `puntaje` decimal(4,2) NOT NULL,
  `calificacion` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `labor` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `institucion_publica` int(1) NOT NULL,
  `tcamisa` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tchaqueta` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tbata` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tpantalon` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tmono` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tzapato` varchar(4) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cod_expediente_det`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='contiene todos los datos de expediente del personal ' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomfacturas_cabecera`
--

CREATE TABLE IF NOT EXISTS `nomfacturas_cabecera` (
  `numpre` int(9) NOT NULL,
  `ficha` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `meses` int(2) NOT NULL,
  `fechaapro` date NOT NULL,
  `fecpricup` date NOT NULL,
  `tipint` int(2) NOT NULL,
  `monto` float(17,2) NOT NULL,
  `tasa` float(7,2) NOT NULL,
  `estadopre` varchar(21) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `codigopr` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `markar` int(2) NOT NULL,
  `codnom` int(9) NOT NULL,
  `totpres` float(17,2) NOT NULL,
  `sfechaapro` date NOT NULL,
  `sfecpricup` date NOT NULL,
  `ee` int(2) NOT NULL,
  `cuotas` int(3) DEFAULT NULL,
  `mtocuota` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomfacturas_detalles`
--

CREATE TABLE IF NOT EXISTS `nomfacturas_detalles` (
  `numpre` int(9) NOT NULL,
  `ficha` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `tipocuo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `numcuo` int(9) NOT NULL,
  `fechaven` date NOT NULL,
  `anioven` int(4) NOT NULL,
  `mesven` int(2) NOT NULL,
  `dias` int(3) NOT NULL,
  `salinicial` float(17,2) NOT NULL,
  `montocuo` float(17,2) NOT NULL,
  `montoint` float(17,2) NOT NULL,
  `montocap` float(17,2) NOT NULL,
  `salfinal` float(17,2) NOT NULL,
  `fechacan` date NOT NULL,
  `estadopre` varchar(21) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `dedespecial` int(2) NOT NULL,
  `codnom` int(9) NOT NULL,
  `sfechaven` date NOT NULL,
  `sfechacan` date NOT NULL,
  `ee` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomfamiliares`
--

CREATE TABLE IF NOT EXISTS `nomfamiliares` (
  `correl` int(11) NOT NULL AUTO_INCREMENT,
  `cedula` int(11) NOT NULL DEFAULT '0',
  `ficha` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codpar` int(11) DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_nac` datetime DEFAULT NULL,
  `codgua` int(10) unsigned NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `nacionalidad` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `afiliado` tinyint(1) NOT NULL,
  `tipnom` int(11) NOT NULL,
  `cedula_beneficiario` int(11) NOT NULL,
  `apellido` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `niveledu` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `institucion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `tallafranela` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tallamono` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `fam_telf` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha_beca` date DEFAULT NULL,
  `beca` int(1) DEFAULT NULL,
  `promedionota` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`correl`),
  KEY `ficha` (`ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomfrecuencias`
--

CREATE TABLE IF NOT EXISTS `nomfrecuencias` (
  `codfre` int(11) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `diasperiodo` int(11) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  `fecha_ini` int(11) DEFAULT NULL,
  `fecha_fin` int(11) DEFAULT NULL,
  `periodos` tinyint(1) DEFAULT NULL,
  `dfecha_ini` datetime DEFAULT NULL,
  `dfecha_fin` datetime DEFAULT NULL,
  PRIMARY KEY (`codfre`),
  KEY `fc_idx_104` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomfrecuencias`
--

INSERT INTO `nomfrecuencias` (`codfre`, `descrip`, `diasperiodo`, `markar`, `ee`, `fecha_ini`, `fecha_fin`, `periodos`, `dfecha_ini`, `dfecha_fin`) VALUES
(2, '1era Quincena', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(3, '2da Quincena', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(6, 'Prestaciones', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(7, 'Utilidades', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(8, 'Vacaciones', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(10, 'Liquidaciones', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(11, 'Bonificacion', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(15, 'Horas Extras y Dias Feriados', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(16, 'Bono de Alimentacion', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomgradospasos`
--

CREATE TABLE IF NOT EXISTS `nomgradospasos` (
  `grado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `p1` decimal(10,2) NOT NULL,
  `p2` decimal(10,2) NOT NULL,
  `p3` decimal(10,2) NOT NULL,
  `p4` decimal(10,2) NOT NULL,
  `p5` decimal(10,2) NOT NULL,
  `p6` decimal(10,2) NOT NULL,
  `p7` decimal(10,2) NOT NULL,
  `p8` decimal(10,2) NOT NULL,
  `p9` decimal(10,2) NOT NULL,
  `p10` decimal(10,2) NOT NULL,
  `p11` decimal(10,2) NOT NULL,
  `p12` decimal(10,2) NOT NULL,
  `p13` decimal(10,2) NOT NULL,
  `p14` decimal(10,2) NOT NULL,
  `p15` decimal(10,2) NOT NULL,
  PRIMARY KEY (`grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomgrupos_categorias`
--

CREATE TABLE IF NOT EXISTS `nomgrupos_categorias` (
  `gr` int(10) unsigned NOT NULL,
  `salario` decimal(17,2) DEFAULT NULL,
  `bonomes` decimal(17,2) DEFAULT NULL,
  `bonodia` decimal(17,2) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`gr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomgrupo_bancos`
--

CREATE TABLE IF NOT EXISTS `nomgrupo_bancos` (
  `cod_gban` int(11) NOT NULL,
  `des_ban` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `suc_ban` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `gerente` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cuentacob` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipocuenta` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  `textoinicial` text COLLATE utf8_spanish_ci NOT NULL,
  `textofinal` text COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_gban`),
  KEY `fc_idx_107` (`des_ban`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomgrupo_bancos`
--

INSERT INTO `nomgrupo_bancos` (`cod_gban`, `des_ban`, `suc_ban`, `direccion`, `gerente`, `cuentacob`, `tipocuenta`, `markar`, `ee`, `textoinicial`, `textofinal`) VALUES
(1, 'GRUPO UNICO', '', '', '', '', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomguarderias`
--

CREATE TABLE IF NOT EXISTS `nomguarderias` (
  `codorg` int(11) NOT NULL,
  `codsuc` int(11) DEFAULT NULL,
  `rif` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `dir_emp` varchar(120) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tel_emp` varchar(25) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipo_ins` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codinst` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `montinscr` decimal(17,2) DEFAULT NULL,
  `montmen` decimal(17,2) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_117` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominstruccion`
--

CREATE TABLE IF NOT EXISTS `nominstruccion` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(60) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nominstruccion`
--

INSERT INTO `nominstruccion` (`codigo`, `descripcion`) VALUES
(1, 'Magister'),
(2, 'Doctorado'),
(3, 'Universitario'),
(4, 'Tecnico Superior'),
(5, 'Tecnico Medio'),
(6, 'Bachiller'),
(7, 'Escolar'),
(8, 'Sin Estudios Terminados'),
(9, 'Primaria Incompleta'),
(10, 'Sin Terminar Bachillerato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomliquidaciones`
--

CREATE TABLE IF NOT EXISTS `nomliquidaciones` (
  `cod_tli` int(10) unsigned NOT NULL,
  `des_tli` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`cod_tli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomliquidaciones`
--

INSERT INTO `nomliquidaciones` (`cod_tli`, `des_tli`, `markar`, `ee`) VALUES
(1, 'Sencilla', 0, 0),
(2, 'Doble', 0, 0),
(3, 'Especial', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel1`
--

CREATE TABLE IF NOT EXISTS `nomnivel1` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `gerencia` int(6) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_165` (`markar`),
  KEY `fc_idx_166` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomnivel1`
--

INSERT INTO `nomnivel1` (`codorg`, `descrip`, `gerencia`, `markar`, `ee`) VALUES
(1, 'Contabilidad', 0, 0, 0),
(2, 'Administrativo', 0, 0, 0),
(3, 'Tienda', 0, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel2`
--

CREATE TABLE IF NOT EXISTS `nomnivel2` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `gerencia` int(6) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_165` (`markar`),
  KEY `fc_idx_166` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel3`
--

CREATE TABLE IF NOT EXISTS `nomnivel3` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `gerencia` int(6) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_184` (`descrip`),
  KEY `fc_idx_185` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel4`
--

CREATE TABLE IF NOT EXISTS `nomnivel4` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `gerencia` int(6) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_110` (`descrip`),
  KEY `fc_idx_111` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel5`
--

CREATE TABLE IF NOT EXISTS `nomnivel5` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `gerencia` int(6) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_72` (`descrip`),
  KEY `fc_idx_73` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel6`
--

CREATE TABLE IF NOT EXISTS `nomnivel6` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `gerencia` int(6) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_72` (`descrip`),
  KEY `fc_idx_73` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel7`
--

CREATE TABLE IF NOT EXISTS `nomnivel7` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `gerencia` int(6) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_72` (`descrip`),
  KEY `fc_idx_73` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomparentescos`
--

CREATE TABLE IF NOT EXISTS `nomparentescos` (
  `codorg` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_153` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomparentescos`
--

INSERT INTO `nomparentescos` (`codorg`, `descrip`, `ee`) VALUES
('1', 'Madre', 0),
('2', 'Padre', 0),
('3', 'Hijo(a)', 0),
('4', 'Conyuge', 0),
('5', 'Concubino(a)', 0),
('6', 'Nieto(a)', 0),
('7', 'Esposo(a)', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomperiodos`
--

CREATE TABLE IF NOT EXISTS `nomperiodos` (
  `codfre` int(5) NOT NULL,
  `anio` int(4) NOT NULL,
  `nper` int(2) NOT NULL,
  `finicio` date NOT NULL,
  `ffin` date NOT NULL,
  `status` varchar(7) NOT NULL,
  `semfin` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`codfre`,`anio`,`nper`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nompersonal`
--

CREATE TABLE IF NOT EXISTS `nompersonal` (
  `cedula` int(11) DEFAULT NULL,
  `apenom` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_civil` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zonapos` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefonos` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecnac` date DEFAULT NULL,
  `lugarnac` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codpro` int(11) DEFAULT NULL,
  `foto` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipnom` int(11) NOT NULL DEFAULT '0',
  `codnivel1` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel2` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel3` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel4` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel5` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ficha` int(10) NOT NULL,
  `fecing` date DEFAULT NULL,
  `codcat` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codcargo` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `forcob` varchar(39) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codbancob` int(11) DEFAULT NULL,
  `cuentacob` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codbanlph` int(11) DEFAULT NULL,
  `cuentalph` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipemp` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecfin` int(11) DEFAULT NULL,
  `sueldopro` decimal(20,5) DEFAULT NULL,
  `fechaplica` date DEFAULT NULL,
  `codidi` int(11) DEFAULT NULL,
  `fecnacr` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipopres` tinyint(4) DEFAULT NULL,
  `fechasus` date DEFAULT NULL,
  `fechareisus` date DEFAULT NULL,
  `fechavac` date DEFAULT NULL,
  `fechareivac` date DEFAULT NULL,
  `fecharetiro` date DEFAULT NULL,
  `aplicalogro` tinyint(4) DEFAULT NULL,
  `aplicasuspension` tinyint(4) DEFAULT NULL,
  `ctacontab` varchar(22) COLLATE utf8_spanish_ci DEFAULT NULL,
  `periodo` int(11) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `cod_tli` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `motivo_liq` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `preaviso` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `suesal` decimal(20,2) DEFAULT NULL,
  `contrato` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `montoliq` decimal(17,2) DEFAULT NULL,
  `sfecnac` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sfecing` date DEFAULT NULL,
  `sfecfin` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sfechaplica` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sfechasus` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sfechareisus` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sfechavac` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sfechareivac` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sfecharetiro` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nacionalidad` tinyint(4) DEFAULT NULL,
  `diascontrato` int(11) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  `dfecnac` date DEFAULT NULL,
  `dfecing` date DEFAULT NULL,
  `dfecfin` date DEFAULT NULL,
  `dfechaplica` date DEFAULT NULL,
  `dfechasus` date DEFAULT NULL,
  `dfechareisus` date DEFAULT NULL,
  `dfechavac` date DEFAULT NULL,
  `dfechareivac` date DEFAULT NULL,
  `dfecharetiro` date DEFAULT NULL,
  `nrocuadrilla` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel6` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel7` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `inicio_periodo` date NOT NULL,
  `fin_periodo` date NOT NULL,
  `fechajubipensi` date DEFAULT NULL,
  `porjubipensi` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `antiguedadap` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `paso` int(2) DEFAULT NULL,
  `motivo_retiro` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`tipnom`,`ficha`),
  UNIQUE KEY `ficha` (`ficha`,`cedula`),
  KEY `codcargo` (`codcargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nompersonal`
--

INSERT INTO `nompersonal` (`cedula`, `apenom`, `sexo`, `estado_civil`, `direccion`, `zonapos`, `telefonos`, `email`, `fecnac`, `lugarnac`, `codpro`, `foto`, `tipnom`, `codnivel1`, `codnivel2`, `codnivel3`, `codnivel4`, `codnivel5`, `ficha`, `fecing`, `codcat`, `codcargo`, `forcob`, `codbancob`, `cuentacob`, `codbanlph`, `cuentalph`, `estado`, `tipemp`, `fecfin`, `sueldopro`, `fechaplica`, `codidi`, `fecnacr`, `tipopres`, `fechasus`, `fechareisus`, `fechavac`, `fechareivac`, `fecharetiro`, `aplicalogro`, `aplicasuspension`, `ctacontab`, `periodo`, `markar`, `cod_tli`, `motivo_liq`, `preaviso`, `suesal`, `contrato`, `nombres`, `apellidos`, `montoliq`, `sfecnac`, `sfecing`, `sfecfin`, `sfechaplica`, `sfechasus`, `sfechareisus`, `sfechavac`, `sfechareivac`, `sfecharetiro`, `nacionalidad`, `diascontrato`, `ee`, `dfecnac`, `dfecing`, `dfecfin`, `dfechaplica`, `dfechasus`, `dfechareisus`, `dfechavac`, `dfechareivac`, `dfecharetiro`, `nrocuadrilla`, `codnivel6`, `codnivel7`, `inicio_periodo`, `fin_periodo`, `fechajubipensi`, `porjubipensi`, `antiguedadap`, `paso`, `motivo_retiro`) VALUES
(17021563, 'MUNDARAIN, JESUS', 'Masculino', 'Casado/a', '', NULL, '', '', '1984-06-02', 'CARUPANO', 11, 'fotos/', 3, '3', '0', '0', '0', '0', 1, '2008-04-02', '1', '01', 'Efectivo', 1, '', 1, '', 'Activo', 'Fijo', NULL, 1780.45000, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', 1780.45, NULL, 'JESUS', 'MUNDARAIN', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0000-00-00', '0000-00-00', NULL, '', '', 1, ''),
(19190732, 'MARTINEZ , VIVIANA ANDREINA', 'Femenino', 'Soltero/a', '', NULL, '', '', '1988-12-02', 'CARUPANO', 15, 'fotos/', 3, '3', '0', '0', '0', '0', 2, '2012-04-13', '4', '04', 'Efectivo', 1, '', 1, '', 'Activo', 'Fijo', NULL, 1780.45000, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', 1780.45, NULL, 'VIVIANA ANDREINA', 'MARTINEZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0000-00-00', '0000-00-00', NULL, '', '', 1, ''),
(20376328, 'FERNANDEZ, YADELFI J', 'Femenino', 'Casado/a', '', NULL, '', '', '0000-00-00', 'CARUPANO', 0, 'fotos/', 3, '3', '0', '0', '0', '0', 3, '2011-11-07', '4', '05', 'Efectivo', 1, '', 1, '', 'Activo', 'Fijo', NULL, 890.23000, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', 890.23, NULL, 'YADELFI J', 'FERNANDEZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0000-00-00', '0000-00-00', NULL, '', '', 1, ''),
(21010614, 'RODRIGUEZ MOYA , JESUS GABRIEL', 'Masculino', 'Soltero/a', '', NULL, '', '', '0000-00-00', 'CARUPANO', 15, 'fotos/', 3, '1', '0', '0', '0', '0', 4, '2012-01-20', '1', '02', 'Efectivo', 1, '', 1, '', 'Activo', 'Fijo', NULL, 890.23000, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', 890.23, NULL, 'JESUS GABRIEL', 'RODRIGUEZ MOYA ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0000-00-00', '0000-00-00', NULL, '', '', 0, ''),
(21010899, 'VENALES LEON, JOHANNYS V CECILIA', 'Femenino', 'Soltero/a', '', NULL, '', '', '2010-10-11', 'CARUPANO', 15, 'fotos/', 3, '1', '0', '0', '0', '0', 5, '2011-04-11', '1', '05', 'Efectivo', 1, '', 1, '', 'Activo', 'Contratado', NULL, 890.23000, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', 890.23, NULL, 'JOHANNYS V CECILIA', 'VENALES LEON', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '2011-04-11', '2012-07-10', NULL, '', '', 0, ''),
(20375500, 'RODRIGUEZ CRESPO, JESUS SALVADOR', 'Masculino', 'Soltero/a', '', NULL, '', '', '0000-00-00', 'CARUPANO', 13, 'fotos/', 3, '3', '0', '0', '0', '0', 6, '2011-03-15', '1', '02', 'Efectivo', 1, '', 1, '', 'Activo', 'Fijo', NULL, 890.23000, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', 890.23, NULL, 'JESUS SALVADOR', 'RODRIGUEZ CRESPO', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0000-00-00', '0000-00-00', NULL, '', '', 0, ''),
(24692438, 'ROJAS MARQUEZ, MARIA ELENA', 'Femenino', 'Soltero/a', '', NULL, '', '', '0000-00-00', 'CARUPANO', 15, 'fotos/', 3, '3', '0', '0', '0', '0', 7, '2012-02-04', '4', '05', 'Efectivo', 1, '', 1, '', 'Egresado', 'Fijo', NULL, 890.23000, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', 890.23, NULL, 'MARIA ELENA', 'ROJAS MARQUEZ', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0000-00-00', '0000-00-00', NULL, '', '', 0, ''),
(21539842, 'GUILARTE ESPAÃ‘A, NORVELYS', 'Femenino', 'Soltero/a', '', NULL, '', '', '0000-00-00', 'CARUPANO', 15, 'fotos/', 3, '3', '0', '0', '0', '0', 8, '2012-06-01', '4', '05', 'Efectivo', 1, '', 1, '', 'Activo', 'Fijo', NULL, 890.23000, NULL, NULL, NULL, 3, NULL, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, '', '', '', 890.23, NULL, 'NORVELYS', 'GUILARTE ESPAÃ‘A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, '0000-00-00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '0', '0000-00-00', '0000-00-00', NULL, '', '', 1, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomprestamos`
--

CREATE TABLE IF NOT EXISTS `nomprestamos` (
  `codigopr` int(10) unsigned NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `formula` mediumtext COLLATE utf8_spanish_ci,
  `markar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codigopr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomprestamos`
--

INSERT INTO `nomprestamos` (`codigopr`, `descrip`, `formula`, `markar`, `ee`) VALUES
(0, 'Utilidades', NULL, NULL, NULL),
(1, 'Corto Plazo', NULL, 0, 0),
(2, 'Mediano Plazo', NULL, 0, 0),
(3, 'Largo Plazo', NULL, 0, 0),
(4, 'Comercial', NULL, 0, 0),
(5, 'Especial', NULL, 0, 0),
(6, 'Utilidades', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomprestamos_cabecera`
--

CREATE TABLE IF NOT EXISTS `nomprestamos_cabecera` (
  `numpre` int(9) NOT NULL,
  `ficha` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `meses` int(2) NOT NULL,
  `fechaapro` date NOT NULL,
  `fecpricup` date NOT NULL,
  `tipint` int(2) NOT NULL,
  `monto` float(17,2) NOT NULL,
  `tasa` float(7,2) NOT NULL,
  `estadopre` varchar(21) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `codigopr` varchar(7) COLLATE utf8_spanish_ci NOT NULL,
  `markar` int(2) NOT NULL,
  `codnom` int(9) NOT NULL,
  `totpres` float(17,2) NOT NULL,
  `sfechaapro` date NOT NULL,
  `sfecpricup` date NOT NULL,
  `ee` int(2) NOT NULL,
  `cuotas` int(3) DEFAULT NULL,
  `mtocuota` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomprestamos_detalles`
--

CREATE TABLE IF NOT EXISTS `nomprestamos_detalles` (
  `numpre` int(9) NOT NULL,
  `ficha` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `tipocuo` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `numcuo` int(9) NOT NULL,
  `fechaven` date NOT NULL,
  `anioven` int(4) NOT NULL,
  `mesven` int(2) NOT NULL,
  `dias` int(3) NOT NULL,
  `salinicial` float(17,2) NOT NULL,
  `montocuo` float(17,2) NOT NULL,
  `montoint` float(17,2) NOT NULL,
  `montocap` float(17,2) NOT NULL,
  `salfinal` float(17,2) NOT NULL,
  `fechacan` date NOT NULL,
  `estadopre` varchar(21) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(1000) COLLATE utf8_spanish_ci NOT NULL,
  `dedespecial` int(2) NOT NULL,
  `codnom` int(9) NOT NULL,
  `sfechaven` date NOT NULL,
  `sfechacan` date NOT NULL,
  `ee` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomprofesiones`
--

CREATE TABLE IF NOT EXISTS `nomprofesiones` (
  `codorg` int(11) NOT NULL,
  `descrip` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codorg`),
  KEY `fc_idx_158` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomprofesiones`
--

INSERT INTO `nomprofesiones` (`codorg`, `descrip`, `ee`) VALUES
(4, 'LICENCIADO', NULL),
(5, 'MEDICO', NULL),
(11, 'TECNICO SUPERIOR UNIVERSITARIO (TSU)', NULL),
(12, 'TECNICO MEDIO', NULL),
(13, 'TECNICO', NULL),
(14, 'BACHILLER ESPECIALIZADO', NULL),
(15, 'BACHILLER Cs/Hum', NULL),
(16, 'EDUCACION BASICA COMPLETA', NULL),
(17, 'PRIMARIA COMPLETA', NULL),
(18, 'PRIMARIA INCOMPLETA', NULL),
(19, 'UNIVERSITARIO INCOMPLETO', 0),
(20, 'UNIVERSITARIO ', 0),
(21, 'POST GRADO', 0),
(22, 'HISTORIADOR', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomseguro`
--

CREATE TABLE IF NOT EXISTS `nomseguro` (
  `id_seguro` int(11) NOT NULL AUTO_INCREMENT,
  `desde_seg` int(11) NOT NULL,
  `hasta_seg` int(11) NOT NULL,
  `monto_seg` float(6,2) NOT NULL,
  PRIMARY KEY (`id_seguro`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `nomseguro`
--

INSERT INTO `nomseguro` (`id_seguro`, `desde_seg`, `hasta_seg`, `monto_seg`) VALUES
(1, 0, 17, 184.75),
(3, 18, 39, 229.00),
(4, 40, 49, 309.75),
(5, 50, 59, 407.67),
(6, 60, 80, 580.17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomsituaciones`
--

CREATE TABLE IF NOT EXISTS `nomsituaciones` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `situacion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `situacion` (`situacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `nomsituaciones`
--

INSERT INTO `nomsituaciones` (`codigo`, `situacion`) VALUES
(1, 'Activo'),
(2, 'Egresado'),
(9, 'Egresado de Nomina de Pago'),
(5, 'Nuevo'),
(4, 'Vacaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomsuspenciones`
--

CREATE TABLE IF NOT EXISTS `nomsuspenciones` (
  `codigo` int(11) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`codigo`),
  KEY `fc_idx_143` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomsuspenciones`
--

INSERT INTO `nomsuspenciones` (`codigo`, `descrip`, `ee`) VALUES
(1, 'Enfermedad', 0),
(2, 'Accidente', 0),
(3, 'Permiso Remunerado', 0),
(4, 'Reposo', 0),
(5, 'Inasistencia Injustificada', 0),
(6, 'Permiso No Remunerado', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomtarifas`
--

CREATE TABLE IF NOT EXISTS `nomtarifas` (
  `limite_menor` decimal(18,2) NOT NULL,
  `limite_mayor` decimal(18,2) NOT NULL,
  `monto` decimal(18,2) NOT NULL,
  `codigo` int(11) NOT NULL,
  PRIMARY KEY (`limite_mayor`,`codigo`),
  KEY `nomtarifas_ibfk_1` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomtarifas`
--

INSERT INTO `nomtarifas` (`limite_menor`, `limite_mayor`, `monto`, `codigo`) VALUES
(1.00, 2.00, 33.34, 2),
(1.00, 4.00, 55.00, 4),
(1.00, 5.00, 10.00, 1),
(2.00, 6.00, 25.00, 2),
(6.00, 10.00, 12.00, 1),
(11.00, 11.00, 8.00, 1),
(12.00, 999.00, 0.00, 1),
(0.00, 1000000.00, 614.79, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomtasas_interes`
--

CREATE TABLE IF NOT EXISTS `nomtasas_interes` (
  `tasa` decimal(7,2) DEFAULT NULL,
  `anio` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`anio`,`mes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomtasas_interes`
--

INSERT INTO `nomtasas_interes` (`tasa`, `anio`, `mes`, `ee`) VALUES
(17.56, 2009, 6, 0),
(17.26, 2009, 7, 0),
(17.04, 2009, 8, 0),
(16.58, 2009, 9, 0),
(17.62, 2009, 10, 0),
(17.05, 2009, 11, 0),
(19.00, 2009, 12, 0),
(18.00, 2010, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomterceros`
--

CREATE TABLE IF NOT EXISTS `nomterceros` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomtipos_nomina`
--

CREATE TABLE IF NOT EXISTS `nomtipos_nomina` (
  `codtip` int(11) NOT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `prioridad` tinyint(4) DEFAULT NULL,
  `fecha_fin` datetime DEFAULT NULL,
  `fecha_ini` datetime DEFAULT NULL,
  `codnom` int(11) DEFAULT NULL,
  `diasbonvac` smallint(6) DEFAULT NULL,
  `diasutilidad` smallint(6) DEFAULT NULL,
  `diasdisfrute` smallint(6) DEFAULT NULL,
  `tipodisfrute` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `diasincrem` smallint(6) DEFAULT NULL,
  `diasmaxinc` smallint(6) DEFAULT NULL,
  `diasincremdis` smallint(6) DEFAULT NULL,
  `diasmaxincdis` smallint(6) DEFAULT NULL,
  `tiempoor` int(11) DEFAULT NULL,
  `diasantiguedad` int(11) DEFAULT NULL,
  `antigincremvac` int(2) NOT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `usatablas` tinyint(1) DEFAULT NULL,
  `baremo01` smallint(6) DEFAULT NULL,
  `baremo02` smallint(6) DEFAULT NULL,
  `baremo03` smallint(6) DEFAULT NULL,
  `baremo04` smallint(6) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `ruta` varchar(119) COLLATE utf8_spanish_ci DEFAULT NULL,
  `basesuelsal` int(11) DEFAULT NULL,
  `sfecha_fin` datetime DEFAULT NULL,
  `sfecha_ini` datetime DEFAULT NULL,
  `sfecha` datetime DEFAULT NULL,
  `base30` tinyint(4) DEFAULT NULL,
  `detdes` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnomant` int(11) DEFAULT NULL,
  `fechabon` int(11) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  `owner` varchar(254) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bdgenerada` tinyint(4) DEFAULT NULL,
  `codgrupo` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
  `conceptosglopar` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipocamposadic` tinyint(4) DEFAULT NULL,
  `dfecha_ini` datetime DEFAULT NULL,
  `dfecha_fin` datetime DEFAULT NULL,
  `dfecha` datetime DEFAULT NULL,
  `dfechabon` datetime DEFAULT NULL,
  `desglose_moneda` text COLLATE utf8_spanish_ci NOT NULL,
  `tipo_ingreso` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `codigo_banco` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `quinquenio` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codtip`),
  KEY `fc_idx_321` (`descrip`),
  KEY `fc_idx_322` (`codgrupo`,`codtip`),
  KEY `fc_idx_323` (`bdgenerada`,`codtip`),
  KEY `fc_idx_324` (`prioridad`,`codtip`),
  KEY `fc_idx_325` (`fecha_fin`,`codtip`),
  KEY `fc_idx_326` (`fecha_ini`,`codtip`),
  KEY `fc_idx_327` (`codnom`,`codtip`),
  KEY `fc_idx_328` (`diasbonvac`,`codtip`),
  KEY `fc_idx_329` (`diasutilidad`,`codtip`),
  KEY `fc_idx_330` (`diasdisfrute`,`codtip`),
  KEY `fc_idx_331` (`tipodisfrute`,`codtip`),
  KEY `fc_idx_332` (`diasincrem`,`codtip`),
  KEY `fc_idx_333` (`diasmaxinc`,`codtip`),
  KEY `fc_idx_334` (`diasincremdis`,`codtip`),
  KEY `fc_idx_335` (`diasmaxincdis`,`codtip`),
  KEY `fc_idx_336` (`tiempoor`,`codtip`),
  KEY `fc_idx_337` (`diasantiguedad`,`codtip`),
  KEY `fc_idx_338` (`markar`,`codtip`),
  KEY `fc_idx_339` (`usatablas`,`codtip`),
  KEY `fc_idx_340` (`baremo01`,`codtip`),
  KEY `fc_idx_341` (`baremo02`,`codtip`),
  KEY `fc_idx_342` (`baremo03`,`codtip`),
  KEY `fc_idx_343` (`baremo04`,`codtip`),
  KEY `fc_idx_344` (`fecha`,`codtip`),
  KEY `fc_idx_345` (`ruta`,`codtip`),
  KEY `fc_idx_346` (`basesuelsal`,`codtip`),
  KEY `fc_idx_347` (`sfecha_fin`,`codtip`),
  KEY `fc_idx_348` (`sfecha_ini`,`codtip`),
  KEY `fc_idx_349` (`sfecha`,`codtip`),
  KEY `fc_idx_350` (`base30`,`codtip`),
  KEY `fc_idx_351` (`detdes`,`codtip`),
  KEY `fc_idx_352` (`codnomant`,`codtip`),
  KEY `fc_idx_353` (`fechabon`,`codtip`),
  KEY `fc_idx_354` (`ee`,`codtip`),
  KEY `fc_idx_355` (`owner`,`codtip`),
  KEY `fc_idx_356` (`conceptosglopar`,`codtip`),
  KEY `fc_idx_357` (`tipocamposadic`,`codtip`),
  KEY `fc_idx_358` (`dfecha_ini`,`codtip`),
  KEY `fc_idx_359` (`dfecha_fin`,`codtip`),
  KEY `fc_idx_360` (`dfecha`,`codtip`),
  KEY `fc_idx_361` (`dfechabon`,`codtip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nomtipos_nomina`
--

INSERT INTO `nomtipos_nomina` (`codtip`, `descrip`, `prioridad`, `fecha_fin`, `fecha_ini`, `codnom`, `diasbonvac`, `diasutilidad`, `diasdisfrute`, `tipodisfrute`, `diasincrem`, `diasmaxinc`, `diasincremdis`, `diasmaxincdis`, `tiempoor`, `diasantiguedad`, `antigincremvac`, `markar`, `usatablas`, `baremo01`, `baremo02`, `baremo03`, `baremo04`, `fecha`, `ruta`, `basesuelsal`, `sfecha_fin`, `sfecha_ini`, `sfecha`, `base30`, `detdes`, `codnomant`, `fechabon`, `ee`, `owner`, `bdgenerada`, `codgrupo`, `conceptosglopar`, `tipocamposadic`, `dfecha_ini`, `dfecha_fin`, `dfecha`, `dfechabon`, `desglose_moneda`, `tipo_ingreso`, `codigo_banco`, `quinquenio`) VALUES
(2, 'Administrativa', NULL, NULL, NULL, 3, 0, NULL, 15, 'Ha', 0, 0, 0, 0, 8, 365, 0, NULL, 0, NULL, NULL, NULL, NULL, '1970-01-01', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bolivares', 'Q', '', ''),
(3, 'Tienda', NULL, NULL, NULL, 1, 7, NULL, 15, 'Co', 1, 21, 1, 21, 8, 365, 2, NULL, 0, NULL, NULL, NULL, NULL, '1970-01-01', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Bolivares', 'Q', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomusuarios`
--

CREATE TABLE IF NOT EXISTS `nomusuarios` (
  `coduser` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descrip` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel` tinyint(4) DEFAULT NULL,
  `fecha` int(11) DEFAULT NULL,
  `clave` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `acce_usuarios` int(1) DEFAULT NULL,
  `acce_configuracion` int(1) DEFAULT NULL,
  `acce_elegibles` int(1) DEFAULT NULL,
  `acce_personal` int(1) DEFAULT NULL,
  `acce_prestamos` int(1) DEFAULT NULL,
  `acce_consultas` int(1) DEFAULT NULL,
  `acce_transacciones` int(1) DEFAULT NULL,
  `acce_procesos` int(1) DEFAULT NULL,
  `acce_reportes` int(1) DEFAULT NULL,
  `acce_estuaca` int(1) DEFAULT NULL,
  `acce_xestuaca` int(1) DEFAULT NULL,
  `acce_permisos` int(1) DEFAULT NULL,
  `acce_logros` int(1) DEFAULT NULL,
  `acce_penalizacion` int(1) DEFAULT NULL,
  `acce_movpe` int(1) DEFAULT NULL,
  `acce_evalde` int(1) DEFAULT NULL,
  `acce_experiencia` int(1) DEFAULT NULL,
  `acce_antic` int(1) DEFAULT NULL,
  `acce_uniforme` int(1) DEFAULT NULL,
  `contadorvence` tinyint(4) DEFAULT NULL,
  `fecclave` int(11) DEFAULT NULL,
  `encript` tinyint(4) DEFAULT NULL,
  `pregunta` mediumtext COLLATE utf8_spanish_ci,
  `respuesta` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `acctwind` tinyint(4) DEFAULT NULL,
  `borraper` tinyint(4) DEFAULT NULL,
  `dfecha` datetime DEFAULT NULL,
  `dfecclave` datetime DEFAULT NULL,
  `login_usuario` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `acce_autorizar_nom` int(1) DEFAULT NULL,
  `acce_enviar_nom` int(1) DEFAULT NULL,
  `acce_generarordennomina` int(1) DEFAULT NULL,
  PRIMARY KEY (`coduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `nomusuarios`
--

INSERT INTO `nomusuarios` (`coduser`, `descrip`, `nivel`, `fecha`, `clave`, `acce_usuarios`, `acce_configuracion`, `acce_elegibles`, `acce_personal`, `acce_prestamos`, `acce_consultas`, `acce_transacciones`, `acce_procesos`, `acce_reportes`, `acce_estuaca`, `acce_xestuaca`, `acce_permisos`, `acce_logros`, `acce_penalizacion`, `acce_movpe`, `acce_evalde`, `acce_experiencia`, `acce_antic`, `acce_uniforme`, `contadorvence`, `fecclave`, `encript`, `pregunta`, `respuesta`, `acctwind`, `borraper`, `dfecha`, `dfecclave`, `login_usuario`, `acce_autorizar_nom`, `acce_enviar_nom`, `acce_generarordennomina`) VALUES
(1, 'asys', NULL, 0, 'f63f47a5d94dad9fb559c8b3dd1185874b15352e7187820b596ceb42e5759f83', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'asys', 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomusuario_nomina`
--

CREATE TABLE IF NOT EXISTS `nomusuario_nomina` (
  `id_usuario` int(11) NOT NULL,
  `id_nomina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `nomusuario_nomina`
--

INSERT INTO `nomusuario_nomina` (`id_usuario`, `id_nomina`) VALUES
(6, 3),
(5, 3),
(5, 2),
(4, 3),
(2, 3),
(1, 2),
(1, 3),
(1, 5);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `nomvis_conceptos_acumulado`
--
CREATE TABLE IF NOT EXISTS `nomvis_conceptos_acumulado` (
`codcon` int(11)
,`cod_tac` varchar(6)
,`descrip` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `nomvis_conceptos_frecuencia`
--
CREATE TABLE IF NOT EXISTS `nomvis_conceptos_frecuencia` (
`codcon` int(11)
,`codfre` int(11)
,`descrip` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `nomvis_conceptos_situacion`
--
CREATE TABLE IF NOT EXISTS `nomvis_conceptos_situacion` (
`codcon` int(11)
,`descrip` varchar(30)
,`situacion` varchar(30)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `nomvis_conceptos_tiposnomina`
--
CREATE TABLE IF NOT EXISTS `nomvis_conceptos_tiposnomina` (
`codcon` int(11)
,`codtip` int(11)
,`descrip` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `nomvis_integrantes`
--
CREATE TABLE IF NOT EXISTS `nomvis_integrantes` (
`cedula` int(11)
,`ficha` int(10)
,`apellidos` varchar(30)
,`nombres` varchar(30)
,`estado` varchar(30)
,`descrip` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `nomvis_per_movimiento`
--
CREATE TABLE IF NOT EXISTS `nomvis_per_movimiento` (
`codnom` int(11)
,`tipnom` int(11)
,`foto` varchar(80)
,`fec_ing` date
,`cedula` int(11)
,`ficha` int(10)
,`apenom` varchar(60)
,`sueldopro` decimal(20,2)
,`codnivel1` varchar(8)
,`codnivel2` varchar(8)
,`codnivel3` varchar(8)
,`cargo` varchar(100)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_modulos`
--

CREATE TABLE IF NOT EXISTS `nom_modulos` (
  `cod_modulo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `cod_modulo_padre` int(11) DEFAULT NULL,
  `nom_menu` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `tabla` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cod_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=67 ;

--
-- Volcado de datos para la tabla `nom_modulos`
--

INSERT INTO `nom_modulos` (`cod_modulo`, `cod_modulo_padre`, `nom_menu`, `archivo`, `orden`, `tabla`) VALUES
(1, NULL, 'Procesos', 'menu_procesos.php', 6, NULL),
(3, NULL, 'Seleccionar Nomina', 'seleccionar_nomina2.php', 8, NULL),
(4, NULL, 'Reportes', 'menu_reportes.php', 7, NULL),
(7, NULL, 'Transacciones', 'menu_transacciones.php', 5, NULL),
(9, NULL, 'Personal', 'menu_personal.php', 2, NULL),
(10, NULL, 'Configuraci&oacute;n', 'menu_configuracion.php', 0, NULL),
(11, 10, 'Datos de \r\nla empresa', 'parametros.php', 1, NULL),
(21, 10, 'Usuarios', 'usuarios_list.php', 2, 'usuarios'),
(27, 9, 'Reportes', NULL, NULL, NULL),
(32, 2, 'Reportes', NULL, NULL, NULL),
(45, 4, 'Reportes', NULL, NULL, NULL),
(60, NULL, 'Elegibles', 'menu_elegibles.php', 1, NULL),
(61, NULL, 'Consultas', 'menu_consultas.php', 4, NULL),
(65, NULL, 'Prestamos', '../prestamos/menu_prestamos.php', 3, NULL),
(66, NULL, 'Generar Orden de Servicio', 'menu_procesos2.php', 9, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_motivos_retiros`
--

CREATE TABLE IF NOT EXISTS `nom_motivos_retiros` (
  `codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `nom_motivos_retiros`
--

INSERT INTO `nom_motivos_retiros` (`codigo`, `descripcion`) VALUES
(1, 'Traslado a Otra Empresa'),
(2, 'Renuncia'),
(3, 'Renuncia *'),
(4, 'Despido Justificado'),
(5, 'Reestructuracion Organizacion');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_movimientos_historico`
--

CREATE TABLE IF NOT EXISTS `nom_movimientos_historico` (
  `id_historico` int(11) NOT NULL AUTO_INCREMENT,
  `codnom` int(11) NOT NULL,
  `tipnom` int(11) NOT NULL,
  `codnivel1` int(11) NOT NULL,
  `codnivel2` int(11) NOT NULL,
  `codnivel3` int(11) NOT NULL,
  `codnivel4` int(11) NOT NULL,
  `codnivel5` int(11) NOT NULL,
  `codnivel6` int(11) NOT NULL,
  `codnivel7` int(11) NOT NULL,
  `ficha` int(11) NOT NULL,
  `sueldo` float(10,2) NOT NULL,
  `codcargo` int(11) NOT NULL,
  `situacion` varchar(50) NOT NULL,
  `cedula` int(11) NOT NULL,
  PRIMARY KEY (`id_historico`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=105 ;

--
-- Volcado de datos para la tabla `nom_movimientos_historico`
--

INSERT INTO `nom_movimientos_historico` (`id_historico`, `codnom`, `tipnom`, `codnivel1`, `codnivel2`, `codnivel3`, `codnivel4`, `codnivel5`, `codnivel6`, `codnivel7`, `ficha`, `sueldo`, `codcargo`, `situacion`, `cedula`) VALUES
(53, 1, 3, 3, 0, 0, 0, 0, 0, 0, 1, 1780.45, 1, 'Activo', 17021563),
(54, 1, 3, 3, 0, 0, 0, 0, 0, 0, 2, 1780.45, 4, 'Activo', 19190732),
(55, 1, 3, 3, 0, 0, 0, 0, 0, 0, 3, 890.23, 5, 'Activo', 20376328),
(56, 1, 3, 1, 0, 0, 0, 0, 0, 0, 4, 890.23, 2, 'Activo', 21010614),
(57, 1, 3, 1, 0, 0, 0, 0, 0, 0, 5, 890.23, 5, 'Activo', 21010899),
(58, 1, 3, 3, 0, 0, 0, 0, 0, 0, 6, 890.23, 2, 'Activo', 20375500),
(59, 1, 3, 3, 0, 0, 0, 0, 0, 0, 8, 890.23, 5, 'Activo', 21539842),
(60, 1, 3, 3, 0, 0, 0, 0, 0, 0, 1, 1780.45, 1, 'Activo', 17021563),
(61, 1, 3, 3, 0, 0, 0, 0, 0, 0, 2, 1780.45, 4, 'Activo', 19190732),
(62, 1, 3, 3, 0, 0, 0, 0, 0, 0, 3, 890.23, 5, 'Activo', 20376328),
(63, 1, 3, 1, 0, 0, 0, 0, 0, 0, 4, 890.23, 2, 'Activo', 21010614),
(64, 1, 3, 1, 0, 0, 0, 0, 0, 0, 5, 890.23, 5, 'Activo', 21010899),
(65, 1, 3, 3, 0, 0, 0, 0, 0, 0, 6, 890.23, 2, 'Activo', 20375500),
(66, 1, 3, 3, 0, 0, 0, 0, 0, 0, 8, 890.23, 5, 'Activo', 21539842),
(67, 1, 3, 3, 0, 0, 0, 0, 0, 0, 1, 1780.45, 1, 'Activo', 17021563),
(68, 1, 3, 3, 0, 0, 0, 0, 0, 0, 2, 1780.45, 4, 'Activo', 19190732),
(69, 1, 3, 3, 0, 0, 0, 0, 0, 0, 3, 890.23, 5, 'Activo', 20376328),
(70, 1, 3, 1, 0, 0, 0, 0, 0, 0, 4, 890.23, 2, 'Activo', 21010614),
(71, 1, 3, 1, 0, 0, 0, 0, 0, 0, 5, 890.23, 5, 'Activo', 21010899),
(72, 1, 3, 3, 0, 0, 0, 0, 0, 0, 6, 890.23, 2, 'Activo', 20375500),
(73, 1, 3, 3, 0, 0, 0, 0, 0, 0, 8, 890.23, 5, 'Activo', 21539842),
(74, 1, 3, 3, 0, 0, 0, 0, 0, 0, 1, 1780.45, 1, 'Activo', 17021563),
(75, 1, 3, 3, 0, 0, 0, 0, 0, 0, 2, 1780.45, 4, 'Activo', 19190732),
(76, 1, 3, 3, 0, 0, 0, 0, 0, 0, 3, 890.23, 5, 'Activo', 20376328),
(77, 1, 3, 1, 0, 0, 0, 0, 0, 0, 4, 890.23, 2, 'Activo', 21010614),
(78, 1, 3, 1, 0, 0, 0, 0, 0, 0, 5, 890.23, 5, 'Activo', 21010899),
(79, 1, 3, 3, 0, 0, 0, 0, 0, 0, 6, 890.23, 2, 'Activo', 20375500),
(80, 1, 3, 3, 0, 0, 0, 0, 0, 0, 7, 890.23, 5, 'Egresado', 24692438),
(81, 1, 3, 3, 0, 0, 0, 0, 0, 0, 8, 890.23, 5, 'Activo', 21539842),
(82, 1, 3, 3, 0, 0, 0, 0, 0, 0, 1, 1780.45, 1, 'Activo', 17021563),
(83, 1, 3, 3, 0, 0, 0, 0, 0, 0, 2, 1780.45, 4, 'Activo', 19190732),
(84, 1, 3, 3, 0, 0, 0, 0, 0, 0, 3, 890.23, 5, 'Activo', 20376328),
(85, 1, 3, 1, 0, 0, 0, 0, 0, 0, 4, 890.23, 2, 'Activo', 21010614),
(86, 1, 3, 1, 0, 0, 0, 0, 0, 0, 5, 890.23, 5, 'Activo', 21010899),
(87, 1, 3, 3, 0, 0, 0, 0, 0, 0, 6, 890.23, 2, 'Activo', 20375500),
(88, 1, 3, 3, 0, 0, 0, 0, 0, 0, 7, 890.23, 5, 'Egresado', 24692438),
(89, 1, 3, 3, 0, 0, 0, 0, 0, 0, 8, 890.23, 5, 'Activo', 21539842),
(90, 1, 3, 3, 0, 0, 0, 0, 0, 0, 1, 1780.45, 1, 'Activo', 17021563),
(91, 1, 3, 3, 0, 0, 0, 0, 0, 0, 2, 1780.45, 4, 'Activo', 19190732),
(92, 1, 3, 3, 0, 0, 0, 0, 0, 0, 3, 890.23, 5, 'Activo', 20376328),
(93, 1, 3, 1, 0, 0, 0, 0, 0, 0, 4, 890.23, 2, 'Activo', 21010614),
(94, 1, 3, 1, 0, 0, 0, 0, 0, 0, 5, 890.23, 5, 'Activo', 21010899),
(95, 1, 3, 3, 0, 0, 0, 0, 0, 0, 6, 890.23, 2, 'Activo', 20375500),
(96, 1, 3, 3, 0, 0, 0, 0, 0, 0, 7, 890.23, 5, 'Egresado', 24692438),
(97, 1, 3, 3, 0, 0, 0, 0, 0, 0, 8, 890.23, 5, 'Activo', 21539842),
(98, 1, 3, 3, 0, 0, 0, 0, 0, 0, 1, 1780.45, 1, 'Activo', 17021563),
(99, 1, 3, 3, 0, 0, 0, 0, 0, 0, 2, 1780.45, 4, 'Activo', 19190732),
(100, 1, 3, 3, 0, 0, 0, 0, 0, 0, 3, 890.23, 5, 'Activo', 20376328),
(101, 1, 3, 1, 0, 0, 0, 0, 0, 0, 4, 890.23, 2, 'Activo', 21010614),
(102, 1, 3, 1, 0, 0, 0, 0, 0, 0, 5, 890.23, 5, 'Activo', 21010899),
(103, 1, 3, 3, 0, 0, 0, 0, 0, 0, 6, 890.23, 2, 'Activo', 20375500),
(104, 1, 3, 3, 0, 0, 0, 0, 0, 0, 8, 890.23, 5, 'Activo', 21539842);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_movimientos_nomina`
--

CREATE TABLE IF NOT EXISTS `nom_movimientos_nomina` (
  `codnom` int(11) NOT NULL,
  `codcon` int(11) NOT NULL,
  `ficha` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `tipcon` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `valor` decimal(17,2) DEFAULT NULL,
  `monto` decimal(17,2) DEFAULT NULL,
  `unidad` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `impdet` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `descrip` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `montobase` decimal(17,2) DEFAULT NULL,
  `codbancob` int(11) DEFAULT NULL,
  `cuentacob` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codbanlph` int(11) DEFAULT NULL,
  `cuentalph` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `refcheque` varchar(10) COLLATE utf8_spanish_ci DEFAULT NULL,
  `montototal` decimal(17,2) DEFAULT NULL,
  `contrato` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `bonificable` tinyint(4) DEFAULT NULL,
  `htiempo` tinyint(4) DEFAULT NULL,
  `cedula` int(11) DEFAULT NULL,
  `saldopre` decimal(17,2) DEFAULT NULL,
  `montootros` decimal(17,2) DEFAULT NULL,
  `modificar` tinyint(4) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  `ref1` decimal(5,2) DEFAULT NULL,
  `ref2` decimal(5,2) DEFAULT NULL,
  `ref3` decimal(5,2) DEFAULT NULL,
  `ref4` decimal(5,2) DEFAULT NULL,
  `ref5` decimal(5,2) DEFAULT NULL,
  `ref6` decimal(5,2) DEFAULT NULL,
  `ref7` decimal(5,2) DEFAULT NULL,
  `codnivel1` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel2` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel3` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel4` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel5` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel6` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel7` varchar(7) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipnom` int(11) NOT NULL,
  `contractual` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codnom`,`codcon`,`ficha`,`tipnom`),
  KEY `codcon` (`codcon`),
  KEY `ficha` (`ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nom_movimientos_nomina`
--

INSERT INTO `nom_movimientos_nomina` (`codnom`, `codcon`, `ficha`, `tipcon`, `valor`, `monto`, `unidad`, `impdet`, `anio`, `mes`, `descrip`, `montobase`, `codbancob`, `cuentacob`, `codbanlph`, `cuentalph`, `refcheque`, `montototal`, `contrato`, `bonificable`, `htiempo`, `cedula`, `saldopre`, `montootros`, `modificar`, `ee`, `ref1`, `ref2`, `ref3`, `ref4`, `ref5`, `ref6`, `ref7`, `codnivel1`, `codnivel2`, `codnivel3`, `codnivel4`, `codnivel5`, `codnivel6`, `codnivel7`, `tipnom`, `contractual`) VALUES
(1, 101, '1', 'A', 13.00, 771.53, 'M', NULL, 2012, 6, 'SUELDO																																																						', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17021563, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 101, '2', 'A', 12.00, 712.18, 'M', NULL, 2012, 6, 'SUELDO																																																						', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19190732, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 101, '3', 'A', 0.00, 0.00, 'M', NULL, 2012, 6, 'SUELDO																																																						', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20376328, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 101, '4', 'A', 12.00, 356.09, 'M', NULL, 2012, 6, 'SUELDO																																																						', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21010614, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 101, '5', 'A', 12.00, 356.09, 'M', NULL, 2012, 6, 'SUELDO																																																						', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21010899, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 101, '6', 'A', 13.00, 385.77, 'M', NULL, 2012, 6, 'SUELDO																																																						', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20375500, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 101, '8', 'A', 11.00, 326.42, 'M', NULL, 2012, 6, 'SUELDO																																																						', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21539842, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 201, '1', 'D', 2.00, 16.43, 'M', NULL, 2012, 6, 'SEGURO SOCIAL OBLIGATORIO																																			', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17021563, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 201, '2', 'D', 2.00, 16.43, 'M', NULL, 2012, 6, 'SEGURO SOCIAL OBLIGATORIO																																			', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19190732, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 202, '1', 'D', 2.00, 4.11, 'M', NULL, 2012, 6, 'REGIMEN DE SEGURIDAD SOCIAL																																	', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17021563, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 202, '2', 'D', 2.00, 4.11, 'M', NULL, 2012, 6, 'REGIMEN DE SEGURIDAD SOCIAL																																	', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19190732, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 203, '1', 'D', 0.00, 8.90, 'M', NULL, 2012, 6, 'FONDO DE AHORRO OBLIGATORIO PARA LA VIVIENDA (FAOV)									', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17021563, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 203, '2', 'D', 0.00, 8.90, 'M', NULL, 2012, 6, 'FONDO DE AHORRO OBLIGATORIO PARA LA VIVIENDA (FAOV)									', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19190732, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 206, '1', 'D', 2.00, 118.70, 'M', NULL, 2012, 6, 'DIAS NO TRABAJADOS																											', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 17021563, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 206, '2', 'D', 3.00, 178.05, 'M', NULL, 2012, 6, 'DIAS NO TRABAJADOS																											', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 19190732, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 206, '3', 'D', 15.00, 445.12, 'M', NULL, 2012, 6, 'DIAS NO TRABAJADOS																											', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20376328, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 206, '4', 'D', 3.00, 89.02, 'M', NULL, 2012, 6, 'DIAS NO TRABAJADOS																											', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21010614, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 206, '5', 'D', 3.00, 89.02, 'M', NULL, 2012, 6, 'DIAS NO TRABAJADOS																											', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21010899, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 206, '6', 'D', 2.00, 59.35, 'M', NULL, 2012, 6, 'DIAS NO TRABAJADOS																											', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 20375500, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1'),
(1, 206, '8', 'D', 4.00, 118.70, 'M', NULL, 2012, 6, 'DIAS NO TRABAJADOS																											', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 21539842, 0.00, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '3', '0', '0', '0', '0', '0', '0', 3, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_nominas_pago`
--

CREATE TABLE IF NOT EXISTS `nom_nominas_pago` (
  `codnom` int(11) NOT NULL,
  `descrip` varchar(70) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `fechapago` date DEFAULT NULL,
  `periodo_ini` date DEFAULT NULL,
  `periodo_fin` date DEFAULT NULL,
  `anio` int(11) DEFAULT NULL,
  `mes` int(11) DEFAULT NULL,
  `codtip` int(11) NOT NULL DEFAULT '0',
  `frecuencia` int(11) DEFAULT NULL,
  `status` varchar(1) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipnom` tinyint(4) DEFAULT NULL,
  `libre` tinyint(4) DEFAULT NULL,
  `codsuc` int(11) DEFAULT NULL,
  `coddir` int(11) DEFAULT NULL,
  `codvp` int(11) DEFAULT NULL,
  `codger` int(11) DEFAULT NULL,
  `coddep` int(11) DEFAULT NULL,
  `nivel1` tinyint(4) DEFAULT NULL,
  `nivel2` tinyint(4) DEFAULT NULL,
  `nivel3` tinyint(4) DEFAULT NULL,
  `nivel4` tinyint(4) DEFAULT NULL,
  `nivel5` tinyint(4) DEFAULT NULL,
  `codcargo` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `todocargo` tinyint(4) DEFAULT NULL,
  `vacprograma` tinyint(4) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `vaccolectivas` tinyint(4) DEFAULT NULL,
  `contrato` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sfecha` datetime DEFAULT NULL,
  `sfechapago` datetime DEFAULT NULL,
  `speriodo_ini` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `speriodo_fin` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cod_tli` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `periodo` int(11) DEFAULT NULL,
  `codht1` int(11) DEFAULT NULL,
  `codht2` int(11) DEFAULT NULL,
  `ee` tinyint(4) DEFAULT NULL,
  `nperiodo` smallint(6) DEFAULT NULL,
  `codht3` int(11) DEFAULT NULL,
  `comprometida` int(1) NOT NULL,
  `contabilizada` int(1) NOT NULL,
  PRIMARY KEY (`codnom`,`codtip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nom_nominas_pago`
--

INSERT INTO `nom_nominas_pago` (`codnom`, `descrip`, `fecha`, `fechapago`, `periodo_ini`, `periodo_fin`, `anio`, `mes`, `codtip`, `frecuencia`, `status`, `tipnom`, `libre`, `codsuc`, `coddir`, `codvp`, `codger`, `coddep`, `nivel1`, `nivel2`, `nivel3`, `nivel4`, `nivel5`, `codcargo`, `todocargo`, `vacprograma`, `markar`, `vaccolectivas`, `contrato`, `sfecha`, `sfechapago`, `speriodo_ini`, `speriodo_fin`, `cod_tli`, `periodo`, `codht1`, `codht2`, `ee`, `nperiodo`, `codht3`, `comprometida`, `contabilizada`) VALUES
(1, 'Tienda-1era Quincena - DEL 16/06/2012 - Al 30/06/2012', NULL, '2012-06-30', '2012-06-16', '2012-06-30', 2012, 6, 3, 2, 'A', 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 0, NULL, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_nomina_netos`
--

CREATE TABLE IF NOT EXISTS `nom_nomina_netos` (
  `codnom` int(11) NOT NULL,
  `tipnom` int(11) NOT NULL,
  `ficha` int(10) NOT NULL,
  `cedula` int(11) NOT NULL,
  `cta_ban` varchar(21) COLLATE utf8_spanish_ci NOT NULL,
  `neto` float(20,2) NOT NULL,
  PRIMARY KEY (`codnom`,`tipnom`,`ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_progvacaciones`
--

CREATE TABLE IF NOT EXISTS `nom_progvacaciones` (
  `periodo` int(11) NOT NULL,
  `ficha` int(10) NOT NULL,
  `ceduda` int(11) NOT NULL,
  `ddisfrute` decimal(7,2) NOT NULL,
  `dpago` decimal(7,2) NOT NULL,
  `dpagob` decimal(7,2) NOT NULL,
  `fechavac` date NOT NULL,
  `fechareivac` date NOT NULL,
  `operacion` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `fechaopr` date NOT NULL,
  `estado` varchar(21) COLLATE utf8_spanish_ci NOT NULL,
  `monto` decimal(17,2) NOT NULL,
  `tipnom` int(2) NOT NULL,
  `codsuc` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `coddir` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `codvp` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `codger` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `coddep` varchar(6) COLLATE utf8_spanish_ci NOT NULL,
  `detalle` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `codnom` int(4) NOT NULL,
  `sfechavac` date NOT NULL,
  `sfechareivac` date NOT NULL,
  `sfechaopr` date NOT NULL,
  `tipooper` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `desoper` varchar(30) COLLATE utf8_spanish_ci NOT NULL,
  `ee` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_venc` date DEFAULT NULL,
  UNIQUE KEY `periodo` (`periodo`,`ficha`,`tipnom`,`tipooper`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_variables_personal`
--

CREATE TABLE IF NOT EXISTS `nom_variables_personal` (
  `nombre` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `parametros` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `indicador` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `nom_variables_personal`
--

INSERT INTO `nom_variables_personal` (`nombre`, `descripcion`, `parametros`, `indicador`) VALUES
('$ANIOVACACION', 'Periodos de Vacaciones', '', 'V'),
('$ANTIGUEDAD', 'Calcula la Antiguedad segun tipo ''A''=aÃ±os, ''M''=meses, ''D''=dias', 'ANTIGUEDAD($FECHA1, $FECHA2,TIPO)', 'F'),
('$BONODIACAT', 'Bono Diario CategorÃ­a', '', 'V'),
('$BONOMESCAT', 'Bono Mesual CategorÃ­a', '', 'V'),
('$CAMPOADICIONALPER', 'Retorna el valor del campo adicional2', 'CAMPOADICIONALPER(<CÃ³digo>)', 'F'),
('$CEDULA', 'No. de CÃ©dula de Identidad', '', 'V'),
('$CODCARGO', 'CÃ³digo de Cargo', '', 'V'),
('$CODCATEGORIA', 'CÃ³digo de la Categoria', '', 'V'),
('$CODIGOSUSP', 'CÃ³digo de la Ultima SuspenciÃ³n', '', 'V'),
('$CODPROFESION', 'CÃ³digo de ProfesiÃ³n', '', 'V'),
('$CONTRATO', 'Contrato', '', 'V'),
('$DIAFMES', 'DÃ­as Feriados del Mes (desde el Inicio de NÃ³mina), segÃºn calendario del empresa', '', 'V'),
('$DIAFMESTIP', 'DÃ­as Feriados del Mes (desde el Inicio de NÃ³mina), segÃºn tipo de nÃ³mina', '', 'V'),
('$DIAFPER', 'DÃ­as Feriados del PerÃ­odo (desde el Inicio, fin de NÃ³mina), segÃºn calendario de la empresa', '', 'V'),
('$DIAFPERPER', 'DÃ­as Feriados del PerÃ­odo (desde el Inicio, fin de NÃ³mina), segÃºn calendario del trabajador', '', 'V'),
('$DIAFPERTIP', 'DÃ­as Feriados del PerÃ­odo (desde el Inicio, fin de NÃ³mina), segÃºn tipo de nÃ³mina', '', 'V'),
('$DIAHMES', 'Dias HÃ¡biles del Mes (desde inicio de nÃ³mina),segÃºn calendario de la empresa', '', 'V'),
('$DIAHMESPER', 'Dias HÃ¡biles del Mes (desde inicio de nÃ³mina),segÃºn calendario del trabajador', '', 'V'),
('$DIAHMESTIP', 'Dias HÃ¡biles del Mes (desde inicio de nÃ³mina),segÃºn tipo de nÃ³mina', '', 'V'),
('$DIAHPER', 'Dias HÃ¡biles del perÃ­odo (desde inicio,fin de nÃ³mina),segÃºn calendario de la empresa', '', 'V'),
('$DIAHPERPER', 'Dias HÃ¡biles del perÃ­odo (desde inicio,fin de nÃ³mina),segÃºn calendario del trabajador', '', 'V'),
('$DIAHPERTIP', 'Dias HÃ¡biles del perÃ­odo (desde inicio,fin de nÃ³mina),segÃºn tipo de nÃ³mina', '', 'V'),
('$EDAD', 'Edad del Trabajador', '', 'V'),
('$FECFFINVAC', 'Fecha Retorno Vacaciones', '', 'V'),
('$FECFINIVAC', 'Fecha Salida Vacaciones', '', 'V'),
('$FECHAAPLICACION', 'Fecha de la aplicaciÃ³n del sueldo propuesto', '', 'V'),
('$FECHAFINCONTRATO', 'Fecha final del contrato, si no es fijo', '', 'V'),
('$FECHAFINNOM', 'Fecha final del periodo de NÃ³mina', '', 'V'),
('$FECHAFINSUSP', 'Fecha final de suspenciÃ³n', '', 'V'),
('$FECHAHOY', 'Fecha de hoy (fecha del sistema)', '', 'V'),
('$FECHAINGRESO', 'Fecha de Ingreso del Trabajador', '', 'V'),
('$FECHAINISUSP', 'Fecha Inicio de SuspenciÃ³n', '', 'V'),
('$FECHANACIMIENTO', 'Fecha de Nacimiento del trabajador', '', 'V'),
('$FECHANOMINA', 'Fecha inicial del periodo de la nomina', '', 'V'),
('$FECHAPAGNOM', 'Fecha de pago de la nÃ³mina', '', 'V'),
('$FECLIQ', 'Fecha de LiquidaciÃ³n', '', 'V'),
('$FICHA', 'Ficha del Trabajador', '', 'V'),
('$FORMACOBRO', 'Forma de cobro', '', 'V'),
('$FRECUENCIANOM', 'Codigo del Tipo de frecuencia de la nÃ³mina', '', 'V'),
('$GR', 'Grupo Categoria', '', 'V'),
('$LUNES', 'Cantidad de Lunes del mes de Proceso', '', 'V'),
('$LUNESPER', 'Cantidad de lunes del periodo (inicio, fin de nomina)', '', 'V'),
('$NIVEL1', 'Codigo nivel funcional 1', '', 'V'),
('$NIVEL2', 'Codigo nivel funcional 2', '', 'V'),
('$NIVEL3', 'Codigo nivel funcional 3', '', 'V'),
('$NIVEL4', 'Codigo nivel funcional 4', '', 'V'),
('$NIVEL5', 'Codigo nivel funcional 5', '', 'V'),
('$NIVEL6', 'Codigo nivel funcional 6', '', 'V'),
('$NIVEL7', 'Codigo nivel funcional 7', '', 'V'),
('$PERIODOVAC', 'AÃ±o para el calculo de Vacaciones', '', 'V'),
('$SALCAT', 'Salario CategorÃ­a', '', 'V'),
('$SEXO', 'Sexo del Trabajador', '', 'V'),
('$SITUACION', 'SituaciÃ³n del Trabajador', '', 'V'),
('$SUELDO', 'Sueldo del Trabajador', '', 'V'),
('$SUELDOPROPUESTO', 'Sueldo Propuesto del Trabajador', '', 'V'),
('$T01=', 'Variable de uso libre', '', 'V'),
('$TIPOCONTRATO', 'Tipo de Contrato', '', 'V'),
('$TIPOLIQUIDACION', 'Tipo de liquidacion segun tasa de tipos de liquidaciÃ³n', '', 'V'),
('$TIPONOMINA', 'Tipo de NÃ³mina a la que pertenece el trabajador', '', 'V'),
('$TIPOPRESTACION', 'Tipo de Prestacion del trabajador', '', 'V'),
('ACUMCOM', 'ACUMCOM(codigo_concepto,fecha_inicio,fecha_fin); devuelve el monto acumulado segun el codigo del con', 'ACUMCOM(codcon,fecha_inicio,fecha_fin)', 'F'),
('BAREMO', 'BAREMO($codigo_baremo,$valor); retorna el resultado del baremo indicado, segÃºn el rango del valor.', 'BAREMO($codigo_baremo,$valor)', 'F'),
('CONCEPTO', 'CONCEPTO(codigo_concepto); devuelve el valor del monto del concepto de la nomina actual, segun el co', 'CONCEPTO(codigo_concepto)', 'F'),
('CONCEPTONOMANT', 'CONCEPTONOMANT(cÃ³digo_concepto,opciÃ³n); Retorna el resultado del concepto indicado de la nÃ³mina a', 'CONCEPTONOMANT(cÃ³digo_concepto,opciÃ³n)', 'F'),
('DIA', 'DIA($fecha); Devuelve el dÃ­a en nÃºmero segÃºn la fecha indicada.', 'DIA()', 'F'),
('MENSAJECON', 'MENSAJECON(VARIABLE); Devuelve el valor que contenga una variable $T01..$T10,$MONTO.', 'MENSAJECON($VARIABLE)', 'F'),
('Mes', 'devuelve el mes de una fecha dada', 'mes(AAAA/MM/DD)', 'F'),
('SI', 'SI("condicion",verdadero,falso); Retorna un valor verdadero o falso segÃºn la condiciÃ³n', 'SI(condicion,V,F)', 'F');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pase`
--

CREATE TABLE IF NOT EXISTS `pase` (
  `cedula` int(11) DEFAULT NULL,
  `apenom` varchar(60) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sexo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado_civil` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `zonapos` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `telefonos` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecnac` date DEFAULT NULL,
  `lugarnac` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codpro` int(11) DEFAULT NULL,
  `foto` varchar(80) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipnom` int(11) NOT NULL DEFAULT '0',
  `codnivel1` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel2` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel3` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel4` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codnivel5` varchar(8) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ficha` int(10) NOT NULL,
  `fecing` date DEFAULT NULL,
  `codcat` varchar(6) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codcargo` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `forcob` varchar(39) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codbancob` int(11) DEFAULT NULL,
  `cuentacob` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codbanlph` int(11) DEFAULT NULL,
  `cuentalph` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipemp` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `fecfin` int(11) DEFAULT NULL,
  `sueldopro` decimal(20,5) DEFAULT NULL,
  `fechaplica` date DEFAULT NULL,
  `codidi` int(11) DEFAULT NULL,
  `fecnacr` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `tipopres` tinyint(4) DEFAULT NULL,
  `fechasus` date DEFAULT NULL,
  `fechareisus` date DEFAULT NULL,
  `fechavac` date DEFAULT NULL,
  `fechareivac` date DEFAULT NULL,
  `fecharetiro` date DEFAULT NULL,
  `aplicalogro` tinyint(4) DEFAULT NULL,
  `aplicasuspension` tinyint(4) DEFAULT NULL,
  `ctacontab` varchar(22) COLLATE utf8_spanish_ci DEFAULT NULL,
  `periodo` int(11) DEFAULT NULL,
  `markar` tinyint(4) DEFAULT NULL,
  `cod_tli` varchar(19) COLLATE utf8_spanish_ci NOT NULL,
  `motivo_liq` varchar(8) COLLATE utf8_spanish_ci NOT NULL,
  `preaviso` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `suesal` decimal(20,2) DEFAULT NULL,
  `contrato` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombres` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  `apellidos` varchar(30) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`tipnom`,`ficha`),
  UNIQUE KEY `ficha` (`ficha`,`cedula`),
  KEY `codcargo` (`codcargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesar`
--

CREATE TABLE IF NOT EXISTS `procesar` (
  `concepto` varchar(8) NOT NULL,
  `valor` int(11) NOT NULL,
  `trabajador` int(11) NOT NULL,
  `cod_pro` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`cod_pro`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=51 ;

--
-- Volcado de datos para la tabla `procesar`
--

INSERT INTO `procesar` (`concepto`, `valor`, `trabajador`, `cod_pro`) VALUES
('102', 13, 1, 1),
('103', 0, 1, 2),
('104', 0, 1, 3),
('105', 0, 1, 4),
('206', 2, 1, 5),
('102', 12, 2, 6),
('103', 0, 2, 7),
('104', 0, 2, 8),
('105', 0, 2, 9),
('206', 3, 2, 10),
('102', 0, 3, 11),
('103', 0, 3, 12),
('104', 0, 3, 13),
('105', 0, 3, 14),
('206', 15, 3, 15),
('102', 12, 4, 16),
('103', 0, 4, 17),
('104', 0, 4, 18),
('105', 0, 4, 19),
('206', 3, 4, 20),
('102', 12, 5, 21),
('103', 0, 5, 22),
('104', 0, 5, 23),
('105', 0, 5, 24),
('206', 3, 5, 25),
('102', 13, 6, 26),
('103', 0, 6, 27),
('104', 0, 6, 28),
('105', 0, 6, 29),
('206', 2, 6, 30),
('102', 11, 7, 31),
('103', 0, 7, 32),
('104', 0, 7, 33),
('105', 0, 7, 34),
('206', 4, 7, 35),
('102', 11, 8, 36),
('103', 0, 8, 37),
('104', 0, 8, 38),
('105', 0, 8, 39),
('206', 4, 8, 40),
('102', 1, 9, 41),
('103', 0, 9, 42),
('104', 0, 9, 43),
('105', 0, 9, 44),
('206', 14, 9, 45),
('102', 0, 10, 46),
('103', 0, 10, 47),
('104', 0, 10, 48),
('105', 0, 10, 49),
('206', 15, 10, 50);

-- --------------------------------------------------------

--
-- Estructura para la vista `nomvis_conceptos_acumulado`
--
DROP TABLE IF EXISTS `nomvis_conceptos_acumulado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_conceptos_acumulado` AS select `ca`.`codcon` AS `codcon`,`ca`.`cod_tac` AS `cod_tac`,`a`.`des_tac` AS `descrip` from (`nomconceptos_acumulados` `ca` join `nomacumulados` `a` on((`ca`.`cod_tac` = `a`.`cod_tac`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `nomvis_conceptos_frecuencia`
--
DROP TABLE IF EXISTS `nomvis_conceptos_frecuencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_conceptos_frecuencia` AS select `cf`.`codcon` AS `codcon`,`cf`.`codfre` AS `codfre`,`f`.`descrip` AS `descrip` from (`nomconceptos_frecuencias` `cf` join `nomfrecuencias` `f` on((`cf`.`codfre` = `f`.`codfre`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `nomvis_conceptos_situacion`
--
DROP TABLE IF EXISTS `nomvis_conceptos_situacion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_conceptos_situacion` AS select `cs`.`codcon` AS `codcon`,`cs`.`estado` AS `descrip`,`s`.`situacion` AS `situacion` from (`nomconceptos_situaciones` `cs` join `nomsituaciones` `s` on((`cs`.`estado` = `s`.`situacion`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `nomvis_conceptos_tiposnomina`
--
DROP TABLE IF EXISTS `nomvis_conceptos_tiposnomina`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_conceptos_tiposnomina` AS select `ct`.`codcon` AS `codcon`,`ct`.`codtip` AS `codtip`,`n`.`descrip` AS `descrip` from (`nomconceptos_tiponomina` `ct` join `nomtipos_nomina` `n` on((`ct`.`codtip` = `n`.`codtip`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `nomvis_integrantes`
--
DROP TABLE IF EXISTS `nomvis_integrantes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_integrantes` AS select `per`.`cedula` AS `cedula`,`per`.`ficha` AS `ficha`,`per`.`apellidos` AS `apellidos`,`per`.`nombres` AS `nombres`,`per`.`estado` AS `estado`,`tip`.`descrip` AS `descrip` from (`nomtipos_nomina` `tip` join `nompersonal` `per` on((`tip`.`codtip` = `per`.`tipnom`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `nomvis_per_movimiento`
--
DROP TABLE IF EXISTS `nomvis_per_movimiento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_per_movimiento` AS select `mn`.`codnom` AS `codnom`,`pe`.`tipnom` AS `tipnom`,`pe`.`foto` AS `foto`,`pe`.`fecing` AS `fec_ing`,`pe`.`cedula` AS `cedula`,`pe`.`ficha` AS `ficha`,`pe`.`apenom` AS `apenom`,`pe`.`suesal` AS `sueldopro`,`pe`.`codnivel1` AS `codnivel1`,`pe`.`codnivel2` AS `codnivel2`,`pe`.`codnivel3` AS `codnivel3`,`car`.`des_car` AS `cargo` from (((`nom_movimientos_nomina` `mn` join `nompersonal` `pe` on((`mn`.`ficha` = `pe`.`ficha`))) left join `nomcargos` `car` on((`pe`.`codcargo` = `car`.`cod_car`))) join `nomconceptos` `c` on((`c`.`codcon` = `mn`.`codcon`))) group by `pe`.`ficha`,`mn`.`codnom` order by `pe`.`apenom`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
