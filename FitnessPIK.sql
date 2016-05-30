-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 30 Maj 2016, 16:16
-- Wersja serwera: 5.5.49-0ubuntu0.14.04.1
-- Wersja PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `FitnessPIK`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Account`
--

CREATE TABLE IF NOT EXISTS `Account` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
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
  `level` int(11) NOT NULL,
  `activationCode` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `Account`
--

INSERT INTO `Account` (`id`, `login`, `haslo`, `email`, `nrTel`, `imie`, `nazwisko`, `miejscowosc`, `ulica`, `nrDomu`, `nrMieszkania`, `kodPocztowy`, `dataUrodzin`, `dataUtworzenia`, `activated`, `level`, `activationCode`) VALUES
(1, 'administrator', 'administrator', 'fitnesspik@gmail.com', 606214001, 'Fitnes', 'PIK', 'ferfgerf', 'rgergerger', 10, 3, '76-248', '1997-01-18', '2016-05-21', 1, 1, ''),
(2, 'kinga12', 'kinga12', 'pampi.com@gmail.com', 123456789, 'Kinga', 'Walawicz', 'Dębnica', 'Dębnica', 11, 11, '66-666', '2222-02-22', '2016-05-30', 1, 0, '4ae3b48272beba511a76a3110f587968'),
(3, 'iwomichu', 'iwomichu', 'pampi.backup@gmail.com', 123456789, 'wefwef', 'rfwergerg', 'rge3rgerg', 'rge3rgerg', 11, 11, '11-111', '2222-02-22', '2016-05-30', 0, 0, '7c3cd21610aa1339a597c220b15fac32');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Cennik`
--

CREATE TABLE IF NOT EXISTS `Cennik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `oferta` varchar(100) NOT NULL,
  `cena` float NOT NULL,
  `id_karnet` int(11) NOT NULL,
  `promocje` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Galeria`
--

CREATE TABLE IF NOT EXISTS `Galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naglowek` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `id_zdjecia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Instruktor`
--

CREATE TABLE IF NOT EXISTS `Instruktor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pensja` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Newsy`
--

CREATE TABLE IF NOT EXISTS `Newsy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naglowek` varchar(500) COLLATE utf8_polish_ci NOT NULL,
  `opis` int(11) NOT NULL,
  `id_zdjecia` int(11) NOT NULL,
  `autor` int(11) NOT NULL,
  `zawartosc` varchar(1000) COLLATE utf8_polish_ci NOT NULL,
  `data_utworzenia` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Terminarz`
--

CREATE TABLE IF NOT EXISTS `Terminarz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_instruktor` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `data_zajec` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `nr_sali` int(3) NOT NULL,
  `id_zajecia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Zajecia`
--

CREATE TABLE IF NOT EXISTS `Zajecia` (
  `id` int(11) NOT NULL,
  `nazwa_zajec` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `id_instruktor` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `id_cennik` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `Zdjecia`
--

CREATE TABLE IF NOT EXISTS `Zdjecia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zdjecie` mediumblob NOT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
