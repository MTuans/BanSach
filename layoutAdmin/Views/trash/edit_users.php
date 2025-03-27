<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-label {
            font-size: 0.875rem;
            font-weight: bold;
        }

        .form-control {
            font-size: 0.875rem;
        }

        .btn-primary {
            font-size: 0.875rem;
            font-weight: bold;
        }

        .bg-dark {
            background-color: #D98C52 !important;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder">Sửa User</h6>
            </div>
            <div class="card-body px-4">
                <form method="POST" action="index.php?page=update_users">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($users['id']); ?>">
                    <div class="mb-3">
                        <label for="" class="form-label">Họ & Tên</label>
                        <input type="text" name="ho_ten" class="form-control" id="ho_ten" value="<?php echo htmlspecialchars($users['ho_ten']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Số Điện Thoại</label>
                        <input type="text" name="sdt" class="form-control" id="sdt" value="<?php echo htmlspecialchars($users['sdt']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="username" value="<?php echo htmlspecialchars($users['username']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input type="text" name="mat_khau" class="form-control" id="mat_khau" value="<?php echo htmlspecialchars($users['mat_khau']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Email</label>
                        <input type="email" name="email" class="form-control" id="email" value="<?php echo htmlspecialchars($users['email']); ?>" required>
                    </div>
                    <div class="mb-3">
                        <label for="vai_tro" class="form-label">Vai Trò</label>
                        <select name="vai_tro" class="form-control" id="vai_tro" required>
                            <option value="0" <?php echo $users['vai_tro'] == 0 ? 'selected' : ''; ?>>User</option>
                            <option value="1" <?php echo $users['vai_tro'] == 1 ? 'selected' : ''; ?>>Admin</option>
                        </select>
                    </div>
                    <button type="submit"  class="btn btn-primary">Lưu Thay Đổi</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>