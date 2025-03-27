<?php
require_once "ConnectModel.php";

class orderModel
{
    private $conn;
    public function __construct()
    {
        $database = new ConnectModel();
        $this->conn = $database->connect();
    }

    public function getAllOrders()
    {
        $stmt = $this->conn->prepare(" SELECT don_hang.*, user.ho_ten AS ten_khachhang FROM don_hang JOIN user ON don_hang.id_khachhang = user.id Order by id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }
    public function updateOrderStatus($id, $tt_donhang) {
        $stmt = $this->conn->prepare("UPDATE don_hang SET tt_donhang = :tt_donhang WHERE id = :id");
        $stmt->bindParam(':tt_donhang', $tt_donhang);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }
        public function ctdh($id)
    {
        $stmt = $this->conn->prepare("SELECT 
                                    don_hang.id AS donhang_id,
                                    don_hang.ngay_mua_hang,
                                    don_hang.dia_chi,
                                    don_hang.tt_donhang,
                                    don_hang.tt_thanhtoan,
                                    don_hang.ghi_chu,
                                    chi_tiet_don_hang.so_luong,
                                    chi_tiet_don_hang.pt_thanhtoan,
                                    sach.id AS sach_id,
                                    sach.ten_sach,
                                    sach.gia
                                    FROM don_hang
                                    INNER JOIN chi_tiet_don_hang 
                                    ON don_hang.id = chi_tiet_don_hang.id_donhang
                                    INNER JOIN sach
                                    ON sach.id = chi_tiet_don_hang.id_sach
                                    WHERE don_hang.id = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }
}
