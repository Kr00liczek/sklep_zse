-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 30 Lis 2024, 13:29
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `sklep_zse`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `produkty`
--

CREATE TABLE `produkty` (
  `id` int(11) NOT NULL,
  `nazwa` varchar(255) NOT NULL,
  `cena` decimal(10,2) NOT NULL,
  `obraz` varchar(255) DEFAULT NULL,
  `opis` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `produkty`
--

INSERT INTO `produkty` (`id`, `nazwa`, `cena`, `obraz`, `opis`) VALUES
(1, 'Czarna Bluza', '119.99', 'img/cb.png', 'Stylowa czarna bluza, która zapewnia komfort i ciepło w każdej sytuacji. Wykonana z wysokiej jakości materiału, idealna na chłodniejsze dni. Prosty, ale elegancki krój sprawia, że pasuje do wielu stylizacji, zarówno casualowych, jak i bardziej sportowych. Uniwersalna i ponadczasowa, doskonała do codziennych wyzwań.'),
(2, 'Czarny Longsleeve', '89.99', 'img/cl.png', 'Czarny longsleeve to klasyka, która powinna znaleźć się w każdej szafie. Wykonany z miękkiego materiału, który zapewnia wygodę przez cały dzień. Idealny zarówno na co dzień, jak i na mniej formalne okazje. Długi rękaw sprawia, że jest to doskonały wybór na przejściowe pory roku.'),
(3, 'Czarny T-shirt', '49.99', 'img/ct.png', 'Minimalistyczny, czarny t-shirt, który nigdy nie wyjdzie z mody. Wykonany z przewiewnej bawełny, zapewnia komfort i swobodę ruchów. Pasuje zarówno do jeansów, jak i do sportowych spodni, stanowiąc bazę do wielu stylizacji. Idealny na codzienne wyjścia oraz jako element warstwowy w chłodniejsze dni.'),
(4, 'Biała Bluza', '119.99', 'img/bb.png', 'Elegancka i komfortowa biała bluza, która sprawdzi się w każdej garderobie. Wykonana z miękkiego materiału, który zapewnia ciepło i wygodę. Jej neutralna barwa sprawia, że jest to idealny wybór na różne okazje – zarówno casualowe, jak i bardziej sportowe. Dodaje świeżości i lekkości każdej stylizacji.'),
(5, 'Biały Longsleeve', '89.99', 'img/bl.png', 'Biały longsleeve to klasyczny element garderoby, który pasuje do wielu stylizacji. Wykonany z wysokiej jakości materiału, który oddycha i zapewnia wygodę przez cały dzień. Idealny do noszenia na co dzień, zarówno samodzielnie, jak i jako baza pod inne ubrania. Długi rękaw zapewnia dodatkowy komfort, zwłaszcza w chłodniejsze dni.'),
(6, 'Biały T-Shirt', '49.99', 'img/bt.png', 'Niezwykle uniwersalny biały t-shirt, który stanowi podstawę każdej męskiej i damskiej szafy. Wykonany z miękkiej bawełny, zapewnia wygodę i swobodę ruchów. Doskonały do codziennych stylizacji, w połączeniu z dżinsami, szortami czy spodniami sportowymi. Klasyka, która nigdy nie wychodzi z mody.'),
(7, 'Niebieska Bluza', '119.99', 'img/nb.png', 'Ciepła i stylowa niebieska bluza, która zapewnia komfort w chłodne dni. Wykonana z wysokiej jakości materiałów, idealna do codziennych stylizacji. Uniwersalny kolor pasuje do wielu innych odzieży, a jej prosty krój sprawia, że jest wygodna i modna w każdej sytuacji.'),
(8, 'Niebieski Longsleeve', '89.99', 'img/nl.png', 'Elegancki niebieski longsleeve to idealna opcja na przejściowe pory roku. Wykonany z przyjemnego w dotyku materiału, zapewnia wygodę i oddychalność. Pasuje zarówno do dżinsów, jak i sportowych spodni, oferując ponadczasowy look, który sprawdzi się w wielu okazjach.\r\n\r\n'),
(9, 'Niebieski T-shirt', '49.99', 'img/nt.png', 'Niebieski t-shirt, który doda świeżości każdej stylizacji. Wykonany z miękkiej bawełny, zapewnia wygodę i komfort przez cały dzień. Klasyczny krój pasuje do różnych stylów, zarówno casualowych, jak i sportowych. Doskonały wybór na co dzień, w połączeniu z dżinsami lub szortami.');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `produkty`
--
ALTER TABLE `produkty`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `produkty`
--
ALTER TABLE `produkty`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
