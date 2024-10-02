-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 02, 2024 lúc 01:30 PM
-- Phiên bản máy phục vụ: 8.0.30
-- Phiên bản PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `duan1_2024`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `banner`
--

CREATE TABLE `banner` (
  `id` int NOT NULL,
  `image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ngaydang` date DEFAULT NULL,
  `idsanpham` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `banner`
--

INSERT INTO `banner` (`id`, `image`, `ngaydang`, `idsanpham`) VALUES
(1, 'banner3.jpg', '2024-09-25', 20),
(2, 'banner5.png', '2024-09-25', 19),
(3, 'banner2.png', '2024-09-25', 18),
(4, 'banner4.png', '2024-09-25', 17);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill`
--

CREATE TABLE `bill` (
  `id` int NOT NULL,
  `idtaikhoan` int NOT NULL,
  `hovatennhan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ngaydathang` date NOT NULL,
  `sodienthoainhan` int NOT NULL,
  `diachinhan` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pttt` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0. Thanh toán trực tiếp\r\n1.Thanh toán chuyển khoản',
  `trangthai` tinyint(1) NOT NULL DEFAULT '0',
  `thanhtoan` tinyint(1) DEFAULT '0' COMMENT '0.chưa thanh toán\r\n1. đã thanh toán'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill`
--

INSERT INTO `bill` (`id`, `idtaikhoan`, `hovatennhan`, `ngaydathang`, `sodienthoainhan`, `diachinhan`, `pttt`, `trangthai`, `thanhtoan`) VALUES
(141, 30, '', '2024-10-02', 987765432, 'Đông Xuân -Quốc Oai -Hà Nội', 0, 1, 0),
(142, 30, 'Lê Văn Tuấn', '2024-10-02', 987765432, 'Đông Xuân -Quốc Oai -Hà Nội', 0, 3, 0),
(143, 30, 'levantuan', '2024-10-02', 987765432, 'Đông Xuân -Quốc Oai -Hà Nội', 0, 1, 0),
(144, 30, 'levantuan', '2024-10-02', 987765432, 'Phú Hà', 0, 2, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_chitiet`
--

CREATE TABLE `bill_chitiet` (
  `id` int NOT NULL,
  `idsanpham` int NOT NULL,
  `soluong` int NOT NULL,
  `dongia` int NOT NULL,
  `thanhtien` int NOT NULL,
  `idbill` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `bill_chitiet`
--

INSERT INTO `bill_chitiet` (`id`, `idsanpham`, `soluong`, `dongia`, `thanhtien`, `idbill`) VALUES
(19, 18, 3, 123, 369, 141),
(20, 19, 3, 123, 369, 142),
(21, 18, 2, 123, 246, 143),
(22, 17, 2, 12120000, 24240000, 144),
(23, 19, 3, 123, 369, 144);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `id` int NOT NULL,
  `idtaikhoan` int NOT NULL,
  `idsanpham` int NOT NULL,
  `noidung` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `ngaybinhluan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`id`, `idtaikhoan`, `idsanpham`, `noidung`, `ngaybinhluan`) VALUES
(70, 20, 18, 'hàng ngon', '2024-09-26'),
(71, 24, 22, 'hàng xịn', '2024-09-28'),
(72, 29, 18, 'hàng xịn', '2024-10-01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

CREATE TABLE `danhmuc` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `is_delete` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`id`, `name`, `img`, `is_delete`) VALUES
(4, 'Iphone', '2f5a8c55d6f34094fe44b7d9125ee074.jpg', 0),
(5, 'Vivo', '', 0),
(6, 'SamSung', 'samsung-logo-on-transparent-background-free-vector.jpg', 0),
(7, 'Opo', 'new-oppo-logo_600x173.png', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id` int NOT NULL,
  `idtaikhoan` int NOT NULL,
  `idsanpham` int NOT NULL,
  `soluong` int NOT NULL,
  `thanhtien` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id` int NOT NULL,
  `tensp` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `giasp` int NOT NULL DEFAULT '0',
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `soluong` int NOT NULL,
  `trangthai` tinyint NOT NULL DEFAULT '0' COMMENT '0. Còn hàng\r\n1. Hết hàng',
  `mota` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `luotxem` int NOT NULL DEFAULT '0',
  `iddm` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id`, `tensp`, `giasp`, `img`, `soluong`, `trangthai`, `mota`, `luotxem`, `iddm`) VALUES
(17, 'vivo Y17S', 12120000, 'vivo.jpg', 9, 0, 'xịn', 12, 5),
(18, 'iPhone 14 Pro 128GB | Chính hãng VN/A', 123, 'hong.png', 7, 0, 'ĐẶC ĐIỂM NỔI BẬT\r\nMàn hình Dynamic Island - Sự biến mất của màn hình tai thỏ thay thế bằng thiết kế viên thuốc, OLED 6,7 inch, hỗ trợ always-on display\r\nCấu hình iPhone 14 Pro Max mạnh mẽ, hiệu năng cực khủng từ chipset A16 Bionic\r\nLàm chủ công nghệ nhiếp ảnh - Camera sau 48MP, cảm biến TOF sống động\r\nPin liền lithium-ion kết hợp cùng công nghệ sạc nhanh cải tiến', 0, 4),
(19, 'Samsung Galaxy S23 Ultra 256GB', 123, '4.webp', -7, 0, 'ĐẶC ĐIỂM NỔI BẬT\r\nThần thái nổi bật, cân mọi phong cách- Lấy cảm hứng từ thiên nhiên với màu sắc thời thượng, xu hướng\r\nThiết kế thu hút ánh nhìn - Gập không kẽ hỡ, dẫn đầu công nghệ bản lề Flex\r\nTuyệt tác selfie thoả sức sáng tạo - Camera sau hỗ trợ AI xử lí cực sắc nét ngay cả trên màn hình ngoài\r\nBền bỉ bất chấp mọi tình huống - Đạt chuẩn kháng bụi và nước IP68 cùng chất liệu nhôm Armor Aluminum giúp hạn chế cong và xước', 0, 6),
(20, 'OPPO Reno10 F 5G 8GB 256GB', 1999, '2.webp', 12, 0, 'ĐẶC ĐIỂM NỔI BẬT\r\nChuyên gia chân dung thế hệ thứ 10 - Camera chân dung 32MP siêu nét, chụp xa từ 2X-5X không lo biến dạng khung hình\r\nThiết kế nổi bật, dẫn đầu xu hướng - Cạnh viền cong 3D, các phiên bản màu sắc phù hợp đa cá tính, thu hút mọi ánh nhìn\r\nĐa nhiệm mạnh mẽ hơn ai hết - RAM mở rộng đến 16GB, ROM 256GB mang đến trải nghiệm đa tác vụ thoải mái\r\nPin bất tận, sạc siêu tốc - pin 5000mAh và sạc nhanh 67W cùng chế độ tiết kiệm pin siêu tiện ích', 1, 7),
(22, 'OPPO Find N3 Flip 12GB 256GB', 22990, '11.webp', 9, 0, 'ĐẶC ĐIỂM NỔI BẬT\r\nThiết kế gập linh hoạt, đường cong 3D, đường cắt kim cương - biểu tượng của sự phong cách giúp bạn luôn toả sáng\r\nĐiện thoại gập sở hữu 3 camera sắc nét - Chụp hình đơn giản hơn với Chế độ Flexform\r\nMàn hình phụ vạn năng - dễ dàng thao tác các tác vụ ngay trên màn hình phụ và tuỳ biến theo sở thích\r\nMàn hình sống động đáng kinh ngạc - Kích thước 6.8i nches, hỗ trợ 120Hz, HDR10+', 0, 7);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tai_khoan`
--

CREATE TABLE `tai_khoan` (
  `id` int NOT NULL,
  `tendangnhap` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `matkhau` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sodienthoai` int NOT NULL,
  `diachi` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `role` tinyint NOT NULL DEFAULT '0' COMMENT '0.Người dùng\r\n1. Admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tai_khoan`
--

INSERT INTO `tai_khoan` (`id`, `tendangnhap`, `matkhau`, `email`, `sodienthoai`, `diachi`, `role`) VALUES
(19, 'levanminh', 'minh2004A', 'minhlvph34563@gmail.com', 9736594, 'Hà nội', 1),
(20, 'levantuan', 'tuan123', 'le9675418@gmail.com', 336345999, 'hà nội', 0),
(21, 'Levanminh', 'minh25062004', 'le9675418@gmail.com', 336345098, 'Hà Nội RYT', 0),
(22, 'sonchuche', 'son1234', 'minhlvph35463@fpt.edu.vn', 336345048, 'Phú Hà', 0),
(23, 'thiengiap20004', 'giap2004', 'minhlvph35463@fpt.edu.vn', 336345046, 'Hà NỘI 2', 1),
(24, 'levanba', 'ba2004', 'minhlvph35463@fpt.edu.vn', 987765432, 'Phú Hà', 0),
(25, 'sonchuche', 'sonba123', 'lan123@gmail.com', 336345098, 'hà nội', 0),
(26, 'levantu', 'tu2004', 'cungngaysinh136@gmail.com', 336345999, 'Hà Nội RYT', 0),
(27, 'demomo', 'minh12345', 'le9675418@gmail.com', 987765434, 'Hà NỘI 2', 0),
(28, 'levanmy', 'my1234', 'Le224177@gmail.com', 336345098, 'Đà Nẵng', 0),
(29, 'levanquang', 'Quang2006', 'le967548@gmail.com', 336345041, 'hà nội', 0),
(30, 'levantuan', 'Tuan12345', 'lan123@gmail.com', 987765432, 'Hà Nội RYT', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tintuc`
--

CREATE TABLE `tintuc` (
  `id` int NOT NULL,
  `ngaydang` date NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `tacgia` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `tieude` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `noidung` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `tintuc`
--

INSERT INTO `tintuc` (`id`, `ngaydang`, `img`, `tacgia`, `tieude`, `noidung`) VALUES
(6, '2024-09-28', '3.jpeg', 'Lê Văn Minh', '4 nâng cấp đáng mong chờ trên dòng Galaxy S24 sắp ra mắt', 'Những tính năng được đề cập trong bài viết dưới đây sẽ là sự bổ sung tuyệt vời cho mẫu flagship Galaxy S24 dự kiến được Samsung ra mắt vào đầu năm sau.\r\nTheo các nguồn tin rò rỉ, Samsung nhiều khả năng sẽ ra mắt loạt flagship Galaxy S thế hệ tiếp theo vào đầu năm sau. Chúng được kỳ vọng sẽ mang đến hàng loạt nâng cấp, tính năng mới so với thế hệ trước để nâng tầm trải nghiệm sử dụng của người dùng. Trong bài viết dưới đây, chúng ta hãy cùng điểm qua 4 nâng cấp đáng mong chờ trên dòng Galaxy S24 sắp ra mắt.\r\nSamsung sẽ ra mắt dòng Galaxy S24 vào đầu năm sau\r\nSamsung sẽ ra mắt dòng Galaxy S24 vào đầu năm sau\r\nMục lục	\r\nCác tính năng AI hữu ích\r\nSạc nhanh hơn\r\nNhiều bộ nhớ hơn trong Galaxy S24 cơ bản\r\nThêm nhiều năm cập nhật Android \r\nCác tính năng AI hữu ích\r\nSamsung đã không tiết lộ nhiều tham vọng AI của họ vào năm 2023 như các công ty như Google, Meta và Microsoft. Tuy nhiên, theo các báo cáo thì công ty Hàn Quốc vẫn đang tích cực làm việc để cải thiện trải nghiệm sử dụng của người dùng trên các smartphone của họ thông qua trí thông minh nhân tạo.\r\nGalaxy S24 series sẽ có AI thông minh hơn\r\nGalaxy S24 series sẽ có AI thông minh hơn\r\nDựa trên những thông báo gần đây của Samsung, có vẻ như AI sẽ là trung tâm của dòng Galaxy S24, tương tự như cách tiếp cận của Google với Pixel 8 và Pixel 8 Pro. Công ty Hàn Quốc gần đây đã công bố Gauss, một mô hình AI tổng quát mới bao gồm ngôn ngữ, hình ảnh và mã, và Galaxy AI, một \"trải nghiệm\" có thể sẽ đến với S24. Thông tin chi tiết về Gauss và Galaxy AI rất khan hiếm, nhưng Gauss sẽ có thể xử lý các tác vụ như soạn email và tóm tắt tài liệu, trong khi Galaxy AI có thể dịch trực tiếp khi người dùng đang gọi điện thoại.\r\nSạc nhanh hơn\r\nDòng Galaxy S23 cung cấp tốc độ sạc tương tự như các phiên bản tiền nhiệm, đó là 25W trên phiên bản tiêu chuẩn và 45W trên hai mẫu máy còn lại. Điều này tụt hậu khá nhiều so với các đối thủ cạnh tranh. Ví dụ: Lenovo ThinkPhone cung cấp khả năng sạc 68W, có thể sạc từ 0% đến 92% trong 30 phút. Motorola Edge Plus, cũng có tính năng sạc 68W, đã bổ sung pin từ 3% lên 80% trong 30 phút trong quá trình thử nghiệm của CNET. Cả hai đều đánh bại mức sạc 45W của Galaxy S23 Plus, chỉ đạt 11% đến 72% trong cùng một khoảng thời gian.\r\nHy vọng Samsung sẽ cải thiện công nghệ sạc cho dòng Galaxy S24\r\nHy vọng Samsung sẽ cải thiện công nghệ sạc cho dòng Galaxy S24\r\nDo đó, có khá nhiều người đang mong vọng Samsung sẽ nâng cấp công suất sạc của Galaxy S24 Plus và S24 Ultra lên mức 65W, còn S24 là 45W để giúp người dùng không phải chờ đợi quá lâu khi điện thoại nạp lại năng lượng.\r\nNhiều bộ nhớ hơn trong Galaxy S24 cơ bản\r\nHiện tại, với việc người dùng thường tải rất nhiều ứng dụng hay chụp nhiều ảnh cũng như quay video 4K thì điện thoại rất nhanh đầy bộ nhớ. Bên cạnh đó, hầu hết các nhà sản xuất điện thoại đã ngừng trang bị khe cắm thẻ nhớ microSD cho phép bạn bổ sung thêm dung lượng khi cần từ lâu, nghĩa là giờ đây bạn phải dựa vào bộ nhớ tích hợp trong điện thoại và đám mây để lưu trữ dữ liệu của mình.\r\nGalaxy S24 nên có nhiều bộ nhớ trong tối thiểu hơn\r\nGalaxy S24 nên có nhiều bộ nhớ trong tối thiểu hơn\r\nNăm ngoái, Samsung đã tăng dung lượng lưu trữ ở phiên bản rẻ nhất của Galaxy S23 Plus và Ultra từ 128GB lên 256GB, nhưng S23 tiêu chuẩn vẫn chỉ có 128GB dung lượng. Sẽ thật tuyệt khi thấy Samsung nâng cấp dung lượng lưu trữ của Galaxy S24 cơ bản để phù hợp với phần còn lại của dòng sản phẩm trong năm tới. Làm như vậy cũng sẽ giúp mẫu máy kế nhiệm Galaxy S23 có thể cạnh tranh tốt hơn với các đối thủ cùng phân khúc.\r\nThêm nhiều năm cập nhật Android \r\nSamsung là một trong những công ty đi đầu trong việc tăng thời gian hỗ trợ phần mềm cho các flagship, nhưng Google gần đây hiện đã vượt qua họ. Trong khi Samsung đảm bảo người dùng một số smartphone Galaxy của họ sẽ được trải nghiệm tính năng mới của 4 bản cập nhật Android lớn thì Pixel 8 và Pixel 8 Pro của Google sẽ nhận được 7 năm cập nhật phần mềm. Do đo, hy vọng điều này sẽ thúc đẩy Samsung có thể tăng thêm thời gian hỗ trợ phần mềm cho Galaxy S24.'),
(7, '2024-09-28', '1.jpeg', 'Lê Văn Minh', 'OnePlus 12 lộ video trên tay, xác nhận có pin 5400 mAh và sạc không dây 50W', 'Ngày mai (5/12), OnePlus sẽ ra mắt OnePlus 12 tại thị trường Trung Quốc. Chính vì vậy mà công ty đã liên tục “nhá hàng” các tính năng của điện thoại này.\r\nMới đây nhất, video trên tay OnePlus 12 vừa được chia sẻ trên mạng. Ngoài ra, các tính năng chính của điện thoại cũng được tiết lộ trong các teaser mới.\r\nhttps://www.youtube.com/shorts/TL3mxNaFbpk\r\nOnePlus đã xác nhận rằng OnePlus 12 có pin 5,400mAh, mang tới thời gian sử dụng lên tới 1.79 ngày. Viên pin được thiết kế để chịu được chu kỳ thông thường lên đến 4 năm, duy trì công suất ít nhất 80% sau 1,600 chu kỳ sạc và xả và thể hiện hiệu suất xả là 99.5%.\r\nTeaser pin\r\nTeaser pin\r\nOnePlus 12 cũng được xác nhận hỗ trợ sạc nhanh có dây SuperVOOC 100W, cho phép sạc đầy chỉ trong 25 phút và có sạc không dây 50W. Nó cũng được tích hợp chức năng sạc ngược không dây và đi kèm chip quản lý năng lượng SuperVOOC S để tối ưu hóa mức tiêu thụ điện năng.\r\nOnePlus 12 có sạc nhanh không dây 50W\r\nOnePlus 12 có sạc nhanh không dây 50W\r\nĐiện thoại hỗ trợ kháng nước IP65\r\nĐiện thoại hỗ trợ kháng nước IP65\r\nTeaser thứ ba ở trên xác nhận rằng OnePlus 12 sẽ có khả năng chống bụi và nước được xếp hạng IP65. Smartphone này sẽ xuất hiện với RAM LPDDR5x lên tới 24GB và dung lượng lưu trữ lên tới 1TB . Ngoài ra, nó sẽ có thiết lập camera tương tự như trên điện thoại màn hình gập OnePlus Open. Cuối cùng, nó gần như chắc chắn sẽ được cung cấp sức mạnh đến từ con chip Snapdragon 8 Gen 3.'),
(8, '2024-09-28', '4.jpg', 'Lê Văn Minh', 'Mua điện thoại Xiaomi chưa tới 7 triệu mà còn được giảm thêm đến 1.2 triệu đồng, xem ngay', 'Siêu khuyến mãi! Mua ngay loạt điện thoại Xiaomi dưới 7 triệu và nhận ưu đãi giảm thêm lên đến 1.2 triệu đồng. Cơ hội hiếm có, hãy khám phá ngay để sở hữu chiếc điện thoại mơ ước của bạn với giá cực kỳ hấp dẫn. Đừng bỏ lỡ cơ hội để trải nghiệm công nghệ đỉnh cao với mức giá ưu đãi này. Xem ngay để chọn lựa sản phẩm phù hợp với nhu cầu của bạn và đảm bảo bạn không bỏ lỡ cơ hội tiết kiệm lớn này!\r\nThời gian diễn ra: Đến ngày 30/11/2023. \r\n\r\nLưu ý\r\n\r\nKhuyến mãi có thể kết thúc sớm trước thời hạn nếu hết số lượng sản phẩm.\r\nÔ sản phẩm chưa hiển thị ưu đãi chính xác, để hiện ưu đãi chính xác, khách cần bấm Xem chi tiết.\r\nGiá và khuyến mãi hiện tại áp dụng cho khu vực Hồ Chí Minh, có thể khác so với các tỉnh thành khác. Khách hàng cần chọn khu vực mình sinh sống để xem giá và khuyến mãi chính xác nhất. \r\nXiaomi Redmi 12C 128GB - Đặc biệt \r\nTrả góp 0% \r\nTrả góp 0%Xiaomi Redmi 12C 128GBsim vina BOOM 65KSIM VINA BOOM 65K\r\nXiaomi Redmi 12C 128GB\r\n2.790.000₫\r\n3.990.000₫ -30%\r\n    \r\n\r\n272\r\n\r\nXem đặc điểm nổi bật\r\n\r\nXEM CHI TIẾT\r\n\r\nRedmi 12C trang bị camera kép, trong đó camera chính có độ phân giải lên đến 50 MP và sử dụng công nghệ ghép pixel 4 trong 1, tăng cường độ chi tiết để tạo ra những bức ảnh chất lượng và ấn tượng hơn. Ngoài các chế độ chụp cơ bản, máy còn độc đáo với nhiều tính năng chụp thú vị như siêu độ phân giải, HDR, chụp ban đêm, và chế độ xóa phông.\r\n\r\nĐiện thoại Android này sử dụng con chip MediaTek Helio G85 8 nhân, với mức xung nhịp tối đa đạt 2.0 GHz. Tại thời điểm ra mắt, đây được coi là một con chip đáng chú ý, khi trong cùng phân khúc, các đối thủ vẫn sử dụng Helio G35 hoặc mẫu chip từ Unisoc. Viên pin dung lượng 5.000 mAh cung cấp năng lượng cho điện thoại, và theo thời gian sử dụng thực tế đã được kiểm tra, máy có thể đáp ứng liên tục trong 8 tiếng 23 phút.\r\n\r\nXiaomi Redmi Note 12S \r\nTrả góp 0%Xiaomi Redmi Note 12S\r\nXiaomi Redmi Note 12S\r\nHÀNG PHẢI CHUYỂN VỀ\r\n5.490.000₫\r\n6.690.000₫ -17%\r\n    \r\n\r\n70\r\n\r\nXem đặc điểm nổi bật\r\n\r\nXEM CHI TIẾT\r\n\r\nMàn hình của Xiaomi Redmi Note 12S đạt chất lượng cao với tấm nền AMOLED và tần số quét mượt mà lên đến 90 Hz trên không gian rộng 6.43 inch. Với những tính năng này, bạn có thể tận hưởng mọi nội dung, từ trò chơi hấp dẫn đến những bộ phim ảnh chất lượng cao một cách thoải mái.\r\n\r\nĐược trang bị con chip Mediatek Helio G96, một CPU phổ biến trên nhiều điện thoại Android hiện nay, đảm bảo máy đáp ứng mọi nhu cầu của người dùng, từ đọc báo, lướt web đến chơi những tựa game hot trên thị trường. Với RAM 8 GB và khả năng mở rộng RAM hiện đại, điện thoại này cung cấp khả năng xử lý đa nhiệm mượt mà, cho phép người dùng mở nhiều ứng dụng cùng một lúc mà không gặp trục trặc về hiệu suất.'),
(9, '2024-09-28', '5.jpg', 'Lê Văn Minh', 'iPhone 15 Pro Max | 15 Pro giảm giá đầu tháng 12, thiết kế khung Titan cao cấp, chỉ từ 33.89 triệu', 'Bộ đôi iPhone 15 Pro Max | iPhone 15 Pro siêu hot đang giảm giá cực hời đầu tháng 12 này đó. Với hiệu năng siêu khủng cùng thiết kế khung Titan cực chất chắc chắn sẽ làm bạn mê mẩn bởi cái nhìn đầu tiên! Nay chỉ từ 33.89 triệu. Để bỏ lỡ khuyến mãi là tiếc lắm bạn nha.\r\nThời gian ưu đãi: Dự kiến đến 31/12/2023\r\n\r\nLưu ý:\r\n\r\nKhuyến mãi có thể kết thúc sớm trước thời hạn nếu hết số lượng sản phẩm hoặc thông tin khuyến mãi có thay đổi.\r\nGiá và khuyến mãi hiện tại áp dụng cho khu vực Hồ Chí Minh, có thể khác so với các tỉnh thành khác. Khách hàng cần chọn khu vực mình sinh sống để xem giá và khuyến mãi chính xác nhất.\r\nÔ sản phẩm chưa hiển thị ưu đãi chính xác, để hiện ưu đãi chính xác, khách cần bấm Xem chi tiết.\r\niPhone 15 Pro Max 256GB\r\nTrả góp 0%iPhone 15 Pro Max 256GBGiá Rẻ QuáGIÁ RẺ QUÁ\r\niPhone 15 Pro Max 256GB\r\n33.890.000₫\r\n34.990.000₫ -3%\r\n    \r\n\r\n41\r\n\r\nXem đặc điểm nổi bật\r\n\r\nXEM CHI TIẾT\r\niPhone 15 Pro Max 256GB\r\niPhone 15 Pro Max sở hữu diện mạo đẳng cấp cực kỳ sang trọng với khung viền được làm bằng chất liệu Titan cao cấp. Thiết kế hình notch dạng viên thuốc mang đến trải nghiệm sử dụng thú vị hơn, đặc biệt hơn nhờ tính năng Dynamic Island. Dynamic Island giúp bạn dễ dàng kiểm tra thông báo, xem bản đồ mà không cần thoát khỏi ứng dụng bạn đang sử dụng.\r\n\r\nĐặc biệt hơn, smartphone cao cấp đã chuyển từ cổng kết nối Lightning sang Type-C mang lại tốc độ truyền dữ liệu nhanh hơn. Cấu hình cực khủng trên thị trường nhờ trang bị vi xử lý Apple A17 Pro - một con chip mạnh mẽ được thiết kế riêng cho Apple, máy hỗ trợ hệ điều hành mới nhất là iOS 17 mang đến cải tiến đáng kể về hiệu năng và trải nghiệm.\r\n\r\nChụp ảnh sắc nét, sống động và chuyên nghiệp nhờ bộ ba camera đẳng cấp lên đến 48 MP, ngoài ra hỗ trợ thêm chế độ Smart HDR 5 để tối ưu hóa độ sáng giúp ảnh chụp luôn sáng rõ hơn bao giờ hết.\r\n\r\niPhone 15 Pro 512GB\r\nTrả góp 0%\r\niPhone 15 Pro 512GBGiá Rẻ QuáGIÁ RẺ QUÁ\r\niPhone 15 Pro 512GB\r\nHÀNG PHẢI CHUYỂN VỀ\r\n37.490.000₫\r\n37.990.000₫ -1%\r\n    \r\n\r\n4\r\n\r\nXem đặc điểm nổi bật\r\n\r\nXEM CHI TIẾT\r\niPhone 15 Pro 512GB\r\niPhone 15 Pro 512 GB mang đến một thiết kế vuông vắn tinh tế đầy sang trọng. Cũng như iPhone 15 Pro Max, máy được làm từ khung viền Titan cao cấp cung cấp độ cứng và độ bền bỉ vượt trội. Màn hình của máy trang bị tấm nền OLED cho phép hiển thị màu sắc sáng, cung cấp độ tương phản tốt hơn, ngoài ra còn hỗ trợ tiết kiệm năng lượng giúp kéo dài thời gian sử dụng thiết bị.\r\n\r\nĐiện thoại sở hữu tính năng Dynamic Island độc đáo, cho phép bạn sử dụng nhanh trên phần hình notch để tương tác thuận tiện hơn. Máy sử dụng chipset Apple A17 Pro hàng đầu, khả năng xử lý đa nhiệm mạnh mẽ, các tác vụ như chỉnh sửa hình ảnh hay chơi game giải trí đều được xử lý mượt mà.\r\n\r\nTự tin nhiếp ảnh hơn với hệ thống ống kính với độ phân giải siêu cao đến 48 MP, camera tele 12 MP với khả năng zoom quang học tối đa 3X. Đặc biệt, máy hỗ trợ tính năng chống rung luôn giữ cho hình ảnh của bạn luôn sắc nét và ổn định.');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_mb` (`idsanpham`);

--
-- Chỉ mục cho bảng `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bill_chitiet`
--
ALTER TABLE `bill_chitiet`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_bc_sp` (`idsanpham`),
  ADD KEY `lk_bc_bill` (`idbill`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_taikhoan` (`idtaikhoan`),
  ADD KEY `lk_sanpham` (`idsanpham`);

--
-- Chỉ mục cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lk_tkgiohang` (`idtaikhoan`),
  ADD KEY `lk_sanphamgiohang` (`idsanpham`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_fls` (`iddm`);

--
-- Chỉ mục cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT cho bảng `bill_chitiet`
--
ALTER TABLE `bill_chitiet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT cho bảng `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT cho bảng `tai_khoan`
--
ALTER TABLE `tai_khoan`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT cho bảng `tintuc`
--
ALTER TABLE `tintuc`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `lk_mb` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `bill_chitiet`
--
ALTER TABLE `bill_chitiet`
  ADD CONSTRAINT `lk_bc_bill` FOREIGN KEY (`idbill`) REFERENCES `bill` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_bc_sp` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `lk_sanpham` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_taikhoan` FOREIGN KEY (`idtaikhoan`) REFERENCES `tai_khoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `lk_giohang_tk` FOREIGN KEY (`idtaikhoan`) REFERENCES `tai_khoan` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `lk_sanphamgiohang` FOREIGN KEY (`idsanpham`) REFERENCES `sanpham` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `fk_fls` FOREIGN KEY (`iddm`) REFERENCES `danhmuc` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
