<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Comment</title>
    <style>
        .hm a {
            font-size: 25px;
            font-weight: bold;
            color: #FFF;
            text-decoration-thickness: 3px;
            text-underline-offset: 3px;
        }
        body {
            background-image: linear-gradient(90deg, rgb(160, 222, 219),rgb(3, 165, 209));
        }
    </style>
</head>
<body>
<?php
include("db.php");
session_start();

// Kiểm tra kết nối đến cơ sở dữ liệu
if (!$conn) {
    die("Kết nối đến cơ sở dữ liệu thất bại: " . mysqli_connect_error());
}

if (isset($_POST['idbaiviet'], $_POST['noidung'], $_POST['idloaitin'])) {
        $baiviet_id = mysqli_real_escape_string($conn, $_POST['idbaiviet']);
        $loaitin_id = mysqli_real_escape_string($conn, $_POST['idloaitin']);
} else {
        echo "Dữ liệu không hợp lệ!";
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    if (isset($_POST['idbaiviet'], $_POST['noidung'], $_POST['idloaitin'])) {
        $baiviet_id = mysqli_real_escape_string($conn, $_POST['idbaiviet']);
        $tendangnhap = $_SESSION['user'];
        $loai = $_SESSION['loai'];
        $loaitin_id = mysqli_real_escape_string($conn, $_POST['idloaitin']);
        $noidung = mysqli_real_escape_string($conn, $_POST['noidung']);


        $sql = "INSERT INTO binhluan (idbaiviet, tendangnhap, noidung, nguoidung)
                VALUES ('$baiviet_id', '$tendangnhap', '$noidung', '$loai')";

        if (mysqli_query($conn, $sql)) {
            echo "Bình luận đã được lưu thành công!";
        } else {
            echo "Có lỗi xảy ra khi thực hiện truy vấn: " . mysqli_error($conn);
        }
    } else {
        echo "Dữ liệu không hợp lệ!";
    }
} else {
    echo "Bạn cần đăng nhập để bình luận! <a href='login.php'>Đăng nhập</a>"; 
}

// Đóng kết nối đến cơ sở dữ liệu
mysqli_close($conn);
?>

<div class="hm" style="position: absolute; top: 20px; right: 40px; ">
    <a href="index.php?xem=baiviet&loaitin=<?php echo $loaitin_id; ?>&baiviet=<?php echo $baiviet_id; ?>">Trở về</a>
    <!-- thay đổi link theo tên miền -->
</div>
</body>
</html>