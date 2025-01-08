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

--
-- Tablo döküm verisi `arsalar`
--

INSERT INTO `arsalar` (`id`, `arsa_adi`, `sahibi`, `bolge`, `arsa_alani`, `arsa_resim`) VALUES
(1, 'Düz Arsa', '2', 'istanbul', 500, 'https://buildstate.com.tr/arsalar/resim/düz.jpg'),
(2, 'Orman Arsa', '4', 'kocaeli', 2000, 'https://buildstate.com.tr/arsalar/resim/orman.jpg'),
(3, 'Taşlık Arsa', '56', 'istanbul', 20000, 'https://buildstate.com.tr/arsalar/resim/taşlık.jpg'),
(4, 'Düz Arsa', 'yok', 'Ankara', 2500, 'https://buildstate.com.tr/arsalar/resim/düz.jpg'),
(5, 'Düz Arsa', '2', 'Ankara', 1000, 'https://buildstate.com.tr/arsalar/resim/düz.jpg'),
(6, 'a', '1', 'a', 1, '1'),
(7, 'a', '2', 'a', 1, '1');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `destek`
--

CREATE TABLE `destek` (
  `id` int(11) NOT NULL,
  `ad` varchar(255) DEFAULT NULL,
  `mesaj` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Tablo döküm verisi `destek`
--

INSERT INTO `destek` (`id`, `ad`, `mesaj`) VALUES
(1, 'axa', 'acscs'),
(2, 'musa', 'deneme\r\n'),
(3, 'adam', 'deneme'),
(4, 'Hamza', 'Demir 15 dolar bende 150 dolar var 10 tane al dedim bana fakirsin dedi '),
(5, 'Galas', 'Selamlar mÃ¼hteÅŸem bir oyun demir aldÄ±m ama satamadÄ±m ÅŸimdi gÃ¶tÃ¼me sokuyorum teÅŸekkÃ¼rler');

-- --------------------------------------------------------

--
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
-- Tablo döküm verisi `giris_log`
--

INSERT INTO `giris_log` (`id`, `kullanici_adi`, `ip_adresi`, `tarih`, `saat`) VALUES
(1, 'beykozmusa78@gmail.com', '176.235.146.90', '2024-11-06', '23:41:07'),
(2, 'beykozmusa78@gmail.com', '176.235.146.90', '2024-11-07', '02:42:51'),
(3, 'beykozmusa78@gmail.com', '193.255.60.140', '2024-11-07', '14:09:13'),
(4, 'beykozmusa78@gmail.com', '193.255.60.140', '2024-11-07', '16:28:49'),
(5, 'beykozmusa78@gmail.com', '193.255.60.140', '2024-11-07', '17:32:49'),
(6, 'beykozmusa78@gmail.com', '176.235.146.90', '2024-11-08', '00:10:12'),
(7, 'beykozmusa79@gmail.com', '176.227.43.104', '2024-11-08', '00:24:41'),
(8, 'beykozmusa79@gmail.com', '193.255.60.140', '2024-11-08', '15:46:04'),
(9, 'beykozmusa78@gmail.com', '193.255.60.140', '2024-11-08', '15:46:26'),
(10, 'beykozmusa79@gmail.com', '178.247.152.77', '2024-11-12', '13:49:30'),
(11, 'beykozmusa79@gmail.com', '178.247.152.77', '2024-11-12', '15:33:49'),
(12, 'beykozmusa78@gmail.com', '178.247.152.77', '2024-11-13', '11:44:12'),
(13, 'beykozmusa78@gmail.com', '176.235.146.90', '2024-11-17', '21:02:25'),
(14, 'mertyavas609@gmail.com', '178.245.82.185', '2024-11-17', '21:03:03'),
(15, 'mertyavas609@gmail.com', '178.245.82.185', '2024-11-17', '21:04:57'),
(16, 'beykozmusa78@gmail.com', '176.220.199.74', '2024-11-23', '14:35:42'),
(17, 'beykozmusa79@gmail.com', '176.235.146.90', '2024-11-25', '11:39:19'),
(18, 'a@a', '176.89.113.198', '2024-11-30', '21:01:20'),
(19, 'a@a', '176.89.113.198', '2024-12-01', '10:01:24'),
(20, 'a@a', '176.89.113.198', '2024-12-01', '10:02:26'),
(21, 'semapistav32@gmail.com', '94.235.121.78', '2024-12-11', '18:33:37'),
(22, 'asude.kardelen@hotmail.com', '176.220.116.17', '2024-12-25', '23:15:08'),
(23, 'RECEPTAYYIP123@gmail.com', '193.255.60.140', '2024-12-26', '09:55:21'),
(24, 'pinal@pinal', '193.255.60.140', '2024-12-26', '20:00:58'),
(25, 'a@a', '188.58.83.78', '2025-01-06', '14:35:09');

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
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `ip`, `ad`, `soyad`, `mail`, `onaylimi`, `telefon`, `sifre`, `premium`, `para`, `elmas`, `banka`, `demir`, `odun`, `plastik`, `petrol`, `bor`, `elektrik`, `internet`, `su`, `pasker`, `er`, `komando`, `itibar`, `profil_resmi`, `son_tahsilat`) VALUES
(1, '188.58.83.78', 'Musa', 'Bey', 'a@a', 'Hayır', '1', '$2y$10$0yaN.e92j0nmuLQplwSW7.0OwES98SamMuqTYeRBc7bPdTIfvNhnm', 'Yok', -9800, 5, 9900, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-12-01 07:03:25'),
(2, '94.235.121.78', 'Sema', 'Piştav', 'semapistav32@gmail.com', 'Hayır', '05539732561', '$2y$10$kYxKsnDzOzoFhX.JE8w.9ONzbnz.EiVSwI0W0zAKsq13FqDuy6qrW', 'Yok', 200, 5, 100, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-12-11 15:34:44'),
(3, '176.220.116.17', 'Kardelen', 'Çelik', 'asude.kardelen@hotmail.com', 'Hayır', '5510252582', '$2y$10$BlJvizD.oZOUmxpD6PDS0O5vtV9P9nEYcyjFhJMOhTv6H4UKodBLq', 'Yok', 200, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-12-25 20:16:08'),
(4, '193.255.60.140', 'Recep Tayyip ', 'Erdoğan', 'RECEPTAYYIP123@gmail.com', 'Hayır', '05524473556', '$2y$10$3jlcJBvdtYplibqr1C0p1OaEwbYHZjy.ewQRJYlWR6nK9srlkbiPa', 'Yok', 200, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-12-26 06:57:27'),
(5, '193.255.60.140', 'besir', 'batuhan', 'pinal@pinal', 'Hayır', '0000000000000', '$2y$10$ecP4Hg2b0Lbcfv7AJoZwhuIz16ssckBGNAWC4q5F80ZRfI6YtR9c.', 'Yok', 100, 5, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2024-12-26 17:00:48');

-- --------------------------------------------------------

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
-- Tablo döküm verisi `messages`
--

INSERT INTO `messages` (`id`, `sender_id`, `message`, `timestamp`) VALUES
(1, 1, 'Sa', '2024-08-15 17:59:01'),
(2, 1, 'Hop', '2024-08-15 18:01:13'),
(3, 1, '17 aÄŸustos cumartesi ', '2024-08-17 06:01:09'),
(4, 1, '', '2024-08-17 06:01:20'),
(5, 1, '', '2024-08-17 06:01:24'),
(6, 1, '', '2024-08-17 06:01:26'),
(7, 1, '', '2024-08-17 06:01:27'),
(8, 1, '', '2024-08-17 06:01:28'),
(9, 1, '', '2024-08-17 06:01:30'),
(10, 1, '', '2024-08-17 06:01:31'),
(11, 1, '', '2024-08-17 06:01:32'),
(12, 1, '', '2024-08-17 06:01:35'),
(13, 1, '', '2024-08-17 06:01:38'),
(14, 1, '', '2024-08-17 06:01:39'),
(15, 1, '', '2024-08-17 06:01:40'),
(16, 1, '', '2024-08-17 06:01:41'),
(17, 1, '', '2024-08-17 06:01:43'),
(18, 1, '', '2024-08-17 06:01:44'),
(19, 1, '', '2024-08-17 06:01:45'),
(20, 1, '', '2024-08-17 06:01:46'),
(21, 1, '', '2024-08-17 06:01:46'),
(22, 1, '', '2024-08-17 06:01:48'),
(23, 1, '', '2024-08-17 06:01:49'),
(24, 1, '', '2024-08-17 06:01:50'),
(25, 1, '', '2024-08-17 06:01:51'),
(26, 1, '', '2024-08-17 06:01:54'),
(27, 1, '', '2024-08-17 06:01:55'),
(28, 1, '', '2024-08-17 06:01:56'),
(29, 1, '', '2024-08-17 06:01:57'),
(30, 1, '', '2024-08-17 06:01:58'),
(31, 1, '', '2024-08-17 06:01:59'),
(32, 1, '', '2024-08-17 06:02:00'),
(33, 1, 'Deneme', '2024-08-17 06:02:06'),
(34, 1, 'Deneme', '2024-08-17 06:02:09'),
(35, 1, 'Sa', '2024-08-17 06:02:45'),
(36, 1, '', '2024-08-17 06:03:10'),
(37, 44, 'sa', '2024-08-18 20:42:58'),
(38, 39, 'Ses 1  2   3 ', '2024-08-19 07:58:44'),
(39, 41, 'sa', '2024-08-19 08:43:18'),
(40, 1, 'VealeykÃ¼mselam', '2024-08-19 09:40:01'),
(41, 1, 'BazÄ± bÃ¶lÃ¼mler geÃ§ici olarak kapalÄ±dÄ±r', '2024-08-19 09:51:35'),
(42, 1, 'Profil bÃ¶lÃ¼mÃ¼ dÃ¼zenlendi test etmek isteyene elmas gÃ¶nderebilirim', '2024-08-19 19:17:24'),
(43, 30, '.', '2024-08-31 19:17:08'),
(44, 1, 'onur reis', '2024-09-02 21:17:41'),
(45, 52, 'Salmun Alaykum', '2024-09-25 21:32:40'),
(46, 53, 'VealyÃ§eykumselam', '2024-09-25 21:33:03'),
(47, 53, 'LA MUSAAAAAA', '2024-09-25 21:40:54'),
(48, 52, 'Pay to win bi oyun sizi kÄ±nÄ±yorum !', '2024-09-25 21:43:43'),
(49, 53, 'ELMAS LAZIM', '2024-09-25 21:43:44'),
(50, 53, 'Pekka', '2024-09-25 21:44:19'),
(51, 53, 'Golem', '2024-09-25 21:44:24'),
(52, 53, 'Binici', '2024-09-25 21:44:30'),
(53, 52, 'KS NÄ°ZÄ° YAPIN', '2024-09-25 21:44:31'),
(54, 54, 'HayÄ±rlÄ± olsun karÅŸm', '2024-09-30 11:10:03'),
(55, 1, 'selamun aleykÃ¼m', '2024-10-02 12:00:22'),
(56, 2, '1', '2024-11-02 17:39:03'),
(57, 56, 'sa', '2024-11-02 19:11:41'),
(58, 56, 'sa', '2024-11-02 19:11:43'),
(59, 2, 'aleykÃ¼m selam', '2024-11-02 19:11:46'),
(60, 56, 'gardaÅŸ amÄ±num ben bu arsayÄ± gÃ¶tÃ¼memi sokacam', '2024-11-02 19:16:58'),
(61, 56, 'parayÄ± nerde harcÄ±yoz amk', '2024-11-02 19:17:12'),
(62, 56, 'nasÄ± bi ÅŸehirse pavyonda yok', '2024-11-02 19:17:22'),
(63, 56, 'PAVYON Ä°STÄ°YORUZ ADMÄ°N', '2024-11-02 19:17:30'),
(64, 2, 'aman hocam', '2024-11-02 19:20:06'),
(65, 56, 'PAVYON Ä°STÄ°YORUZ ADMÄ°N', '2024-11-02 19:20:19'),
(66, 2, '1', '2024-11-03 15:58:28'),
(67, 1, '1', '2024-11-08 12:46:11'),
(68, 2, '32', '2024-11-08 12:46:36'),
(69, 2, 'buraya mesaj yazabilirsiniz', '2024-11-17 18:03:04'),
(70, 2, 'wee', '2024-11-23 11:35:55'),
(71, 1, 'Sa', '2024-11-30 18:02:03'),
(72, 1, 'Naber', '2024-12-01 07:04:09');

--
-- Dökümü yapılmış tablolar için indeksler
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
