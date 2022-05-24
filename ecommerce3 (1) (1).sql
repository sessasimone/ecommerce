-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2022 alle 08:18
-- Versione del server: 10.4.6-MariaDB
-- Versione PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce3`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `ecommercearticoli`
--

CREATE TABLE `ecommercearticoli` (
  `Codice` int(11) NOT NULL,
  `Titolo` varchar(32) NOT NULL,
  `Autore` varchar(32) NOT NULL,
  `Marca` varchar(32) NOT NULL,
  `Prezzo` float NOT NULL,
  `Descrizione` text NOT NULL,
  `Quantita` int(11) NOT NULL,
  `IDCategoria` int(11) NOT NULL,
  `DataAggiunta` date NOT NULL,
  `IMG` text NOT NULL,
  `Video` varchar(100) NOT NULL,
  `DataUp` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ecommercearticoli`
--

INSERT INTO `ecommercearticoli` (`Codice`, `Titolo`, `Autore`, `Marca`, `Prezzo`, `Descrizione`, `Quantita`, `IDCategoria`, `DataAggiunta`, `IMG`, `Video`, `DataUp`) VALUES
(8, 'Playstation 5', 'Playstation', 'Sony', 399.99, 'console bella', 10218, 1, '2022-04-20', 'uploads/ps5.jpg', 'https://www.youtube.com/embed/RkC0l4iekYo', NULL),
(12, 'Film: Pirati dei caraibi', 'Amazon', 'Marca', 59.99, 'film pirati dei caraibi edizione limitata', 510, 2, '2022-04-21', 'uploads/pdc.jpg', 'https://www.youtube.com/embed/QZZirgl4lm8', NULL),
(13, 'Manga Naruto vol 1', 'Masashi Kishimoto', 'Shonen Jump', 4.99, 'primo capitolo del famosissimo manga naruto', 100, 4, '2022-04-27', 'uploads/Naruto1.jpg', '', NULL),
(14, 'Mouse Logitech', 'Logitech INC', 'Logitech', 39.99, 'mouse logitech di ultima generazione ', 100, 2, '2022-04-27', 'uploads/61mpMH5TzkL._AC_SY450_.jpg', '', NULL),
(15, 'Dead by Daylight special edition', 'BHVR', 'Playstation', 14.99, 'gioco migliore di tutti i tempi', 110, 1, '2022-04-27', 'uploads/3max.jpg', 'https://www.youtube.com/embed/JGhIXLO3ul8', NULL);

-- --------------------------------------------------------

--
-- Struttura della tabella `ecommercecarrelli`
--

