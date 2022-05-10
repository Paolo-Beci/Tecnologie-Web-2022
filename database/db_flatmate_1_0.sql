-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Mag 10, 2022 alle 10:46
-- Versione del server: 10.4.22-MariaDB
-- Versione PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_flatmate_1.0`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `alloggio`
--

CREATE TABLE `alloggio` (
  `id_alloggio` int(10) NOT NULL,
  `descrizione` varchar(255) DEFAULT NULL,
  `utenze` int(4) DEFAULT NULL,
  `canone_affitto` int(4) NOT NULL,
  `periodo_locazione` int(2) NOT NULL CHECK (`periodo_locazione` in (6,9,12)),
  `genere` char(1) NOT NULL DEFAULT 'u' CHECK (`genere` in ('m','f','u')),
  `eta_minima` int(3) NOT NULL DEFAULT 18,
  `eta_massima` int(3) NOT NULL DEFAULT 100,
  `dimensione` int(4) DEFAULT NULL,
  `num_posti_letto_tot` int(2) DEFAULT NULL,
  `via` varchar(255) NOT NULL,
  `citta` varchar(255) NOT NULL,
  `num_civico` int(4) NOT NULL,
  `cap` char(5) NOT NULL,
  `interno` int(3) DEFAULT NULL,
  `piano` int(3) DEFAULT NULL,
  `data_inserimento_offerta` datetime NOT NULL,
  `tipologia` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `alloggio`
--

INSERT INTO `alloggio` (`id_alloggio`, `descrizione`, `utenze`, `canone_affitto`, `periodo_locazione`, `genere`, `eta_minima`, `eta_massima`, `dimensione`, `num_posti_letto_tot`, `via`, `citta`, `num_civico`, `cap`, `interno`, `piano`, `data_inserimento_offerta`, `tipologia`) VALUES
(1, 'Bellissimo appartamento arredato con nuovo mobilio', 80, 500, 12, 'u', 18, 35, 150, NULL, 'Via della Vittoria', 'Ancona', 43, '60123', 5, 2, '2022-04-02 12:00:00', 'Appartamento'),
(2, 'Bellissimo posto letto singolo arredato con nuovo mobilio', NULL, 200, 9, 'm', 18, 30, 30, 4, 'Via Cesare Battisti', 'Ancona', 11, '60123', 3, 1, '2022-04-10 17:35:00', 'Posto letto'),
(3, NULL, 60, 250, 6, 'f', 18, 30, NULL, 3, 'Via Vito Volterra', 'Ancona', 26, '60123', NULL, NULL, '2022-05-01 11:13:00', 'Posto letto');

-- --------------------------------------------------------

--
-- Struttura della tabella `appartamento`
--

CREATE TABLE `appartamento` (
  `id_appartamento` int(10) NOT NULL,
  `num_camere` int(2) DEFAULT NULL,
  `alloggio` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `appartamento`
--

INSERT INTO `appartamento` (`id_appartamento`, `num_camere`, `alloggio`) VALUES
(1, 5, 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `dati_personali`
--

CREATE TABLE `dati_personali` (
  `id_dati_personali` int(10) NOT NULL,
  `id_foto_profilo` int(10) DEFAULT NULL,
  `cellulare` char(10) DEFAULT NULL,
  `via` varchar(255) NOT NULL,
  `citta` varchar(255) NOT NULL,
  `num_civico` int(4) NOT NULL,
  `cap` char(5) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `cognome` varchar(255) NOT NULL,
  `data_nascita` datetime NOT NULL,
  `luogo_nascita` varchar(255) NOT NULL,
  `sesso` char(1) NOT NULL CHECK (`sesso` in ('m','f')),
  `mail` varchar(255) DEFAULT NULL,
  `codice_fiscale` char(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `dati_personali`
--

INSERT INTO `dati_personali` (`id_dati_personali`, `id_foto_profilo`, `cellulare`, `via`, `citta`, `num_civico`, `cap`, `nome`, `cognome`, `data_nascita`, `luogo_nascita`, `sesso`, `mail`, `codice_fiscale`) VALUES
(1, 1, '3256425968', 'Via brecce bianche', 'Ancona', 4, '60123', 'Paolo', 'Beci', '2000-07-22 00:00:01', 'Fabriano', 'm', 'paolo.beci@gmail.com', 'BCEPLA00L22D451H'),
(2, 2, NULL, 'Via brecce bianche', 'Ancona', 25, '60123', 'Giuseppe', 'Izzi', '2000-08-23 00:00:01', 'Vasto', 'm', 'izzi.g@gmail.com', 'SCCPRM10D08H501W'),
(3, NULL, '4568235971', 'Via brecce bianche', 'Ancona', 23, '60123', 'Domenico', 'La Porta', '0000-00-00 00:00:00', 'San Marco in Lamis', 'm', 'd.laporta@gmail.com', 'SCCPRM08S24H501C'),
(4, 3, '3225874691', 'Via brecce bianche', 'Ancona', 45, '60123', 'Emanuele', 'Frisi', '0000-00-00 00:00:00', 'Foggia', 'm', NULL, 'FRSMNL00E11D643V');

-- --------------------------------------------------------

--
-- Struttura della tabella `disponibilita`
--

CREATE TABLE `disponibilita` (
  `alloggio` int(10) NOT NULL,
  `servizio` varchar(255) NOT NULL,
  `quantita` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `disponibilita`
--

INSERT INTO `disponibilita` (`alloggio`, `servizio`, `quantita`) VALUES
(1, 'Bagno', 1),
(1, 'Cucina', 1),
(1, 'Ripostiglio', 1),
(2, 'Bagno', 2),
(2, 'Cucina', 1),
(2, 'Giardino', 1),
(3, 'Bagno', 2),
(3, 'Cucina', 1),
(3, 'Garage', 1);

-- --------------------------------------------------------

--
-- Struttura della tabella `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(10) NOT NULL,
  `domanda` varchar(255) NOT NULL,
  `risposta` varchar(255) NOT NULL,
  `target` varchar(21) NOT NULL CHECK (`target` in ('utente non registrato','locatore','locatario'))
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `faq`
--

