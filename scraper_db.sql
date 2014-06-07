-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 10, 2014 at 02:51 PM
-- Server version: 5.6.11
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scraper_db`
--
CREATE DATABASE IF NOT EXISTS `scraper_db` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `scraper_db`;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`) VALUES
(1, 'Attractions'),
(2, 'Activities'),
(3, 'Nightlife'),
(4, 'Shopping'),
(5, 'Restaurants');

-- --------------------------------------------------------

--
-- Table structure for table `category_sections`
--

CREATE TABLE IF NOT EXISTS `category_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_fk` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `category_sections`
--

INSERT INTO `category_sections` (`id`, `category_fk`, `title`) VALUES
(1, 1, 'Museums'),
(2, 1, 'Cultural'),
(3, 1, 'Landmarks'),
(4, 1, 'Performances'),
(5, 1, 'Amusement'),
(6, 1, 'Sport'),
(7, 1, 'Outdoors'),
(8, 1, 'Zoos & Aquariums'),
(9, 2, 'Sightseeing Tours'),
(10, 2, 'Wellness&Spa'),
(11, 2, 'Food&Drink'),
(12, 2, 'Gear Rentals'),
(13, 2, 'Adventure'),
(14, 2, 'Classes'),
(15, 3, 'Bars'),
(16, 3, 'Clubs'),
(17, 4, 'All'),
(18, 5, '1 Star'),
(19, 5, '2 Star'),
(20, 5, '3 Star'),
(21, 5, '4 Star');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE IF NOT EXISTS `countries` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `capitol_fk` int(11) NOT NULL,
  `language` varchar(5) NOT NULL,
  `currency` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`id`, `title`, `capitol_fk`, `language`, `currency`) VALUES
(1, 'Spain', 0, 'es', 'euro'),
(2, 'France', 0, 'fr', 'euro'),
(3, 'Italy', 0, 'it', 'euro');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE IF NOT EXISTS `images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `poi_fk` int(11) NOT NULL,
  `src_original` varchar(300) NOT NULL,
  `src_local` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `poi_fk`, `src_original`, `src_local`) VALUES
(1, 8, 'http://www6.smartadserver.com/call/pubi/41747/282517/18202/S/%5Btimestamp%5D/?', 'images/?'),
(2, 8, 'http://media2.fcbarcelona.com/media/asset_publics/resources/000/031/976/size_349x196/059.v1350985125.JPG', 'images/059.v1350985125.JPG'),
(3, 8, 'http://media2.fcbarcelona.com/media/asset_publics/resources/000/032/308/size_349x196/069.v1351157504.JPG', 'images/069.v1351157504.JPG'),
(7, 11, 'http://www.tao.cat/wp-content/themes/briefed/functions/thumb.php?src=wp-content/uploads/2013/06/Reflexoterapia-barcelona.jpg&w=200&h=&zc=1&q=90&a=r', 'images/Reflexoterapia-barcelona.jpg&w=200&h=&zc=1&q=90&a=r'),
(8, 11, 'http://www.tao.cat/wp-content/uploads/2014/04/jojoba-100x100.jpg', 'images/jojoba-100x100.jpg'),
(9, 11, 'http://www.tao.cat/wp-content/themes/briefed/functions/thumb.php?src=wp-content/uploads/2013/06/anticelulitico-tao.jpg&w=200&h=&zc=1&q=90', 'images/anticelulitico-tao.jpg&w=200&h=&zc=1&q=90'),
(10, 9, 'http://www.lapedrera.com/sites/default/files/styles/crop215x172_home/public/215x172x_MG_9153.jpg,qitok=N7swjfQr.pagespeed.ic.v0w7hWvhDt.jpg', 'images/215x172x_MG_9153.jpg,qitok=N7swjfQr.pagespeed.ic.v0w7hWvhDt.jpg'),
(11, 9, 'http://www.lapedrera.com/sites/default/files/styles/crop215x172_home/public/215x172xElena,P20Rey,P20residencies,P20a,P20la,P20pedrera.jpg,qitok=ILMGTWBh.pagespeed.ic.r-kdTFLcTG.jpg', 'images/215x172xElena,P20Rey,P20residencies,P20a,P20la,P20pedrera.jpg,qitok=ILMGTWBh.pagespeed.ic.r-kdTFLcTG.jpg'),
(12, 15, 'http://www.roomin.es//img/entrar.png', 'images/entrar.png'),
(13, 15, 'http://www.roomin.es//img/entrar.png', 'images/entrar.png'),
(20, 16, 'http://www.mhcat.cat//extension/mhc/design/mhc/images/imgCat/capsalera_left.gif', 'images/capsalera_left.gif'),
(21, 16, 'http://www.mhcat.cat/var/mhc/storage/images/monuments/torre_de_la_manresana/58559-28-cat-ES/torre_de_la_manresana.jpg', 'images/torre_de_la_manresana.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE IF NOT EXISTS `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `type` varchar(10) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `countries_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `countries_fk` (`countries_fk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `title`, `type`, `latitude`, `longitude`, `countries_fk`) VALUES
(1, 'Madrid', 'city', 50, -7, 1),
(2, 'Barcelona', 'city', 50, -7, 1),
(3, 'Paris', 'city', 50, -7, 2),
(4, 'Lyon', 'city', 50, -7, 2),
(5, 'Cannes', 'city', 50, -7, 2),
(6, 'Nice', 'city', 50, -7, 2),
(7, 'Rome', 'city', 50, -7, 3),
(8, 'Milan', 'city', 50, -7, 3);

