-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 04, 2024 at 10:20 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpecom`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cart`
--

CREATE TABLE `tbl_cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `prod_id` int(11) NOT NULL,
  `prod_qty` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_cart`
--

INSERT INTO `tbl_cart` (`id`, `user_id`, `prod_id`, `prod_qty`, `created_at`) VALUES
(32, 1, 15, 1, '2024-01-04 08:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(11) NOT NULL,
  `name` varchar(191) NOT NULL,
  `slug` varchar(191) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `popular` tinyint(4) NOT NULL DEFAULT 0,
  `image` varchar(191) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keywords` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `name`, `slug`, `description`, `status`, `popular`, `image`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`) VALUES
(11, 'Tp-Link', 'Tp-Link', 'werwe', 0, 1, '1701778584.jfif', 'sdfs', 'sfsdf', 'sdfsdf', '2023-11-25 16:27:45'),
(16, 'Panasonic', 'Panasonic', 'Công nghệ Nhật Bản hiện đại\r\nNgăn đông đông đá cực nhanh\r\nTiết kiệm hơn 20% điện năng\r\nLuồng không khí lạnh đa chiều\r\nCông nghệ làm lạnh đa chiều\r\nVỏ tủ sơn tĩnh điện bền- dễ vệ sinh', 0, 1, '1701777113.webp', 'TỦ LẠNH KHÔNG ĐÓNG TUYẾT', 'Thiết kế sang trọng và hiện đại\r\nVỏ ngoài màu xám, chất liệu thép sơn tỉnh điện chất lượng cao, dễ vệ sinh. Dung tích 150 lít đáp ứng nhu cầu sử dụng cho gia đình có từ 3 – 5 người.', 'NAD-1580WX', '2023-12-05 11:51:53'),
(17, 'LG', 'LG', 'LG - Thương hiệu điện tử đến từ Hàn Quốc', 0, 1, '1701778785.jpg', 'Life’s Good', '“Life’s Good\" - Thông điệp được LG mang đến mọi quốc gia, đảm bảo rằng các thiết bị của LG sẽ mang đến cho người tiêu dùng những trải nghiệm tiên tiến nhất, đảm bảo cho cuộc sống tốt đẹp hơn.', 'LG_LIFE GOOD', '2023-12-05 12:19:45'),
(18, 'Laptop', 'Laptop', 'Khác với laptop mới, laptop like new là những máy đã qua sử dụng, nhưng thời hạn sử dụng ít chỉ vài tuần hoặc vài tháng. Tình trạng máy vẫn còn như mới, vỏ ngoài có thể bị trầy xước nhẹ nhưng không đáng kể.', 0, 1, '1701779989.jpg', 'laptop', 'Laptop like new phải là những máy có phần cứng vẫn đảm bảo còn nguyên vẹn, chưa qua sửa chữa hay thay thế bất kỳ loại linh kiện nào. Do đó, để phân biệt các dòng laptop này, chúng ta có thể tìm hiểu thông qua xuất xứ của chúng.', 'laptop', '2023-12-05 12:39:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL,
  `tracking_no` varchar(199) NOT NULL,
  `user_id` int(191) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(191) NOT NULL,
  `phone` varchar(191) NOT NULL,
  `address` mediumtext NOT NULL,
  `pincode` int(191) NOT NULL,
  `total_price` int(191) NOT NULL,
  `payment_mode` varchar(191) NOT NULL,
  `payment_id` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `comments` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `tracking_no`, `user_id`, `name`, `email`, `phone`, `address`, `pincode`, `total_price`, `payment_mode`, `payment_id`, `status`, `comments`, `created_at`) VALUES
