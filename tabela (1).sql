-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 08 Ara 2024, 18:43:15
-- Sunucu sürümü: 10.4.32-MariaDB
-- PHP Sürümü: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `tabela`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `aboutpage`
--

CREATE TABLE `aboutpage` (
  `id` int(11) NOT NULL,
  `text` varchar(3000) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `aboutpage`
--

INSERT INTO `aboutpage` (`id`, `text`, `img`) VALUES
(1, 'Online Reklam Ltd Şti. 2012 yılında ticari bir fikir olarak doğmuştur. Sektöre inovasyon katarak dijital sistemin maliyetleri düşürmesi ile daha az maliyetle kaliteli imalat yolunda adımlar izlemiş, sonrasında kendi çalışmaları ile gelişimini sürdürmüştür. Açık hava reklam sektöründe, tabela için hızlı fiyat teklifi almak çok mümkün değil. Bu talebi karşılamak fikriyle yola çıkan şirketimiz \"Anında fiyat teklifi ile reklam sektöründe devrim yaratarak en uygun fiyatı vermek\" ilkesiyle, geçen süreçte Türkiye’deki, en büyük online çalışan reklam firmalarından biri olmayı başarmıştır ve aynı zamanda anlık fiyat verme yeteneği ile dünyada ilktir. Yazılım, arge ve inavasyon çalışmalarından sonra 2013 sonlarında ticari faaliyetine başlayan şirketimiz 350 si yurt dışına 3400\' ün üzerinde tabelayı projelendirip montaja hazır hali ile kargolayıp göndermiştir. Geçen süre içinde Türkiye\'nin en fazla teklif veren ve talep toplayan reklam şirketi olarak kurulduğu günden buyana 500.000 \'in üzerinde ziyaretçiye ulaşmıştır.', 'contact.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE `admin` (
  `aid` int(10) NOT NULL,
  `name` varchar(33) NOT NULL,
  `password` varchar(33) NOT NULL,
  `role` int(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`aid`, `name`, `password`, `role`) VALUES
(1, 'ahmet', '202cb962ac59075b964b07152d234b70', 1),
(2, 'mehmet', '202cb962ac59075b964b07152d234b70', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `userid` int(30) NOT NULL,
  `name` varchar(30) NOT NULL,
  `price` int(30) NOT NULL,
  `image` varchar(30) NOT NULL,
  `quantity` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `cart`
--

INSERT INTO `cart` (`id`, `userid`, `name`, `price`, `image`, `quantity`) VALUES
(9, 0, '0', 300, 'table.jpg', 1),
(10, 0, '3', 5000, '3dtabela.jpg', 1),
(11, 0, '0', 300, 'table.jpg', 5),
(25, 0, 'Led Tabela', 500, 'img1.jpg', 2),
(52, 7, 'Aydınlatmalı Tabela', 455, 'AYAKLI-FENER-ABELA-1000x1000.j', 11),
(53, 7, 'Led', 100, 'led.jpg', 1),
(54, 7, '3D Tabela', 5000, '3dtabela.jpg', 1),
(55, 7, 'Led Tabela', 450, 'ledtabela.jpg', 1),
(56, 7, 'Masa', 600, 'table.jpg', 1),
(57, 7, 'Aydınlatmalı Tabela', 455, 'AYAKLI-FENER-ABELA-1000x1000.j', -1),
(58, 7, 'Aydınlatmalı Tabela', 455, 'AYAKLI-FENER-ABELA-1000x1000.j', -1),
(59, 0, 'Aydınlatmalı Tabela', 455, 'AYAKLI-FENER-ABELA-1000x1000.j', 1),
(60, 0, 'Aydınlatmalı Tabela', 0, 'AYAKLI-FENER-ABELA-1000x1000.j', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `contactpage`
--

CREATE TABLE `contactpage` (
  `id` int(11) NOT NULL,
  `insta` varchar(30) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `mail` varchar(30) NOT NULL,
  `map` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `contactpage`
--

INSERT INTO `contactpage` (`id`, `insta`, `phone`, `mail`, `map`) VALUES
(1, 'otabela', '90 555 444 33 22', 'posta@mail.com', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3012.1835292847686!2d28.7368651!3d40.9774619!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x14b55f0c701ff783%3A0x4122c51400c80e08!2sOnline%20Tabela%20Kutu%20Harf!5e0!3m2!1str!2str!4v1723386730908!5m2!1str!2str');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `indexpage`
--

CREATE TABLE `indexpage` (
  `id` int(11) NOT NULL,
  `text` varchar(1000) NOT NULL,
  `img` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `indexpage`
--

INSERT INTO `indexpage` (`id`, `text`, `img`) VALUES
(1, 'Online Reklam Ltd Şti. 2012 yılında ticari bir fikir olarak doğmuştur.Sektöre inovasyon katarak dijital sistemin maliyetleri düşürmesi ile daha az maliyetle kaliteli imalat yolunda adımlar izlemiş,sonrasında kendi çalışmaları ile gelişimini sürdürmüştür.', 'index.jpg');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `products`
--

CREATE TABLE `products` (
  `id` int(100) NOT NULL,
  `count` int(30) NOT NULL,
  `price` varchar(11) NOT NULL,
  `image` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `products`
--

INSERT INTO `products` (`id`, `count`, `price`, `image`, `name`, `description`) VALUES
(1, 15, '455', 'AYAKLI-FENER-ABELA-1000x1000.jpg', 'Aydınlatmalı Tabela', 'Led aydınlatmalı tabela'),
(3, 200, '100', 'led.jpg', 'Led', 'Döşemelik rgb aydınlatmalı led'),
(4, 6, '5000', '3dtabela.jpg', '3D Tabela', '3D Gösterişli tabela'),
(5, 300, '450', 'ledtabela.jpg', 'Led Tabela', 'Led animasyonlu standart tabela'),
(7, 120, '600', 'table.jpg', 'Masa', 'Standart Masa');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `users`
--

CREATE TABLE `users` (
  `id` int(100) NOT NULL,
  `name` varchar(30) NOT NULL,
  `surname` varchar(30) NOT NULL,
  `phonenumber` varchar(15) NOT NULL,
  `mail` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Tablo döküm verisi `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `phonenumber`, `mail`, `password`) VALUES
(7, 'aa', 'aa', '11', 'aa@a.com', '4124bc0a9335c27f086f24ba207a4912'),
(8, 'ss', 'ss', '11', 'ss@s.com', '4124bc0a9335c27f086f24ba207a4912'),
(9, 'asd', 'asd', '123453243232432', 'asd@gma.com', '7815696ecbf1c96e6894b779456d330e');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `aboutpage`
--
ALTER TABLE `aboutpage`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Tablo için indeksler `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `contactpage`
--
ALTER TABLE `contactpage`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `indexpage`
--
ALTER TABLE `indexpage`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `aboutpage`
--
ALTER TABLE `aboutpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- Tablo için AUTO_INCREMENT değeri `contactpage`
--
ALTER TABLE `contactpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `indexpage`
--
ALTER TABLE `indexpage`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Tablo için AUTO_INCREMENT değeri `products`
--
ALTER TABLE `products`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Tablo için AUTO_INCREMENT değeri `users`
--
ALTER TABLE `users`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
