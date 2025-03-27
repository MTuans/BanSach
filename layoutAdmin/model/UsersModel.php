<?php
require_once "ConnectModel.php";

class UsersModel
{
    private $conn;

    public function __construct()
    {
        $database = new ConnectModel();
        $this->conn = $database->connect();
    }

    // Lấy tất cả tác giả
    public function getAllUsers()
    {
        $stmt = $this->conn->prepare(" SELECT * FROM user Order by id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }
    // Thêm tác giả
    public function addUsers($ho_ten, $sdt, $username, $mat_khau, $email, $vai_tro)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO user (ho_ten, sdt, username, mat_khau, email, vai_tro) 
            VALUES (:ho_ten, :sdt, :username, :mat_khau, :email, :vai_tro)
        ");
        $stmt->bindParam(':ho_ten', $ho_ten);
        $stmt->bindParam(':sdt', $sdt);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':mat_khau', $mat_khau);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':vai_tro', $vai_tro);
        return $stmt->execute(); // Trả về true nếu thành công
    }
    // Xóa tác giả
    public function deleteUsers($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); // Trả về true nếu thành công
    }
    
    public function checkUserOrders($userId)
    {
        // Truy vấn để đếm số đơn hàng của người dùng
        $query = "SELECT COUNT(*) as order_count FROM don_hang WHERE id_khachhang = :user_id";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':user_id', $userId, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        // Trả về số lượng đơn hàng
        return $result['order_count'];
    }

    public function updateUsers($id, $ho_ten, $sdt, $username, $mat_khau, $email, $vai_tro)
    {
        $stmt = $this->conn->prepare("UPDATE user SET ho_ten = :ho_ten, sdt = :sdt, username = :username, mat_khau = :mat_khau, email = :email, vai_tro = :vai_tro WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ho_ten', $ho_ten);
        $stmt->bindParam(':sdt', $sdt);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':mat_khau', $mat_khau);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':vai_tro', $vai_tro);
        return $stmt->execute(); // Trả về true nếu thành công
    }

    public function getUsersById($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM user WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về 1 dòng dữ liệu
    }
}
