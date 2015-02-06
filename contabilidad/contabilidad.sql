-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-07-2012 a las 21:49:22
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `xtrasport_contabilidad`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activosfijos`
--

CREATE TABLE IF NOT EXISTS `activosfijos` (
  `CODACT` int(10) NOT NULL,
  `TIPO` int(10) NOT NULL,
  `GRUZON` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `DECRIPAF` varchar(120) COLLATE utf8_spanish_ci NOT NULL,
  `SEDEPRECIA` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `CODUBI` tinyint(4) NOT NULL,
  `COSTOCOMPRA` decimal(11,2) NOT NULL,
  `FECCOMPRA` date NOT NULL,
  `COSTOACTUAL` decimal(11,2) NOT NULL,
  `VIDAUTIL` int(11) NOT NULL,
  `FECINIDPR` date NOT NULL,
  `FECFIN` date NOT NULL,
  `VALRESI` decimal(11,2) NOT NULL,
  `DPRMENSUAL` decimal(11,2) NOT NULL,
  `DPRACUM` decimal(11,2) NOT NULL,
  `CTAGASTOS` varchar(27) COLLATE utf8_spanish_ci NOT NULL,
  `CTADPRACUM` varchar(27) COLLATE utf8_spanish_ci NOT NULL,
  `COMPLEMENTO` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `ESTADOAF` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `CTAREAL` varchar(27) COLLATE utf8_spanish_ci NOT NULL,
  `SERIAL1` varchar(21) COLLATE utf8_spanish_ci NOT NULL,
  `SERIAL2` varchar(21) COLLATE utf8_spanish_ci NOT NULL,
  `SERIAL3` varchar(21) COLLATE utf8_spanish_ci NOT NULL,
  `CODCCOS` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`CODACT`),
  KEY `Tipo` (`TIPO`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activosfijos_movimientos`
--

