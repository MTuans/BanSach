<div class="slide">
    <img class="banners" src="public/img/IMG_DA1/baner/ms_banner_img1.webp" alt="">
    <img class="banners" src="public/img/IMG_DA1/baner/ms_banner_img2.webp" alt="">
    <img class="banners" src="public/img/IMG_DA1/baner/ms_banner_img3.webp" alt="">
</div>

<main class="container-xxl">
    <section>
        <div class="product-row mt-5">
            <!-- chia cột sản phẩm thành bốn cột  -->
            <h2 class="title-hot">SẢN PHẨM BÁN CHẠY</h2>
            <div class="row row-cols-4">
                <!-- BOX-SANPHAM -->
                <?php echo spbanchay($trangchumodel) ?>
                <?php
                    function spbanchay($trangchumodel) 
                    {
                        $ch = '';
                        foreach ($trangchumodel->mangsp as $key => $value) {
                            $ch .= '
                            <div class="col-290 mb-3 card">
                                <div class="product-img">
                                    <a href="index.php?act=index&id=' . $value['id'] . '&idtl=' . $value['id_theloai'] . '">
                                    <img class="img" src="public/img/IMG_DA1/san pham/' . $value['hinh'] . '" alt=""></a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">' . $value['ten_sach'] . '</h5>
                                    <div class="rating2">⭐⭐⭐⭐⭐</div>
                                    <div class="product-price">
                                        <h5 class="product-price-sale">' . $value['gia'] . '</h5>
                                        <h5 class="product-price-opacity">814.000đ</h5>
                                        <h5 class="product-price-percent">' . $value['giam'] . '%</h5>
                                    </div>
                                </div>';
                                if ($value['status'] == 0) {
                                $ch .= '
                                <div class="btn-group">
                                    <button class="button">Mua ngay</button>

                                    <form action="index.php?act=cart&action=themvaogiohang&id=' . $value['id'] . '" method="post">
                                        <input type="hidden" name="ten" value="' . $value['ten_sach'] . '">
                                        <input type="hidden" name="hinh" value="' . $value['hinh'] . '">
                                        <input type="hidden" name="gia" value="' . $value['gia'] . '">
                                        <input type="number" name="sl" class="visually-hidden" value="1" min="1">
                                        <button type="submit" name="themvaogiohang" class="button">Thêm vào giỏ hàng</button>
                                    </form>
                                </div>';
                            } else {
                                $ch .= '<div class="card-footer mt-2">Sản phẩm này hiện đang tạm dừng kinh doanh</div>';
                            }

                            $ch .= '</div>';
                        }
                        return $ch;
                    }
                ?>
            </div>
        </div>
        <button class="button btn-mid">Xem thêm</button>
    </section>

    <!-- END - BOX SANPHAM -->
    <section style="margin-top: 100px; margin-bottom: 100px">
        <div class="product-row ">
            <!-- chia cột sản phẩm thành bốn cột  -->
            <h2 class="title-hot">SẢN PHẨM MỚI</h2>
            <div class="row row-cols-4">

                <!-- BOX-SANPHAM -->
                <?php echo spmoi($trangchumodel) ?>
                <?php
                    function spmoi($trangchumodel)
                    {
                        $ch = '';
                        foreach ($trangchumodel->mangspmoi as $key => $value) {
                            $ch .= '
                            <div class="col-290 mb-3 card">
                                <div class="product-img">
                                    <a href="index.php?act=index&id=' . $value['id'] . '&idtl=' . $value['id_theloai'] . '">
                                    <img class="img" src="public/img/IMG_DA1/san pham/' . $value['hinh'] . '" alt=""></a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">' . $value['ten_sach'] . '</h5>
                                    <div class="rating2">⭐⭐⭐⭐⭐</div>
                                    <div class="product-price">
                                        <h5 class="product-price-sale">' . $value['gia'] . '</h5>
                                        <h5 class="product-price-opacity">814.000đ</h5>
                                        <h5 class="product-price-percent">' . $value['giam'] . '%</h5>
                                    </div>
                                </div>';
                                if ($value['status'] == 0) {
                                $ch .= '
                                <div class="btn-group">
                                    <button class="button">Mua ngay</button>
                                    <form action="index.php?act=cart&action=themvaogiohang&id=' . $value['id'] . '" method="post">
                                        <input type="hidden" name="ten" value="' . $value['ten_sach'] . '">
                                        <input type="hidden" name="hinh" value="' . $value['hinh'] . '">
                                        <input type="hidden" name="gia" value="' . $value['gia'] . '">
                                        <input type="number" name="sl" class="visually-hidden" value="1" min="1">
                                        <button type="submit" name="themvaogiohang" class="button">Thêm vào giỏ hàng</button>
                                    </form>
                                </div>';
                            } else {
                                $ch .= '<div class="card-footer mt-2">Sản phẩm này hiện đang tạm dừng kinh doanh</div>';
                            }

                            $ch .= '</div>';
                        }
                        return $ch;
                    }
                ?>
                <!-- END - BOX SANPHAM -->

            </div>
        </div>

        <button class="button btn-mid">Xem thêm</button>
    </section>


    <div class="banner-sale">
        <img class="banner-sale-img" src="./public/img/IMG_DA1/baner/baner sale.png" alt="">
    </div>


    <!-- sản phẩm khuyến mãi  -->
    <section class="mg-top60">
        <div class="product-row ">
            <!-- chia cột sản phẩm thành bốn cột  -->
            <h2 class="title-hot">SẢN PHẨM KHUYẾN MÃI</h2>
            <div class="row row-cols-4">

                <!-- BOX-SANPHAM -->
                <?php echo spsale($trangchumodel) ?>
                <?php
                    function spsale($trangchumodel)
                    {
                        $ch = '';
                        foreach ($trangchumodel->mangspsale as $key => $value) {
                            $ch .= '
                            <div class="col-290 mb-3 card">
                                <div class="product-img">
                                    <a href="index.php?act=index&id=' . $value['id'] . '&idtl=' . $value['id_theloai'] . '">
                                    <img class="img" src="public/img/IMG_DA1/san pham/' . $value['hinh'] . '" alt=""></a>
                                </div>
                                <div class="product-content">
                                    <h5 class="product-name">' . $value['ten_sach'] . '</h5>
                                    <div class="rating2">⭐⭐⭐⭐⭐</div>
                                    <div class="product-price">
                                        <h5 class="product-price-sale">' . $value['gia'] . '</h5>
                                        <h5 class="product-price-opacity">814.000đ</h5>
                                        <h5 class="product-price-percent">' . $value['giam'] . '%</h5>
                                    </div>
                                </div>';

                             if ($value['status'] == 0) {
                                $ch .= '                               
                                <div class="btn-group">
                                    <button class="button">Mua ngay</button>

                                    <form action="index.php?act=cart&action=themvaogiohang&id=' . $value['id'] . '" method="post">
                                        <input type="hidden" name="ten" value="' . $value['ten_sach'] . '">
                                        <input type="hidden" name="hinh" value="' . $value['hinh'] . '">
                                        <input type="hidden" name="gia" value="' . $value['gia'] . '">
                                        <input type="number" name="sl" class="visually-hidden" value="1" min="1">
                                        <button type="submit" name="themvaogiohang" class="button">Thêm vào giỏ hàng</button>
                                    </form>
                                </div>';
                            } else {
                                $ch .= '<div class="card-footer mt-2">Sản phẩm này hiện đang tạm dừng kinh doanh</div>';
                            }

                            $ch .= '</div>';
                        }
                        return $ch;
                    }
                ?>
                <!-- END - BOX SANPHAM -->

            </div>
        </div>
        <button class="button btn-mid">Xem thêm</button>
    </section>


    <section>
        <!-- Bài Viết nổi bật  -->
        <div class="container  mg-top60">
            <h2 class="title-hot">BÀI VIẾT NỔI BẬT</h2>
            <div class="row">
                <div class="col col-baiviet">
                    <div class="box-blog">
                        <img class="img-blog" src="public/img/IMG_DA1/bai viet/kd_30fd4b40d5264464af0979af10a460d2_large.webp" alt="">
                        <p class="blog">Mèo máy Doraemon và cuộc "phiêu lưu" hơn 30 năm tại Việt Nam (kỳ 2&hết)</p>
                    </div>

                </div>
                <div class="col col-baiviet">
                    <div class="box-blog">
                        <img class="img-blog" src="public/img/IMG_DA1/bai viet/thatgia_5b833de19702424cb3ecaa59c46c2b18_large.webp" alt="">
                        <p class="blog">'Chống sách giả, cần nhắm vào kẻ chủ mưu'</p>

                    </div>

                </div>
                <div class="col col-baiviet">
                    <div class="box-blog">
                        <img class="img-blog" src="public/img/IMG_DA1/bai viet/tyquay_bnoj_c5fd951ddb294c90af0d0101e17b591f_large.webp" alt="">
                        <p class="blog">Ra mắt truyện tranh Tý Quậy - Tập 14: Mạch nguồn truyện tranh Việt qua thế giới của Tý Quậy</p>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end bài viết  -->


    <section>
        <!-- Đôi chút về tác giả -->
        <div class="container  mg-top60">
            <h2 class="title-hot">ĐÔI CHÚT VỀ TÁC GIẢ</h2>
            <div class="row">
                <!-- bài viết 1  -->
                <div class="col col-author">
                    <div class="box-author-odd">
                        <img class="img-author-odd" src="public/img/IMG_DA1/tac gia/Fujiko_f_fujio01.webp" alt="">

                    </div>
                </div>
                <!-- end bài viết 1 -->

                <!-- bài viết 2  -->
                <div class="col col-author">
                    <div class="box-author">
                        <img class="img-author" src="public/img/IMG_DA1/tac gia/photo-1-15562661567811432181361.webp" alt="">



                    </div>

                </div>
                <!-- end bài viết 2  -->
                <!-- bài viết 3  -->
                <div class="col col-author">
                    <div class="box-author-odd">
                        <img class="img-author-odd" src="public/img/IMG_DA1/tac gia/Eiichiro-Oda-Worth.jpg" alt="">

                    </div>
                </div>
                <!-- end bài viết 3  -->
            </div>
        </div>
    </section>
    <!-- end tác giả  -->
</main>
<script>
// JavaScript cho Banner Auto Slide
const banners = document.querySelectorAll('.banners'); // Đảm bảo đúng class
let currentIndex = 0;

// Hàm hiển thị banner dựa trên index
function showBanner(index) {
    banners.forEach((banner, i) => {
        if (i === index) {
            banner.classList.add('active'); // Hiển thị ảnh hiện tại
        } else {
            banner.classList.remove('active'); // Ẩn các ảnh khác
        }
    });
}

// Hàm tự động chuyển ảnh
function autoSlide() {
    currentIndex++;
    if (currentIndex >= banners.length) {
        currentIndex = 0; // Quay lại ảnh đầu tiên
    }
    showBanner(currentIndex);
}

// Bắt đầu hiển thị ảnh đầu tiên
showBanner(currentIndex);

// Chạy autoSlide mỗi 3 giây
setInterval(autoSlide, 3500);
</script>
