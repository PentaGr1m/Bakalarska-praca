-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hostiteľ: 127.0.0.1
-- Čas generovania: So 10.Máj 2025, 16:48
-- Verzia serveru: 10.4.32-MariaDB
-- Verzia PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáza: `system_kniznic`
--

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `autor`
--

CREATE TABLE `autor` (
  `id_autora` int(11) NOT NULL,
  `krstne_meno` varchar(20) NOT NULL,
  `priezvisko` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `autor`
--

INSERT INTO `autor` (`id_autora`, `krstne_meno`, `priezvisko`) VALUES
(1, 'Lloyd', 'Alexander'),
(2, 'William', 'Gibson'),
(14, 'George R. R.', 'Martin');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `citatel`
--

CREATE TABLE `citatel` (
  `id_citatela` int(11) NOT NULL,
  `krstne_meno` varchar(20) NOT NULL,
  `priezvisko` varchar(20) NOT NULL,
  `telefonne_cislo` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mesto` varchar(30) NOT NULL,
  `ulica` varchar(30) NOT NULL,
  `psc` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `citatel`
--

INSERT INTO `citatel` (`id_citatela`, `krstne_meno`, `priezvisko`, `telefonne_cislo`, `email`, `mesto`, `ulica`, `psc`) VALUES
(1, 'Peter', 'Petique', '0934547890', 'peto@mail.sk', 'Mestovice', 'Uličná', '123456'),
(2, 'Jozko', 'Petržlen', '0934687234', 'jozkop@mail.sk', 'Mestovice', 'Uličná', '12345'),
(3, 'Ferko', 'Ferkovič', '0945673214', 'ferko@mail.sk', 'Mestovice', 'Uličná', '123456'),
(4, 'Anonym', 'Anonymný', '0934692444', 'a@mail.sk', 'Mestovice', 'Uličná', '123456'),
(5, 'Ján', 'Novák', '0984563227', 'jano@mail.sk', 'Mestovice', 'Uličná', '123456');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `citatelsky_preukaz`
--

CREATE TABLE `citatelsky_preukaz` (
  `id_preukazu` int(11) NOT NULL,
  `datum_zhotovenia` date NOT NULL,
  `platnost_do` date NOT NULL,
  `id_citatela` int(11) NOT NULL,
  `id_kniznice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `citatelsky_preukaz`
--

INSERT INTO `citatelsky_preukaz` (`id_preukazu`, `datum_zhotovenia`, `platnost_do`, `id_citatela`, `id_kniznice`) VALUES
(1, '2012-12-12', '2025-12-12', 1, 1),
(2, '2024-11-12', '2025-12-12', 2, 2),
(3, '2025-03-30', '2025-04-20', 3, 1),
(4, '2025-04-07', '2025-04-30', 5, 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `dodavatel`
--

CREATE TABLE `dodavatel` (
  `id_dodavatela` int(11) NOT NULL,
  `nazov` varchar(30) NOT NULL,
  `telefonne_cislo` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mesto` varchar(30) NOT NULL,
  `ulica` varchar(30) NOT NULL,
  `psc` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `dodavatel`
--

INSERT INTO `dodavatel` (`id_dodavatela`, `nazov`, `telefonne_cislo`, `email`, `mesto`, `ulica`, `psc`) VALUES
(1, 'Best Book Shop', '0912345678', 'bestbooks@mail.sk', 'Mestovice', 'Uličná', '12345');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kniznica`
--

CREATE TABLE `kniznica` (
  `id_kniznice` int(11) NOT NULL,
  `nazov_kniznice` varchar(100) NOT NULL,
  `mesto` varchar(30) NOT NULL,
  `ulica` varchar(30) NOT NULL,
  `psc` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `kniznica`
--

INSERT INTO `kniznica` (`id_kniznice`, `nazov_kniznice`, `mesto`, `ulica`, `psc`) VALUES
(1, 'Najlepšia knižnica', 'Mestovice', 'Ulicová', '12345'),
(2, 'Najhoršia knižnica', 'Mestovice', 'Uličná', '12345');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `kopia`
--

CREATE TABLE `kopia` (
  `prirastkove_cislo` int(11) NOT NULL,
  `stav` varchar(11) NOT NULL,
  `id_kniznice` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `cena` float NOT NULL,
  `datum_nakupu` date NOT NULL,
  `id_dodavatela` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `kopia`
--

INSERT INTO `kopia` (`prirastkove_cislo`, `stav`, `id_kniznice`, `isbn`, `cena`, `datum_nakupu`, `id_dodavatela`) VALUES
(2, 'Vrátená', 1, '978-80-556-4855-2', 13, '2025-03-12', 1),
(8, 'Vrátená', 1, '80-00-01424-6', 0.37, '2025-04-01', 1),
(9, 'Vrátená', 1, '978-80-222-0701-0', 0.15, '2025-04-08', 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `napisal`
--

CREATE TABLE `napisal` (
  `autor_id_autora` int(11) NOT NULL,
  `titul_isbn` varchar(20) NOT NULL,
  `poradie` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `napisal`
--

INSERT INTO `napisal` (`autor_id_autora`, `titul_isbn`, `poradie`) VALUES
(1, '80-00-01424-6', '1'),
(2, '978-80-556-4855-2', '1'),
(14, '978-80-222-0701-0', '1');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `pokuta`
--

CREATE TABLE `pokuta` (
  `id_pokuty` int(11) NOT NULL,
  `Stav` varchar(10) NOT NULL,
  `druh_pokuty` varchar(10) NOT NULL,
  `vyska_pokuty` float NOT NULL,
  `datum_udelenia_pokuty` date NOT NULL,
  `id_zamestnanca` int(11) DEFAULT NULL,
  `id_preukazu` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `pokuta`
--

INSERT INTO `pokuta` (`id_pokuty`, `Stav`, `druh_pokuty`, `vyska_pokuty`, `datum_udelenia_pokuty`, `id_zamestnanca`, `id_preukazu`) VALUES
(1, 'Udelená', 'Poškodenie', 5, '2025-05-05', 1, 1);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `rezervacia`
--

CREATE TABLE `rezervacia` (
  `id_rezervacie` int(11) NOT NULL,
  `stav` varchar(10) NOT NULL,
  `datum_rezervacie` date NOT NULL,
  `datum_konca_rezervacie` date NOT NULL,
  `id_zamestnanca` int(11) DEFAULT NULL,
  `id_preukazu` int(11) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `rezervacia`
--

INSERT INTO `rezervacia` (`id_rezervacie`, `stav`, `datum_rezervacie`, `datum_konca_rezervacie`, `id_zamestnanca`, `id_preukazu`, `isbn`) VALUES
(1, 'Ukončená', '2025-04-08', '2025-04-29', 1, 1, '80-00-01424-6'),
(4, 'Ukončená', '2025-04-08', '2025-04-30', 1, 3, '978-80-556-4855-2');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `titul`
--

CREATE TABLE `titul` (
  `isbn` varchar(20) NOT NULL,
  `nazov_titulu` varchar(30) NOT NULL,
  `rok_vydania` int(11) NOT NULL,
  `signatura` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `titul`
--

INSERT INTO `titul` (`isbn`, `nazov_titulu`, `rok_vydania`, `signatura`) VALUES
('80-00-01424-6', 'Kroniky Prydainu', 2004, 'Be'),
('978-80-222-0701-0', 'Hra o tróny', 2014, 'Be'),
('978-80-556-4855-2', 'Neuromant', 2021, 'Be');

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `vypozicka`
--

CREATE TABLE `vypozicka` (
  `id_vypozicky` int(11) NOT NULL,
  `stav` varchar(10) NOT NULL,
  `datum_pozicania` date NOT NULL,
  `datum_konca_vypozicky` date NOT NULL,
  `id_zamestnanca` int(11) DEFAULT NULL,
  `id_preukazu` int(11) DEFAULT NULL,
  `prirastkove_cislo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `vypozicka`
--

INSERT INTO `vypozicka` (`id_vypozicky`, `stav`, `datum_pozicania`, `datum_konca_vypozicky`, `id_zamestnanca`, `id_preukazu`, `prirastkove_cislo`) VALUES
(1, 'Vrátená', '2025-03-30', '2025-10-10', 1, 1, 2),
(2, 'Vrátená', '2025-04-06', '2025-04-27', 1, 3, 8),
(4, 'Vrátená', '2025-04-08', '2025-04-25', 1, 1, 9);

-- --------------------------------------------------------

--
-- Štruktúra tabuľky pre tabuľku `zamestnanec`
--

CREATE TABLE `zamestnanec` (
  `id_zamestnanca` int(11) NOT NULL,
  `krstne_meno` varchar(20) NOT NULL,
  `priezvisko` varchar(20) NOT NULL,
  `telefonne_cislo` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `mesto` varchar(30) NOT NULL,
  `ulica` varchar(30) NOT NULL,
  `psc` varchar(6) NOT NULL,
  `prihlasovacie_meno` varchar(32) NOT NULL,
  `prihlasovacie_heslo` varchar(32) NOT NULL,
  `id_kniznice` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Sťahujem dáta pre tabuľku `zamestnanec`
--

INSERT INTO `zamestnanec` (`id_zamestnanca`, `krstne_meno`, `priezvisko`, `telefonne_cislo`, `email`, `mesto`, `ulica`, `psc`, `prihlasovacie_meno`, `prihlasovacie_heslo`, `id_kniznice`) VALUES
(1, 'Jožko', 'Mrkvička', '0912345678', 'jozko@mail.sk', 'Mestovice', 'Ulicová', '12345', 'b075559d96925fe3c69a36e188a78b69', '955db0b81ef1989b4a4dfeae8061a9a6', 1);

--
-- Kľúče pre exportované tabuľky
--

--
-- Indexy pre tabuľku `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autora`);

--
-- Indexy pre tabuľku `citatel`
--
ALTER TABLE `citatel`
  ADD PRIMARY KEY (`id_citatela`);

--
-- Indexy pre tabuľku `citatelsky_preukaz`
--
ALTER TABLE `citatelsky_preukaz`
  ADD PRIMARY KEY (`id_preukazu`),
  ADD KEY `eviduje` (`id_kniznice`),
  ADD KEY `vlastniv1` (`id_citatela`);

--
-- Indexy pre tabuľku `dodavatel`
--
ALTER TABLE `dodavatel`
  ADD PRIMARY KEY (`id_dodavatela`);

--
-- Indexy pre tabuľku `kniznica`
--
ALTER TABLE `kniznica`
  ADD PRIMARY KEY (`id_kniznice`);

--
-- Indexy pre tabuľku `kopia`
--
ALTER TABLE `kopia`
  ADD PRIMARY KEY (`prirastkove_cislo`),
  ADD KEY `dodalv1` (`id_dodavatela`),
  ADD KEY `je` (`isbn`),
  ADD KEY `vlastni` (`id_kniznice`);

--
-- Indexy pre tabuľku `napisal`
--
ALTER TABLE `napisal`
  ADD PRIMARY KEY (`autor_id_autora`,`titul_isbn`),
  ADD KEY `napisal_titul_fk` (`titul_isbn`);

--
-- Indexy pre tabuľku `pokuta`
--
ALTER TABLE `pokuta`
  ADD PRIMARY KEY (`id_pokuty`),
  ADD KEY `dostal` (`id_preukazu`),
  ADD KEY `relation_22` (`id_zamestnanca`);

--
-- Indexy pre tabuľku `rezervacia`
--
ALTER TABLE `rezervacia`
  ADD PRIMARY KEY (`id_rezervacie`),
  ADD KEY `obsahuje` (`isbn`),
  ADD KEY `relation_34` (`id_preukazu`),
  ADD KEY `vykonalv1` (`id_zamestnanca`);

--
-- Indexy pre tabuľku `titul`
--
ALTER TABLE `titul`
  ADD PRIMARY KEY (`isbn`);

--
-- Indexy pre tabuľku `vypozicka`
--
ALTER TABLE `vypozicka`
  ADD PRIMARY KEY (`id_vypozicky`),
  ADD UNIQUE KEY `vypozicka__un` (`prirastkove_cislo`),
  ADD KEY `ma` (`id_preukazu`),
  ADD KEY `relation_20` (`id_zamestnanca`);

--
-- Indexy pre tabuľku `zamestnanec`
--
ALTER TABLE `zamestnanec`
  ADD PRIMARY KEY (`id_zamestnanca`),
  ADD KEY `pracuje` (`id_kniznice`);

--
-- AUTO_INCREMENT pre exportované tabuľky
--

--
-- AUTO_INCREMENT pre tabuľku `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autora` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT pre tabuľku `citatel`
--
ALTER TABLE `citatel`
  MODIFY `id_citatela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pre tabuľku `citatelsky_preukaz`
--
ALTER TABLE `citatelsky_preukaz`
  MODIFY `id_preukazu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `dodavatel`
--
ALTER TABLE `dodavatel`
  MODIFY `id_dodavatela` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `kniznica`
--
ALTER TABLE `kniznica`
  MODIFY `id_kniznice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pre tabuľku `kopia`
--
ALTER TABLE `kopia`
  MODIFY `prirastkove_cislo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pre tabuľku `pokuta`
--
ALTER TABLE `pokuta`
  MODIFY `id_pokuty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pre tabuľku `rezervacia`
--
ALTER TABLE `rezervacia`
  MODIFY `id_rezervacie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `vypozicka`
--
ALTER TABLE `vypozicka`
  MODIFY `id_vypozicky` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pre tabuľku `zamestnanec`
--
ALTER TABLE `zamestnanec`
  MODIFY `id_zamestnanca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Obmedzenie pre exportované tabuľky
--

--
-- Obmedzenie pre tabuľku `citatelsky_preukaz`
--
ALTER TABLE `citatelsky_preukaz`
  ADD CONSTRAINT `eviduje` FOREIGN KEY (`id_kniznice`) REFERENCES `kniznica` (`id_kniznice`),
  ADD CONSTRAINT `vlastniv1` FOREIGN KEY (`id_citatela`) REFERENCES `citatel` (`id_citatela`);

--
-- Obmedzenie pre tabuľku `kopia`
--
ALTER TABLE `kopia`
  ADD CONSTRAINT `dodalv1` FOREIGN KEY (`id_dodavatela`) REFERENCES `dodavatel` (`id_dodavatela`),
  ADD CONSTRAINT `je` FOREIGN KEY (`isbn`) REFERENCES `titul` (`isbn`),
  ADD CONSTRAINT `vlastni` FOREIGN KEY (`id_kniznice`) REFERENCES `kniznica` (`id_kniznice`);

--
-- Obmedzenie pre tabuľku `napisal`
--
ALTER TABLE `napisal`
  ADD CONSTRAINT `napisal_autor_fk` FOREIGN KEY (`autor_id_autora`) REFERENCES `autor` (`id_autora`),
  ADD CONSTRAINT `napisal_titul_fk` FOREIGN KEY (`titul_isbn`) REFERENCES `titul` (`isbn`);

--
-- Obmedzenie pre tabuľku `pokuta`
--
ALTER TABLE `pokuta`
  ADD CONSTRAINT `dostal` FOREIGN KEY (`id_preukazu`) REFERENCES `citatelsky_preukaz` (`id_preukazu`),
  ADD CONSTRAINT `relation_22` FOREIGN KEY (`id_zamestnanca`) REFERENCES `zamestnanec` (`id_zamestnanca`);

--
-- Obmedzenie pre tabuľku `rezervacia`
--
ALTER TABLE `rezervacia`
  ADD CONSTRAINT `obsahuje` FOREIGN KEY (`isbn`) REFERENCES `titul` (`isbn`),
  ADD CONSTRAINT `relation_34` FOREIGN KEY (`id_preukazu`) REFERENCES `citatelsky_preukaz` (`id_preukazu`),
  ADD CONSTRAINT `vykonalv1` FOREIGN KEY (`id_zamestnanca`) REFERENCES `zamestnanec` (`id_zamestnanca`);

--
-- Obmedzenie pre tabuľku `vypozicka`
--
ALTER TABLE `vypozicka`
  ADD CONSTRAINT `ma` FOREIGN KEY (`id_preukazu`) REFERENCES `citatelsky_preukaz` (`id_preukazu`),
  ADD CONSTRAINT `relation_18` FOREIGN KEY (`prirastkove_cislo`) REFERENCES `kopia` (`prirastkove_cislo`),
  ADD CONSTRAINT `relation_20` FOREIGN KEY (`id_zamestnanca`) REFERENCES `zamestnanec` (`id_zamestnanca`);

--
-- Obmedzenie pre tabuľku `zamestnanec`
--
ALTER TABLE `zamestnanec`
  ADD CONSTRAINT `pracuje` FOREIGN KEY (`id_kniznice`) REFERENCES `kniznica` (`id_kniznice`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