INSERT INTO `faq` (`id_faq`, `domanda`, `risposta`, `target`) VALUES
(1, 'Come registrarsi?', 'Per registrarti puoi andare nella sezione login che trovi sulla pagina Home del sito. Per raggiungerla fai click sull\'icona in alto a sinistra', 'utente non registrato'),
(2, 'Come visualizzare dettagliatamente gli annunci?', 'Puoi visualizzare gli annunci solo dopo esserti registrato nel nostro sito. Puoi trovare la relativa sezione nella pagina home', 'utente non registrato'),
(3, 'Come inserire un annuncio?', 'Per inserire un annuncio fai click sul bottone inserisci annuncio sulla pagina della gestione alloggi', 'locatore'),
(4, 'Come rispondere ai messaggi?', 'Puoi rispondere ai messaggi nella sezione privata dell\'account. Verrai anche informato dell\'interesse da parte dei locatari al tuo annuncio', 'locatore'),
(5, 'Come contattare il locatore?', 'Nella pagina di dettaglio di ogni annuncio il locatario ha la possibilità di contattare il locatore per esprimere interesse o richiedere informazioni', 'locatario'),
(6, 'Come modificare i dati utente?', 'Puoi modificare i tuoi dati nella pagina privata del sito, sezione modifica account', 'locatario');

-- --------------------------------------------------------

