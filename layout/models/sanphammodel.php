<?php
class sanphamModel {
    public $theloai;
    public $tacgia;
    public $nxb;
    public $sp;
    public $timkiem;

    // Lấy tất cả thể loại
    public function dstl() {
        include_once 'models/connectmodel.php';
        $dulieu = new ConnectModel();
        $sql = 'SELECT * FROM the_loai';
        $this->theloai = $dulieu->selectall($sql);
    }

    // Lấy tất cả tác giả
    public function dstacgia() {
        include_once 'models/connectmodel.php';
        $dulieu = new ConnectModel();
        $sql = 'SELECT * FROM tac_gia';
        $this->tacgia = $dulieu->selectall($sql);
    }

    // Lấy tất cả nhà xuất bản
    public function dsnxb() {
        include_once 'models/connectmodel.php';
        $dulieu = new ConnectModel();
        $sql = 'SELECT * FROM nha_xuat_ban';
        $this->nxb = $dulieu->selectall($sql);
    }

    // Lấy tất cả sản phẩm
    // public function dssp() {
    //     include_once 'models/connectmodel.php';
    //     $dulieu = new ConnectModel();
    //     $sql = 'SELECT * FROM sach';
    //     $this->sp = $dulieu->selectall($sql);
    // }

    public function dssp($page = 1) {
        include_once 'models/connectmodel.php';
        $dulieu = new ConnectModel();
        
        // Số lượng sản phẩm mỗi trang
        $perPage = 9;
        
        // Tính toán OFFSET dựa trên trang hiện tại
        $offset = ($page - 1) * $perPage;
        
        // Truy vấn SQL với LIMIT và OFFSET
        $sql = "SELECT * FROM sach LIMIT $perPage OFFSET $offset";
        $this->sp = $dulieu->selectall($sql);
    }
    

    // Lọc sản phẩm theo tác giả
    public function spTheoTacGia($idtg) {
        include_once 'models/connectmodel.php';
        $dulieu = new ConnectModel();
        $sql = "SELECT * FROM sach WHERE id_tacgia = :id_tacgia";
        $dulieu->ketnoi();
        $stmt = $dulieu->conn->prepare($sql);
        $stmt->bindParam(':id_tacgia', $idtg);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dulieu->conn = null;
        return $kq;
    }

    // Lọc sản phẩm theo nhà xuất bản
    public function spTheoNXB($idnxb) {
        include_once 'models/connectmodel.php';
        $dulieu = new ConnectModel();
        $sql = "SELECT * FROM sach WHERE id_nxb = :id_nxb";
        $dulieu->ketnoi();
        $stmt = $dulieu->conn->prepare($sql);
        $stmt->bindParam(':id_nxb', $idnxb);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $dulieu->conn = null;
        return $kq;
    }

    public function spTheoTheLoai($idtl)
    {
        include_once 'models/connectmodel.php';
        $dulieu = new ConnectModel();
        $sql = "select * from sach where id_theloai=:id_theloai";
        $dulieu->ketnoi();
        $stmt = $dulieu->conn->prepare($sql);
        $stmt->bindParam(":id_theloai",$idtl);
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // PDO::FETCH_ASSOC : chuyển dl mãng lk
        $dulieu->conn = null; // đóng kết nối database
        return $kq; // biến này chứa mãng các dòng dữ liệu trả về.
    }
    public function timkiemsp($idtimkiem) // Lấy hình ảnh liên quan của ảnh
    { 
        include_once 'models/connectmodel.php'; 
        $dulieu = new ConnectModel(); 
        $sql = "SELECT * FROM sach WHERE ten_sach LIKE :idtimkiem";
        $dulieu->ketnoi();
        $stmt = $dulieu->conn->prepare($sql);
        $stmt->execute(['idtimkiem' =>'%' . $idtimkiem .'%']);
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lưu dữ liệu vào thuộc tính
        $dulieu->conn = null; // Đóng kết nối
        return $kq;
    }
}
?>
