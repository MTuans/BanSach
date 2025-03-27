<main class="wrap">
        <div class="container-xxl">
            <div class="dieuhuong py-2">
                <a href="index.html">Trang chủ</a> /
                <a href="sanpham.html" id="back">Sản phẩm</a>
            </div>
            <div class="row">
                <div class="col-12 col-md-3 filter">

                    <!-- responsive -->
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h5 class="mb-0">Filters</h5>
                        <button class="btn btn-outline-secondary d-md-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse">
                        <i class="fa-solid fa-list"></i>
                        </button>
                    </div>

                    <div class="collapse d-md-block" id="filterCollapse">
                        <!-- Filter Thể Loại -->
                        <div class="theloai mb-3">
                            <h6>Thể loại</h6>
                            <?php
                            $ch = '';
                            foreach ($sanphammodel->theloai as $value) {
                                $ch .= '
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="index.php?act=product&idtl=' . $value['id'] . '" class="text-decoration-none text-black">
                                            ' . $value['ten_theloai'] . '
                                        </a>
                                    </li>
                                </ul>';
                            }
                            echo $ch; 
                            ?>
                        </div>
                        <!-- Filter Tác Giả -->
                        <div class="tacgia mb-3">
                            <h6>Tác giả</h6>
                            <?php
                            $ch = '';
                            foreach ($sanphammodel->tacgia as $value) {
                                $ch .= '
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="index.php?act=product&idtg=' . $value['id'] . '" class="text-decoration-none text-black">
                                            ' . substr($value['ten_tacgia'], 10) . '
                                        </a>
                                    </li>
                                </ul>';
                            }
                            echo $ch;
                            ?>
                        </div>
                        <!-- Filter Nhà Xuất Bản -->
                        <div class="nhaxuatban mb-3">
                            <h6>Nhà xuất bản</h6>
                            <?php
                            $ch = '';
                            foreach ($sanphammodel->nxb as $value) {
                                $ch .= '
                                <ul class="list-group">
                                    <li class="list-group-item">
                                        <a href="index.php?act=product&idnxb=' . $value['id'] . '" class="text-decoration-none text-black">
                                            ' . substr($value['ten_nxb'], 4) . '
                                        </a>
                                    </li>
                                </ul>';
                            }
                            echo $ch;
                            ?>
                        </div>
                    </div>
                </div>

                <!-- Product Listing -->
                <div class="col-12 col-md-9">
                <div class="row">
    <?php
    $ch = '';
    if (!empty($kq)) {
        foreach (array_slice($kq, 0, 9) as $value) {
            $ch .= '
            <div class="col-12 col-sm-6 col-lg-4 mb-4">
                <div class="card">
                    <a href="index.php?act=index&id=' . $value['id'] . '" class="text-decoration-none">
                        <img src="public/img/IMG_DA1/san pham/' . $value['hinh'] . '" class="card-img-top sp_img" alt="' . $value['ten_sach'] . '">
                    </a>
                        <div class="card-body">
                        <h6 class="card-title fw-bold">' . $value['ten_sach'] . '</h6>
                        <div class="rating">⭐⭐⭐⭐⭐</div>
                        <div class="">
                            <span class="text-danger fs-5 fw-bold">' . $value['gia'] . 'đ </span>
                            <span class="text-muted text-decoration-line-through fs-6">814.000đ</span>
                            <span class="badge bg-danger">' . $value['giam'] . '%</span>
                        </div>
                    </div>';
                if($value['status'] == 0){
                    $ch .= '
                    <div class="card-footer">
                        <button class="button1 btn-sm">Mua ngay</button>
                        <form action="index.php?act=cart&action=themvaogiohang&id=' . $value['id'] . '" method="post" class="d-inline">
                            <input type="hidden" name="ten" value="' . $value['ten_sach'] . '">
                            <input type="hidden" name="hinh" value="' . $value['hinh'] . '">
                            <input type="hidden" name="gia" value="' . $value['gia'] . '">
                            <input type="number" name="sl" class="visually-hidden" value="1" min="1">
                            <button type="submit" name="themvaogiohang" class="button1 btn-sm">Thêm vào giỏ hàng</button>
                        </form>
                    </div>
                    ';
                }else{
                    $ch .= '<div class="card-footer">Sản phẩm này hiện đang tạm dừng kinh doanh</div>';
                }   
                $ch.='
                </div>
            </div>';
        }
    } else {
        echo "<p class='text-center'>Không tìm thấy sản phẩm</p>";
    }
    
    echo $ch;
    ?>
</div>

                </div>
            </div>

            <div class="chuyentrang mt-4">
                <nav aria-label="Page navigation example" class="text-center">
                    <form action="">
                    <ul class="pagination justify-content-center">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        <li class="page-item"><a class="page-link text-black" href="index.php?act=product&page=1">1</a></li>
                        <li class="page-item"><a class="page-link text-black" href="index.php?act=product&page=2">2</a></li>
                        <li class="page-item"><a class="page-link text-black" href="index.php?act=product&page=3">3</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>                    
                </form>

                </nav>
            </div>
        </div>
    </main>