-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Creato il: Giu 11, 2024 alle 04:40
-- Versione del server: 10.4.32-MariaDB
-- Versione PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sito_web`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articolo_tab`
--

CREATE TABLE `articolo_tab` (
  `ID_ARTICOLO` int(11) NOT NULL,
  `CODICE_ART` varchar(255) NOT NULL,
  `NOME_ARTICOLO` varchar(255) NOT NULL,
  `NOME_BRAND` varchar(255) NOT NULL,
  `MADE_IN` varchar(255) NOT NULL,
  `COMPOSIZIONE` varchar(255) NOT NULL,
  `TAGLIA` varchar(255) NOT NULL,
  `PREZZO_UNITARIO` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `articolo_tab`
--

INSERT INTO `articolo_tab` (`ID_ARTICOLO`, `CODICE_ART`, `NOME_ARTICOLO`, `NOME_BRAND`, `MADE_IN`, `COMPOSIZIONE`, `TAGLIA`, `PREZZO_UNITARIO`) VALUES
(2, '20002Z002', 'T-shirt shark', 'palm angels', 'china', 'cotone', 'M', 44.5),
(3, '20002Z003', 'T-shirt shark', 'palm angels', 'china', 'cotone', 'L', 44.5),
(4, '20002Z004', 'T-shirt teddy', 'dor bell', 'italy', 'cotone', 'S', 44.5),
(5, '20002Z005', 'T-shirt teddy', 'dor bell', 'italy', 'cotone', 'M', 44.5),
(6, '20002Z006', 'T-shirt teddy', 'dor bell', 'italy', 'cotone', 'L', 44.5),
(7, '20002Z007', 'Pantalone svasato', 'etro', 'filippine', 'cotone', '40', 70.9),
(8, '20002Z008', 'Pantalone svasato', 'etro', 'filippine', 'cotone', '41', 70.9),
(9, '20002Z009', 'Pantalone svasato', 'etro', 'filippine', 'cotone', '42', 70.9),
(10, '20002Z010', 'Pantalone svasato', 'etro', 'filippine', 'cotone', '43', 70.9),
(11, '20002Z011', 'Pantalone svasato', 'etro', 'filippine', 'cotone', '44', 70.9),
(12, '20002Z012', 'pantalone disco', 'etro', 'china', 'cotone', '40', 432.2),
(13, '20002Z013', 'pantalone disco', 'etro', 'china', 'cotone', '41', 432.2),
(14, '20002Z014', 'pantalone disco', 'etro', 'china', 'cotone', '42', 432.2),
(15, '20002Z015', 'pantalone disco', 'etro', 'china', 'cotone', '43', 432.2),
(16, '20002Z016', 'pantalone disco', 'etro', 'china', 'cotone', '44', 432.2),
(17, '20002Z017', 'top trendy', 'etro', 'filippine', 'cotone', 'S', 132.9),
(18, '20002Z018', 'top trendy', 'etro', 'filippine', 'cotone', 'M', 132.9),
(19, '20002Z019', 'top trendy', 'etro', 'filippine', 'cotone', 'L', 132.9),
(20, '20002Z020', 'short bently', 'etro', 'bangladesh', 'lana', '36', 150.8),
(21, '20002Z021', 'short bently', 'etro', 'bangladesh', 'lana', '37', 150.8),
(22, '20002Z022', 'short bently', 'etro', 'bangladesh', 'lana', '38', 150.8),
(23, '20002Z023', 'short bently', 'etro', 'bangladesh', 'lana', '40', 150.8),
(24, '20002Z024', 'short bently', 'etro', 'bangladesh', 'lana', '41', 150.8),
(25, '20002Z025', 'short bently', 'etro', 'bangladesh', 'lana', '42', 150.8),
(26, '20002Z026', 'short bugatti', 'etro', 'filippine', 'lana', '36', 150.8),
(27, '20002Z027', 'short bugatti', 'etro', 'filippine', 'lana', '37', 150.8),
(28, '20002Z028', 'short bugatti', 'etro', 'filippine', 'lana', '38', 150.8),
(29, '20002Z029', 'short mclaren', 'etro', 'china', 'lana', '40', 150.8),
(30, '20002Z030', 'short bugatti', 'etro', 'filippine', 'lana', '41', 150.8),
(31, '20002Z031', 'short bugatti', 'etro', 'filippine', 'lana', '42', 3),
(32, '20002Z032', 'short mclaren', 'etro', 'china', 'lana', '36', 150.8),
(33, '20002Z033', 'short mclaren', 'etro', 'china', 'lana', '37', 150.8),
(34, '20002Z034', 'short mclaren', 'etro', 'china', 'lana', '38', 150.8),
(35, '20002Z035', 'short mclaren', 'etro', 'china', 'lana', '40', 150.8),
(36, '20002Z036', 'short mclaren', 'etro', 'china', 'lana', '41', 150.8),
(37, '20002Z037', 'short mclaren', 'etro', 'china', 'lana', '42', 150.8),
(38, '20002Z038', 'giacca odc', '44 label', 'bangladesh', 'materiale sintetico', 'XS', 700.99),
(39, '20002Z039', 'giacca odc', '44 label', 'bangladesh', 'materiale sintetico', 'S', 700.99),
(40, '20002Z040', 'giacca odc', '44 label', 'bangladesh', 'materiale sintetico', 'M', 700.99),
(41, '20002Z041', 'giacca odc', '44 label', 'bangladesh', 'materiale sintetico', 'L', 700.99),
(42, '20002Z042', 'giacca odc', '44 label', 'bangladesh', 'materiale sintetico', 'XL', 700.99),
(43, '20002Z043', 'completo elegante', 'tagliatore', 'filippine', 'materiale sintetico', 'S', 1220.44),
(44, '20002Z044', 'completo elegante', 'tagliatore', 'filippine', 'materiale sintetico', 'M', 1220.44),
(45, '20002Z045', 'completo elegante', 'tagliatore', 'filippine', 'materiale sintetico', 'L', 1220.44),
(46, '20002Z046', 't-shirt discordia', '44 label', 'bangladesh', 'cotone', 'S', 32.99),
(47, '20002Z047', 't-shirt discordia', '44 label', 'bangladesh', 'cotone', 'M', 32.99),
(48, '20002Z048', 't-shirt discordia', '44 label', 'bangladesh', 'cotone', 'L', 32.99),
(49, '20002Z049', 'leggins crystel', 'mm6', 'repubblica cieca', 'materiale sintetico', '24', 160.6),
(50, '20002Z050', 'leggins crystel', 'mm6', 'repubblica cieca', 'materiale sintetico', '35', 160.6),
(51, '20002Z051', 'sneakers dunk', 'nike', 'repubblica cieca', 'pelle', '40', 120.6),
(52, '20002Z052', 'sneakers dunk', 'nike', 'repubblica cieca', 'pelle', '41', 120.6),
(53, '20002Z053', 'sneakers dunk', 'nike', 'repubblica cieca', 'pelle', '42', 120.6),
(54, '20002Z054', 'sneakers dunk', 'nike', 'repubblica cieca', 'pelle', '43', 120.6),
(55, '20002Z055', 'sneakers dunk', 'nike', 'repubblica cieca', 'pelle', '44', 120.6),
(56, '20002Z056', 'sneakers 550', 'new balance', 'filippine', 'pelle', '40', 170.7),
(57, '20002Z057', 'sneakers 550', 'new balance', 'filippine', 'pelle', '41', 170.7),
(58, '20002Z058', 'sneakers 550', 'new balance', 'filippine', 'pelle', '42', 170.7),
(59, '20002Z059', 'sneakers 550', 'new balance', 'filippine', 'pelle', '43', 170.7),
(60, '20002Z060', 'sneakers 550', 'new balance', 'filippine', 'pelle', '44', 170.7),
(61, '20002Z061', 'sneakers master', 'wushu', 'repubblica cieca', 'pelle', '40', 190.55),
(62, '20002Z062', 'sneakers master', 'wushu', 'repubblica cieca', 'pelle', '41', 190.55),
(63, '20002Z063', 'sneakers master', 'wushu', 'repubblica cieca', 'pelle', '42', 190.55),
(64, '20002Z064', 'sneakers master', 'wushu', 'repubblica cieca', 'pelle', '43', 190.55),
(65, '20002Z065', 'sneakers master', 'wushu', 'repubblica cieca', 'pelle', '44', 190.55),
(66, '20002Z066', 'stivali trakking', 'roa', 'china', 'pelle', '40', 230.3),
(67, '20002Z067', 'stivali trakking', 'roa', 'china', 'pelle', '41', 230.3),
(68, '20002Z068', 'stivali trakking', 'roa', 'china', 'pelle', '42', 230.3),
(69, '20002Z069', 'stivali trakking', 'roa', 'china', 'pelle', '43', 230.3),
(70, '20002Z070', 'stivali trakking', 'roa', 'china', 'pelle', '44', 230.3),
(71, '20002Z071', 'gonna midi tek', 'off-white', 'repubblica cieca', 'mohair', 'M', 500.4),
(72, '20002Z072', 'abito sofia', 'marni', 'filippine', 'mohair', 'S', 340.1),
(73, '20002Z073', 'abito elene', 'marni', 'repubblica cieca', 'mohair', 'S', 320.3),
(74, '20002Z074', 'slip greca', 'versace', 'italy', 'seta/cotone', 'UNI', 290.6),
(75, '20002Z075', 'boxer greca', 'versace', 'italy', 'seta/cotone', 'UNI', 290.6),
(76, '20002Z076', 'bracciale medusa', 'versace', 'italy', 'metallo', 'UNI', 360.99),
(77, '20002Z077', 'collana medusa', 'versace', 'italy', 'metallo', 'UNI', 490.8),
(78, '20002Z078', 'abito di seta', 'tom ford', 'china', 'seta', 'M', 1300.12),
(79, '20002Z079', 'cappellino shark', 'palm angels', 'repubblica cieca', 'cotone', 'UNI', 120.39),
(80, '20002Z080', 'pochette 001', 'sprayground', 'repubblica cieca', 'pelle', 'UNI', 100.99),
(81, '20002Z081', 'zaino 001', 'sprayground', 'china', 'pelle', 'UNI', 140.9),
(82, '20002Z082', 't-shirt action figure', 'sprayground', 'repubblica cieca', 'cotone', 'M', 60.9),
(83, '20002Z083', 'jeans demin', 'dickies', 'china', 'cotone', 'S', 450.9),
(84, '20002Z084', 'giacca demin', 'dickies', '', 'cotone', 'L', 600.9);

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello_tab`
--

CREATE TABLE `carrello_tab` (
  `ID_CLIENTE` varchar(255) NOT NULL,
  `ID_ARTICOLO` varchar(255) NOT NULL,
  `NOME_ARTICOLO` varchar(255) NOT NULL,
  `PREZZO_UNITARIO` double NOT NULL,
  `QUANTITA` int(11) NOT NULL,
  `ID_CARRELLO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `carrello_tab`
--

INSERT INTO `carrello_tab` (`ID_CLIENTE`, `ID_ARTICOLO`, `NOME_ARTICOLO`, `PREZZO_UNITARIO`, `QUANTITA`, `ID_CARRELLO`) VALUES
(' CLI0001', ' 3', ' T-shirt shark', 44.5, 1, 1),
(' CLI0001', ' 2', ' T-shirt shark', 44.5, 1, 2),
(' CLI0001', ' 2', ' T-shirt shark', 44.5, 1, 3),
(' CLI0001', ' 2', ' T-shirt shark', 44.5, 1, 4),
(' CLI0001', ' 2', ' T-shirt shark', 44.5, 1, 5),
(' CLI0001', ' 3', ' T-shirt shark', 44.5, 1, 6),
(' CLI0001', ' 3', ' T-shirt shark', 44.5, 1, 7),
('CLI0001', '2', 'T-shirt shark', 44.5, 1, 30),
('CLI0001', '2', 'T-shirt shark', 44.5, 1, 31),
('CLI0001', '2', 'T-shirt shark', 44.5, 1, 32),
('CLI0001', '2', 'T-shirt shark', 44.5, 1, 33);

-- --------------------------------------------------------

--
-- Struttura della tabella `utente_tab`
--

CREATE TABLE `utente_tab` (
  `ID_CLIENTE` varchar(255) NOT NULL,
  `C_F` varchar(255) NOT NULL,
  `NOME` varchar(255) NOT NULL,
  `COGNOME` varchar(255) NOT NULL,
  `EMAIL` varchar(255) NOT NULL,
  `USERNAME` varchar(255) NOT NULL,
  `PASSWORD` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dump dei dati per la tabella `utente_tab`
--

INSERT INTO `utente_tab` (`ID_CLIENTE`, `C_F`, `NOME`, `COGNOME`, `EMAIL`, `USERNAME`, `PASSWORD`) VALUES
('ID_CLIENTE', 'C_F', 'NOME', 'COGNOME', 'EMAIL', 'USERNAME', 'PASSWORD'),
('CLI0001', 'YUXJNV00E16E472O', 'John Veneth', 'Yu', 'yujohnveneth16@gmail.com', 'yujohnveneth16@gmail.com', '1234'),
('CLI0002', 'PPPBDA82B09E472S', 'BAUODO', 'PIPPO', 'PippoBaud@gmail.com', 'PippoBaud@gmail.com', '1234'),
('CLI0003', 'GRZMRA80T53E472P', 'MARIA', 'GRAZIA', 'MariaGrazia@gmail.com', 'MariaGrazia@gmail.com', '1234'),
('CLI0004', 'GRZSNT70D50E472L', 'ASUNTA', 'GRAZIELLA', 'asuntaGraGra@gmail.com', 'asuntaGraGra@gmail.com', '1234'),
('CLI0005', 'DVNLRD61A01F205G', 'LEONARDO', 'DA VINCI', 'leonardovinci@gmail.com', 'leonardovinci@gmail.com', '1234'),
('CLI0006', 'DCPLRD61A01H501T', 'LEONARDO', 'DI CAPRIO', 'leonardocapri@gmail.com', 'leonardocapri@gmail.com', '1234');

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articolo_tab`
--
ALTER TABLE `articolo_tab`
  ADD PRIMARY KEY (`ID_ARTICOLO`);

--
-- Indici per le tabelle `carrello_tab`
--
ALTER TABLE `carrello_tab`
  ADD PRIMARY KEY (`ID_CARRELLO`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articolo_tab`
--
ALTER TABLE `articolo_tab`
  MODIFY `ID_ARTICOLO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT per la tabella `carrello_tab`
--
ALTER TABLE `carrello_tab`
  MODIFY `ID_CARRELLO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
