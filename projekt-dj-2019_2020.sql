-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 11 Lut 2020, 08:46
-- Wersja serwera: 10.1.38-MariaDB
-- Wersja PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `projekt-dj-2019/2020`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `działy`
--

CREATE TABLE `działy` (
  `Id_dzialu` int(11) NOT NULL,
  `Nazwa_dzialu` varchar(10) COLLATE utf16_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `słowa`
--

CREATE TABLE `słowa` (
  `Id_slowa` int(11) NOT NULL,
  `polskie_tlum` varchar(50) COLLATE utf16_polish_ci NOT NULL,
  `angielskie_tlum` varchar(50) COLLATE utf16_polish_ci NOT NULL,
  `Id_dzialu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `typy_użytkownika`
--

CREATE TABLE `typy_użytkownika` (
  `Id_typu` int(11) NOT NULL,
  `Typ` varchar(20) COLLATE utf16_polish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

--
-- Zrzut danych tabeli `typy_użytkownika`
--

INSERT INTO `typy_użytkownika` (`Id_typu`, `Typ`) VALUES
(1, 'administrator'),
(2, 'użytkownik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `użytkownicy`
--

CREATE TABLE `użytkownicy` (
  `Id_użytkownika` int(11) NOT NULL,
  `login` varchar(30) COLLATE utf16_polish_ci NOT NULL,
  `hasło` varchar(255) COLLATE utf16_polish_ci DEFAULT NULL,
  `data_utworzenia` date NOT NULL,
  `Typ` int(11) NOT NULL,
  `email` varchar(50) COLLATE utf16_polish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

--
-- Zrzut danych tabeli `użytkownicy`
--

INSERT INTO `użytkownicy` (`Id_użytkownika`, `login`, `hasło`, `data_utworzenia`, `Typ`, `email`) VALUES
(2, 'testaccount', '$2y$10$sFG3vmfqCO7Xi5C7nntyIeOvLgwnZi/PDftMpsbBa28T0uuH71Xhm', '2020-02-07', 2, 'test1@test1.pl'),
(3, 'admin', '$2y$10$29ULc.rWt1y7UBy.MFfwZegZ0EB4ZH0OWBeDwU0o7f9iec6p0d/4O', '2020-02-07', 1, 'jankowskidaniel06@gmail.com'),
(5, 'testaccount2', '$2y$10$mJBDdAeqP7.5aywuwRxZxehQN.8PEO0btYf4X/xRV4Oj5DaXwOwwC', '2020-02-07', 2, 'test2@test2.pl');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `użytkownicy_słowa`
--

CREATE TABLE `użytkownicy_słowa` (
  `Id_użytkownika` int(11) NOT NULL,
  `Id_słowa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16 COLLATE=utf16_polish_ci;

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `działy`
--
ALTER TABLE `działy`
  ADD PRIMARY KEY (`Id_dzialu`),
  ADD KEY `Id_dzialu` (`Id_dzialu`);

--
-- Indeksy dla tabeli `słowa`
--
ALTER TABLE `słowa`
  ADD PRIMARY KEY (`Id_slowa`),
  ADD KEY `Id_slowa` (`Id_slowa`),
  ADD KEY `Id_dzialu` (`Id_dzialu`);

--
-- Indeksy dla tabeli `typy_użytkownika`
--
ALTER TABLE `typy_użytkownika`
  ADD PRIMARY KEY (`Id_typu`),
  ADD KEY `Id_typu` (`Id_typu`);

--
-- Indeksy dla tabeli `użytkownicy`
--
ALTER TABLE `użytkownicy`
  ADD PRIMARY KEY (`Id_użytkownika`),
  ADD KEY `Typ` (`Typ`);

--
-- Indeksy dla tabeli `użytkownicy_słowa`
--
ALTER TABLE `użytkownicy_słowa`
  ADD KEY `Id_użytkownika` (`Id_użytkownika`),
  ADD KEY `Id_słowa` (`Id_słowa`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `użytkownicy`
--
ALTER TABLE `użytkownicy`
  MODIFY `Id_użytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `działy`
--
ALTER TABLE `działy`
  ADD CONSTRAINT `działy_ibfk_1` FOREIGN KEY (`Id_dzialu`) REFERENCES `działy` (`Id_dzialu`);

--
-- Ograniczenia dla tabeli `użytkownicy`
--
ALTER TABLE `użytkownicy`
  ADD CONSTRAINT `użytkownicy_ibfk_1` FOREIGN KEY (`Typ`) REFERENCES `typy_użytkownika` (`Id_typu`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
