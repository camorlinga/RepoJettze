-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-12-2017 a las 17:01:53
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `examenweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `credenciales`
--

CREATE TABLE `credenciales` (
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rol` text NOT NULL,
  `contraseña` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `credenciales`
--

INSERT INTO `credenciales` (`nombre`, `apellido`, `email`, `rol`, `contraseña`) VALUES
('Jettze', 'Nogueda', 'ing.jettze@hotmail.com', 'Usuario', 'Nogueda9');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registros`
--

CREATE TABLE `registros` (
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `rol` varchar(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `registros`
--

INSERT INTO `registros` (`nombre`, `apellido`, `email`, `rol`, `descripcion`) VALUES
('0', '0', '0', '0', 'Chidooo'),
('segundo ejemplo', 'Apellidos dos', 'ing.jettzenogueda@hotmail.com', 'Usuario', 'Mi pc no enciende, tiene rato que esta prendiendo solo la retroiluminaciÃ³n pero no se ven imagenes'),
('jujoij', 'oijojoij', 'otro@otro', 'usuario', ''),
('plmp', 'poopo', 'otro@otro', 'usuario', 'koikik'),
('oijoij', 'oijoij', 'oijoi@oijoijio', 'usuario', 'oijoijio'),
('Jettzeejemplo', 'apellidoejemplo', 'otro_registr@hotmail.com', 'usuario', 'Esteejemplo'),
('', '', '', 'usuario', ''),
('ijpj', 'pijp', 'scaxs@gkpo', 'usuario', 'ijpij'),
('', '', '', 'usuario', ''),
('', '', '', 'usuario', ''),
('Jettze', 'Nogueda', 'ing.jettzenogueda@hotmail.com', 'Usuario', 'algo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `credenciales`
--
ALTER TABLE `credenciales`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
