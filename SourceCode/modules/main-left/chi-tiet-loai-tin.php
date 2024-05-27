<?php
    include "db.php";
    $num = 4; // Số bài viết trên mỗi trang
    if (isset($_GET['trang'])) {
        $trang = $_GET['trang']; // Số trang đang xem hiện tại
    } else {
        $trang = 1;
    }
    $batdau = ($trang - 1) * $num;

    // Kết nối đến cơ sở dữ liệu
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Kiểm tra kết nối
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Chuỗi truy vấn lấy bài viết của một loại tin cụ thể trên một trang cụ thể
    $sql = "SELECT * FROM baiviet WHERE idloaitin = '{$_GET['loaitin']}' LIMIT $batdau, $num";
    $baiviet = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <div class="box-chitiet">
        <?php while ($dong = $baiviet->fetch_assoc()) {?>
            <div style="float:left; border-bottom:1px solid #CCC;" >
                <a href="index.php?xem=baiviet&loaitin=<?php echo $dong['idloaitin'];?>&baiviet=<?php echo $dong['idbaiviet']; ?>">
                    <p> <img src="<?php echo $dong['anhminhhoa']; ?>" width="150" style="float:left; margin:3px;"> </p>
                </a>
                <p class="tieude"> 
                    <a href="index.php?xem=baiviet&loaitin=<?php echo $dong['idloaitin'];?>&baiviet=<?php echo $dong['idbaiviet']; ?>">
                        <?php echo $dong['tenbaiviet']; ?> 
                    </a>
                </p>
                <p class="tomtattin"> <?php echo $dong['tomtat']; ?> </p>
            </div> 
            <div style="clear:both"> </div>
        <?php }?>
    </div>
</body>
</html>