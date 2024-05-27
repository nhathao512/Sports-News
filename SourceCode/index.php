<?php
    include("db.php"); // Include the database connection
    session_start(); // Start session for login/logout
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sport News</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/gif" href="images/favicon.jpg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <style>
        #myBtn {
            display: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
            z-index: 99;
            font-size: 18px;
            border: none;
            outline: none;
            background-color: #CC3366;
            color: white;
            cursor: pointer;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
    
        #myBtn:hover {
            background-color: #CC6666; /* Màu tối hơn khi hover */
        }
        
        .banner img {
            max-width: 100%;
            height: auto;
        }
        
        .banner
        {
            width: 30%;
        	height:100px;
        	background-color:#FFFFFF;
        
        	padding-top:1%;
        	margin-left:30%;
        	margin-right:auto;
        }

        .menuc {
            width:100%;
	        
            /*background-color: rgb(3, 165, 209);*/
            background-image: linear-gradient(90deg, rgb(3, 165, 209), rgb(160, 222, 219));
            border-bottom: 2px solid #ddd;
            color:#ebf0eb;
        	display:block;
        	font-weight:bold;
	        font-size:15px;
	        margin-left:auto;
	        margin-right:auto;
	        padding-bottom: 10px;
        }

        .menuc ul {
            list-style: none;
            padding: 10px;
            margin: 0;
            display: flex;
            justify-content: space-around;
        }

        .menuc li {
            /*padding: 10px 20px;*/
            text-transform: uppercase;
            margin-right: 30px;
            list-style-type:none;
        	float:left;
        	color:#FFF;
        }

        .menuc a {
            text-decoration: none;
            color: inherit;
        }

        .menuc a:hover {
            color: #b21117;
        }
        
        .menuc li:hover{
        	color:#000040;
        }
        
        .menu
        {
            width:100%;
            background-color:rgb(3, 165, 209);
	        color: white;
	        font-weight:bold;
	        font-size:15px;
	        padding-left:5%;
	        margin-left:auto;
	        margin-right:auto;
	        margin-top:30px;
        }
        
        .menu li{
        	list-style-type:none;
        	float:left;
        	padding-left:10px;
        	padding-right:10px;
    
        }
        
        .menu a {
            text-decoration: none;
            color:#ffffff;
        }
        
        .menu a:hover {
            color: #b21117;
        }
        
        .menu li:hover{
        	color:#000040;
        }

        .section-title {
            color: #b21117;
            font-size: 15px;
            border-bottom: 5px #8c8c8c solid;
        }
        
        .btn-outline-success 
        {
            background-color: white;
            color: black;
            border: 2px solid white;
        }

        .xoa {
            clear: both;
        }

        .des {
            font-family: Arial;
            padding: 20px;
            background-color: #5dafd2;
            border-top: 2px solid #00a6ff;
        }

        .des p {
            margin: 0;
            line-height: 1.5;
        }
        
        .navbar-toggler
        {
            background-color: #55a3df;
        }
        
        .navbar-toggler-icon
        {
            color: white;
        }
        
        
        footer 
        {
            background-color: rgb(10, 165, 209);
            color: #fff;
            padding: 10px;
            text-align: center;
        }
        
        .comments {
            width: 80%;
            margin: auto;
            padding: 20px;
            background-color: #f2f2f2;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0,0,0,0.1);
        }
        
        .comments h3 {
            color: #333;
            font-size: 24px;
            margin-bottom: 20px;
        }
        
        #commentForm {
            margin-bottom: 30px;
        }
        
        #commentForm input[type="text"],
        #commentForm textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        
        #commentForm button {
            padding: 10px 20px;
            background-color: #007BFF;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        
        .comment {
            padding: 10px;
            border-bottom: 1px solid #ddd;
        }
        
        .comment p {
            margin: 0;
        }
        
        .comment p small {
            display: block;
            color: #888;
            margin-top: 5px;
        }

        
        
    </style>
</head>

