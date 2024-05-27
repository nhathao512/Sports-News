<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
      form {
            background-color: white;
            padding: 10px;
            border-radius: 15px;
        }
  </style>
</head>
<body>
  <?php
    include ("../db.php");
    $tendangnhap = $_GET['tendangnhap'];
    $sql = "SELECT * FROM nguoidung WHERE tendangnhap='$tendangnhap'";
    $ketqua = mysqli_query($conn, $sql);
    $dong = mysqli_fetch_array($ketqua);
?>
    <div class="container">
    <div class="col-md-6 offset">
        <h3>CHỨC NĂNG SỬA NGƯỜI DÙNG</h3>
        <form action="modules/nguoidung/xuly.php?tendangnhap=<?php echo $dong['tendangnhap'];?>" method="post">
            <div class="mb-3">
                <label for="ten">Họ và Tên:</label>
                <input type="text" class="form-control" id="ten" name="hoten" value="<?php echo $dong['hoten'];?>">
            </div>
            <div class="mb-3">
                <label for="tendangnhap">Tên Đăng Nhập:</label>
                <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" value="<?php echo $dong['tendangnhap'];?>">
            </div>
            <div class="mb-3">
                <label for="matkhau">Mật Khẩu:</label>
                <input type="password" class="form-control" id="matkhau" name="matkhau" value="<?php echo $dong['matkhau'];?>">
            </div>
            <div class="mb-3">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="<?php echo $dong['email'];?>">
            </div>
            <div class="mb-3">
            <label for="loai">Loại Người Dùng:</label>
                <select class="form-control" id="loai" name="loai">
                    <option value="admin" <?php echo ($dong['loai'] == 'admin') ? 'selected' : ''; ?>>Admin</option>
                    <option value="user" <?php echo ($dong['loai'] == 'user') ? 'selected' : ''; ?>>User</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary" name="suanguoidung">Sửa người dùng</button>
            
        </form>
    </div>
</div>
</body>
</html>