-- phpMyAdmin SQL Dump
-- version 3.1.2deb1ubuntu0.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 28-01-2010 a las 14:36:39
-- Versión del servidor: 5.0.75
-- Versión de PHP: 5.2.6-3ubuntu4.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `nominax`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwconcue`
--

CREATE TABLE IF NOT EXISTS `cwconcue` (
  `Cuenta` varchar(50) collate utf8_spanish_ci NOT NULL,
  `Nivel` int(11) NOT NULL default '0',
  `Tipo` char(2) collate utf8_spanish_ci NOT NULL,
  `Descrip` varchar(250) collate utf8_spanish_ci NOT NULL,
  `Bancos` int(11) NOT NULL default '0',
  `MonPre` float NOT NULL default '0',
  `MonModif` float NOT NULL default '0',
  `FechaNuevo` date NOT NULL default '0000-00-00',
  `CtaNueva` int(11) NOT NULL default '0',
  `Auxunico` varchar(4) collate utf8_spanish_ci NOT NULL,
  `Monetaria` int(11) NOT NULL default '0',
  `Ctaajuste` varchar(10) collate utf8_spanish_ci NOT NULL,
  `Marca` int(11) NOT NULL default '0',
  `MonPreu` float NOT NULL default '0',
  `MonModify` float NOT NULL default '0',
  `Ccostos` int(11) NOT NULL default '0',
  `Terceros` int(11) NOT NULL default '0',
  `Cuentalt` varchar(10) collate utf8_spanish_ci NOT NULL,
  `Descripalt` varchar(20) collate utf8_spanish_ci NOT NULL,
  `Fiscaltipo` int(11) NOT NULL default '0',
  `Tipocosto` int(11) NOT NULL default '0',
  PRIMARY KEY  (`Cuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Maestro en Cuentas Contables';

--
-- Volcar la base de datos para la tabla `cwconcue`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwprecue`
--

CREATE TABLE IF NOT EXISTS `cwprecue` (
  `CodCue` varchar(15) collate utf8_spanish_ci NOT NULL,
  `Denominacion` text collate utf8_spanish_ci NOT NULL,
  `Tipocta` int(10) unsigned NOT NULL default '0',
  `Tipopuc` char(3) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`CodCue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `cwprecue`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomacumulados`
--

CREATE TABLE IF NOT EXISTS `nomacumulados` (
  `cod_tac` varchar(6) collate utf8_spanish_ci NOT NULL,
  `des_tac` varchar(60) collate utf8_spanish_ci NOT NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`cod_tac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomacumulados`
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
  `cod_tac` varchar(7) character set latin1 NOT NULL,
  `montototal` float(17,2) NOT NULL,
  `montobase` float(17,2) NOT NULL,
  `refer` float(17,2) NOT NULL,
  `montoresul` float(17,2) NOT NULL,
  `codnom` int(5) NOT NULL,
  `tipnom` int(11) NOT NULL,
  `operacion` varchar(2) character set latin1 NOT NULL,
  `codcon` int(5) NOT NULL,
  `unidad` varchar(11) character set latin1 NOT NULL,
  `tipcon` int(2) NOT NULL,
  `sfecha` varchar(9) character set latin1 NOT NULL,
  `montootros` float(17,2) NOT NULL,
  `ee` int(2) NOT NULL,
  `numcontrol` int(6) NOT NULL,
  `codsuc` int(6) NOT NULL,
  `coddir` int(6) NOT NULL,
  `codvp` int(6) NOT NULL,
  `codger` int(6) NOT NULL,
  `coddep` int(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomacumulados_det`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomaumentos`
--

CREATE TABLE IF NOT EXISTS `nomaumentos` (
  `codlogro` int(11) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codlogro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomaumentos`
--

