<?php
require_once "model/UsersModel.php";

class UsersController
{
    private $UsersModel;

    public function __construct()
    {
        $this->UsersModel = new UsersModel();
    }
    // Hiển thị danh sách tác giả
    public function listUsers()
    {
        $users = $this->UsersModel->getAllUsers();

        // Kiểm tra nếu `$prders` bị null hoặc rỗng
        if (!$users) {
            $users = []; // Gán mảng rỗng để tránh lỗi trong View
        }
        // Gửi dữ liệu sang View
        require_once "Views/users.php";
    }
    public function addUsers($ho_ten, $sdt, $username, $mat_khau, $email, $vai_tro) {
        $result = $this->UsersModel->addUsers($ho_ten, $sdt, $username, $mat_khau, $email, $vai_tro);
        if ($result) {
            header("Location: index.php?page=users");
        } else {
            echo "Lỗi khi thêm người dùng.";
        }
    }
    // Xử lý xóa tác giả
    public function deleteUsers($id)
    {
        // Kiểm tra xem người dùng có đơn hàng không
        $hasOrders = $this->UsersModel->checkUserOrders($id);

        if ($hasOrders > 0) { // Nếu có đơn hàng, thông báo không thể xóa
            echo "<script>alert('Người dùng này có đơn hàng và không thể xóa.'); window.location.href = 'index.php?page=users';</script>";
            exit();
        } else { // Nếu không có đơn hàng, thực hiện xóa
            $result = $this->UsersModel->deleteUsers($id);
            if ($result) {
                header("Location: index.php?page=users");
            } else {
                echo "Lỗi khi xóa người dùng.";
            }
        }
    }
    public function updateUsers($id,$ho_ten, $sdt, $username, $mat_khau, $email, $vai_tro) {
        $result = $this->UsersModel->updateUsers($id,$ho_ten, $sdt, $username, $mat_khau, $email, $vai_tro);
        if ($result) {
            header("Location: index.php?page=users");
        } else {
            echo "Lỗi khi cập nhật .";
        }
    }
    public function getUsersById($id) {
        return $this->UsersModel->getUsersById($id);
    }
    
}