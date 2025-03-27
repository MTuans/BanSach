<?php
require "connectmodel.php";
class dangkyModel {
    private $db;

    public function __construct() {
        $connectModel = new ConnectModel();
        $this->db = $connectModel->ketnoi();
    }

    public function registerUser($hoTen, $sdt, $username, $email, $hashedPassword) {
        try {
            // $hashedPassword = password_hash($hashedPassword, PASSWORD_DEFAULT);
            $sql = "INSERT INTO user (ho_ten, sdt, username, email, mat_khau, vai_tro)
                    VALUES (:ho_ten, :sdt, :username, :email, :mat_khau, 0)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':ho_ten', $hoTen);
            $stmt->bindParam(':sdt', $sdt);
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $hashedPassword);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Lỗi đăng ký: " . $e->getMessage());
            return false;
        }
    }

    public function isUsernameExists($username) {
        try {
            $sql = "SELECT COUNT(*) FROM user WHERE username = :username";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0; // Trả về true nếu tồn tại
        } catch (PDOException $e) {
            error_log("Lỗi kiểm tra username: " . $e->getMessage());
            return true; // Mặc định trả về true nếu có lỗi
        }
    }

    public function isEmailExists($email) {
        try {
            $sql = "SELECT COUNT(*) FROM user WHERE email = :email";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $count = $stmt->fetchColumn();
            return $count > 0; // Trả về true nếu email tồn tại
        } catch (PDOException $e) {
            error_log("Lỗi kiểm tra email: " . $e->getMessage());
            return true; // Mặc định trả về true nếu có lỗi
        }
    }
}