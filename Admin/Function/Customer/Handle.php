



<?php
if (isset($_POST['deleteKH'])) {
  $id = $_POST['Xoa_MaKH'];
  $query = "DELETE FROM khachhang WHERE MaKH='$id'";
  $query_run = mysqli_query($conn, $query);
  if ($query_run) {

    Delete();
  } else {
    echo '<script> alert("Chưa xoá"); </script>';
  }
}


?>

<?php

if (isset($_POST['unlockdatakh'])) {
  $id = $_POST['Unlock_MaKH'];
  $trangthai = $_POST['Unlock_TrangThai'];

  if ($trangthai == 1) {
    $trangthai = 0;
  } else {
    $trangthai = 1;
  }
  $query = "UPDATE khachhang set trangthai = $trangthai  WHERE MaKH='$id'";
  $query_run = mysqli_query($conn, $query);
}


?>

<?php

if (isset($_POST['insertdata'])) {
  $Them_TaiKhoan = $_POST['Them_TaiKhoan'];
  $Them_MatKhau = $_POST['Them_MatKhau'];
  $has_pass = password_hash($Them_MatKhau, PASSWORD_DEFAULT);
  $Them_HoTen = $_POST['Them_HoTen'];
  // $I_NgayCapNhat = $_POST['I_NgayCapNhat'];
  $Them_DienThoai = $_POST['Them_DienThoai'];
  $Them_TrangThai = $_POST['Them_TrangThai'];
  $Kiem_Tra_Trung = mysqli_query($conn, "Select * from QuanTriVien where TaiKhoan = '$Them_TaiKhoan'");
  if (mysqli_num_rows($Kiem_Tra_Trung) == 0) {
    $query1 = "
    INSERT INTO QuanTriVien
    VALUES (
    NULL ,
    '$Them_TaiKhoan',
    '$has_pass',
      0,
      '$Them_HoTen',
      '$Them_DienThoai',
    'user.png',
    null,
    null,
    $Them_TrangThai
    );";
    mysqli_query($conn, $query1);
    Add();
  } else {
    echo '<script> alert("Tài khoản đã tồn tại"); </script>';
  }
}
?>

