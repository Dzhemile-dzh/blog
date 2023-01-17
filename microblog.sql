-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Време на генериране: 17 яну 2023 в 02:27
-- Версия на сървъра: 10.4.17-MariaDB
-- Версия на PHP: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данни: `microblog`
--

-- --------------------------------------------------------

--
-- Структура на таблица `blog`
--

CREATE TABLE `blog` (
  `b_id` int(11) NOT NULL,
  `b_title` varchar(255) NOT NULL,
  `b_body` text NOT NULL,
  `b_type` varchar(60) NOT NULL,
  `b_author` varchar(255) NOT NULL,
  `b_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `b_image_id` int(11) NOT NULL,
  `b_is_active` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `blog`
--

INSERT INTO `blog` (`b_id`, `b_title`, `b_body`, `b_type`, `b_author`, `b_date`, `b_image_id`, `b_is_active`) VALUES
(1, 'How you should decorete your home in 2023', 'Sometimes, it’s worth taking the quiet quitting route and slowly phasing out trends from your life before it’s too late (and you’re in deeper than you ever intended to go). I have every intention of revealing which design trends are most likely on their way out for 2023, but first I have an important disclaimer to share: Context matters. Yes, trends come and go, but at the end of the day, taste is subjective, and there’s no room for the negative projections of others in spaces that make you feel safe, happy, and true to yourself—however the interiors are decorated. These days, the design cycle is less fleeting than a fast fashion garment: It’s a bit more challenging to chuck your Chesterfield sofa just because it’s not “in” this time next year. (If you wait long enough, I promise it’ll come back!) That being said, we do live in an incredibly fast-paced digital era where crazes become hyper-obsessions until they very quickly reach a peak, become oversaturated, and pass their prime.  The International Design Authority', 'home-decor', 'Tom Powling', '2023-01-14 14:30:03', 2, 1),
(2, 'Oil painting first steps', 'Sometimes, it’s worth taking the quiet quitting route and slowly phasing out trends from your life before it’s too late (and you’re in deeper than you ever intended to go). I have every intention of revealing which design trends are most likely on their way out for 2023, but first I have an important disclaimer to share: Context matters. Yes, trends come and go, but at the end of the day, taste is subjective, and there’s no room for the negative projections of others in spaces that make you feel safe, happy, and true to yourself—however the interiors are decorated. These days, the design cycle is less fleeting than a fast fashion garment: It’s a bit more challenging to chuck your Chesterfield sofa just because it’s not “in” this time next year. (If you wait long enough, I promise it’ll come back!) That being said, we do live in an incredibly fast-paced digital era where crazes become hyper-obsessions until they very quickly reach a peak, become oversaturated, and pass their prime.  The International Design Au', 'art', 'Khloe Mandy', '2023-01-16 19:41:37', 3, 1),
(3, 'How to read clasics', 'Some book details, it’s worth taking the quiet quitting route and slowly phasing out trends from your life before it’s too late (and you’re in deeper than you ever intended to go). I have every intention of revealing which design trends are most likely on their way out for 2023, but first I have an important disclaimer to share: Context matters. Yes, trends come and go, but at the end of the day, taste is subjective, and there’s no room for the negative projections of others in spaces that make you feel safe, happy, and true to yourself—however the interiors are decorated. These days, the design cycle is less fleeting than a fast fashion garment: It’s a bit more challenging to chuck your Chesterfield sofa just because it’s not “in” this time next year. (If you wait long enough, I promise it’ll come back!) That being said, we do live in an incredibly fast-paced digital era where crazes become hyper-obsessions until they very quickly reach a peak, become oversaturated, and pass their prime.  The International Design Au', 'art', 'Khloe Mandy', '2023-01-15 19:49:40', 4, 1),
(4, 'Tips for successful business', 'To succeed in business today, you need to be flexible and have good planning and organizational skills. Many people start a business thinking that they’ll turn on their computers or open their doors and start making money, only to find that making money in a business is much more difficult than they thought.', 'business', 'Pavel Karamazov', '2023-01-16 19:21:24', 5, 1),
(7, 'Interior trends', 'Some book details, it’s worth taking the quiet quitting route and slowly phasing out trends from your life before it’s too late (and you’re in deeper than you ever intended to go). I have every intention of revealing which design trends are most likely on their way out for 2023, but first I have an important disclaimer to share: Context matters. Yes, trends come and go, but at the end of the day, taste is subjective, and there’s no room for the negative projections of others in spaces that make you feel safe, happy, and true to yourself—however the interiors are decorated. These days, the design cycle is less fleeting than a fast fashion garment: It’s a bit more challenging to chuck your Chesterfield sofa just because it’s not “in” this time next year. (If you wait long enough, I promise it’ll come back!) That being said, we do live in an incredibly fast-paced digital era where crazes become hyper-obsessions until they very quickly reach a peak, become oversaturated, and pass their prime.  The International D', 'home-decor', 'Jacob Mane', '2023-01-17 00:38:59', 6, 0);

-- --------------------------------------------------------

--
-- Структура на таблица `images`
--

CREATE TABLE `images` (
  `i_id` int(11) NOT NULL,
  `i_filename` varchar(255) NOT NULL,
  `i_type` varchar(20) NOT NULL,
  `i_uploaded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `images`
--

INSERT INTO `images` (`i_id`, `i_filename`, `i_type`, `i_uploaded`) VALUES
(2, 'cat.jpg', 'main', '2023-01-13 14:15:43'),
(3, 'black-cat.jpg', 'main', '2023-01-13 14:16:51'),
(4, 'dog.jpg', 'main', '2023-01-13 14:20:32'),
(5, 'second-dog.jpg', 'main', '2023-01-13 14:20:42'),
(6, 'iphone.jpg', 'secondary', '2023-01-13 14:22:00');

-- --------------------------------------------------------

--
-- Структура на таблица `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Схема на данните от таблица `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_password`) VALUES
(1, 'dzhemile', '5c58cf11bfb03bcab532'),
(2, 'admin', '21232f297a57a5a74389'),
(3, 'weasley', '9aca94f9ed7ed4bd219b'),
(4, 'ron', '45798f269709550d6f6e'),
(5, 'snape', 'c5c85ff214e6363fb656'),
(6, 'dzhemile', 'dzhemile42'),
(7, 'voldy', 'voldy'),
(8, 'me', '5c58cf11bfb03bcab532');

--
-- Indexes for dumped tables
--

--
-- Индекси за таблица `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `b_image_id` (`b_image_id`);

--
-- Индекси за таблица `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`i_id`);

--
-- Индекси за таблица `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ограничения за дъмпнати таблици
--

--
-- Ограничения за таблица `blog`
--
ALTER TABLE `blog`
  ADD CONSTRAINT `blog_ibfk_1` FOREIGN KEY (`b_image_id`) REFERENCES `images` (`i_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
