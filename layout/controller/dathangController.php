<?php
    class dathangController {
        public function __construct($action) {
            include_once 'models/dathangmodel.php';
            $DatHangModel = new DatHangModel();
    
            include_once 'dangnhapController.php';
    
            if (isset($_SESSION['id'])) {
                $userId = $_SESSION['id'];
            }
    
            if ($action == 'dathang' ) {
                if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['dathang'])) {
                    $ho_ten = $_POST['ho_ten'];
                    $sdt = $_POST['sdt'];
                    $dia_chi = $_POST['dia_chi'];
                    $ghi_chu = $_POST['ghi_chu'];
                    $pt_thanhtoan = $_POST['pt_thanhtoan'];

                    $DatHangModel->capnhat_user($userId, $ho_ten, $sdt);

                    $id_donhang = $DatHangModel->themdh($userId, $dia_chi, $ghi_chu);
    
                    if ($id_donhang) {
                        foreach ($_SESSION['cart'] as $key => $item) {
                            $DatHangModel->themctdh($id_donhang, $item['id'], $item['sl'], $pt_thanhtoan);
                            $DatHangModel->capnhat_soluong_ban($item['id'], $item['sl']);

                        }

                    } else {
                        $_SESSION['thongbao'] = 'Đặt hàng thất bại';
                    }
                    
                    unset($_SESSION['cart']);
                    header('location: index.php?act=thanhtoan');
                    exit();
                }
            }elseif(!isset($_SESSION['cart']) || empty($_SESSION['cart'])){
                $_SESSION['thongbao'] = 'Giỏ hàng của bạn hiện tại không có sản phẩm';

                header('location: ./index.php?act=cart');
                exit();            
            }else{
                include_once 'view/dathang.php';
            }
        }
    }
    
?>