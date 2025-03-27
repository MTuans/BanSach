<?php

class quenmkController {
    public function __construct() {
        require "view/quenmk.php";

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['email'])) {
            $email = $_POST['email'];

            // Kiểm tra email hợp lệ
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $_SESSION['thongbao'] = "Email không hợp lệ.";
                header("Location: index.php?act=repass");
                exit;
            }

            require "models/quenmkModel.php";
            $model = new quenmkModel();
            $check = $model->checkmail($email);

            if (isset($check)) {
                $code = rand(100000, 999999); // Sinh mã xác nhận
                $_SESSION['code'] = $code;
                $_SESSION['code_time']=time()+ 300;
                $_SESSION['email'] = $email; // Lưu email để sử dụng sau

                require "sendmailController.php";
                if (sendCode($email, $code)) {
                    $_SESSION['thongbao'] = "Mã xác nhận đã được gửi.";
                    header("Location: index.php?act=verify_code");
                    exit;
                } else {
                    $_SESSION['thongbao'] = "Không thể gửi email.";
                }
            } else {
                $_SESSION['thongbao'] = "Email không tồn tại.";
            }

            header("Location: index.php?act=repass");
            exit;
        }
    }
}

?>