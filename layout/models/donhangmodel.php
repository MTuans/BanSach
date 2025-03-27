<?php
class DonHangModel
{
    public $donhang;
    public $ctdonhang;

    public function dsdh($id)
    {
        include_once 'models/connectmodel.php';
        $dulieu = new ConnectModel();
        
        $sql = 'SELECT don_hang.id AS donhang_id, 
                        don_hang.ngay_mua_hang, 
                        don_hang.tt_donhang,  
                        chi_tiet_don_hang.so_luong,
                        chi_tiet_don_hang.id_donhang,
                        chi_tiet_don_hang.pt_thanhtoan,
                        sach.gia,
                        sach.ten_sach,
                        sach.hinh
                FROM don_hang
                INNER JOIN chi_tiet_don_hang ON don_hang.id = chi_tiet_don_hang.id_donhang
                INNER JOIN sach ON sach.id = chi_tiet_don_hang.id_sach
                WHERE don_hang.id_khachhang = :id
                ORDER BY donhang_id DESC';
        
        $this->donhang = $dulieu->selectall($sql, [':id' => $id]);
    }
        public function ctdh($id)
    {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();
        
        $sql = "SELECT 
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
                WHERE don_hang.id = :id";   
        $this->ctdonhang = $data->selectall($sql, [':id' => $id]);
    }
    public function huydonhang($id)
    {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();
        
        $sql = "UPDATE don_hang
                SET tt_donhang = 'Đã hủy'
                WHERE id = :id";
        $data->selectone($sql, $id);
    }

    public function capnhatdiachi($id, $dia_chi)
    {
        include_once 'models/connectmodel.php';
        $data = new ConnectModel();
        
        $sql = "UPDATE don_hang
                SET dia_chi = :dia_chi
                WHERE id = :id";
        
        $params = array(':dia_chi' => $dia_chi, ':id' => $id);
        
        $data->modify($sql, $params);
    }
    }