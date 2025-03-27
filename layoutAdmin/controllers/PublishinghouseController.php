<?php
require_once "model/PublishingHouseModel.php";

class PublishingHouseController {
    private $publishinghouseModel;

    public function __construct() {
        $this->publishinghouseModel = new PublishingHouseModel(); 
    }

    // Hiển thị danh sách nhà xuất bản
    public function listPublishingHouses() {
        $publishinghouses = $this->publishinghouseModel->getAllPublishingHouses();
        if (!$publishinghouses) {
            $publishinghouses = []; 
        }
        require_once "Views/publishinghouse.php"; 
    }

    // Xử lý thêm nhà xuất bản
    public function addPublishingHouse($ten_nhaxuatban) {
        $result = $this->publishinghouseModel->addPublishingHouse($ten_nhaxuatban); 
        
    }

    // Xử lý cập nhật nhà xuất bản
    public function updatePublishingHouse($id, $ten_nhaxuatban) {
        $result = $this->publishinghouseModel->updatePublishingHouse($id, $ten_nhaxuatban);
        
    }

    // Xử lý xóa nhà xuất bản
    public function deletePublishingHouse($id) {
        $result = $this->publishinghouseModel->deletePublishingHouse($id); 
        
    }

    // Lấy thông tin nhà xuất bản theo ID
    public function getPublishingHouseById($id) {
        return $this->publishinghouseModel->getPublishingHouseById($id); 
    }
}
?>