(1, 'sharmacoder842085920251', 1, 'Trần Nhơn Nhật', 'tnhat2244@gmail.com', '0985920251', 'Phú Vang', 75, 29581, 'COD', NULL, 1, NULL, '2023-12-24 10:20:25'),
(2, 'sharmacoder943828349234', 1, 'Le huu tuyen', 'tuyenle@gmail.com', '0928349234', 'Diem tu - phu vang - thua thien hue', 7532, 26031, 'COD', NULL, 0, NULL, '2023-12-24 10:30:13'),
(3, 'sharmacoder160828489324', 1, 'Le van minh', 'minhle2022@gmail.com', '0928489324', 'Truong Luu', 433, 1380, 'COD', NULL, 0, NULL, '2023-12-26 08:52:32'),
(4, 'sharmacoder871323482341', 1, 'Mai Tam', 'tammai2023@gmail.com', '0923482341', 'Duc Thai', 423, 23250, 'COD', NULL, 0, NULL, '2023-12-26 08:57:21'),
(5, 'sharmacoder839023842345', 1, 'Mai Tam', 'maitam2023@gmail.com', '0923842345', 'Duc Thai - Hue', 433, 23250, 'COD', NULL, 0, NULL, '2023-12-26 09:12:41'),
(6, 'phpEcommer307282374324', 4, 'Le Huu Tuyen', 'tuyenle2023@gmail.com', '0982374324', 'Diem tu - thua thien hue', 2342, 378, 'COD', NULL, 0, NULL, '2023-12-27 09:36:04'),
(7, '408620932487', 5, 'Mai Ngoc Tam', 'maitam2023@gmail.com', '0920932487', 'Duc Thai - thua thien hue', 243, 6399, 'COD', NULL, 0, NULL, '2023-12-27 09:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order_item`
--

CREATE TABLE `tbl_order_item` (
  `id` int(11) NOT NULL,
  `order_id` int(191) NOT NULL,
  `prod_id` int(191) NOT NULL,
  `qty` int(191) NOT NULL,
  `price` int(191) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order_item`
--

INSERT INTO `tbl_order_item` (`id`, `order_id`, `prod_id`, `qty`, `price`, `created_at`) VALUES
(1, 1, 15, 1, 6399, '2023-12-24 10:20:25'),
(2, 1, 11, 1, 7750, '2023-12-24 10:20:25'),
(3, 1, 7, 1, 15432, '2023-12-24 10:20:25'),
(4, 2, 9, 1, 10599, '2023-12-24 10:30:13'),
(5, 2, 7, 1, 15432, '2023-12-24 10:30:13'),
(6, 3, 10, 6, 230, '2023-12-26 08:52:32'),
(7, 4, 11, 3, 7750, '2023-12-26 08:57:21'),
(8, 5, 11, 3, 7750, '2023-12-26 09:12:41'),
(9, 6, 13, 2, 189, '2023-12-27 09:36:04'),
(10, 7, 15, 1, 6399, '2023-12-27 09:40:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` text NOT NULL,
  `slug` varchar(191) NOT NULL,
  `small_description` mediumtext NOT NULL,
  `description` mediumtext NOT NULL,
  `original_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `image` varchar(191) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `trending` tinyint(4) NOT NULL,
  `meta_title` varchar(191) NOT NULL,
  `meta_keywords` mediumtext NOT NULL,
  `meta_description` mediumtext NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`id`, `category_id`, `name`, `slug`, `small_description`, `description`, `original_price`, `selling_price`, `image`, `qty`, `status`, `trending`, `meta_title`, `meta_keywords`, `meta_description`, `created_at`) VALUES
(2, 7, 'Máy Giặt', 'may-giat', 'Khám phá không gian lưu trữ linh hoạt và thông minh, giúp bạn tổ chức thực phẩm một cách khoa học. Công nghệ làm lạnh tiên tiến giữ cho thực phẩm của bạn luôn giữ được độ tươi ngon lâu dài. Bạn sẽ yên tâm với tính năng làm đá tự động và hệ thống làm mát đồng đều trên mọi khu vực.', 'Hãy tận hưởng không gian lưu trữ thông minh và tiện ích tối đa với chiếc tủ lạnh đẳng cấp của chúng tôi, mang đến cho bạn trải nghiệm nấu ăn và duy trì thực phẩm một cách dễ dàng và thoải mái.', 53400, 43350, '1700552243.jpg', 1, 0, 1, 'Máy', 'cao cap', 'chat luong cao', '2023-11-21 07:37:23'),
(7, 11, 'Camera', 'Tp-Link-camera', 'Camera IP 360 Độ 1080P IMOU Ranger 2C TA22CP với kiểu dáng nhỏ gọn, chân đế bằng phẳng giúp dễ dàng lắp đặt, camera hỗ trợ ghi lại bao quát không gian xung quanh với độ sắc nét cao, hứa hẹn mang đến người dùng những trải nghiệm tốt nhất.', ' Thiết kế với cực kỳ gọn gàng và xinh xắn, gam màu tinh tế, dễ dàng phối hợp với mọi không gian trong nhà bạn.\r\n\r\n• Kích thước camera gọn nhỏ, vừa tay cầm giúp bạn dễ dàng đặt ở trên mặt bàn, kệ tủ,...\r\n\r\n• Camera Imou với độ phân giải lên đến 1920 x 1080 cung cấp cho bạn hình ảnh chất lượng cao và sống động, lưu trữ lâu dài trong bộ nhớ MicroSD 256 GB từ 21 - 30 ngày.\r\n\r\n• Góc camera thiết kế tối ưu có thể xoay ngang tới 355 độ và quét dọc từ - 5 độ đến 80 độ, đảm bảo mọi ngóc ngách trong phòng đều được ghi lại.', 23000, 15432, '1701778253.jpg', 1, 0, 1, 'Camera', 'Camera IP 580', 'Quản lý camera dễ dàng với ứng dụng Imou Life trên điện thoại thông minh, nhận thông báo mọi khi có chuyển động và báo động nếu có âm thanh bất thường.', '2023-11-25 16:31:33'),
(9, 16, 'Tủ Lạnh', 'tu-lanh', 'Công nghệ làm lạnh đa chiều\r\nCông nghệ này cho phép hơi mát được thoát ra từ nhiều vị trí khác nhau, phân phối đều khắp các ngăn, duy trì nhiệt độ luôn ở mức ổn định ở mọi vị trí trong tủ. Nhờ đó, thực phẩm sẽ luôn được bảo quản tươi ngon dù bạn đặt ở bất cứ ngóc ngách nào.', 'Công nghệ kháng khuẩn và khử mùi FreshEver Zone\r\nTủ lạnh Darling NAD-1580WX tăng cường kháng khuẩn và khử mùi bằng công nghệ FreshEver Zone giúp thực phẩm tươi ngon dài ngày và không gây mùi khó chịu. Đảm bảo an toàn sức khỏe cho người dùng.', 13320, 10599, '1701777513.webp', 1, 0, 1, 'Tủ', 'Tủ Lạnh', 'Làm lạnh bằng lốc máy Panasonic vận hành êm ái, tuổi thọ cao và tiết kiệm điện năng.', '2023-12-05 11:58:33'),
(10, 16, 'Ấm Siêu Tốc', 'am-sieu-toc', 'Luôn hướng đến sự tiện dụng, nhỏ gọn, dễ sử dụng, Ấm siêu tốc inox 1.8L BARETTI BRD180 là sản phẩm đã quá quen thuộc với các căn bếp của gia đình Việt.', 'Ấm có dung tích lớn 1.8 lít cùng công suất hoạt động cao (1500W) giúp việc đun nước nhanh chóng hơn, tiết kiệm thời gian và điện năng tối đa. Ấm đáp ứng mọi nhu cầu về nước nóng cho cả gia đình, nước nóng pha trà, cà phê, pha sữa, úp mì…luôn sẵn sàng chỉ sau 3-5 phút chờ đợi.', 400, 230, '1701778025.jpg', 1, 0, 1, 'Ấm', 'BARETTI BRD180', 'Thân ấm bằng thép không gỉ bền bỉ, an toàn\r\nĐèn báo hiệu bật tắt tiện dụng\r\nTự động tắt khi nước sôi, cạn nước hoặc quá nhiệt\r\nĐế tiếp điện xoay 360 độ tiện lợi', '2023-12-05 12:07:05'),
(11, 17, 'TV', 'LG-tv', 'Smart Tivi LG 4K 55 inch 55UQ7550PSF cung cấp màn hình trải nghiệm tuyệt đẹp với hình ảnh độ nét 4K, khung hình sống động nhờ bộ xử lý α5 Gen5 AI 4K, cảm nhận trọn vẹn tính nghệ thuật của bộ phim với chế độ FilmMaker Mode, âm thanh AI Sound chân thực, hỗ trợ LG Voice Search tìm kiếm bằng giọng nói tiếng Việt dễ dàng.', ' Smart Tivi LG 4K 55 inch 55UQ7550PSF hoàn thiện thiết kế nội thất của mọi không gian với vẻ ngoài thanh lịch, đường viền tinh giản giúp làm nổi bật nội dung đang phát trên màn hình, cho tầm nhìn của bạn luôn tập trung, không bị xao nhãng.\r\n\r\n- Chân đế chắc chắn với lớp vỏ nhựa, lõi bằng kim loại, thiết kế kiểu chữ V úp ngược giúp bố trí tivi LG thăng bằng trên kệ, hạn chế nghiêng, đổ.\r\n\r\n- Tạo điểm nhấn hoàn hảo cho căn phòng khách, phòng ngủ, phòng làm việc có diện tích vừa và lớn với màn hình 55 inch.\r\n\r\nSmart Tivi LG 4K 55 inch 55UQ7550PSF - Tổng quan thiết kế\r\n\r\n*Hình ảnh chỉ mang tính chất minh họa sản phẩm\r\n\r\nCông nghệ hình ảnh\r\n- Độ phân giải 4K cho hình ảnh sắc nét, độ sâu và các cạnh bên của màn hình trở nên mượt đẹp hơn.\r\n\r\n- Bộ xử lý α5 Gen5 AI 4K nâng cao chất lượng khung hình, giảm nhòe để hình ảnh được tái hiện rõ ràng, sinh động. \r\n\r\n- Công nghệ 4K AI Upscaling cải thiện các nội dung ngay từ nguồn vào, nâng cấp chúng lên chất lượng gần chuẩn 4K để bạn được chiêm ngưỡng hình ảnh rõ nét, màu sắc chân thực.\r\n\r\n- Công nghệ HDR10 Pro tự động tinh chỉnh độ sáng theo từng phân cảnh cho màu sắc, độ chi tiết cao, hình ảnh rực rỡ, bắt mắt.\r\n\r\n- Với chế độ FilmMaker Mode, bạn có thể tận hưởng các bộ phim điện ảnh tại nhà cho cảm giác như ở rạp chiếu phim đích thực. Chế độ tắt làm mịn chuyển động và các điều chỉnh khung hình khác để giữ lại trọn vẹn ý đồ mà đạo diện, nhà sản xuất muốn áp dụng lên tác phẩm của mình.\r\n\r\n- Chế độ game HGiG xác định hiệu suất tivi, chất lượng hình ảnh, tự động điều chỉnh đồ họa để bạn được trải nghiệm chơi game chuẩn HDR trung thực.\r\n\r\nMời bạn xem thêm: Những độ phân giải màn hình phổ biến hiện nay trên tivi\r\n\r\nSmart Tivi LG 4K 55 inch 55UQ7550PSF - Công nghệ hình ảnh\r\n\r\n*Hình ảnh chỉ mang tính chất minh họa sản phẩm\r\n\r\nCông nghệ âm thanh\r\n- Công nghệ Bluetooth Surround Ready có thể kết nối hai loa Bluetooth bất kỳ để tạo nên hiệu ứng âm thanh vòm, đem lại cho người dùng trải nghiệm âm thanh đầy lôi cuốn.\r\n\r\n- Công nghệ AI Sound bằng cách xác định giọng nói, các hiệu ứng, tần số tối ưu chất âm theo từng thể loại nội dung để mang đến trải nghiệm trung thực hơn.\r\n\r\n- Công nghệ AI Acoustic Tuning cho tivi tự động phân tích các thông tin thu thập được từ Magic Remote và tùy chỉnh âm thanh bạn lựa chọn để tối ưu chất lượng âm thanh phù hợp với không gian của bạn, giúp người nghe luôn được tận hưởng âm thanh hay, sống động mọi lúc.\r\n\r\n- LG Sound Sync đồng bộ loa tivi với dàn âm thanh, loa soundbar qua kết nối Bluetooth, giúp tái tạo âm thanh chính xác, cuốn hút hơn.\r\n\r\nSmart Tivi LG 4K 55 inch 55UQ7550PSF - Công nghệ âm thanh\r\n\r\n*Hình ảnh chỉ mang tính chất minh họa sản phẩm\r\n\r\nHệ điều hành\r\n- Hệ điều hành webOS 22 hiện đại, thiết kế các ứng dụng hiển thị dạng ô bo góc cho cảm giác sang trọng, thu hút hơn. \r\n\r\n- Giải trí phong phú với thư viện ứng dụng đa dạng: Apple TV, Clip TV, FPT Play, Galaxy Play (Fim+), MyTV, Netflix, Nhaccuatui, POPS Kids, Spotify, YouTube,... \r\n\r\nXem thêm: Cách xem phim bằng trình duyệt web trên tivi \r\n\r\nSmart Tivi LG 4K 55 inch 55UQ7550PSF - Hệ điều hành\r\n\r\nTiện ích\r\n- Smart tivi LG được thiết lập LG Voice Recognition, tính năng nhận diện giọng nói tự nhiên, LG Voice Search tìm kiếm bằng giọng nói hỗ trợ tiếng Việt cho bạn điều khiển, truy cập vào các ứng dụng bằng giọng nói nhanh chóng. \r\n\r\n- Magic Remote có thiết kế thời trang, dễ cầm nắm và điều khiển. Đặc biệt, nó tích hợp micro sẵn cho bạn ra lệnh thoại với sự trợ giúp của Google Assistant (Chưa có tiếng Việt) hoặc Alexa (Chưa có tiếng Việt) chính xác hơn. \r\n\r\n- Trình chiếu nội dung từ điện thoại lên tivi với tính năng AirPlay 2, Screen Share cho bạn thoải mái chia sẻ và cùng cả nhà trải nghiệm các video, hình ảnh yêu thích của mình. \r\n\r\n- AI ThinQ cho phép bạn quản lý hoạt động các thiết bị thông minh trong nhà từ Smart tivi, máy lạnh, tủ lạnh đến đèn thông minh dễ dàng bằng giọng nói.\r\n\r\nXem thêm: 9 cách kết nối điện thoại Android với tivi LG đơn giản, hiệu quả nhất\r\n\r\nSmart Tivi LG 4K 55 inch 55UQ7550PSF - Tiện ích\r\n\r\n*Hình ảnh chỉ mang tính chất minh họa sản phẩm\r\n\r\nSmart Tivi LG 4K 55 inch 55UQ7550PSF là lựa chọn tuyệt vời cho ngôi nhà Việt với màn hình lớn 55 inch, hình ảnh hiển thị rõ nét với bộ xử lý α5 Gen5 AI 4K, xem mọi nội dung với chất lượng gần chuẩn 4K nhờ công nghệ 4K AI Upscaling, cảm nhận vẻ đẹp nguyên bản của thước phim điện ảnh cùng chế độ FilmMaker Mode, âm thanh trung thực, phù hợp với từng nội dung với AI Sound, điều khiển bằng giọng nói, quản lý thiết bị tiện lợi cùng Magic Remote và AI ThinQ.\r\n\r\nXem thêm: 7 cách sử dụng tivi đơn giản giúp tăng tuổi thọ cho chiếc tivi nhà bạn\r\n\r\n', 8000, 7750, '1701778941.jpg', 3, 0, 1, 'TV', 'LG_TV', 'TV_LG', '2023-12-05 12:22:21'),
(12, 16, 'Máy Sấy Tay', 'may-say-tay', 'Máy sấy tay Gorlde B-920 được sản xuất trên dây chuyền công nghệ hiện đại, với chức năng tự động cảm ứng thổi khí làm khô tay người. Máy sấy tay ngày càng được ứng dụng rộng rãi trong các nhà vệ sinh công cộng, khu vui chơi giải trí, khu mua sắm, siêu thị, điện máy, việc làm khô đôi tay sau khi đi vệ sinh trở nên dễ dàng hơn bao giờ hết.', 'Máy sấy tay Gorlde B-920 có vỏ ngoài được làm từ nhựa ABS cao cấp có độ bền cao, màu trắng hài hòa. Máy sấy tay Gorlde B-920 sử dụng công nghệ cảm ứng thông minh, sau khi đi vệ sinh và rửa tay xong đặt bàn tay đến vị trí thổi khí của máy sấy ở khoảng cách từ 5 - 15 cm máy sẽ tự động cảm ứng và thổi khí nóng làm khô tay một cách nhanh chóng trong khoảng từ 5-15 giây.', 999, 989, '1701779346.jpg', 1, 0, 1, 'Máy', 'Máy _sấy', 'Máy sấy tay Gorlde B-920 trang bị động cơ có công suât 2000W, tốc độ thổi khí 15 m/s hoạt động hiệu quả và ổn định giải quyết vấn đề tay ướt sau khi đi vệ sinh của con người một cách nhanh chóng , cùng với đó là khả năng chắn tia phun nước IPX1. Máy sấy tay Gorlde B-920 được sản xuất và lắp ráp trên dây chuyền công nghệ hiện đại, đem lại chất lượng sản phẩm tốt, bền bỉ, khả năng hoạt động ổn định trong thời gian dài làm lài lòng người tiêu dùng cũng như người sử dụng.', '2023-12-05 12:29:06'),
(13, 16, 'Đèn Chiếu Sáng', 'den-chieu-sang', 'Đèn pha led Panasonic 10W thế hệ mới 2G, tiêu chuẩn kín nước IP65 dùng chiếu sáng ngoài trời', '- Dòng đèn pha led công suất lớn 10W thế hệ mới kiểu siêu mỏng ( ultra thin design ) với chip led đa nhân chất lượng cao cho ánh sáng mạnh không nhấp nháy, thân thiện môi trường ( không chứa các tia sáng gây hại UV và chống bụi, nước mưa , côn trùng xâm nhập... ) tiêu chuẩn quốc tế IP65.', 214, 189, '1701779535.webp', -1, 0, 1, 'Đèn', 'Den_chieu', '- Đóng gói : quy cách thùng / 30 cái\r\n\r\n- Đèn pha led Panasonic có thân vỏ bằng hợp kim nhôm ADC12 đúc áp lực cùng lớp sơn tĩnh điện và ron chịu nhiệt cao, kính cường lực bảo vệ cho đèn pha led hoạt động ổn định trong môi trường nắng mưa khắc nghiệt ngoài trời.', '2023-12-05 12:32:15'),
(14, 16, 'Máy Sưởi', 'may-suoi', 'MÁY SƯỞI GỐM BÙ ẨM PANASONIC DS-FKX1204\r\n', 'Máy sưởi Panasonic DS-FKX1204 với thiết bị sưởi ấm kết hợp với tạo độ ẩm tuyệt vời giúp bạn và gia đình có 1 mùa đông vừa ấm áp lại không bị khô da như nhiều sản phẩm máy sưởi khác trên thị trường. Công nghệ nano của máy sưởi dầu này rất độc đáo giúp tạo nhiệt tuyệt vời, khử khuẩn, khử nấm mốc cùng các chất gây dị ứng.', 4700, 3600, '1701779717.png', 1, 0, 1, 'Máy', 'máy-sưởi', 'Công nghệ cảm ứng giúp tiết kiệm điện nhờ cơ chế bật sưởi khi có người và tự tắt khi không có người.', '2023-12-05 12:35:17'),
(15, 18, 'Dell', 'dell-laptop', 'DELL Latitude 7480/ Core i7- 6600U/ RAM 8Gb/ SSD 256Gb/ Màn 14.0″ FullHD IPS', 'Dell Latitude 7480 sử dụng đồ họa tích hợp Intel HD Graphics 520, cho phép người dùng thực hiện các thao tác đồ họa trung bình một cách mượt mà như Photoshop, AI, Corel hay chỉnh sửa video…', 6500, 6399, '1701780210.webp', 0, 0, 1, 'Dell', 'dell_laptop', 'Dell Latitude 7480 là chiếc laptop mới nhất trong series laptop doanh nhân cao cấp\r\nNhững nâng cấp đáng chú ý lần này bao gồm thiết kế thay đổi, trọng lượng nhẹ hơn, thời lượng pin được cải thiện, bàn phím chất lượng chắc chắn không làm người dùng thất vọng.\r\n ', '2023-12-05 12:43:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_as` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `email`, `phone`, `password`, `role_as`, `created_at`) VALUES
(1, 'Trần Nhơn Nhật', 'tnhat2244@gmail.com', 985920251, '406e63d6b652198ba88ee6bd0fc8c4d8', 0, '2023-10-03 09:38:45'),
(3, 'admin', 'admin123@gmail.com', 985920256, '21232f297a57a5a743894a0e4a801fc3', 1, '2023-10-09 16:51:29'),
(4, 'Tuyen', 'tuyenle2023@gmail.com', 982374234, 'c52b02a5f9698d14c1e7f80059daf0b7', 0, '2023-12-27 09:35:02'),
(5, 'Mai Tam', 'tammai2023@gmail.com', 924323471, 'a9128f40b50365a97b8eb93fe29a7af4', 0, '2023-12-27 09:39:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cart`
--
ALTER TABLE `tbl_cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_order_item`
--
ALTER TABLE `tbl_order_item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
