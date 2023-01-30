-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 30, 2023 at 02:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `microblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
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
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`b_id`, `b_title`, `b_body`, `b_type`, `b_author`, `b_date`, `b_image_id`, `b_is_active`) VALUES
(1, 'How you should decorete your home in 2023', 'Sometimes, it’s worth taking the quiet quitting route and slowly phasing out trends from your life before it’s too late (and you’re in deeper than you ever intended to go). I have every intention of revealing which design trends are most likely on their way out for 2023, but first I have an important disclaimer to share: Context matters. Yes, trends come and go, but at the end of the day, taste is subjective, and there’s no room for the negative projections of others in spaces that make you feel safe, happy, and true to yourself—however the interiors are decorated. These days, the design cycle is less fleeting than a fast fashion garment: It’s a bit more challenging to chuck your Chesterfield sofa just because it’s not “in” this time next year. (If you wait long enough, I promise it’ll come back!) That being said, we do live in an incredibly fast-paced digital era where crazes become hyper-obsessions until they very quickly reach a peak, become oversaturated, and pass their prime.  The International Design Authority', 'home-decor', 'Tom Powling', '2023-01-30 13:45:47', 4, 1),
(3, 'How to read clasics', 'Some book details, it’s worth taking the quiet quitting route and slowly phasing out trends from your life before it’s too late (and you’re in deeper than you ever intended to go). I have every intention of revealing which design trends are most likely on their way out for 2023, but first I have an important disclaimer to share: Context matters. Yes, trends come and go, but at the end of the day, taste is subjective, and there’s no room for the negative projections of others in spaces that make you feel safe, happy, and true to yourself—however the interiors are decorated. These days, the design cycle is less fleeting than a fast fashion garment: It’s a bit more challenging to chuck your Chesterfield sofa just because it’s not “in” this time next year. (If you wait long enough, I promise it’ll come back!) That being said, we do live in an incredibly fast-paced digital era where crazes become hyper-obsessions until they very quickly reach a peak, become oversaturated, and pass their prime.  The International Design Au', 'art', 'Khloe Mandy', '2023-01-15 19:49:40', 4, 1),
(42, 'Interior trends', 'A trust is a separate legal entity a person sets up to manage their assets. Trusts are set up during a person&#38;#38;#38;#38;#38;#39;s lifetime to assure that assets are used in a way that the person setting up the trust deems appropriate. The two basic types of trusts are a revocable trust and an irrevocable trust. The owner of a revocable trust may change its terms at any time. They can remove beneficiaries, designate new ones, and modify stipulations on how assets within the trust are managed. The terms of an irrevocable trust, in contrast, are set in stone the minute the agreement is signed.', 'art', 'Khloe Mandy', '2023-01-30 13:45:59', 21, 1),
(48, 'Painting', 'Some book details, it’s worth taking the quiet quitting route and slowly phasing out trends from your life before it’s too late (and you’re in deeper than you ever intended to go). I have every intention of revealing which design trends are most likely on their way out for 2023, but first I have an important disclaimer to share: Context matters. Yes, trends come and go, but at the end of the day, taste is subjective, and there’s no room for the negative projections of others in spaces that make you feel safe, happy, and true to yourself—however the interiors are decorated. These days, the design cycle is less fleeting than a fast fashion garment: It’s a bit more challenging to chuck your Chesterfield sofa just because it’s not “in” this time next year. (If you wait long enough, I promise it’ll come back!) That being said, we do live in an incredibly fast-paced digital era where crazes become hyper-obsessions until they very quickly reach a peak, become oversaturated, and pass their prime.  The International D', 'home-decor', 'Pavel Karamazov', '2023-01-30 12:11:26', 2, 1),
(49, 'Interior trends', 'To succeed in business today, you need to be flexible and have good planning and organizational skills. Many people start a business thinking that they’ll turn on their computers or open their doors and start making money, only to find that making money in a business is much more difficult than they thought.', 'art', 'Khloe Mandy', '2023-01-30 13:44:55', 21, 1),
(50, 'Tips for successful business', 'Some book details, it’s worth taking the quiet quitting route and slowly phasing out trends from your life before it’s too late (and you’re in deeper than you ever intended to go). I have every intention of revealing which design trends are most likely on their way out for 2023, but first I have an important disclaimer to share: Context matters. Yes, trends come and go, but at the end of the day, taste is subjective, and there’s no room for the negative projections of others in spaces that make you feel safe, happy, and true to yourself—however the interiors are decorated. These days, the design cycle is less fleeting than a fast fashion garment: It’s a bit more challenging to chuck your Chesterfield sofa just because it’s not “in” this time next year. (If you wait long enough, I promise it’ll come back!) That being said, we do live in an incredibly fast-paced digital era where crazes become hyper-obsessions until they very quickly reach a peak, become oversaturated, and pass their prime.  The International D', 'business', 'Khloe Mandy', '2023-01-30 13:45:06', 21, 0),
(51, 'Oil painting first steps', 'A trust is a separate legal entity a person sets up to manage their assets. Trusts are set up during a person&#39;s lifetime to assure that assets are used in a way that the person setting up the trust deems appropriate. The two basic types of trusts are a revocable trust and an irrevocable trust. The owner of a revocable trust may change its terms at any time. They can remove beneficiaries, designate new ones, and modify stipulations on how assets within the trust are managed. The terms of an irrevocable trust, in contrast, are set in stone the minute the agreement is signed.', 'home-decor', 'Khloe Mandy', '2023-01-30 13:45:18', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `i_id` int(11) NOT NULL,
  `i_filename` varchar(255) NOT NULL,
  `i_type` varchar(20) NOT NULL,
  `i_uploaded` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`i_id`, `i_filename`, `i_type`, `i_uploaded`) VALUES
(2, 'cat.jpg', 'main', '2023-01-13 14:15:43'),
(3, 'black-cat.jpg', 'main', '2023-01-13 14:16:51'),
(4, 'dog.jpg', 'main', '2023-01-29 22:26:58'),
(21, 'laptop.jpg', 'secondary', '2023-01-29 22:55:05');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` int(11) NOT NULL,
  `u_name` varchar(255) NOT NULL,
  `u_password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `u_name`, `u_password`) VALUES
(41, 'admin', 'admin'),
(42, 'dzhemile', 'dzhemile42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`b_id`),
  ADD KEY `blog_ibfk_1` (`b_image_id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`i_id`);

--
-- Indexes for table `user`
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
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `i_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `u_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
