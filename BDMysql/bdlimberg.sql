-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2024 a las 02:11:26
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdlimberg`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catastro`
--

CREATE TABLE `catastro` (
  `id` int(11) NOT NULL,
  `zona` varchar(50) NOT NULL,
  `xini` decimal(10,6) NOT NULL,
  `yini` decimal(10,6) NOT NULL,
  `xfin` decimal(10,6) NOT NULL,
  `yfin` decimal(10,6) NOT NULL,
  `superficie` decimal(10,2) NOT NULL,
  `ci` int(11) NOT NULL,
  `distrito` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `catastro`
--

INSERT INTO `catastro` (`id`, `zona`, `xini`, `yini`, `xfin`, `yfin`, `superficie`, `ci`, `distrito`) VALUES
(1, '', 1.000000, 2.000000, 3.000000, 4.000000, 123.00, 0, 'Sur'),
(1000, 'Achumani', 12.345678, 98.765432, 12.456789, 98.876543, 155.50, 6032456, 'Cotahuma'),
(1001, '1ro de Mayo', 12.234567, 98.765432, 12.345678, 98.876543, 200.75, 7103245, 'San Antonio'),
(1002, 'San Francisco', 12.345678, 98.876543, 12.456789, 98.987654, 180.00, 6405678, 'Centro'),
(1003, 'La Florida', 12.456789, 98.987654, 12.567890, 99.098765, 130.25, 8887654, 'Cotahuma'),
(1004, 'Villa Fátima', 12.567890, 99.098765, 12.678901, 99.209876, 250.50, 6723456, 'Max Paredes'),
(1005, 'Ciudad Satélite', 12.678901, 99.209876, 12.789012, 99.320987, 145.75, 9904567, 'Periférica'),
(1006, 'Kallutaca', 12.789012, 99.320987, 12.890123, 99.432109, 160.00, 6109876, 'Hampaturi'),
(1007, 'Cañaviri', 12.890123, 99.432109, 12.901234, 99.543210, 170.20, 7534567, 'Zongo'),
(1008, 'Río Abajo', 12.901234, 99.543210, 12.912345, 99.654321, 180.60, 8901235, 'Mallasa'),
(1009, 'Villa Pichincha', 12.912345, 99.654321, 12.923456, 99.765432, 155.50, 6409871, 'La Paz Norte'),
(1100, 'Achumani', 12.345678, 98.765432, 12.456789, 98.876543, 150.50, 0, 'Cotahuma'),
(1111, '2', 1.000000, 2.000000, 3.000000, 4.000000, 150.00, 0, 'Cotahuma'),
(1200, 'La Florida', 12.456789, 98.987654, 12.567890, 99.098765, 130.25, 6032456, 'Cotahuma'),
(2000, 'Achumani', 12.234567, 99.876543, 12.345678, 99.987654, 210.00, 6001234, 'Cotahuma'),
(2001, 'Villa Ingenio (zona central)', 12.345678, 100.012345, 12.456789, 100.123456, 175.00, 8507654, 'San Antonio'),
(2002, 'Obrajes', 12.456789, 100.123456, 12.567890, 100.234567, 190.50, 7112345, 'Sur'),
(2003, 'Los Pinos', 12.567890, 100.234567, 12.678901, 100.345678, 220.25, 9204567, 'Max Paredes'),
(2004, 'San Francisco', 12.678901, 100.345678, 12.789012, 100.456789, 230.00, 6823456, 'Centro'),
(2005, 'Villa El Carmen', 12.789012, 100.456789, 12.890123, 100.567890, 145.75, 6009872, 'Periférica'),
(2006, 'Pucarani', 12.890123, 100.567890, 12.901234, 100.678901, 160.00, 7401234, 'Hampaturi'),
(2007, 'Cañaviri', 12.901234, 100.678901, 12.912345, 100.789012, 170.20, 8804567, 'Zongo'),
(2008, 'La Joya', 12.912345, 100.789012, 12.923456, 100.890123, 180.60, 6403456, 'Mallasa'),
(2100, 'Villa El Carmen', 12.789012, 100.456789, 12.890123, 100.567890, 145.75, 0, 'Periférica'),
(2200, 'Obrajes', 12.456789, 100.123456, 12.567890, 100.234567, 190.50, 0, 'Sur'),
(3000, 'San Antonio (zona central)', 12.234567, 100.890123, 12.345678, 100.901234, 210.00, 1234567, 'San Antonio'),
(3001, 'Aranjuez', 12.345678, 100.901234, 12.456789, 101.012345, 175.00, 2345678, 'Sur'),
(3002, 'Villa Fátima', 12.456789, 101.012345, 12.567890, 101.123456, 190.50, 3456789, 'Max Paredes'),
(3003, 'Plaza Murillo', 12.567890, 101.123456, 12.678901, 101.234567, 220.25, 4567890, 'Centro'),
(3004, 'Ciudad Satélite', 12.678901, 101.234567, 12.789012, 101.345678, 230.00, 5678901, 'Periférica'),
(3005, 'Hampaturi (zona central)', 12.789012, 101.345678, 12.890123, 101.456789, 145.75, 6789012, 'Hampaturi'),
(3006, 'Zongo (zona central)', 12.890123, 101.456789, 12.901234, 101.567890, 160.00, 7890123, 'Zongo'),
(3007, 'Mallasa (zona central)', 12.901234, 101.567890, 12.912345, 101.678901, 170.20, 8901234, 'Mallasa'),
(3008, 'Villa San Antonio', 12.912345, 101.678901, 12.923456, 101.789012, 180.60, 9012345, 'La Paz Norte'),
(3009, 'San Juan', 12.923456, 101.789012, 12.934567, 101.890123, 200.00, 9876543, 'Centro'),
(3010, 'Periférica', 12.934567, 101.890123, 12.945678, 101.901234, 190.50, 8765432, 'Periférica'),
(3100, 'Mallasa (zona central)', 12.901234, 101.567890, 12.912345, 101.678901, 170.20, 0, 'Mallasa'),
(3200, 'Hampaturi (zona central)', 12.789012, 101.345678, 12.890123, 101.456789, 145.75, 0, 'Hampaturi');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `ci` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `paterno` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`ci`, `nombre`, `paterno`) VALUES
(111, 'prueba', 'last'),
(11111, 'limberg', 'mamami'),
(1234567, 'Fernando', 'Castillo'),
(2345678, 'Tania', 'Salinas'),
(3456789, 'Hugo', 'Ponce'),
(4567890, 'Natalia', 'Figueroa'),
(5678901, 'Esteban', 'Salcedo'),
(6001234, 'Javier', 'Jiménez'),
(6009872, 'Paola', 'Rojas'),
(6032456, 'Juan', 'Pérez'),
(6109876, 'José', 'Torres'),
(6403456, 'Samuel', 'Núñez'),
(6405678, 'Luis', 'Martínez'),
(6409871, 'Clara', 'Morales'),
(6723456, 'Pedro', 'Fernández'),
(6789012, 'Silvia', 'Aguirre'),
(6823456, 'Andrés', 'Castro'),
(7067890, 'Carla', 'Soto'),
(7103245, 'Ana', 'Gómez'),
(7112345, 'Miguel', 'Cruz'),
(7401234, 'Diego', 'González'),
(7534567, 'Laura', 'Hernández'),
(7890123, 'Roberto', 'Marín'),
(8507654, 'Elena', 'Salazar'),
(8765432, 'Arturo', 'López'),
(8804567, 'Valentina', 'Muñoz'),
(8887654, 'María', 'López'),
(8901234, 'Patricia', 'Córdova'),
(8901235, 'Carlos', 'Díaz'),
(9012345, 'Fernando', 'Quispe'),
(9204567, 'Lucía', 'Vásquez'),
(9876543, 'Miriam', 'Chávez'),
(9904567, 'Sofía', 'Ramírez');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ci` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('dueño','administrativo') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ci`, `password`, `rol`) VALUES
('111', '111', 'dueño'),
('11111', '11111', 'administrativo'),
('1234567', '1234567', 'dueño'),
('2345678', '2345678', 'dueño'),
('3456789', '3456789', 'dueño'),
('4567890', '4567890', 'dueño'),
('5678901', '5678901', 'dueño'),
('6001234', '6001234', 'dueño'),
('6009872', '6009872', 'dueño'),
('6032456', '6032456', 'dueño'),
('6109876', '6109876', 'dueño'),
('6403456', '6403456', 'dueño'),
('6405678', '6405678', 'dueño'),
('6409871', '6409871', 'dueño'),
('6723456', '6723456', 'dueño'),
('6789012', '6789012', 'dueño'),
('6823456', '6823456', 'dueño'),
('7067890', '7067890', 'administrativo'),
('7103245', '7103245', 'dueño'),
('7112345', '7112345', 'dueño'),
('7401234', '7401234', 'dueño'),
('7534567', '7534567', 'dueño'),
('7890123', '7890123', 'dueño'),
('8507654', '8507654', 'dueño'),
('8765432', '8765432', 'dueño'),
('8804567', '8804567', 'dueño'),
('8887654', '8887654', 'dueño'),
('8901234', '8901234', 'dueño'),
('8901235', '8901235', 'dueño'),
('9012345', '9012345', 'dueño'),
('9204567', '9204567', 'dueño'),
('9876543', '9876543', 'dueño'),
('9904567', '9904567', 'dueño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `zonas`
--

CREATE TABLE `zonas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `distrito` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `zonas`
--

INSERT INTO `zonas` (`id`, `nombre`, `distrito`) VALUES
(1, 'San Miguel', 'I'),
(2, 'Sopocachi', 'I'),
(3, 'La Llamita', 'I'),
(4, 'El Tejar', 'I'),
(5, 'Achumani', 'I'),
(6, 'Villa Fatima', 'II'),
(7, 'San Antonio', 'II'),
(8, 'Pura Pura', 'II'),
(9, 'Villa Adela', 'II'),
(10, 'La Paz', 'II'),
(11, 'Villa Ingenio', 'III'),
(12, 'Villa El Carmen', 'III'),
(13, 'Ciudadela Ferroviaria', 'III'),
(14, 'Los Lotes', 'III'),
(15, 'La Asunta', 'III'),
(16, 'San Antonio', 'IV'),
(17, 'Achachicala', 'IV'),
(18, 'Llojeta', 'IV'),
(19, 'Río Seco', 'IV'),
(20, 'San Juan', 'IV'),
(21, 'Calacoto', 'V'),
(22, 'La Florida', 'V'),
(23, 'Obrajes', 'V'),
(24, 'San Jorge', 'V'),
(25, 'La Presentación', 'V'),
(26, 'Mallasa', 'VI'),
(27, 'La Paz', 'VI'),
(28, 'Santa Rosa', 'VI'),
(29, 'San Juan de la Flores', 'VI'),
(30, 'La Batea', 'VI'),
(31, 'San Pedro', 'VII'),
(32, 'Miraflores', 'VII'),
(33, 'Villa de la Paz', 'VII'),
(34, 'El Prado', 'VII'),
(35, '16 de Julio', 'VII'),
(36, 'Hampaturi', 'VIII'),
(37, 'San Juan del Río', 'VIII'),
(38, 'El Choro', 'VIII'),
(39, 'Chacaltaya', 'VIII'),
(40, 'Patacamaya', 'VIII'),
(41, 'Zongo', 'IX'),
(42, 'Kallutaca', 'IX'),
(43, 'Pahuachi', 'IX'),
(44, 'Laja', 'IX'),
(45, 'Achica Arriba', 'IX');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `catastro`
--
ALTER TABLE `catastro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `zonas`
--
ALTER TABLE `zonas`
  ADD PRIMARY KEY (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
