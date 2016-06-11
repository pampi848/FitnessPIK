-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Czas wygenerowania: 11 Cze 2016, 14:21
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=7 ;

--
-- Zrzut danych tabeli `account`
--

INSERT INTO `account` (`id`, `login`, `haslo`, `email`, `nrTel`, `imie`, `nazwisko`, `miejscowosc`, `ulica`, `nrDomu`, `nrMieszkania`, `kodPocztowy`, `dataUrodzin`, `dataUtworzenia`, `activated`, `level`, `activationCode`) VALUES
(1, 'administrator', 'administrator', 'fitnesspik@gmail.com', 606214001, 'Fitnes', 'PIK', 'ferfgerf', 'rgergerger', 10, 3, '76-248', '1997-01-18', '2016-05-21', 1, 1, 'iwopedal'),
(2, 'kinga12', 'kinga12', 'pampi.com@gmail.com', 123456789, 'Kinga', 'Walawicz', 'Dębnica', 'Dębnica', 11, 11, '66-666', '2222-02-22', '2016-05-30', 1, 2, '4ae3b48272beba511a76a3110f587968'),
(3, 'iwomichu', 'iwomichu', 'pampi.backup@gmail.com', 123456789, 'wefwef', 'rfwergerg', 'rge3rgerg', 'rge3rgerg', 11, 11, '11-111', '2222-02-22', '2016-05-30', 1, 0, '7c3cd21610aa1339a597c220b15fac32'),
(4, 'rootwef2ef', 'wrgwrgweg', 'lol@lol.lol', 123456789, 'ergehgergher', 'wetgwegweg', 'wegwegweg', 'wegwegweg', 22, 22, '76-248', '2222-02-22', '2016-06-01', 0, 0, '71ed5ed9ee3c366b58e2c7c64f151340'),
(5, 'root', 'dev', 'mail@oo.oo', 123456789, 'efwergwg', 'efwegrg', 'wergwegweg', 'wegwegweg', 10, 10, '11-111', '2016-06-04', '2016-06-04', 1, 1, '11111'),
(6, 'lol', 'lol', 'fwefwfwe', 16125656, 'aergege', 'ergergerg', 'ergerger', 'ergergerg', 10, 10, 'wefwerf', '2016-06-02', '2016-06-03', 1, 2, 'fxgfy');

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `cennik`
--

INSERT INTO `cennik` (`id`, `id_zajecia`, `cena`, `promocja`) VALUES
(1, 1, 11.11, 1);

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
-- Struktura tabeli dla tabeli `instruktor`
--

CREATE TABLE IF NOT EXISTS `instruktor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_account` int(11) NOT NULL,
  `pensja` float NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=2 ;

--
-- Zrzut danych tabeli `instruktor`
--

INSERT INTO `instruktor` (`id`, `id_account`, `pensja`) VALUES
(1, 6, 270);

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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=6 ;

--
-- Zrzut danych tabeli `newsy`
--

INSERT INTO `newsy` (`id`, `img`, `naglowek`, `kategoria`, `opis`, `autor`, `zawartosc`, `data_utworzenia`, `id_account`) VALUES
(1, 'img/img1465507031.jpeg', '1', 'Informacja', 'opis', 'autor', 'tresc', '2016-06-09', 5),
(2, 'img/img1465507060.jpeg', '2', 'Ogłoszenie', 'opis', 'autor', 'tresc', '2016-06-09', 5),
(3, 'img/img1465507084.jpeg', '3', 'Ogłoszenie', 'opis', 'autor', 'tresc', '2016-06-09', 5),
(4, 'img/img1465507115.jpeg', '4', 'Informacja', '4', '4', '4', '2016-06-09', 5),
(5, 'img/img1465507140.jpeg', '5', 'Oferta', '', '5', '5', '2016-06-09', 5);

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
  `id_zajecia` int(11) NOT NULL,
  `id_account` int(11) NOT NULL,
  `obecnosc` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci AUTO_INCREMENT=5 ;

--
-- Zrzut danych tabeli `uczeszczajacy`
--

INSERT INTO `uczeszczajacy` (`id`, `id_zajecia`, `id_account`, `obecnosc`) VALUES
(1, 1, 1, 1),
(2, 2, 1, 1),
(3, 2, 3, 1),
(4, 2, 6, 0);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia`
--

CREATE TABLE IF NOT EXISTS `zajecia` (
  `id` int(11) NOT NULL,
  `nazwa_zajec` varchar(25) COLLATE utf8_polish_ci NOT NULL,
  `id_instruktor` int(11) NOT NULL,
  `opis` varchar(255) COLLATE utf8_polish_ci NOT NULL,
  `wynagrodzenieMiesieczne` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_polish_ci;

--
-- Zrzut danych tabeli `zajecia`
--

INSERT INTO `zajecia` (`id`, `nazwa_zajec`, `id_instruktor`, `opis`, `wynagrodzenieMiesieczne`) VALUES
(1, 'zumba', 2, 'zumbiasznie', 500),
(2, 'lol', 2, 'trjr4jrt', 220);

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
