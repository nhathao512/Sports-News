<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .table 
        {
            background-color: white;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Tên Người Dùng</th>
                                <th>Tên Đăng Nhập</th>
                                <th>Mật Khẩu</th>
                                <th>Liên Hệ</th>
                                <th>Loại </th>
                                <th colspan="2">Quản trị</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            include("../db.php");
                            $sql = "SELECT * FROM nguoidung";
                            $nguoidung = mysqli_query($conn, $sql);
                            $i = 1;
                            while ($dong = mysqli_fetch_array($nguoidung)) {
                                echo "<tr>";
                                echo "<td>" . $i . "</td>";
                                echo "<td>" . $dong['hoten'] . "</td>"; // Thay đổi từ 'ten' thành 'hoten'
                                echo "<td>" . $dong['tendangnhap'] . "</td>";
                                echo "<td>" . $dong['matkhau'] . "</td>";
                                echo "<td>" . $dong['email'] . "</td>"; // Thêm hiển thị cột 'email'
                                echo "<td>" . $dong['loai'] . "</td>";
                                echo "<td><a href=index.php?sua=nguoidung&tendangnhap=" . $dong['tendangnhap'] . ">Sửa</a></td>";
                                echo "<td><a href=modules/nguoidung/xuly.php?tendangnhap=" . $dong['tendangnhap'] . ">Xóa</a></td>";
                                echo "</tr>";
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>