-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-21 04:41:42
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 7.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `se2016`
--

-- --------------------------------------------------------

--
-- 資料表結構 `bag`
--

CREATE TABLE `bag` (
  `bagID` int(11) NOT NULL,
  `expire` datetime NOT NULL,
  `highestprice` int(100) NOT NULL,
  `userName` char(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `bag`
--

INSERT INTO `bag` (`bagID`, `expire`, `highestprice`, `userName`) VALUES
(1, '2016-12-12 16:05:07', 300, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `card`
--

CREATE TABLE `card` (
  `cardID` int(11) NOT NULL,
  `cardName` int(20) NOT NULL,
  `userName` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `card`
--

INSERT INTO `card` (`cardID`, `cardName`, `userName`) VALUES
(1, 1, 'AAA'),
(2, 1, 'BBB'),
(3, 2, 'AAA');

-- --------------------------------------------------------

--
-- 資料表結構 `carding`
--

CREATE TABLE `carding` (
  `cardID` int(20) NOT NULL,
  `deadline` int(20) NOT NULL,
  `price` int(20) NOT NULL,
  `highestprice` int(20) NOT NULL,
  `userID` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `carding`
--

INSERT INTO `carding` (`cardID`, `deadline`, `price`, `highestprice`, `userID`) VALUES
(1, 0, 300, 0, 'AAA');

-- --------------------------------------------------------

--
-- 資料表結構 `game`
--

CREATE TABLE `game` (
  `id` int(11) NOT NULL,
  `expire` datetime NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `game`
--

INSERT INTO `game` (`id`, `expire`, `name`) VALUES
(1, '2016-11-28 11:57:54', 'No 1'),
(2, '2016-11-28 11:57:09', 'No 2');

-- --------------------------------------------------------

--
-- 資料表結構 `user`
--

CREATE TABLE `user` (
  `userName` char(20) NOT NULL,
  `passWord` char(20) NOT NULL,
  `Money` int(70) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `user`
--

INSERT INTO `user` (`userName`, `passWord`, `Money`) VALUES
('AAA', '123', 296),
('BBB', '123', 300),
('ccc', '123', 1000);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `bag`
--
ALTER TABLE `bag`
  ADD PRIMARY KEY (`bagID`);

--
-- 資料表索引 `card`
--
ALTER TABLE `card`
  ADD PRIMARY KEY (`cardID`);

--
-- 資料表索引 `carding`
--
ALTER TABLE `carding`
  ADD PRIMARY KEY (`cardID`);

--
-- 資料表索引 `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `game`
--
ALTER TABLE `game`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
