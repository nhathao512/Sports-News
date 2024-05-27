<?php
include ("../../../db.php");


// Thêm bài viết
if (isset($_POST['thembaiviet'])) {
    $tenbaiviet = $_POST['tenbaiviet'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $trangthai = $_POST['trangthai'];
    $idloaitin = $_POST['loaitin'];
    $vitri = $_POST['vitri'];
    $anhminhhoa_path = '';

    // Xử lý ảnh minh họa
    if (isset($_FILES['anhminhhoa']['name']) && $_FILES['anhminhhoa']['name'] != '') {
        $time = date("Ymdhis");
        $name = $time . "_" . $_FILES['anhminhhoa']['name'];
        $dich = "../../../images/" . $name;

        if (move_uploaded_file($_FILES['anhminhhoa']['tmp_name'], $dich)) {
            $anhminhhoa_path = substr($dich, 9); // Cắt 9 ký tự đầu để tạo đường dẫn tương đối
        } else {
            die("Lỗi khi di chuyển tệp tin.");
        }
    }

    // Sử dụng prepared statement để tránh SQL injection
    $stmt = $conn->prepare("INSERT INTO baiviet (tenbaiviet, anhminhhoa, tomtat, noidung, vitri, trangthai, idloaitin) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssiiii", $tenbaiviet, $anhminhhoa_path, $tomtat, $noidung, $vitri, $trangthai, $idloaitin);

    if (!$stmt->execute()) {
        die("Lỗi khi thực hiện truy vấn: " . $stmt->error);
    }

    header("Location: ../../index.php?ac=baiviet");
    exit;
}

// Sửa bài viết
if (isset($_POST['suabaiviet'])) {
    if (!isset($_GET['id'])) {
        die("ID bài viết không hợp lệ.");
    }

    $idbaiviet = intval($_GET['id']); // Đảm bảo ID là một số nguyên
    $tenbaiviet = $_POST['tenbaiviet'];
    $tomtat = $_POST['tomtat'];
    $noidung = $_POST['noidung'];
    $trangthai = $_POST['trangthai'];
    $idloaitin = $_POST['loaitin'];
    $vitri = $_POST['vitri'];
    $anhminhhoa_path = '';

    // Kiểm tra xem người dùng đã tải lên ảnh minh họa mới hay không
    if (isset($_FILES['anhminhhoa']['name']) && $_FILES['anhminhhoa']['name'] != '') {
        $time = date("Ymdhis");
        $name = $time . "_" . $_FILES['anhminhhoa']['name'];
        $dich = "../../../images/" . $name;

        if (move_uploaded_file($_FILES['anhminhhoa']['tmp_name'], $dich)) {
            $anhminhhoa_path = substr($dich, 9); // Lưu đường dẫn mới vào biến $anhminhhoa_path
        } else {
            die("Lỗi khi di chuyển tệp tin.");
        }
    } else {
        // Nếu không có ảnh mới được tải lên, giữ nguyên đường dẫn ảnh minh họa cũ
        $sql_select_image = "SELECT anhminhhoa FROM baiviet WHERE idbaiviet=?";
        $stmt_select_image = $conn->prepare($sql_select_image);
        $stmt_select_image->bind_param("i", $idbaiviet);
        $stmt_select_image->execute();
        $result_select_image = $stmt_select_image->get_result();
        $row_select_image = $result_select_image->fetch_assoc();
        $anhminhhoa_path = $row_select_image['anhminhhoa'];
    }

    // Tiến hành cập nhật thông tin của bài viết
    $stmt = $conn->prepare("UPDATE baiviet SET tenbaiviet=?, anhminhhoa=?, tomtat=?, noidung=?, vitri=?, trangthai=?, idloaitin=? WHERE idbaiviet=?");
    $stmt->bind_param("ssssiiii", $tenbaiviet, $anhminhhoa_path, $tomtat, $noidung, $vitri, $trangthai, $idloaitin, $idbaiviet);

    if (!$stmt->execute()) {
        die("Lỗi khi thực hiện truy vấn: " . $stmt->error);
    }

    header("Location: ../../index.php?sua=baiviet&id=" . $idbaiviet);
    exit;
}


// Xóa bài viết
if (isset($_GET['id'])) {
    $idbaiviet = intval($_GET['id']); // Đảm bảo ID là một số nguyên

    // Lấy thông tin của bài viết để hiển thị trước khi xóa
    $stmt_select = $conn->prepare("SELECT tenbaiviet FROM baiviet WHERE idbaiviet=?");
    $stmt_select->bind_param("i", $idbaiviet);
    $stmt_select->execute();
    $result_select = $stmt_select->get_result();
    $row_select = $result_select->fetch_assoc();

    if ($row_select) {
        $tenbaiviet = $row_select['tenbaiviet'];
        echo "<p>Bạn có chắc chắn muốn xóa bài viết '$tenbaiviet' không?</p>";
        echo "<p><a href='xuly.php?delete_id=$idbaiviet'>Xóa</a> | <a href='../../index.php?ac=baiviet'>Hủy</a></p>";
    } else {
        echo "Không tìm thấy bài viết.";
    }
}

// Xác nhận xóa bài viết sau khi người dùng đồng ý
if (isset($_GET['delete_id'])) {
    $idbaiviet = intval($_GET['delete_id']); // Đảm bảo ID là một số nguyên

    $stmt = $conn->prepare("DELETE FROM baiviet WHERE idbaiviet=?");
    $stmt->bind_param("i", $idbaiviet);

    if (!$stmt->execute()) {
        die("Lỗi khi thực hiện truy vấn: " . $stmt->error);
    }

    // Chuyển hướng sau khi xóa thành công
    header("Location: ../../index.php?ac=baiviet");
    exit;
}


$conn->close();
?>
