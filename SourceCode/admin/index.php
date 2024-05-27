<?php
session_start(); // Bắt đầu phiên làm việc

// Kiểm tra nếu người dùng đã nhấn nút "Thoát"
if (isset($_GET['logout'])) {
    // Xóa tất cả dữ liệu phiên
    session_unset();
    session_destroy();

    // Chuyển hướng đến trang đăng nhập
    header("Location: https://pkuc.site/login.php");
    exit;
}

// Kiểm tra nếu người dùng chưa đăng nhập
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // Chuyển hướng đến trang đăng nhập
    header("Location: https://pkuc.site/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản trị</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/gif" href="image/icon/Flag.png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    /* Nền và cơ bản */
    body {
        background-image: linear-gradient(90deg, rgb(160, 222, 219), rgb(3, 165, 209));
        font-family: 'Arial', sans-serif; /* Font chung cho toàn bộ trang */
    }

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

    /* Menu điều chỉnh */
    .nav {
        box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        display: flex; /* Bật flexbox */
        justify-content: center; /* Căn giữa các item theo trục chính */
        align-items: center; /* Căn giữa các item theo trục phụ */
        background-color: white;
        padding: 20px;
    }

    .nav-item {
        margin: 0 20px; /* Khoảng cách giữa các item */
    }

    .nav-link {
        color: #07575B; /* Màu chữ cho link */
        transition: color 0.3s;
        font-size: 18px; /* Tăng kích thước font */
        font-weight: bold; /* Làm đậm chữ */
    }

    .nav-link:hover {
        color: #003B46; /* Màu khi hover */
    }

    /* Phần các box */
    .box {
        text-align: center;
        margin-top: 15px;
        padding: 10px;
        border-radius: 8px;
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        background-color: white;
    }

    .box:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.15);
    }

    .box img {
        width: 48px;
        height: auto;
    }

    .box .tieude {
        color: #333;
        font-weight: bold;
        margin-top: 5px;
        
    }

    /* Điều chỉnh bottom content */
    .main-bottom {
        padding: 20px;
        
        border-radius: 8px;
        margin-top: 20px;
    }
    
</style>

</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="khung">
                    <div class="menu">
                        <ul class="nav">
                            <li class="nav-item" align="center">
                                <a class="nav-link" href="https://pkuc.site/admin/index.php"><img src="image/icon/Home.png" width="30" /> TRANG CHỦ</a>
                            </li>
                        </ul>
                    </div>
                    <div class="main-top">
                        <div class="row">
                            <div class="col-6 col-sm-6 col-md-3">
                                <div class="box">
                                    <a href="index.php?ac=loaitin">
                                        <img src="image/icon/app_48.png" />
                                        <p class="tieude"> QUẢN LÝ LOẠI TIN</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3">
                                <div class="box">
                                    <a href="index.php?ac=baiviet">
                                        <img src="image/icon/Edit.png" />
                                        <p class="tieude"> QUẢN LÝ BÀI VIẾT</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3">
                                <div class="box">
                                    <a href="index.php?ac=nguoidung">
                                        <img src="image/icon/users_two_48.png" />
                                        <p class="tieude"> QUẢN LÝ NGƯỜI DÙNG</p>
                                    </a>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6 col-md-3">
                                <div class="box">
                                    <a href="index.php?logout=true">
                                        <img src="image/icon/Close.png" />
                                        <p class="tieude"> THOÁT</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="main-bottom" align="center">
                            <?php
                            if (isset($_GET['ac'])) {
                                if ($_GET['ac'] == 'loaitin') {
                                    include("modules/loaitin/them.php");
                                    include("modules/loaitin/lietke.php");
                                }
                                if ($_GET['ac'] == 'baiviet') {
                                    include("modules/baiviet/them.php");
                                    include("modules/baiviet/lietke.php");
                                }
                                if ($_GET['ac'] == 'nguoidung') {
                                    include("modules/nguoidung/them.php");
                                    include("modules/nguoidung/lietke.php");
                                }
                            }
                            if (isset($_GET['sua'])) {
                                if ($_GET['sua'] == 'loaitin') {
                                    include("modules/loaitin/sua.php");
                                    include("modules/loaitin/lietke.php");
                                }

                                if ($_GET['sua'] == 'baiviet') {
                                    include("modules/baiviet/sua.php");
                                    include("modules/baiviet/lietke.php");
                                }
                                if ($_GET['sua'] == 'nguoidung') {
                                    include("modules/nguoidung/sua.php");
                                    include("modules/nguoidung/lietke.php");
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button onclick="topFunction()" id="myBtn" title="Go to top"><i class="fas fa-chevron-up"></i></button>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
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
