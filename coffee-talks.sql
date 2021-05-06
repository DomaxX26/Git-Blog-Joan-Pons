-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql-server
-- Temps de generació: 27-04-2021 a les 19:22:32
-- Versió del servidor: 8.0.19
-- Versió de PHP: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de dades: `coffee-talks`
--
CREATE DATABASE IF NOT EXISTS `coffee-talks` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `coffee-talks`;

-- --------------------------------------------------------

--
-- Estructura de la taula `article`
--

CREATE TABLE `article` (
  `codart` int NOT NULL,
  `titart` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `bodyart` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `datart` datetime DEFAULT NULL,
  `codcat` int DEFAULT NULL,
  `codusu` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Bolcament de dades per a la taula `article`
--

INSERT INTO `article` (`codart`, `titart`, `bodyart`, `datart`, `codcat`, `codusu`) VALUES
(1, 'Còm utilitzar el Notepad', 'Si vols utilitzar el programa Notepad ...', '2020-05-18 18:28:00', 2, 4),
(2, 'Virus en Linux', 'Deuries instal·lar un antivirus en Linux ...', '2020-05-28 12:03:00', 1, 1),
(3, 'Desinstal·la programes en Android', 'No és difícil treballar en Android ...', '2020-06-01 09:25:00', 4, 1),
(4, 'Actualització de Windows', 'És molt important tenir Windows ...', '2020-06-05 16:45:00', 2, 2),
(5, 'Apaga el router', 'Per què no apagues el router ...', '2020-06-21 09:30:00', 5, 4),
(6, 'Configura el Safari', 'Si tens un Mac ...', '2020-06-25 08:10:00', 3, 1),
(7, 'Howto Apache', 'Configura un servidor web ...', '2020-07-07 17:30:00', 5, 5),
(8, 'Gnome o KDE', 'Tria el millor escriptori ...', '2020-07-15 09:00:00', 1, 5),
(9, 'Configura la Wifi', 'Avuí en dia estem connectats ...', '2020-07-20 20:25:00', 5, 1),
(10, 'Howto Bash', 'Si utilitzes una consola ...', '2020-07-30 11:15:00', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de la taula `categoria`
--

CREATE TABLE `categoria` (
  `codcat` int NOT NULL,
  `nomcat` varchar(15) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Bolcament de dades per a la taula `categoria`
--

INSERT INTO `categoria` (`codcat`, `nomcat`) VALUES
(1, 'GNU Linux'),
(2, 'MS Windows'),
(3, 'Mac OS'),
(4, 'Android'),
(5, 'Networking');

-- --------------------------------------------------------

--
-- Estructura de la taula `comentari`
--

CREATE TABLE `comentari` (
  `codcom` int NOT NULL,
  `titcom` varchar(50) COLLATE utf8_spanish2_ci NOT NULL,
  `bodycom` varchar(150) COLLATE utf8_spanish2_ci NOT NULL,
  `datcom` datetime DEFAULT NULL,
  `codart` int DEFAULT NULL,
  `codusu` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

-- --------------------------------------------------------

--
-- Estructura de la taula `usuari`
--

CREATE TABLE `usuari` (
  `codusu` int NOT NULL,
  `nomusu` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `userusu` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `passusu` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  `emailusu` varchar(255) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Bolcament de dades per a la taula `usuari`
--

INSERT INTO `usuari` (`codusu`, `nomusu`, `userusu`, `passusu`, `emailusu`) VALUES
(1, 'Admin', 'admin', 'admin', 'admin@example.org'),
(2, 'Antonio', 'ant', 'ant123', 'ant@server.com'),
(3, 'Ana', 'ana', 'ana123', 'ana@server.com'),
(4, 'Jaume', 'jau', 'jau123', 'jau@server.com'),
(5, 'Paula', 'pau', 'pau123', 'pau@server.com'),
(6, 'Maria', 'mar', 'mar123', 'mar@server.com');

--
-- Índexs per a les taules bolcades
--

--
-- Índexs per a la taula `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`codart`),
  ADD KEY `codcat` (`codcat`),
  ADD KEY `codusu` (`codusu`);

--
-- Índexs per a la taula `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`codcat`);

--
-- Índexs per a la taula `comentari`
--
ALTER TABLE `comentari`
  ADD PRIMARY KEY (`codcom`),
  ADD KEY `codart` (`codart`),
  ADD KEY `codusu` (`codusu`);

--
-- Índexs per a la taula `usuari`
--
ALTER TABLE `usuari`
  ADD PRIMARY KEY (`codusu`);

--
-- AUTO_INCREMENT per les taules bolcades
--

--
-- AUTO_INCREMENT per la taula `article`
--
ALTER TABLE `article`
  MODIFY `codart` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT per la taula `categoria`
--
ALTER TABLE `categoria`
  MODIFY `codcat` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la taula `comentari`
--
ALTER TABLE `comentari`
  MODIFY `codcom` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la taula `usuari`
--
ALTER TABLE `usuari`
  MODIFY `codusu` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restriccions per a les taules bolcades
--

--
-- Restriccions per a la taula `article`
--
ALTER TABLE `article`
  ADD CONSTRAINT `article_ibfk_1` FOREIGN KEY (`codcat`) REFERENCES `categoria` (`codcat`),
  ADD CONSTRAINT `article_ibfk_2` FOREIGN KEY (`codusu`) REFERENCES `usuari` (`codusu`);

--
-- Restriccions per a la taula `comentari`
--
ALTER TABLE `comentari`
  ADD CONSTRAINT `comentari_ibfk_1` FOREIGN KEY (`codart`) REFERENCES `article` (`codart`),
  ADD CONSTRAINT `comentari_ibfk_2` FOREIGN KEY (`codusu`) REFERENCES `usuari` (`codusu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
