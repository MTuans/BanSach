<?php
require_once "ConnectModel.php";

class AuthorModel {
    private $conn;

    public function __construct() {
        $database = new ConnectModel();
        $this->conn = $database->connect();
    }

    public function getAllAuthors() {
        $stmt = $this->conn->prepare("SELECT * FROM tac_gia"); //prepare chuan bi cau lenh truy van tra ve cho $stmt
        $stmt->execute();//cau lenh thuc thi
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; //lay all du lieu theo cau lenh va tra ve dang keys&values
    }

    public function addAuthor($ten_tacgia) { 
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM tac_gia WHERE ten_tacgia = :ten_tacgia");
        $stmt->bindParam(':ten_tacgia', $ten_tacgia);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            $_SESSION['error_message'] = "Tác giả đã tồn tại! Vui lòng thử lại.";
            header("Location: index.php?page=author");
            exit;
        }
        $stmt = $this->conn->prepare("INSERT INTO tac_gia (ten_tacgia) VALUES (:ten_tacgia)");
        $stmt->bindParam(':ten_tacgia', $ten_tacgia);
        
        if ($stmt->execute()) {
            $_SESSION['message'] = "Thêm tác giả thành công!";
        } else {
            $_SESSION['error_message'] = "Đã xảy ra lỗi khi thêm tác giả. Vui lòng thử lại.";
        }
        header("Location: index.php?page=author");
        exit;
    }

    public function updateAuthor($id, $ten_tacgia) {
        $checkStmt = $this->conn->prepare("SELECT COUNT(*) FROM tac_gia WHERE ten_tacgia = :ten_tacgia AND id != :id");
        $checkStmt->bindParam(':ten_tacgia', $ten_tacgia);
        $checkStmt->bindParam(':id', $id);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();
    
        if ($count > 0) {
            return [
                'success' => false,
                'message' => "Tên tác giả đã tồn tại! Vui lòng chọn tên khác."
            ];
        }
        $stmt = $this->conn->prepare("UPDATE tac_gia SET ten_tacgia = :ten_tacgia WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ten_tacgia', $ten_tacgia);
    
        if ($stmt->execute()) {
            return [
                'success' => true,
                'message' => "Cập nhật tác giả thành công!"
            ];
        } else {
            return [
                'success' => false,
                'message' => "Đã xảy ra lỗi khi cập nhật. Vui lòng thử lại."
            ];
        }
    }
    
    public function deleteAuthor($id) {

        // kiểm tra xem tác giả có sách hay không
        $stmtCheck = $this->conn->prepare("SELECT COUNT(*) as book_count FROM sach WHERE id_tacgia = :id");
        $stmtCheck->bindParam(':id', $id);
        $stmtCheck->execute();
        $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);

    if ($result['book_count'] > 0) {
        return false;
    }
        $stmt = $this->conn->prepare("DELETE FROM tac_gia WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); 
    }
    public function getAuthorById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tac_gia WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); //lay 1 dong du lieu
    }
    
}
?>
