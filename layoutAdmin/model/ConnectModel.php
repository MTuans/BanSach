<?php
class ConnectModel {
    private $host = "localhost";
    private $dbname = "da1";
    private $username = "root";
    private $password = "";
    private $conn;

    public function connect() {
        try {
            $this->conn = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->conn;
        } catch (PDOException $e) {
            die("Kết nối thất bại: " . $e->getMessage());
        }
    }
    public function selectall($sql, $params = [])
    {
        $this->ketnoi();
        $stmt = $this->conn->prepare($sql);
        
        if (is_array($params)) {
            foreach ($params as $key => $value) {
                $stmt->bindParam($key, $value);
            }
        }
        
        $stmt->execute();
        $kq = $stmt->fetchAll(PDO::FETCH_ASSOC); // Trả về tất cả dòng dữ liệu
        $this->conn = null; 
        return $kq;
    }
    
}
?>
