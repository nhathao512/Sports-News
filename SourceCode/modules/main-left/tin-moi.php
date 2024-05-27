<?php
    include ("db.php");
    // Chuỗi truy vấn lấy 10 bài viết mới nhất trong bảng bài viết
    $sql = "SELECT * FROM baiviet WHERE 1=1 ORDER BY idbaiviet DESC LIMIT 10";
    $result = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <div class="box">
        <div class="box-left">
            <?php 
                if ($result->num_rows > 0) {
                    $dong = $result->fetch_assoc();
            ?>               
            <img src="<?php echo $dong['anhminhhoa']; ?>" width="380">
            <p class="tieude">
                <a href="index.php?xem=baiviet&loaitin=<?php echo $dong['idloaitin']; ?>&baiviet=<?php echo $dong['idbaiviet']; ?>">
                    <?php echo $dong['tenbaiviet']; ?>
                </a>
             </p>
            <p class="tomtattin"><?php echo $dong['tomtat']; ?> </p>
            <?php 
                }
            ?>
        </div>
        <div class="box-right">
            <ul class="danhsachtin">
                <?php 
                    if ($result->num_rows > 0) {
                        while ($dong = $result->fetch_assoc()) {
                ?>
                    <li> 
                        <a href="index.php?xem=baiviet&loaitin=<?php echo $dong['idloaitin']; ?>&baiviet=<?php echo $dong['idbaiviet']; ?>">
                            <?php echo $dong['tenbaiviet']; ?>    
                         </a>
                    </li>
                <?php 
                    }
                }
                ?>                    
                  
            </ul>
        </div>
        <div class="xoa"> </div>
        <?php
            include("modules/main-left/tin-noi-bat.php");
        ?>
        <div class="xoa">
        </div>
    </div>
</body>
</html>