--
-- Struttura della tabella `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(10) NOT NULL,
  `alloggio` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `foto`
--

INSERT INTO `foto` (`id_foto`, `alloggio`) VALUES
(1, 1),
(2, 1),
(3, 2),
(4, 2),
(5, 3),
(6, 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `interazione`
--

CREATE TABLE `interazione` (
  `utente` varchar(255) NOT NULL,
  `alloggio` int(10) NOT NULL,
  `data_interazione` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `interazione`
--

INSERT INTO `interazione` (`utente`, `alloggio`, `data_interazione`) VALUES
('dom_00', 2, '2022-04-27 14:00:00'),
('izzi_g', 1, '2022-04-13 12:35:00'),
('paolo_b', 1, '2022-04-02 12:00:00'),
('paolo_b', 2, '2022-04-10 17:35:00'),
('paolo_b', 3, '2022-05-01 11:13:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `messaggi`
--

CREATE TABLE `messaggi` (
  `mittente` varchar(255) NOT NULL,
  `destinatario` varchar(255) NOT NULL,
  `alloggio` int(10) NOT NULL,
  `data_invio` datetime NOT NULL,
  `messaggio` varchar(255) NOT NULL,
  `stato` bit(1) NOT NULL DEFAULT b'0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `messaggi`
--

INSERT INTO `messaggi` (`mittente`, `destinatario`, `alloggio`, `data_invio`, `messaggio`, `stato`) VALUES
('dom_00', 'paolo_b', 2, '2022-05-03 11:30:00', 'Ci possiamo accordare...', b'1'),
('izzi_g', 'paolo_b', 1, '2022-05-03 10:00:00', 'Ciao sarei interessato…', b'1'),
('paolo_b', 'dom_00', 2, '2022-05-03 12:30:00', 'Certo...', b'1'),
('paolo_b', 'izzi_g', 1, '2022-05-03 10:30:00', 'Ci possiamo accordare...', b'1');

-- --------------------------------------------------------

--
-- Struttura della tabella `modifica`
--

CREATE TABLE `modifica` (
  `utente` varchar(255) NOT NULL,
  `faq` int(10) NOT NULL,
  `data_modifica` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `modifica`
--

INSERT INTO `modifica` (`utente`, `faq`, `data_modifica`) VALUES
('ema_f', 1, '2022-05-02 12:00:00'),
('ema_f', 2, '2022-05-02 12:04:00'),
('ema_f', 3, '2022-05-02 12:10:00'),
('ema_f', 4, '2022-05-02 12:15:00'),
('ema_f', 5, '2022-05-02 13:00:00'),
('ema_f', 6, '2022-05-02 13:20:00');

-- --------------------------------------------------------

--
-- Struttura della tabella `posto_letto`
--

CREATE TABLE `posto_letto` (
  `id_posto_letto` int(10) NOT NULL,
  `tipologia` int(1) NOT NULL DEFAULT 1 CHECK (`tipologia` in (1,2)),
  `angolo_studio` bit(1) NOT NULL DEFAULT b'0',
  `alloggio` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `posto_letto`
--

INSERT INTO `posto_letto` (`id_posto_letto`, `tipologia`, `angolo_studio`, `alloggio`) VALUES
(1, 2, b'1', 2),
(2, 1, b'1', 3);

-- --------------------------------------------------------

--
-- Struttura della tabella `servizio`
--

CREATE TABLE `servizio` (
  `nome_servizio` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `servizio`
--

INSERT INTO `servizio` (`nome_servizio`) VALUES
('Bagno'),
('Cucina'),
('Garage'),
('Giardino'),
('Lavanderia'),
('Ripostiglio');

-- --------------------------------------------------------

--
-- Struttura della tabella `utente`
--

CREATE TABLE `utente` (
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `ruolo` varchar(9) NOT NULL CHECK (`ruolo` in ('admin','locatore','locatario')),
  `dati_personali` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `utente`
--

INSERT INTO `utente` (`username`, `password`, `ruolo`, `dati_personali`) VALUES
('dom_00', 'tec_web222', 'locatario', 3),
('ema_f', 'tec_web322', 'admin', 4),
('izzi_g', 'tec_web122', 'locatario', 2),
('paolo_b', 'tec_web22', 'locatore', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `alloggio`
--
ALTER TABLE `alloggio`
  ADD PRIMARY KEY (`id_alloggio`);

--
-- Indici per le tabelle `appartamento`
--
ALTER TABLE `appartamento`
  ADD PRIMARY KEY (`id_appartamento`),
  ADD KEY `alloggio` (`alloggio`);

--
-- Indici per le tabelle `dati_personali`
--
ALTER TABLE `dati_personali`
  ADD PRIMARY KEY (`id_dati_personali`);

--
-- Indici per le tabelle `disponibilita`
--
ALTER TABLE `disponibilita`
  ADD PRIMARY KEY (`alloggio`,`servizio`),
  ADD KEY `servizio` (`servizio`);

--
-- Indici per le tabelle `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indici per le tabelle `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`),
  ADD KEY `alloggio` (`alloggio`);

