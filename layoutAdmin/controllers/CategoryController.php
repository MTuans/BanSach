<?php
require_once "model/CategoryModel.php";

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new CategoryModel();
    }
    

    // Hiển thị danh sách tác giả
    public function listCategorys() {
        $categories = $this->categoryModel->getAllCategory();
        if (!$categories) {
            $categories = []; 
        }
        require_once "Views/category.php";
    }
       // Xử lý thêm tác giả
    public function addCategory($ten_theloai) {
        $result = $this->categoryModel->addCategory($ten_theloai);
    
        if ($result) {
            $_SESSION['message'] = "Thêm tác giả thành công!";
            header("Location: index.php?page=category");
        } else {
            $_SESSION['error_message'] = "Tác giả đã tồn tại!";
            header("Location: index.php?page=category");
        }
        exit;
    }
    public function updateCategory($id, $ten_theloai) {
        $result = $this->categoryModel->updateCategory($id, $ten_theloai);
          
              if ($result['success']) {
                  $_SESSION['message'] = $result['message'];
              } else {
                  $_SESSION['error_message'] = $result['message'];
              }
              header("Location: index.php?page=category");
              exit;
          }
          

    // Xử lý xóa tác giả
    public function deleteCategory($id) {
        $result = $this->categoryModel->deleteCategory($id);
        
    }
    public function getCategoryById($id) {
        return $this->categoryModel->getCategoryById($id);
    }
}
?>
