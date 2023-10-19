<?php
include("Check_login.php");
$trangthai = 0;
?>

<?php
if (isset($_POST['login_admin'])) {
	$tai_khoan = $_POST['TaiKhoan'];
	$mat_khau = $_POST['MatKhau'];
	$truyvan = "select * from quantrivien where TaiKhoan = '$tai_khoan'";

	if ($result = $conn->query($truyvan)) {
		while ($row = $result->fetch_assoc()) {
			$trangthai = $row["trangthai"];
		}
		$result->free();
	}
	if ($trangthai == 0) {
		$loi = "Tài khoản của bạn đã bị khóa! Liên hệ quản trị viên để được hỗ trợ";
	}
	$ketqua = mysqli_query($conn, $truyvan);
	if (mysqli_num_rows($ketqua) == 0) {
		$loi =  "Tài khoản không tồn tại !";
	} else {
		$each = mysqli_fetch_array($ketqua);
		if ($mat_khau === $each["MatKhau"]) {
			$_SESSION["MaQTV"] = $each["MaQTV"];
			$_SESSION["TaiKhoan"] = "$tai_khoan";
			$_SESSION["QuanLi"] = $each["QuanLi"];
			$_SESSION["MatKhau"] = $mat_khau;
		} else {
			$loi =  "Mật khẩu không đúng !";
		}
	}
}

if (isset($_SESSION['TaiKhoan'])) {
	$tk = $_SESSION['TaiKhoan'];
	$tv = "select count(*) from quantrivien where TaiKhoan='$tk' and trangthai = 1";
	$tv_1 = mysqli_query($conn, $tv);
	$tv_2 = mysqli_fetch_array($tv_1);
	if ($tv_2[0] == 1) {
		$xac_dinh_dang_nhap = "co";
	} else {
		$loi = "Tài khoản của bạn đã bị khóa! Liên hệ quản trị viên để được hỗ trợ";
	}
}

?>