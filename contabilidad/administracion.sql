-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 10-07-2012 a las 21:49:02
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `xtrasport_administracion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen`
--

CREATE TABLE IF NOT EXISTS `almacen` (
  `cod_almacen` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_almacen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `almacen`
--

INSERT INTO `almacen` (`cod_almacen`, `descripcion`) VALUES
(1, 'Almacen Unico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `analisis_cotizaciones`
--

CREATE TABLE IF NOT EXISTS `analisis_cotizaciones` (
  `cod_analisis` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cod_cotizacion` int(11) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_analisis` date NOT NULL,
  `actividad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `modalidad_contratacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_analisis`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banco`
--

CREATE TABLE IF NOT EXISTS `banco` (
  `cod_banco` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  PRIMARY KEY (`cod_banco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `banco`
--

INSERT INTO `banco` (`cod_banco`, `descripcion`) VALUES
(1, 'Banco Mercantil'),
(2, 'Banco de Venezuela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto_codebar`
--

CREATE TABLE IF NOT EXISTS `boleto_codebar` (
  `cod_boleto_codebar_` int(32) NOT NULL AUTO_INCREMENT,
  `id_factura_boleto` int(32) unsigned NOT NULL,
  `boleto_descripcion` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_cliente` int(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(80) NOT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `codebar` varchar(20) NOT NULL DEFAULT '000',
  PRIMARY KEY (`cod_boleto_codebar_`),
  KEY `id_factura_boleto` (`id_factura_boleto`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto_factura`
--

CREATE TABLE IF NOT EXISTS `boleto_factura` (
  `id_factura_boleto` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_factura_boleto` varchar(32) NOT NULL DEFAULT 'S/I',
  `id_cliente` int(32) NOT NULL,
  `cod_vendedor` int(32) NOT NULL,
  `fechaFactura` date NOT NULL DEFAULT '0000-00-00',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descuentosItemFactura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `montoItemsFactura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ivaTotalFactura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `TotalTotalFactura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cantidad_items` int(32) NOT NULL DEFAULT '0',
  `totalizar_sub_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descuento_parcial` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_operacion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_pdescuento_global` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descuento_global` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_base_imponible` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_iva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_general` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cod_estatus` int(32) unsigned DEFAULT NULL,
  `fecha_pago` date NOT NULL DEFAULT '0000-00-00',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(40) NOT NULL,
  PRIMARY KEY (`id_factura_boleto`),
  KEY `fk_cod_vendedor2` (`cod_vendedor`),
  KEY `fk_usuario` (`usuario_creacion`),
  KEY `fk_id_cliente` (`id_cliente`),
  KEY `fk_cod_estatus` (`cod_estatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto_factura_detalle`
--

CREATE TABLE IF NOT EXISTS `boleto_factura_detalle` (
  `id_detalle_factura_boleto` int(32) NOT NULL AUTO_INCREMENT,
  `id_factura_boleto` int(32) unsigned DEFAULT NULL,
  `id_item` int(32) unsigned DEFAULT NULL,
  `_item_almacen` int(32) DEFAULT NULL,
  `_item_descripcion` varchar(32) NOT NULL,
  `_item_cantidad` decimal(32,0) NOT NULL DEFAULT '0',
  `_item_preciosiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_descuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_montodescuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_piva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalsiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalconiva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detalle_factura_boleto`),
  KEY `fk_id_factura` (`id_factura_boleto`),
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `boleto_factura_detalle_formapago`
--

CREATE TABLE IF NOT EXISTS `boleto_factura_detalle_formapago` (
  `cod_factura_detalle_formapago_boleto` int(32) NOT NULL AUTO_INCREMENT,
  `id_factura_boleto` int(32) unsigned NOT NULL DEFAULT '0',
  `totalizar_monto_cancelar` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_saldo_pendiente` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_cambio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_efectivo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opt_cheque` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nombre_banco` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `opt_tarjeta` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_tipo_tarjeta` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_formapago',
  `opt_deposito` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_banco_deposito` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `fecha_vencimiento` date NOT NULL,
  `observacion` varchar(600) NOT NULL,
  `persona_contacto` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `opt_otrodocumento` tinyint(1) NOT NULL,
  `totalizar_tipo_otrodocumento` int(32) NOT NULL COMMENT 'Tipo de documento',
  `totalizar_monto_otrodocumento` decimal(10,2) NOT NULL,
  `totalizar_nro_otrodocumento` int(32) NOT NULL,
  `totalizar_banco_otrodocumento` int(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_factura_detalle_formapago_boleto`),
  KEY `id_factura_boleto` (`id_factura_boleto`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centros`
--

CREATE TABLE IF NOT EXISTS `centros` (
  `cod_centro` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cod_unidad` int(32) NOT NULL,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sel_sector` varchar(3) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sel_programa` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sel_actividad` varchar(5) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cod_centro`,`cod_unidad`),
  KEY `cod_unidad` (`cod_unidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheque`
--

CREATE TABLE IF NOT EXISTS `cheque` (
  `cod_cheque` int(32) NOT NULL AUTO_INCREMENT,
  `nro_cheque` varchar(50) NOT NULL,
  `cheque` int(32) NOT NULL,
  `cod_chequera` int(32) NOT NULL,
  `ref` varchar(500) NOT NULL DEFAULT '0' COMMENT 'Numero de Orden de CxP',
  `id_proveedor` int(32) DEFAULT NULL,
  `situacion` varchar(3) DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `concepto` varchar(200) DEFAULT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `fecha_anulacion` date NOT NULL DEFAULT '0000-00-00',
  `observacion_anulado` varchar(200) NOT NULL,
  `fecha_danado` date NOT NULL DEFAULT '0000-00-00',
  `observacion_danado` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(70) NOT NULL,
  `cod_correlativo_iva` bigint(32) NOT NULL,
  `cod_correlativo_islr` bigint(32) NOT NULL,
  PRIMARY KEY (`cod_cheque`),
  KEY `id_proveedor` (`id_proveedor`),
  KEY `cod_chequera` (`cod_chequera`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chequera`
--

CREATE TABLE IF NOT EXISTS `chequera` (
  `cod_chequera` int(32) NOT NULL AUTO_INCREMENT,
  `cantidad` int(10) NOT NULL,
  `inicio` int(40) NOT NULL,
  `situacion` char(1) NOT NULL,
  `cod_tesor_bandodet` int(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(80) NOT NULL,
  PRIMARY KEY (`cod_chequera`),
  KEY `cod_tesor_bandodet` (`cod_tesor_bandodet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheque_bache_det`
--

CREATE TABLE IF NOT EXISTS `cheque_bache_det` (
  `cod_cheque_bauchedet` int(32) NOT NULL AUTO_INCREMENT,
  `cod_cheque` int(32) NOT NULL,
  `monto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tipo` char(1) DEFAULT NULL COMMENT 'tipo: d (debito), c (credito)',
  `cuenta_contable` varchar(32) DEFAULT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(90) NOT NULL,
  PRIMARY KEY (`cod_cheque_bauchedet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cheque_tipo_situacion`
--

CREATE TABLE IF NOT EXISTS `cheque_tipo_situacion` (
  `cod_tipo_situacion` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_tipo_situacion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `cheque_tipo_situacion`
--

INSERT INTO `cheque_tipo_situacion` (`cod_tipo_situacion`, `descripcion`) VALUES
(1, 'Activa'),
(2, 'Anulada'),
(3, 'Dañada'),
(4, 'Deposito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE IF NOT EXISTS `clientes` (
  `id_cliente` int(32) NOT NULL AUTO_INCREMENT,
  `cod_cliente` varchar(80) NOT NULL,
  `nombre` varchar(80) NOT NULL,
  `fnacimiento` date NOT NULL,
  `representante` varchar(80) NOT NULL DEFAULT '',
  `direccion` varchar(200) NOT NULL,
  `altena` varchar(200) NOT NULL,
  `alterna2` varchar(200) NOT NULL,
  `telefonos` varchar(50) NOT NULL,
  `fax` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `permitecredito` tinyint(1) NOT NULL,
  `limite` double(10,2) NOT NULL,
  `dias` int(11) NOT NULL,
  `tolerancia` int(32) NOT NULL,
  `porc_parcial` decimal(10,2) NOT NULL,
  `porc_descuento_global` decimal(10,2) NOT NULL,
  `calc_reten_impuesto_islr` tinyint(1) NOT NULL,
  `calc_reten_impuesto_iva` tinyint(1) NOT NULL,
  `cod_vendedor` int(32) NOT NULL,
  `cod_zona` int(32) NOT NULL,
  `rif` varchar(50) NOT NULL,
  `nit` varchar(50) NOT NULL,
  `contribuyente_especial` tinyint(1) NOT NULL,
  `retenido_por_cliente` decimal(10,2) NOT NULL,
  `cod_tipo_cliente` int(32) NOT NULL,
  `cod_entidad` int(11) NOT NULL,
  `cod_tipo_precio` int(32) NOT NULL,
  `clase` varchar(50) NOT NULL,
  `calc_reten_impuesto_1x1000` tinyint(1) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `cuenta_contable` varchar(25) NOT NULL,
  `cod_mediq` int(11) NOT NULL,
  PRIMARY KEY (`id_cliente`),
  KEY `fk_zona` (`cod_zona`),
  KEY `fk_cod_tipo_precio` (`cod_tipo_precio`),
  KEY `fk_cod_tipo_cliente` (`cod_tipo_cliente`),
  KEY `fk_cod_vendedor` (`cod_vendedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_cliente`, `cod_cliente`, `nombre`, `fnacimiento`, `representante`, `direccion`, `altena`, `alterna2`, `telefonos`, `fax`, `email`, `permitecredito`, `limite`, `dias`, `tolerancia`, `porc_parcial`, `porc_descuento_global`, `calc_reten_impuesto_islr`, `calc_reten_impuesto_iva`, `cod_vendedor`, `cod_zona`, `rif`, `nit`, `contribuyente_especial`, `retenido_por_cliente`, `cod_tipo_cliente`, `cod_entidad`, `cod_tipo_precio`, `clase`, `calc_reten_impuesto_1x1000`, `estado`, `cuenta_contable`, `cod_mediq`) VALUES
(1, '00001', 'ASYS CONSULTORES DE SISTEMAS C.A.', '2012-07-01', 'JOSE MORALES', 'AV. 20 SECTOR PARAISO MARACAIBO ZULIA', '', '', '02934310161', '', 'info@asys.com.ve', 1, 1000000.00, 30, 0, 0.00, 0.00, 0, 0, 1, 3, 'J304203993', '', 0, 0.00, 2, 3, 1, '', 0, 'A', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id_compra` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_compra` varchar(32) NOT NULL DEFAULT 'S/I',
  `id_proveedor` int(32) NOT NULL,
  `cod_vendedor` int(32) NOT NULL,
  `fechacompra` date NOT NULL DEFAULT '0000-00-00',
  `montoItemscompra` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ivaTotalcompra` decimal(10,2) NOT NULL DEFAULT '0.00',
  `TotalTotalcompra` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monto_excento` decimal(11,0) NOT NULL,
  `cantidad_items` int(32) NOT NULL DEFAULT '0',
  `cod_estatus` int(32) unsigned DEFAULT NULL,
  `fecha_pago` date NOT NULL DEFAULT '0000-00-00',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(40) NOT NULL,
  `responsable` varchar(80) NOT NULL,
  `centrocosto` varchar(100) NOT NULL,
  `num_factura_compra` varchar(80) NOT NULL,
  `num_cont_factura` int(10) DEFAULT NULL,
  `cod_requi` int(11) NOT NULL,
  `estado` varchar(45) NOT NULL,
  `cod_cotizacion` int(11) DEFAULT NULL,
  `codigo_ref` int(11) NOT NULL,
  `dias_credito` int(11) NOT NULL,
  `unidad` varchar(45) NOT NULL,
  `centro_costo` varchar(45) NOT NULL,
  `diasentrega` varchar(20) NOT NULL,
  `tipomoneda` varchar(20) NOT NULL,
  `tipo` int(11) NOT NULL,
  `formapago` varchar(20) NOT NULL,
  `concepto` text NOT NULL,
  `condicioncompra` varchar(20) NOT NULL,
  `montodivisa` varchar(20) NOT NULL,
  `tasacambio` varchar(20) NOT NULL,
  `obser` varchar(200) NOT NULL,
  `entrega` varchar(100) NOT NULL,
  `compra` varchar(100) NOT NULL,
  PRIMARY KEY (`id_compra`),
  KEY `fk_cod_vendedor2` (`cod_vendedor`),
  KEY `fk_usuario` (`usuario_creacion`),
  KEY `fk_cod_estatus` (`cod_estatus`),
  KEY `id_proveedor` (`id_proveedor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_detalle`
--

CREATE TABLE IF NOT EXISTS `compra_detalle` (
  `id_detalle_compra` int(32) NOT NULL AUTO_INCREMENT,
  `id_compra` int(32) unsigned DEFAULT NULL,
  `id_item` int(32) unsigned DEFAULT NULL,
  `_item_almacen` int(32) DEFAULT NULL,
  `_item_cantidad` decimal(32,0) NOT NULL DEFAULT '0',
  `_item_preciosiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalsiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalconiva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `codfabricante` varchar(40) NOT NULL,
  `piva` varchar(10) NOT NULL,
  `_tiva` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id_detalle_compra`),
  KEY `fk_id_compra` (`id_compra`),
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_detalle_formapago`
--

CREATE TABLE IF NOT EXISTS `compra_detalle_formapago` (
  `cod_compra_detalle_formapago` int(32) NOT NULL AUTO_INCREMENT,
  `id_compra` int(32) unsigned NOT NULL DEFAULT '0',
  `totalizar_monto_cancelar` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_saldo_pendiente` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_cambio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_efectivo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opt_cheque` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nombre_banco` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `opt_tarjeta` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_tipo_tarjeta` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_formapago',
  `opt_deposito` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_banco_deposito` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `fecha_vencimiento` date NOT NULL DEFAULT '0000-00-00',
  `observacion` varchar(600) NOT NULL,
  `persona_contacto` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `opt_otrodocumento` tinyint(1) NOT NULL,
  `totalizar_tipo_otrodocumento` int(32) NOT NULL DEFAULT '0' COMMENT 'Tipo de documento',
  `totalizar_monto_otrodocumento` decimal(10,2) NOT NULL,
  `totalizar_nro_otrodocumento` int(32) NOT NULL,
  `totalizar_banco_otrodocumento` int(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_compra_detalle_formapago`),
  KEY `id_compra` (`id_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compra_impuestos`
--

CREATE TABLE IF NOT EXISTS `compra_impuestos` (
  `id_compra_impuestos` int(32) NOT NULL AUTO_INCREMENT,
  `id_compra` int(32) unsigned NOT NULL,
  `totalizar_base_retencion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_pbase_retencion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descripcion_base_retencion` int(32) NOT NULL DEFAULT '0' COMMENT 'fk_cod_impuesto_iva',
  `cod_impuesto_iva` int(32) NOT NULL,
  `totalizar_monto_iva2` decimal(10,2) NOT NULL,
  `totalizar_monto_1x1000` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_compra_impuestos`),
  KEY `id_compra` (`id_compra`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `conciliacion_bancaria`
--

CREATE TABLE IF NOT EXISTS `conciliacion_bancaria` (
  `cod_conciliacion` int(32) NOT NULL AUTO_INCREMENT,
  `fecha_inicial` date NOT NULL,
  `fecha_final` date NOT NULL,
  `saldo_inicial` decimal(10,2) NOT NULL,
  `saldo_final` decimal(10,2) NOT NULL,
  `saldo_libros` decimal(10,2) NOT NULL,
  `mon_xcon_depo` decimal(10,2) NOT NULL,
  `mon_xcon_cheque` decimal(10,2) NOT NULL,
  `mon_xcon_nc` decimal(10,2) NOT NULL,
  `mon_xcon_nd` decimal(10,2) NOT NULL,
  `cant_tran_cheque_` int(32) NOT NULL,
  `cant_tran_depo_` int(32) NOT NULL,
  `cant_tran_nc_` int(32) NOT NULL,
  `cant_tran_nd_` int(32) NOT NULL,
  `mon_tran_cheque_` decimal(10,2) NOT NULL,
  `mon_tran_depo_` decimal(10,2) NOT NULL,
  `mon_tran_nc_` decimal(10,2) NOT NULL,
  `mon_tran_nd_` decimal(10,2) NOT NULL,
  `cant_xcon_cheque` int(32) NOT NULL,
  `cant_xcon_depo` int(32) NOT NULL,
  `cant_xcon_nc` int(32) NOT NULL,
  `cant_xcon_nd` int(32) NOT NULL,
  `monto_total` decimal(10,2) NOT NULL,
  `cod_tesor_bancodet` bigint(32) NOT NULL,
  `usuario` varchar(32) NOT NULL,
  `fecha_realizado` date NOT NULL,
  `estado` varchar(32) NOT NULL,
  PRIMARY KEY (`cod_conciliacion`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `correlativos`
--

CREATE TABLE IF NOT EXISTS `correlativos` (
  `campo` varchar(32) NOT NULL,
  `formato` varchar(32) NOT NULL,
  `contador` int(32) NOT NULL,
  `descripcion` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `correlativos`
--

INSERT INTO `correlativos` (`campo`, `formato`, `contador`, `descripcion`) VALUES
('cod_factura', '00000000', 1, 'Correlativo de Factura'),
('cod_boleto', '00000', 1, 'Correlativo de Boleto'),
('cod_producto', '00000', 0, 'Correlativo de Producto'),
('cod_servicio', '00000', 1, 'Correlativo de Servicio'),
('cod_factura_boleto', '00000', 1, 'Correlativo de Factura de Boleto'),
('cod_pago_o_abono', '00000', 1, 'Correlativo de Pago o Abono'),
('cod_codebar', '0000000000000000', 1, 'Correlativo de Codigo de Barra (Boleto)'),
('cod_cliente', '00000', 1, 'Correlativo de Cliente'),
('cod_proveedor', '00000', 1, 'Codigo del Proveedor'),
('cod_compra', '00000', 1, 'Cod. de Compra'),
('cod_pago_o_abonoCXP', '00000', 1, 'Cod. de Compra Pago o Abono'),
('cod_correlativo_islr', '00000000', 1, 'Correlativo Impuesto Sobre la Renta'),
('cod_correlativo_iva', '00000000', 1, 'Correlativo I.V.A.'),
('cod_cotizacion', '000000', 1, 'Correlativo de Presupuesto/Cotizacion'),
('cod_pedido', '000000', 1, 'Correlativo de Pedidos'),
('cod_nota', '00000', 1, 'Correlativo de Notas de Entrega'),
('cod_devolucion', '00000000', 1, 'Correlativo de Devoluciones');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE IF NOT EXISTS `cotizaciones` (
  `codigo` int(11) NOT NULL,
  `cod_proveedor` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `fecha_recibida` date NOT NULL,
  `estatus` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `tiempo_entrega` int(11) NOT NULL,
  `tiempo_garantia` int(11) NOT NULL,
  `porcentaje_descuento` decimal(10,0) NOT NULL,
  `total` decimal(17,2) NOT NULL,
  `tipo_pago` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `dias_pago` int(11) NOT NULL,
  `cod_requisicion` int(11) NOT NULL,
  `tipodescuento` varchar(25) COLLATE utf8_spanish_ci NOT NULL,
  `observaciones` varchar(500) COLLATE utf8_spanish_ci NOT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones_detalles`
--

CREATE TABLE IF NOT EXISTS `cotizaciones_detalles` (
  `cod_cotizacion` int(11) NOT NULL,
  `cod_producto` varchar(15) CHARACTER SET utf8 COLLATE utf8_spanish2_ci NOT NULL,
  `cantidad` decimal(11,6) NOT NULL,
  `precio` decimal(17,6) NOT NULL,
  `descuento` decimal(17,2) NOT NULL,
  `iva` decimal(17,2) NOT NULL,
  `estatus` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_detalle_formapago`
--

CREATE TABLE IF NOT EXISTS `cotizacion_detalle_formapago` (
  `cod_cotizacion_detalle_formapago` int(32) NOT NULL AUTO_INCREMENT,
  `id_cotizacion` int(32) unsigned NOT NULL DEFAULT '0',
  `totalizar_monto_cancelar` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_saldo_pendiente` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_cambio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_efectivo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opt_cheque` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nombre_banco` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `opt_tarjeta` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_tipo_tarjeta` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_formapago',
  `opt_deposito` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_banco_deposito` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `fecha_vencimiento` date NOT NULL,
  `observacion` varchar(600) NOT NULL,
  `persona_contacto` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `opt_otrodocumento` tinyint(1) NOT NULL,
  `totalizar_tipo_otrodocumento` int(32) NOT NULL COMMENT 'Tipo de documento',
  `totalizar_monto_otrodocumento` decimal(10,2) NOT NULL,
  `totalizar_nro_otrodocumento` int(32) NOT NULL,
  `totalizar_banco_otrodocumento` int(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_cotizacion_detalle_formapago`),
  KEY `id_cotizacion` (`id_cotizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_impuestos`
--

CREATE TABLE IF NOT EXISTS `cotizacion_impuestos` (
  `id_cotizacion_impuestos` int(32) NOT NULL AUTO_INCREMENT,
  `id_cotizacion` int(32) unsigned NOT NULL,
  `totalizar_base_retencion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_pbase_retencion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descripcion_base_retencion` int(32) NOT NULL DEFAULT '0' COMMENT 'fk_cod_impuesto_iva',
  `cod_impuesto_iva` int(32) NOT NULL,
  `totalizar_monto_iva2` decimal(10,2) NOT NULL,
  `totalizar_monto_1x1000` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cotizacion_impuestos`),
  KEY `id_factura` (`id_cotizacion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_presupuesto`
--

CREATE TABLE IF NOT EXISTS `cotizacion_presupuesto` (
  `id_cotizacion` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_cotizacion` varchar(32) NOT NULL DEFAULT 'S/I',
  `id_cliente` int(32) NOT NULL,
  `cod_vendedor` int(32) NOT NULL,
  `fecha_cotizacion` date NOT NULL DEFAULT '0000-00-00',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descuentosItemCotizacion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `montoItemsCotizacion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ivaTotalCotizacion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `TotalTotalCotizacion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cantidad_items` int(32) NOT NULL DEFAULT '0',
  `totalizar_sub_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descuento_parcial` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_operacion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_pdescuento_global` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descuento_global` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_base_imponible` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_iva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_general` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_retencion` decimal(10,2) NOT NULL,
  `cod_estatus` int(32) unsigned DEFAULT NULL,
  `fecha_pago` date NOT NULL DEFAULT '0000-00-00',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(40) NOT NULL,
  PRIMARY KEY (`id_cotizacion`),
  KEY `fk_cod_vendedor2` (`cod_vendedor`),
  KEY `fk_usuario` (`usuario_creacion`),
  KEY `fk_id_cliente` (`id_cliente`),
  KEY `fk_cod_estatus` (`cod_estatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacion_presupuesto_detalle`
--

CREATE TABLE IF NOT EXISTS `cotizacion_presupuesto_detalle` (
  `id_cotizacion_presupuesto_detalle` int(32) NOT NULL AUTO_INCREMENT,
  `id_cotizacion` int(32) unsigned DEFAULT NULL,
  `id_item` int(32) unsigned DEFAULT NULL,
  `_item_almacen` int(32) DEFAULT NULL,
  `_item_descripcion` varchar(32) NOT NULL,
  `_item_cantidad` decimal(32,0) NOT NULL DEFAULT '0',
  `_item_preciosiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_descuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_montodescuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_piva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalsiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalconiva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_cotizacion_presupuesto_detalle`),
  KEY `fk_id_cotizacion` (`id_cotizacion`),
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwpreejc`
--

CREATE TABLE IF NOT EXISTS `cwpreejc` (
  `RecNo` int(11) NOT NULL AUTO_INCREMENT,
  `RecPrePar` int(11) NOT NULL DEFAULT '0',
  `Monto` decimal(22,2) NOT NULL DEFAULT '0.00',
  `saldo` decimal(20,2) NOT NULL,
  `Fecha` date NOT NULL DEFAULT '0000-00-00',
  `RecNoOrders` int(11) NOT NULL DEFAULT '0',
  `Partida` varchar(13) COLLATE utf8_spanish_ci NOT NULL,
  `Sector` varchar(3) COLLATE utf8_spanish_ci NOT NULL,
  `Programa` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `Actividad` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `ordinal` varchar(12) COLLATE utf8_spanish_ci DEFAULT NULL,
  `usuario` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `Marca` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`RecNo`),
  KEY `RecNoOrders` (`RecNoOrders`),
  KEY `Partida` (`Partida`),
  KEY `RecPrePar` (`RecPrePar`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cwsector`
--

CREATE TABLE IF NOT EXISTS `cwsector` (
  `RecNo` int(11) NOT NULL AUTO_INCREMENT,
  `Sec` char(2) COLLATE utf8_spanish_ci NOT NULL,
  `Denominacion` varchar(250) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`RecNo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxc_edocuenta`
--

CREATE TABLE IF NOT EXISTS `cxc_edocuenta` (
  `cod_edocuenta` int(32) NOT NULL AUTO_INCREMENT,
  `id_cliente` int(32) NOT NULL,
  `documento` varchar(32) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `control` int(11) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `monto_base` float(10,2) NOT NULL,
  `monto_iva` float(10,2) NOT NULL,
  `fecha_emision` date NOT NULL DEFAULT '0000-00-00',
  `fecha_autorizado` date NOT NULL,
  `observacion` varchar(600) NOT NULL,
  `vencimiento_fecha` date NOT NULL DEFAULT '0000-00-00',
  `vencimiento_persona_contacto` varchar(100) DEFAULT NULL,
  `vencimiento_telefono` varchar(100) DEFAULT NULL,
  `vencimiento_descripcion` varchar(100) DEFAULT NULL,
  `marca` char(1) DEFAULT NULL COMMENT 'X: Pagada',
  `usuario_creacion` varchar(90) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `unidad` int(11) NOT NULL,
  `serie` varchar(25) NOT NULL,
  `clave` varchar(25) NOT NULL,
  PRIMARY KEY (`cod_edocuenta`),
  KEY `id_cliente` (`id_cliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxc_edocuenta_detalle`
--

CREATE TABLE IF NOT EXISTS `cxc_edocuenta_detalle` (
  `cod_edocuenta_detalle` int(32) NOT NULL AUTO_INCREMENT,
  `cod_edocuenta` int(32) NOT NULL,
  `documento` varchar(32) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_emision_edodet` date NOT NULL,
  `tipo` char(1) NOT NULL COMMENT 'd:Debito;c:Credito',
  `monto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `estado` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: Si esta Activa, 0: asiento anulado',
  `usuario_creacion` varchar(90) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `marca` varchar(1) NOT NULL COMMENT 'X: Pagada, P:Por Pagar',
  PRIMARY KEY (`cod_edocuenta_detalle`),
  KEY `cod_edocuenta` (`cod_edocuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxc_edocuenta_formapago`
--

CREATE TABLE IF NOT EXISTS `cxc_edocuenta_formapago` (
  `cod_cxc_edocuenta_formapago` int(32) NOT NULL AUTO_INCREMENT,
  `cod_edocuenta_detalle` int(32) NOT NULL,
  `totalizar_monto_cancelar` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_saldo_pendiente` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_cambio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_efectivo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opt_cheque` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nombre_banco` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `opt_tarjeta` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_tipo_tarjeta` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_formapago',
  `opt_deposito` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_banco_deposito` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `opt_otrodocumento` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_tipo_otrodocumento` int(32) NOT NULL DEFAULT '0',
  `totalizar_monto_otrodocumento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_otrodocumento` int(32) NOT NULL DEFAULT '0',
  `totalizar_banco_otrodocumento` int(32) NOT NULL DEFAULT '0',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(90) NOT NULL,
  PRIMARY KEY (`cod_cxc_edocuenta_formapago`),
  KEY `cod_edocuenta_detalle` (`cod_edocuenta_detalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxc_edocuenta_pago`
--

CREATE TABLE IF NOT EXISTS `cxc_edocuenta_pago` (
  `id_edocuenta` int(11) NOT NULL,
  `id_pago` int(11) NOT NULL,
  `retiva_f` varchar(10) NOT NULL,
  `retislr_f` varchar(10) NOT NULL,
  `im_f` float(10,2) NOT NULL,
  PRIMARY KEY (`id_edocuenta`,`id_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxc_pago`
--

CREATE TABLE IF NOT EXISTS `cxc_pago` (
  `id_pago` int(11) NOT NULL AUTO_INCREMENT,
  `mbase_p` float(10,2) NOT NULL,
  `miva_p` float(10,2) NOT NULL,
  `retiva_p` float(10,2) NOT NULL,
  `retislr_p` float(10,2) NOT NULL,
  `im_p` float(10,2) NOT NULL,
  `total_p` float(10,2) NOT NULL,
  `id_banco` int(11) NOT NULL,
  `forma_p` varchar(2) NOT NULL,
  `trans_p` varchar(50) NOT NULL,
  `fecha_p` date NOT NULL,
  PRIMARY KEY (`id_pago`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxp_edocuenta`
--

CREATE TABLE IF NOT EXISTS `cxp_edocuenta` (
  `cod_edocuenta` int(32) NOT NULL AUTO_INCREMENT,
  `id_proveedor` int(32) NOT NULL,
  `documento` varchar(32) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `monto` decimal(10,2) NOT NULL,
  `fecha_emision` date NOT NULL DEFAULT '0000-00-00',
  `observacion` varchar(600) NOT NULL,
  `vencimiento_fecha` date NOT NULL DEFAULT '0000-00-00',
  `vencimiento_persona_contacto` varchar(100) DEFAULT NULL,
  `vencimiento_telefono` varchar(100) DEFAULT NULL,
  `vencimiento_descripcion` varchar(100) DEFAULT NULL,
  `marca` char(1) DEFAULT NULL COMMENT 'X: Pagada',
  `usuario_creacion` varchar(90) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `fecha_anulacion` varchar(25) NOT NULL,
  `observacion_anulado` varchar(250) NOT NULL,
  PRIMARY KEY (`cod_edocuenta`),
  KEY `id_proveedor` (`id_proveedor`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxp_edocuenta_detalle`
--

CREATE TABLE IF NOT EXISTS `cxp_edocuenta_detalle` (
  `cod_edocuenta_detalle` int(32) NOT NULL AUTO_INCREMENT,
  `cod_edocuenta` int(32) NOT NULL,
  `documento` varchar(32) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha_emision_edodet` date NOT NULL DEFAULT '0000-00-00',
  `tipo` char(1) NOT NULL COMMENT 'd:Debito;c:Credito',
  `monto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `estado` tinyint(1) NOT NULL DEFAULT '1' COMMENT '1: Si esta Activa, 0: asiento anulado',
  `usuario_creacion` varchar(90) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `marca` varchar(1) NOT NULL COMMENT 'X: Pagada, P:Por Pagar',
  `fecha_anulacion` varchar(25) NOT NULL,
  `observacion_anulado` varchar(250) NOT NULL,
  PRIMARY KEY (`cod_edocuenta_detalle`),
  KEY `cod_edocuenta` (`cod_edocuenta`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxp_edocuenta_formapago`
--

CREATE TABLE IF NOT EXISTS `cxp_edocuenta_formapago` (
  `cod_cxp_edocuenta_formapago` int(32) NOT NULL AUTO_INCREMENT,
  `cod_edocuenta_detalle` int(32) NOT NULL,
  `totalizar_monto_cancelar` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_saldo_pendiente` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_cambio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_efectivo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opt_cheque` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nombre_banco` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `opt_tarjeta` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_tipo_tarjeta` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_formapago',
  `opt_deposito` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_banco_deposito` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `opt_otrodocumento` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_tipo_otrodocumento` int(32) NOT NULL DEFAULT '0',
  `totalizar_monto_otrodocumento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_otrodocumento` int(32) NOT NULL DEFAULT '0',
  `totalizar_banco_otrodocumento` int(32) NOT NULL DEFAULT '0',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(90) NOT NULL,
  PRIMARY KEY (`cod_cxp_edocuenta_formapago`),
  KEY `cod_edocuenta_detalle` (`cod_edocuenta_detalle`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxp_factura`
--

CREATE TABLE IF NOT EXISTS `cxp_factura` (
  `id_factura` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_factura` varchar(32) NOT NULL DEFAULT 'S/I',
  `cod_factura_fiscal` varchar(32) NOT NULL,
  `cod_cont_factura` varchar(32) NOT NULL,
  `id_cxp_edocta` int(32) NOT NULL,
  `fecha_factura` date NOT NULL DEFAULT '0000-00-00',
  `fecha_recepcion` date NOT NULL DEFAULT '0000-00-00',
  `monto_base` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monto_exento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `anticipo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monto_total_con_iva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monto_total_sin_iva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cod_impuesto` int(32) NOT NULL DEFAULT '0',
  `porcentaje_iva_mayor` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monto_iva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `porcentaje_iva_retenido` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monto_retenido` decimal(10,2) NOT NULL DEFAULT '0.00',
  `total_a_pagar` decimal(10,2) NOT NULL,
  `cod_estatus` int(32) unsigned DEFAULT NULL,
  `fecha_pago` date NOT NULL DEFAULT '0000-00-00',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(40) NOT NULL,
  `tipo` varchar(5) NOT NULL COMMENT 'Factura o Nota de credit',
  `factura_afectada` varchar(32) NOT NULL,
  `libro_compras` int(1) NOT NULL DEFAULT '0',
  `cod_correlativo_iva` bigint(32) NOT NULL,
  `cod_correlativo_islr` bigint(32) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `fk_usuario` (`usuario_creacion`),
  KEY `fk_id_cliente` (`id_cxp_edocta`),
  KEY `fk_cod_estatus` (`cod_estatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxp_factura_detalle`
--

CREATE TABLE IF NOT EXISTS `cxp_factura_detalle` (
  `id_factura_detalle` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `id_factura_fk` int(32) NOT NULL,
  `monto_base` decimal(10,2) NOT NULL DEFAULT '0.00',
  `porcentaje_retenido` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cod_impuesto` int(32) NOT NULL DEFAULT '0',
  `monto_retenido` decimal(10,2) NOT NULL DEFAULT '0.00',
  `id_item` int(32) unsigned DEFAULT NULL,
  PRIMARY KEY (`id_factura_detalle`),
  KEY `fk_cod_estatus` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxp_factura_medico`
--

CREATE TABLE IF NOT EXISTS `cxp_factura_medico` (
  `cxp_factura_medico_pk` int(11) NOT NULL AUTO_INCREMENT,
  `medico_fk` int(9) NOT NULL,
  `factura_fk` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_fac` date NOT NULL,
  `monto` decimal(13,2) NOT NULL,
  `estatus` int(1) NOT NULL,
  `cxp_edocta_fk` int(11) NOT NULL,
  `paciente` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `serie` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `servicio` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `id_cxp_mediq` int(11) NOT NULL,
  PRIMARY KEY (`cxp_factura_medico_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='facturas a pagar a los medicos' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cxp_factura_pago`
--

CREATE TABLE IF NOT EXISTS `cxp_factura_pago` (
  `cxp_factura_pago_pk` int(11) NOT NULL AUTO_INCREMENT,
  `cxp_edocuenta_detalle_fk` int(11) NOT NULL COMMENT 'pago  realizado cargado en cxp_edocuenta_detalle',
  `cxp_factura_fk` int(11) NOT NULL COMMENT 'factura cargada en  cxp_factura',
  PRIMARY KEY (`cxp_factura_pago_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='tabla que contiene la relacion entre pagos y facturas' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE IF NOT EXISTS `departamentos` (
  `cod_departamento` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_departamento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`cod_departamento`, `descripcion`) VALUES
(1, 'Departamento Unico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `divisas`
--

CREATE TABLE IF NOT EXISTS `divisas` (
  `id_divisa` int(11) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) DEFAULT NULL,
  `Abreviatura` varchar(10) DEFAULT NULL,
  `Cambio_unico` float DEFAULT NULL,
  PRIMARY KEY (`id_divisa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Volcado de datos para la tabla `divisas`
--

INSERT INTO `divisas` (`id_divisa`, `Nombre`, `Abreviatura`, `Cambio_unico`) VALUES
(14, 'Bolivar', 'Bs.', 1),
(15, 'Dolar', '$', 4.33),
(16, 'Euros', 'eur', 0),
(17, 'Pesos', '$', 1890),
(18, 'Pesos Panama', '$', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidades`
--

CREATE TABLE IF NOT EXISTS `entidades` (
  `cod_entidad` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(250) NOT NULL,
  PRIMARY KEY (`cod_entidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `entidades`
--

INSERT INTO `entidades` (`cod_entidad`, `descripcion`) VALUES
(1, 'Persona Natural '),
(3, 'Persona Juridica ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidades_proveedor`
--

CREATE TABLE IF NOT EXISTS `especialidades_proveedor` (
  `cod_especialidad` int(32) NOT NULL AUTO_INCREMENT,
  `especialidad` varchar(250) NOT NULL,
  `id_pclasif` int(11) NOT NULL,
  PRIMARY KEY (`cod_especialidad`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Volcado de datos para la tabla `especialidades_proveedor`
--

INSERT INTO `especialidades_proveedor` (`cod_especialidad`, `especialidad`, `id_pclasif`) VALUES
(1, 'TECNOLOGIA', 1),
(4, 'MATERIAL EMPAQUE', 1),
(5, 'MAT. OFICINA Y ACCESORIOS', 1),
(6, 'SERVICIOS BASICOS', 1),
(7, 'MANTENIMIENTO Y REPARACIONES', 1),
(8, 'HONORARIOS PROFESIONALES', 1),
(9, 'TRANSPORTE', 1),
(10, 'SEGURIDAD Y VIGILANCIA', 1),
(11, 'PUBLICIDAD Y PROPAGANDA', 1),
(12, 'REMODELACION Y DECORACIONES', 1),
(13, 'ALQUILERES Y CONDOMINIOS', 1),
(14, 'LIMPIEZA Y ART. DE LIMPIEZA', 1),
(15, 'EMPLEADOS', 1),
(16, 'PROVEEDOR CAJA CHICA', 1),
(17, 'GUARDERIAS', 1),
(18, 'OTROS PROVEEDORES NACIONALES', 1),
(19, 'INSUMOS MEDICOS', 1),
(22, 'CIRUJANO BUCAL Y MAXILOFACIAL', 2),
(23, 'GUIA DIAGNOSTICA', 2),
(24, 'MEDICINA INTERNA', 2),
(25, 'GASTROENTEROLOGIA PEDIATRICA', 2),
(26, 'PEDIATRIA', 2),
(27, 'GASTROPEDIATRIA', 2),
(28, 'OTORRINOLARINGOLOGIA', 2),
(29, 'GINECOLOGIA', 2),
(30, 'UROLOGIA', 2),
(31, 'ODONTOLOGIA', 2),
(32, 'TRAUMATOLOGIA', 2),
(33, 'RADIOLOGIA', 2),
(34, 'GASTROENTEROLOGIA', 2),
(35, 'CARDIOLOGIA', 2),
(36, 'RESIDENTE', 2),
(37, 'CIRUGIA GENERAL', 2),
(38, 'CIRUJANO ONCOLOGO', 2),
(39, 'FISIATRIA', 2),
(40, 'MASTOLOGIA', 2),
(41, 'ANESTESIOLOGO', 2),
(42, 'GINECO_OBSTETRA', 2),
(43, 'NEFROLOGIA', 2),
(44, 'CIRUGÃA PLASTICA', 2),
(45, 'CIRUJANO UROLOGO', 2),
(46, 'MEDICINA FAMILIAR', 2),
(47, 'NEUROLOGÃA', 2),
(48, 'ENDOCRINOLOGIA', 2),
(49, 'CIRUGÃA PEDIATRICA', 2),
(50, 'LABORATORIO', 2),
(51, 'NEUROCIRUGÃA', 2),
(52, 'NEUMONOLOGIA', 2),
(53, 'ONCOLOGIA', 2),
(54, 'TECNICO AUDIOLOGO', 2),
(55, 'FISIOTERAPIA', 2),
(56, 'DERMATOLOGIA', 2),
(57, 'OFTALMOLOGIA', 2),
(58, 'ALERGOLOGIA', 2),
(59, 'PSICOLOGIA', 2),
(60, 'TECNICO CARDIOPULMONAR', 2),
(61, 'ANATOMIA PATOLOGICA', 2),
(62, 'BIOANALISIS', 2),
(63, 'CIRUJANO DE MANO', 2),
(64, 'MEDICO GENERAL', 2),
(65, 'MEDICINA OCUPACIONAL', 2),
(66, 'MEDICO DE PLANTA', 2),
(67, 'TRAUMATOLOGIA Y ORTOPEDIA', 2),
(68, 'ODONTOPEDIATRICA', 2),
(69, 'ESTETICA Y COSMETOLOGIA', 2),
(70, 'CIRUGIA Y UROLOGIA PEDIATRICA', 2),
(71, 'RADIOTERAPIA', 2),
(72, 'HEMATOLOGO', 2),
(73, 'PSIQUIATRA', 2),
(74, 'TECNICO RADIOLOGO', 2),
(75, 'PEDIATRA Y PUERICULTURA', 2),
(76, 'CARDIOLOGIA PEDIATRICA', 2),
(78, 'NUTRICIONISTA', 2),
(79, ' SELECCIONE...', 0),
(80, 'OTROS GASTOS AL PERSONAL', 1),
(81, 'Electricidad', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE IF NOT EXISTS `estatus` (
  `cod_estatus` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(40) NOT NULL,
  `detalle_descripcion` text,
  PRIMARY KEY (`cod_estatus`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`cod_estatus`, `descripcion`, `detalle_descripcion`) VALUES
(1, 'En proceso', 'Su estatus inicial es "En Proceso" si:\r\n1.Cuando la factura es creada.\r\n2.Cuando la factura es creada y su pago es menor al total de la factura (queda con saldo pendiente por cancelar).'),
(2, 'Pagada', 'Su estatus inicial es "Pagada" si:\r\n1.Cuando la factura es Pagada pagada (con saldo pendiente cero(0)).'),
(3, 'Anulada', 'Su estatus inicial es "Anulada" si:\r\n1.Cuando la factura presenta fallas o se ha cometido un error al momento de generar.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE IF NOT EXISTS `factura` (
  `id_factura` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_factura` varchar(32) NOT NULL DEFAULT 'S/I',
  `cod_factura_fiscal` varchar(10) NOT NULL,
  `nroz` varchar(4) NOT NULL,
  `impresora_serial` varchar(50) NOT NULL,
  `id_cliente` int(32) NOT NULL,
  `cod_vendedor` int(32) NOT NULL,
  `fechaFactura` date NOT NULL DEFAULT '0000-00-00',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descuentosItemFactura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `montoItemsFactura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ivaTotalFactura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `TotalTotalFactura` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cantidad_items` int(32) NOT NULL DEFAULT '0',
  `totalizar_sub_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descuento_parcial` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_operacion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_pdescuento_global` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descuento_global` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_base_imponible` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_iva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_general` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_retencion` decimal(10,2) NOT NULL,
  `cod_estatus` int(32) unsigned DEFAULT NULL,
  `fecha_pago` date NOT NULL DEFAULT '0000-00-00',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(40) NOT NULL,
  PRIMARY KEY (`id_factura`),
  KEY `fk_cod_vendedor2` (`cod_vendedor`),
  KEY `fk_usuario` (`usuario_creacion`),
  KEY `fk_id_cliente` (`id_cliente`),
  KEY `fk_cod_estatus` (`cod_estatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_detalle`
--

CREATE TABLE IF NOT EXISTS `factura_detalle` (
  `id_detalle_factura` int(32) NOT NULL AUTO_INCREMENT,
  `id_factura` int(32) unsigned DEFAULT NULL,
  `id_item` int(32) unsigned DEFAULT NULL,
  `_item_almacen` int(32) DEFAULT NULL,
  `_item_descripcion` varchar(50) NOT NULL,
  `_item_cantidad` decimal(32,0) NOT NULL DEFAULT '0',
  `_item_preciosiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_descuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_montodescuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_piva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalsiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalconiva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detalle_factura`),
  KEY `fk_id_factura` (`id_factura`),
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_detalle_formapago`
--

CREATE TABLE IF NOT EXISTS `factura_detalle_formapago` (
  `cod_factura_detalle_formapago` int(32) NOT NULL AUTO_INCREMENT,
  `id_factura` int(32) unsigned NOT NULL DEFAULT '0',
  `totalizar_monto_cancelar` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_saldo_pendiente` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_cambio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_efectivo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opt_cheque` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nombre_banco` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `opt_tarjeta` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_tipo_tarjeta` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_formapago',
  `opt_deposito` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_banco_deposito` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `fecha_vencimiento` date NOT NULL,
  `observacion` varchar(600) NOT NULL,
  `persona_contacto` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `opt_otrodocumento` tinyint(1) NOT NULL,
  `totalizar_tipo_otrodocumento` int(32) NOT NULL COMMENT 'Tipo de documento',
  `totalizar_monto_otrodocumento` decimal(10,2) NOT NULL,
  `totalizar_nro_otrodocumento` int(32) NOT NULL,
  `totalizar_banco_otrodocumento` int(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_factura_detalle_formapago`),
  KEY `id_factura` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_devolucion`
--

CREATE TABLE IF NOT EXISTS `factura_devolucion` (
  `id_devolucion` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_devolucion` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `cod_factura` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `cod_devolucion_fiscal` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `nroz` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `impresora_serial` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_devolucion` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`id_devolucion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_impuestos`
--

CREATE TABLE IF NOT EXISTS `factura_impuestos` (
  `id_factura_impuestos` int(32) NOT NULL AUTO_INCREMENT,
  `id_factura` int(32) unsigned NOT NULL,
  `totalizar_base_retencion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_pbase_retencion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descripcion_base_retencion` int(32) NOT NULL DEFAULT '0' COMMENT 'fk_cod_impuesto_iva',
  `cod_impuesto_iva` int(32) NOT NULL,
  `totalizar_monto_iva2` decimal(10,2) NOT NULL,
  `totalizar_monto_1x1000` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_factura_impuestos`),
  KEY `id_factura` (`id_factura`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `firmas`
--

CREATE TABLE IF NOT EXISTS `firmas` (
  `cod_firmas` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo_persona` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nombre_persona` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden_reporte` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `cod_reporte` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `modulo` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_firmas`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulacion_impuestos`
--

CREATE TABLE IF NOT EXISTS `formulacion_impuestos` (
  `cod_formula` int(11) NOT NULL AUTO_INCREMENT,
  `formula` mediumtext NOT NULL,
  `cod_entidad` int(11) NOT NULL,
  `cod_tipo_impuesto` int(11) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_aplicacion` date NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_formula`),
  KEY `fk_cod_tipo_impuesto` (`cod_tipo_impuesto`),
  KEY `fk_cod_entidad` (`cod_entidad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `formulacion_impuestos`
--

INSERT INTO `formulacion_impuestos` (`cod_formula`, `formula`, `cod_entidad`, `cod_tipo_impuesto`, `descripcion`, `fecha_aplicacion`, `estado`, `fecha_creacion`, `usuario_creacion`) VALUES
(1, '$MONTO=($MONTOBASE*$PORCENTAJE)/100;', 3, 1, 'Retencion de Impuesto al Valor Agregado 75% Persona Juridica Domiciliada', '2010-01-01', 0, '2010-08-27 12:15:16', 'asys'),
(2, '$MONTO=($MONTOBASE*$PORCENTAJE)/100;', 3, 1, 'Retencion de Impuesto al Valor Agregado 100% Persona Juridica Domiciliada', '2010-01-01', 0, '2010-08-27 12:45:47', 'asys'),
(3, '$MONTO=($MONTOBASE*$PORCENTAJE)/100;', 1, 1, 'Retencion de Impuesto al Valor Agregado 75% Persona Natural Residente', '0000-00-00', 0, '2011-06-28 14:11:58', ''),
(4, '$MONTO=($MONTOBASE*$PORCENTAJE)/100;', 1, 1, 'Retencion de Impuesto al Valor Agregado 100% Persona Natural Residente', '0000-00-00', 0, '2011-06-28 14:32:58', ''),
(5, '$MONTO=($MONTOBASE*$PORCENTAJE)/100;', 2, 1, 'Retencion de Impuesto al Valor Agregado 75%	Persona Natural No Residente', '0000-00-00', 0, '2011-06-28 14:32:58', ''),
(6, '$MONTO=($MONTOBASE*$PORCENTAJE)/100;', 2, 1, 'Retencion de Impuesto al Valor Agregado 100% Persona Natural No Residente', '0000-00-00', 0, '2011-06-28 14:33:08', ''),
(7, '$MONTO=($MONTOBASE*$PORCENTAJE)/100;', 4, 1, 'Retencion de Impuesto al Valor Agregado 75% Persona Juridica No Domiciliada', '0000-00-00', 0, '2011-06-28 14:33:08', ''),
(8, '$MONTO=($MONTOBASE*$PORCENTAJE)/100;', 4, 1, 'Retencion de Impuesto al Valor Agregado 100% Persona Juridica No Domiciliada', '0000-00-00', 0, '2011-06-28 14:33:31', ''),
(9, '$MAYORA=$UT*$FACTORM;\r\n$SUSTRACCION=($UT*$FACTORSUST*$PORCENTAJE)/100;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTOBASE>=$MAYORA",$MONTO,0);\r\n$MONTO=SI("$MONTO>0",$MONTO-$SUSTRACCION,0);', 1, 2, 'Retencion ISLR Honorarios Profesionales Persona Natural Residente *****', '0000-00-00', 0, '2011-06-28 16:02:00', 'asys'),
(11, '$SUSTRACCION=$FACTORSUST;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTO>=$SUSTRACCION",$MONTO,0);', 3, 2, 'Retencion ISLR Honorarios Profesionales Persona Juridica *****', '0000-00-00', 0, '2011-06-28 16:12:21', 'asys'),
(14, '$MAYORA=$UT*$FACTORM;\r\n$SUSTRACCION=($UT*$FACTORSUST*$PORCENTAJE)/100;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTOBASE>=$MAYORA",$MONTO,0);\r\n$MONTO=SI("$MONTO>0",$MONTO-$SUSTRACCION,0);', 5, 2, 'Retencion ISLR Honorarios Profesionales Persona Natural Residenciada MEDICOS / ABOGADOS', '0000-00-00', 0, '2011-07-07 13:21:55', 'asys'),
(15, '$MAYORA=$UT*$FACTORM;\r\n$SUSTRACCION=($UT*$FACTORSUST*$PORCENTAJE)/100;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTOBASE>=$MAYORA",$MONTO,0);\r\n$MONTO=SI("$MONTO>0",$MONTO-$SUSTRACCION,0);', 1, 2, 'Retencion ISLR Comiciones Mercantiles PN', '0000-00-00', 0, '2011-07-07 13:31:12', 'asys'),
(16, '$MAYORA=$FACTOM;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTO>=$MAYORA",$MONTO,0);', 3, 2, 'Retencion ISLR Comisiones Mercantiles PJ', '0000-00-00', 0, '2011-07-07 13:31:57', 'asys'),
(17, '$MAYORA=$UT*$FACTORM;\r\n$SUSTRACCION=($UT*$FACTORSUST*$PORCENTAJE)/100;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTOBASE>=$MAYORA",$MONTO,0);\r\n$MONTO=SI("$MONTO>0",$MONTO-$SUSTRACCION,0);', 1, 2, 'Retencion ISLR Interes PN', '0000-00-00', 0, '2011-07-07 13:32:29', 'asys'),
(18, '$SUSTRACCION=$FACTORSUST;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTO>=$SUSTRACCION",$MONTO,0);', 3, 2, 'Retencion ISLR Intereses PJ', '0000-00-00', 0, '2011-07-07 13:32:46', 'asys'),
(19, '$MAYORA=$UT*$FACTORM;\r\n$SUSTRACCION=($UT*$FACTORSUST*$PORCENTAJE)/100;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTOBASE>=$MAYORA",$MONTO,0);\r\n$MONTO=SI("$MONTO>0",$MONTO-$SUSTRACCION,0);', 1, 2, 'Retencion ISLR Servicios PN', '0000-00-00', 0, '2011-07-07 13:33:11', 'asys'),
(20, '$SUSTRACCION=$FACTORSUST;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTO>=$SUSTRACCION",$MONTO,0);', 3, 2, 'Retencion ISLR Servicios PJ', '0000-00-00', 0, '2011-07-07 13:33:22', 'asys'),
(21, '$MAYORA=$UT*$FACTORM;\r\n$SUSTRACCION=($UT*$FACTORSUST*$PORCENTAJE)/100;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTOBASE>=$MAYORA",$MONTO,0);\r\n$MONTO=SI("$MONTO>0",$MONTO-$SUSTRACCION,0);', 1, 2, 'Retencion ISLR Arrendamiento de Bienes Inmuebles PN', '0000-00-00', 0, '2011-07-07 13:34:20', 'asys'),
(22, '$SUSTRACCION=$FACTORSUST;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTO>=$SUSTRACCION",$MONTO,0);', 3, 2, 'Retencion ISLR Arrendamiento de Bienes Inmuebles PJ', '0000-00-00', 0, '2011-07-07 13:35:40', 'asys'),
(23, '$MAYORA=$UT*$FACTORM;\r\n$SUSTRACCION=($UT*$FACTORSUST*$PORCENTAJE)/100;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTOBASE>=$MAYORA",$MONTO,0);\r\n$MONTO=SI("$MONTO>0",$MONTO-$SUSTRACCION,0);', 1, 2, 'Retencion ISLR Arrendamiento de Bienes Muebles PN', '0000-00-00', 0, '2011-07-07 13:36:57', 'asys'),
(24, '$SUSTRACCION=$FACTORSUST;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTO>=$SUSTRACCION",$MONTO,0);', 3, 2, 'Retencion ISLR Arrendamiento de Bienes Muebles PJ', '0000-00-00', 0, '2011-07-07 13:37:20', 'asys'),
(25, '$MAYORA=$UT*$FACTORM;\r\n$SUSTRACCION=($UT*$FACTORSUST*$PORCENTAJE)/100;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTOBASE>=$MAYORA",$MONTO,0);\r\n$MONTO=SI("$MONTO>0",$MONTO-$SUSTRACCION,0);', 1, 2, 'Retencion ISLR Gastos de Transporte Nacional y Fletes PN', '0000-00-00', 0, '2011-07-07 13:41:07', 'asys'),
(26, '$SUSTRACCION=$FACTORSUST;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTO>=$SUSTRACCION",$MONTO,0);', 3, 2, 'Retencion ISLR Gastos de Transporte Nacional y Fletes PJ', '0000-00-00', 0, '2011-07-07 13:41:49', 'asys'),
(27, '$MAYORA=$UT*$FACTORM;\r\n$SUSTRACCION=($UT*$FACTORSUST*$PORCENTAJE)/100;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTOBASE>=$MAYORA",$MONTO,0);\r\n$MONTO=SI("$MONTO>0",$MONTO-$SUSTRACCION,0);', 1, 2, 'Retencion ISLR Propaganda y Publicidad PN', '0000-00-00', 0, '2011-07-07 13:42:36', 'asys'),
(28, '$SUSTRACCION=$FACTORSUST;\r\n$MONTO=($MONTOBASE*$PORCENTAJE)/100;\r\n$MONTO=SI("$MONTO>=$SUSTRACCION",$MONTO,0);', 3, 2, 'Retencion ISLR Propaganda y Publicidad PJ', '0000-00-00', 0, '2011-07-07 13:42:52', 'asys');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo`
--

CREATE TABLE IF NOT EXISTS `grupo` (
  `cod_grupo` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_grupo`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `grupo`
--

INSERT INTO `grupo` (`cod_grupo`, `descripcion`) VALUES
(1, 'Grupo Unico');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuestos_islr`
--

CREATE TABLE IF NOT EXISTS `impuestos_islr` (
  `cod_impuesto_islr` int(16) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imponibleresidente` smallint(16) NOT NULL,
  `aplicaresidente` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `aplicanoresidente` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `imponiblenoresidente` int(16) NOT NULL,
  `alicuotanaturalde` decimal(5,2) NOT NULL,
  `sustraccionnaturalde` decimal(7,2) DEFAULT NULL,
  `pagomayoranaturalde` decimal(9,2) DEFAULT NULL,
  `alicuotanaturalnode` decimal(5,2) NOT NULL,
  `sustraccionnaturalnode` decimal(7,2) NOT NULL,
  `pagomayoranaturalnode` decimal(9,2) NOT NULL,
  `alicuotanaturalno` decimal(5,2) NOT NULL,
  `alicuotajuridica` decimal(5,2) NOT NULL,
  `sustraccionjuridica` decimal(9,2) DEFAULT NULL,
  `pagomayorajuridica` decimal(9,2) DEFAULT NULL,
  `alicuotajuridicano` decimal(5,2) NOT NULL,
  `retencionacumuladanaturalno` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `retencionacumuladajuridicano` varchar(1) COLLATE utf8_spanish_ci NOT NULL,
  `usuario_creacion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_impuesto_islr`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=890 ;

--
-- Volcado de datos para la tabla `impuestos_islr`
--

INSERT INTO `impuestos_islr` (`cod_impuesto_islr`, `descripcion`, `imponibleresidente`, `aplicaresidente`, `aplicanoresidente`, `imponiblenoresidente`, `alicuotanaturalde`, `sustraccionnaturalde`, `pagomayoranaturalde`, `alicuotanaturalnode`, `sustraccionnaturalnode`, `pagomayoranaturalnode`, `alicuotanaturalno`, `alicuotajuridica`, `sustraccionjuridica`, `pagomayorajuridica`, `alicuotajuridicano`, `retencionacumuladanaturalno`, `retencionacumuladajuridicano`, `usuario_creacion`, `fecha_creacion`) VALUES
(1, 'Honorarios Profesionales', 100, 'S', 'N', 90, 3.00, 162.50, 200.00, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 0.00, 34.00, 'S', 'N', '', '2010-07-13 16:20:14'),
(2, 'Pago a Contratista y Subcontratista', 100, 'S', 'S', 100, 1.00, 54.17, 4583.33, 0.00, 0.00, 0.00, 34.00, 2.00, 0.00, 0.00, 34.00, 'N', '', '', '0000-00-00 00:00:00'),
(3, 'Arrendamientos Inmuebles', 100, 'S', 'S', 100, 3.00, 115.00, 3833.00, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 25.00, 34.00, 'S', '', '', '0000-00-00 00:00:00'),
(4, 'Arrendamiento Bienes Muebles', 100, 'S', 'S', 100, 3.00, 115.00, 3833.00, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 25.00, 5.00, 'N', '', '', '0000-00-00 00:00:00'),
(5, 'Fletes a Empresas Nacionales', 100, 'S', 'N', 0, 1.00, 38.00, 3833.00, 0.00, 0.00, 0.00, 1.00, 3.00, 0.00, 25.00, 0.00, '\r', '', '', '0000-00-00 00:00:00'),
(6, 'Publicidad y Propaganda', 100, 'S', 'S', 100, 3.00, 115.00, 3833.00, 0.00, 0.00, 0.00, 0.00, 5.00, 0.00, 25.00, 5.00, 'N', '', '', '0000-00-00 00:00:00'),
(7, 'Fletes Exterior a Emp. Transp. Int.', 0, 'N', 'S', 50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 'S', '', '', '0000-00-00 00:00:00'),
(8, 'Fletes Nacionales  Emp. Transp. Int', 0, 'N', 'S', 90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 'S', '', '', '0000-00-00 00:00:00'),
(9, 'ExhibiciÃƒÆ’Ã‚Â³n de PelÃƒÆ’Ã‚Â­culas', 0, 'N', 'S', 25, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 34.00, 0.00, 0.00, 0.00, 25.00, 'S', '', '', '0000-00-00 00:00:00'),
(10, 'Regalias o AnÃƒÆ’Ã‚Â¡logas', 0, 'N', 'S', 90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 34.00, 0.00, 0.00, 0.00, 34.00, 'S', '', '', '0000-00-00 00:00:00'),
(11, 'Asistencia TÃƒÆ’Ã‚Â©cnica', 0, 'N', 'S', 30, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 34.00, 0.00, 0.00, 0.00, 34.00, 'S', '', '', '0000-00-00 00:00:00'),
(12, 'Servicios TecnolÃƒÆ’Ã‚Â³gicos', 0, 'N', 'S', 50, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 34.00, 0.00, 0.00, 0.00, 34.00, 'S', '', '', '0000-00-00 00:00:00'),
(13, 'Primas de Seg. y Reaseg. a Emp. Ext', 0, 'N', 'S', 30, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10.00, 'N', '', '', '0000-00-00 00:00:00'),
(14, 'Ganacias P/Juegos y Apuestas', 100, 'S', 'S', 100, 34.00, 0.00, 0.00, 0.00, 0.00, 0.00, 34.00, 34.00, 0.00, 0.00, 34.00, 'N', '', '', '0000-00-00 00:00:00'),
(15, 'Premios de Loterias y de Hipodromos', 100, 'S', 'S', 100, 16.00, 0.00, 0.00, 0.00, 0.00, 0.00, 16.00, 16.00, 0.00, 0.00, 16.00, 'N', '', '', '0000-00-00 00:00:00'),
(16, 'Premios Propietarios Anima. Carrera', 100, 'S', 'S', 100, 3.00, 48.50, 1616.67, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 25.00, 5.00, 'N', '', '', '0000-00-00 00:00:00'),
(17, 'Comisiones por Venta de Inmuebles', 100, 'S', 'S', 100, 3.00, 48.50, 1616.67, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 25.00, 5.00, 'N', '', '', '0000-00-00 00:00:00'),
(20, 'Pago Emp.Emisoras de Tarj. de CrÃƒÆ’Ã‚Â©d', 100, 'S', 'S', 100, 3.00, 0.00, 0.00, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 0.00, 5.00, '', '', '', '0000-00-00 00:00:00'),
(22, 'Pago de Empresas de Seg. a Agentes', 100, 'S', 'N', 0, 3.00, 48.50, 1616.67, 0.00, 0.00, 0.00, 0.00, 5.00, 0.00, 25.00, 0.00, '\r', '', '', '0000-00-00 00:00:00'),
(23, 'Pago a Emp. de Seg. para rep. y Ser', 100, 'S', 'N', 0, 3.00, 48.50, 1616.67, 0.00, 0.00, 0.00, 0.00, 5.00, 0.00, 25.00, 0.00, '\r', '', '', '0000-00-00 00:00:00'),
(24, 'Adquisicion de Fondos de Comercio', 100, 'S', 'S', 100, 3.00, 48.50, 1616.67, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 25.00, 5.00, 'N', '', '', '0000-00-00 00:00:00'),
(26, 'Venta de Acciones en la Bolsa de V.', 100, 'S', 'S', 100, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1.00, 1.00, 0.00, 0.00, 1.00, 'N', '', '', '0000-00-00 00:00:00'),
(27, 'Venta de Acciones o Cuotas de Part.', 100, 'S', 'S', 100, 3.00, 48.50, 1616.67, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 25.00, 5.00, '\r', '', '', '0000-00-00 00:00:00'),
(28, 'Viaticos / Ayudas / Donaciones', 100, '', '', 100, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '\r', '', '', '0000-00-00 00:00:00'),
(29, 'Venta de Gasolina', 100, 'S', '', 100, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1.00, 0.00, 25.00, 1.00, '\r', '', '', '0000-00-00 00:00:00'),
(30, 'Publicidad Radial', 100, 'S', 'S', 100, 3.00, 48.50, 1616.67, 0.00, 0.00, 0.00, 0.00, 3.00, 0.00, 25.00, 5.00, 'S', '', '', '0000-00-00 00:00:00'),
(32, 'Int. S/Prestamos a Inst. Financiera', 0, 'N', 'S', 100, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 4.95, '\r', '', '', '0000-00-00 00:00:00'),
(33, 'Comisiones Mercantiles', 100, 'S', 'S', 100, 3.00, 48.50, 1616.67, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 25.00, 5.00, '\r', '', '', '0000-00-00 00:00:00'),
(34, 'Intereses S/Prestamos', 100, 'S', 'S', 95, 3.00, 48.50, 1616.67, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 25.00, 34.00, 'S', '', '', '0000-00-00 00:00:00'),
(35, 'Agencias de Noticias Internacionale', 0, 'N', 'S', 90, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 15.00, 'N', '', '', '0000-00-00 00:00:00'),
(36, 'Materiales de construccion', 0, 'S', '', 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '\r', '', '', '0000-00-00 00:00:00'),
(37, 'Honorarios Profesionales (S.A.)', 100, 'S', 'S', 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 3.00, 115.00, 3833.00, 8.00, '\r', '', '', '0000-00-00 00:00:00'),
(887, 'Retencion', 0, 'S', 'N', 0, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '\r', '', '', '0000-00-00 00:00:00'),
(888, 'Exento', 100, '', '', 100, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, '\r', '', '', '0000-00-00 00:00:00'),
(889, 'Pago a Contratista y Subcontratista (5%)', 100, 'S', 'S', 100, 1.00, 54.17, 4583.33, 0.00, 0.00, 0.00, 34.00, 5.00, 0.00, 0.00, 34.00, 'N', '', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuesto_ica`
--

CREATE TABLE IF NOT EXISTS `impuesto_ica` (
  `cod_impuesto_ica` int(11) NOT NULL AUTO_INCREMENT,
  `actividad` varchar(30) NOT NULL,
  `agrupacion` int(11) NOT NULL,
  `cod_actividad_ciu` int(11) NOT NULL,
  `tarifa` decimal(5,2) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_impuesto_ica`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impuesto_iva`
--

CREATE TABLE IF NOT EXISTS `impuesto_iva` (
  `cod_impuesto_iva` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  `iva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `porcentaje` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_impuesto_iva`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `impuesto_iva`
--

INSERT INTO `impuesto_iva` (`cod_impuesto_iva`, `descripcion`, `iva`, `porcentaje`, `usuario_creacion`, `fecha_creacion`) VALUES
(4, 'IVA 1.6% Servicios de Vigilancia', 1.60, 50.00, 'asys', '2010-07-13 17:53:08'),
(5, 'IVA 3%', 3.00, 0.00, 'asys', '2010-07-13 17:53:34'),
(6, 'IVA 5% Arrendamientos', 5.00, 0.00, 'asys', '2010-07-13 17:55:18'),
(7, 'IVA 10% Servicios Profesionales', 10.00, 0.00, 'asys', '2010-07-13 17:58:30'),
(8, 'IVA 16% IVA General', 12.00, 0.00, 'asys', '2010-07-13 17:59:29'),
(9, 'IVA %20 ', 20.00, 0.00, 'asys', '2010-07-13 19:58:51'),
(10, 'IVA 25% Vehiculos', 25.00, 0.00, 'asys', '2010-07-13 19:59:12'),
(11, 'IVA 35% Licores y Tabaco', 35.00, 0.00, 'asys', '2010-07-13 19:59:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentopago_formapago`
--

CREATE TABLE IF NOT EXISTS `instrumentopago_formapago` (
  `cod_formapago` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  `cod_funcioninstrumento` int(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(80) NOT NULL,
  PRIMARY KEY (`cod_formapago`),
  KEY `new_fk_constraint` (`cod_funcioninstrumento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Volcado de datos para la tabla `instrumentopago_formapago`
--

INSERT INTO `instrumentopago_formapago` (`cod_formapago`, `descripcion`, `cod_funcioninstrumento`, `fecha_creacion`, `usuario_creacion`) VALUES
(5, 'Transferencias', 5, '2010-01-18 10:44:21', 'asys'),
(6, 'Deposito', 4, '2010-01-18 10:44:33', 'asys'),
(7, 'Debito', 2, '2010-01-18 10:44:47', 'asys'),
(8, 'Cheque', 3, '2012-01-30 00:05:30', 'gabriela'),
(9, 'Efectivo', 5, '2012-02-09 17:18:09', 'gabriela'),
(10, 'Credito', 1, '2012-02-09 17:19:09', 'gabriela');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instrumentopago_funcioninstrumento`
--

CREATE TABLE IF NOT EXISTS `instrumentopago_funcioninstrumento` (
  `cod_funcioninstrumento` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  PRIMARY KEY (`cod_funcioninstrumento`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `instrumentopago_funcioninstrumento`
--

INSERT INTO `instrumentopago_funcioninstrumento` (`cod_funcioninstrumento`, `descripcion`) VALUES
(1, 'T. Credito'),
(2, 'T. Debito'),
(3, 'Cheque'),
(4, 'Deposito'),
(5, 'Otros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id_item` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_item` varchar(20) NOT NULL,
  `descripcion1` varchar(50) NOT NULL,
  `descripcion2` varchar(50) DEFAULT NULL,
  `descripcion3` varchar(50) DEFAULT NULL,
  `referencia` varchar(50) DEFAULT NULL,
  `codigo_fabricante` varchar(50) DEFAULT NULL,
  `unidad_empaque` varchar(40) DEFAULT NULL,
  `cantidad` int(32) NOT NULL DEFAULT '0',
  `seriales` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Â¿Producto con seriales?',
  `garantia` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Â¿Seriales con garantia?',
  `tipo_item` varchar(50) DEFAULT NULL COMMENT 'items(Producto): ''Nacional'',''Importado''',
  `factor_cambio` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Si o solo si Tipo de Producto = Importado',
  `ultimo_costo` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Si o solo si Tipo de Producto = Importado',
  `precio_x_escala` tinyint(1) NOT NULL DEFAULT '0',
  `comision_x_item` tinyint(1) NOT NULL DEFAULT '0',
  `tipo_comision_x_item` varchar(50) DEFAULT NULL,
  `desdeA1` int(32) NOT NULL DEFAULT '0' COMMENT 'Sin son precios por Escala',
  `desdeA2` int(32) NOT NULL DEFAULT '0' COMMENT 'Sin son precios por Escala',
  `desdeB1` int(32) NOT NULL DEFAULT '0' COMMENT 'Sin son precios por Escala',
  `comisiones1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comisiones2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `comisiones3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `desdeB2` int(32) NOT NULL DEFAULT '0' COMMENT 'Sin son precios por Escala',
  `desdeC1` int(32) NOT NULL DEFAULT '0' COMMENT 'Sin son precios por Escala',
  `desdeC2` int(32) NOT NULL DEFAULT '0' COMMENT 'Sin son precios por Escala',
  `precio1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `utilidad1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `coniva1` decimal(10,2) NOT NULL DEFAULT '0.00',
  `precio2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `utilidad2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `coniva2` decimal(10,2) NOT NULL DEFAULT '0.00',
  `precio3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `utilidad3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `coniva3` decimal(10,2) NOT NULL DEFAULT '0.00',
  `precio_referencial1` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Si o solo si Tipo de Producto = Importado',
  `precio_referencial2` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Si o solo si Tipo de Producto = Importado',
  `precio_referencial3` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Si o solo si Tipo de Producto = Importado',
  `costo_actual` decimal(10,2) NOT NULL DEFAULT '0.00',
  `costo_promedio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `costo_anterior` decimal(10,2) NOT NULL DEFAULT '0.00',
  `existencia_total` int(32) NOT NULL DEFAULT '0',
  `existencia_min` int(32) NOT NULL DEFAULT '0',
  `existencia_max` int(32) NOT NULL DEFAULT '0',
  `monto_exento` tinyint(1) NOT NULL DEFAULT '0',
  `iva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ubicacion1` varchar(50) DEFAULT NULL,
  `ubicacion2` varchar(50) DEFAULT NULL,
  `ubicacion3` varchar(50) DEFAULT NULL,
  `ubicacion4` varchar(50) DEFAULT NULL,
  `ubicacion5` varchar(50) DEFAULT NULL,
  `cod_departamento` int(32) NOT NULL DEFAULT '0',
  `cod_grupo` int(32) NOT NULL DEFAULT '0',
  `cod_linea` int(32) NOT NULL DEFAULT '0',
  `estatus` varchar(1) NOT NULL,
  `usuario_creacion` varchar(60) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  `cod_item_forma` int(32) NOT NULL,
  `cuenta_contable1` varchar(25) NOT NULL,
  `cuenta_contable2` varchar(25) NOT NULL,
  `codigo_cuenta` varchar(15) NOT NULL,
  PRIMARY KEY (`id_item`),
  UNIQUE KEY `cod_item` (`cod_item`),
  KEY `cod_item_forma` (`cod_item_forma`),
  KEY `FK_item_2` (`usuario_creacion`),
  KEY `fk_cod_departamento2` (`cod_departamento`),
  KEY `fk_cod_grupo2` (`cod_grupo`),
  KEY `fk_cod_linea2` (`cod_linea`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_existencia_almacen`
--

CREATE TABLE IF NOT EXISTS `item_existencia_almacen` (
  `cod_item_existencia_almacen` int(32) NOT NULL AUTO_INCREMENT,
  `cod_almacen` int(32) NOT NULL,
  `id_item` int(32) unsigned DEFAULT NULL,
  `cantidad` int(32) NOT NULL DEFAULT '0',
  PRIMARY KEY (`cod_item_existencia_almacen`),
  KEY `FK_item_existencia_almacen_1` (`cod_almacen`),
  KEY `FK_item_existencia_almacen_2` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_forma`
--

CREATE TABLE IF NOT EXISTS `item_forma` (
  `cod_item_forma` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_item_forma`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `item_forma`
--

INSERT INTO `item_forma` (`cod_item_forma`, `descripcion`) VALUES
(1, 'Productos'),
(2, 'Servicios'),
(3, 'Boleto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `item_precompromiso`
--

CREATE TABLE IF NOT EXISTS `item_precompromiso` (
  `id_item_precomiso` int(32) NOT NULL AUTO_INCREMENT,
  `id_item` int(32) NOT NULL,
  `cod_item_precompromiso` int(32) NOT NULL,
  `cantidad` int(32) NOT NULL,
  `almacen` int(32) NOT NULL,
  `usuario_creacion` varchar(40) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `idSessionActualphp` varchar(200) NOT NULL,
  PRIMARY KEY (`id_item_precomiso`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex_almacen`
--

CREATE TABLE IF NOT EXISTS `kardex_almacen` (
  `id_transaccion` int(11) NOT NULL AUTO_INCREMENT,
  `tipo_movimiento_almacen` int(11) NOT NULL,
  `autorizado_por` varchar(100) CHARACTER SET utf8 NOT NULL,
  `observacion` varchar(200) CHARACTER SET utf8 NOT NULL,
  `fecha` date NOT NULL,
  `usuario_creacion` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `estado` varchar(20) CHARACTER SET utf8 NOT NULL,
  `fecha_ejecucion` date NOT NULL,
  `id_documento` varchar(1) CHARACTER SET utf8 NOT NULL COMMENT 'id Factura y/o Compra',
  PRIMARY KEY (`id_transaccion`),
  KEY `fk_id_tipo_movimiento_almacen` (`tipo_movimiento_almacen`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex_almacen_detalle`
--

CREATE TABLE IF NOT EXISTS `kardex_almacen_detalle` (
  `id_transaccion_detalle` int(11) NOT NULL AUTO_INCREMENT,
  `id_transaccion` int(11) NOT NULL,
  `id_almacen_entrada` int(11) NOT NULL,
  `id_almacen_salida` int(11) NOT NULL,
  `id_item` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  PRIMARY KEY (`id_transaccion_detalle`),
  KEY `fk_id_transaccion` (`id_transaccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `linea`
--

CREATE TABLE IF NOT EXISTS `linea` (
  `cod_linea` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_linea`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `linea`
--

INSERT INTO `linea` (`cod_linea`, `descripcion`) VALUES
(1, 'Linea unica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_impuestos`
--

CREATE TABLE IF NOT EXISTS `lista_impuestos` (
  `cod_impuesto` int(11) NOT NULL AUTO_INCREMENT,
  `cod_formula` int(11) NOT NULL,
  `cod_entidad` int(11) NOT NULL,
  `cod_tipo_impuesto` int(11) NOT NULL,
  `codificacion_impuesto` varchar(20) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `alicuota` decimal(5,2) NOT NULL,
  `pago_mayor_a` decimal(7,4) NOT NULL,
  `monto_sustraccion` decimal(7,4) NOT NULL,
  `fecha_aplicacion` date NOT NULL,
  `estado` int(11) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(100) NOT NULL,
  `siglas` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_impuesto`),
  KEY `fk_cod_formula` (`cod_formula`),
  KEY `fk_cod_entidad` (`cod_entidad`),
  KEY `fk_cod_tipo_impuesto` (`cod_tipo_impuesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Volcado de datos para la tabla `lista_impuestos`
--

INSERT INTO `lista_impuestos` (`cod_impuesto`, `cod_formula`, `cod_entidad`, `cod_tipo_impuesto`, `codificacion_impuesto`, `descripcion`, `alicuota`, `pago_mayor_a`, `monto_sustraccion`, `fecha_aplicacion`, `estado`, `fecha_creacion`, `usuario_creacion`, `siglas`) VALUES
(1, 1, 3, 1, '', 'Retencion de IVA  75% Persona Juridica Domiciliada', 75.00, 0.0000, 0.0000, '2010-01-01', 0, '2010-08-27 12:28:37', 'asys', ''),
(2, 2, 3, 1, '', 'Retencion de IVA 100% Persona Juridica Domiciliada', 100.00, 0.0000, 0.0000, '2010-01-01', 0, '2010-08-27 12:30:33', 'asys', ''),
(3, 1, 1, 1, '', 'Retencion de IVA  75% Persona Natural Residente', 75.00, 0.0000, 0.0000, '0000-00-00', 0, '2011-06-28 14:13:43', 'asys', ''),
(4, 4, 1, 1, '', 'Retencion de IVA 100% Persona Natural Residente', 100.00, 0.0000, 0.0000, '0000-00-00', 0, '2011-06-28 14:59:38', 'asys', ''),
(5, 5, 2, 1, '', 'Retencion de IVA 75% Persona Natural No Residente', 75.00, 0.0000, 0.0000, '0000-00-00', 0, '2011-06-28 15:01:25', 'asys', ''),
(6, 6, 2, 1, '', 'Retencion de IVA 100% Persona Natural No Residente', 100.00, 0.0000, 0.0000, '0000-00-00', 0, '2011-06-28 15:02:10', 'asys', ''),
(7, 7, 4, 1, '', 'Retencion de IVA 75% Persona Juridica No Domiciliada', 75.00, 0.0000, 0.0000, '0000-00-00', 0, '2011-06-28 15:02:43', 'asys', ''),
(8, 8, 4, 1, '', 'Retencion de IVA 100% Persona Juridica No Domiciliada', 100.00, 0.0000, 0.0000, '0000-00-00', 0, '2011-06-28 15:03:01', 'asys', ''),
(9, 9, 1, 2, '002', 'Retencion ISLR Honorarios Profesionales Persona Natural Residente ', 3.00, 83.3334, 83.3334, '0000-00-00', 0, '2011-06-28 16:05:03', 'asys', 'Honorarios Profesionales '),
(11, 11, 3, 2, '004', 'Retencion ISLR Honorarios Profesionales Persona Juridica ', 5.00, 25.0000, 0.0000, '0000-00-00', 0, '2011-06-28 16:18:14', 'asys', 'Honorarios Profesionales'),
(14, 14, 5, 2, '012', 'Retencion ISLR  Honorarios Profesionales MEDICOS / ABOGADOS', 3.00, 83.3334, 83.3334, '0000-00-00', 0, '2011-07-07 13:23:56', 'asys', 'Honorarios Profesionales'),
(15, 15, 1, 2, '018', 'Retension ISLR Comisiones Mercantiles Persona Natural Residente', 3.00, 6.3330, 83.3334, '0000-00-00', 0, '2011-07-07 13:48:26', 'asys', 'Comisiones Mercantiles'),
(16, 16, 3, 2, '020', 'Retension ISLR Comisiones Mercantiles Persona Juridica Domiciliada', 5.00, 25.0000, 0.0000, '0000-00-00', 0, '2011-07-07 13:59:32', 'asys', 'Comisiones Mercantiles'),
(17, 17, 1, 2, '025', 'Retencion ISLR Intereses 	Persona Natural Residente', 3.00, 6.3330, 83.3334, '0000-00-00', 0, '2011-07-07 14:03:33', 'asys', 'Intereses'),
(18, 18, 3, 2, '027', 'Retencion ISLR Intereses 	Persona Juridica Domiciliada', 5.00, 25.0000, 0.0000, '0000-00-00', 0, '2011-07-07 14:04:40', 'asys', 'Intereses'),
(19, 19, 1, 2, '053', 'Retencion ISLR Servicios 	Persona Natural Residente', 1.00, 6.3330, 83.3334, '0000-00-00', 0, '2011-07-07 14:15:32', 'asys', 'Servicios'),
(20, 20, 3, 2, '055', 'Retencion ISLR Servicios 	Persona Juridica Domiciliada', 2.00, 25.0000, 0.0000, '0000-00-00', 0, '2011-07-07 14:16:15', 'asys', 'Servicios'),
(21, 21, 1, 2, '057', 'Retension ISLR Arrendamiento de Bienes Inmuebles Persona Natural Residente', 3.00, 6.3330, 83.3334, '0000-00-00', 0, '2011-07-07 14:18:08', 'asys', 'Arrendamiento de Bienes  Inmuebles'),
(22, 22, 3, 2, '059', 'Retension ISLR Arrendamiento de Bienes Inmuebles Persona Juridica Domiciliada', 5.00, 25.0000, 0.0000, '0000-00-00', 0, '2011-07-07 14:18:46', 'asys', 'Arrendamiento de Bienes Inmuebles'),
(23, 23, 1, 2, '061', 'Retension ISLR Arrendamiento de Bienes Muebles Persona Natural Residente', 3.00, 6.3330, 83.3334, '0000-00-00', 0, '2011-07-07 14:24:03', 'asys', 'Arrendamiento de Bienes Muebles'),
(24, 22, 3, 2, '063', 'Retension ISLR Arrendamiento de Bienes Muebles Persona Juridica Domiciliada', 5.00, 25.0000, 0.0000, '0000-00-00', 0, '2011-07-07 14:30:56', 'asys', 'Arrendamiento de Bienes Muebles'),
(25, 25, 1, 2, '071', 'Retencion ISLR Gastos de Transporte Nacional y Fletes Persona Natural Residente', 1.00, 6.3330, 83.3334, '0000-00-00', 0, '2011-07-07 14:37:54', 'asys', 'Gastos de Transporte Nacional y Fletes'),
(26, 26, 3, 2, '072', 'Retencion ISLR Gastos de Transporte Nacional y Fletes Persona Juridica Domiciliada', 3.00, 25.0000, 0.0000, '0000-00-00', 0, '2011-07-07 14:38:24', 'asys', 'Gastos de Transporte Nacional y Fletes'),
(27, 27, 1, 2, '083', 'Retencion ISLR Propaganda y Publicidad Persona Natural Residente', 3.00, 6.3330, 83.3334, '0000-00-00', 0, '2011-07-07 14:44:21', 'asys', 'Propaganda y Publicidad'),
(28, 28, 3, 2, '084', 'Retencion ISLR Propaganda y Publicidad Persona Juridica Domiciliada', 5.00, 25.0000, 0.0000, '0000-00-00', 0, '2011-07-07 14:44:49', 'asys', 'Propaganda y Publicidad');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE IF NOT EXISTS `modulos` (
  `cod_modulo` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_modulo_padre` int(11) DEFAULT NULL,
  `nom_menu` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo_php` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo_tpl` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `img_ruta` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=167 ;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`cod_modulo`, `cod_modulo_padre`, `nom_menu`, `archivo_php`, `archivo_tpl`, `orden`, `img_ruta`, `visible`) VALUES
(1, NULL, 'Configuraci&oacute;n', NULL, NULL, 0, '../../libs/imagenes/icons/10.png', 1),
(2, NULL, 'Clientes', NULL, NULL, 3, '../../libs/imagenes/icons/2.png', 1),
(3, NULL, 'Inventario', NULL, NULL, 1, '../../libs/imagenes/icons/13.png', 1),
(5, NULL, 'Facturaci&oacute;n', NULL, NULL, 5, '../../libs/imagenes/icons/8.png', 1),
(6, NULL, 'Ctas. por Cobrar', NULL, NULL, 6, '../../libs/imagenes/icons/4.png', 1),
(7, NULL, 'Reportes', NULL, NULL, 7, '../../libs/imagenes/icons/7.png', 1),
(8, 2, 'Clientes', 'cliente.php', 'cliente.tpl', 1, '../../libs/imagenes/icons/28.png', 1),
(31, 1, 'Par&aacute;metros Generales', 'parametros_generales.php', 'parametros_generales.tpl', 1, '../../libs/imagenes/11.png', 1),
(54, NULL, 'P&aacute;gina de Inicio', 'pagina_inicio.php', 'pagina_inicio.tpl', NULL, '../../libs/imagenes/icons/12.png', 1),
(55, 3, 'Almac&eacute;n', 'almacen.php', 'almacen.tpl', 4, '../../libs/imagenes/11.png', 1),
(56, 2, 'Zonas', 'zona.php', 'zona.tpl', 3, '../../libs/imagenes/11.png', 1),
(57, 2, 'Vendedor', 'vendedor.php', 'vendedor.tpl', 4, '../../libs/imagenes/21.png', 1),
(58, 5, 'Gestionar Facturas (Productos y/o Servicios)', 'factura_lista_clientes.php', 'factura_lista_clientes.tpl', 5, '../../libs/imagenes/65.png', 1),
(59, 6, 'Estado de Cuentas de Clientes', 'cxc_lista_clientes.php', 'cxc_lista_clientes.tpl', 1, '../../libs/imagenes/55.png', 1),
(60, 7, 'Relaci&oacute;n de Compra por Proveedor', 'relacion_compra_proveedores.php', 'relacion_compra_proveedores.tpl', 6, '../../libs/imagenes/4.png', 1),
(61, 3, 'Productos', 'producto.php', 'producto.tpl', 1, '../../libs/imagenes/13.png', 1),
(64, 1, 'Departamento', 'departamento.php', 'departamento.tpl', 2, '../../libs/imagenes/11.png', 1),
(65, 1, 'Grupo', 'grupo.php', 'grupo.tpl', 3, '../../libs/imagenes/55.png', 1),
(66, 1, 'L&iacute;nea', 'linea.php', 'linea.tpl', 4, '../../libs/imagenes/37.png', 1),
(67, 3, 'Servicios', 'servicio.php', 'servicio.tpl', 2, '../../libs/imagenes/13.png', 1),
(68, 1, 'Usuarios', 'usuarios.php', 'usuarios.tpl', 5, '../../libs/imagenes/21.png', 1),
(69, 3, 'Existencia de Producto por Almac&eacute;n', 'producto_existencia_almacen.php', 'producto_existencia_almacen.tpl', 5, '../../libs/imagenes/13.png', 0),
(70, 1, 'Retenci&oacute;n I.S.L.R', 'islr.php', 'islr.tpl', 9, '../../libs/imagenes/18.png', 0),
(71, 7, 'Relaci&oacute;n de Facturas por Clientes (Productos y/o Servicios)', 'relacion_factura_clientes.php', 'relacion_factura_clientes.tpl', 4, '../../libs/imagenes/4.png', 1),
(72, 3, 'Boletos', 'boletos.php', 'boletos.tpl', 3, '../../libs/imagenes/13.png', 0),
(73, 5, 'Gestionar Facturas (Boletos)', 'factura_lista_clientes_boletos.php', 'factura_lista_clientes_boletos.tpl', 4, '../../libs/imagenes/11.png', 0),
(74, 7, 'Relaci&oacute;n de Facturas por Clientes (Boletos)', 'relacion_factura_clientes_boletos.php', 'relacion_factura_clientes_boletos.tpl', 5, '../../libs/imagenes/4.png', 0),
(75, NULL, 'Consulta', NULL, NULL, 6, '../../libs/imagenes/59.png', 0),
(76, 1, 'Responsable', 'responsable.php', 'responsable.tpl', 7, '../../libs/imagenes/28.png', 0),
(77, 1, 'Banco', 'banco.php', 'banco.tpl', 8, '../../libs/imagenes/55.png', 0),
(78, 1, 'Instrumento de Forma Pago', 'instrumentoformapago.php', 'instrumentoformapago.tpl', 10, '../../libs/imagenes/023.png', 1),
(79, 5, 'Devoluci&oacute;n Facturas (Productos y/o Servicios)', 'devolucion_venta_lista.php', 'devolucion_venta_lista.tpl', 6, '../../libs/imagenes/tipo.png', 1),
(80, 1, 'Retenci&oacute;n I.V.A', 'retencioniva.php', 'retencioniva.tpl', 8, '../../libs/imagenes/19.png', 0),
(81, 1, 'Correlativos', 'correlativos.php', 'correlativos.tpl', 20, '../../libs/imagenes/023.png', 0),
(83, NULL, 'Proveedores', 'proveedores.php', 'proveedores.tpl', 3, '../../libs/imagenes/28.png', 1),
(84, NULL, 'Compras', NULL, NULL, 2, '../../libs/imagenes/29.png', 1),
(85, NULL, 'Ctas. por Pagar', NULL, NULL, 6, '../../libs/imagenes/41.png', 1),
(86, 83, 'Proveedores', 'proveedores.php', 'proveedores.tpl', 1, '../../libs/imagenes/28.png', 1),
(87, 84, 'Gestionar Compra', 'proveedores_compra_lista.php', 'proveedores_compra_lista.tpl', 5, '../../libs/imagenes/4.png', 1),
(88, 85, 'Estado de Cuentas de Proveedores', 'cxp_lista_proveedores.php', 'cxp_lista_proveedores.tpl', 1, '../../libs/imagenes/55.png', 1),
(89, NULL, 'Tesorer&iacute;a', NULL, NULL, 6, '../../libs/imagenes/05.png', 1),
(90, 89, 'Bancos', 'tesoreria_banco.php', 'tesoreria_banco.tpl', 1, '../../libs/imagenes/55.png', 1),
(91, 89, 'Cheques', 'tesoreria_bancoSeleccion.php', 'tesoreria_bancoSeleccion.tpl', 2, '../../libs/imagenes/49.png', 1),
(92, 89, 'Consulta / Impresi&oacute;n de Cheques', 'tesoreria_impresioncheque.php', 'tesoreria_impresioncheque.tpl', 3, '../../libs/imagenes/03.png', 1),
(93, 89, 'Movimientos Bancarios', 'tesoreria_movimientos_bancarios.php', 'tesoreria_movimientos_bancarios.tpl', 4, '../../libs/imagenes/01.png', 1),
(94, 89, 'Conciliaci&oacute;n Bancaria', 'tesoreria_conciliacion_seleccion_cuenta.php', 'tesoreria_conciliacion_seleccion_cuenta.tpl', 5, '../../libs/imagenes/41.png', 1),
(95, 89, 'Reportes', NULL, NULL, 6, '../../libs/imagenes/66.png', 0),
(96, 89, 'Tipos de Movimientos Bancarios', 'tipos_movimientos_bancarios.php', 'tipos_movimientos_bancarios.tpl', 11, '../../libs/imagenes/55.png', 1),
(97, 1, 'Impuesto Municipal ICA', 'impuesto_municipal_ica.php', 'impuesto_municipal_ica.tpl', 9, '../../libs/imagenes/20.png', 0),
(98, 1, 'Tipos de Impuestos', 'tipo_impuesto.php', 'tipo_impuesto.tpl', 12, '../../libs/imagenes/20.png', 1),
(99, 1, 'Entidades', 'entidad.php', 'entidad.tpl', 13, '../../libs/imagenes/20.png', 1),
(100, 1, 'Formulaci&oacute;n de Impuestos', 'formulacion_impuestos.php', 'formulacion_impuestos.tpl', 14, '../../libs/imagenes/20.png', 1),
(101, 1, 'Lista de Impuestos', 'lista_impuestos.php', 'lista_impuestos.tpl', 15, '../../libs/imagenes/11.png', 1),
(102, 2, 'Tipo de Clientes', 'tipo_cliente.php', 'tipo_cliente.tpl', 1, '../../libs/imagenes/icons/28.png', 1),
(103, 1, 'Moneda', 'multi_moneda.php', 'multi_moneda.tpl', 20, '../../libs/imagenes/moneda.png', 1),
(104, 1, 'Divisas', 'divisas.php', 'divisas.tpl', NULL, '../../libs/imagenes/moneda.png', 0),
(105, 1, 'Tasas de Cambio', 'tasas_de_cambio.php', 'tasas_de_cambio.tpl', 0, '../../libs/imagenes/moneda.png', 0),
(106, NULL, 'Operaciones', NULL, NULL, 10, '../../libs/imagenes/icons/10.png', 1),
(107, 106, 'Cargar Archivo POS', 'cargar_post.php', 'cargar_post.tpl', 1, '../../libs/imagenes/icons/10.png', 1),
(108, 3, 'Kardex Almac&eacute;n', 'kardex_almacen.php', 'kardex_almacen.tpl', 5, '../../libs/imagenes/icons/10.png', 1),
(109, 3, 'Entradas Almac&eacute;n', 'entrada_almacen.php', 'entrada_almacen.tpl', 6, '../../libs/imagenes/icons/10.png', 1),
(110, 3, 'Salidas Almac&eacute;n', 'salida_almacen.php', 'salida_almacen.tpl', 7, '../../libs/imagenes/icons/10.png', 1),
(111, 3, 'Traslados entre Almacenes', 'traslados_almacen.php', 'traslados_almacen.tpl', 8, '../../libs/imagenes/icons/10.png', 1),
(112, 3, 'Tipos de Movimientos de Almac&eacute;n', 'tipo_movimientos_almacen.php', 'tipo_movimientos_almacen.tpl', 8, '../../libs/imagenes/icons/10.png', 1),
(113, 106, 'Contabilizar cheques', 'contabilizar_cheque.php', 'contabilizar_cheque.tpl', 2, '../../libs/imagenes/icons/10.png', 0),
(114, 106, 'Contabilizar Facturas', 'contabilizar_facturacion.php', 'contabilizar_facturacion.tpl', 3, '../../libs/imagenes/icons/10.png', 0),
(115, 106, 'Contabilizar ND', 'contabilizar_nota_debito.php', 'contabilizar_nota_debito.tpl', 5, '../../libs/imagenes/icons/10.png', 0),
(116, 106, 'Contabilizar NC', 'contabilizar_nota_credito.php', 'contabilizar_nota_credito.tpl', 4, '../../libs/imagenes/icons/10.png', 0),
(117, 89, 'Imprimir de Conciliaci&oacute;n Bancaria', 'tesoreria_vista_conciliaciones.php', 'tesoreria_vista_conciliaciones.tpl', 5, '../../libs/imagenes/03.png', 1),
(118, NULL, 'Requisiciones', NULL, NULL, 2, '../../libs/imagenes/41.png', 0),
(119, 118, 'Requisiciones compras/materiales 	', 'requisiciones.php', 'requisiciones.tpl', 1, '../../libs/imagenes/41.png', 1),
(120, 1, 'Unidades Administrativas / Departamentos', 'unidades_list.php', 'unidades_list.tpl', 22, '../../libs/imagenes/12.png', 1),
(121, 118, 'Requisiciones Servicios', 'unidades_list3.php', 'unidades_list3.tpl', 2, '../../libs/imagenes/41.png', 1),
(122, 84, 'Requisiciones Administraci&oacute;n', 'requisiciones_administracion_list.php', 'requisiciones_administracion_list.tpl', 3, '../../libs/imagenes/41.png', 0),
(123, 118, 'An&aacute;lisis de Cotizaciones', 'analisiscotizaciones.php', 'analisiscotizaciones.tpl', 4, '../../libs/imagenes/67.png', 0),
(124, 83, 'Reporte de Listado de Proveedores', 'listadoproveedores.php', 'listadoproveedores.tpl', 2, '../../libs/imagenes/66.png', 1),
(125, 3, 'Reporte de Listado de Materiales', 'listadomateriales.php', 'listadomateriales.tpl', 9, '../../libs/imagenes/66.png', 1),
(126, 3, 'Reporte de Productos en Existencia', 'productosexistencia.php', 'productosexistencia.tpl', 10, '../../libs/imagenes/66.png', 1),
(127, 84, 'Analisis de Cotizaciones', 'analisiscotizaciones.php', 'analisiscotizaciones.tpl', 2, '../../libs/imagenes/67.png', 0),
(128, 84, 'Requisiciones Compras', 'requisicionescompras.php', 'requisicionescompras.tpl', 1, '../../libs/imagenes/61.png', 0),
(129, 84, 'Emisi&oacute;n de Ordenes de Compra ', 'ordendecompra.php', 'ordendecompra.tpl', 3, '../../libs/imagenes/4.png', 0),
(130, 7, 'Libro de Compras', 'seleccionarFecha1.php', 'seleccionarFecha7.tpl', 7, '../../libs/imagenes/56.png', 1),
(131, 7, 'Libro de Ventas', 'seleccionarFecha1.php', 'seleccionarFecha6.tpl', 8, '../../libs/imagenes/56.png', 1),
(132, 1, 'Especialidades de Proveedores', 'proveedores_especialidad.php', 'proveedores_especialidad.tpl', 21, '../../libs/imagenes/28.png', 1),
(133, 6, 'Cuentas x Cobrar Pendiente por Presentar', 'cxc_lista_clientes_pendiente.php', 'cxc_lista_clientes_pendiente.tpl', 2, '../../libs/imagenes/25.png', 1),
(134, 6, 'Cuentas x Cobrar Pendiente por Autorizar', 'cxc_lista_clientes_autorizar.php', 'cxc_lista_clientes_autorizar.tpl', 3, '../../libs/imagenes/26.png', 1),
(135, 6, 'Cuentas x Cobrar Pendiente Pago', 'cxc_lista_clientes_pago.php', 'cxc_lista_clientes_pago.tpl', 4, '../../libs/imagenes/23.png', 1),
(136, 6, 'Reporte de Cobranzas Realizadas', 'seleccionarFecha1.php', 'cobranzas_realizadas.tpl', 5, '../../libs/imagenes/icons/7.png', 1),
(137, 6, 'Reporte de Estado de Cuenta', 'resumen_cxc_clasificacion.php', 'rpt_estado_de_cuenta.tpl', 7, '../../libs/imagenes/icons/7.png', 1),
(138, 6, 'Relaci&oacute;n de Cuentas por Cobrar', 'seleccionarFecha1.php', 'rpt_relaciones_cxc.tpl', 8, '../../libs/imagenes/icons/7.png', 1),
(139, 6, 'Reporte Detalles de Pagos de Mas', 'seleccionarFecha1.php', 'rpt_pagos_demas.tpl', 9, '../../libs/imagenes/icons/7.png', 1),
(140, 85, 'M&eacute;dicos', 'proveedores_medicos.php', 'proveedores_medicos.tpl', 2, '../../libs/imagenes/28.png', 0),
(141, 1, 'Tipo de Proveedor', 'tipo_proveedor.php', 'tipo_proveedor.tpl', 20, '../../libs/imagenes/28.png', 1),
(142, 6, 'Reporte Detalle de Pago', 'rpt_detalle_pago.php', 'rpt_detalle_pago.tpl', 10, '../../libs/imagenes/icons/7.png', 1),
(143, 6, 'Reporte Resumen CXP Clasificado', 'resumen_cxc_clasificacion.php', 'resumen_cxc_clasificacion.tpl', 11, '../../libs/imagenes/icons/7.png', 1),
(144, 2, 'Listado de Clientes', 'listado_clientes.php', 'listado_clientes.tpl', 9, '../../libs/imagenes/icons/7.png', 1),
(145, 6, 'Listado CXP M&eacute;dico', 'cxp_listado_medico.php', 'cxp_listado_medico.tpl', 12, '../../libs/imagenes/icons/7.png', 0),
(146, 85, 'Listado de M&eacute;dicos por Pagar', 'seleccionarFecha1.php', 'listado_cxp_medicos.tpl', 3, '../../libs/imagenes/icons/7.png', 0),
(147, 7, 'IVA Retenido', 'seleccionarFecha1.php', 'seleccionarFecha8.tpl', 9, '../../libs/imagenes/56.png', 1),
(148, 7, 'Cheques Emitidos', 'seleccionarFecha1.php', 'seleccionarFecha9.tpl', 10, '../../libs/imagenes/56.png', 1),
(149, 85, 'Listado Anal&iacute;ticos', 'seleccionarFecha1.php', 'analiticos.tpl', 4, '../../libs/imagenes/icons/7.png', 1),
(150, 6, 'Anal&iacute;ticos Facturas', 'seleccionarFecha1.php', 'analiticoscxc.tpl', 13, '../../libs/imagenes/icons/7.png', 1),
(151, 89, 'Transferencias/Cheques de gerencia', 'tesoreria_bancoSeleccionTransf.php', 'tesoreria_bancoSeleccionTransf.tpl', 10, '../../libs/imagenes/preview_f2.png', 1),
(152, 89, 'Facturas/Cheque', 'facturasxCheque.php', 'facturasxCheque.tpl', 11, '../../libs/imagenes/03.png', 1),
(153, 6, 'Estado de Cta. Cliente', 'edo_cta_xcliente.php', 'edo_cta_xcliente.tpl', 13, '../../libs/imagenes/icons/7.png', 1),
(154, 5, 'Notas de Entrega', 'lista_clientes.php', 'lista_clientes.tpl', 3, '../../libs/imagenes/9.png', 1),
(155, 5, 'Pedidos', 'lista_clientes.php', 'lista_clientes.tpl', 2, '../../libs/imagenes/02.png', 1),
(156, 5, 'Presupuesto/Cotizaci&oacute;n', 'lista_clientes.php', 'lista_clientes.tpl', 1, '../../libs/imagenes/4.png', 1),
(157, 7, 'Relaci&oacute;n de Cotizaciones por Clientes', 'relacion_cotizacion_clientes.php', 'relacion_cotizacion_clientes.tpl', 1, '../../libs/imagenes/4.png', 1),
(158, 7, 'Relaci&oacute;n de Notas de Entrega por Clientes', 'relacion_notas_entrega_clientes.php', 'relacion_notas_entrega_clientes.tpl', 2, '../../libs/imagenes/4.png', 1),
(159, 7, 'Relaci&oacute;n de Pedidos por Clientes', 'relacion_pedidos_clientes.php', 'relacion_pedidos_clientes.tpl', 3, '../../libs/imagenes/4.png', 1),
(160, 106, 'Corte X<br>(Impresora Fiscal)', 'corte_x.php', 'corte_x.tpl', 6, '../../libs/imagenes/icons/10.png', 1),
(161, 106, 'Corte Z<br>(Impresora Fiscal)', 'corte_z.php', 'corte_z.tpl', 7, '../../libs/imagenes/icons/10.png', 1),
(162, 5, 'Productos (Precios)', 'producto_precios.php', 'producto_precios.tpl', 7, '../../libs/imagenes/13.png', 1),
(163, 7, 'Ventas Diarias', 'seleccionarFecha1.php', 'rpt_ventas_diarias.tpl', 11, '../../libs/imagenes/56.png', 1),
(164, 7, 'Devoluciones Diarias', 'seleccionarFecha1.php', 'rpt_devolucion_diaria_ventas.tpl', 12, '../../libs/imagenes/56.png', 1),
(165, 3, 'Reporte Movimientos de Inventario', 'seleccionarFecha1.php', 'movimientos_inventario.tpl', 11, '../../libs/imagenes/66.png', 1),
(166, 3, 'Toma de Inventario F&iacute;sico', 'toma_inventario_fisico.php', 'toma_inventario_fisico.tpl', 12, '../../libs/imagenes/66.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos_original`
--

CREATE TABLE IF NOT EXISTS `modulos_original` (
  `cod_modulo` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_modulo_padre` int(11) DEFAULT NULL,
  `nom_menu` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo_php` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `archivo_tpl` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `orden` int(11) DEFAULT NULL,
  `img_ruta` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `visible` tinyint(1) NOT NULL,
  PRIMARY KEY (`cod_modulo`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=167 ;

--
-- Volcado de datos para la tabla `modulos_original`
--

INSERT INTO `modulos_original` (`cod_modulo`, `cod_modulo_padre`, `nom_menu`, `archivo_php`, `archivo_tpl`, `orden`, `img_ruta`, `visible`) VALUES
(1, NULL, 'Configuracion', NULL, NULL, 0, '../../libs/imagenes/icons/10.png', 1),
(2, NULL, 'Clientes', NULL, NULL, 3, '../../libs/imagenes/icons/2.png', 1),
(3, NULL, 'Inventario', NULL, NULL, 1, '../../libs/imagenes/icons/13.png', 1),
(5, NULL, 'Facturacion', NULL, NULL, 5, '../../libs/imagenes/icons/8.png', 1),
(6, NULL, 'Ctas por Cobrar', NULL, NULL, 6, '../../libs/imagenes/icons/4.png', 1),
(7, NULL, 'Reportes', NULL, NULL, 7, '../../libs/imagenes/icons/7.png', 1),
(8, 2, 'Clientes', 'cliente.php', 'cliente.tpl', 1, '../../libs/imagenes/icons/28.png', 1),
(31, 1, 'Parametros Generales', 'parametros_generales.php', 'parametros_generales.tpl', 1, '../../libs/imagenes/11.png', 1),
(54, NULL, 'Pagina de Inicio', 'pagina_inicio.php', 'pagina_inicio.tpl', NULL, '../../libs/imagenes/icons/12.png', 1),
(55, 3, 'Almacen', 'almacen.php', 'almacen.tpl', 4, '../../libs/imagenes/11.png', 1),
(56, 2, 'Zonas', 'zona.php', 'zona.tpl', 3, '../../libs/imagenes/11.png', 1),
(57, 2, 'Vendedor', 'vendedor.php', 'vendedor.tpl', 4, '../../libs/imagenes/21.png', 1),
(58, 5, 'Gestionar Facturas (Productos y/o Servicios)', 'factura_lista_clientes.php', 'factura_lista_clientes.tpl', 5, '../../libs/imagenes/11.png', 1),
(59, 6, 'Estado de Cuentas de Clientes', 'cxc_lista_clientes.php', 'cxc_lista_clientes.tpl', 1, '../../libs/imagenes/55.png', 1),
(60, 7, 'Relacion de Compra por Proveedor', 'relacion_compra_proveedores.php', 'relacion_compra_proveedores.tpl', 6, '../../libs/imagenes/4.png', 1),
(61, 3, 'Productos', 'producto.php', 'producto.tpl', 1, '../../libs/imagenes/13.png', 1),
(64, 1, 'Departamento', 'departamento.php', 'departamento.tpl', 2, '../../libs/imagenes/11.png', 1),
(65, 1, 'Grupo', 'grupo.php', 'grupo.tpl', 3, '../../libs/imagenes/55.png', 1),
(66, 1, 'Linea', 'linea.php', 'linea.tpl', 4, '../../libs/imagenes/37.png', 1),
(67, 3, 'Servicios', 'servicio.php', 'servicio.tpl', 2, '../../libs/imagenes/13.png', 1),
(68, 1, 'Usuarios', 'usuarios.php', 'usuarios.tpl', 5, '../../libs/imagenes/21.png', 1),
(69, 3, 'Existencia de Producto por Almacen', 'producto_existencia_almacen.php', 'producto_existencia_almacen.tpl', 5, '../../libs/imagenes/13.png', 0),
(70, 1, 'Retencion I.S.L.R', 'islr.php', 'islr.tpl', 9, '../../libs/imagenes/18.png', 0),
(71, 7, 'Relacion de Facturas por Clientes (Productos y/o Servicios)', 'relacion_factura_clientes.php', 'relacion_factura_clientes.tpl', 4, '../../libs/imagenes/4.png', 1),
(72, 3, 'Boletos', 'boletos.php', 'boletos.tpl', 3, '../../libs/imagenes/13.png', 0),
(73, 5, 'Gestionar Facturas (Boletos)', 'factura_lista_clientes_boletos.php', 'factura_lista_clientes_boletos.tpl', 4, '../../libs/imagenes/11.png', 0),
(74, 7, 'Relacion de Facturas por Clientes (Boletos)', 'relacion_factura_clientes_boletos.php', 'relacion_factura_clientes_boletos.tpl', 5, '../../libs/imagenes/4.png', 0),
(75, NULL, 'Consulta', NULL, NULL, 6, '../../libs/imagenes/59.png', 0),
(76, 1, 'Responsable', 'responsable.php', 'responsable.tpl', 7, '../../libs/imagenes/28.png', 0),
(77, 1, 'Banco', 'banco.php', 'banco.tpl', 8, '../../libs/imagenes/55.png', 0),
(78, 1, 'Instrumento de Forma Pago', 'instrumentoformapago.php', 'instrumentoformapago.tpl', 10, '../../libs/imagenes/023.png', 1),
(79, 5, 'Devoluci&oacute;n Facturas (Productos y/o Servicios)', 'devolucion_venta_lista.php', 'devolucion_venta_lista.tpl', 6, '../../libs/imagenes/tipo.png', 1),
(80, 1, 'Retencion I.V.A', 'retencioniva.php', 'retencioniva.tpl', 8, '../../libs/imagenes/19.png', 0),
(81, 1, 'Correlativos', 'correlativos.php', 'correlativos.tpl', 20, '../../libs/imagenes/023.png', 0),
(83, NULL, 'Proveedores', 'proveedores.php', 'proveedores.tpl', 3, '../../libs/imagenes/28.png', 1),
(84, NULL, 'Compras', NULL, NULL, 2, '../../libs/imagenes/29.png', 1),
(85, NULL, 'Ctas por pagar', NULL, NULL, 6, '../../libs/imagenes/41.png', 1),
(86, 83, 'Proveedores', 'proveedores.php', 'proveedores.tpl', 1, '../../libs/imagenes/28.png', 1),
(87, 84, 'Gestionar Compra', 'proveedores_compra_lista.php', 'proveedores_compra_lista.tpl', 5, '../../libs/imagenes/4.png', 1),
(88, 85, 'Estado de Cuentas de Proveedores', 'cxp_lista_proveedores.php', 'cxp_lista_proveedores.tpl', 1, '../../libs/imagenes/55.png', 1),
(89, NULL, 'Tesoreria', NULL, NULL, 6, '../../libs/imagenes/05.png', 1),
(90, 89, 'Bancos', 'tesoreria_banco.php', 'tesoreria_banco.tpl', 1, '../../libs/imagenes/55.png', 1),
(91, 89, 'Cheques', 'tesoreria_bancoSeleccion.php', 'tesoreria_bancoSeleccion.tpl', 2, '../../libs/imagenes/49.png', 1),
(92, 89, 'Consulta / Impresion de Cheques', 'tesoreria_impresioncheque.php', 'tesoreria_impresioncheque.tpl', 3, '../../libs/imagenes/03.png', 1),
(93, 89, 'Movimientos Bancarios', 'tesoreria_movimientos_bancarios.php', 'tesoreria_movimientos_bancarios.tpl', 4, '../../libs/imagenes/01.png', 1),
(94, 89, 'Conciliacion Bancaria', 'tesoreria_conciliacion_seleccion_cuenta.php', 'tesoreria_conciliacion_seleccion_cuenta.tpl', 5, '../../libs/imagenes/41.png', 1),
(95, 89, 'Reportes', NULL, NULL, 6, '../../libs/imagenes/66.png', 0),
(96, 89, 'Tipos de Movimientos Bancarios', 'tipos_movimientos_bancarios.php', 'tipos_movimientos_bancarios.tpl', 11, '../../libs/imagenes/55.png', 1),
(97, 1, 'Impuesto Municipal ICA', 'impuesto_municipal_ica.php', 'impuesto_municipal_ica.tpl', 9, '../../libs/imagenes/20.png', 0),
(98, 1, 'Tipos de Impuestos', 'tipo_impuesto.php', 'tipo_impuesto.tpl', 12, '../../libs/imagenes/20.png', 1),
(99, 1, 'Entidades', 'entidad.php', 'entidad.tpl', 13, '../../libs/imagenes/20.png', 1),
(100, 1, 'Formulacion de Impuestos', 'formulacion_impuestos.php', 'formulacion_impuestos.tpl', 14, '../../libs/imagenes/20.png', 1),
(101, 1, 'Lista de Impuestos', 'lista_impuestos.php', 'lista_impuestos.tpl', 15, '../../libs/imagenes/11.png', 1),
(102, 2, 'Tipo de Clientes', 'tipo_cliente.php', 'tipo_cliente.tpl', 1, '../../libs/imagenes/icons/28.png', 1),
(103, 1, 'Moneda', 'multi_moneda.php', 'multi_moneda.tpl', 20, '../../libs/imagenes/moneda.png', 1),
(104, 1, 'Divisas', 'divisas.php', 'divisas.tpl', NULL, '../../libs/imagenes/moneda.png', 0),
(105, 1, 'Tasas de Cambio', 'tasas_de_cambio.php', 'tasas_de_cambio.tpl', 0, '../../libs/imagenes/moneda.png', 0),
(106, NULL, 'Operaciones', NULL, NULL, 10, '../../libs/imagenes/icons/10.png', 1),
(107, 106, 'Cargar Archivo Pos', 'cargar_post.php', 'cargar_post.tpl', 1, '../../libs/imagenes/icons/10.png', 1),
(108, 3, 'Kardex Almacen', 'kardex_almacen.php', 'kardex_almacen.tpl', 5, '../../libs/imagenes/icons/10.png', 1),
(109, 3, 'Entradas Almacen', 'entrada_almacen.php', 'entrada_almacen.tpl', 6, '../../libs/imagenes/icons/10.png', 1),
(110, 3, 'Salidas Almacen', 'salida_almacen.php', 'salida_almacen.tpl', 7, '../../libs/imagenes/icons/10.png', 1),
(111, 3, 'Traslados entre Almacenes', 'traslados_almacen.php', 'traslados_almacen.tpl', 8, '../../libs/imagenes/icons/10.png', 1),
(112, 3, 'Tipos de Movimientos de Almacen', 'tipo_movimientos_almacen.php', 'tipo_movimientos_almacen.tpl', 8, '../../libs/imagenes/icons/10.png', 1),
(113, 106, 'Contabilizar cheques', 'contabilizar_cheque.php', 'contabilizar_cheque.tpl', 2, '../../libs/imagenes/icons/10.png', 0),
(114, 106, 'Contabilizar Facturas', 'contabilizar_facturacion.php', 'contabilizar_facturacion.tpl', 3, '../../libs/imagenes/icons/10.png', 0),
(115, 106, 'Contabilizar ND', 'contabilizar_nota_debito.php', 'contabilizar_nota_debito.tpl', 5, '../../libs/imagenes/icons/10.png', 0),
(116, 106, 'Contabilizar NC', 'contabilizar_nota_credito.php', 'contabilizar_nota_credito.tpl', 4, '../../libs/imagenes/icons/10.png', 0),
(117, 89, 'Imprimir de Conciliacion Bancaria', 'tesoreria_vista_conciliaciones.php', 'tesoreria_vista_conciliaciones.tpl', 5, '../../libs/imagenes/03.png', 1),
(118, NULL, 'Requisiciones', NULL, NULL, 2, '../../libs/imagenes/41.png', 0),
(119, 118, 'Requisiciones compras/materiales 	', 'requisiciones.php', 'requisiciones.tpl', 1, '../../libs/imagenes/41.png', 1),
(120, 1, 'Unidades Administrativas / Departamentos', 'unidades_list.php', 'unidades_list.tpl', 22, '../../libs/imagenes/12.png', 1),
(121, 118, 'Requisiciones Servicios', 'unidades_list3.php', 'unidades_list3.tpl', 2, '../../libs/imagenes/41.png', 1),
(122, 84, 'Requisiciones Administracion', 'requisiciones_administracion_list.php', 'requisiciones_administracion_list.tpl', 3, '../../libs/imagenes/41.png', 0),
(123, 118, 'Analisis de Cotizaciones', 'analisiscotizaciones.php', 'analisiscotizaciones.tpl', 4, '../../libs/imagenes/67.png', 0),
(124, 83, 'Reporte de Listado de Proveedores', 'listadoproveedores.php', 'listadoproveedores.tpl', 2, '../../libs/imagenes/66.png', 1),
(125, 3, 'Reporte de Listado de Materiales', 'listadomateriales.php', 'listadomateriales.tpl', 9, '../../libs/imagenes/66.png', 1),
(126, 3, 'Reporte de Productos en Existencia', 'productosexistencia.php', 'productosexistencia.tpl', 10, '../../libs/imagenes/66.png', 1),
(127, 84, 'Analisis de Cotizaciones', 'analisiscotizaciones.php', 'analisiscotizaciones.tpl', 2, '../../libs/imagenes/67.png', 0),
(128, 84, 'Requisiciones Compras', 'requisicionescompras.php', 'requisicionescompras.tpl', 1, '../../libs/imagenes/61.png', 0),
(129, 84, 'Emision de Ordenes de Compra ', 'ordendecompra.php', 'ordendecompra.tpl', 3, '../../libs/imagenes/4.png', 0),
(130, 7, 'Libro de Compras', 'seleccionarFecha1.php', 'seleccionarFecha7.tpl', 7, '../../libs/imagenes/56.png', 1),
(131, 7, 'Libro de Ventas', 'seleccionarFecha1.php', 'seleccionarFecha6.tpl', 8, '../../libs/imagenes/56.png', 1),
(132, 1, 'Especialidades de Proveedores', 'proveedores_especialidad.php', 'proveedores_especialidad.tpl', 21, '../../libs/imagenes/28.png', 1),
(133, 6, 'Cuentas x Cobrar Pendiente por Presentar', 'cxc_lista_clientes_pendiente.php', 'cxc_lista_clientes_pendiente.tpl', 2, '../../libs/imagenes/25.png', 1),
(134, 6, 'Cuentas x Cobrar Pendiente por Autorizar', 'cxc_lista_clientes_autorizar.php', 'cxc_lista_clientes_autorizar.tpl', 3, '../../libs/imagenes/26.png', 1),
(135, 6, 'Cuentas x Cobrar Pendiente Pago', 'cxc_lista_clientes_pago.php', 'cxc_lista_clientes_pago.tpl', 4, '../../libs/imagenes/23.png', 1),
(136, 6, 'Reporte de Cobranzas Realizadas', 'seleccionarFecha1.php', 'cobranzas_realizadas.tpl', 5, '../../libs/imagenes/icons/7.png', 1),
(137, 6, 'Reporte de Estado de Cuenta', 'resumen_cxc_clasificacion.php', 'rpt_estado_de_cuenta.tpl', 7, '../../libs/imagenes/icons/7.png', 1),
(138, 6, 'Relacion de Cuentas por Cobrar', 'seleccionarFecha1.php', 'rpt_relaciones_cxc.tpl', 8, '../../libs/imagenes/icons/7.png', 1),
(139, 6, 'Reporte Detalles de Pagos de Mas', 'seleccionarFecha1.php', 'rpt_pagos_demas.tpl', 9, '../../libs/imagenes/icons/7.png', 1),
(140, 85, 'Medicos', 'proveedores_medicos.php', 'proveedores_medicos.tpl', 2, '../../libs/imagenes/28.png', 0),
(141, 1, 'Tipo de Proveedor', 'tipo_proveedor.php', 'tipo_proveedor.tpl', 20, '../../libs/imagenes/28.png', 1),
(142, 6, 'Reporte Detalle de Pago', 'rpt_detalle_pago.php', 'rpt_detalle_pago.tpl', 10, '../../libs/imagenes/icons/7.png', 1),
(143, 6, 'Reporte Resumen CXP Clasificado', 'resumen_cxc_clasificacion.php', 'resumen_cxc_clasificacion.tpl', 11, '../../libs/imagenes/icons/7.png', 1),
(144, 2, 'Listado de Clientes', 'listado_clientes.php', 'listado_clientes.tpl', 9, '../../libs/imagenes/icons/7.png', 1),
(145, 6, 'Listado CXP Medico', 'cxp_listado_medico.php', 'cxp_listado_medico.tpl', 12, '../../libs/imagenes/icons/7.png', 0),
(146, 85, 'Listado de Medicos por Pagar', 'seleccionarFecha1.php', 'listado_cxp_medicos.tpl', 3, '../../libs/imagenes/icons/7.png', 0),
(147, 7, 'Iva Retenido', 'seleccionarFecha1.php', 'seleccionarFecha8.tpl', 9, '../../libs/imagenes/56.png', 1),
(148, 7, 'Cheques Emitidos', 'seleccionarFecha1.php', 'seleccionarFecha9.tpl', 10, '../../libs/imagenes/56.png', 1),
(149, 85, 'Listado Analiticos', 'seleccionarFecha1.php', 'analiticos.tpl', 4, '../../libs/imagenes/icons/7.png', 1),
(150, 6, 'Analiticos Facturas', 'seleccionarFecha1.php', 'analiticoscxc.tpl', 13, '../../libs/imagenes/icons/7.png', 1),
(151, 89, 'Transferencias/Cheques de gerencia', 'tesoreria_bancoSeleccionTransf.php', 'tesoreria_bancoSeleccionTransf.tpl', 10, '../../libs/imagenes/preview_f2.png', 1),
(152, 89, 'Facturas/Cheque', 'facturasxCheque.php', 'facturasxCheque.tpl', 11, '../../libs/imagenes/03.png', 1),
(153, 6, 'Estado de Cta Cliente', 'edo_cta_xcliente.php', 'edo_cta_xcliente.tpl', 13, '../../libs/imagenes/icons/7.png', 1),
(154, 5, 'Notas de Entrega', 'lista_clientes.php', 'lista_clientes.tpl', 3, '../../libs/imagenes/11.png', 1),
(155, 5, 'Pedidos', 'lista_clientes.php', 'lista_clientes.tpl', 2, '../../libs/imagenes/11.png', 1),
(156, 5, 'Presupuesto/Cotizaci&oacute;n', 'lista_clientes.php', 'lista_clientes.tpl', 1, '../../libs/imagenes/11.png', 1),
(157, 7, 'Relacion de Cotizaciones por Clientes', 'relacion_cotizacion_clientes.php', 'relacion_cotizacion_clientes.tpl', 1, '../../libs/imagenes/4.png', 1),
(158, 7, 'Relacion de Notas de Entrega por Clientes', 'relacion_notas_entrega_clientes.php', 'relacion_notas_entrega_clientes.tpl', 2, '../../libs/imagenes/4.png', 1),
(159, 7, 'Relacion de Pedidos por Clientes', 'relacion_pedidos_clientes.php', 'relacion_pedidos_clientes.tpl', 3, '../../libs/imagenes/4.png', 1),
(160, 106, 'Corte X<br>(Impresora Fiscal)', 'corte_x.php', 'corte_x.tpl', 6, '../../libs/imagenes/icons/10.png', 1),
(161, 106, 'Corte Z<br>(Impresora Fiscal)', 'corte_z.php', 'corte_z.tpl', 7, '../../libs/imagenes/icons/10.png', 1),
(162, 5, 'Productos (Precios)', 'producto_precios.php', 'producto_precios.tpl', 7, '../../libs/imagenes/13.png', 1),
(163, 7, 'Ventas Diarias', 'seleccionarFecha1.php', 'rpt_diarioVentas.tpl', 11, '../../libs/imagenes/56.png', 1),
(164, 7, 'Devoluciones Diarias', 'seleccionarFecha1.php', 'rpt_devolucionDiariaVentas.tpl', 12, '../../libs/imagenes/56.png', 1),
(165, 3, 'Reporte Movimientos de Inventario', 'seleccionarFecha1.php', 'movimientos_inventario.tpl', 11, '../../libs/imagenes/66.png', 1),
(166, 3, 'Toma de Inventario F&iacute;sico', 'toma_inventario_fisico.php', 'toma_inventario_fisico.tpl', 12, '../../libs/imagenes/66.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo_usuario`
--

CREATE TABLE IF NOT EXISTS `modulo_usuario` (
  `cod_modulo_usuario` int(32) NOT NULL AUTO_INCREMENT,
  `cod_usuario` int(32) NOT NULL,
  `cod_modulo` int(32) NOT NULL,
  PRIMARY KEY (`cod_modulo_usuario`),
  KEY `FK_modulo_usuario_1` (`cod_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Volcado de datos para la tabla `modulo_usuario`
--

INSERT INTO `modulo_usuario` (`cod_modulo_usuario`, `cod_usuario`, `cod_modulo`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 1, 3),
(4, 1, 4),
(5, 1, 6),
(6, 1, 7),
(7, 1, 72),
(8, 1, 73),
(9, 1, 75),
(10, 1, 84),
(11, 1, 85),
(12, 1, 83),
(13, 1, 89),
(14, 1, 106),
(15, 1, 118),
(16, 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `moneda`
--

CREATE TABLE IF NOT EXISTS `moneda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `relacion` float DEFAULT NULL,
  `cambio_unico` varchar(10) DEFAULT '1',
  `moneda_actual` int(11) DEFAULT NULL,
  `moneda_base` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `moneda`
--

INSERT INTO `moneda` (`id`, `relacion`, `cambio_unico`, `moneda_actual`, `moneda_base`) VALUES
(2, NULL, '1', 14, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos_bancarios`
--

CREATE TABLE IF NOT EXISTS `movimientos_bancarios` (
  `cod_movimiento_ban` int(32) NOT NULL AUTO_INCREMENT,
  `cod_tesor_bancodet` int(32) NOT NULL,
  `fecha_movimiento` date NOT NULL,
  `tipo_movimiento` int(32) NOT NULL,
  `numero_movimiento` varchar(25) NOT NULL,
  `monto` decimal(10,2) DEFAULT NULL,
  `concepto` varchar(300) DEFAULT NULL,
  `contab` varchar(2) NOT NULL,
  `estado` varchar(60) DEFAULT NULL,
  `cod_conciliacion` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(70) NOT NULL,
  PRIMARY KEY (`cod_movimiento_ban`),
  KEY `fk_tipo_movimiento` (`tipo_movimiento`),
  KEY `fk_cod_tesor_bancodet` (`cod_tesor_bancodet`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_entrega`
--

CREATE TABLE IF NOT EXISTS `nota_entrega` (
  `id_nota_entrega` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_nota_entrega` varchar(32) NOT NULL DEFAULT 'S/I',
  `id_cliente` int(32) NOT NULL,
  `cod_vendedor` int(32) NOT NULL,
  `fechaNotaEntrega` date NOT NULL DEFAULT '0000-00-00',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descuentosItemNotaEntrega` decimal(10,2) NOT NULL DEFAULT '0.00',
  `montoItemsNotaEntrega` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ivaTotalNotaEntrega` decimal(10,2) NOT NULL DEFAULT '0.00',
  `TotalTotalNotaEntrega` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cantidad_items` int(32) NOT NULL DEFAULT '0',
  `totalizar_sub_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descuento_parcial` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_operacion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_pdescuento_global` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descuento_global` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_base_imponible` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_iva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_general` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_retencion` decimal(10,2) NOT NULL,
  `cod_estatus` int(32) unsigned DEFAULT NULL,
  `fecha_pago` date NOT NULL DEFAULT '0000-00-00',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(40) NOT NULL,
  PRIMARY KEY (`id_nota_entrega`),
  KEY `fk_cod_vendedor2` (`cod_vendedor`),
  KEY `fk_usuario` (`usuario_creacion`),
  KEY `fk_id_cliente` (`id_cliente`),
  KEY `fk_cod_estatus` (`cod_estatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nota_entrega_detalle`
--

CREATE TABLE IF NOT EXISTS `nota_entrega_detalle` (
  `id_detalle_nota_entrega` int(32) NOT NULL AUTO_INCREMENT,
  `id_nota_entrega` int(32) unsigned DEFAULT NULL,
  `id_item` int(32) unsigned DEFAULT NULL,
  `_item_almacen` int(32) DEFAULT NULL,
  `_item_descripcion` varchar(32) NOT NULL,
  `_item_cantidad` decimal(32,0) NOT NULL DEFAULT '0',
  `_item_preciosiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_descuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_montodescuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_piva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalsiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalconiva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detalle_nota_entrega`),
  KEY `fk_id_factura` (`id_nota_entrega`),
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_detalles`
--

CREATE TABLE IF NOT EXISTS `ordenes_detalles` (
  `cod_ord` int(11) NOT NULL,
  `cod_pro` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_pedida` int(10) unsigned NOT NULL,
  `cantidad_des` int(10) unsigned NOT NULL,
  `precio` decimal(13,2) NOT NULL,
  `iva` decimal(13,2) NOT NULL,
  `total` decimal(13,2) NOT NULL,
  `total_gen` decimal(13,2) NOT NULL,
  `cod_requisicion` int(10) unsigned NOT NULL,
  `cod_ord_ref` int(10) unsigned NOT NULL,
  `cod_cotizacion` int(11) NOT NULL,
  `correl` int(11) NOT NULL,
  KEY `foranea` (`cod_ord`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_tipos`
--

CREATE TABLE IF NOT EXISTS `ordenes_tipos` (
  `cod_orden_tipo` int(10) unsigned NOT NULL DEFAULT '0',
  `descripcion` varchar(35) COLLATE utf8_spanish_ci DEFAULT NULL,
  `borrarble` int(11) DEFAULT NULL,
  `codigo` int(10) unsigned NOT NULL,
  PRIMARY KEY (`cod_orden_tipo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `ordenes_tipos`
--

INSERT INTO `ordenes_tipos` (`cod_orden_tipo`, `descripcion`, `borrarble`, `codigo`) VALUES
(1, 'Compras', NULL, 487),
(2, 'Servicios', NULL, 692),
(3, 'Materiales', NULL, 0),
(7, 'Contrato', NULL, 50),
(10, 'Caja Chica', NULL, 2),
(13, 'Transferencia', NULL, 75),
(17, 'COMBUSTIBLES', NULL, 0),
(18, 'Servicios Profesionales', NULL, 46),
(19, 'Servicios de Consumo', NULL, 15),
(20, 'ARRENDAMIENTO', NULL, 31),
(21, 'SERV. RELACIONES SOCIALES', NULL, 3),
(22, 'SERVICIOS NO PERSONALES', NULL, 22),
(24, 'SERV. CAPACITACION Y ADIESTRAMIENTO', NULL, 2),
(25, 'SERVICIO DE AVISO', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros`
--

CREATE TABLE IF NOT EXISTS `parametros` (
  `codigo` smallint(16) NOT NULL,
  `nomemp` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `departamento` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `presidente` varchar(40) COLLATE utf8_spanish_ci DEFAULT NULL,
  `periodo` varchar(9) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cargo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nivel` char(1) COLLATE utf8_spanish_ci NOT NULL,
  `desislr` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ctaisrl` varchar(27) COLLATE utf8_spanish_ci DEFAULT NULL,
  `desiva` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ctaiva` varchar(27) COLLATE utf8_spanish_ci DEFAULT NULL,
  `por_isv` decimal(7,2) DEFAULT NULL,
  `compra` int(32) DEFAULT NULL,
  `servicio` int(32) DEFAULT NULL,
  `rif` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `nit` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `direccion` varchar(150) COLLATE utf8_spanish_ci DEFAULT NULL,
  `ciudad` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `estado` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefono` varchar(50) COLLATE utf8_spanish_ci DEFAULT NULL,
  `por_im` decimal(7,2) DEFAULT NULL,
  `por_bomberos` decimal(7,2) DEFAULT NULL,
  `lugar` varchar(100) COLLATE utf8_spanish_ci DEFAULT NULL,
  `sobregirop` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `sobregirof` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `autorizacionodp` varchar(2) COLLATE utf8_spanish_ci DEFAULT NULL,
  `claveodp` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `contrato` int(10) unsigned NOT NULL,
  `gas_dir` int(10) unsigned NOT NULL,
  `encabezado1` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `encabezado2` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `encabezado3` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `encabezado4` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_izq` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `imagen_der` varchar(45) COLLATE utf8_spanish_ci NOT NULL,
  `cod_asig_materiales` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `validar_materiales` varchar(10) COLLATE utf8_spanish_ci NOT NULL,
  `cta_tf` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `des_tf` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cta_fiel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `des_fiel` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cta_laboral` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `des_laboral` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cta_anticipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `des_anticipo` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cta_701` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cta_702` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cta_ret_iva` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `des_ret_iva` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cta_im` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `des_im` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `cta_bombero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `des_bombero` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `moneda` varchar(5) COLLATE utf8_spanish_ci NOT NULL,
  `cta_multa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `des_multa` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_presupuesto` varchar(11) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_compromiso` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `tipo_causado` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `version` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `serial` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivo_iva` int(8) NOT NULL,
  `precompromisos` varchar(2) COLLATE utf8_spanish_ci NOT NULL,
  `cta_aporte` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `des_aporte` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  `consecutivo_RRS` int(8) NOT NULL,
  `consecutivo_ISLR` int(8) NOT NULL,
  `consecutivo_TF` int(8) NOT NULL,
  `consecutivo_IM` int(8) NOT NULL,
  `consecutivo_RP` int(8) NOT NULL,
  `consecutivo_MP` int(11) NOT NULL,
  `pers_adm` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `telefonofax` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`codigo`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `parametros`
--

INSERT INTO `parametros` (`codigo`, `nomemp`, `departamento`, `presidente`, `periodo`, `cargo`, `nivel`, `desislr`, `ctaisrl`, `desiva`, `ctaiva`, `por_isv`, `compra`, `servicio`, `rif`, `nit`, `direccion`, `ciudad`, `estado`, `telefono`, `por_im`, `por_bomberos`, `lugar`, `sobregirop`, `sobregirof`, `autorizacionodp`, `claveodp`, `contrato`, `gas_dir`, `encabezado1`, `encabezado2`, `encabezado3`, `encabezado4`, `imagen_izq`, `imagen_der`, `cod_asig_materiales`, `validar_materiales`, `cta_tf`, `des_tf`, `cta_fiel`, `des_fiel`, `cta_laboral`, `des_laboral`, `cta_anticipo`, `des_anticipo`, `cta_701`, `cta_702`, `cta_ret_iva`, `des_ret_iva`, `cta_im`, `des_im`, `cta_bombero`, `des_bombero`, `moneda`, `cta_multa`, `des_multa`, `tipo_presupuesto`, `tipo_compromiso`, `tipo_causado`, `version`, `serial`, `consecutivo_iva`, `precompromisos`, `cta_aporte`, `des_aporte`, `consecutivo_RRS`, `consecutivo_ISLR`, `consecutivo_TF`, `consecutivo_IM`, `consecutivo_RP`, `consecutivo_MP`, `pers_adm`, `telefonofax`) VALUES
(1, 'XTRA SPORT, C.A.', '', '', '2012', '', '', '', '2.1.1.03.09.01.01.', '', '4.03.18.01.00', 12.00, 1, 1, 'J-3071341-8', '', 'Calle Independencia C.C. Doble A, Nivel P.B.', 'Carupano', 'Sucre', '', 2.00, 10.00, NULL, 'N', 'N', NULL, NULL, 1, 1, '', 'XTRA SPORT, C.A.', '', ' ', '../imagenes/logo_selectra.jpg', '', '', '', '2.1.1.03.09.01.03.', 'RetenciÃ³n Timbre Fiscal', '2.1.1.03.01.01.08.', 'RetenciÃ³n Fianza Fiel Cumplimiento', '2.1.1.03.01.01.09.', 'RetenciÃ³n Garantia Laboral', '', '', '', '', '2.1.1.03.09.01.02.', 'RetenciÃ³n Impuesto al Valor Agregrado (IVA)', '', 'RetenciÃ³n Impuesto Municipal', '', '', 'Bs.', '2.1.1.03.09.01.0005.', 'RetenciÃ³n Empresa de Produccion Social . EPS', 'Programa', 'SI', 'SI', '', '20110101', 0, 'N', '', '', 0, 0, 0, 0, 0, 0, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `parametros_generales`
--

CREATE TABLE IF NOT EXISTS `parametros_generales` (
  `cod_empresa` int(32) NOT NULL AUTO_INCREMENT,
  `nombre_empresa` varchar(80) NOT NULL,
  `direccion` varchar(400) NOT NULL,
  `ciudad` varchar(32) NOT NULL,
  `telefonos` varchar(100) NOT NULL,
  `id_fiscal` varchar(20) NOT NULL,
  `rif` varchar(50) NOT NULL,
  `id_fiscal2` varchar(50) NOT NULL,
  `nit` varchar(50) NOT NULL,
  `moneda` varchar(50) NOT NULL,
  `contribuyente_formal` tinyint(1) NOT NULL,
  `cantidad_copias` int(32) NOT NULL,
  `dias_vencimiento` int(30) NOT NULL,
  `titulo_precio1` varchar(50) NOT NULL,
  `titulo_precio2` varchar(50) NOT NULL,
  `titulo_precio3` varchar(50) NOT NULL,
  `fecha_ultimo_cierre_mensual` date NOT NULL,
  `precio_menor` int(10) NOT NULL COMMENT 'Debe indicar cual de los tres precios es el menor, Precio 1, Precio 2 o Precio 3',
  `unidad_tributaria` int(3) NOT NULL,
  `clasificador_de_documentos` tinyint(1) NOT NULL COMMENT 'Ã‚Â¿Usar clasificador de Documentos?',
  `nombre_impuesto_principal` varchar(50) NOT NULL,
  `porcentaje_impuesto_principal` decimal(10,2) NOT NULL COMMENT 'Porcentaje de I.V.A.',
  `iva_a` decimal(10,2) NOT NULL,
  `iva_b` decimal(10,2) NOT NULL,
  `iva_c` decimal(10,2) NOT NULL,
  `activar_impuesto2` tinyint(1) NOT NULL,
  `string_impuesto2` varchar(50) NOT NULL,
  `porcentaje_impuesto2` decimal(10,2) NOT NULL,
  `activar_impuesto3` tinyint(1) NOT NULL,
  `string_impuesto3` varchar(50) NOT NULL,
  `porcentaje_impuesto3` decimal(10,2) NOT NULL,
  `contribuyente_especial` tinyint(1) NOT NULL,
  `pprovee_sobr_impu_princ` double(10,2) NOT NULL COMMENT 'procentaje proveedores sobre impuesto principal',
  `pclient_sobr_impu_princ` decimal(10,2) NOT NULL COMMENT 'procentaje clientes sobre impuesto principal',
  `string_clasificador_inventario1` varchar(50) NOT NULL,
  `string_clasificador_inventario2` varchar(50) NOT NULL,
  `string_clasificador_inventario3` varchar(50) NOT NULL,
  `impresora_marca` varchar(50) DEFAULT NULL,
  `impresora_modelo` varchar(50) DEFAULT NULL,
  `impresora_serial` varchar(50) DEFAULT NULL,
  `moneda_base` int(11) DEFAULT '1',
  `servicio_fk` int(11) DEFAULT NULL,
  PRIMARY KEY (`cod_empresa`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `parametros_generales`
--

INSERT INTO `parametros_generales` (`cod_empresa`, `nombre_empresa`, `direccion`, `ciudad`, `telefonos`, `id_fiscal`, `rif`, `id_fiscal2`, `nit`, `moneda`, `contribuyente_formal`, `cantidad_copias`, `dias_vencimiento`, `titulo_precio1`, `titulo_precio2`, `titulo_precio3`, `fecha_ultimo_cierre_mensual`, `precio_menor`, `unidad_tributaria`, `clasificador_de_documentos`, `nombre_impuesto_principal`, `porcentaje_impuesto_principal`, `iva_a`, `iva_b`, `iva_c`, `activar_impuesto2`, `string_impuesto2`, `porcentaje_impuesto2`, `activar_impuesto3`, `string_impuesto3`, `porcentaje_impuesto3`, `contribuyente_especial`, `pprovee_sobr_impu_princ`, `pclient_sobr_impu_princ`, `string_clasificador_inventario1`, `string_clasificador_inventario2`, `string_clasificador_inventario3`, `impresora_marca`, `impresora_modelo`, `impresora_serial`, `moneda_base`, `servicio_fk`) VALUES
(1, 'XTRA SPORT, C.A.', 'Calle Independencia C.C. Doble A, Nivel P.B.\r\nLocal 2 sectro centro', 'Carupano', '0294', 'RIF', 'J-3071341-8', 'NIT', '00000000', 'Bs.', 0, 10, 30, 'Precio Detal', 'Precio Empleado', 'Precio al Mayor', '2010-12-31', 1, 90, 0, 'IVA', 12.00, 8.00, 0.00, 0.00, 1, 'ISLR', 0.00, 1, 'ICA', 0.00, 0, 50.00, 50.00, 'Departamento', 'Grupo', 'Linea', ' ', ' ', ' ', 14, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
  `id_pedido` int(32) unsigned NOT NULL AUTO_INCREMENT,
  `cod_pedido` varchar(32) NOT NULL DEFAULT 'S/I',
  `id_cliente` int(32) NOT NULL,
  `id_factura` int(32) NOT NULL DEFAULT '0',
  `cod_vendedor` int(32) NOT NULL,
  `fechaPedido` date NOT NULL DEFAULT '0000-00-00',
  `subtotal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `descuentosItemPedido` decimal(10,2) NOT NULL DEFAULT '0.00',
  `montoItemsPedido` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ivaTotalPedido` decimal(10,2) NOT NULL DEFAULT '0.00',
  `TotalTotalPedido` decimal(10,2) NOT NULL DEFAULT '0.00',
  `cantidad_items` int(32) NOT NULL DEFAULT '0',
  `totalizar_sub_total` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descuento_parcial` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_operacion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_pdescuento_global` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descuento_global` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_base_imponible` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_iva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_general` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_total_retencion` decimal(10,2) NOT NULL,
  `cod_estatus` int(32) unsigned DEFAULT NULL,
  `fecha_pago` date NOT NULL DEFAULT '0000-00-00',
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(40) NOT NULL,
  PRIMARY KEY (`id_pedido`),
  KEY `fk_cod_vendedor2` (`cod_vendedor`),
  KEY `fk_usuario` (`usuario_creacion`),
  KEY `fk_id_cliente` (`id_cliente`),
  KEY `fk_cod_estatus` (`cod_estatus`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle`
--

CREATE TABLE IF NOT EXISTS `pedido_detalle` (
  `id_detalle_pedido` int(32) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(32) unsigned DEFAULT NULL,
  `id_item` int(32) unsigned DEFAULT NULL,
  `cod_item` varchar(20) NOT NULL,
  `_item_almacen` int(32) DEFAULT NULL,
  `_item_descripcion` varchar(32) NOT NULL,
  `_item_cantidad` decimal(32,0) NOT NULL DEFAULT '0',
  `_item_preciosiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_descuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_montodescuento` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_piva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalsiniva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `_item_totalconiva` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_detalle_pedido`),
  KEY `fk_id_factura` (`id_pedido`),
  KEY `id_item` (`id_item`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle_formapago`
--

CREATE TABLE IF NOT EXISTS `pedido_detalle_formapago` (
  `cod_pedido_detalle_formapago` int(32) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(32) unsigned NOT NULL DEFAULT '0',
  `totalizar_monto_cancelar` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_saldo_pendiente` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_cambio` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_efectivo` decimal(10,2) NOT NULL DEFAULT '0.00',
  `opt_cheque` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_cheque` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nombre_banco` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `opt_tarjeta` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_tarjeta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_tipo_tarjeta` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_formapago',
  `opt_deposito` tinyint(1) NOT NULL DEFAULT '0',
  `totalizar_monto_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_nro_deposito` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_banco_deposito` int(32) NOT NULL DEFAULT '0' COMMENT 'cod_banco',
  `fecha_vencimiento` date NOT NULL,
  `observacion` varchar(600) NOT NULL,
  `persona_contacto` varchar(100) NOT NULL,
  `telefono` varchar(100) NOT NULL,
  `opt_otrodocumento` tinyint(1) NOT NULL,
  `totalizar_tipo_otrodocumento` int(32) NOT NULL COMMENT 'Tipo de documento',
  `totalizar_monto_otrodocumento` decimal(10,2) NOT NULL,
  `totalizar_nro_otrodocumento` int(32) NOT NULL,
  `totalizar_banco_otrodocumento` int(32) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_pedido_detalle_formapago`),
  KEY `id_factura` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_impuestos`
--

CREATE TABLE IF NOT EXISTS `pedido_impuestos` (
  `id_pedido_impuestos` int(32) NOT NULL AUTO_INCREMENT,
  `id_pedido` int(32) unsigned NOT NULL,
  `totalizar_base_retencion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_pbase_retencion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_descripcion_base_retencion` int(32) NOT NULL DEFAULT '0' COMMENT 'fk_cod_impuesto_iva',
  `cod_impuesto_iva` int(32) NOT NULL,
  `totalizar_monto_iva2` decimal(10,2) NOT NULL,
  `totalizar_monto_1x1000` decimal(10,2) NOT NULL DEFAULT '0.00',
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_pedido_impuestos`),
  KEY `id_factura` (`id_pedido`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `post_micros`
--

CREATE TABLE IF NOT EXISTS `post_micros` (
  `CODIGO` varchar(30) DEFAULT NULL,
  `TIP` varchar(30) DEFAULT NULL,
  `FACT` varchar(30) DEFAULT NULL,
  `DESCONOCIDO` varchar(30) DEFAULT NULL,
  `CANT` varchar(30) DEFAULT NULL,
  `Descrp` varchar(30) DEFAULT NULL,
  `PVP` varchar(30) DEFAULT NULL,
  `Fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_kit`
--

CREATE TABLE IF NOT EXISTS `productos_kit` (
  `id_item_padre` varchar(10) NOT NULL,
  `id_item_hijo` varchar(10) NOT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id_item_padre`,`id_item_hijo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `id_proveedor` int(32) NOT NULL AUTO_INCREMENT,
  `cod_proveedor` varchar(100) NOT NULL,
  `descripcion` varchar(200) NOT NULL,
  `direccion` varchar(300) NOT NULL,
  `telefonos` varchar(100) NOT NULL,
  `fax` varchar(20) NOT NULL,
  `email` varchar(200) NOT NULL,
  `rif` varchar(20) NOT NULL,
  `nit` varchar(20) NOT NULL,
  `estatus` varchar(10) NOT NULL,
  `cod_tipo_proveedor` varchar(25) DEFAULT NULL,
  `clase_proveedor` varchar(25) NOT NULL,
  `cod_entidad` int(11) NOT NULL,
  `cod_especialidad` int(4) NOT NULL,
  `fecha_creacion` date NOT NULL DEFAULT '0000-00-00',
  `usuario_creacion` varchar(50) NOT NULL,
  `cuenta_contable` varchar(25) DEFAULT NULL,
  `compania` varchar(200) DEFAULT NULL,
  `mostrar` int(11) DEFAULT NULL,
  `cod_impuesto_proveedor` int(11) NOT NULL,
  UNIQUE KEY `id_proveedor` (`id_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `cod_proveedor`, `descripcion`, `direccion`, `telefonos`, `fax`, `email`, `rif`, `nit`, `estatus`, `cod_tipo_proveedor`, `clase_proveedor`, `cod_entidad`, `cod_especialidad`, `fecha_creacion`, `usuario_creacion`, `cuenta_contable`, `compania`, `mostrar`, `cod_impuesto_proveedor`) VALUES
(1, '00001', 'Asys CA', 'Av. Perimetral', '0293 ', '', '', 'J304203993', ' ', 'A', '', '5', 1, 79, '0000-00-00', 'asys', '1.1.01.01.', 'Asys CA', 0, 1),
(2, '00001', 'ASYSCA', 'AV. 20 SECTOR PARAISO MARACAIBO ZULIA', '02934310161  ', '02934310161', 'info@asys.com.ve', 'J304203993', ' ', 'A', '', '2', 3, 1, '0000-00-00', 'asys', '', 'ASys Consultores de Sistemas C.A.', 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `px`
--

CREATE TABLE IF NOT EXISTS `px` (
  `id_cliente` int(32) DEFAULT NULL,
  `cod_cliente` varchar(80) DEFAULT NULL,
  `nombre` varchar(80) DEFAULT NULL,
  `id_pedido` int(32) unsigned DEFAULT NULL,
  `cod_pedido` varchar(32) DEFAULT NULL,
  `fecha_pedido` date DEFAULT NULL,
  `cantidad_items` int(32) DEFAULT NULL,
  `totalizar_total_general` decimal(10,2) DEFAULT NULL,
  `usuario_creacion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisiciones`
--

CREATE TABLE IF NOT EXISTS `requisiciones` (
  `cod_requisicion` int(11) NOT NULL DEFAULT '0',
  `agregada_fecha` date DEFAULT NULL,
  `agregada_hora` time DEFAULT NULL,
  `estacion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `situacion` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `unidad` int(32) DEFAULT NULL,
  `cod_centro` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `concepto` text COLLATE utf8_spanish_ci,
  `fecha` date DEFAULT NULL,
  `tipo` varchar(20) COLLATE utf8_spanish_ci DEFAULT NULL,
  `req_compra` varchar(11) COLLATE utf8_spanish_ci DEFAULT NULL,
  `codigo_cuenta` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_requisicion`),
  KEY `unidad` (`unidad`,`cod_centro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisiciones_det`
--

CREATE TABLE IF NOT EXISTS `requisiciones_det` (
  `cod_requisicion_det` int(32) NOT NULL DEFAULT '0',
  `cod_requisicion` int(32) NOT NULL,
  `cod_item` varchar(15) COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci DEFAULT NULL,
  `cantidad` decimal(20,2) DEFAULT NULL,
  `unidad` int(11) NOT NULL DEFAULT '0',
  `cod_centro` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `medida` varchar(50) COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`cod_requisicion_det`,`cod_requisicion`,`cod_item`,`unidad`,`cod_centro`),
  KEY `cod_requisicion` (`cod_requisicion`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `requisiciones_detalles_temp`
--

CREATE TABLE IF NOT EXISTS `requisiciones_detalles_temp` (
  `cod_material` varchar(20) COLLATE utf8_spanish_ci NOT NULL,
  `cantidad_solicitada` int(11) NOT NULL,
  `cantidad_disponible` int(11) NOT NULL,
  `cantidad_despachar` int(11) NOT NULL,
  `cantidad_comprar` int(11) NOT NULL,
  `tipo_requisicion` int(11) NOT NULL,
  `descripcion` varchar(200) COLLATE utf8_spanish_ci NOT NULL,
  `medida` varchar(50) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci COMMENT='Tabla que sirve para separar las requisiciones de compras y ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsable`
--

CREATE TABLE IF NOT EXISTS `responsable` (
  `cod_responsable` int(32) NOT NULL AUTO_INCREMENT,
  `responsable` varchar(70) NOT NULL,
  `usuario_creacion` varchar(70) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`cod_responsable`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_islr`
--

CREATE TABLE IF NOT EXISTS `servicios_islr` (
  `id_servicio_islr` int(32) NOT NULL AUTO_INCREMENT,
  `cod_item` int(32) NOT NULL,
  `cod_lista_impuesto` int(32) NOT NULL,
  PRIMARY KEY (`id_servicio_islr`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subseccion`
--

CREATE TABLE IF NOT EXISTS `subseccion` (
  `opt_subseccion` varchar(80) NOT NULL COMMENT 'add, edit, delete',
  `archivo_tpl` varchar(100) NOT NULL,
  `archivo_php` varchar(100) NOT NULL,
  `cod_seccion` int(32) unsigned DEFAULT NULL,
  `descripcion` varchar(100) NOT NULL,
  KEY `FK_subseccion_1` (`cod_seccion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subseccion`
--

INSERT INTO `subseccion` (`opt_subseccion`, `archivo_tpl`, `archivo_php`, `cod_seccion`, `descripcion`) VALUES
('edit', 'almacen_editar.tpl', 'almacen_editar.php', 55, 'Editar Almacen'),
('delete', 'almacen_eliminar.tpl', 'almacen_eliminar.php', 55, 'Eliminar Almacen'),
('add', 'zona_nuevo.tpl', 'zona_nuevo.php', 56, 'Agregrando Zona'),
('edit', 'zona_editar.tpl', 'zona_editar.php', 56, 'Editar Zona'),
('delete', 'zona_eliminar.tpl', 'zona_eliminar.php', 56, 'Eliminar Zona'),
('add', 'vendedor_nuevo.tpl', 'vendedor_nuevo.php', 57, 'Incluyendo Vendedor'),
('edit', 'vendedor_editar.tpl', 'vendedor_editar.php', 57, 'Editar Informacion del Vendedor'),
('delete', 'vendedor_eliminar.tpl', 'vendedor_eliminar.php', 57, 'Eliminar Vendedor'),
('add', 'departamento_nuevo.tpl', 'departamento_nuevo.php', 64, 'Agregando Departamento'),
('edit', 'departamento_editar.tpl', 'departamento_editar.php', 64, 'Editar Departamento'),
('delete', 'departamento_eliminar.tpl', 'departamento_eliminar.php', 64, 'Eliminar Departamento'),
('add', 'grupo_nuevo.tpl', 'grupo_nuevo.php', 65, 'Agregando Grupo'),
('edit', 'grupo_editar.tpl', 'grupo_editar.php', 65, 'Editar Grupo'),
('delete', 'grupo_eliminar.tpl', 'grupo_eliminar.php', 65, 'Eliminar Grupo'),
('add', 'linea_nuevo.tpl', 'linea_nuevo.php', 66, 'Agregando Linea'),
('edit', 'linea_editar.tpl', 'linea_editar.php', 66, 'Editar Linea'),
('delete', 'linea_eliminar.tpl', 'linea_eliminar.php', 66, 'Eliminar Linea'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 8, 'Editar Informacion del Cliente'),
('delete', 'cliente_eliminar.tpl', 'cliente_eliminar.php', 8, 'Eliminar Cliente'),
('add', 'producto_nuevo.tpl', 'producto_nuevo.php', 61, 'Agregando Producto'),
('edit', 'producto_editar.tpl', 'producto_editar.php', 61, 'Aditar Producto'),
('delete', 'producto_eliminar.tpl', 'producto_eliminar.php', 61, 'Eliminar Producto'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 8, 'Nuevo Cliente'),
('add', 'servicio_nuevo.tpl', 'servicio_nuevo.php', 67, 'Incluyendo Nuevo Servicio'),
('edit', 'servicio_editar.tpl', 'servicio_editar.php', 67, 'Editar Servicio'),
('delete', 'servicio_eliminar.tpl', 'servicio_eliminar.php', 67, 'Eliminar Servicio'),
('add', 'usuarios_nuevo.tpl', 'usuarios_nuevo.php', 68, 'Nuevo Usuario'),
('edit', 'usuarios_editar.tpl', 'usuarios_editar.php', 68, 'Editar Usuario'),
('delete', 'usuarios_eliminar.tpl', 'usuarios_eliminar.php', 68, 'Eliminar Usuario'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 58, 'Incluyendo Cliente'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 58, 'Editar Informacion del Cliente'),
('newfactura', 'factura_nueva.tpl', 'factura_nueva.php', 58, 'Nueva Factura'),
('viewProductos', 'producto_existencia_almacen_viewProductos.tpl', 'producto_existencia_almacen_viewProductos.php', 69, 'Lista de Productos por Almacen'),
('add', 'producto_existencia_almacen_viewProductosAgregar.tpl', 'producto_existencia_almacen_viewProductosAgregar.php', 69, 'Incluyendo Producto al Almacen'),
('edit', 'producto_existencia_almacen_viewProductosEditar.tpl', 'producto_existencia_almacen_viewProductosEditar.php', 69, 'Editar Cantidad Existente del Producto'),
('delete', 'producto_existencia_almacen_viewProductosEliminar.tpl', 'producto_existencia_almacen_viewProductosEliminar.php', 69, 'Eliminar Existencia del Producto'),
('add', 'almacen_nuevo.tpl', 'almacen_nuevo.php', 55, 'Agregando Almacen'),
('add', 'almacen_nuevo.tpl', 'almacen_nuevo.php', 55, 'Agregando Almacen'),
('add', 'islr_nuevo.tpl', 'islr_nuevo.php', 70, 'Nuevo ISLR'),
('edit', 'islr_editar.tpl', 'islr_editar.php', 70, 'Editar ISLR'),
('delete', 'islr_eliminar.tpl', 'islr_eliminar.php', 70, 'Eliminar ISLR'),
('add', 'boletos_nuevo.tpl', 'boletos_nuevo.php', 72, 'AÃƒÂ±adir Boleto'),
('edit', 'boletos_editar.tpl', 'boletos_editar.php', 72, 'Editar Boleto'),
('delete', 'boletos_eliminar.tpl', 'boletos_eliminar.php', 72, 'Eliminar Boleto'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 73, 'Incluyendo Cliente'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 73, 'Editar Informacion del Cliente'),
('newfactura', 'factura_nueva_boleto.tpl', 'factura_nueva_boleto.php', 73, 'Nueva Factura (Boletos)'),
('add', 'responsable_nuevo.tpl', 'responsable_nuevo.php', 76, 'Incluyendo Responsable'),
('edit', 'responsable_editar.tpl', 'responsable_editar.php', 76, 'Editar Responsable'),
('delete', 'responsable_eliminar.tpl', 'responsable_eliminar.php', 76, 'Eliminar Responsable'),
('add', 'banco_nuevo.tpl', 'banco_nuevo.php', 77, 'Incluir Banco'),
('edit', 'banco_editar.tpl', 'banco_editar.php', 77, 'Editar Banco'),
('delete', 'banco_eliminar.tpl', 'banco_eliminar.php', 77, 'Eliminar Banco'),
('add', 'instrumentoformapago_nuevo.tpl', 'instrumentoformapago_nuevo.php', 78, 'Incluir Forma Pago'),
('edit', 'instrumentoformapago_editar.tpl', 'instrumentoformapago_editar.php', 78, 'Editar Forma Pago'),
('delete', 'instrumentoformapago_eliminar.tpl', 'instrumentoformapago_eliminar.php', 78, 'Eliminar Forma Pago'),
('edocuenta', 'cxc_estadodecuenta.tpl', 'cxc_estadodecuenta.php', 59, 'Estado de Cuenta'),
('newfactura', 'factura_nueva.tpl', 'factura_nueva.php', 59, 'Nueva Factura'),
('pagooabono', 'cxc_pagooabono.tpl', 'cxc_pagooabono.php', 59, 'Nuevo Pago/Abono'),
('add', 'retencioniva_nuevo.tpl', 'retencioniva_nuevo.php', 80, 'Agregar Nuevo Registro de Retencion I.V.A.'),
('edit', 'retencioniva_editar.tpl', 'retencioniva_editar.php', 80, 'Editar Registro de Retencion I.V.A.'),
('delete', 'retencioniva_eliminar.tpl', 'retencioniva_eliminar.php', 80, 'Eliminar Registro de Retencion I.V.A.'),
('devolver_ps', 'devolucion_venta.tpl', 'devolucion_venta.php', 79, 'DevoluciÃƒÂ³n de Venta'),
('add', 'proveedores_nuevo.tpl', 'proveedores_nuevo.php', 86, 'Incluir Nuevo Proveedor'),
('edit', 'proveedores_editar.tpl', 'proveedores_editar.php', 86, 'Editar Informacion del proveedor'),
('delete', 'proveedores_eliminar.tpl', 'proveedores_eliminar.php', 86, 'Eliminar Proveedor'),
('newCompra', 'proveedores_compra_nuevo.tpl', 'proveedores_compra_nuevo.php', 87, 'Generar Nueva Compra'),
('add', 'proveedores_nuevo.tpl', 'proveedores_nuevo.php', 87, 'Incluir Nuevo Proveedor'),
('edit', 'proveedores_editar.tpl', 'proveedores_editar.php', 87, 'Editar Informacion del proveedor'),
('delete', 'proveedores_eliminar.tpl', 'proveedores_eliminar.php', 87, 'Eliminar Proveedor'),
('edocuenta', 'cxp_estadodecuenta.tpl', 'cxp_estadodecuenta.php', 88, 'Cuenta por pagar'),
('pagoabonoCXP', 'cxp_pagoabono.tpl', 'cxp_pagoabono.php', 88, 'Agregar Abono de compra'),
('add', 'banco_nuevo.tpl', 'banco_nuevo.php', 90, 'Incluir Banco'),
('edit', 'banco_editar.tpl', 'banco_editar.php', 90, 'Editar Banco'),
('viewcuentasByBanco', 'tesoreria_banco_cuentas.tpl', 'tesoreria_banco_cuentas.php', 90, 'Cuentas'),
('addCuentaByBanco', 'tesoreria_banco_cuentas_agregar.tpl', 'tesoreria_banco_cuentas_agregar.php', 90, 'Incluir Cuenta Bancaria'),
('editCuentaByBanco', 'tesoreria_banco_cuentas_editar.tpl', 'tesoreria_banco_cuentas_editar.php', 90, 'Editar Cuenta'),
('deleteCuentaByBanco', 'tesoreria_banco_cuentas_eliminar.tpl', 'tesoreria_banco_cuentas_eliminar.php', 90, 'Eliminar Cuenta'),
('listaChequeraCuentaB', 'listaChequeraCuentaByBanco.tpl', 'listaChequeraCuentaByBanco.php', 90, 'Lista de Chequeras'),
('listaChequeraCuentaByBanco', 'tesoreria_listaChequeraCuentaByBanco.tpl', 'tesoreria_listaChequeraCuentaByBanco.php', 90, 'Lista de Chequeras'),
('addChequeraCuentaByBanco', 'tesoreria_addChequeraCuentaByBanco.tpl', 'tesoreria_addChequeraCuentaByBanco.php', 90, 'Nuevo Cheque'),
('editChequeraCuentaByBanco', 'tesoreria_editChequeraCuentaByBanco.tpl', 'tesoreria_editChequeraCuentaByBanco.php', 90, 'Editar Chequera'),
('deleteChequeraCuentaByBanco', 'tesoreria_deleteChequeraCuentaByBanco.tpl', 'tesoreria_deleteChequeraCuentaByBanco.php', 90, 'Eliminar Chequera'),
('generarChequeraCuentaByBanco', 'tesoreria_generarChequeraCuentaByBanco.tpl', 'tesoreria_generarChequeraCuentaByBanco.php', 90, 'Generar Chequera'),
('activarChequeraCuentaByBanco', 'tesoreria_activarChequeraCuentaByBanco.tpl', 'tesoreria_activarChequeraCuentaByBanco.php', 90, 'Activar Cheques'),
('consumirChequeraCuentaByBanco', 'tesoreria_consumirChequeraCuentaByBanco.tpl', 'tesoreria_consumirChequeraCuentaByBanco.php', 90, 'Consumir Chequera'),
('depositoChequeraCuentaByBanco', 'tesoreria_depositoChequeraCuentaByBanco.tpl', 'tesoreria_depositoChequeraCuentaByBanco.php', 90, 'Cambiar a Estatus Deposito'),
('ver_chequesChequeraCuentaByBanco', 'tesoreria_ver_chequesChequeraCuentaByBanco.tpl', 'tesoreria_ver_chequesChequeraCuentaByBanco.php', 90, 'Cheques'),
('verChequerasByBanco', 'tesoreria_banco_cuentasSeleccioneParaCuenta.tpl', 'tesoreria_banco_cuentasSeleccioneParaCuenta.php', 91, 'Cuentas'),
('SeleccionlistaChequeraCuentaByBanco', 'tesoreria_SeleccionlistaChequeraCuentaByBanco.tpl', 'tesoreria_SeleccionlistaChequeraCuentaByBanco.php', 91, 'Chequeras Activas'),
('hacerCheque', 'tesoreria_hacerCheque.tpl', 'tesoreria_hacerCheque.php', 91, 'Cheque por CxP / Cheque por Beneficiario'),
('viewmovimientosByBanco', 'tesoreria_banco_movimientos.tpl', 'tesoreria_banco_movimientos.php', 93, 'Cuentas'),
('movimientosCuentaByBanco', 'tesoreria_lista_movimientos_bancarios.tpl', 'tesoreria_lista_movimientos_bancarios.php', 93, 'Lista de Movimientos Bancarios'),
('addMovimientoCuentaByBanco', 'tesoreria_addMovimientoCuentaByBanco.tpl', 'tesoreria_addMovimientoCuentaByBanco.php', 93, 'Agregar Movimientos Bancarios'),
('editMovimientoCuentaByBanco', 'tesoreria_editMovimientoCuentaByBanco.tpl', 'tesoreria_editMovimientoCuentaByBanco.php', 93, 'Editar Movimientos Bancarios'),
('deleteMovimientoCuentaByBanco', 'tesoreria_deleteMovimientoCuentaByBanco.tpl', 'tesoreria_deleteMovimientoCuentaByBanco.php', 93, 'Eliminar Movimientos Bancarios'),
('edit', 'tipos_movimientos_bancarios_edit.tpl', 'tipos_movimientos_bancarios_edit.php', 96, 'Editar Tipo de Movimiento'),
('delete', 'tipos_movimientos_bancarios_delete.tpl', 'tipos_movimientos_bancarios_delete.php', 96, 'Eliminar Tipo Movimiento'),
('add', 'tipos_movimientos_bancarios_add.tpl', 'tipos_movimientos_bancarios_add.php', 96, 'Agregar Tipo de Movimiento'),
('edit', 'impuesto_municipal_ica_edit.tpl', 'impuesto_municipal_ica_edit.php', 97, 'Editar Impuesto ICA'),
('delete', 'impuesto_municipal_ica_delete.tpl', 'impuesto_municipal_ica_delete.php', 97, 'Eliminar Impuesto ICA'),
('add', 'impuesto_municipal_ica_add.tpl', 'impuesto_municipal_ica_add.php', 97, 'Agregar Impuesto ICA'),
('edit', 'tipo_impuesto_editar.tpl', 'tipo_impuesto_editar.php', 98, 'Editar Tipo de Impuesto'),
('delete', 'tipo_impuesto_eliminar.tpl', 'tipo_impuesto_eliminar.php', 98, 'Eliminar Tipo de Impuesto'),
('add', 'tipo_impuesto_nuevo.tpl', 'tipo_impuesto_nuevo.php', 98, 'Agregar Tipo de Impuesto'),
('edit', 'entidad_editar.tpl', 'entidad_editar.php', 99, 'Editar Entidad'),
('delete', 'entidad_eliminar.tpl', 'entidad_eliminar.php', 99, 'Eliminar Entidad'),
('add', 'entidad_nuevo.tpl', 'entidad_nuevo.php', 99, 'Agregar Entidad'),
('edit', 'formulacion_impuestos_editar.tpl', 'formulacion_impuestos_editar.php', 100, 'Editar Formulacion de Impuesto'),
('delete', 'formulacion_impuestos_eliminar.tpl', 'formulacion_impuestos_eliminar.php', 100, 'Eliminar Formulacion de Impuesto'),
('add', 'formulacion_impuestos_nuevo.tpl', 'formulacion_impuestos_nuevo.php', 100, 'Agregar Formulacion de Impuesto'),
('edit', 'lista_impuestos_editar.tpl', 'lista_impuestos_editar.php', 101, 'Editar Impuesto'),
('delete', 'lista_impuestos_eliminar.tpl', 'lista_impuestos_eliminar.php', 101, 'Eliminar Impuesto'),
('add', 'lista_impuestos_nuevo.tpl', 'lista_impuestos_nuevo.php', 101, 'Agregar Impuesto'),
('add', 'tipo_cliente.tpl', 'tipo_cliente_nuevo.php', 102, 'Agregandar Tipo de Cliente'),
('edit', 'tipo_cliente_editar.tpl', 'tipo_cliente_editar.php', 102, 'Editar Tipo de Cliente'),
('delete', 'tipo_cliente_eliminar.tpl', 'tipo_cliente_eliminar.php', 102, 'Eliminar Tipo de Cliente'),
('edit', 'divisas_editar.tpl', 'divisas_editar.php', 104, 'Editar Divisas'),
('add', 'divisas_agregar.tpl', 'divisas_agregar.php', 104, 'Agregar Divisa'),
('add', 'divisas_agregar2.tpl', 'divisas_agregar2.php', 105, 'Agregar Tasa Cambio'),
('edit', 'tasa_editar.tpl', 'tasa_editar.php', 105, 'Editar Tasa de Cambio'),
('add', 'tipo_movimientos_almacen_nuevo.tpl', 'tipo_movimientos_almacen_nuevo.php', 112, 'Agregar Tipo de Movimiento de Almacen'),
('edit', 'tipo_movimientos_almacen_editar.tpl', 'tipo_movimientos_almacen_editar.php', 112, 'Editar Tipo de Movimiento de Almacen'),
('delete', 'tipo_movimientos_almacen_eliminar.tpl', 'tipo_movimientos_almacen_eliminar.php', 112, 'Eliminar Tipo de Movimiento de Almacen'),
('add', 'entrada_almacen_nuevo.tpl', 'entrada_almacen_nuevo.php', 109, 'Agregar Entrada de Almacen'),
('edit', 'entrada_almacen_editar.tpl', 'entrada_almacen_editar.php', 109, 'Editar Entrada de Almacen'),
('delete', 'entrada_almacen_eliminar.tpl', 'entrada_almacen_eliminar.php', 109, 'Eliminar Entrada de Almacen'),
('add', 'salida_almacen_nuevo.tpl', 'salida_almacen_nuevo.php', 110, 'Agregar Salida de Almacen'),
('edit', 'salida_almacen_editar.tpl', 'salida_almacen_editar.php', 110, 'Editar Salida de Almacen'),
('delete', 'salida_almacen_eliminar.tpl', 'salida_almacen_eliminar.php', 110, 'Eliminar Salida de Almacen'),
('add', 'traslado_almacen_nuevo.tpl', 'traslado_almacen_nuevo.php', 111, 'Agregar Traslado de Almacen'),
('edit', 'traslado_almacen_editar.tpl', 'traslado_almacen_editar.php', 111, 'Editar Traslado de Almacen'),
('delete', 'traslado_almacen_eliminar.tpl', 'traslado_almacen_eliminar.php', 111, 'Eliminar Traslado de Almacen'),
('CuentaByBancoConciliacion', 'tesoreria_banco_movimientos_conciliacion.tpl', 'tesoreria_banco_movimientos_conciliacion.php', 94, 'Cuentas'),
('seleccionFechaAconciliar', 'tesoreria_fechas_concilar.tpl', 'tesoreria_fechas_concilar.php', 94, 'Especifique el mes a conciliar'),
('tesoreria_conciliar', 'tesoreria_concilar.tpl', 'tesoreria_concilar.php', 94, 'Conciliar'),
('add', 'proveedores_especialidad_add.tpl', 'proveedores_especialidad_add.php', 132, 'Agregar Especialidad Proveedor'),
('edit', 'proveedores_especialidad_edit.tpl', 'proveedores_especialidad_edit.php', 132, 'Editar Especialidad'),
('delete', 'proveedores_especialidad_delete.tpl', 'proveedores_especialidad_delete.php', 132, 'Eliminar Especialidad'),
('facturasCXP', 'cxp_facturas.tpl', 'cxp_facturas.php', 88, 'Facturas de compra'),
('addFac', 'cxp_facturas_nuevo.tpl', 'cxp_facturas_nuevo.php', 88, 'Agregar Factura'),
('pendienteFactura', 'cxc_pendiente.tpl', 'cxc_pendiente.php', 133, 'Cuenta por cobrar Pendiente'),
('autorizarFactura', 'cxc_autorizar.tpl', 'cxc_autorizar.php', 134, 'Cuenta por Cobrar Enviadas'),
('pagarFactura', 'cxc_pagar.tpl', 'cxc_pagar.php', 135, 'Cuenta por Cobrar '),
('cxpFacturasMedico', 'cxp_facturas_medico.tpl', 'cxp_facturas_medico.php', 140, 'Facturas por pagar medico'),
('add', 'tipo_proveedor_agregar.tpl', 'tipo_proveedor_agregar.php', 141, 'Agregar Tipo de Proveedor'),
('edit', 'tipo_proveedor_editar.tpl', 'tipo_proveedor_editar.php', 141, 'Editar Tipo de Proveedor'),
('delete', 'tipo_proveedor_eliminar.tpl', 'tipo_proveedor_eliminar.php', 141, 'Eliminar Tipo de Proveedor'),
('imprimirFacturas', 'facturasxmedico.tpl', 'facturasxmedico.php', 140, 'Facturas por Medico'),
('view', 'cxp_facturas_ver.tpl', 'cxp_facturas_ver.php', 88, 'Ver factura'),
('verCuentasPorBanco', 'tesoreria_banco_cuentasSeleccioneParaCuentaTransf.tpl', 'tesoreria_banco_cuentasSeleccioneParaCuentaTransf.php', 151, 'Cuentas'),
('transferencias', 'tesoreria_transferencia.tpl', 'tesoreria_transferencia.php', 151, 'Ver Transferencias'),
('hacerTransferencia', 'tesoreria_hacerTransferencia.tpl', 'tesoreria_hacerTransferencia.php', 151, 'Hacer transferencia'),
('imprimirFactxCheque', 'listaFactxCheque.tpl', 'listaFactxCheque.php', 152, 'Lista Factura x Cheque'),
('new', 'presupuesto_nuevo.tpl', 'presupuesto_nuevo.php', 156, 'Nuevo Presupuesto/Cotizacion'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 156, 'Agregrando Cliente'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 156, 'Editar Cliente'),
('new', 'pedido_nuevo.tpl', 'pedido_nuevo.php', 155, 'Nuevo Pedido'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 155, 'Agregrando Cliente'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 155, 'Editar Cliente'),
('new', 'nota_entrega_nueva.tpl', 'nota_entrega_nueva.php', 154, 'Nueva Nota de Entrega'),
('add', 'cliente_nuevo.tpl', 'cliente_nuevo.php', 154, 'Agregrando Cliente'),
('edit', 'cliente_editar.tpl', 'cliente_editar.php', 154, 'Editar Cliente'),
('delete', 'anular_pedido.tpl', 'anular_pedido.php', 159, 'Anulacion de  Pedidos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tabla_impuestos`
--

CREATE TABLE IF NOT EXISTS `tabla_impuestos` (
  `id_tabla_impuestos` int(32) NOT NULL AUTO_INCREMENT,
  `id_documento` int(32) unsigned NOT NULL COMMENT 'id Factura y/o Compra',
  `tipo_documento` varchar(2) NOT NULL,
  `numero_control_factura` varchar(20) NOT NULL COMMENT 'Numero de Control de Factura o Compra',
  `id_fiscal` varchar(20) NOT NULL DEFAULT '0.00',
  `id_cliente` int(11) NOT NULL COMMENT 'Id Cliente o Proveedor',
  `cod_tipo_impuesto` int(11) NOT NULL,
  `cod_impuesto` int(11) NOT NULL,
  `totalizar_pbase_retencion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_monto_retencion` decimal(10,2) NOT NULL DEFAULT '0.00',
  `totalizar_base_imponible` decimal(10,2) NOT NULL,
  `totalizar_monto_exento` decimal(10,2) NOT NULL,
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_tabla_impuestos`),
  KEY `totalizar_monto_retencion` (`totalizar_monto_retencion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tasas_cambio`
--

CREATE TABLE IF NOT EXISTS `tasas_cambio` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `divisa` int(11) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tasa` float DEFAULT NULL,
  `monedabase` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Volcado de datos para la tabla `tasas_cambio`
--

INSERT INTO `tasas_cambio` (`id`, `divisa`, `fecha`, `tasa`, `monedabase`) VALUES
(1, 17, '2011-12-16 04:00:00', 0, 14),
(3, 17, '2011-12-16 04:00:00', 4.3, 17),
(4, 17, '2012-01-03 04:00:00', 300, 17),
(5, 17, '2012-01-09 04:00:00', 99, 17),
(6, 17, '2012-01-11 04:00:00', 1980, 17),
(7, 17, '2012-01-12 04:00:00', 9999, 17),
(8, 17, '2012-01-13 04:00:00', 4.3, 17),
(9, 17, '2012-01-20 04:00:00', 2022, 17),
(10, 17, '2012-01-25 04:00:00', 4.3, 17),
(11, 17, '2012-01-25 04:00:00', 4.3, 14);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesor_bancodet`
--

CREATE TABLE IF NOT EXISTS `tesor_bancodet` (
  `cod_tesor_bandodet` int(32) NOT NULL AUTO_INCREMENT,
  `cod_banco` int(32) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `nro_cuenta` varchar(50) NOT NULL,
  `cuenta_contable` varchar(32) NOT NULL,
  `cod_tipo_cuenta_banco` int(32) NOT NULL,
  `monto_apertura` decimal(10,2) NOT NULL,
  `monto_disponible` decimal(10,2) NOT NULL,
  `fecha_apertura` date NOT NULL DEFAULT '0000-00-00',
  `usuario_creacion` varchar(50) NOT NULL,
  `fecha_creacion` datetime NOT NULL,
  PRIMARY KEY (`cod_tesor_bandodet`),
  KEY `cod_banco` (`cod_banco`),
  KEY `cod_tipo_cuenta_banco` (`cod_tipo_cuenta_banco`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cliente`
--

CREATE TABLE IF NOT EXISTS `tipo_cliente` (
  `cod_tipo_cliente` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_tipo_cliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_cliente`
--

INSERT INTO `tipo_cliente` (`cod_tipo_cliente`, `descripcion`) VALUES
(1, 'FERRETERIAS'),
(2, 'CONSTRUCTORAS'),
(3, 'ADMINISTRACION PUBLICA'),
(4, 'VARIOS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_comercio`
--

CREATE TABLE IF NOT EXISTS `tipo_comercio` (
  `cod_tipo_comercio` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_tipo_comercio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `tipo_comercio`
--

INSERT INTO `tipo_comercio` (`cod_tipo_comercio`, `descripcion`) VALUES
(1, 'COMERCIO UNICO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_cuenta_banco`
--

CREATE TABLE IF NOT EXISTS `tipo_cuenta_banco` (
  `cod_tipo_cuenta_banco` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_tipo_cuenta_banco`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `tipo_cuenta_banco`
--

INSERT INTO `tipo_cuenta_banco` (`cod_tipo_cuenta_banco`, `descripcion`) VALUES
(1, 'Corriente'),
(2, 'Activos Liquidos'),
(3, 'Ahorro'),
(4, 'Participaciones'),
(5, 'Fideicomisos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_impuesto`
--

CREATE TABLE IF NOT EXISTS `tipo_impuesto` (
  `cod_tipo_impuesto` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(80) NOT NULL,
  `cuenta_contable` varchar(60) DEFAULT NULL,
  PRIMARY KEY (`cod_tipo_impuesto`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_impuesto`
--

INSERT INTO `tipo_impuesto` (`cod_tipo_impuesto`, `descripcion`, `cuenta_contable`) VALUES
(1, 'Impuesto al Valor Agregado (IVA)', '2.1.04.002.'),
(2, 'Impuesto Sobre La Renta  (ISLR)', ''),
(3, 'Impuesto a la Industria y Comercio (ICA)', NULL),
(4, 'Impuesto de Inmuebles Urbanos', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimientos_ban`
--

CREATE TABLE IF NOT EXISTS `tipo_movimientos_ban` (
  `cod_tipo_movimientos_ban` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_tipo_movimientos_ban`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tipo_movimientos_ban`
--

INSERT INTO `tipo_movimientos_ban` (`cod_tipo_movimientos_ban`, `descripcion`) VALUES
(1, 'Deposito'),
(2, 'Comision Tarjeta de Credito'),
(3, 'Comision Tarjeta de Debito'),
(4, 'Retencion ISLR'),
(5, 'Retencion Impuesto 4*1000'),
(6, 'Transferencias  Otros Bancos'),
(7, 'Transferencias Internas ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_movimiento_almacen`
--

CREATE TABLE IF NOT EXISTS `tipo_movimiento_almacen` (
  `id_tipo_movimiento_almacen` int(11) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  `operacion` varchar(1) NOT NULL,
  PRIMARY KEY (`id_tipo_movimiento_almacen`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `tipo_movimiento_almacen`
--

INSERT INTO `tipo_movimiento_almacen` (`id_tipo_movimiento_almacen`, `descripcion`, `operacion`) VALUES
(1, 'Compras', '+'),
(2, 'Ventas', '-'),
(3, 'Cargo', '+'),
(4, 'Descargo', '-'),
(5, 'Traslado', '+'),
(6, 'Traslado', '-'),
(7, 'Una prueba', '+');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_origen_proveedor`
--

CREATE TABLE IF NOT EXISTS `tipo_origen_proveedor` (
  `cod_tipo_origen_proveedor` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_tipo_origen_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_origen_proveedor`
--

INSERT INTO `tipo_origen_proveedor` (`cod_tipo_origen_proveedor`, `descripcion`) VALUES
(1, 'Natural'),
(2, 'Extranjero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_precio`
--

CREATE TABLE IF NOT EXISTS `tipo_precio` (
  `cod_tipo_precio` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(50) NOT NULL,
  PRIMARY KEY (`cod_tipo_precio`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `tipo_precio`
--

INSERT INTO `tipo_precio` (`cod_tipo_precio`, `descripcion`) VALUES
(1, 'Libre'),
(2, 'Precio Detal'),
(3, 'Precio Empleado'),
(4, 'Precio al Mayor');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proveedor`
--

CREATE TABLE IF NOT EXISTS `tipo_proveedor` (
  `cod_tipo_proveedor` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(60) NOT NULL,
  PRIMARY KEY (`cod_tipo_proveedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `tipo_proveedor`
--

INSERT INTO `tipo_proveedor` (`cod_tipo_proveedor`, `descripcion`) VALUES
(1, 'Normal'),
(2, 'No Residenciado'),
(3, 'No Domiciliado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_proveedor_clasif`
--

CREATE TABLE IF NOT EXISTS `tipo_proveedor_clasif` (
  `id_pclasif` int(11) NOT NULL AUTO_INCREMENT,
  `clasificacion` varchar(60) NOT NULL,
  PRIMARY KEY (`id_pclasif`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `tipo_proveedor_clasif`
--

INSERT INTO `tipo_proveedor_clasif` (`id_pclasif`, `clasificacion`) VALUES
(1, 'RAMO UNICO'),
(2, 'TECNOLOGIA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_transaccion`
--

CREATE TABLE IF NOT EXISTS `tipo_transaccion` (
  `cod_tipo_transaccion` int(32) NOT NULL AUTO_INCREMENT,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  PRIMARY KEY (`cod_tipo_transaccion`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

--
-- Volcado de datos para la tabla `tipo_transaccion`
--

INSERT INTO `tipo_transaccion` (`cod_tipo_transaccion`, `codigo`, `descripcion`) VALUES
(1, 'AJU', 'AJUSTE AL INVENTARIO'),
(2, 'CAR', 'CARGOS AL INVENTARIO'),
(3, 'DES', 'DESCARGOS DEL INVENTARIO'),
(4, 'FAC', 'FACTURAS COMPRA - VENTA'),
(5, 'FACxESP', 'FACTURAS EN ESPERA SIN RESERVAR'),
(6, 'FACxRES', 'FACTURA EN ESPERA CON RESERVA'),
(7, 'GIRO', 'GIRO'),
(8, 'NxC', 'NOTA DE CREDITO'),
(9, 'N/CxP/A', 'NOTA DE CREDITO POR PAGO ANTICIPADO'),
(10, 'N/D', 'NOTA DE DEBITO'),
(11, 'DEVxFAC', 'DEVOLUCION FACTURA COMPRA - VENTA'),
(12, 'DEVxN/E', 'DEVOLUCION NOTAS DE ENTREGA COMPRA - VEN'),
(13, 'N/CxFAC', 'NOTA DE CREDITO A FACTURA'),
(14, 'N/CxGIRO', 'NOTA DE CREDITO A GIRO'),
(15, 'N/CxIMP', 'NOTA DE CREDITO RETENCION IMPUESTO'),
(16, 'N/CxN/D', 'NOTA DE CREDITO A NOTA DE DEBITO'),
(17, 'N/CxRETIMP', 'NOTA DE CREDITO RET. SOBRE IMPUESTO'),
(18, 'N/DxFAC', 'NOTA DE DEBITO A FACTURA'),
(19, 'N/DxGIRO', 'NOTA DE DEBITO A GIRO'),
(20, 'N/DxIMP', 'NOTA DE DEBITO RETENCION IMPUESTO'),
(21, 'N/DxN/C', 'NOTA DE DEBITO A NOTA DE CREDITO'),
(22, 'N/DxRETIMP', 'NOTA DE DEBITO RET. SOBRE IMPUESTO'),
(23, 'PAGxGIRO', 'PAGO GIRO'),
(24, 'PAGxN/C', 'PAGO A NOTA DE CREDITO'),
(25, 'PAGxN/D', 'PAGO NOTA DE DEBITO'),
(26, 'PAGxFAC', 'PAGO O ABONO FACTURA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transferencia`
--

CREATE TABLE IF NOT EXISTS `transferencia` (
  `transferencia_pk` int(32) NOT NULL AUTO_INCREMENT,
  `transferencia_numero` varchar(50) NOT NULL,
  `tesor_bancodet_fk` int(32) NOT NULL,
  `tipo_transaccion` int(1) NOT NULL COMMENT '1= transferencia 2=cheque de gerencia',
  `ref` int(32) NOT NULL DEFAULT '0' COMMENT 'Numero de Orden de CxP',
  `proveedor_fk` int(32) DEFAULT NULL,
  `estatus` varchar(3) DEFAULT NULL,
  `monto` decimal(10,2) NOT NULL,
  `concepto` varchar(200) DEFAULT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `cxp_edocta_det_fk` varchar(200) NOT NULL,
  `fecha_anulacion` date NOT NULL DEFAULT '0000-00-00',
  `observacion_anulado` varchar(200) NOT NULL,
  `fecha_danado` date NOT NULL DEFAULT '0000-00-00',
  `observacion_danado` varchar(200) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(70) NOT NULL,
  `cod_correlativo_iva` bigint(32) NOT NULL,
  `cod_correlativo_islr` bigint(32) NOT NULL,
  PRIMARY KEY (`transferencia_pk`),
  KEY `id_proveedor` (`proveedor_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transf_bauche_det`
--

CREATE TABLE IF NOT EXISTS `transf_bauche_det` (
  `transf_bauchedet_pk` int(32) NOT NULL AUTO_INCREMENT,
  `transferencia_fk` int(32) NOT NULL,
  `transferencia_numero` int(32) NOT NULL,
  `monto` decimal(10,2) NOT NULL DEFAULT '0.00',
  `tipo` char(1) DEFAULT NULL COMMENT 'tipo: d (debito), c (credito)',
  `cuenta_contable` varchar(32) DEFAULT NULL,
  `fecha` date NOT NULL DEFAULT '0000-00-00',
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `usuario_creacion` varchar(90) NOT NULL,
  PRIMARY KEY (`transf_bauchedet_pk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE IF NOT EXISTS `unidades` (
  `cod_unidad` int(32) NOT NULL,
  `descripcion` varchar(250) COLLATE utf8_spanish_ci DEFAULT NULL,
  PRIMARY KEY (`cod_unidad`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`cod_unidad`, `descripcion`) VALUES
(1, 'Gerencia General'),
(2, 'Caja'),
(3, 'Almacen'),
(4, 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `cod_usuario` int(32) NOT NULL AUTO_INCREMENT,
  `nombreyapellido` varchar(50) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `clave` varchar(60) NOT NULL,
  `departamento` varchar(25) NOT NULL,
  `ultima_sesion` varchar(30) NOT NULL DEFAULT '',
  PRIMARY KEY (`cod_usuario`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cod_usuario`, `nombreyapellido`, `usuario`, `clave`, `departamento`, `ultima_sesion`) VALUES
(1, 'Administrador', 'asys', '3d912cc13c8044e37419783068288e00', '1', '2012-07-10 15:11:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedor`
--

CREATE TABLE IF NOT EXISTS `vendedor` (
  `cod_vendedor` int(32) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  `direccion1` varchar(50) NOT NULL,
  `direccion2` varchar(50) NOT NULL,
  `telefonos` varchar(50) NOT NULL,
  `fax` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `clase` varchar(50) NOT NULL,
  `venta_x_debajo_minimo` decimal(10,2) NOT NULL,
  `venta_a_precio1` decimal(10,2) NOT NULL,
  `venta_a_precio2` decimal(10,2) NOT NULL,
  `venta_a_precio3` decimal(10,2) NOT NULL,
  `venta_x_servicio` decimal(10,2) NOT NULL,
  `venta_gerericos` decimal(10,2) NOT NULL,
  `comision_x_debajo_minimo` decimal(10,2) NOT NULL,
  `comision_a_precio1` decimal(10,2) NOT NULL,
  `comision_a_precio2` decimal(10,2) NOT NULL,
  `comision_a_precio3` decimal(10,2) NOT NULL,
  `comision_x_servicio` decimal(10,2) NOT NULL,
  `comision_gerericos` decimal(10,2) NOT NULL,
  `comision_tabla_de_cobros` tinyint(1) NOT NULL,
  `tipo_comision` varchar(50) NOT NULL COMMENT 'Monto, Porcentaje',
  `rancoshasta1` decimal(10,2) NOT NULL,
  `rancosdesde1` decimal(10,2) NOT NULL,
  `rancosdesde2` decimal(10,2) NOT NULL,
  `rancoshasta2` decimal(10,2) NOT NULL,
  `rancosdesde3` decimal(10,2) NOT NULL,
  `rancoshasta3` decimal(10,2) NOT NULL,
  `rancosdesde4` decimal(10,2) NOT NULL,
  `rancoshasta4` decimal(10,2) NOT NULL,
  `rancosdesde5` decimal(10,2) NOT NULL,
  `rancoshasta5` decimal(10,2) NOT NULL,
  `factor1` decimal(10,2) NOT NULL,
  `factor2` decimal(10,2) NOT NULL,
  `factor3` decimal(10,2) NOT NULL,
  `factor4` decimal(10,2) NOT NULL,
  `factor5` decimal(10,2) NOT NULL,
  `comision_tabla_de_cobrosven` tinyint(1) NOT NULL,
  `tipo_comisionven` varchar(50) NOT NULL COMMENT 'Monto, Porcentaje',
  `ranvenhasta1` decimal(10,2) NOT NULL,
  `ranvendesde1` decimal(10,2) NOT NULL,
  `ranvendesde2` decimal(10,2) NOT NULL,
  `ranvenhasta2` decimal(10,2) NOT NULL,
  `ranvendesde3` decimal(10,2) NOT NULL,
  `ranvenhasta3` decimal(10,2) NOT NULL,
  `ranvendesde4` decimal(10,2) NOT NULL,
  `ranvenhasta4` decimal(10,2) NOT NULL,
  `ranvendesde5` decimal(10,2) NOT NULL,
  `ranvenhasta5` decimal(10,2) NOT NULL,
  `factor1ven` decimal(10,2) NOT NULL,
  `factor2ven` decimal(10,2) NOT NULL,
  `factor3ven` decimal(10,2) NOT NULL,
  `factor4ven` decimal(10,2) NOT NULL,
  `factor5ven` decimal(10,2) NOT NULL,
  PRIMARY KEY (`cod_vendedor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `vendedor`
--

INSERT INTO `vendedor` (`cod_vendedor`, `nombre`, `direccion1`, `direccion2`, `telefonos`, `fax`, `email`, `clase`, `venta_x_debajo_minimo`, `venta_a_precio1`, `venta_a_precio2`, `venta_a_precio3`, `venta_x_servicio`, `venta_gerericos`, `comision_x_debajo_minimo`, `comision_a_precio1`, `comision_a_precio2`, `comision_a_precio3`, `comision_x_servicio`, `comision_gerericos`, `comision_tabla_de_cobros`, `tipo_comision`, `rancoshasta1`, `rancosdesde1`, `rancosdesde2`, `rancoshasta2`, `rancosdesde3`, `rancoshasta3`, `rancosdesde4`, `rancoshasta4`, `rancosdesde5`, `rancoshasta5`, `factor1`, `factor2`, `factor3`, `factor4`, `factor5`, `comision_tabla_de_cobrosven`, `tipo_comisionven`, `ranvenhasta1`, `ranvendesde1`, `ranvendesde2`, `ranvenhasta2`, `ranvendesde3`, `ranvenhasta3`, `ranvendesde4`, `ranvenhasta4`, `ranvendesde5`, `ranvenhasta5`, `factor1ven`, `factor2ven`, `factor3ven`, `factor4ven`, `factor5ven`) VALUES
(1, 'Unico', '', '', '', '', '', '', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1, 'Monto', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1, 'Monto', 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_chequera_lista`
--
CREATE TABLE IF NOT EXISTS `vista_chequera_lista` (
`cod_chequera` int(32)
,`cod_tesor_bandodet` int(32)
,`cod_banco` int(32)
,`nro_cuenta` varchar(50)
,`descripcion_banco` varchar(80)
,`descripcion_cuenta` varchar(100)
,`cantidad` int(10)
,`inicio` int(40)
,`fin` bigint(42)
,`situacion` char(1)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_chequebycuentabeneficiario`
--
CREATE TABLE IF NOT EXISTS `vw_chequebycuentabeneficiario` (
`cod_cheque` int(32)
,`nro_cheque` varchar(50)
,`cheque` int(32)
,`monto` decimal(10,2)
,`cod_chequera` int(32)
,`ref` varchar(500)
,`id_proveedor` int(32)
,`situacion` varchar(3)
,`fecha` date
,`fecha_anulacion` date
,`observacion_anulado` varchar(200)
,`observacion_danado` varchar(200)
,`fecha_danado` date
,`fecha_creacion` timestamp
,`usuario_creacion` varchar(70)
,`descripcion_proveedor` varchar(200)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_consulimprecheque`
--
CREATE TABLE IF NOT EXISTS `vw_consulimprecheque` (
`cod_cheque` int(32)
,`situacion` varchar(3)
,`nro_cuenta` varchar(50)
,`cheque` int(32)
,`ref` varchar(500)
,`beneficiario` varchar(200)
,`fecha` varchar(10)
,`monto` decimal(10,2)
,`cod_chequera` int(32)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_cxc`
--
CREATE TABLE IF NOT EXISTS `vw_cxc` (
`cod_edocuenta` int(32)
,`cod_edocuenta_detalle` int(32)
,`documento_cdet` varchar(32)
,`documento_cc` varchar(32)
,`id_cliente` int(32)
,`fecha_emision` date
,`numero_cc` varchar(20)
,`vencimiento_fecha` date
,`numero` varchar(20)
,`descripcion` varchar(100)
,`debito` decimal(10,2)
,`credito` decimal(10,2)
,`marca` char(1)
,`fecha_emision_edodet` date
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_cxp`
--
CREATE TABLE IF NOT EXISTS `vw_cxp` (
`cod_edocuenta` int(32)
,`cod_edocuenta_detalle` int(32)
,`documento_cdet` varchar(32)
,`documento_cc` varchar(32)
,`id_proveedor` int(32)
,`fecha_emision` date
,`numero_cc` varchar(20)
,`vencimiento_fecha` date
,`numero` varchar(20)
,`descripcion` varchar(100)
,`debito` decimal(10,2)
,`credito` decimal(10,2)
,`marca` char(1)
,`estado` tinyint(1)
,`fecha_emision_edodet` date
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_existenciabyalmacen`
--
CREATE TABLE IF NOT EXISTS `vw_existenciabyalmacen` (
`cod_almacen` int(32)
,`id_item` int(32) unsigned
,`cod_item` varchar(20)
,`descripcion1` varchar(50)
,`cantidad` int(32)
,`descripcion` varchar(50)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_facturasxmedicos`
--
CREATE TABLE IF NOT EXISTS `vw_facturasxmedicos` (
`cxp_factura_medico_pk` int(11)
,`medico_fk` int(9)
,`factura_fk` varchar(15)
,`fecha_fac` date
,`monto` decimal(13,2)
,`estatus` int(1)
,`cxp_edocta_fk` int(11)
,`paciente` varchar(100)
,`serie` varchar(100)
,`servicio` varchar(100)
,`id_cxp_mediq` int(11)
,`cod_edocuenta` int(32)
,`id_proveedor` int(32)
,`documento` varchar(32)
,`numero` varchar(20)
,`fecha_emision` date
,`observacion` varchar(600)
,`marca` char(1)
,`usuario_creacion` varchar(90)
,`fecha_creacion` timestamp
,`descripcion` varchar(100)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_info_item`
--
CREATE TABLE IF NOT EXISTS `vw_info_item` (
`id_item` int(32) unsigned
,`cod_item` varchar(20)
,`descripcion1` varchar(50)
,`descripcion2` varchar(50)
,`descripcion3` varchar(50)
,`referencia` varchar(50)
,`codigo_fabricante` varchar(50)
,`precio1` decimal(10,2)
,`precio2` decimal(10,2)
,`precio3` decimal(10,2)
,`utilidad1` decimal(10,2)
,`utilidad2` decimal(10,2)
,`utilidad3` decimal(10,2)
,`coniva1` decimal(10,2)
,`coniva2` decimal(10,2)
,`coniva3` decimal(10,2)
,`monto_exento` tinyint(1)
,`iva` decimal(10,2)
,`existencia_min` int(32)
,`existencia_max` int(32)
,`estatus` varchar(1)
,`nom_almacen` varchar(50)
,`cantidad_almacen` bigint(32)
,`departamento` varchar(50)
,`grupo` varchar(50)
,`linea` varchar(50)
,`descripcion_item_forma` varchar(50)
,`existencia_total` varbinary(54)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_item_precomprometidos`
--
CREATE TABLE IF NOT EXISTS `vw_item_precomprometidos` (
`cod_almacen` int(32)
,`id_item` int(32) unsigned
,`cod_item` varchar(20)
,`descripcion1` varchar(50)
,`cantidad` decimal(54,0)
,`descripcion` varchar(50)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_lista_conciliacion`
--
CREATE TABLE IF NOT EXISTS `vw_lista_conciliacion` (
`cod_conciliacion` int(32)
,`fecha_inicial` date
,`fecha_final` date
,`saldo_inicial` decimal(10,2)
,`saldo_final` decimal(10,2)
,`saldo_libros` decimal(10,2)
,`descripcion` varchar(100)
,`tipo_cuenta` varchar(100)
,`nro_cuenta` varchar(50)
,`banco` varchar(80)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_proveedores`
--
CREATE TABLE IF NOT EXISTS `vw_proveedores` (
`id_proveedor` int(32)
,`cod_proveedor` varchar(100)
,`descripcion` varchar(200)
,`direccion` varchar(300)
,`telefonos` varchar(100)
,`fax` varchar(20)
,`email` varchar(200)
,`rif` varchar(20)
,`nit` varchar(20)
,`estatus` varchar(10)
,`cod_tipo_proveedor` varchar(25)
,`clase_proveedor` varchar(25)
,`cod_entidad` int(11)
,`cod_especialidad` int(4)
,`fecha_creacion` date
,`usuario_creacion` varchar(50)
,`cuenta_contable` varchar(25)
,`compania` varchar(200)
,`id_pclasif` int(11)
,`clasificacion` varchar(60)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_relacion_cotizacion_cliente`
--
CREATE TABLE IF NOT EXISTS `vw_relacion_cotizacion_cliente` (
`id_cliente` int(32)
,`cod_cliente` varchar(80)
,`nombre` varchar(80)
,`rif` varchar(50)
,`id_cotizacion` int(32) unsigned
,`cod_cotizacion` varchar(32)
,`fecha_cotizacion` date
,`cantidad_items` int(32)
,`totalizar_total_general` decimal(10,2)
,`usuario_creacion` varchar(40)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_relacion_factura_cliente`
--
CREATE TABLE IF NOT EXISTS `vw_relacion_factura_cliente` (
`id_cliente` int(32)
,`cod_cliente` varchar(80)
,`nombre` varchar(80)
,`rif` varchar(50)
,`id_factura` int(32) unsigned
,`cod_factura` varchar(32)
,`cod_factura_fiscal` varchar(10)
,`fechaFactura` date
,`cod_estatus` int(32) unsigned
,`cantidad_items` int(32)
,`totalizar_total_general` decimal(10,2)
,`usuario_creacion` varchar(40)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_relacion_factura_cliente_boletos`
--
CREATE TABLE IF NOT EXISTS `vw_relacion_factura_cliente_boletos` (
`id_cliente` int(32)
,`cod_cliente` varchar(80)
,`nombre` varchar(80)
,`id_factura` int(32) unsigned
,`cod_factura` varchar(32)
,`fechaFactura` date
,`cantidad_items` int(32)
,`totalizar_total_general` decimal(10,2)
,`usuario_creacion` varchar(40)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_relacion_notas_entrega_cliente`
--
CREATE TABLE IF NOT EXISTS `vw_relacion_notas_entrega_cliente` (
`id_cliente` int(32)
,`cod_cliente` varchar(80)
,`nombre` varchar(80)
,`rif` varchar(50)
,`id_nota_entrega` int(32) unsigned
,`cod_nota_entrega` varchar(32)
,`cod_estatus` int(32) unsigned
,`fechaNotaEntrega` date
,`cantidad_items` int(32)
,`totalizar_total_general` decimal(10,2)
,`usuario_creacion` varchar(40)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_relacion_pedidos_cliente`
--
CREATE TABLE IF NOT EXISTS `vw_relacion_pedidos_cliente` (
`id_cliente` int(32)
,`cod_cliente` varchar(80)
,`nombre` varchar(80)
,`rif` varchar(50)
,`id_pedido` int(32) unsigned
,`cod_pedido` varchar(32)
,`fechaPedido` date
,`cod_estatus` int(32) unsigned
,`cantidad_items` int(32)
,`totalizar_total_general` decimal(10,2)
,`usuario_creacion` varchar(40)
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_tesor_bancodet`
--
CREATE TABLE IF NOT EXISTS `vw_tesor_bancodet` (
`cod_tesor_bandodet` int(32)
,`cuenta_contable` varchar(32)
,`cod_banco` int(32)
,`descripcion` varchar(100)
,`nro_cuenta` varchar(50)
,`tipo_cuenta` varchar(100)
,`cod_tipo_cuenta_banco` int(32)
,`monto_apertura` decimal(10,2)
,`monto_disponible` decimal(10,2)
,`fecha_apertura` date
,`usuario_creacion` varchar(50)
,`fecha_creacion` datetime
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE IF NOT EXISTS `zonas` (
  `cod_zona` int(32) NOT NULL AUTO_INCREMENT,
  `descripcion` varchar(32) NOT NULL,
  PRIMARY KEY (`cod_zona`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`cod_zona`, `descripcion`) VALUES
(1, 'ORIENTE'),
(2, 'CENTRO'),
(3, 'OCCIDENTE');

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_chequera_lista`
--
DROP TABLE IF EXISTS `vista_chequera_lista`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_chequera_lista` AS select `che`.`cod_chequera` AS `cod_chequera`,`tb`.`cod_tesor_bandodet` AS `cod_tesor_bandodet`,`tb`.`cod_banco` AS `cod_banco`,`tb`.`nro_cuenta` AS `nro_cuenta`,`b`.`descripcion` AS `descripcion_banco`,`tb`.`descripcion` AS `descripcion_cuenta`,`che`.`cantidad` AS `cantidad`,`che`.`inicio` AS `inicio`,((`che`.`inicio` + `che`.`cantidad`) - 1) AS `fin`,`che`.`situacion` AS `situacion` from ((`tesor_bancodet` `tb` join `banco` `b` on((`b`.`cod_banco` = `tb`.`cod_banco`))) join `chequera` `che` on((`che`.`cod_tesor_bandodet` = `tb`.`cod_tesor_bandodet`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_chequebycuentabeneficiario`
--
DROP TABLE IF EXISTS `vw_chequebycuentabeneficiario`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_chequebycuentabeneficiario` AS select `che`.`cod_cheque` AS `cod_cheque`,`che`.`nro_cheque` AS `nro_cheque`,`che`.`cheque` AS `cheque`,`che`.`monto` AS `monto`,`che`.`cod_chequera` AS `cod_chequera`,`che`.`ref` AS `ref`,`che`.`id_proveedor` AS `id_proveedor`,`che`.`situacion` AS `situacion`,`che`.`fecha` AS `fecha`,`che`.`fecha_anulacion` AS `fecha_anulacion`,`che`.`observacion_anulado` AS `observacion_anulado`,`che`.`observacion_danado` AS `observacion_danado`,`che`.`fecha_danado` AS `fecha_danado`,`che`.`fecha_creacion` AS `fecha_creacion`,`che`.`usuario_creacion` AS `usuario_creacion`,ifnull(`pro`.`descripcion`,_latin1'') AS `descripcion_proveedor` from (`cheque` `che` left join `proveedores` `pro` on((`pro`.`id_proveedor` = `che`.`id_proveedor`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_consulimprecheque`
--
DROP TABLE IF EXISTS `vw_consulimprecheque`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_consulimprecheque` AS select `che`.`cod_cheque` AS `cod_cheque`,`che`.`situacion` AS `situacion`,`tesor_bancodet`.`nro_cuenta` AS `nro_cuenta`,`che`.`cheque` AS `cheque`,`che`.`ref` AS `ref`,`proveedores`.`descripcion` AS `beneficiario`,date_format(`che`.`fecha`,_utf8'%d-%m-%Y') AS `fecha`,`che`.`monto` AS `monto`,`che`.`cod_chequera` AS `cod_chequera` from (((`cheque` `che` join `chequera` on((`chequera`.`cod_chequera` = `che`.`cod_chequera`))) join `tesor_bancodet` on((`tesor_bancodet`.`cod_tesor_bandodet` = `chequera`.`cod_tesor_bandodet`))) join `proveedores` on((`proveedores`.`id_proveedor` = `che`.`id_proveedor`))) where (`che`.`situacion` = _latin1'Ac');

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_cxc`
--
DROP TABLE IF EXISTS `vw_cxc`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cxc` AS select `cdet`.`cod_edocuenta` AS `cod_edocuenta`,`cdet`.`cod_edocuenta_detalle` AS `cod_edocuenta_detalle`,`cdet`.`documento` AS `documento_cdet`,`cc`.`documento` AS `documento_cc`,`cc`.`id_cliente` AS `id_cliente`,`cc`.`fecha_emision` AS `fecha_emision`,`cc`.`numero` AS `numero_cc`,(case `cc`.`vencimiento_fecha` when _utf8'0000-00-00' then `cc`.`fecha_emision` else `cc`.`vencimiento_fecha` end) AS `vencimiento_fecha`,`cdet`.`numero` AS `numero`,`cdet`.`descripcion` AS `descripcion`,(case `cdet`.`tipo` when 'd' then `cdet`.`monto` else 0.00 end) AS `debito`,(case `cdet`.`tipo` when 'c' then `cdet`.`monto` else 0.00 end) AS `credito`,`cc`.`marca` AS `marca`,`cdet`.`fecha_emision_edodet` AS `fecha_emision_edodet` from ((`cxc_edocuenta` `cc` join `cxc_edocuenta_detalle` `cdet` on((`cc`.`cod_edocuenta` = `cdet`.`cod_edocuenta`))) left join `cxc_edocuenta_formapago` `cdforma` on((`cdforma`.`cod_edocuenta_detalle` = `cdet`.`cod_edocuenta_detalle`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_cxp`
--
DROP TABLE IF EXISTS `vw_cxp`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_cxp` AS select `cdet`.`cod_edocuenta` AS `cod_edocuenta`,`cdet`.`cod_edocuenta_detalle` AS `cod_edocuenta_detalle`,`cdet`.`documento` AS `documento_cdet`,`cc`.`documento` AS `documento_cc`,`cc`.`id_proveedor` AS `id_proveedor`,`cc`.`fecha_emision` AS `fecha_emision`,`cc`.`numero` AS `numero_cc`,(case `cc`.`vencimiento_fecha` when _utf8'0000-00-00' then `cc`.`fecha_emision` else `cc`.`vencimiento_fecha` end) AS `vencimiento_fecha`,`cdet`.`numero` AS `numero`,`cdet`.`descripcion` AS `descripcion`,(case `cdet`.`tipo` when 'd' then `cdet`.`monto` else 0.00 end) AS `debito`,(case `cdet`.`tipo` when 'c' then `cdet`.`monto` else 0.00 end) AS `credito`,`cc`.`marca` AS `marca`,`cdet`.`estado` AS `estado`,`cdet`.`fecha_emision_edodet` AS `fecha_emision_edodet` from ((`cxp_edocuenta` `cc` join `cxp_edocuenta_detalle` `cdet` on((`cc`.`cod_edocuenta` = `cdet`.`cod_edocuenta`))) left join `cxp_edocuenta_formapago` `cdforma` on((`cdforma`.`cod_edocuenta_detalle` = `cdet`.`cod_edocuenta_detalle`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_existenciabyalmacen`
--
DROP TABLE IF EXISTS `vw_existenciabyalmacen`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_existenciabyalmacen` AS select `existencia`.`cod_almacen` AS `cod_almacen`,`item`.`id_item` AS `id_item`,`item`.`cod_item` AS `cod_item`,`item`.`descripcion1` AS `descripcion1`,`existencia`.`cantidad` AS `cantidad`,`almacen`.`descripcion` AS `descripcion` from ((`item_existencia_almacen` `existencia` join `item` on((`item`.`id_item` = `existencia`.`id_item`))) join `almacen` on((`almacen`.`cod_almacen` = `existencia`.`cod_almacen`))) where (`item`.`cod_item_forma` = 1);

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_facturasxmedicos`
--
DROP TABLE IF EXISTS `vw_facturasxmedicos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_facturasxmedicos` AS select `facmedicos`.`cxp_factura_medico_pk` AS `cxp_factura_medico_pk`,`facmedicos`.`medico_fk` AS `medico_fk`,`facmedicos`.`factura_fk` AS `factura_fk`,`facmedicos`.`fecha_fac` AS `fecha_fac`,`facmedicos`.`monto` AS `monto`,`facmedicos`.`estatus` AS `estatus`,`facmedicos`.`cxp_edocta_fk` AS `cxp_edocta_fk`,`facmedicos`.`paciente` AS `paciente`,`facmedicos`.`serie` AS `serie`,`facmedicos`.`servicio` AS `servicio`,`facmedicos`.`id_cxp_mediq` AS `id_cxp_mediq`,`edo`.`cod_edocuenta` AS `cod_edocuenta`,`edo`.`id_proveedor` AS `id_proveedor`,`edo`.`documento` AS `documento`,`edo`.`numero` AS `numero`,`edo`.`fecha_emision` AS `fecha_emision`,`edo`.`observacion` AS `observacion`,`edo`.`marca` AS `marca`,`edo`.`usuario_creacion` AS `usuario_creacion`,`edo`.`fecha_creacion` AS `fecha_creacion`,`edodet`.`descripcion` AS `descripcion` from ((`cxp_factura_medico` `facmedicos` join `cxp_edocuenta` `edo` on((`facmedicos`.`cxp_edocta_fk` = `edo`.`cod_edocuenta`))) join `cxp_edocuenta_detalle` `edodet` on((`edodet`.`cod_edocuenta` = `edo`.`cod_edocuenta`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_info_item`
--
DROP TABLE IF EXISTS `vw_info_item`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_info_item` AS select `i`.`id_item` AS `id_item`,`i`.`cod_item` AS `cod_item`,`i`.`descripcion1` AS `descripcion1`,`i`.`descripcion2` AS `descripcion2`,`i`.`descripcion3` AS `descripcion3`,`i`.`referencia` AS `referencia`,`i`.`codigo_fabricante` AS `codigo_fabricante`,`i`.`precio1` AS `precio1`,`i`.`precio2` AS `precio2`,`i`.`precio3` AS `precio3`,`i`.`utilidad1` AS `utilidad1`,`i`.`utilidad2` AS `utilidad2`,`i`.`utilidad3` AS `utilidad3`,`i`.`coniva1` AS `coniva1`,`i`.`coniva2` AS `coniva2`,`i`.`coniva3` AS `coniva3`,`i`.`monto_exento` AS `monto_exento`,`i`.`iva` AS `iva`,`i`.`existencia_min` AS `existencia_min`,`i`.`existencia_max` AS `existencia_max`,`i`.`estatus` AS `estatus`,ifnull(`a`.`descripcion`,_latin1'Sin Ubicacion') AS `nom_almacen`,ifnull(`ia`.`cantidad`,0) AS `cantidad_almacen`,`d`.`descripcion` AS `departamento`,`g`.`descripcion` AS `grupo`,`l`.`descripcion` AS `linea`,`_if`.`descripcion` AS `descripcion_item_forma`,ifnull((select sum(`item_existencia_almacen`.`cantidad`) AS `sum(cantidad)` from `item_existencia_almacen` where (`item_existencia_almacen`.`id_item` = `i`.`id_item`)),_utf8'0') AS `existencia_total` from ((((((`item` `i` left join `item_existencia_almacen` `ia` on((`ia`.`id_item` = `i`.`id_item`))) left join `almacen` `a` on((`a`.`cod_almacen` = `ia`.`cod_almacen`))) join `departamentos` `d` on((`d`.`cod_departamento` = `i`.`cod_departamento`))) join `grupo` `g` on((`g`.`cod_grupo` = `i`.`cod_grupo`))) join `linea` `l` on((`l`.`cod_linea` = `i`.`cod_linea`))) join `item_forma` `_if` on((`_if`.`cod_item_forma` = `i`.`cod_item_forma`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_item_precomprometidos`
--
DROP TABLE IF EXISTS `vw_item_precomprometidos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_item_precomprometidos` AS select `ia`.`cod_almacen` AS `cod_almacen`,`ia`.`id_item` AS `id_item`,`i`.`cod_item` AS `cod_item`,`i`.`descripcion1` AS `descripcion1`,(`ia`.`cantidad` - (select ifnull(sum(`item_precompromiso`.`cantidad`),0) AS `ifnull(sum(cantidad),0)` from `item_precompromiso` where ((`item_precompromiso`.`id_item` = `ia`.`id_item`) and (`item_precompromiso`.`almacen` = `ia`.`cod_almacen`)))) AS `cantidad`,`a`.`descripcion` AS `descripcion` from ((`item_existencia_almacen` `ia` join `item` `i` on((`i`.`id_item` = `ia`.`id_item`))) join `almacen` `a` on((`a`.`cod_almacen` = `ia`.`cod_almacen`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_lista_conciliacion`
--
DROP TABLE IF EXISTS `vw_lista_conciliacion`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_lista_conciliacion` AS select `conciliacion_bancaria`.`cod_conciliacion` AS `cod_conciliacion`,`conciliacion_bancaria`.`fecha_inicial` AS `fecha_inicial`,`conciliacion_bancaria`.`fecha_final` AS `fecha_final`,`conciliacion_bancaria`.`saldo_inicial` AS `saldo_inicial`,`conciliacion_bancaria`.`saldo_final` AS `saldo_final`,`conciliacion_bancaria`.`saldo_libros` AS `saldo_libros`,`vw_tesor_bancodet`.`descripcion` AS `descripcion`,`vw_tesor_bancodet`.`tipo_cuenta` AS `tipo_cuenta`,`vw_tesor_bancodet`.`nro_cuenta` AS `nro_cuenta`,`banco`.`descripcion` AS `banco` from ((`conciliacion_bancaria` join `vw_tesor_bancodet` on((`vw_tesor_bancodet`.`cod_tesor_bandodet` = `conciliacion_bancaria`.`cod_tesor_bancodet`))) join `banco` on((`vw_tesor_bancodet`.`cod_banco` = `banco`.`cod_banco`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_proveedores`
--
DROP TABLE IF EXISTS `vw_proveedores`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_proveedores` AS select `prov`.`id_proveedor` AS `id_proveedor`,`prov`.`cod_proveedor` AS `cod_proveedor`,`prov`.`descripcion` AS `descripcion`,`prov`.`direccion` AS `direccion`,`prov`.`telefonos` AS `telefonos`,`prov`.`fax` AS `fax`,`prov`.`email` AS `email`,`prov`.`rif` AS `rif`,`prov`.`nit` AS `nit`,`prov`.`estatus` AS `estatus`,`prov`.`cod_tipo_proveedor` AS `cod_tipo_proveedor`,`prov`.`clase_proveedor` AS `clase_proveedor`,`prov`.`cod_entidad` AS `cod_entidad`,`prov`.`cod_especialidad` AS `cod_especialidad`,`prov`.`fecha_creacion` AS `fecha_creacion`,`prov`.`usuario_creacion` AS `usuario_creacion`,`prov`.`cuenta_contable` AS `cuenta_contable`,`prov`.`compania` AS `compania`,`ti`.`id_pclasif` AS `id_pclasif`,`ti`.`clasificacion` AS `clasificacion` from (`proveedores` `prov` join `tipo_proveedor_clasif` `ti` on((`prov`.`clase_proveedor` = `ti`.`id_pclasif`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_relacion_cotizacion_cliente`
--
DROP TABLE IF EXISTS `vw_relacion_cotizacion_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_relacion_cotizacion_cliente` AS select `c`.`id_cliente` AS `id_cliente`,`c`.`cod_cliente` AS `cod_cliente`,`c`.`nombre` AS `nombre`,`c`.`rif` AS `rif`,`f`.`id_cotizacion` AS `id_cotizacion`,`f`.`cod_cotizacion` AS `cod_cotizacion`,`f`.`fecha_cotizacion` AS `fecha_cotizacion`,`f`.`cantidad_items` AS `cantidad_items`,`f`.`totalizar_total_general` AS `totalizar_total_general`,`f`.`usuario_creacion` AS `usuario_creacion` from (`cotizacion_presupuesto` `f` join `clientes` `c` on((`c`.`id_cliente` = `f`.`id_cliente`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_relacion_factura_cliente`
--
DROP TABLE IF EXISTS `vw_relacion_factura_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_relacion_factura_cliente` AS select `c`.`id_cliente` AS `id_cliente`,`c`.`cod_cliente` AS `cod_cliente`,`c`.`nombre` AS `nombre`,`c`.`rif` AS `rif`,`f`.`id_factura` AS `id_factura`,`f`.`cod_factura` AS `cod_factura`,`f`.`cod_factura_fiscal` AS `cod_factura_fiscal`,`f`.`fechaFactura` AS `fechaFactura`,`f`.`cod_estatus` AS `cod_estatus`,`f`.`cantidad_items` AS `cantidad_items`,`f`.`totalizar_total_general` AS `totalizar_total_general`,`f`.`usuario_creacion` AS `usuario_creacion` from (`factura` `f` join `clientes` `c` on((`c`.`id_cliente` = `f`.`id_cliente`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_relacion_factura_cliente_boletos`
--
DROP TABLE IF EXISTS `vw_relacion_factura_cliente_boletos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_relacion_factura_cliente_boletos` AS select `c`.`id_cliente` AS `id_cliente`,`c`.`cod_cliente` AS `cod_cliente`,`c`.`nombre` AS `nombre`,`f`.`id_factura_boleto` AS `id_factura`,`f`.`cod_factura_boleto` AS `cod_factura`,`f`.`fechaFactura` AS `fechaFactura`,`f`.`cantidad_items` AS `cantidad_items`,`f`.`totalizar_total_general` AS `totalizar_total_general`,`f`.`usuario_creacion` AS `usuario_creacion` from (`boleto_factura` `f` join `clientes` `c` on((`c`.`id_cliente` = `f`.`id_cliente`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_relacion_notas_entrega_cliente`
--
DROP TABLE IF EXISTS `vw_relacion_notas_entrega_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_relacion_notas_entrega_cliente` AS select `c`.`id_cliente` AS `id_cliente`,`c`.`cod_cliente` AS `cod_cliente`,`c`.`nombre` AS `nombre`,`c`.`rif` AS `rif`,`f`.`id_nota_entrega` AS `id_nota_entrega`,`f`.`cod_nota_entrega` AS `cod_nota_entrega`,`f`.`cod_estatus` AS `cod_estatus`,`f`.`fechaNotaEntrega` AS `fechaNotaEntrega`,`f`.`cantidad_items` AS `cantidad_items`,`f`.`totalizar_total_general` AS `totalizar_total_general`,`f`.`usuario_creacion` AS `usuario_creacion` from (`nota_entrega` `f` join `clientes` `c` on((`c`.`id_cliente` = `f`.`id_cliente`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_relacion_pedidos_cliente`
--
DROP TABLE IF EXISTS `vw_relacion_pedidos_cliente`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_relacion_pedidos_cliente` AS select `c`.`id_cliente` AS `id_cliente`,`c`.`cod_cliente` AS `cod_cliente`,`c`.`nombre` AS `nombre`,`c`.`rif` AS `rif`,`f`.`id_pedido` AS `id_pedido`,`f`.`cod_pedido` AS `cod_pedido`,`f`.`fechaPedido` AS `fechaPedido`,`f`.`cod_estatus` AS `cod_estatus`,`f`.`cantidad_items` AS `cantidad_items`,`f`.`totalizar_total_general` AS `totalizar_total_general`,`f`.`usuario_creacion` AS `usuario_creacion` from (`pedido` `f` join `clientes` `c` on((`c`.`id_cliente` = `f`.`id_cliente`)));

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_tesor_bancodet`
--
DROP TABLE IF EXISTS `vw_tesor_bancodet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_tesor_bancodet` AS select `bdet`.`cod_tesor_bandodet` AS `cod_tesor_bandodet`,`bdet`.`cuenta_contable` AS `cuenta_contable`,`bdet`.`cod_banco` AS `cod_banco`,`bdet`.`descripcion` AS `descripcion`,`bdet`.`nro_cuenta` AS `nro_cuenta`,`tcb`.`descripcion` AS `tipo_cuenta`,`tcb`.`cod_tipo_cuenta_banco` AS `cod_tipo_cuenta_banco`,`bdet`.`monto_apertura` AS `monto_apertura`,`bdet`.`monto_disponible` AS `monto_disponible`,`bdet`.`fecha_apertura` AS `fecha_apertura`,`bdet`.`usuario_creacion` AS `usuario_creacion`,`bdet`.`fecha_creacion` AS `fecha_creacion` from (`tesor_bancodet` `bdet` join `tipo_cuenta_banco` `tcb` on((`tcb`.`cod_tipo_cuenta_banco` = `bdet`.`cod_tipo_cuenta_banco`)));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
