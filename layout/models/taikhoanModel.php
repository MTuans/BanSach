<?php
class taikhoanModel
{
    public function __construct() {

    }

    // Cập nhật thông tin tài khoản
    public function updateAccountInfo($ho_ten, $sdt, $email, $user_id)
    {
        $sql = "UPDATE user SET ho_ten = :ho_ten, sdt = :sdt, email = :email WHERE id = :user_id";
        require "connectmodel.php";
        // Kết nối và thực thi câu lệnh SQL
        $connect = new ConnectModel();
        $params = [
            ':ho_ten' => $ho_ten,
            ':sdt' => $sdt,
            ':email' => $email,
            ':user_id' => $user_id
        ];
        try {
            // Thực thi câu lệnh SQL
            $connect->modify($sql, $params);
            return "<script>
                        alert('Cập Nhật Thành Công!');
                    </script>";
        } catch (Exception $e) {
            return "<script>
                        alert('Cập Nhật Thất Bại!');
                    </script>" . $e->getMessage();
        }
    }
}
