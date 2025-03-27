<!-- end menu -->
<main class="wrap">
    <div class="dieuhuong">
        <a href="sanpham.html">Sản phẩm</a> /
        <a href="#" id="back">Chi tiết</a>
    </div>

    <div class="chitietsanpham">
        <div class="anhchitiet">
            <div class="thumbnail">
                <!-- <img src="public/img/IMG_DA1/san pham/VH-Lén Nhặt Chuyện Đời-Mộc Trầm-NXB thế giớ.webp" alt=""> -->
                <?php
                $ch = '';
                foreach ($trangchumodel->allsp as $key => $value) {
                    $ch .= '
                  <img src="public/img/IMG_DA1/san pham/' . $value['hinh'] . '" alt="">
                  ';
                }
                echo $ch;
                ?>
            </div>
            <!-- anhchitietsanpham -->
            <div class="anhchitietsanpham">

                <?php
                $ch = '';
                foreach ($trangchumodel->chitietanh as $key => $value) {
                    $ch .= '
                        <div class="thumbnail1">
                            <img src="public/img/IMG_DA1/san_pham_chi_tiet/san_pham_chi_tiet/' . $value['anh'] . '" class="img-thumbnail" alt="...">
                        </div>
                    ';
                }
                echo $ch;
                ?>
            </div>

            <!-- end anhchitietsanpham -->
            <div class="chinhsachuudai">
                <h6 style="color: #8B4513;" id="textttct">Chính sách ưu đãi</h6>
                <div class="time">
                    <i class="fa-solid fa-car"></i>
                    <div><span style="font-weight: 600;">Thời gian giao hàng:</span> Giao nhanh và uy tín</div>
                </div>
                <div class="time">
                    <i class="fa-solid fa-rotate"></i>
                    <div><span style="font-weight: 600;">Chính sách đổi trả:</span> Đổi trả miễn phí toàn quốc</div>
                </div>
                <div class="time">
                    <i class="fa-solid fa-diagram-predecessor"></i>
                    <div><span style="font-weight: 600;">Chính sách khách sỉ:</span> Ưu đãi khi mua số lượng lớn</div>
                </div>
                <div class="quydinh">
                    <div>Thế giới sách nhận đặt hàng trực tuyến và giao hàng tận nơi. KHÔNG hỗ trợ đặt mua và nhận hàng
                        trực tiếp tại văn phòng cũng như tất cả Hệ Thống cửa hàng trên toàn quốc.</div>
                    Nếu cần hỗ trợ thêm bất kì thông tin nào, cửa hàng nhờ quý khách liên hệ trực tiếp qua hotline để
                    được hỗ trợ nhanh chóng.
                </div>
            </div>
        </div>
        <!-- end anhchitiet -->

        <div class="noidungchitiet">

            <?php
            $ch = '';
            foreach ($trangchumodel->allsp as $key => $value) {
                $ch .= '
                <h2 id="tenchitiet">' . $value['ten_sach'] . '</h2>

                    <div class="thongtinchitiet">
                        <div class="tg">Tác giả: ' . $value['ten_tacgia'] . '</div>
                    </div>
                    <div class="thongtinchitiet1">
                        <div class="tg">Nhà xuất bản: ' . $value['ten_nxb'] . '</span></div>
                    </div>
                    <div class="yeuthich">
            <i class="fa-regular fa-heart"></i>
            <span style="color: #8B4513;">Thêm vào yêu thích</span>
            </div>
            <div class="rating1">
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <i class="fa-solid fa-star"></i>
                <div class="danhgia">0 đánh giá</div>
            </div>
            <div class="giachitiet">
                <h5 class="gia">'.$value['gia'].'đ <del class="gia_sale">85.000đ</del></h5>
                <div class="chiase">
                    Chia sẽ
                    <i class="fa-brands fa-facebook f1"></i>
                    <i class="fa-brands fa-youtube y1"></i>
                    <i class="fa-brands fa-telegram t1"></i>
                    <i class="fa-brands fa-discord d1"></i>
                </div>
            </div>
            <hr>
            <div class="sl-btn">
                <input type="number" id="quantity" name="quantity" min="1" value="1" step="1" class="quantity-input">
            </div>

                <form action="index.php?act=cart&action=themvaogiohang&id=' . $value['id'] . '" method="post">
                    <input type="hidden" name="ten" value="' . $value['ten_sach'] . '">
                    <input type="hidden" name="gia" value="' . $value['gia'] . '">
                    <input type="hidden" name="hinh" value="' . $value['hinh'] . '">
                    <input type="number" name="sl" class="visually-hidden" value="1" min="1">
                    <button type="submit" name="themvaogiohang" class="mt-2 button1">Thêm vào giỏ hàng</button>
                </form>

                ';
            }
        echo $ch;
            ?>
            <h5 id="textttct">Thông tin chi tiết</h5>
            <div class="tablettchitiet">
                <table class="table">
                    <thead>
                        <?php
                        $ch = '';
                        foreach ($trangchumodel->allsp as $key => $value) {
                            $ch .= '
                          <tr><td scope="col" id="cotct">Mã hàng</td><td scope="col">' . $value['id'] . '</td></tr>

                         <tr><td id="cotct">Tác giả</td><td>' . $value['ten_tacgia'] . '</td></tr>

                          <tr><td id="cotct">Năm XB</td><td>' . $value['nam_xb'] . '</td></tr>

                        <tr><td id="cotct">NXB</td><td>' . $value['ten_nxb'] . '</td></tr>

                          <tr><td id="cotct">Ngôn Ngữ</td><td>Tiếng Việt</td></tr>

                          <tr><td id="cotct">Trọng lượng (gr)</td><td>645 g</td></tr>

                          <tr><td id="cotct">Kích Thước Bao Bì</td><td>15 cm</td></tr>

                          <tr><td id="cotct">Số trang</td><td>200</td></tr>

                          <tr><td id="cotct">Hình thức</td><td>Bìa cứng</td></tr>
                        <tr>
                        <td id="cotct">Sản phẩm bán chạy nhất</td>
                        <td>Top 100 sản phẩm Tiểu thuyết bán chạy của tháng</td>
                      </tr>
                    </tbody>
                  </table>
                </div>
                <div class="quydinhgia">
                <div>
                    Giá sản phẩm trên thế giới sách đã bao gồm thuế theo luật hiện hành. Bên cạnh đó, tuỳ vào loại sản phẩm, hình thức và địa chỉ giao hàng mà có thể phát sinh thêm chi phí khác như Phụ phí đóng gói, phí vận chuyển, phụ phí hàng cồng kềnh,...
                </div>
                <div style="color: #AF7F5D;">Chính sách khuyến mãi trên thế giới sách không áp dụng cho Hệ thống Nhà sách trên toàn quốc</div>
            </div>
          </div>

    </div>
    <div class="motasanpham">
        <h5 id="mota">Mô tả sản phẩm</h5>
        <div class="ndmota"><span style="font-weight: 700;">' . $value['ten_sach'] . '</span><br>' . $value['mo_ta'] . '</div>
      </div>
                          ';
                      }
                      echo $ch;
                    ?>
      <h4 id="textsanphamkhac">Sản phẩm liên quan</h4>
    <div class="sanphamkhac">
        <div class="row row-cols-4">
        <!-- BOX-SANPHAM -->
         <?php
         echo splienquan($trangchumodel);
         ?>
        <?php
            function splienquan($trangchumodel){

                                    $ch = '';
                                    foreach ($trangchumodel->splq as $key => $value) {
                                        $ch .= '
                    <div class="col col-sanphamkhac">
                        <div class="product-img">
                            <a href="index.php?act=index&id=' . $value['id'] . '&idtl=' . $value['id_theloai'] . '">
                                <img class="img" src="public/img/IMG_DA1/san pham/' . $value['hinh'] . '" alt=""></a>
                        </div>
                        <div class="product-content">
                            <h5 class="product-name">' . $value['ten_sach'] . '</h5>
                            <div class="rating">⭐⭐⭐⭐⭐</div>
                            <div class="product-price">
                                <h5 class="product-price-sale">' . $value['gia'] . '</h5>
                                <h5 class="product-price-opacity">814.000đ</h5>
                                <h5 class="product-price-percent"> ' . $value['giam'] . '% </h5>
                            </div>
                        </div>
                        <div class="btn-group">
                            <button class="button">Mua ngay</button>
                            <button class="button">Thêm vào giỏ hàng</button>
                        </div>
                    </div>
                    ';
                                    }
                                    return $ch;
                                }
                                ?>

                                <!-- END - BOX SANPHAM -->

                            </div>
                        </div>

</main>