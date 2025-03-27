     <!-- MENU-END -->

     <main class="wrap">
         <div class="dieuhuong">
             <a href="index.html">Trang chủ</a> /
             <a href="taikhoan.html" id="back">Tài khoản</a>
         </div>

         <div class="taikhoan">
             <div class="listdanhsach">
                 <ul class="list-group list-group-flush">
                     <li class="list-group-item"><i class="fa-solid fa-user icon"></i> Thông tin tài khoản</li>
                     <li class="list-group-item"><i class="fa-solid fa-clock-rotate-left icon"></i>
                         <a href="index.php?act=lichsu" class="text-decoration-none text-black">Lịch sử mua hàng</a>
                     </li>

                     <li class="list-group-item"><i class="fa-solid fa-heart icon"></i> Yêu thích</li>
                     <li class="list-group-item"><i class="fa-solid fa-gift icon"></i> Mã giảm giá</li>
                     <li class="list-group-item"><i class="fa-solid fa-gift icon"></i> Thông báo</li>
                     <li class="list-group-item"><i class="fa-solid fa-user-minus icon"></i>Đăng xuất</li>
                 </ul>
             </div>

             <div class="hoso">
                 <div class="texths">Hồ sơ của tôi</div>
                <?php if (isset($_SESSION['message'])):
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                        endif; ?>
                 <!-- Form cập nhật thông tin cá nhân -->
                 <form method="POST" action="index.php?act=acc&action=update" class="mt-5">
                     <div class="inputtaikhoan1">
                         <div style="font-size: 14px; margin-top: 2px;">Họ tên</div>
                         <input type="text" id="iptk" name="ho_ten" value="<?= $_SESSION['user']['ho_ten'] ?? '' ?>">
                     </div>

                     <div class="inputtaikhoan2">
                         <div style="font-size: 14px; margin-top: 2px;">Số điện thoại</div>
                         <input type="text" id="iptk" name="sdt" value="<?= $_SESSION['user']['sdt'] ?? '' ?>">
                     </div>

                     <div class="inputtaikhoan3">
                         <div style="font-size: 14px; margin-top: 2px;">Email</div>
                         <input type="email" id="iptk" name="email" value="<?= $_SESSION['user']['email'] ?? '' ?>">
                     </div>



                     <button type="submit" class="capnhat btn-mid">Cập nhật</button>
                 </form>

             </div>

             <div class="anhhoso">
                 <!-- <div class="avatar">
                     <img src="img/IMG_DA1/san pham/default-avatar-profile-icon-of-social-media-user-vector.jpg" alt="">
                     <div class="textavt">Dung lượng file tối đa 1 MB Định dạng:.JPEG, .PNG <br> <button class="suaanh">Sửa ảnh</button> </div>
                 </div> -->
                 <div class="textbm">Bảo mật</div>
                 <div class="inputtaikhoan4">
                     <div style="font-size: 14px; margin-top: 2px;">Mật khẩu</div>
                     <a class="doimklink" href="index.php?act=doimk">Đổi mật khẩu</a>
                 </div>
                 <div class="textbm">Liên kết tài khoản</div>
                 <div class="facebook_lk">
                     <div class="iconandtext">
                         <i class="fa-brands fa-facebook lk"></i>
                         <div id="textfb">Facebook</div>
                     </div>
                     <a class="lienket" href="#">Liên kết</a>
                 </div>

                 <div class="google_lk">
                     <div class="iconandtext">
                         <i class="fa-brands fa-google lk"></i>
                         <div id="textgg">Google</div>
                     </div>
                     <a class="lienket" href="#">Liên kết</a>
                 </div>


             </div>

         </div>
     </main> <!-- <div class="inputtaikhoan1">
                    <div style="font-size: 14px; margin-top: 2px;">Họ tên</div>
                    <input type="text" id="iptk">
                    <a class="capnhat" href="#">Cập nhật</a>
                </div>

                <div class="inputtaikhoan2">
                    <div style="font-size: 14px; margin-top: 2px;">Số điện thoại</div>
                    <input type="text" id="iptk">
                    <a class="capnhat" href="#">Cập nhật</a>

                </div>
                <div class="inputtaikhoan3">
                    <div style="font-size: 14px; margin-top: 2px;">Email</div>
                    <input type="email" id="iptk">
                    <a class="capnhat" href="#">Cập nhật</a>
                </div> -->