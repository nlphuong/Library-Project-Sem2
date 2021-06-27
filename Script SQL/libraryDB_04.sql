-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- ホスト: 127.0.0.1
-- 生成日時: 2021-06-27 15:17:25
-- サーバのバージョン： 10.4.18-MariaDB
-- PHP のバージョン: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `memorial_library`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `contact`
--

CREATE TABLE `contact` (
  `Id` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Phone` varchar(20) NOT NULL,
  `Subject` varchar(100) NOT NULL,
  `Message` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- テーブルのデータのダンプ `contact`
--

INSERT INTO `contact` (`Id`, `Name`, `Email`, `Phone`, `Subject`, `Message`, `create_at`, `update_at`) VALUES
(1, 'Thuy Tien', 'tiaanlai@gmail.com', '0969434741', 'alo alo alo', 'aaa', '2021-06-26 09:08:04', '2021-06-26 09:08:04'),
(2, 'Co Tien', 'cotien@gmail.com', '0969434741', 'Hi', 'test', '2021-06-26 09:08:04', '2021-06-26 09:08:04'),
(3, 'Thuy Tien', 'tiaanlai@gmail.com', '0969434741', 'a', 'aaaa', '2021-06-26 09:08:04', '2021-06-26 09:08:04'),
(4, 'tt', 'aa@gmail.com', '0969434741', 'a111', 'aaaa', '2021-06-26 09:08:04', '2021-06-26 09:08:04'),
(5, 'aaaaaaa', 'tiaanlai@gmail.com', '0969434741', 'Hi', 'hhh', '2021-06-26 09:08:04', '2021-06-26 09:08:04'),
(6, 'ttt', 'tientien@abc.co.jp', '0969434741', 'aa', 'aaa', '2021-06-26 09:08:04', '2021-06-26 09:08:04'),
(7, 'mstien', 'aa123@gmail.com', '0969434741', 'Hi', 'aaaaaaaa', '2021-06-26 15:38:03', '2021-06-26 15:38:03');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`Id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `contact`
--
ALTER TABLE `contact`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
