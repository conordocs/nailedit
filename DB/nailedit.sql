-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2021 at 05:05 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cdoherty101`
--

-- --------------------------------------------------------

--
-- Table structure for table `aboutus`
--

CREATE TABLE `aboutus` (
  `id` int(11) NOT NULL,
  `about` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `aboutus`
--

INSERT INTO `aboutus` (`id`, `about`) VALUES
(1, 'We know its frustrating going to a shop to find out what you need is not there. So we want to make it easier for you to find your specified product.'),
(2, 'We work with local retailers to help cater for your needs'),
(3, 'We have a database that holds stock levels of nearby hardware stores.'),
(4, 'Logged in users can place an order for a \'Click & Collect\' Service'),
(5, 'We understand that some people may be anxious going into shops now because of the COVID-19 situation so this website will help you organise a suitable time to go into the store.'),
(6, 'We want to help out local shops as COVID-19 has affected their sales'),
(7, 'We want to ensure everyone feels comfortable and safe whilst shopping'),
(8, 'We want to ensure that local businesses are continually being used within these tough times during COVID-19');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile_number` varchar(30) NOT NULL,
  `address` varchar(300) NOT NULL,
  `date` varchar(200) NOT NULL,
  `time` varchar(200) NOT NULL,
  `trade_id` int(11) NOT NULL,
  `date_of_booking` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `full_name`, `email`, `mobile_number`, `address`, `date`, `time`, `trade_id`, `date_of_booking`) VALUES
(52, 'Conor Doherty', 'conordoherty97@hotmail.com', '+447889789348', 'Inishroo, Kinvara', '2021-02-26', '2:00:00 PM', 2, '2021-02-09 14:01:54'),
(53, 'Conor Doherty', 'conordoherty97@hotmail.com', '+447889789348', 'Inishroo, Kinvara', '2021-02-28', '10:00:00 AM', 3, '2021-02-10 12:38:00'),
(54, 'Conor Doherty', 'conordoherty97@hotmail.com', '+447889789348', 'Inishroo, Kinvara', '2021-02-28', '10:00:00 AM', 3, '2021-02-10 12:39:06'),
(55, 'Conor Doherty', 'conordoherty97@hotmail.com', '+447889789348', 'Inishroo, Kinvara', '2021-02-28', '10:00:00 AM', 3, '2021-02-10 12:41:22'),
(56, 'Conor Doherty', 'conordoherty97@hotmail.com', '+447889789348', 'Inishroo, Kinvara', '2021-02-28', '10:00:00 AM', 3, '2021-02-10 12:41:50'),
(57, 'Conor Doherty', 'conordoherty97@hotmail.com', '+447889789348', '10 Epworth Street', '2021-03-10', '8:00:00 PM', 4, '2021-02-10 12:42:34'),
(58, 'Conor Doherty', 'conordoherty97@hotmail.com', '+447889789348', 'Inishroo, Kinvara', 'Sunday, Feb 21 2021', '10:00:00 AM', 2, '2021-02-17 14:16:55'),
(59, 'Conor Doherty', 'conordoherty97@hotmail.com', '+447889789348', 'Inishroo, Kinvara', 'Sunday, Feb 21 2021', '10:00:00 AM', 2, '2021-02-17 14:19:41'),
(60, 'conor odherty', 'conordoherty97@hotmail.com', '0231654123', '10 circle street bt34jkd', 'Monday, Feb 22 2021', '10:00:00 AM', 1, '2021-02-17 17:51:06');

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(500) NOT NULL,
  `nailedItAns` varchar(1000) NOT NULL DEFAULT 'N/A',
  `ansShop1` varchar(1000) NOT NULL DEFAULT 'N/A',
  `ansShop2` varchar(1000) NOT NULL DEFAULT 'N/A',
  `ansShop3` varchar(1000) NOT NULL DEFAULT 'N/A'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `question`, `nailedItAns`, `ansShop1`, `ansShop2`, `ansShop3`) VALUES
(2, 'What is NailedIT?', 'NailedIT is a website that was created in order to help save time & money for its users. The aim of NailedIT is to provide its\r\nusers to locate what they are looking for in any nearby shops. NailedIT holds a database of stock levels of certain tools \r\nand accessories within different shops in the area you search for....', 'N/A', 'N/A', 'N/A'),
(3, 'Can I use \'Click & Collect\' service with this website?', 'Yes. When you find what you are looking for there is an option for you to \'Click & Collect\' from the specified store that you have chosen.', 'N/A', 'N/A', 'N/A'),
(4, 'What perks do registered users receive?', 'Registered users will have the ability to use the \'Click & Collect\' service. Registered users will also receive discount on featured items.', 'Registered users with NailedIT will receive a 10% discount on products automatically.', 'Registered users with NailedIT will receive a 10% discount on products automatically.', 'Registered users with NailedIT will receive a 10% discount on products automatically.'),
(5, 'Can a normal consumer use this website?', 'This website can be used by anyone.', 'This website is good for people who haven\'t got much experience with tools. We are here to help.', 'N/A', 'N/A'),
(6, 'Do you Information regarding COVID-19 Restrictions?', 'Yes, all information will be provided on this website before visiting the shops. We want to ensure the safety of our users.', 'Information regarding our shop will be updated on this website daily.', 'N/A', 'Information regarding our shop will be updated on this website daily.');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `about_me` varchar(1000) NOT NULL,
  `img` varchar(200) DEFAULT NULL,
  `trade_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `full_name`, `phone_number`, `email_address`, `about_me`, `img`, `trade_id`) VALUES
(50, 'Conor Doherty', '0231564634', 'conordoherty97@hotmail.com', 'I am a trainee plumber looking for work', NULL, 2);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email_address` varchar(200) NOT NULL,
  `phone_number` varchar(30) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` tinyint(4) NOT NULL,
  `total` double NOT NULL,
  `shop_id` int(11) NOT NULL,
  `date_ordered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `first_name`, `last_name`, `email_address`, `phone_number`, `product_id`, `quantity`, `total`, `shop_id`, `date_ordered`) VALUES
