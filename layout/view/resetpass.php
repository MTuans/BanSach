<main class="mg-top60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="title-hot">Đổi Mật Khẩu</h2>

                <!-- Hiển thị thông báo nếu có -->
                <form method="POST">


                    <div class="form-group mb-3">
                        <label for="newPassword">Mật Khẩu Mới</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="newPassword" name="newPassword" placeholder="Nhập mật khẩu mới" required>
                            <span class="input-group-text">
                                <i class="fas fa-eye-slash" onclick="togglePassword('newPassword', this)"></i>
                            </span>
                        </div>
                    </div>

                    <div class="form-group mb-3">
                        <label for="confirmNewPassword">Xác Nhận Mật Khẩu Mới</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="confirmNewPassword" name="confirmNewPassword" placeholder="Xác nhận mật khẩu mới" required>
                            <span class="input-group-text">
                                <i class="fas fa-eye-slash" onclick="togglePassword('confirmNewPassword', this)"></i>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="button btn-mid">Đổi Mật Khẩu</button>
                </form>
            </div>
        </div>
    </div>
</main>
