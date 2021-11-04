-- --------------------------------------------------------
-- Hôte :                        127.0.0.1
-- Version du serveur:           5.6.25-0ubuntu0.15.04.1 - (Ubuntu)
-- SE du serveur:                debian-linux-gnu
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Export de la structure de la base pour my_shop
CREATE DATABASE IF NOT EXISTS `my_shop` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `my_shop`;


-- Export de la structure de table my_shop.categories
CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO categories(name, parent_id) VALUES
('furnitures', null),
('seats', 1),
('tables', 1),
('storage', 1),
('desk', 1),
('chair', 2),
('sofa', 2),
('nightstand', 3),
('side table', 3),
('dining table', 3),
('shelves', 4),
('cupboard', 4),
('dresser', 4),
('corner desk', 5),
('computer desk', 5),
('standing desk', 5),
('armchair', 6),
('rocking chair', 6),
('stool', 6),
('office chair', 6),
('high chair', 6),
('fixed sofa', 7),
('corner sofa', 7),
('convertible sofa', 7),
('showcase', 11),
('bookshelf', 11),
('hanging shelf', 11),
('shoe cabinet', 13);

-- Export de données de la table my_shop.categories : ~0 rows (environ)
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;


-- Export de la structure de table my_shop.products
CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL DEFAULT '0',
  `price` int(11) NOT NULL DEFAULT '0',
  `category_name` varchar(255) NOT NULL DEFAULT '0',
  `main_color` varchar(255) NOT NULL DEFAULT '0',
  `main_material` varchar(255) NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL DEFAULT '0',
  `description` varchar(255) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table my_shop.products : ~0 rows (environ)
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
/*!40000 ALTER TABLE `products` ENABLE KEYS */;

