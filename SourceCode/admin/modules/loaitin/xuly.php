<?php
include ("../../../db.php");
include ("popup.php");
// Lấy dữ liệu
if(isset($_POST['themloaitin']))
{
    $tenloaitin = $_POST['tenloaitin'];
    $thutu = $_POST['thutu'];
    $trangthai = $_POST['trangthai'];
    // Định nghĩa lệnh INSERT vào CSDL
    $sql = "INSERT INTO loaitin(tenloaitin, thutu, trangthai) VALUES('$tenloaitin', '$thutu', '$trangthai')";
    mysqli_query($conn, $sql);
    echo "<script>showPopup('Xác nhận', 'Bạn có chắc chắn muốn thêm không?', function() { window.location = '../../index.php?ac=loaitin'; }, function() { });</script>";
    exit;
}
elseif(isset($_POST['sualoaitin']))
{
    // Thực hiện sửa loại tin
    $tenloaitin = $_POST['tenloaitin'];
    $thutu = $_POST['thutu'];
    $trangthai = $_POST['trangthai'];
    // Định nghĩa câu lệnh sửa
    $sql = "UPDATE loaitin SET tenloaitin='$tenloaitin', thutu='$thutu', trangthai='$trangthai' WHERE idloaitin='$_GET[id]'";
    // Thực hiện câu lệnh đã định nghĩa
    mysqli_query($conn, $sql);
    echo "<script>showPopup('Xác nhận', 'Bạn có chắc chắn muốn sửa không?', function() { window.location = '../../index.php?sua=loaitin&id=$_GET[id]'; }, function() { });</script>";
    exit;
}
else
{
    // Thực hiện xóa
    $id = $_GET['id'];
    $sql = "DELETE FROM loaitin WHERE idloaitin='$id'";
    mysqli_query($conn, $sql);
    echo "<script>showPopup('Xác nhận', 'Bạn có chắc chắn muốn xóa\"$tenloaitin\" không?', function() { window.location = '../../index.php?ac=loaitin'; }, function() { });</script>";
    exit;
}
?>
