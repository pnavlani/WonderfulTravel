-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2023 a las 16:05:28
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
-- Base de datos: `wtravell`
--
CREATE DATABASE IF NOT EXISTS `wtravell` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `wtravell`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciutats`
--

DROP TABLE IF EXISTS `ciutats`;
CREATE TABLE IF NOT EXISTS `ciutats` (
  `ID` int(1) NOT NULL AUTO_INCREMENT,
  `Ciutat` varchar(20) NOT NULL,
  `Continent_ID` int(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `TestContinent` (`Continent_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciutats`
--

INSERT INTO `ciutats` (`ID`, `Ciutat`, `Continent_ID`) VALUES
(1, 'Barcelona', 2),
(2, 'París', 2),
(3, 'Berlín', 2),
(4, 'Marràqueix', 4),
(5, 'El Caire', 4),
(6, 'Ciutat del Cap', 4),
(7, 'Los Angeles', 1),
(8, 'Cancún', 1),
(9, 'Toronto', 1),
(10, 'Istanbul', 3),
(11, 'Tòquio', 3),
(12, 'Bangkok', 3),
(13, 'Auckland', 5),
(14, 'Sídney', 5),
(15, 'Melbourne', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `client`
--

DROP TABLE IF EXISTS `client`;
CREATE TABLE IF NOT EXISTS `client` (
  `nom` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telefon` varchar(9) NOT NULL,
  `direccio` varchar(50) NOT NULL,
  `nif` varchar(9) NOT NULL,
  PRIMARY KEY (`nif`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `continents`
--

DROP TABLE IF EXISTS `continents`;
CREATE TABLE IF NOT EXISTS `continents` (
  `ID` int(1) NOT NULL AUTO_INCREMENT,
  `Continent` varchar(15) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `continents`
--

INSERT INTO `continents` (`ID`, `Continent`) VALUES
(1, 'Amèrica'),
(2, 'Europa'),
(3, 'Àsia'),
(4, 'Àfrica'),
(5, 'Oceania');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

DROP TABLE IF EXISTS `reservas`;
CREATE TABLE IF NOT EXISTS `reservas` (
  `ID` smallint(5) UNSIGNED NOT NULL,
  `datareserva` date NOT NULL,
  `preu` int(11) NOT NULL,
  `preudesc` int(11) NOT NULL,
  `qclients` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciutats`
--
ALTER TABLE `ciutats`
  ADD CONSTRAINT `TestContinent` FOREIGN KEY (`Continent_ID`) REFERENCES `continents` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
