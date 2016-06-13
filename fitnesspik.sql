-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 13 Cze 2016, 23:24
-- Wersja serwera: 5.5.49-0ubuntu0.14.04.1
-- Wersja PHP: 5.5.9-1ubuntu4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Baza danych: `fitnesspik`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `account`
--

CREATE TABLE IF NOT EXISTS `account` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=16 ;

--
-- Zrzut danych tabeli `account`
--

INSERT INTO `account` (`id`, `login`, `haslo`, `email`, `nrTel`, `imie`, `nazwisko`, `miejscowosc`, `ulica`, `nrDomu`, `nrMieszkania`, `kodPocztowy`, `dataUrodzin`, `dataUtworzenia`, `activated`, `level`, `activationCode`) VALUES
(2, 'kinia16', 'a2luaWExNg==', 'pampi.com@gmail.com', 111111111, 'Kingaf', 'Walawicz', 'Dębnica Kaszubska', 'kinia16', 11, 11, '11-111', '1111-11-11', '2016-06-11', 1, 2, '87c1f77db34a61658764d0ccaaed6c3c'),
(6, 'root', 'ZGV2', 'rootroot@ro.ot', 606214001, 'Pampi', 'Dampi', 'rootrddd', 'root', 11, 11, '11-111', '1111-11-11', '2016-06-11', 1, 1, 'root'),
(10, 'uzytkownik', 'dXp5dGtvd25paw==', 'uzytkownik@ll.pp', 111111111, 'uzytkownik', 'uzytkownik', 'uzytkownik', 'uzytkownik', 11, 11, '11-111', '1111-11-11', '2016-06-11', 1, 0, '442b90e7a0b11ecc6d437c64180173d1'),
(11, 'uzytkownik1', 'dXp5dGtvd25pazE=', 'uzytkownik1@ll.pp', 111111111, 'uzytkownik', 'uzytkownik', 'uzytkownik', 'uzytkownik', 11, 11, '11-111', '1111-11-11', '2016-06-11', 0, 0, '4ad368b84469bb056733465bda59d4b0'),
(12, 'uzytkownik2', 'dXp5dGtvd25pazI=', 'uzytkownik2@ll.pp', 111111111, 'uzytkownik', 'uzytkownik', 'uzytkownik', 'uzytkownik', 11, 11, '11-111', '1111-11-11', '2016-06-11', 0, 0, '95f7d0a2dad0e4828f8964b3e257ff86'),
(13, 'uzytkownik3', 'dXp5dGtvd25pazM=', 'uzytkownik3@ll.pp', 111111111, 'uzytkownik', 'uzytkownik', 'uzytkownik', 'uzytkownik', 11, 11, '11-111', '1111-11-11', '2016-06-11', 0, 0, 'disable'),
(14, 'pampi848', 'cG93ZVJ2b2x1bUU0', 'pampi.com@gmail.com', 606214001, 'Michał', 'Klemiato', 'wegwegweg', 'wegwegweg', 10, 11, '76-248', '1997-01-18', '2016-06-11', 1, 1, '280e1ff0379eee84e9423ebc782b6499'),
(15, 'jakieskonto', 'amFraWVza29udG8=', 'pampi.backup@gmail.com', 123123123, 'jakieskonto', 'jakieskonto', 'jakieskonto', 'jakieskonto', 11, 11, '11-111', '2222-02-22', '2016-06-13', 1, 0, 'ab5aa3d4ae50e2b4b19378221cb735de');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `cennik`
--

CREATE TABLE IF NOT EXISTS `cennik` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zajecia` int(11) NOT NULL,
  `cena` float NOT NULL,
  `promocja` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `cennik`
--

INSERT INTO `cennik` (`id`, `id_zajecia`, `cena`, `promocja`) VALUES
(1, 1, 11.11, 1),
(2, 10, 2, 1),
(3, 11, 2, 1),
(4, 12, 2, 1),
(5, 15, 222, 0.1);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `galeria`
--

CREATE TABLE IF NOT EXISTS `galeria` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `naglowek` varchar(100) COLLATE utf8_polish_ci NOT NULL,
  `opis` text COLLATE utf8_polish_ci NOT NULL,
  `id_zdjecia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `newsy`
