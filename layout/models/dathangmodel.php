<?php
class DatHangModel {
    public $sanpham;


        public function capnhat_soluong_ban($id_sach, $so_luong)
    {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();

        $sql = "UPDATE sach SET so_luong_ban = so_luong_ban + :so_luong WHERE id = :id_sach";

        $params = array(':so_luong' => $so_luong, ':id_sach' => $id_sach);        
        $data->modify($sql, $params);
    }

    public function capnhat_user($id, $ho_ten, $sdt) {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();
    
        $sql = 'UPDATE user SET ho_ten = :ho_ten, sdt = :sdt WHERE id = :id';
        $params = array(':ho_ten' => $ho_ten, ':sdt' => $sdt, ':id' => $id);
        $data->modify($sql, $params);
    }

    public function themdh($id_khachhang, $dia_chi, $ghi_chu) {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();
        $conn = $data->ketnoi();
    
        $sql = "INSERT INTO don_hang (id_khachhang, dia_chi, tt_donhang, tt_thanhtoan, ghi_chu, ngay_mua_hang) 
        VALUES (:id_khachhang, :dia_chi, 'Chờ xử lý', 'Đã thanh toán', :ghi_chu, NOW())";
        
        $stmt = $conn->prepare($sql);
        $stmt->execute([
            ':id_khachhang' => $id_khachhang,
            ':dia_chi' => $dia_chi,
            ':ghi_chu' => $ghi_chu
        ]);
    
            return $conn->lastInsertId();
            $conn = null; 
        
    }
         
    public function themctdh($id_donhang, $id_sach, $so_luong, $pt_thanhtoan)
    {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();
        
        $sql = "INSERT INTO chi_tiet_don_hang (id_donhang, id_sach, so_luong, pt_thanhtoan) 
                VALUES (:id_donhang, :id_sach, :so_luong, :pt_thanhtoan)";
        
        $params = array(':id_donhang' => $id_donhang, ':id_sach' => $id_sach, ':so_luong' => $so_luong, ':pt_thanhtoan' => $pt_thanhtoan);
        $data->modify($sql, $params);
    }
    
}
?>