-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2020 at 12:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `houserent`
--

-- --------------------------------------------------------

--
-- Table structure for table `house_for_rent`
--

CREATE TABLE `house_for_rent` (
  `house_id` int(255) NOT NULL,
  `owner_id` int(255) NOT NULL,
  `size` int(255) NOT NULL,
  `bedrooms` int(255) NOT NULL,
  `livingrooms` varchar(255) NOT NULL,
  `dining` varchar(255) NOT NULL,
  `servant_room` varchar(255) NOT NULL,
  `kitchen` int(255) NOT NULL,
  `parking` varchar(255) NOT NULL,
  `attach_bath` varchar(255) NOT NULL,
  `common_bath` int(255) NOT NULL,
  `balcony` int(255) NOT NULL,
  `floor_type` varchar(255) NOT NULL,
  `Level` varchar(255) NOT NULL,
  `direction` varchar(10) NOT NULL,
  `rent` int(255) NOT NULL,
  `service_charge` int(255) NOT NULL,
  `advance` int(255) NOT NULL,
  `description` varchar(10000) NOT NULL,
  `city` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `address` varchar(2555) NOT NULL,
  `renting_status` varchar(10) NOT NULL,
  `img1` varchar(255) NOT NULL,
  `img2` varchar(255) NOT NULL,
  `img3` varchar(255) NOT NULL,
  `img4` varchar(255) NOT NULL,
  `img5` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `house_for_rent`
--

INSERT INTO `house_for_rent` (`house_id`, `owner_id`, `size`, `bedrooms`, `livingrooms`, `dining`, `servant_room`, `kitchen`, `parking`, `attach_bath`, `common_bath`, `balcony`, `floor_type`, `Level`, `direction`, `rent`, `service_charge`, `advance`, `description`, `city`, `area`, `address`, `renting_status`, `img1`, `img2`, `img3`, `img4`, `img5`) VALUES
(2, 3, 1300, 2, 'yes', 'yes', 'no', 1, 'yes', '1', 1, 2, 'Mosaic', 'Ground Floor', 'South', 18000, 2000, 36000, 'Nice', 'Dhaka', 'Mohammadpur', 'Dhaka', 'Not Rented', 'house_for_rent_images/9miley-cyrus-home-870x578.jpg', 'house_for_rent_images/aangan-prime-Sample-Villa-12.jpg', 'house_for_rent_images/long-narrow-kitchen-island-design-modern-narrow-kitchens-multidao.jpg', 'house_for_rent_images/slider-1b.4ec10847.jpg', 'house_for_rent_images/Wooden+House+Slovakia_interior_Rustic_luxury3.jpg'),
(3, 3, 750, 3, 'yes', 'yes', 'no', 1, 'yes', '2', 1, 3, 'Mosaic', '10', 'South', 20000, 2000, 40000, 'Kora bari', 'Chittagong', 'Boddarhat', 'Chittagong', 'Not Rented', 'house_for_rent_images/aangan-prime-Sample-Villa-12.jpg', 'house_for_rent_images/slider-1b.4ec10847.jpg', 'house_for_rent_images/view2-1280x720.jpg', 'house_for_rent_images/Wooden+House+Slovakia_interior_Rustic_luxury.jpg', 'house_for_rent_images/Wooden+House+Slovakia_interior_Rustic_luxury3.jpg'),
(4, 4, 1350, 3, 'yes', 'yes', 'yes', 1, 'yes', '2', 1, 3, 'Tiles', '6', 'South', 25000, 2000, 40000, 'Great House', 'Chittagong', 'Boddarhat', 'Chittagong', 'Not Rented', 'house_for_rent_images/9miley-cyrus-home-870x578.jpg', 'house_for_rent_images/aangan-prime-Sample-Villa-12.jpg', 'house_for_rent_images/long-narrow-kitchen-island-design-modern-narrow-kitchens-multidao.jpg', 'house_for_rent_images/slider-1b.4ec10847.jpg', 'house_for_rent_images/Wooden+House+Slovakia_interior_Rustic_luxury.jpg'),
(5, 4, 5000, 4, 'yes', 'yes', 'yes', 1, 'yes', '2', 2, 4, 'Tiles', '6', 'South', 40000, 4000, 60000, 'Great', 'Chittagong', 'Khulshi', 'Chittagong', 'Not Rented', 'house_for_rent_images/9miley-cyrus-home-870x578.jpg', 'house_for_rent_images/aangan-prime-Sample-Villa-12.jpg', 'house_for_rent_images/long-narrow-kitchen-island-design-modern-narrow-kitchens-multidao.jpg', 'house_for_rent_images/view2-1280x720.jpg', 'house_for_rent_images/Wooden+House+Slovakia_interior_Rustic_luxury3.jpg'),
(6, 4, 750, 2, 'yes', 'yes', 'yes', 1, 'yes', '1', 1, 2, 'Mosaic', '3', 'South', 18000, 2000, 36000, 'Good', 'Chittagong', 'Boddarhat', 'Chittagong', 'Not Rented', 'house_for_rent_images/view2-1280x720.jpg', 'house_for_rent_images/aangan-prime-Sample-Villa-12.jpg', 'house_for_rent_images/long-narrow-kitchen-island-design-modern-narrow-kitchens-multidao.jpg', 'house_for_rent_images/slider-1b.4ec10847.jpg', 'house_for_rent_images/Wooden+House+Slovakia_interior_Rustic_luxury3.jpg'),
(7, 6, 750, 1, 'yes', 'yes', 'no', 1, 'yes', '1', 1, 2, 'Tiles', '9', 'North', 20000, 2000, 40000, 'Good House', 'Dhaka', 'Adabor', 'Adabor, Dhaka', 'Not Rented', 'house_for_rent_images/long-narrow-kitchen-island-design-modern-narrow-kitchens-multidao.jpg', 'house_for_rent_images/slider-1b.4ec10847.jpg', 'house_for_rent_images/view2-1280x720.jpg', 'house_for_rent_images/Wooden+House+Slovakia_interior_Rustic_luxury.jpg', 'house_for_rent_images/Wooden+House+Slovakia_interior_Rustic_luxury3.jpg'),
(10, 6, 5000, 3, 'yes', 'yes', 'no', 1, 'yes', '2', 1, 3, 'Tiles', '10', 'North', 60000, 4000, 60000, 'Boroloks', 'Dhaka', 'Dhanmondi', 'Dhaka', 'Not Rented', 'house_for_rent_images/aangan-prime-Sample-Villa-12.jpg', 'house_for_rent_images/long-narrow-kitchen-island-design-modern-narrow-kitchens-multidao.jpg', 'house_for_rent_images/slider-1b.4ec10847.jpg', 'house_for_rent_images/Wooden+House+Slovakia_interior_Rustic_luxury.jpg', 'house_for_rent_images/Wooden+House+Slovakia_interior_Rustic_luxury3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Area` varchar(255) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `birthday` varchar(20) NOT NULL,
  `Address` varchar(2555) NOT NULL,
  `user_photo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `email`, `password`, `contact`, `City`, `Area`, `gender`, `birthday`, `Address`, `user_photo`) VALUES
(3, 'Md. Sebgatullah', 'Mahbub', 'sebgatullah.cuet.cse14@gmail.com', '$2y$10$ZxXDpjOfD.NkfyvISlek8eG8pqNHJX1s.OI9uas3H1sJIlIcuRo.W', '01521212602', 'Dhaka', 'Mohammadpur', 'male', '28/09/1994', 'dhaka', 'user_images/sebgat.jpg'),
(4, 'Tasmina', 'Tasin', 'tasminatasin7@gmail.com', '$2y$10$GogU.ikuJuDCFcCRbJ00mui0.YkvfP7j1H6PU4..GVOClno2Ywvam', '01521328180', 'Chittagong', 'Boddarhat', 'female', '20/12/1996', 'Chittagong', 'user_images/IMG_20190805_175722.jpg'),
(5, 'Tasmina', 'Tasin', 'dokkhin_shikol@gmail.com', '$2y$10$Q5mxBXs9I.i6c.eJKYkc2u0fIfmxtRLI4CncPJp.3G4rDhHOzeaCu', '01521212602', 'Dhaka', 'Muradpur', 'female', '17/08/2005', 'hjf', 'user_images/IMG_20190131_180019.jpg'),
(6, 'Samiullah', 'Mahbub', 'sami.vai420@gmail.com', '$2y$10$N0tFIVQr8XX30As/AnieseJ0C6znNcq29zMk/QLfcIjnv.XfgVjxO', '01816947270', 'Dhaka', 'Dhanmondi', 'male', '04/09/1998', 'Dhaka', 'user_images/IMG_20180810_215033.jpg'),
(7, 'Asma', 'Runa', 'runaalam1@gmail.com', '$2y$10$l49Pa1FpQZBS4P73dISG8evRAakZj5uhXYR1Pc/rycznDjrsQP5/a', '01712126539', 'Dhaka', 'Mohammadpur', 'female', '15/04/1971', 'Dhaka', 'user_images/IMG_20180821_164237.jpg'),
(8, 'Mahabub', 'Alam', 'mahabubapappu@gmail.com', '$2y$10$JZM4m/eq5F8Zv9WTvFdfW.mMaRMd2sB1Kv9i.Dp/14QKXCilu/XlS', '01721750689', 'Dhaka', 'Dhanmondi', 'male', '15/05/1961', 'Dhaka', 'user_images/IMG_1276.JPG'),
(9, 'Aman', 'ullah', 'aman420@gmail.com', '$2y$10$lgyQkeI.6hI.tu8rsMxr8.9deLDe76bhTgAmFl0TneEoNQtmxWBoG', '01521212602', 'Chittagong', 'Chawkbazar', 'male', '10/05/1995', 'Chittagong', 'user_images/IMG_1211.JPG'),
(10, 'Mazhar', 'Islam', 'mazhar420@gmail.com', '$2y$10$A0VQiudIXOkS1yWujqgXF.ngBAKhWcSyFcVpzDZLdNILvxHZEMgX6', '01816947270', 'Kushtia', 'Bozlur Mor', 'male', '20/12/1996', 'Kushtia', 'user_images/IMG_1212.JPG');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `house_for_rent`
--
ALTER TABLE `house_for_rent`
  ADD PRIMARY KEY (`house_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `house_for_rent`
--
ALTER TABLE `house_for_rent`
  MODIFY `house_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `house_for_rent`
--
ALTER TABLE `house_for_rent`
  ADD CONSTRAINT `house_for_rent_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `user` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