INSERT INTO products(name, price, category_name,main_color, main_material, image,description)
VALUES ('Alderaan', 120, 'chair', 'White', 'Plastic', 'assets/products/001.jpg','Scandinavian style chair'),
       ('Delta', 90, 'side table', 'Natural', 'Wood', 'assets/products/002.jpg','Square side table made of walnut wood'),
       ('Endor', 450, 'dining table', 'Black', 'Wood', 'assets/products/003.jpg','Black wooden dining table for 6 to 8 seats'),
       ('Betelgeuse', 290, 'bookshelf', 'Natural','Wood', 'assets/products/004.jpg', 'Oak bookshelf'),
       ('Capella', 250, 'armchair', 'Grey','Fabric', 'assets/products/005.jpg', 'Design armchair'),
       ('Arcturus', 320, 'convertible sofa', 'Blue','Fabric', 'assets/products/006.jpg','Blue sofa bed, can be unfolded'),
       ('Jehda', 260, 'fixed sofa', 'Black','Velvet	', 'assets/products/007.jpg','Black velvet Meridienne in a vintage style'),
       ('Citra', 270, 'computer desk', 'Natural', 'Wood', 'assets/products/008.jpg','Corner computer desk made of pine wood'),
       ('Amarillo', 270, 'armchair', 'Grey','Velvet', 'assets/products/009.jpg', 'Design armchair'),
       ('Trebbiano', 180, 'computer desk', 'Natural', 'Wood', 'assets/products/010.jpg','Wenge computer desk'),
       ('Cantillon', 150, 'corner desk', 'White', 'Wood', 'assets/products/011.jpg','White compact corner desk with a drawer'),
       ('Titan', 390, 'standing desk', 'White', 'Metal', 'assets/products/012.jpg','Adjustable height desk'),
       ('Riesling', 450, 'standing desk', 'Natural', 'Wood', 'assets/products/013.jpg','Procyon is a wooden height adjustable desk'),
       ('Atlas', 220, 'dresser', 'White', 'Wood', 'assets/products/014.jpg','Compact dressing table with drawers'),
       ('Syrah', 190, 'side table', 'Natural', 'Metal', 'assets/products/015.jpg','Pull-out metal and pine wood side tables'),
       ('Keeve', 280, 'side table', 'White', 'Metal', 'assets/products/016.jpg', 'Side table'),
       ('Achernar', 50, 'office chair', 'Grey', 'Fabric', 'assets/products/017.jpg','Office caster chair'),
       ('Penemillè', 70, 'high chair', 'Gold', 'Metal', 'assets/products/018.jpg', 'Golden metal high chair'),
       ('Momo', 60, 'stool', 'Natural', 'Wood', 'assets/products/019.jpg', 'Wooden stool'),
       ('Antares', 75, 'seats', 'Yellow', 'Metal', 'assets/products/020.jpg','Yellow metal bench for the garden'),
       ('Motueka', 40, 'chair', 'Yellow', 'Metal', 'assets/products/021.jpg','Yellow metal folding chair for the garden'),
       ('Sorachi', 160, 'high chair', 'Grey', 'Fabric', 'assets/products/022.jpg','Set of two high chairs'),
       ('Kamino', 250, 'rocking chair', 'Grey', 'Fabric', 'assets/products/023.jpg','Grey modern rocking chair'),
       ('Orval', 40, 'shoe cabinet', 'White', 'Plastic', 'assets/products/024.jpg','Modular shoe cabinet'),
       ('Poulsard', 45, 'office chair', 'Black', 'Leather', 'assets/products/025.jpg','Leather office (chair'),
       ('Rigil', 60, 'shoe cabinet', 'Black', 'Metal', 'assets/products/026.jpg', 'Industrial open shoe cabinet'),
       ('Blanko', 100, 'dresser', 'Black', 'Wood', 'assets/products/027.jpg','Wooden drawer dresser'),
       ('Ribolla', 130, 'dresser', 'White', 'Wood', 'assets/products/028.jpg','Drawer dresser with geometric patterns'),
       ('Pollux', 200, 'rocking chair', 'Natural', 'Fabric','assets/products/029.jpg','Modern rocking chair'),
       ('Zweigelt', 590, 'desk', 'Natural', 'Wood', 'assets/products/030.jpg','Wooden L-shaped executive desk'),
       ('Falcon', 850, 'desk', 'Transparent', 'Glass', 'assets/products/031.jpg', 'Glass desk'),
       ('Nillè', 350, 'showcase', 'Natural', 'Wood', 'assets/products/032.jpg', 'Wooden showcase'),
       ('Savagnin', 420, 'showcase', 'Transparent', 'Glass', 'assets/products/033.jpg', 'Metal and glass showcase'),
       ('Proxima', 500, 'bookshelf', 'Natural', 'Wood', 'assets/products/034.jpg','Vintage style wooden bookshelf with sliding ladder'),
       ('Vega', 300, 'bookshelf', 'Black', 'Metal', 'assets/products/035.jpg','Asymmetric industrial bookshelf'),
       ('Procyon', 280, 'fixed sofa', 'Blue', 'Velvet', 'assets/products/036.jpg','Two seats fixed velvet sofa'),
       ('Dagobah', 890, 'fixed sofa', 'Black', 'Leather', 'assets/products/037.jpg','Three seats fixed leather sofa'),
       ('Gamay', 850, 'dining table', 'Transparent', 'Glass', 'assets/products/038.jpg','Design round glass dining table'),
       ('Nebbiolo', 390, 'corner sofa', 'Black', 'Fabric', 'assets/products/039.jpg','Scandinavian style corner sofa'),
       ('Tempranillo', 550, 'convertible sofa', 'Grey', 'Fabric', 'assets/products/040.jpg','Grey convertible corner sofa'),
       ('Cascade', 480, 'convertible sofa', 'Blue', 'Fabric', 'assets/products/041.jpg', 'Green sofa convertible into a two person bed'),
       ('Rick Astley', 1, 'furnitures', 'White', 'Human', 'assets/products/042.jpg', 'Never Gonna Give you Up'),
       ('Sirius', 120, 'cupboard', 'Black', 'Wood', 'assets/products/043.jpg','Wooden wardrobe closed with a curtain'),
       ('Hadar', 300, 'cupboard', 'Natural', 'Wood', 'assets/products/044.jpg','Wooden wardrobe with swing doors'),
       ('Chenin', 80, 'nightstand', 'Natural', 'Wood', 'assets/products/045.jpg','Scandinavian style nightstand'),
       ('Mustafar', 50, 'nightstand', 'Black', 'Metal', 'assets/products/046.jpg', 'Industrial style nightstand'),
       ('Pinot', 90, 'nightstand', 'Black', 'Metal', 'assets/products/047.jpg', 'Wall mounted nightstand made of metal and wood'),
       ('Lug', 90, 'side table', 'Black', 'Metal', 'assets/products/048.jpg', 'Round low table'),
       ('Coruscant', 280, 'convertible sofa', 'Grey', 'Fabric', 'assets/products/049.jpg','Scandinavian style sofa bed'),
       ('Canopus', 30, 'stool', 'Natural', 'Wood', 'assets/products/050.jpg', 'Wooden stool'),
       ('Chimay', 730, 'chair', 'Natural', 'Wood', 'assets/products/051.jpg','Design wooden folding chair'),
       ('Alpha', 320, 'seats', 'Black', 'Leather', 'assets/products/052.jpg','Indoor leather bench'),
       ('Bespin', 210, 'seats', 'Natural', 'Wood', 'assets/products/053.jpg','Outdoor corner bench'),
       ('Mosaic', 580, 'dining table', 'Natural', 'Wood', 'assets/products/054.jpg','Extendable dining table from 6 to 10 seats'),
       ('Corellia', 75, 'hanging shelf', 'Grey', 'Metal', 'assets/products/055.jpg','Industrial hanging shelf'),
       ('Jakku', 80, 'hanging shelf', 'Natural', 'Wood', 'assets/products/056.jpg','Wooden corner hanging shelf'),
       ('Chinook', 1230, 'corner sofa', 'Blue', 'Velvet', 'assets/products/057.jpg','Design velvet corner sofa'),
       ('Altesse', 480, 'dresser', 'Natural', 'Wood', 'assets/products/058.jpg','Vintage wooden dresser'),
       ('Eadu', 670, 'shoe cabinet', 'Natural','Wood','assets/products/059.jpg', 'Floating shoe cabinet'),
       ('Tilquin', 160, 'cupboard', 'Grey', 'Metal', 'assets/products/060.jpg','Industrial metal cupboard');


-- Export de la structure de table my_shop.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- Export de données de la table my_shop.users : ~0 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;


