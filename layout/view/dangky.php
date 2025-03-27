<main class="mg-top60">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2 class="text-center mb-4">Đăng Ký</h2>
                <?php if (isset($error) && !empty($error)) : ?>
                    <div class="alert alert-danger"><?= $error ?></div>
                <?php endif; ?>

                <form method="post" id="registerForm">
                    <div class="form-group mb-3">
                        <label for="hoTen">Họ và Tên</label>
                        <input type="text" class="form-control" id="hoTen" name="ho_ten" placeholder="Nhập họ và tên" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="username">Tên đăng nhập</label>
                        <input type="text" class="form-control" id="username" name="username" placeholder="Nhập tên đăng nhập" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Nhập email" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="sdt">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="sdt" name="sdt" placeholder="Nhập số điện thoại" required>
                    </div>
                    <div class="form-group mb-3">
                        <label for="matKhau">Mật Khẩu</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="matKhau" name="mat_khau" placeholder="Nhập mật khẩu" required>
                            <span class="input-group-text">
                                <i class="fas fa-eye-slash" onclick="togglePassword('matKhau', this)"></i>
                            </span>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="reMatKhau">Xác Nhận Mật Khẩu</label>
                        <div class="input-group">
                            <input type="password" class="form-control" id="reMatKhau" name="re_mat_khau" placeholder="Nhập lại mật khẩu" required>
                            <span class="input-group-text">
                                <i class="fas fa-eye-slash" onclick="togglePassword('reMatKhau', this)"></i>
                            </span>
                        </div>
                    </div>

                    <button type="submit" class="button btn-mid">Đăng Ký</button>
                </form>
            </div>
        </div>
    </div>
</main>

<script>
    function togglePassword(fieldId, icon) {
        const passwordField = document.getElementById(fieldId);
        const isPassword = passwordField.type === 'password';
        passwordField.type = isPassword ? 'text' : 'password';

        // Thay đổi biểu tượng
        icon.classList.toggle('fa-eye');
        icon.classList.toggle('fa-eye-slash');
    }
</script>