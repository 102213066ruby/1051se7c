-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- 主機: 127.0.0.1
-- 產生時間： 2016-12-23 11:51:30
-- 伺服器版本: 10.1.16-MariaDB
-- PHP 版本： 5.6.24

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
(1, '2016-12-23 17:55:00', 0, NULL);

-- --------------------------------------------------------

--
-- 資料表結構 `card`
--

CREATE TABLE `card` (
  `cardID` int(15) NOT NULL,
  `cardName` int(20) NOT NULL,
  `userName` char(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `card`
--

INSERT INTO `card` (`cardID`, `cardName`, `userName`) VALUES
(1, 1, 'aaa'),
(2, 2, 'aaa'),
(3, 3, 'aaa'),
(4, 4, 'aaa'),
(5, 5, 'aaa'),
(6, 6, 'aaa'),
(7, 7, 'aaa'),
(8, 8, 'aaa'),
(29, 6, 'AAA'),
(30, 6, 'AAA'),
(31, 8, 'AAA'),
(32, 5, 'BBB'),
(33, 2, 'BBB'),
(34, 2, 'BBB'),
(35, 8, 'BBB'),
(36, 7, 'BBB'),
(37, 1, 'BBB'),
(38, 8, 'BBB'),
(39, 2, 'BBB'),
(40, 4, 'BBB'),
(41, 4, 'BBB'),
(42, 1, 'BBB'),
(43, 4, 'BBB'),
(44, 6, 'BBB'),
(45, 8, 'BBB'),
(46, 4, 'BBB'),
(47, 7, 'BBB'),
(48, 2, 'BBB'),
(49, 6, 'BBB'),
(50, 7, 'AAA'),
(51, 4, 'AAA'),
(52, 2, 'AAA'),
(53, 1, 'bbb'),
(54, 2, 'bbb'),
(55, 5, 'bbb');

-- --------------------------------------------------------

--
-- 資料表結構 `carding`
--

CREATE TABLE `carding` (
  `cardID` int(20) NOT NULL,
  `deadline` datetime NOT NULL,
  `price` int(20) NOT NULL,
  `highestprice` int(20) DEFAULT '0',
  `bidName` char(10) NOT NULL,
  `userID` char(20) NOT NULL,
  `cardName` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `carding`
--

INSERT INTO `carding` (`cardID`, `deadline`, `price`, `highestprice`, `bidName`, `userID`, `cardName`) VALUES
(1, '2016-12-23 17:54:00', 1000, 50001, 'bbb', 'AAA', 1),
(7, '2016-12-24 10:01:00', 1000, 40000, 'bbb', 'aaa', 0);

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
('AAA', '123', 499903),
('BBB', '123', 499903);

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
-- 資料表索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userName`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `card`
--
ALTER TABLE `card`
  MODIFY `cardID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
