<?php
class doimkController {
    public function __construct() {
            // Nếu có yêu cầu POST, xử lý thay đổi mật khẩu
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $this->doimk();
            } else {
                // Nếu không, hiển thị form đổi mật khẩu
                include "view/doimk.php";
            }

    }

    private function doimk() {
        // Lấy dữ liệu từ form
        $currentPassword = $_POST['currentPassword'] ?? ''; // Mật khẩu hiện tại
        $newPassword = $_POST['newPassword'] ?? ''; // Mật khẩu mới
        $confirmPassword = $_POST['confirmNewPassword'] ?? ''; // Xác nhận mật khẩu mới

        // Kiểm tra xem mật khẩu hiện tại có bị bỏ trống không
        if (empty($currentPassword)) {
            $_SESSION['thongbao'] = 'Mật khẩu hiện tại không được để trống!';
            header("Location: index.php?act=doimk");
            exit();
        }

        // Kiểm tra xem mật khẩu mới và mật khẩu xác nhận có trùng khớp không
        if ($newPassword !== $confirmPassword) {
            $_SESSION['thongbao'] = 'Mật khẩu mới và xác nhận mật khẩu không khớp!';
            header("Location: index.php?act=doimk");
            exit();
        }

        // Kiểm tra độ mạnh của mật khẩu mới (tối thiểu 8 ký tự, có chữ hoa, số và ký tự đặc biệt)
        if (!preg_match('/^(?=.*[A-Z])(?=.*\d)(?=.*[!@#$%^&*])[A-Za-z\d!@#$%^&*]{8,}$/', $newPassword)) {
            $_SESSION['thongbao'] = 'Mật khẩu mới không hợp lệ! (Cần có chữ hoa, số và ký tự đặc biệt)';
            header("Location: index.php?act=doimk");
            exit();
        }

        // Gọi đến model để thay đổi mật khẩu
        include "models/doimkModel.php";
        $doimkModel = new doimkModel();
        $result = $doimkModel->changePassword($_SESSION['user']['id'], $currentPassword, $newPassword);

        // Nếu mật khẩu thay đổi thành công
        if ($result) {
            $_SESSION['thongbao'] = 'Đổi mật khẩu thành công!';
        } else {
            // Nếu mật khẩu hiện tại không đúng
            $_SESSION['thongbao'] = 'Mật khẩu hiện tại không đúng!';
        }

        // Chuyển hướng lại về trang tài khoản
        header("Location: index.php?act=acc");
        exit();
    }
}


?>
