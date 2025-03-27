<?php
class thongkeModel
{
    private $conn;
    public function __construct()
    {
        $database = new ConnectModel();
        $this->conn = $database->connect();
    }

    public function sachdaban()
    {
        $stmt = $this->conn->prepare(" SELECT SUM(so_luong_ban) AS so_luong_sach_sale FROM sach;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function doanhthuhomnay()
    {
        $stmt = $this->conn->prepare("SELECT  SUM(sach.gia * chi_tiet_don_hang.so_luong) AS doanh_thu_hom_nay
                                    FROM don_hang
                                    INNER JOIN chi_tiet_don_hang ON don_hang.id = chi_tiet_don_hang.id_donhang
                                    INNER JOIN sach ON chi_tiet_don_hang.id_sach = sach.id
                                    WHERE don_hang.ngay_mua_hang = CURDATE();");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function doanhthuthang()
    {
        $stmt = $this->conn->prepare("SELECT SUM(sach.gia * chi_tiet_don_hang.so_luong) AS doanh_thu_thang
                                      FROM don_hang
                                      INNER JOIN chi_tiet_don_hang ON don_hang.id = chi_tiet_don_hang.id_donhang
                                      INNER JOIN sach ON chi_tiet_don_hang.id_sach = sach.id
                                      WHERE MONTH(ngay_mua_hang) = MONTH(CURDATE())");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function doanhthutuan()
    {
        $stmt = $this->conn->prepare("SELECT SUM(sach.gia * chi_tiet_don_hang.so_luong) AS doanh_thu_tuan
                                     FROM don_hang
                                     INNER JOIN chi_tiet_don_hang ON don_hang.id = chi_tiet_don_hang.id_donhang
                                     INNER JOIN sach ON chi_tiet_don_hang.id_sach = sach.id
                                     WHERE WEEK(ngay_mua_hang) = WEEK(CURDATE())");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function sachbanchaytheoloai()
    {
        $stmt = $this->conn->prepare("SELECT 
                                            t.ten_theloai,
                                            SUM(cd.so_luong) AS so_luong_ban
                                        FROM 
                                            chi_tiet_don_hang cd
                                        JOIN 
                                            sach s ON cd.id_sach = s.id
                                        JOIN 
                                            the_loai t ON s.id_theloai = t.id
                                        GROUP BY 
                                            t.ten_theloai
                                        ORDER BY 
                                            so_luong_ban DESC;
                                        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }

    public function sachdaban7ngay() {
        $stmt = $this->conn->prepare("SELECT DAYOFWEEK(ngay_mua_hang) AS ngay, SUM(chi_tiet_don_hang.so_luong) AS so_luong_ban
                                      FROM don_hang
                                      INNER JOIN chi_tiet_don_hang ON don_hang.id = chi_tiet_don_hang.id_donhang
                                      WHERE ngay_mua_hang >= CURDATE() - INTERVAL 7 DAY
                                      GROUP BY ngay
                                      ORDER BY ngay;");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC) ?: [];
    }
    

}
