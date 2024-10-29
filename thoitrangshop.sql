-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 18, 2024 at 07:20 AM
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
-- Database: `thoitrangshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(11) NOT NULL,
  `slider_image` varchar(100) NOT NULL,
  `slider_active` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_image`, `slider_active`) VALUES
(1, 'images.jpg', 1),
(2, 'images.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `email`, `password`, `admin_name`) VALUES
(1, 'admin123', '0192023a7bbd73250516f069df18b500', 'Văn Nhân');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`category_id`, `category_name`) VALUES
(1, 'Áo'),
(2, 'Quần'),
(3, 'Giày'),
(4, 'Nón'),
(15, 'Trang Sức');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donhang`
--

CREATE TABLE `tbl_donhang` (
  `donhang_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `mahang` varchar(50) NOT NULL,
  `khachhang_id` int(11) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tinhtrang` int(11) NOT NULL DEFAULT 0,
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_donhang`
--

INSERT INTO `tbl_donhang` (`donhang_id`, `sanpham_id`, `soluong`, `mahang`, `khachhang_id`, `ngaythang`, `tinhtrang`, `huydon`) VALUES
(21, 5, 1, '8482', 24, '2023-11-15 14:36:29', 0, 0),
(22, 12, 2, '8482', 24, '2023-11-15 14:36:29', 0, 0),
(23, 12, 2, '5235', 25, '2023-11-15 15:52:44', 0, 0),
(24, 5, 3, '5235', 25, '2023-11-15 15:52:44', 0, 0),
(26, 2, 1, '6097', 27, '2023-11-15 16:34:55', 0, 0),
(27, 4, 1, '7609', 28, '2023-11-15 16:38:11', 0, 0),
(28, 5, 1, '7609', 28, '2023-11-15 16:38:11', 0, 0),
(29, 20, 1, '4210', 30, '2023-11-29 11:18:57', 2, 0),
(30, 19, 3, '4210', 30, '2023-11-29 11:18:57', 2, 0),
(32, 22, 1, '4419', 32, '2023-11-29 11:18:51', 1, 0),
(33, 17, 1, '1466', 20, '2023-11-29 11:19:09', 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giaodich`
--

CREATE TABLE `tbl_giaodich` (
  `giaodich_id` int(11) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `soluong` int(11) NOT NULL,
  `magiaodich` varchar(50) NOT NULL,
  `ngaythang` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `khachhang_id` int(11) NOT NULL,
  `tinhtrangdon` int(11) NOT NULL DEFAULT 0,
  `huydon` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_giaodich`
--

INSERT INTO `tbl_giaodich` (`giaodich_id`, `sanpham_id`, `soluong`, `magiaodich`, `ngaythang`, `khachhang_id`, `tinhtrangdon`, `huydon`) VALUES
(3, 12, 1, '7503', '2023-11-15 16:01:06', 26, 0, 0),
(4, 2, 1, '6097', '2023-11-15 16:34:55', 27, 0, 0),
(5, 4, 1, '7609', '2023-11-15 16:38:11', 28, 0, 0),
(6, 5, 1, '7609', '2023-11-15 16:38:11', 28, 0, 0),
(7, 20, 1, '4210', '2023-11-29 11:18:58', 30, 2, 0),
(8, 19, 3, '4210', '2023-11-29 11:18:58', 30, 2, 0),
(9, 21, 1, '5375', '2023-11-18 02:59:07', 31, 0, 0),
(10, 22, 1, '4419', '2023-11-29 11:18:51', 32, 1, 0),
(11, 17, 1, '1466', '2023-11-29 11:19:09', 20, 2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `giohang_id` int(11) NOT NULL,
  `tensanpham` varchar(100) NOT NULL,
  `sanpham_id` int(11) NOT NULL,
  `giasanpham` varchar(50) NOT NULL,
  `hinhanh` varchar(50) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`giohang_id`, `tensanpham`, `sanpham_id`, `giasanpham`, `hinhanh`, `soluong`) VALUES
(77, 'Quần Nữ 1', 18, '259000', 'quannu3.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `khachhang_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `giaohang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`khachhang_id`, `name`, `phone`, `address`, `note`, `email`, `password`, `giaohang`) VALUES
(20, 'nhan', '01234', 'dn', '', 'nhan@gmail.com', 'bb4e31f2d20f8e7f88e2b8459263657f', 0),
(22, 'tuan', '2323', 'ád', 'ádasadas', 'sadasd@sadas', '', 0),
(23, 'tuan1', 'zxczxc', 'zxczxc', 'zxc', 'adsa@sdasd', '', 0),
(24, 'van nhan', '07777', 'dn', '', 'nhan@gmai.com', '', 0),
(25, 'van bao', '012', 'ádads', 'zxc', 'asd@zxc', '', 0),
(26, 'Văn Nhân', '0762605901', 'đà nẵng', 'mua cho con ghệ', 'Nhan@gmail.com', '', 0),
(27, 'Văn Bảo', '032145685', 'Đà Nẵng', 'Mua cho con GHệ', 'Bao@gmail.com', '', 0),
(28, 'Tú ', '0123458779', 'ĐÀ NĂngx', 'mua cho con ghệ', 'tu@gmail.com', '', 0),
(30, 'nguyen van a', '012345678', 'tổ 2 hòa tiến hòa vang', '', 'tuan@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(31, 'nguyen van b', '0469531587', 'chợ yến nê hòa tiến hòa vang đà nẵng', '', 'nguyenvanb@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 0),
(32, 'A', '0935560494', 'A', '', 'xmai0499@gmail.com', '7fc56270e7a70fa81a5935b72eacbe29', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `sanpham_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sanpham_name` varchar(2500) NOT NULL,
  `sanpham_chitiet` text NOT NULL,
  `sanpham_mota` text NOT NULL,
  `sanpham_gia` varchar(100) NOT NULL,
  `sanpham_giakhuyenmai` varchar(100) NOT NULL,
  `sanpham_active` int(11) NOT NULL,
  `sanpham_hot` int(11) NOT NULL,
  `sanpham_soluong` int(11) NOT NULL,
  `sanpham_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`sanpham_id`, `category_id`, `sanpham_name`, `sanpham_chitiet`, `sanpham_mota`, `sanpham_gia`, `sanpham_giakhuyenmai`, `sanpham_active`, `sanpham_hot`, `sanpham_soluong`, `sanpham_image`) VALUES
(22, 1, 'Áo Nữ ', '', 'Áo được may từ chất liệu cotton với form regular fit, phần eo không ôm, suông thẳng xuống vạt áo. Đây là một item hiện đại, basic dễ mặc, dễ mix cùng nhiều trang phục khác nhau.Sản phẩm giá tốt.Chất liệu 100% cotton:- Ưu điểm NL: Thân thiện với môi trường. Độ bền tốt. Thấm hút tốt, thoáng mát, không gây hại cho sức khỏe. Thoáng mát khi mặc.- Ứng dụng: là item thoải mái, linh hoạt. Thiết kế theo phong cách basic dễ mặc và dễ phối với nhiều trang phục khác nhau.', '239000', '200900', 0, 0, 6, 'aonu.jpg'),
(24, 3, 'Sandan', '', 'Kì chá nà kì chá nề ô', '300000', '200000', 0, 0, 1, 'sandannu.jpg'),
(26, 0, '', '', '', '', '', 0, 0, 0, 'daychuyen.jpg'),
(29, 0, '', '', '', '', '', 0, 0, 0, ''),
(31, 3, 'giày 1', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'sandannu.jpg'),
(32, 0, '', '', '', '', '', 0, 0, 0, ''),
(34, 3, 'giày 1', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'sandannu.jpg'),
(35, 3, 'giày 1', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'sandannu.jpg'),
(36, 1, 'Áo Nữ ', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'aonu.jpg'),
(37, 0, 'Áo Nữ ', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'aonu.jpg'),
(38, 0, 'Áo Nữ ', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'aonu.jpg'),
(39, 0, 'Áo Nữ ', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'aonu.jpg'),
(40, 0, 'Áo Nữ ', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'aonu.jpg'),
(41, 0, 'Áo Nữ 1', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'aonu.jpg'),
(42, 1, 'Áo Nữ ', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'aonu.jpg'),
(43, 1, 'Áo Nữ ', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 10, 'aonu.jpg'),
(44, 2, 'Quần Jean', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 100, 'quannu3.jpg'),
(45, 2, 'Quần Jean', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 100, 'quannu3.jpg'),
(46, 2, 'Quần Jean', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 100, 'quannu3.jpg'),
(47, 0, 'Quần Jean', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 100, 'quannu3.jpg'),
(48, 2, 'Quần Jean', 'sản phẩm tốt', '', '100000', '90000', 0, 0, 100, 'quannu3.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  ADD PRIMARY KEY (`donhang_id`);

--
-- Indexes for table `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  ADD PRIMARY KEY (`giaodich_id`);

--
-- Indexes for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`giohang_id`);

--
-- Indexes for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`khachhang_id`);

--
-- Indexes for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`sanpham_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_donhang`
--
ALTER TABLE `tbl_donhang`
  MODIFY `donhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `tbl_giaodich`
--
ALTER TABLE `tbl_giaodich`
  MODIFY `giaodich_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `giohang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `khachhang_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `sanpham_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
