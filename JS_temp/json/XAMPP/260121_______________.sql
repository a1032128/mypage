-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-01-21 06:10:02
-- 伺服器版本： 10.4.32-MariaDB
-- PHP 版本： 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `260121資料庫課程`
--

-- --------------------------------------------------------

--
-- 資料表結構 `表1`
--

DROP TABLE IF EXISTS `表1`;
CREATE TABLE `表1` (
  `id` int(11) NOT NULL,
  `userId` char(10) DEFAULT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `表1`
--

INSERT INTO `表1` (`id`, `userId`, `userName`, `createTime`) VALUES
(1, 'A123', '測試1', '2026-01-21 02:52:18'),
(2, 'A456', '測試二', '2026-01-21 02:52:18'),
(3, 'A123', '測試1', '2026-01-21 03:01:42'),
(4, 'A456', '測試二', '2026-01-21 03:01:42');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `表1`
--
ALTER TABLE `表1`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `表1`
--
ALTER TABLE `表1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
