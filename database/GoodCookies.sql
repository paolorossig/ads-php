-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 10-10-2022 a las 02:06:07
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
-- Base de datos: `GoodCookies`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colaborador`
--

CREATE TABLE `colaborador` (
  `cod` int(11) NOT NULL,
  `codUsuario` int(11) NOT NULL,
  `nombres` varchar(20) COLLATE utf8_bin NOT NULL,
  `apellidos` varchar(20) COLLATE utf8_bin NOT NULL,
  `area` varchar(20) COLLATE utf8_bin NOT NULL,
  `rol` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `colaborador`
--

INSERT INTO `colaborador` (`cod`, `codUsuario`, `nombres`, `apellidos`, `area`, `rol`) VALUES
(1, 1, 'Paolo', 'Rossi', 'Producción', 'Operario de producción'),
(2, 2, 'Pepito', 'Grillo', 'Almacén', 'Operario de almacén'),
(3, 3, 'John', 'Doe', 'Almacén', 'Gerente de almacén'),
(4, 4, 'Pepita', 'Perez', 'Despacho', 'Operario de despacho'),
(5, 5, 'Juan', 'Lopez', 'Producción', 'Gerente de producción'),
(6, 6, 'Pedro', 'Quispe', 'Producción', 'Operario de producción');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprima`
--

