<?php
class lienheController {
    public function __construct($action) {
        include_once "view/lienhe.php";
        if ($action == 'guimail') {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $address = $_POST['email'];
                $name = $_POST['name'] ?? "";
                $mess = $_POST['message'] ?? "";

                if (empty($address) || empty($name) || empty($mess)) {
                    echo "Vui lòng nhập đủ thông tin";
                } else {
                    $sendResult = $this->sendmail($address, $name, $mess);
                    if ($sendResult === true) {
                        $_SESSION['thongbao'] = 'Gửi thành công!';

                        header('location: ./index.php?act=contact');
                        exit();

                    } else {
                        $_SESSION['thongbao'] = 'Gửi không thành công vui lòng gửi lại!';

                        header('location: ./index.php?act=contact');
                        exit();

                    }
                }
            }
        }
    }



    public function sendmail($address, $name, $mess) {

        require 'PHPMailer-master/PHPMailer-master/src/PHPMailer.php';
        require 'PHPMailer-master/PHPMailer-master/src/SMTP.php';
    
        $mail = new \PHPMailer\PHPMailer\PHPMailer();
    
            $mail->isSMTP();
            $mail->Host       = 'smtp.gmail.com';
            $mail->SMTPAuth   = true;
            $mail->Username   = 'tiennttps39163@gmail.com'; 
            $mail->Password   = 'cfia cwou ubuz uhtv'; 
            $mail->SMTPSecure = \PHPMailer\PHPMailer\PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = 465;
    
            //người gửi
            $mail->setFrom('tiennttps39163@gmail.com' ,$address);
    
            //người nhận
            $mail->addAddress('tiennttps39163@gmail.com'); 
    
            //thêm phần này để không bị lỗi font chữ
            $mail->CharSet = 'UTF-8';

            $mail->isHTML(true);
            $mail->Subject = "Liên hệ từ : " . $name;
            $mail->Body    = $mess;
    
            $mail->send();
            return true;
        }
    }
    

?>
