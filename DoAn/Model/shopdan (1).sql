-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 11, 2023 lúc 05:19 PM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `shopdan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthanghoa`
--

CREATE TABLE `cthanghoa` (
  `idhanghoa` int(11) NOT NULL,
  `idmau` int(11) NOT NULL,
  `dongia` int(11) NOT NULL,
  `soluongton` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthanghoa`
--

INSERT INTO `cthanghoa` (`idhanghoa`, `idmau`, `dongia`, `soluongton`) VALUES
(1, 4, 104000000, 10),
(2, 3, 50500000, 10),
(3, 4, 27500000, 10),
(4, 2, 2800000, 10),
(5, 5, 500000000, 0),
(6, 5, 50500000, 10),
(7, 2, 54800000, 10),
(8, 1, 53500000, 10),
(9, 3, 20300000, 10),
(10, 5, 2000000, 0),
(11, 4, 24500000, 10),
(12, 1, 29800000, 10);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cthoadon`
--

CREATE TABLE `cthoadon` (
  `masohd` int(11) NOT NULL,
  `mahh` int(11) NOT NULL,
  `soluongmua` int(11) NOT NULL,
  `mausac` varchar(20) NOT NULL,
  `thanhtien` int(11) NOT NULL,
  `tinhtrang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cthoadon`
--

INSERT INTO `cthoadon` (`masohd`, `mahh`, `soluongmua`, `mausac`, `thanhtien`, `tinhtrang`) VALUES
(1, 2, 1, 'Trắng', 50500000, 0),
(1, 3, 1, 'Xám', 27500000, 0),
(2, 2, 1, 'Trắng', 50500000, 0),
(2, 3, 1, 'Xám', 27500000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hanghoa`
--

CREATE TABLE `hanghoa` (
  `mahh` int(11) NOT NULL,
  `tenhh` varchar(60) NOT NULL,
  `giamgia` float NOT NULL,
  `hinh` varchar(50) NOT NULL,
  `maloai` int(11) NOT NULL,
  `soluotxem` int(11) NOT NULL,
  `ngaylap` date NOT NULL,
  `mota` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hanghoa`
--

INSERT INTO `hanghoa` (`mahh`, `tenhh`, `giamgia`, `hinh`, `maloai`, `soluotxem`, `ngaylap`, `mota`) VALUES
(1, 'Xe Máy Honda SH160i Thể Thao', 300000, '1.png', 1, 1, '2023-12-06', '\r\nXe máy SH160i Thể Thao 2023 được mọi người yêu thích với lối thiết kế thể thao trung tính, phù hợp với nhiều lứa tuổi khác nhau. Với thiết kế, động cơ và tiện ích đầy đủ và hiện đại xe tay ga SH160i Thể Thao 2023 hứa hẹn sẽ là dòng xe tay ga cao cấp có đủ sức thu hút mọi ánh nhìn và không bao giờ phải làm bạn thất vọng.'),
(2, 'Xe Máy Vario 160 ABS', 0, '2.png', 1, 1, '2023-12-06', 'Honda Vario 160 là một trong những mẫu xe tay ga được ưa chuộng tại thị trường Đông Nam Á, với thiết kế hiện đại, động cơ mạnh mẽ và tiết kiệm nhiên liệu. Xe được trang bị động cơ xăng 4 thì dung tích 157cc, công suất tối đa 11,6 mã lực và mô-men xoắn cực đại 14 Nm, giúp xe có khả năng tăng tốc nhanh chóng và mượt mà trên mọi địa hình. Bên cạnh đó, Honda Vario 160 còn được trang bị hệ thống phanh ABS, giúp người lái dễ dàng điều khiển và an toàn hơn trên đường.'),
(3, 'Xe Máy Honda Honda Beat Street 2022 ISS', 0, '3.png', 1, 1, '2023-12-06', 'Honda Beat Street là một trong những mẫu xe tay ga nhỏ gọn, thể thao và đầy phong cách của Honda. Với thiết kế đặc biệt hơn so với phiên bản Beat thông thường, Honda Beat Street được trang bị cụm đèn pha LED phía trước với thiết kế độc đáo, cùng với màn hình LCD hiển thị đa thông tin và hệ thống phanh đĩa tản nhiệt giúp tăng tính an toàn cho người lái. Xe được trang bị động cơ xăng 4 thì dung tích 108cc, công suất tối đa 8,8 mã lực và mô-men xoắn cực đại 9 Nm, đủ để xe có thể di chuyển linh hoạt'),
(4, 'Xe Máy Honda Honda Beat 2022 ISS', 0, '4.png', 1, 1, '2023-12-06', 'Khối lượng xe 93 kg\r\nLoại động cơ 4 thì, SOHC làm mát bằng không khí, eSP\r\nDài x Rộng x cao 1.856 x 666 x 1.068 mm\r\nChiều dài cơ sở 1.256 mm\r\nĐộ cao yên 740 mm\r\nKhoảng cách gầm xe 146 mm\r\nĐường kính x hành trình piston 50 x 55.1 mm'),
(5, 'Xe Honda Winner X 2024 Thể Thao ABS', 0, '5.png', 2, 1, '2023-12-06', 'Honda Vario 160 là một trong những mẫu xe tay ga được ưa chuộng tại thị trường Đông Nam Á, với thiết kế hiện đại, động cơ mạnh mẽ và tiết kiệm nhiên liệu'),
(6, 'Exciter 155 VVA Cao Cấp Màu Mới 2024', 1000000, '6.png', 2, 1, '2023-12-06', 'Exciter 155 VVA Cao Cấp Màu mới 2024 là dòng sản phẩm mới được ra mắt ngày 15/8 vừa qua'),
(7, 'Exciter 155 ABS Giới Hạn Monster Energy Moto GP Mới Nhất 202', 2000000, '7.png', 2, 1, '2023-12-06', 'Exciter 155 2024 ABS Monster là phiên bản đặc biệt mới ra mắt của Yamaha đang được mong chờ và chào đón nhất trong năm nay. Với việc trang bị thêm phanh ABS phiên bản xe Exciter 155 2024 ABS Monster đã là một bản nâng cấp hoàn hảo khiến mọi đối thủ đều phải dè chừng. '),
(8, 'Exciter 155 ABS Cao Cấp Mới Nhất 2024', 2000000, '8.png', 2, 1, '2023-12-06', '\r\nLoại 4 kỳ, 4 van, SOHC, làm mát bằng chất lỏng\r\nBố trí xi lanh Xy-lanh đơn\r\nDung tích xy lanh (CC) 155.1\r\nĐường kính và hành trình piston 58.0 x 58.7 mm\r\nTỷ số nén 10.5:1\r\nCông suất tối đa 13.2kW/ 9,500 vòng/phút\r\nMô men xoắn cực đại 14.4 N・m (1.5 kgf・m) / 8,000 vòng/phút'),
(9, 'Xe Honda Wave Alpha Phiên Bản Cổ Điển Mới Nhất 2024', 0, '9.png', 3, 1, '2023-12-06', '\r\nHonda Wave Alpha Cổ Điển 2024 được Honda vừa cho ra mắt trong năm 2024 sau phiên bản Honda Wave Alpha tem mới. Để cạnh tranh với 2 phiên bản 2024, Honda Wave Alpha Cổ Điển 2024 mang lại làn gió màu sắc mới với 2 tông màu đầy trẻ trung và năng động. Cùng khám phá ngay những điểm nổi bật của Honda Wave Alpha Cổ Điển 2024 ngay sau bài viết này. '),
(10, 'Honda Wave RSX 2024 Tiêu Chuẩn - Phanh Cơ, Nan Hoa', 0, '10.png', 3, 1, '2023-12-06', '\r\nMới đây Honda đã cho ra mắt dòng xe Wave RSX 2024 với ba phiên bản tiêu chuẩn, đặc biệt và thể thao. Trong đó phiên bản tiêu chuẩn được trang bị phanh cơ vành nan hoa với màu đỏ đen cá tính chắc chắn sẽ là một trong những mẫu xe số đáng để tham khảo mua nhất trong thời gian tới. Hãy cùng chúng tôi tìm hiểu chi tiết xe Wave RSX 2024 tiêu chuẩn này nhé! '),
(11, 'Xe Máy Yamaha Sirius Fi mâm đúc ( New)', 0, '11.png', 3, 1, '2023-12-06', 'Yamaha Sirius FI Mâm Đúc 2023 là phiên bản hoàn toàn mới được Yamaha cho ra mắt vào năm nay với những đổi mới đặc sắc trong thiết kế và màu sắc hoàn toàn mới. Cùng Nam Tiến điểm danh ngay những độc đáo và nổi bật mới của Yamaha Sirius FI Mâm Đúc thông qua bài viết ngay sau đây.'),
(12, 'Xe máy Yamaha Jupiter FI 2022', 0, '12.png', 3, 1, '2023-12-06', 'Yamaha Sirius FI Mâm Đúc 2023 là phiên bản hoàn toàn mới được Yamaha cho ra mắt vào năm nay với những đổi mới đặc sắc trong thiết kế và màu sắc hoàn toàn mới. Cùng Nam Tiến điểm danh ngay những độc đáo và nổi bật mới của Yamaha Sirius FI Mâm Đúc thông qua bài viết ngay sau đây.');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `masohd` int(11) NOT NULL,
  `makh` int(11) NOT NULL,
  `ngaydat` date NOT NULL,
  `tongtien` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`masohd`, `makh`, `ngaydat`, `tongtien`) VALUES
(1, 1, '2023-12-09', 50500000),
(2, 1, '2023-12-09', 28900000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loai`
--

CREATE TABLE `loai` (
  `maloai` int(11) NOT NULL,
  `tenloai` varchar(50) NOT NULL,
  `idmenu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `loai`
--

INSERT INTO `loai` (`maloai`, `tenloai`, `idmenu`) VALUES
(1, 'Xe tay ga', 1),
(2, 'Xe tay côn', 2),
(3, 'Xe số', 3);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `mausac`
--

CREATE TABLE `mausac` (
  `idmau` int(11) NOT NULL,
  `mausac` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Đang đổ dữ liệu cho bảng `mausac`
--

INSERT INTO `mausac` (`idmau`, `mausac`) VALUES
(1, 'Đen'),
(2, 'Xanh'),
(3, 'Trắng'),
(4, 'Xám'),
(5, 'Đỏ');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cthanghoa`
--
ALTER TABLE `cthanghoa`
  ADD PRIMARY KEY (`idhanghoa`,`idmau`);

--
-- Chỉ mục cho bảng `cthoadon`
--
ALTER TABLE `cthoadon`
  ADD PRIMARY KEY (`masohd`,`mahh`);

--
-- Chỉ mục cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  ADD PRIMARY KEY (`mahh`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`masohd`);

--
-- Chỉ mục cho bảng `loai`
--
ALTER TABLE `loai`
  ADD PRIMARY KEY (`maloai`);

--
-- Chỉ mục cho bảng `mausac`
--
ALTER TABLE `mausac`
  ADD PRIMARY KEY (`idmau`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `hanghoa`
--
ALTER TABLE `hanghoa`
  MODIFY `mahh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `masohd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `loai`
--
ALTER TABLE `loai`
  MODIFY `maloai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `mausac`
--
ALTER TABLE `mausac`
  MODIFY `idmau` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
