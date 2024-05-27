<?php
session_start();

$is_successful = $_SESSION['registration_success'] ?? false;

// Unset the session variable after checking it
unset($_SESSION['registration_success']);
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Account Activation</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.3.1/css/all.css"
      integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU"
      crossorigin="anonymous"
    />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body 
        {
            background-image: linear-gradient(90deg, rgb(160, 222, 219),rgb(3, 165, 209));
        }
        
        .khung
        {
            background-color: white;
        }
        
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row justify-content-center">
            <div style="background-color: white;" class="col-md-6 mt-5 mx-auto p-3 border rounded">
                <h4>KÍCH HOẠT TÀI KHOẢN</h4>
                <p class="text-success">Chúc mừng! Tài khoản của bạn đã được kích hoạt.</p>
                <p>Nhấn <a href="login.php">vào đây</a> để đăng nhập và quản lý thông tin tài khoản của bạn.</p>
                <a style="background: rgb(3, 165, 209); color: white;" class="btn btn-blue px-5" href="login.php">Đăng Nhập</a>
          </div>
      </div>
    </div>
  </body>
</html>
