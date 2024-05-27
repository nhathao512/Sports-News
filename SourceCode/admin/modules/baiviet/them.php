<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Thêm Bài Viết</title>
    <!-- Bootstrap CSS từ CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- CKEditor từ CDN -->
    <script src="https://cdn.ckeditor.com/4.20.2/standard/ckeditor.js"></script>
    <style>
        form {
            background-color: white;
            padding: 20px;
            border-radius: 15px;
        }
        h3 {
            padding: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="col-md-6 offset">
            <form action="modules/baiviet/xuly.php" method="POST" enctype="multipart/form-data">
                <h3>CHỨC NĂNG THÊM BÀI VIẾT</h3>
                <div class="mb-3">
                    <label for="tenbaiviet" class="form-label">Tên bài viết:</label>
                    <input type="text" class="form-control" id="tenbaiviet" name="tenbaiviet">
                </div>
                <div class="mb-3">
                    <label for="anhminhhoa" class="form-label">Ảnh minh họa:</label>
                    <input type="file" class="form-control" id="anhminhhoa" name="anhminhhoa">
                </div>
                <div class="mb-3">
                    <label for="loaitin" class="form-label">Loại tin:</label>
                    <?php include("../db.php"); ?>
                    <select class="form-select" id="loaitin" name="loaitin">
                        <?php
                        $sql = "SELECT * FROM loaitin";
                        $result = $conn->query($sql);
                        while ($dong = $result->fetch_assoc()) { ?>
                            <option value="<?php echo $dong['idloaitin']; ?>"><?php echo $dong['tenloaitin']; ?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tomtat" class="form-label">Tóm tắt:</label>
                    <textarea class="form-control" id="tomtat" name="tomtat" rows="5"></textarea>
                </div>
                <div class="mb-3">
                    <label for="noidung" class="form-label">Nội dung:</label>
                    <textarea class="form-control" id="noidung" name="noidung" rows="10"></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="trangthai" class="form-label">Trạng thái:</label>
                        <select class="form-select" id="trangthai" name="trangthai">
                            <option value="1">Hiển thị</option>
                            <option value="0">Không hiển thị</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="vitri" class="form-label">Vị trí:</label>
                        <select class="form-select" id="vitri" name="vitri">
                            <option value="1">Nổi bật</option>
                            <option value="0">Bình thường</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="thembaiviet">Thêm bài viết</button>
            </form>
        </div>
    </div>

    <!-- Khởi tạo CKEditor -->
    <!--<script>-->
    <!--    CKEDITOR.replace('tomtat', { height: 150 });-->
    <!--    CKEDITOR.replace('noidung', { height: 300 });-->
    <!--</script>-->
</body>
</html>
