-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-11-2020 a las 19:50:10
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd-reserva-taules`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_empleado`
--

CREATE TABLE `tbl_empleado` (
  `DNI_empleado` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_empleado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido1_empleado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `apellido2_empleado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_empleado` enum('Camarero','Mantenimiento') COLLATE utf8_unicode_ci NOT NULL,
  `password_empleado` varchar(255) COLLATE utf8_unicode_ci NOT NULL
);

--
-- Volcado de datos para la tabla `tbl_empleado`
--

INSERT INTO `tbl_empleado` (`DNI_empleado`, `nombre_empleado`, `apellido1_empleado`, `apellido2_empleado`, `tipo_empleado`, `password_empleado`) VALUES
('43345672R', 'Camilo', 'Vargas', 'Herrera', 'Mantenimiento', '81dc9bdb52d04dc20036dbd8313ed055'),
('45653245T', 'Sergi', 'Gomez', 'Hernandez', 'Camarero', '81dc9bdb52d04dc20036dbd8313ed055'),
('46492452W', 'Federico', 'Gonzalez', 'Urieta', 'Camarero', '81dc9bdb52d04dc20036dbd8313ed055');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

CREATE TABLE `tbl_incidencia` (
  `id_incidencia` int(11) NOT NULL,
  `observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `DNI_empleado` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `id_mesa` int(11) DEFAULT NULL,
  `id_sala` int(11) NOT NULL
);

--
-- Volcado de datos para la tabla `tbl_incidencia`
--

INSERT INTO `tbl_incidencia` (`id_incidencia`, `observacion`, `DNI_empleado`, `id_mesa`, `id_sala`) VALUES
(1, 'Mesa coja.', '45653245T', 1, 1),
(2, 'El toldo se ha rajado.', '46492452W', NULL, 8),
(3, 'Aire acondicionado no funciona.', '43345672R', NULL, 4),
(4, 'Una de las sillas esta rota.', '43345672R', 6, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesa`
--

CREATE TABLE `tbl_mesa` (
  `id_mesa` int(11) NOT NULL,
  `capacidad_mesa` int(2) NOT NULL,
  `ocupacion_mesa` enum('Libre','Ocupado') COLLATE utf8_unicode_ci NOT NULL,
  `id_sala` int(11) NOT NULL
);

--
-- Volcado de datos para la tabla `tbl_mesa`
--

INSERT INTO `tbl_mesa` (`id_mesa`, `capacidad_mesa`, `ocupacion_mesa`, `id_sala`) VALUES
(1, 6, 'Libre', 1),
(2, 6, 'Ocupado', 1),
(3, 6, 'Libre', 1),
(4, 6, 'Libre', 1),
(5, 8, 'Ocupado', 1),
(6, 4, 'Libre', 2),
(7, 4, 'Libre', 2),
(8, 4, 'Ocupado', 2),
(9, 8, 'Libre', 2),
(10, 2, 'Ocupado', 3),
(11, 2, 'Libre', 3),
(12, 4, 'Ocupado', 3),
(13, 2, 'Ocupado', 4),
(14, 1, 'Libre', 4),
(15, 1, 'Libre', 4),
(16, 3, 'Ocupado', 4),
(17, 1, 'Ocupado', 5),
(18, 4, 'Ocupado', 5),
(19, 2, 'Libre', 5),
(20, 1, 'Libre', 5),
(21, 3, 'Ocupado', 6),
(22, 2, 'Libre', 6),
(23, 5, 'Ocupado', 6),
(24, 6, 'Libre', 6),
(25, 1, 'Libre', 6),
(26, 3, 'Ocupado', 7),
(27, 2, 'Libre', 7),
(28, 4, 'Libre', 7),
(29, 8, 'Libre', 7),
(30, 2, 'Ocupado', 8),
(31, 1, 'Ocupado', 8),
(32, 1, 'Ocupado', 8),
(33, 4, 'Libre', 8),
(34, 6, 'Libre', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_ocupacion`
--

CREATE TABLE `tbl_ocupacion` (
  `id_ocupacion` int(11) NOT NULL,
  `fecha_ocupacion` date NOT NULL,
  `hora_inicio` time NOT NULL,
  `hora_final` time DEFAULT NULL,
  `estado_ocupacion` enum('Abierta','Cerrada') COLLATE utf8_unicode_ci NOT NULL,
  `DNI_empleado` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `id_mesa` int(11) NOT NULL
);

--
-- Volcado de datos para la tabla `tbl_ocupacion`
--

INSERT INTO `tbl_ocupacion` (`id_ocupacion`, `fecha_ocupacion`, `hora_inicio`, `hora_final`, `estado_ocupacion`, `DNI_empleado`, `id_mesa`) VALUES
(1, '2020-11-06', '19:41:35', '19:42:32', 'Cerrada', '46492452W', 1),
(2, '2020-11-06', '19:41:36', NULL, 'Abierta', '46492452W', 5),
(3, '2020-11-06', '19:41:39', NULL, 'Abierta', '46492452W', 8),
(4, '2020-11-06', '19:41:43', NULL, 'Abierta', '46492452W', 12),
(5, '2020-11-06', '19:41:44', NULL, 'Abierta', '46492452W', 10),
(6, '2020-11-06', '19:41:48', '19:42:27', 'Cerrada', '46492452W', 14),
(7, '2020-11-06', '19:41:49', '19:42:26', 'Cerrada', '46492452W', 15),
(8, '2020-11-06', '19:41:50', NULL, 'Abierta', '46492452W', 16),
(9, '2020-11-06', '19:41:50', NULL, 'Abierta', '46492452W', 13),
(10, '2020-11-06', '19:41:54', NULL, 'Abierta', '46492452W', 17),
(11, '2020-11-06', '19:41:54', '19:42:37', 'Cerrada', '46492452W', 19),
(12, '2020-11-06', '19:41:57', NULL, 'Abierta', '46492452W', 23),
(13, '2020-11-06', '19:42:01', NULL, 'Abierta', '46492452W', 26),
(14, '2020-11-06', '19:42:04', NULL, 'Abierta', '46492452W', 32),
(15, '2020-11-06', '19:42:05', NULL, 'Abierta', '46492452W', 31),
(16, '2020-11-06', '19:42:06', NULL, 'Abierta', '46492452W', 30),
(17, '2020-11-06', '19:42:38', NULL, 'Abierta', '46492452W', 18),
(18, '2020-11-06', '19:45:28', '19:45:53', 'Cerrada', '45653245T', 1),
(19, '2020-11-06', '19:45:29', NULL, 'Abierta', '45653245T', 2),
(20, '2020-11-06', '19:45:34', '19:46:02', 'Cerrada', '45653245T', 6),
(21, '2020-11-06', '19:45:43', NULL, 'Abierta', '45653245T', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_sala`
--

CREATE TABLE `tbl_sala` (
  `id_sala` int(11) NOT NULL,
  `nombre_sala` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_sala` enum('Terraza','Comedor','Sala privada','') COLLATE utf8_unicode_ci NOT NULL
);

--
-- Volcado de datos para la tabla `tbl_sala`
--

INSERT INTO `tbl_sala` (`id_sala`, `nombre_sala`, `tipo_sala`) VALUES
(1, 'Comedor Central', 'Comedor'),
(2, 'Comedor Superior', 'Comedor'),
(3, 'Sala Privada Playa', 'Sala privada'),
(4, 'Sala Privada Montaña', 'Sala privada'),
(5, 'Sala Privada Interior', 'Sala privada'),
(6, 'Terraza Montaña', 'Terraza'),
(7, 'Terraza Playa', 'Terraza'),
(8, 'Terraza Central', 'Terraza');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_empleado`
--
ALTER TABLE `tbl_empleado`
  ADD PRIMARY KEY (`DNI_empleado`);

--
-- Indices de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD PRIMARY KEY (`id_incidencia`),
  ADD KEY `id_mesa` (`id_mesa`),
  ADD KEY `id_sala` (`id_sala`),
  ADD KEY `DNI_empleado` (`DNI_empleado`);

--
-- Indices de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD PRIMARY KEY (`id_mesa`),
  ADD KEY `id_sala` (`id_sala`);

--
-- Indices de la tabla `tbl_ocupacion`
--
ALTER TABLE `tbl_ocupacion`
  ADD PRIMARY KEY (`id_ocupacion`),
  ADD KEY `DNI_empleado` (`DNI_empleado`),
  ADD KEY `id_mesa` (`id_mesa`);

--
-- Indices de la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  ADD PRIMARY KEY (`id_sala`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  MODIFY `id_incidencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  MODIFY `id_mesa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `tbl_ocupacion`
--
ALTER TABLE `tbl_ocupacion`
  MODIFY `id_ocupacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `tbl_sala`
--
ALTER TABLE `tbl_sala`
  MODIFY `id_sala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD CONSTRAINT `tbl_incidencia_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `tbl_sala` (`id_sala`),
  ADD CONSTRAINT `tbl_incidencia_ibfk_3` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`),
  ADD CONSTRAINT `tbl_incidencia_ibfk_4` FOREIGN KEY (`DNI_empleado`) REFERENCES `tbl_empleado` (`DNI_empleado`);

--
-- Filtros para la tabla `tbl_mesa`
--
ALTER TABLE `tbl_mesa`
  ADD CONSTRAINT `tbl_mesa_ibfk_1` FOREIGN KEY (`id_sala`) REFERENCES `tbl_sala` (`id_sala`);

--
-- Filtros para la tabla `tbl_ocupacion`
--
ALTER TABLE `tbl_ocupacion`
  ADD CONSTRAINT `tbl_ocupacion_ibfk_1` FOREIGN KEY (`DNI_empleado`) REFERENCES `tbl_empleado` (`DNI_empleado`),
  ADD CONSTRAINT `tbl_ocupacion_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
