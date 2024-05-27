-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 29, 2024 lúc 04:31 PM
-- Phiên bản máy phục vụ: 10.5.24-MariaDB
-- Phiên bản PHP: 8.1.27
CREATE DATABASE iovq1r3ujzst_webtintuc;

USE iovq1r3ujzst_webtintuc;

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `iovq1r3ujzst_webtintuc`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `baiviet`
--

CREATE TABLE `baiviet` (
  `idbaiviet` int(11) NOT NULL,
  `tenbaiviet` varchar(400) NOT NULL,
  `anhminhhoa` varchar(400) NOT NULL,
  `tomtat` longtext NOT NULL,
  `noidung` longtext NOT NULL,
  `ngaydang` datetime NOT NULL DEFAULT current_timestamp(),
  `trangthai` int(11) NOT NULL,
  `vitri` int(11) NOT NULL,
  `idloaitin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `baiviet`
--

INSERT INTO `baiviet` (`idbaiviet`, `tenbaiviet`, `anhminhhoa`, `tomtat`, `noidung`, `ngaydang`, `trangthai`, `vitri`, `idloaitin`) VALUES
(11, 'Đội bóng nữ quốc gia Việt Nam chuẩn bị cho vòng loại World Cup 2026', 'images/vietnam_womens_national_team.jpg', '<p><strong>Đội b&oacute;ng nữ quốc gia Việt Nam đang t&iacute;ch cực chuẩn bị cho v&ograve;ng loại World Cup 2026.</strong></p>\r\n', '<p>Đội b&oacute;ng nữ quốc gia Việt Nam đang trong qu&aacute; tr&igrave;nh chuẩn bị cho v&ograve;ng loại World Cup 2026 với mục ti&ecirc;u gi&agrave;nh v&eacute; đi tiếp v&agrave;o giải đấu lớn nhất h&agrave;nh tinh.</p>\r\n', '2024-04-25 08:20:00', 1, 0, 2),
(12, 'Siêu Cup Italia 2024: Juventus đối đầu với Inter Milan', 'images/supercoppa_italia_2024.jpg', '<strong style=\"color: blue;\">Xem trận đấu giữa Juventus và Inter Milan tại Siêu Cup Italia 2024.</strong>', '<p style=\"color: green;\">Trận đấu giữa Juventus và Inter Milan tại Siêu Cup Italia 2024 hứa hẹn sẽ là một trận cầu hấp dẫn giữa hai đội bóng hàng đầu của Italia.</p>', '2024-04-24 07:10:00', 1, 0, 2),
(13, 'Đội tuyển bóng chuyền nam Việt Nam giành chiến thắng tại giải bóng chuyền quốc tế 2024', 'images/vietnam_mens_volleyball_team.jpg', '<strong style=\"color: blue;\">Đội tuyển bóng chuyền nam Việt Nam vô địch giải bóng chuyền quốc tế 2024.</strong>', '<p style=\"color: green;\">Đội tuyển bóng chuyền nam Việt Nam đã giành chiến thắng xuất sắc tại giải bóng chuyền quốc tế 2024, tạo ra cú sốc lớn trong cộng đồng bóng chuyền thế giới.</p>', '2024-04-21 09:30:00', 1, 0, 9),
(14, 'Câu lạc bộ bóng chuyền Quảng Nam đăng quang tại giải vô địch bóng chuyền quốc gia 2024', 'images/quang_nam_volleyball_club.jpg', '<strong style=\"color: blue;\">Câu lạc bộ bóng chuyền Quảng Nam vô địch giải vô địch bóng chuyền quốc gia 2024.</strong>', '<p style=\"color: green;\">Câu lạc bộ bóng chuyền Quảng Nam đã xuất sắc đăng quang tại giải vô địch bóng chuyền quốc gia 2024 sau một mùa giải đầy cạnh tranh.</p>', '2024-04-22 11:45:00', 1, 0, 9),
(15, 'Tiger Woods trở lại sân golf với phong độ ấn tượng sau chấn thương', 'images/tiger_woods_golf.jpg', '<strong style=\"color: blue;\">Tiger Woods trở lại sân golf sau chấn thương với phong độ ấn tượng.</strong>', '<p style=\"color: green;\">Sau thời gian dài hồi phục sau chấn thương, Tiger Woods đã tái xuất sân golf với màn trình diễn ấn tượng, thu hút sự chú ý của người hâm mộ trên khắp thế giới.</p>', '2024-04-20 15:20:00', 1, 0, 4),
(16, 'Giải golf quốc tế 2024: Những cái tên đáng chú ý trong danh sách dự kiến tham gia', 'images/international_golf_tournament.jpg', '<strong style=\"color: blue;\">Danh sách dự kiến tham gia giải golf quốc tế 2024 với những cái tên đáng chú ý.</strong>', '<p style=\"color: green;\">Giải golf quốc tế 2024 sẽ chứng kiến sự hiện diện của nhiều ngôi sao hàng đầu thế giới, từ Tiger Woods đến Rory McIlroy, tạo ra một mùa giải cạnh tranh sôi nổi.</p>', '2024-04-23 10:00:00', 1, 0, 4),
(17, 'Giải đấu LMHT Mùa Xuân 2024: Tổng kết và những điểm nhấn', 'images/lol_spring_2024.jpg', '<strong style=\"color: blue;\">Tổng kết giải đấu LMHT Mùa Xuân 2024 và những điểm nhấn đáng chú ý.</strong>', '<p style=\"color: green;\">Giải đấu LMHT Mùa Xuân 2024 đã kết thúc với sự thăng hoa của nhiều đội tuyển, cùng những trận đấu kịch tính và bất ngờ. Bài viết này sẽ điểm qua những điểm nhấn của giải đấu và phân tích kết quả cuối cùng.</p>', '2024-04-18 09:45:00', 1, 0, 5),
(18, 'Tin tức mới nhất về giải đấu Dota 2 The International 2024', 'images/dota2_international_2024.jpg', '<strong style=\"color: blue;\">Cập nhật tin tức mới nhất về giải đấu Dota 2 The International 2024.</strong>', '<p style=\"color: green;\">Giải đấu Dota 2 The International 2024 đang thu hút sự chú ý của cộng đồng game thủ trên toàn thế giới. Bài viết này sẽ cập nhật những tin tức mới nhất, kết quả trận đấu và những thông tin đáng chú ý khác về giải đấu này.</p>', '2024-04-20 14:30:00', 1, 0, 5),
(19, 'Esport ở Việt Nam: Sự phát triển và triển vọng trong tương lai', 'images/esport_vietnam.jpg', '<strong style=\"color: blue;\">Tình hình phát triển của Esport ở Việt Nam và triển vọng trong tương lai.</strong>', '<p style=\"color: green;\">Esport đang trở thành một ngành công nghiệp phát triển mạnh mẽ tại Việt Nam, với sự tham gia của nhiều đội tuyển chuyên nghiệp và sự quan tâm ngày càng tăng từ phía cộng đồng game thủ. Bài viết này sẽ đánh giá tình hình phát triển hiện tại và những triển vọng trong tương lai của Esport tại Việt Nam.</p>', '2024-04-22 11:15:00', 1, 0, 5),
(20, 'Champions League 2024: Kết quả và bảng xếp hạng sau vòng tứ kết', 'images/champions_league_2024.jpg', '<strong style=\"color: blue;\">Cập nhật kết quả và bảng xếp hạng Champions League 2024 sau vòng tứ kết.</strong>', '<p style=\"color: green;\">Champions League 2024 đang đi vào giai đoạn căng thẳng với sự tranh tài gay cấn từ các đội bóng hàng đầu châu Âu. Bài viết này sẽ cập nhật kết quả và bảng xếp hạng sau vòng tứ kết của giải đấu danh giá này.</p>', '2024-04-18 10:30:00', 1, 0, 6),
(21, 'Bundesliga 2024/2025: Dự đoán về nhà vô địch và top 4 cuối mùa', 'images/bundesliga_2024_2025.jpg', '<strong style=\"color: blue;\">Dự đoán về nhà vô địch và top 4 của Bundesliga mùa giải 2024/2025.</strong>', '<p style=\"color: green;\">Bundesliga mùa giải 2024/2025 đang diễn ra vô cùng hấp dẫn với sự cạnh tranh gay gắt từ các đội bóng. Bài viết này sẽ dự đoán về đội bóng sẽ vô địch và top 4 cuối mùa của giải đấu hàng đầu tại Đức.</p>', '2024-04-20 15:45:00', 1, 0, 6),
(22, 'La Liga 2024/2025: Top 3 ứng viên cho danh hiệu vô địch', 'images/la_liga_2024_2025.jpg', '<strong style=\"color: blue;\">Đánh giá về top 3 ứng viên cho danh hiệu vô địch La Liga mùa giải 2024/2025.</strong>', '<p style=\"color: green;\">La Liga mùa giải 2024/2025 đang chứng kiến sự cạnh tranh gay gắt từ các đội bóng hàng đầu Tây Ban Nha. Bài viết này sẽ đánh giá về top 3 ứng viên cho danh hiệu vô địch của giải đấu này.</p>', '2024-04-22 12:00:00', 1, 0, 6),
(23, 'Đội tuyển bóng đá Việt Nam giành chiến thắng trong trận đấu giao hữu', 'images/bong_da_viet_nam.jpg', '<strong style=\"color: blue;\">Đội tuyển bóng đá Việt Nam giành chiến thắng.</strong>', '<p style=\"color: green;\">Đội tuyển bóng đá quốc gia của Việt Nam đã giành chiến thắng ấn tượng trong trận đấu giao hữu với đối thủ nước ngoài.</p>', '2024-04-15 09:30:00', 1, 0, 7),
(24, 'Vận động viên Việt Nam đạt thành tích cao tại giải đấu quốc tế', 'images/vdv_viet_nam.jpg', '<strong style=\"color: blue;\">Vận động viên Việt Nam đạt thành tích cao.</strong>', '<p style=\"color: green;\">Các vận động viên của Việt Nam đã ghi nhận những thành tích ấn tượng tại các giải đấu thể thao quốc tế, góp phần nâng cao danh tiếng của đất nước.</p>', '2024-04-18 11:45:00', 1, 1, 7),
(25, 'Phát triển cơ sở hạ tầng thể thao tại các địa phương ở Việt Nam', 'images/co_so_ha_tang_the_thao.jpg', '<strong style=\"color: blue;\">Phát triển cơ sở hạ tầng thể thao ở Việt Nam.</strong>', '<p style=\"color: green;\">Việt Nam đang tăng cường đầu tư và phát triển cơ sở hạ tầng thể thao tại các địa phương, nhằm tạo điều kiện thuận lợi cho việc rèn luyện và phát triển tài năng thể thao.</p>', '2024-04-20 16:30:00', 1, 0, 7),
(26, 'Novak Djokovic giành chức vô địch giải quần vợt lớn', 'images/novak_djokovic.jpg', '<strong style=\"color: blue;\">Novak Djokovic giành chức vô địch.</strong>', '<p style=\"color: green;\">Tay vợt hàng đầu thế giới Novak Djokovic đã giành chức vô địch trong một giải quần vợt lớn, tiếp tục khẳng định sức mạnh của mình trên sân đấu.</p>', '2024-04-10 14:00:00', 1, 0, 8),
(27, 'Cựu vô địch Grand Slam tái xuất sau chấn thương', 'images/cuu_vo_dich_tai_xuat.jpg', '<strong style=\"color: blue;\">Cựu vô địch tái xuất.</strong>', '<p style=\"color: green;\">Một cựu vô địch Grand Slam đã tái xuất sau một thời gian dài nghỉ do chấn thương, mang lại hi vọng mới cho người hâm mộ về sự trở lại của anh ấy trong làng quần vợt.</p>', '2024-04-14 10:15:00', 1, 0, 8),
(28, 'Giải quần vợt trẻ Việt Nam khai mạc', 'images/giai_quan_vot_tre_viet_nam.jpg', '<strong style=\"color: blue;\">Giải quần vợt trẻ Việt Nam khai mạc.</strong>', '<p style=\"color: green;\">Giải quần vợt trẻ Việt Nam đã chính thức khai mạc, thu hút sự quan tâm của đông đảo các tay vợt trẻ đang khao khát khẳng định tài năng của mình trên sân đấu.</p>', '2024-04-20 08:45:00', 1, 1, 8),
(29, 'Manchester United chiêu mộ sao trẻ từ Serie A', 'images/man_united_sao_tre.jpg', '<strong style=\"color: blue;\">Manchester United chiêu mộ sao trẻ từ Serie A.</strong>', '<p style=\"color: green;\">Manchester United vừa công bố việc chiêu mộ một tài năng trẻ đầy triển vọng từ Serie A, mở ra triển vọng lớn cho sự phát triển của đội bóng trong tương lai.</p>', '2024-04-21 11:45:00', 1, 0, 2),
(30, 'Real Madrid đạt thỏa thuận chiêu mộ ngôi sao hàng đầu từ Bundesliga', 'images/real_madrid_ngoi_sao_bundesliga.jpg', '<strong style=\"color: blue;\">Real Madrid đạt thỏa thuận chiêu mộ ngôi sao hàng đầu từ Bundesliga.</strong>', '<p style=\"color: green;\">Real Madrid đã hoàn tất việc chiêu mộ một trong những ngôi sao hàng đầu từ Bundesliga, gửi đi thông điệp mạnh mẽ về ý định cạnh tranh mạnh mẽ ở mùa giải mới.</p>', '2024-04-21 13:00:00', 1, 0, 3),
(31, 'Barcelona mất một cầu thủ quan trọng trong thương vụ chuyển nhượng', 'images/barcelona_mat_cau_thu.jpg', '<strong style=\"color: blue;\">Barcelona mất một cầu thủ quan trọng trong thương vụ chuyển nhượng.</strong>', '<p style=\"color: green;\">Barcelona đã phải chấp nhận mất một cầu thủ quan trọng trong một thương vụ chuyển nhượng gây ra nhiều tranh cãi, gây ảnh hưởng lớn đến kế hoạch của họ cho mùa giải tới.</p>', '2024-04-22 09:15:00', 1, 0, 3),
(32, 'Liverpool hoàn tất thương vụ chiêu mộ tiền đạo từ Ligue 1', 'images/liverpool_tien_dao_ligue1.jpg', '<strong style=\"color: blue;\">Liverpool hoàn tất thương vụ chiêu mộ tiền đạo từ Ligue 1.</strong>', '<p style=\"color: green;\">Liverpool đã chính thức hoàn tất việc chiêu mộ một tiền đạo từ Ligue 1, tạo ra sự kỳ vọng lớn cho mục tiêu cạnh tranh ở các giải đấu trong tương lai.</p>', '2024-04-22 10:45:00', 1, 0, 3),
(33, 'AC Milan đàm phán mạnh mẽ để chiêu mộ trung vệ hàng đầu từ La Liga', 'images/ac_milan_trung_ve_la_liga.jpg', '<strong style=\"color: blue;\">AC Milan đàm phán mạnh mẽ để chiêu mộ trung vệ hàng đầu từ La Liga.</strong>', '<p style=\"color: green;\">AC Milan đang tích cực đàm phán để chiêu mộ một trung vệ hàng đầu từ La Liga, tạo nên làn sóng đàm phán mạnh mẽ trên thị trường chuyển nhượng.</p>', '2024-04-22 12:00:00', 1, 1, 3),
(34, 'Chelsea cân nhắc chiêu mộ sao trẻ ở giải VĐQG Italia', 'images/chelsea_sao_tre_italia.jpg', '<strong style=\"color: blue;\">Chelsea cân nhắc chiêu mộ sao trẻ ở giải VĐQG Italia.</strong>', '<p style=\"color: green;\">Chelsea đang tỏ ra quan tâm đặc biệt đến một tài năng trẻ ở giải VĐQG Italia, thể hiện ý định đầu tư vào sự phát triển dài hạn của đội bóng.</p>', '2024-04-23 09:30:00', 1, 0, 3),
(35, 'TSM ký hợp đồng với ngôi sao mới từ Hàn Quốc', 'images/tsm_ngoi_sao_han_quoc.jpg', '<strong style=\"color: blue;\">TSM ký hợp đồng với ngôi sao mới từ Hàn Quốc.</strong>', '<p style=\"color: green;\">Đội tuyển TSM đã chính thức ký hợp đồng với một tài năng mới từ Hàn Quốc, hy vọng sẽ mang lại sức mạnh mới cho đội bóng.</p>', '2024-04-22 11:15:00', 1, 0, 3),
(36, 'Fnatic sa thải huấn luyện viên sau chuỗi trận không thành công', 'images/fnatic_sa_thai_huan_luyen_vien.jpg', '<strong style=\"color: blue;\">Fnatic sa thải huấn luyện viên sau chuỗi trận không thành công.</strong>', '<p style=\"color: green;\">Sau một chuỗi trận không thành công, Fnatic đã quyết định sa thải huấn luyện viên của mình, hy vọng sẽ có sự thay đổi tích cực trong tương lai gần.</p>', '2024-04-20 15:40:00', 1, 0, 3),
(37, 'Cloud9 chính thức giới thiệu đội hình mới cho mùa giải tới', 'images/cloud9_doi_hinh_moi.jpg', '<strong style=\"color: blue;\">Cloud9 chính thức giới thiệu đội hình mới cho mùa giải tới.</strong>', '<p style=\"color: green;\">Đội Cloud9 đã chính thức công bố đội hình mới của mình cho mùa giải tới, hy vọng sẽ có được thành tích tốt hơn so với mùa giải trước.</p>', '2024-04-18 10:20:00', 1, 0, 2),
(38, 'G2 Esports có thể sẽ tiến hành đổi ngôi sao với đối thủ cạnh tranh', 'images/g2_esports_doi_ngoi_sao.jpg', '<strong style=\"color: blue;\">G2 Esports có thể sẽ tiến hành đổi ngôi sao với đối thủ cạnh tranh.</strong>', '<p style=\"color: green;\">G2 Esports đang xem xét khả năng đổi ngôi sao với một đối thủ cạnh tranh, nhằm củng cố đội hình và nâng cao khả năng thi đấu.</p>', '2024-04-17 14:55:00', 1, 0, 3),
(39, 'Team Liquid mở cánh cửa cho tài năng trẻ từ khu vực Châu Á', 'images/teamliquid_tai_nang_tre_chau_a.jpg', '<strong style=\"color: blue;\">Team Liquid mở cánh cửa cho tài năng trẻ từ khu vực Châu Á.</strong>', '<p style=\"color: green;\">Team Liquid đang tìm kiếm tài năng trẻ từ khu vực Châu Á để gia nhập đội bóng, hy vọng sẽ đem lại sự đa dạng và sức mạnh mới cho đội hình.</p>', '2024-04-15 08:10:00', 1, 0, 3),
(40, 'Splyce công bố kế hoạch tái cơ cấu đội hình cho mùa giải mới', 'images/splyce_ke_hoach_tai_co_cau.jpg', '<strong style=\"color: blue;\">Splyce công bố kế hoạch tái cơ cấu đội hình cho mùa giải mới.</strong>', '<p style=\"color: green;\">Đội Splyce đã công bố kế hoạch tái cơ cấu đội hình của mình cho mùa giải mới, hy vọng sẽ có sự thay đổi tích cực và mang lại thành tích tốt hơn.</p>', '2024-04-12 13:25:00', 1, 0, 3),
(41, 'Misfits eSports chính thức giới thiệu đội hình cho mùa giải sắp tới', 'images/misfits_esports_doi_hinh_moi.jpg', '<strong style=\"color: blue;\">Misfits eSports chính thức giới thiệu đội hình cho mùa giải sắp tới.</strong>', '<p style=\"color: green;\">Misfits eSports đã chính thức giới thiệu đội hình mới của mình cho mùa giải sắp tới, hy vọng sẽ có những thành tích tốt hơn và gây ấn tượng mạnh mẽ trong cộng đồng người hâm mộ.</p>', '2024-04-22 15:15:00', 1, 0, 3),
(42, '10 Cầu Thủ Nổi Tiếng Trong Lịch Sử Bóng Đá', 'images/10_cau_thu.jpg', '<strong style=\"color: blue;\">10 Cầu Thủ Nổi Tiếng Trong Lịch Sử Bóng Đá.</strong>', '<p style=\"color: green;\">Bóng đá là môn thể thao được yêu thích trên khắp thế giới, và trong lịch sử của nó đã có những cầu thủ xuất sắc góp phần làm nên tên tuổi và sự phát triển của môn thể thao này.</p>', '2024-04-22 15:00:00', 1, 0, 2),
(43, 'Kỹ Thuật Sút Bóng Hiệu Quả Nhất', 'images/ky_thuat_sut_bong.jpg', '<strong style=\"color: blue;\">Kỹ Thuật Sút Bóng Hiệu Quả Nhất.</strong>', '<p style=\"color: green;\">Sút bóng là một trong những kỹ thuật quan trọng nhất trong bóng đá. Bài viết này sẽ giới thiệu các kỹ thuật sút bóng hiệu quả mà các cầu thủ nên nắm vững.</p>', '2024-04-22 16:30:00', 1, 0, 10),
(44, 'Dự đoán về kết quả của trận đấu giữa Fnatic và G2 Esports', 'images/fnatic_vs_g2_esports.jpg', '<strong style=\"color: blue;\">Dự đoán về kết quả của trận đấu giữa Fnatic và G2 Esports.</strong>', '<p style=\"color: green;\">Một chuyên gia Esport hàng đầu đã đưa ra dự đoán về kết quả của trận đấu giữa Fnatic và G2 Esports, với những nhận định chi tiết về khả năng và phong độ của hai đội.</p>', '2024-04-23 10:15:00', 1, 0, 10),
(45, 'Phân tích về chiến thuật và đội hình của Team Liquid trong mùa giải mới', 'images/team_liquid_chien_thuat_doi_hinh.jpg', '<strong style=\"color: blue;\">Phân tích về chiến thuật và đội hình của Team Liquid trong mùa giải mới.</strong>', '<p style=\"color: green;\">Một chuyên gia Esport đã phân tích sâu về chiến thuật và đội hình của Team Liquid trong mùa giải mới, đưa ra những nhận định sắc bén về tiềm năng và khả năng cạnh tranh của đội bóng này.</p>', '2024-04-22 09:30:00', 1, 0, 10),
(46, 'Đánh giá về phong độ và triển vọng của Cloud9 trong mùa giải Esport tới', 'images/cloud9_phong_do_trienvong.jpg', '<strong style=\"color: blue;\">Đánh giá về phong độ và triển vọng của Cloud9 trong mùa giải Esport tới.</strong>', '<p style=\"color: green;\">Một chuyên gia Esport đã đánh giá về phong độ và triển vọng của Cloud9 trong mùa giải Esport tới, nhấn mạnh vào các yếu tố quyết định cho thành công của đội bóng này.</p>', '2024-04-21 08:20:00', 1, 0, 10),
(52, 'Nhận định về kết quả của trận đấu giữa TSM và Team Liquid', 'images/tsm_vs_team_liquid.jpg', '<strong style=\"color: blue;\">Nhận định về kết quả của trận đấu giữa TSM và Team Liquid.</strong>', '<p style=\"color: green;\">Một chuyên gia Esport đã đưa ra nhận định về kết quả của trận đấu giữa TSM và Team Liquid, dựa trên phân tích về phong độ và chiến thuật của hai đội.</p>', '2024-04-20 07:10:00', 2, 1, 11),
(53, 'Triển vọng của Misfits eSports trong mùa giải Esport mới', 'images/misfits_esports_trienvong.jpg', '<strong style=\"color: blue;\">Triển vọng của Misfits eSports trong mùa giải Esport mới.</strong>', '<p style=\"color: green;\">Một chuyên gia Esport đã đánh giá về triển vọng của Misfits eSports trong mùa giải Esport mới, nhấn mạnh vào các yếu tố quyết định cho thành công của đội bóng này.</p>', '2024-04-19 09:30:00', 1, 1, 10),
(54, 'Dự đoán về kết quả của trận đấu giữa Cloud9 và Splyce', 'images/cloud9_vs_splyce.jpg', '<strong style=\"color: blue;\">Dự đoán về kết quả của trận đấu giữa Cloud9 và Splyce.</strong>', '<p style=\"color: green;\">Một chuyên gia Esport hàng đầu đã đưa ra dự đoán về kết quả của trận đấu giữa Cloud9 và Splyce, với những nhận định chi tiết về khả năng và phong độ của hai đội.</p>', '2024-04-18 08:45:00', 1, 0, 10),
(55, 'Nhận định về chiến thuật và đội hình của Fnatic trong mùa giải mới', 'images/fnatic_chien_thuat_doi_hinh.jpg', '<strong style=\"color: blue;\">Nhận định về chiến thuật và đội hình của Fnatic trong mùa giải mới.</strong>', '<p style=\"color: green;\">Một chuyên gia Esport đã phân tích sâu về chiến thuật và đội hình của Fnatic trong mùa giải mới, đưa ra những nhận định sắc bén về tiềm năng và khả năng cạnh tranh của đội bóng này.</p>', '2024-04-17 10:30:00', 2, 0, 11),
(56, 'Đánh Giá Đội Bóng Manchester United', 'images/DG_MU.jpg', '<strong style=\"color: blue;\">Đánh Giá Đội Bóng Manchester United.</strong>', '<p style=\"color: green;\">Manchester United đã có một mùa giải đầy biến động và thử thách. Bài viết này sẽ đánh giá hiệu suất, điểm mạnh và điểm yếu của đội bóng trong mùa giải vừa qua.</p>', '2024-04-22 21:00:00', 2, 0, 11),
(57, 'Đánh Giá Đội Bóng Real Madrid', 'images/DG_RM.jpg', '<strong style=\"color: blue;\">Đánh Giá Đội Bóng Real Madrid.</strong>', '<p style=\"color: green;\">Real Madrid luôn là một đối thủ đáng gờm trên mọi mặt trận. Bài viết này sẽ phân tích hiệu suất và triển vọng của đội bóng trong mùa giải gần đây.</p>', '2024-04-23 10:30:00', 2, 0, 11),
(58, 'Đánh Giá Đội Bóng Rổ Los Angeles Lakers', 'images/DG_LAL.jpg', '<strong style=\"color: blue;\">Đánh Giá Đội Bóng Rổ Los Angeles Lakers.</strong>', '<p style=\"color: green;\">Los Angeles Lakers đã trải qua một mùa giải với nhiều biến động. Bài viết này sẽ phân tích sự thể hiện của đội bóng, điểm mạnh và điểm yếu của họ trong mùa giải vừa qua.</p>', '2024-04-24 09:45:00', 2, 0, 11),
(59, 'Đánh Giá Đội Bóng Rổ Golden State Warriors', 'images/DG_GSW.jpg', '<strong style=\"color: blue;\">Đánh Giá Đội Bóng Rổ Golden State Warriors.</strong>', '<p style=\"color: green;\">Golden State Warriors là một đội bóng rổ mạnh mẽ với nhiều tài năng. Bài viết này sẽ đánh giá hiệu suất và triển vọng của đội bóng trong mùa giải gần đây.</p>', '2024-04-25 08:00:00', 2, 0, 11),
(60, 'Bí mật chiến thắng của Los Angeles Lakers', 'images/win_LAL.jpg', '<strong style=\"color: blue;\">Bí mật chiến thắng của Los Angeles Lakers.</strong>', '<p style=\"color: green;\">Los Angeles Lakers đã có một mùa giải thành công và chiến thắng liên tiếp. Bài viết này tiết lộ những bí mật đằng sau thành công của đội bóng rổ nổi tiếng này.</p>', '2024-04-26 10:00:00', 1, 0, 7),
(61, 'Những cầu thủ trẻ triển vọng trong NBA', 'images/tre_NBA.png', '<strong style=\"color: blue;\">Những cầu thủ trẻ triển vọng trong NBA.</strong>', '<p style=\"color: green;\">NBA là nơi sinh sống của nhiều tài năng trẻ. Bài viết này giới thiệu về một số cầu thủ trẻ triển vọng và tiềm năng của họ trong làng bóng rổ quốc tế.</p>', '2024-04-27 09:30:00', 1, 0, 7),
(62, 'Cách đội Golden State Warriors chiến thắng mỗi trận', 'images/win_SW.jpg', '<strong style=\"color: blue;\">Cách đội Golden State Warriors chiến thắng mỗi trận.</strong>', '<p style=\"color: green;\">Golden State Warriors là một trong những đội bóng rổ mạnh mẽ nhất thế giới. Bài viết này phân tích cách mà đội bóng này chiến thắng mỗi trận và duy trì thành công.</p>', '2024-04-28 08:45:00', 1, 0, 2),
(63, 'Những pha bóng đẹp mắt nhất trong mùa giải NBA mới nhất', 'images/highlight_NBA.jpg', '<strong style=\"color: blue;\">Những pha bóng đẹp mắt nhất trong mùa giải NBA mới nhất.</strong>', '<p style=\"color: green;\">Mùa giải NBA mới nhất đã chứng kiến rất nhiều pha bóng đẹp mắt và ấn tượng. Bài viết này tập hợp những pha bóng nổi bật nhất trong mùa giải vừa qua.</p>', '2024-04-29 10:15:00', 1, 0, 7),
(65, 'Phỏng vấn với HLV Park Hang-seo - Đội tuyển bóng đá quốc gia Việt Nam', 'images/park_hang_seo.jpg', '<strong style=\"color: blue;\">Phỏng vấn với HLV Park Hang-seo.</strong>', '<p style=\"color: green;\">Cuộc phỏng vấn với HLV Park Hang-seo, người dẫn dắt đội tuyển bóng đá quốc gia Việt Nam, về chiến thuật và kế hoạch chuẩn bị cho các trận đấu sắp tới.</p>', '2024-04-22 14:30:00', 1, 0, 14),
(66, 'Cuộc trò chuyện với HLV Gregg Popovich - Đội tuyển bóng rổ quốc gia Mỹ', 'images/gregg_popovich.jpg', '<strong style=\"color: blue;\">Cuộc trò chuyện với HLV Gregg Popovich.</strong>', '<p style=\"color: green;\">Cuộc trò chuyện với HLV Gregg Popovich, người dẫn dắt đội tuyển bóng rổ quốc gia Mỹ, về chiến thuật và kế hoạch chuẩn bị cho các trận đấu sắp tới.</p>', '2024-04-23 13:45:00', 1, 1, 14),
(69, 'Phỏng vấn HLV John Smith về chiến thuật mới của đội bóng rổ Los Angeles Lakers', 'images/john_smith_lakers.jpg', 'HLV John Smith chia sẻ về chiến thuật mới của Los Angeles Lakers.', 'Trong buổi phỏng vấn, HLV John Smith của đội bóng rổ Los Angeles Lakers đã tiết lộ những chiến thuật mới mà đội bóng sẽ áp dụng trong mùa giải tới, nhằm nâng cao hiệu suất thi đấu.', '2024-04-21 13:30:00', 1, 0, 14),
(70, 'Phỏng vấn HLV Maria Garcia về mục tiêu của đội bóng rổ Barcelona', 'images/maria_garcia_barcelona.jpg', 'HLV Maria Garcia chia sẻ về mục tiêu của Barcelona trong mùa giải mới.', 'HLV Maria Garcia của đội bóng rổ Barcelona đã có những chia sẻ về mục tiêu và kế hoạch của đội trong mùa giải sắp tới trong cuộc phỏng vấn mới nhất.', '2024-04-20 11:00:00', 1, 0, 14),
(73, 'Tiến sĩ James Johnson phân tích về hiệu suất thi đấu của đội bóng rổ Chicago Bulls', 'images/james_johnson_chicago_bulls.jpg', '<strong style=\"color: blue;\">Tiến sĩ James Johnson đánh giá hiệu suất thi đấu của Chicago Bulls.</strong>', '<p style=\"color: green;\">Trong buổi phân tích, tiến sĩ James Johnson đã nhìn nhận về hiệu suất thi đấu của đội bóng rổ Chicago Bulls trong mùa giải gần đây và đưa ra những nhận định sâu sắc về điểm mạnh và điểm yếu của đội.</p>', '2024-04-19 10:15:00', 1, 0, 13),
(74, 'Đội bóng rổ thành phố New York đang đối diện với thách thức gì?', 'images/NY_basketball.jpg', '<strong style=\"color: blue;\">Đội bóng rổ thành phố New York đang đối diện với thách thức gì?</strong>', '<p style=\"color: green;\">Đội bóng rổ thành phố New York đang trải qua một giai đoạn khó khăn. Bài viết này phân tích những thách thức mà đội bóng đang đối mặt và những biện pháp cần thực hiện để vượt qua.</p>', '2024-04-30 11:00:00', 1, 0, 7),
(75, 'Phỏng vấn HLV Roberto Martínez - Đội tuyển bóng đá quốc gia Bỉ', 'images/roberto_martinez.jpg', '<strong style=\"color: blue;\">Phỏng vấn với HLV Roberto Martínez.</strong>', '<p style=\"color: green;\">Cuộc phỏng vấn với HLV Roberto Martínez, người dẫn dắt đội tuyển bóng đá quốc gia Bỉ, về chiến thuật và đào tạo các tài năng trẻ.</p>', '2024-04-24 09:15:00', 1, 0, 13);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `binhluan`
--

CREATE TABLE `binhluan` (
  `idbinhluan` int(11) NOT NULL,
  `idbaiviet` int(11) NOT NULL,
  `nguoidung` varchar(64) NOT NULL DEFAULT 'Anonymous',
  `noidung` longtext NOT NULL,
  `thoigian` datetime NOT NULL DEFAULT current_timestamp(),
  `tendangnhap` varchar(64) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `binhluan`
--

INSERT INTO `binhluan` (`idbinhluan`, `idbaiviet`, `nguoidung`, `noidung`, `thoigian`, `tendangnhap`) VALUES
(8, 75, 'user', 'sasasas', '2024-04-29 12:38:56', 'nhandang03'),
(9, 75, 'user', 'dsds', '2024-04-29 13:10:23', 'nhandang03'),
(10, 75, 'user', '1234', '2024-04-29 15:06:20', 'nhandang03'),
(11, 75, 'user', '1234', '2024-04-29 15:43:37', 'nhandang04');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lich_thi_dau`
--

CREATE TABLE `lich_thi_dau` (
  `id` int(11) NOT NULL,
  `tran_dau` varchar(255) NOT NULL,
  `ngay_thi` varchar(20) DEFAULT NULL,
  `gio_thi` varchar(20) DEFAULT NULL,
  `link_anh` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Đang đổ dữ liệu cho bảng `lich_thi_dau`
--

INSERT INTO `lich_thi_dau` (`id`, `tran_dau`, `ngay_thi`, `gio_thi`, `link_anh`) VALUES
(1, 'Manchester City vs Manchester United', '2024-02-25', '02:00:00', NULL),
(2, 'Arsenal vs Chelsea', '2024-03-01', '18:00:00', NULL),
(3, 'Real Madrid vs Barcelona', '2024-03-02', '20:00:00', NULL),
(4, 'Bayern Munich vs Borussia Dortmund', '2024-03-03', '15:30:00', NULL),
(5, 'Liverpool vs Manchester City', '2024-03-04', '16:30:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `loaitin`
--

CREATE TABLE `loaitin` (
  `idloaitin` int(11) NOT NULL,
  `tenloaitin` varchar(50) NOT NULL,
  `thutu` int(11) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `loaitin`
--

INSERT INTO `loaitin` (`idloaitin`, `tenloaitin`, `thutu`, `trangthai`) VALUES
(2, 'MỚI NHẤT', 2, 1),
(3, 'CHUYỂN NHƯỢNG', 3, 0),
(4, 'GOFT', 4, 1),
(5, 'ESPORT', 5, 1),
(6, 'FOOTBALL', 6, 1),
(7, 'VIỆT NAM', 7, 1),
(8, 'TENNIS', 8, 1),
(9, 'VOLLEYBALL', 9, 1),
(10, 'GÓC CHUYÊN GIA', 1, 0),
(11, 'ĐÁNH GIÁ', 2, 0),
(13, 'BASKETBALL', 7, 1),
(14, 'PHỎNG VẤN', 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `nguoidung`
--

CREATE TABLE `nguoidung` (
  `tendangnhap` varchar(64) NOT NULL,
  `hoten` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `matkhau` varchar(255) NOT NULL,
  `loai` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `nguoidung`
--

INSERT INTO `nguoidung` (`tendangnhap`, `hoten`, `email`, `matkhau`, `loai`) VALUES
('1234', 'dssds', 'dsdsdbsd@gmail.com', '$2y$10$S.azCIm/.bjosCSr62UaBOrO4eZg3hP4SHSAHjSEo6n50BBZzGxwS', 'user'),
('12345', '1234', '123456@gmail.com', '123456', 'admin'),
('admin', 'Nguyễn Thành Nhân', 'nguyenthanhnhantg15@gmail.com', 'admin', 'admin'),
('admin102', 'Nguyễn Thành Nhân', 'nguyenthanhnhantg15@gmail.com', '12345678', 'admin'),
('admin111', 'Nguyễn Thành Nhân', 'admin@gmail.com', '111111', 'admin'),
('dsadas', 'ADSdas', 'dasdasd@gmail.com', '$2y$10$6Mbn/DZrLxQ3YwNic96GFOy54LDbvhyJnJE1r95DYfvbxoYPIgnf2', 'user'),
('hao', 'hao', 'vonhathao641@gmail.com', '$2y$10$dsG6bpQ3Lkui9A51Kmkdu.8sGIOz1PM37VtqvRMtFYJrK9w08k5s.', 'user'),
('nhan11', 'Nguyễn Thành Nhân', 'nguyenthanhnhan@gmail.com', '$2y$10$Wk6iFcXGOaA4Gpzue6pju.uigr4UY1au6EFhpbo8g1yp/FThMehrO', 'user'),
('nhan123456', 'Nguyễn Thành Nhân', 'nguyenthanhnhan123456@gmail.com', '$2y$10$RBU0CRCxWNEETu/0cVUHcOCwdZtW.1tMIr68Z/za.s15KW8J86cTy', 'user'),
('nhandang', 'cxcxc', '1@gmail.com', '123456', 'admin'),
('nhandang02', 'dsdsdsd', 'sdsdkjsdkskd@gmail.com', '$2y$10$r5j11qA0otHDoLtOMd.vXOV9BU3lnFYtEy6tFf5jR/aI1QVCmwkSm', 'admin'),
('nhandang03', 'dsdsd', '123@gmail.com', '$2y$10$SFWk/MIkMj.weeAtnkSmeuNUbfuA7owyBQdIsNJTswo91NHUvOWqi', 'user'),
('nhandang04', 'Đặng Thành Nhân', '0982717527dtn@gmail.com', '$2y$10$PPNuoAo7nLU.lYmxiekb9uLjwu.SRzjTNjrRHuMeTIUFnYh27HE5m', 'user'),
('nhandeptrai', 'NguyễnThành Nhân', 'dada@gmail.com', '$2y$10$oT3ZN7lcphRhIJ5fLFuLwOly/NZso9QMhictBvyGmeL2FCctOR9bm', 'user'),
('nhandeptrai123', 'Nguyễn Thành Nhân', 'nguyenthanhnhan@gmail.com', '$2y$10$EOlpItiNGX16GOxXDnDKFOrsmoQk24jP8rsCU7umK1aoMJTwHeoLy', 'user'),
('sdad', 'Nguyen Thanh Nhan', 'dfdfd@gmaff.cpom', '$2y$10$XHMYJ0IZT6a3cj6Xy3S21uvupeHA4MXAFVs1kQy1/6TE6/H98A7FK', 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  ADD PRIMARY KEY (`idbaiviet`,`idloaitin`);

--
-- Chỉ mục cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`idbinhluan`),
  ADD KEY `idbaiviet` (`idbaiviet`);

--
-- Chỉ mục cho bảng `lich_thi_dau`
--
ALTER TABLE `lich_thi_dau`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  ADD PRIMARY KEY (`idloaitin`);

--
-- Chỉ mục cho bảng `nguoidung`
--
ALTER TABLE `nguoidung`
  ADD PRIMARY KEY (`tendangnhap`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `baiviet`
--
ALTER TABLE `baiviet`
  MODIFY `idbaiviet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- AUTO_INCREMENT cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `idbinhluan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `lich_thi_dau`
--
ALTER TABLE `lich_thi_dau`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `loaitin`
--
ALTER TABLE `loaitin`
  MODIFY `idloaitin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`idbaiviet`) REFERENCES `baiviet` (`idbaiviet`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