CREATE TABLE `materiaprima` (
  `cod` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `unidad` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `materiaprima`
--

INSERT INTO `materiaprima` (`cod`, `nombre`, `unidad`) VALUES
(1, 'Mantequilla sin sal', 'Kg'),
(2, 'Azúcar Rubia', 'Kg'),
(3, 'Huevos', 'Unidades'),
(4, 'Esencia de vainilla', 'Kg'),
(5, 'Harina', 'Kg'),
(6, 'Polvo de hornear', 'Kg'),
(7, 'Sal', 'Kg'),
(8, 'Harina de avena', 'Kg'),
(9, 'Avena en hojuelas', 'Kg'),
(10, 'Chocolate picado', 'Unidades'),
(11, 'Maicena', 'Kg'),
(12, 'Leche condensada', 'L');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiaprimaxproducto`
--

CREATE TABLE `materiaprimaxproducto` (
  `cod` int(11) NOT NULL,
  `codMateriaprima` int(11) NOT NULL,
  `codProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `materiaprimaxproducto`
--

INSERT INTO `materiaprimaxproducto` (`cod`, `codMateriaprima`, `codProducto`, `cantidad`) VALUES
(1, 1, 1, 8),
(2, 2, 1, 2),
(3, 3, 1, 10),
(4, 4, 1, 1),
(5, 5, 1, 15),
(6, 6, 1, 1),
(7, 11, 2, 6),
(8, 1, 2, 2),
(9, 12, 2, 1),
(10, 2, 2, 2),
(11, 3, 2, 4),
(12, 4, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menuxrol`
--

CREATE TABLE `menuxrol` (
  `cod` int(11) NOT NULL,
  `rol` varchar(50) COLLATE utf8_bin NOT NULL,
  `menu` varchar(50) COLLATE utf8_bin NOT NULL,
  `href` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `menuxrol`
--

INSERT INTO `menuxrol` (`cod`, `rol`, `menu`, `href`) VALUES
(1, 'Operario de producción', 'Órdenes', 'ordenes'),
(4, 'Operario de producción', 'Ingredientes', 'ingredientes'),
(5, 'Operario de producción', 'Contacto a servicio', 'contacto-servicio'),
(6, 'Operario de almacén', 'Inicio', 'inicio-almacen'),
(7, 'Operario de almacén', 'Materia Prima', 'materia-prima'),
(8, 'Operario de almacén', 'Producto Terminado', 'producto-terminado'),
(9, 'Gerente de almacén', 'Inicio', 'inicio-almacen'),
(10, 'Gerente de almacén', 'Materia Prima', 'materia-prima'),
(11, 'Gerente de almacén', 'Producto Terminado', 'producto-terminado'),
(12, 'Gerente de almacén', 'Reportes', 'reportes-almacen'),
(13, 'Operario de despacho', 'Inicio', 'inicio-despacho'),
(14, 'Operario de despacho', 'Órdenes sin asignar', 'ordenes-sin-asignar'),
(15, 'Gerente de producción', 'Órdenes', 'ordenes'),
(16, 'Gerente de producción', 'Galletas', 'galletas'),
(17, 'Gerente de producción', 'Operarios', 'operarios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimiento`
--

CREATE TABLE `movimiento` (
  `cod` int(11) NOT NULL,
  `codItem` int(11) NOT NULL,
  `tipoProducto` varchar(20) COLLATE utf8_bin NOT NULL,
  `cantidad` int(11) NOT NULL,
  `codUbicacionOrigen` int(11) DEFAULT NULL,
  `codUbicacionDestino` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `movimiento`
--

INSERT INTO `movimiento` (`cod`, `codItem`, `tipoProducto`, `cantidad`, `codUbicacionOrigen`, `codUbicacionDestino`) VALUES
(1, 1, 'materiaprima', 200, NULL, 1),
(2, 5, 'materiaprima', 150, NULL, 1),
(3, 1, 'materiaprima', -10, 1, 3),
(4, 5, 'materiaprima', -15, 1, 3),
(5, 1, 'productoterminado', 50, 3, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden`
--

CREATE TABLE `orden` (
  `cod` int(11) NOT NULL,
  `codProducto` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `prioridad` int(11) NOT NULL,
  `estado` varchar(20) COLLATE utf8_bin NOT NULL,
  `fechaCreacion` date NOT NULL DEFAULT current_timestamp(),
  `cliente` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `orden`
--

INSERT INTO `orden` (`cod`, `codProducto`, `cantidad`, `prioridad`, `estado`, `fechaCreacion`, `cliente`) VALUES
(1, 1, 10, 3, 'Finalizada', '2022-10-01', 'Mayorsa'),
(2, 1, 5, 1, 'Finalizada', '2022-10-01', 'Mayorsa'),
(3, 1, 3, 2, 'Finalizada', '2022-10-04', 'Wong'),
(4, 1, 4, 3, 'Completada', '2022-10-05', 'Wong'),
(5, 1, 5, 1, 'Completada', '2022-10-08', 'Wong'),
(6, 2, 30, 2, 'Transcurso', '2022-10-08', 'Uno'),
(7, 2, 50, 3, 'Pendiente', '2022-10-08', 'Uno'),
(8, 2, 30, 1, 'Pendiente', '2022-10-09', 'Mayorsa'),
(9, 1, 15, 1, 'Pendiente', '2022-10-09', 'Mayorsa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `cod` int(11) NOT NULL,
  `nombre` varchar(50) COLLATE utf8_bin NOT NULL,
  `unidad` varchar(50) COLLATE utf8_bin NOT NULL,
  `image` varchar(50) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`cod`, `nombre`, `unidad`, `image`) VALUES
(1, 'ChocoAvena', 'unidades', '/chocoavena.jpeg'),
(2, 'MaicenaVainilla', 'unidades', '/maicenavainilla.jpeg'),
(3, 'HarinaNaranja', 'unidades', '/harinanaranja.webp');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoxcolaborador`
--

CREATE TABLE `productoxcolaborador` (
  `cod` int(11) NOT NULL,
  `codProducto` int(11) NOT NULL,
  `codColaborador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `productoxcolaborador`
--

INSERT INTO `productoxcolaborador` (`cod`, `codProducto`, `codColaborador`) VALUES
(1, 1, 1),
(2, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitudalmacen`
--

CREATE TABLE `solicitudalmacen` (
  `cod` int(11) NOT NULL,
  `codItem` int(11) NOT NULL,
  `tipoProducto` varchar(20) COLLATE utf8_bin NOT NULL,
  `cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `solicitudalmacen`
--

INSERT INTO `solicitudalmacen` (`cod`, `codItem`, `tipoProducto`, `cantidad`) VALUES
(1, 2, 'materiaprima', 100),
(2, 3, 'materiaprima', 500),
(3, 4, 'materiaprima', 50),
(4, 6, 'materiaprima', 50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ubicacion`
--

CREATE TABLE `ubicacion` (
  `cod` int(11) NOT NULL,
  `nombre` varchar(20) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `ubicacion`
--

INSERT INTO `ubicacion` (`cod`, `nombre`) VALUES
(1, 'MP001'),
(2, 'PT001'),
(3, 'Producción'),
(4, 'Despacho');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `cod` int(11) NOT NULL,
  `email` varchar(100) COLLATE utf8_bin NOT NULL,
  `password` varchar(6) COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`cod`, `email`, `password`) VALUES
(1, 'paolo.rossi@pucp.edu.pe', 'asdasd'),
(2, 'almacen@pucp.edu.pe', 'asdasd'),
(3, 'gerente.almacen@pucp.edu.pe', 'asdasd'),
(4, 'despacho@pucp.edu.pe', 'asdasd'),
(5, 'gerente.produccion@pucp.edu.pe', 'asdasd'),
(6, 'produccion@pucp.edu.pe', 'asdasd');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `materiaprima`
--
ALTER TABLE `materiaprima`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `materiaprimaxproducto`
--
ALTER TABLE `materiaprimaxproducto`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `menuxrol`
--
ALTER TABLE `menuxrol`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `orden`
--
ALTER TABLE `orden`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `productoxcolaborador`
--
ALTER TABLE `productoxcolaborador`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `solicitudalmacen`
--
ALTER TABLE `solicitudalmacen`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  ADD PRIMARY KEY (`cod`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`cod`),
  ADD UNIQUE KEY `email_idx` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colaborador`
--
ALTER TABLE `colaborador`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `materiaprima`
--
ALTER TABLE `materiaprima`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `materiaprimaxproducto`
--
ALTER TABLE `materiaprimaxproducto`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `menuxrol`
--
ALTER TABLE `menuxrol`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `movimiento`
--
ALTER TABLE `movimiento`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `orden`
--
ALTER TABLE `orden`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productoxcolaborador`
--
ALTER TABLE `productoxcolaborador`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `solicitudalmacen`
--
ALTER TABLE `solicitudalmacen`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `ubicacion`
--
ALTER TABLE `ubicacion`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `cod` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
