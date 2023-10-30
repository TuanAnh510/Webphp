<?php
require 'connection.php';
session_start();
$trangthai = 0;
$email = mysqli_real_escape_string($con, $_POST['email']);
$regex_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[_a-z0-9-]+)*(\.[a-z]{2,3})$/";

if (!preg_match($regex_email, $email)) {
?>
    <script>
        window.alert("Email không chính xác. Đang chuyển hướng bạn trở lại trang đăng nhập...");
        window.location.href = "login.php";
    </script>
    <?php
} else {
    $password = md5(md5(mysqli_real_escape_string($con, $_POST['password'])));
    if (strlen($password) < 6) {
    ?>
        <script>
            window.alert("Mật khẩu nên có ít nhất 6 ký tự. Đang chuyển hướng bạn trở lại trang đăng nhập...");
            window.location.href = "login.php";
        </script>
        <?php
    } else {
        $user_authentication_query = "select * from khachhang where Email='$email' and MatKhau='$password'";
        $user_authentication_result = mysqli_query($con, $user_authentication_query) or die(mysqli_error($con));
        $rows_fetched = mysqli_num_rows($user_authentication_result);

        if ($rows_fetched == 0) {
        ?>
            <script>
                window.alert("Tên người dùng hoặc mật khẩu sai. Đang chuyển hướng bạn trở lại trang đăng nhập...");
                window.location.href = "login.php";
            </script>
            <?php
        } else {
            $row = mysqli_fetch_array($user_authentication_result);
            $trangthai = $row["trangthai"];
            if ($trangthai == 0) {
            ?>
                <script>
                    window.alert("Tài khoản của bạn đã bị khóa! Liên hệ với quản trị viên để được giúp đỡ!");
                    window.location.href = "login.php";
                </script>
<?php
            } else {
                $_SESSION['MaKH'] = $row['MaKH'];  //cus id
                header('location: index.php');
            }
        }
    }
}
?>