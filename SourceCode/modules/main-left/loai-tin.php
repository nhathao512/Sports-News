<?php
    include ("db.php");

    // Chuỗi truy vấn chọn 10 bài viết thuộc cùng một loại tin
    $sql = "SELECT * FROM baiviet WHERE idloaitin = '{$dong['idloaitin']}' LIMIT 10";
    $baiviet = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <div class="box">
        <div class="tieude">
            <img src="images/icon/5.png" style="float:left; margin-right:3px; padding-top:7px;">
            <p class="tieudekhung"> <?php echo $dong['tenloaitin']; ?></p>
        </div>
    
        <div class="box-left">
            <?php 
                if ($baiviet->num_rows > 0) {
                    $dong_baiviet = $baiviet->fetch_assoc();
            ?>               
            <img src="<?php echo $dong_baiviet['anhminhhoa']; ?>" width="150" style="margin:3px; float:left;">
            <p class="tieude">
                <a href="index.php?xem=baiviet&loaitin=<?php echo $dong_baiviet['idloaitin'];?>&baiviet=<?php echo $dong_baiviet['idbaiviet']; ?>">
                    <?php echo $dong_baiviet['tenbaiviet']; ?>
                </a>
            </p>
            <p class="tomtattin"><?php echo $dong_baiviet['tomtat']; ?> </p>
            <?php 
                }
            ?>
        </div>
    
        <div class="box-right">
            <ul class="danhsachtin">
                <?php 
                    if ($baiviet->num_rows > 0) {
                        while ($dong_baiviet = $baiviet->fetch_assoc()) {
                ?>
                        <li> 
                            <a href="index.php?xem=baiviet&loaitin=<?php echo $dong_baiviet['idloaitin'];?>&baiviet=<?php echo $dong_baiviet['idbaiviet']; ?>">
                                <?php echo $dong_baiviet['tenbaiviet']; ?>
                            </a>    
                        </li>
                <?php 
                        }
                    }
                ?>                               
            </ul>           
        </div>
        <div class="xoa">
            <!--Kết thúc bất kỳ box nào bên trong có độ cao và float:left hoặc float:right thì phải xóa đi-->
        </div>
    </div>    
</body>
</html>