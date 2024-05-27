<?php
	$sql = "SELECT * FROM baiviet WHERE idbaiviet = '{$_GET['baiviet']}'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
     <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <div class="box-chitiet">
    	
        <p> <img src="<?php echo $row['anhminhhoa']; ?>" width="625" style="float:left; margin:3px;"> </p>
        <p class="tieude" style="text-align:center; font-size:18px;"> <?php echo $row['tenbaiviet']; ?> </p>
        <p class="tomtattin"> <?php echo $row['tomtat']; ?> </p>
        <p class="noidung"> <?php echo $row['noidung']; ?> </p>
    </div>
</body>
</html>
<?php
	} else {
		echo "Không tìm thấy bài viết";
	}
?>
