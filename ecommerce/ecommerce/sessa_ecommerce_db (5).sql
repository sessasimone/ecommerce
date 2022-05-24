-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 24, 2022 alle 08:26
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
-- Database: `sessa_ecommerce_db`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `articoli`
--

CREATE TABLE `articoli` (
  `ID` int(11) NOT NULL,
  `immagine` varchar(500) NOT NULL,
  `nomeArticolo` varchar(25) NOT NULL,
  `prezzo` float NOT NULL,
  `giacenza` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `articoli`
--

INSERT INTO `articoli` (`ID`, `immagine`, `nomeArticolo`, `prezzo`, `giacenza`) VALUES
(2, 'img/613vLmkDsJL._AC_SL1500_ (1).jpg', 'iPhone 13 PRO azzurro', 999, 50),
(3, 'img/LD0005897388_1.jpg', 'cover iPhone 13 PRO', 25, 110),
(5, 'img/6000203200042.jpg', 'TV 42\" samsung', 400, 32),
(6, 'img/PHI8710103761143.jpg', 'ra', 5, 44);

-- --------------------------------------------------------

--
-- Struttura della tabella `carrello`
--

CREATE TABLE `carrello` (
  `ID` int(11) NOT NULL,
  `IDUtente` int(11) DEFAULT NULL,
  `data` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `carrello`
--

INSERT INTO `carrello` (`ID`, `IDUtente`, `data`) VALUES
(7, 1, '0000-00-00');

-- --------------------------------------------------------

--
-- Struttura della tabella `commenti`
--

CREATE TABLE `commenti` (
  `ID` int(11) NOT NULL,
  `IDArticolo` int(11) NOT NULL,
  `commento` text NOT NULL,
  `stelline` int(5) NOT NULL,
  `IDUtente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `commenti`
--

INSERT INTO `commenti` (`ID`, `IDArticolo`, `commento`, `stelline`, `IDUtente`) VALUES
(1, 2, 'tiene molto caldo', 4, 1),
(2, 5, 'bel display', 5, 1),
(3, 3, 'molto gommosa', 4, 2),
(4, 3, 'bel display', 5, 2);

-- --------------------------------------------------------

--
-- Struttura della tabella `contiene`
--

CREATE TABLE `contiene` (
  `ID` int(11) NOT NULL,
  `IDCarrello` int(11) NOT NULL,
  `IDArticolo` int(11) NOT NULL,
  `quantita` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `contiene`
--

INSERT INTO `contiene` (`ID`, `IDCarrello`, `IDArticolo`, `quantita`) VALUES
(1, 7, 3, 1),
(4, 7, 5, 1),
(5, 7, 2, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `ordini`
--

CREATE TABLE `ordini` (
  `ID` int(11) NOT NULL,
  `IDUtente` int(11) NOT NULL,
  `cognome` varchar(15) NOT NULL,
  `nome` varchar(15) NOT NULL,
  `citta` varchar(15) NOT NULL,
  `indirizzo` varchar(30) NOT NULL,
  `num` int(11) NOT NULL,
  `CAP` int(7) NOT NULL,
  `data` datetime NOT NULL,
  `prezzoTotale` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struttura della tabella `prodottiordine`
--

CREATE TABLE `prodottiordine` (
  `ID` int(11) NOT NULL,
  `IDOrdine` int(11) NOT NULL,
  `IDArticolo` int(11) NOT NULL,
  `quantità` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `ID` int(11) NOT NULL,
  `nome` varchar(25) NOT NULL,
  `cognome` varchar(25) NOT NULL,
  `dataNascita` date NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`ID`, `nome`, `cognome`, `dataNascita`, `username`, `password`, `admin`) VALUES
(1, 'simone', 'sessa', '2003-10-19', 'sessasimone', '6e6bc4e49dd477ebc98ef4046c067b5f', 1),
(2, 'ciao', 'ciao', '1010-10-10', 'ciao', '6e6bc4e49dd477ebc98ef4046c067b5f', 0),
(3, 'kevin', 'sala tesciat 5CI CELL: 34', '2001-01-09', 'user1', 'a722c63db8ec8625af6cf71cb8c2d939', 0);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `articoli`
--
ALTER TABLE `articoli`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `carrello`
--
ALTER TABLE `carrello`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `IDUtente` (`IDUtente`);

--
-- Indici per le tabelle `commenti`
--
ALTER TABLE `commenti`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `v3` (`IDArticolo`),
  ADD KEY `v4` (`IDUtente`);

--
-- Indici per le tabelle `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`ID`);

--
-- Indici per le tabelle `ordini`
--
ALTER TABLE `ordini`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `v7` (`IDUtente`);

--
-- Indici per le tabelle `prodottiordine`
--
ALTER TABLE `prodottiordine`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `v5` (`IDArticolo`),
  ADD KEY `v6` (`IDOrdine`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `articoli`
--
ALTER TABLE `articoli`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `carrello`
--
ALTER TABLE `carrello`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT per la tabella `commenti`
--
ALTER TABLE `commenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `contiene`
--
ALTER TABLE `contiene`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT per la tabella `ordini`
--
ALTER TABLE `ordini`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `prodottiordine`
--
ALTER TABLE `prodottiordine`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `carrello`
--
ALTER TABLE `carrello`
  ADD CONSTRAINT `carrello_ibfk_1` FOREIGN KEY (`IDUtente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `commenti`
--
ALTER TABLE `commenti`
  ADD CONSTRAINT `v3` FOREIGN KEY (`IDArticolo`) REFERENCES `articoli` (`ID`),
  ADD CONSTRAINT `v4` FOREIGN KEY (`IDUtente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `ordini`
--
ALTER TABLE `ordini`
  ADD CONSTRAINT `v7` FOREIGN KEY (`IDUtente`) REFERENCES `utenti` (`ID`);

--
-- Limiti per la tabella `prodottiordine`
--
ALTER TABLE `prodottiordine`
  ADD CONSTRAINT `v5` FOREIGN KEY (`IDArticolo`) REFERENCES `articoli` (`ID`),
  ADD CONSTRAINT `v6` FOREIGN KEY (`IDOrdine`) REFERENCES `ordini` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
