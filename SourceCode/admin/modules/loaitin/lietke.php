<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        table 
        {
            background-color: white;
            
        }
    </style>
</head>

<body>
    <div class="container mt-2">
        <!-- Responsive table container -->
        <div class="table-responsive background-white">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th colspan="6" class="text-center"><b>DANH SÁCH LOẠI TIN</b></th>
                    </tr>
                    <tr class="text-center font-weight-bold">
                        <th>STT</th>
                        <th>Tên loại tin</th>
                        <th>Thứ tự</th>
                        <th>Lựa chọn</th>
                        <th colspan="2">Quản trị</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- PHP code to fetch data would go here -->
                    <?php
                    include("../db.php");

                    // Lấy dữ liệu từ CSDL
                    $sql = "SELECT * FROM loaitin";
                    $loaitin = mysqli_query($conn, $sql);

                    // Hiển thị dữ liệu
                    $i = 1;
                    while ($dong = mysqli_fetch_array($loaitin)) {
                        // Thực hiện in ra màn hình
                        echo "<tr>";
                        echo "<td style='text-align:center'>" . $i . "</td>";
                        echo "<td width=300>" . $dong['tenloaitin'] . "</td>";
                        echo "<td width=60 style='text-align:center'>" . $dong['thutu'] . "</td>";

                        $trangthai = ($dong['trangthai'] == 1) ? "Menu 2" : "Menu 1";
                        echo "<td width=80 style='text-align:center'>" . $trangthai . "</td>";

                        echo "<td width=30 > <a  href=index.php?sua=loaitin&id=" . $dong['idloaitin'] . " >Sửa </a></td>";
                        echo "<td width=30> <a href=modules/loaitin/xuly.php?id=" . $dong['idloaitin'] . ">Xóa </a></td>";
                        
                        echo "</tr>";
                        $i++;
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>

</html>