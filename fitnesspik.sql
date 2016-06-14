-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 14 Cze 2016, 02:07
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `cennik`
--

INSERT INTO `cennik` (`id`, `id_zajecia`, `cena`, `promocja`) VALUES
(1, 1, 11.11, 1),
(6, 16, 2222, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `newsy`
--

INSERT INTO `newsy` (`id`, `img`, `naglowek`, `kategoria`, `opis`, `autor`, `zawartosc`, `data_utworzenia`, `id_account`) VALUES
(1, 'img/news/img1465854134.jpeg', 'First News', 'Informacja', 'Welcome on our page!', 'admin', 'Welcome on our page!', '2016-06-13', 6),
(2, 'img/news/img1465854186.jpeg', 'UFO', 'Ogłoszenie', 'Niezidentyfikowany obiekt latający!', 'alien', 'Wykryto kosmitów', '2016-06-13', 6),
(3, 'img/news/img1465854472.jpeg', 'Konkurs', 'Oferta', 'Nasza faworytka startuje w konkursie fotograficznym!', 'lol', 'Kinga znowu przegrała konkurs.\r\nGratulujemy', '2016-06-13', 6),
(4, 'img/news/img1465854539.jpeg', 'nowy admin', 'Informacja', 'Wybrano nowego admina!', 'nowy admin', 'Z tej strony nowy admin, liczę na to , że się polubimy ;)', '2016-06-13', 6);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `terminarz`
--

CREATE TABLE IF NOT EXISTS `terminarz` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_zajecia` int(11) NOT NULL,
  `dzienTygodnia` int(11) NOT NULL,
  `godzina` float NOT NULL,
  `sala` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=3 ;

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
-- Struktura tabeli dla tabeli `wykupione`
--

CREATE TABLE IF NOT EXISTS `wykupione` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_zajecia` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=17 ;

--
-- Zrzut danych tabeli `zajecia`
--

INSERT INTO `zajecia` (`id`, `nazwa_zajec`, `id_instruktor`, `opis`, `wynagrodzenie_miesieczne`) VALUES
(1, 'zumba', 2, 'zumbiasznie', 500),
(16, 'fwgwgw', 2, 'gwregwgerg', 222222);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
