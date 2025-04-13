-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 20, 2024 at 07:55 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shop`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` double NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `image`) VALUES
(1, 'Usb Kingston 3.0', 'USB Kingston siêu mỏng  có hình thức nhỏ gọn và không nắp phù hợp với mọi phong cách năng động.', 42000, 'https://m.media-amazon.com/images/I/31UpGSJdmqL._AC_.jpg'),
(2, 'Ổ cứng di động External SSD', 'Dung lượng: 500GB, 1TB, 2TB Chống sốc, chống nước IP55 Thiết kế nhỏ gọn', 3000000, 'https://m.media-amazon.com/images/I/911ujeCkGfL._AC_UY436_FMwebp_QL65_.jpg'),
(3, 'RAM Laptop Samsung 8GB', 'Samsung là một thương hiệu hàng đầu trong việc sản xuất chip nhớ, RAM máy tính. Thời gian gần đây, Samsung đã không ngừng nghiên cứu, cải tiến để tạo ra được những sản phẩm RAM máy tính phục vụ cho mọi nhu cầu của người tiêu dùng. RAM Laptop Samsung 8GB DDR4 3200 chính là một sản phẩm mới của Samsung được tích hợp nhiều ưu điểm trong đó thu hút được mọi người dùng.', 750000, 'https://m.media-amazon.com/images/I/71cWL5j3FqL._AC_UY436_FMwebp_QL65_.jpg'),
(4, 'Iphone 8', 'iphone 8', 100, 'https://th.bing.com/th/id/OIP.vifbUUasHl4-sdzF_Ly1bgHaE7?rs=1&amp;pid=ImgDetMain'),
(5, 'Iphone 15', 'Iphone đời mới với vẻ ngoài sang trọng và khả năng xử lý tuyệt vời', 10000, 'https://th.bing.com/th/id/OIP.DG_yzLawQsbqI7iCqEUmvAHaEK?rs=1&amp;pid=ImgDetMain');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
