<?php 
include ("../../../db.php");
include("popup.php");
// Lấy dữ liệu
if (isset($_POST['themnguoidung'])) {
    $hoten = $_POST['hoten']; 
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];
    $email = $_POST['email'];
    $loai = $_POST['loai'];

    // Kiểm tra loại người dùng và mã hóa mật khẩu nếu không phải "admin"
    if ($loai === "admin") {
        $hashed_password = $matkhau; // Không mã hóa nếu là admin
    } else {
        $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT); // Mã hóa cho các loại người dùng khác
    }

    // Định nghĩa lệnh insert vào CSDL
    $sql = "INSERT INTO nguoidung (hoten, tendangnhap, matkhau, email, loai) VALUES ('$hoten', '$tendangnhap', '$hashed_password', '$email', '$loai')";
    mysqli_query($conn, $sql);

    echo "<script>showPopup('Xác nhận', 'Bạn đã thêm thành công!', function() { window.location = '../../index.php?ac=nguoidung'; }, function() { });</script>";
    exit;
} elseif (isset($_POST['suanguoidung'])) {
    // Thực hiện sửa người dùng
    $hoten = $_POST['hoten']; 
    $tendangnhap = $_POST['tendangnhap'];
    $matkhau = $_POST['matkhau'];
    $email = $_POST['email'];
    $loai = $_POST['loai'];

    // Kiểm tra loại người dùng và mã hóa mật khẩu nếu không phải "admin"
    if ($loai === "admin") {
        $hashed_password = $matkhau; // Không mã hóa nếu là admin
    } else {
        $hashed_password = password_hash($matkhau, PASSWORD_DEFAULT); // Mã hóa cho các loại người dùng khác
    }

    // Định nghĩa câu lệnh sửa
    $sql = "UPDATE nguoidung SET hoten = '$hoten', tendangnhap = '$tendangnhap', matkhau = '$hashed_password', email = '$email', loai = '$loai' WHERE tendangnhap = '$tendangnhap'";

    // Thực hiện câu lệnh đã định nghĩa
    mysqli_query($conn, $sql);

    echo "<script>showPopup('Xác nhận', 'Bạn đã sửa thành công!', function() { window.location = '../../index.php?ac=nguoidung'; }, function() { });</script>";
    exit;
} else {
    // Thực hiện xóa
    $tendangnhap = $_GET['tendangnhap'];
    $sql = "DELETE FROM nguoidung WHERE tendangnhap = '$tendangnhap'";
    mysqli_query($conn, $sql);

    // Chuyển hướng sau khi xóa thành công
    echo "<script>showPopup('Xác nhận', 'Bạn có chắc chắn muốn xóa không?', function() { window.location = '../../index.php?ac=nguoidung'; }, function() { });</script>";
    exit;
}

?>
