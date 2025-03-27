<main class="wrap">
<div class="dieuhuong">
    <a href="lichsumuahang.html" >Lịch sử mua hàng</a> /
    <a href="thanhtoan.html" id="back">Chi tiết đơn hàng</a>
</div>
<h5 id="textct">Chi tiết đơn hàng của bạn</h5>
<div class="ctdonhang">
    <table class="table ct">
        <thead>
            <tr>
                <th>Sản phẩm</th>
                <th>Số lượng</th>
                <th>Giá</th>
                <th>Tạm tính</th>
                <!-- Chỉ hiển thị các cột này một lần bên dưới -->
            </tr>
        </thead>
        <tbody>
        <?php
        $tong_tien = 0;
        foreach ($ctdh as $key => $value) {
          $tong_tien += $value['gia'] * $value['so_luong'];
            echo '<tr>
                    <td>'.$value['ten_sach'].'</td>
                    <td>x'.$value['so_luong'].'</td>
                    <td>'.$value['gia'].' đ</td>
                    <td>'.$value['gia']*$value['so_luong'].'.000đ</td>
                  </tr>';
        }

            // Hiển thị thông tin đơn hàng chỉ một lần
                echo '<tr>
                        <td colspan="4"><strong>Trạng thái đơn hàng:</strong> '.$ctdh[0]['tt_donhang'].'</td>
                      </tr>
                      <tr>
                        <td colspan="4"><strong>Phương thức thanh toán:</strong> '.$ctdh[0]['pt_thanhtoan'].'</td>
                      </tr>
                      <tr>
                        <td colspan="4"><strong>Trạng thái thanh toán:</strong> '.$ctdh[0]['tt_thanhtoan'].'</td>
                      </tr>
                      <tr>
                        <td colspan="4"><strong>Ngày mua hàng:</strong> '.$ctdh[0]['ngay_mua_hang'].'</td>
                      </tr>
                      <tr>
                        <td colspan="4"><strong>Địa chỉ:</strong> '.$ctdh[0]['dia_chi'].'</td>
                      </tr>
                      <tr>
                        <td colspan="4"><strong>Ghi chú:</strong> '.$ctdh[0]['ghi_chu'].'</td>
                      </tr>
                      <tr>
                        <td colspan="3" class="fs-5" style="color: red;"><strong>Tổng thanh toán:</strong></td>
                        <td colspan="" class="fs-5" style="color: red;"><strong>' .$tong_tien. '.000đ</strong></td>
                      </tr>';
            
        
        ?>
        </tbody>
    </table>
</div>
<button id="back_ls"><a style="text-decoration: none; color: white;" href="index.php?act=lichsu">Quay lại</a></button>
</div>
</main>
