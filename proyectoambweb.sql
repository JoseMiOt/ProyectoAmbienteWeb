-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3308
-- Tiempo de generación: 14-11-2022 a las 23:20:23
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

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
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_actualiza_producto` (IN `pId_producto` INT, IN `pMarca` VARCHAR(25), IN `pNombre` VARCHAR(55), IN `pDescrip` VARCHAR(255), IN `pCant` INT, IN `pPrecio` DECIMAL(10,2), IN `pUrl` VARCHAR(255), IN `pId_tipo_med` INT, IN `pId_farmacia` INT)   BEGIN

UPDATE tb_producto
SET marca = pMarca,
nombre_prod = pNombre,
descrip_prod = pDescrip,
cant_almacen = pCant,
precio = pPrecio,
url = pUrl,
id_tipo_med = pId_tipo_med,
id_farmacia = pId_farmacia
WHERE id_producto = pId_producto;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_agregar_usuario` (IN `pNombre` VARCHAR(25), IN `pApellidos` VARCHAR(30), IN `pUsuario` VARCHAR(20), IN `pCorreo` VARCHAR(50), IN `pContrasenna` VARCHAR(255), IN `pRol` INT)   BEGIN
  INSERT INTO tb_usuario (nombre,apellidos,usuario,correo,clave,id_rol)
    VALUES (pNombre,pApellidos,pUsuario,pCorreo,pContrasenna,pRol);
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_agrega_producto` (IN `pMarca` VARCHAR(25), IN `pNombre` VARCHAR(55), IN `pDescrip` VARCHAR(255), IN `pCant` INT, IN `pPrecio` DECIMAL(10,2), IN `pUrl` VARCHAR(255), IN `pId_tipo_med` INT, IN `pId_farmacia` INT)   BEGIN

INSERT tb_producto
VALUES ("",pMarca,pNombre,pDescrip,pCant,pPrecio,pUrl,pId_tipo_med,pId_farmacia);

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consultar_usuario` (IN `pCorreo` VARCHAR(50), IN `pClave` VARCHAR(255))   BEGIN

  SELECT *
    FROM tb_usuario
    where correo = pCorreo
    and clave = pClave;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consulta_productos` ()   BEGIN

SELECT * 
FROM tb_producto
ORDER BY nombre_prod;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consulta_producto_cat` (IN `pId_tipo_med` INT, IN `pId_producto` INT)   BEGIN

SELECT *
FROM tb_producto
WHERE id_tipo_med = pId_tipo_med AND
id_producto != pId_producto
ORDER BY nombre_prod ASC
LIMIT 3;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consulta_producto_id` (IN `pId_producto` INT)   BEGIN

SELECT U.*, T.categoria_med AS categoria
FROM tb_producto U
INNER JOIN tb_categoria_producto T ON U.id_tipo_med = T.id_tipo_med
WHERE id_producto = pId_producto;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_consulta_producto_inicio` ()   BEGIN

SELECT * 
FROM tb_producto
ORDER BY RAND()
LIMIT 3;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_elimina_producto` (IN `pId_producto` INT)   BEGIN
DELETE FROM tb_producto
WHERE id_producto = pId_producto;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_bitacora`
--

