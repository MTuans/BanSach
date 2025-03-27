<?php
class trangchuModel
{
    public $mangsp;
    public $mangspmoi;
    public $mangspsale;
    // public $motsp;
    // public $ctsp;
    // public $nxb;
    // public $tacgia;
    public $allsp;
    public $chitietanh; 
    public $splq;

    public function dssp()
    {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();
        $sql = "SELECT * from sach where status = 0 order by so_luong_ban desc limit 8";
        $this->mangsp = $data->selectall($sql);
    }
    public function dsspMoi() 
    { 
        include_once 'models/connectmodel.php'; 
        $data = new ConnectModel(); 
        $sql = "SELECT * FROM sach WHERE status = 0 ORDER BY ngay_nhap DESC limit 8";
        $this->mangspmoi = $data->selectall($sql);
    }
    public function dsspSale()
    {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();
        $sql = "SELECT * from sach where status = 0 and giam > 0 order by giam desc limit 8";
        $this->mangspsale = $data->selectall($sql);
    }
    
    public function onectsp($id)
    {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();
        
        $sql = "SELECT sach.*, nha_xuat_ban.*, tac_gia.* FROM sach 
        LEFT JOIN nha_xuat_ban ON sach.id_nxb = nha_xuat_ban.id 
        LEFT JOIN tac_gia ON sach.id_tacgia = tac_gia.id 
        WHERE sach.id = :id";   
        $this->allsp = $data->selectone($sql, $id);;
    }
    
    public function chitietanh($id) // Lấy hình ảnh liên quan của ảnh
    { 
        include_once 'models/connectmodel.php'; 
        $data = new ConnectModel(); 
        $sql = "SELECT * FROM detail_image WHERE id_sach =:id_sach";
        $data->ketnoi();
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id_sach", $id, PDO::PARAM_INT);
        $stmt->execute();
        $this->chitietanh = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lưu dữ liệu vào thuộc tính
        $data->conn = null; // Đóng kết nối
    }
    public function splienquan($id, $idtl) {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();
        $sql = "SELECT * FROM sach WHERE id_theloai = :id_theloai AND id<>:id";
        $data->ketnoi();
        $stmt = $data->conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->bindParam(":id_theloai", $idtl, PDO::PARAM_INT);
        $stmt->execute();
        $this->splq = $stmt->fetchAll(PDO::FETCH_ASSOC); // Lưu dữ liệu vào thuộc tính
        $data->conn = null; // Đóng kết nối
    }
}

