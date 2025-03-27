<?php
class trangchuController {
    public function __construct($id, $idtl) {
        include_once "models/trangchumodel.php";
        $trangchumodel = new trangchuModel();

        if ($id != '') {
            $trangchumodel->onectsp($id); // Lấy chi tiết sản phẩm
            $trangchumodel->chitietanh($id); // Lấy hình ảnh chi tiết
            $trangchumodel->splienquan($id,$idtl); // Lấy sản phẩm liên quan
            include_once 'view/chitietsanpham.php';

            
        } else {
            $trangchumodel->dssp(); // Lấy danh sách sản phẩm bán chạy
            $trangchumodel->dsspMoi(); // Lấy danh sách sản phẩm mới
            $trangchumodel->dsspSale(); // Lấy danh sách sản phẩm giảm giá
            include_once "view/trangchu.php";
        }
    }
}
