-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2024 at 05:57 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carvilla_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients_review`
--

CREATE TABLE `clients_review` (
  `id` int NOT NULL,
  `client_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `client_msg` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `client_name` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `client_city` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients_review`
--

INSERT INTO `clients_review` (`id`, `client_img`, `client_msg`, `client_name`, `client_city`) VALUES
(4, '18faccd4aed324c8c0efb581551d7a04.png', 'The service was exceptional from start to finish. \r\nI appreciated how the team patiently answered all my questions. \r\nHighly recommended for anyone looking for a smooth car buying experience!', 'Sarah Johnson', 'New York'),
(5, 'f781f15649af5b852d5c5f3cbf11e253.png', 'I’ve been to many dealerships, but this one stood out. \r\nThey helped me find the perfect vehicle within my budget and offered great after-sales support.', 'David Martinez', 'Austin'),
(6, '5fbfc89d645be0e04126b6e874407c39.png', 'Buying a car can be stressful, but the team made the process seamless and enjoyable. \r\nThey were professional, transparent, and genuinely cared about my needs.', 'Lisa Wang', 'Los Angeles');

-- --------------------------------------------------------

--
-- Table structure for table `featured_cars`
--

CREATE TABLE `featured_cars` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `year` int NOT NULL,
  `make` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `body_style` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `car_condition` enum('New','Used') COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `short_description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `featured_cars`
--

INSERT INTO `featured_cars` (`id`, `name`, `image`, `year`, `make`, `model`, `body_style`, `car_condition`, `price`, `short_description`, `long_description`, `created_at`) VALUES
(6, 'Honda Civic', '89eee4c1c7a59cfb2674f719918856f6.png', 2020, 'Honda', 'Civic', 'Sedan', 'New', 787500.00, 'A compact sedan known for its reliability, fuel efficiency, and sleek design, ideal for everyday driving.', 'Good:\r\nReliable and fuel-efficient.\r\nAffordable maintenance costs.\r\nModern infotainment system.\r\n\r\nBad:\r\nLess powerful compared to some competitors.\r\nLimited rear legroom for taller passengers.\r\n\r\nSystem & Handling:\r\nThe Civic comes with a 2.0-liter 4-cylinder engine, delivering a smooth ride with responsive handling. The suspension provides a balance between comfort and agility, making it great for urban driving. The infotainment system includes Apple CarPlay and Android Auto, but the touchscreen interface can be a bit finicky.\r\n', '2024-10-24 09:52:31'),
(7, 'Ford F-150', 'c6dc05466baa8283e124b0fcc0007975.png', 2018, 'Ford', 'F-150', 'Pickup Truck', 'New', 1050000.00, 'A powerful and versatile pickup truck, offering excellent towing capacity and \r\nadvanced tech features for work and adventure.\r\n', 'Good:\r\nImpressive towing and payload capacity.\r\nSpacious and versatile interior.\r\nVariety of powerful engine options.\r\n\r\nBad:\r\nCan be costly with higher trims.\r\nFuel economy is not as great as other vehicles in its class.\r\n\r\nSystem & Handling:\r\nThe F-150 offers a robust powertrain, including V6 and V8 options, ideal for hauling heavy loads. It’s equipped with Ford’s SYNC infotainment system, which is easy to use. The handling is solid for a truck, but its size can make it difficult to maneuver in tight spaces.\r\n', '2024-10-24 09:58:21'),
(8, 'Toyota Camry', '46b376c09ea83181b9e8f93712f3114d.png', 2019, 'Toyota', 'Camry', 'Sedan', 'New', 840000.00, 'A midsize sedan that combines comfort, safety, and \r\nfuel efficiency, making it a popular family car.', 'Good:\r\nGreat fuel efficiency.\r\nSmooth ride and comfortable seating.\r\nHigh safety ratings.\r\n\r\nBad:\r\nBland driving experience compared to sportier competitors.\r\nRear visibility can be limited.\r\n\r\nSystem & Handling:\r\nThe Camry is powered by a 2.5-liter 4-cylinder engine, providing a quiet and composed ride. The handling is predictable, though not overly sporty. The infotainment system is straightforward and includes Toyota’s Entune with Apple CarPlay, but it lacks Android Auto.\r\n', '2024-10-24 10:00:59'),
(9, 'Chevrolet Tahoe', 'b6928659f46d068b6812b1d5b6793a45.png', 2021, 'Chevrolet', 'Tahoe', 'SUV', 'New', 1925000.00, 'A full-size SUV with ample space, strong towing ability, and \r\nmodern amenities, perfect for large families and long trips.', 'Good:\r\nSpacious interior with lots of cargo room.\r\nStrong towing capability.\r\nAdvanced safety and driver assistance features.\r\n\r\nBad:\r\nPoor fuel economy.\r\nBulky size makes city driving and parking difficult.\r\n\r\nSystem & Handling:\r\nThe Tahoe offers a powerful 5.3-liter V8 engine, ensuring smooth acceleration and excellent towing performance. It’s equipped with the Chevrolet MyLink infotainment system, featuring a user-friendly interface. Handling is firm but nimble for such a large SUV, though it can feel cumbersome in tight spaces.', '2024-10-24 10:10:22'),
(10, 'BMW 3 Series', 'a8efa99d294f6ec0895350669c62d4bc.png', 2017, 'BMW', '3 Series', 'Sedan', 'New', 980000.00, 'A luxury sports sedan that delivers a blend of performance, handling, \r\nand premium interior features for an upscale driving experience.', 'Good:\r\nExcellent handling and driving dynamics.\r\nLuxurious and tech-forward interior.\r\nStrong engine options.\r\n\r\nBad:\r\nHigh maintenance costs.\r\nLimited rear-seat space.\r\n\r\nSystem & Handling:\r\nKnown for its driving pleasure, the BMW 3 Series is agile and responsive, with sharp steering and strong acceleration. The 2.0-liter turbocharged engine delivers a thrilling drive. It features BMW’s iDrive infotainment system, which is intuitive but has a learning curve. Handling is top-notch, offering precise control on winding roads.\r\n', '2024-10-24 10:11:08'),
(11, 'Nissan Rogue', 'b89969f201caa9bd38ca4c4bb4d22dd1.png', 2020, 'Nissan', 'Rogue', 'SUV', 'New', 927500.00, 'A compact SUV offering a comfortable ride, modern tech, and good fuel economy, ideal for city and suburban driving.', 'Good:\r\nComfortable ride with spacious seating.\r\nAdvanced safety features come standard.\r\nGreat fuel efficiency for an SUV.\r\n\r\nBad:\r\nUnderpowered engine.\r\nInfotainment system could be more responsive.\r\n\r\nSystem & Handling:\r\nThe Rogue comes with a 2.5-liter 4-cylinder engine, providing decent acceleration but not much excitement. The ride is comfortable, but the handling is more tuned for comfort than performance. Nissan’s ProPilot Assist system offers semi-autonomous driving capabilities. The infotainment system is basic but easy to use.\r\n', '2024-10-24 10:15:25'),
(12, 'Subaru Outback', 'c76ceaf38babb4fa295ab8f9633f5694.png', 2019, 'Subaru', 'Outback', 'Wagon', 'New', 1050000.00, 'A rugged and reliable wagon with all-wheel drive, designed for both off-road adventures and comfortable daily commutes.\r\n', 'Good:\r\nStandard all-wheel drive and excellent off-road capability.\r\nSpacious interior with a rugged design.\r\nGreat safety ratings.\r\n\r\nBad:\r\nSlow acceleration.\r\nInfotainment system can lag at times.\r\n\r\nSystem & Handling:\r\nThe Outback comes with a 2.5-liter 4-cylinder engine, making it well-suited for outdoor adventures but less so for speed. The handling is stable, with excellent traction in off-road conditions thanks to Subaru’s Symmetrical All-Wheel Drive. The infotainment system includes Subaru’s Starlink, but its interface can be slow.\r\n', '2024-10-24 10:16:45');

