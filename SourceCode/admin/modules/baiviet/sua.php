<?php
include("../db.php");

$id = isset($_GET['id']) ? $_GET['id'] : null;

if ($id === null) {
    echo "ID không được cung cấp.";
    exit;
}

$sql = "SELECT * FROM baiviet WHERE idbaiviet=?";
$stmt = $conn->prepare($sql);
if ($stmt === false) {
    echo "Lỗi khi chuẩn bị câu lệnh SQL: " . $conn->error;
    exit;
}
$stmt->bind_param("i", $id);
$stmt->execute();
if ($stmt === false) {
    echo "Lỗi khi thực thi câu lệnh SQL: " . $conn->error;
    exit;
}
$result = $stmt->get_result();
if ($result === false) {
    echo "Lỗi khi lấy kết quả: " . $conn->error;
    exit;
}
$dong = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sửa Bài Viết</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <h3>CHỨC NĂNG SỬA BÀI VIẾT</h3>
            <form action="modules/baiviet/xuly.php?id=<?php echo htmlspecialchars($id); ?>" method="POST" enctype="multipart/form-data">
                
                <div class="mb-3">
                    <label for="tenbaiviet" class="form-label">Tên bài viết:</label>
                    <input type="text" class="form-control" id="tenbaiviet" name="tenbaiviet" value="<?php echo htmlspecialchars($dong['tenbaiviet']); ?>">
                </div>
                <div class="mb-3">
                    <label for="anhminhhoa" class="form-label">Ảnh minh họa:</label>
                    <div class="mb-2">
                        <img src="../<?php echo htmlspecialchars($dong['anhminhhoa']); ?>" width="100" />
                    </div>
                    <input type="file" class="form-control" id="anhminhhoa" name="anhminhhoa">
                </div>
                <div class="mb-3">
                    <label for="loaitin" class="form-label">Loại tin:</label>
                    <select class="form-select" id="loaitin" name="loaitin">
                        <?php
                        $sql_loaitin = "SELECT * FROM loaitin";
                        $result_loaitin = $conn->query($sql_loaitin);
                        while ($dong_loaitin = $result_loaitin->fetch_assoc()) {
                            $selected = ($dong_loaitin['idloaitin'] == $dong['idloaitin']) ? 'selected' : '';
                            echo '<option value="' . htmlspecialchars($dong_loaitin['idloaitin']) . '" ' . $selected . '>' . htmlspecialchars($dong_loaitin['tenloaitin']) . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="tomtat" class="form-label">Tóm tắt:</label>
                    <textarea class="form-control" id="tomtat" name="tomtat" rows="5"><?php echo htmlspecialchars($dong['tomtat']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="noidung" class="form-label">Nội dung:</label>
                    <textarea class="form-control" id="noidung" name="noidung" rows="10"><?php echo htmlspecialchars($dong['noidung']); ?></textarea>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="trangthai" class="form-label">Trạng thái:</label>
                        <select class="form-select" id="trangthai" name="trangthai">
                            <option value="1" <?php if($dong['trangthai'] == 1) echo "selected"; ?>>Hiển thị</option>
                            <option value="0" <?php if($dong['trangthai'] == 0) echo "selected"; ?>>Không hiển thị</option>
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="vitri" class="form-label">Vị trí:</label>
                        <select class="form-select" id="vitri" name="vitri">
                            <option value="1" <?php if($dong['vitri'] == 1) echo "selected"; ?>>Nổi bật</option>
                            <option value="0" <?php if($dong['vitri'] == 0) echo "selected"; ?>>Bình thường</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="suabaiviet">Sửa bài viết</button>
            </form>
        </div>
    </div>
    <script>
        CKEDITOR.replace('tomtat', { height: 150 });
        CKEDITOR.replace('noidung', { height: 300 });
    </script>
</body>
</html>
