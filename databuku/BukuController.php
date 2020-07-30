<?php
class BukuController {
    private $host = 'localhost';
    private $dbname = 'project_laravel';
    private $user = 'root';
    private $passsword = '';
    public $conn;

    public function __construct() {
        try {
            $this->conn = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->passsword);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
        
    }

    public function getData() {
        try {
            $sql = 'SELECT * FROM listbuku';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function getDataById($id) {
        try {
            $sql = 'SELECT * FROM listbuku WHERE id=?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }
   
    public function insertData($nama, $harga) {
        try {
            $sql = 'INSERT INTO produk(nama, harga) VALUES(?,?)';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $nama);
            $stmt->bindParam(3, $harga);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    } 

    public function updateData($nama, $stok, $harga, $id) {
        try {
            $sql = "UPDATE produk SET nama='".$nama."', harga='".$harga."' WHERE id='".$id."'";
            $stmt = $this->conn->prepare($sql);
            // $stmt->bindParam(1, $nama);
            // $stmt->bindParam(2, $stok);
            // $stmt->bindParam(3, $harga);
            // $stmt->bindParam(5, $id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

    public function deleteData($id) {
        try {
            $sql = 'DELETE FROM produk WHERE id=?';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(1, $id);
            $stmt->execute();
            return $stmt;
        } catch (PDOException $exception) {
            echo $exception->getMessage();
        }
    }

}