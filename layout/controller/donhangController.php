<?php
class donhangController {
    public function __construct($id, $action) {
        include_once 'dangnhapController.php';
        include_once 'models/donhangmodel.php';
        $DonHangModel = new DonHangModel();


        if (isset($_SESSION['id'])) {
            $userId = $_SESSION['id']; 
        }

        //huỷ đơn hàng
        if($action == 'huy' && $id != '') {
            $DonHangModel->huydonhang($id);
            header("location: ./index.php?act=lichsu&id=" . $userId);
            exit();

            //xem chi tiết đơn hang
            }elseif($action == 'xemchitiet') {
                $DonHangModel->ctdh($id);
                $ctdh = $DonHangModel->ctdonhang;
                include_once 'view/chitietdonhang.php';

            //thay đổi địa chỉ nhận hàng
            }elseif($action == 'doidiachi'){
                include_once 'view/chitietdonhang.php';
                $dia_chi = $_POST['dia_chi'];
                $DonHangModel->capnhatdiachi($id, $dia_chi);

                $_SESSION['thongbao'] = 'Đã đổi địa chỉ thành công';
                header("location: ./index.php?act=lichsu&id=" . $userId);
                exit();            
        }else{
            $DonHangModel->dsdh($userId);
            $dh = $DonHangModel->donhang;

            $ttdh = [];
            foreach ($dh as $key => $value) {
                $ttdh[$value['donhang_id']]['tt'] = [
                    'ngay_mua_hang' => $value['ngay_mua_hang'],
                    'tt_donhang' => $value['tt_donhang'],
                    'pt_thanhtoan' => $value['pt_thanhtoan'],
                ];

                $ttdh[$value['donhang_id']]['sanpham'][] = [
                    'ten_sach' => $value['ten_sach'],
                    'so_luong' => $value['so_luong'],
                    'gia' => $value['gia'],
                    'hinh' => $value['hinh'],
                ];
            }

            include_once 'view/lichsumuahang.php';  
            return $ttdh;

        }
    }
}


