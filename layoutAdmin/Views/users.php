<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    /* Sidebar */
    .bg-dark {
      background-color: #D98C52 !important;
    }

    .sidebar {
      background-color: #D98C52 !important;
    }

    .nav-link {
      color: #fff !important;
      font-weight: bold;
    }

    .nav-link:hover {
      background-color: #B77D42 !important;
    }

    /* Card Header */
    .card-header {
      background-color: #F8F9FA;
      border-bottom: 2px solid #D98C52;
    }

    .card-header h6 {
      color: #D98C52 !important;
    }

    /* Table */
    .table th,
    .table td {
      color: #333 !important;
      text-transform: uppercase;
      font-size: 14px;
      border-color: #D98C52;
    }

    .table thead {
      background-color: #F4F1ED;
      color: #D98C52;
    }

    .table-responsive {
      max-height: 500px;
      overflow-y: auto;
    }

    tr:hover {
      background-color: #f9e3d4;
    }

    /* Action Links */
    .action-link {
      padding: 0 10px;
      font-weight: bold;
    }

    .action-link.edit {
      color: #F5CA0F !important;
    }

    .action-link.delete {
      color: #F5110F !important;
    }

    /* Modal */
    .modal-content {
      border-radius: 8px;
    }

    .modal-header {
      background-color: #D98C52;
      color: white;
    }

    .modal-footer .btn-primary {
      background-color: #D98C52;
      border: none;
    }

    .modal-footer .btn-secondary {
      color: #D98C52;
      border: 1px solid #D98C52;
    }

    .modal-footer .btn-secondary:hover {
      background-color: #D98C52;
      color: white;
    }

    /* Create Button */
    .header-actions {
      position: absolute;
      right: 15px;
      top: 50%;
      transform: translateY(-50%);
    }

    .header-actions a {
      color: #D98C52 !important;
      font-weight: bold;
    }

    .header-actions a:hover {
      color: #B77D42 !important;
    }
  </style>
</head>

<body>
  <div class="container-fluid py-4 d-flex">
    <!-- Content Area -->
    <div class="container-fluid py-4 content">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 position-relative">
              <h6 class="d-inline-block">Users Table</h6>
              <div class="header-actions">
                <!-- <a href="#" style="color: #D98C52 !important" class="text-secondary font-weight-bold text-xs action-link" data-bs-toggle="modal" data-bs-target="#addAuthorModal">
                  Create
                </a> -->
              </div>
            </div>

            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Họ & Tên</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Số Điện Thoại</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Username</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Password</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Vai Trò</th>
                      <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Actions</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($users)): ?>
                      <?php foreach ($users as $user): ?>
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($user['id']); ?></h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($user['ho_ten']); ?></h6>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($user['sdt']); ?></h6>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($user['username']); ?></h6>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($user['mat_khau']); ?></h6>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($user['email']); ?></h6>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($user['vai_tro'] == 0 ? "User" : "Admin"); ?></h6>
                          </td>
                          <td class="align-middle text-center">
                            <a href="#" class="text-secondary font-weight-bold text-xs action-link" data-bs-toggle="modal" data-bs-target="#editUserModal<?php echo $user['id']; ?>" style="color: #F5CA0F !important">Edit</a>
                            <a href="index.php?page=delete_users&id=<?php echo $user['id']; ?>" style="color: #F5110F !important" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="text-secondary font-weight-bold text-xs action-link">Delete</a>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="4" class="text-center">Không có tác giả nào.</td>
                      </tr>
                    <?php endif; ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="addAuthorModal" tabindex="-1" aria-labelledby="addAuthorModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addAuthorModalLabel">Thêm User</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="index.php?page=add_users">
            <div class="mb-3">
              <label for="ho_ten" class="form-label">Họ & Tên</label>
              <input type="text" class="form-control" name="ho_ten" required>
            </div>
            <div class="mb-3">
              <label for="sdt" class="form-label">Số Điện Thoại</label>
              <input type="text" class="form-control" name="sdt" required>
            </div>
            <div class="mb-3">
              <label for="username" class="form-label">Username</label>
              <input type="text" class="form-control" name="username" required>
            </div>
            <div class="mb-3">
              <label for="mat_khau" class="form-label">Password</label>
              <input type="text" class="form-control" name="mat_khau" required>
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" class="form-control" name="email" required>
            </div>
            <div class="mb-3">
              <label for="vai_tro" class="form-label">Vai Trò</label>
              <select class="form-control" name="vai_tro" id="vai_tro" required>
                <option value="0">User</option>
                <option value="1">Admin</option>
              </select>
            </div>
            <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit User -->
  <?php foreach ($users as $user): ?>
    <div class="modal fade" id="editUserModal<?php echo $user['id']; ?>" tabindex="-1" aria-labelledby="editUserModalLabel<?php echo $user['id']; ?>" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="editUserModalLabel<?php echo $user['id']; ?>">Sửa User</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form method="POST" action="index.php?page=update_users">
              <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
              <div class="mb-3">
                <label for="ho_ten<?php echo $user['id']; ?>" class="form-label">Họ & Tên</label>
                <input type="text" class="form-control" name="ho_ten" value="<?php echo htmlspecialchars($user['ho_ten']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="sdt<?php echo $user['id']; ?>" class="form-label">Số Điện Thoại</label>
                <input type="text" class="form-control" name="sdt" value="<?php echo htmlspecialchars($user['sdt']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="username<?php echo $user['id']; ?>" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="mat_khau<?php echo $user['id']; ?>" class="form-label">Password</label>
                <input type="text" class="form-control" name="mat_khau" value="<?php echo htmlspecialchars($user['mat_khau']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="email<?php echo $user['id']; ?>" class="form-label">Email</label>
                <input type="text" class="form-control" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
              </div>
              <div class="mb-3">
                <label for="vai_tro<?php echo $user['id']; ?>" class="form-label">Vai Trò</label>
                <select class="form-control" name="vai_tro" id="vai_tro<?php echo $user['id']; ?>" required>
                  <option value="0" <?php echo $user['vai_tro'] == 0 ? 'selected' : ''; ?>>User</option>
                  <option value="1" <?php echo $user['vai_tro'] == 1 ? 'selected' : ''; ?>>Admin</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  <?php endforeach; ?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
