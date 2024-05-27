<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Quản Lý Bài Viết</title>
  <!-- Bootstrap CSS from CDN -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
  <div class="container mt-4">
    <div class="table-responsive">
      <table class="table table-bordered table-hover">
        <thead class="table-light">
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Tên bài viết</th>
            <th scope="col">Ảnh minh họa</th>
            <th scope="col">Trạng thái</th>
            <th scope="col">Loại tin</th>
            <th scope="col">Vị trí</th>
            <th scope="col" colspan="2">Quản trị</th>
          </tr>
        </thead>
        <tbody>
          <?php
          include("../db.php");
          $sql = "SELECT * FROM baiviet";
          $result = $conn->query($sql);
          $i = 1;
          while ($dong = $result->fetch_assoc()) {
            $trangthai = ($dong['trangthai'] == 1) ? "Hiển thị" : "Không hiển thị";
            $vitri = ($dong['vitri'] == 1) ? "Nổi bật" : "Bình thường";

            $sql_loaitin = "SELECT * FROM loaitin WHERE idloaitin = ?";
            $stmt_loaitin = $conn->prepare($sql_loaitin);
            $stmt_loaitin->bind_param("i", $dong['idloaitin']);
            $stmt_loaitin->execute();
            $result_loaitin = $stmt_loaitin->get_result();
            $dongloaitin = $result_loaitin->fetch_assoc();
          ?>
            <tr>
              <td style="text-align:center;"><?php echo $i; ?></td>
              <td><?php echo $dong['tenbaiviet']; ?></td>
              <td><img src="../<?php echo $dong['anhminhhoa']; ?>" style="width:50px;"></td>
              <td><?php echo $trangthai; ?></td>
              <td><?php echo $dongloaitin['tenloaitin']; ?></td>
              <td><?php echo $vitri; ?></td>
              <td><a href="index.php?sua=baiviet&id=<?php echo $dong['idbaiviet']; ?>">Sửa</a></td>
              <td><a href="modules/baiviet/xuly.php?id=<?php echo $dong['idbaiviet']; ?>">Xóa</a></td>
            </tr>
          <?php
            $i++;
          }
          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
</body>

</html>