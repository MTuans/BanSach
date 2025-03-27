<?php
require_once "ConnectModel.php";

class CategoryModel {
    private $conn;

    public function __construct() {
        $database = new ConnectModel();
        $this->conn = $database->connect();
    }

    public function getAllCategory() {
        $stmt = $this->conn->prepare("SELECT * FROM the_loai");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function addCategory($ten_theloai) { 
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM the_loai WHERE ten_theloai = :ten_theloai");
        $stmt->bindParam(':ten_theloai', $ten_theloai);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            $_SESSION['error_message'] = "Thể loại đã tồn tại! Vui lòng thử lại.";
            header("Location: index.php?page=category");
            exit;
        }
        $stmt = $this->conn->prepare("INSERT INTO the_loai (ten_theloai) VALUES (:ten_theloai)");
        $stmt->bindParam(':ten_theloai', $ten_theloai);
        
        if ($stmt->execute()) {
            $_SESSION['message'] = "Thêm Thể loại thành công!";
        } else {
            $_SESSION['error_message'] = "Đã xảy ra lỗi khi thêm Thể loại. Vui lòng thử lại.";
        }
        header("Location: index.php?page=category");
        exit;
    }
    
    public function updateCategory($id, $ten_theloai) {
        $checkStmt = $this->conn->prepare("SELECT COUNT(*) FROM the_loai WHERE ten_theloai = :ten_theloai AND id != :id");
        $checkStmt->bindParam(':ten_theloai', $ten_theloai);
        $checkStmt->bindParam(':id', $id);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();
    
        if ($count > 0) {
            return [
                'success' => false,
                'message' => "Tên thể loại đã tồn tại! Vui lòng chọn tên khác."
            ];
        }
        $stmt = $this->conn->prepare("UPDATE the_loai SET ten_theloai = :ten_theloai WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ten_theloai', $ten_theloai);
    
        if ($stmt->execute()) {
            return [
                'success' => true,
                'message' => "Cập nhật thể loại thành công!"
            ];
        } else {
            return [
                'success' => false,
                'message' => "Đã xảy ra lỗi khi cập nhật. Vui lòng thử lại."
            ];
        }
    }
    public function deleteCategory($id) {

        $stmtCheck = $this->conn->prepare("SELECT COUNT(*) as book_count FROM sach WHERE id_theloai = :id");
        $stmtCheck->bindParam(':id', $id, PDO::PARAM_INT);
        $stmtCheck->execute();
        $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);
    
        if ($result['book_count'] > 0) {
            return false;
        }

        $stmt = $this->conn->prepare("DELETE FROM the_loai WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); 
    }
    public function getCategoryById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM the_loai WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); // Trả về 1 dòng dữ liệu
    }
    
}
?>
