-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 28-10-2020 a las 21:40:20
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `teakaway`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `idCliente` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `direcCliente` varchar(5000) COLLATE utf8_spanish2_ci NOT NULL,
  `tlfCliente` int(11) NOT NULL,
  `pagoCliente` int(11) NOT NULL,
  `FKidNegocio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

CREATE TABLE `negocio` (
  `id` int(11) NOT NULL,
  `nombreNegocio` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `direccionNegocio` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `municipioNegocio` varchar(200) COLLATE utf8_spanish2_ci NOT NULL,
  `correoNegocio` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `tlfNegocio` int(11) DEFAULT NULL,
  `contraNegocio` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `imagenNegocio` varchar(6500) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `descripNegocio` varchar(6000) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `takeAway` varchar(200) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`id`, `nombreNegocio`, `direccionNegocio`, `municipioNegocio`, `correoNegocio`, `tlfNegocio`, `contraNegocio`, `imagenNegocio`, `descripNegocio`, `takeAway`) VALUES
(3, 'Bar Paco', 'Calle Gas', 'Barcelona', 'paco@gmail.com', 62662626, '77b620cd7f4fcc23ab293d2c460c13e8', 'https://www.paxinasgalegas.es/imagenes/paco_img166122t0.jpg', 'tapas y bocadillos', 'si'),
(4, 'Bar maria', 'calle galicia 23', 'Murcia', 'mariabar@gmail.com', 636636363, '3e30ff8ffea5a2a3b577928ec44311f7', 'https://baresautenticos.com/wp-content/uploads/2011/03/P3201877.jpg', 'copas y vinos', 'Recojida en el establecimiento'),
(5, 'Bartolo', 'Calle Rius i Taulet', 'Barcelona', 'bartolo@gmail.com', 55535353, 'd5dbb8bd311211dfe968dddb7df10b53', 'https://media-cdn.tripadvisor.com/media/photo-s/0e/8f/3a/54/restaurante-mexicano.jpg', 'Restaurante Bartolo especialidades en rabo de toro.', 'Recojida en el establecimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` varchar(1000) COLLATE utf8_spanish2_ci NOT NULL,
  `tipoProducto` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL,
  `descripProducto` varchar(5000) COLLATE utf8_spanish2_ci NOT NULL,
  `precioProducto` float(6,4) NOT NULL,
  `FKidNegocio` int(11) NOT NULL,
  `fotoProducto` varchar(2000) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `tipoProducto`, `descripProducto`, `precioProducto`, `FKidNegocio`, `fotoProducto`) VALUES
('4343', 'Menus', 'esto es un menu cheap', 7.0000, 5, 'dhhg'),
('rer', 'Tapas', 'Callos ibericos', 20.0000, 5, 'gsgfd'),
('yuyt', 'Tapas', 'peras', 4.0000, 5, 'bgbgf');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`idCliente`),
  ADD KEY `FKidNegocio` (`FKidNegocio`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`),
  ADD KEY `FKidNegocio` (`FKidNegocio`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `cliente_ibfk_1` FOREIGN KEY (`FKidNegocio`) REFERENCES `negocio` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`FKidNegocio`) REFERENCES `negocio` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
