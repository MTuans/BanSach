<?php
require_once "ConnectModel.php";

class BookModel {
    private $conn;

   public function __construct() {
        $database = new ConnectModel();
        $this->conn = $database->connect();
    }
    public function getAllBooks() {
        $stmt = $this->conn->prepare("SELECT b.*, t.ten_theloai, tg.ten_tacgia, n.ten_nxb
                FROM sach b
                LEFT JOIN the_loai t ON b.id_theloai = t.id
                LEFT JOIN tac_gia tg ON b.id_tacgia = tg.id
                LEFT JOIN nha_xuat_ban n ON b.id_nxb = n.id");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; 
}


public function addBooks($id_theloai, $id_tacgia, $id_nxb, $ten_sach, $hinh, $gia, $giam, $mo_ta, $nam_xb, $so_luong_ban) {
    $stmt = $this->conn->prepare("SELECT COUNT(*) FROM sach WHERE ten_sach = :ten_sach");
    $stmt->bindParam(':ten_sach', $ten_sach);
    $stmt->execute();
    $count = $stmt->fetchColumn();
    if ($count > 0) {
        return false;
    }
    $stmt = $this->conn->prepare("INSERT INTO sach (id_theloai, id_tacgia, id_nxb, ten_sach, hinh, gia, giam, mo_ta, nam_xb, so_luong_ban, ngay_nhap, status) 
                                   VALUES (:id_theloai, :id_tacgia, :id_nxb, :ten_sach, :hinh, :gia, :giam, :mo_ta, :nam_xb, :so_luong_ban, NOW(), 0)");
    
    $stmt->bindParam(':id_theloai', $id_theloai);
    $stmt->bindParam(':id_tacgia', $id_tacgia);
    $stmt->bindParam(':id_nxb', $id_nxb);
    $stmt->bindParam(':ten_sach', $ten_sach);
    $stmt->bindParam(':hinh', $hinh);
    $stmt->bindParam(':gia', $gia);
    $stmt->bindParam(':giam', $giam);
    $stmt->bindParam(':mo_ta', $mo_ta);
    $stmt->bindParam(':nam_xb', $nam_xb);
    $stmt->bindParam(':so_luong_ban', $so_luong_ban);

    return $stmt->execute(); 
}



public function updateBook($id, $id_theloai, $id_tacgia, $id_nxb, $ten_sach, $hinh, $gia, $giam, $mo_ta, $nam_xb, $so_luong_ban) {
    $checkStmt = $this->conn->prepare("SELECT COUNT(*) FROM sach WHERE ten_sach = :ten_sach AND id != :id");
    $checkStmt->bindParam(':ten_sach', $ten_sach);
    $checkStmt->bindParam(':id', $id);
    $checkStmt->execute();
    $count = $checkStmt->fetchColumn();
    if ($count > 0) {
        return [
            'success' => false,
            'message' => "Tên sách đã tồn tại! Vui lòng chọn tên khác."
        ];
    }
    $stmt = $this->conn->prepare(
        "UPDATE sach 
        SET ten_sach = :ten_sach, 
            id_theloai = :ten_theloai, 
            id_tacgia = :ten_tacgia, 
            id_nxb = :ten_nxb, 
            gia = :gia, 
            giam = :giam, 
            mo_ta = :mo_ta, 
            nam_xb = :nam_xb, 
            so_luong_ban = :so_luong_ban,
            hinh = :hinh
        WHERE id = :id"
    );
    $stmt->bindParam(':ten_sach', $ten_sach);
    $stmt->bindParam(':ten_theloai', $id_theloai);
    $stmt->bindParam(':ten_tacgia', $id_tacgia);
    $stmt->bindParam(':ten_nxb', $id_nxb);
    $stmt->bindParam(':gia', $gia);
    $stmt->bindParam(':giam', $giam);
    $stmt->bindParam(':mo_ta', $mo_ta);
    $stmt->bindParam(':nam_xb', $nam_xb);
    $stmt->bindParam(':so_luong_ban', $so_luong_ban);
    $stmt->bindParam(':hinh', $hinh);
    $stmt->bindParam(':id', $id);
    try {
        if ($stmt->execute()) {
            return [
                'success' => true,
                'message' => "Cập nhật sách thành công!"
            ];
        } else {
            $errorInfo = $stmt->errorInfo();
            return [
                'success' => false,
                'message' => "Đã xảy ra lỗi khi cập nhật sách. Vui lòng thử lại. Lỗi: " . $errorInfo[2]
            ];
        }
    } catch (Exception $e) {
        return [
            'success' => false,
            'message' => "Lỗi hệ thống: " . $e->getMessage()
        ];
    }
}



    public function getBookById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM sach WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }
    
    public function hiddenBook($id){
        $stmt = $this->conn->prepare("UPDATE sach SET status = 1 WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); 
    }
    public function showBook($id){
        $stmt = $this->conn->prepare("UPDATE sach SET status = 0 WHERE id = :id");
        $stmt->bindParam(':id', $id);
        return $stmt->execute(); 
    }
    
    public function getHiddenBook(){
        $stmt = $this->conn->prepare("SELECT *
                                    FROM sach
                                    INNER JOIN the_loai ON sach.id_theloai = the_loai.id
                                    INNER JOIN nha_xuat_ban ON sach.id_nxb = nha_xuat_ban.id
                                    INNER JOIN tac_gia ON sach.id_tacgia = tac_gia.id
                                    WHERE sach.status = 1;");
        $stmt->execute(); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: []; 
    }
}
?>
