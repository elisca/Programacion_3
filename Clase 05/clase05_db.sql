-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-04-2023 a las 03:09:00
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `clase05_db`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `codigo_de_barra` int(6) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `stock` int(10) NOT NULL,
  `precio` double NOT NULL,
  `fecha_de_creacion` date NOT NULL,
  `fecha_de_modificacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `codigo_de_barra`, `nombre`, `tipo`, `stock`, `precio`, `fecha_de_creacion`, `fecha_de_modificacion`) VALUES
(1001, 77900361, 'Westmacott', 'liquido', 33, 15.87, '2021-02-09', '2020-09-26'),
(1002, 77900362, 'Spirit', 'solido', 45, 69.74, '2020-09-18', '2020-04-14'),
(1003, 77900363, 'Newgrosh', 'polvo', 14, 68.19, '2020-11-29', '2021-02-11'),
(1004, 77900364, 'McNickle', 'polvo', 19, 53.51, '2020-11-28', '2020-04-17'),
(1005, 77900365, 'Hudd', 'solido', 68, 26.56, '2020-12-19', '2020-06-19'),
(1006, 77900366, 'Schrader', 'polvo', 17, 96.54, '2020-08-02', '2020-04-18'),
(1007, 77900367, 'Bachellier', 'solido', 59, 69.17, '2021-01-30', '2020-06-07'),
(1008, 77900368, 'Fleming', 'solido', 38, 66.77, '2020-10-26', '2020-10-03'),
(1009, 77900369, 'Hurry', 'solido', 44, 43.01, '2020-07-04', '2020-05-30'),
(1010, 77900310, 'Krauss', 'polvo', 73, 35.73, '2021-03-03', '2020-08-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(10) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `clave` varchar(50) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `fecha_de_registro` date NOT NULL,
  `localidad` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellido`, `clave`, `mail`, `fecha_de_registro`, `localidad`) VALUES
(101, 'Esteban', 'Madou', '2345', 'dkantor0@example.com', '2021-07-01', 'Quilmes'),
(102, 'German', 'Gerram', '1234', 'ggerram1@hud.gov', '2020-08-05', 'Berazategui'),
(103, 'Deloris', 'Fosis', '5678', 'bsharpe2@wisc.edu', '2020-11-28', 'Avellaneda'),
(104, 'Brok', 'Neiner', '4567', 'bblazic3@desdev.cn', '2020-08-12', 'Quilmes'),
(105, 'Garrick', 'Brent', '6789', 'gbrent4@theguardian.com', '2020-12-17', 'Moron'),
(106, 'Bili', 'Baus', '123', 'bhoff5@addthis.com', '2020-11-27', 'Moreno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha_de_venta` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `id_producto`, `id_usuario`, `cantidad`, `fecha_de_venta`) VALUES
(1, 1001, 101, 2, '2020-07-19'),
(2, 1008, 102, 3, '2020-08-16'),
(3, 1007, 102, 4, '2021-01-24'),
(4, 1006, 103, 5, '2021-01-14'),
(5, 1003, 104, 6, '2021-03-20'),
(6, 1005, 105, 7, '2021-02-22'),
(7, 1003, 104, 6, '2020-12-02'),
(8, 1003, 106, 6, '2020-06-10'),
(9, 1002, 106, 6, '2021-02-04'),
(10, 1001, 106, 1, '2020-05-17');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1011;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
