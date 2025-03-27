<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
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

    .card-header {
      background-color: #F8F9FA;
      border-bottom: 2px solid #D98C52;
    }

    .card-header h6 {
      color: #D98C52 !important;
    }

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
  <div class="container-fluid d-flex">
    <div class="container-fluid py-4 content">
      <div class="row">
        <div class="col-12">
          <div class="card mb-4">
            <div class="card-header pb-0 position-relative">
              <h6 class="d-inline-block">Publishing Houses Table</h6>
              <div class="header-actions">
                <a href="#" style="color:  #D98C52 !important" class="text-secondary font-weight-bold text-xs action-link" data-bs-toggle="modal" data-bs-target="#addPublishingHouseModal">
                  Create
                </a>
              </div>
            </div>
            <div class="card-body px-0 pt-0 pb-2">
              <div class="table-responsive p-0">
                <table style="color: #6c757d !important;" class="table align-items-center mb-0">
                  <thead>
                    <tr>
                      <th style="color: black !important;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">ID</th>
                      <th style="color: black !important;" class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Publishing House Name</th>
                      <th style="color: black !important;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Status</th>
                      <th style="color: black !important;" class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php if (!empty($publishinghouses)): ?>
                      <?php foreach ($publishinghouses as $publishinghouse): ?>
                        <tr>
                          <td>
                            <div class="d-flex px-2 py-1">
                              <div class="d-flex flex-column justify-content-center">
                                <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($publishinghouse['id']); ?></h6>
                              </div>
                            </div>
                          </td>
                          <td>
                            <h6 class="mb-0 text-sm"><?php echo htmlspecialchars($publishinghouse['ten_nxb']); ?></h6>
                          </td>
                          <td class="align-middle text-center">
                            <span class="text-secondary text-xs font-weight-bold">2024</span>
                          </td>
                          <td class="align-middle text-center">
                            <!-- Trigger -->
                            <a href="#" data-bs-toggle="modal" data-bs-target="#editPublishingHouseModal<?php echo $publishinghouse['id']; ?>" style="color: #F5CA0F !important" class="text-secondary font-weight-bold text-xs action-link">
                              Edit
                            </a>
                            <a href="index.php?page=delete_publishinghouse&id=<?php echo $publishinghouse['id']; ?>" style="color: #F5110F !important" onclick="return confirm('Bạn có chắc chắn muốn xóa?');" class="text-secondary font-weight-bold text-xs action-link">
                              Delete
                            </a>
                          </td>
                        </tr>

                        <!-- Modal edit -->
                        <div class="modal fade" id="editPublishingHouseModal<?php echo $publishinghouse['id']; ?>" tabindex="-1" aria-labelledby="editPublishingHouseModalLabel<?php echo $publishinghouse['id']; ?>" aria-hidden="true">
                          <div class="modal-dialog">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="editPublishingHouseModalLabel<?php echo $publishinghouse['id']; ?>">Sửa Nhà Xuất Bản</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                              </div>
                              <div class="modal-body">
                                <form method="POST" action="index.php?page=update_publishinghouse">
                                  <input type="hidden" name="id" value="<?php echo $publishinghouse['id']; ?>">
                                  <div class="mb-3">
                                    <label for="ten_nxb" class="form-label">Tên Nhà Xuất Bản</label>
                                    <input type="text" class="form-control" id="ten_nxb" name="ten_nxb" value="<?php echo htmlspecialchars($publishinghouse['ten_nxb']); ?>" required>
                                  </div>
                                  <button type="submit" class="btn btn-primary">Lưu Thay Đổi</button>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>

                      <?php endforeach; ?>
                    <?php else: ?>
                      <tr>
                        <td colspan="4" class="text-center">Không có nhà xuất bản nào.</td>
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

  <!-- Modal thêm nhà xuất bản -->
  <div class="modal fade" id="addPublishingHouseModal" tabindex="-1" aria-labelledby="addPublishingHouseModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="addPublishingHouseModalLabel">Thêm Nhà Xuất Bản</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form method="POST" action="index.php?page=add_publishinghouse">
            <div class="mb-3">
              <label for="tenPublishingHouse" class="form-label">Tên Nhà Xuất Bản</label>
              <input type="text" class="form-control" name="ten_nxb" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
          </form>
        </div>
      </div>
    </div>
  </div>
<script>
  document.addEventListener('DOMContentLoaded', function () {
      <?php if (isset($_SESSION['error_message'])): ?>
          alert("<?php echo htmlspecialchars($_SESSION['error_message']); ?>");
          <?php unset($_SESSION['error_message']); ?>
      <?php endif; ?>

      <?php if (isset($_SESSION['message'])): ?>
          alert("<?php echo htmlspecialchars($_SESSION['message']); ?>");
          <?php unset($_SESSION['message']); ?>
      <?php endif; ?>
  });
</script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
