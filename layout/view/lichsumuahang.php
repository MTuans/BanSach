<main class="wrap">
    <div class="dieuhuong">
        <a href="taikhoan.html" >Tài khoản</a> /
        <a href="lichsumuahang.html" id="back">Lịch sử mua hàng</a>
    </div>
    <?php
    if (isset($ttdh) && !empty($ttdh)) {
        foreach ($ttdh as $donhang_id => $donhang) {
            echo '<div class="lichsumuahang shadow p-3 rounded">
                <div class="fw-bold">Mã đơn hàng: #'.$donhang_id.'</div>
                    <div class="thongtinls d-flex flex-column">';

            foreach ($donhang['sanpham'] as $sanpham) {
                echo '
                <div class="ttdh d-flex justify-content-between align-items-center w-100">
                    <img src="public/img/IMG_DA1/san pham/'.$sanpham['hinh'].'" class="img-thumbnail img_dh" alt="...">
                    <div class="ten-sach">'.$sanpham['ten_sach'].'</div>
                    <div class="sl">Số lượng: '.$sanpham['so_luong'].'</div>
                    <div class="gials">Giá: '.$sanpham['gia'].'đ</div>
                </div>';
            }

            echo '</div>
                  <div class="trangthai">
                    <div class="trangthaivatien">
                        <h5 class="payment">'.$donhang['tt']['tt_donhang'].'</h5>
                        <div class="dathanhtoan fw-bold fs-6">';

            $tongtien = 0;
            foreach ($donhang['sanpham'] as $sanpham) {
                $tongtien += $sanpham['gia'] * $sanpham['so_luong'];
            }
            echo 'Tổng tiền: '.$tongtien.'.000đ</div>
                    </div>
            <div class="thoigiangiaohang">Ngày mua hàng: <strong>'.$donhang['tt']['ngay_mua_hang'].'</strong></div>
             <button class="xemchitiet">
                      <a href="index.php?act=lichsu&action=xemchitiet&id='.$donhang_id.'" class="text-decoration-none text-white">Xem chi tiết</a>
                  </button>';

            if ($donhang['tt']['tt_donhang'] == 'Chờ xử lý') {
                echo ' 
                  <button class="xemchitiet" data-bs-toggle="modal" data-bs-target="#exampleModal1'.$donhang_id.'">
                      Thay đổi địa chỉ nhận hàng
                  </button>
                  <div class="modal fade" id="exampleModal1'.$donhang_id.'" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <form method="post" action="index.php?act=lichsu&action=doidiachi&id='.$donhang_id.'">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header">
                                      <h1 class="modal-title fs-5" id="exampleModalLabel">Nhập địa chỉ nhận hàng mới của bạn ở đây</h1>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                  </div>
                                  <div class="modal-body">
                                      <div class="mb-3">
                                          <textarea name="dia_chi" class="form-control" id="message-text"></textarea>
                                      </div>
                                  </div>
                                  <div class="modal-footer">
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                      <button type="submit" class="btn btn-danger">Cập nhật địa chỉ</button>
                                  </div>
                              </div>
                          </div>                        
                      </form>
                  </div>

                  <button class="xemchitiet" data-bs-toggle="modal" data-bs-target="#exampleModal'.$donhang_id.'">
                      Hủy đơn hàng
                  </button>
                  <div class="modal fade" id="exampleModal'.$donhang_id.'" tabindex="-1" aria-hidden="true">
                      <div class="modal-dialog">
                          <div class="modal-content">
                              <div class="modal-header">
                                  <h1 class="modal-title fs-5">Xác nhận hủy đơn hàng</h1>
                                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                  Bạn có chắc chắn muốn hủy đơn hàng này?
                              </div>
                              <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                  <a href="index.php?act=lichsu&action=huy&id='.$donhang_id.'" class="btn btn-danger">Xác nhận hủy</a>
                              </div>
                          </div>
                      </div>
                  </div>';
            }

            echo '</div>
                  </div>';
        }
    } else {
        echo "<p class='text-center fs-4 me-4 fw-bold mt-2'>Không có đơn hàng nào</p>";
    }
    ?>
</main>
