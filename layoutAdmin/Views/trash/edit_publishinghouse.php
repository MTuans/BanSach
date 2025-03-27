<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Nhà Xuất Bản</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-label {
            font-size: 0.875rem; /* Tương ứng với text-xs */
            font-weight: bold;
        }
        .form-control {
            font-size: 0.875rem; 
        }
        .btn-primary {
            font-size: 0.875rem;
            font-weight: bold;
        }
        .bg-dark{
            background-color: #D98C52 !important;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder">Sửa Nhà Xuất Bản</h6>
            </div>
            <div class="card-body px-4">
                <form method="POST" action="index.php?page=update_publishinghouse">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($publishinghouse['id']); ?>">
                    <div class="mb-3">
                        <label for="tenPublishingHouse" class="form-label">Tên Nhà Xuất Bản</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="tenPublishingHouse" 
                            name="ten_nxb" 
                            value="<?php echo htmlspecialchars($publishinghouse['ten_nxb']); ?>" 
                            required>
                    </div>
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
