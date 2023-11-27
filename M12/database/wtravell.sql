-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-11-2023 a las 19:48:14
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
  `Preu` int(5) NOT NULL,
  `Continent_ID` int(1) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `TestContinent` (`Continent_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `ciutats`
--

INSERT INTO `ciutats` (`ID`, `Ciutat`, `Preu`, `Continent_ID`) VALUES
(1, 'Barcelona', 274, 2),
(2, 'París', 330, 2),
(3, 'Berlín', 420, 2),
(4, 'Marràqueix', 120, 4),
(5, 'El Caire', 230, 4),
(6, 'Ciutat del Cap', 90, 4),
(7, 'Los Angeles', 470, 1),
(8, 'Cancún', 400, 1),
(9, 'Toronto', 380, 1),
(10, 'Istanbul', 220, 3),
(11, 'Tòquio', 225, 3),
(12, 'Bangkok', 165, 3),
(13, 'Auckland', 110, 5),
(14, 'Sídney', 148, 5),
(15, 'Melbourne', 97, 5);

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

--
-- Volcado de datos para la tabla `client`
--

INSERT INTO `client` (`nom`, `email`, `telefon`, `direccio`, `nif`) VALUES
('David', 'd.buesa@sapalomera.cat', '111111111', 'david payaso', '39987652A'),
('Ayman', 'ayman.zekkari2@gmail.com', '691717544', 'C/Josep Carner 5 3/2', '54810851B'),
('Mark', 'a.sbay@sapalomera.cat', '656671679', 'C/Josep Carner 5 3/2', '54810851C'),
('Tete', 'a.sbay@sapalomera.cat', '545454544', 'C/Josep Carner 5 3/2', '54810851F'),
('Atika', 'ayman.zekkari@gmail.com', '647835192', 'C/Josep Carner 5 3/2', '54810851Q');

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
  `ID` varchar(10) NOT NULL,
  `datareserva` text NOT NULL,
  `preu` text NOT NULL,
  `Continent` varchar(20) NOT NULL,
  `qclients` int(11) NOT NULL,
  `Ciutat` varchar(20) NOT NULL,
  `DNI` varchar(20) NOT NULL,
  PRIMARY KEY (`ID`),
  UNIQUE KEY `ID` (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`ID`, `datareserva`, `preu`, `Continent`, `qclients`, `Ciutat`, `DNI`) VALUES
('00000', '2023-12-09', '300,00 €', 'Europa', 1, 'Barcelona', '54810851B'),
('00001', '2023-12-02', '400,00 €', 'Asia', 1, 'Istanbul', '54810851C'),
('00002', '2023-11-27', '450,00 €', 'Europa', 1, 'Berlín', '54810851B');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciutats`
--
ALTER TABLE `ciutats`
  ADD CONSTRAINT `TestContinent` FOREIGN KEY (`Continent_ID`) REFERENCES `continents` (`ID`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `DNI` FOREIGN KEY (`DNI`) REFERENCES `client` (`nif`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
