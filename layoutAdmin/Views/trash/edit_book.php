<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Sách</title>
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
        .card {
            max-width: 700px; 
            margin: 0 auto;   
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header pb-0">
                <h6 class="text-uppercase text-secondary text-xxs font-weight-bolder">Sửa Sách</h6>
            </div>
            <div class="card-body px-4">
                <form method="POST" action="index.php?page=update_book" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?php echo htmlspecialchars($book['id']); ?>">

                    <!-- Tên Sách -->
                    <div class="mb-3">
                        <label for="tenSach" class="form-label">Tên Sách</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="tenSach" 
                            name="ten_sach" 
                            value="<?php echo htmlspecialchars($book['ten_sach']); ?>" 
                            required>
                    </div>

                    <!-- Tên Thể Loại -->
                    <div class="mb-3">
                        <label for="tenTheloai" class="form-label">Tên Thể Loại</label>
                        <select class="form-select" id="tenTheloai" name="ten_theloai_id" required>
                            <?php foreach ($tl as $categories): ?>
                                <option value="<?php echo $categories['id']; ?>" <?php echo ($book['ten_theloai'] == $categories['ten_theloai']) ? 'selected' : ''; ?>>
                                    <?php echo $categories['ten_theloai']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Tên Tác Giả -->
                    <div class="mb-3">
                        <label for="tenTacGia" class="form-label">Tác Giả</label>
                        <select class="form-select" id="tenTacGia" name="ten_tacgia_id" required>
                            <?php foreach ($tg as $authors): ?>
                                <option value="<?php echo $authors['id']; ?>" <?php echo ($book['ten_tacgia'] == $authors['ten_tacgia']) ? 'selected' : ''; ?>>
                                    <?php echo $authors['ten_tacgia']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Tên Nhà Xuất Bản -->
                    <div class="mb-3">
                        <label for="tenNXB" class="form-label">Tên Nhà Xuất Bản</label>
                        <select class="form-select" id="tenNXB" name="ten_nxb_id" required>
                            <?php foreach ($nxb as $publishinghouse): ?>
                                <option value="<?php echo $publishinghouse['id']; ?>" <?php echo ($book['ten_nxb'] == $publishinghouse['ten_nxb']) ? 'selected' : ''; ?>>
                                    <?php echo $publishinghouse['ten_nxb']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- Giá -->
                    <div class="mb-3">
                        <label for="gia" class="form-label">Giá</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="gia" 
                            name="gia" 
                            value="<?php echo htmlspecialchars($book['gia']); ?>" 
                            required>
                    </div>

                    <!-- Giảm Giá -->
                    <div class="mb-3">
                        <label for="giam" class="form-label">Giảm Giá</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="giam" 
                            name="giam" 
                            value="<?php echo htmlspecialchars($book['giam']); ?>" 
                            required>
                    </div>

                    <!-- Mô Tả -->
                    <div class="mb-3">
                        <label for="moTa" class="form-label">Mô Tả</label>
                        <textarea 
                            class="form-control" 
                            id="moTa" 
                            name="mo_ta" 
                            rows="4"
                            required><?php echo htmlspecialchars($book['mo_ta']); ?></textarea>
                    </div>

                    <!-- Năm Xuất Bản -->
                    <div class="mb-3">
                        <label for="namXb" class="form-label">Năm Xuất Bản</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="namXb" 
                            name="nam_xb" 
                            value="<?php echo htmlspecialchars($book['nam_xb']); ?>" 
                            required>
                    </div>

                    <!-- Số Lượng Bán -->
                    <div class="mb-3">
                        <label for="soLuongBan" class="form-label">Số Lượng Bán</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="soLuongBan" 
                            name="so_luong_ban" 
                            value="<?php echo htmlspecialchars($book['so_luong_ban']); ?>" 
                            required>
                    </div>

                    <!-- Hình ảnh -->
                    <div class="mb-3">
                        <label for="hinh" class="form-label">Hình ảnh</label>
                        <input 
                            type="file" 
                            class="form-control" 
                            id="hinh" 
                            name="hinh">
                        <?php if ($book['hinh']): ?>
                            <img src="../layout/public/img/IMG_DA1/san pham/<?php echo htmlspecialchars($book['hinh']); ?>" alt="Current Image" width="100" class="mt-2">
                        <?php endif; ?>
                    </div>

                    <!-- Nút Lưu Thay Đổi -->
                    <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
