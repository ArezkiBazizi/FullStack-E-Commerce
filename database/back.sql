-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 14 juin 2022 à 20:12
-- Version du serveur : 8.0.19
-- Version de PHP : 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `back`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_active` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `is_active`) VALUES
(3, 'Rizwan', 'rizwan@gmail.com', '$2y$10$Z1DnKbJRDFUTHMI7y1vSqeU3.Y9cgDyC4AeWx4.ucH34z/mkzL2E.', '0'),
(8, 'kiki', 'baziziarezki@gmail.com', '$2y$10$WwydEX6mmvWAKHV3RQTJP.I4LiFr7lKt9Po63FzAiffH5Xgrpi84C', '0'),
(9, 'Kiki 2', 'azzitufik@gmail.com', '$2y$10$cODfmXjPXsAbUluKs07myeNY5cHIEw72cAxweGoP6Z0V51vH9cOqq', '0');

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `ip_add` varchar(250) NOT NULL,
  `user_id` int DEFAULT NULL,
  `qty` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=295 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `cart`
--

INSERT INTO `cart` (`id`, `p_id`, `ip_add`, `user_id`, `qty`) VALUES
(1, 4, '1', -1, 1),
(284, 2, '::1', 5, 1),
(290, 94, '::1', 3, 1),
(291, 2, '::1', 3, 1),
(292, 1, '::1', 3, 1),
(293, 4, '::1', 3, 1);

-- --------------------------------------------------------

--
-- Structure de la table `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `cat_id` int NOT NULL AUTO_INCREMENT,
  `cat_title` text NOT NULL,
  `cat_icon` text CHARACTER SET latin1 COLLATE latin1_swedish_ci,
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`, `cat_icon`) VALUES
(1, 'Clothes', 'Clothes.svg'),
(2, 'Footwear', 'shoes.svg'),
(3, 'Jewlery', 'Jewlery.svg'),
(4, 'Perfume', 'Perfume.svg'),
(5, 'Cosmetics', 'Cosmetics.svg'),
(6, 'Glaces', 'Glasses.svg'),
(7, 'Bags', 'Bag.svg'),
(17, 'Watch', 'watch.svg');

-- --------------------------------------------------------

--
-- Structure de la table `favoris`
--

DROP TABLE IF EXISTS `favoris`;
CREATE TABLE IF NOT EXISTS `favoris` (
  `id` int NOT NULL AUTO_INCREMENT,
  `p_id` int NOT NULL,
  `ip_add` varchar(250) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `favoris`
--

INSERT INTO `favoris` (`id`, `p_id`, `ip_add`, `user_id`) VALUES
(79, 1, '::1', 3),
(81, 2, '::1', 3);

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

DROP TABLE IF EXISTS `livraison`;
CREATE TABLE IF NOT EXISTS `livraison` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int DEFAULT NULL,
  `adresse` varchar(20) DEFAULT NULL,
  `ville` varchar(20) DEFAULT NULL,
  `commune` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Structure de la table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `order_id` int NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `product_id` int NOT NULL,
  `qty` int NOT NULL,
  `total` int NOT NULL,
  `p_status` varchar(20) NOT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `product_id`, `qty`, `total`, `p_status`) VALUES
(1, 1, 1, 1, 900, 'Completed'),
(2, 1, 2, 1, 1500, 'Completed'),
(3, 3, 2, 2, 7500, 'Completed'),
(4, 3, 1, 1, 8900, 'Completed');

-- --------------------------------------------------------

--
-- Structure de la table `products`
--

DROP TABLE IF EXISTS `products`;
CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int NOT NULL AUTO_INCREMENT,
  `product_cat` int NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int NOT NULL,
  `product_qty` int NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_rate` int DEFAULT NULL,
  `promo` int DEFAULT '0',
  `product_image2` text,
  PRIMARY KEY (`product_id`),
  KEY `fk_product_cat` (`product_cat`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_title`, `product_price`, `product_qty`, `product_desc`, `product_image`, `product_rate`, `promo`, `product_image2`) VALUES
(1, 1, 'Leather Pouch', 7200, 50, 'best backet from turkey', '../assets/images/products/watch-3.jpg', 3, 15, '../assets/images/products/watch-4.jpg'),
(2, 1, 'sweat bleu', 4000, 500, 'bleautiful sweat', '../assets/images/products/2.jpg', 5, 15, NULL),
(4, 2, 't-shirt', 5000, 100, 'good t-shirt cool', '../assets/images/products/3.jpg', 3, 15, NULL),
(6, 3, 'sweat', 2000, 50, 'chill sweat good quality', '../assets/images/products/4.jpg', 2, 15, NULL),
(83, 2, 'ghjghj', 220, 500, 'gfhfg', '../assets/images/products/party-wear-2.jpg', 3, 15, '../assets/images/products/party-wear-1.jpg'),
(85, 3, 'Mens Winter Leathers Jackets', 522, 500, 'ghjg', '../assets/images/products/jacket-1.jpg', 2, 15, '../assets/images/products/jacket-2.jpg'),
(86, 1, 'Pure Garment Dyed Cotton Shirt', 101, 101, 'dfaa', '../assets/images/products/shirt-1.jpg', 5, 15, '	\n../assets/images/products/shirt-2.jpg'),
(89, 1, 'Relaxed Short Full Sleeve T-Shirt Clothes', 3004, 343, 'Relaxed Short Full Sleeve T-Shirt\r\nClothes For Woman', '../assets/images/products/clothes-1.jpg', 3, 5, NULL),
(93, 3, 'jewlery luxe ', 8500, 20, 'sdfsf', '../assets/images/products/jewellery-1.jpg', 2, 2, NULL),
(94, 1, 'Black Floral Wrap Midi Skirt', 200, 50, 'Black Floral Wrap Midi Skirt\r\n', '../assets/images/products/clothes-3.jpg', 2, 5, '../assets/images/products/clothes-4.jpg'),
(95, 1, 'MEN Yarn Fleece Full-Zip Jacket', 7000, 30, 'MEN Yarn Fleece Full-Zip Jacket\r\n', '../assets/images/products/jacket-5.jpg', 4, 0, '../assets/images/products/jacket-6.jpg'),
(97, 2, 'Casual Brown Shoes', 4500, 25, 'Casual Brown Shoes For Man\r\n', '../assets/images/products/shoe-2.jpg', 3, 9, '../assets/images/products/shoe-2_1.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `user_info`
--

DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `address1` varchar(300) NOT NULL,
  `address2` varchar(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user_info`
--

INSERT INTO `user_info` (`user_id`, `first_name`, `last_name`, `email`, `password`, `mobile`, `address1`, `address2`) VALUES
(1, 'Rizwan', 'Khan', 'rizwankhan.august16@gmail.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', 'Rahmat Nagar Burnpur Asansol', 'Asansol'),
(2, 'Rizwan', 'Khan', 'rizwankhan.august16@yahoo.com', '25f9e794323b453885f5181f1b624d0b', '8389080183', 'Rahmat Nagar Burnpur Asansol', 'Asa'),
(3, 'Azzi', 'toufik', 'toufik@gmail.com', 'a9ae18706a70791d72f00628d7a5b5ec', '0558508857', 'amizour, pompa', 'licence'),
(4, 'KIKI', 'BAZIZI', 'baziziarezki@gmail.com', '63b7343e9f2310a580408c43306b3691', '0556363350', 'ASA', 'ASA'),
(5, 'BILAL', 'habacha', 'bilal06@gmail.com', '882baf28143fb700b388a87ef561a6e5', '0535585088', 'OUED ghir', 'licence');

-- --------------------------------------------------------

--
-- Structure de la table `wilaya`
--

DROP TABLE IF EXISTS `wilaya`;
CREATE TABLE IF NOT EXISTS `wilaya` (
  `id` int NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Déchargement des données de la table `wilaya`
--

INSERT INTO `wilaya` (`id`, `nom`) VALUES
(1, 'adrar'),
(2, 'chlef'),
(3, 'leghouat'),
(4, 'Oum lebouaqi'),
(5, 'Batna'),
(6, 'Bejaia');

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);

--
-- Contraintes pour la table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user_info` (`user_id`);

--
-- Contraintes pour la table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_product_cat` FOREIGN KEY (`product_cat`) REFERENCES `categories` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
