<?php
session_start();

// Include database connection
include("db.php"); // This should return a valid mysqli connection

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user = $_POST['user'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if (empty($user) || empty($pass)) {
        $error = 'Please enter your username and password';
    } else {
        // Check if the username exists in the database
        $sql = "SELECT * FROM nguoidung WHERE tendangnhap = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $user);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();

            // Verify the password for admin accounts
            if ($row['loai'] === 'admin' && $row['matkhau'] === $pass) {
                // Successful login for admin
                $_SESSION['user'] = $row['tendangnhap'];
                $_SESSION['name'] = $row['hoten'];
                $_SESSION['loai'] = $row['loai'];
                $_SESSION['loggedin'] = true;

                // Redirect to admin dashboard
                header('Location: admin/index.php');
                exit();
            } elseif ($row['loai'] !== 'admin' && password_verify($pass, $row['matkhau'])) {
                // Successful login for non-admin users
                $_SESSION['user'] = $row['tendangnhap'];
                $_SESSION['name'] = $row['hoten'];
                $_SESSION['loai'] = $row['loai'];
                $_SESSION['loggedin'] = true;

                // Redirect to user dashboard
                header('Location: index.php');
                exit();
            } else {
                $error = 'Invalid username or password';
            }
        } else {
            $error = 'Invalid username or password';
        }
    }
}

$conn->close(); // Close database connection
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            background-image: linear-gradient(90deg, rgb(160, 222, 219), rgb(3, 165, 209));
        }

        .container {
            margin-top: 100px;
        }

        .form-container {
            border-radius: 10px;
            padding: 20px;
            background: white;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .hm a {
            font-size: 25px;
            font-weight: bold;
            color: #FFF;
            text-decoration-thickness: 3px;
            text-underline-offset: 3px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 style="font-weight: bold;" class="text-center text-secondary mt-5 mb-3">ĐĂNG NHẬP</h3>
            <form method="post" action="" style="border-radius: 15px;" class="border w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="username">Tên Đăng Nhập</label>
                    <input style="background-color: rgb(187, 222, 232);" value="<?= isset($user) ? htmlspecialchars($user) : '' ?>" name="user" id="user" type="text" class="form-control" placeholder="Tên đăng nhập">
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input style="background-color: rgb(187, 222, 232);" name="pass" value="<?= isset($pass) ? htmlspecialchars($pass) : '' ?>" id="password" type="password" class="form-control" placeholder="Mật khẩu">
                </div>
                
                <div class="form-group">
                    <?php if (!empty($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
                    <button style="background: rgb(3, 165, 209);" class="btn btn-primary px-5">Đăng Nhập</button>
                </div>
                <div class="form-group">
                    <p>Bạn chưa có tài khoản? <a href="dangki.php">Đăng Kí Ngay</a>.</p>
                </div>
            </form>
        </div>
    </div>
    <div class="hm" style="position: absolute; top: 20px; right: 40px; ">
      <a  href="index.php">Home</a>
        <!-- thay doi link theo ten mien -->
    </div>
</div>
</body>
</html>
