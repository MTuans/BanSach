<?php
require "connectModel.php";
class dangnhapModel {
    public $dangnhap;
    public function __construct(){

        $database=new connectModel();
        $this->dangnhap= $database->ketnoi();
    }

    public function login($user) {
        $stmt = $this->dangnhap->prepare("SELECT * FROM user WHERE username = :user");
        $stmt->bindParam(':user', $user);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về dữ liệu người dùng (gồm cả password mã hóa)
    }


}