CREATE TABLE `tb_bitacora` (
  `id_bitacora` int(11) NOT NULL,
  `accion` varchar(20) DEFAULT NULL,
  `descripcion` varchar(100) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
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

--
-- Volcado de datos para la tabla `tb_canton`
--

INSERT INTO `tb_canton` (`id_canton`, `canton`, `id_provincia`) VALUES
(1, 'San José', 1),
(2, 'Escazú', 1),
(3, 'Desamparados', 1),
(4, 'Puriscal', 1),
(5, 'Tarrazú', 1),
(6, 'Aserrí', 1),
(7, 'Mora', 1),
(8, 'Goicoechea', 1),
(9, 'Santa Ana', 1),
(10, 'Alajuelita', 1),
(11, 'Vásquez de Coronado', 1),
(12, 'Acosta', 1),
(13, 'Tibás', 1),
(14, 'Moravia', 1),
(15, 'Montes de Oca', 1),
(16, 'Turrubares', 1),
(17, 'Dota', 1),
(18, 'Curridabat', 1),
(19, 'Pérez Zeledón', 1),
(20, 'León Cortés', 1),
(21, 'Alajuela', 2),
(22, 'San Ramón', 2),
(23, 'Grecia', 2),
(24, 'San Mateo', 2),
(25, 'Atenas', 2),
(26, 'Naranjo', 2),
(27, 'Palmares', 2),
(28, 'Poás', 2),
(29, 'Orotina', 2),
(30, 'San Carlos', 2),
(31, 'Alfaro Ruiz', 2),
(32, 'Valverde Vega', 2),
(33, 'Upala', 2),
(34, 'Los Chiles', 2),
(35, 'Guatuso', 2),
(36, 'Cartago', 3),
(37, 'Paraíso', 3),
(38, 'La Unión', 3),
(39, 'Jiménez', 3),
(40, 'Turrialba', 3),
(41, 'Alvarado', 3),
(42, 'Oreamuno', 3),
(43, 'El Guarco', 3),
(44, 'Heredia', 4),
(45, 'Barva', 4),
(46, 'Santo Domingo', 4),
(47, 'Santa Bárbara', 4),
(48, 'San Rafael', 4),
(49, 'San Isidro', 4),
(50, 'Belén', 4),
(51, 'Flores', 4),
(52, 'San Pablo', 4),
(53, 'Sarapiquí', 4),
(54, 'Liberia', 5),
(55, 'Nicoya', 5),
(56, 'Santa Cruz', 5),
(57, 'Bagaces', 5),
(58, 'Carrillo', 5),
(59, 'Cañas', 5),
(60, 'Abangares', 5),
(61, 'Tilarán', 5),
(62, 'Nandayure', 5),
(63, 'La Cruz', 5),
(64, 'Hojancha', 5),
(65, 'Puntarenas', 6),
(66, 'Esparza', 6),
(67, 'Buenos Aires', 6),
(68, 'Montes de Oro', 6),
(69, 'Osa', 6),
(70, 'Aguirre', 6),
(71, 'Golfito', 6),
(72, 'Coto Brus', 6),
(73, 'Parrita', 6),
(74, 'Corredores', 6),
(75, 'Garabito', 6),
(76, 'Limón', 7),
(77, 'Pococí', 7),
(78, 'Siquirres', 7),
(79, 'Talamanca', 7),
(80, 'Matina', 7),
(81, 'Guácimo', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_categoria_producto`
--

CREATE TABLE `tb_categoria_producto` (
  `id_tipo_med` int(11) NOT NULL,
  `categoria_med` varchar(50) NOT NULL,
  `descripcion_categoria_med` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_categoria_producto`
--

INSERT INTO `tb_categoria_producto` (`id_tipo_med`, `categoria_med`, `descripcion_categoria_med`) VALUES
(1, 'Belleza y salud', 'Productos de belleza y salud'),
(2, 'Higiene', 'Productos de higiene personal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_detalle_factura`
--

CREATE TABLE `tb_detalle_factura` (
  `id_detalle_factura` int(11) NOT NULL,
  `id_factura` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
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

--
-- Volcado de datos para la tabla `tb_direccion`
--

INSERT INTO `tb_direccion` (`id_direccion`, `direccion`, `id_distrito`) VALUES
(1, 'Plaza Express Sabanilla', 89),
(2, 'Detrás de Office Depot 11501, San José, San Pedro', 93);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_distrito`
--

CREATE TABLE `tb_distrito` (
  `id_distrito` int(11) NOT NULL,
  `distrito` varchar(100) NOT NULL,
  `id_canton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_distrito`
--

INSERT INTO `tb_distrito` (`id_distrito`, `distrito`, `id_canton`) VALUES
(1, 'Carmen', 1),
(2, 'Merced', 1),
(3, 'Hospital', 1),
(4, 'Catedral', 1),
(5, 'Zapote', 1),
(6, 'San Francisco de Dos Ríos', 1),
(7, 'Uruca', 1),
(8, 'Mata Redonda', 1),
(9, 'Pavas', 1),
(10, 'Hatillo', 1),
(11, 'San Sebastián', 1),
(12, 'Escazú', 2),
(13, 'San Antonio', 2),
(14, 'San Rafael', 2),
(15, 'Desamparados', 3),
(16, 'San Miguel', 3),
(17, 'San Juan de Dios', 3),
(18, 'San Rafael Arriba', 3),
(19, 'San Antonio', 3),
(20, 'Frailes', 3),
(21, 'Patarrá', 3),
(22, 'San Cristóbal', 3),
(23, 'Rosario', 3),
(24, 'Damas', 3),
(25, 'San Rafael Abajo', 3),
(26, 'Gravilias', 3),
(27, 'Los Guido', 3),
(28, 'Santiago', 4),
(29, 'Mercedes Sur', 4),
(30, 'Barbacoas', 4),
(31, 'Grifo Alto', 4),
(32, 'San Rafael', 4),
(33, 'Candelarita', 4),
(34, 'Desamparaditos', 4),
(35, 'San Antonio', 4),
(36, 'Chires', 4),
(37, 'San Marcos', 5),
(38, 'San Lorenzo', 5),
(39, 'San Carlos', 5),
(40, 'Aserrí', 6),
(41, 'Tarbaca', 6),
(42, 'Vuelta de Jorco', 6),
(43, 'San Gabriel', 6),
(44, 'Legua', 6),
(45, 'Monterrey', 6),
(46, 'Salitrillos', 6),
(47, 'Colón', 7),
(48, 'Guayabo', 7),
(49, 'Tabarcia', 7),
(50, 'Piedras Negras', 7),
(51, 'Picagres', 7),
(52, 'Guadalupe', 8),
(53, 'San Francisco', 8),
(54, 'Calle Blancos', 8),
(55, 'Mata de Plátano', 8),
(56, 'Ipís', 8),
(57, 'Rancho Redondo', 8),
(58, 'Purral', 8),
(59, 'Santa Ana', 9),
(60, 'Salitral', 9),
(61, 'Pozos', 9),
(62, 'Uruca', 9),
(63, 'Piedades', 9),
(64, 'Brasil', 9),
(65, 'Alajuelita', 10),
(66, 'San Josecito', 10),
(67, 'San Antonio', 10),
(68, 'Concepción', 10),
(69, 'San Felipe', 10),
(70, 'San Isidro', 11),
(71, 'San Rafael', 11),
(72, 'Dulce Nombre de Jesús', 11),
(73, 'Patalillo', 11),
(74, 'Cascajal', 11),
(75, 'San Ignacio', 12),
(76, 'Guaitil', 12),
(77, 'Palmichal', 12),
(78, 'Cangrejal', 12),
(79, 'Sabanillas', 12),
(80, 'San Juan', 13),
(81, 'Cinco Esquinas', 13),
(82, 'Anselmo Llorente', 13),
(83, 'León XIII', 13),
(84, 'Colima', 13),
(85, 'San Vicente', 14),
(86, 'San Jerónimo', 14),
(87, 'La Trinidad', 14),
(88, 'San Pedro', 15),
(89, 'Sabanilla', 15),
(90, 'Mercedes', 15),
(91, 'San Rafael', 15),
(92, 'San Pablo', 16),
(93, 'San Pedro', 16),
(94, 'San Juan de Mata', 16),
(95, 'San Luis', 16),
(96, 'Carara', 16),
(97, 'Santa María', 17),
(98, 'Jardín', 17),
(99, 'Copey', 17),
(100, 'Curridabat', 18),
(101, 'Granadilla', 18),
(102, 'Sánchez', 18),
(103, 'Tirrases', 18),
(104, 'San Isidro de El General', 19),
(105, 'El General', 19),
(106, 'Daniel Flores', 19),
(107, 'Rivas', 19),
(108, 'San Pedro', 19),
(109, 'Platanares', 19),
(110, 'Pejibaye', 19),
(111, 'Cajón', 19),
(112, 'Barú', 19),
(113, 'Río Nuevo', 19),
(114, 'Páramo', 19),
(115, 'San Pablo', 20),
(116, 'San Andrés', 20),
(117, 'Llano Bonito', 20),
(118, 'San Isidro', 20),
(119, 'Santa Cruz', 20),
(120, 'San Antonio', 20),
(121, 'Alajuela', 21),
(122, 'San José', 21),
(123, 'Carrizal', 21),
(124, 'San Antonio', 21),
(125, 'Guácima', 21),
(126, 'San Isidro', 21),
(127, 'Sabanilla', 21),
(128, 'San Rafael', 21),
(129, 'Río Segundo', 21),
(130, 'Desamparados', 21),
(131, 'Turrúcares', 21),
(132, 'Tambor', 21),
(133, 'Garita', 21),
(134, 'Sarapiquí', 21),
(135, 'San Ramón', 22),
(136, 'Santiago', 22),
(137, 'San Juan', 22),
(138, 'Piedades Norte', 22),
(139, 'Piedades Sur', 22),
(140, 'San Rafael', 22),
(141, 'San Isidro', 22),
(142, 'Ángeles', 22),
(143, 'Alfaro', 22),
(144, 'Volio', 22),
(145, 'Concepción', 22),
(146, 'Zapotal', 22),
(147, 'Peñas Blancas', 22),
(148, 'Grecia', 23),
(149, 'San Isidro', 23),
(150, 'San José', 23),
(151, 'San Roque', 23),
(152, 'Tacares', 23),
(153, 'Río Cuarto', 23),
(154, 'Puente de Piedra', 23),
(155, 'Bolívar', 23),
(156, 'San Mateo', 24),
(157, 'Desmonte', 24),
(158, 'Jesús María', 24),
(159, 'Atenas', 25),
(160, 'Jesús', 25),
(161, 'Mercedes', 25),
(162, 'San Isidro', 25),
(163, 'Concepción', 25),
(164, 'San José', 25),
(165, 'Santa Eulalia', 25),
(166, 'Escobal', 25),
(167, 'Naranjo', 26),
(168, 'San Miguel', 26),
(169, 'San José', 26),
(170, 'Cirrí Sur', 26),
(171, 'San Jerónimo', 26),
(172, 'San Juan', 26),
(173, 'El Rosario', 26),
(174, 'Palmitos', 26),
(175, 'Palmares', 27),
(176, 'Zaragoza', 27),
(177, 'Buenos Aires', 27),
(178, 'Santiago', 27),
(179, 'Candelaria', 27),
(180, 'Esquipulas', 27),
(181, 'La Granja', 27),
(182, 'San Pedro', 28),
(183, 'San Juan', 28),
(184, 'San Rafael', 28),
(185, 'Carrillos', 28),
(186, 'Sabana Redonda', 28),
(187, 'Orotina', 29),
(188, 'El Mastate', 29),
(189, 'Hacienda Vieja', 29),
(190, 'Coyolar', 29),
(191, 'La Ceiba', 29),
(192, 'Quesada', 30),
(193, 'Florencia', 30),
(194, 'Buenavista', 30),
(195, 'Aguas Zarcas', 30),
(196, 'Venecia', 30),
(197, 'Pital', 30),
(198, 'La Fortuna', 30),
(199, 'La Tigra', 30),
(200, 'La Palmera', 30),
(201, 'Venado', 30),
(202, 'Cutris', 30),
(203, 'Monterrey', 30),
(204, 'Pocosol', 30),
(205, 'Zarcero', 31),
(206, 'Laguna', 31),
(207, 'Tapesco', 31),
(208, 'Guadalupe', 31),
(209, 'Palmira', 31),
(210, 'Zapote', 31),
(211, 'Brisas', 31),
(212, 'Sarchí Norte', 32),
(213, 'Sarchí Sur', 32),
(214, 'Toro Amarillo', 32),
(215, 'San Pedro', 32),
(216, 'Rodríguez', 32),
(217, 'Upala', 33),
(218, 'Aguas Claras', 33),
(219, 'San José o Pizote', 33),
(220, 'Bijagua', 33),
(221, 'Delicias', 33),
(222, 'Dos Ríos', 33),
(223, 'Yolillal', 33),
(224, 'Los Chiles', 34),
(225, 'Caño Negro', 34),
(226, 'El Amparo', 34),
(227, 'San Jorge', 34),
(228, 'San Rafael', 35),
(229, 'Buenavista', 35),
(230, 'Cote', 35),
(231, 'Katira', 35),
(232, 'Oriental', 36),
(233, 'Occidental', 36),
(234, 'Carmen', 36),
(235, 'San Nicolás', 36),
(236, 'Aguacaliente/San Francisco', 36),
(237, 'Guadalupe o Arenilla', 36),
(238, 'Corralillo', 36),
(239, 'Tierra Blanca', 36),
(240, 'Dulce Nombre', 36),
(241, 'Llano Grande', 36),
(242, 'Quebradilla', 36),
(243, 'Paraíso', 37),
(244, 'Santiago', 37),
(245, 'Orosi', 37),
(246, 'Cachí', 37),
(247, 'Llanos de Santa Lucía', 37),
(248, 'Tres Ríos', 38),
(249, 'San Diego', 38),
(250, 'San Juan', 38),
(251, 'San Rafael', 38),
(252, 'Concepción', 38),
(253, 'Dulce Nombre', 38),
(254, 'San Ramón', 38),
(255, 'Río Azul', 38),
(256, 'Juan Viñas', 39),
(257, 'Tucurrique', 39),
(258, 'Pejibaye', 39),
(259, 'Turrialba', 40),
(260, 'La Suiza', 40),
(261, 'Peralta', 40),
(262, 'Santa Cruz', 40),
(263, 'Santa Teresita', 40),
(264, 'Pavones', 40),
(265, 'Tuis', 40),
(266, 'Tayutic', 40),
(267, 'Santa Rosa', 40),
(268, 'Tres Equis', 40),
(269, 'La Isabel', 40),
(270, 'Chirripó', 40),
(271, 'Pacayas', 41),
(272, 'Cervantes', 41),
(273, 'Capellades', 41),
(274, 'San Rafael', 42),
(275, 'Cot', 42),
(276, 'Potrero Cerrado', 42),
(277, 'Cipreses', 42),
(278, 'Santa Rosa', 42),
(279, 'El Tejar', 43),
(280, 'San Isidro', 43),
(281, 'Tobosi', 43),
(282, 'Patio de Agua', 43),
(283, 'Heredia', 44),
(284, 'Mercedes', 44),
(285, 'San Francisco', 44),
(286, 'Ulloa', 44),
(287, 'Varablanca', 44),
(288, 'Barva', 45),
(289, 'San Pedro', 45),
(290, 'San Pablo', 45),
(291, 'San Roque', 45),
(292, 'Santa Lucía', 45),
(293, 'San José de la Montaña', 45),
(294, 'Santo Domingo', 46),
(295, 'San Vicente', 46),
(296, 'San Miguel', 46),
(297, 'Paracito', 46),
(298, 'Santo Tomás', 46),
(299, 'Santa Rosa', 46),
(300, 'Tures', 46),
(301, 'Pará', 46),
(302, 'Santa Bárbara', 47),
(303, 'San Pedro', 47),
(304, 'San Juan', 47),
(305, 'Jesús', 47),
(306, 'Santo Domingo', 47),
(307, 'Purabá', 47),
(308, 'San Rafael', 48),
(309, 'San Josecito', 48),
(310, 'Santiago', 48),
(311, 'Ángeles', 48),
(312, 'Concepción', 48),
(313, 'San Isidro', 49),
(314, 'San José', 49),
(315, 'Concepción', 49),
(316, 'San Francisco', 49),
(317, 'San Antonio', 50),
(318, 'La Ribera', 50),
(319, 'La Asunción', 50),
(320, 'San Joaquín', 51),
(321, 'Barrantes', 51),
(322, 'Llorente', 51),
(323, 'San Pablo', 52),
(324, 'Rincón Sabanilla', 52),
(325, 'Puerto Viejo', 53),
(326, 'La Virgen', 53),
(327, 'Las Horquetas', 53),
(328, 'Llanuras del Gaspar', 53),
(329, 'Cureña', 53),
(330, 'Liberia', 54),
(331, 'Cañas Dulces', 54),
(332, 'Mayorga', 54),
(333, 'Nacascolo', 54),
(334, 'Curubandé', 54),
(335, 'Nicoya', 55),
(336, 'Mansión', 55),
(337, 'San Antonio', 55),
(338, 'Quebrada Honda', 55),
(339, 'Sámara', 55),
(340, 'Nosara', 55),
(341, 'Belén de Nosarita', 55),
(342, 'Santa Cruz', 56),
(343, 'Bolsón', 56),
(344, 'Veintisiete de Abril', 56),
(345, 'Tempate', 56),
(346, 'Cartagena', 56),
(347, 'Cuajiniquil', 56),
(348, 'Diriá', 56),
(349, 'Cabo Velas', 56),
(350, 'Tamarindo', 56),
(351, 'Bagaces', 57),
(352, 'La Fortuna', 57),
(353, 'Mogote', 57),
(354, 'Río Naranjo', 57),
(355, 'Filadelfia', 58),
(356, 'Palmira', 58),
(357, 'Sardinal', 58),
(358, 'Belén', 58),
(359, 'Cañas', 59),
(360, 'Palmira', 59),
(361, 'San Miguel', 59),
(362, 'Bebedero', 59),
(363, 'Porozal', 59),
(364, 'Las Juntas', 60),
(365, 'Sierra', 60),
(366, 'San Juan', 60),
(367, 'Colorado', 60),
(368, 'Tilarán', 61),
(369, 'Quebrada Grande', 61),
(370, 'Tronadora', 61),
(371, 'Santa Rosa', 61),
(372, 'Líbano', 61),
(373, 'Tierras Morenas', 61),
(374, 'Arenal', 61),
(375, 'Carmona', 62),
(376, 'Santa Rita', 62),
(377, 'Zapotal', 62),
(378, 'San Pablo', 62),
(379, 'Porvenir', 62),
(380, 'Bejuco', 62),
(381, 'La Cruz', 63),
(382, 'Santa Cecilia', 63),
(383, 'La Garita', 63),
(384, 'Santa Elena', 63),
(385, 'Hojancha', 64),
(386, 'Monte Romo', 64),
(387, 'Puente Carrillo', 64),
(388, 'Huacas', 64),
(389, 'Puntarenas', 65),
(390, 'Pitahaya', 65),
(391, 'Chomes', 65),
(392, 'Lepanto', 65),
(393, 'Paquera', 65),
(394, 'Manzanillo', 65),
(395, 'Guacimal', 65),
(396, 'Barranca', 65),
(397, 'Monte Verde', 65),
(398, 'Cóbano', 65),
(399, 'Chacarita', 65),
(400, 'Chira', 65),
(401, 'Acapulco', 65),
(402, 'El Roble', 65),
(403, 'Arancibia', 65),
(404, 'Espíritu Santo', 66),
(405, 'San Juan Grande', 66),
(406, 'Macacona', 66),
(407, 'San Rafael', 66),
(408, 'San Jerónimo', 66),
(409, 'Buenos Aires', 67),
(410, 'Volcán', 67),
(411, 'Potrero Grande', 67),
(412, 'Boruca', 67),
(413, 'Pilas', 67),
(414, 'Colinas', 67),
(415, 'Chánguena', 67),
(416, 'Biolley', 67),
(417, 'Brunka', 67),
(418, 'Miramar', 68),
(419, 'La Unión', 68),
(420, 'San Isidro', 68),
(421, 'Puerto Cortés', 69),
(422, 'Palmar', 69),
(423, 'Sierpe', 69),
(424, 'Bahía Ballena', 69),
(425, 'Piedras Blancas', 69),
(426, 'Quepos', 70),
(427, 'Savegre', 70),
(428, 'Naranjito', 70),
(429, 'Golfito', 71),
(430, 'Puerto Jiménez', 71),
(431, 'Guaycará', 71),
(432, 'Pavón', 71),
(433, 'San Vito', 72),
(434, 'Sabalito', 72),
(435, 'Aguabuena', 72),
(436, 'Limoncito', 72),
(437, 'Pittier', 72),
(438, 'Parrita', 73),
(439, 'Corredor', 74),
(440, 'La Cuesta', 74),
(441, 'Canoas', 74),
(442, 'Laurel', 74),
(443, 'Jacó', 75),
(444, 'Tárcoles', 75),
(445, 'Limón', 76),
(446, 'Valle La Estrella', 76),
(447, 'Río Blanco', 76),
(448, 'Matama', 76),
(449, 'Guápiles', 77),
(450, 'Jiménez', 77),
(451, 'Rita', 77),
(452, 'Roxana', 77),
(453, 'Cariari', 77),
(454, 'Colorado', 77),
(455, 'Siquirres', 78),
(456, 'Pacuarito', 78),
(457, 'Florida', 78),
(458, 'Germania', 78),
(459, 'El Cairo', 78),
(460, 'Alegría', 78),
(461, 'Bratsi', 79),
(462, 'Sixaola', 79),
(463, 'Cahuita', 79),
(464, 'Telire', 79),
(465, 'Matina', 80),
(466, 'Batán', 80),
(467, 'Carrandi', 80),
(468, 'Guácimo', 81),
(469, 'Mercedes', 81),
(470, 'Pocora', 81),
(471, 'Río Jiménez', 81),
(472, 'Duacarí', 81);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_factura`
--

CREATE TABLE `tb_factura` (
  `id_factura` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `id_usuario` int(11) NOT NULL
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

--
-- Volcado de datos para la tabla `tb_farmacia`
--

INSERT INTO `tb_farmacia` (`id_farmacia`, `nombre_far`, `telefono`, `horario`, `id_direccion`) VALUES
(1, 'Fischel', 22531784, 'Horario: 7:00-00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_precaucion`
--

CREATE TABLE `tb_precaucion` (
  `id_precaucion` int(11) NOT NULL,
  `efectos_secundarios` varchar(300) NOT NULL,
  `fecha_expiracion` date NOT NULL,
  `id_producto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_producto`
--

CREATE TABLE `tb_producto` (
  `id_producto` int(11) NOT NULL,
  `marca` varchar(25) NOT NULL,
  `nombre_prod` varchar(55) NOT NULL,
  `descrip_prod` varchar(255) NOT NULL,
  `cant_almacen` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `url` varchar(255) NOT NULL,
  `id_tipo_med` int(11) NOT NULL,
  `id_farmacia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_producto`
--

INSERT INTO `tb_producto` (`id_producto`, `marca`, `nombre_prod`, `descrip_prod`, `cant_almacen`, `precio`, `url`, `id_tipo_med`, `id_farmacia`) VALUES
(1, 'Chapstick', 'Chapstick Yerbabuena Blister', 'Ayuda a curar y prevenir los labios secos, agrietados.', 10, '2126.00', 'assets/img/products/producto-img-4.jpg', 1, 1),
(2, 'Migasa', 'Algodón Migasa 50g', 'Suave y absorbente para cuidado y limpieza personal, heridas abiertas y aplicación de medicamentos.', 11, '201.00', 'assets/img/products/producto-img-2.jpg', 1, 1),
(3, 'Malick', 'Alcohol 250ml', 'Alcohol líquido, con un alto poder biocida, diseñado para la asepsia de las manos, fabricado con etanol 70-90%. Para eliminar el 99.9% de bacterias, virus y hongos, previniendo del contagio de influenza.', 2, '607.00', 'assets/img/products/producto-img-1.png', 1, 1),
(4, 'Colgate', 'Cepillo Slim Soft 2x1', 'Cabeza pequeña y delgada para alcanzar las zonas de difícil acceso. Cuello flexible que ayuda a absorber la tensión durante el cepillado agresivo. Mango de caucho ergonómico para un agarre cómodo.', 47, '2923.00', 'assets/img/products/producto-img-3.png', 2, 1),
(5, 'Pañalito', 'Crema Pañalito 235g', 'Indicada para prevención y tratamiento de la dermatitis causada por heces, orina o sudoración en el área del pañal, excoriaciones, irritaciones, quemaduras, lesiones de los pliegues y llagas.', 23, '2477.00', 'assets/img/products/producto-img-5.png', 1, 1),
(6, 'Asepxia', 'Jabón Neutro 100g', 'El jabón es neutro cuando tiene un pH de 7, la mitad de la tabla de pH, pero la mayoría de los jabones que se venden como neutros tienen un pH similar al de nuestra piel, el 5,5.', 19, '2585.00', 'assets/img/products/producto-img-6.jpg', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_provincia`
--

CREATE TABLE `tb_provincia` (
  `id_provincia` int(11) NOT NULL,
  `provincia` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tb_provincia`
--

INSERT INTO `tb_provincia` (`id_provincia`, `provincia`) VALUES
(1, 'San José'),
(2, 'Alajuela'),
(3, 'Cartago'),
(4, 'Heredia'),
(5, 'Guanacaste'),
(6, 'Puntarenas'),
(7, 'Limón');

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
(5, 'Mario', 'Molina Medal', 'Mario523', 'mmolina00702@ufide.ac.cr', '12345', 1),
(6, 'Jose', 'Miranda', 'josemiranda11', 'prueba@gmail.com', '12345', 2);

--
-- Índices para tablas volcadas
--

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
  ADD KEY `fk_canton_prov` (`id_provincia`);

--
-- Indices de la tabla `tb_categoria_producto`
--
ALTER TABLE `tb_categoria_producto`
  ADD PRIMARY KEY (`id_tipo_med`);

--
-- Indices de la tabla `tb_detalle_factura`
--
ALTER TABLE `tb_detalle_factura`
  ADD PRIMARY KEY (`id_detalle_factura`),
  ADD KEY `fk_df_fac` (`id_factura`),
  ADD KEY `fk_df_med` (`id_producto`);

--
-- Indices de la tabla `tb_direccion`
--
ALTER TABLE `tb_direccion`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `fk_direc_dist` (`id_distrito`);

--
-- Indices de la tabla `tb_distrito`
--
ALTER TABLE `tb_distrito`
  ADD PRIMARY KEY (`id_distrito`),
  ADD KEY `fk_dist_canton` (`id_canton`);

--
-- Indices de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  ADD PRIMARY KEY (`id_factura`),
  ADD KEY `fk_fact_usuario` (`id_usuario`);

--
-- Indices de la tabla `tb_farmacia`
--
ALTER TABLE `tb_farmacia`
  ADD PRIMARY KEY (`id_farmacia`),
  ADD KEY `fk_farm_direc` (`id_direccion`);

--
-- Indices de la tabla `tb_precaucion`
--
ALTER TABLE `tb_precaucion`
  ADD PRIMARY KEY (`id_precaucion`),
  ADD KEY `fk_prec_productos` (`id_producto`);

--
-- Indices de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `fk_productos_catm` (`id_tipo_med`),
  ADD KEY `fk_productos_farm` (`id_farmacia`);

--
-- Indices de la tabla `tb_provincia`
--
ALTER TABLE `tb_provincia`
  ADD PRIMARY KEY (`id_provincia`);

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
-- AUTO_INCREMENT de la tabla `tb_bitacora`
--
ALTER TABLE `tb_bitacora`
  MODIFY `id_bitacora` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_canton`
--
ALTER TABLE `tb_canton`
  MODIFY `id_canton` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `tb_categoria_producto`
--
ALTER TABLE `tb_categoria_producto`
  MODIFY `id_tipo_med` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_detalle_factura`
--
ALTER TABLE `tb_detalle_factura`
  MODIFY `id_detalle_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_direccion`
--
ALTER TABLE `tb_direccion`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tb_distrito`
--
ALTER TABLE `tb_distrito`
  MODIFY `id_distrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=473;

--
-- AUTO_INCREMENT de la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  MODIFY `id_factura` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_farmacia`
--
ALTER TABLE `tb_farmacia`
  MODIFY `id_farmacia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_precaucion`
--
ALTER TABLE `tb_precaucion`
  MODIFY `id_precaucion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_provincia`
--
ALTER TABLE `tb_provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tb_rol`
--
ALTER TABLE `tb_rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tb_canton`
--
ALTER TABLE `tb_canton`
  ADD CONSTRAINT `fk_canton_prov` FOREIGN KEY (`id_provincia`) REFERENCES `tb_provincia` (`id_provincia`);

--
-- Filtros para la tabla `tb_detalle_factura`
--
ALTER TABLE `tb_detalle_factura`
  ADD CONSTRAINT `fk_df_fac` FOREIGN KEY (`id_factura`) REFERENCES `tb_factura` (`id_factura`),
  ADD CONSTRAINT `fk_df_med` FOREIGN KEY (`id_producto`) REFERENCES `tb_producto` (`id_producto`);

--
-- Filtros para la tabla `tb_direccion`
--
ALTER TABLE `tb_direccion`
  ADD CONSTRAINT `fk_direc_dist` FOREIGN KEY (`id_distrito`) REFERENCES `tb_distrito` (`id_distrito`);

--
-- Filtros para la tabla `tb_distrito`
--
ALTER TABLE `tb_distrito`
  ADD CONSTRAINT `fk_dist_canton` FOREIGN KEY (`id_canton`) REFERENCES `tb_canton` (`id_canton`);

--
-- Filtros para la tabla `tb_factura`
--
ALTER TABLE `tb_factura`
  ADD CONSTRAINT `fk_fact_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuario` (`id_usuario`);

--
-- Filtros para la tabla `tb_farmacia`
--
ALTER TABLE `tb_farmacia`
  ADD CONSTRAINT `fk_farm_direc` FOREIGN KEY (`id_direccion`) REFERENCES `tb_direccion` (`id_direccion`);

--
-- Filtros para la tabla `tb_precaucion`
--
ALTER TABLE `tb_precaucion`
  ADD CONSTRAINT `fk_prec_productos` FOREIGN KEY (`id_producto`) REFERENCES `tb_producto` (`id_producto`);

--
-- Filtros para la tabla `tb_producto`
--
ALTER TABLE `tb_producto`
  ADD CONSTRAINT `fk_productos_catm` FOREIGN KEY (`id_tipo_med`) REFERENCES `tb_categoria_producto` (`id_tipo_med`),
  ADD CONSTRAINT `fk_productos_farm` FOREIGN KEY (`id_farmacia`) REFERENCES `tb_farmacia` (`id_farmacia`);

--
-- Filtros para la tabla `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD CONSTRAINT `fk_tipo_rol` FOREIGN KEY (`id_rol`) REFERENCES `tb_rol` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
