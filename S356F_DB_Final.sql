-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018 年 12 月 06 日 17:32
-- 伺服器版本: 10.1.36-MariaDB
-- PHP 版本： 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `s358f`
--

-- --------------------------------------------------------

--
-- 資料表結構 `login`
--

CREATE TABLE `login` (
  `Login_Email` varchar(255) NOT NULL,
  `Login_PW` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `login`
--

INSERT INTO `login` (`Login_Email`, `Login_PW`) VALUES
('s1138797@study.ouhk.edu.hk', '4bf966f4bb25efa8dff15da2fece6c69'),
('s1178834@study.ouhk.edu.hk', '13fbe7df850a61c26ddd42cd703d322e'),
('s1211935@study.ouhk.edu.hk', '83334211e1d038abdc6ca7a8ebd38009'),
('s1212362@study.ouhk.edu.hk', '1d94b12d455f196f6bdbee844047fafd'),
('s1212370@study.ouhk.edu.hk', 'df7d7bc37ec8b2b837ea2ff1bc1e92ef'),
('s1234567@study.ouhk.edu.hk', '850a8310a1527a6d09d64d2fb129e50c');

-- --------------------------------------------------------

--
-- 資料表結構 `personal_info`
--

CREATE TABLE `personal_info` (
  `Name` varchar(20) NOT NULL,
  `FirstName` varchar(20) NOT NULL,
  `LastName` varchar(20) NOT NULL,
  `Email_Address` varchar(50) NOT NULL,
  `Gender` varchar(6) NOT NULL,
  `Create_Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `personal_info`
--

INSERT INTO `personal_info` (`Name`, `FirstName`, `LastName`, `Email_Address`, `Gender`, `Create_Date`) VALUES
('ewrgerwg', 'erwgrewg', 'ewrgerwg', 'ergerwgr@lkgjregi.com', '', '2018-12-05'),
('regwgerwgewr', 'ewfeqwfew', 'weferwferw', 'erwgerwgrew@fgregwergr.com', '', '2018-12-05'),
('GayMax', 'Ka Hong', 'Loh', 's1138797@study.ouhk.edu.hk', 'other', '2018-10-11'),
('MiwaLai', 'Ming Wai', 'Lai', 's1178834@study.ouhk.edu.hk', 'female', '2018-10-11'),
('ae86Anson', 'Kwok Ho', 'Li', 's1211935@study.ouhk.edu.hk', 'male', '2018-10-11'),
('KennyL', 'KwanHo', 'Leung', 's1212362@study.ouhk.edu.hk', 'male', '2018-10-11'),
('LTW', 'TW', 'L', 's1212370@study.ouhk.edu.hk', 'male', '2018-10-13'),
('KennyL2', 'Kenny', 'Leung', 's1234567@study.ouhk.edu.hk', 'male', '2018-12-05');

-- --------------------------------------------------------

--
-- 資料表結構 `product_info`
--

CREATE TABLE `product_info` (
  `Item_ID` int(11) NOT NULL,
  `Product_Name` varchar(50) NOT NULL,
  `Price` float NOT NULL,
  `Brand` varchar(20) NOT NULL,
  `Model` varchar(20) NOT NULL,
  `New` varchar(1) NOT NULL,
  `Depreciation_Rate` int(11) NOT NULL,
  `Description` text NOT NULL,
  `Seller_Email` varchar(255) NOT NULL,
  `Buyer_Email` varchar(255) NOT NULL,
  `Upload_Date` date NOT NULL,
  `Sell_Date` date NOT NULL,
  `url` varchar(255) NOT NULL,
  `Islike` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `product_info`
--

INSERT INTO `product_info` (`Item_ID`, `Product_Name`, `Price`, `Brand`, `Model`, `New`, `Depreciation_Rate`, `Description`, `Seller_Email`, `Buyer_Email`, `Upload_Date`, `Sell_Date`, `url`, `Islike`) VALUES
(1, 'iphone X 256GB', 8998, 'Apple', '', 'F', 80, 'Nope', 's1212362@study.ouhk.edu.hk', 's1212370@study.ouhk.edu.hk', '2018-11-08', '2018-12-03', 'img_location/ipx.jpg', 'L'),
(3, 'Note 8 256GB', 7999, 'Samsung', '', 'F', 70, 'nope', 's1212370@study.ouhk.edu.hk', 's1212362@study.ouhk.edu.hk', '2018-11-09', '2018-12-01', 'img_location/41BDGJgj3uL.jpg', 'L'),
(4, 'note 8 Blue', 9988, 'Samsung', '', 'T', 100, 'boom', 's1212362@study.ouhk.edu.hk', 's1212370@study.ouhk.edu.hk', '2018-11-10', '2018-11-22', 'img_location/galaxy-note-8-vs-galaxy-s8-plus-1_0.jpg', 'L'),
(9, 'iphone X 32GB', 5000, 'Apple', '', 'F', 50, 'very cheap', 's1212362@study.ouhk.edu.hk', 's1212370@study.ouhk.edu.hk', '2018-11-27', '2018-12-02', 'img_location/ipx2.jpg', 'L'),
(10, 'iphone X 32GB', 4500, 'Apple', '', 'F', 80, 'good', 's1212362@study.ouhk.edu.hk', 's1138797@study.ouhk.edu.hk', '2018-07-12', '2018-08-23', 'img_location/ipx3.jpg', ''),
(11, 'iphone X 64GB', 5500, 'Apple', '', 'T', 100, 'very good', 's1211935@study.ouhk.edu.hk', 's1138797@study.ouhk.edu.hk', '2018-09-11', '2018-10-10', 'img_location/ipx4.jpg', ''),
(12, 'iphone X 128GB', 6000, 'Apple', '', 'F', 70, 'quite good', 's1138797@study.ouhk.edu.hk', 's1212362@study.ouhk.edu.hk', '2018-10-14', '2018-11-01', 'img_location/ipx5.jpg', ''),
(13, 'iphone X 256GB', 6500, 'Apple', '', 'F', 60, 'super good', 's1212362@study.ouhk.edu.hk', 's1178834@study.ouhk.edu.hk', '2018-09-28', '2018-10-22', 'img_location/ipx6.jpg', ''),
(14, 'iphone X 512GB', 7000, 'Apple', '', 'F', 90, 'not bad', 's1178834@study.ouhk.edu.hk', 's1211935@study.ouhk.edu.hk', '2018-07-27', '2018-08-06', 'img_location/ipx7.jpg', ''),
(15, 'iphone X 32GB', 4000, 'Apple', '', 'F', 30, 'quite old', 's1138797@study.ouhk.edu.hk', 's1178834@study.ouhk.edu.hk', '2018-05-15', '2018-05-24', 'img_location/ipx8.jpg', ''),
(16, 'iphone X 32GB', 3000, 'Apple', '', 'F', 50, 'good phone', 's1212362@study.ouhk.edu.hk', 's1234567@study.ouhk.edu.hk', '2018-12-03', '2018-12-05', 'img_location/ipx9.jpg', 'D'),
(17, 'S9', 3000, 'Samsung', '', 'F', 40, 'cheap S9', 's1212362@study.ouhk.edu.hk', 's1178834@study.ouhk.edu.hk', '2018-11-08', '2018-11-21', 'img_location/S9.jpg', ''),
(18, 'V20', 3500, 'LG', '', 'T', 100, 'good V20', 's1234567@study.ouhk.edu.hk', 's1211935@study.ouhk.edu.hk', '2018-09-04', '2018-09-14', 'img_location/V20.jpg', ''),
(19, 'XZ3', 4000, 'Sony', '', 'F', 60, 'good XZ3', 's1234567@study.ouhk.edu.hk', 's1211935@study.ouhk.edu.hk', '2018-08-24', '2018-08-31', 'img_location/XZ3.jpg', ''),
(20, 'U12', 4200, 'HTC', '', 'T', 100, 'very new HTC U12', 's1234567@study.ouhk.edu.hk', 's1138797@study.ouhk.edu.hk', '2018-09-15', '2018-10-03', 'img_location/U12.jpg', ''),
(21, 'MIX2', 1000, 'MI', '', 'F', 50, 'very cheap MIX2', 's1212370@study.ouhk.edu.hk', 's1234567@study.ouhk.edu.hk', '2018-07-10', '2018-08-03', 'img_location/MIX2.jpg', ''),
(22, '8+', 2000, 'MI', '', 'F', 61, 'quite new MI 8+, come and buy!!!!!!', 's1212370@study.ouhk.edu.hk', 's1234567@study.ouhk.edu.hk', '2018-03-07', '2018-04-05', 'img_location/8+.jpg', ''),
(23, 'iphone 6 32GB', 2000, 'Apple', '', 'F', 45, 'quite old but still very useful!', 's1212370@study.ouhk.edu.hk', 's1212362@study.ouhk.edu.hk', '2018-04-19', '2018-05-04', 'img_location/ip6.jpg', ''),
(24, 'iPhone 6s 128GB', 3500, 'Apple', '', 'T', 100, 'New iPhone 6s, come and buy!!!!!', 's1212370@study.ouhk.edu.hk', 's1212362@study.ouhk.edu.hk', '2018-06-22', '2018-07-20', 'img_location/ip6s.jpg', ''),
(25, 'iPhone 6 32GB', 3000, 'Apple', '', 'F', 40, 'cheap iPhone 6', 's1234567@study.ouhk.edu.hk', '', '2018-06-06', '0000-00-00', 'img_location/ip6(2).jpg', ''),
(26, 'iPhone 6 64GB', 5000, 'Apple', '', 'T', 100, 'very good iPhone 6', 's1212362@study.ouhk.edu.hk', '', '2018-05-16', '0000-00-00', 'img_location/ip6(3).jpg', ''),
(27, 'iPhone 6 128GB', 4000, 'Apple', '', 'F', 50, 'quite cheap iPhone6 128GB!!!', 's1212370@study.ouhk.edu.hk', '', '2018-09-12', '0000-00-00', 'img_location/ip6(4).jpg', ''),
(28, 'iPhone 6 256GB', 4500, 'Apple', '', 'F', 60, 'not very expensive iPhone 6 256GB and come to buy!!!!!!', 's1138797@study.ouhk.edu.hk', '', '2018-02-07', '0000-00-00', 'img_location/ip6(5).jpg', ''),
(29, 'iPhone 6s 32GB', 3900, 'Apple', '', 'F', 65, 'good iPhone 6s 32GB', 's1178834@study.ouhk.edu.hk', '', '2018-05-24', '0000-00-00', 'img_location/ip6s(2).jpg', ''),
(30, 'iPhone 6s 64GB', 4300, 'Apple', '', 'F', 75, 'very cheap iPhone 6s 64GB!!!!!!', 's1211935@study.ouhk.edu.hk', '', '2018-03-15', '0000-00-00', 'img_location/ip6s(3).jpg', ''),
(31, 'iPhone 6s 256GB', 7000, 'Apple', '', 'T', 99, 'very new iPhone 6s 256GB', 's1234567@study.ouhk.edu.hk', '', '2018-11-15', '0000-00-00', 'img_location/ip6s(4).jpg', ''),
(32, 'iPhone 7 32GB', 4563, 'Apple', '', 'F', 55, 'good iPhone 7 32GB', 's1212362@study.ouhk.edu.hk', '', '2018-10-09', '0000-00-00', 'img_location/ip7.jpg', ''),
(33, 'iPhone 7 64GB', 4123, 'Apple', '', 'F', 45, 'cheap iPhone 7 64GB!!!!! come and buy !!!!!!', 's1212370@study.ouhk.edu.hk', '', '2018-09-12', '0000-00-00', 'img_location/ip7(2).jpg', ''),
(34, 'iphone 7 256GB', 5678, 'Apple', '', 'T', 100, 'Very new iPhone 7 256GB', 's1138797@study.ouhk.edu.hk', '', '2018-08-09', '0000-00-00', 'img_location/ip7(3).jpg', ''),
(35, 'iPhone XS 32GB', 5000, 'Apple', '', 'F', 70, 'a little bit old iPhone XS 32GB', 's1178834@study.ouhk.edu.hk', '', '2018-07-14', '0000-00-00', 'img_location/ipxs.jpg', ''),
(36, 'iPhone XS 128GB', 7000, 'Apple', '', 'T', 100, 'New iPhone XS 128GB', 's1211935@study.ouhk.edu.hk', '', '2018-05-17', '0000-00-00', 'img_location/ipxs(2).jpg', ''),
(37, 'iPhone XS 256GB', 6000, 'Apple', '', 'F', 67, 'quite new iPhone XS 256GB, come and buy!!!!!!!!!', 's1234567@study.ouhk.edu.hk', '', '2018-03-08', '0000-00-00', 'img_location/ipxs(3).jpg', ''),
(38, 'iPhone XS Mas 32GB', 5000, 'Apple', '', 'F', 80, 'quite new iPhone XS Mas 32GB', 's1212362@study.ouhk.edu.hk', '', '2018-11-29', '0000-00-00', 'img_location/ipxsm.jpg', ''),
(39, 'iPhone XS Mas 128GB', 6500, 'Apple', '', 'F', 75, 'good iPhone XS Mas 128GB', 's1212370@study.ouhk.edu.hk', '', '2018-10-22', '0000-00-00', 'img_location/ipxsm(2).jpg', ''),
(40, 'iPhone XS Mas 256GB', 8000, 'Apple', '', 'T', 100, 'very cheap iPhone XS Mas 256GB', 's1138797@study.ouhk.edu.hk', '', '2018-09-23', '0000-00-00', 'img_location/ipxsm(3).jpg', ''),
(41, 'iPad mini 4 128GB', 5000, 'Apple', '', 'F', 84, 'quite new iPad mini 4 128GB', 's1178834@study.ouhk.edu.hk', '', '2018-07-12', '0000-00-00', 'img_location/ipadm4.jpg', ''),
(42, 'iPad mini 4 128GB', 5400, 'Apple', '', 'T', 100, 'new iPad mini 4 128GB', 's1211935@study.ouhk.edu.hk', '', '2018-08-28', '0000-00-00', 'img_location/ipadm4(2).jpg', ''),
(43, 'iPad Pro 256GB', 9000, 'Apple', '', 'T', 100, 'very new iPad Pro', 's1234567@study.ouhk.edu.hk', '', '2018-05-24', '0000-00-00', 'img_location/ipadp.jpg', ''),
(44, 'iPad Pro 128GB', 7000, 'Apple', '', 'F', 25, 'second hand iPad Pro 128GB, very cheap', 's1212362@study.ouhk.edu.hk', '', '2018-03-31', '0000-00-00', 'img_location/ipadp(2).jpg', ''),
(45, 'S7 128GB', 3000, 'Samsung', '', 'F', 50, 'good  S7', 's1212370@study.ouhk.edu.hk', '', '2018-07-25', '0000-00-00', 'img_location/s7.jpg', ''),
(46, 'S7 256GB', 4000, 'Samsung', '', 'F', 60, 'cheap S7', 's1138797@study.ouhk.edu.hk', '', '2018-08-09', '0000-00-00', 'img_location/s7(2).jpg', ''),
(47, 'S8 128GB', 5000, 'Samsung', '', 'F', 65, 'quite old S8', 's1178834@study.ouhk.edu.hk', '', '2018-04-19', '0000-00-00', 'img_location/s8.jpg', ''),
(48, 'S8 256GB', 6000, 'Samsung', '', 'T', 100, 'new and cheap S8', 's1211935@study.ouhk.edu.hk', '', '2018-06-11', '0000-00-00', 'img_location/s8(2).jpg', ''),
(49, 'S9 256GB', 8000, 'Samsung', '', 'T', 100, 'new S9 265GB', 's1234567@study.ouhk.edu.hk', '', '2018-07-18', '0000-00-00', 'img_location/S9.jpg', ''),
(50, 'S9 128GB', 6000, 'Samsung', '', 'F', 45, 'quite old S9', 's1212362@study.ouhk.edu.hk', '', '2018-07-05', '0000-00-00', 'img_location/s9(2).jpg', ''),
(51, 'Note 5 128GB', 2000, 'Samsung', '', 'F', 30, 'old Note5 128GB', 's1212370@study.ouhk.edu.hk', '', '2018-02-17', '0000-00-00', 'img_location/note5.jpg', ''),
(52, 'Note 5 256GB', 3000, 'Samsung', '', 'F', 57, 'cheap Note 5 256GB', 's1138797@study.ouhk.edu.hk', '', '2018-08-15', '0000-00-00', 'img_location/note5(2).jpg', ''),
(53, 'Note  8 128GB', 5000, 'Samsung', '', 'F', 74, 'good Note 8 128GB', 's1178834@study.ouhk.edu.hk', '', '2018-08-24', '0000-00-00', 'img_location/note8.jpg', ''),
(54, 'Note 8 256GB', 5500, 'Samsung', '', 'F', 85, 'quite new Note 8 256GB', 's1211935@study.ouhk.edu.hk', '', '2018-04-27', '0000-00-00', 'img_location/note8(2).jpg', ''),
(55, 'Note 9 128GB', 6000, 'Samsung', '', 'F', 65, 'cheap Note 9 128GB', 's1234567@study.ouhk.edu.hk', '', '2018-12-01', '0000-00-00', 'img_location/note9.jpg', ''),
(56, 'Note 9 256GB', 7000, 'Samsung', '', 'T', 100, 'very cheap Note 9 256GB', 's1212362@study.ouhk.edu.hk', '', '2018-04-23', '0000-00-00', 'img_location/note9(2).jpg', ''),
(57, 'C4 128GB', 2000, 'Sony', '', 'F', 10, 'very cheap C4 128GB', 's1212370@study.ouhk.edu.hk', '', '2018-06-28', '0000-00-00', 'img_location/c4.jpg', ''),
(58, 'C4 256GB', 3000, 'Sony', '', 'T', 100, 'new C4 256GB', 's1138797@study.ouhk.edu.hk', '', '2018-07-23', '0000-00-00', 'img_location/c4(2).jpg', ''),
(59, 'Z3 128GB', 3000, 'Sony', '', 'F', 23, 'quite old Z3 128GB', 's1178834@study.ouhk.edu.hk', '', '2018-04-20', '0000-00-00', 'img_location/z3.jpg', ''),
(60, 'Z3 256GB', 4000, 'Sony', '', 'F', 90, 'quite new Z3 256GB', 's1211935@study.ouhk.edu.hk', '', '2018-01-18', '0000-00-00', 'img_location/z3(2).jpg', ''),
(61, 'X 128GB', 4000, 'Sony', '', 'F', 65, 'cheap X 128GB', 's1234567@study.ouhk.edu.hk', '', '2018-04-09', '0000-00-00', 'img_location/X.jpg', ''),
(62, 'X 256GB', 5000, 'Sony', '', 'F', 75, 'quite new X 256GB', 's1212362@study.ouhk.edu.hk', '', '2018-06-14', '0000-00-00', 'img_location/X(2).jpg', ''),
(63, 'XZ2 128GB', 4500, 'Sony', '', 'F', 32, 'quite old XZ2 128GB', 's1212370@study.ouhk.edu.hk', '', '2018-10-10', '0000-00-00', 'img_location/xz2.jpg', ''),
(64, 'XZ2 256GB', 5500, 'Sony', '', 'F', 90, 'quite new XZ2 256GB', 's1138797@study.ouhk.edu.hk', '', '2018-11-15', '0000-00-00', 'img_location/xz2(2).jpg', ''),
(65, 'XZ3 128GB', 6000, 'Sony', '', 'F', 80, 'quite new XZ3 128GB', 's1178834@study.ouhk.edu.hk', '', '2018-09-17', '0000-00-00', 'img_location/xz3(2).jpg', ''),
(66, 'XZ3 256GB', 7000, 'Sony', '', 'T', 100, 'new XZ3 256GB', 's1211935@study.ouhk.edu.hk', '', '2018-08-17', '0000-00-00', 'img_location/xz3(3).jpg', ''),
(67, '10 128GB', 1000, 'HTC', '', 'F', 10, 'very old but cheap HTC10 128GB', 's1234567@study.ouhk.edu.hk', '', '2018-08-25', '0000-00-00', 'img_location/10.jpg', ''),
(68, '10 256GB', 3000, 'HTC', '', 'T', 100, 'new and cheap HTC10 256GB', 's1212362@study.ouhk.edu.hk', '', '2018-08-09', '0000-00-00', 'img_location/10(2).jpg', ''),
(69, 'U 128GB', 4000, 'HTC', '', 'T', 100, 'new U 128GB', 's1212370@study.ouhk.edu.hk', '', '2018-04-24', '0000-00-00', 'img_location/U.jpg', ''),
(70, 'U 256GB', 3500, 'HTC', '', 'F', 75, 'quite new U 256GB', 's1138797@study.ouhk.edu.hk', '', '2018-08-07', '0000-00-00', 'img_location/U(2).jpg', ''),
(71, 'U11 128GB', 5000, 'HTC', '', 'F', 72, 'good U11 128GB', 's1178834@study.ouhk.edu.hk', '', '2018-01-23', '0000-00-00', 'img_location/U11.jpg', ''),
(72, 'U11 256GB', 5500, 'HTC', '', 'F', 84, 'quite new U11 256GB', 's1211935@study.ouhk.edu.hk', '', '2018-06-20', '0000-00-00', 'img_location/U11(2).jpg', ''),
(73, 'U12 128GB', 7000, 'HTC', '', 'T', 100, 'new U12 128GB', 's1234567@study.ouhk.edu.hk', '', '2018-11-07', '0000-00-00', 'img_location/U12(2).jpg', ''),
(74, 'U12 256GB', 6000, 'HTC', '', 'F', 50, 'good U12 256GB', 's1212362@study.ouhk.edu.hk', '', '2018-11-28', '0000-00-00', 'img_location/U12(3).jpg', ''),
(75, 'V20 128GB', 2000, 'LG', '', 'F', 35, 'quite old V20 128GB', 's1212370@study.ouhk.edu.hk', '', '2018-10-10', '0000-00-00', 'img_location/v20(2).jpg', ''),
(76, 'V20 256GB', 3500, 'LG', '', 'F', 70, 'quite new V20 256GB', 's1138797@study.ouhk.edu.hk', '', '2018-10-26', '0000-00-00', 'img_location/v20(3).jpg', ''),
(77, 'V30+ 128GB', 4500, 'LG', '', 'T', 100, 'new V30+', 's1178834@study.ouhk.edu.hk', '', '2018-09-23', '0000-00-00', 'img_location/v30+.jpg', ''),
(78, 'V30+ 256GB', 3500, 'LG', '', 'F', 78, 'quite new V30+ 256GB', 's1211935@study.ouhk.edu.hk', '', '2018-09-15', '0000-00-00', 'img_location/v30+(2).jpg', ''),
(79, 'G4 128GB', 4000, 'LG', '', 'F', 55, 'good G4 128GB', 's1234567@study.ouhk.edu.hk', '', '2018-08-29', '0000-00-00', 'img_location/G4.jpg', ''),
(80, 'G4 256GB', 4500, 'LG', '', 'F', 50, 'good G4 256GB', 's1212362@study.ouhk.edu.hk', '', '2018-08-14', '0000-00-00', 'img_location/G4(2).jpg', ''),
(81, 'G5 128GB', 5500, 'LG', '', 'T', 100, 'new G5 128GB', 's1212370@study.ouhk.edu.hk', '', '2018-05-25', '0000-00-00', 'img_location/G5.jpg', ''),
(82, 'G5 256GB', 5000, 'LG', '', 'F', 63, 'quite good G5 256GB', 's1138797@study.ouhk.edu.hk', '', '2018-08-17', '0000-00-00', 'img_location/G5(2).jpg', ''),
(83, 'G6 128GB', 7500, 'LG', '', 'T', 100, 'new G6 128GB', 's1178834@study.ouhk.edu.hk', '', '2018-12-05', '0000-00-00', 'img_location/G6.jpg', ''),
(84, 'G6 256GB', 5000, 'LG', '', 'F', 50, 'quite old G6 256GB', 's1211935@study.ouhk.edu.hk', '', '2018-08-13', '0000-00-00', 'img_location/G6(2).jpg', ''),
(85, '8+ 128GB', 1234, 'MI', '', 'F', 45, 'old 8+ 128GB', 's1234567@study.ouhk.edu.hk', '', '2018-05-18', '0000-00-00', 'img_location/8+(2).jpg', ''),
(86, '8+ 256GB', 2000, 'MI', '', 'F', 80, 'quite new 8+ 256GB', 's1212362@study.ouhk.edu.hk', '', '2018-05-29', '0000-00-00', 'img_location/8+(3).jpg', ''),
(87, 'MIX 2 128GB', 3000, 'MI', '', 'T', 100, 'new MIX2', 's1212370@study.ouhk.edu.hk', '', '2018-04-01', '0000-00-00', 'img_location/mix2(2).jpg', ''),
(88, 'Note 5 128GB', 2000, 'MI', '', 'F', 62, 'goood MI Note 5 128GB', 's1212362@study.ouhk.edu.hk', '', '2018-04-28', '0000-00-00', 'img_location/mi_note5.jpg', ''),
(89, 'Max 3', 3000, 'MI', '', 'F', 84, 'quite new Max3', 's1212362@study.ouhk.edu.hk', '', '2018-12-04', '0000-00-00', 'img_location/max3.jpg', '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Login_Email`);

--
-- 資料表索引 `personal_info`
--
ALTER TABLE `personal_info`
  ADD PRIMARY KEY (`Email_Address`);

--
-- 資料表索引 `product_info`
--
ALTER TABLE `product_info`
  ADD PRIMARY KEY (`Item_ID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `product_info`
--
ALTER TABLE `product_info`
  MODIFY `Item_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
