-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2020 at 10:30 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sajtphp2s1`
--

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `idKorisnik` int(11) NOT NULL,
  `ime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `prezime` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lozinka` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `lozinkaponovo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idUloga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`idKorisnik`, `ime`, `prezime`, `email`, `lozinka`, `lozinkaponovo`, `idUloga`) VALUES
(42, 'Viktorr', 'Ciric', 'viktorciric44@gmail.com', 'viktor98', 'viktor98', 1),
(43, 'Viktor', 'Ciric', 'viktor@gmail.com', 'viktor98', 'viktor98', 2),
(44, 'Viktor', 'Djokic', 'viktor66@gmail.com', 'viktor98', 'viktor98', 2),
(46, 'Djoka', 'Djokic', 'djokica@gmail.com', 'djokica123', 'djokica123', 2);

-- --------------------------------------------------------

--
-- Table structure for table `korpa`
--

CREATE TABLE `korpa` (
  `idKorpa` int(11) NOT NULL,
  `idkorisnik` int(10) NOT NULL,
  `idProizvodZapremina` int(10) NOT NULL,
  `Kolicina` int(10) NOT NULL,
  `adresaIsporuke` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `VremePorudzbine` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `korpa`
--

INSERT INTO `korpa` (`idKorpa`, `idkorisnik`, `idProizvodZapremina`, `Kolicina`, `adresaIsporuke`, `VremePorudzbine`) VALUES
(16, 42, 15, 4, 'Vojvode Stepe 411', '2020-01-31 23:01:21'),
(18, 42, 19, 6, 'Vojvode Stepe 411', '2019-12-31 23:01:24'),
(19, 42, 22, 3, 'Vojvode Stepe 411', '2020-02-01 10:55:46'),
(28, 42, 14, 5, 'Generala Stefanika 10', '2020-02-08 11:59:21'),
(29, 46, 20, 1, 'Vojvode Stepe 411E', '2020-02-08 12:18:10');

-- --------------------------------------------------------

--
-- Table structure for table `meni`
--

CREATE TABLE `meni` (
  `idMeni` int(11) NOT NULL,
  `link` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `text` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `meni`
--

INSERT INTO `meni` (`idMeni`, `link`, `text`, `status`) VALUES
(1, 'pocetna', 'POČETNA', 0),
(2, 'proizvodi', 'proizvodi', 0),
(5, 'kontakt', 'kontakt', 0),
(6, 'prijava', 'prijava', 2),
(7, 'odjava', 'odjava', 3),
(8, 'admin', 'admin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `ocena`
--

CREATE TABLE `ocena` (
  `idOcena` int(11) NOT NULL,
  `ocena` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ocena`
--

INSERT INTO `ocena` (`idOcena`, `ocena`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 4),
(5, 5);

-- --------------------------------------------------------

--
-- Table structure for table `ocenjivanje`
--

CREATE TABLE `ocenjivanje` (
  `idOcenjivanje` int(11) NOT NULL,
  `idkorisnik` int(5) NOT NULL,
  `idProizvod` int(5) NOT NULL,
  `idOcena` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `ocenjivanje`
--

INSERT INTO `ocenjivanje` (`idOcenjivanje`, `idkorisnik`, `idProizvod`, `idOcena`) VALUES
(1, 42, 71, 4),
(2, 42, 66, 4),
(3, 42, 67, 2),
(4, 42, 72, 3),
(5, 42, 73, 5),
(6, 42, 70, 2);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodi`
--

CREATE TABLE `proizvodi` (
  `idProizvod` int(255) NOT NULL,
  `opis` text COLLATE utf8_unicode_ci NOT NULL,
  `slikam` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slikav` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `alkohol` int(10) NOT NULL,
  `idmarka` int(20) NOT NULL,
  `idvrsta` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodi`
--

INSERT INTO `proizvodi` (`idProizvod`, `opis`, `slikam`, `slikav`, `alkohol`, `idmarka`, `idvrsta`) VALUES
(66, 'Svetlo, jako, prijatne gorčine, koja nije napadna i poziva na još jedno i još jedno… Arome karamele, začina, i sušenog svetlog voća. Jakog tela sa ukusom karamele, blage borovine, voća i prijatnih začina. Napravljena sa šest vrsti hmelja.\r\n\r\n', 'app/assets/slike/pilsnerkabinet.jpg', 'app/assets/slike/pilsnerkabinet.jpg', 7, 3, 2),
(67, 'Svetlo pivo laganog, ali veoma odlučnog tela. Hmelj korišćen u njegovom spravljanju daje mu cvetno-zemljanu aromu. Osvežavajuće pivo za sve prilike. Dostojno svog imena, pravi je predstavnik svetlih Ale piva bez hladnog hmeljenja. ', 'app/assets/slike/saltopale.jpg', 'app/assets/slike/saltopale.jpg', 5, 4, 4),
(68, 'Zakonom pivske privlačnosti svačiji favorit. Nenametljiv, a zagonetno privlačan. Diskretne cvetno-citrusne arome Cascade hmelja, uz podršku egzotičnog Chinooka, daju ovom svetlom ejlu pitkost i osvežavajuću notu. Klasika.', 'app/assets/slike/gvintpale.jpg', 'app/assets/slike/gvintpale.jpg', 6, 5, 4),
(69, 'Klasičan američki svetli ejl. Glavni adut ovog piva je CASCADE hmelj koji pivu daje blage začinske, cvetne pa i citrusne arome i ukuse. Prijatna gorčina i umerena količina alkohola učiniće da se ovom pivu vraćate iznova i iznova, naročito u letnjim danima, a neretko i da preterate u njegovom ispijanju.', 'app/assets/slike/gvint.jpg', 'app/assets/slike/gvint.jpg', 4, 5, 2),
(70, 'Staro pivo jakog, upečatljivog karaktera tamno crvene boje. Pun ukus ječma sa karamelnom notom kristalnog slada čini ga nesvakidašnjim desertnim pivom koje svaki gutljaj pretvara u pravo zadovoljstvo. ', 'app/assets/slike/gvintt.jpg', 'app/assets/slike/gvintt.jpg', 8, 5, 3),
(71, 'Kako ovom lageru dolikuje, dali smo mu pitku gorčinu, a spojem svetlog, bečkog i još 3 vrste karamel ječmenih sladova i reš prepečenog ječma, dobili smo uravnotežen ukus sa suptilno slatkom notom, zbog koje će vam odlazak na “samo jedno pivo” postati krajnje neumesna laž.\r\nEvropski lager, neopterećujućeg i blago slatkastog ukusa!', 'app/assets/slike/slif.jpg', 'app/assets/slike/slif.jpg', 5, 6, 1),
(72, 'Tamno ili kako mu Bavarci tepaju Dunkel, je naš lager koji nastaje sudarom čokoladnog, dva minhenska i dva karamel ječmena slada sa nemačkim hmeljom. A od tamnih sladova potiče njegov pun ukus, o kome vredi raspravljati, ali što bi se time zamarali uz ‘ladno pivo?', 'app/assets/slike/sliftamni.jpg', 'app/assets/slike/sliftamni.jpg', 8, 6, 3),
(73, 'Pletena korpa puna šarenog voća čije arome eksplodiraju i preliju vas kad joj se približite! Od dinje, manga i mandarine do nežnijih cvetnih aroma, sve je tu…A opet skladno složeno u paleti boja i mirisa koju samo IPA može da ponudi. Završnica duga i izražena, sa gorčinom koja je jasno prisutna ali nenaglašena i definitivno prija Vašem nepcu. Prethodi joj skladno, punije, uljasto telo, spremno da iznese aromatski profil ovog piva.', 'app/assets/slike/pilsnerkabinet2.jpg', 'app/assets/slike/pilsnerkabinet2.jpg', 6, 3, 2),
(74, 'sdfsdfs', 'app/assets/slike/1580559147malaxiaomi1.png', 'app/assets/slike/1580559147velikaxiaomi1.png', 234, 4, 1),
(75, 'fggdfg', 'app/assets/slike/1580559486malamatura.jpg', 'app/assets/slike/1580559486velikamatura.jpg', 5, 3, 2),
(76, 'sdfsdfsdf', 'app/assets/slike/1580559441malaxiaomi4.png', 'app/assets/slike/1580559441velikaxiaomi4.png', 22, 3, 1),
(77, 'dsadasdds', 'app/assets/slike/1580991815mala1559404058malasam3.png', 'app/assets/slike/1580991815velika1559404058malasam3.png', 111, 3, 1),
(78, 'sdfsdfs', 'app/assets/slike/1580996153mala', 'app/assets/slike/1580996153velika', 20000, 4, 1),
(79, 'xvxcv', 'app/assets/slike/1580996190mala', 'app/assets/slike/1580996190velika', 20000, 3, 1),
(80, '', 'app/assets/slike/1580996272malasam1.png', 'app/assets/slike/1580996272velikasam1.png', 0, 3, 1),
(81, 'fhgfhfgh', 'app/assets/slike/1581001823malasl3.jpg', 'app/assets/slike/1581001823velikasl3.jpg', 100, 3, 2),
(82, 'q', 'app/assets/slike/1581263633malaxiaomi4.png', 'app/assets/slike/1581263633velikaxiaomi4.png', 20000, 6, 1),
(83, 'xxcvxcv', 'app/assets/slike/1581269814mala1559403900malasam1.png', 'app/assets/slike/1581269814velika1559403900malasam1.png', 20000, 6, 4);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodjac`
--

CREATE TABLE `proizvodjac` (
  `idMarka` int(10) NOT NULL,
  `nazivProizvodjaca` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `idZemlja` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodjac`
--

INSERT INTO `proizvodjac` (`idMarka`, `nazivProizvodjaca`, `idZemlja`) VALUES
(3, 'Kabinet', 6),
(4, 'Salto', 6),
(5, 'Gvint', 6),
(6, 'Šlif', 6);

-- --------------------------------------------------------

--
-- Table structure for table `proizvodzapremina`
--

CREATE TABLE `proizvodzapremina` (
  `idproizvodZapremina` int(20) NOT NULL,
  `idProizvod` int(20) NOT NULL,
  `idZapremina` int(20) NOT NULL,
  `cena` float NOT NULL,
  `datumPostavljanja` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `proizvodzapremina`
--

INSERT INTO `proizvodzapremina` (`idproizvodZapremina`, `idProizvod`, `idZapremina`, `cena`, `datumPostavljanja`) VALUES
(14, 66, 5, 290, '2020-01-01 15:47:16'),
(15, 67, 5, 280, '2020-01-20 15:47:16'),
(16, 68, 5, 300, '2020-02-01 15:47:16'),
(17, 68, 6, 350, '2020-02-01 15:47:16'),
(19, 70, 5, 320, '2020-02-01 15:47:16'),
(20, 71, 5, 200, '2020-02-01 15:47:16'),
(21, 71, 6, 270, '2020-02-01 15:47:16'),
(22, 72, 5, 450, '2020-02-01 15:47:16'),
(23, 69, 5, 210, '2020-02-01 15:47:16'),
(24, 73, 5, 370, '2020-02-01 15:47:16');

-- --------------------------------------------------------

--
-- Table structure for table `uloge`
--

CREATE TABLE `uloge` (
  `idUloga` int(10) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `uloge`
--

INSERT INTO `uloge` (`idUloga`, `naziv`) VALUES
(1, 'Admin'),
(2, 'Korisnik');

-- --------------------------------------------------------

--
-- Table structure for table `vrsta`
--

CREATE TABLE `vrsta` (
  `idVrsta` int(11) NOT NULL,
  `nazivVrste` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vrsta`
--

INSERT INTO `vrsta` (`idVrsta`, `nazivVrste`) VALUES
(1, 'Lager'),
(2, 'Pilsner'),
(3, 'Tamno'),
(4, 'Pale Ale');

-- --------------------------------------------------------

--
-- Table structure for table `zapremina`
--

CREATE TABLE `zapremina` (
  `idzapremina` int(10) NOT NULL,
  `kolicina` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zapremina`
--

INSERT INTO `zapremina` (`idzapremina`, `kolicina`) VALUES
(5, 0.33),
(6, 0.5);

-- --------------------------------------------------------

--
-- Table structure for table `zemlja`
--

CREATE TABLE `zemlja` (
  `idZemlja` int(11) NOT NULL,
  `naziv` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `zemlja`
--

INSERT INTO `zemlja` (`idZemlja`, `naziv`) VALUES
(6, 'Srbija');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`idKorisnik`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `idUloga` (`idUloga`);

--
-- Indexes for table `korpa`
--
ALTER TABLE `korpa`
  ADD PRIMARY KEY (`idKorpa`),
  ADD KEY `idkorisnik` (`idkorisnik`),
  ADD KEY `idProizvodZapremina` (`idProizvodZapremina`);

--
-- Indexes for table `meni`
--
ALTER TABLE `meni`
  ADD PRIMARY KEY (`idMeni`);

--
-- Indexes for table `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`idOcena`);

--
-- Indexes for table `ocenjivanje`
--
ALTER TABLE `ocenjivanje`
  ADD PRIMARY KEY (`idOcenjivanje`),
  ADD KEY `idkorisnik` (`idkorisnik`),
  ADD KEY `idProizvod` (`idProizvod`),
  ADD KEY `idOcena` (`idOcena`);

--
-- Indexes for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD PRIMARY KEY (`idProizvod`),
  ADD KEY `idZemlja` (`idmarka`),
  ADD KEY `idvrsta` (`idvrsta`);

--
-- Indexes for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  ADD PRIMARY KEY (`idMarka`),
  ADD KEY `idZemlja` (`idZemlja`);

--
-- Indexes for table `proizvodzapremina`
--
ALTER TABLE `proizvodzapremina`
  ADD PRIMARY KEY (`idproizvodZapremina`),
  ADD KEY `idProizvod` (`idProizvod`),
  ADD KEY `idZapremina` (`idZapremina`);

--
-- Indexes for table `uloge`
--
ALTER TABLE `uloge`
  ADD PRIMARY KEY (`idUloga`);

--
-- Indexes for table `vrsta`
--
ALTER TABLE `vrsta`
  ADD PRIMARY KEY (`idVrsta`);

--
-- Indexes for table `zapremina`
--
ALTER TABLE `zapremina`
  ADD PRIMARY KEY (`idzapremina`);

--
-- Indexes for table `zemlja`
--
ALTER TABLE `zemlja`
  ADD PRIMARY KEY (`idZemlja`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `idKorisnik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `korpa`
--
ALTER TABLE `korpa`
  MODIFY `idKorpa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `meni`
--
ALTER TABLE `meni`
  MODIFY `idMeni` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ocena`
--
ALTER TABLE `ocena`
  MODIFY `idOcena` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `ocenjivanje`
--
ALTER TABLE `ocenjivanje`
  MODIFY `idOcenjivanje` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proizvodi`
--
ALTER TABLE `proizvodi`
  MODIFY `idProizvod` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  MODIFY `idMarka` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `proizvodzapremina`
--
ALTER TABLE `proizvodzapremina`
  MODIFY `idproizvodZapremina` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `uloge`
--
ALTER TABLE `uloge`
  MODIFY `idUloga` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `vrsta`
--
ALTER TABLE `vrsta`
  MODIFY `idVrsta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `zapremina`
--
ALTER TABLE `zapremina`
  MODIFY `idzapremina` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `zemlja`
--
ALTER TABLE `zemlja`
  MODIFY `idZemlja` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD CONSTRAINT `korisnik_ibfk_1` FOREIGN KEY (`idUloga`) REFERENCES `uloge` (`idUloga`);

--
-- Constraints for table `korpa`
--
ALTER TABLE `korpa`
  ADD CONSTRAINT `korpa_ibfk_1` FOREIGN KEY (`idProizvodZapremina`) REFERENCES `proizvodzapremina` (`idproizvodZapremina`) ON DELETE CASCADE,
  ADD CONSTRAINT `korpa_ibfk_2` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnik` (`idKorisnik`);

--
-- Constraints for table `ocenjivanje`
--
ALTER TABLE `ocenjivanje`
  ADD CONSTRAINT `ocenjivanje_ibfk_1` FOREIGN KEY (`idOcena`) REFERENCES `ocena` (`idOcena`),
  ADD CONSTRAINT `ocenjivanje_ibfk_2` FOREIGN KEY (`idProizvod`) REFERENCES `proizvodi` (`idProizvod`),
  ADD CONSTRAINT `ocenjivanje_ibfk_3` FOREIGN KEY (`idkorisnik`) REFERENCES `korisnik` (`idKorisnik`);

--
-- Constraints for table `proizvodi`
--
ALTER TABLE `proizvodi`
  ADD CONSTRAINT `proizvodi_ibfk_1` FOREIGN KEY (`idvrsta`) REFERENCES `vrsta` (`idVrsta`),
  ADD CONSTRAINT `proizvodi_ibfk_2` FOREIGN KEY (`idmarka`) REFERENCES `proizvodjac` (`idMarka`);

--
-- Constraints for table `proizvodjac`
--
ALTER TABLE `proizvodjac`
  ADD CONSTRAINT `proizvodjac_ibfk_1` FOREIGN KEY (`idZemlja`) REFERENCES `zemlja` (`idZemlja`);

--
-- Constraints for table `proizvodzapremina`
--
ALTER TABLE `proizvodzapremina`
  ADD CONSTRAINT `proizvodzapremina_ibfk_1` FOREIGN KEY (`idZapremina`) REFERENCES `zapremina` (`idzapremina`) ON DELETE CASCADE,
  ADD CONSTRAINT `proizvodzapremina_ibfk_2` FOREIGN KEY (`idProizvod`) REFERENCES `proizvodi` (`idProizvod`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
