-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 21-04-2016 a las 18:49:38
-- Versión del servidor: 5.6.26
-- Versión de PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cachamadb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE IF NOT EXISTS `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrador', '1', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE IF NOT EXISTS `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrador', 1, 'Administrador del Sistema', NULL, NULL, NULL, NULL),
('usuario', 1, 'Usuario del Sistema', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE IF NOT EXISTS `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE IF NOT EXISTS `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_alimentos`
--

CREATE TABLE IF NOT EXISTS `cac_alimentos` (
  `alimiden` int(10) unsigned NOT NULL,
  `cac_proveedores_providen` int(10) unsigned NOT NULL,
  `alimnomb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alimdesc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `alimimag` longblob,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechmodi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_compras`
--

CREATE TABLE IF NOT EXISTS `cac_compras` (
  `compiden` int(10) unsigned NOT NULL,
  `cac_usuarios_usuaiden` int(10) unsigned NOT NULL,
  `cac_alimentos_alimiden` int(10) unsigned NOT NULL,
  `cac_especies_espeiden` int(10) unsigned NOT NULL,
  `cac_equipos_equiiden` int(10) unsigned NOT NULL,
  `compfech` date DEFAULT NULL,
  `comptota` float DEFAULT NULL,
  `compcant` int(10) unsigned DEFAULT NULL,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechmodi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_equipos`
--

CREATE TABLE IF NOT EXISTS `cac_equipos` (
  `equiiden` int(10) unsigned NOT NULL,
  `cac_proveedores_providen` int(10) unsigned NOT NULL,
  `equinomb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `equidesc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `equiimag` longblob,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechmodi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_especies`
--

CREATE TABLE IF NOT EXISTS `cac_especies` (
  `espeiden` int(10) unsigned NOT NULL,
  `cac_proveedores_providen` int(10) unsigned NOT NULL,
  `espenomb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `especara` varchar(300) COLLATE utf8_unicode_ci DEFAULT NULL,
  `espeimag` longblob,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechmodi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_lagunas`
--

CREATE TABLE IF NOT EXISTS `cac_lagunas` (
  `laguiden` int(10) unsigned NOT NULL,
  `lagunomb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lagutama` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lagucapa` int(10) unsigned DEFAULT NULL,
  `lagudesc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `laguimag` longblob,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechmodi` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cac_lagunas`
--

INSERT INTO `cac_lagunas` (`laguiden`, `lagunomb`, `lagutama`, `lagucapa`, `lagudesc`, `laguimag`, `usuamodi`, `fechmodi`) VALUES
(1, 'Laguna 1', '23', 21, 'Descripcion', NULL, 1, '2016-04-21'),
(11, 'Laguna 1', '23', 21, 'dsbdsbsdb', 0x545556534c6e42755a773d3d, 1, '2016-04-21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_lagunas_especies`
--

CREATE TABLE IF NOT EXISTS `cac_lagunas_especies` (
  `laesinde` int(10) unsigned NOT NULL,
  `cac_especies_espeiden` int(10) unsigned NOT NULL,
  `cac_lagunas_laguiden` int(10) unsigned NOT NULL,
  `laestota` int(10) unsigned DEFAULT NULL,
  `laesdisp` int(10) unsigned DEFAULT NULL,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechmodi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_proveedores`
--

CREATE TABLE IF NOT EXISTS `cac_proveedores` (
  `providen` int(10) unsigned NOT NULL,
  `cac_tipoProveedores_tipriden` int(10) unsigned NOT NULL,
  `provnomb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provrif` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provdire` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provtele` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provemai` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `provimag` longblob,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechmodi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_sexos`
--

CREATE TABLE IF NOT EXISTS `cac_sexos` (
  `sexoiden` int(10) unsigned NOT NULL,
  `sexonomb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `sexodesc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechmodi` int(10) unsigned DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cac_sexos`
--

INSERT INTO `cac_sexos` (`sexoiden`, `sexonomb`, `sexodesc`, `usuamodi`, `fechmodi`) VALUES
(1, 'Femenino', 'Sexo de Mujeres', NULL, NULL),
(2, 'Masculino', 'Sexo de los Hombres', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_tipoProveedores`
--

CREATE TABLE IF NOT EXISTS `cac_tipoProveedores` (
  `tipriden` int(10) unsigned NOT NULL,
  `tiprnomb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiprdesc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechmodi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_tipoUsuarios`
--

CREATE TABLE IF NOT EXISTS `cac_tipoUsuarios` (
  `tiusiden` int(10) unsigned NOT NULL,
  `tiusnomb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `tiusdesc` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechamodi` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cac_tipoUsuarios`
--

INSERT INTO `cac_tipoUsuarios` (`tiusiden`, `tiusnomb`, `tiusdesc`, `usuamodi`, `fechamodi`) VALUES
(1, 'Administrador', 'Administrador del Sistema', NULL, NULL),
(2, 'Usuario', 'Usuario del Sistema', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_usuarios`
--

CREATE TABLE IF NOT EXISTS `cac_usuarios` (
  `usuaiden` int(10) unsigned NOT NULL,
  `cac_sexos_sexoiden` int(10) unsigned NOT NULL,
  `cac_tiposUsuarios_tiusiden` int(10) unsigned NOT NULL,
  `usuanomb` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuaapel` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuacedu` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuatele` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuadire` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuaimag` longblob,
  `usuauser` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuapass` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usuamodi` int(11) DEFAULT NULL,
  `fechmodi` date DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cac_usuarios`
--

INSERT INTO `cac_usuarios` (`usuaiden`, `cac_sexos_sexoiden`, `cac_tiposUsuarios_tiusiden`, `usuanomb`, `usuaapel`, `usuacedu`, `usuatele`, `usuadire`, `usuaimag`, `usuauser`, `usuapass`, `usuamodi`, `fechmodi`) VALUES
(1, 2, 1, 'Administrador', 'Administrador', NULL, NULL, NULL, NULL, 'admin', 'MTIzNDU2', 0, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cac_ventas`
--

CREATE TABLE IF NOT EXISTS `cac_ventas` (
  `ventiden` int(10) unsigned NOT NULL,
  `cac_lagunas_especies_laesinde` int(10) unsigned NOT NULL,
  `cac_usuarios_usuaiden_cl` int(10) unsigned NOT NULL,
  `cac_usuarios_usuaiden_us` int(10) unsigned NOT NULL,
  `ventfech` date DEFAULT NULL,
  `vanttota` float DEFAULT NULL,
  `usuamodi` int(10) unsigned DEFAULT NULL,
  `fechmodi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) COLLATE utf8_unicode_ci NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1460736262),
('m140506_102106_rbac_init', 1460736266);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `cac_alimentos`
--
ALTER TABLE `cac_alimentos`
  ADD PRIMARY KEY (`alimiden`),
  ADD KEY `cac_alimentos_FKIndex1` (`cac_proveedores_providen`);

--
-- Indices de la tabla `cac_compras`
--
ALTER TABLE `cac_compras`
  ADD PRIMARY KEY (`compiden`),
  ADD KEY `cac_compras_FKIndex1` (`cac_equipos_equiiden`),
  ADD KEY `cac_compras_FKIndex2` (`cac_especies_espeiden`),
  ADD KEY `cac_compras_FKIndex3` (`cac_alimentos_alimiden`),
  ADD KEY `cac_compras_FKIndex4` (`cac_usuarios_usuaiden`);

--
-- Indices de la tabla `cac_equipos`
--
ALTER TABLE `cac_equipos`
  ADD PRIMARY KEY (`equiiden`),
  ADD KEY `cac_equipos_FKIndex1` (`cac_proveedores_providen`);

--
-- Indices de la tabla `cac_especies`
--
ALTER TABLE `cac_especies`
  ADD PRIMARY KEY (`espeiden`),
  ADD KEY `cac_especies_FKIndex1` (`cac_proveedores_providen`);

--
-- Indices de la tabla `cac_lagunas`
--
ALTER TABLE `cac_lagunas`
  ADD PRIMARY KEY (`laguiden`);

--
-- Indices de la tabla `cac_lagunas_especies`
--
ALTER TABLE `cac_lagunas_especies`
  ADD PRIMARY KEY (`laesinde`),
  ADD KEY `cac_lagunas_especies_FKIndex1` (`cac_lagunas_laguiden`),
  ADD KEY `cac_lagunas_especies_FKIndex2` (`cac_especies_espeiden`);

--
-- Indices de la tabla `cac_proveedores`
--
ALTER TABLE `cac_proveedores`
  ADD PRIMARY KEY (`providen`),
  ADD KEY `cac_proveedores_FKIndex1` (`cac_tipoProveedores_tipriden`);

--
-- Indices de la tabla `cac_sexos`
--
ALTER TABLE `cac_sexos`
  ADD PRIMARY KEY (`sexoiden`);

--
-- Indices de la tabla `cac_tipoProveedores`
--
ALTER TABLE `cac_tipoProveedores`
  ADD PRIMARY KEY (`tipriden`);

--
-- Indices de la tabla `cac_tipoUsuarios`
--
ALTER TABLE `cac_tipoUsuarios`
  ADD PRIMARY KEY (`tiusiden`);

--
-- Indices de la tabla `cac_usuarios`
--
ALTER TABLE `cac_usuarios`
  ADD PRIMARY KEY (`usuaiden`),
  ADD KEY `mid_usuarios_FKIndex1` (`cac_tiposUsuarios_tiusiden`),
  ADD KEY `mid_usuarios_FKIndex2` (`cac_sexos_sexoiden`);

--
-- Indices de la tabla `cac_ventas`
--
ALTER TABLE `cac_ventas`
  ADD PRIMARY KEY (`ventiden`),
  ADD KEY `cac_ventas_FKIndex1` (`cac_usuarios_usuaiden_us`),
  ADD KEY `cac_ventas_FKIndex2` (`cac_usuarios_usuaiden_cl`),
  ADD KEY `cac_ventas_FKIndex3` (`cac_lagunas_especies_laesinde`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cac_alimentos`
--
ALTER TABLE `cac_alimentos`
  MODIFY `alimiden` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cac_compras`
--
ALTER TABLE `cac_compras`
  MODIFY `compiden` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cac_equipos`
--
ALTER TABLE `cac_equipos`
  MODIFY `equiiden` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cac_especies`
--
ALTER TABLE `cac_especies`
  MODIFY `espeiden` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cac_lagunas`
--
ALTER TABLE `cac_lagunas`
  MODIFY `laguiden` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT de la tabla `cac_lagunas_especies`
--
ALTER TABLE `cac_lagunas_especies`
  MODIFY `laesinde` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cac_proveedores`
--
ALTER TABLE `cac_proveedores`
  MODIFY `providen` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cac_sexos`
--
ALTER TABLE `cac_sexos`
  MODIFY `sexoiden` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cac_tipoProveedores`
--
ALTER TABLE `cac_tipoProveedores`
  MODIFY `tipriden` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cac_tipoUsuarios`
--
ALTER TABLE `cac_tipoUsuarios`
  MODIFY `tiusiden` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `cac_usuarios`
--
ALTER TABLE `cac_usuarios`
  MODIFY `usuaiden` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `cac_ventas`
--
ALTER TABLE `cac_ventas`
  MODIFY `ventiden` int(10) unsigned NOT NULL AUTO_INCREMENT;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cac_alimentos`
--
ALTER TABLE `cac_alimentos`
  ADD CONSTRAINT `cac_alimentos_ibfk_1` FOREIGN KEY (`cac_proveedores_providen`) REFERENCES `cac_proveedores` (`providen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cac_compras`
--
ALTER TABLE `cac_compras`
  ADD CONSTRAINT `cac_compras_ibfk_1` FOREIGN KEY (`cac_equipos_equiiden`) REFERENCES `cac_equipos` (`equiiden`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cac_compras_ibfk_2` FOREIGN KEY (`cac_especies_espeiden`) REFERENCES `cac_especies` (`espeiden`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cac_compras_ibfk_3` FOREIGN KEY (`cac_alimentos_alimiden`) REFERENCES `cac_alimentos` (`alimiden`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cac_compras_ibfk_4` FOREIGN KEY (`cac_usuarios_usuaiden`) REFERENCES `cac_usuarios` (`usuaiden`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cac_equipos`
--
ALTER TABLE `cac_equipos`
  ADD CONSTRAINT `cac_equipos_ibfk_1` FOREIGN KEY (`cac_proveedores_providen`) REFERENCES `cac_proveedores` (`providen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cac_especies`
--
ALTER TABLE `cac_especies`
  ADD CONSTRAINT `cac_especies_ibfk_1` FOREIGN KEY (`cac_proveedores_providen`) REFERENCES `cac_proveedores` (`providen`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cac_lagunas_especies`
--
ALTER TABLE `cac_lagunas_especies`
  ADD CONSTRAINT `cac_lagunas_especies_ibfk_1` FOREIGN KEY (`cac_lagunas_laguiden`) REFERENCES `cac_lagunas` (`laguiden`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cac_lagunas_especies_ibfk_2` FOREIGN KEY (`cac_especies_espeiden`) REFERENCES `cac_especies` (`espeiden`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cac_proveedores`
--
ALTER TABLE `cac_proveedores`
  ADD CONSTRAINT `cac_proveedores_ibfk_1` FOREIGN KEY (`cac_tipoProveedores_tipriden`) REFERENCES `cac_tipoProveedores` (`tipriden`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cac_usuarios`
--
ALTER TABLE `cac_usuarios`
  ADD CONSTRAINT `cac_usuarios_ibfk_1` FOREIGN KEY (`cac_tiposUsuarios_tiusiden`) REFERENCES `cac_tipoUsuarios` (`tiusiden`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cac_usuarios_ibfk_2` FOREIGN KEY (`cac_sexos_sexoiden`) REFERENCES `cac_sexos` (`sexoiden`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `cac_ventas`
--
ALTER TABLE `cac_ventas`
  ADD CONSTRAINT `cac_ventas_ibfk_1` FOREIGN KEY (`cac_usuarios_usuaiden_us`) REFERENCES `cac_usuarios` (`usuaiden`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cac_ventas_ibfk_2` FOREIGN KEY (`cac_usuarios_usuaiden_cl`) REFERENCES `cac_usuarios` (`usuaiden`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `cac_ventas_ibfk_3` FOREIGN KEY (`cac_lagunas_especies_laesinde`) REFERENCES `cac_lagunas_especies` (`laesinde`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
