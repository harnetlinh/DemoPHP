<?php
class Task {
    private $conn;
    private $table_name = "tasks";

    public $id;
    public $name;
    public $description;
    public $deadline;
    public $status;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM " . $this->table_name;
        $result = $this->conn->query($query);
        $all = [];
        if ($result->num_rows > 0) { // xử lý dữ liệu trả về
            while ($row = $result->fetch_assoc()) {
                $all[] = $row; // thêm dữ liệu vào mảng
            }
        }
        return $all;
    }

    public function create() {
        try {
            $query = "INSERT INTO " . $this->table_name . " (name, description, deadline, status) VALUES ('$this->name', '$this->description', '$this->deadline', '$this->status')";
            $result = $this->conn->query($query);
            return $result;
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            header("Location: /error.php?message=$message");
            exit();
        }
        
    }

    public function update() {
        $query = "UPDATE " . $this->table_name . " SET name='$this->name', description='$this->description', deadline='$this->deadline', status='$this->status' WHERE id='$this->id'";
        $result = $this->conn->query($query);
        return $result;
    }

    public function delete() {
        $query = "DELETE FROM " . $this->table_name . " WHERE id='$this->id'";
        $result = $this->conn->query($query);
        return $result;
    }
}