--
-- Indici per le tabelle `interazione`
--
ALTER TABLE `interazione`
  ADD PRIMARY KEY (`utente`,`alloggio`),
  ADD KEY `alloggio` (`alloggio`);

--
-- Indici per le tabelle `messaggi`
--
ALTER TABLE `messaggi`
  ADD PRIMARY KEY (`mittente`,`destinatario`,`alloggio`),
  ADD KEY `destinatario` (`destinatario`),
  ADD KEY `alloggio` (`alloggio`);

--
-- Indici per le tabelle `modifica`
--
ALTER TABLE `modifica`
  ADD PRIMARY KEY (`utente`,`faq`),
  ADD KEY `faq` (`faq`);

--
-- Indici per le tabelle `posto_letto`
--
ALTER TABLE `posto_letto`
  ADD PRIMARY KEY (`id_posto_letto`),
  ADD KEY `alloggio` (`alloggio`);

--
-- Indici per le tabelle `servizio`
--
ALTER TABLE `servizio`
  ADD PRIMARY KEY (`nome_servizio`);

--
-- Indici per le tabelle `utente`
--
ALTER TABLE `utente`
  ADD PRIMARY KEY (`username`),
  ADD KEY `dati_personali` (`dati_personali`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `alloggio`
--
ALTER TABLE `alloggio`
  MODIFY `id_alloggio` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT per la tabella `appartamento`
--
ALTER TABLE `appartamento`
  MODIFY `id_appartamento` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT per la tabella `dati_personali`
--
ALTER TABLE `dati_personali`
  MODIFY `id_dati_personali` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT per la tabella `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT per la tabella `posto_letto`
--
ALTER TABLE `posto_letto`
  MODIFY `id_posto_letto` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Limiti per le tabelle scaricate
--

--
-- Limiti per la tabella `appartamento`
--
ALTER TABLE `appartamento`
  ADD CONSTRAINT `appartamento_ibfk_1` FOREIGN KEY (`alloggio`) REFERENCES `alloggio` (`id_alloggio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `disponibilita`
--
ALTER TABLE `disponibilita`
  ADD CONSTRAINT `disponibilita_ibfk_1` FOREIGN KEY (`alloggio`) REFERENCES `alloggio` (`id_alloggio`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `disponibilita_ibfk_2` FOREIGN KEY (`servizio`) REFERENCES `servizio` (`nome_servizio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `foto`
--
ALTER TABLE `foto`
  ADD CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`alloggio`) REFERENCES `alloggio` (`id_alloggio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `interazione`
--
ALTER TABLE `interazione`
  ADD CONSTRAINT `interazione_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utente` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interazione_ibfk_2` FOREIGN KEY (`alloggio`) REFERENCES `alloggio` (`id_alloggio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `messaggi`
--
ALTER TABLE `messaggi`
  ADD CONSTRAINT `messaggi_ibfk_1` FOREIGN KEY (`mittente`) REFERENCES `utente` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messaggi_ibfk_2` FOREIGN KEY (`destinatario`) REFERENCES `utente` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `messaggi_ibfk_3` FOREIGN KEY (`alloggio`) REFERENCES `alloggio` (`id_alloggio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `modifica`
--
ALTER TABLE `modifica`
  ADD CONSTRAINT `modifica_ibfk_1` FOREIGN KEY (`utente`) REFERENCES `utente` (`username`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `modifica_ibfk_2` FOREIGN KEY (`faq`) REFERENCES `faq` (`id_faq`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `posto_letto`
--
ALTER TABLE `posto_letto`
  ADD CONSTRAINT `posto_letto_ibfk_1` FOREIGN KEY (`alloggio`) REFERENCES `alloggio` (`id_alloggio`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limiti per la tabella `utente`
--
ALTER TABLE `utente`
  ADD CONSTRAINT `utente_ibfk_1` FOREIGN KEY (`dati_personali`) REFERENCES `dati_personali` (`id_dati_personali`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
