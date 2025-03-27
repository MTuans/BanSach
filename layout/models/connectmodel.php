<?php
class ConnectModel
{
    public $servername = "localhost";
    public $username = "root";
    public $password = "";
    public $conn;

    public function ketnoi()
    {
        try {
            $this->conn = new PDO("mysql:host=" . $this->servername . ";port=3306;dbname=da1;charset=utf8", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            // echo 'kết nối thành công';
            return $this->conn;
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function selectall($sql, $params = [])
    {
        $this->ketnoi();
        $stmt = $this->conn->prepare($sql);

        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindParam($key, $value);
            }
        }

        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả dòng dữ liệu
        $this->conn = null; // Đóng kết nối
        return $kq;
    }

    public function selectone($sql,$id)
    {
        $this->ketnoi();
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
        $this->conn = null; // đóng kết nối database
        return $kq; // biến này chứa mãng các dòng dữ liệu trả về.
    }

    // dùng cho thêm sửa xoá
    public function modify($sql, $params) {
        $this->conn = $this->ketnoi();
        $stmt = $this->conn->prepare($sql);

        if (is_array($params)) { // nếu $params là một mảng
            foreach ($params as $key => $value) { // duyệt mảng
                $stmt->bindParam($key, $value); // gán mỗi giá trị trong mảng vào câu lệnh SQL
            }
        }

        $stmt->execute($params);
        $this->conn = null;
    }


    public function selectonepass($sql, $params) {
        $this->ketnoi();
        $stmt = $this->conn->prepare($sql);
        foreach ($params as $key => $value) {
            $stmt->bindParam($key, $value);
        }
        $stmt->execute();
        $kq = $stmt->fetch(PDO::FETCH_ASSOC);  // Lấy một kết quả duy nhất
        $this->conn = null;  // Đóng kết nối
        return $kq;  // Trả về một kết quả duy nhất (mảng kết quả)
    }

    public function selectonemail($sql, $email) {
        $this->ketnoi();
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':email', $email); // Truyền tham số email trực tiếp
        $stmt->execute();
        $kq = $stmt->fetch(PDO::FETCH_ASSOC);  // Lấy một kết quả duy nhất
        $this->conn = null;  // Đóng kết nối
        return $kq;  // Trả về kết quả
    }

}




