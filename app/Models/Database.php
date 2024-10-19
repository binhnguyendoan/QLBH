<?php include $_SERVER['DOCUMENT_ROOT'] . '../../QLBH/app/Models/config.php'; ?>
<?php
class Database
{
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $dbname = DB_NAME;

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectDB();
    }

    private function connectDB()
    {
        $this->link = new mysqli($this->host, $this->user, $this->pass, $this->dbname);
        if (!$this->link) {
            $this->error = "Connection failed: " . $this->link->connect_error;
            return false;
        }
    }

    public function select($query)
    {
        $result = $this->link->query($query) or die($this->link->error . __LINE__);
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    // Phương thức để chèn dữ liệu
    public function insert($query)
    {
        $insert = $this->link->query($query);
        if ($insert) {
            return $insert;
        } else {
            $this->error = "Insert failed: " . $this->link->error;
            return false;
        }
    }

    // Phương thức để cập nhật dữ liệu
    public function update($query)
    {
        $update = $this->link->query($query);
        if ($update) {
            return $update;
        } else {
            $this->error = "Update failed: " . $this->link->error;
            return false;
        }
    }

    // Phương thức để xóa dữ liệu
    public function delete($query)
    {
        $delete = $this->link->query($query);
        if ($delete) {
            return $delete;
        } else {
            $this->error = "Delete failed: " . $this->link->error;
            return false;
        }
    }

    // Phương thức để hiển thị lỗi (nếu có)
    public function getError()
    {
        return $this->error;
    }
}
