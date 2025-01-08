-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 08 Oca 2025, 11:46:21
-- Sunucu sürümü: 10.11.8-MariaDB
-- PHP Sürümü: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `yapaynetwork`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arsalar`
--

CREATE TABLE `arsalar` (
  `id` int(11) NOT NULL,
  `arsa_adi` varchar(255) DEFAULT NULL,
  `sahibi` varchar(255) DEFAULT NULL,
  `bolge` varchar(255) DEFAULT NULL,
  `arsa_alani` float DEFAULT NULL,
  `arsa_resim` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek`
--

CREATE TABLE `destek` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) DEFAULT NULL,
  `mesaj` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;


-- Tablo için tablo yapısı `giris_log`
--

CREATE TABLE `giris_log` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) DEFAULT NULL,
  `ip_adresi` varchar(50) DEFAULT NULL,
  `tarih` date DEFAULT NULL,
  `saat` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--


-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `ip` varchar(45) NOT NULL,
  `ad` varchar(50) NOT NULL,
  `soyad` varchar(50) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `onaylimi` varchar(5) NOT NULL,
  `telefon` varchar(20) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `premium` varchar(5) NOT NULL,
  `para` int(11) NOT NULL,
  `elmas` int(11) NOT NULL,
  `banka` int(11) NOT NULL,
  `demir` int(11) NOT NULL,
  `odun` int(11) NOT NULL,
  `plastik` int(11) NOT NULL,
  `petrol` int(11) NOT NULL,
  `bor` int(11) NOT NULL,
  `elektrik` int(11) NOT NULL,
  `internet` int(11) NOT NULL,
  `su` int(11) NOT NULL,
  `pasker` int(11) NOT NULL,
  `er` int(11) NOT NULL,
  `komando` int(11) NOT NULL,
  `itibar` int(11) NOT NULL,
  `profil_resmi` varchar(255) DEFAULT NULL,
  `son_tahsilat` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--

--
-- Tablo için tablo yapısı `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `message` text DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--

--
-- Tablo için indeksler `arsalar`
--
ALTER TABLE `arsalar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `destek`
--
ALTER TABLE `destek`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `giris_log`
--
ALTER TABLE `giris_log`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arsalar`
--
ALTER TABLE `arsalar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `destek`
--
ALTER TABLE `destek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `giris_log`
--
ALTER TABLE `giris_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
