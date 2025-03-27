<?php
class nhapcodeController {
    public function __construct() {
        require "view/nhapcode.php";
        // var_dump( $_SESSION['code']);
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['code'])) {
            $code = $_POST['code'];

            
            if (time() > $_SESSION['code_time']) {
                $_SESSION['thongbao'] = "Mã xác nhận đã hết hạn. Vui lòng yêu cầu mã mới.";
                header("Location: index.php?act=repass");
                exit;
            }


            if ($code == $_SESSION['code']) {
                $_SESSION['thongbao'] = "Mã xác nhận chính xác.";
                header("Location: index.php?act=reset_password");
                exit;
            } else {
                $_SESSION['thongbao'] = "Mã xác nhận không đúng.";
                header("Location: index.php?act=verify_code");
                exit;
            }
        }
    }
}

?>