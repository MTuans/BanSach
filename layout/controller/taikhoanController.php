<?php
class taikhoanController {
    public $taikhoan;

    public function __construct() {

        if(isset($_SESSION['user'])){
                require "models/taikhoanModel.php";
            $this->taikhoan = new taikhoanModel();

            // Xử lý các hành động của người dùng
            if ($_SERVER['REQUEST_METHOD'] === 'GET') {
                // Hiển thị trang tài khoản
                include_once "view/taikhoan.php";
            }

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                if ($_GET['action'] == 'update') {
                    // Cập nhật thông tin tài khoản
                    $this->UpdateAccount();
                }
            }
        }else{
            echo "<script>alert('Vui lòng đăng nhập'); window.location.href='index.php'</script>";

        }

    }

    // Xử lý cập nhật thông tin tài khoản
    private function UpdateAccount() {
        $ho_ten = $_POST['ho_ten'] ?? '';
        $sdt = $_POST['sdt'] ?? '';
        $email = $_POST['email'] ?? '';

        // Cập nhật thông tin vào cơ sở dữ liệu và nhận thông báo kết quả
        $result = $this->taikhoan->updateAccountInfo($ho_ten, $sdt, $email, $_SESSION['user']['id']);

        // Lưu thông báo vào session
        $_SESSION['message'] = $result;

        // Cập nhật thông tin trong session
        $_SESSION['user']['ho_ten'] = $ho_ten;
        $_SESSION['user']['sdt'] = $sdt;
        $_SESSION['user']['email'] = $email;

        // Chuyển hướng lại trang tài khoản
        header("Location: index.php?act=acc");
        exit();
    }
}

