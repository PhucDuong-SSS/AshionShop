-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 27, 2020 lúc 03:07 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ashionshop`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminEmail` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `adminUser` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `adminPass` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminName`, `adminEmail`, `adminUser`, `adminPass`, `level`) VALUES
(2, 'admin', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_brand`
--

CREATE TABLE `tbl_brand` (
  `brandId` int(11) NOT NULL,
  `brandName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_brand`
--

INSERT INTO `tbl_brand` (`brandId`, `brandName`) VALUES
(13, 'Nữ'),
(14, 'Nam'),
(15, 'Trẻ em'),
(16, 'Mỹ phẩm'),
(17, 'Phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `cartId` int(11) NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `sId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `quantity` int(11) NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_cart`
--

INSERT INTO `tbl_cart` (`cartId`, `customerId`, `productId`, `sId`, `productName`, `price`, `quantity`, `image`) VALUES
(160, 12, 54, '0852b0angjk2m9mvcrhpq98n0f', 'Sơ mi nữ tay dài (SMN-V416)', '16', 1, '8aac7ffc8a.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_category`
--

CREATE TABLE `tbl_category` (
  `catId` int(11) NOT NULL,
  `catName` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_category`
--

INSERT INTO `tbl_category` (`catId`, `catName`) VALUES
(3, 'Jean'),
(4, 'Áo thun'),
(5, 'Áo sơ mi'),
(6, 'Đầm'),
(7, 'Áo vét'),
(15, 'Áo Khoát'),
(18, 'Thắt lưng'),
(19, 'Xịt khoáng'),
(20, 'Kem chống nắng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_compare`
--

CREATE TABLE `tbl_compare` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `city` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `gender` int(11) NOT NULL DEFAULT 0,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_customer`
--

INSERT INTO `tbl_customer` (`id`, `name`, `address`, `city`, `gender`, `phone`, `email`, `password`) VALUES
(8, 'Phuc Duong Ngoc', 'Quang Phu  Thua Thien Hue', 'Hue', 1, '+84975398142', 'phucfxduong@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(11, 'Phuc Duong', 'Quang Phu  Thua Thien Hue', 'Quang Dien', 0, '0975398142', '123456@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(12, 'codegym', 'Quang Phu  Thua Thien Hue', 'Quang Dien', 1, '123', 'codegym@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `date_order` datetime NOT NULL DEFAULT current_timestamp(),
  `note` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_product`
--

CREATE TABLE `tbl_product` (
  `productId` int(11) NOT NULL,
  `productName` tinytext COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `productQuantity` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_soldout` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `product_remain` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `product_view` int(11) NOT NULL DEFAULT 0,
  `product_gender` int(11) NOT NULL DEFAULT 0,
  `product_show` int(11) NOT NULL DEFAULT 1,
  `catId` int(11) NOT NULL,
  `brandId` int(11) NOT NULL,
  `product_desc` text COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `istrend` int(11) NOT NULL DEFAULT 0,
  `created_ad` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_ad` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tbl_product`
--

INSERT INTO `tbl_product` (`productId`, `productName`, `product_code`, `productQuantity`, `product_soldout`, `product_remain`, `product_view`, `product_gender`, `product_show`, `catId`, `brandId`, `product_desc`, `type`, `price`, `image`, `istrend`, `created_ad`, `updated_ad`) VALUES
(26, 'Áo thun vàng', 'AT01', '50', '0', '50', 0, 0, 1, 4, 13, '<p>H&agrave;ng xuất khẩu sang Ch&acirc;u</p>', 1, '15', '4db47c041b.jpg', 1, '2020-11-16 10:44:03', '2020-11-16 10:44:03'),
(27, 'Sơ mi hồng nhạt', 'SM01', '15', '0', '15', 0, 1, 1, 5, 14, '<p>H&agrave;ng xuất khẩu, kiểu d&aacute;ng hợp thời trang</p>', 1, '20', '7244c95ebb.jpg', 1, '2020-11-16 10:47:29', '2020-11-16 10:47:29'),
(28, 'Áo đầm vàng cotton', 'D01', '15', '0', '15', 0, 0, 1, 6, 13, '<p>H&agrave;ng chất lượng cao</p>', 1, '255', '752d7162cb.jpg', 1, '2020-11-16 10:49:46', '2020-11-16 10:49:46'),
(29, 'Sơ mi kẻ dọc trơn', 'SM02', '100', '2', '98', 4, 1, 1, 5, 14, '<p>Kiểu d&aacute;ng thời trang</p>', 1, '26', 'b5834c3dd7.jpg', 1, '2020-11-16 10:51:35', '2020-11-16 10:51:35'),
(30, 'Fit micro', 'SM03', '26', '7', '19', 0, 1, 1, 5, 14, '<p>H&agrave;ng chất lượng cao</p>', 1, '40', '4b7cd6c33d.jpg', 1, '2020-11-16 10:53:00', '2020-11-16 10:53:00'),
(31, 'Áo sơ mi nam tay ngắn (SMM-N641)', 'SM04', '50', '2', '48', 0, 1, 1, 5, 14, '<p>Chất lượng cao</p>', 1, '10', '5cca2799c6.jpg', 1, '2020-11-16 10:56:03', '2020-11-16 10:56:03'),
(32, 'Áo thun nữ tay ngắn (AP-2741N)', 'AP-2741N', '50', '3', '47', 0, 0, 1, 4, 13, '<p>H&agrave;ng chất lượng</p>', 1, '10', '431f9f1a21.jpg', 1, '2020-11-16 11:03:20', '2020-11-16 11:03:20'),
(33, 'Áo khoác jeans (AJN-M10)', 'AJN-M10', '15', '0', '15', 0, 0, 1, 3, 13, '<p>H&agrave;ng chất lương</p>', 1, '175', 'd577f919e9.jpg', 1, '2020-11-16 11:05:06', '2020-11-16 11:05:06'),
(34, 'Áo khoác jeans (AJN-M6)', 'AJN-M6-0JD00-0S', '25', '0', '25', 0, 1, 1, 3, 13, '<p>H&agrave;ng chất lường</p>', 1, '169', '636354bef5.jpg', 1, '2020-11-16 11:06:28', '2020-11-16 11:06:28'),
(35, 'Áo khoác jeans (AJN-M3)', ' AJN-M3', '25', '0', '25', 0, 0, 1, 3, 13, '<p>H&agrave;ng chất lượng</p>', 1, '16', '4509a16e56.jpg', 1, '2020-11-16 11:07:54', '2020-11-16 11:07:54'),
(36, 'Áo khoác thun (AK-107)', ' AK-107', '26', '0', '26', 0, 0, 1, 4, 13, '<p>H&agrave;ng chất lượng</p>', 1, '200', '4046f57697.jpg', 1, '2020-11-16 11:09:39', '2020-11-16 11:09:39'),
(37, 'Dây nịt (DN-116)', ' DN-116', '16', '0', '16', 0, 1, 1, 18, 17, '<p>H&agrave;ng chất lượng</p>', 1, '40', 'a1b739ddef.jpg', 1, '2020-11-16 12:08:42', '2020-11-16 12:08:42'),
(38, 'Dây nịt (DN-49)', 'DN-49-0NA00', '50', '1', '49', 0, 1, 1, 18, 17, '<p>H&agrave;ng chất lượng</p>', 1, '50', '11a8beb83f.jpg', 1, '2020-11-16 12:10:50', '2020-11-16 12:10:50'),
(39, 'Xịt Khoáng Evoluderm Atomiseur Eau Pure Spray', 'XK01', '50', '1', '49', 0, 0, 1, 19, 16, '<p><span>Xịt kho&aacute;ng chứa c&aacute;c th&agrave;nh phần chất kho&aacute;ng cực tốt cho da, gi&uacute;p c&acirc;n bằng độ pH.</span></p>', 1, '20', '3eb66ff78e.jpg', 1, '2020-11-16 12:13:55', '2020-11-16 12:13:55'),
(41, 'Đầm Orangza phối nơ dễ thương cho bé gái 10 - 15 tuổi DGB191806n', 'D05', '50', '0', '50', 0, 0, 1, 6, 15, '<p>H&agrave;ng chất lượng&nbsp;</p>', 1, '15', 'e993954c7d.jpg', 1, '2020-11-16 12:18:29', '2020-11-16 12:18:29'),
(42, 'Quần jeans nữ (NJ-M173)', 'JN25', '100', '0', '100', 0, 0, 1, 3, 13, '<p>Color : Denim lợt</p>', 0, '25', 'd114484df0.jpg', 0, '2020-11-21 13:20:15', '2020-11-21 13:20:15'),
(43, 'Áo khoác (AG-181)', 'AK08', '100', '0', '100', 0, 0, 1, 15, 13, '<p>Color: Xanh đen</p>', 1, '100', 'e294141bb5.jpg', 0, '2020-11-21 13:22:00', '2020-11-21 13:22:00'),
(44, 'Áo khoác nữ (AKMN-39)', 'AK38', '150', '0', '150', 0, 0, 1, 15, 13, '<p>Color: Hồng, xanh đen</p>', 1, '35', '1eb6c57f43.jpg', 1, '2020-11-21 13:23:16', '2020-11-21 13:23:16'),
(45, 'Áo khoác nữ (AKMN-39)', 'AK38', '150', '0', '150', 0, 0, 1, 15, 13, '<p>Color: Hồng, xanh đen</p>', 1, '35', '1eb6c57f43.jpg', 1, '2020-11-21 13:23:16', '2020-11-21 13:23:16'),
(46, 'Áo khoác nữ (AK-099)', 'AK99', '150', '0', '150', 0, 0, 1, 15, 13, '<p>Color: x&aacute;m</p>', 1, '35', '20951b17d7.jpg', 1, '2020-11-21 13:24:24', '2020-11-21 13:24:24'),
(47, 'Áo thun nữ tay ngắn (AP-2539N)', 'AT05', '500', '0', '500', 0, 0, 1, 4, 13, '<p>Color:&nbsp;<span>Biển, Đen, Đỏ tươi, T&iacute;m, Trắng, V&agrave;ng cam, Xanh đen</span></p>', 1, '35', '118517bf57.jpg', 1, '2020-11-21 13:26:03', '2020-11-21 13:26:03'),
(48, 'Áo khoác (AG-173)', 'AK113', '50', '14', '36', 0, 0, 1, 15, 13, '<p>Color: xanh đậm, đỏ tươi</p>', 1, '35', '5f5a774378.jpg', 0, '2020-11-21 13:28:28', '2020-11-21 13:28:28'),
(49, 'Sơ mi nữ tay dài (SMN-V416)', 'SMN05', '150', '30', '120', 0, 0, 1, 5, 13, '<p>Color: Hồng Phấn</p>', 1, '50', 'ff8fa55b45.jpg', 1, '2020-11-21 13:30:16', '2020-11-21 13:30:16'),
(50, 'Sơ mi nữ tay dài (SMN-V414)', 'SM01', '150', '0', '150', 6, 0, 1, 5, 13, '<p>Color: đỏ tươi, v&agrave;ng</p>', 1, '25', '6f524a6bf8.jpg', 0, '2020-11-21 13:32:05', '2020-11-21 13:32:05'),
(51, 'Sơ mi nữ tay dài (SMN-V413)', 'SM02', '150', '0', '150', 11, 0, 1, 5, 13, '<p>Color:&nbsp;<span>Đỏ tươi, Hồng, Trắng, V&agrave;ng</span></p>', 1, '26', '2a80701533.jpg', 0, '2020-11-21 13:33:02', '2020-11-21 13:33:02'),
(52, 'Sơ mi nữ tay dài (SMN-V409)', 'SM07', '150', '1', '149', 1, 0, 1, 5, 13, '<p>Color: đỏ, trắng</p>', 0, '26', 'c7af3b51fd.jpg', 0, '2020-11-21 13:34:00', '2020-11-21 13:34:00'),
(53, 'Sơ mi nữ tay dài (SMN-V408)', 'SM10', '150', '13', '137', 0, 0, 1, 5, 13, '<p>Color: xanh biển</p>', 0, '38', '48f9566fb2.jpg', 1, '2020-11-21 13:34:59', '2020-11-21 13:34:59'),
(54, 'Sơ mi nữ tay dài (SMN-V416)', 'SM012', '150', '23', '127', 0, 0, 1, 5, 13, '<p>Color: hồng</p>', 1, '16', '8aac7ffc8a.jpg', 1, '2020-11-21 13:35:54', '2020-11-21 13:35:54'),
(55, 'Sơ mi nữ tay dài (SMN-V411)', 'SM014', '150', '21', '129', 4, 0, 1, 5, 13, '<p>Color: xanh</p>', 1, '59', 'e5e6642847.jpg', 1, '2020-11-21 13:36:43', '2020-11-21 13:36:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `sliderId` int(11) NOT NULL,
  `sliderName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_warehouse`
--

CREATE TABLE `tbl_warehouse` (
  `id_warehouse` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `sl_nhap` varchar(50) NOT NULL,
  `sl_ngaynhap` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `id` int(11) NOT NULL,
  `sId` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `customerId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `productName` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Chỉ mục cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  ADD PRIMARY KEY (`brandId`);

--
-- Chỉ mục cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`cartId`);

--
-- Chỉ mục cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`catId`);

--
-- Chỉ mục cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`productId`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`sliderId`);

--
-- Chỉ mục cho bảng `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  ADD PRIMARY KEY (`id_warehouse`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `tbl_brand`
--
ALTER TABLE `tbl_brand`
  MODIFY `brandId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `cartId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT cho bảng `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `catId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_compare`
--
ALTER TABLE `tbl_compare`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT cho bảng `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `sliderId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `tbl_warehouse`
--
ALTER TABLE `tbl_warehouse`
  MODIFY `id_warehouse` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
