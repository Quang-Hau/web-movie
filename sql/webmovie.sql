-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 14, 2024 at 03:31 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webmovie`
--

-- --------------------------------------------------------

--
-- Table structure for table `loginadmin`
--

CREATE TABLE `loginadmin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `loginadmin`
--

INSERT INTO `loginadmin` (`id`, `username`, `password`) VALUES
(1, 'admin1', 'admin12345'),
(2, 'admin2', 'admin123456');

-- --------------------------------------------------------

--
-- Table structure for table `movie_nation`
--

CREATE TABLE `movie_nation` (
  `id_nation` int(11) NOT NULL,
  `name_nation` text NOT NULL,
  `nation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movie_nation`
--

INSERT INTO `movie_nation` (`id_nation`, `name_nation`, `nation_id`) VALUES
(1, 'Việt Nam', 1),
(2, 'Hàn Quốc', 2),
(3, 'MỸ', 3),
(6, 'trung', 10),
(7, 'Nhật', 8);

-- --------------------------------------------------------

--
-- Table structure for table `newmovie`
--

CREATE TABLE `newmovie` (
  `id_movie` int(11) NOT NULL,
  `movie_name` text NOT NULL,
  `img_movie` text NOT NULL,
  `nation` int(4) NOT NULL,
  `publish` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `performer` text NOT NULL,
  `moviedetails` text DEFAULT NULL,
  `movie_genre` varchar(50) NOT NULL,
  `movie_url` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newmovie`
--

INSERT INTO `newmovie` (`id_movie`, `movie_name`, `img_movie`, `nation`, `publish`, `time`, `performer`, `moviedetails`, `movie_genre`, `movie_url`) VALUES
(28, 'test2', 'uploadNewMovie/conan_movie_26_-_vietnamese_poster.jpg1712756157-conan_movie_26_-_vietnamese_poster.jpg', 8, '0044-02-23', '1313', 'test2', 'test2', 'test2', 'uploadvideonewmovie/Trò chơi con mực - Trailer chính thức - Netflix.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `poster_movie`
--

CREATE TABLE `poster_movie` (
  `poster_id` int(11) NOT NULL,
  `poster_img` text NOT NULL,
  `name_poster` text NOT NULL,
  `nation` int(4) NOT NULL,
  `publish` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `performer` text NOT NULL,
  `moviedetails` text NOT NULL,
  `movie_genre` text NOT NULL,
  `slogan` text DEFAULT NULL,
  `poster_vdurl` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `single_movie`
--

CREATE TABLE `single_movie` (
  `id_singlemv` int(11) NOT NULL,
  `name_singlemv` text NOT NULL,
  `img_singlemv` text NOT NULL,
  `nation` int(4) NOT NULL,
  `publish` varchar(50) NOT NULL,
  `time` varchar(50) NOT NULL,
  `moviedetails` text DEFAULT NULL,
  `movie_genre` text NOT NULL,
  `movie_url` text NOT NULL,
  `performer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `single_movie`
--

INSERT INTO `single_movie` (`id_singlemv`, `name_singlemv`, `img_singlemv`, `nation`, `publish`, `time`, `moviedetails`, `movie_genre`, `movie_url`, `performer`) VALUES
(12, 'test2', 'uploadSingle/Poster_phim_Người_kiến_và_chiến_binh.jpg1712756224-Poster_phim_Người_kiến_và_chiến_binh.jpg', 3, '0222-11-11', '4444', 'test2', 'test2', 'uploadvideoSingle/Người Kiến và Chiến Binh Ong- Thế Giới Lượng Tử đến từ Marvel Studios - Trailer Chính thức.mp4', 'test2'),
(13, 'test3', 'uploadSingle/review-phim-tro-choi-con-muc-squid-game-1-e1632135160761.jpg1712756335-review-phim-tro-choi-con-muc-squid-game-1-e1632135160761.jpg', 2, '0044-04-04', '1313', 'test23', 'test23', 'uploadvideoSingle/Trò chơi con mực - Trailer chính thức - Netflix.mp4', 'test23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `loginadmin`
--
ALTER TABLE `loginadmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie_nation`
--
ALTER TABLE `movie_nation`
  ADD PRIMARY KEY (`id_nation`);

--
-- Indexes for table `newmovie`
--
ALTER TABLE `newmovie`
  ADD PRIMARY KEY (`id_movie`);

--
-- Indexes for table `poster_movie`
--
ALTER TABLE `poster_movie`
  ADD PRIMARY KEY (`poster_id`);

--
-- Indexes for table `single_movie`
--
ALTER TABLE `single_movie`
  ADD PRIMARY KEY (`id_singlemv`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `loginadmin`
--
ALTER TABLE `loginadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `movie_nation`
--
ALTER TABLE `movie_nation`
  MODIFY `id_nation` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `newmovie`
--
ALTER TABLE `newmovie`
  MODIFY `id_movie` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `poster_movie`
--
ALTER TABLE `poster_movie`
  MODIFY `poster_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `single_movie`
--
ALTER TABLE `single_movie`
  MODIFY `id_singlemv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
