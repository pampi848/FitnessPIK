-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Czas generowania: 25 Maj 2016, 22:36
-- Wersja serwera: 5.6.26
-- Wersja PHP: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `fitnessclub`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL,
  `login` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `haslo` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `nrTel` int(11) NOT NULL,
  `imie` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `nazwisko` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `miejscowosc` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `ulica` varchar(255) CHARACTER SET ucs2 COLLATE ucs2_polish_ci NOT NULL,
  `nrDomu` int(11) NOT NULL,
  `nrMieszkania` int(11) NOT NULL,
  `kodPocztowy` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `dataUrodzin` date NOT NULL,
  `dataUtworzenia` date NOT NULL,
  `activated` tinyint(1) NOT NULL,
  `level` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `account`
--

INSERT INTO `account` (`id`, `login`, `haslo`, `email`, `nrTel`, `imie`, `nazwisko`, `miejscowosc`, `ulica`, `nrDomu`, `nrMieszkania`, `kodPocztowy`, `dataUrodzin`, `dataUtworzenia`, `activated`, `level`) VALUES
(1, 'root', 'root', 'pampi.com@gmail.com', 606214001, 'Michał', 'Klemiato', 'Dębnica Kaszubska', 'Fabryczna', 10, 3, '76-248', '1997-01-18', '2016-05-21', 1, 1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `instruktor`
--

CREATE TABLE IF NOT EXISTS `instruktor` (
  `id` int(11) NOT NULL,
  `pensja` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `terminarz`
--

CREATE TABLE IF NOT EXISTS `terminarz` (
  `id` int(11) NOT NULL,
  `id_instruktor` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `data_zajec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nr_sali` int(3) NOT NULL,
  `id_zajecia` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia`
--

CREATE TABLE IF NOT EXISTS `zajecia` (
  `id` int(11) NOT NULL,
  `nazwa_zajec` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `id_instruktor` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_cennik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instruktor`
--
ALTER TABLE `instruktor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terminarz`
--
ALTER TABLE `terminarz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT dla tabeli `instruktor`
--
ALTER TABLE `instruktor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT dla tabeli `terminarz`
--
ALTER TABLE `terminarz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