CREATE TABLE IF NOT EXISTS `activosfijos_movimientos` (
  `CODACT` int(10) NOT NULL,
  `TIPOACT` int(10) NOT NULL,
  `TIPOMOV` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `FECMOV` date NOT NULL,
  `MONMOV` decimal(11,2) NOT NULL,
  PRIMARY KEY (`CODACT`,`FECMOV`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `activosfijos_tipos`
--

CREATE TABLE IF NOT EXISTS `activosfijos_tipos` (
  `CODIGOTA` int(10) NOT NULL,
  `DESCRIP` varchar(60) COLLATE utf8_spanish_ci NOT NULL,
  `CUENTAREAL` varchar(27) COLLATE utf8_spanish_ci NOT NULL,
  `DEPRECIABLE` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `CUENTAGASTOS` varchar(27) COLLATE utf8_spanish_ci NOT NULL,
  `CUENTAACUM` varchar(27) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`CODIGOTA`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `activosfijos_tipos`
--

INSERT INTO `activosfijos_tipos` (`CODIGOTA`, `DESCRIP`, `CUENTAREAL`, `DEPRECIABLE`, `CUENTAGASTOS`, `CUENTAACUM`) VALUES
(1, 'EQUIPOS MEDICOS', '1.2.01.001.', 'SI', '5.2.01.031.', '1.2.02.001.'),
(2, 'MOBILIARIOS DE EQUIPOS', '1.2.01.002.', 'SI', '6.1.02.032.', '1.2.02.002.'),
(3, 'MEJORAS A  PROPIEDADES ARRENDADAS ', '1.2.01.005.', 'SI', '6.1.02.035.', '1.2.02.005.'),
(4, 'EQUIP. Y SIST. INFORMATICA', '1.2.01.003.', 'SI', '6.1.02.033.', '1.2.02.003.'),
(5, 'PROGRAMA COMP.', '1.2.01.006.', 'SI', '6.1.02.036.', '1.2.02.006.'),
(6, 'VEHICULO', '1.2.01.004.', 'SI', '6.1.02.034.', '1.2.02.004.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconasicc`
--

CREATE TABLE IF NOT EXISTS `cwconasicc` (
  `codcc` int(11) NOT NULL,
  `codcomp` int(11) NOT NULL,
  `codasi` int(11) NOT NULL,
  PRIMARY KEY (`codcc`,`codcomp`,`codasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconasigrup`
--

CREATE TABLE IF NOT EXISTS `cwconasigrup` (
  `codasi` int(11) NOT NULL,
  `codgrup` int(11) NOT NULL,
  `codaux` int(11) NOT NULL,
  `codcomp` int(11) NOT NULL,
  PRIMARY KEY (`codasi`,`codaux`,`codcomp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconaux`
--

CREATE TABLE IF NOT EXISTS `cwconaux` (
  `Cuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Descrip` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Salant` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Salmes` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Salactu` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Debito` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Credito` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Nivel` int(11) NOT NULL DEFAULT '0',
  `Tipo` char(2) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla para generar reporte balance';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconcco`
--

CREATE TABLE IF NOT EXISTS `cwconcco` (
  `Codccos` int(11) NOT NULL AUTO_INCREMENT,
  `Descrip` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Codccos`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconcue`
--

CREATE TABLE IF NOT EXISTS `cwconcue` (
  `Cuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Nivel` int(11) NOT NULL DEFAULT '0',
  `Tipo` char(10) COLLATE utf8_spanish_ci NOT NULL,
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconcuetemp`
--

CREATE TABLE IF NOT EXISTS `cwconcuetemp` (
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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwcondco`
--

CREATE TABLE IF NOT EXISTS `cwcondco` (
  `RecNo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Numcom` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Clave foranea',
  `Fecha` date NOT NULL DEFAULT '0000-00-00',
  `Cuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Referen` varchar(11) COLLATE utf8_spanish_ci NOT NULL DEFAULT '0',
  `Tiporef` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Descrip` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Debito` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Credito` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Descriplar` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Debitou` float NOT NULL DEFAULT '0',
  `Creditou` float NOT NULL DEFAULT '0',
  `Codccos` int(11) NOT NULL DEFAULT '0',
  `Numlim` double NOT NULL DEFAULT '0',
  `Control` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Codtipo` int(11) NOT NULL DEFAULT '0',
  `Concil` int(11) NOT NULL DEFAULT '0',
  `FechaD` date NOT NULL,
  PRIMARY KEY (`RecNo`),
  KEY `Numcom` (`Numcom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Detalle de Comprobante' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwcondcohis`
--

CREATE TABLE IF NOT EXISTS `cwcondcohis` (
  `RecNo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Numcom` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Clave foranea',
  `Fecha` date NOT NULL DEFAULT '0000-00-00',
  `Cuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Referen` int(11) NOT NULL DEFAULT '0',
  `Tiporef` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Descrip` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Debito` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Credito` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Descriplar` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Debitou` float NOT NULL DEFAULT '0',
  `Creditou` float NOT NULL DEFAULT '0',
  `Codccos` int(11) NOT NULL DEFAULT '0',
  `Numlim` double NOT NULL DEFAULT '0',
  `Control` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Codtipo` int(11) NOT NULL DEFAULT '0',
  `Concil` int(11) NOT NULL DEFAULT '0',
  `FechaD` date NOT NULL,
  PRIMARY KEY (`RecNo`),
  KEY `Numcom` (`Numcom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Detalle de Comprobante' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwcondes`
--

CREATE TABLE IF NOT EXISTS `cwcondes` (
  `Codtipo` int(11) NOT NULL AUTO_INCREMENT,
  `Descrip` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwcondli`
--

CREATE TABLE IF NOT EXISTS `cwcondli` (
  `RecNo` int(11) NOT NULL AUTO_INCREMENT,
  `Descrip` varchar(40) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`RecNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconemp`
--

CREATE TABLE IF NOT EXISTS `cwconemp` (
  `Codemp` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Nomemp` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Nrifemp` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Nnitemp` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `Direcc1` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Direcc2` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Fecini` date NOT NULL DEFAULT '0000-00-00',
  `Fecfin` date NOT NULL DEFAULT '0000-00-00',
  `Numcom` int(11) NOT NULL DEFAULT '0',
  `Mescie1` date NOT NULL DEFAULT '0000-00-00',
  `Mescie2` date NOT NULL DEFAULT '0000-00-00',
  `Mescie3` date NOT NULL DEFAULT '0000-00-00',
  `Mescie4` date NOT NULL DEFAULT '0000-00-00',
  `Mescie5` date NOT NULL DEFAULT '0000-00-00',
  `Mescie6` date NOT NULL DEFAULT '0000-00-00',
  `Mescie7` date NOT NULL DEFAULT '0000-00-00',
  `Mescie8` date NOT NULL DEFAULT '0000-00-00',
  `Mescie9` date NOT NULL DEFAULT '0000-00-00',
  `Mescie10` date NOT NULL DEFAULT '0000-00-00',
  `Mescie11` date NOT NULL DEFAULT '0000-00-00',
  `Mescie12` date NOT NULL DEFAULT '0000-00-00',
  `Estcie1` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie2` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie3` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie4` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie5` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie6` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie7` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie8` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie9` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie10` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie11` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Estcie12` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Aprupre` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Codsuc` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Precierre` int(11) NOT NULL DEFAULT '0',
  `Ajusuni` int(11) NOT NULL DEFAULT '0',
  `Ctaajuni` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Numaf` int(11) NOT NULL DEFAULT '0',
  `Comene` int(11) NOT NULL DEFAULT '0',
  `Comfeb` int(11) NOT NULL DEFAULT '0',
  `Commar` int(11) NOT NULL DEFAULT '0',
  `Comabr` int(11) NOT NULL DEFAULT '0',
  `Commay` int(11) NOT NULL DEFAULT '0',
  `Comjun` int(11) NOT NULL DEFAULT '0',
  `Comjul` int(11) NOT NULL DEFAULT '0',
  `Comago` int(11) NOT NULL DEFAULT '0',
  `Comsep` int(11) NOT NULL DEFAULT '0',
  `Comoct` int(11) NOT NULL DEFAULT '0',
  `Comnov` int(11) NOT NULL DEFAULT '0',
  `Comdic` int(11) NOT NULL DEFAULT '0',
  `imagen` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Codemp`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Empresa' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cwconemp`
--

INSERT INTO `cwconemp` (`Codemp`, `Nomemp`, `Nrifemp`, `Nnitemp`, `Direcc1`, `Direcc2`, `Fecini`, `Fecfin`, `Numcom`, `Mescie1`, `Mescie2`, `Mescie3`, `Mescie4`, `Mescie5`, `Mescie6`, `Mescie7`, `Mescie8`, `Mescie9`, `Mescie10`, `Mescie11`, `Mescie12`, `Estcie1`, `Estcie2`, `Estcie3`, `Estcie4`, `Estcie5`, `Estcie6`, `Estcie7`, `Estcie8`, `Estcie9`, `Estcie10`, `Estcie11`, `Estcie12`, `Aprupre`, `Codsuc`, `Precierre`, `Ajusuni`, `Ctaajuni`, `Numaf`, `Comene`, `Comfeb`, `Commar`, `Comabr`, `Commay`, `Comjun`, `Comjul`, `Comago`, `Comsep`, `Comoct`, `Comnov`, `Comdic`, `imagen`) VALUES
(1, 'XTRA SPORT, C.A.', 'J-30713417-8', '', 'CALLE INDEPENDENCIA C.C. DOBLE A, NIVEL P.B., LOCAL 2 SECTOR CENTRO, CARUPANO - ESTADO SUCRE', '', '2012-01-01', '2012-12-31', 0, '2012-01-01', '2012-02-01', '2012-03-01', '2012-04-01', '2012-05-01', '2012-06-01', '2012-07-01', '2012-08-01', '2012-09-01', '2012-10-01', '2012-11-01', '2012-12-01', 'ABIERTO', 'ABIERTO', 'ABIERTO', 'ABIERTO', 'ABIERTO', 'ABIERTO', 'ABIERTO', 'ABIERTO', 'ABIERTO', 'ABIERTO', 'ABIERTO', 'ABIERTO', '', '', 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 'logo.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconfig`
--

CREATE TABLE IF NOT EXISTS `cwconfig` (
  `Codigo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Sistema` int(11) NOT NULL DEFAULT '0',
  `Sepacta` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `Balact` int(11) NOT NULL DEFAULT '0',
  `Balpas` int(11) NOT NULL DEFAULT '0',
  `Balgan` int(11) NOT NULL DEFAULT '0',
  `Baling` int(11) NOT NULL DEFAULT '0',
  `Baleng` int(11) NOT NULL DEFAULT '0',
  `Balord` int(11) NOT NULL DEFAULT '0',
  `Nromax` int(11) NOT NULL DEFAULT '0',
  `Niv1` int(11) NOT NULL DEFAULT '0',
  `Niv2` int(11) NOT NULL DEFAULT '0',
  `Niv3` int(11) NOT NULL DEFAULT '0',
  `Niv4` int(11) NOT NULL DEFAULT '0',
  `Niv5` int(11) NOT NULL DEFAULT '0',
  `Niv6` int(11) NOT NULL DEFAULT '0',
  `Niv7` int(11) NOT NULL DEFAULT '0',
  `Niv8` int(11) NOT NULL DEFAULT '0',
  `Niv9` int(11) NOT NULL DEFAULT '0',
  `Nomniv1` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Nomniv2` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Nomniv3` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Nomniv4` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Nomniv5` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Nomniv6` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Nomniv7` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Nomniv8` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Nomniv9` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Confis` int(11) NOT NULL DEFAULT '0',
  `Nivacca` int(11) NOT NULL DEFAULT '0',
  `Nivaccp` int(11) NOT NULL DEFAULT '0',
  `Nivaccc` int(11) NOT NULL DEFAULT '0',
  `Nivacci` int(11) NOT NULL DEFAULT '0',
  `Siscxc` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Siscpx` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Planunico` int(11) NOT NULL DEFAULT '0',
  `Ctalargo` int(11) NOT NULL DEFAULT '0',
  `Novlargo` int(11) NOT NULL DEFAULT '0',
  `Unipre` int(11) NOT NULL DEFAULT '0',
  `Nromaximo` int(11) NOT NULL DEFAULT '0',
  `Nroauto` int(11) NOT NULL DEFAULT '0',
  `Ccosto` int(11) NOT NULL DEFAULT '0',
  `Nroautoaf` int(11) NOT NULL DEFAULT '0',
  `Nromaxaf` int(11) NOT NULL DEFAULT '0',
  `Niv1af` int(11) NOT NULL DEFAULT '0',
  `Niv2af` int(11) NOT NULL DEFAULT '0',
  `Niv3af` int(11) NOT NULL DEFAULT '0',
  `Niv4af` int(11) NOT NULL DEFAULT '0',
  `Niv5af` int(11) NOT NULL DEFAULT '0',
  `Niv6af` int(11) NOT NULL DEFAULT '0',
  `Niv7af` int(11) NOT NULL DEFAULT '0',
  `Niv8af` int(11) NOT NULL DEFAULT '0',
  `Niv9af` int(11) NOT NULL DEFAULT '0',
  `Sepactaaf` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `Tipoplandecta` int(11) NOT NULL DEFAULT '0',
  `cuenta_cierre_mes` varchar(27) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Configuracion' AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `cwconfig`
--

INSERT INTO `cwconfig` (`Codigo`, `Sistema`, `Sepacta`, `Balact`, `Balpas`, `Balgan`, `Baling`, `Baleng`, `Balord`, `Nromax`, `Niv1`, `Niv2`, `Niv3`, `Niv4`, `Niv5`, `Niv6`, `Niv7`, `Niv8`, `Niv9`, `Nomniv1`, `Nomniv2`, `Nomniv3`, `Nomniv4`, `Nomniv5`, `Nomniv6`, `Nomniv7`, `Nomniv8`, `Nomniv9`, `Confis`, `Nivacca`, `Nivaccp`, `Nivaccc`, `Nivacci`, `Siscxc`, `Siscpx`, `Planunico`, `Ctalargo`, `Novlargo`, `Unipre`, `Nromaximo`, `Nroauto`, `Ccosto`, `Nroautoaf`, `Nromaxaf`, `Niv1af`, `Niv2af`, `Niv3af`, `Niv4af`, `Niv5af`, `Niv6af`, `Niv7af`, `Niv8af`, `Niv9af`, `Sepactaaf`, `Tipoplandecta`, `cuenta_cierre_mes`) VALUES
(1, 1, '.', 1, 2, 3, 4, 7, 8, 5, 1, 1, 2, 3, 3, 0, 0, 0, 0, 'GRUPO', 'SUB-GRUPO', 'RUBRO', 'CUENTA', 'AUXILIAR', '', '', '', '', 0, 0, 0, 0, 0, '', '', 0, 0, 0, 0, 0, 0, 0, 0, 4, 1, 1, 2, 3, 0, 0, 0, 0, 0, '.', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwcongrup`
--

CREATE TABLE IF NOT EXISTS `cwcongrup` (
  `codgrup` int(11) NOT NULL AUTO_INCREMENT,
  `descrip` varchar(20) NOT NULL,
  PRIMARY KEY (`codgrup`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cwcongrup`
--

INSERT INTO `cwcongrup` (`codgrup`, `descrip`) VALUES
(1, 'BANCOS'),
(2, 'PROVEEDORES'),
(3, 'CLIENTES FIJOS'),
(4, 'MEDICOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconhco`
--

CREATE TABLE IF NOT EXISTS `cwconhco` (
  `Numcom` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Codtipo` int(10) unsigned NOT NULL DEFAULT '0',
  `Fecha` date NOT NULL DEFAULT '0000-00-00',
  `Descrip` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '0',
  `Alterno` int(10) unsigned NOT NULL DEFAULT '0',
  `Enuso` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`Numcom`,`Fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Cabecera de Comprobante' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconhcohis`
--

CREATE TABLE IF NOT EXISTS `cwconhcohis` (
  `Numcom` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Codtipo` int(10) unsigned NOT NULL DEFAULT '0',
  `Fecha` date NOT NULL DEFAULT '0000-00-00',
  `Descrip` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Estado` int(10) unsigned NOT NULL DEFAULT '0',
  `Alterno` int(10) unsigned NOT NULL DEFAULT '0',
  `Enuso` int(10) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`Numcom`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Cabecera de Comprobante' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconhis`
--

CREATE TABLE IF NOT EXISTS `cwconhis` (
  `RecNo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Anio` int(11) NOT NULL DEFAULT '0',
  `Mes` int(11) NOT NULL DEFAULT '0',
  `Cuenta` varchar(50) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Clave foranea',
  `Desmes` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `Salanth` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Debitoh` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Salamesh` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Salacth` decimal(25,2) NOT NULL DEFAULT '0.00',
  `MonMod` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Salantu` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Debitou` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Creditou` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Salamesu` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Salactu` decimal(25,2) NOT NULL DEFAULT '0.00',
  `Mondu` decimal(25,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`RecNo`),
  KEY `Cuenta` (`Cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Historia de la cuenta' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwcontas`
--

CREATE TABLE IF NOT EXISTS `cwcontas` (
  `cod_tipo` int(10) NOT NULL,
  `Descrip` varchar(500) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwcontco`
--

CREATE TABLE IF NOT EXISTS `cwcontco` (
  `Codtipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descrip` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Codtipo`),
  UNIQUE KEY `Codtipo` (`Codtipo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tipo de comprobante' AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `cwcontco`
--

INSERT INTO `cwcontco` (`Codtipo`, `Descrip`) VALUES
(2, 'AJUSTE POR INFLACION'),
(3, 'BANCOS AUTOMATICOS'),
(4, 'PRESTAMOS AUTOMATICOS'),
(5, 'COBRANZA AUTOMATICOS'),
(6, 'COMPRAS AUTOMATICOS'),
(7, 'PAGOS AUTOMATICOS'),
(8, 'NOMINA AUTOMATICOS'),
(9, 'ACTIVOS FIJOS AUTOMATICOS'),
(10, 'USO RESTRINGIDO'),
(11, 'INGRESOS'),
(12, 'EGRESOS'),
(13, 'COMPRAS'),
(14, 'PRESTAMOS RECIBIDOS'),
(15, 'PRESTAMOS RECIBIDOS'),
(16, 'PRESTAMOS ENTREGADOS'),
(17, 'TRANSFERENCIAS BANCARIAS'),
(18, 'AJUSTES DE CIERRE'),
(19, 'SALDOS INICIALES'),
(20, 'FIRMA'),
(21, 'FUNCIONAMIENTO'),
(22, 'INVERSION'),
(23, 'TERCEROS'),
(24, 'NOMINA B.O.D'),
(25, 'ASIENTOS VARIOS'),
(26, 'PROYECTOS SALUD'),
(27, 'BCO. DE VENEZUELA NOMINA'),
(28, 'CUENTAS POR PAGAR'),
(29, 'COMPROBANTE TITIN'),
(30, 'COMPROBANTE NUEVO'),
(31, 'AJUSTES Y RECLASIFICACIONES'),
(32, 'FIDEICOMISOS ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconter`
--

CREATE TABLE IF NOT EXISTS `cwconter` (
  `Codtipo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Descrip` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `Rif` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `Nit` varchar(15) COLLATE utf8_spanish_ci DEFAULT NULL,
  `grupo` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`Codtipo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconusu`
--

CREATE TABLE IF NOT EXISTS `cwconusu` (
  `RecNo` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `Codusu` varchar(46) COLLATE utf8_spanish_ci NOT NULL,
  `Nomusu` varchar(40) COLLATE utf8_spanish_ci NOT NULL COMMENT 'Es el nombre',
  `Admin` int(11) NOT NULL DEFAULT '0',
  `Claveusu` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `Nivelusu` int(11) NOT NULL DEFAULT '0',
  `Cractas` int(11) NOT NULL DEFAULT '0',
  `Contabiliza` int(11) NOT NULL DEFAULT '0',
  `Anula` int(11) NOT NULL DEFAULT '0',
  `Repctas` int(11) NOT NULL DEFAULT '0',
  `Repcomp` int(11) NOT NULL DEFAULT '0',
  `Repanali` int(11) NOT NULL DEFAULT '0',
  `Repbalcom` int(11) NOT NULL DEFAULT '0',
  `Repbalgen` int(11) NOT NULL DEFAULT '0',
  `Repganper` int(11) NOT NULL DEFAULT '0',
  `Repotros` int(11) NOT NULL DEFAULT '0',
  `Presupuesto` int(11) NOT NULL DEFAULT '0',
  `Conciliacion` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`RecNo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Usuarios' AUTO_INCREMENT=38 ;

--
-- Volcado de datos para la tabla `cwconusu`
--

INSERT INTO `cwconusu` (`RecNo`, `Codusu`, `Nomusu`, `Admin`, `Claveusu`, `Nivelusu`, `Cractas`, `Contabiliza`, `Anula`, `Repctas`, `Repcomp`, `Repanali`, `Repbalcom`, `Repbalgen`, `Repganper`, `Repotros`, `Presupuesto`, `Conciliacion`) VALUES
(37, 'asys', 'ASYS, C.A.', 1, 'f63f47a5d94dad9fb559c8b3dd1185874b15352e7187820b596ceb42e5759f83', 9, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1);

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `A` int(4) DEFAULT NULL,
  `B` varchar(63) DEFAULT NULL,
  `C` varchar(14) DEFAULT NULL,
  `D` varchar(10) DEFAULT NULL,
  `E` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reporte`
--

CREATE TABLE IF NOT EXISTS `reporte` (
  `A` int(4) DEFAULT NULL,
  `B` varchar(57) DEFAULT NULL,
  `C` varchar(15) DEFAULT NULL,
  `D` varchar(12) DEFAULT NULL,
  `E` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cwcondco`
--
ALTER TABLE `cwcondco`
  ADD CONSTRAINT `cwcondco_ibfk_1` FOREIGN KEY (`Numcom`) REFERENCES `cwconhco` (`Numcom`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