--

CREATE TABLE IF NOT EXISTS `newsy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `img` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `naglowek` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `kategoria` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `opis` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `autor` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `zawartosc` text COLLATE utf8_polish_ci NOT NULL,
  `data_utworzenia` date NOT NULL,
  `id_account` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=9 ;

--
-- Zrzut danych tabeli `newsy`
--

INSERT INTO `newsy` (`id`, `img`, `naglowek`, `kategoria`, `opis`, `autor`, `zawartosc`, `data_utworzenia`, `id_account`) VALUES
(1, 'img/img1465507031.jpeg', '1', 'Informacja', 'opis', 'autor', 'tresc', '2016-06-09', 5),
(2, 'img/img1465507060.jpeg', '2', 'Ogłoszenie', 'opis', 'autor', 'tresc', '2016-06-09', 5),
(3, 'img/img1465507084.jpeg', '3', 'Ogłoszenie', 'opis', 'autor', 'tresc', '2016-06-09', 5),
(4, 'img/img1465507115.jpeg', '4', 'Informacja', '4', '4', '4', '2016-06-09', 5),
(5, 'img/img1465507140.jpeg', '5', 'Oferta', '', '5', '5', '2016-06-09', 5),
(6, 'img/img1465752954.bmp', 'rtjrfj', 'Informacja', 'rtjrtjrtj', 'tjr4tj', 'etjrtjr', '2016-06-12', 6),
(7, 'img/news/img1465753532.jpeg', 'lolwergw3g', 'Informacja', 'erherhesrherh', 'wehwerher', 'herherherh', '2016-06-12', 6),
(8, 'img/news/img1465753580.jpeg', 'lolwergw3g', 'Informacja', 'erherhesrherh', 'wehwerher', 'herherherh', '2016-06-12', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `terminarz`
--

CREATE TABLE IF NOT EXISTS `terminarz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zajecia` int(11) NOT NULL,
  `dzienTygodnia` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `godzina` float NOT NULL,
  `sala` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

--
-- Zrzut danych tabeli `terminarz`
--

INSERT INTO `terminarz` (`id`, `id_zajecia`, `dzienTygodnia`, `godzina`, `sala`) VALUES
(1, 1, '1', 22.22, '207'),
(2, 1, '5', 11, '11');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uczeszczajacy`
--

CREATE TABLE IF NOT EXISTS `uczeszczajacy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_terminarz` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `obecnosc` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `uczeszczajacy`
--

INSERT INTO `uczeszczajacy` (`id`, `id_terminarz`, `id_account`, `obecnosc`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 2, 3, 1),
(4, 2, 6, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia`
--

CREATE TABLE IF NOT EXISTS `zajecia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nazwa_zajec` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `id_instruktor` int(11) NOT NULL,
  `opis` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `wynagrodzenie_miesieczne` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=16 ;

--
-- Zrzut danych tabeli `zajecia`
--

INSERT INTO `zajecia` (`id`, `nazwa_zajec`, `id_instruktor`, `opis`, `wynagrodzenie_miesieczne`) VALUES
(1, 'zumba', 2, 'zumbiasznie', 500),
(2, 'lol', 2, 'trjr4jrt', 220),
(3, 'fdssg', 2, 'Opisl', 0),
(4, 'fdssg', 2, 'Opisl', 0),
(5, 'fdssg', 2, 'Opisl', 2),
(6, 'ryeryereh', 2, 'Opiserherherh', 22),
(7, 'ryeryereh', 2, 'Opiserherherh', 22),
(8, 'wgewerg', 2, 'trrthrthr', 2),
(9, 'wgewerg', 2, 'trrthrthr', 2),
(10, 'wgewerg', 2, 'trrthrthr', 2),
(11, '4twerg', 2, 'Opiseherher', 2),
(12, '4twerg', 2, 'Opiseherher', 2),
(13, 'eherhe', 1, 'lol', 1),
(14, 'ethaetheth', 222, 'Opisethesthesheth', 2222),
(15, 'ethaetheth', 222, 'Opisethesthesheth', 2222);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zdjecia`
--

CREATE TABLE IF NOT EXISTS `zdjecia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `zdjecie` mediumblob NOT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
