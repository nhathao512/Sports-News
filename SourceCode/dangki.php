<?php
session_start();

// Include database connection
include("db.php"); // Should return a valid mysqli connection

$error = ''; // To store error messages
$success = ''; // To indicate success

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form inputs
    $username1 = isset($_POST['username']) ? trim($_POST['username']) : '';
    $fullname = isset($_POST['fullname']) ? trim($_POST['fullname']) : '';
    $email = isset($_POST['email']) ? trim($_POST['email']) : '';
    $password = isset($_POST['password']) ? trim($_POST['password']) : '';
    $confirm_password = isset($_POST['confirm_password']) ? trim($_POST['confirm_password']) : '';

    // Validate form inputs
    if (empty($username1)) {
        $error = 'Please enter a username';
    } else if (empty($fullname)) {
        $error = 'Please enter your full name';
    } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'Please enter a valid email address';
    } else if (empty($password)) {
        $error = 'Please enter a password';
    } else if (strlen($password) < 6) {
        $error = 'Password must be at least 6 characters long';
    } else if ($password !== $confirm_password) {
        $error = 'Passwords do not match';
    } else {
        // Check if the username already exists in the database
        $sql = "SELECT * FROM nguoidung WHERE tendangnhap = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $username1); // Bind parameter
        $stmt->execute(); // Execute query
        $result = $stmt->get_result(); // Get result
        if ($result->num_rows > 0) { // Username already exists
            $error = 'Username already taken, choose another one';
        } else {
            // Hash the password
            $hashed_password = password_hash($password, PASSWORD_BCRYPT); // Use bcrypt hashing

            // Insert new user into the database
            $sql = "INSERT INTO nguoidung (tendangnhap, hoten, email, matkhau, loai) VALUES (?, ?, ?, ?, 'user')";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("ssss", $username1, $fullname, $email, $hashed_password);
            if ($stmt->execute()) {
                // Registration successful
                $_SESSION['registration_success'] = true; // Set session indicating success
                header("Location: kichhoat.php"); // Redirect to activation page
                exit;
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>User Registration</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body 
        {
            background-image: linear-gradient(90deg, rgb(160, 222, 219),rgb(3, 165, 209));
        }

        .container
        {
            margin-top: 50px;
        }

        .form-container {
            border-radius: 10px; 
            padding: 20px; 
            background: white; 
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1); 
        }


    </style>
</head>
<body>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <h3 style="font-weight: bold;" class="text-center text-secondary mt-5 mb-3">ĐĂNG KÍ</h3>
            <form method="post" action="" style="border-radius: 15px;" class="border w-100 mb-5 mx-auto px-3 pt-3 bg-light">
                <div class="form-group">
                    <label for="username">Tên Đăng Nhập</label>
                    <input style="background-color: rgb(187, 222, 232);" value="<?= htmlspecialchars($username1) ?>" name="username" id="username" type="text" class="form-control" placeholder="Tên đăng nhập">
                </div>
                <div class="form-group">
                    <label for="fullname">Họ và Tên</label>
                    <input style="background-color: rgb(187, 222, 232);" value="<?= htmlspecialchars($fullname) ?>" name="fullname" id="fullname" type="text" class="form-control" placeholder="Họ và tên">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input style="background-color: rgb(187, 222, 232);" value="<?= htmlspecialchars($email) ?>" name="email" id="email" type="email" class="form-control" placeholder="Email">
                </div>
                <div class="form-group">
                    <label for="password">Mật Khẩu</label>
                    <input style="background-color: rgb(187, 222, 232);" name="password" id="password" type="password" class="form-control" placeholder="Mật khẩu">
                </div>
                <div class="form-group">
                    <label for="confirm_password">Xác Nhận Mật Khẩu</label>
                    <input style="background-color: rgb(187, 222, 232);" name="confirm_password" id="confirm_password" type="password" class="form-control" placeholder="Xác nhận mật khẩu">
                </div>
                <div class="form-group">
                    <?php if (!empty($error)) { echo "<div class='alert alert-danger'>$error</div>"; } ?>
                    <?php if (!empty($success)) { echo "<div class='alert alert-success'>$success</div>"; } ?>
                    <button style="background: rgb(3, 165, 209);" class="btn btn-primary">Đăng Kí</button>
                </div>
                <div class="form-group">
                    <p>Đã có tài khoản? <a href="login.php">Đăng Nhập</a>.</p>
                </div>
            </form>
        </div>
    </div>
</div>
</body>
</html>
