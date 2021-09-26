-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Ned 26. zář 2021, 15:48
-- Verze serveru: 10.4.21-MariaDB
-- Verze PHP: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `adresar_kontakty`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `kontakt`
--

CREATE TABLE `kontakt` (
  `id` int(11) NOT NULL,
  `jmeno` varchar(200) NOT NULL,
  `prijmeni` varchar(200) DEFAULT NULL,
  `telefon` varchar(50) NOT NULL,
  `email` varchar(400) DEFAULT NULL,
  `poznamka` varchar(2000) DEFAULT NULL,
  `datum_vytvoreni` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `kontakt`
--

INSERT INTO `kontakt` (`id`, `jmeno`, `prijmeni`, `telefon`, `email`, `poznamka`, `datum_vytvoreni`) VALUES
(4, 'Jaromír', 'Jiřina', '123654789', 'jarojiri@gmail.com', 'asdsdsad', '2021-09-25 11:54:15'),
(5, 'Jaromíra', 'Jardadada', '456987123', 'asd@asd.cz', 'asd aaa', '2021-09-26 10:04:35'),
(6, 'teta jarka', 'Jarka Ohladonáá', '12321123', '', '', '2021-09-26 13:02:33'),
(7, 'Pan Koukal', 'Jiří', '321654987', '', '', '2021-09-26 10:05:19'),
(8, 'Pavel', 'Dobrák', '123321123', 'dobra@ak.cz', 'není to dobrák, je to dodobrak', '2021-09-26 10:14:16'),
(9, 'akoslavaaa', 'jaro', '987456321', 'akoslava@mundo.cz', '', '2021-09-26 13:06:16'),
(10, 'Dvanda', 'Jakobová', '555666321', '', '', '2021-09-26 10:14:45'),
(11, 'Jolius', 'Jalama', '654987321', '', '', '2021-09-26 10:14:57'),
(13, 'Viktor', 'Vika', '765889553', '', '', '2021-09-26 10:58:37'),
(14, 'Honza', 'Krátil', '556225651', '', '', '2021-09-26 11:05:44'),
(15, 'TestiusS', 'TesterR', '111111111', 'testa@testa.cz', 'Testovací poznámka', '2021-09-26 13:02:52'),
(16, 'Bartoloměj', 'Eliáš', '727831554', 'bartas.elias@gmail.com', 'Klidně mne kontaktuje, pokud bude třeba.', '2021-09-26 13:03:54'),
(17, 'Jiří Pavel', '', '654128657', '', '', '2021-09-26 13:30:04'),
(18, 'Aneta Anegdotová', '', '658321458', '', '', '2021-09-26 13:30:21');

--
-- Indexy pro exportované tabulky
--

--
-- Indexy pro tabulku `kontakt`
--
ALTER TABLE `kontakt`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `jmeno` (`jmeno`),
  ADD KEY `prijmeni` (`prijmeni`),
  ADD KEY `telefon` (`telefon`),
  ADD KEY `email` (`email`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `kontakt`
--
ALTER TABLE `kontakt`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
