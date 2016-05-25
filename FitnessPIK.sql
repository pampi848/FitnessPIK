-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 25 Maj 2016, 21:27
-- Wersja serwera: 5.5.49-0ubuntu0.14.04.1
-- Wersja PHP: 5.5.9-1ubuntu4.16

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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=4 ;

--
-- Zrzut danych tabeli `Account`
--

INSERT INTO `Account` (`id`, `login`, `haslo`, `email`, `nrTel`, `imie`, `nazwisko`, `miejscowosc`, `ulica`, `nrDomu`, `nrMieszkania`, `kodPocztowy`, `dataUrodzin`, `dataUtworzenia`, `activated`, `level`) VALUES
(1, 'root', 'root', 'pampi.com@gmail.com', 606214001, 'Michał', 'Klemiato', 'Dębnica Kaszubska', 'Fabryczna', 10, 3, '76-248', '1997-01-18', '2016-05-21', 1, 1),
(2, 'michal', 'mojehaslo', 'mail@lol.com', 123456789, 'michal', 'klemiato', 'debnica', 'debnica', 10, 3, '76-248', '0000-00-00', '2016-05-25', 0, 0),
(3, 'loltrwe', 'lewfgtl', 'fg@lol.com', 123456789, 'ddddfq', 'edddwf', 'edeee', 'edeee', 1, 1, '66-666', '0000-00-00', '2016-05-25', 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
