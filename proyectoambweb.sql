-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 13-11-2022 a las 06:16:46
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectoambweb`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_agregar_usuario` (IN `pNombre` VARCHAR(25), IN `pApellidos` VARCHAR(30), IN `pUsuario` VARCHAR(20), IN `pCorreo` VARCHAR(50), IN `pContrasenna` VARCHAR(255), IN `pRol` INT)   BEGIN
	INSERT INTO tb_usuario (nombre,apellidos,usuario,correo,clave,id_rol)
    VALUES (pNombre,pApellidos,pUsuario,pCorreo,pContrasenna,pRol);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_usuario` (IN `pCorreo` VARCHAR(50), IN `pClave` VARCHAR(255))   BEGIN

	SELECT *
    FROM tb_usuario
    where correo = pCorreo
    and clave = pClave;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_categoria_medicamento`
--

CREATE TABLE `tab_categoria_medicamento` (
  `id_tipo_med` int(11) NOT NULL,
  `categoria_med` varchar(50) NOT NULL,
  `descripcion_categoria_med` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_bitacora`
--

CREATE TABLE `tb_bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `accion` varchar(20) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_canton`
--

CREATE TABLE `tb_canton` (
  `id_canton` int(11) NOT NULL,
  `canton` varchar(100) NOT NULL,
  `id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle_factura`
--

CREATE TABLE `tb_detalle_factura` (
  `id_detalle_factura` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_direccion`
--

CREATE TABLE `tb_direccion` (
  `id_direccion` int(11) NOT NULL,
  `direccion` varchar(200) NOT NULL,
  `id_distrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_distrito`
--

CREATE TABLE `tb_distrito` (
  `id_distrito` int(11) NOT NULL,
  `distrito` varchar(100) NOT NULL,
  `id_canton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_factura`
--

CREATE TABLE `tb_factura` (
  `id_factura` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_medicamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_farmacia`
--

CREATE TABLE `tb_farmacia` (
  `id_farmacia` int(11) NOT NULL,
  `nombre_far` varchar(25) NOT NULL,
  `telefono` int(11) NOT NULL,
  `horario` varchar(25) NOT NULL,
  `id_direccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_medicamento`
--

CREATE TABLE `tb_medicamento` (
  `id_medicamento` int(11) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `nombre_med` varchar(55) NOT NULL,
  `descrip_med` varchar(100) NOT NULL,
  `cant_almacen` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `id_tipo_med` int(11) NOT NULL,
  `id_farmacia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_precaucion`
--

CREATE TABLE `tb_precaucion` (
  `id_precaucion` int(11) NOT NULL,
  `efectos_secundarios` varchar(300) NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `id_medicamento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_provincia`
--

CREATE TABLE `tb_provincia` (
  `id_provincia` int(11) NOT NULL,
  `provincia` varchar(100) NOT NULL,
  `provincia_id_provincia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_rol`
--

CREATE TABLE `tb_rol` (
  `id_rol` int(11) NOT NULL,
  `rol_descripcion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_rol`
--

INSERT INTO `tb_rol` (`id_rol`, `rol_descripcion`) VALUES
(1, 'administador'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellidos` varchar(30) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `clave` varchar(255) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_usuario`
--

INSERT INTO `tb_usuario` (`id_usuario`, `nombre`, `apellidos`, `usuario`, `correo`, `clave`, `id_rol`) VALUES
(1, 'admin_nombre', 'admin_apellidos', 'SYSDATA_admin', 'admin@gmail.com', '12345', 1),
(2, 'usuario_nombre', 'usuario_apellido', 'Usuario#1', 'usuario@gmail.com', '12345', 2),
(5, 'Mario', 'Molina Medal', 'Mario523', 'mmolina00702@ufide.ac.cr', '12345', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tab_categoria_medicamento`
--
ALTER TABLE `tab_categoria_medicamento`
  ADD PRIMARY KEY (`id_tipo_med`);

--
-- Indices de la tabla `tb_bitacora`
--
ALTER TABLE `tb_bitacora`
  ADD PRIMARY KEY (`id_bitacora`);

--
-- Indices de la tabla `tb_canton`
--
ALTER TABLE `tb_canton`
  ADD PRIMARY KEY (`id_canton`),
  ADD KEY `fk_tipo_provincia` (`id_provincia`);

--
-- Indices de la tabla `tb_detalle_factura`
--
ALTER TABLE `tb_detalle_factura`
  ADD PRIMARY KEY (`id_detalle_factura`),
  ADD KEY `fk_tipo_factura` (`id_factura`),
  ADD KEY `fk_medicamento` (`id_medicamento`);

--
-- Indices de la tabla `tb_direccion`
--
ALTER TABLE `tb_direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `fk_tipo_distrito` (`id_distrito`);

--
-- Indices de la tabla `tb_distrito`
--
ALTER TABLE `tb_distrito`
  ADD PRIMARY KEY (`id_distrito`),
  ADD KEY `fk_tipo_canton` (`id_canton`);

--
-- Indices de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `fk_tipo_usuario` (`id_usuario`),
  ADD KEY `fk_tipo_med` (`id_medicamento`);

--
-- Indices de la tabla `tb_farmacia`
--
ALTER TABLE `tb_farmacia`
  ADD PRIMARY KEY (`id_farmacia`),
  ADD KEY `fk_tipo_direccion` (`id_direccion`);

--
-- Indices de la tabla `tb_medicamento`
--
ALTER TABLE `tb_medicamento`
  ADD PRIMARY KEY (`id_medicamento`),
  ADD KEY `fk_tipo_medicamento` (`id_tipo_med`),
  ADD KEY `fk_tipo_farmacia` (`id_farmacia`);

--
-- Indices de la tabla `tb_precaucion`
--
ALTER TABLE `tb_precaucion`
  ADD PRIMARY KEY (`id_precaucion`),
  ADD KEY `fk_tipo_precaucion` (`id_medicamento`);

--
-- Indices de la tabla `tb_provincia`
--
ALTER TABLE `tb_provincia`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `fk_tipo_auto_provincia` (`provincia_id_provincia`);

--
-- Indices de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fk_tipo_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tab_categoria_medicamento`
--
ALTER TABLE `tab_categoria_medicamento`
  MODIFY `id_tipo_med` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_bitacora`
--
ALTER TABLE `tb_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_canton`
--
ALTER TABLE `tb_canton`
  MODIFY `id_canton` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_detalle_factura`
--
ALTER TABLE `tb_detalle_factura`
  MODIFY `id_detalle_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_direccion`
--
ALTER TABLE `tb_direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_distrito`
--
ALTER TABLE `tb_distrito`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_farmacia`
--
ALTER TABLE `tb_farmacia`
  MODIFY `id_farmacia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_medicamento`
--
ALTER TABLE `tb_medicamento`
  MODIFY `id_medicamento` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_precaucion`
--
ALTER TABLE `tb_precaucion`
  MODIFY `id_precaucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_provincia`
--
ALTER TABLE `tb_provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_canton`
--
ALTER TABLE `tb_canton`
  ADD CONSTRAINT `fk_tipo_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `tb_provincia` (`id_provincia`);

--
-- Filtros para la tabla `tb_detalle_factura`
--
ALTER TABLE `tb_detalle_factura`
  ADD CONSTRAINT `fk_medicamento` FOREIGN KEY (`id_medicamento`) REFERENCES `tb_medicamento` (`id_medicamento`),
  ADD CONSTRAINT `fk_tipo_factura` FOREIGN KEY (`id_factura`) REFERENCES `tb_factura` (`id_factura`);

--
-- Filtros para la tabla `tb_direccion`
--
ALTER TABLE `tb_direccion`
  ADD CONSTRAINT `fk_tipo_distrito` FOREIGN KEY (`id_distrito`) REFERENCES `tb_distrito` (`id_distrito`);

--
-- Filtros para la tabla `tb_distrito`
--
ALTER TABLE `tb_distrito`
  ADD CONSTRAINT `fk_tipo_canton` FOREIGN KEY (`id_canton`) REFERENCES `tb_canton` (`id_canton`);

--
-- Filtros para la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  ADD CONSTRAINT `fk_tipo_med` FOREIGN KEY (`id_medicamento`) REFERENCES `tb_medicamento` (`id_medicamento`),
  ADD CONSTRAINT `fk_tipo_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tb_farmacia`
--
ALTER TABLE `tb_farmacia`
  ADD CONSTRAINT `fk_tipo_direccion` FOREIGN KEY (`id_direccion`) REFERENCES `tb_direccion` (`id_direccion`);

--
-- Filtros para la tabla `tb_medicamento`
--
ALTER TABLE `tb_medicamento`
  ADD CONSTRAINT `fk_tipo_farmacia` FOREIGN KEY (`id_farmacia`) REFERENCES `tb_farmacia` (`id_farmacia`),
  ADD CONSTRAINT `fk_tipo_medicamento` FOREIGN KEY (`id_tipo_med`) REFERENCES `tab_categoria_medicamento` (`id_tipo_med`);

--
-- Filtros para la tabla `tb_precaucion`
--
ALTER TABLE `tb_precaucion`
  ADD CONSTRAINT `fk_tipo_precaucion` FOREIGN KEY (`id_medicamento`) REFERENCES `tb_medicamento` (`id_medicamento`);

--
-- Filtros para la tabla `tb_provincia`
--
ALTER TABLE `tb_provincia`
  ADD CONSTRAINT `fk_tipo_auto_provincia` FOREIGN KEY (`provincia_id_provincia`) REFERENCES `tb_provincia` (`id_provincia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
