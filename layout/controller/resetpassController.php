<?php
class resetpassController {
    public function __construct() {
        require "view/resetpass.php";

        // Kiểm tra xem yêu cầu là POST và các trường mật khẩu có tồn tại trong $_POST hay không
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['newPassword'], $_POST['confirmNewPassword'])) {
            $newPassword = $_POST['newPassword'];
            $confirmNewPassword = $_POST['confirmNewPassword'];

            // Kiểm tra mật khẩu có trống không
            if (empty($newPassword) || empty($confirmNewPassword)) {
                $_SESSION['thongbao'] = "Mật khẩu không được để trống.";
                header("Location: index.php?act=reset_password");
                exit;
            }

            // Kiểm tra mật khẩu xác nhận có khớp không
            if ($newPassword !== $confirmNewPassword) {
                $_SESSION['thongbao'] = "Mật khẩu xác nhận không khớp.";
                header("Location: index.php?act=reset_password");
                exit;
            }

            // Kiểm tra định dạng mật khẩu (ít nhất 8 ký tự, gồm chữ hoa, chữ thường, số và ký tự đặc biệt)
            if (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $newPassword)) {
                $_SESSION['thongbao'] = "Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt.";
                header("Location: index.php?act=reset_password");
                exit;
            }

            // Nếu tất cả các kiểm tra đều hợp lệ, tiến hành cập nhật mật khẩu
            require "models/connectmodel.php";
            $conn = new ConnectModel();

            // $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            // Cập nhật mật khẩu trong cơ sở dữ liệu
            $sql = "UPDATE user SET mat_khau = :password WHERE email = :email";
            $params = [
                ':password' =>$newPassword,// Mã hóa mật khẩu
                ':email' => $_SESSION['email']
            ];

            // Thực hiện truy vấn
            $conn->modify($sql, $params);

            // Cập nhật thông báo và chuyển hướng người dùng
            $_SESSION['thongbao'] = "Đổi mật khẩu thành công.";
            unset($_SESSION['code'], $_SESSION['email']); // Xóa thông tin xác nhận

            // Chuyển hướng về trang đăng nhập
            header("Location: index.php?act=login");
            exit;
        }
    }
}
?>