-- --------------------------------------------------------

--
-- Table structure for table `pois`
--

CREATE TABLE IF NOT EXISTS `pois` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `title` varchar(100) NOT NULL,
  `email` varchar(60) NOT NULL,
  `website` varchar(150) NOT NULL,
  `telephone` varchar(30) NOT NULL,
  `biography` text NOT NULL,
  `address` varchar(200) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `opening` varchar(200) NOT NULL,
  `admission` tinyint(1) NOT NULL,
  `category_fk` int(11) NOT NULL,
  `country_fk` int(11) NOT NULL,
  `location_fk` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=61 ;

--
-- Dumping data for table `pois`
--

INSERT INTO `pois` (`id`, `created_at`, `updated_at`, `title`, `email`, `website`, `telephone`, `biography`, `address`, `latitude`, `longitude`, `opening`, `admission`, `category_fk`, `country_fk`, `location_fk`) VALUES
(1, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Basilica of the Sagrada Familia', 'press@sagradafamilia.org', 'www.sagradafamilia.cat', '34-934-550-247', '', 'Sardenya Street, , Barcelona', 0, 0, '', 1, 0, 0, 0),
(2, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Palace of Catalan Music (Palau de la Musica Catalana)', 'visites@palaumusica.cat', 'http://www.palaumusica.cat/', 'Palace of Catalan Mu', '', 'Carrer del Palau de la Musica 4-6, Sant Pere, Eixample, Barcelona', 0, 0, '', 1, 0, 0, 0),
(3, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Casa Batllo', 'infovisites@casabatllo.cat', 'http://www.casabatllo.es/en', 'Casa Batllo', '', 'Passeig de Gracia, 43, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(4, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Aeroteca', 'simuteca@aeroteca.com', 'http://www.simuteca.com/', 'Aeroteca', '', 'Carrer del Montseny 22, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(5, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Afternoon in Montserrat', 'info@barcelonaturisme.cat', 'http://bcnshop.barcelonaturisme.com/Tarda-a-Montserrat/', 'Afternoon in Montser', '', 'Muntanya Montserrat, 08293, Barcelona, , Barcelona', 23, 255, '', 0, 0, 0, 0),
(6, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Guell Palace', 'palauguell@diba.cat', 'http://palauguell.cat/', 'Guell Palace', '', 'Carrer Nou de la Rambla 3-5, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(7, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Museu Nacional d&#039;Art de Catalunya - MNAC', 'info@mnac.cat', 'www.mnac.cat', '0034-93 622 03 76', '', 'Palau Nacional. Parc de Montjuic, Palau Nacional, Barcelona', 0, 0, '', 0, 0, 0, 0),
(8, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Camp Nou', 'oab@club.fcbarcelona.com', 'http://www.fcbarcelona.com/camp-nou', 'Camp Nou', '', 'Avinguda Aristides Maillol, , Barcelona', 5, 4, '', 1, 14, 1, 2),
(9, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'La Pedrera - Mila House (Casa Mila)77', 'web@fcatalunyalapedrera.com7', 'http://www.lapedrera.com/es/home 7', 'La Pedrera - Mila House (Casa ', 'qqqqqqqq wwwwwwwww', 'Carrer de Provenca 261 - 265, LEixample, Barcelona 99', 25, 59, '', 1, 1, 2, 0),
(10, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'El Tablao de Carmen', 'info@tablaodecarmen.com', 'http://www.tablaodecarmen.com/', '00-34-933256895', '', 'Avenida Francesc Ferrer i Guardia, 13, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(11, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'T.A.O. Terapies Naturals', 'annao@tao.cat', 'http://www.tao.cat/en/', 'T.A.O. Terapies Naturals', '', 'Andrea Doria 45, La Barceloneta, Barcelona', 0, 0, '', 0, 1, 1, 1),
(12, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'MUHBA Placa del Rei', 'abertran@bcn.cat', 'http://museuhistoria.bcn.cat/', '93 256 21 22', '', 'Placa del Rei, s/n. Barri Gotic, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(13, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Parapark', 'barcelona@parapark.es', 'http://www.parapark.es/', '34 606 704 909', '', 'Calle Rei Marti, 33, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(14, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Grand Theater of Liceu', 'informacio@liceubarcelona.com', 'http://www.liceubarcelona.cat/en.html', '34 93 485 9900', '', 'La Rambla 51-59, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(15, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Roomin', 'escape@roomin.es', 'http://www.roomin.es/', 'Roomin', '', 'Calle Robi, 2-4-6 Local, Barrio de Gracia, Barcelona', 0, 0, '', 0, 1, 1, 0),
(16, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Museo d&#039;Historia de Catalunya', 'mhc.cultura@gencat.cat', 'http://www.mhcat.cat/', 'Museo d&#039;Historia de Catal', '', 'Placa Pau Vila, n.3, , Barcelona', 0, 7, '', 0, 1, 1, 0),
(17, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Joan Miro Foundation (Fundacio Joan Miro)', 'info@fundaciojoanmiro-bcn.org', 'http://www.fundaciomiro-bcn.org/', '00 34 93 443 94 70', '', 'Parc de Montjuic, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(18, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'La Casa Vella - Flamenco in Barcelona', 'info@lacasavellabcn.com', 'http://www.lacasavellabcn.com/', '932956649', '', 'Banys Vells, 1, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(19, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Pabellon Mies van der Rohe', 'fundacio@miesbcn.com', 'http://www.miesbcn.com/', '+34 93 4234016', '', 'Av. Marques de Comillas s/n, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(20, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Museu del Futbol Club Barcelona', 'museu@fcbarcelona.cat', 'http://www.fcbarcelona.com/camp-nou/museum', '34 93 496 36 00', '', 'Camp Nou, Av Aristides Maillol, Nou Camp, Barcelona', 0, 0, '', 0, 0, 0, 0),
(21, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Museu Europeu d&#039;art Modern - MEAM', 'info@meam.es', 'http://www.meam.es/', '933 195 693', '', 'Barra de Ferro, 5, Ciutat Vella, Barcelona', 0, 0, '', 0, 0, 0, 0),
(22, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Santa Anna Church', 'info@barcelonaturisme.com', 'http://www.barcelonaturisme.com/', '+34 934 12 18 80', '', 'C/ Santa Anna, 29, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(23, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Sant Pau Recinte Modernista', 'recintemodernista@santpau.cat', 'http://www.santpaubarcelona.org/', '+34 935 53 78 01', '', 'Sant Antoni Maria Claret, 167, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(24, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Picasso Museum (Museu Picasso)', 'museupicasso@mail.bcn.es', 'http://www.museupicasso.bcn.cat/en/', '(+34) 93 256 30 00', '', 'Montcada, 15-23, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(25, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Tablao Flamenco Cordobes', 'tablao@tablaocordobes.com', 'http://www.tablaocordobes.es/es', '34 933 175 711', '', 'Ramblas 35, Frente a Plaza Real, Barcelona', 0, 0, '', 0, 0, 0, 0),
(26, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Gaudi Experience', 'hola@gaudiexperiencia.com', 'http://www.gaudiexperiencia.com/', '0034 932 854 440', '', 'Larrard 41, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(27, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Barcelona Zoo', 'zooclub@bsmsa.es', 'http://www.zoobarcelona.cat/en/home/', '902 45 75 45', '', 'Parc de la Ciutadella, La Ribera/Port Ol&#039;mpic, Barcelona', 0, 0, '', 0, 0, 0, 0),
(28, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Museu del Modernisme Catala', 'mmcat@mmcat.cat', 'http://mmcat.cat/site/', '34 932722896', '', 'C/ Balmes 48, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(29, '2014-03-24 11:56:47', '0000-00-00 00:00:00', 'Casa Gispert', 'info@casagispert.com', 'http://www.casagispert.com/', '93 319 75 35', '', 'Sombrerers 23, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(30, '2014-03-28 16:35:47', '0000-00-00 00:00:00', '', '', '', '', '', '', 0, 0, '', 1, 0, 0, 0),
(31, '2014-03-28 16:35:47', '0000-00-00 00:00:00', '', '', '', '', '', '', 0, 0, '', 0, 0, 0, 0),
(32, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Basilica of the Sagrada Familia', 'press@sagradafamilia.org', 'www.sagradafamilia.cat', '34-934-550-247', '', 'Sardenya Street, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(33, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Palace of Catalan Music (Palau de la Musica Catalana)', 'visites@palaumusica.cat', 'http://www.palaumusica.cat/ca/', '93 295 72 00', '', 'Carrer del Palau de la Musica 4-6, Sant Pere, Eixample, Barcelona', 0, 0, '', 0, 0, 0, 0),
(34, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Casa Batllo', 'infovisites@casabatllo.cat', 'http://www.casabatllo.es/en', '34932160306', '', 'Passeig de Gracia, 43, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(35, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Aeroteca', 'simuteca@aeroteca.com', 'http://www.simuteca.com/new/', '+(34)932181739', '', 'Carrer del Montseny 22, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(36, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Afternoon in Montserrat', 'info@barcelonaturisme.cat', 'http://bcnshop.barcelonaturisme.com/Tarda-a-Montserrat/', '932 853 832', '', 'Muntanya Montserrat, 08293, Barcelona, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(37, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Guell Palace', 'palauguell@diba.cat', 'http://palauguell.cat/', '34 93 317 3974', '', 'Carrer Nou de la Rambla 3-5, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(38, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Museu Nacional d&#039;Art de Catalunya - MNAC', 'info@mnac.cat', 'www.mnac.cat', '0034-93 622 03 76', '', 'Palau Nacional. Parc de Montjuic, Palau Nacional, Barcelona', 0, 0, '', 0, 0, 0, 0),
(39, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Camp Nou', 'oab@club.fcbarcelona.com', 'http://www.fcbarcelona.com/camp-nou', '(+34) 93 496 36 00', '', 'Avinguda Aristides Maillol, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(40, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'La Pedrera - Mila House (Casa Mila)', 'web@fcatalunyalapedrera.com', 'http://www.lapedrera.com/es/home', '+34 902 20 21 38', '', 'Carrer de Provenca 261 - 265, L&#039;Eixample, Barcelona', 0, 0, '', 0, 0, 0, 0),
(41, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'El Tablao de Carmen', 'info@tablaodecarmen.com', 'http://www.tablaodecarmen.com/', '00-34-933256895', '', 'Avenida Francesc Ferrer i Guardia, 13, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(42, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'T.A.O. Terapies Naturals', 'annao@tao.cat', 'http://www.tao.cat/en/', '931193637', '', 'Andrea Doria 45, La Barceloneta, Barcelona', 0, 0, '', 0, 0, 0, 0),
(43, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'MUHBA Placa del Rei', 'abertran@bcn.cat', 'http://museuhistoria.bcn.cat/', '93 256 21 22', '', 'Placa del Rei, s/n. Barri Gotic, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(44, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Parapark', 'barcelona@parapark.es', 'http://www.parapark.es/', '34 606 704 909', '', 'Calle Rei Marti, 33, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(45, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Grand Theater of Liceu', 'informacio@liceubarcelona.com', 'http://www.liceubarcelona.cat/en.html', '34 93 485 9900', '', 'La Rambla 51-59, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(46, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Roomin', 'escape@roomin.es', 'http://www.roomin.es/', '+34 931 74 45 73', '', 'Calle Robi, 2-4-6 Local, Barrio de Gracia, Barcelona', 0, 0, '', 0, 0, 0, 0),
(47, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Museo d&#039;Historia de Catalunya', 'mhc.cultura@gencat.cat', 'http://www.mhcat.cat/', '93 225 4700', '', 'Placa Pau Vila, n.3, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(48, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Joan Miro Foundation (Fundacio Joan Miro)', 'info@fundaciojoanmiro-bcn.org', 'http://www.fundaciomiro-bcn.org/', '00 34 93 443 94 70', '', 'Parc de Montjuic, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(49, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'La Casa Vella - Flamenco in Barcelona', 'info@lacasavellabcn.com', 'http://www.lacasavellabcn.com/', '932956649', '', 'Banys Vells, 1, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(50, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Pabellon Mies van der Rohe', 'fundacio@miesbcn.com', 'http://www.miesbcn.com/', '+34 93 4234016', '', 'Av. Marques de Comillas s/n, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(51, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Museu del Futbol Club Barcelona', 'museu@fcbarcelona.cat', 'http://www.fcbarcelona.com/camp-nou/museum', '34 93 496 36 00', '', 'Camp Nou, Av Aristides Maillol, Nou Camp, Barcelona', 0, 0, '', 0, 0, 0, 0),
(52, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Museu Europeu d&#039;art Modern - MEAM', 'info@meam.es', 'http://www.meam.es/', '933 195 693', '', 'Barra de Ferro, 5, Ciutat Vella, Barcelona', 0, 0, '', 0, 0, 0, 0),
(53, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Santa Anna Church', 'info@barcelonaturisme.com', 'http://www.barcelonaturisme.com/', '+34 934 12 18 80', '', 'C/ Santa Anna, 29, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(54, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Sant Pau Recinte Modernista', 'recintemodernista@santpau.cat', 'http://www.santpaubarcelona.org/', '+34 935 53 78 01', '', 'Sant Antoni Maria Claret, 167, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(55, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Picasso Museum (Museu Picasso)', 'museupicasso@mail.bcn.es', 'http://www.museupicasso.bcn.cat/en/', '(+34) 93 256 30 00', '', 'Montcada, 15-23, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(56, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Tablao Flamenco Cordobes', 'tablao@tablaocordobes.com', 'http://www.tablaocordobes.es/es', '34 933 175 711', '', 'Ramblas 35, Frente a Plaza Real, Barcelona', 0, 0, '', 0, 0, 0, 0),
(57, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Gaudi Experience', 'hola@gaudiexperiencia.com', 'http://www.gaudiexperiencia.com/', '0034 932 854 440', '', 'Larrard 41, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(58, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Barcelona Zoo', 'zooclub@bsmsa.es', 'http://www.zoobarcelona.cat/en/home/', '902 45 75 45', '', 'Parc de la Ciutadella, La Ribera/Port Ol&#039;mpic, Barcelona', 0, 0, '', 0, 0, 0, 0),
(59, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Museu del Modernisme Catala', 'mmcat@mmcat.cat', 'http://mmcat.cat/site/', '34 932722896', '', 'C/ Balmes 48, , Barcelona', 0, 0, '', 0, 0, 0, 0),
(60, '2014-04-08 18:57:30', '0000-00-00 00:00:00', 'Casa Gispert', 'info@casagispert.com', 'http://www.casagispert.com/', '93 319 75 35', '', 'Sombrerers 23, , Barcelona', 0, 0, '', 0, 0, 0, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
