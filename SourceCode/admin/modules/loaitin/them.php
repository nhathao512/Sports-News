<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @media (min-width: 768px) {
            .custom-form {
                max-width: 600px;
                margin: auto;
            }
        }

        .table-custom {
            border: 1px solid black;
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
    
    // Mảng lưu trữ các lỗi
    $errors = [];
    
    // Kiểm tra nếu là phương thức POST và có dữ liệu gửi đi
    if ($_SERVER['REQUEST_METHOD'] === 'GET') {
        // Kiểm tra các trường dữ liệu cần thiết
        if (empty($_POST['tenloaitin'])) {
            $errors['tenloaitin'] = 'Chưa nhập loại tin';
        }
        if (empty($_POST['thutu'])) {
            $errors['thutu'] = 'Chưa nhập thứ tự';
        }
        if (empty($_POST['trangthai'])) {
            $errors['trangthai'] = 'Chưa chọn trạng thái';
        }
    
        // Nếu không có lỗi, thực hiện thêm dữ liệu vào CSDL
        if (empty($errors)) {
            $tenloaitin = $_POST['tenloaitin'];
            $thutu = $_POST['thutu'];
            $trangthai = $_POST['trangthai'];
        
            // Định nghĩa lệnh INSERT vào CSDL
            $sql = "INSERT INTO loaitin(tenloaitin, thutu, trangthai) VALUES('$tenloaitin', '$thutu', '$trangthai')";
            // Thực thi lệnh
            mysqli_query($conn, $sql);
        
            // Chuyển hướng người dùng sau khi thêm thành công
            header("location: ../../index.php?ac=loaitin");
            exit();
        }
    }
    ?>

    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h3 class="mb-4 text-center">CHỨC NĂNG THÊM LOẠI TIN</h4>
                <div class="custom-form bg-light p-4 rounded">
                    <form action="modules/loaitin/xuly.php" method="post">
                        
                        <div class="form-group">
                            <label for="tenloaitin">Loại tin:</label>
                            <input type="text" class="form-control" id="tenloaitin" name="tenloaitin" placeholder="Nhập tên loại tin">
                            <div class="error error-tenloaitin d-none">Chưa nhập loại tin</div>
                        </div>
                        <div class="form-group">
                            <label for="thutu">Thứ tự:</label>
                            <input type="text" class="form-control" id="thutu" name="thutu" placeholder="Nhập thứ tự">
                            <div class="error error-thutu d-none">Chưa nhập thứ tự</div>
                        </div>
                        <div class="form-group">
                            <label for="trangthai">Lựa chọn:</label>
                            <select class="form-control" id="trangthai" name="trangthai">
                                <option value="">Chọn một lựa chọn...</option>
                                <option value="1">Menu 2</option>
                                <option value="0">Menu 1</option>
                            </select>
                            <div class="error error-trangthai d-none">Chưa chọn trạng thái</div>
                        </div>

                        <div class="text-center">
                            <button type="submit" name="themloaitin" class="btn btn-primary">Thêm loại tin</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS và các phụ thuộc (Optionals) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
        const form = document.querySelector('form');
        const errorMessages = form.querySelectorAll('.error');
        const submitButton = form.querySelector('button[type="submit"]');
        
        // Ẩn tất cả các thông báo lỗi ban đầu
        errorMessages.forEach(function (errorMessage) {
            errorMessage.classList.add('d-none');
        });
        
        // Khi form được submit, kiểm tra lỗi và hiển thị thông báo lỗi tương ứng
        form.addEventListener('submit', function (event) {
            errorMessages.forEach(function (errorMessage) {
                errorMessage.classList.add('d-none');
            });
            
            if (submitButton.name === 'themloaitin') {
                const tenloaitin = form.querySelector('#tenloaitin').value.trim();
                const thutu = form.querySelector('#thutu').value.trim();
                const trangthai = form.querySelector('#trangthai').value;
                
                if (tenloaitin === '') {
                    form.querySelector('.error-tenloaitin').classList.remove('d-none');
                    event.preventDefault();
                }
                if (thutu === '') {
                    form.querySelector('.error-thutu').classList.remove('d-none');
                    event.preventDefault();
                }
                if (trangthai === '') {
                    form.querySelector('.error-trangthai').classList.remove('d-none');
                    event.preventDefault();
                }
            }
        });
    });

    </script>
</body>

</html>
