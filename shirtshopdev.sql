-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Erstellungszeit: 02. Jun 2024 um 08:22
-- Server-Version: 10.4.28-MariaDB
-- PHP-Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Datenbank: `shirtshopdev`
--

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `watt` int(11) DEFAULT NULL,
  `marke` varchar(50) NOT NULL,
  `modell` varchar(50) NOT NULL,
  `kategorie` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `products`
--

INSERT INTO `products` (`id`, `description`, `price`, `image`, `watt`, `marke`, `modell`, `kategorie`) VALUES
(1, 'Ein leistungsstarker kabelloser Staubsauger.', 599.99, 'dyson_v11.jpeg', 1200, 'Dyson', 'V11 Absolute', 'Staubsauger'),
(2, 'Ein beutelloser Staubsauger mit hoher Saugleistung.', 299.99, 'bosch_series8.jpeg', 1500, 'Bosch', 'Series 8', 'Staubsauger'),
(3, 'Ein hochwertiger Bodenstaubsauger mit Beutel.', 249.99, 'miele_c3.jpeg', 1800, 'Miele', 'Complete C3', 'Staubsauger'),
(4, 'Ein beutelloser Staubsauger mit innovativer Vortex-Technologie.', 399.99, 'miele_cx1.jpeg', 1600, 'Miele', 'Blizzard CX1', 'Staubsauger'),
(5, 'Ein flexibler kabelloser Staubsauger mit dreifachem Filtersystem.', 499.99, 'miele_hx1.jpeg', 1700, 'Miele', 'Triflex HX1', 'Staubsauger'),
(6, 'Ein hochwertiger Bürstenkopf für empfindliche Hartböden.', 79.99, 'miele_parquet.jpeg', NULL, 'Miele', 'Parquet Twister', 'Accessoires'),
(7, 'Ein langlebiger Staubsaugerbeutel für Miele Staubsauger.', 19.99, 'miele_staubsack.jpeg', NULL, 'Miele', 'Staubsack', 'Accessoires'),
(8, 'Ein stylisches kurzärmeliges Baumwollshirt.', 19.99, 'product3.jpeg', NULL, 'BlackLabel', 'Modell1', 'Kurzarm'),
(9, 'Ein elegantes kurzärmeliges Poloshirt.', 29.99, 'product4.jpeg', NULL, 'BlackLabel', 'Modell2', 'Kurzarm'),
(10, 'Ein sportliches kurzärmeliges Funktionsshirt.', 24.99, 'product5.jpeg', NULL, 'NotoriuusB', 'Modell3', 'Kurzarm'),
(11, 'Ein bequemes kurzärmeliges Freizeithemd.', 34.99, 'product6.jpeg', NULL, 'NotoriuusB', 'Modell4', 'Kurzarm'),
(12, 'Ein flippiges Design Lorem Ipsum.', 39.99, 'langarm_blau.jpeg', NULL, 'SmileyFace', 'Blue', 'Langarm'),
(13, 'Ein warmes gemütliches Schirt aus 100% Baumwolle.', 49.99, 'langarm_gelb.jpeg', NULL, 'Sunfactory', 'Yellow', 'Langarm');

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Daten für Tabelle `users`
--

INSERT INTO `users` (`id`, `username`, `firstname`, `lastname`, `email`, `password`) VALUES
(2, 'el_stefano', 'stefan', 'ionica', 'stefan@gmail.com', '$2y$10$7OxLYx1YIMyYONfnX7AMpePrCIAPCKIouQ006K7QkHzq0QdH8gYNm'),
(5, 'admin', 'stefan', 'admin', 'admin@admin.com', '$2y$10$Uvqs/tiN8HCG4PmR0dAMguaQyuSgitDcx2PUJB/k06UycQ7QZugPS');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indizes für die Tabelle `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT für Tabelle `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;


-- add missing columns to users table
ALTER TABLE `users` ADD `address` VARCHAR(255) NOT NULL AFTER `password`, ADD `postcode` INT(4) NOT NULL AFTER `address`, ADD `city` VARCHAR(255) NOT NULL AFTER `postcode`;