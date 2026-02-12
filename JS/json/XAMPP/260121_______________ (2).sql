-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2026-01-21 09:13:54
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
-- 資料表結構 `city`
--

CREATE TABLE `city` (
  `id` int(11) NOT NULL,
  `cityName` char(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `city`
--

INSERT INTO `city` (`id`, `cityName`) VALUES
(1, '台中市'),
(2, '台北市'),
(3, '高雄市');

-- --------------------------------------------------------

--
-- 資料表結構 `dailytime`
--

CREATE TABLE `dailytime` (
  `id` int(11) NOT NULL COMMENT '主件',
  `name` text DEFAULT NULL COMMENT '備註',
  `type` varchar(20) DEFAULT NULL COMMENT '任務或步驟的名稱',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '完成時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `dailytime`
--

INSERT INTO `dailytime` (`id`, `name`, `type`, `time`) VALUES
(1, '範例', NULL, '2026-01-21 06:13:28'),
(2, '範例2', NULL, '2026-01-21 06:15:28'),
(3, '範例', NULL, '2026-01-21 06:15:39');

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `city` int(11) DEFAULT NULL,
  `userId` char(10) DEFAULT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='會員';

--
-- 傾印資料表的資料 `member`
--

INSERT INTO `member` (`id`, `city`, `userId`, `userName`, `createTime`) VALUES
(1, 2, 'A123', '測試1', '2026-01-21 02:52:18'),
(2, 3, 'A456', '測試二', '2026-01-21 02:52:18'),
(3, 1, 'A123', '測試1', '2026-01-21 05:46:10'),
(4, NULL, 'A456', '測試二', '2026-01-21 03:01:42'),
(5, NULL, 'A456', '測試1', '2026-01-21 05:45:55');

-- --------------------------------------------------------

--
-- 資料表結構 `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL COMMENT '主件',
  `name` text NOT NULL COMMENT '任務或步驟的名稱',
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT '完成時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 傾印資料表的資料 `test`
--

INSERT INTO `test` (`id`, `name`, `time`) VALUES
(0, '範例', '2026-01-21 06:13:28'),
(0, '範例2', '2026-01-21 06:15:28'),
(0, '範例', '2026-01-21 06:15:39'),
(0, '測', '2026-01-21 06:17:06');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `userId` char(10) DEFAULT NULL,
  `userName` varchar(30) DEFAULT NULL,
  `createTime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='會員';

--
-- 傾印資料表的資料 `user`
--

INSERT INTO `user` (`id`, `userId`, `userName`, `createTime`) VALUES
(1, 'A123', '測試1', '2026-01-21 02:52:18'),
(2, 'A456', '測試二', '2026-01-21 02:52:18'),
(3, 'A123', '測試1', '2026-01-21 03:01:42'),
(4, 'A456', '測試二', '2026-01-21 03:01:42');

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `dailytime`
--
ALTER TABLE `dailytime`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `city`
--
ALTER TABLE `city`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `dailytime`
--
ALTER TABLE `dailytime`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主件', AUTO_INCREMENT=5;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
