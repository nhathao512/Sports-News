<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Người Dùng</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            padding-top: 20px;
            border-radius: 15px;
        }
        form {
            background-color: white;
            padding: 20px;
            border-radius: 15px;
        }
        .error {
            color: red;
        }
    </style>
</head>
<body>
    <?php
    session_start();

    // Include database connection
    include("../../../db.php");

    // Array to store errors
    $errors = [];

    // Check if the method is POST and data is sent
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Validate necessary fields
        if (empty($_POST['hoten'])) {
            $errors['hoten'] = 'Chưa nhập họ và tên';
        }
        if (empty($_POST['tendangnhap'])) {
            $errors['tendangnhap'] = 'Chưa nhập tên đăng nhập';
        }
        if (empty($_POST['matkhau'])) {
            $errors['matkhau'] = 'Chưa nhập mật khẩu';
        }
        if (empty($_POST['email'])) {
            $errors['email'] = 'Chưa nhập email';
        }
        if (empty($_POST['loai'])) {
            $errors['loai'] = 'Chưa chọn loại người dùng';
        }

        // If there are no errors, proceed to insert data into database
        if (empty($errors)) {
            $hoten = $_POST['hoten'];
            $tendangnhap = $_POST['tendangnhap'];
            $matkhau = $_POST['matkhau'];
            $email = $_POST['email'];
            $loai = $_POST['loai'];

            // Define SQL INSERT statement
            $sql = "INSERT INTO nguoidung(hoten, tendangnhap, matkhau, email, loai) VALUES ('$hoten', '$tendangnhap', '$matkhau', '$email', '$loai')";
            // Execute the statement
            mysqli_query($conn, $sql);

            // Redirect user after successful insertion
            header("location: ../../index.php?ac=nguoidung");
            exit();
        }
    }
    ?>

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3"> <!-- Center the form on larger screens -->
                <h2 class="mb-3">Chức Năng Thêm Người Dùng</h2>
                <form action="modules/nguoidung/xuly.php" method="post">
                    <div class="form-group">
                        <label for="ten">Họ và Tên:</label>
                        <input type="text" class="form-control" id="ten" name="hoten" placeholder="Nhập họ và tên">
                        <div class="error error-ten d-none">Chưa nhập họ và tên</div>
                    </div>
                    <div class="form-group">
                        <label for="tendangnhap">Tên Đăng Nhập:</label>
                        <input type="text" class="form-control" id="tendangnhap" name="tendangnhap" placeholder="Nhập tên đăng nhập">
                        <div class="error error-tendangnhap d-none">Chưa nhập tên đăng nhập</div>
                    </div>
                    <div class="form-group">
                        <label for="matkhau">Mật Khẩu:</label>
                        <input type="password" class="form-control" id="matkhau" name="matkhau" placeholder="Nhập mật khẩu">
                        <div class="error error-matkhau d-none">Chưa nhập mật khẩu</div>
                    </div>
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email">
                        <div class="error error-email d-none">Chưa nhập email</div>
                    </div>
                    <div class="form-group">
                        <label for="loai">Loại Người Dùng:</label>
                        <select class="form-control" id="loai" name="loai">
                            <option value="">Chọn loại người dùng...</option>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                        <div class="error error-loai d-none">Chưa chọn loại người dùng</div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="themnguoidung">Thêm Người Dùng</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const form = document.querySelector('form');
            const errorMessages = form.querySelectorAll('.error');
            const submitButton = form.querySelector('button[type="submit"]');

            // Hide all error messages initially
            errorMessages.forEach(function (errorMessage) {
                errorMessage.classList.add('d-none');
            });

            // Validate form on submit and show corresponding error messages
            form.addEventListener('submit', function (event) {
                errorMessages.forEach(function (errorMessage) {
                    errorMessage.classList.add('d-none');
                });

                if (submitButton.name === 'themnguoidung') {
                    const ten = form.querySelector('#ten').value.trim();
                    const tendangnhap = form.querySelector('#tendangnhap').value.trim();
                    const matkhau = form.querySelector('#matkhau').value;
                    const email = form.querySelector('#email').value.trim();
                    const loai = form.querySelector('#loai').value;

                    if (ten === '') {
                        form.querySelector('.error-ten').classList.remove('d-none');
                        event.preventDefault();
                    }
                    if (tendangnhap === '') {
                        form.querySelector('.error-tendangnhap').classList.remove('d-none');
                        event.preventDefault();
                    }
                    if (matkhau === '') {
                        form.querySelector('.error-matkhau').classList.remove('d-none');
                        event.preventDefault();
                    }
                    if (email === '') {
                        form.querySelector('.error-email').classList.remove('d-none');
                        event.preventDefault();
                    }
                    if (loai === '') {
                        form.querySelector('.error-loai').classList.remove('d-none');
                        event.preventDefault();
                    }
                }
            });
        });
    </script>
</body>
</html>
