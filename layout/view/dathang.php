<main class="container-fluid">
    <div class="dieuhuong mb-4">
        <a href="giohang.html">Giỏ hàng</a> / 
        <a href="thanhtoan.html" id="back">Thanh toán</a>
    </div>

    <div class="row">
        <!-- Thông tin thanh toán -->
        <div class="col-12 col-md-6 mb-4">
            <div class="thongtinthanhtoan">
                <h5 class="textthanhtoan">Thông tin thanh toán</h5>
                <div class="formthanhtoan">
                    <form action="index.php?act=tienhanhdathang&action=dathang" method="post">
                        <div class="mb-3">
                            <label for="ho_ten" class="form-label fw-bold">Họ và tên</label>
                            <input type="text" class="form-control" id="ho_ten" name="ho_ten" required value="<?=$_SESSION['user']['ho_ten'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="dia_chi" class="form-label fw-bold">Địa chỉ</label>
                            <input type="text" class="form-control" id="dia_chi" name="dia_chi" required>
                        </div>
                        <div class="mb-3">
                            <label for="sdt" class="form-label fw-bold">Số điện thoại</label>
                            <input type="text" class="form-control" id="sdt" name="sdt" required value="<?=$_SESSION['user']['sdt'];?>">
                        </div>
                        <div class="mb-3">
                            <label for="ghi_chu" class="form-label fw-bold">Ghi chú</label>
                            <textarea class="form-control" id="ghi_chu" rows="3" name="ghi_chu"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pt_thanhtoan" class="form-label fw-bold">Phương thức thanh toán</label>
                            <select name="pt_thanhtoan" class="form-select">
                                <option value="Chuyển khoản ngân hàng">Chuyển khoản ngân hàng</option>
                                <option value="Thanh toán tiền mặt">Thanh toán tiền mặt</option>
                                <option value="Thanh toán Momo">Thanh toán Momo</option>
                                <option value="Thanh toán VNPAY">Thanh toán VNPAY</option>
                            </select>
                        </div>
                        <button type="submit" class="button w-100 w-md-25" name="dathang">Đặt hàng</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Đơn hàng của bạn -->
        <div class="col-12 col-md-6">
            <div class="donhang">
                <h5 class="textdonhang">Đơn hàng của bạn</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th colspan="3">Sản phẩm</th>
                            <th>Tạm tính</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tongTien = 0; 
                        foreach ($_SESSION['cart'] as $key => $value) {
                            $tamTinh = $value['gia'] * $value['sl'];
                            $tongTien += $tamTinh;
                            echo '
                            <tr>
                                <td>'.$value['ten'].'</td>
                                <td colspan="2">x'.$value['sl'].'</td>
                                <td>'.$tamTinh.'.000đ</td>
                            </tr>';
                        }
                        ?>
                        <tr>
                            <th colspan="3">Tổng</th>
                            <td><?=$tongTien; ?>.000đ</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>
<script src="./assets/js/sldonhang.js"></script>
