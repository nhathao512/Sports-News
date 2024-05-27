<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    <style>
        form 
        {
            background-color: white;
            padding: 10px;
            border-radius: 15px;
        }
    </style>

</head>
<body>
  
<?php
include("../db.php");

$id = $_GET['id'];
$sql = "SELECT * FROM loaitin WHERE idloaitin='$id'";
$ketqua = mysqli_query($conn, $sql);
$dong = mysqli_fetch_array($ketqua);
?>
<div class="container">
    <div class="col-md-7 offset">
        <h3>CHỨC NĂNG SỬA LOẠI TIN</h3>
        <form action="modules/loaitin/xuly.php?id=<?php echo $dong['idloaitin']; ?>" method="post">
            <div class="mb-4">
                <label for="tenloaitin">Loại tin:</label>
                <input type="text" class="form-control" id="tenloaitin" name="tenloaitin" value="<?php echo $dong['tenloaitin']; ?>">
            </div>
            <div class="mb-4">
                <label for="thutu">Thứ tự:</label>
                <input type="text" class="form-control" id="thutu" name="thutu" value="<?php echo $dong['thutu']; ?>">
            </div>
            <div class="mb-4">
                <label for="trangthai">Lựa chọn:</label>
                <select class="form-control" id="trangthai" name="trangthai">
                    <option value="1" <?php if ($dong['trangthai'] == 1) echo "selected"; ?>>Menu 2</option>
                    <option value="0" <?php if ($dong['trangthai'] == 0) echo "selected"; ?>>Menu 1</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="sualoaitin">Sửa loại tin</button>
            
        </form>
    </div>
</div>

</body>
</html>