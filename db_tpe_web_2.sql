-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2024 a las 23:41:44
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_tpe_web_2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `id_alimento` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`id_alimento`, `nombre`) VALUES
(1, 'ENTRADAS'),
(2, 'PRINCIPALES'),
(3, 'POSTRES'),
(4, 'BEBIDAS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bebidas`
--

CREATE TABLE `bebidas` (
  `id_plato` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_alimento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `bebidas`
--

INSERT INTO `bebidas` (`id_plato`, `nombre`, `valor`, `descripcion`, `id_alimento`) VALUES
(1, 'Coca-Cola', 700.00, 'Bebida gasificada sabor cola', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entradas`
--

CREATE TABLE `entradas` (
  `id_plato` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_alimento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `entradas`
--

INSERT INTO `entradas` (`id_plato`, `nombre`, `valor`, `descripcion`, `id_alimento`) VALUES
(1, 'Rabas', 5000.00, 'Trozos de calamar finamente rebozado y frito', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `postres`
--

CREATE TABLE `postres` (
  `id_plato` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_alimento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `postres`
--

INSERT INTO `postres` (`id_plato`, `nombre`, `valor`, `descripcion`, `id_alimento`) VALUES
(1, 'Frutillas', 3000.00, 'Frutillas de la mejor calidad, se pueden acompañar con crema o dulce de leche', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `principales`
--

CREATE TABLE `principales` (
  `id_plato` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `id_alimento` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `principales`
--

INSERT INTO `principales` (`id_plato`, `nombre`, `valor`, `descripcion`, `id_alimento`) VALUES
(2, 'Milanesa Napolita', 7000.00, 'Milanesa de pollo o ternera, con salsa de tomate, queso y jamon por encima', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`id_alimento`);

--
-- Indices de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `id_alimento` (`id_alimento`);

--
-- Indices de la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `id_alimento` (`id_alimento`);

--
-- Indices de la tabla `postres`
--
ALTER TABLE `postres`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `id_alimento` (`id_alimento`);

--
-- Indices de la tabla `principales`
--
ALTER TABLE `principales`
  ADD PRIMARY KEY (`id_plato`),
  ADD KEY `id_alimento` (`id_alimento`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `id_alimento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `bebidas`
--
ALTER TABLE `bebidas`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `entradas`
--
ALTER TABLE `entradas`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `postres`
--
ALTER TABLE `postres`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `principales`
--
ALTER TABLE `principales`
  MODIFY `id_plato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `bebidas`
--
ALTER TABLE `bebidas`
  ADD CONSTRAINT `bebidas_ibfk_1` FOREIGN KEY (`id_alimento`) REFERENCES `alimentos` (`id_alimento`);

--
-- Filtros para la tabla `entradas`
--
ALTER TABLE `entradas`
  ADD CONSTRAINT `entradas_ibfk_1` FOREIGN KEY (`id_alimento`) REFERENCES `alimentos` (`id_alimento`);

--
-- Filtros para la tabla `postres`
--
ALTER TABLE `postres`
  ADD CONSTRAINT `postres_ibfk_1` FOREIGN KEY (`id_alimento`) REFERENCES `alimentos` (`id_alimento`);

--
-- Filtros para la tabla `principales`
--
ALTER TABLE `principales`
  ADD CONSTRAINT `principales_ibfk_1` FOREIGN KEY (`id_alimento`) REFERENCES `alimentos` (`id_alimento`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
