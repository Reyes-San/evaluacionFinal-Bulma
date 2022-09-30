-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-12-2020 a las 20:05:12
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `evfinal`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cajero`
--

CREATE TABLE `cajero` (
  `cajeroID` varchar(253) NOT NULL,
  `cajeroMonto` int(23) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cajero`
--

INSERT INTO `cajero` (`cajeroID`, `cajeroMonto`) VALUES
('a001', 50000000),
('a002', 50000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `clienteRut` varchar(253) NOT NULL,
  `clienteNombre` varchar(253) NOT NULL,
  `clientePassword` varchar(253) NOT NULL,
  `clienteMonto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`clienteRut`, `clienteNombre`, `clientePassword`, `clienteMonto`) VALUES
('666666-6', 'Perico los Palotes', '1234', 100000000),
('777777-7', 'Maria las Petunias', '1234', 100000000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `giros`
--

CREATE TABLE `giros` (
  `girosID` int(11) NOT NULL,
  `clienteRut` varchar(253) NOT NULL,
  `girosFecha` date NOT NULL,
  `cajeroID` varchar(253) NOT NULL,
  `girosCantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `giros`
--

INSERT INTO `giros` (`girosID`, `clienteRut`, `girosFecha`, `cajeroID`, `girosCantidad`) VALUES
(1, '666666-6', '2020-12-24', 'a002', 10000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mantenciones`
--

CREATE TABLE `mantenciones` (
  `mantencionID` int(253) NOT NULL,
  `tecnicoRut` varchar(253) NOT NULL,
  `mantencionFecha` date NOT NULL,
  `cajeroID` varchar(253) NOT NULL,
  `mantencionCantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mantenciones`
--

INSERT INTO `mantenciones` (`mantencionID`, `tecnicoRut`, `mantencionFecha`, `cajeroID`, `mantencionCantidad`) VALUES
(1, '888888-8', '2020-12-24', 'a001', 100000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnico`
--

CREATE TABLE `tecnico` (
  `tecnicoRut` varchar(253) NOT NULL,
  `tecnicoNombre` varchar(253) NOT NULL,
  `tecnicoPassword` varchar(253) NOT NULL,
  `tecnicoTipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tecnico`
--

INSERT INTO `tecnico` (`tecnicoRut`, `tecnicoNombre`, `tecnicoPassword`, `tecnicoTipo`) VALUES
('888888-8', 'Maikel Patton', '1234', 0),
('999999-9', 'Curco Vein', '1234', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cajero`
--
ALTER TABLE `cajero`
  ADD PRIMARY KEY (`cajeroID`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`clienteRut`);

--
-- Indices de la tabla `giros`
--
ALTER TABLE `giros`
  ADD PRIMARY KEY (`girosID`),
  ADD KEY `fk_foreign_clienteRut` (`clienteRut`),
  ADD KEY `fk_foreign_cajeroID_giros` (`cajeroID`);

--
-- Indices de la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  ADD PRIMARY KEY (`mantencionID`),
  ADD KEY `fk_foreign_tecnicoRut` (`tecnicoRut`),
  ADD KEY `fk_foreign_cajeroID` (`cajeroID`);

--
-- Indices de la tabla `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`tecnicoRut`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `giros`
--
ALTER TABLE `giros`
  MODIFY `girosID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  MODIFY `mantencionID` int(253) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `giros`
--
ALTER TABLE `giros`
  ADD CONSTRAINT `fk_foreign_cajeroID_giros` FOREIGN KEY (`cajeroID`) REFERENCES `cajero` (`cajeroID`),
  ADD CONSTRAINT `fk_foreign_clienteRut` FOREIGN KEY (`clienteRut`) REFERENCES `cliente` (`clienteRut`);

--
-- Filtros para la tabla `mantenciones`
--
ALTER TABLE `mantenciones`
  ADD CONSTRAINT `fk_foreign_cajeroID` FOREIGN KEY (`cajeroID`) REFERENCES `cajero` (`cajeroID`),
  ADD CONSTRAINT `fk_foreign_tecnicoRut` FOREIGN KEY (`tecnicoRut`) REFERENCES `tecnico` (`tecnicoRut`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