<body>
    

    

    <!-- Menu Section -->
    <div class="menuc navbar navbar-expand-sm">
        <div class="container">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="index.php">Trang chủ</a></li>
                    <?php
                    $sql = "SELECT * FROM loaitin WHERE trangthai=1 ORDER BY thutu ASC";
                    $result = mysqli_query($conn, $sql);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<li class='nav-item'><a class='nav-link' href='index.php?xem=loaitin&loaitin=" . $row['idloaitin'] . "'>" . $row['tenloaitin'] . "</a></li>";
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div>
    
    <!-- Banner at the Top -->
    <div class="banner text-center">
        <a href="index.php" title="Trang chủ">
            <img src="images/SportNews.png" alt="Sport News">
        </a>
    </div>

    <!-- Navigation Menu -->
    <nav class="menu navbar navbar-expand-lg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"><i class="fa fa-bars" aria-hidden="true"></i></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mr-auto">
                <?php
                $sql = "SELECT * FROM loaitin WHERE trangthai=0 ORDER BY thutu ASC";
                $result = mysqli_query($conn, $sql);

                while ($row = mysqli_fetch_array($result)) {
                    echo "<li class='nav-item'><a class='nav-link' href='index.php?xem=loaitin&loaitin=" . $row['idloaitin'] . "'>" . $row['tenloaitin'] . "</a></li>";
                }
                ?>
            </ul>
            <form class="form-inline my-2 my-lg-0" action="" method="GET">
                <input class="form-control mr-sm-2" type="search" name="search" placeholder="Tìm kiếm..." aria-label="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Tìm kiếm</button>
            </form>
            <?php
            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
                echo "<a class='nav-link' href='logout.php'><i class='fa fa-user' aria-hidden='true'></i> Đăng Xuất</a>";
            } 
            else {
                echo "<a class='nav-link' href='login.php'><i class='fa fa-user' aria-hidden='true'></i> Đăng Nhập</a>";
            }
            ?>
        </div>
    </nav>

    <!-- Main Content Area -->
    <div class="container-fluid mt-4">
        <div class="row">
             
            <!-- Left Sidebar -->
            <div class="col-md-3">
                <div class="main-mid">
                    <h3 class="section-title">TIN NỔI BẬT</h3>
                    <?php
                    $sql = "SELECT * FROM baiviet WHERE vitri = 1 ORDER BY idbaiviet DESC";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($dong = mysqli_fetch_assoc($result)) {
                            echo "<a href='index.php?xem=baiviet&baiviet=" . $dong['idbaiviet'] . "'>";
                            echo "<li>" . $dong['tenbaiviet'] . "</li>";
                            echo "</a>";
                        }
                    } else {
                        echo "Không có tin nổi bật nào";
                    }
                    ?>
                    <h3 class="section-title">PHỎNG VẤN</h3>
                    <?php
                    $sql = "SELECT * FROM baiviet WHERE idloaitin = 14 ORDER BY idbaiviet DESC";
                    $result = mysqli_query($conn, $sql);

                    if ($result->num_rows > 0) {
                        while ($dong = mysqli_fetch_assoc($result)) {
                            echo "<a href='index.php?xem=baiviet&baiviet=" . $dong['idbaiviet'] . "'>";
                            echo "<li>" . $dong['tenbaiviet'] . "</li>";
                            echo "</a>";
                        }
                    } else {
                        echo "Không có phỏng vấn nào";
                    }
                    ?>
                </div>
            </div>

            <!-- Main Content -->
            <div class="col-md-5">
                <div class="main-left">
                    <?php
                    if (isset($_GET['xem']) && $_GET['xem'] == 'baiviet') 
                    {
                        $baiviet_id = $_GET['baiviet'];
                        $sql = "SELECT * FROM baiviet WHERE idbaiviet = '$baiviet_id'";
                        $result = mysqli_query($conn, $sql);

                        if ($result->num_rows > 0) 
                        {
                            $row = mysqli_fetch_assoc($result);
                            $loaitin_id = $row['idloaitin'];
                    ?>
                            <div class="box-chitiet">
                                <p><img src="<?php echo $row['anhminhhoa']; ?>" width="100%" style="margin:3px;"></p>
                                <p class="tieude" style="text-align:center; font-size:18px;"><?php echo $row['tenbaiviet']; ?></p>
                                <p class="tomtattin"><?php echo $row['tomtat']; ?></p>
                                <p class="noidung"><?php echo $row['noidung']; ?></p>
                            </div>

                            <!-- Hiển thị bình luận -->
                            <div class="comments">
                                <h3>Bình luận</h3>
                                <!-- Biểu mẫu để người dùng nhập nội dung bình luận -->
                        
                                    <form id="commentForm" action="save_comment.php" method="post">
                                    <input type="hidden" name="idbaiviet" value="<?php echo $baiviet_id; ?>">
                                    <input type="hidden" name="idloaitin" value="<?php echo $loaitin_id; ?>">
                                    <textarea name="noidung" placeholder="Nhập nội dung bình luận" required></textarea><br>
                                    <button type="submit">Bình luận</button>
                                </form>

                                
                                
                                <?php
                                // Lấy và hiển thị bình luận
                                $sql_comments = "SELECT * FROM binhluan WHERE idbaiviet = $baiviet_id ORDER BY thoigian DESC";
                                $result_comments = mysqli_query($conn, $sql_comments);
                            
                                if ($result_comments && mysqli_num_rows($result_comments) > 0) {
                                    while ($comment = mysqli_fetch_assoc($result_comments)) {
                                        echo "<div class='comment'>";
                                        echo "<p><strong>" . htmlspecialchars($comment['tendangnhap']) . "</strong>: " . htmlspecialchars($comment['noidung']) . "</p>";
                                        echo "<p><small>" . $comment['thoigian'] . "</small></p>";
                                        echo "</div>";
                                    }
                                } else {
                                    echo "<p>Chưa có bình luận nào.</p>";
                                }
                                ?>
                            </div>



                    <?php
                        } else {
                            echo "Không tìm thấy bài viết.";
                        }
                    }
                    
                    else if (isset($_GET['search'])) {
                        // Thiết lập số lượng kết quả mỗi trang
                        $num_per_page = 4; // Số bài viết mỗi trang
                        $page = isset($_GET['page']) ? (int) $_GET['page'] : 1; // Trang hiện tại
                        $offset = ($page - 1) * $num_per_page; // Vị trí bắt đầu

                        // Thực hiện truy vấn tìm kiếm với LIMIT và OFFSET
                        $keyword = mysqli_real_escape_string($conn, $_GET['search']);
                        $sql = "SELECT * FROM baiviet 
                               WHERE tenbaiviet LIKE '%$keyword%' 
                               OR tomtat LIKE '%$keyword%' 
                               OR noidung LIKE '%$keyword%' 
                               LIMIT $offset, $num_per_page";

                        $result = mysqli_query($conn, $sql);
                        
                        if (mysqli_num_rows($result) > 0) {
                            echo "<h3>Kết quả tìm kiếm cho: '" . htmlspecialchars($keyword) . "'</h3>";
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<div class='d-flex border-bottom pb-3 mb-3'>";
                                echo "<img src='" . $row['anhminhhoa'] . "' alt='' width='150' style='margin:3px;'>";
                                echo "<div>";
                                echo "<p class='tieude'><a href='index.php?xem=baiviet&baiviet=" . $row['idbaiviet'] . "'>" . $row['tenbaiviet'] . "</a></p>";
                                echo "<p class='tomtattin'>" . $row['tomtat'] . "</p>";
                                echo "</div>";
                                echo "</div>";
                            }
                            
                            // Hiển thị liên kết phân trang
                            $sql_total = "SELECT COUNT(*) AS total FROM baiviet 
                                         WHERE tenbaiviet LIKE '%$keyword%' 
                                         OR tomtat LIKE '%$keyword%' 
                                         OR noidung LIKE '%$keyword%'";
                            $result_total = mysqli_query($conn, $sql_total);
                            $total_records = mysqli_fetch_assoc($result_total)['total'];
                            $total_pages = ceil($total_records / $num_per_page);

                            echo "<div class='pagination d-flex justify-content-center'>";
                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<a href='index.php?search=" . urlencode($keyword) . "&page=" . $i . "' class='btn " . (($i == $page) ? 'btn-primary' : 'btn-outline-primary') . "'>$i</a>";
                            }
                            echo "</div>";

                        } else {
                            echo "<p>Không tìm thấy kết quả nào cho từ khóa: '" . htmlspecialchars($keyword) . "'.</p>";
                        }
                    } else if (isset($_GET['xem']) && $_GET['xem'] == 'loaitin') {
                        // Hiển thị bài viết theo loại tin
                        $loaitin_id = $_GET['loaitin'];
                        $num = 4; // Số bài viết mỗi trang
                        $trang = isset($_GET['trang']) ? $_GET['trang'] : 1;
                        $batdau = ($trang - 1) * $num;

                        $sql = "SELECT * FROM baiviet WHERE idloaitin = '$loaitin_id' LIMIT $batdau, $num";
                        $baiviet = mysqli_query($conn, $sql);

                        ?>
                        <div class="box-chitiet">
                            <?php
                            if ($baiviet->num_rows > 0) {
                                while ($dong = mysqli_fetch_assoc($baiviet)) {
                                    ?>
                                    <div class="d-flex border-bottom pb-3 mb-3">
                                        <img src="<?php echo $dong['anhminhhoa']; ?>" alt="" width='150' style='margin:3px;'>
                                        <div>
                                            <p class='tieude'>
                                                <a href="index.php?xem=baiviet&baiviet=<?php echo $dong['idbaiviet']; ?>">
                                                    <?php echo $dong['tenbaiviet']; ?>
                                                </a>
                                            </p>
                                            <p class='tomtattin'>
                                                <?php echo $dong['tomtat']; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php
                                }
                            } else {
                                echo "Không có bài viết nào.";
                            }
                            ?>
                        </div>

                        <!-- Phân trang -->
                        <div class="pagination d-flex justify-content-center">
                            <?php
                            $sql = "SELECT COUNT(*) AS total FROM baiviet WHERE idloaitin = '$loaitin_id'";
                            $result = mysqli_query($conn, $sql);
                            $total_records = mysqli_fetch_assoc($result)['total'];
                            $total_pages = ceil($total_records / $num);

                            for ($i = 1; $i <= $total_pages; $i++) {
                                echo "<a href='index.php?xem=loaitin&loaitin=" . $loaitin_id . "&trang=" . $i . "' class='btn " . (($i == $trang) ? 'btn-primary' : 'btn-outline-primary') . "'>$i</a>";
                            }
                            ?>
                        </div>
                        <?php
                    } else {
                        // Phần hiển thị bài viết chính
                        include("modules/main-left/tin-moi.php");
                        $sql = "SELECT * FROM loaitin";
                        $loaitin = mysqli_query($conn, $sql);
                        while ($dong = mysqli_fetch_array($loaitin)) {
                            include("modules/main-left/loai-tin.php");
                        }
                    }
                    ?>
                </div>
            </div>

            <!-- Right Sidebar -->
            <div class="col-md-4">
                <div class="main-right">
                    <h3 class="section-title">LỊCH THI ĐẤU</h3>
                    <div class="schedule-table">
                        <div style="font-weight:bold;" class="schedule-header row">
                            <div class="col-md-6">Trận đấu</div>
                            <div class="col-md-3">Ngày thi đấu</div>
                            <div class="col-md-3">Giờ thi đấu</div>
                        </div>
                        <?php
                        $query = "SELECT * FROM lich_thi_dau";
                        $result = mysqli_query($conn, $query);

                        if ($result->num_rows > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                                <div class="schedule-row row">
                                    <div class='col-md-6'><?php echo $row['tran_dau']; ?></div>
                                    <div class='col-md-3'><?php echo $row['ngay_thi']; ?></div>
                                    <div class='col-md-3'><?php echo $row['gio_thi']; ?></div>
                                </div>
                        <?php
                            }
                        } else {
                            echo "<div class='no-schedule'>Không có lịch thi đấu nào.</div>";
                        }

                        mysqli_close($conn); // Đóng kết nối
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <div class="des">
        
        <div class="row">
            <div class="col-12 col-md-6">
                <p>Bản quyền và phát triển bởi Công ty Sport News</p>
                <p>Địa chỉ: 19 Nguyễn Hữu Thọ, Phường Tân Phong, Quận 7, TP. Hồ Chí Minh.</p>
                <p>Điện thoại: (84-8) 38251028, fax: (84-8) 38251049.</p>
            </div>
            <div class="col-12 col-md-6">
                <p>Toàn bộ nội dung bài viết, ý kiến thành viên được kiểm duyệt, cung cấp và bảo trợ thông tin bởi Sport News – Tổng Liên Đoàn Lao Động.</p>
            </div>
        </div>
        <div class="row  mt-3">
            <div class="col-12 col-md-6">
                <p>Quảng cáo: 0123 45 67 89 - Email: commedia.ad@gmail.com</p>
                <p>Tòa soạn & hỗ trợ: (84-8) 12345678 - Email: sportnews@bongda.com.vn</p>
            </div>
            <div class="col-12 col-md-6">
                <p>Chịu trách nhiệm nội dung: Nhà báo, Tiến sĩ Phùng Thanh Độ - Trưởng chi nhánh phía Nam</p>
                <p>Trần Mạnh Quang - Phó giám đốc Công ty Sport News</p>
            </div>
        </div>
    </div>
    <footer>
        <p>Copyright &copy; 2024 Sport News.</p>
    </footer>



    <!-- Include necessary scripts -->
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        window.onscroll = function () { scrollFunction() };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                document.getElementById("myBtn").style.display = "block";
            } else {
                document.getElementById("myBtn").style.display = "none";
            }
        }

        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
        
    </script>

</body>

</html>