INSERT INTO `nomaumentos` (`codlogro`, `descrip`, `ee`) VALUES
(1, 'Aumento de Sueldo o Salario', 0),
(2, 'Meritos', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomaumentos_det`
--

CREATE TABLE IF NOT EXISTS `nomaumentos_det` (
  `cod_aumento` int(6) NOT NULL auto_increment,
  `tipo` varchar(10) character set utf8 collate utf8_spanish_ci NOT NULL,
  `estatus` varchar(9) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_aplica` date NOT NULL,
  `monto` decimal(6,0) NOT NULL,
  `cod_nomina` varchar(2) NOT NULL,
  `cod_categoria` varchar(2) NOT NULL,
  `cod_cargo` varchar(12) character set utf8 collate utf8_spanish_ci NOT NULL,
  `ficha` int(6) default NULL,
  `usuario` varchar(30) character set utf8 collate utf8_spanish_ci NOT NULL,
  `descripcion` text character set utf8 collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`cod_aumento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COMMENT='registros de los aumentos realizados o a realizar al persona' AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `nomaumentos_det`
--

INSERT INTO `nomaumentos_det` (`cod_aumento`, `tipo`, `estatus`, `fecha`, `fecha_aplica`, `monto`, `cod_nomina`, `cod_categoria`, `cod_cargo`, `ficha`, `usuario`, `descripcion`) VALUES
(1, 'Monto', 'Ejecutado', '2009-09-09', '2009-09-01', '18', '4', '2', '58', 0, 'NORA EULOGIA NATERA CALERO', 'INCREMENTO SALARIO MINIMO'),
(2, 'Monto', 'Ejecutado', '2010-01-13', '2010-01-01', '180', '4', '', '59', 0, 'NORA EULOGIA NATERA CALERO', 'INCREMENTO DE SUELDO APROBADO EN PRESUPUESTO 2010'),
(3, 'Monto', 'Ejecutado', '2010-01-13', '2010-01-01', '213', '4', '', '58', 0, 'NORA EULOGIA NATERA CALERO', 'INCREMENTO DE SUELDO APROBADO EN PRESUPUESTO 2010');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombancos`
--

CREATE TABLE IF NOT EXISTS `nombancos` (
  `cod_ban` int(11) NOT NULL,
  `des_ban` varchar(60) collate utf8_spanish_ci NOT NULL,
  `suc_ban` varchar(20) collate utf8_spanish_ci default NULL,
  `direccion` varchar(60) collate utf8_spanish_ci default NULL,
  `gerente` varchar(40) collate utf8_spanish_ci default NULL,
  `cuentacob` varchar(22) collate utf8_spanish_ci default NULL,
  `tipocuenta` varchar(1) collate utf8_spanish_ci default NULL,
  `textoinicial` mediumtext collate utf8_spanish_ci,
  `textofinal` mediumtext collate utf8_spanish_ci,
  `markar` tinyint(4) default NULL,
  `cod_gban` int(11) NOT NULL,
  `ctacon` varchar(50) collate utf8_spanish_ci default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`cod_ban`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nombancos`
--

INSERT INTO `nombancos` (`cod_ban`, `des_ban`, `suc_ban`, `direccion`, `gerente`, `cuentacob`, `tipocuenta`, `textoinicial`, `textofinal`, `markar`, `cod_gban`, `ctacon`, `ee`) VALUES
(1, 'BOD', '', '', '', '', '', '', '', 0, 1, '', 0),
(2, 'BANESCO', '', '', '', '', '', '', '', 0, 1, '', 0),
(3, 'VENEZUELA', '', '', '', '', 'C', '', '', 0, 1, '', 0),
(4, 'FONDO COMUN', '', '', '', '', '', '', '', 0, 1, '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nombaremos`
--

CREATE TABLE IF NOT EXISTS `nombaremos` (
  `codigo` int(11) NOT NULL auto_increment,
  `descripcion` varchar(250) collate utf8_spanish_ci NOT NULL,
  `tipodato` varchar(20) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `nombaremos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcalendarios_empresa`
--

CREATE TABLE IF NOT EXISTS `nomcalendarios_empresa` (
  `cod_empresa` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `dia_fiesta` int(11) NOT NULL,
  `descripcion_dia_fiesta` varchar(200) collate utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomcalendarios_empresa`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcalendarios_personal`
--

CREATE TABLE IF NOT EXISTS `nomcalendarios_personal` (
  `cod_empresa` int(11) NOT NULL,
  `ficha` varchar(10) collate utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `dia_fiesta` int(11) NOT NULL,
  `descripcion_dia_fiesta` varchar(200) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`ficha`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomcalendarios_personal`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcalendarios_tiposnomina`
--

CREATE TABLE IF NOT EXISTS `nomcalendarios_tiposnomina` (
  `cod_empresa` int(11) NOT NULL,
  `cod_tiponomina` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `dia_fiesta` int(11) NOT NULL,
  `descripcion_dia_fiesta` varchar(200) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`cod_tiponomina`,`fecha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomcalendarios_tiposnomina`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcampos_adicionales`
--

CREATE TABLE IF NOT EXISTS `nomcampos_adicionales` (
  `archivo` varchar(15) collate utf8_spanish_ci default NULL,
  `id` int(11) NOT NULL,
  `descrip` varchar(40) collate utf8_spanish_ci default NULL,
  `etiqueta` varchar(40) collate utf8_spanish_ci default NULL,
  `tipo` varchar(1) collate utf8_spanish_ci default NULL,
  `codorgh` varchar(10) collate utf8_spanish_ci default NULL,
  `valdefecto1` varchar(80) collate utf8_spanish_ci default NULL,
  `particular` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  `busca` tinyint(1) default NULL,
  `tipocamposadic` tinyint(4) default NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomcampos_adicionales`
--

INSERT INTO `nomcampos_adicionales` (`archivo`, `id`, `descrip`, `etiqueta`, `tipo`, `codorgh`, `valdefecto1`, `particular`, `ee`, `busca`, `tipocamposadic`) VALUES
('nompersonal', 1, 'SEGURO SOCIAL OBLIGATORIO', 'SSO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 2, 'REGIMEN PRESTACIONAL DE EMPLEO', 'REGIMEN PRESTACIONAL DE EMPLEO', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 3, 'REG. PREST. DE VIVIENDA Y HAB.', 'REG. PREST. DE VIVIENDA Y HAB.', 'A', NULL, 'SI', 0, 0, 0, 3),
('nompersonal', 4, 'FONDO DE PENSION Y JUBILACION', 'F.P.J.', 'A', NULL, 'NO', 0, 0, 0, 3),
('nompersonal', 5, 'PORCENTAJE I.S.R.L.', 'PORCENTAJE I.S.R.L.', 'N', NULL, '0', 0, 0, 0, 3),
('nompersonal', 6, 'PRIMA POR ANTIGUEDAD', 'PRIMA POR ANTIGUEDAD', 'N', NULL, '0', 0, 0, 0, 3),
('nompersonal', 7, 'COMPENSACION SALARIAL', 'COMPENSACION SALARIAL', 'N', NULL, '0', 0, 0, 0, 3),
('nompersonal', 8, 'GRADO', 'GRADO', 'N', NULL, '0', 0, 0, 0, 3),
('nompersonal', 9, 'PASO', 'PASO', 'N', NULL, '0', 0, 0, 0, 3),
('nompersonal', 10, 'BONO POST VACACIONAL', 'BONO POST VACACIONAL', 'A', NULL, 'NO', 0, 0, 0, 3),
('nompersonal', 11, 'TALLA CAMISA', 'TALLA CAMISA', 'A', NULL, '', 0, 0, 0, 3),
('nompersonal', 12, 'TALLA PANTALON', 'TALLA PANTALON', 'A', NULL, '', 0, 0, 0, 3),
('nompersonal', 13, 'TALLA ZAPATOS', 'TALLA ZAPATOS', 'A', NULL, '', 0, 0, 0, 3),
('nompersonal', 14, 'CAJA DE AHORRO', 'CAJA DE AHORRO', 'A', NULL, 'NO', 0, 0, 0, 3),
('nompersonal', 15, 'VACACIONES', 'VACACIONES', 'A', NULL, 'NO', 0, 0, 0, 3),
('nompersonal', 16, 'PRESTAMO CAJA DE AHORRO', 'PRESTAMO CAJA DE AHORRO', 'N', NULL, '0.0', 0, 0, 1, 3),
('nompersonal', 17, 'ANTIGUEDAD DIAS', 'ANTIGUEDAD DIAS', 'N', NULL, '0', 0, 0, 0, 3),
('nompersonal', 18, 'TALLA BATA', 'TALLA BATA', 'A', NULL, '', 0, 0, 0, 3),
('nompersonal', 19, 'TALLA MONO', 'TALLA MONO', 'A', NULL, '', 0, 0, 0, 3),
('nompersonal', 20, 'PRIMA POR MERITO', 'PRIMA POR MERITO', 'N', NULL, '', 0, 0, 0, 3),
('nompersonal', 21, 'COMISION DE SERV.', 'COMISION DE SERV.', 'N', NULL, '', 0, 0, 0, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcampos_adic_personal`
--

CREATE TABLE IF NOT EXISTS `nomcampos_adic_personal` (
  `ficha` varchar(10) collate utf8_spanish_ci NOT NULL,
  `id` int(11) NOT NULL,
  `valor` varchar(80) collate utf8_spanish_ci default NULL,
  `mascara` varchar(9) collate utf8_spanish_ci default NULL,
  `tipo` varchar(1) collate utf8_spanish_ci default NULL,
  `codorgd` varchar(10) collate utf8_spanish_ci default NULL,
  `codorgh` varchar(10) collate utf8_spanish_ci default NULL,
  `ee` tinyint(4) default NULL,
  `tiponom` int(11) NOT NULL,
  PRIMARY KEY  (`ficha`,`id`,`tiponom`),
  KEY `fc_idx_133` (`codorgd`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomcampos_adic_personal`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcargos`
--

CREATE TABLE IF NOT EXISTS `nomcargos` (
  `cod_car` varchar(12) collate utf8_spanish_ci NOT NULL,
  `des_car` varchar(100) collate utf8_spanish_ci NOT NULL,
  `grado` varchar(2) collate utf8_spanish_ci NOT NULL,
  `perfil` mediumtext collate utf8_spanish_ci,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`cod_car`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomcargos`
--

INSERT INTO `nomcargos` (`cod_car`, `des_car`, `grado`, `perfil`, `markar`, `ee`) VALUES
('01', 'PRESIDENTE EJECUTIVO', '1', NULL, NULL, NULL),
('02', 'ASIST.ADM.III', '', NULL, NULL, NULL),
('03', 'ASIST. ADMINISTRAT', '', NULL, NULL, NULL),
('04', 'AUDITOR III', '', NULL, NULL, NULL),
('05', 'ANALISTA AUDITORIA', '', NULL, NULL, NULL),
('06', 'ASIST EJECUTIVO II', '', NULL, NULL, NULL),
('07', 'ASIST. ADMINIST.IV', '', NULL, NULL, NULL),
('08', 'ASIST.TRANSP. III', '', NULL, NULL, NULL),
('09', 'JEFE COMUNITARIO', '', NULL, NULL, NULL),
('10', 'ASIST.ADMINIST. V                       ', '', NULL, NULL, NULL),
('11', 'ASIST.TRANSPORTE I', '', NULL, NULL, NULL),
('12', 'DIR. GRAL.ADMINISTRACION', '', NULL, NULL, NULL),
('13', 'ANALIST. PPTO III                       ', '', NULL, NULL, NULL),
('14', 'CONTADOR I', '', NULL, NULL, NULL),
('15', 'DIR.GRAL.PROG.PROY.PART COMUNIT.        ', '', NULL, NULL, NULL),
('16', 'COORD.PROG. SOCIAL', '', NULL, NULL, NULL),
('17', 'COORD.PROY.COMUNIT', '', NULL, NULL, NULL),
('19', 'COORD.PART.COMUNIT', '', NULL, NULL, NULL),
('20', 'ASIST.PROG.SOCIALES', '', NULL, NULL, NULL),
('21', 'DIR.GRL.PTC.INT.CM                      ', '', NULL, NULL, NULL),
('22', 'COORD.CONT.FINANCIERO                   ', '', NULL, NULL, NULL),
('23', 'COORD.CASA JUSTIC.', '', NULL, NULL, NULL),
('24', 'JEFE DE CTROL DE GESTION                ', '', NULL, NULL, NULL),
('25', 'ANALISTA DE PERSONAL II                 ', '', NULL, NULL, NULL),
('26', 'ASIST. ADMINISTRATIVO II                ', '', NULL, NULL, NULL),
('27', 'AUXILIAR ADMINISTRATIVO', '', NULL, NULL, NULL),
('28', 'RECEPCIONISTA                           ', '', NULL, NULL, NULL),
('29', 'MENSAJERO                               ', '', NULL, NULL, NULL),
('30', 'ESP. EN  AREA DE INFORMATICA', '', NULL, NULL, NULL),
('31', 'ESP. EN  AREA DE PROG. SOCIAL', '', NULL, NULL, NULL),
('32', 'ESP. EN  AREA DE PRESUPUESTO', '', NULL, NULL, NULL),
('33', 'CHOFER', '', NULL, NULL, NULL),
('34', 'DIRECTOR  GENERAL DE DESPACHO', '', NULL, NULL, NULL),
('35', 'JEFE DE INFORMATICA', '', NULL, NULL, NULL),
('36', 'DIR. CONTROL DE GESTION', '', NULL, NULL, NULL),
('37', 'DIRECTOR DE CONSULTORIA JURIDICA', '', NULL, NULL, NULL),
('38', 'ESP.  EN  AREA CONTABLE', '', NULL, NULL, NULL),
('39', 'ESPECIALISTA EN RR.HH', '', NULL, NULL, NULL),
('40', 'ESP.EN SOPORTE TECN. DE HARDWARE', '', NULL, NULL, NULL),
('41', 'DIRECTOR DE AUDITORIA INTERNA', '', NULL, NULL, NULL),
('42', 'DIRECTOR GRAL. DE PREFECTURAS', '', NULL, NULL, NULL),
('44', 'COORD. DE TRANSPORTE', '', NULL, NULL, NULL),
('45', 'DIR. GRAL.CASA DEL VECINO', '', NULL, NULL, NULL),
('46', 'DIR. GENERAL DE APOYO                   ', '', NULL, NULL, NULL),
('47', 'ASISTENTE AL DIRECTOR                   ', '', NULL, NULL, NULL),
('48', 'DIRECTOR DE INFORMATICA                 ', '', NULL, NULL, NULL),
('49', 'JEFE DE RR.HH.', '', NULL, NULL, NULL),
('50', 'ANALISTA CTROL.FINANCIERO III', '', NULL, NULL, NULL),
('51', 'COORD.DE PRESUPUESTO                    ', '', NULL, NULL, NULL),
('52', 'CONTADOR V', '', NULL, NULL, NULL),
('53', 'ESPECIALISTA  JURIDICO                  ', '', NULL, NULL, NULL),
('54', 'JEFE DE AREA COMUNITARIA', '', NULL, NULL, NULL),
('55', 'COORD.DE ORIENT.VECINAL', '', NULL, NULL, NULL),
('56', 'JEFE DE PREFECTURA', '', NULL, NULL, NULL),
('57', 'PREFECTO COMUNITARIO', '', NULL, NULL, NULL),
('58', 'ORIENTADOR VECINAL', '', NULL, NULL, NULL),
('59', 'INFORMADOR COMUNITARIO', '', NULL, NULL, NULL),
('60', 'DIRECTOR DE ATENCION VECINAL', '', NULL, NULL, NULL),
('61', 'ESPECIALISTA EN FINANZAS                ', '', NULL, NULL, NULL),
('62', 'SUPERVISOR DE ALMACEN II                ', '', NULL, NULL, NULL),
('63', 'COORDINADOR DE AREA', '', '', 0, 0),
('65', 'DIRECTOR GENERAL DE DESARROLLO COMUNAL', '', '', 0, 0),
('66', 'TECNICO DE REPARACION Y MANTENIMIENTO', '', '', 0, 0),
('67', 'DIRECTOR GENERAL DE CONSULTORIA JURIDICA', '', '', 0, 0),
('68', 'ESP. DE DESARROLLO COMUNAL', '', '', 0, 0),
('69', 'TEC. DE REPARACION Y MANTENIMIENTO', '', '', 0, 0),
('70', 'ESPECIALISTA EN PRESUPUESTO', '', '', 0, 0),
('71', 'ESPECIALISTA EN CONTABILIDAD', '', '', 0, 0),
('72', 'AUXILIAR CONTABLE', '', '', 0, 0),
('73', 'JEFE DE DESPACHO', '26', '', 0, 0),
('74', 'JEFE DE ADMINISTRACION DE PERSONAL', '26', '', 0, 0),
('75', 'ABOGADO I', '26', '', 0, 0),
('76', 'JEFE CONSULTORIA JURIDICA', '', '', 0, 0),
('77', 'ANALISTA DE PROCESAMIENTO DE DATOS III', '26', '', 0, 0),
('78', 'COORDINADOR DE INFORMATICA', '26', '', 0, 0),
('79', 'TECNICO EN REPARACION Y MANTENIMIENTO I', '26', '', 0, 0),
('80', 'INSPECTOR DE OBRAS DE ING. I', '26', '', 0, 0),
('81', 'ASISTENTE EJECUTIVO I', '26', '', 0, 0),
('82', 'COORDINADOR ADMINISTRATIVO', '', '', 0, 0),
('85', 'DIRECTOR DE SERVICIOS GENERALES', '26', '', 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomcategorias`
--

CREATE TABLE IF NOT EXISTS `nomcategorias` (
  `codorg` int(10) unsigned NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `gr` varchar(6) collate utf8_spanish_ci default NULL,
  `ee` tinyint(4) default NULL,
  `ocupacion` varchar(1) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_22` (`descrip`),
  KEY `fc_idx_23` (`gr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomcategorias`
--

INSERT INTO `nomcategorias` (`codorg`, `descrip`, `gr`, `ee`, `ocupacion`) VALUES
(1, 'OBREROS', '', 0, ''),
(2, 'ADMINISTRATIVOS', '', 0, ''),
(3, 'TECNICOS', '', 0, ''),
(4, 'PROFESIONALES', '', 0, ''),
(5, 'NO CLASIFICADOS', '', 0, ''),
(6, 'TECNICOS / PROFESIONALES', '', 0, ''),
(7, 'DIRECTIVO', '', 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos`
--

CREATE TABLE IF NOT EXISTS `nomconceptos` (
  `codcon` int(11) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci default NULL,
  `tipcon` varchar(1) collate utf8_spanish_ci default NULL,
  `unidad` varchar(1) collate utf8_spanish_ci default NULL,
  `ctacon` varchar(22) collate utf8_spanish_ci default NULL,
  `contractual` varchar(1) collate utf8_spanish_ci default NULL,
  `impdet` varchar(1) collate utf8_spanish_ci default NULL,
  `proratea` tinyint(1) default NULL,
  `usaalter` varchar(1) collate utf8_spanish_ci default NULL,
  `descalter` mediumtext collate utf8_spanish_ci,
  `formula` mediumtext collate utf8_spanish_ci,
  `modifdef` tinyint(1) default NULL,
  `markar` tinyint(4) default NULL,
  `tercero` tinyint(4) default NULL,
  `ccosto` tinyint(4) default NULL,
  `codccosto` int(11) default NULL,
  `debcre` varchar(1) collate utf8_spanish_ci default NULL,
  `bonificable` tinyint(1) default NULL,
  `htiempo` tinyint(1) default NULL,
  `valdefecto` decimal(17,2) default NULL,
  `con_cu_cc` tinyint(4) default NULL,
  `con_mcun_cc` tinyint(4) default NULL,
  `con_mcuc_cc` tinyint(4) default NULL,
  `con_cu_mccn` tinyint(4) default NULL,
  `con_cu_mccc` tinyint(4) default NULL,
  `con_mcun_mccn` tinyint(4) default NULL,
  `con_mcuc_mccc` tinyint(4) default NULL,
  `con_mcun_mccc` tinyint(4) default NULL,
  `con_mcuc_mccn` tinyint(4) default NULL,
  `nivelescuenta` tinyint(4) default NULL,
  `nivelesccosto` tinyint(4) default NULL,
  `semodifica` tinyint(1) default NULL,
  `verref` tinyint(1) default NULL,
  `vermonto` tinyint(1) default NULL,
  `particular` tinyint(4) default NULL,
  `montocero` tinyint(1) default NULL,
  `ee` tinyint(4) default NULL,
  `fmodif` tinyint(1) default NULL,
  `aplicaexcel` tinyint(4) default NULL,
  `descripexcel` varchar(60) collate utf8_spanish_ci default NULL,
  `ctacon1` varchar(22) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`codcon`),
  KEY `fc_idx_53` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomconceptos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos_acumulados`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_acumulados` (
  `codcon` int(11) NOT NULL,
  `cod_tac` varchar(6) collate utf8_spanish_ci NOT NULL,
  `operacion` varchar(1) collate utf8_spanish_ci default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codcon`,`cod_tac`),
  KEY `fc_idx_60` (`cod_tac`,`codcon`),
  KEY `fc_idx_61` (`codcon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomconceptos_acumulados`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos_ctager`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_ctager` (
  `codcon` int(5) NOT NULL,
  `codnivel4` int(7) NOT NULL,
  `ctacon` varchar(50) NOT NULL,
  `tipcon` varchar(1) NOT NULL,
  PRIMARY KEY  (`codcon`,`codnivel4`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `nomconceptos_ctager`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos_frecuencias`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_frecuencias` (
  `codcon` int(11) NOT NULL,
  `codfre` int(11) NOT NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codcon`,`codfre`),
  UNIQUE KEY `fc_idx_43` (`codfre`,`codcon`),
  KEY `fc_idx_44` (`codcon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomconceptos_frecuencias`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos_situaciones`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_situaciones` (
  `codcon` int(11) NOT NULL,
  `estado` varchar(30) collate utf8_spanish_ci NOT NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codcon`,`estado`),
  KEY `fc_idx_40` (`codcon`),
  KEY `estado` (`estado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomconceptos_situaciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomconceptos_tiponomina`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_tiponomina` (
  `codcon` int(11) NOT NULL,
  `codtip` int(11) NOT NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codcon`,`codtip`),
  UNIQUE KEY `fc_idx_64` (`codtip`,`codcon`),
  KEY `fc_idx_65` (`codcon`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci ROW_FORMAT=DYNAMIC;

--
-- Volcar la base de datos para la tabla `nomconceptos_tiponomina`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomdesempeno`
--

CREATE TABLE IF NOT EXISTS `nomdesempeno` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(60) character set latin1 NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomdesempeno`
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
  `cedula` varchar(15) collate utf8_spanish_ci NOT NULL,
  `apellidos` varchar(50) collate utf8_spanish_ci NOT NULL,
  `nombres` varchar(50) collate utf8_spanish_ci NOT NULL,
  `sexo` varchar(15) collate utf8_spanish_ci NOT NULL,
  `fecnac` date NOT NULL,
  `lugarnac` varchar(20) collate utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) collate utf8_spanish_ci NOT NULL,
  `email` varchar(50) collate utf8_spanish_ci NOT NULL,
  `cod_profesion` int(11) NOT NULL,
  `grado_instruccion` int(11) NOT NULL,
  `area_desempeno` int(11) NOT NULL,
  `anios_exp` int(11) NOT NULL,
  `observacion` varchar(200) collate utf8_spanish_ci NOT NULL,
  `fecha_reg` date NOT NULL,
  `direccion` varchar(100) collate utf8_spanish_ci NOT NULL,
  `foto` varchar(50) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`cedula`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomelegibles`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomempresa`
--

CREATE TABLE IF NOT EXISTS `nomempresa` (
  `cod_emp` int(11) NOT NULL,
  `nom_emp` varchar(250) collate utf8_spanish_ci default NULL,
  `dir_emp` varchar(250) collate utf8_spanish_ci default NULL,
  `ciu_emp` varchar(25) collate utf8_spanish_ci default NULL,
  `edo_emp` varchar(25) collate utf8_spanish_ci default NULL,
  `zon_emp` varchar(12) collate utf8_spanish_ci default NULL,
  `tel_emp` varchar(25) collate utf8_spanish_ci default NULL,
  `rif` varchar(20) collate utf8_spanish_ci default NULL,
  `nit` varchar(20) collate utf8_spanish_ci default NULL,
  `pre_sid` varchar(40) collate utf8_spanish_ci default NULL,
  `ger_rrhh` varchar(40) collate utf8_spanish_ci default NULL,
  `edadmax` int(11) default NULL,
  `amonemax` int(11) default NULL,
  `redontip` tinyint(4) default NULL,
  `unidadtrib` decimal(17,2) default NULL,
  `tipopres` tinyint(4) default NULL,
  `munidadtrib` decimal(17,2) default NULL,
  `diasbonvac` smallint(6) default NULL,
  `diasutilidad` smallint(6) default NULL,
  `nivel1` tinyint(1) default NULL,
  `nivel2` tinyint(1) default NULL,
  `nivel3` tinyint(1) default NULL,
  `nivel4` tinyint(1) default NULL,
  `nivel5` tinyint(1) default NULL,
  `entfederal` varchar(10) collate utf8_spanish_ci default NULL,
  `distrito` varchar(10) collate utf8_spanish_ci default NULL,
  `municipio` varchar(10) collate utf8_spanish_ci default NULL,
  `codacteco` varchar(10) collate utf8_spanish_ci default NULL,
  `nomacteco` varchar(40) collate utf8_spanish_ci default NULL,
  `fecfunda` varchar(40) collate utf8_spanish_ci default NULL,
  `capital` varchar(20) collate utf8_spanish_ci default NULL,
  `degravunico` decimal(17,2) default NULL,
  `mescambiari` varchar(20) collate utf8_spanish_ci default NULL,
  `utcargafam` decimal(17,2) default NULL,
  `monsalmin` decimal(17,2) default NULL,
  `codcon` int(11) default NULL,
  `codcons` int(11) default NULL,
  `demo` tinyint(4) default NULL,
  `rutacontab` varchar(254) collate utf8_spanish_ci default NULL,
  `rutadatoscontab` varchar(254) collate utf8_spanish_ci default NULL,
  `serial` varchar(59) collate utf8_spanish_ci default NULL,
  `ctacheque` varchar(22) collate utf8_spanish_ci default NULL,
  `ctaefectivo` varchar(22) collate utf8_spanish_ci default NULL,
  `nrocompro` int(11) default NULL,
  `contratos` tinyint(1) default NULL,
  `nomniv1` varchar(20) collate utf8_spanish_ci default NULL,
  `nomniv2` varchar(20) collate utf8_spanish_ci default NULL,
  `nomniv3` varchar(20) collate utf8_spanish_ci default NULL,
  `nomniv4` varchar(20) collate utf8_spanish_ci default NULL,
  `nomniv5` varchar(20) collate utf8_spanish_ci default NULL,
  `recibovac` text collate utf8_spanish_ci,
  `reciboliq` text collate utf8_spanish_ci,
  `ee` tinyint(4) default NULL,
  `fax_emp` varchar(20) collate utf8_spanish_ci default NULL,
  `num_emp` int(11) default NULL,
  `num_est` int(11) default NULL,
  `num_sso` varchar(20) collate utf8_spanish_ci default NULL,
  `estado` varchar(20) collate utf8_spanish_ci default NULL,
  `parroquia` varchar(20) collate utf8_spanish_ci default NULL,
  `localidad` varchar(20) collate utf8_spanish_ci default NULL,
  `e_mail` varchar(30) collate utf8_spanish_ci default NULL,
  `cod_entfed` varchar(2) collate utf8_spanish_ci default NULL,
  `cod_distri` varchar(2) collate utf8_spanish_ci default NULL,
  `cod_munici` varchar(2) collate utf8_spanish_ci default NULL,
  `cod_sector` varchar(1) collate utf8_spanish_ci default NULL,
  `cod_acteco` varchar(4) collate utf8_spanish_ci default NULL,
  `cod_orden` varchar(4) collate utf8_spanish_ci default NULL,
  `utilidad` decimal(17,2) default NULL,
  `reportdiff` tinyint(4) default NULL,
  `porcdiff` decimal(6,2) default NULL,
  `netoneg` tinyint(1) default NULL,
  `impresora` mediumtext collate utf8_spanish_ci,
  `selector` tinyint(4) default NULL,
  `nosueldocero` tinyint(1) default NULL,
  `mediajornada` tinyint(1) default NULL,
  `nuevassituaciones` tinyint(1) default NULL,
  `tipoficha` tinyint(4) NOT NULL,
  `conprestamos` int(11) default NULL,
  `confamiliares` int(11) default NULL,
  `conficha` int(11) default NULL,
  `nomcampo1` varchar(20) collate utf8_spanish_ci default NULL,
  `nomcampo2` varchar(20) collate utf8_spanish_ci default NULL,
  `nomcampo3` varchar(20) collate utf8_spanish_ci default NULL,
  `recibonom` varchar(120) collate utf8_spanish_ci default NULL,
  `tipcontab` tinyint(4) NOT NULL,
  `contadorbanesco` int(11) NOT NULL,
  `ctapatronales` varchar(22) collate utf8_spanish_ci default NULL,
  `recibopago` text collate utf8_spanish_ci NOT NULL,
  `nivel6` tinyint(1) NOT NULL,
  `nivel7` tinyint(1) NOT NULL,
  `nomniv6` varchar(20) collate utf8_spanish_ci NOT NULL,
  `nomniv7` varchar(20) collate utf8_spanish_ci NOT NULL,
  `imagen_izq` varchar(100) collate utf8_spanish_ci NOT NULL,
  `imagen_der` varchar(100) collate utf8_spanish_ci NOT NULL,
  `cod_material` varchar(20) collate utf8_spanish_ci default NULL,
  `unidad` varchar(6) collate utf8_spanish_ci default NULL,
  `ccosto` varchar(6) collate utf8_spanish_ci default NULL,
  `proveedor` varchar(6) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`cod_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomempresa`
--

INSERT INTO `nomempresa` (`cod_emp`, `nom_emp`, `dir_emp`, `ciu_emp`, `edo_emp`, `zon_emp`, `tel_emp`, `rif`, `nit`, `pre_sid`, `ger_rrhh`, `edadmax`, `amonemax`, `redontip`, `unidadtrib`, `tipopres`, `munidadtrib`, `diasbonvac`, `diasutilidad`, `nivel1`, `nivel2`, `nivel3`, `nivel4`, `nivel5`, `entfederal`, `distrito`, `municipio`, `codacteco`, `nomacteco`, `fecfunda`, `capital`, `degravunico`, `mescambiari`, `utcargafam`, `monsalmin`, `codcon`, `codcons`, `demo`, `rutacontab`, `rutadatoscontab`, `serial`, `ctacheque`, `ctaefectivo`, `nrocompro`, `contratos`, `nomniv1`, `nomniv2`, `nomniv3`, `nomniv4`, `nomniv5`, `recibovac`, `reciboliq`, `ee`, `fax_emp`, `num_emp`, `num_est`, `num_sso`, `estado`, `parroquia`, `localidad`, `e_mail`, `cod_entfed`, `cod_distri`, `cod_munici`, `cod_sector`, `cod_acteco`, `cod_orden`, `utilidad`, `reportdiff`, `porcdiff`, `netoneg`, `impresora`, `selector`, `nosueldocero`, `mediajornada`, `nuevassituaciones`, `tipoficha`, `conprestamos`, `confamiliares`, `conficha`, `nomcampo1`, `nomcampo2`, `nomcampo3`, `recibonom`, `tipcontab`, `contadorbanesco`, `ctapatronales`, `recibopago`, `nivel6`, `nivel7`, `nomniv6`, `nomniv7`, `imagen_izq`, `imagen_der`, `cod_material`, `unidad`, `ccosto`, `proveedor`) VALUES ('1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, '', '', '', '', '', '', '', NULL, NULL, NULL, NULL);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomexpediente`
--

CREATE TABLE IF NOT EXISTS `nomexpediente` (
  `cod_expediente_det` int(8) NOT NULL auto_increment,
  `cedula` varchar(10) collate utf8_spanish_ci NOT NULL,
  `tipo_registro` varchar(60) collate utf8_spanish_ci NOT NULL,
  `tipo_tiporegistro` varchar(60) collate utf8_spanish_ci NOT NULL,
  `descripcion` text collate utf8_spanish_ci NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `monto_nuevo` decimal(10,2) NOT NULL,
  `dias` int(3) NOT NULL,
  `fecha_retorno` date NOT NULL,
  `fecha_salida` date NOT NULL,
  `cod_cargo` varchar(9) collate utf8_spanish_ci NOT NULL,
  `cod_cargo_nuevo` varchar(9) collate utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `usuario` varchar(30) collate utf8_spanish_ci NOT NULL,
  `pagado_por_emp` varchar(2) collate utf8_spanish_ci NOT NULL,
  `institucion` varchar(60) collate utf8_spanish_ci NOT NULL,
  `tipo_estudio` varchar(60) collate utf8_spanish_ci NOT NULL,
  `nivel_actual` varchar(60) collate utf8_spanish_ci NOT NULL,
  `costo_persona` decimal(17,2) NOT NULL,
  `num_participantes` int(4) NOT NULL,
  `nombre_especialista` varchar(60) collate utf8_spanish_ci NOT NULL,
  `gerencia_anterior` int(6) NOT NULL,
  `gerencia_nueva` int(6) NOT NULL,
  `nomina_anterior` varchar(60) collate utf8_spanish_ci NOT NULL,
  `nomina_nueva` varchar(60) collate utf8_spanish_ci NOT NULL,
  `puntaje` decimal(4,2) NOT NULL,
  `calificacion` varchar(60) collate utf8_spanish_ci NOT NULL,
  `labor` varchar(60) collate utf8_spanish_ci NOT NULL,
  `institucion_publica` int(1) NOT NULL,
  `tcamisa` varchar(4) collate utf8_spanish_ci default NULL,
  `tchaqueta` varchar(4) collate utf8_spanish_ci default NULL,
  `tbata` varchar(4) collate utf8_spanish_ci default NULL,
  `tpantalon` varchar(4) collate utf8_spanish_ci default NULL,
  `tmono` varchar(4) collate utf8_spanish_ci default NULL,
  `tzapato` varchar(4) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`cod_expediente_det`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='contiene todos los datos de expediente del personal ' AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `nomexpediente`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomfamiliares`
--

CREATE TABLE IF NOT EXISTS `nomfamiliares` (
  `correl` int(11) NOT NULL auto_increment,
  `cedula` int(11) NOT NULL default '0',
  `ficha` varchar(10) collate utf8_spanish_ci default NULL,
  `nombre` varchar(20) collate utf8_spanish_ci default NULL,
  `codpar` int(11) default NULL,
  `sexo` varchar(20) collate utf8_spanish_ci default NULL,
  `fecha_nac` datetime default NULL,
  `codgua` int(10) unsigned NOT NULL,
  `costo` decimal(10,2) NOT NULL,
  `nacionalidad` varchar(1) collate utf8_spanish_ci NOT NULL,
  `afiliado` tinyint(1) NOT NULL,
  `tipnom` int(11) NOT NULL,
  `cedula_beneficiario` int(11) NOT NULL,
  `apellido` varchar(20) collate utf8_spanish_ci NOT NULL,
  `niveledu` varchar(100) collate utf8_spanish_ci NOT NULL,
  `institucion` varchar(100) collate utf8_spanish_ci NOT NULL,
  `tallafranela` varchar(50) collate utf8_spanish_ci NOT NULL,
  `tallamono` varchar(50) collate utf8_spanish_ci NOT NULL,
  `fam_telf` varchar(15) collate utf8_spanish_ci default NULL,
  `fecha_beca` date default NULL,
  `beca` int(1) default NULL,
  `promedionota` decimal(10,2) default NULL,
  PRIMARY KEY  (`correl`),
  KEY `ficha` (`ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `nomfamiliares`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomfrecuencias`
--

CREATE TABLE IF NOT EXISTS `nomfrecuencias` (
  `codfre` int(11) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `diasperiodo` int(11) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  `fecha_ini` int(11) default NULL,
  `fecha_fin` int(11) default NULL,
  `periodos` tinyint(1) default NULL,
  `dfecha_ini` datetime default NULL,
  `dfecha_fin` datetime default NULL,
  PRIMARY KEY  (`codfre`),
  KEY `fc_idx_104` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomfrecuencias`
--

INSERT INTO `nomfrecuencias` (`codfre`, `descrip`, `diasperiodo`, `markar`, `ee`, `fecha_ini`, `fecha_fin`, `periodos`, `dfecha_ini`, `dfecha_fin`) VALUES
(1, 'Semanal', 7, NULL, NULL, NULL, NULL, 1, NULL, NULL),
(2, '1era Quincena', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(3, '2da Quincena', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(4, 'Quincenal', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(5, 'Mensual', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(6, 'Prestaciones', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(7, 'Utilidades', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(8, 'Vacaciones', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(9, 'Aguinaldos', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(10, 'Liquidaciones', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(11, 'Bonificacion', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(12, 'Comp. Aguinaldos', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(13, 'Aguinaldos Decreto', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(14, 'Bono Unico', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomgradospasos`
--

CREATE TABLE IF NOT EXISTS `nomgradospasos` (
  `grado` varchar(2) collate utf8_spanish_ci NOT NULL,
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
  PRIMARY KEY  (`grado`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomgradospasos`
--

INSERT INTO `nomgradospasos` (`grado`, `p1`, `p2`, `p3`, `p4`, `p5`, `p6`, `p7`, `p8`, `p9`, `p10`, `p11`, `p12`, `p13`, `p14`, `p15`) VALUES
('1', '1160.00', '5.00', '9.00', '14.00', '19.00', '24.00', '29.00', '34.00', '40.00', '46.00', '52.00', '58.00', '64.00', '70.00', '77.00'),
('10', '1160.00', '9.00', '19.00', '29.00', '39.00', '49.00', '60.00', '71.00', '82.00', '94.00', '106.00', '118.00', '131.00', '144.00', '158.00'),
('11', '1160.00', '11.00', '22.00', '33.00', '45.00', '57.00', '69.00', '82.00', '95.00', '109.00', '122.00', '137.00', '152.00', '167.00', '183.00'),
('12', '1160.00', '12.00', '25.00', '38.00', '52.00', '66.00', '80.00', '95.00', '110.00', '125.00', '141.00', '158.00', '175.00', '193.00', '211.00'),
('13', '1160.00', '14.00', '29.00', '44.00', '60.00', '76.00', '92.00', '109.00', '127.00', '145.00', '163.00', '183.00', '202.00', '223.00', '244.00'),
('14', '1160.00', '16.00', '33.00', '51.00', '69.00', '87.00', '106.00', '126.00', '146.00', '167.00', '182.00', '196.00', '210.00', '224.00', '245.00'),
('15', '1160.00', '18.00', '35.00', '53.00', '71.00', '89.00', '108.00', '128.00', '148.00', '169.00', '184.00', '198.00', '212.00', '226.00', '247.00'),
('16', '1182.00', '20.00', '37.00', '55.00', '73.00', '91.00', '110.00', '130.00', '150.00', '171.00', '186.00', '200.00', '214.00', '228.00', '249.00'),
('17', '1221.00', '22.00', '39.00', '57.00', '75.00', '93.00', '112.00', '132.00', '152.00', '173.00', '188.00', '202.00', '216.00', '230.00', '251.00'),
('18', '1265.00', '24.00', '41.00', '59.00', '77.00', '95.00', '114.00', '134.00', '154.00', '175.00', '190.00', '204.00', '218.00', '232.00', '253.00'),
('19', '1314.00', '26.00', '43.00', '61.00', '79.00', '97.00', '116.00', '136.00', '156.00', '177.00', '192.00', '206.00', '220.00', '237.00', '258.00'),
('2', '1160.00', '5.00', '9.00', '14.00', '19.00', '24.00', '29.00', '34.00', '40.00', '46.00', '52.00', '58.00', '64.00', '70.00', '77.00'),
('20', '1366.00', '28.00', '45.00', '63.00', '81.00', '99.00', '118.00', '138.00', '158.00', '179.00', '193.00', '215.00', '237.00', '260.00', '284.00'),
('21', '1424.00', '30.00', '47.00', '65.00', '83.00', '101.00', '121.00', '143.00', '165.00', '188.00', '212.00', '236.00', '261.00', '287.00', '313.00'),
('22', '1488.00', '32.00', '49.00', '67.00', '86.00', '109.00', '133.00', '157.00', '182.00', '207.00', '233.00', '260.00', '287.00', '315.00', '344.00'),
('23', '1559.00', '34.00', '51.00', '70.00', '95.00', '120.00', '146.00', '173.00', '200.00', '228.00', '257.00', '286.00', '316.00', '347.00', '378.00'),
('24', '1636.00', '36.00', '53.00', '77.00', '105.00', '132.00', '161.00', '190.00', '220.00', '251.00', '282.00', '314.00', '348.00', '381.00', '416.00'),
('25', '1722.00', '38.00', '56.00', '85.00', '115.00', '146.00', '177.00', '209.00', '242.00', '276.00', '310.00', '346.00', '382.00', '420.00', '458.00'),
('26', '1814.00', '40.00', '62.00', '94.00', '127.00', '160.00', '195.00', '230.00', '266.00', '303.00', '341.00', '381.00', '420.00', '461.00', '504.00'),
('3', '1160.00', '5.00', '9.00', '14.00', '19.00', '24.00', '29.00', '34.00', '40.00', '46.00', '52.00', '58.00', '64.00', '70.00', '77.00'),
('4', '1160.00', '5.00', '9.00', '14.00', '19.00', '24.00', '29.00', '34.00', '40.00', '46.00', '52.00', '58.00', '64.00', '70.00', '77.00'),
('5', '1160.00', '5.00', '11.00', '16.00', '22.00', '28.00', '34.00', '40.00', '46.00', '53.00', '60.00', '67.00', '74.00', '81.00', '89.00'),
('6', '1160.00', '5.00', '11.00', '16.00', '22.00', '28.00', '34.00', '40.00', '46.00', '53.00', '60.00', '67.00', '74.00', '81.00', '89.00'),
('7', '1160.00', '6.00', '12.00', '19.00', '25.00', '32.00', '39.00', '46.00', '53.00', '61.00', '69.00', '77.00', '85.00', '94.00', '103.00'),
('8', '1160.00', '7.00', '14.00', '21.00', '29.00', '37.00', '45.00', '53.00', '62.00', '70.00', '79.00', '89.00', '98.00', '108.00', '118.00'),
('9', '1160.00', '8.00', '16.00', '25.00', '34.00', '43.00', '52.00', '61.00', '71.00', '81.00', '92.00', '103.00', '114.00', '125.00', '137.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomgrupos_categorias`
--

CREATE TABLE IF NOT EXISTS `nomgrupos_categorias` (
  `gr` int(10) unsigned NOT NULL,
  `salario` decimal(17,2) default NULL,
  `bonomes` decimal(17,2) default NULL,
  `bonodia` decimal(17,2) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`gr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomgrupos_categorias`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomgrupo_bancos`
--

CREATE TABLE IF NOT EXISTS `nomgrupo_bancos` (
  `cod_gban` int(11) NOT NULL,
  `des_ban` varchar(60) collate utf8_spanish_ci NOT NULL,
  `suc_ban` varchar(20) collate utf8_spanish_ci default NULL,
  `direccion` varchar(60) collate utf8_spanish_ci default NULL,
  `gerente` varchar(40) collate utf8_spanish_ci default NULL,
  `cuentacob` varchar(20) collate utf8_spanish_ci default NULL,
  `tipocuenta` varchar(1) collate utf8_spanish_ci default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  `textoinicial` text collate utf8_spanish_ci NOT NULL,
  `textofinal` text collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`cod_gban`),
  KEY `fc_idx_107` (`des_ban`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomgrupo_bancos`
--

INSERT INTO `nomgrupo_bancos` (`cod_gban`, `des_ban`, `suc_ban`, `direccion`, `gerente`, `cuentacob`, `tipocuenta`, `markar`, `ee`, `textoinicial`, `textofinal`) VALUES
(1, 'GRUPO UNICO', '', '', '', '', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomguarderias`
--

CREATE TABLE IF NOT EXISTS `nomguarderias` (
  `codorg` int(11) NOT NULL,
  `codsuc` int(11) default NULL,
  `rif` varchar(20) collate utf8_spanish_ci default NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `dir_emp` varchar(120) collate utf8_spanish_ci default NULL,
  `tel_emp` varchar(25) collate utf8_spanish_ci default NULL,
  `tipo_ins` varchar(20) collate utf8_spanish_ci default NULL,
  `codinst` varchar(20) collate utf8_spanish_ci default NULL,
  `montinscr` decimal(17,2) default NULL,
  `montmen` decimal(17,2) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_117` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomguarderias`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nominstruccion`
--

CREATE TABLE IF NOT EXISTS `nominstruccion` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(60) character set latin1 NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nominstruccion`
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
(10, 'Sin terminar bachillerato');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomliquidaciones`
--

CREATE TABLE IF NOT EXISTS `nomliquidaciones` (
  `cod_tli` int(10) unsigned NOT NULL,
  `des_tli` varchar(60) collate utf8_spanish_ci NOT NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`cod_tli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomliquidaciones`
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
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `gerencia` int(6) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_165` (`markar`),
  KEY `fc_idx_166` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomnivel1`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel2`
--

CREATE TABLE IF NOT EXISTS `nomnivel2` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `gerencia` int(6) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_76` (`descrip`),
  KEY `fc_idx_77` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomnivel2`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel3`
--

CREATE TABLE IF NOT EXISTS `nomnivel3` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `gerencia` int(6) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_184` (`descrip`),
  KEY `fc_idx_185` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomnivel3`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel4`
--

CREATE TABLE IF NOT EXISTS `nomnivel4` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `gerencia` int(6) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_110` (`descrip`),
  KEY `fc_idx_111` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomnivel4`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel5`
--

CREATE TABLE IF NOT EXISTS `nomnivel5` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `gerencia` int(6) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_72` (`descrip`),
  KEY `fc_idx_73` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomnivel5`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel6`
--

CREATE TABLE IF NOT EXISTS `nomnivel6` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `gerencia` int(6) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_72` (`descrip`),
  KEY `fc_idx_73` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomnivel6`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomnivel7`
--

CREATE TABLE IF NOT EXISTS `nomnivel7` (
  `codorg` int(8) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `gerencia` int(6) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_72` (`descrip`),
  KEY `fc_idx_73` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomnivel7`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomparentescos`
--

CREATE TABLE IF NOT EXISTS `nomparentescos` (
  `codorg` varchar(6) collate utf8_spanish_ci NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_153` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomparentescos`
--

INSERT INTO `nomparentescos` (`codorg`, `descrip`, `ee`) VALUES
('1', 'Madre', 0),
('2', 'Padre', 0),
('3', 'Hijo(a)', 0),
('4', 'CÃ³nyuge', 0),
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
  `semfin` int(1) NOT NULL default '0',
  PRIMARY KEY  (`codfre`,`anio`,`nper`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcar la base de datos para la tabla `nomperiodos`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nompersonal`
--

CREATE TABLE IF NOT EXISTS `nompersonal` (
  `cedula` int(11) default NULL,
  `apenom` varchar(60) collate utf8_spanish_ci default NULL,
  `sexo` varchar(20) collate utf8_spanish_ci default NULL,
  `estado_civil` varchar(13) collate utf8_spanish_ci NOT NULL,
  `direccion` varchar(150) collate utf8_spanish_ci default NULL,
  `zonapos` varchar(20) collate utf8_spanish_ci default NULL,
  `telefonos` varchar(20) collate utf8_spanish_ci default NULL,
  `email` varchar(40) collate utf8_spanish_ci default NULL,
  `fecnac` date default NULL,
  `lugarnac` varchar(30) collate utf8_spanish_ci default NULL,
  `codpro` int(11) default NULL,
  `foto` varchar(80) collate utf8_spanish_ci default NULL,
  `tipnom` int(11) NOT NULL default '0',
  `codnivel1` varchar(8) collate utf8_spanish_ci default NULL,
  `codnivel2` varchar(8) collate utf8_spanish_ci default NULL,
  `codnivel3` varchar(8) collate utf8_spanish_ci default NULL,
  `codnivel4` varchar(8) collate utf8_spanish_ci default NULL,
  `codnivel5` varchar(8) collate utf8_spanish_ci default NULL,
  `ficha` int(10) NOT NULL,
  `fecing` date default NULL,
  `codcat` varchar(6) collate utf8_spanish_ci default NULL,
  `codcargo` varchar(12) collate utf8_spanish_ci default NULL,
  `forcob` varchar(39) collate utf8_spanish_ci default NULL,
  `codbancob` int(11) default NULL,
  `cuentacob` varchar(20) collate utf8_spanish_ci default NULL,
  `codbanlph` int(11) default NULL,
  `cuentalph` varchar(20) collate utf8_spanish_ci default NULL,
  `estado` varchar(30) collate utf8_spanish_ci default NULL,
  `tipemp` varchar(20) collate utf8_spanish_ci default NULL,
  `fecfin` int(11) default NULL,
  `sueldopro` decimal(20,5) default NULL,
  `fechaplica` date default NULL,
  `codidi` int(11) default NULL,
  `fecnacr` varchar(5) collate utf8_spanish_ci default NULL,
  `tipopres` tinyint(4) default NULL,
  `fechasus` date default NULL,
  `fechareisus` date default NULL,
  `fechavac` date default NULL,
  `fechareivac` date default NULL,
  `fecharetiro` date default NULL,
  `aplicalogro` tinyint(4) default NULL,
  `aplicasuspension` tinyint(4) default NULL,
  `ctacontab` varchar(22) collate utf8_spanish_ci default NULL,
  `periodo` int(11) default NULL,
  `markar` tinyint(4) default NULL,
  `cod_tli` varchar(19) collate utf8_spanish_ci NOT NULL,
  `motivo_liq` varchar(8) collate utf8_spanish_ci NOT NULL,
  `preaviso` varchar(2) collate utf8_spanish_ci NOT NULL,
  `suesal` decimal(20,2) default NULL,
  `contrato` varchar(20) collate utf8_spanish_ci default NULL,
  `nombres` varchar(30) collate utf8_spanish_ci default NULL,
  `apellidos` varchar(30) collate utf8_spanish_ci default NULL,
  `montoliq` decimal(17,2) default NULL,
  `sfecnac` varchar(8) collate utf8_spanish_ci default NULL,
  `sfecing` date default NULL,
  `sfecfin` varchar(8) collate utf8_spanish_ci default NULL,
  `sfechaplica` varchar(8) collate utf8_spanish_ci default NULL,
  `sfechasus` varchar(8) collate utf8_spanish_ci default NULL,
  `sfechareisus` varchar(8) collate utf8_spanish_ci default NULL,
  `sfechavac` varchar(8) collate utf8_spanish_ci default NULL,
  `sfechareivac` varchar(8) collate utf8_spanish_ci default NULL,
  `sfecharetiro` varchar(8) collate utf8_spanish_ci default NULL,
  `nacionalidad` tinyint(4) default NULL,
  `diascontrato` int(11) default NULL,
  `ee` tinyint(4) default NULL,
  `dfecnac` date default NULL,
  `dfecing` date default NULL,
  `dfecfin` date default NULL,
  `dfechaplica` date default NULL,
  `dfechasus` date default NULL,
  `dfechareisus` date default NULL,
  `dfechavac` date default NULL,
  `dfechareivac` date default NULL,
  `dfecharetiro` date default NULL,
  `nrocuadrilla` varchar(10) collate utf8_spanish_ci default NULL,
  `codnivel6` varchar(8) collate utf8_spanish_ci default NULL,
  `codnivel7` varchar(8) collate utf8_spanish_ci default NULL,
  `inicio_periodo` date NOT NULL,
  `fin_periodo` date NOT NULL,
  `fechajubipensi` date default NULL,
  `porjubipensi` varchar(10) collate utf8_spanish_ci default NULL,
  `antiguedadap` varchar(2) collate utf8_spanish_ci default NULL,
  `paso` int(2) default NULL,
  PRIMARY KEY  (`tipnom`,`ficha`),
  UNIQUE KEY `ficha` (`ficha`,`cedula`),
  KEY `codcargo` (`codcargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nompersonal`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomprestamos`
--

CREATE TABLE IF NOT EXISTS `nomprestamos` (
  `codigopr` int(10) unsigned NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci default NULL,
  `formula` mediumtext collate utf8_spanish_ci,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codigopr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomprestamos`
--

INSERT INTO `nomprestamos` (`codigopr`, `descrip`, `formula`, `markar`, `ee`) VALUES
(1, 'Corto Plazo', NULL, 0, 0),
(2, 'Mediano Palzo', NULL, 0, 0),
(3, 'Largo Plazo', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomprestamos_cabecera`
--

CREATE TABLE IF NOT EXISTS `nomprestamos_cabecera` (
  `numpre` int(9) NOT NULL,
  `ficha` varchar(11) collate utf8_spanish_ci NOT NULL,
  `meses` int(2) NOT NULL,
  `fechaapro` date NOT NULL,
  `fecpricup` date NOT NULL,
  `tipint` int(2) NOT NULL,
  `monto` float(17,2) NOT NULL,
  `tasa` float(7,2) NOT NULL,
  `estadopre` varchar(21) collate utf8_spanish_ci NOT NULL,
  `detalle` varchar(1000) collate utf8_spanish_ci NOT NULL,
  `codigopr` varchar(7) collate utf8_spanish_ci NOT NULL,
  `markar` int(2) NOT NULL,
  `codnom` int(9) NOT NULL,
  `totpres` float(17,2) NOT NULL,
  `sfechaapro` date NOT NULL,
  `sfecpricup` date NOT NULL,
  `ee` int(2) NOT NULL,
  `cuotas` int(3) default NULL,
  `mtocuota` decimal(10,2) default NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomprestamos_cabecera`
--

INSERT INTO `nomprestamos_cabecera` (`numpre`, `ficha`, `meses`, `fechaapro`, `fecpricup`, `tipint`, `monto`, `tasa`, `estadopre`, `detalle`, `codigopr`, `markar`, `codnom`, `totpres`, `sfechaapro`, `sfecpricup`, `ee`, `cuotas`, `mtocuota`) VALUES
(1, '10298', 0, '2009-10-09', '2009-10-15', 0, 1249.23, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 1249.23, '0000-00-00', '0000-00-00', 0, 15, '87.37'),
(2, '10276', 0, '2009-10-09', '2009-10-15', 0, 16342.52, 0.00, 'Pendiente', 'Adquisicion de Linea Blanca', '3', 0, 2, 16342.52, '0000-00-00', '0000-00-00', 0, 30, '555.56'),
(3, '10276', 0, '2009-10-09', '2009-10-15', 0, 537.35, 0.00, 'Pendiente', 'Adquisicion de Lentes', '1', 0, 2, 537.35, '0000-00-00', '0000-00-00', 0, 11, '53.52'),
(4, '10180', 0, '2009-10-09', '2009-10-15', 0, 1932.12, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 1932.12, '0000-00-00', '0000-00-00', 0, 25, '80.03'),
(5, '10180', 0, '2009-10-09', '2009-10-15', 0, 573.89, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 573.89, '0000-00-00', '0000-00-00', 0, 12, '48.23'),
(6, '10180', 0, '2009-10-09', '2009-10-15', 0, 577.52, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 577.52, '0000-00-00', '0000-00-00', 0, 8, '77.11'),
(7, '10125', 0, '2009-10-09', '2009-10-15', 0, 3701.16, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 3701.16, '0000-00-00', '0000-00-00', 0, 44, '85.91'),
(8, '10125', 0, '2009-10-09', '2009-10-15', 0, 2589.92, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 2589.92, '0000-00-00', '0000-00-00', 0, 28, '93.06'),
(9, '10125', 0, '2009-10-09', '2009-10-15', 0, 1772.00, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 1772.00, '0000-00-00', '0000-00-00', 0, 29, '62.50'),
(10, '10131', 0, '2009-10-09', '2009-10-15', 0, 4893.85, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 4893.85, '0000-00-00', '0000-00-00', 0, 26, '191.52'),
(11, '10131', 0, '2009-10-09', '2009-10-15', 0, 1627.70, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 1627.70, '0000-00-00', '0000-00-00', 0, 24, '69.59'),
(12, '10131', 0, '2009-10-09', '2009-10-15', 0, 150.00, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 150.00, '0000-00-00', '0000-00-00', 0, 3, '50.00'),
(13, '10131', 0, '2009-10-09', '2009-10-15', 0, 720.94, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 720.94, '0000-00-00', '0000-00-00', 0, 12, '60.39'),
(14, '10178', 0, '2009-10-09', '2009-10-15', 0, 286.92, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 286.92, '0000-00-00', '0000-00-00', 0, 22, '13.51'),
(15, '10109', 0, '2009-10-09', '2009-10-15', 0, 1199.95, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 1199.95, '0000-00-00', '0000-00-00', 0, 27, '44.45'),
(16, '10109', 0, '2009-10-09', '2009-10-15', 0, 1390.39, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 1390.39, '0000-00-00', '0000-00-00', 0, 44, '31.78'),
(17, '10238', 0, '2009-10-09', '2009-10-15', 0, 640.98, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 640.98, '0000-00-00', '0000-00-00', 0, 12, '54.36'),
(18, '10238', 0, '2009-10-09', '2009-10-15', 0, 2883.52, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 2883.52, '0000-00-00', '0000-00-00', 0, 33, '89.59'),
(19, '10238', 0, '2009-10-09', '2009-10-15', 0, 73.24, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 73.24, '0000-00-00', '0000-00-00', 0, 9, '8.38'),
(20, '10127', 0, '2009-10-09', '2009-10-15', 0, 10800.00, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 10800.00, '0000-00-00', '0000-00-00', 0, 24, '450.00'),
(21, '10127', 0, '2009-10-09', '2009-10-15', 0, 838.40, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 838.40, '0000-00-00', '0000-00-00', 0, 14, '60.49'),
(22, '10072', 0, '2009-10-09', '2009-10-15', 0, 2506.44, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 2506.44, '0000-00-00', '0000-00-00', 0, 20, '129.17'),
(23, '10072', 0, '2009-10-09', '2009-10-15', 0, 587.33, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 587.33, '0000-00-00', '0000-00-00', 0, 24, '25.28'),
(24, '10126', 0, '2009-10-09', '2009-10-15', 0, 9428.21, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 9428.21, '0000-00-00', '0000-00-00', 0, 23, '410.00'),
(25, '10114', 0, '2009-10-09', '2009-10-15', 0, 18829.95, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 18829.95, '0000-00-00', '0000-00-00', 0, 170, '110.98'),
(26, '10114', 0, '2009-10-09', '2009-10-15', 0, 161.67, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 161.67, '0000-00-00', '0000-00-00', 0, 9, '18.17'),
(27, '10114', 0, '2009-10-09', '2009-10-15', 0, 91.85, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 91.85, '0000-00-00', '0000-00-00', 0, 1, '91.85'),
(28, '10138', 0, '2009-10-09', '2009-10-15', 0, 1200.00, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 1200.00, '0000-00-00', '0000-00-00', 0, 24, '50.00'),
(29, '10138', 0, '2009-10-09', '2009-10-15', 0, 468.08, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 468.08, '0000-00-00', '0000-00-00', 0, 4, '133.64'),
(30, '10112', 0, '2009-10-09', '2009-10-15', 0, 962.48, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 962.48, '0000-00-00', '0000-00-00', 0, 21, '45.84'),
(31, '10072', 0, '2009-10-09', '2009-10-15', 0, 1184.55, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 1184.55, '0000-00-00', '0000-00-00', 0, 16, '74.03'),
(32, '10267', 0, '2009-10-09', '2009-10-15', 0, 1561.81, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 1561.81, '0000-00-00', '0000-00-00', 0, 21, '75.52'),
(33, '10039', 0, '2009-10-13', '2009-10-15', 0, 1184.55, 0.00, 'Pendiente', 'CAJA DE AHORRO', '2', 0, 2, 1184.55, '0000-00-00', '0000-00-00', 0, 16, '74.03'),
(34, '10143', 0, '2009-11-10', '2009-11-15', 0, 2555.87, 0.00, 'Pendiente', '', '2', 0, 2, 2555.87, '0000-00-00', '0000-00-00', 0, 23, '113.28'),
(35, '10130', 0, '2009-11-10', '2009-11-15', 0, 2675.14, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 2675.14, '0000-00-00', '0000-00-00', 0, 23, '118.57'),
(36, '10206', 0, '2009-11-10', '2009-11-15', 0, 490.13, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 490.13, '0000-00-00', '0000-00-00', 0, 12, '42.19'),
(37, '10135', 0, '2009-11-10', '2009-11-15', 0, 1237.82, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 1237.82, '0000-00-00', '0000-00-00', 0, 45, '27.81'),
(38, '10161', 0, '2009-11-10', '2009-11-15', 0, 108.40, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 108.40, '0000-00-00', '0000-00-00', 0, 8, '13.64'),
(39, '10157', 0, '2009-11-10', '2009-11-15', 0, 1975.74, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 1975.74, '0000-00-00', '0000-00-00', 0, 43, '46.39'),
(40, '10140', 0, '2009-11-10', '2009-11-15', 0, 178.44, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 178.44, '0000-00-00', '0000-00-00', 0, 12, '15.10'),
(41, '10140', 0, '2009-11-10', '2009-11-15', 0, 2589.12, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 2589.12, '0000-00-00', '0000-00-00', 0, 43, '60.21'),
(42, '10199', 0, '2009-11-10', '2009-11-15', 0, 2770.27, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 2770.27, '0000-00-00', '0000-00-00', 0, 23, '121.23'),
(43, '10144', 0, '2009-11-10', '2009-11-15', 0, 756.90, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 756.90, '0000-00-00', '0000-00-00', 0, 24, '32.62'),
(44, '10125', 0, '2009-11-10', '2009-11-15', 0, 17522.13, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 17522.13, '0000-00-00', '0000-00-00', 0, 48, '365.05'),
(45, '10204', 0, '2009-11-11', '2009-11-15', 0, 1123.87, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 1123.87, '0000-00-00', '0000-00-00', 0, 44, '25.89'),
(46, '10204', 0, '2009-11-11', '2009-11-15', 0, 65.05, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 65.05, '0000-00-00', '0000-00-00', 0, 2, '32.52'),
(47, '10204', 0, '2009-11-11', '2009-11-15', 0, 181.93, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 181.93, '0000-00-00', '0000-00-00', 0, 26, '7.25'),
(48, '10169', 0, '2009-11-11', '2009-11-15', 0, 1378.85, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 1378.85, '0000-00-00', '0000-00-00', 0, 23, '59.98'),
(49, '10178', 0, '2009-11-11', '2009-11-15', 0, 1592.25, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 1592.25, '0000-00-00', '0000-00-00', 0, 68, '23.55'),
(50, '10178', 0, '2009-11-11', '2009-11-15', 0, 654.25, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 654.25, '0000-00-00', '0000-00-00', 0, 19, '34.65'),
(51, '10217', 0, '2009-11-11', '2009-11-15', 0, 2028.93, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 2028.93, '0000-00-00', '0000-00-00', 0, 22, '94.15'),
(52, '10221', 0, '2009-11-11', '2009-11-15', 0, 1095.62, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 1095.62, '0000-00-00', '0000-00-00', 0, 23, '47.98'),
(53, '10219', 0, '2009-11-11', '2009-11-15', 0, 2302.84, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 2302.84, '0000-00-00', '0000-00-00', 0, 44, '53.43'),
(54, '10153', 0, '2009-11-11', '2009-11-15', 0, 1369.53, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 1369.53, '0000-00-00', '0000-00-00', 0, 44, '31.76'),
(55, '10182', 0, '2009-11-11', '2009-11-15', 0, 2854.31, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '2', 0, 2, 2854.31, '0000-00-00', '0000-00-00', 0, 25, '116.66'),
(56, '10161', 0, '2009-11-11', '2009-11-15', 0, 766.27, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 766.27, '0000-00-00', '0000-00-00', 0, 24, '33.12'),
(57, '10161', 0, '2009-11-11', '2009-11-15', 0, 699.83, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 699.83, '0000-00-00', '0000-00-00', 0, 24, '30.01'),
(58, '10039', 0, '2009-11-11', '2009-11-15', 0, 5745.18, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 2, 5745.18, '0000-00-00', '0000-00-00', 0, 36, '159.59'),
(59, '10173', 0, '2009-11-11', '2009-11-15', 0, 1301.46, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '1', 0, 2, 1301.46, '0000-00-00', '0000-00-00', 0, 44, '30.12'),
(60, '20001', 0, '2009-11-11', '2009-11-15', 0, 4500.00, 0.00, 'Pendiente', 'PRESTAMO CAJA DE AHORRO', '3', 0, 4, 4500.00, '0000-00-00', '0000-00-00', 0, 48, '93.75');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomprestamos_detalles`
--

CREATE TABLE IF NOT EXISTS `nomprestamos_detalles` (
  `numpre` int(9) NOT NULL,
  `ficha` varchar(11) collate utf8_spanish_ci NOT NULL,
  `tipocuo` varchar(2) collate utf8_spanish_ci NOT NULL,
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
  `estadopre` varchar(21) collate utf8_spanish_ci NOT NULL,
  `detalle` varchar(1000) collate utf8_spanish_ci NOT NULL,
  `dedespecial` int(2) NOT NULL,
  `codnom` int(9) NOT NULL,
  `sfechaven` date NOT NULL,
  `sfechacan` date NOT NULL,
  `ee` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomprestamos_detalles`
--

INSERT INTO `nomprestamos_detalles` (`numpre`, `ficha`, `tipocuo`, `numcuo`, `fechaven`, `anioven`, `mesven`, `dias`, `salinicial`, `montocuo`, `montoint`, `montocap`, `salfinal`, `fechacan`, `estadopre`, `detalle`, `dedespecial`, `codnom`, `sfechaven`, `sfechacan`, `ee`) VALUES
(1, '10298', '', 1, '2009-10-15', 2009, 10, 0, 1249.23, 87.37, 0.00, 0.00, 1161.86, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(1, '10298', '', 2, '2009-10-31', 2009, 10, 0, 1161.86, 87.37, 0.00, 0.00, 1074.49, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(1, '10298', '', 3, '2009-11-15', 2009, 11, 0, 1074.49, 87.37, 0.00, 0.00, 987.12, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(1, '10298', '', 4, '2009-11-30', 2009, 11, 0, 987.12, 87.37, 0.00, 0.00, 899.75, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(1, '10298', '', 5, '2009-12-15', 2009, 12, 0, 899.75, 87.37, 0.00, 0.00, 812.38, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(1, '10298', '', 6, '2009-12-31', 2009, 12, 0, 812.38, 87.37, 0.00, 0.00, 725.01, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(1, '10298', '', 7, '2010-01-15', 2010, 1, 0, 725.01, 87.37, 0.00, 0.00, 637.64, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(1, '10298', '', 8, '2010-01-31', 2010, 1, 0, 637.64, 87.37, 0.00, 0.00, 550.27, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(1, '10298', '', 9, '2010-02-15', 2010, 2, 0, 550.27, 87.37, 0.00, 0.00, 462.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(1, '10298', '', 10, '2010-02-28', 2010, 2, 0, 462.90, 87.37, 0.00, 0.00, 375.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(1, '10298', '', 11, '2010-03-15', 2010, 3, 0, 375.53, 87.37, 0.00, 0.00, 288.16, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(1, '10298', '', 12, '2010-03-31', 2010, 3, 0, 288.16, 87.37, 0.00, 0.00, 200.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(1, '10298', '', 13, '2010-04-15', 2010, 4, 0, 200.79, 87.37, 0.00, 0.00, 113.42, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(1, '10298', '', 14, '2010-04-30', 2010, 4, 0, 113.42, 87.37, 0.00, 0.00, 26.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(1, '10298', '', 15, '2010-05-15', 2010, 5, 0, 26.05, 26.05, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 1, '2009-10-15', 2009, 10, 0, 16342.52, 555.56, 0.00, 0.00, 15786.96, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 2, '2009-10-31', 2009, 10, 0, 15786.96, 555.56, 0.00, 0.00, 15231.40, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(2, '10276', '', 3, '2009-11-15', 2009, 11, 0, 15231.40, 555.56, 0.00, 0.00, 14675.84, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 4, '2009-11-30', 2009, 11, 0, 14675.84, 555.56, 0.00, 0.00, 14120.28, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 5, '2009-12-15', 2009, 12, 0, 14120.28, 555.56, 0.00, 0.00, 13564.72, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 6, '2009-12-31', 2009, 12, 0, 13564.72, 555.56, 0.00, 0.00, 13009.16, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 7, '2010-01-15', 2010, 1, 0, 13009.16, 555.56, 0.00, 0.00, 12453.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 8, '2010-01-31', 2010, 1, 0, 12453.60, 555.56, 0.00, 0.00, 11898.04, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 9, '2010-02-15', 2010, 2, 0, 11898.04, 555.56, 0.00, 0.00, 11342.48, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 10, '2010-02-28', 2010, 2, 0, 11342.48, 555.56, 0.00, 0.00, 10786.92, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 11, '2010-03-15', 2010, 3, 0, 10786.92, 555.56, 0.00, 0.00, 10231.36, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 12, '2010-03-31', 2010, 3, 0, 10231.36, 555.56, 0.00, 0.00, 9675.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 13, '2010-04-15', 2010, 4, 0, 9675.80, 555.56, 0.00, 0.00, 9120.24, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 14, '2010-04-30', 2010, 4, 0, 9120.24, 555.56, 0.00, 0.00, 8564.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 15, '2010-05-15', 2010, 5, 0, 8564.68, 555.56, 0.00, 0.00, 8009.12, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 16, '2010-05-31', 2010, 5, 0, 8009.12, 555.56, 0.00, 0.00, 7453.56, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 17, '2010-06-15', 2010, 6, 0, 7453.56, 555.56, 0.00, 0.00, 6898.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 18, '2010-06-30', 2010, 6, 0, 6898.00, 555.56, 0.00, 0.00, 6342.44, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 19, '2010-07-15', 2010, 7, 0, 6342.44, 555.56, 0.00, 0.00, 5786.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 20, '2010-07-31', 2010, 7, 0, 5786.88, 555.56, 0.00, 0.00, 5231.32, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 21, '2010-08-15', 2010, 8, 0, 5231.32, 555.56, 0.00, 0.00, 4675.76, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 22, '2010-08-31', 2010, 8, 0, 4675.76, 555.56, 0.00, 0.00, 4120.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 23, '2010-09-15', 2010, 9, 0, 4120.20, 555.56, 0.00, 0.00, 3564.64, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 24, '2010-09-30', 2010, 9, 0, 3564.64, 555.56, 0.00, 0.00, 3009.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 25, '2010-10-15', 2010, 10, 0, 3009.08, 555.56, 0.00, 0.00, 2453.52, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 26, '2010-10-31', 2010, 10, 0, 2453.52, 555.56, 0.00, 0.00, 1897.96, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 27, '2010-11-15', 2010, 11, 0, 1897.96, 555.56, 0.00, 0.00, 1342.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 28, '2010-11-30', 2010, 11, 0, 1342.40, 555.56, 0.00, 0.00, 786.84, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 29, '2010-12-15', 2010, 12, 0, 786.84, 555.56, 0.00, 0.00, 231.28, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(2, '10276', '', 30, '2010-12-31', 2010, 12, 0, 231.28, 231.28, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(3, '10276', '', 1, '2009-10-15', 2009, 10, 0, 537.35, 53.52, 0.00, 0.00, 483.83, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(3, '10276', '', 2, '2009-10-31', 2009, 10, 0, 483.83, 53.52, 0.00, 0.00, 430.31, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(3, '10276', '', 3, '2009-11-15', 2009, 11, 0, 430.31, 53.52, 0.00, 0.00, 376.79, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(3, '10276', '', 4, '2009-11-30', 2009, 11, 0, 376.79, 53.52, 0.00, 0.00, 323.27, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(3, '10276', '', 5, '2009-12-15', 2009, 12, 0, 323.27, 53.52, 0.00, 0.00, 269.75, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(3, '10276', '', 6, '2009-12-31', 2009, 12, 0, 269.75, 53.52, 0.00, 0.00, 216.23, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(3, '10276', '', 7, '2010-01-15', 2010, 1, 0, 216.23, 53.52, 0.00, 0.00, 162.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(3, '10276', '', 8, '2010-01-31', 2010, 1, 0, 162.71, 53.52, 0.00, 0.00, 109.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(3, '10276', '', 9, '2010-02-15', 2010, 2, 0, 109.19, 53.52, 0.00, 0.00, 55.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(3, '10276', '', 10, '2010-02-28', 2010, 2, 0, 55.67, 53.52, 0.00, 0.00, 2.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(3, '10276', '', 11, '2010-03-15', 2010, 3, 0, 2.15, 2.15, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 1, '2009-10-15', 2009, 10, 0, 1932.12, 80.03, 0.00, 0.00, 1852.09, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 2, '2009-10-31', 2009, 10, 0, 1852.09, 80.03, 0.00, 0.00, 1772.06, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(4, '10180', '', 3, '2009-11-15', 2009, 11, 0, 1772.06, 80.03, 0.00, 0.00, 1692.03, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 4, '2009-11-30', 2009, 11, 0, 1692.03, 80.03, 0.00, 0.00, 1612.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 5, '2009-12-15', 2009, 12, 0, 1612.00, 80.03, 0.00, 0.00, 1531.97, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 6, '2009-12-31', 2009, 12, 0, 1531.97, 80.03, 0.00, 0.00, 1451.94, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 7, '2010-01-15', 2010, 1, 0, 1451.94, 80.03, 0.00, 0.00, 1371.91, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 8, '2010-01-31', 2010, 1, 0, 1371.91, 80.03, 0.00, 0.00, 1291.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 9, '2010-02-15', 2010, 2, 0, 1291.88, 80.03, 0.00, 0.00, 1211.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 10, '2010-02-28', 2010, 2, 0, 1211.85, 80.03, 0.00, 0.00, 1131.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 11, '2010-03-15', 2010, 3, 0, 1131.82, 80.03, 0.00, 0.00, 1051.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 12, '2010-03-31', 2010, 3, 0, 1051.79, 80.03, 0.00, 0.00, 971.76, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 13, '2010-04-15', 2010, 4, 0, 971.76, 80.03, 0.00, 0.00, 891.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 14, '2010-04-30', 2010, 4, 0, 891.73, 80.03, 0.00, 0.00, 811.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 15, '2010-05-15', 2010, 5, 0, 811.70, 80.03, 0.00, 0.00, 731.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 16, '2010-05-31', 2010, 5, 0, 731.67, 80.03, 0.00, 0.00, 651.64, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 17, '2010-06-15', 2010, 6, 0, 651.64, 80.03, 0.00, 0.00, 571.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 18, '2010-06-30', 2010, 6, 0, 571.61, 80.03, 0.00, 0.00, 491.58, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 19, '2010-07-15', 2010, 7, 0, 491.58, 80.03, 0.00, 0.00, 411.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 20, '2010-07-31', 2010, 7, 0, 411.55, 80.03, 0.00, 0.00, 331.52, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 21, '2010-08-15', 2010, 8, 0, 331.52, 80.03, 0.00, 0.00, 251.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 22, '2010-08-31', 2010, 8, 0, 251.49, 80.03, 0.00, 0.00, 171.46, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 23, '2010-09-15', 2010, 9, 0, 171.46, 80.03, 0.00, 0.00, 91.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 24, '2010-09-30', 2010, 9, 0, 91.43, 80.03, 0.00, 0.00, 11.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(4, '10180', '', 25, '2010-10-15', 2010, 10, 0, 11.40, 11.40, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 1, '2009-10-15', 2009, 10, 0, 573.89, 48.23, 0.00, 0.00, 525.66, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 2, '2009-10-31', 2009, 10, 0, 525.66, 48.23, 0.00, 0.00, 477.43, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(5, '10180', '', 3, '2009-11-15', 2009, 11, 0, 477.43, 48.23, 0.00, 0.00, 429.20, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 4, '2009-11-30', 2009, 11, 0, 429.20, 48.23, 0.00, 0.00, 380.97, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 5, '2009-12-15', 2009, 12, 0, 380.97, 48.23, 0.00, 0.00, 332.74, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 6, '2009-12-31', 2009, 12, 0, 332.74, 48.23, 0.00, 0.00, 284.51, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 7, '2010-01-15', 2010, 1, 0, 284.51, 48.23, 0.00, 0.00, 236.28, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 8, '2010-01-31', 2010, 1, 0, 236.28, 48.23, 0.00, 0.00, 188.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 9, '2010-02-15', 2010, 2, 0, 188.05, 48.23, 0.00, 0.00, 139.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 10, '2010-02-28', 2010, 2, 0, 139.82, 48.23, 0.00, 0.00, 91.59, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 11, '2010-03-15', 2010, 3, 0, 91.59, 48.23, 0.00, 0.00, 43.36, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(5, '10180', '', 12, '2010-03-31', 2010, 3, 0, 43.36, 43.36, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(6, '10180', '', 1, '2009-10-15', 2009, 10, 0, 577.52, 77.11, 0.00, 0.00, 500.41, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(6, '10180', '', 2, '2009-10-31', 2009, 10, 0, 500.41, 77.11, 0.00, 0.00, 423.30, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(6, '10180', '', 3, '2009-11-15', 2009, 11, 0, 423.30, 77.11, 0.00, 0.00, 346.19, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(6, '10180', '', 4, '2009-11-30', 2009, 11, 0, 346.19, 77.11, 0.00, 0.00, 269.08, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(6, '10180', '', 5, '2009-12-15', 2009, 12, 0, 269.08, 77.11, 0.00, 0.00, 191.97, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(6, '10180', '', 6, '2009-12-31', 2009, 12, 0, 191.97, 77.11, 0.00, 0.00, 114.86, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(6, '10180', '', 7, '2010-01-15', 2010, 1, 0, 114.86, 77.11, 0.00, 0.00, 37.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(6, '10180', '', 8, '2010-01-31', 2010, 1, 0, 37.75, 37.75, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 1, '2009-10-15', 2009, 10, 0, 3701.16, 85.91, 0.00, 0.00, 3615.25, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 2, '2009-10-31', 2009, 10, 0, 3615.25, 85.91, 0.00, 0.00, 3529.34, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(7, '10125', '', 3, '2009-11-15', 2009, 11, 0, 3529.34, 85.91, 0.00, 0.00, 3443.43, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 4, '2009-11-30', 2009, 11, 0, 3443.43, 85.91, 0.00, 0.00, 3357.52, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 5, '2009-12-15', 2009, 12, 0, 3357.52, 85.91, 0.00, 0.00, 3271.61, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 6, '2009-12-31', 2009, 12, 0, 3271.61, 85.91, 0.00, 0.00, 3185.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 7, '2010-01-15', 2010, 1, 0, 3185.70, 85.91, 0.00, 0.00, 3099.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 8, '2010-01-31', 2010, 1, 0, 3099.79, 85.91, 0.00, 0.00, 3013.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 9, '2010-02-15', 2010, 2, 0, 3013.88, 85.91, 0.00, 0.00, 2927.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 10, '2010-02-28', 2010, 2, 0, 2927.97, 85.91, 0.00, 0.00, 2842.06, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 11, '2010-03-15', 2010, 3, 0, 2842.06, 85.91, 0.00, 0.00, 2756.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 12, '2010-03-31', 2010, 3, 0, 2756.15, 85.91, 0.00, 0.00, 2670.24, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 13, '2010-04-15', 2010, 4, 0, 2670.24, 85.91, 0.00, 0.00, 2584.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 14, '2010-04-30', 2010, 4, 0, 2584.33, 85.91, 0.00, 0.00, 2498.42, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 15, '2010-05-15', 2010, 5, 0, 2498.42, 85.91, 0.00, 0.00, 2412.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 16, '2010-05-31', 2010, 5, 0, 2412.51, 85.91, 0.00, 0.00, 2326.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 17, '2010-06-15', 2010, 6, 0, 2326.60, 85.91, 0.00, 0.00, 2240.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 18, '2010-06-30', 2010, 6, 0, 2240.69, 85.91, 0.00, 0.00, 2154.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 19, '2010-07-15', 2010, 7, 0, 2154.78, 85.91, 0.00, 0.00, 2068.87, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 20, '2010-07-31', 2010, 7, 0, 2068.87, 85.91, 0.00, 0.00, 1982.96, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 21, '2010-08-15', 2010, 8, 0, 1982.96, 85.91, 0.00, 0.00, 1897.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 22, '2010-08-31', 2010, 8, 0, 1897.05, 85.91, 0.00, 0.00, 1811.14, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 23, '2010-09-15', 2010, 9, 0, 1811.14, 85.91, 0.00, 0.00, 1725.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 24, '2010-09-30', 2010, 9, 0, 1725.23, 85.91, 0.00, 0.00, 1639.32, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 25, '2010-10-15', 2010, 10, 0, 1639.32, 85.91, 0.00, 0.00, 1553.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 26, '2010-10-31', 2010, 10, 0, 1553.41, 85.91, 0.00, 0.00, 1467.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 27, '2010-11-15', 2010, 11, 0, 1467.50, 85.91, 0.00, 0.00, 1381.59, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 28, '2010-11-30', 2010, 11, 0, 1381.59, 85.91, 0.00, 0.00, 1295.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 29, '2010-12-15', 2010, 12, 0, 1295.68, 85.91, 0.00, 0.00, 1209.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 30, '2010-12-31', 2010, 12, 0, 1209.77, 85.91, 0.00, 0.00, 1123.86, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 31, '2011-01-15', 2011, 1, 0, 1123.86, 85.91, 0.00, 0.00, 1037.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 32, '2011-01-31', 2011, 1, 0, 1037.95, 85.91, 0.00, 0.00, 952.04, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 33, '2011-02-15', 2011, 2, 0, 952.04, 85.91, 0.00, 0.00, 866.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 34, '2011-02-28', 2011, 2, 0, 866.13, 85.91, 0.00, 0.00, 780.22, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 35, '2011-03-15', 2011, 3, 0, 780.22, 85.91, 0.00, 0.00, 694.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 36, '2011-03-31', 2011, 3, 0, 694.31, 85.91, 0.00, 0.00, 608.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 37, '2011-04-15', 2011, 4, 0, 608.40, 85.91, 0.00, 0.00, 522.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 38, '2011-04-30', 2011, 4, 0, 522.49, 85.91, 0.00, 0.00, 436.58, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 39, '2011-05-15', 2011, 5, 0, 436.58, 85.91, 0.00, 0.00, 350.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 40, '2011-05-31', 2011, 5, 0, 350.67, 85.91, 0.00, 0.00, 264.76, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 41, '2011-06-15', 2011, 6, 0, 264.76, 85.91, 0.00, 0.00, 178.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 42, '2011-06-30', 2011, 6, 0, 178.85, 85.91, 0.00, 0.00, 92.94, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 43, '2011-07-15', 2011, 7, 0, 92.94, 85.91, 0.00, 0.00, 7.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(7, '10125', '', 44, '2011-07-31', 2011, 7, 0, 7.03, 7.03, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(8, '10125', '', 1, '2009-10-15', 2009, 10, 0, 2589.92, 93.06, 0.00, 0.00, 2496.86, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(8, '10125', '', 2, '2009-10-31', 2009, 10, 0, 2496.86, 93.06, 0.00, 0.00, 2403.80, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 3, '2009-11-15', 2009, 11, 0, 2403.80, 93.06, 0.00, 0.00, 2310.74, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 4, '2009-11-30', 2009, 11, 0, 2310.74, 93.06, 0.00, 0.00, 2217.68, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 5, '2009-12-15', 2009, 12, 0, 2217.68, 93.06, 0.00, 0.00, 2124.62, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 6, '2009-12-31', 2009, 12, 0, 2124.62, 93.06, 0.00, 0.00, 2031.56, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 7, '2010-01-15', 2010, 1, 0, 2031.56, 93.06, 0.00, 0.00, 1938.50, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 8, '2010-01-31', 2010, 1, 0, 1938.50, 93.06, 0.00, 0.00, 1845.44, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 9, '2010-02-15', 2010, 2, 0, 1845.44, 93.06, 0.00, 0.00, 1752.38, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 10, '2010-02-28', 2010, 2, 0, 1752.38, 93.06, 0.00, 0.00, 1659.32, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 11, '2010-03-15', 2010, 3, 0, 1659.32, 93.06, 0.00, 0.00, 1566.26, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 12, '2010-03-31', 2010, 3, 0, 1566.26, 93.06, 0.00, 0.00, 1473.20, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 13, '2010-04-15', 2010, 4, 0, 1473.20, 93.06, 0.00, 0.00, 1380.14, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 14, '2010-04-30', 2010, 4, 0, 1380.14, 93.06, 0.00, 0.00, 1287.08, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 15, '2010-05-15', 2010, 5, 0, 1287.08, 93.06, 0.00, 0.00, 1194.02, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 16, '2010-05-31', 2010, 5, 0, 1194.02, 93.06, 0.00, 0.00, 1100.96, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 17, '2010-06-15', 2010, 6, 0, 1100.96, 93.06, 0.00, 0.00, 1007.90, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 18, '2010-06-30', 2010, 6, 0, 1007.90, 93.06, 0.00, 0.00, 914.84, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 19, '2010-07-15', 2010, 7, 0, 914.84, 93.06, 0.00, 0.00, 821.78, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 20, '2010-07-31', 2010, 7, 0, 821.78, 93.06, 0.00, 0.00, 728.72, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 21, '2010-08-15', 2010, 8, 0, 728.72, 93.06, 0.00, 0.00, 635.66, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 22, '2010-08-31', 2010, 8, 0, 635.66, 93.06, 0.00, 0.00, 542.60, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 23, '2010-09-15', 2010, 9, 0, 542.60, 93.06, 0.00, 0.00, 449.54, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 24, '2010-09-30', 2010, 9, 0, 449.54, 93.06, 0.00, 0.00, 356.48, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 25, '2010-10-15', 2010, 10, 0, 356.48, 93.06, 0.00, 0.00, 263.42, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 26, '2010-10-31', 2010, 10, 0, 263.42, 93.06, 0.00, 0.00, 170.36, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 27, '2010-11-15', 2010, 11, 0, 170.36, 93.06, 0.00, 0.00, 77.30, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(8, '10125', '', 28, '2010-11-30', 2010, 11, 0, 77.30, 77.30, 0.00, 0.00, 0.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(9, '10125', '', 1, '2009-10-15', 2009, 10, 0, 1772.00, 62.50, 0.00, 0.00, 1709.50, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 2, '2009-10-31', 2009, 10, 0, 1709.50, 62.50, 0.00, 0.00, 1647.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(9, '10125', '', 3, '2009-11-15', 2009, 11, 0, 1647.00, 62.50, 0.00, 0.00, 1584.50, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 4, '2009-11-30', 2009, 11, 0, 1584.50, 62.50, 0.00, 0.00, 1522.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 5, '2009-12-15', 2009, 12, 0, 1522.00, 62.50, 0.00, 0.00, 1459.50, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 6, '2009-12-31', 2009, 12, 0, 1459.50, 62.50, 0.00, 0.00, 1397.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 7, '2010-01-15', 2010, 1, 0, 1397.00, 62.50, 0.00, 0.00, 1334.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 8, '2010-01-31', 2010, 1, 0, 1334.50, 62.50, 0.00, 0.00, 1272.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 9, '2010-02-15', 2010, 2, 0, 1272.00, 62.50, 0.00, 0.00, 1209.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 10, '2010-02-28', 2010, 2, 0, 1209.50, 62.50, 0.00, 0.00, 1147.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 11, '2010-03-15', 2010, 3, 0, 1147.00, 62.50, 0.00, 0.00, 1084.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 12, '2010-03-31', 2010, 3, 0, 1084.50, 62.50, 0.00, 0.00, 1022.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 13, '2010-04-15', 2010, 4, 0, 1022.00, 62.50, 0.00, 0.00, 959.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 14, '2010-04-30', 2010, 4, 0, 959.50, 62.50, 0.00, 0.00, 897.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 15, '2010-05-15', 2010, 5, 0, 897.00, 62.50, 0.00, 0.00, 834.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 16, '2010-05-31', 2010, 5, 0, 834.50, 62.50, 0.00, 0.00, 772.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 17, '2010-06-15', 2010, 6, 0, 772.00, 62.50, 0.00, 0.00, 709.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 18, '2010-06-30', 2010, 6, 0, 709.50, 62.50, 0.00, 0.00, 647.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 19, '2010-07-15', 2010, 7, 0, 647.00, 62.50, 0.00, 0.00, 584.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 20, '2010-07-31', 2010, 7, 0, 584.50, 62.50, 0.00, 0.00, 522.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 21, '2010-08-15', 2010, 8, 0, 522.00, 62.50, 0.00, 0.00, 459.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 22, '2010-08-31', 2010, 8, 0, 459.50, 62.50, 0.00, 0.00, 397.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 23, '2010-09-15', 2010, 9, 0, 397.00, 62.50, 0.00, 0.00, 334.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 24, '2010-09-30', 2010, 9, 0, 334.50, 62.50, 0.00, 0.00, 272.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 25, '2010-10-15', 2010, 10, 0, 272.00, 62.50, 0.00, 0.00, 209.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 26, '2010-10-31', 2010, 10, 0, 209.50, 62.50, 0.00, 0.00, 147.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 27, '2010-11-15', 2010, 11, 0, 147.00, 62.50, 0.00, 0.00, 84.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 28, '2010-11-30', 2010, 11, 0, 84.50, 62.50, 0.00, 0.00, 22.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(9, '10125', '', 29, '2010-12-15', 2010, 12, 0, 22.00, 22.00, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 1, '2009-10-15', 2009, 10, 0, 4893.85, 191.52, 0.00, 0.00, 4702.33, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 2, '2009-10-31', 2009, 10, 0, 4702.33, 191.52, 0.00, 0.00, 4510.81, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(10, '10131', '', 3, '2009-11-15', 2009, 11, 0, 4510.81, 191.52, 0.00, 0.00, 4319.29, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 4, '2009-11-30', 2009, 11, 0, 4319.29, 191.52, 0.00, 0.00, 4127.77, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 5, '2009-12-15', 2009, 12, 0, 4127.77, 191.52, 0.00, 0.00, 3936.25, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 6, '2009-12-31', 2009, 12, 0, 3936.25, 191.52, 0.00, 0.00, 3744.73, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 7, '2010-01-15', 2010, 1, 0, 3744.73, 191.52, 0.00, 0.00, 3553.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 8, '2010-01-31', 2010, 1, 0, 3553.21, 191.52, 0.00, 0.00, 3361.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 9, '2010-02-15', 2010, 2, 0, 3361.69, 191.52, 0.00, 0.00, 3170.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 10, '2010-02-28', 2010, 2, 0, 3170.17, 191.52, 0.00, 0.00, 2978.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 11, '2010-03-15', 2010, 3, 0, 2978.65, 191.52, 0.00, 0.00, 2787.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 12, '2010-03-31', 2010, 3, 0, 2787.13, 191.52, 0.00, 0.00, 2595.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 13, '2010-04-15', 2010, 4, 0, 2595.61, 191.52, 0.00, 0.00, 2404.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 14, '2010-04-30', 2010, 4, 0, 2404.09, 191.52, 0.00, 0.00, 2212.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 15, '2010-05-15', 2010, 5, 0, 2212.57, 191.52, 0.00, 0.00, 2021.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 16, '2010-05-31', 2010, 5, 0, 2021.05, 191.52, 0.00, 0.00, 1829.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 17, '2010-06-15', 2010, 6, 0, 1829.53, 191.52, 0.00, 0.00, 1638.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 18, '2010-06-30', 2010, 6, 0, 1638.01, 191.52, 0.00, 0.00, 1446.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 19, '2010-07-15', 2010, 7, 0, 1446.49, 191.52, 0.00, 0.00, 1254.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 20, '2010-07-31', 2010, 7, 0, 1254.97, 191.52, 0.00, 0.00, 1063.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 21, '2010-08-15', 2010, 8, 0, 1063.45, 191.52, 0.00, 0.00, 871.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 22, '2010-08-31', 2010, 8, 0, 871.93, 191.52, 0.00, 0.00, 680.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 23, '2010-09-15', 2010, 9, 0, 680.41, 191.52, 0.00, 0.00, 488.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 24, '2010-09-30', 2010, 9, 0, 488.89, 191.52, 0.00, 0.00, 297.37, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 25, '2010-10-15', 2010, 10, 0, 297.37, 191.52, 0.00, 0.00, 105.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(10, '10131', '', 26, '2010-10-31', 2010, 10, 0, 105.85, 105.85, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 1, '2009-10-15', 2009, 10, 0, 1627.70, 69.59, 0.00, 0.00, 1558.11, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 2, '2009-10-31', 2009, 10, 0, 1558.11, 69.59, 0.00, 0.00, 1488.52, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(11, '10131', '', 3, '2009-11-15', 2009, 11, 0, 1488.52, 69.59, 0.00, 0.00, 1418.93, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 4, '2009-11-30', 2009, 11, 0, 1418.93, 69.59, 0.00, 0.00, 1349.34, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 5, '2009-12-15', 2009, 12, 0, 1349.34, 69.59, 0.00, 0.00, 1279.75, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 6, '2009-12-31', 2009, 12, 0, 1279.75, 69.59, 0.00, 0.00, 1210.16, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 7, '2010-01-15', 2010, 1, 0, 1210.16, 69.59, 0.00, 0.00, 1140.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 8, '2010-01-31', 2010, 1, 0, 1140.57, 69.59, 0.00, 0.00, 1070.98, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 9, '2010-02-15', 2010, 2, 0, 1070.98, 69.59, 0.00, 0.00, 1001.39, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 10, '2010-02-28', 2010, 2, 0, 1001.39, 69.59, 0.00, 0.00, 931.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 11, '2010-03-15', 2010, 3, 0, 931.80, 69.59, 0.00, 0.00, 862.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 12, '2010-03-31', 2010, 3, 0, 862.21, 69.59, 0.00, 0.00, 792.62, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 13, '2010-04-15', 2010, 4, 0, 792.62, 69.59, 0.00, 0.00, 723.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 14, '2010-04-30', 2010, 4, 0, 723.03, 69.59, 0.00, 0.00, 653.44, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 15, '2010-05-15', 2010, 5, 0, 653.44, 69.59, 0.00, 0.00, 583.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 16, '2010-05-31', 2010, 5, 0, 583.85, 69.59, 0.00, 0.00, 514.26, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 17, '2010-06-15', 2010, 6, 0, 514.26, 69.59, 0.00, 0.00, 444.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 18, '2010-06-30', 2010, 6, 0, 444.67, 69.59, 0.00, 0.00, 375.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 19, '2010-07-15', 2010, 7, 0, 375.08, 69.59, 0.00, 0.00, 305.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 20, '2010-07-31', 2010, 7, 0, 305.49, 69.59, 0.00, 0.00, 235.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 21, '2010-08-15', 2010, 8, 0, 235.90, 69.59, 0.00, 0.00, 166.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 22, '2010-08-31', 2010, 8, 0, 166.31, 69.59, 0.00, 0.00, 96.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 23, '2010-09-15', 2010, 9, 0, 96.72, 69.59, 0.00, 0.00, 27.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(11, '10131', '', 24, '2010-09-30', 2010, 9, 0, 27.13, 27.13, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(12, '10131', '', 1, '2009-10-15', 2009, 10, 0, 150.00, 50.00, 0.00, 0.00, 100.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(12, '10131', '', 2, '2009-10-31', 2009, 10, 0, 100.00, 50.00, 0.00, 0.00, 50.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(12, '10131', '', 3, '2009-11-15', 2009, 11, 0, 50.00, 50.00, 0.00, 0.00, 0.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(13, '10131', '', 1, '2009-10-15', 2009, 10, 0, 720.94, 60.39, 0.00, 0.00, 660.55, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(13, '10131', '', 2, '2009-10-31', 2009, 10, 0, 660.55, 60.39, 0.00, 0.00, 600.16, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(13, '10131', '', 3, '2009-11-15', 2009, 11, 0, 600.16, 60.39, 0.00, 0.00, 539.77, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(13, '10131', '', 4, '2009-11-30', 2009, 11, 0, 539.77, 60.39, 0.00, 0.00, 479.38, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(13, '10131', '', 5, '2009-12-15', 2009, 12, 0, 479.38, 60.39, 0.00, 0.00, 418.99, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(13, '10131', '', 6, '2009-12-31', 2009, 12, 0, 418.99, 60.39, 0.00, 0.00, 358.60, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(13, '10131', '', 7, '2010-01-15', 2010, 1, 0, 358.60, 60.39, 0.00, 0.00, 298.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(13, '10131', '', 8, '2010-01-31', 2010, 1, 0, 298.21, 60.39, 0.00, 0.00, 237.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(13, '10131', '', 9, '2010-02-15', 2010, 2, 0, 237.82, 60.39, 0.00, 0.00, 177.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(13, '10131', '', 10, '2010-02-28', 2010, 2, 0, 177.43, 60.39, 0.00, 0.00, 117.04, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(13, '10131', '', 11, '2010-03-15', 2010, 3, 0, 117.04, 60.39, 0.00, 0.00, 56.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(13, '10131', '', 12, '2010-03-31', 2010, 3, 0, 56.65, 56.65, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 1, '2009-10-15', 2009, 10, 0, 286.92, 13.51, 0.00, 0.00, 273.41, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 2, '2009-10-31', 2009, 10, 0, 273.41, 13.51, 0.00, 0.00, 259.90, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(14, '10178', '', 3, '2009-11-15', 2009, 11, 0, 259.90, 13.51, 0.00, 0.00, 246.39, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 4, '2009-11-30', 2009, 11, 0, 246.39, 13.51, 0.00, 0.00, 232.88, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 5, '2009-12-15', 2009, 12, 0, 232.88, 13.51, 0.00, 0.00, 219.37, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 6, '2009-12-31', 2009, 12, 0, 219.37, 13.51, 0.00, 0.00, 205.86, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 7, '2010-01-15', 2010, 1, 0, 205.86, 13.51, 0.00, 0.00, 192.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 8, '2010-01-31', 2010, 1, 0, 192.35, 13.51, 0.00, 0.00, 178.84, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 9, '2010-02-15', 2010, 2, 0, 178.84, 13.51, 0.00, 0.00, 165.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 10, '2010-02-28', 2010, 2, 0, 165.33, 13.51, 0.00, 0.00, 151.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 11, '2010-03-15', 2010, 3, 0, 151.82, 13.51, 0.00, 0.00, 138.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 12, '2010-03-31', 2010, 3, 0, 138.31, 13.51, 0.00, 0.00, 124.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 13, '2010-04-15', 2010, 4, 0, 124.80, 13.51, 0.00, 0.00, 111.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 14, '2010-04-30', 2010, 4, 0, 111.29, 13.51, 0.00, 0.00, 97.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 15, '2010-05-15', 2010, 5, 0, 97.78, 13.51, 0.00, 0.00, 84.27, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 16, '2010-05-31', 2010, 5, 0, 84.27, 13.51, 0.00, 0.00, 70.76, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 17, '2010-06-15', 2010, 6, 0, 70.76, 13.51, 0.00, 0.00, 57.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 18, '2010-06-30', 2010, 6, 0, 57.25, 13.51, 0.00, 0.00, 43.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 19, '2010-07-15', 2010, 7, 0, 43.74, 13.51, 0.00, 0.00, 30.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 20, '2010-07-31', 2010, 7, 0, 30.23, 13.51, 0.00, 0.00, 16.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 21, '2010-08-15', 2010, 8, 0, 16.72, 13.51, 0.00, 0.00, 3.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(14, '10178', '', 22, '2010-08-31', 2010, 8, 0, 3.21, 3.21, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 1, '2009-10-15', 2009, 10, 0, 1199.95, 44.45, 0.00, 0.00, 1155.50, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 2, '2009-10-31', 2009, 10, 0, 1155.50, 44.45, 0.00, 0.00, 1111.05, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(15, '10109', '', 3, '2009-11-15', 2009, 11, 0, 1111.05, 44.45, 0.00, 0.00, 1066.60, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 4, '2009-11-30', 2009, 11, 0, 1066.60, 44.45, 0.00, 0.00, 1022.15, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 5, '2009-12-15', 2009, 12, 0, 1022.15, 44.45, 0.00, 0.00, 977.70, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 6, '2009-12-31', 2009, 12, 0, 977.70, 44.45, 0.00, 0.00, 933.25, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 7, '2010-01-15', 2010, 1, 0, 933.25, 44.45, 0.00, 0.00, 888.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 8, '2010-01-31', 2010, 1, 0, 888.80, 44.45, 0.00, 0.00, 844.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 9, '2010-02-15', 2010, 2, 0, 844.35, 44.45, 0.00, 0.00, 799.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 10, '2010-02-28', 2010, 2, 0, 799.90, 44.45, 0.00, 0.00, 755.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 11, '2010-03-15', 2010, 3, 0, 755.45, 44.45, 0.00, 0.00, 711.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 12, '2010-03-31', 2010, 3, 0, 711.00, 44.45, 0.00, 0.00, 666.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 13, '2010-04-15', 2010, 4, 0, 666.55, 44.45, 0.00, 0.00, 622.10, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 14, '2010-04-30', 2010, 4, 0, 622.10, 44.45, 0.00, 0.00, 577.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 15, '2010-05-15', 2010, 5, 0, 577.65, 44.45, 0.00, 0.00, 533.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 16, '2010-05-31', 2010, 5, 0, 533.20, 44.45, 0.00, 0.00, 488.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 17, '2010-06-15', 2010, 6, 0, 488.75, 44.45, 0.00, 0.00, 444.30, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 18, '2010-06-30', 2010, 6, 0, 444.30, 44.45, 0.00, 0.00, 399.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 19, '2010-07-15', 2010, 7, 0, 399.85, 44.45, 0.00, 0.00, 355.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 20, '2010-07-31', 2010, 7, 0, 355.40, 44.45, 0.00, 0.00, 310.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 21, '2010-08-15', 2010, 8, 0, 310.95, 44.45, 0.00, 0.00, 266.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 22, '2010-08-31', 2010, 8, 0, 266.50, 44.45, 0.00, 0.00, 222.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 23, '2010-09-15', 2010, 9, 0, 222.05, 44.45, 0.00, 0.00, 177.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 24, '2010-09-30', 2010, 9, 0, 177.60, 44.45, 0.00, 0.00, 133.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 25, '2010-10-15', 2010, 10, 0, 133.15, 44.45, 0.00, 0.00, 88.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 26, '2010-10-31', 2010, 10, 0, 88.70, 44.45, 0.00, 0.00, 44.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(15, '10109', '', 27, '2010-11-15', 2010, 11, 0, 44.25, 44.25, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 1, '2009-10-15', 2009, 10, 0, 1390.39, 31.78, 0.00, 0.00, 1358.61, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 2, '2009-10-31', 2009, 10, 0, 1358.61, 31.78, 0.00, 0.00, 1326.83, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(16, '10109', '', 3, '2009-11-15', 2009, 11, 0, 1326.83, 31.78, 0.00, 0.00, 1295.05, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 4, '2009-11-30', 2009, 11, 0, 1295.05, 31.78, 0.00, 0.00, 1263.27, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 5, '2009-12-15', 2009, 12, 0, 1263.27, 31.78, 0.00, 0.00, 1231.49, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 6, '2009-12-31', 2009, 12, 0, 1231.49, 31.78, 0.00, 0.00, 1199.71, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 7, '2010-01-15', 2010, 1, 0, 1199.71, 31.78, 0.00, 0.00, 1167.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 8, '2010-01-31', 2010, 1, 0, 1167.93, 31.78, 0.00, 0.00, 1136.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 9, '2010-02-15', 2010, 2, 0, 1136.15, 31.78, 0.00, 0.00, 1104.37, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 10, '2010-02-28', 2010, 2, 0, 1104.37, 31.78, 0.00, 0.00, 1072.59, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 11, '2010-03-15', 2010, 3, 0, 1072.59, 31.78, 0.00, 0.00, 1040.81, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 12, '2010-03-31', 2010, 3, 0, 1040.81, 31.78, 0.00, 0.00, 1009.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 13, '2010-04-15', 2010, 4, 0, 1009.03, 31.78, 0.00, 0.00, 977.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 14, '2010-04-30', 2010, 4, 0, 977.25, 31.78, 0.00, 0.00, 945.47, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 15, '2010-05-15', 2010, 5, 0, 945.47, 31.78, 0.00, 0.00, 913.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `nomprestamos_detalles` (`numpre`, `ficha`, `tipocuo`, `numcuo`, `fechaven`, `anioven`, `mesven`, `dias`, `salinicial`, `montocuo`, `montoint`, `montocap`, `salfinal`, `fechacan`, `estadopre`, `detalle`, `dedespecial`, `codnom`, `sfechaven`, `sfechacan`, `ee`) VALUES
(16, '10109', '', 16, '2010-05-31', 2010, 5, 0, 913.69, 31.78, 0.00, 0.00, 881.91, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 17, '2010-06-15', 2010, 6, 0, 881.91, 31.78, 0.00, 0.00, 850.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 18, '2010-06-30', 2010, 6, 0, 850.13, 31.78, 0.00, 0.00, 818.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 19, '2010-07-15', 2010, 7, 0, 818.35, 31.78, 0.00, 0.00, 786.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 20, '2010-07-31', 2010, 7, 0, 786.57, 31.78, 0.00, 0.00, 754.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 21, '2010-08-15', 2010, 8, 0, 754.79, 31.78, 0.00, 0.00, 723.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 22, '2010-08-31', 2010, 8, 0, 723.01, 31.78, 0.00, 0.00, 691.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 23, '2010-09-15', 2010, 9, 0, 691.23, 31.78, 0.00, 0.00, 659.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 24, '2010-09-30', 2010, 9, 0, 659.45, 31.78, 0.00, 0.00, 627.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 25, '2010-10-15', 2010, 10, 0, 627.67, 31.78, 0.00, 0.00, 595.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 26, '2010-10-31', 2010, 10, 0, 595.89, 31.78, 0.00, 0.00, 564.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 27, '2010-11-15', 2010, 11, 0, 564.11, 31.78, 0.00, 0.00, 532.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 28, '2010-11-30', 2010, 11, 0, 532.33, 31.78, 0.00, 0.00, 500.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 29, '2010-12-15', 2010, 12, 0, 500.55, 31.78, 0.00, 0.00, 468.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 30, '2010-12-31', 2010, 12, 0, 468.77, 31.78, 0.00, 0.00, 436.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 31, '2011-01-15', 2011, 1, 0, 436.99, 31.78, 0.00, 0.00, 405.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 32, '2011-01-31', 2011, 1, 0, 405.21, 31.78, 0.00, 0.00, 373.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 33, '2011-02-15', 2011, 2, 0, 373.43, 31.78, 0.00, 0.00, 341.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 34, '2011-02-28', 2011, 2, 0, 341.65, 31.78, 0.00, 0.00, 309.87, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 35, '2011-03-15', 2011, 3, 0, 309.87, 31.78, 0.00, 0.00, 278.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 36, '2011-03-31', 2011, 3, 0, 278.09, 31.78, 0.00, 0.00, 246.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 37, '2011-04-15', 2011, 4, 0, 246.31, 31.78, 0.00, 0.00, 214.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 38, '2011-04-30', 2011, 4, 0, 214.53, 31.78, 0.00, 0.00, 182.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 39, '2011-05-15', 2011, 5, 0, 182.75, 31.78, 0.00, 0.00, 150.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 40, '2011-05-31', 2011, 5, 0, 150.97, 31.78, 0.00, 0.00, 119.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 41, '2011-06-15', 2011, 6, 0, 119.19, 31.78, 0.00, 0.00, 87.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 42, '2011-06-30', 2011, 6, 0, 87.41, 31.78, 0.00, 0.00, 55.63, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 43, '2011-07-15', 2011, 7, 0, 55.63, 31.78, 0.00, 0.00, 23.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(16, '10109', '', 44, '2011-07-31', 2011, 7, 0, 23.85, 23.85, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 1, '2009-10-15', 2009, 10, 0, 640.98, 54.36, 0.00, 0.00, 586.62, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 2, '2009-10-31', 2009, 10, 0, 586.62, 54.36, 0.00, 0.00, 532.26, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(17, '10238', '', 3, '2009-11-15', 2009, 11, 0, 532.26, 54.36, 0.00, 0.00, 477.90, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 4, '2009-11-30', 2009, 11, 0, 477.90, 54.36, 0.00, 0.00, 423.54, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 5, '2009-12-15', 2009, 12, 0, 423.54, 54.36, 0.00, 0.00, 369.18, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 6, '2009-12-31', 2009, 12, 0, 369.18, 54.36, 0.00, 0.00, 314.82, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 7, '2010-01-15', 2010, 1, 0, 314.82, 54.36, 0.00, 0.00, 260.46, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 8, '2010-01-31', 2010, 1, 0, 260.46, 54.36, 0.00, 0.00, 206.10, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 9, '2010-02-15', 2010, 2, 0, 206.10, 54.36, 0.00, 0.00, 151.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 10, '2010-02-28', 2010, 2, 0, 151.74, 54.36, 0.00, 0.00, 97.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 11, '2010-03-15', 2010, 3, 0, 97.38, 54.36, 0.00, 0.00, 43.02, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(17, '10238', '', 12, '2010-03-31', 2010, 3, 0, 43.02, 43.02, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 1, '2009-10-15', 2009, 10, 0, 2883.52, 89.59, 0.00, 0.00, 2793.93, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 2, '2009-10-31', 2009, 10, 0, 2793.93, 89.59, 0.00, 0.00, 2704.34, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(18, '10238', '', 3, '2009-11-15', 2009, 11, 0, 2704.34, 89.59, 0.00, 0.00, 2614.75, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 4, '2009-11-30', 2009, 11, 0, 2614.75, 89.59, 0.00, 0.00, 2525.16, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 5, '2009-12-15', 2009, 12, 0, 2525.16, 89.59, 0.00, 0.00, 2435.57, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 6, '2009-12-31', 2009, 12, 0, 2435.57, 89.59, 0.00, 0.00, 2345.98, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 7, '2010-01-15', 2010, 1, 0, 2345.98, 89.59, 0.00, 0.00, 2256.39, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 8, '2010-01-31', 2010, 1, 0, 2256.39, 89.59, 0.00, 0.00, 2166.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 9, '2010-02-15', 2010, 2, 0, 2166.80, 89.59, 0.00, 0.00, 2077.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 10, '2010-02-28', 2010, 2, 0, 2077.21, 89.59, 0.00, 0.00, 1987.62, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 11, '2010-03-15', 2010, 3, 0, 1987.62, 89.59, 0.00, 0.00, 1898.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 12, '2010-03-31', 2010, 3, 0, 1898.03, 89.59, 0.00, 0.00, 1808.44, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 13, '2010-04-15', 2010, 4, 0, 1808.44, 89.59, 0.00, 0.00, 1718.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 14, '2010-04-30', 2010, 4, 0, 1718.85, 89.59, 0.00, 0.00, 1629.26, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 15, '2010-05-15', 2010, 5, 0, 1629.26, 89.59, 0.00, 0.00, 1539.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 16, '2010-05-31', 2010, 5, 0, 1539.67, 89.59, 0.00, 0.00, 1450.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 17, '2010-06-15', 2010, 6, 0, 1450.08, 89.59, 0.00, 0.00, 1360.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 18, '2010-06-30', 2010, 6, 0, 1360.49, 89.59, 0.00, 0.00, 1270.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 19, '2010-07-15', 2010, 7, 0, 1270.90, 89.59, 0.00, 0.00, 1181.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 20, '2010-07-31', 2010, 7, 0, 1181.31, 89.59, 0.00, 0.00, 1091.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 21, '2010-08-15', 2010, 8, 0, 1091.72, 89.59, 0.00, 0.00, 1002.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 22, '2010-08-31', 2010, 8, 0, 1002.13, 89.59, 0.00, 0.00, 912.54, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 23, '2010-09-15', 2010, 9, 0, 912.54, 89.59, 0.00, 0.00, 822.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 24, '2010-09-30', 2010, 9, 0, 822.95, 89.59, 0.00, 0.00, 733.36, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 25, '2010-10-15', 2010, 10, 0, 733.36, 89.59, 0.00, 0.00, 643.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 26, '2010-10-31', 2010, 10, 0, 643.77, 89.59, 0.00, 0.00, 554.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 27, '2010-11-15', 2010, 11, 0, 554.18, 89.59, 0.00, 0.00, 464.59, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 28, '2010-11-30', 2010, 11, 0, 464.59, 89.59, 0.00, 0.00, 375.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 29, '2010-12-15', 2010, 12, 0, 375.00, 89.59, 0.00, 0.00, 285.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 30, '2010-12-31', 2010, 12, 0, 285.41, 89.59, 0.00, 0.00, 195.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 31, '2011-01-15', 2011, 1, 0, 195.82, 89.59, 0.00, 0.00, 106.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 32, '2011-01-31', 2011, 1, 0, 106.23, 89.59, 0.00, 0.00, 16.64, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(18, '10238', '', 33, '2011-02-15', 2011, 2, 0, 16.64, 16.64, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(19, '10238', '', 1, '2009-10-15', 2009, 10, 0, 73.24, 8.38, 0.00, 0.00, 64.86, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(19, '10238', '', 2, '2009-10-31', 2009, 10, 0, 64.86, 8.38, 0.00, 0.00, 56.48, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(19, '10238', '', 3, '2009-11-15', 2009, 11, 0, 56.48, 8.38, 0.00, 0.00, 48.10, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(19, '10238', '', 4, '2009-11-30', 2009, 11, 0, 48.10, 8.38, 0.00, 0.00, 39.72, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(19, '10238', '', 5, '2009-12-15', 2009, 12, 0, 39.72, 8.38, 0.00, 0.00, 31.34, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(19, '10238', '', 6, '2009-12-31', 2009, 12, 0, 31.34, 8.38, 0.00, 0.00, 22.96, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(19, '10238', '', 7, '2010-01-15', 2010, 1, 0, 22.96, 8.38, 0.00, 0.00, 14.58, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(19, '10238', '', 8, '2010-01-31', 2010, 1, 0, 14.58, 8.38, 0.00, 0.00, 6.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(19, '10238', '', 9, '2010-02-15', 2010, 2, 0, 6.20, 6.20, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 1, '2009-10-15', 2009, 10, 0, 10800.00, 450.00, 0.00, 0.00, 10350.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 2, '2009-10-31', 2009, 10, 0, 10350.00, 450.00, 0.00, 0.00, 9900.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(20, '10127', '', 3, '2009-11-15', 2009, 11, 0, 9900.00, 450.00, 0.00, 0.00, 9450.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 4, '2009-11-30', 2009, 11, 0, 9450.00, 450.00, 0.00, 0.00, 9000.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 5, '2009-12-15', 2009, 12, 0, 9000.00, 450.00, 0.00, 0.00, 8550.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 6, '2009-12-31', 2009, 12, 0, 8550.00, 450.00, 0.00, 0.00, 8100.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 7, '2010-01-15', 2010, 1, 0, 8100.00, 450.00, 0.00, 0.00, 7650.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 8, '2010-01-31', 2010, 1, 0, 7650.00, 450.00, 0.00, 0.00, 7200.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 9, '2010-02-15', 2010, 2, 0, 7200.00, 450.00, 0.00, 0.00, 6750.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 10, '2010-02-28', 2010, 2, 0, 6750.00, 450.00, 0.00, 0.00, 6300.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 11, '2010-03-15', 2010, 3, 0, 6300.00, 450.00, 0.00, 0.00, 5850.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 12, '2010-03-31', 2010, 3, 0, 5850.00, 450.00, 0.00, 0.00, 5400.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 13, '2010-04-15', 2010, 4, 0, 5400.00, 450.00, 0.00, 0.00, 4950.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 14, '2010-04-30', 2010, 4, 0, 4950.00, 450.00, 0.00, 0.00, 4500.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 15, '2010-05-15', 2010, 5, 0, 4500.00, 450.00, 0.00, 0.00, 4050.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 16, '2010-05-31', 2010, 5, 0, 4050.00, 450.00, 0.00, 0.00, 3600.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 17, '2010-06-15', 2010, 6, 0, 3600.00, 450.00, 0.00, 0.00, 3150.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 18, '2010-06-30', 2010, 6, 0, 3150.00, 450.00, 0.00, 0.00, 2700.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 19, '2010-07-15', 2010, 7, 0, 2700.00, 450.00, 0.00, 0.00, 2250.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 20, '2010-07-31', 2010, 7, 0, 2250.00, 450.00, 0.00, 0.00, 1800.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 21, '2010-08-15', 2010, 8, 0, 1800.00, 450.00, 0.00, 0.00, 1350.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 22, '2010-08-31', 2010, 8, 0, 1350.00, 450.00, 0.00, 0.00, 900.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 23, '2010-09-15', 2010, 9, 0, 900.00, 450.00, 0.00, 0.00, 450.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(20, '10127', '', 24, '2010-09-30', 2010, 9, 0, 450.00, 450.00, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 1, '2009-10-15', 2009, 10, 0, 838.40, 60.49, 0.00, 0.00, 777.91, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 2, '2009-10-31', 2009, 10, 0, 777.91, 60.49, 0.00, 0.00, 717.42, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(21, '10127', '', 3, '2009-11-15', 2009, 11, 0, 717.42, 60.49, 0.00, 0.00, 656.93, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 4, '2009-11-30', 2009, 11, 0, 656.93, 60.49, 0.00, 0.00, 596.44, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 5, '2009-12-15', 2009, 12, 0, 596.44, 60.49, 0.00, 0.00, 535.95, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 6, '2009-12-31', 2009, 12, 0, 535.95, 60.49, 0.00, 0.00, 475.46, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 7, '2010-01-15', 2010, 1, 0, 475.46, 60.49, 0.00, 0.00, 414.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 8, '2010-01-31', 2010, 1, 0, 414.97, 60.49, 0.00, 0.00, 354.48, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 9, '2010-02-15', 2010, 2, 0, 354.48, 60.49, 0.00, 0.00, 293.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 10, '2010-02-28', 2010, 2, 0, 293.99, 60.49, 0.00, 0.00, 233.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 11, '2010-03-15', 2010, 3, 0, 233.50, 60.49, 0.00, 0.00, 173.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 12, '2010-03-31', 2010, 3, 0, 173.01, 60.49, 0.00, 0.00, 112.52, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 13, '2010-04-15', 2010, 4, 0, 112.52, 60.49, 0.00, 0.00, 52.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(21, '10127', '', 14, '2010-04-30', 2010, 4, 0, 52.03, 52.03, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 1, '2009-10-15', 2009, 10, 0, 2506.44, 129.17, 0.00, 0.00, 2377.27, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 2, '2009-10-31', 2009, 10, 0, 2377.27, 129.17, 0.00, 0.00, 2248.10, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(22, '10072', '', 3, '2009-11-15', 2009, 11, 0, 2248.10, 129.17, 0.00, 0.00, 2118.93, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(22, '10072', '', 4, '2009-11-30', 2009, 11, 0, 2118.93, 129.17, 0.00, 0.00, 1989.76, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(22, '10072', '', 5, '2009-12-15', 2009, 12, 0, 1989.76, 129.17, 0.00, 0.00, 1860.59, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(22, '10072', '', 6, '2009-12-31', 2009, 12, 0, 1860.59, 129.17, 0.00, 0.00, 1731.42, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 7, '2010-01-15', 2010, 1, 0, 1731.42, 129.17, 0.00, 0.00, 1602.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 8, '2010-01-31', 2010, 1, 0, 1602.25, 129.17, 0.00, 0.00, 1473.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 9, '2010-02-15', 2010, 2, 0, 1473.08, 129.17, 0.00, 0.00, 1343.91, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 10, '2010-02-28', 2010, 2, 0, 1343.91, 129.17, 0.00, 0.00, 1214.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 11, '2010-03-15', 2010, 3, 0, 1214.74, 129.17, 0.00, 0.00, 1085.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 12, '2010-03-31', 2010, 3, 0, 1085.57, 129.17, 0.00, 0.00, 956.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 13, '2010-04-15', 2010, 4, 0, 956.40, 129.17, 0.00, 0.00, 827.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 14, '2010-04-30', 2010, 4, 0, 827.23, 129.17, 0.00, 0.00, 698.06, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 15, '2010-05-15', 2010, 5, 0, 698.06, 129.17, 0.00, 0.00, 568.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 16, '2010-05-31', 2010, 5, 0, 568.89, 129.17, 0.00, 0.00, 439.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 17, '2010-06-15', 2010, 6, 0, 439.72, 129.17, 0.00, 0.00, 310.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 18, '2010-06-30', 2010, 6, 0, 310.55, 129.17, 0.00, 0.00, 181.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 19, '2010-07-15', 2010, 7, 0, 181.38, 129.17, 0.00, 0.00, 52.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(22, '10072', '', 20, '2010-07-31', 2010, 7, 0, 52.21, 52.21, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 1, '2009-10-15', 2009, 10, 0, 587.33, 25.28, 0.00, 0.00, 562.05, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 2, '2009-10-31', 2009, 10, 0, 562.05, 25.28, 0.00, 0.00, 536.77, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(23, '10072', '', 3, '2009-11-15', 2009, 11, 0, 536.77, 25.28, 0.00, 0.00, 511.49, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(23, '10072', '', 4, '2009-11-30', 2009, 11, 0, 511.49, 25.28, 0.00, 0.00, 486.21, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(23, '10072', '', 5, '2009-12-15', 2009, 12, 0, 486.21, 25.28, 0.00, 0.00, 460.93, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(23, '10072', '', 6, '2009-12-31', 2009, 12, 0, 460.93, 25.28, 0.00, 0.00, 435.65, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 7, '2010-01-15', 2010, 1, 0, 435.65, 25.28, 0.00, 0.00, 410.37, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 8, '2010-01-31', 2010, 1, 0, 410.37, 25.28, 0.00, 0.00, 385.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 9, '2010-02-15', 2010, 2, 0, 385.09, 25.28, 0.00, 0.00, 359.81, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 10, '2010-02-28', 2010, 2, 0, 359.81, 25.28, 0.00, 0.00, 334.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 11, '2010-03-15', 2010, 3, 0, 334.53, 25.28, 0.00, 0.00, 309.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 12, '2010-03-31', 2010, 3, 0, 309.25, 25.28, 0.00, 0.00, 283.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 13, '2010-04-15', 2010, 4, 0, 283.97, 25.28, 0.00, 0.00, 258.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 14, '2010-04-30', 2010, 4, 0, 258.69, 25.28, 0.00, 0.00, 233.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 15, '2010-05-15', 2010, 5, 0, 233.41, 25.28, 0.00, 0.00, 208.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 16, '2010-05-31', 2010, 5, 0, 208.13, 25.28, 0.00, 0.00, 182.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 17, '2010-06-15', 2010, 6, 0, 182.85, 25.28, 0.00, 0.00, 157.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 18, '2010-06-30', 2010, 6, 0, 157.57, 25.28, 0.00, 0.00, 132.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 19, '2010-07-15', 2010, 7, 0, 132.29, 25.28, 0.00, 0.00, 107.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 20, '2010-07-31', 2010, 7, 0, 107.01, 25.28, 0.00, 0.00, 81.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 21, '2010-08-15', 2010, 8, 0, 81.73, 25.28, 0.00, 0.00, 56.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 22, '2010-08-31', 2010, 8, 0, 56.45, 25.28, 0.00, 0.00, 31.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 23, '2010-09-15', 2010, 9, 0, 31.17, 25.28, 0.00, 0.00, 5.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(23, '10072', '', 24, '2010-09-30', 2010, 9, 0, 5.89, 5.89, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 1, '2009-10-15', 2009, 10, 0, 9428.21, 410.00, 0.00, 0.00, 9018.21, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 2, '2009-10-31', 2009, 10, 0, 9018.21, 410.00, 0.00, 0.00, 8608.21, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(24, '10126', '', 3, '2009-11-15', 2009, 11, 0, 8608.21, 410.00, 0.00, 0.00, 8198.21, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 4, '2009-11-30', 2009, 11, 0, 8198.21, 410.00, 0.00, 0.00, 7788.21, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 5, '2009-12-15', 2009, 12, 0, 7788.21, 410.00, 0.00, 0.00, 7378.21, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 6, '2009-12-31', 2009, 12, 0, 7378.21, 410.00, 0.00, 0.00, 6968.21, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 7, '2010-01-15', 2010, 1, 0, 6968.21, 410.00, 0.00, 0.00, 6558.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 8, '2010-01-31', 2010, 1, 0, 6558.21, 410.00, 0.00, 0.00, 6148.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 9, '2010-02-15', 2010, 2, 0, 6148.21, 410.00, 0.00, 0.00, 5738.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 10, '2010-02-28', 2010, 2, 0, 5738.21, 410.00, 0.00, 0.00, 5328.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 11, '2010-03-15', 2010, 3, 0, 5328.21, 410.00, 0.00, 0.00, 4918.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 12, '2010-03-31', 2010, 3, 0, 4918.21, 410.00, 0.00, 0.00, 4508.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 13, '2010-04-15', 2010, 4, 0, 4508.21, 410.00, 0.00, 0.00, 4098.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 14, '2010-04-30', 2010, 4, 0, 4098.21, 410.00, 0.00, 0.00, 3688.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 15, '2010-05-15', 2010, 5, 0, 3688.21, 410.00, 0.00, 0.00, 3278.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 16, '2010-05-31', 2010, 5, 0, 3278.21, 410.00, 0.00, 0.00, 2868.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 17, '2010-06-15', 2010, 6, 0, 2868.21, 410.00, 0.00, 0.00, 2458.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 18, '2010-06-30', 2010, 6, 0, 2458.21, 410.00, 0.00, 0.00, 2048.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 19, '2010-07-15', 2010, 7, 0, 2048.21, 410.00, 0.00, 0.00, 1638.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 20, '2010-07-31', 2010, 7, 0, 1638.21, 410.00, 0.00, 0.00, 1228.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 21, '2010-08-15', 2010, 8, 0, 1228.21, 410.00, 0.00, 0.00, 818.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 22, '2010-08-31', 2010, 8, 0, 818.21, 410.00, 0.00, 0.00, 408.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(24, '10126', '', 23, '2010-09-15', 2010, 9, 0, 408.21, 408.21, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 1, '2009-10-15', 2009, 10, 0, 18829.95, 110.98, 0.00, 0.00, 18718.97, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 2, '2009-10-31', 2009, 10, 0, 18718.97, 110.98, 0.00, 0.00, 18607.99, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(25, '10114', '', 3, '2009-11-15', 2009, 11, 0, 18607.99, 110.98, 0.00, 0.00, 18497.01, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 4, '2009-11-30', 2009, 11, 0, 18497.01, 110.98, 0.00, 0.00, 18386.03, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 5, '2009-12-15', 2009, 12, 0, 18386.03, 110.98, 0.00, 0.00, 18275.05, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 6, '2009-12-31', 2009, 12, 0, 18275.05, 110.98, 0.00, 0.00, 18164.07, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 7, '2010-01-15', 2010, 1, 0, 18164.07, 110.98, 0.00, 0.00, 18053.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 8, '2010-01-31', 2010, 1, 0, 18053.09, 110.98, 0.00, 0.00, 17942.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 9, '2010-02-15', 2010, 2, 0, 17942.11, 110.98, 0.00, 0.00, 17831.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 10, '2010-02-28', 2010, 2, 0, 17831.13, 110.98, 0.00, 0.00, 17720.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 11, '2010-03-15', 2010, 3, 0, 17720.15, 110.98, 0.00, 0.00, 17609.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 12, '2010-03-31', 2010, 3, 0, 17609.17, 110.98, 0.00, 0.00, 17498.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 13, '2010-04-15', 2010, 4, 0, 17498.19, 110.98, 0.00, 0.00, 17387.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 14, '2010-04-30', 2010, 4, 0, 17387.21, 110.98, 0.00, 0.00, 17276.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 15, '2010-05-15', 2010, 5, 0, 17276.23, 110.98, 0.00, 0.00, 17165.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 16, '2010-05-31', 2010, 5, 0, 17165.25, 110.98, 0.00, 0.00, 17054.27, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 17, '2010-06-15', 2010, 6, 0, 17054.27, 110.98, 0.00, 0.00, 16943.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 18, '2010-06-30', 2010, 6, 0, 16943.29, 110.98, 0.00, 0.00, 16832.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 19, '2010-07-15', 2010, 7, 0, 16832.31, 110.98, 0.00, 0.00, 16721.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 20, '2010-07-31', 2010, 7, 0, 16721.33, 110.98, 0.00, 0.00, 16610.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 21, '2010-08-15', 2010, 8, 0, 16610.35, 110.98, 0.00, 0.00, 16499.37, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 22, '2010-08-31', 2010, 8, 0, 16499.37, 110.98, 0.00, 0.00, 16388.39, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 23, '2010-09-15', 2010, 9, 0, 16388.39, 110.98, 0.00, 0.00, 16277.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 24, '2010-09-30', 2010, 9, 0, 16277.41, 110.98, 0.00, 0.00, 16166.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 25, '2010-10-15', 2010, 10, 0, 16166.43, 110.98, 0.00, 0.00, 16055.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 26, '2010-10-31', 2010, 10, 0, 16055.45, 110.98, 0.00, 0.00, 15944.47, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 27, '2010-11-15', 2010, 11, 0, 15944.47, 110.98, 0.00, 0.00, 15833.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 28, '2010-11-30', 2010, 11, 0, 15833.49, 110.98, 0.00, 0.00, 15722.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 29, '2010-12-15', 2010, 12, 0, 15722.51, 110.98, 0.00, 0.00, 15611.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 30, '2010-12-31', 2010, 12, 0, 15611.53, 110.98, 0.00, 0.00, 15500.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 31, '2011-01-15', 2011, 1, 0, 15500.55, 110.98, 0.00, 0.00, 15389.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 32, '2011-01-31', 2011, 1, 0, 15389.57, 110.98, 0.00, 0.00, 15278.59, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 33, '2011-02-15', 2011, 2, 0, 15278.59, 110.98, 0.00, 0.00, 15167.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 34, '2011-02-28', 2011, 2, 0, 15167.61, 110.98, 0.00, 0.00, 15056.63, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 35, '2011-03-15', 2011, 3, 0, 15056.63, 110.98, 0.00, 0.00, 14945.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 36, '2011-03-31', 2011, 3, 0, 14945.65, 110.98, 0.00, 0.00, 14834.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 37, '2011-04-15', 2011, 4, 0, 14834.67, 110.98, 0.00, 0.00, 14723.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 38, '2011-04-30', 2011, 4, 0, 14723.69, 110.98, 0.00, 0.00, 14612.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 39, '2011-05-15', 2011, 5, 0, 14612.71, 110.98, 0.00, 0.00, 14501.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 40, '2011-05-31', 2011, 5, 0, 14501.73, 110.98, 0.00, 0.00, 14390.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 41, '2011-06-15', 2011, 6, 0, 14390.75, 110.98, 0.00, 0.00, 14279.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 42, '2011-06-30', 2011, 6, 0, 14279.77, 110.98, 0.00, 0.00, 14168.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 43, '2011-07-15', 2011, 7, 0, 14168.79, 110.98, 0.00, 0.00, 14057.81, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 44, '2011-07-31', 2011, 7, 0, 14057.81, 110.98, 0.00, 0.00, 13946.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 45, '2011-08-15', 2011, 8, 0, 13946.83, 110.98, 0.00, 0.00, 13835.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 46, '2011-08-31', 2011, 8, 0, 13835.85, 110.98, 0.00, 0.00, 13724.87, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 47, '2011-09-15', 2011, 9, 0, 13724.87, 110.98, 0.00, 0.00, 13613.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 48, '2011-09-30', 2011, 9, 0, 13613.89, 110.98, 0.00, 0.00, 13502.91, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 49, '2011-10-15', 2011, 10, 0, 13502.91, 110.98, 0.00, 0.00, 13391.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 50, '2011-10-31', 2011, 10, 0, 13391.93, 110.98, 0.00, 0.00, 13280.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 51, '2011-11-15', 2011, 11, 0, 13280.95, 110.98, 0.00, 0.00, 13169.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 52, '2011-11-30', 2011, 11, 0, 13169.97, 110.98, 0.00, 0.00, 13058.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 53, '2011-12-15', 2011, 12, 0, 13058.99, 110.98, 0.00, 0.00, 12948.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 54, '2011-12-31', 2011, 12, 0, 12948.01, 110.98, 0.00, 0.00, 12837.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 55, '0012-01-15', 2012, 1, 0, 12837.03, 110.98, 0.00, 0.00, 12726.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 56, '0012-01-31', 2012, 1, 0, 12726.05, 110.98, 0.00, 0.00, 12615.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 57, '0012-02-15', 2012, 2, 0, 12615.07, 110.98, 0.00, 0.00, 12504.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 58, '0012-02-29', 2012, 2, 0, 12504.09, 110.98, 0.00, 0.00, 12393.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 59, '0012-03-15', 2012, 3, 0, 12393.11, 110.98, 0.00, 0.00, 12282.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 60, '0012-03-31', 2012, 3, 0, 12282.13, 110.98, 0.00, 0.00, 12171.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 61, '0012-04-15', 2012, 4, 0, 12171.15, 110.98, 0.00, 0.00, 12060.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 62, '0012-04-30', 2012, 4, 0, 12060.17, 110.98, 0.00, 0.00, 11949.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 63, '0012-05-15', 2012, 5, 0, 11949.19, 110.98, 0.00, 0.00, 11838.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 64, '0012-05-31', 2012, 5, 0, 11838.21, 110.98, 0.00, 0.00, 11727.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 65, '0012-06-15', 2012, 6, 0, 11727.23, 110.98, 0.00, 0.00, 11616.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 66, '0012-06-30', 2012, 6, 0, 11616.25, 110.98, 0.00, 0.00, 11505.27, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 67, '0012-07-15', 2012, 7, 0, 11505.27, 110.98, 0.00, 0.00, 11394.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 68, '0012-07-31', 2012, 7, 0, 11394.29, 110.98, 0.00, 0.00, 11283.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 69, '0012-08-15', 2012, 8, 0, 11283.31, 110.98, 0.00, 0.00, 11172.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 70, '0012-08-31', 2012, 8, 0, 11172.33, 110.98, 0.00, 0.00, 11061.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 71, '0012-09-15', 2012, 9, 0, 11061.35, 110.98, 0.00, 0.00, 10950.37, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 72, '0012-09-30', 2012, 9, 0, 10950.37, 110.98, 0.00, 0.00, 10839.39, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 73, '2012-10-15', 2012, 10, 0, 10839.39, 110.98, 0.00, 0.00, 10728.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 74, '2012-10-31', 2012, 10, 0, 10728.41, 110.98, 0.00, 0.00, 10617.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 75, '2012-11-15', 2012, 11, 0, 10617.43, 110.98, 0.00, 0.00, 10506.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 76, '2012-11-30', 2012, 11, 0, 10506.45, 110.98, 0.00, 0.00, 10395.47, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 77, '2012-12-15', 2012, 12, 0, 10395.47, 110.98, 0.00, 0.00, 10284.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 78, '2012-12-31', 2012, 12, 0, 10284.49, 110.98, 0.00, 0.00, 10173.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 79, '0013-01-15', 2013, 1, 0, 10173.51, 110.98, 0.00, 0.00, 10062.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 80, '0013-01-31', 2013, 1, 0, 10062.53, 110.98, 0.00, 0.00, 9951.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 81, '0013-02-15', 2013, 2, 0, 9951.55, 110.98, 0.00, 0.00, 9840.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 82, '0013-02-28', 2013, 2, 0, 9840.57, 110.98, 0.00, 0.00, 9729.59, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 83, '0013-03-15', 2013, 3, 0, 9729.59, 110.98, 0.00, 0.00, 9618.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 84, '0013-03-31', 2013, 3, 0, 9618.61, 110.98, 0.00, 0.00, 9507.63, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 85, '0013-04-15', 2013, 4, 0, 9507.63, 110.98, 0.00, 0.00, 9396.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 86, '0013-04-30', 2013, 4, 0, 9396.65, 110.98, 0.00, 0.00, 9285.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 87, '0013-05-15', 2013, 5, 0, 9285.67, 110.98, 0.00, 0.00, 9174.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 88, '0013-05-31', 2013, 5, 0, 9174.69, 110.98, 0.00, 0.00, 9063.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 89, '0013-06-15', 2013, 6, 0, 9063.71, 110.98, 0.00, 0.00, 8952.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 90, '0013-06-30', 2013, 6, 0, 8952.73, 110.98, 0.00, 0.00, 8841.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 91, '0013-07-15', 2013, 7, 0, 8841.75, 110.98, 0.00, 0.00, 8730.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 92, '0013-07-31', 2013, 7, 0, 8730.77, 110.98, 0.00, 0.00, 8619.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 93, '0013-08-15', 2013, 8, 0, 8619.79, 110.98, 0.00, 0.00, 8508.81, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 94, '0013-08-31', 2013, 8, 0, 8508.81, 110.98, 0.00, 0.00, 8397.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 95, '0013-09-15', 2013, 9, 0, 8397.83, 110.98, 0.00, 0.00, 8286.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 96, '0013-09-30', 2013, 9, 0, 8286.85, 110.98, 0.00, 0.00, 8175.87, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 97, '2013-10-15', 2013, 10, 0, 8175.87, 110.98, 0.00, 0.00, 8064.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 98, '2013-10-31', 2013, 10, 0, 8064.89, 110.98, 0.00, 0.00, 7953.91, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 99, '2013-11-15', 2013, 11, 0, 7953.91, 110.98, 0.00, 0.00, 7842.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 100, '2013-11-30', 2013, 11, 0, 7842.93, 110.98, 0.00, 0.00, 7731.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 101, '2013-12-15', 2013, 12, 0, 7731.95, 110.98, 0.00, 0.00, 7620.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 102, '2013-12-31', 2013, 12, 0, 7620.97, 110.98, 0.00, 0.00, 7509.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 103, '0014-01-15', 2014, 1, 0, 7509.99, 110.98, 0.00, 0.00, 7399.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 104, '0014-01-31', 2014, 1, 0, 7399.01, 110.98, 0.00, 0.00, 7288.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 105, '0014-02-15', 2014, 2, 0, 7288.03, 110.98, 0.00, 0.00, 7177.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 106, '0014-02-28', 2014, 2, 0, 7177.05, 110.98, 0.00, 0.00, 7066.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 107, '0014-03-15', 2014, 3, 0, 7066.07, 110.98, 0.00, 0.00, 6955.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 108, '0014-03-31', 2014, 3, 0, 6955.09, 110.98, 0.00, 0.00, 6844.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 109, '0014-04-15', 2014, 4, 0, 6844.11, 110.98, 0.00, 0.00, 6733.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 110, '0014-04-30', 2014, 4, 0, 6733.13, 110.98, 0.00, 0.00, 6622.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 111, '0014-05-15', 2014, 5, 0, 6622.15, 110.98, 0.00, 0.00, 6511.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 112, '0014-05-31', 2014, 5, 0, 6511.17, 110.98, 0.00, 0.00, 6400.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 113, '0014-06-15', 2014, 6, 0, 6400.19, 110.98, 0.00, 0.00, 6289.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 114, '0014-06-30', 2014, 6, 0, 6289.21, 110.98, 0.00, 0.00, 6178.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 115, '0014-07-15', 2014, 7, 0, 6178.23, 110.98, 0.00, 0.00, 6067.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 116, '0014-07-31', 2014, 7, 0, 6067.25, 110.98, 0.00, 0.00, 5956.27, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 117, '0014-08-15', 2014, 8, 0, 5956.27, 110.98, 0.00, 0.00, 5845.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 118, '0014-08-31', 2014, 8, 0, 5845.29, 110.98, 0.00, 0.00, 5734.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 119, '0014-09-15', 2014, 9, 0, 5734.31, 110.98, 0.00, 0.00, 5623.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 120, '0014-09-30', 2014, 9, 0, 5623.33, 110.98, 0.00, 0.00, 5512.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 121, '2014-10-15', 2014, 10, 0, 5512.35, 110.98, 0.00, 0.00, 5401.37, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 122, '2014-10-31', 2014, 10, 0, 5401.37, 110.98, 0.00, 0.00, 5290.39, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 123, '2014-11-15', 2014, 11, 0, 5290.39, 110.98, 0.00, 0.00, 5179.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 124, '2014-11-30', 2014, 11, 0, 5179.41, 110.98, 0.00, 0.00, 5068.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 125, '2014-12-15', 2014, 12, 0, 5068.43, 110.98, 0.00, 0.00, 4957.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 126, '2014-12-31', 2014, 12, 0, 4957.45, 110.98, 0.00, 0.00, 4846.47, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 127, '0015-01-15', 2015, 1, 0, 4846.47, 110.98, 0.00, 0.00, 4735.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 128, '0015-01-31', 2015, 1, 0, 4735.49, 110.98, 0.00, 0.00, 4624.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 129, '0015-02-15', 2015, 2, 0, 4624.51, 110.98, 0.00, 0.00, 4513.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 130, '0015-02-28', 2015, 2, 0, 4513.53, 110.98, 0.00, 0.00, 4402.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 131, '0015-03-15', 2015, 3, 0, 4402.55, 110.98, 0.00, 0.00, 4291.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 132, '0015-03-31', 2015, 3, 0, 4291.57, 110.98, 0.00, 0.00, 4180.59, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 133, '0015-04-15', 2015, 4, 0, 4180.59, 110.98, 0.00, 0.00, 4069.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 134, '0015-04-30', 2015, 4, 0, 4069.61, 110.98, 0.00, 0.00, 3958.63, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 135, '0015-05-15', 2015, 5, 0, 3958.63, 110.98, 0.00, 0.00, 3847.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 136, '0015-05-31', 2015, 5, 0, 3847.65, 110.98, 0.00, 0.00, 3736.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 137, '0015-06-15', 2015, 6, 0, 3736.67, 110.98, 0.00, 0.00, 3625.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 138, '0015-06-30', 2015, 6, 0, 3625.69, 110.98, 0.00, 0.00, 3514.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `nomprestamos_detalles` (`numpre`, `ficha`, `tipocuo`, `numcuo`, `fechaven`, `anioven`, `mesven`, `dias`, `salinicial`, `montocuo`, `montoint`, `montocap`, `salfinal`, `fechacan`, `estadopre`, `detalle`, `dedespecial`, `codnom`, `sfechaven`, `sfechacan`, `ee`) VALUES
(25, '10114', '', 139, '0015-07-15', 2015, 7, 0, 3514.71, 110.98, 0.00, 0.00, 3403.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 140, '0015-07-31', 2015, 7, 0, 3403.73, 110.98, 0.00, 0.00, 3292.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 141, '0015-08-15', 2015, 8, 0, 3292.75, 110.98, 0.00, 0.00, 3181.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 142, '0015-08-31', 2015, 8, 0, 3181.77, 110.98, 0.00, 0.00, 3070.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 143, '0015-09-15', 2015, 9, 0, 3070.79, 110.98, 0.00, 0.00, 2959.81, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 144, '0015-09-30', 2015, 9, 0, 2959.81, 110.98, 0.00, 0.00, 2848.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 145, '2015-10-15', 2015, 10, 0, 2848.83, 110.98, 0.00, 0.00, 2737.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 146, '2015-10-31', 2015, 10, 0, 2737.85, 110.98, 0.00, 0.00, 2626.87, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 147, '2015-11-15', 2015, 11, 0, 2626.87, 110.98, 0.00, 0.00, 2515.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 148, '2015-11-30', 2015, 11, 0, 2515.89, 110.98, 0.00, 0.00, 2404.91, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 149, '2015-12-15', 2015, 12, 0, 2404.91, 110.98, 0.00, 0.00, 2293.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 150, '2015-12-31', 2015, 12, 0, 2293.93, 110.98, 0.00, 0.00, 2182.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 151, '0016-01-15', 2016, 1, 0, 2182.95, 110.98, 0.00, 0.00, 2071.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 152, '0016-01-31', 2016, 1, 0, 2071.97, 110.98, 0.00, 0.00, 1960.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 153, '0016-02-15', 2016, 2, 0, 1960.99, 110.98, 0.00, 0.00, 1850.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 154, '0016-02-29', 2016, 2, 0, 1850.01, 110.98, 0.00, 0.00, 1739.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 155, '0016-03-15', 2016, 3, 0, 1739.03, 110.98, 0.00, 0.00, 1628.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 156, '0016-03-31', 2016, 3, 0, 1628.05, 110.98, 0.00, 0.00, 1517.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 157, '0016-04-15', 2016, 4, 0, 1517.07, 110.98, 0.00, 0.00, 1406.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 158, '0016-04-30', 2016, 4, 0, 1406.09, 110.98, 0.00, 0.00, 1295.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 159, '0016-05-15', 2016, 5, 0, 1295.11, 110.98, 0.00, 0.00, 1184.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 160, '0016-05-31', 2016, 5, 0, 1184.13, 110.98, 0.00, 0.00, 1073.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 161, '0016-06-15', 2016, 6, 0, 1073.15, 110.98, 0.00, 0.00, 962.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 162, '0016-06-30', 2016, 6, 0, 962.17, 110.98, 0.00, 0.00, 851.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 163, '0016-07-15', 2016, 7, 0, 851.19, 110.98, 0.00, 0.00, 740.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 164, '0016-07-31', 2016, 7, 0, 740.21, 110.98, 0.00, 0.00, 629.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 165, '0016-08-15', 2016, 8, 0, 629.23, 110.98, 0.00, 0.00, 518.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 166, '0016-08-31', 2016, 8, 0, 518.25, 110.98, 0.00, 0.00, 407.27, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 167, '0016-09-15', 2016, 9, 0, 407.27, 110.98, 0.00, 0.00, 296.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 168, '0016-09-30', 2016, 9, 0, 296.29, 110.98, 0.00, 0.00, 185.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 169, '2016-10-15', 2016, 10, 0, 185.31, 110.98, 0.00, 0.00, 74.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(25, '10114', '', 170, '2016-10-31', 2016, 10, 0, 74.33, 74.33, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(26, '10114', '', 1, '2009-10-15', 2009, 10, 0, 161.67, 18.17, 0.00, 0.00, 143.50, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(26, '10114', '', 2, '2009-10-31', 2009, 10, 0, 143.50, 18.17, 0.00, 0.00, 125.33, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(26, '10114', '', 3, '2009-11-15', 2009, 11, 0, 125.33, 18.17, 0.00, 0.00, 107.16, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(26, '10114', '', 4, '2009-11-30', 2009, 11, 0, 107.16, 18.17, 0.00, 0.00, 88.99, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(26, '10114', '', 5, '2009-12-15', 2009, 12, 0, 88.99, 18.17, 0.00, 0.00, 70.82, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(26, '10114', '', 6, '2009-12-31', 2009, 12, 0, 70.82, 18.17, 0.00, 0.00, 52.65, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(26, '10114', '', 7, '2010-01-15', 2010, 1, 0, 52.65, 18.17, 0.00, 0.00, 34.48, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(26, '10114', '', 8, '2010-01-31', 2010, 1, 0, 34.48, 18.17, 0.00, 0.00, 16.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(26, '10114', '', 9, '2010-02-15', 2010, 2, 0, 16.31, 16.31, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(27, '10114', '', 1, '2009-10-15', 2009, 10, 0, 91.85, 91.85, 0.00, 0.00, 0.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 1, '2009-10-15', 2009, 10, 0, 1200.00, 50.00, 0.00, 0.00, 1150.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 2, '2009-10-31', 2009, 10, 0, 1150.00, 50.00, 0.00, 0.00, 1100.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(28, '10138', '', 3, '2009-11-15', 2009, 11, 0, 1100.00, 50.00, 0.00, 0.00, 1050.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 4, '2009-11-30', 2009, 11, 0, 1050.00, 50.00, 0.00, 0.00, 1000.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 5, '2009-12-15', 2009, 12, 0, 1000.00, 50.00, 0.00, 0.00, 950.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 6, '2009-12-31', 2009, 12, 0, 950.00, 50.00, 0.00, 0.00, 900.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 7, '2010-01-15', 2010, 1, 0, 900.00, 50.00, 0.00, 0.00, 850.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 8, '2010-01-31', 2010, 1, 0, 850.00, 50.00, 0.00, 0.00, 800.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 9, '2010-02-15', 2010, 2, 0, 800.00, 50.00, 0.00, 0.00, 750.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 10, '2010-02-28', 2010, 2, 0, 750.00, 50.00, 0.00, 0.00, 700.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 11, '2010-03-15', 2010, 3, 0, 700.00, 50.00, 0.00, 0.00, 650.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 12, '2010-03-31', 2010, 3, 0, 650.00, 50.00, 0.00, 0.00, 600.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 13, '2010-04-15', 2010, 4, 0, 600.00, 50.00, 0.00, 0.00, 550.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 14, '2010-04-30', 2010, 4, 0, 550.00, 50.00, 0.00, 0.00, 500.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 15, '2010-05-15', 2010, 5, 0, 500.00, 50.00, 0.00, 0.00, 450.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 16, '2010-05-31', 2010, 5, 0, 450.00, 50.00, 0.00, 0.00, 400.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 17, '2010-06-15', 2010, 6, 0, 400.00, 50.00, 0.00, 0.00, 350.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 18, '2010-06-30', 2010, 6, 0, 350.00, 50.00, 0.00, 0.00, 300.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 19, '2010-07-15', 2010, 7, 0, 300.00, 50.00, 0.00, 0.00, 250.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 20, '2010-07-31', 2010, 7, 0, 250.00, 50.00, 0.00, 0.00, 200.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 21, '2010-08-15', 2010, 8, 0, 200.00, 50.00, 0.00, 0.00, 150.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 22, '2010-08-31', 2010, 8, 0, 150.00, 50.00, 0.00, 0.00, 100.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 23, '2010-09-15', 2010, 9, 0, 100.00, 50.00, 0.00, 0.00, 50.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(28, '10138', '', 24, '2010-09-30', 2010, 9, 0, 50.00, 50.00, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(29, '10138', '', 1, '2009-10-15', 2009, 10, 0, 468.08, 133.64, 0.00, 0.00, 334.44, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(29, '10138', '', 2, '2009-10-31', 2009, 10, 0, 334.44, 133.64, 0.00, 0.00, 200.80, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(29, '10138', '', 3, '2009-11-15', 2009, 11, 0, 200.80, 133.64, 0.00, 0.00, 67.16, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(29, '10138', '', 4, '2009-11-30', 2009, 11, 0, 67.16, 67.16, 0.00, 0.00, 0.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 1, '2009-10-15', 2009, 10, 0, 962.48, 45.84, 0.00, 0.00, 916.64, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 2, '2009-10-31', 2009, 10, 0, 916.64, 45.84, 0.00, 0.00, 870.80, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(30, '10112', '', 3, '2009-11-15', 2009, 11, 0, 870.80, 45.84, 0.00, 0.00, 824.96, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 4, '2009-11-30', 2009, 11, 0, 824.96, 45.84, 0.00, 0.00, 779.12, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 5, '2009-12-15', 2009, 12, 0, 779.12, 45.84, 0.00, 0.00, 733.28, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 6, '2009-12-31', 2009, 12, 0, 733.28, 45.84, 0.00, 0.00, 687.44, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 7, '2010-01-15', 2010, 1, 0, 687.44, 45.84, 0.00, 0.00, 641.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 8, '2010-01-31', 2010, 1, 0, 641.60, 45.84, 0.00, 0.00, 595.76, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 9, '2010-02-15', 2010, 2, 0, 595.76, 45.84, 0.00, 0.00, 549.92, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 10, '2010-02-28', 2010, 2, 0, 549.92, 45.84, 0.00, 0.00, 504.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 11, '2010-03-15', 2010, 3, 0, 504.08, 45.84, 0.00, 0.00, 458.24, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 12, '2010-03-31', 2010, 3, 0, 458.24, 45.84, 0.00, 0.00, 412.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 13, '2010-04-15', 2010, 4, 0, 412.40, 45.84, 0.00, 0.00, 366.56, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 14, '2010-04-30', 2010, 4, 0, 366.56, 45.84, 0.00, 0.00, 320.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 15, '2010-05-15', 2010, 5, 0, 320.72, 45.84, 0.00, 0.00, 274.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 16, '2010-05-31', 2010, 5, 0, 274.88, 45.84, 0.00, 0.00, 229.04, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 17, '2010-06-15', 2010, 6, 0, 229.04, 45.84, 0.00, 0.00, 183.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 18, '2010-06-30', 2010, 6, 0, 183.20, 45.84, 0.00, 0.00, 137.36, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 19, '2010-07-15', 2010, 7, 0, 137.36, 45.84, 0.00, 0.00, 91.52, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 20, '2010-07-31', 2010, 7, 0, 91.52, 45.84, 0.00, 0.00, 45.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(30, '10112', '', 21, '2010-08-15', 2010, 8, 0, 45.68, 45.68, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(31, '10072', '', 1, '2009-10-15', 2009, 10, 0, 1184.55, 74.03, 0.00, 0.00, 1110.52, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(31, '10072', '', 2, '2009-10-31', 2009, 10, 0, 1110.52, 74.03, 0.00, 0.00, 1036.49, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 3, '2009-11-15', 2009, 11, 0, 1036.49, 74.03, 0.00, 0.00, 962.46, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 4, '2009-11-30', 2009, 11, 0, 962.46, 74.03, 0.00, 0.00, 888.43, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 5, '2009-12-15', 2009, 12, 0, 888.43, 74.03, 0.00, 0.00, 814.40, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 6, '2009-12-31', 2009, 12, 0, 814.40, 74.03, 0.00, 0.00, 740.37, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(31, '10072', '', 7, '2010-01-15', 2010, 1, 0, 740.37, 74.03, 0.00, 0.00, 666.34, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 8, '2010-01-31', 2010, 1, 0, 666.34, 74.03, 0.00, 0.00, 592.31, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 9, '2010-02-15', 2010, 2, 0, 592.31, 74.03, 0.00, 0.00, 518.28, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 10, '2010-02-28', 2010, 2, 0, 518.28, 74.03, 0.00, 0.00, 444.25, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 11, '2010-03-15', 2010, 3, 0, 444.25, 74.03, 0.00, 0.00, 370.22, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 12, '2010-03-31', 2010, 3, 0, 370.22, 74.03, 0.00, 0.00, 296.19, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 13, '2010-04-15', 2010, 4, 0, 296.19, 74.03, 0.00, 0.00, 222.16, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 14, '2010-04-30', 2010, 4, 0, 222.16, 74.03, 0.00, 0.00, 148.13, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 15, '2010-05-15', 2010, 5, 0, 148.13, 74.03, 0.00, 0.00, 74.10, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(31, '10072', '', 16, '2010-05-31', 2010, 5, 0, 74.10, 74.03, 0.00, 0.00, 0.07, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(32, '10267', '', 1, '2009-10-15', 2009, 10, 0, 1561.81, 75.52, 0.00, 0.00, 1486.29, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 2, '2009-10-31', 2009, 10, 0, 1486.29, 75.52, 0.00, 0.00, 1410.77, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(32, '10267', '', 3, '2009-11-15', 2009, 11, 0, 1410.77, 75.52, 0.00, 0.00, 1335.25, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 4, '2009-11-30', 2009, 11, 0, 1335.25, 75.52, 0.00, 0.00, 1259.73, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 5, '2009-12-15', 2009, 12, 0, 1259.73, 75.52, 0.00, 0.00, 1184.21, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 6, '2009-12-31', 2009, 12, 0, 1184.21, 75.52, 0.00, 0.00, 1108.69, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 7, '2010-01-15', 2010, 1, 0, 1108.69, 75.52, 0.00, 0.00, 1033.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 8, '2010-01-31', 2010, 1, 0, 1033.17, 75.52, 0.00, 0.00, 957.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 9, '2010-02-15', 2010, 2, 0, 957.65, 75.52, 0.00, 0.00, 882.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 10, '2010-02-28', 2010, 2, 0, 882.13, 75.52, 0.00, 0.00, 806.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 11, '2010-03-15', 2010, 3, 0, 806.61, 75.52, 0.00, 0.00, 731.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 12, '2010-03-31', 2010, 3, 0, 731.09, 75.52, 0.00, 0.00, 655.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 13, '2010-04-15', 2010, 4, 0, 655.57, 75.52, 0.00, 0.00, 580.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 14, '2010-04-30', 2010, 4, 0, 580.05, 75.52, 0.00, 0.00, 504.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 15, '2010-05-15', 2010, 5, 0, 504.53, 75.52, 0.00, 0.00, 429.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 16, '2010-05-31', 2010, 5, 0, 429.01, 75.52, 0.00, 0.00, 353.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 17, '2010-06-15', 2010, 6, 0, 353.49, 75.52, 0.00, 0.00, 277.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 18, '2010-06-30', 2010, 6, 0, 277.97, 75.52, 0.00, 0.00, 202.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 19, '2010-07-15', 2010, 7, 0, 202.45, 75.52, 0.00, 0.00, 126.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 20, '2010-07-31', 2010, 7, 0, 126.93, 75.52, 0.00, 0.00, 51.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(32, '10267', '', 21, '2010-08-15', 2010, 8, 0, 51.41, 51.41, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(33, '10039', '', 1, '2009-10-15', 2009, 10, 0, 1184.55, 74.03, 0.00, 0.00, 1110.52, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(33, '10039', '', 2, '2009-10-31', 2009, 10, 0, 1110.52, 74.03, 0.00, 0.00, 1036.49, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 3, '2009-11-15', 2009, 11, 0, 1036.49, 74.03, 0.00, 0.00, 962.46, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 4, '2009-11-30', 2009, 11, 0, 962.46, 74.03, 0.00, 0.00, 888.43, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 5, '2009-12-15', 2009, 12, 0, 888.43, 74.03, 0.00, 0.00, 814.40, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 6, '2009-12-31', 2009, 12, 0, 814.40, 74.03, 0.00, 0.00, 740.37, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 7, '2010-01-15', 2010, 1, 0, 740.37, 74.03, 0.00, 0.00, 666.34, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 8, '2010-01-31', 2010, 1, 0, 666.34, 74.03, 0.00, 0.00, 592.31, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 9, '2010-02-15', 2010, 2, 0, 592.31, 74.03, 0.00, 0.00, 518.28, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 10, '2010-02-28', 2010, 2, 0, 518.28, 74.03, 0.00, 0.00, 444.25, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 11, '2010-03-15', 2010, 3, 0, 444.25, 74.03, 0.00, 0.00, 370.22, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 12, '2010-03-31', 2010, 3, 0, 370.22, 74.03, 0.00, 0.00, 296.19, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 13, '2010-04-15', 2010, 4, 0, 296.19, 74.03, 0.00, 0.00, 222.16, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 14, '2010-04-30', 2010, 4, 0, 222.16, 74.03, 0.00, 0.00, 148.13, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 15, '2010-05-15', 2010, 5, 0, 148.13, 74.03, 0.00, 0.00, 74.10, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(33, '10039', '', 16, '2010-05-31', 2010, 5, 0, 74.10, 74.03, 0.00, 0.00, 0.07, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 1),
(34, '10143', '', 1, '2009-11-15', 2009, 11, 0, 2555.87, 113.28, 0.00, 0.00, 2442.59, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 2, '2009-11-30', 2009, 11, 0, 2442.59, 113.28, 0.00, 0.00, 2329.31, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 3, '2009-12-15', 2009, 12, 0, 2329.31, 113.28, 0.00, 0.00, 2216.03, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 4, '2009-12-31', 2009, 12, 0, 2216.03, 113.28, 0.00, 0.00, 2102.75, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 5, '2010-01-15', 2010, 1, 0, 2102.75, 113.28, 0.00, 0.00, 1989.47, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 6, '2010-01-31', 2010, 1, 0, 1989.47, 113.28, 0.00, 0.00, 1876.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 7, '2010-02-15', 2010, 2, 0, 1876.19, 113.28, 0.00, 0.00, 1762.91, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 8, '2010-02-28', 2010, 2, 0, 1762.91, 113.28, 0.00, 0.00, 1649.63, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 9, '2010-03-15', 2010, 3, 0, 1649.63, 113.28, 0.00, 0.00, 1536.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 10, '2010-03-31', 2010, 3, 0, 1536.35, 113.28, 0.00, 0.00, 1423.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 11, '2010-04-15', 2010, 4, 0, 1423.07, 113.28, 0.00, 0.00, 1309.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 12, '2010-04-30', 2010, 4, 0, 1309.79, 113.28, 0.00, 0.00, 1196.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 13, '2010-05-15', 2010, 5, 0, 1196.51, 113.28, 0.00, 0.00, 1083.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 14, '2010-05-31', 2010, 5, 0, 1083.23, 113.28, 0.00, 0.00, 969.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 15, '2010-06-15', 2010, 6, 0, 969.95, 113.28, 0.00, 0.00, 856.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 16, '2010-06-30', 2010, 6, 0, 856.67, 113.28, 0.00, 0.00, 743.39, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 17, '2010-07-15', 2010, 7, 0, 743.39, 113.28, 0.00, 0.00, 630.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 18, '2010-07-31', 2010, 7, 0, 630.11, 113.28, 0.00, 0.00, 516.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 19, '2010-08-15', 2010, 8, 0, 516.83, 113.28, 0.00, 0.00, 403.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 20, '2010-08-31', 2010, 8, 0, 403.55, 113.28, 0.00, 0.00, 290.27, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 21, '2010-09-15', 2010, 9, 0, 290.27, 113.28, 0.00, 0.00, 176.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 22, '2010-09-30', 2010, 9, 0, 176.99, 113.28, 0.00, 0.00, 63.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(34, '10143', '', 23, '2010-10-15', 2010, 10, 0, 63.71, 63.71, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 1, '2009-11-15', 2009, 11, 0, 2675.14, 118.57, 0.00, 0.00, 2556.57, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 2, '2009-11-30', 2009, 11, 0, 2556.57, 118.57, 0.00, 0.00, 2438.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 3, '2009-12-15', 2009, 12, 0, 2438.00, 118.57, 0.00, 0.00, 2319.43, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 4, '2009-12-31', 2009, 12, 0, 2319.43, 118.57, 0.00, 0.00, 2200.86, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 5, '2010-01-15', 2010, 1, 0, 2200.86, 118.57, 0.00, 0.00, 2082.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 6, '2010-01-31', 2010, 1, 0, 2082.29, 118.57, 0.00, 0.00, 1963.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 7, '2010-02-15', 2010, 2, 0, 1963.72, 118.57, 0.00, 0.00, 1845.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 8, '2010-02-28', 2010, 2, 0, 1845.15, 118.57, 0.00, 0.00, 1726.58, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 9, '2010-03-15', 2010, 3, 0, 1726.58, 118.57, 0.00, 0.00, 1608.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 10, '2010-03-31', 2010, 3, 0, 1608.01, 118.57, 0.00, 0.00, 1489.44, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 11, '2010-04-15', 2010, 4, 0, 1489.44, 118.57, 0.00, 0.00, 1370.87, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 12, '2010-04-30', 2010, 4, 0, 1370.87, 118.57, 0.00, 0.00, 1252.30, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 13, '2010-05-15', 2010, 5, 0, 1252.30, 118.57, 0.00, 0.00, 1133.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 14, '2010-05-31', 2010, 5, 0, 1133.73, 118.57, 0.00, 0.00, 1015.16, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 15, '2010-06-15', 2010, 6, 0, 1015.16, 118.57, 0.00, 0.00, 896.59, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 16, '2010-06-30', 2010, 6, 0, 896.59, 118.57, 0.00, 0.00, 778.02, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 17, '2010-07-15', 2010, 7, 0, 778.02, 118.57, 0.00, 0.00, 659.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 18, '2010-07-31', 2010, 7, 0, 659.45, 118.57, 0.00, 0.00, 540.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 19, '2010-08-15', 2010, 8, 0, 540.88, 118.57, 0.00, 0.00, 422.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 20, '2010-08-31', 2010, 8, 0, 422.31, 118.57, 0.00, 0.00, 303.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 21, '2010-09-15', 2010, 9, 0, 303.74, 118.57, 0.00, 0.00, 185.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 22, '2010-09-30', 2010, 9, 0, 185.17, 118.57, 0.00, 0.00, 66.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(35, '10130', '', 23, '2010-10-15', 2010, 10, 0, 66.60, 66.60, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 1, '2009-11-15', 2009, 11, 0, 490.13, 42.19, 0.00, 0.00, 447.94, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 2, '2009-11-30', 2009, 11, 0, 447.94, 42.19, 0.00, 0.00, 405.75, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 3, '2009-12-15', 2009, 12, 0, 405.75, 42.19, 0.00, 0.00, 363.56, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 4, '2009-12-31', 2009, 12, 0, 363.56, 42.19, 0.00, 0.00, 321.37, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 5, '2010-01-15', 2010, 1, 0, 321.37, 42.19, 0.00, 0.00, 279.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 6, '2010-01-31', 2010, 1, 0, 279.18, 42.19, 0.00, 0.00, 236.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 7, '2010-02-15', 2010, 2, 0, 236.99, 42.19, 0.00, 0.00, 194.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 8, '2010-02-28', 2010, 2, 0, 194.80, 42.19, 0.00, 0.00, 152.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 9, '2010-03-15', 2010, 3, 0, 152.61, 42.19, 0.00, 0.00, 110.42, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 10, '2010-03-31', 2010, 3, 0, 110.42, 42.19, 0.00, 0.00, 68.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 11, '2010-04-15', 2010, 4, 0, 68.23, 42.19, 0.00, 0.00, 26.04, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(36, '10206', '', 12, '2010-04-30', 2010, 4, 0, 26.04, 26.04, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 1, '2009-11-15', 2009, 11, 0, 1237.82, 27.81, 0.00, 0.00, 1210.01, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 2, '2009-11-30', 2009, 11, 0, 1210.01, 27.81, 0.00, 0.00, 1182.20, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 3, '2009-12-15', 2009, 12, 0, 1182.20, 27.81, 0.00, 0.00, 1154.39, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 4, '2009-12-31', 2009, 12, 0, 1154.39, 27.81, 0.00, 0.00, 1126.58, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 5, '2010-01-15', 2010, 1, 0, 1126.58, 27.81, 0.00, 0.00, 1098.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 6, '2010-01-31', 2010, 1, 0, 1098.77, 27.81, 0.00, 0.00, 1070.96, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 7, '2010-02-15', 2010, 2, 0, 1070.96, 27.81, 0.00, 0.00, 1043.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 8, '2010-02-28', 2010, 2, 0, 1043.15, 27.81, 0.00, 0.00, 1015.34, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 9, '2010-03-15', 2010, 3, 0, 1015.34, 27.81, 0.00, 0.00, 987.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 10, '2010-03-31', 2010, 3, 0, 987.53, 27.81, 0.00, 0.00, 959.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 11, '2010-04-15', 2010, 4, 0, 959.72, 27.81, 0.00, 0.00, 931.91, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 12, '2010-04-30', 2010, 4, 0, 931.91, 27.81, 0.00, 0.00, 904.10, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 13, '2010-05-15', 2010, 5, 0, 904.10, 27.81, 0.00, 0.00, 876.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 14, '2010-05-31', 2010, 5, 0, 876.29, 27.81, 0.00, 0.00, 848.48, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 15, '2010-06-15', 2010, 6, 0, 848.48, 27.81, 0.00, 0.00, 820.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 16, '2010-06-30', 2010, 6, 0, 820.67, 27.81, 0.00, 0.00, 792.86, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 17, '2010-07-15', 2010, 7, 0, 792.86, 27.81, 0.00, 0.00, 765.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 18, '2010-07-31', 2010, 7, 0, 765.05, 27.81, 0.00, 0.00, 737.24, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 19, '2010-08-15', 2010, 8, 0, 737.24, 27.81, 0.00, 0.00, 709.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 20, '2010-08-31', 2010, 8, 0, 709.43, 27.81, 0.00, 0.00, 681.62, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 21, '2010-09-15', 2010, 9, 0, 681.62, 27.81, 0.00, 0.00, 653.81, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 22, '2010-09-30', 2010, 9, 0, 653.81, 27.81, 0.00, 0.00, 626.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 23, '2010-10-15', 2010, 10, 0, 626.00, 27.81, 0.00, 0.00, 598.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 24, '2010-10-31', 2010, 10, 0, 598.19, 27.81, 0.00, 0.00, 570.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 25, '2010-11-15', 2010, 11, 0, 570.38, 27.81, 0.00, 0.00, 542.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 26, '2010-11-30', 2010, 11, 0, 542.57, 27.81, 0.00, 0.00, 514.76, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 27, '2010-12-15', 2010, 12, 0, 514.76, 27.81, 0.00, 0.00, 486.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 28, '2010-12-31', 2010, 12, 0, 486.95, 27.81, 0.00, 0.00, 459.14, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 29, '2011-01-15', 2011, 1, 0, 459.14, 27.81, 0.00, 0.00, 431.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 30, '2011-01-31', 2011, 1, 0, 431.33, 27.81, 0.00, 0.00, 403.52, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 31, '2011-02-15', 2011, 2, 0, 403.52, 27.81, 0.00, 0.00, 375.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 32, '2011-02-28', 2011, 2, 0, 375.71, 27.81, 0.00, 0.00, 347.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 33, '2011-03-15', 2011, 3, 0, 347.90, 27.81, 0.00, 0.00, 320.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 34, '2011-03-31', 2011, 3, 0, 320.09, 27.81, 0.00, 0.00, 292.28, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 35, '2011-04-15', 2011, 4, 0, 292.28, 27.81, 0.00, 0.00, 264.47, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 36, '2011-04-30', 2011, 4, 0, 264.47, 27.81, 0.00, 0.00, 236.66, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 37, '2011-05-15', 2011, 5, 0, 236.66, 27.81, 0.00, 0.00, 208.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 38, '2011-05-31', 2011, 5, 0, 208.85, 27.81, 0.00, 0.00, 181.04, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 39, '2011-06-15', 2011, 6, 0, 181.04, 27.81, 0.00, 0.00, 153.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 40, '2011-06-30', 2011, 6, 0, 153.23, 27.81, 0.00, 0.00, 125.42, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 41, '2011-07-15', 2011, 7, 0, 125.42, 27.81, 0.00, 0.00, 97.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 42, '2011-07-31', 2011, 7, 0, 97.61, 27.81, 0.00, 0.00, 69.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 43, '2011-08-15', 2011, 8, 0, 69.80, 27.81, 0.00, 0.00, 41.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 44, '2011-08-31', 2011, 8, 0, 41.99, 27.81, 0.00, 0.00, 14.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(37, '10135', '', 45, '2011-09-15', 2011, 9, 0, 14.18, 14.18, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(38, '10161', '', 1, '2009-11-15', 2009, 11, 0, 108.40, 13.64, 0.00, 0.00, 94.76, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(38, '10161', '', 2, '2009-11-30', 2009, 11, 0, 94.76, 13.64, 0.00, 0.00, 81.12, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(38, '10161', '', 3, '2009-12-15', 2009, 12, 0, 81.12, 13.64, 0.00, 0.00, 67.48, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(38, '10161', '', 4, '2009-12-31', 2009, 12, 0, 67.48, 13.64, 0.00, 0.00, 53.84, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(38, '10161', '', 5, '2010-01-15', 2010, 1, 0, 53.84, 13.64, 0.00, 0.00, 40.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(38, '10161', '', 6, '2010-01-31', 2010, 1, 0, 40.20, 13.64, 0.00, 0.00, 26.56, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(38, '10161', '', 7, '2010-02-15', 2010, 2, 0, 26.56, 13.64, 0.00, 0.00, 12.92, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(38, '10161', '', 8, '2010-02-28', 2010, 2, 0, 12.92, 12.92, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 1, '2009-11-15', 2009, 11, 0, 1975.74, 46.39, 0.00, 0.00, 1929.35, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 2, '2009-11-30', 2009, 11, 0, 1929.35, 46.39, 0.00, 0.00, 1882.96, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 3, '2009-12-15', 2009, 12, 0, 1882.96, 46.39, 0.00, 0.00, 1836.57, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 4, '2009-12-31', 2009, 12, 0, 1836.57, 46.39, 0.00, 0.00, 1790.18, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 5, '2010-01-15', 2010, 1, 0, 1790.18, 46.39, 0.00, 0.00, 1743.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 6, '2010-01-31', 2010, 1, 0, 1743.79, 46.39, 0.00, 0.00, 1697.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 7, '2010-02-15', 2010, 2, 0, 1697.40, 46.39, 0.00, 0.00, 1651.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 8, '2010-02-28', 2010, 2, 0, 1651.01, 46.39, 0.00, 0.00, 1604.62, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 9, '2010-03-15', 2010, 3, 0, 1604.62, 46.39, 0.00, 0.00, 1558.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 10, '2010-03-31', 2010, 3, 0, 1558.23, 46.39, 0.00, 0.00, 1511.84, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 11, '2010-04-15', 2010, 4, 0, 1511.84, 46.39, 0.00, 0.00, 1465.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 12, '2010-04-30', 2010, 4, 0, 1465.45, 46.39, 0.00, 0.00, 1419.06, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 13, '2010-05-15', 2010, 5, 0, 1419.06, 46.39, 0.00, 0.00, 1372.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 14, '2010-05-31', 2010, 5, 0, 1372.67, 46.39, 0.00, 0.00, 1326.28, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 15, '2010-06-15', 2010, 6, 0, 1326.28, 46.39, 0.00, 0.00, 1279.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 16, '2010-06-30', 2010, 6, 0, 1279.89, 46.39, 0.00, 0.00, 1233.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 17, '2010-07-15', 2010, 7, 0, 1233.50, 46.39, 0.00, 0.00, 1187.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 18, '2010-07-31', 2010, 7, 0, 1187.11, 46.39, 0.00, 0.00, 1140.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 19, '2010-08-15', 2010, 8, 0, 1140.72, 46.39, 0.00, 0.00, 1094.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 20, '2010-08-31', 2010, 8, 0, 1094.33, 46.39, 0.00, 0.00, 1047.94, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 21, '2010-09-15', 2010, 9, 0, 1047.94, 46.39, 0.00, 0.00, 1001.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 22, '2010-09-30', 2010, 9, 0, 1001.55, 46.39, 0.00, 0.00, 955.16, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 23, '2010-10-15', 2010, 10, 0, 955.16, 46.39, 0.00, 0.00, 908.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 24, '2010-10-31', 2010, 10, 0, 908.77, 46.39, 0.00, 0.00, 862.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 25, '2010-11-15', 2010, 11, 0, 862.38, 46.39, 0.00, 0.00, 815.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 26, '2010-11-30', 2010, 11, 0, 815.99, 46.39, 0.00, 0.00, 769.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 27, '2010-12-15', 2010, 12, 0, 769.60, 46.39, 0.00, 0.00, 723.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 28, '2010-12-31', 2010, 12, 0, 723.21, 46.39, 0.00, 0.00, 676.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 29, '2011-01-15', 2011, 1, 0, 676.82, 46.39, 0.00, 0.00, 630.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 30, '2011-01-31', 2011, 1, 0, 630.43, 46.39, 0.00, 0.00, 584.04, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 31, '2011-02-15', 2011, 2, 0, 584.04, 46.39, 0.00, 0.00, 537.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 32, '2011-02-28', 2011, 2, 0, 537.65, 46.39, 0.00, 0.00, 491.26, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 33, '2011-03-15', 2011, 3, 0, 491.26, 46.39, 0.00, 0.00, 444.87, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 34, '2011-03-31', 2011, 3, 0, 444.87, 46.39, 0.00, 0.00, 398.48, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 35, '2011-04-15', 2011, 4, 0, 398.48, 46.39, 0.00, 0.00, 352.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 36, '2011-04-30', 2011, 4, 0, 352.09, 46.39, 0.00, 0.00, 305.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 37, '2011-05-15', 2011, 5, 0, 305.70, 46.39, 0.00, 0.00, 259.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 38, '2011-05-31', 2011, 5, 0, 259.31, 46.39, 0.00, 0.00, 212.92, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 39, '2011-06-15', 2011, 6, 0, 212.92, 46.39, 0.00, 0.00, 166.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 40, '2011-06-30', 2011, 6, 0, 166.53, 46.39, 0.00, 0.00, 120.14, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 41, '2011-07-15', 2011, 7, 0, 120.14, 46.39, 0.00, 0.00, 73.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 42, '2011-07-31', 2011, 7, 0, 73.75, 46.39, 0.00, 0.00, 27.36, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(39, '10157', '', 43, '2011-08-15', 2011, 8, 0, 27.36, 27.36, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 1, '2009-11-15', 2009, 11, 0, 178.44, 15.10, 0.00, 0.00, 163.34, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 2, '2009-11-30', 2009, 11, 0, 163.34, 15.10, 0.00, 0.00, 148.24, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 3, '2009-12-15', 2009, 12, 0, 148.24, 15.10, 0.00, 0.00, 133.14, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 4, '2009-12-31', 2009, 12, 0, 133.14, 15.10, 0.00, 0.00, 118.04, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 5, '2010-01-15', 2010, 1, 0, 118.04, 15.10, 0.00, 0.00, 102.94, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 6, '2010-01-31', 2010, 1, 0, 102.94, 15.10, 0.00, 0.00, 87.84, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 7, '2010-02-15', 2010, 2, 0, 87.84, 15.10, 0.00, 0.00, 72.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 8, '2010-02-28', 2010, 2, 0, 72.74, 15.10, 0.00, 0.00, 57.64, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 9, '2010-03-15', 2010, 3, 0, 57.64, 15.10, 0.00, 0.00, 42.54, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 10, '2010-03-31', 2010, 3, 0, 42.54, 15.10, 0.00, 0.00, 27.44, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 11, '2010-04-15', 2010, 4, 0, 27.44, 15.10, 0.00, 0.00, 12.34, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(40, '10140', '', 12, '2010-04-30', 2010, 4, 0, 12.34, 12.34, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 1, '2009-11-15', 2009, 11, 0, 2589.12, 60.21, 0.00, 0.00, 2528.91, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 2, '2009-11-30', 2009, 11, 0, 2528.91, 60.21, 0.00, 0.00, 2468.70, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 3, '2009-12-15', 2009, 12, 0, 2468.70, 60.21, 0.00, 0.00, 2408.49, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 4, '2009-12-31', 2009, 12, 0, 2408.49, 60.21, 0.00, 0.00, 2348.28, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 5, '2010-01-15', 2010, 1, 0, 2348.28, 60.21, 0.00, 0.00, 2288.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 6, '2010-01-31', 2010, 1, 0, 2288.07, 60.21, 0.00, 0.00, 2227.86, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 7, '2010-02-15', 2010, 2, 0, 2227.86, 60.21, 0.00, 0.00, 2167.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 8, '2010-02-28', 2010, 2, 0, 2167.65, 60.21, 0.00, 0.00, 2107.44, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 9, '2010-03-15', 2010, 3, 0, 2107.44, 60.21, 0.00, 0.00, 2047.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 10, '2010-03-31', 2010, 3, 0, 2047.23, 60.21, 0.00, 0.00, 1987.02, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 11, '2010-04-15', 2010, 4, 0, 1987.02, 60.21, 0.00, 0.00, 1926.81, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 12, '2010-04-30', 2010, 4, 0, 1926.81, 60.21, 0.00, 0.00, 1866.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 13, '2010-05-15', 2010, 5, 0, 1866.60, 60.21, 0.00, 0.00, 1806.39, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 14, '2010-05-31', 2010, 5, 0, 1806.39, 60.21, 0.00, 0.00, 1746.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 15, '2010-06-15', 2010, 6, 0, 1746.18, 60.21, 0.00, 0.00, 1685.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 16, '2010-06-30', 2010, 6, 0, 1685.97, 60.21, 0.00, 0.00, 1625.76, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 17, '2010-07-15', 2010, 7, 0, 1625.76, 60.21, 0.00, 0.00, 1565.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 18, '2010-07-31', 2010, 7, 0, 1565.55, 60.21, 0.00, 0.00, 1505.34, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 19, '2010-08-15', 2010, 8, 0, 1505.34, 60.21, 0.00, 0.00, 1445.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 20, '2010-08-31', 2010, 8, 0, 1445.13, 60.21, 0.00, 0.00, 1384.92, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `nomprestamos_detalles` (`numpre`, `ficha`, `tipocuo`, `numcuo`, `fechaven`, `anioven`, `mesven`, `dias`, `salinicial`, `montocuo`, `montoint`, `montocap`, `salfinal`, `fechacan`, `estadopre`, `detalle`, `dedespecial`, `codnom`, `sfechaven`, `sfechacan`, `ee`) VALUES
(41, '10140', '', 21, '2010-09-15', 2010, 9, 0, 1384.92, 60.21, 0.00, 0.00, 1324.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 22, '2010-09-30', 2010, 9, 0, 1324.71, 60.21, 0.00, 0.00, 1264.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 23, '2010-10-15', 2010, 10, 0, 1264.50, 60.21, 0.00, 0.00, 1204.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 24, '2010-10-31', 2010, 10, 0, 1204.29, 60.21, 0.00, 0.00, 1144.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 25, '2010-11-15', 2010, 11, 0, 1144.08, 60.21, 0.00, 0.00, 1083.87, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 26, '2010-11-30', 2010, 11, 0, 1083.87, 60.21, 0.00, 0.00, 1023.66, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 27, '2010-12-15', 2010, 12, 0, 1023.66, 60.21, 0.00, 0.00, 963.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 28, '2010-12-31', 2010, 12, 0, 963.45, 60.21, 0.00, 0.00, 903.24, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 29, '2011-01-15', 2011, 1, 0, 903.24, 60.21, 0.00, 0.00, 843.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 30, '2011-01-31', 2011, 1, 0, 843.03, 60.21, 0.00, 0.00, 782.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 31, '2011-02-15', 2011, 2, 0, 782.82, 60.21, 0.00, 0.00, 722.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 32, '2011-02-28', 2011, 2, 0, 722.61, 60.21, 0.00, 0.00, 662.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 33, '2011-03-15', 2011, 3, 0, 662.40, 60.21, 0.00, 0.00, 602.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 34, '2011-03-31', 2011, 3, 0, 602.19, 60.21, 0.00, 0.00, 541.98, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 35, '2011-04-15', 2011, 4, 0, 541.98, 60.21, 0.00, 0.00, 481.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 36, '2011-04-30', 2011, 4, 0, 481.77, 60.21, 0.00, 0.00, 421.56, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 37, '2011-05-15', 2011, 5, 0, 421.56, 60.21, 0.00, 0.00, 361.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 38, '2011-05-31', 2011, 5, 0, 361.35, 60.21, 0.00, 0.00, 301.14, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 39, '2011-06-15', 2011, 6, 0, 301.14, 60.21, 0.00, 0.00, 240.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 40, '2011-06-30', 2011, 6, 0, 240.93, 60.21, 0.00, 0.00, 180.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 41, '2011-07-15', 2011, 7, 0, 180.72, 60.21, 0.00, 0.00, 120.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 42, '2011-07-31', 2011, 7, 0, 120.51, 60.21, 0.00, 0.00, 60.30, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(41, '10140', '', 43, '2011-08-15', 2011, 8, 0, 60.30, 60.21, 0.00, 0.00, 0.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 1, '2009-11-15', 2009, 11, 0, 2770.27, 121.23, 0.00, 0.00, 2649.04, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 2, '2009-11-30', 2009, 11, 0, 2649.04, 121.23, 0.00, 0.00, 2527.81, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 3, '2009-12-15', 2009, 12, 0, 2527.81, 121.23, 0.00, 0.00, 2406.58, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 4, '2009-12-31', 2009, 12, 0, 2406.58, 121.23, 0.00, 0.00, 2285.35, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 5, '2010-01-15', 2010, 1, 0, 2285.35, 121.23, 0.00, 0.00, 2164.12, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 6, '2010-01-31', 2010, 1, 0, 2164.12, 121.23, 0.00, 0.00, 2042.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 7, '2010-02-15', 2010, 2, 0, 2042.89, 121.23, 0.00, 0.00, 1921.66, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 8, '2010-02-28', 2010, 2, 0, 1921.66, 121.23, 0.00, 0.00, 1800.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 9, '2010-03-15', 2010, 3, 0, 1800.43, 121.23, 0.00, 0.00, 1679.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 10, '2010-03-31', 2010, 3, 0, 1679.20, 121.23, 0.00, 0.00, 1557.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 11, '2010-04-15', 2010, 4, 0, 1557.97, 121.23, 0.00, 0.00, 1436.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 12, '2010-04-30', 2010, 4, 0, 1436.74, 121.23, 0.00, 0.00, 1315.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 13, '2010-05-15', 2010, 5, 0, 1315.51, 121.23, 0.00, 0.00, 1194.28, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 14, '2010-05-31', 2010, 5, 0, 1194.28, 121.23, 0.00, 0.00, 1073.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 15, '2010-06-15', 2010, 6, 0, 1073.05, 121.23, 0.00, 0.00, 951.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 16, '2010-06-30', 2010, 6, 0, 951.82, 121.23, 0.00, 0.00, 830.59, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 17, '2010-07-15', 2010, 7, 0, 830.59, 121.23, 0.00, 0.00, 709.36, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 18, '2010-07-31', 2010, 7, 0, 709.36, 121.23, 0.00, 0.00, 588.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 19, '2010-08-15', 2010, 8, 0, 588.13, 121.23, 0.00, 0.00, 466.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 20, '2010-08-31', 2010, 8, 0, 466.90, 121.23, 0.00, 0.00, 345.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 21, '2010-09-15', 2010, 9, 0, 345.67, 121.23, 0.00, 0.00, 224.44, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 22, '2010-09-30', 2010, 9, 0, 224.44, 121.23, 0.00, 0.00, 103.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(42, '10199', '', 23, '2010-10-15', 2010, 10, 0, 103.21, 103.21, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 1, '2009-11-15', 2009, 11, 0, 756.90, 32.62, 0.00, 0.00, 724.28, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 2, '2009-11-30', 2009, 11, 0, 724.28, 32.62, 0.00, 0.00, 691.66, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 3, '2009-12-15', 2009, 12, 0, 691.66, 32.62, 0.00, 0.00, 659.04, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 4, '2009-12-31', 2009, 12, 0, 659.04, 32.62, 0.00, 0.00, 626.42, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 5, '2010-01-15', 2010, 1, 0, 626.42, 32.62, 0.00, 0.00, 593.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 6, '2010-01-31', 2010, 1, 0, 593.80, 32.62, 0.00, 0.00, 561.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 7, '2010-02-15', 2010, 2, 0, 561.18, 32.62, 0.00, 0.00, 528.56, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 8, '2010-02-28', 2010, 2, 0, 528.56, 32.62, 0.00, 0.00, 495.94, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 9, '2010-03-15', 2010, 3, 0, 495.94, 32.62, 0.00, 0.00, 463.32, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 10, '2010-03-31', 2010, 3, 0, 463.32, 32.62, 0.00, 0.00, 430.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 11, '2010-04-15', 2010, 4, 0, 430.70, 32.62, 0.00, 0.00, 398.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 12, '2010-04-30', 2010, 4, 0, 398.08, 32.62, 0.00, 0.00, 365.46, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 13, '2010-05-15', 2010, 5, 0, 365.46, 32.62, 0.00, 0.00, 332.84, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 14, '2010-05-31', 2010, 5, 0, 332.84, 32.62, 0.00, 0.00, 300.22, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 15, '2010-06-15', 2010, 6, 0, 300.22, 32.62, 0.00, 0.00, 267.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 16, '2010-06-30', 2010, 6, 0, 267.60, 32.62, 0.00, 0.00, 234.98, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 17, '2010-07-15', 2010, 7, 0, 234.98, 32.62, 0.00, 0.00, 202.36, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 18, '2010-07-31', 2010, 7, 0, 202.36, 32.62, 0.00, 0.00, 169.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 19, '2010-08-15', 2010, 8, 0, 169.74, 32.62, 0.00, 0.00, 137.12, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 20, '2010-08-31', 2010, 8, 0, 137.12, 32.62, 0.00, 0.00, 104.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 21, '2010-09-15', 2010, 9, 0, 104.50, 32.62, 0.00, 0.00, 71.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 22, '2010-09-30', 2010, 9, 0, 71.88, 32.62, 0.00, 0.00, 39.26, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 23, '2010-10-15', 2010, 10, 0, 39.26, 32.62, 0.00, 0.00, 6.64, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(43, '10144', '', 24, '2010-10-31', 2010, 10, 0, 6.64, 6.64, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 1, '2009-11-15', 2009, 11, 0, 17522.13, 365.05, 0.00, 0.00, 17157.08, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 2, '2009-11-30', 2009, 11, 0, 17157.08, 365.05, 0.00, 0.00, 16792.03, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 3, '2009-12-15', 2009, 12, 0, 16792.03, 365.05, 0.00, 0.00, 16426.98, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 4, '2009-12-31', 2009, 12, 0, 16426.98, 365.05, 0.00, 0.00, 16061.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 5, '2010-01-15', 2010, 1, 0, 16061.93, 365.05, 0.00, 0.00, 15696.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 6, '2010-01-31', 2010, 1, 0, 15696.88, 365.05, 0.00, 0.00, 15331.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 7, '2010-02-15', 2010, 2, 0, 15331.83, 365.05, 0.00, 0.00, 14966.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 8, '2010-02-28', 2010, 2, 0, 14966.78, 365.05, 0.00, 0.00, 14601.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 9, '2010-03-15', 2010, 3, 0, 14601.73, 365.05, 0.00, 0.00, 14236.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 10, '2010-03-31', 2010, 3, 0, 14236.68, 365.05, 0.00, 0.00, 13871.63, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 11, '2010-04-15', 2010, 4, 0, 13871.63, 365.05, 0.00, 0.00, 13506.58, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 12, '2010-04-30', 2010, 4, 0, 13506.58, 365.05, 0.00, 0.00, 13141.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 13, '2010-05-15', 2010, 5, 0, 13141.53, 365.05, 0.00, 0.00, 12776.48, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 14, '2010-05-31', 2010, 5, 0, 12776.48, 365.05, 0.00, 0.00, 12411.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 15, '2010-06-15', 2010, 6, 0, 12411.43, 365.05, 0.00, 0.00, 12046.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 16, '2010-06-30', 2010, 6, 0, 12046.38, 365.05, 0.00, 0.00, 11681.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 17, '2010-07-15', 2010, 7, 0, 11681.33, 365.05, 0.00, 0.00, 11316.28, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 18, '2010-07-31', 2010, 7, 0, 11316.28, 365.05, 0.00, 0.00, 10951.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 19, '2010-08-15', 2010, 8, 0, 10951.23, 365.05, 0.00, 0.00, 10586.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 20, '2010-08-31', 2010, 8, 0, 10586.18, 365.05, 0.00, 0.00, 10221.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 21, '2010-09-15', 2010, 9, 0, 10221.13, 365.05, 0.00, 0.00, 9856.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 22, '2010-09-30', 2010, 9, 0, 9856.08, 365.05, 0.00, 0.00, 9491.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 23, '2010-10-15', 2010, 10, 0, 9491.03, 365.05, 0.00, 0.00, 9125.98, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 24, '2010-10-31', 2010, 10, 0, 9125.98, 365.05, 0.00, 0.00, 8760.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 25, '2010-11-15', 2010, 11, 0, 8760.93, 365.05, 0.00, 0.00, 8395.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 26, '2010-11-30', 2010, 11, 0, 8395.88, 365.05, 0.00, 0.00, 8030.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 27, '2010-12-15', 2010, 12, 0, 8030.83, 365.05, 0.00, 0.00, 7665.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 28, '2010-12-31', 2010, 12, 0, 7665.78, 365.05, 0.00, 0.00, 7300.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 29, '2011-01-15', 2011, 1, 0, 7300.73, 365.05, 0.00, 0.00, 6935.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 30, '2011-01-31', 2011, 1, 0, 6935.68, 365.05, 0.00, 0.00, 6570.63, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 31, '2011-02-15', 2011, 2, 0, 6570.63, 365.05, 0.00, 0.00, 6205.58, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 32, '2011-02-28', 2011, 2, 0, 6205.58, 365.05, 0.00, 0.00, 5840.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 33, '2011-03-15', 2011, 3, 0, 5840.53, 365.05, 0.00, 0.00, 5475.48, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 34, '2011-03-31', 2011, 3, 0, 5475.48, 365.05, 0.00, 0.00, 5110.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 35, '2011-04-15', 2011, 4, 0, 5110.43, 365.05, 0.00, 0.00, 4745.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 36, '2011-04-30', 2011, 4, 0, 4745.38, 365.05, 0.00, 0.00, 4380.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 37, '2011-05-15', 2011, 5, 0, 4380.33, 365.05, 0.00, 0.00, 4015.28, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 38, '2011-05-31', 2011, 5, 0, 4015.28, 365.05, 0.00, 0.00, 3650.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 39, '2011-06-15', 2011, 6, 0, 3650.23, 365.05, 0.00, 0.00, 3285.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 40, '2011-06-30', 2011, 6, 0, 3285.18, 365.05, 0.00, 0.00, 2920.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 41, '2011-07-15', 2011, 7, 0, 2920.13, 365.05, 0.00, 0.00, 2555.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 42, '2011-07-31', 2011, 7, 0, 2555.08, 365.05, 0.00, 0.00, 2190.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 43, '2011-08-15', 2011, 8, 0, 2190.03, 365.05, 0.00, 0.00, 1824.98, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 44, '2011-08-31', 2011, 8, 0, 1824.98, 365.05, 0.00, 0.00, 1459.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 45, '2011-09-15', 2011, 9, 0, 1459.93, 365.05, 0.00, 0.00, 1094.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 46, '2011-09-30', 2011, 9, 0, 1094.88, 365.05, 0.00, 0.00, 729.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 47, '2011-10-15', 2011, 10, 0, 729.83, 365.05, 0.00, 0.00, 364.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(44, '10125', '', 48, '2011-10-31', 2011, 10, 0, 364.78, 364.78, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 1, '2009-11-15', 2009, 11, 0, 1123.87, 25.89, 0.00, 0.00, 1097.98, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 2, '2009-11-30', 2009, 11, 0, 1097.98, 25.89, 0.00, 0.00, 1072.09, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 3, '2009-12-15', 2009, 12, 0, 1072.09, 25.89, 0.00, 0.00, 1046.20, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 4, '2009-12-31', 2009, 12, 0, 1046.20, 25.89, 0.00, 0.00, 1020.31, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 5, '2010-01-15', 2010, 1, 0, 1020.31, 25.89, 0.00, 0.00, 994.42, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 6, '2010-01-31', 2010, 1, 0, 994.42, 25.89, 0.00, 0.00, 968.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 7, '2010-02-15', 2010, 2, 0, 968.53, 25.89, 0.00, 0.00, 942.64, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 8, '2010-02-28', 2010, 2, 0, 942.64, 25.89, 0.00, 0.00, 916.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 9, '2010-03-15', 2010, 3, 0, 916.75, 25.89, 0.00, 0.00, 890.86, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 10, '2010-03-31', 2010, 3, 0, 890.86, 25.89, 0.00, 0.00, 864.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 11, '2010-04-15', 2010, 4, 0, 864.97, 25.89, 0.00, 0.00, 839.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 12, '2010-04-30', 2010, 4, 0, 839.08, 25.89, 0.00, 0.00, 813.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 13, '2010-05-15', 2010, 5, 0, 813.19, 25.89, 0.00, 0.00, 787.30, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 14, '2010-05-31', 2010, 5, 0, 787.30, 25.89, 0.00, 0.00, 761.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 15, '2010-06-15', 2010, 6, 0, 761.41, 25.89, 0.00, 0.00, 735.52, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 16, '2010-06-30', 2010, 6, 0, 735.52, 25.89, 0.00, 0.00, 709.63, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 17, '2010-07-15', 2010, 7, 0, 709.63, 25.89, 0.00, 0.00, 683.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 18, '2010-07-31', 2010, 7, 0, 683.74, 25.89, 0.00, 0.00, 657.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 19, '2010-08-15', 2010, 8, 0, 657.85, 25.89, 0.00, 0.00, 631.96, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 20, '2010-08-31', 2010, 8, 0, 631.96, 25.89, 0.00, 0.00, 606.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 21, '2010-09-15', 2010, 9, 0, 606.07, 25.89, 0.00, 0.00, 580.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 22, '2010-09-30', 2010, 9, 0, 580.18, 25.89, 0.00, 0.00, 554.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 23, '2010-10-15', 2010, 10, 0, 554.29, 25.89, 0.00, 0.00, 528.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 24, '2010-10-31', 2010, 10, 0, 528.40, 25.89, 0.00, 0.00, 502.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 25, '2010-11-15', 2010, 11, 0, 502.51, 25.89, 0.00, 0.00, 476.62, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 26, '2010-11-30', 2010, 11, 0, 476.62, 25.89, 0.00, 0.00, 450.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 27, '2010-12-15', 2010, 12, 0, 450.73, 25.89, 0.00, 0.00, 424.84, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 28, '2010-12-31', 2010, 12, 0, 424.84, 25.89, 0.00, 0.00, 398.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 29, '2011-01-15', 2011, 1, 0, 398.95, 25.89, 0.00, 0.00, 373.06, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 30, '2011-01-31', 2011, 1, 0, 373.06, 25.89, 0.00, 0.00, 347.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 31, '2011-02-15', 2011, 2, 0, 347.17, 25.89, 0.00, 0.00, 321.28, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 32, '2011-02-28', 2011, 2, 0, 321.28, 25.89, 0.00, 0.00, 295.39, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 33, '2011-03-15', 2011, 3, 0, 295.39, 25.89, 0.00, 0.00, 269.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 34, '2011-03-31', 2011, 3, 0, 269.50, 25.89, 0.00, 0.00, 243.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 35, '2011-04-15', 2011, 4, 0, 243.61, 25.89, 0.00, 0.00, 217.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 36, '2011-04-30', 2011, 4, 0, 217.72, 25.89, 0.00, 0.00, 191.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 37, '2011-05-15', 2011, 5, 0, 191.83, 25.89, 0.00, 0.00, 165.94, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 38, '2011-05-31', 2011, 5, 0, 165.94, 25.89, 0.00, 0.00, 140.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 39, '2011-06-15', 2011, 6, 0, 140.05, 25.89, 0.00, 0.00, 114.16, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 40, '2011-06-30', 2011, 6, 0, 114.16, 25.89, 0.00, 0.00, 88.27, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 41, '2011-07-15', 2011, 7, 0, 88.27, 25.89, 0.00, 0.00, 62.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 42, '2011-07-31', 2011, 7, 0, 62.38, 25.89, 0.00, 0.00, 36.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 43, '2011-08-15', 2011, 8, 0, 36.49, 25.89, 0.00, 0.00, 10.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(45, '10204', '', 44, '2011-08-31', 2011, 8, 0, 10.60, 10.60, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(46, '10204', '', 1, '2009-11-15', 2009, 11, 0, 65.05, 32.52, 0.00, 0.00, 32.53, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(46, '10204', '', 2, '2009-11-30', 2009, 11, 0, 32.53, 32.52, 0.00, 0.00, 0.01, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 1, '2009-11-15', 2009, 11, 0, 181.93, 7.25, 0.00, 0.00, 174.68, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 2, '2009-11-30', 2009, 11, 0, 174.68, 7.25, 0.00, 0.00, 167.43, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 3, '2009-12-15', 2009, 12, 0, 167.43, 7.25, 0.00, 0.00, 160.18, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 4, '2009-12-31', 2009, 12, 0, 160.18, 7.25, 0.00, 0.00, 152.93, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 5, '2010-01-15', 2010, 1, 0, 152.93, 7.25, 0.00, 0.00, 145.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 6, '2010-01-31', 2010, 1, 0, 145.68, 7.25, 0.00, 0.00, 138.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 7, '2010-02-15', 2010, 2, 0, 138.43, 7.25, 0.00, 0.00, 131.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 8, '2010-02-28', 2010, 2, 0, 131.18, 7.25, 0.00, 0.00, 123.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 9, '2010-03-15', 2010, 3, 0, 123.93, 7.25, 0.00, 0.00, 116.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 10, '2010-03-31', 2010, 3, 0, 116.68, 7.25, 0.00, 0.00, 109.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 11, '2010-04-15', 2010, 4, 0, 109.43, 7.25, 0.00, 0.00, 102.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 12, '2010-04-30', 2010, 4, 0, 102.18, 7.25, 0.00, 0.00, 94.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 13, '2010-05-15', 2010, 5, 0, 94.93, 7.25, 0.00, 0.00, 87.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 14, '2010-05-31', 2010, 5, 0, 87.68, 7.25, 0.00, 0.00, 80.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 15, '2010-06-15', 2010, 6, 0, 80.43, 7.25, 0.00, 0.00, 73.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 16, '2010-06-30', 2010, 6, 0, 73.18, 7.25, 0.00, 0.00, 65.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 17, '2010-07-15', 2010, 7, 0, 65.93, 7.25, 0.00, 0.00, 58.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 18, '2010-07-31', 2010, 7, 0, 58.68, 7.25, 0.00, 0.00, 51.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 19, '2010-08-15', 2010, 8, 0, 51.43, 7.25, 0.00, 0.00, 44.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 20, '2010-08-31', 2010, 8, 0, 44.18, 7.25, 0.00, 0.00, 36.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 21, '2010-09-15', 2010, 9, 0, 36.93, 7.25, 0.00, 0.00, 29.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 22, '2010-09-30', 2010, 9, 0, 29.68, 7.25, 0.00, 0.00, 22.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 23, '2010-10-15', 2010, 10, 0, 22.43, 7.25, 0.00, 0.00, 15.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 24, '2010-10-31', 2010, 10, 0, 15.18, 7.25, 0.00, 0.00, 7.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 25, '2010-11-15', 2010, 11, 0, 7.93, 7.25, 0.00, 0.00, 0.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(47, '10204', '', 26, '2010-11-30', 2010, 11, 0, 0.68, 0.68, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 1, '2009-11-15', 2009, 11, 0, 1378.85, 59.98, 0.00, 0.00, 1318.87, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 2, '2009-11-30', 2009, 11, 0, 1318.87, 59.98, 0.00, 0.00, 1258.89, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 3, '2009-12-15', 2009, 12, 0, 1258.89, 59.98, 0.00, 0.00, 1198.91, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 4, '2009-12-31', 2009, 12, 0, 1198.91, 59.98, 0.00, 0.00, 1138.93, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 5, '2010-01-15', 2010, 1, 0, 1138.93, 59.98, 0.00, 0.00, 1078.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 6, '2010-01-31', 2010, 1, 0, 1078.95, 59.98, 0.00, 0.00, 1018.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 7, '2010-02-15', 2010, 2, 0, 1018.97, 59.98, 0.00, 0.00, 958.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 8, '2010-02-28', 2010, 2, 0, 958.99, 59.98, 0.00, 0.00, 899.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 9, '2010-03-15', 2010, 3, 0, 899.01, 59.98, 0.00, 0.00, 839.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 10, '2010-03-31', 2010, 3, 0, 839.03, 59.98, 0.00, 0.00, 779.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 11, '2010-04-15', 2010, 4, 0, 779.05, 59.98, 0.00, 0.00, 719.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 12, '2010-04-30', 2010, 4, 0, 719.07, 59.98, 0.00, 0.00, 659.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 13, '2010-05-15', 2010, 5, 0, 659.09, 59.98, 0.00, 0.00, 599.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 14, '2010-05-31', 2010, 5, 0, 599.11, 59.98, 0.00, 0.00, 539.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 15, '2010-06-15', 2010, 6, 0, 539.13, 59.98, 0.00, 0.00, 479.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 16, '2010-06-30', 2010, 6, 0, 479.15, 59.98, 0.00, 0.00, 419.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 17, '2010-07-15', 2010, 7, 0, 419.17, 59.98, 0.00, 0.00, 359.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 18, '2010-07-31', 2010, 7, 0, 359.19, 59.98, 0.00, 0.00, 299.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 19, '2010-08-15', 2010, 8, 0, 299.21, 59.98, 0.00, 0.00, 239.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 20, '2010-08-31', 2010, 8, 0, 239.23, 59.98, 0.00, 0.00, 179.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 21, '2010-09-15', 2010, 9, 0, 179.25, 59.98, 0.00, 0.00, 119.27, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 22, '2010-09-30', 2010, 9, 0, 119.27, 59.98, 0.00, 0.00, 59.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(48, '10169', '', 23, '2010-10-15', 2010, 10, 0, 59.29, 59.29, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 1, '2009-11-15', 2009, 11, 0, 1592.25, 23.55, 0.00, 0.00, 1568.70, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 2, '2009-11-30', 2009, 11, 0, 1568.70, 23.55, 0.00, 0.00, 1545.15, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 3, '2009-12-15', 2009, 12, 0, 1545.15, 23.55, 0.00, 0.00, 1521.60, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 4, '2009-12-31', 2009, 12, 0, 1521.60, 23.55, 0.00, 0.00, 1498.05, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 5, '2010-01-15', 2010, 1, 0, 1498.05, 23.55, 0.00, 0.00, 1474.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 6, '2010-01-31', 2010, 1, 0, 1474.50, 23.55, 0.00, 0.00, 1450.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 7, '2010-02-15', 2010, 2, 0, 1450.95, 23.55, 0.00, 0.00, 1427.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 8, '2010-02-28', 2010, 2, 0, 1427.40, 23.55, 0.00, 0.00, 1403.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 9, '2010-03-15', 2010, 3, 0, 1403.85, 23.55, 0.00, 0.00, 1380.30, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 10, '2010-03-31', 2010, 3, 0, 1380.30, 23.55, 0.00, 0.00, 1356.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 11, '2010-04-15', 2010, 4, 0, 1356.75, 23.55, 0.00, 0.00, 1333.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 12, '2010-04-30', 2010, 4, 0, 1333.20, 23.55, 0.00, 0.00, 1309.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 13, '2010-05-15', 2010, 5, 0, 1309.65, 23.55, 0.00, 0.00, 1286.10, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 14, '2010-05-31', 2010, 5, 0, 1286.10, 23.55, 0.00, 0.00, 1262.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 15, '2010-06-15', 2010, 6, 0, 1262.55, 23.55, 0.00, 0.00, 1239.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 16, '2010-06-30', 2010, 6, 0, 1239.00, 23.55, 0.00, 0.00, 1215.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 17, '2010-07-15', 2010, 7, 0, 1215.45, 23.55, 0.00, 0.00, 1191.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 18, '2010-07-31', 2010, 7, 0, 1191.90, 23.55, 0.00, 0.00, 1168.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 19, '2010-08-15', 2010, 8, 0, 1168.35, 23.55, 0.00, 0.00, 1144.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 20, '2010-08-31', 2010, 8, 0, 1144.80, 23.55, 0.00, 0.00, 1121.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 21, '2010-09-15', 2010, 9, 0, 1121.25, 23.55, 0.00, 0.00, 1097.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 22, '2010-09-30', 2010, 9, 0, 1097.70, 23.55, 0.00, 0.00, 1074.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 23, '2010-10-15', 2010, 10, 0, 1074.15, 23.55, 0.00, 0.00, 1050.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 24, '2010-10-31', 2010, 10, 0, 1050.60, 23.55, 0.00, 0.00, 1027.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 25, '2010-11-15', 2010, 11, 0, 1027.05, 23.55, 0.00, 0.00, 1003.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 26, '2010-11-30', 2010, 11, 0, 1003.50, 23.55, 0.00, 0.00, 979.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 27, '2010-12-15', 2010, 12, 0, 979.95, 23.55, 0.00, 0.00, 956.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 28, '2010-12-31', 2010, 12, 0, 956.40, 23.55, 0.00, 0.00, 932.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 29, '2011-01-15', 2011, 1, 0, 932.85, 23.55, 0.00, 0.00, 909.30, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 30, '2011-01-31', 2011, 1, 0, 909.30, 23.55, 0.00, 0.00, 885.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 31, '2011-02-15', 2011, 2, 0, 885.75, 23.55, 0.00, 0.00, 862.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 32, '2011-02-28', 2011, 2, 0, 862.20, 23.55, 0.00, 0.00, 838.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 33, '2011-03-15', 2011, 3, 0, 838.65, 23.55, 0.00, 0.00, 815.10, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 34, '2011-03-31', 2011, 3, 0, 815.10, 23.55, 0.00, 0.00, 791.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 35, '2011-04-15', 2011, 4, 0, 791.55, 23.55, 0.00, 0.00, 768.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 36, '2011-04-30', 2011, 4, 0, 768.00, 23.55, 0.00, 0.00, 744.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 37, '2011-05-15', 2011, 5, 0, 744.45, 23.55, 0.00, 0.00, 720.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 38, '2011-05-31', 2011, 5, 0, 720.90, 23.55, 0.00, 0.00, 697.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 39, '2011-06-15', 2011, 6, 0, 697.35, 23.55, 0.00, 0.00, 673.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 40, '2011-06-30', 2011, 6, 0, 673.80, 23.55, 0.00, 0.00, 650.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 41, '2011-07-15', 2011, 7, 0, 650.25, 23.55, 0.00, 0.00, 626.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 42, '2011-07-31', 2011, 7, 0, 626.70, 23.55, 0.00, 0.00, 603.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 43, '2011-08-15', 2011, 8, 0, 603.15, 23.55, 0.00, 0.00, 579.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 44, '2011-08-31', 2011, 8, 0, 579.60, 23.55, 0.00, 0.00, 556.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 45, '2011-09-15', 2011, 9, 0, 556.05, 23.55, 0.00, 0.00, 532.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 46, '2011-09-30', 2011, 9, 0, 532.50, 23.55, 0.00, 0.00, 508.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 47, '2011-10-15', 2011, 10, 0, 508.95, 23.55, 0.00, 0.00, 485.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 48, '2011-10-31', 2011, 10, 0, 485.40, 23.55, 0.00, 0.00, 461.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 49, '2011-11-15', 2011, 11, 0, 461.85, 23.55, 0.00, 0.00, 438.30, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 50, '2011-11-30', 2011, 11, 0, 438.30, 23.55, 0.00, 0.00, 414.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 51, '2011-12-15', 2011, 12, 0, 414.75, 23.55, 0.00, 0.00, 391.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 52, '2011-12-31', 2011, 12, 0, 391.20, 23.55, 0.00, 0.00, 367.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 53, '0012-01-15', 2012, 1, 0, 367.65, 23.55, 0.00, 0.00, 344.10, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 54, '0012-01-31', 2012, 1, 0, 344.10, 23.55, 0.00, 0.00, 320.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 55, '0012-02-15', 2012, 2, 0, 320.55, 23.55, 0.00, 0.00, 297.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 56, '0012-02-29', 2012, 2, 0, 297.00, 23.55, 0.00, 0.00, 273.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 57, '0012-03-15', 2012, 3, 0, 273.45, 23.55, 0.00, 0.00, 249.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 58, '0012-03-31', 2012, 3, 0, 249.90, 23.55, 0.00, 0.00, 226.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 59, '0012-04-15', 2012, 4, 0, 226.35, 23.55, 0.00, 0.00, 202.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 60, '0012-04-30', 2012, 4, 0, 202.80, 23.55, 0.00, 0.00, 179.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 61, '0012-05-15', 2012, 5, 0, 179.25, 23.55, 0.00, 0.00, 155.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 62, '0012-05-31', 2012, 5, 0, 155.70, 23.55, 0.00, 0.00, 132.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 63, '0012-06-15', 2012, 6, 0, 132.15, 23.55, 0.00, 0.00, 108.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 64, '0012-06-30', 2012, 6, 0, 108.60, 23.55, 0.00, 0.00, 85.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 65, '0012-07-15', 2012, 7, 0, 85.05, 23.55, 0.00, 0.00, 61.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 66, '0012-07-31', 2012, 7, 0, 61.50, 23.55, 0.00, 0.00, 37.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 67, '0012-08-15', 2012, 8, 0, 37.95, 23.55, 0.00, 0.00, 14.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(49, '10178', '', 68, '0012-08-31', 2012, 8, 0, 14.40, 14.40, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 1, '2009-11-15', 2009, 11, 0, 654.25, 34.65, 0.00, 0.00, 619.60, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 2, '2009-11-30', 2009, 11, 0, 619.60, 34.65, 0.00, 0.00, 584.95, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 3, '2009-12-15', 2009, 12, 0, 584.95, 34.65, 0.00, 0.00, 550.30, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 4, '2009-12-31', 2009, 12, 0, 550.30, 34.65, 0.00, 0.00, 515.65, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 5, '2010-01-15', 2010, 1, 0, 515.65, 34.65, 0.00, 0.00, 481.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 6, '2010-01-31', 2010, 1, 0, 481.00, 34.65, 0.00, 0.00, 446.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 7, '2010-02-15', 2010, 2, 0, 446.35, 34.65, 0.00, 0.00, 411.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 8, '2010-02-28', 2010, 2, 0, 411.70, 34.65, 0.00, 0.00, 377.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 9, '2010-03-15', 2010, 3, 0, 377.05, 34.65, 0.00, 0.00, 342.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 10, '2010-03-31', 2010, 3, 0, 342.40, 34.65, 0.00, 0.00, 307.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 11, '2010-04-15', 2010, 4, 0, 307.75, 34.65, 0.00, 0.00, 273.10, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 12, '2010-04-30', 2010, 4, 0, 273.10, 34.65, 0.00, 0.00, 238.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 13, '2010-05-15', 2010, 5, 0, 238.45, 34.65, 0.00, 0.00, 203.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 14, '2010-05-31', 2010, 5, 0, 203.80, 34.65, 0.00, 0.00, 169.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 15, '2010-06-15', 2010, 6, 0, 169.15, 34.65, 0.00, 0.00, 134.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 16, '2010-06-30', 2010, 6, 0, 134.50, 34.65, 0.00, 0.00, 99.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 17, '2010-07-15', 2010, 7, 0, 99.85, 34.65, 0.00, 0.00, 65.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 18, '2010-07-31', 2010, 7, 0, 65.20, 34.65, 0.00, 0.00, 30.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(50, '10178', '', 19, '2010-08-15', 2010, 8, 0, 30.55, 30.55, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 1, '2009-11-15', 2009, 11, 0, 2028.93, 94.15, 0.00, 0.00, 1934.78, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 2, '2009-11-30', 2009, 11, 0, 1934.78, 94.15, 0.00, 0.00, 1840.63, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 3, '2009-12-15', 2009, 12, 0, 1840.63, 94.15, 0.00, 0.00, 1746.48, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 4, '2009-12-31', 2009, 12, 0, 1746.48, 94.15, 0.00, 0.00, 1652.33, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 5, '2010-01-15', 2010, 1, 0, 1652.33, 94.15, 0.00, 0.00, 1558.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 6, '2010-01-31', 2010, 1, 0, 1558.18, 94.15, 0.00, 0.00, 1464.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 7, '2010-02-15', 2010, 2, 0, 1464.03, 94.15, 0.00, 0.00, 1369.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 8, '2010-02-28', 2010, 2, 0, 1369.88, 94.15, 0.00, 0.00, 1275.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 9, '2010-03-15', 2010, 3, 0, 1275.73, 94.15, 0.00, 0.00, 1181.58, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 10, '2010-03-31', 2010, 3, 0, 1181.58, 94.15, 0.00, 0.00, 1087.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 11, '2010-04-15', 2010, 4, 0, 1087.43, 94.15, 0.00, 0.00, 993.28, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 12, '2010-04-30', 2010, 4, 0, 993.28, 94.15, 0.00, 0.00, 899.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 13, '2010-05-15', 2010, 5, 0, 899.13, 94.15, 0.00, 0.00, 804.98, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 14, '2010-05-31', 2010, 5, 0, 804.98, 94.15, 0.00, 0.00, 710.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 15, '2010-06-15', 2010, 6, 0, 710.83, 94.15, 0.00, 0.00, 616.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 16, '2010-06-30', 2010, 6, 0, 616.68, 94.15, 0.00, 0.00, 522.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 17, '2010-07-15', 2010, 7, 0, 522.53, 94.15, 0.00, 0.00, 428.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 18, '2010-07-31', 2010, 7, 0, 428.38, 94.15, 0.00, 0.00, 334.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 19, '2010-08-15', 2010, 8, 0, 334.23, 94.15, 0.00, 0.00, 240.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 20, '2010-08-31', 2010, 8, 0, 240.08, 94.15, 0.00, 0.00, 145.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 21, '2010-09-15', 2010, 9, 0, 145.93, 94.15, 0.00, 0.00, 51.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(51, '10217', '', 22, '2010-09-30', 2010, 9, 0, 51.78, 51.78, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 1, '2009-11-15', 2009, 11, 0, 1095.62, 47.98, 0.00, 0.00, 1047.64, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 2, '2009-11-30', 2009, 11, 0, 1047.64, 47.98, 0.00, 0.00, 999.66, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 3, '2009-12-15', 2009, 12, 0, 999.66, 47.98, 0.00, 0.00, 951.68, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 4, '2009-12-31', 2009, 12, 0, 951.68, 47.98, 0.00, 0.00, 903.70, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 5, '2010-01-15', 2010, 1, 0, 903.70, 47.98, 0.00, 0.00, 855.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 6, '2010-01-31', 2010, 1, 0, 855.72, 47.98, 0.00, 0.00, 807.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 7, '2010-02-15', 2010, 2, 0, 807.74, 47.98, 0.00, 0.00, 759.76, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 8, '2010-02-28', 2010, 2, 0, 759.76, 47.98, 0.00, 0.00, 711.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0);
INSERT INTO `nomprestamos_detalles` (`numpre`, `ficha`, `tipocuo`, `numcuo`, `fechaven`, `anioven`, `mesven`, `dias`, `salinicial`, `montocuo`, `montoint`, `montocap`, `salfinal`, `fechacan`, `estadopre`, `detalle`, `dedespecial`, `codnom`, `sfechaven`, `sfechacan`, `ee`) VALUES
(52, '10221', '', 9, '2010-03-15', 2010, 3, 0, 711.78, 47.98, 0.00, 0.00, 663.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 10, '2010-03-31', 2010, 3, 0, 663.80, 47.98, 0.00, 0.00, 615.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 11, '2010-04-15', 2010, 4, 0, 615.82, 47.98, 0.00, 0.00, 567.84, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 12, '2010-04-30', 2010, 4, 0, 567.84, 47.98, 0.00, 0.00, 519.86, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 13, '2010-05-15', 2010, 5, 0, 519.86, 47.98, 0.00, 0.00, 471.88, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 14, '2010-05-31', 2010, 5, 0, 471.88, 47.98, 0.00, 0.00, 423.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 15, '2010-06-15', 2010, 6, 0, 423.90, 47.98, 0.00, 0.00, 375.92, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 16, '2010-06-30', 2010, 6, 0, 375.92, 47.98, 0.00, 0.00, 327.94, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 17, '2010-07-15', 2010, 7, 0, 327.94, 47.98, 0.00, 0.00, 279.96, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 18, '2010-07-31', 2010, 7, 0, 279.96, 47.98, 0.00, 0.00, 231.98, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 19, '2010-08-15', 2010, 8, 0, 231.98, 47.98, 0.00, 0.00, 184.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 20, '2010-08-31', 2010, 8, 0, 184.00, 47.98, 0.00, 0.00, 136.02, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 21, '2010-09-15', 2010, 9, 0, 136.02, 47.98, 0.00, 0.00, 88.04, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 22, '2010-09-30', 2010, 9, 0, 88.04, 47.98, 0.00, 0.00, 40.06, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(52, '10221', '', 23, '2010-10-15', 2010, 10, 0, 40.06, 40.06, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 1, '2009-11-15', 2009, 11, 0, 2302.84, 53.43, 0.00, 0.00, 2249.41, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 2, '2009-11-30', 2009, 11, 0, 2249.41, 53.43, 0.00, 0.00, 2195.98, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 3, '2009-12-15', 2009, 12, 0, 2195.98, 53.43, 0.00, 0.00, 2142.55, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 4, '2009-12-31', 2009, 12, 0, 2142.55, 53.43, 0.00, 0.00, 2089.12, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 5, '2010-01-15', 2010, 1, 0, 2089.12, 53.43, 0.00, 0.00, 2035.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 6, '2010-01-31', 2010, 1, 0, 2035.69, 53.43, 0.00, 0.00, 1982.26, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 7, '2010-02-15', 2010, 2, 0, 1982.26, 53.43, 0.00, 0.00, 1928.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 8, '2010-02-28', 2010, 2, 0, 1928.83, 53.43, 0.00, 0.00, 1875.40, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 9, '2010-03-15', 2010, 3, 0, 1875.40, 53.43, 0.00, 0.00, 1821.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 10, '2010-03-31', 2010, 3, 0, 1821.97, 53.43, 0.00, 0.00, 1768.54, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 11, '2010-04-15', 2010, 4, 0, 1768.54, 53.43, 0.00, 0.00, 1715.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 12, '2010-04-30', 2010, 4, 0, 1715.11, 53.43, 0.00, 0.00, 1661.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 13, '2010-05-15', 2010, 5, 0, 1661.68, 53.43, 0.00, 0.00, 1608.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 14, '2010-05-31', 2010, 5, 0, 1608.25, 53.43, 0.00, 0.00, 1554.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 15, '2010-06-15', 2010, 6, 0, 1554.82, 53.43, 0.00, 0.00, 1501.39, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 16, '2010-06-30', 2010, 6, 0, 1501.39, 53.43, 0.00, 0.00, 1447.96, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 17, '2010-07-15', 2010, 7, 0, 1447.96, 53.43, 0.00, 0.00, 1394.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 18, '2010-07-31', 2010, 7, 0, 1394.53, 53.43, 0.00, 0.00, 1341.10, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 19, '2010-08-15', 2010, 8, 0, 1341.10, 53.43, 0.00, 0.00, 1287.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 20, '2010-08-31', 2010, 8, 0, 1287.67, 53.43, 0.00, 0.00, 1234.24, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 21, '2010-09-15', 2010, 9, 0, 1234.24, 53.43, 0.00, 0.00, 1180.81, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 22, '2010-09-30', 2010, 9, 0, 1180.81, 53.43, 0.00, 0.00, 1127.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 23, '2010-10-15', 2010, 10, 0, 1127.38, 53.43, 0.00, 0.00, 1073.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 24, '2010-10-31', 2010, 10, 0, 1073.95, 53.43, 0.00, 0.00, 1020.52, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 25, '2010-11-15', 2010, 11, 0, 1020.52, 53.43, 0.00, 0.00, 967.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 26, '2010-11-30', 2010, 11, 0, 967.09, 53.43, 0.00, 0.00, 913.66, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 27, '2010-12-15', 2010, 12, 0, 913.66, 53.43, 0.00, 0.00, 860.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 28, '2010-12-31', 2010, 12, 0, 860.23, 53.43, 0.00, 0.00, 806.80, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 29, '2011-01-15', 2011, 1, 0, 806.80, 53.43, 0.00, 0.00, 753.37, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 30, '2011-01-31', 2011, 1, 0, 753.37, 53.43, 0.00, 0.00, 699.94, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 31, '2011-02-15', 2011, 2, 0, 699.94, 53.43, 0.00, 0.00, 646.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 32, '2011-02-28', 2011, 2, 0, 646.51, 53.43, 0.00, 0.00, 593.08, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 33, '2011-03-15', 2011, 3, 0, 593.08, 53.43, 0.00, 0.00, 539.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 34, '2011-03-31', 2011, 3, 0, 539.65, 53.43, 0.00, 0.00, 486.22, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 35, '2011-04-15', 2011, 4, 0, 486.22, 53.43, 0.00, 0.00, 432.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 36, '2011-04-30', 2011, 4, 0, 432.79, 53.43, 0.00, 0.00, 379.36, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 37, '2011-05-15', 2011, 5, 0, 379.36, 53.43, 0.00, 0.00, 325.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 38, '2011-05-31', 2011, 5, 0, 325.93, 53.43, 0.00, 0.00, 272.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 39, '2011-06-15', 2011, 6, 0, 272.50, 53.43, 0.00, 0.00, 219.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 40, '2011-06-30', 2011, 6, 0, 219.07, 53.43, 0.00, 0.00, 165.64, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 41, '2011-07-15', 2011, 7, 0, 165.64, 53.43, 0.00, 0.00, 112.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 42, '2011-07-31', 2011, 7, 0, 112.21, 53.43, 0.00, 0.00, 58.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 43, '2011-08-15', 2011, 8, 0, 58.78, 53.43, 0.00, 0.00, 5.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(53, '10219', '', 44, '2011-08-31', 2011, 8, 0, 5.35, 5.35, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 1, '2009-11-15', 2009, 11, 0, 1369.53, 31.76, 0.00, 0.00, 1337.77, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 2, '2009-11-30', 2009, 11, 0, 1337.77, 31.76, 0.00, 0.00, 1306.01, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 3, '2009-12-15', 2009, 12, 0, 1306.01, 31.76, 0.00, 0.00, 1274.25, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 4, '2009-12-31', 2009, 12, 0, 1274.25, 31.76, 0.00, 0.00, 1242.49, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 5, '2010-01-15', 2010, 1, 0, 1242.49, 31.76, 0.00, 0.00, 1210.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 6, '2010-01-31', 2010, 1, 0, 1210.73, 31.76, 0.00, 0.00, 1178.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 7, '2010-02-15', 2010, 2, 0, 1178.97, 31.76, 0.00, 0.00, 1147.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 8, '2010-02-28', 2010, 2, 0, 1147.21, 31.76, 0.00, 0.00, 1115.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 9, '2010-03-15', 2010, 3, 0, 1115.45, 31.76, 0.00, 0.00, 1083.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 10, '2010-03-31', 2010, 3, 0, 1083.69, 31.76, 0.00, 0.00, 1051.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 11, '2010-04-15', 2010, 4, 0, 1051.93, 31.76, 0.00, 0.00, 1020.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 12, '2010-04-30', 2010, 4, 0, 1020.17, 31.76, 0.00, 0.00, 988.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 13, '2010-05-15', 2010, 5, 0, 988.41, 31.76, 0.00, 0.00, 956.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 14, '2010-05-31', 2010, 5, 0, 956.65, 31.76, 0.00, 0.00, 924.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 15, '2010-06-15', 2010, 6, 0, 924.89, 31.76, 0.00, 0.00, 893.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 16, '2010-06-30', 2010, 6, 0, 893.13, 31.76, 0.00, 0.00, 861.37, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 17, '2010-07-15', 2010, 7, 0, 861.37, 31.76, 0.00, 0.00, 829.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 18, '2010-07-31', 2010, 7, 0, 829.61, 31.76, 0.00, 0.00, 797.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 19, '2010-08-15', 2010, 8, 0, 797.85, 31.76, 0.00, 0.00, 766.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 20, '2010-08-31', 2010, 8, 0, 766.09, 31.76, 0.00, 0.00, 734.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 21, '2010-09-15', 2010, 9, 0, 734.33, 31.76, 0.00, 0.00, 702.57, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 22, '2010-09-30', 2010, 9, 0, 702.57, 31.76, 0.00, 0.00, 670.81, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 23, '2010-10-15', 2010, 10, 0, 670.81, 31.76, 0.00, 0.00, 639.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 24, '2010-10-31', 2010, 10, 0, 639.05, 31.76, 0.00, 0.00, 607.29, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 25, '2010-11-15', 2010, 11, 0, 607.29, 31.76, 0.00, 0.00, 575.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 26, '2010-11-30', 2010, 11, 0, 575.53, 31.76, 0.00, 0.00, 543.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 27, '2010-12-15', 2010, 12, 0, 543.77, 31.76, 0.00, 0.00, 512.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 28, '2010-12-31', 2010, 12, 0, 512.01, 31.76, 0.00, 0.00, 480.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 29, '2011-01-15', 2011, 1, 0, 480.25, 31.76, 0.00, 0.00, 448.49, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 30, '2011-01-31', 2011, 1, 0, 448.49, 31.76, 0.00, 0.00, 416.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 31, '2011-02-15', 2011, 2, 0, 416.73, 31.76, 0.00, 0.00, 384.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 32, '2011-02-28', 2011, 2, 0, 384.97, 31.76, 0.00, 0.00, 353.21, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 33, '2011-03-15', 2011, 3, 0, 353.21, 31.76, 0.00, 0.00, 321.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 34, '2011-03-31', 2011, 3, 0, 321.45, 31.76, 0.00, 0.00, 289.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 35, '2011-04-15', 2011, 4, 0, 289.69, 31.76, 0.00, 0.00, 257.93, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 36, '2011-04-30', 2011, 4, 0, 257.93, 31.76, 0.00, 0.00, 226.17, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 37, '2011-05-15', 2011, 5, 0, 226.17, 31.76, 0.00, 0.00, 194.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 38, '2011-05-31', 2011, 5, 0, 194.41, 31.76, 0.00, 0.00, 162.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 39, '2011-06-15', 2011, 6, 0, 162.65, 31.76, 0.00, 0.00, 130.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 40, '2011-06-30', 2011, 6, 0, 130.89, 31.76, 0.00, 0.00, 99.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 41, '2011-07-15', 2011, 7, 0, 99.13, 31.76, 0.00, 0.00, 67.37, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 42, '2011-07-31', 2011, 7, 0, 67.37, 31.76, 0.00, 0.00, 35.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 43, '2011-08-15', 2011, 8, 0, 35.61, 31.76, 0.00, 0.00, 3.85, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(54, '10153', '', 44, '2011-08-31', 2011, 8, 0, 3.85, 3.85, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 1, '2009-11-15', 2009, 11, 0, 2854.31, 116.66, 0.00, 0.00, 2737.65, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 2, '2009-11-30', 2009, 11, 0, 2737.65, 116.66, 0.00, 0.00, 2620.99, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 3, '2009-12-15', 2009, 12, 0, 2620.99, 116.66, 0.00, 0.00, 2504.33, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 4, '2009-12-31', 2009, 12, 0, 2504.33, 116.66, 0.00, 0.00, 2387.67, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 5, '2010-01-15', 2010, 1, 0, 2387.67, 116.66, 0.00, 0.00, 2271.01, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 6, '2010-01-31', 2010, 1, 0, 2271.01, 116.66, 0.00, 0.00, 2154.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 7, '2010-02-15', 2010, 2, 0, 2154.35, 116.66, 0.00, 0.00, 2037.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 8, '2010-02-28', 2010, 2, 0, 2037.69, 116.66, 0.00, 0.00, 1921.03, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 9, '2010-03-15', 2010, 3, 0, 1921.03, 116.66, 0.00, 0.00, 1804.37, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 10, '2010-03-31', 2010, 3, 0, 1804.37, 116.66, 0.00, 0.00, 1687.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 11, '2010-04-15', 2010, 4, 0, 1687.71, 116.66, 0.00, 0.00, 1571.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 12, '2010-04-30', 2010, 4, 0, 1571.05, 116.66, 0.00, 0.00, 1454.39, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 13, '2010-05-15', 2010, 5, 0, 1454.39, 116.66, 0.00, 0.00, 1337.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 14, '2010-05-31', 2010, 5, 0, 1337.73, 116.66, 0.00, 0.00, 1221.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 15, '2010-06-15', 2010, 6, 0, 1221.07, 116.66, 0.00, 0.00, 1104.41, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 16, '2010-06-30', 2010, 6, 0, 1104.41, 116.66, 0.00, 0.00, 987.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 17, '2010-07-15', 2010, 7, 0, 987.75, 116.66, 0.00, 0.00, 871.09, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 18, '2010-07-31', 2010, 7, 0, 871.09, 116.66, 0.00, 0.00, 754.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 19, '2010-08-15', 2010, 8, 0, 754.43, 116.66, 0.00, 0.00, 637.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 20, '2010-08-31', 2010, 8, 0, 637.77, 116.66, 0.00, 0.00, 521.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 21, '2010-09-15', 2010, 9, 0, 521.11, 116.66, 0.00, 0.00, 404.45, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 22, '2010-09-30', 2010, 9, 0, 404.45, 116.66, 0.00, 0.00, 287.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 23, '2010-10-15', 2010, 10, 0, 287.79, 116.66, 0.00, 0.00, 171.13, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 24, '2010-10-31', 2010, 10, 0, 171.13, 116.66, 0.00, 0.00, 54.47, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(55, '10182', '', 25, '2010-11-15', 2010, 11, 0, 54.47, 54.47, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 1, '2009-11-15', 2009, 11, 0, 766.27, 33.12, 0.00, 0.00, 733.15, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 2, '2009-11-30', 2009, 11, 0, 733.15, 33.12, 0.00, 0.00, 700.03, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 3, '2009-12-15', 2009, 12, 0, 700.03, 33.12, 0.00, 0.00, 666.91, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 4, '2009-12-31', 2009, 12, 0, 666.91, 33.12, 0.00, 0.00, 633.79, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 5, '2010-01-15', 2010, 1, 0, 633.79, 33.12, 0.00, 0.00, 600.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 6, '2010-01-31', 2010, 1, 0, 600.67, 33.12, 0.00, 0.00, 567.55, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 7, '2010-02-15', 2010, 2, 0, 567.55, 33.12, 0.00, 0.00, 534.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 8, '2010-02-28', 2010, 2, 0, 534.43, 33.12, 0.00, 0.00, 501.31, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 9, '2010-03-15', 2010, 3, 0, 501.31, 33.12, 0.00, 0.00, 468.19, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 10, '2010-03-31', 2010, 3, 0, 468.19, 33.12, 0.00, 0.00, 435.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 11, '2010-04-15', 2010, 4, 0, 435.07, 33.12, 0.00, 0.00, 401.95, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 12, '2010-04-30', 2010, 4, 0, 401.95, 33.12, 0.00, 0.00, 368.83, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 13, '2010-05-15', 2010, 5, 0, 368.83, 33.12, 0.00, 0.00, 335.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 14, '2010-05-31', 2010, 5, 0, 335.71, 33.12, 0.00, 0.00, 302.59, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 15, '2010-06-15', 2010, 6, 0, 302.59, 33.12, 0.00, 0.00, 269.47, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 16, '2010-06-30', 2010, 6, 0, 269.47, 33.12, 0.00, 0.00, 236.35, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 17, '2010-07-15', 2010, 7, 0, 236.35, 33.12, 0.00, 0.00, 203.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 18, '2010-07-31', 2010, 7, 0, 203.23, 33.12, 0.00, 0.00, 170.11, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 19, '2010-08-15', 2010, 8, 0, 170.11, 33.12, 0.00, 0.00, 136.99, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 20, '2010-08-31', 2010, 8, 0, 136.99, 33.12, 0.00, 0.00, 103.87, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 21, '2010-09-15', 2010, 9, 0, 103.87, 33.12, 0.00, 0.00, 70.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 22, '2010-09-30', 2010, 9, 0, 70.75, 33.12, 0.00, 0.00, 37.63, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 23, '2010-10-15', 2010, 10, 0, 37.63, 33.12, 0.00, 0.00, 4.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(56, '10161', '', 24, '2010-10-31', 2010, 10, 0, 4.51, 4.51, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 1, '2009-11-15', 2009, 11, 0, 699.83, 30.01, 0.00, 0.00, 669.82, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 2, '2009-11-30', 2009, 11, 0, 669.82, 30.01, 0.00, 0.00, 639.81, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 3, '2009-12-15', 2009, 12, 0, 639.81, 30.01, 0.00, 0.00, 609.80, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 4, '2009-12-31', 2009, 12, 0, 609.80, 30.01, 0.00, 0.00, 579.79, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 5, '2010-01-15', 2010, 1, 0, 579.79, 30.01, 0.00, 0.00, 549.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 6, '2010-01-31', 2010, 1, 0, 549.78, 30.01, 0.00, 0.00, 519.77, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 7, '2010-02-15', 2010, 2, 0, 519.77, 30.01, 0.00, 0.00, 489.76, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 8, '2010-02-28', 2010, 2, 0, 489.76, 30.01, 0.00, 0.00, 459.75, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 9, '2010-03-15', 2010, 3, 0, 459.75, 30.01, 0.00, 0.00, 429.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 10, '2010-03-31', 2010, 3, 0, 429.74, 30.01, 0.00, 0.00, 399.73, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 11, '2010-04-15', 2010, 4, 0, 399.73, 30.01, 0.00, 0.00, 369.72, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 12, '2010-04-30', 2010, 4, 0, 369.72, 30.01, 0.00, 0.00, 339.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 13, '2010-05-15', 2010, 5, 0, 339.71, 30.01, 0.00, 0.00, 309.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 14, '2010-05-31', 2010, 5, 0, 309.70, 30.01, 0.00, 0.00, 279.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 15, '2010-06-15', 2010, 6, 0, 279.69, 30.01, 0.00, 0.00, 249.68, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 16, '2010-06-30', 2010, 6, 0, 249.68, 30.01, 0.00, 0.00, 219.67, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 17, '2010-07-15', 2010, 7, 0, 219.67, 30.01, 0.00, 0.00, 189.66, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 18, '2010-07-31', 2010, 7, 0, 189.66, 30.01, 0.00, 0.00, 159.65, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 19, '2010-08-15', 2010, 8, 0, 159.65, 30.01, 0.00, 0.00, 129.64, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 20, '2010-08-31', 2010, 8, 0, 129.64, 30.01, 0.00, 0.00, 99.63, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 21, '2010-09-15', 2010, 9, 0, 99.63, 30.01, 0.00, 0.00, 69.62, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 22, '2010-09-30', 2010, 9, 0, 69.62, 30.01, 0.00, 0.00, 39.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 23, '2010-10-15', 2010, 10, 0, 39.61, 30.01, 0.00, 0.00, 9.60, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(57, '10161', '', 24, '2010-10-31', 2010, 10, 0, 9.60, 9.60, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 1, '2009-11-15', 2009, 11, 0, 5745.18, 159.59, 0.00, 0.00, 5585.59, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 2, '2009-11-30', 2009, 11, 0, 5585.59, 159.59, 0.00, 0.00, 5426.00, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 3, '2009-12-15', 2009, 12, 0, 5426.00, 159.59, 0.00, 0.00, 5266.41, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 4, '2009-12-31', 2009, 12, 0, 5266.41, 159.59, 0.00, 0.00, 5106.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 5, '2010-01-15', 2010, 1, 0, 5106.82, 159.59, 0.00, 0.00, 4947.23, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 6, '2010-01-31', 2010, 1, 0, 4947.23, 159.59, 0.00, 0.00, 4787.64, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 7, '2010-02-15', 2010, 2, 0, 4787.64, 159.59, 0.00, 0.00, 4628.05, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 8, '2010-02-28', 2010, 2, 0, 4628.05, 159.59, 0.00, 0.00, 4468.46, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 9, '2010-03-15', 2010, 3, 0, 4468.46, 159.59, 0.00, 0.00, 4308.87, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 10, '2010-03-31', 2010, 3, 0, 4308.87, 159.59, 0.00, 0.00, 4149.28, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 11, '2010-04-15', 2010, 4, 0, 4149.28, 159.59, 0.00, 0.00, 3989.69, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 12, '2010-04-30', 2010, 4, 0, 3989.69, 159.59, 0.00, 0.00, 3830.10, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 13, '2010-05-15', 2010, 5, 0, 3830.10, 159.59, 0.00, 0.00, 3670.51, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 14, '2010-05-31', 2010, 5, 0, 3670.51, 159.59, 0.00, 0.00, 3510.92, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 15, '2010-06-15', 2010, 6, 0, 3510.92, 159.59, 0.00, 0.00, 3351.33, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 16, '2010-06-30', 2010, 6, 0, 3351.33, 159.59, 0.00, 0.00, 3191.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 17, '2010-07-15', 2010, 7, 0, 3191.74, 159.59, 0.00, 0.00, 3032.15, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 18, '2010-07-31', 2010, 7, 0, 3032.15, 159.59, 0.00, 0.00, 2872.56, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 19, '2010-08-15', 2010, 8, 0, 2872.56, 159.59, 0.00, 0.00, 2712.97, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 20, '2010-08-31', 2010, 8, 0, 2712.97, 159.59, 0.00, 0.00, 2553.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 21, '2010-09-15', 2010, 9, 0, 2553.38, 159.59, 0.00, 0.00, 2393.79, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 22, '2010-09-30', 2010, 9, 0, 2393.79, 159.59, 0.00, 0.00, 2234.20, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 23, '2010-10-15', 2010, 10, 0, 2234.20, 159.59, 0.00, 0.00, 2074.61, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 24, '2010-10-31', 2010, 10, 0, 2074.61, 159.59, 0.00, 0.00, 1915.02, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 25, '2010-11-15', 2010, 11, 0, 1915.02, 159.59, 0.00, 0.00, 1755.43, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 26, '2010-11-30', 2010, 11, 0, 1755.43, 159.59, 0.00, 0.00, 1595.84, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 27, '2010-12-15', 2010, 12, 0, 1595.84, 159.59, 0.00, 0.00, 1436.25, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 28, '2010-12-31', 2010, 12, 0, 1436.25, 159.59, 0.00, 0.00, 1276.66, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 29, '2011-01-15', 2011, 1, 0, 1276.66, 159.59, 0.00, 0.00, 1117.07, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 30, '2011-01-31', 2011, 1, 0, 1117.07, 159.59, 0.00, 0.00, 957.48, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 31, '2011-02-15', 2011, 2, 0, 957.48, 159.59, 0.00, 0.00, 797.89, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 32, '2011-02-28', 2011, 2, 0, 797.89, 159.59, 0.00, 0.00, 638.30, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 33, '2011-03-15', 2011, 3, 0, 638.30, 159.59, 0.00, 0.00, 478.71, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 34, '2011-03-31', 2011, 3, 0, 478.71, 159.59, 0.00, 0.00, 319.12, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 35, '2011-04-15', 2011, 4, 0, 319.12, 159.59, 0.00, 0.00, 159.53, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(58, '10039', '', 36, '2011-04-30', 2011, 4, 0, 159.53, 159.53, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 1, '2009-11-15', 2009, 11, 0, 1301.46, 30.12, 0.00, 0.00, 1271.34, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 2, '2009-11-30', 2009, 11, 0, 1271.34, 30.12, 0.00, 0.00, 1241.22, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 3, '2009-12-15', 2009, 12, 0, 1241.22, 30.12, 0.00, 0.00, 1211.10, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 4, '2009-12-31', 2009, 12, 0, 1211.10, 30.12, 0.00, 0.00, 1180.98, '0000-00-00', 'Cancelada', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 5, '2010-01-15', 2010, 1, 0, 1180.98, 30.12, 0.00, 0.00, 1150.86, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 6, '2010-01-31', 2010, 1, 0, 1150.86, 30.12, 0.00, 0.00, 1120.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 7, '2010-02-15', 2010, 2, 0, 1120.74, 30.12, 0.00, 0.00, 1090.62, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 8, '2010-02-28', 2010, 2, 0, 1090.62, 30.12, 0.00, 0.00, 1060.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 9, '2010-03-15', 2010, 3, 0, 1060.50, 30.12, 0.00, 0.00, 1030.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 10, '2010-03-31', 2010, 3, 0, 1030.38, 30.12, 0.00, 0.00, 1000.26, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 11, '2010-04-15', 2010, 4, 0, 1000.26, 30.12, 0.00, 0.00, 970.14, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 12, '2010-04-30', 2010, 4, 0, 970.14, 30.12, 0.00, 0.00, 940.02, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 13, '2010-05-15', 2010, 5, 0, 940.02, 30.12, 0.00, 0.00, 909.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 14, '2010-05-31', 2010, 5, 0, 909.90, 30.12, 0.00, 0.00, 879.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 15, '2010-06-15', 2010, 6, 0, 879.78, 30.12, 0.00, 0.00, 849.66, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 16, '2010-06-30', 2010, 6, 0, 849.66, 30.12, 0.00, 0.00, 819.54, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 17, '2010-07-15', 2010, 7, 0, 819.54, 30.12, 0.00, 0.00, 789.42, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 18, '2010-07-31', 2010, 7, 0, 789.42, 30.12, 0.00, 0.00, 759.30, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 19, '2010-08-15', 2010, 8, 0, 759.30, 30.12, 0.00, 0.00, 729.18, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 20, '2010-08-31', 2010, 8, 0, 729.18, 30.12, 0.00, 0.00, 699.06, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 21, '2010-09-15', 2010, 9, 0, 699.06, 30.12, 0.00, 0.00, 668.94, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 22, '2010-09-30', 2010, 9, 0, 668.94, 30.12, 0.00, 0.00, 638.82, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 23, '2010-10-15', 2010, 10, 0, 638.82, 30.12, 0.00, 0.00, 608.70, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 24, '2010-10-31', 2010, 10, 0, 608.70, 30.12, 0.00, 0.00, 578.58, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 25, '2010-11-15', 2010, 11, 0, 578.58, 30.12, 0.00, 0.00, 548.46, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 26, '2010-11-30', 2010, 11, 0, 548.46, 30.12, 0.00, 0.00, 518.34, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 27, '2010-12-15', 2010, 12, 0, 518.34, 30.12, 0.00, 0.00, 488.22, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 28, '2010-12-31', 2010, 12, 0, 488.22, 30.12, 0.00, 0.00, 458.10, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 29, '2011-01-15', 2011, 1, 0, 458.10, 30.12, 0.00, 0.00, 427.98, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 30, '2011-01-31', 2011, 1, 0, 427.98, 30.12, 0.00, 0.00, 397.86, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 31, '2011-02-15', 2011, 2, 0, 397.86, 30.12, 0.00, 0.00, 367.74, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 32, '2011-02-28', 2011, 2, 0, 367.74, 30.12, 0.00, 0.00, 337.62, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 33, '2011-03-15', 2011, 3, 0, 337.62, 30.12, 0.00, 0.00, 307.50, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 34, '2011-03-31', 2011, 3, 0, 307.50, 30.12, 0.00, 0.00, 277.38, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 35, '2011-04-15', 2011, 4, 0, 277.38, 30.12, 0.00, 0.00, 247.26, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 36, '2011-04-30', 2011, 4, 0, 247.26, 30.12, 0.00, 0.00, 217.14, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 37, '2011-05-15', 2011, 5, 0, 217.14, 30.12, 0.00, 0.00, 187.02, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 38, '2011-05-31', 2011, 5, 0, 187.02, 30.12, 0.00, 0.00, 156.90, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 39, '2011-06-15', 2011, 6, 0, 156.90, 30.12, 0.00, 0.00, 126.78, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 40, '2011-06-30', 2011, 6, 0, 126.78, 30.12, 0.00, 0.00, 96.66, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 41, '2011-07-15', 2011, 7, 0, 96.66, 30.12, 0.00, 0.00, 66.54, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 42, '2011-07-31', 2011, 7, 0, 66.54, 30.12, 0.00, 0.00, 36.42, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 43, '2011-08-15', 2011, 8, 0, 36.42, 30.12, 0.00, 0.00, 6.30, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(59, '10173', '', 44, '2011-08-31', 2011, 8, 0, 6.30, 6.30, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 2, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 1, '2009-11-15', 2009, 11, 0, 4500.00, 93.75, 0.00, 0.00, 4406.25, '0000-00-00', 'Cancelada', '', 0, 4, '0000-00-00', '0000-00-00', 1),
(60, '20001', '', 2, '2009-11-30', 2009, 11, 0, 4406.25, 93.75, 0.00, 0.00, 4312.50, '0000-00-00', 'Cancelada', '', 0, 4, '0000-00-00', '0000-00-00', 1),
(60, '20001', '', 3, '2009-12-15', 2009, 12, 0, 4312.50, 93.75, 0.00, 0.00, 4218.75, '0000-00-00', 'Cancelada', '', 0, 4, '0000-00-00', '0000-00-00', 1),
(60, '20001', '', 4, '2009-12-31', 2009, 12, 0, 4218.75, 93.75, 0.00, 0.00, 4125.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 5, '2010-01-15', 2010, 1, 0, 4125.00, 93.75, 0.00, 0.00, 4031.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 6, '2010-01-31', 2010, 1, 0, 4031.25, 93.75, 0.00, 0.00, 3937.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 7, '2010-02-15', 2010, 2, 0, 3937.50, 93.75, 0.00, 0.00, 3843.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 8, '2010-02-28', 2010, 2, 0, 3843.75, 93.75, 0.00, 0.00, 3750.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 9, '2010-03-15', 2010, 3, 0, 3750.00, 93.75, 0.00, 0.00, 3656.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 10, '2010-03-31', 2010, 3, 0, 3656.25, 93.75, 0.00, 0.00, 3562.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 11, '2010-04-15', 2010, 4, 0, 3562.50, 93.75, 0.00, 0.00, 3468.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 12, '2010-04-30', 2010, 4, 0, 3468.75, 93.75, 0.00, 0.00, 3375.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 13, '2010-05-15', 2010, 5, 0, 3375.00, 93.75, 0.00, 0.00, 3281.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 14, '2010-05-31', 2010, 5, 0, 3281.25, 93.75, 0.00, 0.00, 3187.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 15, '2010-06-15', 2010, 6, 0, 3187.50, 93.75, 0.00, 0.00, 3093.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 16, '2010-06-30', 2010, 6, 0, 3093.75, 93.75, 0.00, 0.00, 3000.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 17, '2010-07-15', 2010, 7, 0, 3000.00, 93.75, 0.00, 0.00, 2906.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 18, '2010-07-31', 2010, 7, 0, 2906.25, 93.75, 0.00, 0.00, 2812.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 19, '2010-08-15', 2010, 8, 0, 2812.50, 93.75, 0.00, 0.00, 2718.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 20, '2010-08-31', 2010, 8, 0, 2718.75, 93.75, 0.00, 0.00, 2625.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 21, '2010-09-15', 2010, 9, 0, 2625.00, 93.75, 0.00, 0.00, 2531.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 22, '2010-09-30', 2010, 9, 0, 2531.25, 93.75, 0.00, 0.00, 2437.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 23, '2010-10-15', 2010, 10, 0, 2437.50, 93.75, 0.00, 0.00, 2343.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 24, '2010-10-31', 2010, 10, 0, 2343.75, 93.75, 0.00, 0.00, 2250.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 25, '2010-11-15', 2010, 11, 0, 2250.00, 93.75, 0.00, 0.00, 2156.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 26, '2010-11-30', 2010, 11, 0, 2156.25, 93.75, 0.00, 0.00, 2062.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 27, '2010-12-15', 2010, 12, 0, 2062.50, 93.75, 0.00, 0.00, 1968.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 28, '2010-12-31', 2010, 12, 0, 1968.75, 93.75, 0.00, 0.00, 1875.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 29, '2011-01-15', 2011, 1, 0, 1875.00, 93.75, 0.00, 0.00, 1781.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 30, '2011-01-31', 2011, 1, 0, 1781.25, 93.75, 0.00, 0.00, 1687.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 31, '2011-02-15', 2011, 2, 0, 1687.50, 93.75, 0.00, 0.00, 1593.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 32, '2011-02-28', 2011, 2, 0, 1593.75, 93.75, 0.00, 0.00, 1500.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 33, '2011-03-15', 2011, 3, 0, 1500.00, 93.75, 0.00, 0.00, 1406.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 34, '2011-03-31', 2011, 3, 0, 1406.25, 93.75, 0.00, 0.00, 1312.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 35, '2011-04-15', 2011, 4, 0, 1312.50, 93.75, 0.00, 0.00, 1218.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 36, '2011-04-30', 2011, 4, 0, 1218.75, 93.75, 0.00, 0.00, 1125.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 37, '2011-05-15', 2011, 5, 0, 1125.00, 93.75, 0.00, 0.00, 1031.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 38, '2011-05-31', 2011, 5, 0, 1031.25, 93.75, 0.00, 0.00, 937.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 39, '2011-06-15', 2011, 6, 0, 937.50, 93.75, 0.00, 0.00, 843.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 40, '2011-06-30', 2011, 6, 0, 843.75, 93.75, 0.00, 0.00, 750.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 41, '2011-07-15', 2011, 7, 0, 750.00, 93.75, 0.00, 0.00, 656.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 42, '2011-07-31', 2011, 7, 0, 656.25, 93.75, 0.00, 0.00, 562.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 43, '2011-08-15', 2011, 8, 0, 562.50, 93.75, 0.00, 0.00, 468.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 44, '2011-08-31', 2011, 8, 0, 468.75, 93.75, 0.00, 0.00, 375.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 45, '2011-09-15', 2011, 9, 0, 375.00, 93.75, 0.00, 0.00, 281.25, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 46, '2011-09-30', 2011, 9, 0, 281.25, 93.75, 0.00, 0.00, 187.50, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 47, '2011-10-15', 2011, 10, 0, 187.50, 93.75, 0.00, 0.00, 93.75, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0),
(60, '20001', '', 48, '2011-10-31', 2011, 10, 0, 93.75, 93.75, 0.00, 0.00, 0.00, '0000-00-00', 'Pendiente', '', 0, 4, '0000-00-00', '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomprofesiones`
--

CREATE TABLE IF NOT EXISTS `nomprofesiones` (
  `codorg` int(11) NOT NULL,
  `descrip` varchar(100) collate utf8_spanish_ci NOT NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_158` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomprofesiones`
--

INSERT INTO `nomprofesiones` (`codorg`, `descrip`, `ee`) VALUES
(1, 'ABOGADO', NULL),
(2, 'ARQUITECTO\r', NULL),
(3, 'BACHILLER\r', NULL),
(4, 'ECONOMISTA\r', NULL),
(5, 'INGENIERO CIVIL\r', NULL),
(6, 'INGENIERO ELECTRONICO', NULL),
(7, 'INGENIERO EN COMPUTACION', NULL),
(8, 'INGENIERO GEODESTA\r', NULL),
(9, 'INGENIERO INDUSTRIAL\r', NULL),
(10, 'JUBILADA DE O.P.E.\r', NULL),
(11, 'LIC. EN ADMINISTRACION\r', NULL),
(12, 'LIC. EN CIENCIAS. POLITICAS\r', NULL),
(13, 'LIC. EN COMUNICACION SOCIAL', NULL),
(14, 'LIC. EN CONTADURIA\r', NULL),
(15, 'LIC. EN PUBLICIDAD Y RELACIONE', NULL),
(16, 'LIC. EN QUIMICA\r', NULL),
(17, 'LIC. EN TRABAJO SOCIAL\r', NULL),
(18, 'M.S.C. ABOGADO\r', NULL),
(19, 'M.S.C. ADMINISTRACION', NULL),
(20, 'M.S.C. ECONOMIA\r', NULL),
(21, 'OBRAS CIVILES\r', NULL),
(22, 'SOCIOLOGO\r', NULL),
(23, 'T.S.U. EN ADMINISTRACION DE EM', NULL),
(24, 'T.S.U. EN CONSTRUCCION CIVIL', NULL),
(25, 'T.S.U. EN CONTADURIA\r', NULL),
(26, 'T.S.U. EN INFORMATICA\r', NULL),
(27, 'T.S.U. EN TECNOLOGIA DE LA CON', NULL),
(28, 'INGENIERO QUIMICO', NULL),
(29, 'EN ESTUDIO\r', NULL),
(30, 'T.S.U. EN OBRAS CIVILES\r', NULL),
(31, 'T.S.U. EN DISEÃ‘O DE OBRAS CIVI', NULL),
(32, 'M.S.C.ADMINISTRACION DE EMPRES', NULL),
(33, 'INGENIERO CIVIL E INGENIERO EN', NULL),
(34, 'M.S.C. DIRECCION Y GESTION PUB', NULL),
(35, 'TECNICO MEDIO', NULL),
(36, 'T.S.U. EN ADMINISTRACION DE PE', NULL),
(37, 'LIC. EN RELACIONES INDUSTRIALES', NULL),
(38, 'T.S.U PUBLICIDAD Y MERCADEO', 0),
(39, 'LIC. EN CIENCIAS Y ARTES MILIT', 0),
(40, 'PRIMARIA', 0),
(41, 'T.S.U. EN ADMINISTRACION', 0),
(42, 'T.S.U. EN ELECTRICIDAD', 0),
(43, 'LIC. EN CIENCIAS FISCALES', 0),
(44, 'TECNICO ELECTRICISTA', 0),
(45, 'T.S.U. EN BANCA Y FINANZAS', 0),
(46, 'LIC. EN ADMON. COMERCIAL', 0),
(47, 'T.S.U. EN TECNOLOG. INSTRUMENT', 0),
(48, 'INGENIERO DE SISTEMAS', 0),
(49, 'T.S.U. EN TRABAJO SOCIAL', 0),
(50, 'T.S.U. EN RELAC.  INDUSTRIALES', 0),
(51, 'T.S.U. EN CONTABILIDAD', 0),
(52, 'LIC. EN ESTUDIOS INTERNACIONALES', 0),
(53, 'LIC. EN ARTES', 0),
(54, 'PSICOPEDAGOGA', 0),
(55, 'T.S.U. EN MTTO. DE VIAS FERREAS', 0),
(56, 'PERITO EN CONSTRUCCION CIVIL', 0),
(57, 'HIGIENISTA DENTAL', 0),
(58, 'LIC. EN HISTORIA ', 0),
(59, 'INGENIERO MECANICO', 0),
(60, 'T.S.U. EN ELECTRONICA', 0),
(61, 'INGENIERO AGRICOLA', 0),
(62, 'T.S.U. MANTENIMIENTO EQUIPOS MECANICOS', 0),
(63, 'T.S.U EN EDUCACION PREESCOLAR', 0),
(64, 'TSU ADM DE ADUANAS', 0),
(65, 'ESP. EN EL AREA DE PROG. SOCIALES', 0),
(66, 'LIC. EN PSICOLOGIA', 0),
(67, 'TSU. EN TECNOLOGIA  AUTOMOTRIZ', 0),
(68, 'LIC. ADMO Y GESTION MUNICIPAL', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomsituaciones`
--

CREATE TABLE IF NOT EXISTS `nomsituaciones` (
  `codigo` int(10) unsigned NOT NULL auto_increment,
  `situacion` varchar(30) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`codigo`),
  KEY `situacion` (`situacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `nomsituaciones`
--

INSERT INTO `nomsituaciones` (`codigo`, `situacion`) VALUES
(1, 'Activo'),
(2, 'Egresado'),
(9, 'Egresado de nomina de pago'),
(8, 'Heredero'),
(6, 'Inactivo sin Sueldo'),
(3, 'Jubilado'),
(5, 'Nuevo'),
(7, 'Pensionado'),
(4, 'Vacaciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomsuspenciones`
--

CREATE TABLE IF NOT EXISTS `nomsuspenciones` (
  `codigo` int(11) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codigo`),
  KEY `fc_idx_143` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomsuspenciones`
--

INSERT INTO `nomsuspenciones` (`codigo`, `descrip`, `ee`) VALUES
(1, 'Enfermedad', 0),
(2, 'Accidente', 0),
(3, 'Permiso Remunerado', 0),
(4, 'Reposo', 0),
(5, 'Inasistencia Injustificada', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomtarifas`
--

CREATE TABLE IF NOT EXISTS `nomtarifas` (
  `limite_menor` decimal(18,2) NOT NULL,
  `limite_mayor` decimal(18,2) NOT NULL,
  `monto` decimal(18,2) NOT NULL,
  `codigo` int(11) NOT NULL,
  PRIMARY KEY  (`limite_mayor`,`codigo`),
  KEY `nomtarifas_ibfk_1` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomtarifas`
--

INSERT INTO `nomtarifas` (`limite_menor`, `limite_mayor`, `monto`, `codigo`) VALUES
('1.00', '2.00', '90.00', 1),
('1.00', '2.00', '33.34', 2),
('1.00', '4.00', '55.00', 4),
('3.00', '6.00', '30.00', 1),
('2.00', '6.00', '25.00', 2),
('0.00', '1000000.00', '614.79', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomtasas_interes`
--

CREATE TABLE IF NOT EXISTS `nomtasas_interes` (
  `tasa` decimal(7,2) default NULL,
  `anio` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`anio`,`mes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nomtasas_interes`
--

INSERT INTO `nomtasas_interes` (`tasa`, `anio`, `mes`, `ee`) VALUES
('17.56', 2009, 6, 0),
('17.26', 2009, 7, 0),
('17.04', 2009, 8, 0),
('16.58', 2009, 9, 0),
('17.62', 2009, 10, 0),
('17.05', 2009, 11, 0),
('19.00', 2009, 12, 0),
('18.00', 2010, 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomterceros`
--

CREATE TABLE IF NOT EXISTS `nomterceros` (
  `codigo` int(10) unsigned NOT NULL auto_increment,
  `nombre` varchar(20) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Volcar la base de datos para la tabla `nomterceros`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomtipos_nomina`
--

CREATE TABLE IF NOT EXISTS `nomtipos_nomina` (
  `codtip` int(11) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `prioridad` tinyint(4) default NULL,
  `fecha_fin` datetime default NULL,
  `fecha_ini` datetime default NULL,
  `codnom` int(11) default NULL,
  `diasbonvac` smallint(6) default NULL,
  `diasutilidad` smallint(6) default NULL,
  `diasdisfrute` smallint(6) default NULL,
  `tipodisfrute` varchar(2) collate utf8_spanish_ci default NULL,
  `diasincrem` smallint(6) default NULL,
  `diasmaxinc` smallint(6) default NULL,
  `diasincremdis` smallint(6) default NULL,
  `diasmaxincdis` smallint(6) default NULL,
  `tiempoor` int(11) default NULL,
  `diasantiguedad` int(11) default NULL,
  `antigincremvac` int(2) NOT NULL,
  `markar` tinyint(4) default NULL,
  `usatablas` tinyint(1) default NULL,
  `baremo01` smallint(6) default NULL,
  `baremo02` smallint(6) default NULL,
  `baremo03` smallint(6) default NULL,
  `baremo04` smallint(6) default NULL,
  `fecha` date default NULL,
  `ruta` varchar(119) collate utf8_spanish_ci default NULL,
  `basesuelsal` int(11) default NULL,
  `sfecha_fin` datetime default NULL,
  `sfecha_ini` datetime default NULL,
  `sfecha` datetime default NULL,
  `base30` tinyint(4) default NULL,
  `detdes` varchar(255) collate utf8_spanish_ci default NULL,
  `codnomant` int(11) default NULL,
  `fechabon` int(11) default NULL,
  `ee` tinyint(4) default NULL,
  `owner` varchar(254) collate utf8_spanish_ci default NULL,
  `bdgenerada` tinyint(4) default NULL,
  `codgrupo` varchar(7) collate utf8_spanish_ci default NULL,
  `conceptosglopar` varchar(1) collate utf8_spanish_ci default NULL,
  `tipocamposadic` tinyint(4) default NULL,
  `dfecha_ini` datetime default NULL,
  `dfecha_fin` datetime default NULL,
  `dfecha` datetime default NULL,
  `dfechabon` datetime default NULL,
  `desglose_moneda` text collate utf8_spanish_ci NOT NULL,
  `tipo_ingreso` varchar(1) collate utf8_spanish_ci NOT NULL,
  `codigo_banco` varchar(2) collate utf8_spanish_ci NOT NULL,
  `quinquenio` varchar(1) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`codtip`),
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
-- Volcar la base de datos para la tabla `nomtipos_nomina`
--

INSERT INTO `nomtipos_nomina` (`codtip`, `descrip`, `prioridad`, `fecha_fin`, `fecha_ini`, `codnom`, `diasbonvac`, `diasutilidad`, `diasdisfrute`, `tipodisfrute`, `diasincrem`, `diasmaxinc`, `diasincremdis`, `diasmaxincdis`, `tiempoor`, `diasantiguedad`, `antigincremvac`, `markar`, `usatablas`, `baremo01`, `baremo02`, `baremo03`, `baremo04`, `fecha`, `ruta`, `basesuelsal`, `sfecha_fin`, `sfecha_ini`, `sfecha`, `base30`, `detdes`, `codnomant`, `fechabon`, `ee`, `owner`, `bdgenerada`, `codgrupo`, `conceptosglopar`, `tipocamposadic`, `dfecha_ini`, `dfecha_fin`, `dfecha`, `dfechabon`, `desglose_moneda`, `tipo_ingreso`, `codigo_banco`, `quinquenio`) VALUES
(1, 'Inicio(eliminar)', NULL, NULL, NULL, 38, 40, NULL, 15, 'Ha', 0, 0, 1, 10, 0, 365, 1, NULL, 0, NULL, NULL, NULL, NULL, '1989-01-01', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', 'Q', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nomusuarios`
--

CREATE TABLE IF NOT EXISTS `nomusuarios` (
  `coduser` int(10) unsigned NOT NULL auto_increment,
  `descrip` varchar(60) collate utf8_spanish_ci default NULL,
  `nivel` tinyint(4) default NULL,
  `fecha` int(11) default NULL,
  `clave` varchar(255) collate utf8_spanish_ci default NULL,
  `acce_usuarios` int(1) default NULL,
  `acce_configuracion` int(1) default NULL,
  `acce_elegibles` int(1) default NULL,
  `acce_personal` int(1) default NULL,
  `acce_prestamos` int(1) default NULL,
  `acce_consultas` int(1) default NULL,
  `acce_transacciones` int(1) default NULL,
  `acce_procesos` int(1) default NULL,
  `acce_reportes` int(1) default NULL,
  `acce_estuaca` int(1) default NULL,
  `acce_xestuaca` int(1) default NULL,
  `acce_permisos` int(1) default NULL,
  `acce_logros` int(1) default NULL,
  `acce_penalizacion` int(1) default NULL,
  `acce_movpe` int(1) default NULL,
  `acce_evalde` int(1) default NULL,
  `acce_experiencia` int(1) default NULL,
  `acce_antic` int(1) default NULL,
  `acce_uniforme` int(1) default NULL,
  `contadorvence` tinyint(4) default NULL,
  `fecclave` int(11) default NULL,
  `encript` tinyint(4) default NULL,
  `pregunta` mediumtext collate utf8_spanish_ci,
  `respuesta` varchar(200) collate utf8_spanish_ci default NULL,
  `acctwind` tinyint(4) default NULL,
  `borraper` tinyint(4) default NULL,
  `dfecha` datetime default NULL,
  `dfecclave` datetime default NULL,
  `login_usuario` varchar(10) collate utf8_spanish_ci NOT NULL,
  `acce_autorizar_nom` int(1) default NULL,
  `acce_enviar_nom` int(1) default NULL,
  `acce_generarordennomina` int(1) default NULL,
  PRIMARY KEY  (`coduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=10 ;

--
-- Volcar la base de datos para la tabla `nomusuarios`
--

INSERT INTO `nomusuarios` (`coduser`, `descrip`, `nivel`, `fecha`, `clave`, `acce_usuarios`, `acce_configuracion`, `acce_elegibles`, `acce_personal`, `acce_prestamos`, `acce_consultas`, `acce_transacciones`, `acce_procesos`, `acce_reportes`, `acce_estuaca`, `acce_xestuaca`, `acce_permisos`, `acce_logros`, `acce_penalizacion`, `acce_movpe`, `acce_evalde`, `acce_experiencia`, `acce_antic`, `acce_uniforme`, `contadorvence`, `fecclave`, `encript`, `pregunta`, `respuesta`, `acctwind`, `borraper`, `dfecha`, `dfecclave`, `login_usuario`, `acce_autorizar_nom`, `acce_enviar_nom`, `acce_generarordennomina`) VALUES
(1, 'onuva', NULL, 0, 'f63f47a5d94dad9fb559c8b3dd1185874b15352e7187820b596ceb42e5759f83', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'onuva', 1, 1, 0);

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
  `cod_modulo` int(10) unsigned NOT NULL auto_increment,
  `cod_modulo_padre` int(11) default NULL,
  `nom_menu` varchar(50) collate utf8_spanish_ci default NULL,
  `archivo` varchar(50) collate utf8_spanish_ci default NULL,
  `orden` int(11) default NULL,
  `tabla` varchar(200) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`cod_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=67 ;

--
-- Volcar la base de datos para la tabla `nom_modulos`
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
(65, NULL, 'Prestamos', '../prestamos/menu_prestamos.php', 3, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_motivos_retiros`
--

CREATE TABLE IF NOT EXISTS `nom_motivos_retiros` (
  `codigo` int(10) unsigned NOT NULL auto_increment,
  `descripcion` varchar(30) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Volcar la base de datos para la tabla `nom_motivos_retiros`
--

INSERT INTO `nom_motivos_retiros` (`codigo`, `descripcion`) VALUES
(1, 'Traslado a otra ciudad'),
(2, 'Despido'),
(3, 'Renuncia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_movimientos_nomina`
--

CREATE TABLE IF NOT EXISTS `nom_movimientos_nomina` (
  `codnom` int(11) NOT NULL,
  `codcon` int(11) NOT NULL,
  `ficha` varchar(10) collate utf8_spanish_ci NOT NULL,
  `tipcon` varchar(1) collate utf8_spanish_ci default NULL,
  `valor` decimal(17,2) default NULL,
  `monto` decimal(17,2) default NULL,
  `unidad` varchar(10) collate utf8_spanish_ci default NULL,
  `impdet` varchar(1) collate utf8_spanish_ci default NULL,
  `anio` int(11) default NULL,
  `mes` int(11) default NULL,
  `descrip` varchar(60) collate utf8_spanish_ci default NULL,
  `montobase` decimal(17,2) default NULL,
  `codbancob` int(11) default NULL,
  `cuentacob` varchar(20) collate utf8_spanish_ci default NULL,
  `codbanlph` int(11) default NULL,
  `cuentalph` varchar(20) collate utf8_spanish_ci default NULL,
  `refcheque` varchar(10) collate utf8_spanish_ci default NULL,
  `montototal` decimal(17,2) default NULL,
  `contrato` varchar(20) collate utf8_spanish_ci default NULL,
  `bonificable` tinyint(4) default NULL,
  `htiempo` tinyint(4) default NULL,
  `cedula` int(11) default NULL,
  `saldopre` decimal(17,2) default NULL,
  `montootros` decimal(17,2) default NULL,
  `modificar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  `ref1` decimal(5,2) default NULL,
  `ref2` decimal(5,2) default NULL,
  `ref3` decimal(5,2) default NULL,
  `ref4` decimal(5,2) default NULL,
  `ref5` decimal(5,2) default NULL,
  `ref6` decimal(5,2) default NULL,
  `ref7` decimal(5,2) default NULL,
  `codnivel1` varchar(7) collate utf8_spanish_ci default NULL,
  `codnivel2` varchar(7) collate utf8_spanish_ci default NULL,
  `codnivel3` varchar(7) collate utf8_spanish_ci default NULL,
  `codnivel4` varchar(7) collate utf8_spanish_ci default NULL,
  `codnivel5` varchar(7) collate utf8_spanish_ci default NULL,
  `codnivel6` varchar(7) collate utf8_spanish_ci default NULL,
  `codnivel7` varchar(7) collate utf8_spanish_ci default NULL,
  `tipnom` int(11) NOT NULL,
  `contractual` varchar(1) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codnom`,`codcon`,`ficha`,`tipnom`),
  KEY `codcon` (`codcon`),
  KEY `ficha` (`ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nom_movimientos_nomina`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_nominas_pago`
--

CREATE TABLE IF NOT EXISTS `nom_nominas_pago` (
  `codnom` int(11) NOT NULL,
  `descrip` varchar(70) collate utf8_spanish_ci default NULL,
  `fecha` date default NULL,
  `fechapago` date default NULL,
  `periodo_ini` date default NULL,
  `periodo_fin` date default NULL,
  `anio` int(11) default NULL,
  `mes` int(11) default NULL,
  `codtip` int(11) NOT NULL default '0',
  `frecuencia` int(11) default NULL,
  `status` varchar(1) collate utf8_spanish_ci default NULL,
  `tipnom` tinyint(4) default NULL,
  `libre` tinyint(4) default NULL,
  `codsuc` int(11) default NULL,
  `coddir` int(11) default NULL,
  `codvp` int(11) default NULL,
  `codger` int(11) default NULL,
  `coddep` int(11) default NULL,
  `nivel1` tinyint(4) default NULL,
  `nivel2` tinyint(4) default NULL,
  `nivel3` tinyint(4) default NULL,
  `nivel4` tinyint(4) default NULL,
  `nivel5` tinyint(4) default NULL,
  `codcargo` varchar(8) collate utf8_spanish_ci default NULL,
  `todocargo` tinyint(4) default NULL,
  `vacprograma` tinyint(4) default NULL,
  `markar` tinyint(4) default NULL,
  `vaccolectivas` tinyint(4) default NULL,
  `contrato` varchar(20) collate utf8_spanish_ci default NULL,
  `sfecha` datetime default NULL,
  `sfechapago` datetime default NULL,
  `speriodo_ini` varchar(8) collate utf8_spanish_ci default NULL,
  `speriodo_fin` varchar(8) collate utf8_spanish_ci default NULL,
  `cod_tli` varchar(19) collate utf8_spanish_ci NOT NULL,
  `periodo` int(11) default NULL,
  `codht1` int(11) default NULL,
  `codht2` int(11) default NULL,
  `ee` tinyint(4) default NULL,
  `nperiodo` smallint(6) default NULL,
  `codht3` int(11) default NULL,
  `comprometida` int(1) NOT NULL,
  `contabilizada` int(1) NOT NULL,
  PRIMARY KEY  (`codnom`,`codtip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nom_nominas_pago`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_nomina_netos`
--

CREATE TABLE IF NOT EXISTS `nom_nomina_netos` (
  `codnom` int(11) NOT NULL,
  `tipnom` int(11) NOT NULL,
  `ficha` int(10) NOT NULL,
  `cedula` int(11) NOT NULL,
  `cta_ban` varchar(21) collate utf8_spanish_ci NOT NULL,
  `neto` float(20,2) NOT NULL,
  PRIMARY KEY  (`codnom`,`tipnom`,`ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nom_nomina_netos`
--


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
  `operacion` varchar(3) collate utf8_spanish_ci NOT NULL,
  `fechaopr` date NOT NULL,
  `estado` varchar(21) collate utf8_spanish_ci NOT NULL,
  `monto` decimal(17,2) NOT NULL,
  `tipnom` int(2) NOT NULL,
  `codsuc` varchar(6) collate utf8_spanish_ci NOT NULL,
  `coddir` varchar(6) collate utf8_spanish_ci NOT NULL,
  `codvp` varchar(6) collate utf8_spanish_ci NOT NULL,
  `codger` varchar(6) collate utf8_spanish_ci NOT NULL,
  `coddep` varchar(6) collate utf8_spanish_ci NOT NULL,
  `detalle` varchar(250) collate utf8_spanish_ci NOT NULL,
  `codnom` int(4) NOT NULL,
  `sfechavac` date NOT NULL,
  `sfechareivac` date NOT NULL,
  `sfechaopr` date NOT NULL,
  `tipooper` varchar(2) collate utf8_spanish_ci NOT NULL,
  `desoper` varchar(30) collate utf8_spanish_ci NOT NULL,
  `ee` varchar(2) collate utf8_spanish_ci NOT NULL,
  `fecha_venc` date default NULL,
  UNIQUE KEY `periodo` (`periodo`,`ficha`,`tipnom`,`tipooper`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nom_progvacaciones`
--


-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nom_variables_personal`
--

CREATE TABLE IF NOT EXISTS `nom_variables_personal` (
  `nombre` varchar(20) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) collate utf8_spanish_ci NOT NULL,
  `parametros` varchar(250) collate utf8_spanish_ci NOT NULL,
  `indicador` varchar(2) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcar la base de datos para la tabla `nom_variables_personal`
--

INSERT INTO `nom_variables_personal` (`nombre`, `descripcion`, `parametros`, `indicador`) VALUES
('$ANIOVACACION', 'Periodos de Vacaciones', '', 'V'),
('$ANTIGUEDAD', 'Calcula la Antiguedad segun tipo ''A''=años, ''M''=meses, ''D''=dias', 'ANTIGUEDAD($FECHA1, $FECHA2,TIPO)', 'F'),
('$BONODIACAT', 'Bono Diario Categoría', '', 'V'),
('$BONOMESCAT', 'Bono Mesual Categoría', '', 'V'),
('$CAMPOADICIONALPER', 'Retorna el valor del campo adicional ', 'CAMPOADICIONALPER(<Código>)', 'F'),
('$CEDULA', 'No. de Cédula de Identidad', '', 'V'),
('$CODCARGO', 'Código de Cargo', '', 'V'),
('$CODCATEGORIA', 'Código de la Categoria', '', 'V'),
('$CODIGOSUSP', 'Código de la Ultima Suspención', '', 'V'),
('$CODPROFESION', 'Código de Profesión', '', 'V'),
('$CONTRATO', 'Contrato', '', 'V'),
('$DIAFMES', 'Días Feriados del Mes (desde el Inicio de Nómina), según calendario del empresa', '', 'V'),
('$DIAFMESTIP', 'Días Feriados del Mes (desde el Inicio de Nómina), según tipo de nómina', '', 'V'),
('$DIAFPER', 'Días Feriados del Período (desde el Inicio, fin de Nómina), según calendario de la empresa', '', 'V'),
('$DIAFPERPER', 'Días Feriados del Período (desde el Inicio, fin de Nómina), según calendario del trabajador', '', 'V'),
('$DIAFPERTIP', 'Días Feriados del Período (desde el Inicio, fin de Nómina), según tipo de nómina', '', 'V'),
('$DIAHMES', 'Dias Hábiles del Mes (desde inicio de nómina),según calendario de la empresa', '', 'V'),
('$DIAHMESPER', 'Dias Hábiles del Mes (desde inicio de nómina),según calendario del trabajador', '', 'V'),
('$DIAHMESTIP', 'Dias Hábiles del Mes (desde inicio de nómina),según tipo de nómina', '', 'V'),
('$DIAHPER', 'Dias Hábiles del período (desde inicio,fin de nómina),según calendario de la empresa', '', 'V'),
('$DIAHPERPER', 'Dias Hábiles del período (desde inicio,fin de nómina),según calendario del trabajador', '', 'V'),
('$DIAHPERTIP', 'Dias Hábiles del período (desde inicio,fin de nómina),según tipo de nómina', '', 'V'),
('$EDAD', 'Edad del Trabajador', '', 'V'),
('$FECFFINVAC', 'Fecha Retorno Vacaciones', '', 'V'),
('$FECFINIVAC', 'Fecha Salida Vacaciones', '', 'V'),
('$FECHAAPLICACION', 'Fecha de la aplicación del sueldo propuesto', '', 'V'),
('$FECHAFINCONTRATO', 'Fecha final del contrato, si no es fijo', '', 'V'),
('$FECHAFINNOM', 'Fecha final del periodo de Nómina', '', 'V'),
('$FECHAFINSUSP', 'Fecha final de suspención', '', 'V'),
('$FECHAHOY', 'Fecha de hoy (fecha del sistema)', '', 'V'),
('$FECHAINGRESO', 'Fecha de Ingreso del Trabajador', '', 'V'),
('$FECHAINISUSP', 'Fecha Inicio de Suspención', '', 'V'),
('$FECHANACIMIENTO', 'Fecha de Nacimiento del trabajador', '', 'V'),
('$FECHANOMINA', 'Fecha inicial del periodo de la nomina', '', 'V'),
('$FECHAPAGNOM', 'Fecha de pago de la nómina', '', 'V'),
('$FECLIQ', 'Fecha de Liquidación', '', 'V'),
('$FICHA', 'Ficha del Trabajador', '', 'V'),
('$FORMACOBRO', 'Forma de cobro', '', 'V'),
('$FRECUENCIANOM', 'Codigo del Tipo de frecuencia de la nómina', '', 'V'),
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
('$PERIODOVAC', 'Año para el calculo de Vacaciones', '', 'V'),
('$SALCAT', 'Salario Categoría', '', 'V'),
('$SEXO', 'Sexo del Trabajador', '', 'V'),
('$SITUACION', 'Situación del Trabajador', '', 'V'),
('$SUELDO', 'Sueldo del Trabajador', '', 'V'),
('$SUELDOPROPUESTO', 'Sueldo Propuesto del Trabajador', '', 'V'),
('$T01=', 'Variable de uso libre', '', 'V'),
('$TIPOCONTRATO', 'Tipo de Contrato', '', 'V'),
('$TIPOLIQUIDACION', 'Tipo de liquidacion segun tasa de tipos de liquidación', '', 'V'),
('$TIPONOMINA', 'Tipo de Nómina a la que pertenece el trabajador', '', 'V'),
('$TIPOPRESTACION', 'Tipo de Prestacion del trabajador', '', 'V'),
('ACUMCOM', 'ACUMCOM(codigo_concepto,fecha_inicio,fecha_fin); devuelve el monto acumulado segun el codigo del con', 'ACUMCOM(codcon,fecha_inicio,fecha_fin)', 'F'),
('BAREMO', 'BAREMO($codigo_baremo,$valor); retorna el resultado del baremo indicado, según el rango del valor.', 'BAREMO($codigo_baremo,$valor)', 'F'),
('CONCEPTO', 'CONCEPTO(codigo_concepto); devuelve el valor del monto del concepto de la nomina actual, segun el co', 'CONCEPTO(codigo_concepto)', 'F'),
('CONCEPTONOMANT', 'CONCEPTONOMANT(código_concepto,opción); Retorna el resultado del concepto indicado de la nómina ante', 'CONCEPTONOMANT(código_concepto,opción)', 'F'),
('DIA', 'DIA($fecha); Devuelve el día en número según la fecha indicada.', 'DIA()', 'F'),
('MENSAJECON', 'MENSAJECON(VARIABLE); Devuelve el valor que contenga una variable $T01..$T10,$MONTO.', 'MENSAJECON($VARIABLE)', 'F'),
('Mes', 'devuelve el mes de una fecha dada', 'mes(AAAA/MM/DD)', 'F'),
('SI', 'SI("condicion",verdadero,falso); Retorna un valor verdadero o falso según la condición', 'SI(condicion,V,F)', 'F');

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