-- --------------------------------------------------------

--
-- Table structure for table `newest_cars`
--

CREATE TABLE `newest_cars` (
  `id` int NOT NULL,
  `car_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `car_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `car_desc` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newest_cars`
--

INSERT INTO `newest_cars` (`id`, `car_img`, `car_name`, `car_desc`) VALUES
(68, 'e05e8f3d2a76d75e98ec971660d497e8.png', 'Chevrolet Camaro', 'The Chevrolet Camaro is an iconic American muscle car known for its powerful performance, \r\nsleek design, and aggressive styling. First introduced in 1966, \r\nthe Camaro has undergone several generations of evolution, consistently \r\noffering a blend of performance and modern technology. Available in both coupe and convertible body styles, \r\nit features a wide range of engine options, from turbocharged four-cylinder engines to powerful V8s, \r\ndelivering impressive acceleration and top speeds.'),
(69, '29281ac0b87874fc77a7071827cb82b1.png', 'BMW 3 Series Wagon', 'The BMW 3 Series Wagon is a luxury compact wagon that combines the performance and handling of \r\na sports sedan with the versatility of a family vehicle. Known for its elegant design, \r\nprecise driving dynamics, and premium interior, it offers a perfect balance between practicality \r\nand sportiness. The 3 Series Wagon comes with a range of powertrains, including fuel-efficient \r\n4-cylinder engines and powerful 6-cylinder options. It boasts cutting-edge technology, including \r\na high-definition infotainment system, digital driver displays, and advanced safety features, along \r\nwith a spacious cargo area ideal for daily use or road trips. Perfect for drivers who need extra space\r\nbut don\'t want to compromise on driving pleasure.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `username` varchar(55) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin_user', '$2y$10$09nR9DQVY7.ctMy4saeo9.LY5qNvB0PBio4v/.TEF33n0e6YVAWZK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients_review`
--
ALTER TABLE `clients_review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured_cars`
--
ALTER TABLE `featured_cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newest_cars`
--
ALTER TABLE `newest_cars`
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
-- AUTO_INCREMENT for table `clients_review`
--
ALTER TABLE `clients_review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `featured_cars`
--
ALTER TABLE `featured_cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `newest_cars`
--
ALTER TABLE `newest_cars`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
