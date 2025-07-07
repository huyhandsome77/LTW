-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2025 at 07:37 PM
-- Server version: 8.0.40
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laptrinhweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitietdonhang`
--

CREATE TABLE `chitietdonhang` (
  `idChiTiet` int NOT NULL,
  `idDonHang` int NOT NULL,
  `idSanPham` int NOT NULL,
  `soLuong` int NOT NULL,
  `giaMua` double NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chitietdonhang`
--

INSERT INTO `chitietdonhang` (`idChiTiet`, `idDonHang`, `idSanPham`, `soLuong`, `giaMua`) VALUES
(20, 18, 10, 2, 20000),
(21, 19, 10, 2, 20000),
(22, 20, 10, 2, 20000),
(23, 21, 10, 10, 13500);

-- --------------------------------------------------------

--
-- Table structure for table `discount`
--

CREATE TABLE `discount` (
  `idDiscount` int NOT NULL,
  `idSanPham` int NOT NULL,
  `phanTram` int NOT NULL,
  `time_Start` datetime NOT NULL,
  `time_End` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `discount`
--

INSERT INTO `discount` (`idDiscount`, `idSanPham`, `phanTram`, `time_Start`, `time_End`) VALUES
(4, 10, 10, '2025-07-06 23:34:00', '2025-07-07 23:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `donhang`
--

CREATE TABLE `donhang` (
  `idDonHang` int NOT NULL,
  `idUser` int NOT NULL,
  `ngayDat` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trangThai` enum('Chờ Xác Nhận','Đã Xác Nhận','Đang Giao Hàng','Giao Hàng Thành Công','Đã Hủy') NOT NULL DEFAULT 'Chờ Xác Nhận',
  `ptThanhToan` enum('COD','Momo') NOT NULL DEFAULT 'COD'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `donhang`
--

INSERT INTO `donhang` (`idDonHang`, `idUser`, `ngayDat`, `trangThai`, `ptThanhToan`) VALUES
(18, 10, '2025-07-06 12:26:13', 'Chờ Xác Nhận', 'COD'),
(19, 6, '2025-07-06 12:26:23', 'Đã Hủy', 'COD'),
(20, 6, '2025-07-06 12:28:01', 'Chờ Xác Nhận', 'COD'),
(21, 6, '2025-07-06 18:39:35', 'Chờ Xác Nhận', 'Momo');

-- --------------------------------------------------------

--
-- Table structure for table `lienhe`
--

CREATE TABLE `lienhe` (
  `idLienHe` int NOT NULL,
  `hoTen` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `noiDung` varchar(255) NOT NULL,
  `timeSubmit` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` enum('Chưa xử lí','Đã Xử Lí') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Chưa xử lí'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lienhe`
--

INSERT INTO `lienhe` (`idLienHe`, `hoTen`, `email`, `phone`, `noiDung`, `timeSubmit`, `status`) VALUES
(2, 'Huy', 'ng.anhhuy2005@gmail.com', '0386699723', 'Hello', '2025-07-07 00:01:34', 'Chưa xử lí');

-- --------------------------------------------------------

--
-- Table structure for table `sanpham`
--

CREATE TABLE `sanpham` (
  `idSanPham` int NOT NULL,
  `tenSanPham` varchar(255) NOT NULL,
  `loaiSanPham` enum('Đồ Ăn','Nước Uống') NOT NULL,
  `tonKho` int DEFAULT NULL,
  `gia` double NOT NULL,
  `hinhanh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sanpham`
--

INSERT INTO `sanpham` (`idSanPham`, `tenSanPham`, `loaiSanPham`, `tonKho`, `gia`, `hinhanh`) VALUES
(10, 'Nước Lọc', 'Nước Uống', 100, 15000, 'assets/img/uploads/1751797216_nuoc-suoi.jpg'),
(11, 'Bánh Mì Kinh Đô', 'Đồ Ăn', NULL, 10000, 'assets/img/uploads/1751798077_avatar_6_1751218335.jpg'),
(12, 'Number One', 'Nước Uống', NULL, 20000, 'assets/img/uploads/1751798231_nuoc-number-one.png'),
(13, 'Sting Dâu', 'Nước Uống', NULL, 20000, 'assets/img/uploads/1751799951_sting.jpeg'),
(14, 'Red Bull', 'Nước Uống', NULL, 25000, 'assets/img/uploads/1751799971_redbull.png'),
(15, 'Bia Tiger', 'Nước Uống', NULL, 22000, 'assets/img/uploads/1751799999_bia-tiger.webp'),
(16, 'Bia 333', 'Nước Uống', NULL, 20000, 'assets/img/uploads/1751800023_bia-333.jpg'),
(17, 'Bia Heineken', 'Nước Uống', NULL, 27000, 'assets/img/uploads/1751800037_bia-heineken.webp'),
(18, 'Pepsi', 'Nước Uống', NULL, 17000, 'assets/img/uploads/1751800056_pepsi.jpg'),
(19, 'Xúc Xích', 'Đồ Ăn', NULL, 18000, 'assets/img/uploads/1751800079_xuc-xich.webp'),
(20, 'Kẹo Dẻo', 'Đồ Ăn', NULL, 15000, 'assets/img/uploads/1751800218_keo-deo.webp'),
(21, 'Vỉ Trứng Gà', 'Đồ Ăn', NULL, 30000, 'assets/img/uploads/1751800234_vi-trung.jpg'),
(22, 'Mì Hảo Hảo', 'Đồ Ăn', NULL, 4000, 'assets/img/uploads/1751800401_haohao.jpeg'),
(23, 'Mì SiuKay', 'Đồ Ăn', NULL, 13000, 'assets/img/uploads/1751800415_siukay.jpg'),
(24, 'Bún Tươi', 'Đồ Ăn', NULL, 11000, 'assets/img/uploads/1751800431_bun-tuoi.webp'),
(25, 'Phở Cung Đình', 'Đồ Ăn', NULL, 8000, 'assets/img/uploads/1751800455_pho-ga-cung-dinh.jpg'),
(26, 'Hũ Tiếu Nam Vang', 'Đồ Ăn', NULL, 12000, 'assets/img/uploads/1751800473_nam-vang.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `phone` varchar(11) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `role` enum('Admin','User','Manager') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'User',
  `imgAvt` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'assets/img/avt/default.avif',
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `fullName`, `email`, `phone`, `birthday`, `address`, `role`, `imgAvt`, `created_at`) VALUES
(6, 'admin', '$2y$10$hhZI02khkwG2NstIw6GtQ.mBCD3RvbRHZ/0XiJw7ZMcU5f4VXMqXK', 'Nguyễn Anh Huy', 'soicaca77@gmail.com', '0386699723', NULL, 'Tây Bình, Tây Sơn, Bình Định', 'User', 'assets/img/uploads/avatar_6_1751374472.jpg', '2025-06-29 00:48:37'),
(7, 'anhhuy1711', '$2y$10$uuzaPaDTGhRVV2cq26UoLO7M5YhuLLY0B.zddX4hx6bJeBNl1HZKa', 'Nguyễn Anh Huy', 'ng.anhhuy2005@gmail.com', '0386699723', NULL, 'Tây Bình, Tây Sơn, Bình Định', 'Manager', 'assets/img/uploads/avatar_7_1751716588.jpeg', '2025-07-05 18:56:05'),
(9, '05180db8738', '$2y$10$Pbw7bt71IQ332FP/4gugTOcc8WhFChtaO5I7hSE7GWg9EBUoy3v6q', NULL, 'accshoppekol2005@gmail.com', NULL, NULL, NULL, 'Admin', 'assets/img/avt/default.avif', '2025-07-05 23:30:04'),
(10, '2382300180', '$2y$10$K3HDlHOi1KVDptMd21PB3erBXN/aaUdbv5r2ttOMCwO6o8dFguFOS', NULL, 'buithithanhhang16032005@gmail.com', NULL, NULL, NULL, 'User', 'assets/img/avt/default.avif', '2025-07-06 17:25:43');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD PRIMARY KEY (`idChiTiet`),
  ADD KEY `fk_ctdh_donhang` (`idDonHang`),
  ADD KEY `fk_ctdh_sanpham` (`idSanPham`);

--
-- Indexes for table `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`idDiscount`),
  ADD KEY `fk_discount_sanpham` (`idSanPham`);

--
-- Indexes for table `donhang`
--
ALTER TABLE `donhang`
  ADD PRIMARY KEY (`idDonHang`),
  ADD KEY `fk_donhang_user` (`idUser`);

--
-- Indexes for table `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`idLienHe`);

--
-- Indexes for table `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`idSanPham`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  MODIFY `idChiTiet` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `discount`
--
ALTER TABLE `discount`
  MODIFY `idDiscount` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `donhang`
--
ALTER TABLE `donhang`
  MODIFY `idDonHang` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `idLienHe` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `idSanPham` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitietdonhang`
--
ALTER TABLE `chitietdonhang`
  ADD CONSTRAINT `fk_ctdh_donhang` FOREIGN KEY (`idDonHang`) REFERENCES `donhang` (`idDonHang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_ctdh_sanpham` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`idSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `discount`
--
ALTER TABLE `discount`
  ADD CONSTRAINT `fk_discount_sanpham` FOREIGN KEY (`idSanPham`) REFERENCES `sanpham` (`idSanPham`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donhang`
--
ALTER TABLE `donhang`
  ADD CONSTRAINT `fk_donhang_user` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