CREATE TABLE `ecommercecarrelli` (
  `ID` int(11) NOT NULL,
  `Datac` date NOT NULL,
  `IDUtente` int(11) DEFAULT NULL,
  `Effettuato` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ecommercecarrelli`
--

INSERT INTO `ecommercecarrelli` (`ID`, `Datac`, `IDUtente`, `Effettuato`) VALUES
(2461, '0000-00-00', 4, 0),
(2462, '0000-00-00', 1, 0),
(2473, '0000-00-00', NULL, 0),
(2474, '0000-00-00', NULL, 0),
(2478, '2022-05-10', 5, 1),
(2481, '2022-05-11', 7, 0),
(2485, '2022-05-18', 5, 0),
(2486, '2022-05-18', 10, 0);

-- --------------------------------------------------------

--
-- Struttura della tabella `ecommercecategoria`
--

CREATE TABLE `ecommercecategoria` (
  `ID` int(11) NOT NULL,
  `Nome` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ecommercecategoria`
--

INSERT INTO `ecommercecategoria` (`ID`, `Nome`) VALUES
(1, 'Videogiochi'),
(2, 'Informatica'),
(3, 'Abbigliamento'),
(4, 'Libri'),
(5, 'Altro');

-- --------------------------------------------------------

--
-- Struttura della tabella `ecommercecommento`
--

CREATE TABLE `ecommercecommento` (
  `IDcom` int(11) NOT NULL,
  `Testo` text NOT NULL,
  `Voto` float NOT NULL,
  `IDArticolo` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ecommercecommento`
--

INSERT INTO `ecommercecommento` (`IDcom`, `Testo`, `Voto`, `IDArticolo`, `IDUtente`) VALUES
(14, 'dd', 0, 12, 1),
(23, 'sss', 4, 8, 1),
(24, 'dd', 4, 12, 5),
(25, 'approvo con la descrizione(che ho messo io)', 5, 15, 5);

-- --------------------------------------------------------

--
-- Struttura della tabella `ecommercecontiene`
--

CREATE TABLE `ecommercecontiene` (
  `QuantitaContiene` int(11) NOT NULL,
  `Commento` text DEFAULT NULL,
  `IDArticolo` int(11) NOT NULL,
  `IDCarrello` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dump dei dati per la tabella `ecommercecontiene`
--

INSERT INTO `ecommercecontiene` (`QuantitaContiene`, `Commento`, `IDArticolo`, `IDCarrello`) VALUES
(1, NULL, 13, 2474),
(1, NULL, 13, 2486),
(1, NULL, 15, 2474),
(1, NULL, 15, 2486);

-- --------------------------------------------------------

--
-- Struttura della tabella `ecommerceordini`
--

CREATE TABLE `ecommerceordini` (
  `ID` int(11) NOT NULL,
  `DataO` date NOT NULL,
  `Nome` varchar(32) NOT NULL,
  `Cognome` varchar(32) NOT NULL,
  `Indirizzo` varchar(32) NOT NULL,
  `Citta` varchar(32) NOT NULL,
  `Paese` varchar(32) NOT NULL,
  `CAP` varchar(5) NOT NULL,
  `NTel` varchar(10) NOT NULL,
  `Descr` text NOT NULL,
  `IDCarrello` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ecommerceordini`
--

INSERT INTO `ecommerceordini` (`ID`, `DataO`, `Nome`, `Cognome`, `Indirizzo`, `Citta`, `Paese`, `CAP`, `NTel`, `Descr`, `IDCarrello`) VALUES
(5, '2022-05-11', 'Gabriele', 'Bonuglia', 'Via qualcosa 12', 'Lurago erba', 'Italia', '22040', '3349858201', 'voglio il pacco regalo', 2482),
(6, '2022-05-18', 'Gabriele', 'Bonuglia', 'Via qualcosa 12', 'Lurago erba', 'Italia', '22040', '3349858201', 'state zitti tutti', 2478);

-- --------------------------------------------------------

--
-- Struttura della tabella `ecommerceutenti`
--

CREATE TABLE `ecommerceutenti` (
  `Nome` varchar(32) NOT NULL,
  `Cognome` varchar(32) NOT NULL,
  `Admin` int(11) NOT NULL DEFAULT 0,
  `Password` varchar(32) NOT NULL,
  `Email` varchar(32) NOT NULL,
  `DataNascita` date NOT NULL,
  `ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `ecommerceutenti`
--

INSERT INTO `ecommerceutenti` (`Nome`, `Cognome`, `Admin`, `Password`, `Email`, `DataNascita`, `ID`) VALUES
('Gabriele', 'Bonuglia', 0, '6e6bc4e49dd477ebc98ef4046c067b5f', 'gabriele.bonuglia@gmail.com', '2022-04-12', 1),
('Giovanni', 'Bonuglia', 0, '6e6bc4e49dd477ebc98ef4046c067b5f', 'g.a.antonietta@alice.it', '2022-04-19', 2),
('Anna', 'Pascoli', 0, '39f119842ebe582f049160f44bcd99f4', 'gabrieletwitch.bonuglia@gmail.co', '2022-04-15', 3),
('Luigi', 'Mario', 0, '6e6bc4e49dd477ebc98ef4046c067b5f', 'marioluigi@gmail.com', '0000-00-00', 4),
('re', 'admin', 1, '21232f297a57a5a743894a0e4a801fc3', 'admin@gmail.com', '2022-04-13', 5),
('al forno', 'pasta', 0, '6e6bc4e49dd477ebc98ef4046c067b5f', 'pf@gmail.com', '2017-06-04', 6),
('el', 'num', 0, '7b8b965ad4bca0e41ab51de7b31363a1', 'n@n.com', '2022-05-12', 7),
('pepe', 'michele', 0, 'b2f5ff47436671b6e533d8dc3614845d', 'michele.pepe@gmail.com', '0000-00-00', 10);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `ecommercearticoli`
--
ALTER TABLE `ecommercearticoli`
  ADD PRIMARY KEY (`Codice`),
  ADD KEY `CategoriaArticolo` (`IDCategoria`);

--
-- Indici per le tabelle `ecommercecarrelli`
--
ALTER TABLE `ecommercecarrelli`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `CarrelloUtente` (`IDUtente`);

--
-- Indici per le tabelle `ecommercecategoria`
--
ALTER TABLE `ecommercecategoria`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `ecommercecommento`
--
ALTER TABLE `ecommercecommento`
  ADD PRIMARY KEY (`IDcom`),
  ADD KEY `CommentoArticolo` (`IDArticolo`),
  ADD KEY `CommentoUtente` (`IDUtente`);

--
-- Indici per le tabelle `ecommercecontiene`
--
ALTER TABLE `ecommercecontiene`
  ADD PRIMARY KEY (`IDArticolo`,`IDCarrello`),
  ADD KEY `CarrelloAcquisto` (`IDCarrello`);

--
-- Indici per le tabelle `ecommerceordini`
--
ALTER TABLE `ecommerceordini`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `OrdineCarrello` (`IDCarrello`);

--
-- Indici per le tabelle `ecommerceutenti`
--
ALTER TABLE `ecommerceutenti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `ecommercearticoli`
--
ALTER TABLE `ecommercearticoli`
  MODIFY `Codice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT per la tabella `ecommercecarrelli`
--
ALTER TABLE `ecommercecarrelli`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2487;

--
-- AUTO_INCREMENT per la tabella `ecommercecategoria`
--
ALTER TABLE `ecommercecategoria`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `ecommercecommento`
--
ALTER TABLE `ecommercecommento`
  MODIFY `IDcom` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT per la tabella `ecommerceordini`
--
ALTER TABLE `ecommerceordini`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `ecommerceutenti`
--
ALTER TABLE `ecommerceutenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `ecommercearticoli`
--
ALTER TABLE `ecommercearticoli`
  ADD CONSTRAINT `CategoriaArticolo` FOREIGN KEY (`IDCategoria`) REFERENCES `ecommercecategoria` (`ID`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `ecommercecarrelli`
--
ALTER TABLE `ecommercecarrelli`
  ADD CONSTRAINT `CarrelloUtente` FOREIGN KEY (`IDUtente`) REFERENCES `ecommerceutenti` (`ID`) ON UPDATE CASCADE;

--
-- Limiti per la tabella `ecommercecommento`
--
ALTER TABLE `ecommercecommento`
  ADD CONSTRAINT `CommentoArticolo` FOREIGN KEY (`IDArticolo`) REFERENCES `ecommercearticoli` (`Codice`),
  ADD CONSTRAINT `CommentoUtente` FOREIGN KEY (`IDUtente`) REFERENCES `ecommerceutenti` (`ID`);

--
-- Limiti per la tabella `ecommercecontiene`
--
ALTER TABLE `ecommercecontiene`
  ADD CONSTRAINT `ArticoloAcquisto` FOREIGN KEY (`IDArticolo`) REFERENCES `ecommercearticoli` (`Codice`),
  ADD CONSTRAINT `CarrelloAcquisto` FOREIGN KEY (`IDCarrello`) REFERENCES `ecommercecarrelli` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
