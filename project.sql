-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 22, 2018 at 02:27 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `coffee`
--

CREATE TABLE `coffee` (
  `id_coffee` int(11) NOT NULL,
  `coffeename` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `coffeeimg` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coffee`
--

INSERT INTO `coffee` (`id_coffee`, `coffeename`, `coffeeimg`, `description`) VALUES
(19, 'Flat White', 'flatwhite.jpg', 'If you have a coffee machine, make the best use of it with our easy flat white recipe. This trendy beverage has earned its spot at the breakfast table'),
(20, 'Cappuccino', 'cappuccino.jpg', 'Make your favourite morning coffee from scratch â€“ it is easy with the right equipment. We love a creamy cappuccino topped with a sprinkling of cocoa powder'),
(21, 'Latte', 'latte.jpg', 'Dust off that coffee machine and learn a few barista skills to make a creamy latte. Our easy recipe takes breakfast, or brunch, to the next level'),
(22, 'Macchiato', 'macchiato.jpg', 'Put your coffee machine to work and brew an easy macchiato. Ideal for breakfast, brunch or whenever you need a pick-me-up'),
(25, 'Mochaccino', 'mocha.jpg', 'If you have a coffee machine, treat yourself to a comforting, chocolatey mocha. You do not need to be a trained barista with our easy recipe');

-- --------------------------------------------------------

--
-- Table structure for table `coffeedetails`
--

CREATE TABLE `coffeedetails` (
  `id_details` int(11) NOT NULL,
  `id_coffee` int(11) NOT NULL,
  `pretime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `difficulty` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredient1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingredient2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction1` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `instruction2` longtext COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `coffeedetails`
--

INSERT INTO `coffeedetails` (`id_details`, `id_coffee`, `pretime`, `difficulty`, `ingredient1`, `ingredient2`, `extra`, `instruction1`, `instruction2`) VALUES
(2, 19, '2 mins - 3 mins', 'Easy', '18g ground espresso, or 1 espresso pod', '100ml milk', 'the right cup, 150-200ml capacity', 'Make around 35ml espresso using your coffee machine and pour into the base of your cup.', 'Steam the milk with the steamer attachment so that it has around 1-2cm of foam on top. Hold the jug so that the spout is about 3-4cm above the cup and pour the milk in steadily. As the volume within the cup increases, bring the jug as close to the surface of the drink as possible whilst aiming to pour into the centre. Once the milk jug is almost touching the surface of the coffee, tilt the jug to speed up the rate of pour. As you accelerate, the milk will hit the back of the cup and start naturally folding in on itself to create a pattern on the top.'),
(3, 20, '2 mins - 3 mins', 'Easy', '18g ground espresso (or 1 espresso pod)', '150ml milk', 'the right cup, 200-250ml capacity', 'Make around 35ml espresso using a coffee machine and pour it into the base of your cup.', 'Steam the milk with the steamer attachment so that it has around 4-6cm of foam on top. Hold the jug so that the spout is about 3-4cm above the cup and pour the milk in steadily. As the volume within the cup increases, bring the jug as close to the surface of the drink as possible whilst aiming to pour into the centre. Once the milk jug is almost touching the surface of the coffee, tilt the jug to speed up the rate of pour. As you accelerate, the milk will hit the back of the cup and start naturally folding in on itself to create a pattern on the top. Dust the surface with a little cocoa powder if you like.'),
(4, 25, '2 mins - 3 mins', 'Easy', '18g ground espresso, or 1 espresso pod', '250ml milk, 1 tsp drinking chocolate', 'large cup, 300-350ml capacity', 'Make around 35ml espresso using a coffee machine and pour into the base of your cup. Add the drinking chocolate and mix well until smooth.', 'Steam the milk with the steamer attachment so that it has around 4-6cm of foam on top. Hold the jug so that the spout is about 3-4cm above the cup and pour the milk in steadily. As the volume within the cup increases, bring the jug as close to the surface of the drink as possible whilst aiming into the centre. Once the milk jug is almost touching the surface of the coffee, tilt to speed up the rate of pour. As you accelerate, the milk will hit the back of the cup and start naturally folding in on itself to create a pattern on the top.'),
(5, 21, '2 mins - 3 mins', 'Easy', '18g ground espresso, or 1 espresso pod', '250ml milk', 'large cup, 300-350ml capacity', 'Make around 35ml espresso using your coffee machine and pour it into the base of your cup.', 'Steam the milk with the steamer attachment so that it has around 2-3cm of foam on top. Hold the jug so that the spout is about 3-4cm above the cup and pour the milk in steadily. As the volume within the cup increases, bring the jug as close to the surface of the drink as possible whilst aiming to pour into the centre. Once the milk jug is almost touching the surface of the coffee, tilt to speed up the rate of pour. As you accelerate, the milk will hit the back of the cup and start naturally folding in on itself to create a pattern on the top.'),
(9, 22, '', '', '', '', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `coffee`
--
ALTER TABLE `coffee`
  ADD PRIMARY KEY (`id_coffee`),
  ADD UNIQUE KEY `coffeename` (`coffeename`);

--
-- Indexes for table `coffeedetails`
--
ALTER TABLE `coffeedetails`
  ADD PRIMARY KEY (`id_details`),
  ADD UNIQUE KEY `id_coffee` (`id_coffee`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `coffee`
--
ALTER TABLE `coffee`
  MODIFY `id_coffee` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `coffeedetails`
--
ALTER TABLE `coffeedetails`
  MODIFY `id_details` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
