<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function sendmail($address, $name, $mess) {


    require 'PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/src/Exception.php';
    require 'PHPMailer-master/src/SMTP.php';

    $mail = new PHPMailer(true);

    try {
        // Cấu hình server gửi email
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'tiennttps39163@gmail.com';
        $mail->Password   = 'cfia cwou ubuz uhtv';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
        $mail->Port       = 465;

        // Người gửi và người nhận
        $mail->setFrom($address);
        $mail->addAddress('tiennttps39163@gmail.com');

        // Nội dung email
        $mail->isHTML(true);
        $mail->Subject = "Liên hệ từ: " . $name;
        $mail->Body    = $mess;
        $mail->AltBody = $mess;

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;
    }

}

function sendCode($email,$code){
    require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
    require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';

    $mail = new \PHPMailer\PHPMailer\PHPMailer();


    // Cấu hình SMTP
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com'; // SMTP của Gmail
    $mail->SMTPAuth = true;
    $mail->Username = 'tiennttps39163@gmail.com'; // Email của bạn
    $mail->Password = 'cfia cwou ubuz uhtv'; // Mật khẩu ứng dụng hoặc mật khẩu email
    $mail->SMTPSecure =\PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
    $mail->Port = 465;

    // Thiết lập thông tin người gửi
    $mail->setFrom('tiennttps39163@gmail.com');

    // Thiết lập thông tin người nhận
    $mail->addAddress($email);

    // sửa lỗi font chữ
    $mail->CharSet = 'UTF-8';
    // Nội dung email
    $mail->isHTML(true); // Gửi email dạng HTML
    $mail->Subject = 'Yêu cầu đặt lại mật khẩu';

    $mail->Body = "Xin chào, mã xác nhận của bạn là $code. Mã này có hiệu lực trong 5 phút.";

    // Gửi email
    $mail->send();
    return true;

}
?>
