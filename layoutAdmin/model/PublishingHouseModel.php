<?php
require_once "ConnectModel.php";

class PublishingHouseModel {
    private $conn;

    public function __construct() {
        $database = new ConnectModel();
        $this->conn = $database->connect();
    }

    public function getAllPublishingHouses() {
        $stmt = $this->conn->prepare("SELECT * FROM nha_xuat_ban");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function addPublishingHouse($ten_nxb) { 
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM nha_xuat_ban WHERE ten_nxb = :ten_nxb");
        $stmt->bindParam(':ten_nxb', $ten_nxb);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        if ($count > 0) {
            $_SESSION['error_message'] = "Nhà Xuất Bản đã tồn tại! Vui lòng thử lại.";
            header("Location: index.php?page=publishinghouse");
            exit;
        }
        $stmt = $this->conn->prepare("INSERT INTO nha_xuat_ban (ten_nxb) VALUES (:ten_nxb)");
        $stmt->bindParam(':ten_nxb', $ten_nxb);
        
        if ($stmt->execute()) {
            $_SESSION['message'] = "Thêm Nhà Xuất Bản thành công!";
        } else {
            $_SESSION['error_message'] = "Đã xảy ra lỗi khi thêm Nhà Xuất Bản. Vui lòng thử lại.";
        }
        header("Location: index.php?page=publishinghouse");
        exit;
    }

    public function updateAuthor($id, $ten_nxb) {
        $checkStmt = $this->conn->prepare("SELECT COUNT(*) FROM nha_xuat_ban WHERE ten_nxb = :ten_nxb AND id != :id");
        $checkStmt->bindParam(':ten_nxb', $ten_nxb);
        $checkStmt->bindParam(':id', $id);
        $checkStmt->execute();
        $count = $checkStmt->fetchColumn();
    
        if ($count > 0) {
            return [
                'success' => false,
                'message' => "Tên nhà xuất bản đã tồn tại! Vui lòng chọn tên khác."
            ];
        }
        $stmt = $this->conn->prepare("UPDATE nha_xuat_ban SET ten_nxb = :ten_nxb WHERE id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':ten_nxb', $ten_nxb);
    
        if ($stmt->execute()) {
            return [
                'success' => true,
                'message' => "Cập nhật nhà xuất bản thành công!"
            ];
        } else {
            return [
                'success' => false,
                'message' => "Đã xảy ra lỗi khi cập nhật. Vui lòng thử lại."
            ];
        }
    }

 
    public function deletePublishingHouse($id) {

        $stmtCheck = $this->conn->prepare("SELECT COUNT(*) as book_count FROM sach WHERE id_nxb = :id");
        $stmtCheck->bindParam(':id', $id, PDO::PARAM_INT);
        $stmtCheck->execute();
        $result = $stmtCheck->fetch(PDO::FETCH_ASSOC);

        if ($result['book_count'] > 0) {
            return false;
        }

        $stmt = $this->conn->prepare("DELETE FROM nha_xuat_ban WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }


    public function getPublishingHouseById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM nha_xuat_ban WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
}
?>
