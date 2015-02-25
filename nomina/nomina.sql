-- phpMyAdmin SQL Dump
-- version 3.2.2.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 11, 2010 at 03:27 PM
-- Server version: 5.0.83
-- PHP Version: 5.2.10-2ubuntu6.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `nomina`
--

-- --------------------------------------------------------

--
-- Table structure for table `cwconcue`
--

CREATE TABLE IF NOT EXISTS `cwconcue` (
  `Cuenta` varchar(50) collate utf8_spanish_ci NOT NULL,
  `Nivel` int(11) NOT NULL default '0',
  `Tipo` char(10) collate utf8_spanish_ci NOT NULL,
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
-- Dumping data for table `cwconcue`
--


-- --------------------------------------------------------

--
-- Table structure for table `cwprecue`
--

CREATE TABLE IF NOT EXISTS `cwprecue` (
  `CodCue` varchar(15) collate utf8_spanish_ci NOT NULL,
  `Denominacion` text collate utf8_spanish_ci NOT NULL,
  `Tipocta` int(10) unsigned NOT NULL default '0',
  `Tipopuc` char(3) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`CodCue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `cwprecue`
--

INSERT INTO `cwprecue` (`CodCue`, `Denominacion`, `Tipocta`, `Tipopuc`) VALUES
('4.01.', 'Gastos de personal', 1, ''),
('4.01.01.', 'Sueldos, salarios y otras retribuciones', 2, ''),
('4.01.01.01.', 'Sueldos básicos personal fijo a tiempo completo', 3, ''),
('4.01.01.01.00', 'SUELDOS BÃSICOS PERSONAL FIJO A TIEMPO COMPLETO', 4, 'NO'),
('4.01.01.02.', 'Sueldos básicos personal fijo a tiempo parcial', 3, ''),
('4.01.01.02.00', 'Sueldos bï¿½sicos personal fijo a tiempo parcial', 4, 'NO'),
('4.01.01.03.', 'Suplencias a empleados', 3, ''),
('4.01.01.03.00', 'Suplencias a empleados', 4, 'NO'),
('4.01.01.08.', 'Sueldo al personal en trámite de nombramiento', 3, ''),
('4.01.01.08.00', 'Sueldo al personal en trámite de nombramiento', 4, ''),
('4.01.01.09.', 'Remuneraciones al personal en período de disponibilidad', 3, ''),
('4.01.01.09.00', 'Remuneraciones al personal en perï¿½odo de disponibilidad', 4, 'NO'),
('4.01.01.10.', 'Salarios a obreros en puestos permanentes a tiempo completo', 3, ''),
('4.01.01.10.00', 'Salarios a obreros en puestos permanentes a tiempo completo', 4, 'NO'),
('4.01.01.11.', 'Salarios a obreros en puestos permanentes a tiempo parcial', 3, ''),
('4.01.01.11.00', 'Salarios a obreros en puestos permanentes a tiempo parcial', 4, ''),
('4.01.01.12.', 'Salarios a obreros en puestos no permanentes', 3, ''),
('4.01.01.12.00', 'Salarios a obreros en puestos no permanentes', 4, ''),
('4.01.01.13.', 'Suplencias a obreros', 3, ''),
('4.01.01.13.00', 'Suplencias a obreros', 4, 'NO'),
('4.01.01.18.', 'Remuneraciones al personal contratado', 3, ''),
('4.01.01.18.00', 'Remuneraciones al personal contratado', 4, 'NO'),
('4.01.01.19.', 'Retribuciones por becas - salarios, bolsas de trabajo, pasantías y similares', 3, ''),
('4.01.01.19.00', 'Retribuciones por becas - salarios, bolsas de trabajo, pasantï¿½as y similares', 4, 'NO'),
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
('4.01.01.29.00', 'Dietas', 4, 'NO'),
('4.01.01.30.', 'Retribución al personal de reserva', 3, ''),
('4.01.01.30.00', 'Retribución al personal de reserva', 4, ''),
('4.01.01.99.', 'Otras retribuciones ', 3, ''),
('4.01.01.99.00', 'Otras retribuciones ', 4, 'NO'),
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
('4.01.03.01.00', 'Primas por mï¿½rito a empleados', 4, 'NO'),
('4.01.03.02.', 'Primas de transporte a empleados', 3, ''),
('4.01.03.02.00', 'Primas de transporte a empleados', 4, 'NO'),
('4.01.03.03.', 'Primas por hogar a empleados', 3, ''),
('4.01.03.03.00', 'Primas por hogar a empleados', 4, 'NO'),
('4.01.03.04.', 'Primas por hijos a empleados', 3, ''),
('4.01.03.04.00', 'Primas por hijos a empleados', 4, 'NO'),
('4.01.03.05.', 'Primas por alquileres a empleados', 3, ''),
('4.01.03.05.00', 'Primas por alquileres a empleados', 4, 'NO'),
('4.01.03.06.', 'Primas por residencia a empleados', 3, ''),
('4.01.03.06.00', 'Primas por residencia a empleados', 4, 'NO'),
('4.01.03.07.', 'Primas por categoría de escuelas a empleados', 3, ''),
('4.01.03.07.00', 'Primas por categoría de escuelas a empleados', 4, ''),
('4.01.03.08.', 'Primas de profesionalización a empleados', 3, ''),
('4.01.03.08.00', 'Primas de profesionalizaciï¿½n a empleados', 4, 'NO'),
('4.01.03.09.', 'Primas por antigüedad a empleados', 3, ''),
('4.01.03.09.00', 'Primas por antigï¿½edad a empleados', 4, 'NO'),
('4.01.03.10.', 'Primas por jerarquía o responsabilidad en el cargo', 3, ''),
('4.01.03.10.00', 'Primas por jerarquï¿½a o responsabilidad en el cargo', 4, 'NO'),
('4.01.03.11.', 'Primas al personal en servicio en el exterior', 3, ''),
('4.01.03.11.00', 'Primas al personal en servicio en el exterior', 4, 'NO'),
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
('4.01.03.21.00', 'Primas por antigï¿½edad a obreros', 4, 'NO'),
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
('4.01.03.97.00', 'Otras primas a empleados', 4, 'NO'),
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
('4.01.04.05.00', 'Complemento a empleados por gastos de representaciï¿½n ', 4, 'NO'),
('4.01.04.06.', 'Complemento a empleados por comisión de servicios ', 3, ''),
('4.01.04.06.00', 'Complemento a empleados por comisiï¿½n de servicios ', 4, 'NO'),
('4.01.04.07.', 'Bonificación a empleados', 3, ''),
('4.01.04.07.00', 'Bonificaciï¿½n a empleados', 4, 'NO'),
('4.01.04.08.', 'Bono compensatorio de alimentación a empleados', 3, ''),
('4.01.04.08.00', 'Bono compensatorio de alimentación a empleados', 4, ''),
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
('4.01.04.96.00', 'Otros complementos a empleados', 4, 'NO'),
('4.01.04.97.', 'Otros complementos a obreros', 3, ''),
('4.01.04.97.00', 'Otros complementos a obreros', 4, ''),
('4.01.04.98.', 'Otros complementos al personal contratado', 3, ''),
('4.01.04.98.00', 'Otros complementos al personal contratado', 4, ''),
('4.01.04.99.', 'Otros complementos al personal militar', 3, ''),
('4.01.04.99.00', 'Otros complementos al personal militar', 4, ''),
('4.01.05.', 'Aguinaldos, utilidades o bonificación legal, y bono vacacional a empleados, obreros, contratados, personal militar y parlamentarios', 2, ''),
('4.01.05.01.', 'Aguinaldos a empleados', 3, ''),
('4.01.05.01.00', 'Aguinaldos a empleados', 4, 'NO'),
('4.01.05.02.', 'Utilidades legales y convencionales a empleados', 3, ''),
('4.01.05.02.00', 'Utilidades legales y convencionales a empleados', 4, ''),
('4.01.05.03.', 'Bono vacacional a empleados', 3, ''),
('4.01.05.03.00', 'Bono vacacional a empleados', 4, 'NO'),
('4.01.05.04.', 'Aguinaldos a obreros', 3, ''),
('4.01.05.04.00', 'Aguinaldos a obreros', 4, 'NO'),
('4.01.05.05.', 'Utilidades legales y convencionales a obreros', 3, ''),
('4.01.05.05.00', 'Utilidades legales y convencionales a obreros', 4, ''),
('4.01.05.06.', 'Bono vacacional a obreros', 3, ''),
('4.01.05.06.00', 'Bono vacacional a obreros', 4, 'NO'),
('4.01.05.07.', 'Aguinaldos al personal contratado', 3, ''),
('4.01.05.07.00', 'Aguinaldos al personal contratado', 4, 'NO'),
('4.01.05.08.', 'Bono vacacional al personal contratado', 3, ''),
('4.01.05.08.00', 'Bono vacacional al personal contratado', 4, 'NO'),
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
('4.01.06.01.00', 'Aporte patronal al Instituto Venezolano de los Seguros Sociales  (IVSS) por empleados', 4, 'NO'),
('4.01.06.02.', 'Aporte patronal al Instituto de Previsión y Asistencia Social para el personal del Ministerio de Educación (IPASME) por empleados', 3, ''),
('4.01.06.02.00', 'Aporte patronal al Instituto de Previsión y Asistencia Social para el personal del Ministerio de Educación (IPASME) por empleados', 4, ''),
('4.01.06.03.', 'Aporte patronal al Fondo de Jubilaciones por empleados', 3, ''),
('4.01.06.03.00', 'Aporte patronal al Fondo de Jubilaciones por empleados', 4, 'NO'),
('4.01.06.04.', 'Aporte patronal al Fondo de Seguro de Paro Forzoso por empleados', 3, ''),
('4.01.06.04.00', 'Aporte patronal al Fondo de Seguro de Paro Forzoso por empleados', 4, 'NO'),
('4.01.06.05.', 'Aporte patronal al Fondo de Ahorro Habitacional por empleados', 3, ''),
('4.01.06.05.00', 'Aporte patronal al Fondo de Ahorro Habitacional por empleados', 4, 'NO'),
('4.01.06.10.', 'Aporte patronal al Instituto Venezolano de los Seguros   Sociales  (IVSS) por obreros', 3, ''),
('4.01.06.10.00', 'Aporte patronal al Instituto Venezolano de los Seguros   Sociales  (IVSS) por obreros', 4, 'NO'),
('4.01.06.11.', 'Aporte patronal al Fondo de Jubilaciones por obreros', 3, ''),
('4.01.06.11.00', 'Aporte patronal al Fondo de Jubilaciones por obreros', 4, 'NO'),
('4.01.06.12.', 'Aporte patronal al Fondo de Seguro de Paro Forzoso por obreros', 3, ''),
('4.01.06.12.00', 'Aporte patronal al Fondo de Seguro de Paro Forzoso por obreros', 4, 'NO'),
('4.01.06.13.', 'Aporte patronal al Fondo de Ahorro Habitacional por obreros', 3, ''),
('4.01.06.13.00', 'Aporte patronal al Fondo de Ahorro Habitacional por obreros', 4, 'NO'),
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
('4.01.07.01.00', 'Capacitaciï¿½n y adiestramiento a empleados', 4, 'NO'),
('4.01.07.02.', 'Becas a empleados', 3, ''),
('4.01.07.02.00', 'Becas a empleados', 4, ''),
('4.01.07.03.', 'Ayudas por matrimonio a empleados', 3, ''),
('4.01.07.03.00', 'Ayudas por matrimonio a empleados', 4, ''),
('4.01.07.04.', 'Ayudas por nacimiento de hijos a empleados', 3, ''),
('4.01.07.04.00', 'Ayudas por nacimiento de hijos a empleados', 4, ''),
('4.01.07.05.', 'Ayudas por defunción a empleados', 3, ''),
('4.01.07.05.00', 'Ayudas por defunción a empleados', 4, ''),
('4.01.07.06.', 'Ayudas para medicinas, gastos médicos,  odontológicos y de hospitalización a empleados', 3, ''),
('4.01.07.06.00', 'Ayudas para medicinas, gastos mï¿½dicos,  odontolï¿½gicos y de hospitalizaciï¿½n a empleados', 4, 'NO'),
('4.01.07.07.', 'Aporte patronal a cajas de ahorro por empleados', 3, ''),
('4.01.07.07.00', 'Aporte patronal a cajas de ahorro por empleados', 4, 'NO'),
('4.01.07.08.', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios por empleados', 3, ''),
('4.01.07.08.00', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios por empleados', 4, ''),
('4.01.07.09.', 'Ayudas a empleados para adquisición de uniformes y útiles escolares de sus hijos ', 3, ''),
('4.01.07.09.00', 'Ayudas a empleados para adquisiciï¿½n de uniformes y ï¿½tiles escolares de sus hijos ', 4, 'NO'),
('4.01.07.10.', 'Dotación de uniformes a empleados', 3, ''),
('4.01.07.10.00', 'Dotaciï¿½n de uniformes a empleados', 4, 'NO'),
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
('4.01.07.23.00', 'Aporte patronal a cajas de ahorro por obreros', 4, 'NO'),
('4.01.07.24.', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios por obreros', 3, ''),
('4.01.07.24.00', 'Aporte patronal al seguro de vida, accidentes personales, hospitalización, cirugía, maternidad (HCM) y gastos funerarios por obreros', 4, ''),
('4.01.07.25.', 'Ayudas a obreros para adquisición de uniformes y útiles escolares de sus hijos ', 3, ''),
('4.01.07.25.00', 'Ayudas a obreros para adquisición de uniformes y útiles escolares de sus hijos ', 4, ''),
('4.01.07.26.', 'Dotación de uniformes a obreros', 3, ''),
('4.01.07.26.00', 'Dotaciï¿½n de uniformes a obreros', 4, 'NO'),
('4.01.07.27.', 'Aporte patronal para gastos de guarderías y preescolar para hijos de obreros ', 3, ''),
('4.01.07.27.00', 'Aporte patronal para gastos de guarderías y preescolar para hijos de obreros ', 4, ''),
('4.01.07.28.', 'Aportes para la adquisición de juguetes para los hijos del personal obrero', 3, ''),
('4.01.07.28.00', 'Aportes para la adquisición de juguetes para los hijos del personal obrero', 4, ''),
('4.01.07.33.', 'Asistencia socio-económica al personal contratado ', 3, ''),
('4.01.07.33.00', 'Asistencia socio-econï¿½mica al personal contratado ', 4, 'NO'),
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
('4.01.07.96.00', 'Otras subvenciones a empleados', 4, 'NO'),
('4.01.07.97.', 'Otras subvenciones a obreros', 3, ''),
('4.01.07.97.00', 'Otras subvenciones a obreros', 4, 'NO'),
('4.01.07.98.', 'Otras subvenciones al personal militar', 3, ''),
('4.01.07.98.00', 'Otras subvenciones al personal militar', 4, ''),
('4.01.07.99.', 'Otras subvenciones a parlamentarios', 3, ''),
('4.01.07.99.00', 'Otras subvenciones a parlamentarios', 4, ''),
('4.01.08.', 'Prestaciones sociales e indemnizaciones a empleados, obreros, contratados, personal militar y parlamentarios ', 2, ''),
('4.01.08.01.', 'Prestaciones sociales e indemnizaciones a empleados', 3, ''),
('4.01.08.01.00', 'Prestaciones sociales e indemnizaciones a empleados', 4, 'NO'),
('4.01.08.02.', 'Prestaciones sociales e indemnizaciones a obreros', 3, ''),
('4.01.08.02.00', 'Prestaciones sociales e indemnizaciones a obreros', 4, 'NO'),
('4.01.08.03.', 'Prestaciones sociales e indemnizaciones al personal contratado', 3, ''),
('4.01.08.03.00', 'Prestaciones sociales e indemnizaciones al personal contratado', 4, 'NO'),
('4.01.08.04.', 'Prestaciones sociales e indemnizaciones al personal militar', 3, ''),
('4.01.08.04.00', 'Prestaciones sociales e indemnizaciones al personal militar', 4, ''),
('4.01.08.05.', 'Prestaciones sociales e indemnizaciones a parlamentarios', 3, ''),
('4.01.08.05.00', 'Prestaciones sociales e indemnizaciones a parlamentarios', 4, ''),
('4.01.09.', 'Capacitación y adiestramiento realizado por personal del organismo', 2, ''),
('4.01.09.01.', 'Capacitación y adiestramiento realizado por personal del organismo', 3, ''),
('4.01.09.01.00', 'Capacitación y adiestramiento realizado por personal del organismo', 4, ''),
('4.01.96.', 'Otros gastos del personal empleado', 2, ''),
('4.01.96.01.', 'Otros gastos del personal empleado', 3, ''),
('4.01.96.01.00', 'Otros gastos del personal empleado', 4, 'NO'),
('4.01.97.', 'Otros gastos del personal obrero', 2, ''),
('4.01.97.01.', 'Otros gastos del personal obrero', 3, ''),
('4.01.97.01.00', 'Otros gastos del personal obrero', 4, 'NO'),
('4.01.98.', 'Otros gastos del personal militar', 2, ''),
('4.01.98.01.', 'Otros gastos del personal militar', 3, ''),
('4.01.98.01.00', 'Otros gastos del personal militar', 4, ''),
('4.01.99.', 'Otros gastos de los parlamentarios', 2, ''),
('4.01.99.01.', 'Otros gastos de los parlamentarios', 3, ''),
('4.01.99.01.00', 'Otros gastos de los parlamentarios', 4, 'NO'),
('4.02.', 'Materiales, suministros y mercancías', 1, ''),
('4.02.01.', 'Productos alimenticios y agropecuarios', 2, ''),
('4.02.01.01.', 'Alimentos y bebidas para personas', 3, ''),
('4.02.01.01.00', 'Alimentos y bebidas para personas', 4, 'NO'),
('4.02.01.02.', 'Alimentos para animales', 3, ''),
('4.02.01.02.00', 'Alimentos para animales', 4, ''),
('4.02.01.03.', 'Productos agrícolas y pecuarios', 3, ''),
('4.02.01.03.00', 'Productos agrï¿½colas y pecuarios', 4, 'NO'),
('4.02.01.04.', 'Productos de la caza y pesca', 3, ''),
('4.02.01.04.00', 'Productos de la caza y pesca', 4, ''),
('4.02.01.99.', 'Otros productos alimenticios y agropecuarios', 3, ''),
('4.02.01.99.00', 'Otros productos alimenticios y agropecuarios', 4, ''),
('4.02.02.', 'Productos de minas, canteras y yacimientos', 2, ''),
('4.02.02.01.', 'Carbón mineral', 3, ''),
('4.02.02.01.00', 'Carbón mineral', 4, ''),
('4.02.02.02.', 'Petróleo crudo y gas natural', 3, ''),
('4.02.02.02.00', 'Petrï¿½leo crudo y gas natural', 4, 'NO'),
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
('4.02.03.01.00', 'Textiles', 4, 'NO'),
('4.02.03.02.', 'Prendas de vestir', 3, ''),
('4.02.03.02.00', 'Prendas de vestir', 4, 'NO'),
('4.02.03.03.', 'Calzados', 3, ''),
('4.02.03.03.00', 'Calzados', 4, 'NO'),
('4.02.03.99.', 'Otros productos textiles y vestuarios', 3, ''),
('4.02.03.99.00', 'Otros productos textiles y vestuarios', 4, ''),
('4.02.04.', 'Productos de cuero y caucho', 2, ''),
('4.02.04.01.', 'Cueros y pieles', 3, ''),
('4.02.04.01.00', 'Cueros y pieles', 4, ''),
('4.02.04.02.', 'Productos de cuero y sucedáneos del cuero', 3, ''),
('4.02.04.02.00', 'Productos de cuero y sucedï¿½neos del cuero', 4, 'NO'),
('4.02.04.03.', 'Cauchos y tripas para vehículos', 3, ''),
('4.02.04.03.00', 'Cauchos y tripas para vehï¿½culos', 4, 'NO'),
('4.02.04.99.', 'Otros productos de cuero y caucho', 3, ''),
('4.02.04.99.00', 'Otros productos de cuero y caucho', 4, 'NO'),
('4.02.05.', 'Productos de papel, cartón e impresos', 2, ''),
('4.02.05.01.', 'Pulpa de madera, papel y cartón', 3, ''),
('4.02.05.01.00', 'Pulpa de madera, papel y cartï¿½n', 4, 'NO'),
('4.02.05.02.', 'Envases y cajas de papel y cartón', 3, ''),
('4.02.05.02.00', 'Envases y cajas de papel y cartï¿½n', 4, 'NO'),
('4.02.05.03.', 'Productos de papel y cartón para oficina', 3, ''),
('4.02.05.03.00', 'Productos de papel y cartï¿½n para oficina', 4, 'NO'),
('4.02.05.04.', 'Libros, revistas y periódicos', 3, ''),
('4.02.05.04.00', 'Libros, revistas y periï¿½dicos', 4, 'NO'),
('4.02.05.05.', 'Material de enseñanza', 3, ''),
('4.02.05.05.00', 'Material de enseï¿½anza', 4, 'NO'),
('4.02.05.06.', 'Productos de papel y cartón para computación', 3, ''),
('4.02.05.06.00', 'Productos de papel y cartï¿½n para computaciï¿½n', 4, 'NO'),
('4.02.05.07.', 'Productos de papel y cartón para la imprenta y reproducción', 3, ''),
('4.02.05.07.00', 'Productos de papel y cartï¿½n para la imprenta y reproducciï¿½n', 4, 'NO'),
('4.02.05.99.', 'Otros productos de pulpa, papel y cartón', 3, ''),
('4.02.05.99.00', 'Otros productos de pulpa, papel y cartï¿½n', 4, 'NO'),
('4.02.06.', 'Productos químicos y derivados', 2, ''),
('4.02.06.01.', 'Sustancias químicas y de uso industrial', 3, ''),
('4.02.06.01.00', 'Sustancias quï¿½micas y de uso industrial', 4, 'NO'),
('4.02.06.02.', 'Abonos, plaguicidas y otros', 3, ''),
('4.02.06.02.00', 'Abonos, plaguicidas y otros', 4, 'NO'),
('4.02.06.03.', 'Tintas, pinturas y colorantes', 3, ''),
('4.02.06.03.00', 'Tintas, pinturas y colorantes', 4, 'NO'),
('4.02.06.04.', 'Productos farmacéuticos y medicamentos', 3, ''),
('4.02.06.04.00', 'Productos farmacï¿½uticos y medicamentos', 4, 'NO'),
('4.02.06.05.', 'Productos de tocador', 3, ''),
('4.02.06.05.00', 'Productos de tocador', 4, 'NO'),
('4.02.06.06.', 'Combustibles y lubricantes', 3, ''),
('4.02.06.06.00', 'Combustibles y lubricantes', 4, 'NO'),
('4.02.06.07.', 'Productos diversos derivados del petróleo y del carbón', 3, ''),
('4.02.06.07.00', 'Productos diversos derivados del petrï¿½leo y del carbï¿½n', 4, 'NO'),
('4.02.06.08.', 'Productos plásticos', 3, ''),
('4.02.06.08.00', 'Productos plï¿½sticos', 4, 'NO'),
('4.02.06.09.', 'Mezclas explosivas', 3, ''),
('4.02.06.09.00', 'Mezclas explosivas', 4, ''),
('4.02.06.99.', 'Otros productos de la industria química y conexos', 3, ''),
('4.02.06.99.00', 'Otros productos de la industria quï¿½mica y conexos', 4, 'NO'),
('4.02.07.', 'Productos minerales no metálicos', 2, ''),
('4.02.07.01.', 'Productos de barro, loza y porcelana', 3, ''),
('4.02.07.01.00', 'Productos de barro, loza y porcelana', 4, 'NO'),
('4.02.07.02.', 'Vidrios y productos de vidrio', 3, ''),
('4.02.07.02.00', 'Vidrios y productos de vidrio', 4, 'NO'),
('4.02.07.03.', 'Productos de arcilla para construcción', 3, ''),
('4.02.07.03.00', 'Productos de arcilla para construcciï¿½n', 4, 'NO'),
('4.02.07.04.', 'Cemento, cal  y yeso', 3, ''),
('4.02.07.04.00', 'Cemento, cal  y yeso', 4, 'NO'),
('4.02.07.99.', 'Otros productos minerales no metálicos', 3, ''),
('4.02.07.99.00', 'Otros productos minerales no metï¿½licos', 4, 'NO'),
('4.02.08.', 'Productos metálicos', 2, ''),
('4.02.08.01.', 'Productos primarios de hierro y acero', 3, ''),
('4.02.08.01.00', 'Productos primarios de hierro y acero', 4, 'NO'),
('4.02.08.02.', 'Productos de metales no ferrosos', 3, ''),
('4.02.08.02.00', 'Productos de metales no ferrosos', 4, 'NO'),
('4.02.08.03.', 'Herramientas menores, cuchillería y artículos generales de ferretería', 3, ''),
('4.02.08.03.00', 'Herramientas menores, cuchillerï¿½a y artï¿½culos generales de ferreterï¿½a', 4, 'NO'),
('4.02.08.04.', 'Productos metálicos estructurales', 3, ''),
('4.02.08.04.00', 'Productos metï¿½licos estructurales', 4, 'NO'),
('4.02.08.05.', 'Materiales de orden público, seguridad y defensa nacional', 3, ''),
('4.02.08.05.00', 'Materiales de orden pï¿½blico, seguridad y defensa nacional', 4, 'NO'),
('4.02.08.06.', 'Material de seguridad pública', 3, ''),
('4.02.08.06.00', 'Material de seguridad pï¿½blica', 4, 'NO'),
('4.02.08.07.', 'Material de señalamiento', 3, ''),
('4.02.08.07.00', 'Material de seï¿½alamiento', 4, 'NO'),
('4.02.08.08.', 'Material de educación', 3, ''),
('4.02.08.08.00', 'Material de educaciï¿½n', 4, 'NO'),
('4.02.08.09.', 'Repuestos y accesorios para equipos de transporte', 3, ''),
('4.02.08.09.00', 'Repuestos y accesorios para equipos de transporte', 4, 'NO'),
('4.02.08.10.', 'Repuestos y accesorios para otros equipos', 3, ''),
('4.02.08.10.00', 'Repuestos y accesorios para otros equipos', 4, 'NO'),
('4.02.08.99.', 'Otros productos metálicos', 3, ''),
('4.02.08.99.00', 'Otros productos metï¿½licos', 4, 'NO'),
('4.02.09.', 'Productos de madera', 2, ''),
('4.02.09.01.', 'Productos primarios de madera', 3, ''),
('4.02.09.01.00', 'Productos primarios de madera', 4, 'NO'),
('4.02.09.02.', 'Muebles y accesorios de madera para edificaciones', 3, ''),
('4.02.09.02.00', 'Muebles y accesorios de madera para edificaciones', 4, 'NO'),
('4.02.09.99.', 'Otros productos de madera', 3, ''),
('4.02.09.99.00', 'Otros productos de madera', 4, 'NO'),
('4.02.10.', 'Productos varios y útiles diversos', 2, ''),
('4.02.10.01.', 'Artículos de deporte, recreación y juguetes', 3, ''),
('4.02.10.01.00', 'Artï¿½culos de deporte, recreaciï¿½n y juguetes', 4, 'NO'),
('4.02.10.02.', 'Materiales y útiles de limpieza y aseo', 3, ''),
('4.02.10.02.00', 'Materiales y ï¿½tiles de limpieza y aseo', 4, 'NO'),
('4.02.10.03.', 'Utensilios de cocina y comedor', 3, ''),
('4.02.10.03.00', 'Utensilios de cocina y comedor', 4, 'NO'),
('4.02.10.04.', 'Útiles menores médico - quirúrgicos de laboratorio, dentales y de veterinaria', 3, ''),
('4.02.10.04.00', 'ï¿½tiles menores mï¿½dico - quirï¿½rgicos de laboratorio, dentales y de veterinaria', 4, 'NO'),
('4.02.10.05.', 'Útiles de escritorio, oficina y materiales de instrucción', 3, ''),
('4.02.10.05.00', 'ï¿½tiles de escritorio, oficina y materiales de instrucciï¿½n', 4, 'NO'),
('4.02.10.06.', 'Condecoraciones, ofrendas y similares', 3, ''),
('4.02.10.06.00', 'Condecoraciones, ofrendas y similares', 4, 'NO'),
('4.02.10.07.', 'Productos de seguridad en el trabajo', 3, ''),
('4.02.10.07.00', 'Productos de seguridad en el trabajo', 4, 'NO'),
('4.02.10.08.', 'Materiales para equipos de computación', 3, ''),
('4.02.10.08.00', 'Materiales para equipos de computaciï¿½n', 4, 'NO'),
('4.02.10.09.', 'Especies timbradas y valores', 3, ''),
('4.02.10.09.00', 'Especies timbradas y valores', 4, 'NO'),
('4.02.10.10.', 'Útiles religiosos', 3, ''),
('4.02.10.10.00', 'ï¿½tiles religiosos', 4, 'NO'),
('4.02.10.11.', 'Materiales eléctricos', 3, ''),
('4.02.10.11.00', 'Materiales elï¿½ctricos', 4, 'NO'),
('4.02.10.12.', 'Materiales para instalaciones sanitarias', 3, ''),
('4.02.10.12.00', 'Materiales para instalaciones sanitarias', 4, 'NO'),
('4.02.10.13.', 'Materiales fotográficos', 3, ''),
('4.02.10.13.00', 'Materiales fotogrï¿½ficos', 4, 'NO'),
('4.02.10.99.', 'Otros productos y útiles diversos', 3, ''),
('4.02.10.99.00', 'Otros productos y ï¿½tiles diversos', 4, 'NO'),
('4.02.11.', 'Bienes para la venta', 2, ''),
('4.02.11.01.', 'Productos y artículos para la venta', 3, ''),
('4.02.11.01.00', 'Productos y artículos para la venta', 4, ''),
('4.02.11.02.', 'Maquinarias y equipos para la venta', 3, ''),
('4.02.11.02.00', 'Maquinarias y equipos para la venta', 4, ''),
('4.02.11.99.', 'Otros bienes para la venta', 3, ''),
('4.02.11.99.00', 'Otros bienes para la venta', 4, ''),
('4.02.99.', 'Otros materiales y suministros', 2, ''),
('4.02.99.01.', 'Otros materiales y suministros', 3, ''),
('4.02.99.01.00', 'Otros materiales y suministros', 4, 'NO'),
('4.03.', 'Servicios no personales', 1, ''),
('4.03.01.', 'Alquileres de inmuebles', 2, ''),
('4.03.01.01.', 'Alquileres de edificios y locales', 3, ''),
('4.03.01.01.00', 'Alquileres de edificios y locales', 4, 'NO'),
('4.03.01.02.', 'Alquileres de instalaciones culturales y recreativas', 3, ''),
('4.03.01.02.00', 'Alquileres de instalaciones culturales y recreativas', 4, 'NO'),
('4.03.01.03.', 'Alquileres de tierras y terrenos', 3, ''),
('4.03.01.03.00', 'Alquileres de tierras y terrenos', 4, 'NO'),
('4.03.02.', 'Alquileres de maquinaria y equipos', 2, ''),
('4.03.02.01.', 'Alquileres de maquinaria y demás equipos de construcción, campo, industria y taller', 3, ''),
('4.03.02.01.00', 'Alquileres de maquinaria y demás equipos de construcción, campo, industria y taller', 4, ''),
('4.03.02.02.', 'Alquileres de equipos de transporte, tracción y elevación', 3, ''),
('4.03.02.02.00', 'Alquileres de equipos de transporte, tracciï¿½n y elevaciï¿½n', 4, 'NO'),
('4.03.02.03.', 'Alquileres de equipos de comunicaciones y de señalamiento', 3, ''),
('4.03.02.03.00', 'Alquileres de equipos de comunicaciones y de seï¿½alamiento', 4, 'NO'),
('4.03.02.04.', 'Alquileres de equipos médico - quirúrgicos, dentales y de veterinaria', 3, ''),
('4.03.02.04.00', 'Alquileres de equipos médico - quirúrgicos, dentales y de veterinaria', 4, ''),
('4.03.02.05.', 'Alquileres de equipos científicos, religiosos, de enseñanza y recreación', 3, ''),
('4.03.02.05.00', 'Alquileres de equipos cientï¿½ficos, religiosos, de enseï¿½anza y recreaciï¿½n', 4, 'NO'),
('4.03.02.06.', 'Alquileres de máquinas, muebles y demás equipos de oficina y alojamiento', 3, ''),
('4.03.02.06.00', 'Alquileres de mï¿½quinas, muebles y demï¿½s equipos de oficina y alojamiento', 4, 'NO'),
('4.03.02.99.', 'Alquileres de otras maquinaria y equipos', 3, ''),
('4.03.02.99.00', 'Alquileres de otras maquinaria y equipos', 4, 'NO'),
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
('4.03.04.01.00', 'Electricidad', 4, 'NO'),
('4.03.04.02.', 'Gas', 3, ''),
('4.03.04.02.00', 'Gas', 4, 'NO'),
('4.03.04.03.', 'Agua', 3, ''),
('4.03.04.03.00', 'Agua', 4, 'NO'),
('4.03.04.04.', 'Teléfonos', 3, ''),
('4.03.04.04.00', 'Telï¿½fonos', 4, 'NO'),
('4.03.04.05.', 'Servicio de comunicaciones', 3, ''),
('4.03.04.05.00', 'Servicio de comunicaciones', 4, 'NO'),
('4.03.04.06.', 'Servicio de aseo urbano y domiciliario', 3, ''),
('4.03.04.06.00', 'Servicio de aseo urbano y domiciliario', 4, 'NO'),
('4.03.04.07.', 'Servicio de condominio', 3, ''),
('4.03.04.07.00', 'Servicio de condominio', 4, 'NO'),
('4.03.05.', 'Servicio de administración, vigilancia y mantenimiento de los servicios básicos', 2, ''),
('4.03.05.01.', 'Servicio de administración, vigilancia y mantenimiento del servicio de electricidad', 3, ''),
('4.03.05.01.00', 'Servicio de administraciï¿½n, vigilancia y mantenimiento del servicio de electricidad', 4, 'NO'),
('4.03.05.02.', 'Servicio de administración, vigilancia y mantenimiento del servicio de gas', 3, ''),
('4.03.05.02.00', 'Servicio de administraciï¿½n, vigilancia y mantenimiento del servicio de gas', 4, 'NO'),
('4.03.05.03.', 'Servicio de administración, vigilancia y mantenimiento del servicio de agua', 3, ''),
('4.03.05.03.00', 'Servicio de administraciï¿½n, vigilancia y mantenimiento del servicio de agua', 4, 'NO'),
('4.03.05.04.', 'Servicio de administración, vigilancia y mantenimiento del servicio de teléfonos', 3, ''),
('4.03.05.04.00', 'Servicio de administraciï¿½n, vigilancia y mantenimiento del servicio de telï¿½fonos', 4, 'NO'),
('4.03.05.05.', 'Servicio de administración, vigilancia y mantenimiento del servicio de comunicaciones', 3, ''),
('4.03.05.05.00', 'Servicio de administración, vigilancia y mantenimiento del servicio de comunicaciones', 4, ''),
('4.03.05.06.', 'Servicio de administración, vigilancia y mantenimiento del servicio de aseo urbano y domiciliario', 3, ''),
('4.03.05.06.00', 'Servicio de administración, vigilancia y mantenimiento del servicio de aseo urbano y domiciliario', 4, ''),
('4.03.06.', 'Servicios de transporte y almacenaje', 2, ''),
('4.03.06.01.', 'Fletes y embalajes', 3, ''),
('4.03.06.01.00', 'Fletes y embalajes', 4, 'NO'),
('4.03.06.02.', 'Almacenaje', 3, ''),
('4.03.06.02.00', 'Almacenaje', 4, 'NO'),
('4.03.06.03.', 'Estacionamiento', 3, ''),
('4.03.06.03.00', 'Estacionamiento', 4, 'NO'),
('4.03.06.04.', 'Peaje', 3, ''),
('4.03.06.04.00', 'Peaje', 4, ''),
('4.03.06.05.', 'Servicios de protección en traslado de fondos y de mensajería', 3, ''),
('4.03.06.05.00', 'Servicios de protección en traslado de fondos y de mensajería', 4, ''),
('4.03.07.', 'Servicios de información, impresión y relaciones públicas', 2, ''),
('4.03.07.01.', 'Publicidad y propaganda', 3, ''),
('4.03.07.01.00', 'Publicidad y propaganda', 4, 'NO'),
('4.03.07.02.', 'Imprenta y reproducción', 3, ''),
('4.03.07.02.00', 'Imprenta y reproducciï¿½n', 4, 'NO'),
('4.03.07.03.', 'Relaciones sociales', 3, ''),
('4.03.07.03.00', 'Relaciones sociales', 4, 'NO'),
('4.03.07.04.', 'Avisos', 3, ''),
('4.03.07.04.00', 'Avisos', 4, 'NO'),
('4.03.08.', 'Primas y otros gastos de seguros y comisiones bancarias', 2, ''),
('4.03.08.01.', 'Primas y gastos de seguros', 3, ''),
('4.03.08.01.00', 'Primas y gastos de seguros', 4, 'NO'),
('4.03.08.02.', 'Comisiones y gastos bancarios', 3, ''),
('4.03.08.02.00', 'Comisiones y gastos bancarios', 4, 'NO'),
('4.03.08.03.', 'Comisiones y gastos de adquisición de seguros', 3, ''),
('4.03.08.03.00', 'Comisiones y gastos de adquisiciï¿½n de seguros', 4, 'NO'),
('4.03.09.', 'Viáticos y pasajes', 2, ''),
('4.03.09.01.', 'Viáticos y pasajes dentro del país', 3, ''),
('4.03.09.01.00', 'Viï¿½ticos y pasajes dentro del paï¿½s', 4, 'NO'),
('4.03.09.02.', 'Viáticos y pasajes fuera del país', 3, ''),
('4.03.09.02.00', 'Viï¿½ticos y pasajes fuera del paï¿½s', 4, 'NO'),
('4.03.09.03.', 'Asignación por kilómetros recorridos', 3, ''),
('4.03.09.03.00', 'Asignaciï¿½n por kilï¿½metros recorridos', 4, 'NO'),
('4.03.10.', 'Servicios profesionales y técnicos', 2, ''),
('4.03.10.01.', 'Servicios jurídicos', 3, ''),
('4.03.10.01.00', 'Servicios jurï¿½dicos', 4, 'NO'),
('4.03.10.02.', 'Servicios de contabilidad y auditoría', 3, ''),
('4.03.10.02.00', 'Servicios de contabilidad y auditorï¿½a', 4, 'NO'),
('4.03.10.03.', 'Servicios de procesamiento de datos', 3, ''),
('4.03.10.03.00', 'Servicios de procesamiento de datos', 4, 'NO'),
('4.03.10.04.', 'Servicios de ingeniería y arquitectónicos', 3, ''),
('4.03.10.04.00', 'Servicios de ingeniería y arquitectónicos', 4, ''),
('4.03.10.05.', 'Servicios médicos, odontológicos y otros servicios de sanidad', 3, ''),
('4.03.10.05.00', 'Servicios médicos, odontológicos y otros servicios de sanidad', 4, ''),
('4.03.10.06.', 'Servicios de veterinaria', 3, ''),
('4.03.10.06.00', 'Servicios de veterinaria', 4, ''),
('4.03.10.07.', 'Servicios de capacitación y adiestramiento', 3, ''),
('4.03.10.07.00', 'Servicios de capacitaciï¿½n y adiestramiento', 4, 'NO'),
('4.03.10.08.', 'Servicios presupuestarios', 3, ''),
('4.03.10.08.00', 'Servicios presupuestarios', 4, ''),
('4.03.10.09.', 'Servicios de lavandería y tintorería', 3, ''),
('4.03.10.09.00', 'Servicios de lavandería y tintorería', 4, ''),
('4.03.10.10.', 'Servicios de vigilancia', 3, ''),
('4.03.10.10.00', 'Servicios de vigilancia', 4, ''),
('4.03.10.11.', 'Servicios para la elaboración y suministro de comida ', 3, ''),
('4.03.10.11.00', 'Servicios para la elaboración y suministro de comida ', 4, ''),
('4.03.10.99.', 'Otros servicios profesionales y técnicos', 3, ''),
('4.03.10.99.00', 'Otros servicios profesionales y tï¿½cnicos', 4, 'NO'),
('4.03.11.', 'Conservación y reparaciones menores de maquinaria y equipos', 2, ''),
('4.03.11.01.', 'Conservación y reparaciones menores de maquinaria y demás equipos de construcción, campo, industria y taller', 3, ''),
('4.03.11.01.00', 'Conservaciï¿½n y reparaciones menores de maquinaria y demï¿½s equipos de construcciï¿½n, campo, industria y taller', 4, 'NO'),
('4.03.11.02.', 'Conservación y reparaciones menores de equipos de transporte, tracción y elevación', 3, ''),
('4.03.11.02.00', 'Conservaciï¿½n y reparaciones menores de equipos de transporte, tracciï¿½n y elevaciï¿½n', 4, 'NO'),
('4.03.11.03.', 'Conservación y reparaciones menores de equipos de comunicaciones y de señalamiento', 3, ''),
('4.03.11.03.00', 'Conservaciï¿½n y reparaciones menores de equipos de comunicaciones y de seï¿½alamiento', 4, 'NO'),
('4.03.11.04.', 'Conservación y reparaciones menores de equipos médico-quirúrgicos, dentales y de veterinaria', 3, ''),
('4.03.11.04.00', 'Conservaciï¿½n y reparaciones menores de equipos mï¿½dico-quirï¿½rgicos, dentales y de veterinaria', 4, 'NO'),
('4.03.11.05.', 'Conservación y reparaciones menores de equipos científicos, religiosos, de enseñanza y recreación', 3, ''),
('4.03.11.05.00', 'Conservación y reparaciones menores de equipos científicos, religiosos, de enseñanza y recreación', 4, ''),
('4.03.11.06.', 'Conservación y reparaciones menores de equipos y armamentos de orden público, seguridad y defensa nacional', 3, ''),
('4.03.11.06.00', 'Conservación y reparaciones menores de equipos y armamentos de orden público, seguridad y defensa nacional', 4, ''),
('4.03.11.07.', 'Conservación y reparaciones menores de máquinas, muebles y demás equipos de oficina y alojamiento', 3, ''),
('4.03.11.07.00', 'Conservaciï¿½n y reparaciones menores de mï¿½quinas, muebles y demï¿½s equipos de oficina y alojamiento', 4, 'NO'),
('4.03.11.99.', 'Conservación y reparaciones menores de otras maquinaria y equipos', 3, ''),
('4.03.11.99.00', 'Conservaciï¿½n y reparaciones menores de otras maquinaria y equipos', 4, 'NO'),
('4.03.12.', 'Conservación y reparaciones menores de obras', 2, ''),
('4.03.12.01.', 'Conservación y reparaciones menores de obras en bienes del dominio privado', 3, ''),
('4.03.12.01.00', 'Conservaciï¿½n y reparaciones menores de obras en bienes del dominio privado', 4, 'NO'),
('4.03.12.02.', 'Conservación y reparaciones menores de obras en bienes del dominio público', 3, ''),
('4.03.12.02.00', 'Conservaciï¿½n y reparaciones menores de obras en bienes del dominio pï¿½blico', 4, 'NO'),
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
('4.03.15.02.00', 'Tasas y otros derechos obligatorios', 4, 'NO'),
('4.03.15.03.', 'Asignación a  agentes de especies fiscales', 3, ''),
('4.03.15.03.00', 'Asignación a  agentes de especies fiscales', 4, ''),
('4.03.15.99.', 'Otros servicios fiscales ', 3, ''),
('4.03.15.99.00', 'Otros servicios fiscales ', 4, ''),
('4.03.16.', 'Servicios de diversión, esparcimiento y culturales', 2, ''),
('4.03.16.01.', 'Servicios de diversión, esparcimiento y culturales', 3, ''),
('4.03.16.01.00', 'Servicios de diversiï¿½n, esparcimiento y culturales', 4, 'NO'),
('4.03.17.', 'Servicios de gestión administrativa prestados por organismos de asistencia técnica', 2, ''),
('4.03.17.01.', 'Servicios de gestión administrativa prestados por organismos de asistencia técnica', 3, ''),
('4.03.17.01.00', 'Servicios de gestiï¿½n administrativa prestados por organismos de asistencia tï¿½cnica', 4, 'NO'),
('4.03.18.', 'Impuestos indirectos', 2, ''),
('4.03.18.01.', 'Impuesto al valor agregado', 3, ''),
('4.03.18.01.00', 'Impuesto al valor agregado', 4, 'NO'),
('4.03.18.99.', 'Otros impuestos indirectos', 3, ''),
('4.03.18.99.00', 'Otros impuestos indirectos', 4, ''),
('4.03.19.', 'COMISIONES POR SERVICIOS PARA CUMPLIR CON LOS BENEFICIOS SOCIALES', 2, 'NO'),
('4.03.19.01.', 'COMISIONES POR SERVICIOS PARA CUMPLIR CON LOS BENEFICIOS SOCIALES', 3, 'NO'),
('4.03.19.01.00', 'COMISIONES POR SERVICIOS PARA CUMPLIR CON LOS BENEFICIOS SOCIALES', 4, 'NO'),
('4.03.99.', 'Otros servicios no personales', 2, ''),
('4.03.99.01.', 'Otros servicios no personales', 3, ''),
('4.03.99.01.00', 'Otros servicios no personales', 4, 'NO'),
('4.04.', 'Activos  reales', 1, ''),
('4.04.01.', 'Repuestos  y  reparaciones  mayores', 2, '');
INSERT INTO `cwprecue` (`CodCue`, `Denominacion`, `Tipocta`, `Tipopuc`) VALUES
('4.04.01.01.', 'Repuestos mayores', 3, ''),
('4.04.01.01.01', 'Repuestos mayores para maquinaria y demï¿½s equipos de construcciï¿½n, campo, industria y taller', 4, 'NO'),
('4.04.01.01.02', 'Repuestos mayores para equipos de transporte, tracciï¿½n y elevaciï¿½n', 4, 'NO'),
('4.04.01.01.03', 'Repuestos mayores para equipos de comunicaciones y de seï¿½alamiento', 4, 'NO'),
('4.04.01.01.04', 'Repuestos mayores para equipos médico-quirúrgicos, dentales y de veterinaria', 4, ''),
('4.04.01.01.05', 'Repuestos mayores para equipos científicos, religiosos, de enseñanza y recreación', 4, ''),
('4.04.01.01.06', 'Repuestos mayores para equipos de seguridad pública', 4, ''),
('4.04.01.01.07', 'Repuestos mayores para máquinas, muebles y demás equipos de oficina y alojamiento', 4, ''),
('4.04.01.01.99', 'Repuestos mayores para otras maquinaria y equipos', 4, ''),
('4.04.01.02.', 'Reparaciones mayores de maquinaria y equipos', 3, ''),
('4.04.01.02.01', 'Reparaciones mayores de maquinaria y demï¿½s equipos de construcciï¿½n, campo, industria y taller', 4, 'NO'),
('4.04.01.02.02', 'Reparaciones mayores de equipos de transporte, tracción y elevación', 4, ''),
('4.04.01.02.03', 'Reparaciones mayores de equipos de comunicaciones y de señalamiento', 4, ''),
('4.04.01.02.04', 'Reparaciones mayores de equipos médico - quirúrgicos, dentales y de veterinaria', 4, ''),
('4.04.01.02.05', 'Reparaciones mayores de equipos científicos, religiosos, de enseñanza y recreación', 4, ''),
('4.04.01.02.06', 'Reparaciones mayores de equipos y armamentos de orden público, seguridad y defensa nacional', 4, ''),
('4.04.01.02.07', 'Reparaciones mayores de máquinas, muebles y demás equipos de oficina y alojamiento', 4, ''),
('4.04.01.02.99', 'Reparaciones mayores de otras maquinaria y equipos', 4, ''),
('4.04.02.', 'Conservación, ampliaciones y mejoras mayores de obras', 2, ''),
('4.04.02.01.', 'Conservación, ampliaciones y mejoras mayores de obras en bienes del dominio privado', 3, ''),
('4.04.02.01.00', 'Conservaciï¿½n, ampliaciones y mejoras mayores de obras en bienes del dominio privado', 4, 'NO'),
('4.04.02.02.', 'Conservación, ampliaciones y mejoras mayores de obras en bienes del dominio público', 3, ''),
('4.04.02.02.00', 'Conservaciï¿½n, ampliaciones y mejoras mayores de obras en bienes del dominio pï¿½blico', 4, 'NO'),
('4.04.03.', 'Maquinaria y demás equipos de construcción, campo, industria y taller', 2, ''),
('4.04.03.01.', 'Maquinaria y demás equipos de construcción y mantenimiento', 3, ''),
('4.04.03.01.00', 'Maquinaria y demï¿½s equipos de construcciï¿½n y mantenimiento', 4, 'NO'),
('4.04.03.02.', 'Maquinaria y equipos para mantenimiento de automotores', 3, ''),
('4.04.03.02.00', 'Maquinaria y equipos para mantenimiento de automotores', 4, 'NO'),
('4.04.03.03.', 'Maquinaria y equipos agrícolas y pecuarios', 3, ''),
('4.04.03.03.00', 'Maquinaria y equipos agrï¿½colas y pecuarios', 4, 'NO'),
('4.04.03.04.', 'Maquinaria y equipos de artes gráficas y reproducción', 3, ''),
('4.04.03.04.00', 'Maquinaria y equipos de artes grï¿½ficas y reproducciï¿½n', 4, 'NO'),
('4.04.03.05.', 'Maquinaria y equipos industriales y de taller', 3, ''),
('4.04.03.05.00', 'Maquinaria y equipos industriales y de taller', 4, ''),
('4.04.03.06.', 'Maquinaria y equipos de energía', 3, ''),
('4.04.03.06.00', 'Maquinaria y equipos de energï¿½a', 4, 'NO'),
('4.04.03.07.', 'Maquinaria y equipos de riego y acueductos', 3, ''),
('4.04.03.07.00', 'Maquinaria y equipos de riego y acueductos', 4, 'NO'),
('4.04.03.08.', 'Equipos de almacén', 3, ''),
('4.04.03.08.00', 'Equipos de almacén', 4, ''),
('4.04.03.99.', 'Otra maquinaria y demás equipos de construcción, campo, industria y taller ', 3, ''),
('4.04.03.99.00', 'Otra maquinaria y demás equipos de construcción, campo, industria y taller ', 4, ''),
('4.04.04.', 'Equipos de transporte, tracción y elevación', 2, ''),
('4.04.04.01.', 'Vehículos automotores terrestres', 3, ''),
('4.04.04.01.00', 'Vehï¿½culos automotores terrestres', 4, 'NO'),
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
('4.04.04.99.00', 'Otros equipos de transporte, tracciï¿½n y elevaciï¿½n ', 4, 'NO'),
('4.04.05.', 'Equipos de comunicaciones y de señalamiento', 2, ''),
('4.04.05.01.', 'Equipos de telecomunicaciones', 3, ''),
('4.04.05.01.00', 'Equipos de telecomunicaciones', 4, 'NO'),
('4.04.05.02.', 'Equipos de señalamiento', 3, ''),
('4.04.05.02.00', 'Equipos de seï¿½alamiento', 4, 'NO'),
('4.04.05.03.', 'Equipos de control de tráfico aéreo', 3, ''),
('4.04.05.03.00', 'Equipos de control de tráfico aéreo', 4, ''),
('4.04.05.04.', 'Equipos de correo', 3, ''),
('4.04.05.04.00', 'Equipos de correo', 4, ''),
('4.04.05.99.', 'Otros equipos de comunicaciones y de señalamiento  ', 3, ''),
('4.04.05.99.00', 'Otros equipos de comunicaciones y de señalamiento  ', 4, ''),
('4.04.06.', 'Equipos médico - quirúrgicos, dentales y de veterinaria', 2, ''),
('4.04.06.01.', 'Equipos médico - quirúrgicos, dentales y de veterinaria', 3, ''),
('4.04.06.01.00', 'Equipos mï¿½dico - quirï¿½rgicos, dentales y de veterinaria', 4, 'NO'),
('4.04.06.99.', 'Otros equipos médico - quirúrgicos, dentales y de veterinaria', 3, ''),
('4.04.06.99.00', 'Otros equipos médico - quirúrgicos, dentales y de veterinaria', 4, ''),
('4.04.07.', 'Equipos científicos, religiosos, de enseñanza y recreación', 2, ''),
('4.04.07.01.', 'Equipos científicos y de laboratorio', 3, ''),
('4.04.07.01.00', 'Equipos cientï¿½ficos y de laboratorio', 4, 'NO'),
('4.04.07.02.', 'Equipos de enseñanza, deporte y recreación', 3, ''),
('4.04.07.02.00', 'Equipos de enseï¿½anza, deporte y recreaciï¿½n', 4, 'NO'),
('4.04.07.03.', 'Obras de arte', 3, ''),
('4.04.07.03.00', 'Obras de arte', 4, 'NO'),
('4.04.07.04.', 'Libros, revistas y otros instrumentos de enseñanzas', 3, ''),
('4.04.07.04.00', 'Libros, revistas y otros instrumentos de enseï¿½anzas', 4, 'NO'),
('4.04.07.05.', 'Equipos religiosos', 3, ''),
('4.04.07.05.00', 'Equipos religiosos', 4, ''),
('4.04.07.06.', 'Instrumentos musicales', 3, ''),
('4.04.07.06.00', 'Instrumentos musicales', 4, 'NO'),
('4.04.07.99.', 'Otros equipos científicos, religiosos, de enseñanza y recreación ', 3, ''),
('4.04.07.99.00', 'Otros equipos cientï¿½ficos, religiosos, de enseï¿½anza y recreaciï¿½n ', 4, 'NO'),
('4.04.08.', 'Equipos y armamentos de orden público, seguridad y defensa nacional', 2, ''),
('4.04.08.01.', 'Equipos y armamentos de orden público, seguridad y defensa nacional', 3, ''),
('4.04.08.01.00', 'Equipos y armamentos de orden pï¿½blico, seguridad y defensa nacional', 4, 'NO'),
('4.04.08.99.', 'Otros equipos y armamentos de orden público, seguridad y defensa nacional', 3, ''),
('4.04.08.99.00', 'Otros equipos y armamentos de orden público, seguridad y defensa nacional', 4, ''),
('4.04.09.', 'Máquinas, muebles y demás equipos de oficina y alojamiento', 2, ''),
('4.04.09.01.', 'Mobiliario y equipos de oficina', 3, ''),
('4.04.09.01.00', 'Mobiliario y equipos de oficina', 4, 'NO'),
('4.04.09.02.', 'Equipos de computación', 3, ''),
('4.04.09.02.00', 'Equipos de computaciï¿½n', 4, 'NO'),
('4.04.09.03.', 'Mobiliario y equipos de alojamiento', 3, ''),
('4.04.09.03.00', 'Mobiliario y equipos de alojamiento', 4, 'NO'),
('4.04.09.99.', 'Otras máquinas, muebles y demás equipos de oficina y alojamiento', 3, ''),
('4.04.09.99.00', 'Otras mï¿½quinas, muebles y demï¿½s equipos de oficina y alojamiento', 4, 'NO'),
('4.04.10.', 'Semovientes', 2, ''),
('4.04.10.01.', 'Semovientes', 3, ''),
('4.04.10.01.00', 'Semovientes', 4, ''),
('4.04.11.', 'Inmuebles, maquinaria y equipos usados', 2, ''),
('4.04.11.01.', 'Adquisición de tierras y terrenos', 3, ''),
('4.04.11.01.00', 'Adquisición de tierras y terrenos', 4, ''),
('4.04.11.02.', 'Adquisición de edificios e instalaciones', 3, ''),
('4.04.11.02.00', 'Adquisiciï¿½n de edificios e instalaciones', 4, 'NO'),
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
('4.04.12.02.00', 'Derechos de autor', 4, 'NO'),
('4.04.12.03.', 'Gastos de organización', 3, ''),
('4.04.12.03.00', 'Gastos de organización', 4, ''),
('4.04.12.04.', 'Paquetes y programas de computación', 3, ''),
('4.04.12.04.00', 'Paquetes y programas de computaciï¿½n', 4, 'NO'),
('4.04.12.05.', 'Estudios y proyectos', 3, ''),
('4.04.12.05.00', 'Estudios y proyectos', 4, ''),
('4.04.12.99.', 'Otros activos intangibles ', 3, ''),
('4.04.12.99.00', 'Otros activos intangibles ', 4, ''),
('4.04.13.', 'Estudios y proyectos para inversión en activos fijos', 2, ''),
('4.04.13.01.', 'Estudios y proyectos aplicables a bienes del dominio privado', 3, ''),
('4.04.13.01.00', 'Estudios y proyectos aplicables a bienes del dominio privado', 4, 'NO'),
('4.04.13.02.', 'Estudios y proyectos aplicables a bienes del dominio público', 3, ''),
('4.04.13.02.00', 'Estudios y proyectos aplicables a bienes del dominio pï¿½blico', 4, 'NO'),
('4.04.14.', 'Contratación de inspección de obras', 2, ''),
('4.04.14.01.', 'Contratación de inspección de obras de bienes del dominio privado', 3, ''),
('4.04.14.01.00', 'Contrataciï¿½n de inspecciï¿½n de obras de bienes del dominio privado', 4, 'NO'),
('4.04.14.02.', 'Contratación de inspección de obras de bienes del dominio público', 3, ''),
('4.04.14.02.00', 'Contratación de inspección de obras de bienes del dominio público', 4, ''),
('4.04.15.', 'Construcciones del dominio privado', 2, ''),
('4.04.15.01.', 'Construcciones de edificios médico-asistenciales', 3, ''),
('4.04.15.01.00', 'Construcciones de edificios mï¿½dico-asistenciales', 4, 'NO'),
('4.04.15.02.', 'Construcciones de edificios militares y de seguridad', 3, ''),
('4.04.15.02.00', 'Construcciones de edificios militares y de seguridad', 4, 'NO'),
('4.04.15.03.', 'Construcciones de edificios educativos', 3, ''),
('4.04.15.03.00', 'Construcciones de edificios educativos', 4, 'NO'),
('4.04.15.04.', 'Construcciones de edificios culturales', 3, ''),
('4.04.15.04.00', 'Construcciones de edificios culturales', 4, ''),
('4.04.15.05.', 'Construcciones de edificios para oficina', 3, ''),
('4.04.15.05.00', 'Construcciones de edificios para oficina', 4, ''),
('4.04.15.06.', 'Construcciones de edificios industriales', 3, ''),
('4.04.15.06.00', 'Construcciones de edificios industriales', 4, ''),
('4.04.16.', 'Construcciones del dominio público', 2, ''),
('4.04.16.01.', 'Construcción de vialidad', 3, ''),
('4.04.16.01.00', 'Construcciï¿½n de vialidad', 4, 'NO'),
('4.04.16.02.', 'Construcción de plazas, parques y similares', 3, ''),
('4.04.16.02.00', 'Construcciï¿½n de plazas, parques y similares', 4, 'NO'),
('4.04.16.03.', 'Construcciones de instalaciones hidráulicas', 3, ''),
('4.04.16.03.00', 'Construcciones de instalaciones hidrï¿½ulicas', 4, 'NO'),
('4.04.16.04.', 'Construcciones de puertos y aeropuertos', 3, ''),
('4.04.16.04.00', 'Construcciones de puertos y aeropuertos', 4, ''),
('4.04.99.', 'Otros activos reales', 2, ''),
('4.04.99.01.', 'Otros activos reales', 3, ''),
('4.04.99.01.00', 'Otros activos reales', 4, 'NO'),
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
('4.09.16.01.', 'Asignaciones para cancelar compromisos pendientes de ejercicios anteriores', 3, '');
INSERT INTO `cwprecue` (`CodCue`, `Denominacion`, `Tipocta`, `Tipopuc`) VALUES
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
('4.09.20.', 'Fondo para atender compromisos generados por la contratación colectiva', 2, ''),
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
-- Table structure for table `nomacumulados`
--

CREATE TABLE IF NOT EXISTS `nomacumulados` (
  `cod_tac` varchar(6) collate utf8_spanish_ci NOT NULL,
  `des_tac` varchar(60) collate utf8_spanish_ci NOT NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`cod_tac`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomacumulados`
--

INSERT INTO `nomacumulados` (`cod_tac`, `des_tac`, `markar`, `ee`) VALUES
('CON', 'POR CONCEPTO', 0, 0),
('ISP', 'INTERESES S/PRESTACIONES', 0, 0),
('PS', 'PRESTACIONES SOCIALES', 0, 0),
('SI', 'SUELDO INTEGRAL', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nomacumulados_det`
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
-- Dumping data for table `nomacumulados_det`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomaumentos`
--

CREATE TABLE IF NOT EXISTS `nomaumentos` (
  `codlogro` int(11) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codlogro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomaumentos`
--

INSERT INTO `nomaumentos` (`codlogro`, `descrip`, `ee`) VALUES
(1, 'Aumento de Sueldo o Salario', 0),
(2, 'Meritos', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nomaumentos_det`
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
  `sueldoigual` decimal(13,2) NOT NULL,
  `sueldomenor` decimal(13,2) NOT NULL,
  PRIMARY KEY  (`cod_aumento`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='registros de los aumentos realizados o a realizar al persona' AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nomaumentos_det`
--


-- --------------------------------------------------------

--
-- Table structure for table `nombancos`
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
-- Dumping data for table `nombancos`
--


-- --------------------------------------------------------

--
-- Table structure for table `nombaremos`
--

CREATE TABLE IF NOT EXISTS `nombaremos` (
  `codigo` int(11) NOT NULL auto_increment,
  `descripcion` varchar(250) collate utf8_spanish_ci NOT NULL,
  `tipodato` varchar(20) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nombaremos`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomcalendarios_empresa`
--

CREATE TABLE IF NOT EXISTS `nomcalendarios_empresa` (
  `cod_empresa` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `dia_fiesta` int(11) NOT NULL,
  `descripcion_dia_fiesta` varchar(200) collate utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomcalendarios_empresa`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomcalendarios_personal`
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
-- Dumping data for table `nomcalendarios_personal`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomcalendarios_tiposnomina`
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
-- Dumping data for table `nomcalendarios_tiposnomina`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomcamposadic_tmp`
--

CREATE TABLE IF NOT EXISTS `nomcamposadic_tmp` (
  `cedula` int(12) NOT NULL,
  `caj` decimal(17,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nomcamposadic_tmp`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomcampos_adicionales`
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
-- Dumping data for table `nomcampos_adicionales`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomcampos_adic_personal`
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
-- Dumping data for table `nomcampos_adic_personal`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomcampos_adic_personal2`
--

CREATE TABLE IF NOT EXISTS `nomcampos_adic_personal2` (
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
-- Dumping data for table `nomcampos_adic_personal2`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomcargos`
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
-- Dumping data for table `nomcargos`
--

INSERT INTO `nomcargos` (`cod_car`, `des_car`, `grado`, `perfil`, `markar`, `ee`) VALUES
('', 'DOCENTE (NO GRADUADO)', '', '', 0, 0),
('1', 'ABOGADO I', '17', '''''', 0, 0),
('100', 'MANTENIMIENTO Y LIMPIEZA', '', '''''', 0, 0),
('101', 'MANT Y LIMPIEZA (Gua-Noct) ', '0', '''''', 0, 0),
('102', ' MEDICO ESPEC I (Cardio - 15H) ', '', '', 0, 0),
('107', 'MED ESP I (Cirugia-15h)', '0', '''''', 0, 0),
('108', 'MED ESP I (Gin-Obst-15h)', '0', '''''', 0, 0),
('109', 'MED ESP I (Gin-Obst-30h)', '0', '''''', 0, 0),
('11', 'ASESORA DE PROYECTOS', '0', '''''', 0, 0),
('110', 'MED ESP I (Oftalm.-12h)', '0', '''''', 0, 0),
('111', 'MED ESP I (Traumat-12h)', '0', '''''', 0, 0),
('112', 'MED ESP II (Gin-Obst-15h)', '0', '''''', 0, 0),
('113', 'MED ESP II (Int-Nef-20h)', '0', '''''', 0, 0),
('114', 'MED ESP II (Ped.-30h)', '0', '''''', 0, 0),
('115', 'MED ESP II (Ped-25h)', '0', '''''', 0, 0),
('117', 'MEDICO  ESP. II (Geriatra 14h)', '0', '''''', 0, 0),
('118', 'MEDICO  II 30hrs', '0', '''''', 0, 0),
('119', 'MEDICO (Gua-Noct)', '0', '''''', 0, 0),
('12', 'ASESORA LEGAL', '0', '''''', 0, 0),
('120', 'MEDICO I 30 hrs', '0', '''''', 0, 0),
('121', 'MEDICO II 30 hrs', '0', '''''', 0, 0),
('122', 'MEDICO RURAL', '0', '''''', 0, 0),
('123', 'MENSAJ. MOTORIZADO', '0', '''''', 0, 0),
('124', 'MENSAJERO I', '1', '''''', 0, 0),
('125', 'MIEMBRO JUNTA PARROQUIAL', '0', '''''', 0, 0),
('126', 'ODONTOLOGO 15HRS', '0', '''''', 0, 0),
('127', 'ODONTOLOGO 30HRS', '0', '''''', 0, 0),
('129', 'PENSIONADO', '0', '''''', 0, 0),
('13', 'ASIST. COORD. VECINAL', '0', '''''', 0, 0),
('130', 'PLANIFICADOR I', '', '''''', 0, 0),
('131', 'PROGRAMADOR II', '17', '''''', 0, 0),
('132', 'PROM. DEPORTIVO (17.5 HRS)', '0', '''''', 0, 0),
('133', 'PROM. DEPORTIVO 12hrs', '0', '''''', 0, 0),
('134', 'PROM. DEPORTIVO 15hrs', '0', '''''', 0, 0),
('135', 'PROM. DEPORTIVO 17.50hrs', '0', '''''', 0, 0),
('136', 'PROMOTOR', '0', '''''', 0, 0),
('137', 'PROMOTOR BIENEST.SOCIAL', '3', '''''', 0, 0),
('138', 'BIENESTAR SOCIAL', '3', '''''', 0, 0),
('139', 'DEPORTIVO', '0', '''''', 0, 0),
('14', 'ASIST. PRE ESCOLAR (ENV)', '1', '''''', 0, 0),
('141', 'PROMOTOR DEPORTIVO(17,5 HRS)', '0', '''''', 0, 0),
('142', 'PROMOTOR VECINAL', '0', '''''', 0, 0),
('144', 'PSICOLOGA 15HRS', '0', '''''', 0, 0),
('145', 'PSICOLOGO II', '19', '''''', 0, 0),
('146', 'RECEPCIONISTA', '1', '''''', 0, 0),
('148', 'SECRET. EJECUTIVA I', '7', '''''', 0, 0),
('149', 'SECRET. EJECUTIVA II', '9', '''''', 0, 0),
('15', 'ASIST. PRE ESCOLAR (TAP)', '1', '''''', 0, 0),
('150', 'SECRET. EJECUTIVA III', '11', '''''', 0, 0),
('152', 'SECRETARIA I', '1', '''''', 0, 0),
('153', 'SECRETARIA II', '3', '''''', 0, 0),
('154', 'SECRETARIA III', '5', '''''', 0, 0),
('155', 'SECRETARIA PARROQUIAL', '99', '''''', 0, 0),
('156', 'ASESORA', '', '', 0, 0),
('157', 'SOCIOLOGO III', '21', '''''', 0, 0),
('158', 'SUPERV. SERV. GEN. I', '3', '''''', 0, 0),
('159', 'SUPERV. SERV. GEN. II', '5', '''''', 0, 0),
('16', 'ASIST. PROTC. CIVIL', '0', '''''', 0, 0),
('160', 'TERAPISTA LENGUAJE  I', '15', '''''', 0, 0),
('161', 'TRABAJADOR SOCIAL III', '21', '''''', 0, 0),
('162', 'VIGILANTE', '', '''''', 0, 0),
('163', 'PROMOTOR DEPORTIVO', '', '', 0, 0),
('164', 'INGENIERO CIVIL I', '18', '', 0, 0),
('165', 'ASISTENTE ADMINIST. IV', '17', '', 0, 0),
('166', 'DIBUJANTE CARTO. JEFE', '10', '', 0, 0),
('167', 'DOCENTE II PESC 33,33h', '', '', 0, 0),
('168', 'DOCENTE III PESC 33,33h TAP', '', '', 0, 0),
('169', 'DOCENTE III Comp. 33,33h ', '', '', 0, 0),
('17', 'ASIST. SERV. PUB.', '1', '''''', 0, 0),
('170', 'DOCENTE IV Club Abuelo 24h', '', '', 0, 0),
('171', 'Docente V 1er 33.33 h', '', '', 0, 0),
('172', 'DOCENTE V 33,33h', '', '', 0, 0),
('173', 'Docente VI Coordinador 36 h', '', '', 0, 0),
('174', 'Geografo I', '', '', 0, 0),
('175', 'MED ESP II (cardio-15h)', '', '', 0, 0),
('176', 'MED ESP II (GIN/OBST-30H)', '', '', 0, 0),
('177', 'SINDICO', '', '', 0, 0),
('178', 'ABOGADO JEFE', '25', '', 0, 0),
('179', 'ASIST ASUNT LEGALES III', '5', '', 0, 0),
('18', 'ASIST. TEC. REP.-MANT.', '2', '''''', 0, 0),
('180', 'ASIST DE OFICINA II', '3', '', 0, 0),
('181', 'ASIST CLUB ABUELO', '', '', 0, 0),
('182', 'ABOGADO III', '21', '', 0, 0),
('183', 'COORDINADOR III (ABOG)', '', '', 0, 0),
('184', 'DIRECTOR GENERAL', '', '', 0, 0),
('185', 'DISEÃ‘ADOR MEMORIA Y CUENTA', '', '', 0, 0),
('186', 'INSPECTOR DE OBRAS PUBLICAS ', '', '', 0, 0),
('2', 'ALCALDE', '99', '''''', 0, 0),
('20', 'ASISTENTE ADMINIST. II', '3', '''''', 0, 0),
('21', 'ASISTENTE ADMINIST. III', '15', '''''', 0, 0),
('24', 'ASISTENTE BIBLIOTECA I', '1', '''''', 0, 0),
('25', 'ASISTENTE BIBLIOTECA III', '15', '''''', 0, 0),
('26', 'ASISTENTE DE OFICINA 28HRS', '0', '''''', 0, 0),
('27', 'ASISTENTE DE OFICINA I', '1', '''''', 0, 0),
('28', 'ASISTENTE PRIM. AUX I', '1', '''''', 0, 0),
('29', 'ASISTENTE PRIM. AUX II', '15', '''''', 0, 0),
('3', 'ALMACENISTA II', '3', '''''', 0, 0),
('30', 'ASISTENTE PROT CIVIL', '0', '''''', 0, 0),
('31', 'ATENCION AL PUBLICO', '0', '''''', 0, 0),
('32', 'AUDITOR I', '17', '''''', 0, 0),
('33', 'AUDITOR II', '19', '''''', 0, 0),
('34', 'AUDITOR INTERNO (INTERINO)', '99', '''''', 0, 0),
('35', 'AUDITOR INTERNO ADM.', '0', '''''', 0, 0),
('36', 'AUXILIAR ADMINISTRATIVO', '0', '''''', 0, 0),
('37', 'AUXILIAR DE BIBLIOTECA 20hrs', '0', '''''', 0, 0),
('38', 'AUXILIAR DE BIBLIOTECAS', '0', '''''', 0, 0),
('39', 'AUXILIAR DE PREESCOLAR', '0', '''''', 0, 0),
('4', 'ANALISTA  DE PERSONAL V', '23', '''''', 0, 0),
('40', 'AVALUADOR INMUEBLES I', '2', '''''', 0, 0),
('41', 'AYUDANTE MANT-EDIF', '1', '''''', 0, 0),
('42', 'CAMAROGRAFO', '0', '''''', 0, 0),
('43', 'CHOFER', '1', '''''', 0, 0),
('44', 'COCINERA', '0', '''''', 0, 0),
('45', 'COMUNICADOR SOCIAL I', '17', '''''', 0, 0),
('46', 'COMUNICADOR SOCIAL II', '19', '''''', 0, 0),
('47', 'CONSEJERO PROTECCION', '', '''''', 0, 0),
('48', 'PROTECCION', '0', '''''', 0, 0),
('49', 'COORD. ASUNTOS ESP.', '99', '''''', 0, 0),
('5', 'ANALISTA DE PERSONAL I', '17', '''''', 0, 0),
('50', 'COORD. DE CUADRILLAS', '0', '''''', 0, 0),
('51', 'COORDINADOR  I', '99', '''''', 0, 0),
('52', 'COORDINADOR  II', '99', '''''', 0, 0),
('53', 'COORDINADOR  III', '99', '''''', 0, 0),
('54', 'COORDINADOR  IV', '99', '''''', 0, 0),
('56', 'COORDINADOR JEFE', '99', '''''', 0, 0),
('57', 'COORDINADOR JEFE (INGENIERO)', '99', '''''', 0, 0),
('58', 'COORDINADOR V', '99', '''''', 0, 0),
('59', 'DIBUJANTE I', '1', '''''', 0, 0),
('6', 'ANALISTA DE PERSONAL III', '21', '''''', 0, 0),
('60', 'DIRECTOR', '99', '''''', 0, 0),
('61', 'DISENADOR GRAFICO', '', '''''', 0, 0),
('62', 'DOCENTE MUSICA 33.33h', '0', '''''', 0, 0),
('63', 'DOCENTE I  PESC 33,33h', '0', '''''', 0, 0),
('64', 'DOCENTE I  PEsc 33,33h TAP', '0', '''''', 0, 0),
('65', 'DOCENTE I Ed. Fisica 24h', '0', '''''', 0, 0),
('66', 'DOCENTE II  5to 33.33h', '0', '''''', 0, 0),
('67', 'DOCENTE II 3er 33,33h', '0', '''''', 0, 0),
('68', 'DOCENTE II Comp. 33,33h', '0', '''''', 0, 0),
('69', 'DOCENTE III 4to 33,33h', '0', '''''', 0, 0),
('7', 'ARCHIVISTA I', '1', '''''', 0, 0),
('70', 'DOCENTE III AulaEsp  33.33h', '0', '''''', 0, 0),
('71', 'DOCENTE III Club Abuelo 24h', '0', '''''', 0, 0),
('72', 'DOCENTE IV  1er 33.33h', '0', '''''', 0, 0),
('73', 'DOCENTE IV (33,33 HRS)', '0', '''''', 0, 0),
('74', 'DOCENTE IV 2do 33.33h', '0', '''''', 0, 0),
('75', 'DOCENTE NG Ingles 18h', '0', '''''', 0, 0),
('76', 'DOCENTE V Coordinador 36h', '0', '''''', 0, 0),
('77', 'DOCENTE V Director 36h TAP', '0', '''''', 0, 0),
('78', 'DOCENTE VI 6to 33,33h', '0', '''''', 0, 0),
('79', 'ENFERMERA AUXILIAR', '', '''''', 0, 0),
('8', 'ARCHIVISTA III', '5', '''''', 0, 0),
('80', 'ENFERMERA AUXILIAR (Gua-Noct)', '', '''''', 0, 0),
('81', 'ENFERMERA GRAD. (Gua-Noct)', '0', '''''', 0, 0),
('82', 'ENFERMERA GRADUADA', '', '''''', 0, 0),
('83', 'ENFERMERO AUXILIAR (Gua-Noct)', '0', '''''', 0, 0),
('84', 'ENFERMERO GRAD. (Gua-Noct)', '0', '''''', 0, 0),
('85', 'ENTRENADOR DEPORTIVO I', '1', '''''', 0, 0),
('86', 'ENTRENADOR DEPORTIVO II', '2', '''''', 0, 0),
('87', 'ENTRENADOR DEPORTIVO III', '15', '''''', 0, 0),
('88', 'FISCAL AUDITOR', '99', '''''', 0, 0),
('89', 'FISCAL DE RENTAS', '99', '''''', 0, 0),
('9', 'ARQUITECTO  I', '18', '''''', 0, 0),
('90', 'HIGIENISTA DENTAL II', '4', '''''', 0, 0),
('91', 'INSP. AUX. DE OBRAS ING.', '2', '''''', 0, 0),
('92', 'INSP. DE OBRAS ING. I', '15', '''''', 0, 0),
('93', 'INSPECTOR DE SERV.PUBLICOS', '0', '''''', 0, 0),
('94', 'JEFE DE DIVISION', '99', '''''', 0, 0),
('95', 'JEFE DE OFICINA', '99', '''''', 0, 0),
('96', 'JEFE TRANSP. AUTO. III', '17', '''''', 0, 0),
('97', 'JUBILADA', '0', '''''', 0, 0),
('98', 'JUBILADO', '0', '''''', 0, 0),
('99', 'LIQUIDADOR I', '15', '''''', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nomcargos_vacantes`
--

CREATE TABLE IF NOT EXISTS `nomcargos_vacantes` (
  `id` int(11) NOT NULL auto_increment,
  `codcargo` varchar(6) collate utf8_spanish_ci NOT NULL,
  `sueldo` float(13,2) NOT NULL,
  `nivel` varchar(8) collate utf8_spanish_ci NOT NULL,
  `cantidad` int(3) default NULL,
  `tipnom` int(2) NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nomcargos_vacantes`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomcategorias`
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
-- Dumping data for table `nomcategorias`
--

INSERT INTO `nomcategorias` (`codorg`, `descrip`, `gr`, `ee`, `ocupacion`) VALUES
(1, 'OBREROS', '', 0, ''),
(2, 'ADMINISTRATIVOS', '', 0, ''),
(3, 'TECNICOS', '', 0, ''),
(4, 'PROFESIONALES', '', 0, ''),
(5, 'NO CLASIFICADOS', '', 0, ''),
(6, 'TECNICOS / PROFESIONALES', '', 0, ''),
(7, 'DIRECTIVO', '', 0, ''),
(8, 'DOCENTES', '', 0, ''),
(9, 'MEDICOS', '', 0, ''),
(10, 'PERSONAL GENERAL', '', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `nomconceptos`
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
-- Dumping data for table `nomconceptos`
--

INSERT INTO `nomconceptos` (`codcon`, `descrip`, `tipcon`, `unidad`, `ctacon`, `contractual`, `impdet`, `proratea`, `usaalter`, `descalter`, `formula`, `modifdef`, `markar`, `tercero`, `ccosto`, `codccosto`, `debcre`, `bonificable`, `htiempo`, `valdefecto`, `con_cu_cc`, `con_mcun_cc`, `con_mcuc_cc`, `con_cu_mccn`, `con_cu_mccc`, `con_mcun_mccn`, `con_mcuc_mccc`, `con_mcun_mccc`, `con_mcuc_mccn`, `nivelescuenta`, `nivelesccosto`, `semodifica`, `verref`, `vermonto`, `particular`, `montocero`, `ee`, `fmodif`, `aplicaexcel`, `descripexcel`, `ctacon1`) VALUES
(499, '********** ASIGNACIONES EMPLEADOS FIJOS **********', 'A', '', '1.', '', 'N', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '1.'),
(500, 'SUELDO QUINCENAL EMPLEADOS FIJOS', 'A', 'D', '101.', '1', 'S', 1, '0', '', '$MONTO=$REF;\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(501, 'PRIMA POR ANTIGUEDAD', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=$REF;\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.03.09.00'),
(502, 'PRIMA POR JERARQUIA EMPLEADOS FIJOS', 'A', 'M', '101.', '1', 'S', 1, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 1, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.03.10.00'),
(503, 'PRIMA POR PROFESIONALIZACION EMPLEADOS FIJOS', 'A', 'M', '101.', '1', 'S', 1, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 1, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.03.08.00'),
(504, 'PRIMA POR TRANSPORTE EMPLEADOS FIJOS', 'A', 'D', '101.', '1', 'S', 1, '0', '', '$REF=CAMPOADICIONALPER(34);\r\n$MONTO=((CAMPOADICIONALPER(10)/30)*$REF);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.03.02.00'),
(505, 'PRIMA POR HIJOS EMPLEADOS FIJOS', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$REF=CAMPOADICIONALPER(9);\r\n$T01=CAMPOADICIONALPER(34);\r\n$MONTO=((((53.21)/30)*$T01)*$REF);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.03.04.00'),
(506, 'PRIMA POR EVALUACION EMPLEADOS FIJOS', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$REF=CAMPOADICIONALPER(34);\r\n$MONTO=((CAMPOADICIONALPER(16)/30)*$REF);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.03.01.00'),
(507, 'COMPENSACION DE SUELDO ', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=CAMPOADICIONALPER(7)/2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.02.01.00'),
(508, 'HORAS EXTRAS DIURNAS EMPLEADOS FIJOS', 'A', 'H', '1.', '', 'S', 0, '0', '', '$T01=$SUELDO+CAMPOADICIONALPER(13)+CAMPOADICIONALPER(14);\r\n$T02=$T01/30/8;\r\n$MONTO=$T02*$REF*1.55;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.04.01.00'),
(509, 'HORAS EXTRAS NOCTURNAS EMPLEADOS FIJOS', 'A', 'H', '1.', '', 'S', 0, '0', '', '$T01=$SUELDO+CAMPOADICIONALPER(13)+CAMPOADICIONALPER(14);\r\n$T02=$T01/30/7;\r\n$MONTO=$T02*$REF*1.80;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.04.02.00'),
(510, 'PRIMA POR ADIESTRAMIENTO EMPLEADOS FIJOS', 'A', 'D', '101.', '1', 'S', 0, '0', '', '$REF=CAMPOADICIONALPER(34);\r\n$MONTO=((CAMPOADICIONALPER(17)/30)*$REF);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.03.01.00'),
(511, 'PRIMA POR NIVELACION EMPLEADOS FIJOS', 'A', 'D', '101.', '1', 'S', 0, '0', '', '$REF=CAMPOADICIONALPER(34);\r\n$MONTO=(((CAMPOADICIONALPER(20)+CAMPOADICIONALPER(21))/30)*$REF);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.03.97.00'),
(512, 'DOMINGO ADICIONAL EMPLEADOS', 'A', 'D', '1.', '', 'S', 0, '0', '', '$T01=($SUELDO+CAMPOADICIONALPER(13)+CAMPOADICIONALPER(14))/30;\r\n$MONTO=$T01*$REF;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.04.01.00'),
(513, 'REINTEGRO DE SALARIO', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(514, 'COMPLEMENTOS EMPLEADOS', 'A', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(515, 'GUARDIAS SABADO 7AM-7PM (12HRS) EMPLEADOS FIJOS', 'A', 'D', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.02.00'),
(516, 'GUARDIAS DOMINGO Y FERIADO 7AM-7PM (12HRS) EMPLEADOS FIJOS', 'A', 'D', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;\r\n\r\n\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.02.00'),
(517, 'GUARD LUNES-VIERNES 7 PM-7AM(12HRS) EMPLEADOS FIJOS', 'A', 'D', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;\r\n\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.02.00'),
(518, 'GUARDIAS FERIADO NOCTURNAS EMPLEADOS FIJOS', 'A', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;\r\n\r\n\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.02.00'),
(519, 'AJUSTE DE SALARIO', 'A', 'D', '101.', '', 'S', 0, '0', '', '$T01=($SUELDO+CAMPOADICIONALPER(7))/30;\r\n$MONTO=$T01*$REF;', 1, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.96.01.00'),
(520, 'GUARDIAS SABADO 7AM-7AM (24HRS) EMPLEADOS FIJOS', 'A', 'D', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;\r\n\r\n', 1, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.02.00'),
(521, 'GUARDIAS DOMINGO Y FERIADO 7AM-7AM (24HRS) EMPLEADOS FIJOS', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.02.00'),
(522, 'REPARO', 'A', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.04.07.00'),
(523, 'Bono Escolar contratados', 'A', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.07.09.00'),
(524, 'PRIMA POR ANTIGUEDAD VACACIONES', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$T01=QUINQUENIO_VACACIONES($FICHA,$FECHAINGRESO,$FECHAFINNOM);\r\n$T02=SI("$T01==1",5,0); \r\n$T02=SI("$T01==2",10,$T02);\r\n$T02=SI("$T01==3",15,$T02);\r\n$T02=SI("$T01==4",20,$T02); \r\n$T02=($SALARIOMIN*($T02/100))/2;\r\n$MONTO=SI("$CODCARGO==2",0,$T02);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(525, 'BONO DE PROFESIONALIZACION EMPLEADOS FIJOS (DIAS)', 'A', '', '101.', '1', 'S', 1, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 1, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.03.08.00'),
(526, 'PRIMA POR ANTIGUEDAD (ESPECIAL)', 'A', 'M', '101.', '', 'S', 1, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(527, 'CESTA TICKET EMP. FIJOS', 'A', 'H', '101.', '1', 'S', 0, '0', '', '$T01=$CODCATEGORIA;\r\n$REF=CAMPOADICIONALPER(39);\r\n$T02=SI("($T01==8)&&($REF<''133.32'')",(($REF*600)/133.32),600);\r\n$T02=SI("($T01==9)&&($REF<''120'')",(($REF*600)/120),600);\r\n$T02=SI("($T01==10)&&($REF<''140'')",(($REF*600)/140),600);\r\n$MONTO=$T02;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(999, '********** ASIGNACIONES EMPLEADOS CONTRATADOS **********', 'A', 'M', '1.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '1.'),
(1000, 'SUELDO QUINCENAL CONTRATADOS', 'A', 'M', '101.', '1', 'S', 1, '0', '', '$REF=CAMPOADICIONALPER(34);\r\n$MONTO=(($SUELDO/30)*$REF);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1001, 'PRIMA PROFESIONAL CONTRATADOS', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=CAMPOADICIONALPER(15)/2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1003, 'PRIMA POR JERARQUIA CONTRATADOS', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=CAMPOADICIONALPER(8)/2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1004, 'PRIMA POR RAZONES DE SERVICIOS CONTRATADOS', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=CAMPOADICIONALPER(13)/2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1005, 'TRANSPORTE FIJO POR CARGO CONTRATADOS', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=CAMPOADICIONALPER(25)/2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1006, 'HORAS EXTRAS DIURNAS CONTRATADOS', 'A', 'H', '1.', '', 'S', 0, '0', '', '$T01=$SUELDO;\r\n$T02=$T01/30/8;\r\n$MONTO=$T02*$REF*1.5;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.04.24.00'),
(1007, 'HORAS EXTRAS NOCTURNAS CONTRATADOS', 'A', 'H', '1.', '', 'S', 0, '0', '', '$T01=$SUELDO;\r\n$T02=$T01/30/7;\r\n$MONTO=$T02*$REF*1.80;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.04.24.00'),
(1008, 'BONO NOCTURNO CONTRATADOS', 'A', 'D', '1.', '', 'S', 0, '0', '', '$T01=$SUELDO;\r\n$T02=$T01/30/8;\r\n$MONTO=$T02*$REF*0.30;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.04.24.00'),
(1009, 'FERIADO CONTRATADOS', 'A', 'D', '1.', '', 'S', 0, '0', '', '$T01=$SUELDO;\r\n$T02=$T01/30;\r\n$MONTO=$T02*$REF*1.50;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.04.24.00'),
(1010, 'DIA ADICIONAL CONTRATADOS', 'A', 'D', '1.', '', 'S', 0, '0', '', '$T01=($SUELDO+CONCEPTO(503)+CONCEPTO(507))/30;\r\n$MONTO=$T01*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.04.24.00'),
(1011, 'COMPENSACION DE SUELDO CONTRATADOS', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=CAMPOADICIONALPER(7)/2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.02.01.00'),
(1012, 'REINTEGRO DE SALARIO CONTRATADOS			', 'A', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=(($SUELDO)/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(1013, 'AJUSTE DE SALARIO', 'A', 'M', '1.', '', 'S', 0, '0', '', '$T01=($SUELDO)/30;\r\n$MONTO=$T01*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1014, 'GUARDIAS SABADOS 7AM-7PM (12HRS) EMPLEADOS CONTRATADOS', 'A', 'D', '101.', '1', 'S', 0, '0', '', '$MONTO=((($SUELDO/30)/6)*12)*$REF;\r\n\r\n\r\n//$MONTO=CAMPOADICIONALPER(23)*$REF;\r\n\r\n\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1015, 'GUARDIAS DOMIN-FERIAD 7AM-7PM (12HRS) EMPLEADOS CONTRATADOS', 'A', 'D', '101.', '1', 'S', 0, '0', '', '$MONTO=(((($SUELDO/30)/6)*12)*2)*$REF;\r\n\r\n//$MONTO=CAMPOADICIONALPER(24)*$REF;\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1016, 'GUARDIAS LUNES-VIERNES 7PM-7AM (12HRS) EMPLEADOS CONTRATADOS', 'A', 'D', '101.', '1', 'S', 0, '0', '', '$MONTO=((((($SUELDO/30)/6)*12)*(35/100))+((($SUELDO/30)/6)*12))*$REF;\r\n\r\n\r\n\r\n//$MONTO=((((($SUELDO/30)/6)*12)*(35/100))+((($SUELDO/30)/6)*12))*$REF;\r\n\r\n\r\n//$MONTO=CAMPOADICIONALPER(25)*$REF;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1017, 'GUARDIAS DOMING-FERIAD 7PM-7AM (12HRS) EMPLEA CONTRATADOS', 'A', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=(((((($SUELDO/30)/6)*12)*(35/100))+((($SUELDO/30)/6)*12))*2)*$REF;\r\n\r\n\r\n//$MONTO=CAMPOADICIONALPER(26)*$REF;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1018, 'GUARDIAS SABADO 7AM-7AM (24HRS) EMPLEADOS CONTRATADOS', 'A', 'D', '101.', '', 'S', 0, '0', '', '$MONTO=(((($SUELDO/30)/6)*12)+(((($SUELDO/30)/6)*12)*(35/100))+((($SUELDO/30)/6)*12))*$REF;\r\n\r\n\r\n//$MONTO=CAMPOADICIONALPER(27)*$REF;', 1, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1019, 'GUARDIAS DOMINGOS 7AM-7AM (24HRS) EMPLEADOS CONTRATADOS', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=((((($SUELDO/30)/6)*12)+(((($SUELDO/30)/6)*12)*(35/100))+((($SUELDO/30)/6)*12))*2)*$REF;\r\n\r\n//$MONTO=CAMPOADICIONALPER(28)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1020, 'SALARIO SUPLENCIAS', 'A', 'M', '101.', '', 'S', 1, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 1, 0, 0, 0, '', '4.01.01.03.00'),
(1021, 'CESTA TICKET EMP. CONTRATADOS', 'A', 'H', '101.', '1', 'S', 0, '0', '', '$T01=$CODCATEGORIA;\r\n$REF=CAMPOADICIONALPER(39);\r\n$T02=SI("($T01==8)&&($REF<''133.32'')",(($REF*600)/133.32),600);\r\n$T02=SI("($T01==9)&&($REF<''120'')",(($REF*600)/120),600);\r\n$T02=SI("($T01==10)&&($REF<''140'')",(($REF*600)/140),600);\r\n$MONTO=$T02;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(1099, '********** ASIGNACIONES JUBILADOS **********', 'A', '', '1.', '', 'N', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '1.'),
(1100, 'JUBILACION QUINCENAL ', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$REF=CAMPOADICIONALPER(34);\r\n$MONTO=(($SUELDO/30)*$REF);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.07.01.01.02'),
(1199, '**********ASIGNACIONES PENSIONADOS***********', 'A', '', '101.', '', 'N', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(1200, 'PENSION QUINCENAL', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$REF=CAMPOADICIONALPER(34);\r\n$MONTO=(($SUELDO/30)*$REF);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.07.01.01.01'),
(1299, '*********** ASIGNACIONES JUNTA PARROQUIAL***********', 'A', '', '101.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(1300, 'SESIONES', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$REF=CAMPOADICIONALPER(32)/2;\r\n$MONTO=($REF*2541.43);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.29.00'),
(1301, 'COMISIONES', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$REF=CAMPOADICIONALPER(33)/2;\r\n$MONTO=($REF*317.68);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.29.00'),
(1302, 'SESIONES PARA DIF SUELDO', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.29.00'),
(1303, 'COMISIONES PARA DIF SUELDO', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.29.00'),
(1400, '*********** VACACIONES *********************', 'A', '', '1.', '', 'N', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '1.'),
(1401, 'BONO VACACIONAL EJECUTIVOS', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 1, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.05.03.00'),
(1402, 'BONO VACACIONAL EMPLEADOS FIJOS', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$REF=BONOVACDIAS($CEDULA,$FECHANOMINA);\r\n$T01=VACVENC($CEDULA,$FECHANOMINA,$FECHAFINNOM);\r\n$MONTO=SI("$T01==''SI''",BONOVAC($CEDULA,$FECHANOMINA)+CAMPOADICIONALPER(35),0);', 1, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.05.03.00'),
(1403, 'BONO VACACIONAL OBREROS FIJOS', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF ;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.05.06.00'),
(1404, 'BONO VACACIONAL CONTRATADOS', 'A', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;\r\n//$T01=VACVENC($CEDULA,$FECHANOMINA,$FECHAFINNOM);\r\n//$MONTO=SI("$T01==''SI''",BONOVAC($CEDULA,$FECHANOMINA),0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.05.08.00'),
(1430, 'MONTO POR VACACIONES EJECUTIVOS', 'A', 'D', '1.', '1', 'S', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(1431, 'MONTO POR VACACIONES EMPLEADOS FIJOS', 'A', 'D', '1.', '1', 'S', 0, '0', '', '$T01=SI("CAMPOADICIONALPER(35)==''1''",$SUELDO,0);\r\n$T02=SI("CAMPOADICIONALPER(35)==''2''",($SUELDO*2),$T01);\r\n$MONTO=SI("CAMPOADICIONALPER(35)==''0''",0,$T02);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(1432, 'MONTO POR VACACIONES OBREROS FIJOS', 'A', 'D', '1.', '1', 'S', 0, '0', '', '$MONTO=SI("CAMPOADICIONALPER(35)==''SI''",($SUELDO*4),0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.10.00'),
(1433, 'MONTO POR VACACIONES CONTRATADOS', 'A', 'D', '1.', '1', 'S', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1450, 'PRS VACACIONES EJECUTIVOS ', 'A', 'M', '1.', '1', 'S', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.03.01.00'),
(1451, 'PRS VACACIONES EMPLEADOS FIJOS', 'A', 'M', '1.', '', 'S', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.03.01.00'),
(1452, 'PRS VACACIONES OBREROS FIJOS', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.03.16.00'),
(1460, 'DIFERENCIA BONO VAC. AÃ‘OS ANT. OBREROS', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(1461, 'BONO POST VACACIONAL ', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=SI("CAMPOADICIONALPER(10)==''SI''",150,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.05.03.00'),
(1462, 'BONO VACACIONAL VENCIDO', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.05.03.00'),
(1463, 'DIAS HABILES EMP FIJOS', 'A', 'D', '101.', '1', 'S', 0, '0', '', '$REF=DIASHABILESVAC($CEDULA,$FECHANOMINA);\r\n$T01=CAMPOADICIONALPER(6);\r\n$T02=CAMPOADICIONALPER(7);\r\n$T03=(($SUELDO+$T01+$T02)/30)*$REF;\r\n$MONTO=SI("CAMPOADICIONALPER(15)==''SI''",$T03,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(1464, 'SABADOS DOMINGOS Y FERIADOS EMP FIJOS', 'A', 'D', '101.', '1', 'S', 0, '0', '', '$REF=DIASNOHABILES($CEDULA,$FECHANOMINA);\r\n$T01=(($SUELDO+CAMPOADICIONALPER(6)+CAMPOADICIONALPER(7))/30)*$REF;\r\n$MONTO=SI("CAMPOADICIONALPER(15)==''SI''",$T01,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(1465, 'DIAS HABILES CONTRATADOS', 'A', 'D', '1.', '1', 'S', 0, '0', '', '$REF=DIASHABILESVAC($CEDULA,$FECHANOMINA);\r\n$T01=CAMPOADICIONALPER(6);\r\n$T02=CAMPOADICIONALPER(7);\r\n$T03=(($SUELDO+$T01+$T02)/30)*$REF;\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T03,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(1466, 'SABADOS DOMINGOS Y FERIADOS CONTRATADOS', 'A', 'D', '1.', '1', 'S', 0, '0', '', '$REF=DIASNOHABILES($CEDULA,$FECHANOMINA);\r\n$T01=(($SUELDO+CAMPOADICIONALPER(6)+CAMPOADICIONALPER(7))/30)*$REF;\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T01,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(1469, 'DIFERENCIA DE SUELDO PERSN CONTRATADO', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 1, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(1470, 'DIFERENCIA DE SUELDO PERSN FIJO', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 1, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(1519, 'AJUSTE POR COMPENSACION', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.02.01.00'),
(2000, '**************DEDUCCIONES**************', 'D', '', '1.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '1.'),
(2001, 'SEGURO SOCIAL OBLIGATORIO EMPLEADOS', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$T01=$SUELDO+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(8)+CAMPOADICIONALPER(10)+CAMPOADICIONALPER(15)+CAMPOADICIONALPER(16)+CAMPOADICIONALPER(17)+CAMPOADICIONALPER(20)+CAMPOADICIONALPER(21)+CAMPOADICIONALPER(22)+((CONCEPTO(505)+CONCEPTO(501)+CONCEPTO(526))*2);\r\n$T02=SI("$T01>=($SALARIOMIN*5)",($SALARIOMIN*5),$T01);\r\n$T03=$LUNES;\r\nMENSAJECON($T03);\r\n$T04=(($T02*12)/52)*(4/100)*$T03;\r\n$T05=SI("CAMPOADICIONALPER(34)==15",$T04,$REF);\r\n$MONTO=SI("CAMPOADICIONALPER(1)==''SI''",$T05/2+CAMPOADICIONALPER(37),0);\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.01.00'),
(2002, 'REGIMEN PRESTACIONAL DE EMPLEO', 'D', 'P', '101.', '1', 'S', 1, '0', '', '$T01=$SUELDO+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(8)+CAMPOADICIONALPER(10)+CAMPOADICIONALPER(15)+CAMPOADICIONALPER(16)+CAMPOADICIONALPER(17)+CAMPOADICIONALPER(20)+CAMPOADICIONALPER(21)+CAMPOADICIONALPER(22)+((CONCEPTO(505)+CONCEPTO(501)+CONCEPTO(526))*2);\r\n$T02=SI("$T01>=($SALARIOMIN*5)",($SALARIOMIN*5),$T01);\r\n$T03=$LUNES;\r\n$T04=(($T02*12)/52)*(0.50/100)*$T03;\r\n$T05=SI("CAMPOADICIONALPER(34)==15",$T04,$REF);\r\n$MONTO=SI("CAMPOADICIONALPER(2)==''SI''",$T05/2+CAMPOADICIONALPER(38),0);\r\n', 0, 0, 0, 0, 0, '', 1, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.06.04.00'),
(2003, 'REG. PREST. DE VIV. Y HAB. EMPLEADOS', 'D', 'P', '101.', '1', 'S', 1, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 1, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.05.00'),
(2004, 'FONDO DE PENSION Y JUBILACION EMPLEADOS', 'D', 'P', '101.', '1', 'S', 1, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.03.00'),
(2005, 'CAJA DE AHORRO', 'D', 'P', '101.', '1', 'S', 1, '0', '', '$MONTO=$REF;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.07.07.00'),
(2007, 'PRESTAMO CAJA DE AHORRO', 'D', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=$REF;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.07.07.00'),
(2008, 'INASISTENCIA (DIA)', 'D', 'D', '1.', '', 'S', 0, '0', '', '$MONTO=(($SUELDO+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6))/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2009, 'DESCUENTO DE VIVIENDA', 'D', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=CAMPOADICIONALPER(22)/2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2010, 'SEGURO HOSPITALIZACION EMPLEADOS', 'D', 'M', '', '1', 'S', 0, '0', '', '$T01=CAMPOADICIONALPER(9)/2;\r\n$T02=SI("CAMPOADICIONALPER(35)==''1''",($T01*3),$T01);\r\n$T02=SI("CAMPOADICIONALPER(35)==''2''",($T01*5),$T02);\r\n$MONTO=SI("CAMPOADICIONALPER(35)==''0''",$T01,$T02);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2011, 'PERMISO NO REMUNERADO EMPLEADOS ', 'D', 'D', '1.', '', 'S', 0, '0', '', '$MONTO=(($SUELDO+CAMPOADICIONALPER(14)+CAMPOADICIONALPER(13))/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2012, 'I.N.A.V.I.', 'D', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=CAMPOADICIONALPER(11)/2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2013, 'RETARDO MINUTOS EMPLEADOS', 'D', 'P', '1.', '', 'S', 0, '0', '', '$T01=($SUELDO+CAMPOADICIONALPER(13)+CAMPOADICIONALPER(14))/30;\r\n$T03=$T01/8/60;\r\n$MONTO=$T03*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2014, 'DEDUCCION DE ANTICIPO EMPLEADOS', 'D', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2015, 'DEDUCCION ISRL', 'D', 'P', '1.', '1', 'S', 0, '0', '', '$REF=CAMPOADICIONALPER(5);\r\n$MONTO=(($SUELDO+CAMPOADICIONALPER(6)+CAMPOADICIONALPER(7))/2)*($REF/100);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2016, 'S.S.O VACACIONES', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=4;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+(CONCEPTO(501)*2);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAVAC,$FECHAREIVAC);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==''SI''",$T03,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2017, 'R.P.E. VACACIONES', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=0.50;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+(CONCEPTO(501)*2);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAVAC,$FECHAREIVAC);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==''SI''",$T03,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2018, 'R.P.V.H. VACACIONES', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=1;\r\n$T01=CONCEPTO(1463)+CONCEPTO(1464);\r\n$T02=$T01*($REF/100);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==''SI''",$T02,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2019, 'F.P.J. VACACIONES', 'D', 'P', '', '1', 'S', 1, '0', '', '$REF=3;\r\n$T01=($SUELDO/2+(CAMPOADICIONALPER(6)/2)+(CAMPOADICIONALPER(5)/2)+(CAMPOADICIONALPER(13)/2)+(CAMPOADICIONALPER(25)/2)+(CAMPOADICIONALPER(14)/2)+CONCEPTO(543))*($REF/100);\r\n$T02=SI("CAMPOADICIONALPER(35)==1",($T01*3),$T01);\r\n$T02=SI("CAMPOADICIONALPER(35)==2",($T01*5),$T02);\r\n$T02=SI("CAMPOADICIONALPER(35)==0",$T01,$T02);\r\n$MONTO=SI("CAMPOADICIONALPER(4)==SI",$T02,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2020, 'DESCUENTO POR TELEFONO', 'D', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2021, 'DESCUENTO POR VACACIONES', 'D', 'M', '', '', 'S', 0, '0', '', '$MONTO=(($SUELDO+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6))/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2022, 'CAJA DE AHORRO VACACIONES', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=10;\r\n$T01=CONCEPTO(1463)+CONCEPTO(1464);\r\n$T02=SI("CAMPOADICIONALPER(14)==''SI''",($T01*($REF/100)),0);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==''SI''",$T02,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2023, 'PRESTAMO CAJA DE AHORRO VACACIONES', 'D', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=SI("CAMPOADICIONALPER(15)==''SI''",CAMPOADICIONALPER(16),0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2024, 'DIFERENCIA EN DEDUCCION S.S.O. EMPLEADOS', 'D', 'M', '1.', '1', 'S', 0, '0', '', '$T01=SI("$SUELDO>=($SALARIOMIN*10)",($SALARIOMIN*10),$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(6)+CAMPOADICIONALPER(7);\r\n$T03=SI("CAMPOADICIONALPER(15)==''SI''",LUNESPERVAC($FECHANOMINA,$FECHAVAC),$LUNESPER);\r\n$T04=(($T02*12)/52)*($4/100)*$T03;\r\n$T05=$T04/30;\r\n$MONTO=$T01*$REF;', 0, 0, 0, 0, 0, '', 1, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2025, 'S.S.O VACACIONES (RETORNO)', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=4;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+(CONCEPTO(501)*2);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAREIVAC,$FECHAFINNOM);\r\n$T04=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T05=SI("$T04==''SI''",$T03,0);\r\n$MONTO=SI("CAMPOADICIONALPER(1)==''SI''",$T05,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2026, 'R.P.E. VACACIONES (RETORNO)', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=0.50;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+(CONCEPTO(501)*2);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAREIVAC,$FECHAFINNOM);\r\n$T04=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T05=SI("$T04==''SI''",$T03,0);\r\n$MONTO=SI("CAMPOADICIONALPER(2)==''SI''",$T05,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2027, 'R.P.V.H. VACACIONES (RETORNO)', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=1;\r\n$T01=CONCEPTO(515)+CONCEPTO(516);\r\n$T02=$T01*($REF/100);\r\n$T03=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T04=SI("$T03==''SI''",$T02,0);\r\n$MONTO=SI("CAMPOADICIONALPER(3)==''SI''",$T04,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2028, 'CAJA DE AHORRO VACACIONES (RETORNO)', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=10;\r\n$T01=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T02=SI("$T01==''SI''",((CONCEPTO(515)+CONCEPTO(516))*($REF/100)),0);\r\n$MONTO=SI("CAMPOADICIONALPER(14)==''SI''",$T02,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2029, 'DEDUCCION ISRL VACACIONES (RETORNO)', 'D', 'P', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2031, 'SEGURO SOCIAL OBLIGATORIO POR AJUSTE DE SALARIO', 'D', 'D', '101.', '', 'S', 0, '0', '', '$T01=(($SUELDO+CAMPOADICIONALPER(7))*12)+CONCEPTO(1519);\r\n$T02=$T01/52;\r\n$T03=$T02*0.04;\r\n$MONTO=$T03*$REF;\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2032, 'REGIMEN PRESTACIONAL DE EMPLEO POR AJUSTE DE SALARIO ', 'D', 'D', '101.', '', 'S', 0, '0', '', '$T01=(($SUELDO+CAMPOADICIONALPER(7))*12);\r\n$T02=$T01/52;\r\n$T03=$T02*0.005;\r\n$MONTO=$T03*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2033, 'REG. PREST. DE VIV. Y HAB. EMPLEADOS POR AJUSTE DE SALARIO ', 'D', 'D', '101.', '', 'S', 0, '0', '', '$T01=CONCEPTO(519)+CONCEPTO(1519);\r\n$MONTO=$T01*($REF/100);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2041, 'SEGURO SOCIAL OBLIGATORIO POR COMPLEM. COMISION DE SERV.', 'D', '', '1.', '', 'S', 0, '0', '', '$REF=4;\r\n$T01=SI("$SUELDO>=($SALARIOMIN*5)",($SALARIOMIN*5),$SUELDO);\r\n$T02=CAMPOADICIONALPER(21);\r\n$T03=$LUNES/2;\r\n$T04=((($T02*12)/52)*($REF/100)*$T03);\r\n$MONTO=SI("CAMPOADICIONALPER(1)==''SI''",$T04,0);;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2042, 'REGIMEN PRESTACIONAL DE EMPLEO COMPLEM COMISION SERV.', 'D', 'P', '101.', '', 'S', 0, '0', '', '$REF=0.50;\r\n$T01=SI("$SUELDO>=($SALARIOMIN*20)",($SALARIOMIN*20),$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(6)+CAMPOADICIONALPER(21)+CAMPOADICIONALPER(7);\r\n$T03=$LUNES/2;\r\n$T04=(($T02*12)/52)*($REF/100)*$T03;\r\n$MONTO=SI("CAMPOADICIONALPER(1)==''SI''",$T04,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2043, 'REG. PREST. DE VIV. Y HAB. EMPLEADOS  COMPLEM COMISION SERV.', 'D', 'P', '101.', '', 'S', 0, '0', '', '$REF=1;\r\n$T01=CONCEPTO(521);\r\n$T02=$T01*($REF/100);\r\n$MONTO=SI("CAMPOADICIONALPER(3)==''SI''",$T02,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2051, 'SEGURO SOCIAL OBLIGATORIO POR AJUSTE COMPLE SERV.', 'D', 'D', '1.', '1', 'S', 0, '0', '', '$T01=CAMPOADICIONALPER(21);\r\n$T02=$T01*12;\r\n$T03=$T02/52;\r\n$T04=$T03*0.04;\r\n$MONTO=$T04*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2052, 'REGIMEN PRESTACIONAL DE EMPLEO POR AJUSTE  COMPLEM. SERV.', 'D', 'D', '101.', '1', 'S', 0, '0', '', '$T01=CAMPOADICIONALPER(21)*12;\r\n$T02=$T01/52;\r\n$T03=$T02*0.005;\r\n$MONTO=$T03*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2053, 'REG. PREST. DE VIV. Y HAB. EMPLEADOS AJUSTE COMPLEM. SERV.', 'D', 'D', '101.', '1', 'S', 0, '0', '', '$T01=CONCEPTO(520);\r\n$MONTO=$T01*($REF/100);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2100, 'DESCUENTO POR NOMBRAMIENTO', 'D', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2101, 'TRIBUNAL', 'D', 'M', '101.', '1', 'S', 0, '0', '', '$MONTO=SI("CAMPOADICIONALPER(31)==SI",100,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2102, 'MUTUO AUXILIO', 'D', 'M', '101.', '', 'S', 0, '0', '', '$REF=65;\r\n$MONTO=SI("CAMPOADICIONALPER(14)==''SI''",($REF)*(0.1),0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2103, 'REG. PREST. DE VIV. Y HAB. EMPLEADOS (DIAS)', 'D', '', '101.', '1', 'S', 1, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 1, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.05.00'),
(2200, ' 	 ****************DEDUCCIONES JUBILADOS**************** ', 'D', '', '1.', '', 'N', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(2400, ' 	 ****************DEDUCCIONES CONTRATADOS**************** ', 'D', '', '1.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(2401, 'SEGURO SOCIAL OBLIGATORIO CONTRATADOS', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$T01=$SUELDO+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(8)+CAMPOADICIONALPER(10)+CAMPOADICIONALPER(15);\r\n$T02=SI("$T01>=($SALARIOMIN*5)",($SALARIOMIN*5),$T01);\r\n$T03=2;\r\n$T04=(($T02*12)/52)*(4/100)*$T03;\r\n$T05=SI("CAMPOADICIONALPER(34)==15",$T04,$REF);\r\n$MONTO=SI("CAMPOADICIONALPER(1)==''SI''",$T05+CAMPOADICIONALPER(37),0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2402, 'REGIMEN PRESTACIONAL DE EMP. CONT.', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$T01=$SUELDO+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(8)+CAMPOADICIONALPER(10)+CAMPOADICIONALPER(15);\r\n$T02=SI("$T01>=($SALARIOMIN*5)",($SALARIOMIN*5),$T01);\r\n$T03=$LUNES/2;\r\n$T04=(($T02*12)/52)*(0.50/100)*$T03;\r\n$T05=SI("CAMPOADICIONALPER(34)==15",$T04,$REF);\r\n$MONTO=SI("CAMPOADICIONALPER(2)==''SI''",$T05+CAMPOADICIONALPER(38),0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2403, 'REG. PREST. DE VIVIENDA Y HAB. CONT.', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=1;\r\n$T02=(($SUELDO+CAMPOADICIONALPER(6)+CAMPOADICIONALPER(7))*($REF/100))/2;\r\n$MONTO=SI("CAMPOADICIONALPER(3)==''SI''",$T02,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2404, 'INASISTENCIA (DIA)', 'D', 'D', '1.', '', 'S', 0, '0', '', '$MONTO=(($SUELDO/30)+(CAMPOADICIONALPER(7)/30)+(CAMPOADICIONALPER(6)/30))*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2405, 'RETARDO MINUTOS CONTRATADOS', 'D', 'P', '1.', '', 'S', 0, '0', '', '$T01=($SUELDO/30);\r\n$T03=$T01/8/60;\r\n$MONTO=$T03*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2406, 'PENSION ALIMENTARIA CONTRADOS', 'D', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=CAMPOADICIONALPER(12)/2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2407, 'DESCUENTO ANTICIPO DE SALARIO', 'D', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2408, 'CAJA DE AHORRO', 'D', 'P', '1.', '1', 'S', 1, '0', '', '$REF=10;\r\n$T01=CONCEPTO(1000);\r\n$MONTO=SI("CAMPOADICIONALPER(14)==SI",($T01*($REF/100)),0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2409, 'PRESTAMO CAJA DE AHORRO', 'D', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=CUOTAPRE($FICHA,$FECHANOMINA,$FECHAFINNOM);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2410, 'S.S.O VACACIONES', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=4;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAVAC,$FECHAREIVAC);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T03,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2411, 'R.P.E. VACACIONES', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=0.50;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAVAC,$FECHAREIVAC);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T03,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2412, 'R.P.V.H. VACACIONES', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=1;\r\n$T01=$SUELDO+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6);\r\n$T02=$T01*($REF/100);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T02,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2413, 'CAJA DE AHORRO VACACIONES', 'D', 'P', '1.', '1', 'S', 0, '0', '', '$REF=10;\r\n$T01=$SUELDO+CAMPOADICIONALPER(6)+CAMPOADICIONALPER(7);\r\n$T02=SI("CAMPOADICIONALPER(14)==SI",($T01*($REF/100)),0);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T02,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2414, 'PRESTAMO CAJA DE AHORRO VACACIONES', 'D', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=SI("CAMPOADICIONALPER(15)==SI",CAMPOADICIONALPER(16),0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2415, 'S.S.O VACACIONES (RETORNO)', 'D', 'P', '101.', '1', 'S', 0, '0', '', '$REF=4;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHANOMINA,$FECHAREIVAC);\r\n$T04=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T05=SI("$T04==SI",$T03,0);\r\n$MONTO=SI("CAMPOADICIONALPER(1)==SI",$T05,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2416, 'R.P.E. VACACIONES (RETORNO)', 'D', 'P', '1.', '1', 'S', 0, '0', '', '$REF=0.50;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHANOMINA,$FECHAREIVAC);\r\n$T04=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T05=SI("$T04==SI",$T03,0);\r\n$MONTO=SI("CAMPOADICIONALPER(2)==SI",$T05,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2417, 'R.P.V.H. VACACIONES (RETORNO)', 'D', 'P', '1.', '1', 'S', 0, '0', '', '$REF=1;\r\n$T01=CONCEPTO(1014)+CONCEPTO(1015);\r\n$T02=$T01*($REF/100);\r\n$T03=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T04=SI("$T03==SI",$T02,0);\r\n$MONTO=SI("CAMPOADICIONALPER(3)==SI",$T04,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2418, 'CAJA DE AHORRO VACACIONES (RETORNO)', 'D', 'P', '1.', '1', 'S', 0, '0', '', '$REF=10;\r\n$T01=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T02=SI("$T01==SI",((CONCEPTO(1014)+CONCEPTO(1015))*($REF/100)),0);\r\n$MONTO=SI("CAMPOADICIONALPER(14)==SI",$T02,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2431, 'SEGURO SOCIAL OBLIGATORIO CONTRATADOS AJUSTE SALARIO', 'D', 'P', '1.', '', 'S', 0, '0', '', '$T01=$SUELDO*12;\r\n$T02=$T01/52;\r\n$T03=$T02*0.04;\r\n$MONTO=$T03*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2432, 'REGIMEN PRESTACIONAL DE EMP. CONT. AJUSTE SALARIO', 'D', 'P', '101.', '', 'S', 0, '0', '', '$T01=$SUELDO*12;\r\n$T02=$T01/52;\r\n$T03=$T02*0.005;\r\n$MONTO=$T03*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2433, 'REG. PREST. DE VIV. Y HAB. EMPLEADOS POR AJUSTE DE SALARIO ', 'D', 'D', '101.', '', 'S', 0, '0', '', '$T01=CONCEPTO(1013);\r\n$MONTO=$T01*($REF/100);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2500, '******************LIQUIDACIONES DEDUCCIONES****************', 'D', '', '1.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(2501, 'PREAVISO DEDUCCION', 'D', 'M', '1.', '1', 'S', 0, '0', '', '$T01=ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"M");\r\n$T02=ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"A");\r\n$T03=SI("($T01>=1)&&($MOTIVOLIQ==''Renuncia'')",7,0);\r\n$T03=SI("($T01>=6)&&($MOTIVOLIQ==''Renuncia'')",15,$T03);\r\n$T03=SI("($T02>=1)&&($MOTIVOLIQ==''Renuncia'')",30,$T03);\r\n$T03=SI("($T01>=1)&&($MOTIVOLIQ==''Despido'')",7,$T03);\r\n$T03=SI("($T01>=6)&&($MOTIVOLIQ==''Despido'')",15,$T03);\r\n$T03=SI("($T02>=1)&&($MOTIVOLIQ==''Despido'')",30,$T03);\r\n$T03=SI("($T02>=5)&&($MOTIVOLIQ==''Despido'')",60,$T03);\r\n$T03=SI("($T02>=10)&&($MOTIVOLIQ==''Despido'')",90,$T03);\r\n$REF=SI("($T03<=30)&&($TIPONOMINA!=1)&&($MOTIVOLIQ==''Despido'')",$T03*2,$T03);\r\n$T04=SI("CAMPOADICIONALPER(16)==''GPC''",((CONCEPTO(4001)+CONCEPTO(4002)+CONCEPTO(4003)+CONCEPTO(4004)+CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007)+CONCEPTO(4008)+CONCEPTO(4009)+CONCEPTO(4010))/30)*$REF,((CONCEPTO(4001)+CONCEPTO(4002)+CONCEPTO(4003)+CONCEPTO(4004)+CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007))/30)*$REF);\r\n$MONTO=SI("($MOTIVOLIQ==''Renuncia'')&&($PREAVISO==''No'')",$T04,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2502, 'DESCUENTO I.N.C.E.', 'D', 'P', '1.', '1', 'S', 0, '0', '', '$REF=0.50;\r\n$MONTO=CONCEPTO(4017)*($REF/100);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2503, 'TARJETA ALIMENTARIA', 'D', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=(BAREMO(''4'',''3'')/2)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2504, 'SUELDO PAGADO DE MAS', 'D', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=$REF;', 1, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(2505, 'PRIMA PROFESIONAL PAGADO DE MAS', 'D', 'D', '1.', '', 'S', 0, '0', '', '$MONTO=(CONCEPTO(4004)/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2506, 'OTRAS PRIMAS', 'D', 'D', '1.', '', 'S', 0, '0', '', '$MONTO=((CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007))/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2507, 'DIAS PAGADO DE MAS', 'D', 'D', '1.', '', 'S', 0, '0', '', '$MONTO=(($SUELDO/30)+(CAMPOADICIONALPER(7)/30)+(CAMPOADICIONALPER(6)/30))*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.18.00'),
(2508, 'ANTICIPOS DE PRESTACIONES SOCIALES', 'D', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=ANTICIPOS($CEDULA);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(2600, '*********PRESTACIONES DEDUCCION*********', 'D', 'M', '1.', '', 'N', 0, '0', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(2601, 'ANTICIPOS DE PRESTACIONES SOCIALES', 'D', 'M', '1.', '', 'N', 0, '0', '', '$MONTO=ANTICIPOS($CEDULA);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3500, '****************APORTES PATRONALES****************', 'P', '', '1.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '1.'),
(3501, 'APORTE PATRONAL S.S.O. EMPLEADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=9;\r\n$MONTO=((CONCEPTO(2001))*$REF)/4;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.07.08.00'),
(3502, 'APORTE PATRONAL R.P.E EMPLEADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=2;\r\n$MONTO=(CONCEPTO(2002)*$REF)/0.5;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.04.00'),
(3503, 'APORTE PATRONAL R.P.V.H. EMPLEADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$T01=CONCEPTO(2003)*2;\r\n$MONTO=SI("CAMPOADICIONALPER(3)==''SI''",$T01,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.05.00'),
(3504, 'APORTE PATRONAL CAJA DE AHORROS', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=15;\r\n$T01=CONCEPTO(500)+CONCEPTO(507);\r\n$MONTO=SI("CAMPOADICIONALPER(14)==''SI''",($T01*($REF/100)),0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.07.07.00'),
(3505, 'APORTE PATRONAL F.P.J. EMP FIJO ', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=3;\r\n$T01=(CONCEPTO(500))*($REF/100);\r\n$MONTO=SI("CAMPOADICIONALPER(4)==SI",$T01,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.03.00'),
(3550, 'APORTE S.S.O PATRONAL CONTRATADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=9;\r\n$MONTO=(CONCEPTO(2401)*$REF)/4;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.07.33.00'),
(3551, 'APORTE PATRONAL R.P.E. CONTRATADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=2;\r\n$MONTO=(CONCEPTO(2402)*$REF)/0.5;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.07.33.00'),
(3552, 'APORTE PATRONAL L.P.H. CONTRATADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=2;\r\n$T01=CONCEPTO(2403)*2;\r\n$MONTO=SI("CAMPOADICIONALPER(3)==''SI''",$T01,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.07.33.00'),
(3580, 'APORTE PATRONAL H.C.M. JUBILADOS', 'P', 'P', '1.', '1', 'N', 0, '0', '', '$MONTO=CAMPOADICIONALPER(10)/2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3581, 'S.S.O VACACIONES (RETORNO) EMP FIJO', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=11;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+(CONCEPTO(501)*2);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAREIVAC,$FECHAFINNOM);\r\n$T04=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T05=SI("$T04==SI",$T03,0);\r\n$MONTO=SI("CAMPOADICIONALPER(1)==SI",$T05,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00');
INSERT INTO `nomconceptos` (`codcon`, `descrip`, `tipcon`, `unidad`, `ctacon`, `contractual`, `impdet`, `proratea`, `usaalter`, `descalter`, `formula`, `modifdef`, `markar`, `tercero`, `ccosto`, `codccosto`, `debcre`, `bonificable`, `htiempo`, `valdefecto`, `con_cu_cc`, `con_mcun_cc`, `con_mcuc_cc`, `con_cu_mccn`, `con_cu_mccc`, `con_mcun_mccn`, `con_mcuc_mccc`, `con_mcun_mccc`, `con_mcuc_mccn`, `nivelescuenta`, `nivelesccosto`, `semodifica`, `verref`, `vermonto`, `particular`, `montocero`, `ee`, `fmodif`, `aplicaexcel`, `descripexcel`, `ctacon1`) VALUES
(3582, 'R.P.E. VACACIONES (RETORNO) EMP FIJO ', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=2;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+(CONCEPTO(501)*2);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAREIVAC,$FECHAFINNOM);\r\n$T04=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T05=SI("$T04==SI",$T03,0);\r\n$MONTO=SI("CAMPOADICIONALPER(2)==SI",$T05,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3583, 'R.P.V.H. VACACIONES (RETORNO) EMP FIJO ', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=2;\r\n$T01=CONCEPTO(515)+CONCEPTO(516);\r\n$T02=$T01*($REF/100);\r\n$T03=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T04=SI("$T03==SI",$T02,0);\r\n$MONTO=SI("CAMPOADICIONALPER(3)==SI",$T04,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3584, 'CAJA DE AHORRO VACACIONES (RETORNO) EMP FIJO ', 'P', 'P', '1.', '1', 'N', 0, '0', '', '$REF=10;\r\n$T01=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T02=SI("$T01==''SI''",((CONCEPTO(515)+CONCEPTO(516))*($REF/100)),0);\r\n$MONTO=SI("CAMPOADICIONALPER(14)==''SI''",$T02,0);\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3585, 'S.S.O VACACIONES EMP FIJO ', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=11;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+(CONCEPTO(501)*2);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAVAC,$FECHAREIVAC);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T03,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3586, 'R.P.E. VACACIONES EMP FIJO ', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=2;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+(CONCEPTO(501)*2);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAVAC,$FECHAREIVAC);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T03,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3587, 'R.P.V.H. VACACIONES EMP FIJO ', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=2;\r\n$T01=CONCEPTO(2018)*$REF;\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T01,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3588, 'F.P.J. VACACIONES EMP FIJO ', 'P', 'P', '1.', '1', 'S', 1, '0', '', '$REF=3;\r\n$T01=($SUELDO/2+(CAMPOADICIONALPER(6)/2)+(CAMPOADICIONALPER(5)/2)+(CAMPOADICIONALPER(13)/2)+(CAMPOADICIONALPER(25)/2)+(CAMPOADICIONALPER(14)/2)+CONCEPTO(543))*($REF/100);\r\n$T02=SI("CAMPOADICIONALPER(35)==1",($T01*3),$T01);\r\n$T02=SI("CAMPOADICIONALPER(35)==2",($T01*5),$T02);\r\n$T02=SI("CAMPOADICIONALPER(35)==0",$T01,$T02);\r\n$MONTO=SI("CAMPOADICIONALPER(4)==SI",$T02,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3589, 'CAJA DE AHORRO VACACIONES EMP FIJO ', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=10;\r\n$T01=CONCEPTO(2022);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T01,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3590, 'APORTE PATRONAL CAJA DE AHORROS CONTRATADOS', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=10;\r\n$MONTO=CONCEPTO(2005);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3591, 'S.S.O VACACIONES CONT.', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=11;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAVAC,$FECHAREIVAC);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T03,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3592, 'R.P.E. VACACIONES CONT.', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=2;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHAVAC,$FECHAREIVAC);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T03,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3593, 'R.P.V.H. VACACIONES CONT.', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=2;\r\n$T01=CONCEPTO(2412)*$REF;\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T01,0);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3594, 'CAJA DE AHORRO VACACIONES CONT.', 'P', 'P', '1.', '1', 'N', 0, '0', '', '$REF=10;\r\n$T01=CONCEPTO(2413);\r\n$MONTO=SI("CAMPOADICIONALPER(15)==SI",$T01,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3595, 'S.S.O VACACIONES (RETORNO) CONT.', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=11;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHANOMINA,$FECHAREIVAC);\r\n$T04=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T05=SI("$T04==SI",$T03,0);\r\n$MONTO=SI("CAMPOADICIONALPER(1)==SI",$T05,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3596, 'R.P.E. VACACIONES (RETORNO) CONT.', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=2;\r\n$T01=SI("$SUELDO>=8789",8789,$SUELDO);\r\n$T02=$T01+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6);\r\n$T03=(($T02*12)/52)*($REF/100)*LUNES_PER($FECHANOMINA,$FECHAREIVAC);\r\n$T04=REINTVAC($FECHAREIVAC,$FECHANOMINA,$FECHAFINNOM);\r\n$T05=SI("$T04==SI",$T03,0);\r\n$MONTO=SI("CAMPOADICIONALPER(2)==SI",$T05,0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3597, 'R.P.V.H. VACACIONES (RETORNO) CONT.', 'P', 'P', '101.', '1', 'N', 0, '0', '', '$REF=2;\r\n$MONTO=CONCEPTO(2417)*2;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3598, 'CAJA DE AHORRO VACACIONES (RETORNO) CONT.', 'P', 'P', '1.', '1', 'N', 0, '0', '', '$REF=10;\r\n$MONTO=CONCEPTO(2418);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(3599, 'APORTE PATRONAL S.S.O. AJUSTE SAL. EMPLEADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=11;\r\n$MONTO=(11*CONCEPTO(2031))/4;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.01.00'),
(3600, 'APORTE PATRONAL R.P.E AJUSTE SAL. EMPLEADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=2;\r\n$MONTO=(2*CONCEPTO(2032))/0.5;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.04.00'),
(3601, 'APORTE PATRONAL R.P.V.H. AJUSTE SAL. EMPLEADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=2;\r\n$MONTO=CONCEPTO(2033)*2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.05.00'),
(3602, 'APORTE PATRONAL S.S.O. AJUSTE COM. SERV. EMPLEADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=11;\r\n$MONTO=(11*CONCEPTO(2051))/4;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.01.00'),
(3603, 'APORTE PATRONAL R.P.E AJUSTE COM. SERV. EMPLEADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=2;\r\n$MONTO=(2*CONCEPTO(2052))/0.5;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.04.00'),
(3604, 'APORTE PATRONAL R.P.V.H. AJUSTE COM. SERV. EMPLEADOS', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=2;\r\n$MONTO=CONCEPTO(2053)*2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.05.00'),
(3605, 'APORTE PATRONAL S.S.O. COM. SERV. EMPLEADOS', 'P', 'P', '101.', '', 'N', 1, '0', '', '$REF=11;\r\n$MONTO=(11*CONCEPTO(2041))/4;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.01.00'),
(3606, 'APORTE PATRONAL R.P.E. COM. SERV. EMPLEADOS', 'P', 'P', '101.', '', 'N', 1, '0', '', '$REF=2;\r\n$MONTO=(2*CONCEPTO(2042))/0.5;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.04.00'),
(3607, 'APORTE PATRONAL R.P.V.H. COM. SERV. EMPLEADOS', 'P', 'P', '101.', '', 'N', 1, '0', '', '$REF=2;\r\n$MONTO=CONCEPTO(2043)*2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.05.00'),
(3608, 'APORTE PATRONAL S.S.O. AJUSTE SAL. CONTR.', 'P', 'P', '101.', '1', 'N', 1, '0', '', '$REF=11;\r\n$MONTO=(11*CONCEPTO(2431))/4;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.01.00'),
(3609, 'APORTE PATRONAL R.P.E AJUSTE SAL. CONTR.', 'P', 'P', '1.', '1', 'N', 1, '0', '', '$REF=2;\r\n$MONTO=(2*CONCEPTO(2432))/0.5;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.04.00'),
(3610, 'APORTE PATRONAL R.P.V.H. AJUSTE SAL. CONTR.', 'P', 'P', '1.', '1', 'N', 1, '0', '', '$REF=2;\r\n$MONTO=CONCEPTO(2433)*2;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.06.05.00'),
(3614, 'APORTE PATRONAL CAJA DE AHORROS', 'P', 'P', '1.', '1', 'N', 0, '0', '', '$REF=10;\r\n$MONTO=CONCEPTO(2408);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.07.07.00'),
(4000, '******************LIQUIDACIONES****************', 'A', '', '1.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(4001, 'SUELDO BASICO', 'A', 'M', '1.', '1', 'N', 0, '0', '', '$MONTO=$SUELDO;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4002, 'PRIMA POR RAZONES DE SERVICIO', 'A', 'M', '1.', '1', 'N', 0, '0', '', '$MONTO=CAMPOADICIONALPER(13);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4003, 'COMPENSACION SALARIAL', 'A', 'M', '1.', '1', 'N', 0, '0', '', '$MONTO=CAMPOADICIONALPER(7);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4004, 'PRIMA PROFESIONAL', 'A', 'M', '1.', '1', 'N', 0, '0', '', '$MONTO=CAMPOADICIONALPER(6);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4005, 'PRIMA POR JERARQUIA', 'A', 'M', '1.', '1', 'N', 0, '0', '', '$MONTO=SI("CAMPOADICIONALPER(16)==''GPC''",CAMPOADICIONALPER(5),0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4006, 'TRANSPORTE FIJO POR CARGO', 'A', 'M', '1.', '1', 'N', 0, '0', '', '$MONTO=SI("CAMPOADICIONALPER(16)==''GPC''",CAMPOADICIONALPER(25),0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4007, 'PRIMA ESPECIAL', 'A', 'M', '1.', '1', 'N', 0, '0', '', '$MONTO=SI("CAMPOADICIONALPER(16)==''GPC''",CAMPOADICIONALPER(23),0);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4008, 'APORTE PLAN DE PREVISION', 'A', 'P', '1.', '1', 'N', 0, '0', '', '$REF=15;\r\n$MONTO=($SUELDO+CAMPOADICIONALPER(13)+CAMPOADICIONALPER(14))*($REF/100);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4009, 'DOZAVO DE VACACIONES', 'A', 'P', '1.', '1', 'N', 0, '0', '', '$T01=($SUELDO+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6));\r\n$MONTO=($T01)*0.111;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4010, 'DOZAVO DE UTILIDADES', 'A', 'P', '1.', '1', 'N', 0, '0', '', '$T01=($SUELDO+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(6));\r\n$MONTO=$T01*0.250;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4011, 'PREAVISO', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$T01=ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"M");\r\n$T02=ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"A");\r\n$T03=SI("($T01>=1)&&($MOTIVOLIQ==''Renuncia'')",7,0);\r\n$T03=SI("($T01>=6)&&($MOTIVOLIQ==''Renuncia'')",15,$T03);\r\n$T03=SI("($T02>=1)&&($MOTIVOLIQ==''Renuncia'')",30,$T03);\r\n$T03=SI("($T01>=1)&&($MOTIVOLIQ==''Despido'')",7,$T03);\r\n$T03=SI("($T01>=6)&&($MOTIVOLIQ==''Despido'')",15,$T03);\r\n$T03=SI("($T02>=1)&&($MOTIVOLIQ==''Despido'')",30,$T03);\r\n$T03=SI("($T02>=5)&&($MOTIVOLIQ==''Despido'')",60,$T03);\r\n$T03=SI("($T02>=10)&&($MOTIVOLIQ==''Despido'')",90,$T03);\r\n$REF=SI("($T03<=30)&&($TIPONOMINA!=1)&&($MOTIVOLIQ==''Despido'')",$T03*2,$T03);\r\n$T04=((CONCEPTO(4001)+CONCEPTO(4002)+CONCEPTO(4003)+CONCEPTO(4004)+CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007)+CONCEPTO(4008))/30)*$REF;\r\n$T05=((CONCEPTO(4001)+CONCEPTO(4002)+CONCEPTO(4003)+CONCEPTO(4004)+CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007)+CONCEPTO(4008)+CONCEPTO(4009)+CONCEPTO(4010))/30)*$REF;\r\n$T06=SI("$MOTIVOLIQ==''Renuncia''",$T04,$T05);\r\n$MONTO=SI("($MOTIVOLIQ==''Renuncia'')&&($PREAVISO==''No'')",0,$T06);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4012, 'ANTIGUEDAD ART 108/ CLA. 24 CCV', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$T01=ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"A");\r\n$T02=ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"M");\r\n$T03=SI("$T02>=6",($T01+1),$T01);\r\n$REF=SI("($REF>=10)||($MOTIVOLIQ==''Despido'')",($T03*60),($T03*30));\r\n$T04=(CONCEPTO(4001)+CONCEPTO(4002)+CONCEPTO(4003)+CONCEPTO(4004)+CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007)+CONCEPTO(4008)+CONCEPTO(4009)+CONCEPTO(4010))/30;\r\n$MONTO=$T04*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4013, 'VACACIONES FRACCIONADAS', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$T01=(15)+ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"A");\r\n$T02=(CONCEPTO(4001)+CONCEPTO(4002)+CONCEPTO(4003)+CONCEPTO(4004)+CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007)+CONCEPTO(4008));\r\n$REF=ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"M");\r\n$T03=($T02-CONCEPTO(4008))/30;\r\n$MONTO=(($T01*$T03)/12)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4014, 'BONO VACACIONAL FRACCIONADO', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$T01=ANTIGUEDADLIQ($FECHAINGRESO,$FECHANOMINA,1,$PREAVISO,$CODNOM,$FICHA);\r\n$T02=(CONCEPTO(4001)+CONCEPTO(4002)+CONCEPTO(4003)+CONCEPTO(4004)+CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007)+CONCEPTO(4008))/30;\r\n$T03=SI("CAMPOADICIONALPER(16)==''GPC''",($T02/30),CONCEPTO(4009));\r\n$T04=ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"M");\r\n$REF=3.33*$T04;\r\n$MONTO=CONCEPTO(4009)*$T04;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4015, 'VACACIONES VENCIDAS', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$REF=VACBONOPENDIENTE($CEDULA,$FECHANOMINA,1);\r\n$T02=(CONCEPTO(4001)+CONCEPTO(4002)+CONCEPTO(4003)+CONCEPTO(4004)+CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007)+CONCEPTO(4008))/30;\r\n$MONTO=$T02*$REF;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4016, 'BONO VACACIONAL VENCIDO', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=VACBONOPENDIENTE($CEDULA,$FECHANOMINA,2);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4017, 'BONIF. DE FIN DE AÃ‘O', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$REF=(120/12)*MESESLABORADOS($CODNOM,''4011'',$FICHA,$FECHANOMINA,$FECHAINGRESO);\r\n$T01=(CONCEPTO(4001)+CONCEPTO(4002)+CONCEPTO(4003)+CONCEPTO(4004)+CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007)+CONCEPTO(4008)+CONCEPTO(4009))/30;\r\n$MONTO=$T01*($REF);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4018, 'SUSTITUTIVA DE UTILIDADES', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$T01=((CONCEPTO(4001)+CONCEPTO(4002)+CONCEPTO(4003)+CONCEPTO(4004)+CONCEPTO(4005)+CONCEPTO(4006)+CONCEPTO(4007)+CONCEPTO(4009))*2)/12;\r\n$REF=MESESLABORADOS($CODNOM,''4011'',$FICHA,$FECHANOMINA);\r\n$MONTO=$T01*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4019, 'SUELDO', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=($SUELDO/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4020, 'APORTE PLAN DE PREVISION', 'A', 'P', '1.', '', 'S', 0, '0', '', '$T01=15;\r\n$T02=($SUELDO+CAMPOADICIONALPER(13)+CAMPOADICIONALPER(14))*($T01/100);\r\n$MONTO=($T02/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4021, 'COMPENSACION SALARIAL', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=(CAMPOADICIONALPER(14)/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4022, 'PRIMA PROFESIONAL', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=(CAMPOADICIONALPER(6)/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4023, 'PRIMA POR JERARQUIA', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=(CAMPOADICIONALPER(5)/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4024, 'TRANSPORTE FIJO POR CARGO', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=(CAMPOADICIONALPER(25)/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4025, 'DIAS LABORADOS NO PAGADOS', 'A', 'M', '1.', '', 'S', 0, '0', '', '$MONTO=(($SUELDO+CAMPOADICIONALPER(7))/30)*$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4026, 'INTERESES PREST. SOCIALES', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$MONTO=PRESTCONTRATADOS($CEDULA,$FICHA,5004);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4027, 'DIAS ADICIONALES ART. 108', 'A', 'D', '1.', '', 'S', 0, '0', '', '$MONTO=($REF)*(CONCEPTO(4001)+CONCEPTO(4003)+CONCEPTO(4009)+CONCEPTO(4010))/30;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4028, 'PARAGRAFO I ART. 108', 'A', 'D', '1.', '', 'S', 0, '0', '', '$MONTO=($REF)*(CONCEPTO(4001)+CONCEPTO(4003)+CONCEPTO(4009)+CONCEPTO(4010))/30;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4029, 'ANTIGUEDAD ART 108', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$REF=CAMPOADICIONALPER(17);\r\n$MONTO=PRESTCONTRATADOS($CEDULA,$FICHA,5000);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(4999, '****************PRESTACIONES SOCIALES***********************', 'A', '', '1.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '1.'),
(5000, 'PRESTACIONES SOCIALES ', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$T01=ASIGMESACTUAL($FECHAFINNOM,$FICHA);\r\n$T02=ANTIGUEDADLIQ($FECHAINGRESO,$FECHAFINNOM,2,0,0,0);\r\n$T03=(($T01/30)*40)/12;\r\n$T04=(($T01/30)*90)/12;\r\n$T05=($T01+$T03+$T04)/30;\r\n$T06=ANTIGUEDAD($FECHAINGRESO,$FECHAFINNOM,"A");\r\n$T07=ANTIGUEDAD($FECHAINGRESO,$FECHAFINNOM,"M");\r\n$T08=SI("($T07==0)&&($T06>=2)",(($T05)*(($T06-1)*2)),0);\r\n$REF=SI("$T07==0",((($T06-1)*2)+5),5);\r\n$T09=SI("($T07>=4)||($T06<>0)",$T05*5,0);\r\n$MONTO=$T08+$T09;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(5001, 'ANTICIPOS DE PRESTACIONES SOCIALES', 'A', 'M', '1.', '1', 'N', 0, '0', '', '$MONTO=ANTICIPOS($CEDULA);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(5002, 'PRESTACIONES SOCIALES XX', 'A', 'M', '1.', '1', 'N', 0, '0', '', '$T01=ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"A");\r\n$T02=ANTIGUEDAD($FECHAINGRESO,$FECHANOMINA,"M");\r\n$T03=SI("$T02>=6",($T01+1),$T01);\r\n$REF=$T03*30;\r\n$T04=$SUELDO+CAMPOADICIONALPER(13)+CAMPOADICIONALPER(14);\r\n$T05=SI("CAMPOADICIONALPER(16)==''GPC''",(CAMPOADICIONALPER(5)+CAMPOADICIONALPER(6)+CAMPOADICIONALPER(23)+CAMPOADICIONALPER(25)),0);\r\n$T06=((($T04+$T05)/30)*90)/12;\r\n$T07=ANTIGUEDADLIQ($FECHAINGRESO,$FECHANOMINA,1,$PREAVISO,$CODNOM,$FICHA);\r\n$T08=((($T04+$T05)/30)*$T07)/12;\r\n$MONTO=(($T04+$T05+$T06+$T08)/30)*$REF;\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(5003, 'INTERESES SOBRE PRESTACIONES EMP FIJO', 'A', 'P', '1.', '1', 'S', 0, '0', '', '$REF=TASAINTERES($FECHANOMINA);\r\n$MONTO=(CONCEPTO(5002)-CONCEPTO(2601))*($REF/100);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(5004, 'INTERESES SOBRE PRESTACIONES SOCIALES', 'A', 'P', '1.', '1', 'S', 0, '0', '', '$REF=TASAINTERES($FECHANOMINA);\r\n$MONTO=(((CONCEPTO(5000)+PRESTCONTRATADOS($CEDULA,$FICHA,5000))-CONCEPTO(5001))*($REF)*DIA($FECHAFINNOM))/365/100;\r\nMENSAJECON(CONCEPTO(5001));', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(5500, '***************BONIFICACIONES**************', 'A', '', '1.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(5501, 'BONIFICACION  DE FIN DE AÃ‘O', 'A', 'M', '1.', '1', 'S', 0, '0', '', '$T01=ANTIGUEDAD(''2009-01-01'',$FECHAINGRESO,"D");\r\n$REF=SI("$T01>=0",365-$T01,365);\r\n$T02=($SUELDO+CAMPOADICIONALPER(21)+CAMPOADICIONALPER(7))*1.11;\r\n$MONTO=(($REF*60)/365)*($T02/30);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(5502, 'BONIFICACION UNICA ESPECIAL', 'A', 'M', '101.', '', 'S', 0, '0', '', '$T01=ANTIGUEDAD(''2009-01-01'',$FECHAINGRESO,"D");\r\n$REF=SI("$T01>=0",365-$T01,365);\r\n$T02=($SUELDO+CAMPOADICIONALPER(7)+CAMPOADICIONALPER(21))*1.11;\r\n$MONTO=(($REF*30)/365)*($T02/30);\r\n\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(5503, 'BONO ESPECIAL', 'A', 'M', '101.', '1', 'S', 0, '0', '', '$T01=ANTIGUEDAD($FECHAINGRESO,''2009-12-31'',"M");\r\n$T02=ANTIGUEDAD($FECHAINGRESO,''2009-12-31'',"A");\r\n$T03=SI("$T01>=3",1000,0);\r\n$MONTO=SI("$T02>=1",1000,$T03);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(5504, 'BONO ESPECIAL DIRECTORES', 'A', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=5000;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(5505, 'BONO ESPECIAL RESPON Y PERSEV', 'A', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(5506, 'Diferencia Salario minimo Alcade y Alto nivel', 'A', 'M', '101.', '', 'S', 0, '0', '', '$MONTO=$REF;', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(6500, '********UTILIDADES DEDUCCIONES********', 'D', '', '1.', '', '', 0, '', '', '', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.01.01.00'),
(6503, 'I.N.C.E. UTILIDADES', 'D', 'M', '1.', '1', 'S', 0, '0', '', '$REF=0.50;\r\n$MONTO=CONCEPTO(5501)*($REF/100);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(6504, 'CUOTA EXTRA-SINDICAL', 'D', 'P', '1.', '1', 'S', 0, '0', '', '$REF=0.25;\r\n$MONTO=CONCEPTO(5501)*($REF/100);', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 1, 0, 1, 0, 0, 0, '', '4.01.01.01.00'),
(10000, 'BONO VAC', 'A', 'M', '101.', '', 'N', 0, '0', '', '$REF=CAMPOADICIONALPER(34);\r\n$MONTO=(($SUELDO/30)*$REF);\r\n', 0, 0, 0, 0, 0, '', 0, 0, '0.00', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '', '4.01.05.03.00');

-- --------------------------------------------------------

--
-- Table structure for table `nomconceptos_acumulados`
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
-- Dumping data for table `nomconceptos_acumulados`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomconceptos_ctager`
--

CREATE TABLE IF NOT EXISTS `nomconceptos_ctager` (
  `codcon` int(5) NOT NULL,
  `codnivel4` int(7) NOT NULL,
  `ctacon` varchar(50) NOT NULL,
  `tipcon` varchar(1) NOT NULL,
  PRIMARY KEY  (`codcon`,`codnivel4`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nomconceptos_ctager`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomconceptos_frecuencias`
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
-- Dumping data for table `nomconceptos_frecuencias`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomconceptos_situaciones`
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
-- Dumping data for table `nomconceptos_situaciones`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomconceptos_tiponomina`
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
-- Dumping data for table `nomconceptos_tiponomina`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomdesempeno`
--

CREATE TABLE IF NOT EXISTS `nomdesempeno` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(60) character set latin1 NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomdesempeno`
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
-- Table structure for table `nomelegibles`
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
-- Dumping data for table `nomelegibles`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomempresa`
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
  `ee` varchar(60) collate utf8_spanish_ci default NULL,
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
  `nomcampo1` varchar(60) collate utf8_spanish_ci default NULL,
  `nomcampo2` varchar(60) collate utf8_spanish_ci default NULL,
  `nomcampo3` varchar(60) collate utf8_spanish_ci default NULL,
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
  `contratado` tinyint(1) NOT NULL,
  PRIMARY KEY  (`cod_emp`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomempresa`
--

INSERT INTO `nomempresa` (`cod_emp`, `nom_emp`, `dir_emp`, `ciu_emp`, `edo_emp`, `zon_emp`, `tel_emp`, `rif`, `nit`, `pre_sid`, `ger_rrhh`, `edadmax`, `amonemax`, `redontip`, `unidadtrib`, `tipopres`, `munidadtrib`, `diasbonvac`, `diasutilidad`, `nivel1`, `nivel2`, `nivel3`, `nivel4`, `nivel5`, `entfederal`, `distrito`, `municipio`, `codacteco`, `nomacteco`, `fecfunda`, `capital`, `degravunico`, `mescambiari`, `utcargafam`, `monsalmin`, `codcon`, `codcons`, `demo`, `rutacontab`, `rutadatoscontab`, `serial`, `ctacheque`, `ctaefectivo`, `nrocompro`, `contratos`, `nomniv1`, `nomniv2`, `nomniv3`, `nomniv4`, `nomniv5`, `recibovac`, `reciboliq`, `ee`, `fax_emp`, `num_emp`, `num_est`, `num_sso`, `estado`, `parroquia`, `localidad`, `e_mail`, `cod_entfed`, `cod_distri`, `cod_munici`, `cod_sector`, `cod_acteco`, `cod_orden`, `utilidad`, `reportdiff`, `porcdiff`, `netoneg`, `impresora`, `selector`, `nosueldocero`, `mediajornada`, `nuevassituaciones`, `tipoficha`, `conprestamos`, `confamiliares`, `conficha`, `nomcampo1`, `nomcampo2`, `nomcampo3`, `recibonom`, `tipcontab`, `contadorbanesco`, `ctapatronales`, `recibopago`, `nivel6`, `nivel7`, `nomniv6`, `nomniv7`, `imagen_izq`, `imagen_der`, `cod_material`, `unidad`, `ccosto`, `proveedor`, `contratado`) VALUES
(1, 'ONUVA', 'ALTAMIRA CENTRO PLAZA', 'CARACAS', 'Miranda', '2001', '0212-2867806', 'G-20000000-9', '', 'G-20000000-9', '', 99, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 1, 1, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '1064.25', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'SECTOR', 'PROGRAMA', 'ACTIVIDAD', '', '', NULL, NULL, 'Eduardo Santaella', '0212-2867806', NULL, NULL, NULL, NULL, NULL, NULL, 'soporte@onuva.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '0.00', 1, 'www.onuva.com\r\n', NULL, 1, 0, 1, 0, NULL, NULL, NULL, 'Estado Bolivariano de Miranda', 'Alcaldia Onuva', 'Recursos Humanos', '', 0, 0, NULL, '', 0, 0, '', '', 'onuva.jpg', 'onuva.jpg', '941017051', '10', '10.1', '2', 1);

-- --------------------------------------------------------

--
-- Table structure for table `nomexpediente`
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='contiene todos los datos de expediente del personal ' AUTO_INCREMENT=7 ;

--
-- Dumping data for table `nomexpediente`
--

INSERT INTO `nomexpediente` (`cod_expediente_det`, `cedula`, `tipo_registro`, `tipo_tiporegistro`, `descripcion`, `monto`, `monto_nuevo`, `dias`, `fecha_retorno`, `fecha_salida`, `cod_cargo`, `cod_cargo_nuevo`, `fecha`, `usuario`, `pagado_por_emp`, `institucion`, `tipo_estudio`, `nivel_actual`, `costo_persona`, `num_participantes`, `nombre_especialista`, `gerencia_anterior`, `gerencia_nueva`, `nomina_anterior`, `nomina_nueva`, `puntaje`, `calificacion`, `labor`, `institucion_publica`, `tcamisa`, `tchaqueta`, `tbata`, `tpantalon`, `tmono`, `tzapato`) VALUES
(1, '14058603', 'Movimiento de Personal', 'Traslado de cargo', 'Paso a personal fijo', '0.00', '0.00', 0, '0000-00-00', '2010-01-25', '123', '123', '2010-04-15', 'Lolmary R', '', '', '', '', '0.00', 0, '', 0, 0, '4', '2', '0.00', '', '', 0, '', '', '', '', '', ''),
(2, '17926876', 'Movimiento de Personal', 'Traslado de nomina', 'Paso de contratado a fijo', '0.00', '0.00', 0, '0000-00-00', '2010-01-05', '13', '13', '2010-04-15', 'Lolmary R', '', '', '', '', '0.00', 0, '', 0, 0, '4', '2', '0.00', '', '', 0, '', '', '', '', '', ''),
(3, '6967013', 'Movimiento de Personal', 'Traslado de nomina', 'Paso de contratado a fijo', '0.00', '0.00', 0, '0000-00-00', '2010-04-01', '13', '13', '2010-04-15', 'Lolmary R', '', '', '', '', '0.00', 0, '', 0, 0, '4', '2', '0.00', '', '', 0, '', '', '', '', '', ''),
(4, '13801380', 'Movimiento de Personal', 'Traslado de nomina', 'Paso de contratado a fijo', '0.00', '0.00', 0, '0000-00-00', '2010-03-03', '61', '61', '2010-04-15', 'Lolmary R', '', '', '', '', '0.00', 0, '', 0, 0, '4', '2', '0.00', '', '', 0, '', '', '', '', '', ''),
(5, '6495439', 'Movimiento de Personal', 'Traslado de nomina', '', '0.00', '0.00', 0, '0000-00-00', '0000-00-00', '142', '', '2010-04-15', 'GILBERTO', '', '', '', '', '0.00', 0, '', 0, 0, '4', '2', '0.00', '', '', 0, '', '', '', '', '', ''),
(6, '20410926', 'Movimiento de Personal', 'Traslado de nomina', '', '0.00', '0.00', 0, '0000-00-00', '0000-00-00', '31', '', '2010-04-15', 'GILBERTO', '', '', '', '', '0.00', 0, '', 0, 0, '4', '2', '0.00', '', '', 0, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nomfamiliares`
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
-- Dumping data for table `nomfamiliares`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomfrecuencias`
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
-- Dumping data for table `nomfrecuencias`
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
(12, 'GUARDIAS', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(13, 'REPAROS', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL),
(14, 'Cesta Ticket', 0, NULL, NULL, NULL, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nomgradospasos`
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
-- Dumping data for table `nomgradospasos`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomgrupos_categorias`
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
-- Dumping data for table `nomgrupos_categorias`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomgrupo_bancos`
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
-- Dumping data for table `nomgrupo_bancos`
--

INSERT INTO `nomgrupo_bancos` (`cod_gban`, `des_ban`, `suc_ban`, `direccion`, `gerente`, `cuentacob`, `tipocuenta`, `markar`, `ee`, `textoinicial`, `textofinal`) VALUES
(1, 'GRUPO UNICO', '', '', '', '', '', 0, 0, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `nomguarderias`
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
-- Dumping data for table `nomguarderias`
--


-- --------------------------------------------------------

--
-- Table structure for table `nominstruccion`
--

CREATE TABLE IF NOT EXISTS `nominstruccion` (
  `codigo` int(11) NOT NULL,
  `descripcion` varchar(60) character set latin1 NOT NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nominstruccion`
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
-- Table structure for table `nomliquidaciones`
--

CREATE TABLE IF NOT EXISTS `nomliquidaciones` (
  `cod_tli` int(10) unsigned NOT NULL,
  `des_tli` varchar(60) collate utf8_spanish_ci NOT NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`cod_tli`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomliquidaciones`
--

INSERT INTO `nomliquidaciones` (`cod_tli`, `des_tli`, `markar`, `ee`) VALUES
(1, 'Sencilla', 0, 0),
(2, 'Doble', 0, 0),
(3, 'Especial', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nomnivel1`
--

CREATE TABLE IF NOT EXISTS `nomnivel1` (
  `codorg` varchar(8) collate utf8_spanish_ci NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `gerencia` int(6) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_165` (`markar`),
  KEY `fc_idx_166` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomnivel1`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomnivel2`
--

CREATE TABLE IF NOT EXISTS `nomnivel2` (
  `codorg` varchar(8) collate utf8_spanish_ci NOT NULL,
  `descrip` varchar(100) collate utf8_spanish_ci NOT NULL,
  `gerencia` int(6) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_76` (`descrip`),
  KEY `fc_idx_77` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomnivel2`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomnivel3`
--

CREATE TABLE IF NOT EXISTS `nomnivel3` (
  `codorg` varchar(8) collate utf8_spanish_ci NOT NULL,
  `descrip` varchar(100) collate utf8_spanish_ci NOT NULL,
  `gerencia` int(6) default NULL,
  `markar` tinyint(4) default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_184` (`descrip`),
  KEY `fc_idx_185` (`markar`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomnivel3`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomnivel4`
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
-- Dumping data for table `nomnivel4`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomnivel5`
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
-- Dumping data for table `nomnivel5`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomnivel6`
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
-- Dumping data for table `nomnivel6`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomnivel7`
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
-- Dumping data for table `nomnivel7`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomparentescos`
--

CREATE TABLE IF NOT EXISTS `nomparentescos` (
  `codorg` varchar(6) collate utf8_spanish_ci NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci NOT NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_153` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomparentescos`
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
-- Table structure for table `nomperiodos`
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
-- Dumping data for table `nomperiodos`
--


-- --------------------------------------------------------

--
-- Table structure for table `nompersonal`
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
  `ficha` int(10) NOT NULL auto_increment,
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
  `antiguedadap` varchar(10) collate utf8_spanish_ci default NULL,
  `paso` int(2) default NULL,
  PRIMARY KEY  (`tipnom`,`ficha`),
  UNIQUE KEY `ficha` (`ficha`,`cedula`),
  KEY `codcargo` (`codcargo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nompersonal`
--


-- --------------------------------------------------------

--
-- Table structure for table `nompersonal_tmp`
--

CREATE TABLE IF NOT EXISTS `nompersonal_tmp` (
  `ci` int(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `tipnom` varchar(2) NOT NULL,
  `situacion` varchar(2) NOT NULL,
  `sec` int(3) NOT NULL,
  `pro` int(3) NOT NULL,
  `act` int(3) NOT NULL,
  `suel` decimal(13,2) NOT NULL,
  `fecing` date NOT NULL,
  `fecnac` date NOT NULL,
  `fecret` date default NULL,
  `cuenta` varchar(20) NOT NULL,
  `sexo` varchar(1) NOT NULL,
  `nacionalidad` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nompersonal_tmp`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomprestamos`
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
-- Dumping data for table `nomprestamos`
--

INSERT INTO `nomprestamos` (`codigopr`, `descrip`, `formula`, `markar`, `ee`) VALUES
(1, 'Corto Plazo', NULL, 0, 0),
(2, 'Mediano Palzo', NULL, 0, 0),
(3, 'Largo Plazo', NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `nomprestamos_cabecera`
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
-- Dumping data for table `nomprestamos_cabecera`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomprestamos_detalles`
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
-- Dumping data for table `nomprestamos_detalles`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomprofesiones`
--

CREATE TABLE IF NOT EXISTS `nomprofesiones` (
  `codorg` int(11) NOT NULL,
  `descrip` varchar(100) collate utf8_spanish_ci NOT NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codorg`),
  KEY `fc_idx_158` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomprofesiones`
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
-- Table structure for table `nomsituaciones`
--

CREATE TABLE IF NOT EXISTS `nomsituaciones` (
  `codigo` int(10) unsigned NOT NULL auto_increment,
  `situacion` varchar(30) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`codigo`),
  KEY `situacion` (`situacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=12 ;

--
-- Dumping data for table `nomsituaciones`
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
(10, 'Permiso no Remunerado'),
(11, 'Retirado'),
(4, 'Vacaciones');

-- --------------------------------------------------------

--
-- Table structure for table `nomsuspenciones`
--

CREATE TABLE IF NOT EXISTS `nomsuspenciones` (
  `codigo` int(11) NOT NULL,
  `descrip` varchar(60) collate utf8_spanish_ci default NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`codigo`),
  KEY `fc_idx_143` (`descrip`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomsuspenciones`
--

INSERT INTO `nomsuspenciones` (`codigo`, `descrip`, `ee`) VALUES
(1, 'Enfermedad', 0),
(2, 'Accidente', 0),
(3, 'Permiso Remunerado', 0),
(4, 'Reposo', 0),
(5, 'Inasistencia Injustificada', 0);

-- --------------------------------------------------------

--
-- Table structure for table `nomtarifas`
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
-- Dumping data for table `nomtarifas`
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
-- Table structure for table `nomtasas_interes`
--

CREATE TABLE IF NOT EXISTS `nomtasas_interes` (
  `tasa` decimal(7,2) default NULL,
  `anio` int(11) NOT NULL,
  `mes` int(11) NOT NULL,
  `ee` tinyint(4) default NULL,
  PRIMARY KEY  (`anio`,`mes`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nomtasas_interes`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomterceros`
--

CREATE TABLE IF NOT EXISTS `nomterceros` (
  `codigo` int(10) unsigned NOT NULL auto_increment,
  `nombre` varchar(20) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

--
-- Dumping data for table `nomterceros`
--


-- --------------------------------------------------------

--
-- Table structure for table `nomtipos_nomina`
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
-- Dumping data for table `nomtipos_nomina`
--

INSERT INTO `nomtipos_nomina` (`codtip`, `descrip`, `prioridad`, `fecha_fin`, `fecha_ini`, `codnom`, `diasbonvac`, `diasutilidad`, `diasdisfrute`, `tipodisfrute`, `diasincrem`, `diasmaxinc`, `diasincremdis`, `diasmaxincdis`, `tiempoor`, `diasantiguedad`, `antigincremvac`, `markar`, `usatablas`, `baremo01`, `baremo02`, `baremo03`, `baremo04`, `fecha`, `ruta`, `basesuelsal`, `sfecha_fin`, `sfecha_ini`, `sfecha`, `base30`, `detdes`, `codnomant`, `fechabon`, `ee`, `owner`, `bdgenerada`, `codgrupo`, `conceptosglopar`, `tipocamposadic`, `dfecha_ini`, `dfecha_fin`, `dfecha`, `dfechabon`, `desglose_moneda`, `tipo_ingreso`, `codigo_banco`, `quinquenio`) VALUES
(1, 'Inicio (Eliminar)', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nomusuarios`
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
  `login_usuario` varchar(60) collate utf8_spanish_ci NOT NULL,
  `acce_autorizar_nom` int(1) default NULL,
  `acce_enviar_nom` int(1) default NULL,
  `acce_generarordennomina` int(1) default NULL,
  PRIMARY KEY  (`coduser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `nomusuarios`
--

INSERT INTO `nomusuarios` (`coduser`, `descrip`, `nivel`, `fecha`, `clave`, `acce_usuarios`, `acce_configuracion`, `acce_elegibles`, `acce_personal`, `acce_prestamos`, `acce_consultas`, `acce_transacciones`, `acce_procesos`, `acce_reportes`, `acce_estuaca`, `acce_xestuaca`, `acce_permisos`, `acce_logros`, `acce_penalizacion`, `acce_movpe`, `acce_evalde`, `acce_experiencia`, `acce_antic`, `acce_uniforme`, `contadorvence`, `fecclave`, `encript`, `pregunta`, `respuesta`, `acctwind`, `borraper`, `dfecha`, `dfecclave`, `login_usuario`, `acce_autorizar_nom`, `acce_enviar_nom`, `acce_generarordennomina`) VALUES
(1, 'onuva', NULL, NULL, '2a97516c354b68848cdbd8f54a226a0a55b21ed138e207ad6c5cbb9c00aa5aea', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'onuva', 1, 1, 1);

-- --------------------------------------------------------

--
-- Stand-in structure for view `nomvis_conceptos_acumulado`
--
CREATE TABLE IF NOT EXISTS `nomvis_conceptos_acumulado` (
`codcon` int(11)
,`cod_tac` varchar(6)
,`descrip` varchar(60)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `nomvis_conceptos_frecuencia`
--
CREATE TABLE IF NOT EXISTS `nomvis_conceptos_frecuencia` (
`codcon` int(11)
,`codfre` int(11)
,`descrip` varchar(60)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `nomvis_conceptos_situacion`
--
CREATE TABLE IF NOT EXISTS `nomvis_conceptos_situacion` (
`codcon` int(11)
,`descrip` varchar(30)
,`situacion` varchar(30)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `nomvis_conceptos_tiposnomina`
--
CREATE TABLE IF NOT EXISTS `nomvis_conceptos_tiposnomina` (
`codcon` int(11)
,`codtip` int(11)
,`descrip` varchar(60)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `nomvis_integrantes`
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
-- Stand-in structure for view `nomvis_per_movimiento`
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
-- Table structure for table `nom_modulos`
--

CREATE TABLE IF NOT EXISTS `nom_modulos` (
  `cod_modulo` int(10) unsigned NOT NULL auto_increment,
  `cod_modulo_padre` int(11) default NULL,
  `nom_menu` varchar(50) collate utf8_spanish_ci default NULL,
  `archivo` varchar(50) collate utf8_spanish_ci default NULL,
  `orden` int(11) default NULL,
  `tabla` varchar(200) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`cod_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=66 ;

--
-- Dumping data for table `nom_modulos`
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
-- Table structure for table `nom_motivos_retiros`
--

CREATE TABLE IF NOT EXISTS `nom_motivos_retiros` (
  `codigo` int(10) unsigned NOT NULL auto_increment,
  `descripcion` varchar(30) collate utf8_spanish_ci default NULL,
  PRIMARY KEY  (`codigo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=4 ;

--
-- Dumping data for table `nom_motivos_retiros`
--

INSERT INTO `nom_motivos_retiros` (`codigo`, `descripcion`) VALUES
(1, 'Traslado a otra ciudad'),
(2, 'Despido'),
(3, 'Renuncia');

-- --------------------------------------------------------

--
-- Table structure for table `nom_movimientos_nomina`
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
-- Dumping data for table `nom_movimientos_nomina`
--


-- --------------------------------------------------------

--
-- Table structure for table `nom_nominas_pago`
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
-- Dumping data for table `nom_nominas_pago`
--


-- --------------------------------------------------------

--
-- Table structure for table `nom_nomina_netos`
--

CREATE TABLE IF NOT EXISTS `nom_nomina_netos` (
  `codnom` int(11) NOT NULL,
  `tipnom` int(11) NOT NULL,
  `ficha` int(10) NOT NULL,
  `cedula` int(11) NOT NULL,
  `cta_ban` varchar(21) collate utf8_spanish_ci NOT NULL,
  `neto` float(20,2) NOT NULL,
  `mes` int(2) NOT NULL,
  `anio` int(4) NOT NULL,
  `frecuencia` int(2) NOT NULL,
  PRIMARY KEY  (`codnom`,`tipnom`,`ficha`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nom_nomina_netos`
--


-- --------------------------------------------------------

--
-- Table structure for table `nom_progvacaciones`
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
-- Dumping data for table `nom_progvacaciones`
--


-- --------------------------------------------------------

--
-- Table structure for table `nom_variables_personal`
--

CREATE TABLE IF NOT EXISTS `nom_variables_personal` (
  `nombre` varchar(20) collate utf8_spanish_ci NOT NULL,
  `descripcion` varchar(100) collate utf8_spanish_ci NOT NULL,
  `parametros` varchar(250) collate utf8_spanish_ci NOT NULL,
  `indicador` varchar(2) collate utf8_spanish_ci NOT NULL,
  PRIMARY KEY  (`nombre`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Dumping data for table `nom_variables_personal`
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
-- Structure for view `nomvis_conceptos_acumulado`
--
DROP TABLE IF EXISTS `nomvis_conceptos_acumulado`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_conceptos_acumulado` AS select `ca`.`codcon` AS `codcon`,`ca`.`cod_tac` AS `cod_tac`,`a`.`des_tac` AS `descrip` from (`nomconceptos_acumulados` `ca` join `nomacumulados` `a` on((`ca`.`cod_tac` = `a`.`cod_tac`)));

-- --------------------------------------------------------

--
-- Structure for view `nomvis_conceptos_frecuencia`
--
DROP TABLE IF EXISTS `nomvis_conceptos_frecuencia`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_conceptos_frecuencia` AS select `cf`.`codcon` AS `codcon`,`cf`.`codfre` AS `codfre`,`f`.`descrip` AS `descrip` from (`nomconceptos_frecuencias` `cf` join `nomfrecuencias` `f` on((`cf`.`codfre` = `f`.`codfre`)));

-- --------------------------------------------------------

--
-- Structure for view `nomvis_conceptos_situacion`
--
DROP TABLE IF EXISTS `nomvis_conceptos_situacion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_conceptos_situacion` AS select `cs`.`codcon` AS `codcon`,`cs`.`estado` AS `descrip`,`s`.`situacion` AS `situacion` from (`nomconceptos_situaciones` `cs` join `nomsituaciones` `s` on((`cs`.`estado` = `s`.`situacion`)));

-- --------------------------------------------------------

--
-- Structure for view `nomvis_conceptos_tiposnomina`
--
DROP TABLE IF EXISTS `nomvis_conceptos_tiposnomina`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_conceptos_tiposnomina` AS select `ct`.`codcon` AS `codcon`,`ct`.`codtip` AS `codtip`,`n`.`descrip` AS `descrip` from (`nomconceptos_tiponomina` `ct` join `nomtipos_nomina` `n` on((`ct`.`codtip` = `n`.`codtip`)));

-- --------------------------------------------------------

--
-- Structure for view `nomvis_integrantes`
--
DROP TABLE IF EXISTS `nomvis_integrantes`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_integrantes` AS select `per`.`cedula` AS `cedula`,`per`.`ficha` AS `ficha`,`per`.`apellidos` AS `apellidos`,`per`.`nombres` AS `nombres`,`per`.`estado` AS `estado`,`tip`.`descrip` AS `descrip` from (`nomtipos_nomina` `tip` join `nompersonal` `per` on((`tip`.`codtip` = `per`.`tipnom`)));

-- --------------------------------------------------------

--
-- Structure for view `nomvis_per_movimiento`
--
DROP TABLE IF EXISTS `nomvis_per_movimiento`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `nomvis_per_movimiento` AS select `mn`.`codnom` AS `codnom`,`pe`.`tipnom` AS `tipnom`,`pe`.`foto` AS `foto`,`pe`.`fecing` AS `fec_ing`,`pe`.`cedula` AS `cedula`,`pe`.`ficha` AS `ficha`,`pe`.`apenom` AS `apenom`,`pe`.`suesal` AS `sueldopro`,`pe`.`codnivel1` AS `codnivel1`,`pe`.`codnivel2` AS `codnivel2`,`pe`.`codnivel3` AS `codnivel3`,`car`.`des_car` AS `cargo` from (((`nom_movimientos_nomina` `mn` join `nompersonal` `pe` on((`mn`.`ficha` = `pe`.`ficha`))) left join `nomcargos` `car` on((`pe`.`codcargo` = `car`.`cod_car`))) join `nomconceptos` `c` on((`c`.`codcon` = `mn`.`codcon`))) group by `pe`.`ficha`,`mn`.`codnom` order by `pe`.`apenom`;
