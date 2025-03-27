<?php
class sanphamController {
    public function __construct($idtl = null, $idtg = null, $idnxb = null, $idtimkiem = null) {
        // Khởi tạo model
        include_once 'models/sanphammodel.php';
        $sanphammodel = new sanphamModel();

        // Lấy danh sách thể loại, tác giả, và nhà xuất bản
        $theloai = $sanphammodel->dstl();
        $tacgia = $sanphammodel->dstacgia();
        $nxb = $sanphammodel->dsnxb();

        // Biến chứa kết quả sản phẩm
        $kq = [];
        $message = "";

        // Kiểm tra tham số để xử lý
        if (!empty($idtimkiem)) {
            // Tìm kiếm sản phẩm
            $kq = $sanphammodel->timkiemsp($idtimkiem);

            // Thông báo nếu không tìm thấy sản phẩm
            if (empty($kq)) {
                $message = "Không tìm thấy kết quả nào cho từ khóa: " . htmlspecialchars($idtimkiem);
            }
        } elseif (!empty($idtl)) {
            // Lọc theo thể loại
            $kq = $sanphammodel->spTheoTheLoai($idtl);
        } elseif (!empty($idtg)) {
            // Lọc theo tác giả
            $kq = $sanphammodel->spTheoTacGia($idtg);
        } elseif (!empty($idnxb)) {
            // Lọc theo nhà xuất bản
            $kq = $sanphammodel->spTheoNXB($idnxb);
        }

        // Nếu không có tham số nào, lấy tất cả sản phẩm 
        if (empty($idtimkiem) && empty($idtl) && empty($idtg) && empty($idnxb)) {
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $sanphammodel->dssp($page);
            $kq = $sanphammodel->sp; 
           include_once 'view/sanpham.php';
        }

        // Truyền dữ liệu đến view
        include_once 'view/sanpham.php';
    }
}
?>