(105, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 1, 18.89, 2, '2021-02-08 20:31:32'),
(106, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 1, 18.89, 2, '2021-02-08 20:32:12'),
(107, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 1, 18.89, 2, '2021-02-08 20:32:38'),
(108, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:33:23'),
(109, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:35:29'),
(110, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:35:54'),
(111, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:36:41'),
(112, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:37:43'),
(113, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:38:04'),
(114, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:38:41'),
(115, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:38:56'),
(116, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:39:32'),
(117, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:40:04'),
(118, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:40:18'),
(119, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:40:38'),
(120, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:40:49'),
(121, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:41:06'),
(122, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:41:14'),
(123, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:41:33'),
(124, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+4478897893', 3, 3, 56.67, 2, '2021-02-08 20:42:29'),
(125, 'conor', 'doherty', 'conordoherty97@hotmail.com', '216546516', 3, 8, 167.92, 2, '2021-02-08 20:43:14'),
(126, 'conor', 'doherty', 'conordoherty97@hotmail.com', '2839462984', 3, 7, 132.23, 2, '2021-02-08 20:44:06'),
(127, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '07889789348', 3, 3, 62.97, 2, '2021-02-09 13:19:18'),
(128, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '07889789348', 3, 3, 62.97, 2, '2021-02-09 13:26:59'),
(129, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '07889789348', 7, 2, 150, 3, '2021-02-09 13:27:17'),
(130, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '07889789348', 3, 4, 89.96, 4, '2021-02-09 13:27:45'),
(131, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '07889789348', 3, 1, 20.25, 4, '2021-02-09 13:45:16'),
(132, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+447889789348', 1, 2, 26.98, 4, '2021-02-09 13:49:43'),
(133, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+447889789348', 1, 8, 119.92, 4, '2021-02-09 17:28:43'),
(134, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+447889789348', 1, 3, 44.97, 4, '2021-02-17 14:22:42'),
(135, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+447889789348', 7, 2, 126, 2, '2021-02-18 14:38:48'),
(136, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+447889789348', 6, 1, 199, 3, '2021-02-20 18:39:27'),
(137, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '+447889789348', 6, 1, 179, 3, '2021-02-20 18:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `img` varchar(50) NOT NULL,
  `trade_id` int(11) NOT NULL,
  `hot_item` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `img`, `trade_id`, `hot_item`) VALUES
(1, 'Brick Hammer', 'Hammer body has heat treatment, impact resistance and wear resistance.\r\n\r\nThe surface is polished to a high hardness and can work in a hard environment.\r\n\r\nThe tip of the brick hammer can increase the force point and enhance the force.\r\n\r\nThe brick hammer can initially measure the hardness of the rock.\r\n\r\nThe brick hammer is made of high carbon steel and is durable.', 'brick hammer.jpg', 3, 0),
(2, 'Trowel', 'Expertly grounded blades from heel to toe.\r\nThe impact area is strong to provide extra endurance. \r\nThe flexibility produces the unique feel of Marshalltown brick trowels.\r\nPhiladelphia pattern with Durasoft handle incorporating an integral finger guard for protection against callouses, heat and cold.', 'trowel.jpg', 3, 0),
(3, 'Wirestrippers', 'Pliers have crimping capability - colour coded for crimps on insulated and non insulated.\r\nTerminalsStrips inner and outer sheaths on wires and cables 0.2-6mm\r\nBi-material handles allows grip and application of the forces needed for crimping and stripping\r\nPushLock adjustment button for quick and easy size adjustments\r\nInduction hardened jaws for increased durability', 'wire strippers.jpg', 1, 0),
(4, 'Wire Cutters', 'Sharp blades are perfect for cutting and stripping cables. \r\nIt is suitable for cutting cables less than 6.544mm?2AWG?in diameter.\r\nThree-color TPR handle for comfortable grip and anti-slip operation.\r\nGood helper for cutting cables, copper wire, aluminum wire, photovoltaic wire, and iron wire.\r\nLength: 210mm (8-inch); Weight: 330g; Cutting capacity:33.6 m?. Cutting hardness: HRC 56-66.', 'wire cutters.jpg', 1, 1),
(5, '6\" Wall Brush', 'Ideal for painting large interior walls and ceilings\r\nTraditional style brush with extra length filament\r\nGreat paint pick up, easier paint application and a fine finish\r\nSuitable for use with emulsion paints', 'wall brush.jpg', 4, 0),
(6, 'Cement Mixer', 'Upright mixer for small and medium-sized construction sites. Light and compact though providing a decent working height. Includes a powerful, IP44-rated, double-insulated engine. Supplied to the stand.', 'cement mixer.jpg', 3, 1),
(7, 'Drill', 'Compact, lightweight drill driver with a wide range of applications. High-performance motor can drill into wood and metal. Features include a 2-speed transmission, single sleeve ratcheting chuck and LED work light.', 'drill.png', 6, 0),
(9, '250V Generator', 'Frame generator with inverter module to ensure pure sine wave output meaning its safe for use with sensitive electronic equipment. Perfect for use on-site due to lower noise, high run-time and rugged design.', 'generator.jpg', 6, 1),
(10, 'Hacksaw', 'Blade can be adjusted in multiple positions to obtain desired angle and cut. Rigid aluminium frame designed for maximum control. Easy adjust and tensioning control.', 'hacksaw.jpg', 2, 0),
(11, 'Claw Hammer', 'One-piece steel construction. Gravity-balanced design for optimal weight distribution and controlled swing. Features precision balance for reduced fatigue and large rubber grip for added comfort. Featuers oval shaped strike face for easy toe-nailing and efficient side nail puller.', 'hammer.jpg', 6, 0),
(12, 'Heat Gun 2000W 240W', 'Professional electronic heat gun for stripping paint, bending pipes, heat shrinking and much more. Features LCD digital display with fully adjustable temperature range. Offers memory function for last temperature recall. 6-air flow settings and a \'cool down\' mode help to prolong heater element’s life. Thermal protection sensors regulate the heat, while a heat-resistant nozzle cover with side fins prevents hot nozzle from touching surfaces. Ergonomic design with soft grip handle for maximum user comfort. Dual stabilisers and an angle-lock feature on blow-moulded carry case ensure safe hands-free operation. Easy to store with hanging hook.', 'heat gun.jpg', 4, 0),
(13, 'Digital Multimeter', 'Compact auto-ranging digital multimeter with temperature measurement and high-contrast backlit LCD display. With full protection on all ranges and a safety category to CAT III 600V. Offers a comprehensive range of features designed to accommodate the most demanding application.', 'multimetre.jpg', 1, 0),
(14, '90° Pipe Fitting', 'Push straight onto copper tube. Removable and reusable. Water Research Council Approved. British Gas Service approved for water pipes. No tools needed.', 'pipe fitting.jpg', 2, 0),
(15, 'Plumbing Pliers', 'Self-locking pliers with anti-slip action, narrow jaw profile, non-slip grips and hardened jaws.', 'plumbing pliers.jpg', 2, 0),
(16, 'Adjustable Roller Frame', 'Double adjusting arms roller frame with two plastic end caps to fit inside 1.5\" inner diameter roller covers.\r\nFor fast work covering large areas choose any roller cover 12 to 18 inches in length.\r\nEach arm has a twist knob to adjust for various length roller covers.', 'roller frame.jpg', 4, 1),
(17, 'Saw', 'Razor-sharp triple-ground teeth for cutting all materials. Cuts on the push and pull. Water-based lacquer gives up to 4 times more rust protection. Comfortable handle for prolonged use.', 'saw.jpg', 6, 1),
(18, 'Sledge Hammer', 'Fully polished striking faces and bi-material fibreglass handle. Suitable for heavy pounding and demolition jobs.', 'sledge hammer.jpg', 3, 0),
(19, 'Voltage Detector Pen', 'Offers high quality performance for the non-contact detection of AC voltage.', 'voltage detector pen.jpg', 1, 0),
(20, '8\" Wrench', 'Excellent quality wrench with comfortable handle, strong grip, wide profile groove for easy knurl adjustment and easy-to-read, laser-etched measurement scale. For use in confined spaces.', 'wrench.jpg', 2, 0),
(21, 'Bolts, Nuts & Washers', '500 Piece\r\nZinc Plated', 'bolts.jpg', 6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `userName` varchar(200) NOT NULL,
  `userEmail` varchar(100) NOT NULL,
  `userReview` int(1) NOT NULL,
  `userMessage` varchar(1000) NOT NULL,
  `dateReviewed` varchar(100) NOT NULL,
  `product_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `userName`, `userEmail`, `userReview`, `userMessage`, `dateReviewed`, `product_id`) VALUES
(16, 'Conor Doherty', 'conordoherty97@hotmail.com', 5, 'this is such a good tool', 'Tuesday, February 9, 2021', 1),
(17, 'Conor Doherty', 'conordoherty97@test.com', 4, 'This is a test', 'Wednesday, February 3, 2021', 1),
(18, 'Jodie Mccann', 'paul123@gmail.com', 5, 'Love this unreal for building me house ', 'Wednesday, February 3, 2021', 2),
(19, 'John', 'john12@gmail.com', 1, 'It broke at 2 mins I&#39;m sad now ', 'Wednesday, February 3, 2021', 2),
(20, 'Bob', 'bon@gmail.com', 3, 'Was alri hai', 'Wednesday, February 3, 2021', 2),
(21, 'Lisa', 'lisa@gmail.com', 2, 'The handle fell off but good overall', 'Wednesday, February 3, 2021', 2),
(22, 'Paddy', 'paddy@gmail.com', 2, 'Loved painting with this ', 'Wednesday, February 3, 2021', 5),
(23, 'Karen', 'karen@gmail.com', 1, 'Awful product.. Whole thing fell apart ', 'Wednesday, February 3, 2021', 5),
(24, 'Kerri', 'k@gmail.com', 5, 'So good my fav paintbrush so far!! #paintersclub xox', 'Wednesday, February 3, 2021', 5),
(25, 'Ger', 'g@gmail.com', 1, 'Bad cut my fingers off', 'Wednesday, February 3, 2021', 3),
(26, 'Jane Mclaughlin', 'janemcl73@gmail.com', 5, 'Great product and got it within 24 hours! Will definitely be using this service again in the future. ', 'Wednesday, February 3, 2021', 1),
(27, 'Charlie Desmond', 'Charlie.desmond@yahoo.co.uk', 4, 'Really good quality at reasonable priceðŸ‘', 'Wednesday, February 3, 2021', 1),
(28, 'Patricia Howard', 'Patricia.howard14@hotmail.co.uk', 5, 'Ä¢reat paint brush for large areas. Really good quality as bristles did not come out like brushes I have used in the past. Will definitely be buying more in different sizes.', 'Wednesday, February 3, 2021', 5),
(29, 'Peter Mackey', 'petermacs@yahoo.co.uk', 4, 'Found these very easy to use. &#39;Nailed it&#39; for the job I was using them for. Excellent price too ðŸ˜', 'Wednesday, February 3, 2021', 3),
(30, 'Michael  mc gurk', 'gurk@hotmail..com', 5, 'Great hammer nailed for me I&#39;ll  be back .Great firm..', 'Wednesday, February 3, 2021', 1),
(31, 'Sean Fagans.', 'sean@outlook.com', 5, 'Needed them quickly for  emergency job great ðŸ‘ ', 'Wednesday, February 3, 2021', 4),
(32, 'Bobby Shiels', 'bobbybee@hotmail.com', 4, 'I&#39;m an apprentice electrician and these are great for starting up my toolbox. Good price for a poor student.', 'Wednesday, February 3, 2021', 4),
(33, 'Michael', 'mickeyj@gmail.com', 3, 'It was decent for the job, found that it shed quite a wee bit', 'Wednesday, February 3, 2021', 5),
(34, 'Jess', 'jess234@hotmail.com', 5, 'Really brilliant product, top quality. Best ive had. ', 'Wednesday, February 3, 2021', 2),
(35, 'Test', 'test@test.com', 2, 'f5ds4f6ds5f1das65f1d65f41ds6f', 'Thursday, February 4, 2021', 4),
(36, 'Conor Doherty', 'cd163546@test.com', 5, 'this is a fantastic cement mixer. Nice and lightweight, easy to lift out of and into my van.', 'Sunday, February 7, 2021', 6),
(37, 'Conor Doherty', 'cdddhsi&#34;test.com', 5, 'this is a great too', 'Tuesday, February 9, 2021', 3),
(38, 'Conor Doherty', 'conordoherty97@hotmail.com', 5, 'this is a fantastic tool kdsjafsdifblsdiaj', 'Tuesday, February 9, 2021', 3),
(39, 'Conor Doherty', 'conordoherty97@hotmail.com', 4, 'update', 'Tuesday, February 9, 2021', 3),
(40, 'Conor Doherty', 'conordoherty97@hotmail.com', 2, 'didnt work for me', 'Tuesday, February 9, 2021', 3),
(41, 'Conor Doherty', 'conordoherty97@hotmail.com', 1, 'Blade snapped after 2 uses', 'Tuesday, February 9, 2021', 10),
(42, 'Conor Doherty', 'conordoherty97@hotmail.com', 4, 'fantastic, very useful', 'Tuesday, February 9, 2021', 21),
(43, 'Conor Doherty', 'conordoherty97@hotmail.com', 5, 'brilliant', 'Tuesday, February 9, 2021', 21),
(44, 'Jason Coyle', 'JCoyle@yahoo.co.uk', 4, 'Sturdy tool. Good quality', 'Tuesday, February 9, 2021', 1),
(45, 'Patricia Phelan', 'Patsy25@hotmail.com', 4, 'Good price. Lightweight and handy for all my odd jobs around the house.', 'Tuesday, February 9, 2021', 1),
(46, 'Hilda', 'hil@gmail.com', 5, 'Very reliable and very quick at getting me sorted 100% use nailit  again ðŸ‘ ', 'Tuesday, February 9, 2021', 9),
(47, 'Joe Brannigan', 'JoeB74@yahoo.co.uk', 4, 'Liked the design of this trowel. Got into allvthe nooks and crannies. Good professional job done. Nailed it!', 'Tuesday, February 9, 2021', 2),
(48, 'Michey gunn', 'gun@yahoo.comgreat generator', 5, 'Handy easy to move around  great', 'Tuesday, February 9, 2021', 9),
(49, 'Paddy McLaughlin', 'PaddyMac@hotmail.com', 5, 'Excellent tool. Top jobðŸ‘', 'Tuesday, February 9, 2021', 2),
(50, 'Ben Flanagan', 'benji67@yahoo.co.uk', 3, 'A bit stiff to use at first. Had to WD-40 to loosen it. Did the job grand though.', 'Tuesday, February 9, 2021', 3),
(51, 'Joe mc kay', 'kay@outlook.com', 5, 'Pulled me out of a hole out doing a wee  job was able to get them quickly with  nailing.powerful', 'Tuesday, February 9, 2021', 4),
(52, 'James McGowan', 'Jamsie@yahoo.co.uk', 4, 'Professional set of pliers.', 'Tuesday, February 9, 2021', 3),
(53, 'Sharon Logan', 'Shaz97@hotmail.com', 4, 'Really liked this product.', 'Tuesday, February 9, 2021', 4),
(54, 'Newly brown', 'brown@yahoo.com', 5, 'Picked them up quickly great great ', 'Tuesday, February 9, 2021', 4),
(55, 'Thomas Benton', 'Thoms73@yahoo.co.uk', 4, 'Strong tool.', 'Tuesday, February 9, 2021', 4),
(56, 'Paddy dunn', 'dunn@gmail.com', 5, 'Great mixer be getting again bril high.', 'Tuesday, February 9, 2021', 6),
(57, 'Paula Brennan', 'paulab@yahoo.co.uk', 4, 'Love this paintbrush. ', 'Tuesday, February 9, 2021', 5),
(58, 'Noel boyle', 'noel@outlook.com', 5, 'Needed a mixer quickly nailit  done the perfect  job brilliant ', 'Tuesday, February 9, 2021', 6),
(59, 'Michael', 'Doherty', 5, 'Fantastic product!', 'Tuesday, February 9, 2021', 1),
(60, 'Conor Bell', 'Belly2@hotmail.com', 4, 'Great product. ', 'Tuesday, February 9, 2021', 5),
(61, 'Martin', 'McGurk', 3, 'Was slightly disappointed with the quality but all in all - decent get.', 'Tuesday, February 9, 2021', 1),
(62, 'Paul', 'Mclaughlin', 5, 'great job for the bricklaying i must say', 'Tuesday, February 9, 2021', 2),
(63, 'Marcus', 'marky@gmail.com', 5, 'brilliant!', 'Tuesday, February 9, 2021', 2),
(64, 'Jack Semple', 'jackiesem@hotmail.com', 4, 'Love this cement mixer. Very lightweight and easy to use.', 'Tuesday, February 9, 2021', 6),
(65, 'david', 'dave123@hotmail.com', 3, 'it was ok for the small job but poor quality', 'Tuesday, February 9, 2021', 3),
(66, 'jason', 'jj2@yahoo.com', 3, 'bit pricey now', 'Tuesday, February 9, 2021', 6),
(67, 'Gerard', 'gg917348@gmail.com', 5, 'fabulous for the building site!', 'Tuesday, February 9, 2021', 6),
(68, 'Richard Doherty', 'richiedoc47@hotmail.com', 4, 'Great wee mixer.', 'Tuesday, February 9, 2021', 6),
(69, 'Don', 'dm@hotmail.com', 5, 'good job aye', 'Tuesday, February 9, 2021', 7),
(70, 'shannon', 'shan45@live.com', 5, 'great brand', 'Tuesday, February 9, 2021', 7),
(71, 'shelby', 'shelbiiiiii@icloud.com', 5, 'almost blew my house up', 'Tuesday, February 9, 2021', 9),
(72, 'Sandra Thompson', 'Sandradee@hotmail.com', 4, 'Best present ever!', 'Tuesday, February 9, 2021', 7),
(73, 'ryan', 'riri23@gmail.ie', 5, 'i loved it', 'Tuesday, February 9, 2021', 9),
(74, 'Cormac Porter', 'cormacboy@hotmail.com', 5, 'Great product. Worth the money', 'Tuesday, February 9, 2021', 7),
(75, 'manus', 'manny3@outlook.com', 2, 'went rusty in a few weeks, unusable', 'Tuesday, February 9, 2021', 10),
(76, 'Simon Arthur', 'Si@tradeline.com', 5, 'Great for a small business.', 'Tuesday, February 9, 2021', 9),
(77, 'michelle', 'michelle3@hotmail.com', 5, 'wow!! unreal!', 'Tuesday, February 9, 2021', 10),
(78, 'richard', 'ritchierich@gmail.com', 5, 'really good!', 'Tuesday, February 9, 2021', 11),
(79, 'liam', 'liam7777@gmail.com', 5, 'over the moon, 100% recommend', 'Tuesday, February 9, 2021', 11),
(80, 'Tommy Boe', 'tommy45@gmail.com', 5, 'Best generator ever.', 'Tuesday, February 9, 2021', 9),
(81, 'aidan', 'aid666666@hotmail.com', 5, 'had a few injuries with this', 'Tuesday, February 9, 2021', 12),
(82, 'mandy', 'handymandy123@hotmail.com', 5, 'great!', 'Tuesday, February 9, 2021', 12),
(83, 'Peter Moore', 'PeteMoore@hotmail.com', 5, 'Great product.', 'Tuesday, February 9, 2021', 10),
(84, 'maisie', 'mais45@icloud.com', 4, 'good quality', 'Tuesday, February 9, 2021', 13),
(85, 'Janice Patterson', 'Jans76@yahoo.co.uk', 5, 'Great wee hacksaw.', 'Tuesday, February 9, 2021', 10),
(86, 'lana', 'lanadelrey@icloud.com', 1, 'really terrible product and way too expensive for the quality', 'Tuesday, February 9, 2021', 13),
(87, 'mabel', 'may98@gmail.com', 1, 'what even is this, dont like it', 'Tuesday, February 9, 2021', 14),
(88, 'jade', 'jade123@gotmail.com', 2, 'really terrible product and way too expensive for the quality', 'Tuesday, February 9, 2021', 14),
(89, 'bernard', 'barney123@gmail.com', 2, 'broke a pipe, terrible', 'Tuesday, February 9, 2021', 15),
(90, 'siofra', 'siofra12345@gmail.com', 5, 'i love it omg!!', 'Tuesday, February 9, 2021', 15),
(91, 'Katie ', 'kat@outlook.com', 3, 'Didnt like it sorry. ', 'Tuesday, February 9, 2021', 16),
(92, 'peter', 'pete@gmail.com', 2, 'worst one ive had', 'Tuesday, February 9, 2021', 16),
(93, 'layla', 'layla1710@icloud.com', 4, 'pretty decent', 'Tuesday, February 9, 2021', 16),
(94, 'Hugh mc ginty', 'gin@yahoo.com', 3, 'Its a saw but you need them now and again', 'Tuesday, February 9, 2021', 17),
(95, 'gerry', 'gerry67@gmail.com', 3, 'mediocre', 'Tuesday, February 9, 2021', 19),
(96, 'dawson', 'dawsonmartins@outlook.com', 1, 'never again', 'Tuesday, February 9, 2021', 19),
(97, 'David Elton', 'davso65@hotmail.com', 2, 'Did not like this claw hammer at all. Handle far too long and narrow.', 'Tuesday, February 9, 2021', 11),
(98, 'Matthew Edison', 'matt78@gmail.com', 3, 'Ok tool but a bit too on the light side.', 'Tuesday, February 9, 2021', 11),
(99, 'Neil  fogarty ', 'Neil@gmail.com', 4, 'Very handy assorted screws but can&#39;t please everyone. ', 'Tuesday, February 9, 2021', 21),
(100, 'Declan Glover', 'Decthewreck@hotmail.com', 3, 'Ok product. Took a while to heat up.', 'Tuesday, February 9, 2021', 12),
(101, 'Robert Brown', 'robbro@yahoo.co.uk', 4, 'Good product. Will use Nail It again.', 'Tuesday, February 9, 2021', 12),
(102, 'John shields', 'sheild@yahoo.com', 4, 'Very good  drill worth the money Â£70', 'Tuesday, February 9, 2021', 7),
(103, 'Mervyn Lagan', 'Laganside@hotmail.com', 4, 'Great wee gadget. Portable for wee awkward jobs.', 'Tuesday, February 9, 2021', 13),
(104, 'Carmel Mullen', 'carmelm@hotmail.com', 5, 'So handy!', 'Tuesday, February 9, 2021', 13),
(105, 'Jimmy  Green ', 'jim@gmail.com', 5, 'Great  for jobi was doing worth buying ', 'Tuesday, February 9, 2021', 12),
(106, 'Kevin Spade', 'kevin87@gmail.com', 5, 'Good quality', 'Tuesday, February 9, 2021', 14),
(107, 'Fred Temple', 'FTemp@yahoo.co.uk', 4, 'Perfect for the job.', 'Tuesday, February 9, 2021', 14),
(108, 'Eddie mc clusky ', 'clus@outlook.com', 5, 'Every house should have one of these', 'Tuesday, February 9, 2021', 20),
(109, 'Pete Murray', 'petem@yahoo.co.uk', 4, 'Great addition to my toolbox.', 'Tuesday, February 9, 2021', 15),
(110, 'Stan Fenton', 'Stantheman@hotmail.com', 4, 'Great tool. Love it.', 'Tuesday, February 9, 2021', 15),
(111, 'Denis Biyle', 'denny56@yahoo.co.uk', 2, 'Not great. Will have to try somewhere else.', 'Tuesday, February 9, 2021', 16),
(112, 'Jennifer Glynn', 'Jen@hotmail.com', 3, 'Mediocre tool.', 'Tuesday, February 9, 2021', 16),
(113, 'Sammy McGrory', 'sammy@gmail.com', 4, 'Love this saw.', 'Tuesday, February 9, 2021', 17),
(114, 'Andrew Shepard', 'Andy78@hotmsil.com', 4, 'Great saw.', 'Tuesday, February 9, 2021', 17),
(115, 'Ian McLaren', 'IanMac67@hotmail.com', 4, 'This is a top class wrench. So sturdy.', 'Wednesday, February 10, 2021', 20),
(116, 'Simon Sarsfield', 'simon444@yahoo.co.uk', 4, 'Was looking for a quality wrench at a good price. Thanks to Nail It, I got it.', 'Wednesday, February 10, 2021', 20),
(117, 'Pearse Lennon', 'PLennon@hotmail.com', 4, 'So handy as I am always losing this kind of stuff. I can just throw this into the back of the van and go off to do a job.', 'Wednesday, February 10, 2021', 21),
(118, 'Sharon Dunbar', 'sharon41@yahoo.co.uk', 4, 'I bought this for my husband as he is always looking for different nuts and bolts. Now they&#39;re all in the one place in the shed.', 'Wednesday, February 10, 2021', 21),
(119, 'Paul Friel', 'PFriel@gmail.com', 4, 'Great addition to my starter kit.', 'Wednesday, February 10, 2021', 19),
(120, 'Polly Bryant', 'prettypolly@yahoo.co.uk', 4, 'Great gadget. Love it.', 'Wednesday, February 10, 2021', 19),
(121, 'Alice Garland', 'Alice78@hotmail.com', 3, 'A wee bit heavy to use for a female.', 'Wednesday, February 10, 2021', 18),
(122, 'Steven Bradley', 'stevethebrad@gmail.com', 3, 'Really good product.', 'Wednesday, February 10, 2021', 18),
(123, 'Conor Doherty', 'conordoherty97@hotmail.com', 4, 'testing', 'Thursday, February 18, 2021', 2),
(124, 'Conor Doherty', 'conordoherty97@hotmail.com', 4, 'This is a test again', 'Tuesday, February 23, 2021', 1);

-- --------------------------------------------------------

--
-- Table structure for table `shop1products`
--

CREATE TABLE `shop1products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `userPrice` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `trade_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop1products`
--

INSERT INTO `shop1products` (`id`, `name`, `price`, `userPrice`, `quantity`, `product_id`, `trade_id`) VALUES
(1, 'Brick Hammer', 11.99, 10.79, 7, 1, 3),
(2, 'Wire Strippers', 20.99, 18.89, 50, 3, 1),
(3, 'Cement Mixer', 220, 198, 15, 6, 3),
(4, 'Drill', 70, 63, 0, 7, 6),
(5, 'Hack Saw', 12.99, 11.69, 20, 10, 2),
(6, 'Hammer', 10, 9, 10, 11, 6),
(7, 'Heat Gun', 22.5, 20.49, 8, 12, 4),
(8, 'Pipe Fitting', 12, 10.5, 2, 14, 2),
(9, 'Roller Frame', 29.99, 26.99, 5, 16, 4),
(10, 'Saw', 12.99, 11.69, 10, 17, 6),
(11, 'Sledge Hammer', 24.99, 22.49, 5, 18, 3),
(12, 'Trowel', 5, 4.5, 3, 2, 3),
(13, 'Brush', 4.99, 4.49, 0, 5, 4),
(14, 'Bolts, Nuts & Washers', 19.99, 17.99, 50, 21, 6);

-- --------------------------------------------------------

--
-- Table structure for table `shop2products`
--

CREATE TABLE `shop2products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `userPrice` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `trade_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop2products`
--

INSERT INTO `shop2products` (`id`, `name`, `price`, `userPrice`, `quantity`, `product_id`, `trade_id`) VALUES
(1, 'Brick Hammer', 15.5, 15, 15, 1, 3),
(2, 'Wire Strippers', 24.99, 22.49, 3, 3, 1),
(3, 'Cement Mixer', 199, 179, 11, 6, 3),
(4, 'Drill', 75, 67.5, 10, 7, 6),
(5, 'Hack Saw', 11, 9.99, 20, 10, 2),
(6, 'Hammer', 10, 9, 15, 11, 6),
(7, 'Heat Gun', 20.99, 18.89, 6, 12, 4),
(8, 'Pipe Fitting', 9.99, 8.99, 0, 14, 2),
(9, 'Roller Frame', 24.99, 22.49, 12, 16, 4),
(10, 'Saw', 11.99, 10.79, 3, 17, 6),
(11, 'Sledge Hammer', 22.49, 20.25, 5, 18, 3),
(12, 'Trowel', 5, 4.5, 16, 2, 3),
(13, 'Brush', 4.5, 4, 0, 5, 4),
(14, 'Bolts, Nuts & Washers', 20, 18, 24, 21, 6),
(15, '250V Generator', 250, 225, 18, 9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `shop3products`
--

CREATE TABLE `shop3products` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` double NOT NULL,
  `userPrice` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `trade_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shop3products`
--

INSERT INTO `shop3products` (`id`, `name`, `price`, `userPrice`, `quantity`, `product_id`, `trade_id`) VALUES
(1, 'Brick Hammer', 14.99, 13.49, 57, 1, 3),
(2, 'Wire Strippers', 22.49, 20.25, 0, 3, 1),
(4, 'Cement Mixer', 250, 225, 0, 6, 3),
(5, 'Drill', 69.99, 62.99, 2, 7, 6),
(6, 'Hack Saw', 10, 9, 4, 10, 2),
(7, 'Hammer', 10.5, 9.5, 2, 11, 6),
(8, 'Heat Gun', 25, 22.5, 11, 12, 4),
(9, 'Saw', 10.5, 9.5, 0, 17, 6),
(10, 'Sledge Hammer', 24.99, 22.49, 5, 18, 3),
(11, 'Trowel', 5, 4.5, 0, 2, 3),
(12, 'Brush', 5, 4.5, 4, 5, 4),
(13, 'Bolts, Nuts & Washers', 24.99, 22.49, 11, 21, 6),
(14, '250V Generator', 199, 179, 4, 9, 6);

-- --------------------------------------------------------

--
-- Table structure for table `shops`
--

CREATE TABLE `shops` (
  `id` int(11) NOT NULL,
  `shop_name` varchar(50) NOT NULL DEFAULT 'N/A',
  `address` varchar(100) NOT NULL DEFAULT 'N/A',
  `number` varchar(50) NOT NULL DEFAULT 'N/A',
  `email` varchar(100) NOT NULL DEFAULT 'N/A',
  `monday` varchar(100) NOT NULL,
  `tuesday` varchar(100) NOT NULL DEFAULT 'N/A',
  `wednesday` varchar(100) NOT NULL DEFAULT 'N/A',
  `thursday` varchar(100) NOT NULL DEFAULT 'N/A',
  `friday` varchar(100) NOT NULL DEFAULT 'N/A',
  `saturday` varchar(100) NOT NULL DEFAULT 'N/A',
  `sunday` varchar(100) NOT NULL DEFAULT 'N/A',
  `map` varchar(10000) NOT NULL,
  `image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `shops`
--

INSERT INTO `shops` (`id`, `shop_name`, `address`, `number`, `email`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `saturday`, `sunday`, `map`, `image`) VALUES
(1, 'NailedIT', '209 Roden St, \r\nBelfast, \r\nBT12 5QB', '028 9020 3500', 'admin@nailedit.com', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'N/A', 'https://goo.gl/maps/9a6WPGb5Lo5QBWaQ8', ''),
(2, 'Ace Hardware', 'Unit 11a, \r\nBoucher Shopping Park, \r\nBoucher Crescent, \r\nBelfast, \r\nBT12 6HU', '0333 304 0191', 'shop1@nailedit.com', '6am - 8pm', '6am - 8pm', '6am - 8pm', '6am - 8pm', '6am - 8pm', '6am - 6pm', '7am - 3pm', 'https://goo.gl/maps/SYgmCkmBGsB7j2HE7', 'ace hardware.jpg'),
(3, 'Home Hardware', '27 Park Centre, \r\nDonegall Rd, \r\nBelfast, \r\nBT12 6HN', '028 9031 3207', 'shop2@nailedit.com', '5.30am-7pm', '6am-8pm', '6am-6pm', '5.30am-7pm', '6am-8pm', '6am-6pm', 'Closed', 'https://goo.gl/maps/vQcKL3zzqW8hFGno6', 'home hardware.jpg'),
(4, 'Harbor Freight', '269 Falls Rd, \r\nBelfast, \r\nBT12 6FD', '07851 907007', 'shop3@nailedit.com', '6am - 8pm', '6am - 8pm', '6am - 8pm', '6am - 8pm', '6am - 8pm', '6am - 6pm', '9am - 4pm', 'https://goo.gl/maps/qVV97VRg3m14nAqAA', 'harbor freight.png');

-- --------------------------------------------------------

--
-- Table structure for table `trades`
--

CREATE TABLE `trades` (
  `id` int(11) NOT NULL,
  `trade` varchar(50) NOT NULL,
  `call_out_fee` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trades`
--

INSERT INTO `trades` (`id`, `trade`, `call_out_fee`) VALUES
(1, 'Electrician', '60'),
(2, 'Plumber', '55'),
(3, 'Bricklayer', '70'),
(4, 'Painter & Decorator', '50'),
(5, 'Handy Man', '55'),
(6, 'Other', '40');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `emailAddress` varchar(50) NOT NULL,
  `phoneNumber` varchar(50) NOT NULL,
  `occupation` varchar(100) NOT NULL DEFAULT 'N/A',
  `about` varchar(500) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  `userPassword` varchar(255) NOT NULL,
  `createdDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstName`, `lastName`, `emailAddress`, `phoneNumber`, `occupation`, `about`, `img`, `userPassword`, `createdDate`) VALUES
(1, 'Conor', 'Doherty', 'cd@test.com', '123456789', 'student', '', 'john doe.jpg', 'pass', '2021-01-19 11:10:02'),
(2, 'jane', 'doe', 'jane@test.com', '1235467498', 'n/a', 'i am a student studying cit at queens.', 'img_avatar2.png', 'pass', '2021-01-19 11:17:15'),
(3, 'john', 'doe', 'jd@test.com', '1234567890', 'electrician', 'i am a welder', 'john doe.jpg', 'pass', '2021-01-19 12:39:10'),
(4, 'Conor', 'Doherty', 'conordoherty97@hotmail.com', '07889789348', 'electrician', 'I am an electrician', 'images.png', 'pass', '2021-02-02 17:29:39'),
(5, 'Jane', 'McLaughlin', 'janemcl73@gmail.com', '075123456789', 'Electrician', NULL, NULL, 'pass', '2021-02-03 21:32:15'),
(6, 'test', 'test', 'test@test.com', '23165462', '', NULL, NULL, 'pass', '2021-02-05 17:56:27');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aboutus`
--
ALTER TABLE `aboutus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trade_id` (`trade_id`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trade_id` (`trade_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `shop_id` (`shop_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `trade_id` (`trade_id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `shop1products`
--
ALTER TABLE `shop1products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `shop_id` (`product_id`),
  ADD KEY `shop1products_ibfk_2` (`trade_id`);

--
-- Indexes for table `shop2products`
--
ALTER TABLE `shop2products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`,`trade_id`),
  ADD KEY `trade_id` (`trade_id`);

--
-- Indexes for table `shop3products`
--
ALTER TABLE `shop3products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`,`trade_id`),
  ADD KEY `trade_id` (`trade_id`);

--
-- Indexes for table `shops`
--
ALTER TABLE `shops`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trades`
--
ALTER TABLE `trades`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aboutus`
--
ALTER TABLE `aboutus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=138;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `shop1products`
--
ALTER TABLE `shop1products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shop2products`
--
ALTER TABLE `shop2products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `shop3products`
--
ALTER TABLE `shop3products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `shops`
--
ALTER TABLE `shops`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `trades`
--
ALTER TABLE `trades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`trade_id`) REFERENCES `trades` (`id`);

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`trade_id`) REFERENCES `trades` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`shop_id`) REFERENCES `shops` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`trade_id`) REFERENCES `trades` (`id`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `shop1products`
--
ALTER TABLE `shop1products`
  ADD CONSTRAINT `shop1products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `shop1products_ibfk_2` FOREIGN KEY (`trade_id`) REFERENCES `trades` (`id`);

--
-- Constraints for table `shop2products`
--
ALTER TABLE `shop2products`
  ADD CONSTRAINT `shop2products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `shop2products_ibfk_2` FOREIGN KEY (`trade_id`) REFERENCES `trades` (`id`);

--
-- Constraints for table `shop3products`
--
ALTER TABLE `shop3products`
  ADD CONSTRAINT `shop3products_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `shop3products_ibfk_2` FOREIGN KEY (`trade_id`) REFERENCES `trades` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
