-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th4 10, 2018 lúc 05:42 AM
-- Phiên bản máy phục vụ: 10.1.31-MariaDB
-- Phiên bản PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `databasefruit`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `created_at`, `updated_at`) VALUES
(2, 'nguyenhuykaio', '1234', '2018-04-07 21:12:06', '2018-04-07 21:12:06'),
(3, 'thanhluan', '123', '2018-04-07 21:20:27', '2018-04-07 21:20:27'),
(4, 'thaihuy', '123', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`id`, `categoryname`) VALUES
(1, 'Mít'),
(2, 'Sầu riêng'),
(3, 'Nhãn'),
(4, 'Chôm chôm');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `id` int(10) UNSIGNED NOT NULL,
  `productid` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `content` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`id`, `productid`, `userid`, `content`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'ngon', NULL, NULL),
(6, 5, 1, 'E NGUYEN HUY', NULL, NULL),
(7, 5, 1, 'AN NGON KHONG', NULL, NULL),
(8, 5, 1, 'NGON LẮM NÀ', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `detailcategory`
--

CREATE TABLE `detailcategory` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoryid` int(11) NOT NULL,
  `detailcategoryname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `detailcategory`
--

INSERT INTO `detailcategory` (`id`, `categoryid`, `detailcategoryname`) VALUES
(1, 1, 'Mít Thái'),
(2, 1, 'Mít tố nữ'),
(3, 1, 'Mít mật'),
(4, 1, 'Mít nhão'),
(5, 2, 'SR ri6'),
(6, 2, 'SR khổ qua'),
(7, 2, 'SR hạt lép'),
(8, 2, 'SR chuồn bò'),
(9, 3, 'Nhãn xuồng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(36, '2018_04_08_100722_table_admin', 2),
(39, '2014_10_12_000000_create_users_table', 3),
(40, '2014_10_12_100000_create_password_resets_table', 3),
(41, '2018_03_27_090513_table_product', 3),
(42, '2018_03_27_090816_table_orderdetail', 3),
(43, '2018_03_27_091042_table_comment', 3),
(44, '2018_03_27_091838_table_category', 3),
(45, '2018_04_04_114347_table_detailcategory', 3),
(46, '2018_04_08_101602_table_admin', 3),
(47, '2018_04_08_204540_table_order', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order`
--

CREATE TABLE `order` (
  `id` int(10) UNSIGNED NOT NULL,
  `quanlity` int(11) NOT NULL,
  `totalprice` double(8,2) NOT NULL,
  `namecustomer` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order`
--

INSERT INTO `order` (`id`, `quanlity`, `totalprice`, `namecustomer`, `address`, `phonenumber`, `status`, `created_at`) VALUES
(2, 1, 90.00, 'huy', '475 ĐBP Bình Thạnh', '0167250906', 1, '09-04-2018'),
(5, 2, 100.00, 'Nguyễn Thái Huy', '558/8B1, Bình Quới, P28, Bình Thạnh, TPHCM', '01666635099', 0, '09-04-2018'),
(6, 2, 180.00, 'Trần Nguyễn Quốc Huy', '391/12 ĐBP Bình Thạnh,HCM', '01672509806', 0, '09-04-2018');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetail`
--

CREATE TABLE `orderdetail` (
  `id` int(10) UNSIGNED NOT NULL,
  `orderid` int(11) NOT NULL,
  `productid` int(11) NOT NULL,
  `quanlity` double(8,2) NOT NULL,
  `price` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orderdetail`
--

INSERT INTO `orderdetail` (`id`, `orderid`, `productid`, `quanlity`, `price`) VALUES
(1, 1, 1, 10.00, 15.00),
(2, 2, 2, 15.00, 15.00),
(3, 2, 1, 1.00, 90.00),
(4, 3, 2, 10.00, 80.00),
(5, 3, 3, 3.00, 70.00),
(6, 4, 1, 1.00, 90.00),
(7, 5, 3, 1.00, 70.00),
(8, 5, 6, 1.00, 30.00),
(9, 6, 1, 2.00, 90.00);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `detailcategoryid` int(11) NOT NULL,
  `productname` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `picture` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `detailcategoryid`, `productname`, `price`, `status`, `type`, `description`, `picture`) VALUES
(1, 1, 'Mít thái ruột đỏ', 90.00, 'Còn hàng', 'Loại 1', 'Thơm, ngon, dày cơm, không sâu,không chất bảo quản.', 'Imik_epeC_mit-thai-ruot-do.jpg'),
(2, 2, 'Mít thái changaii', 80.00, 'Còn hàng', 'Loại 1:', 'Thơm, ngon, dày cơm, không sâu, không chất bảo quản..', 'mit-thai-changai.jpg'),
(3, 3, 'Mít Mật Tiền Giang', 70.00, 'Còn hàng', 'Dạc :', 'Thơm, ngon, dày cơm, không sâu, không chất bảo quản.', 'EtPB_mit-mat.jpg'),
(4, 2, 'Mít tố nữ nguyên trái', 20.00, 'Còn hàng', 'Loại 2', 'Thơm, ngon, dày cơm, không sâu, không chất bảo quản.', 'mit-to-nu-nguyen-trai.png'),
(5, 5, 'SR ri6 Vinh Long', 50.00, 'Còn hàng', 'Loại 1', 'Thơm, ngon, dày cơm, không sâu, không chất bảo quản.', 'sau-rieng-ri6-vinh-long.jpg'),
(6, 5, 'Sầu riêng ri6', 30.00, 'Hết hàng', 'Dạc', 'Thơm, ngon, dày cơm, không sâu, không chất bảo quản.', 'saurieng.jpg'),
(7, 7, 'SR cơm vàng hạt lép', 90.00, 'Còn hàng', 'Loại 1', 'Thơm, ngon, dày cơm, không sâu, không thúi.', 'sr-com-vang-hat-lep.jpg'),
(8, 9, 'Nhãn xuồng Cái Bè', 13.00, 'Còn nhiều', 'Loại 1', 'Thơm, ngon, dày cơm, không sâu, không thúi.', '2191_nhan-xuong.jpg'),
(9, 1, 'Sản phẩm  mới', 70.00, 'Còn hàng', 'Loại 1', 'Sản phẩm mới', 'ssez_saurieng.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phonenumber` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `phonenumber`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'trần nguyễn quốc huy', 'nguyenhuy', '01672509806', 'nguyenhuy@gmail.com', '$2y$10$opoTR5M9Zk1G.QGLOEPDZ.yhGbGHCY6JsJXycY0Fas5m8wCFrrjae', 'zw1dpYQMAW4Ls2h4vQTvBNMpCLQhJWydUclf6whET47qtE2rrxPm1OmL7RXV', '2018-04-06 21:53:39', '2018-04-09 04:04:42'),
(2, 'Quốc Huy', 'quốc', '021301203123', 'quoc@gmail.com', '123', NULL, NULL, NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `detailcategory`
--
ALTER TABLE `detailcategory`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `detailcategory`
--
ALTER TABLE `detailcategory`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT cho bảng `order`
--
ALTER TABLE `order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `orderdetail`
--
ALTER TABLE `orderdetail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
