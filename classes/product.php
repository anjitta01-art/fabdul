<?php

class Product {
    private $db;
    private $auth;

    public function __construct() {
        $this->db =new DBConnection();
        $this->auth = new Auth();
    }

    public function addEquipment($name, $category, $features, $description, $price, $quantity, $image) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            return ['success' => false, 'message' => 'Unauthorized'];
        }
        
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO equipments (product_name, category, features, description, price, quantity, image) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssdis", $name, $category, $features, $description, $price, $quantity, $image);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return ['success' => true, 'message' => 'Equipment added successfully'];
        } else {
            return ['success' => false, 'message' => 'Failed to add equipment: ' . $stmt->error];
        }
    }

    public function getAllProducts() {
        $conn = $this->db->getConnection();
        $result = $conn->query("SELECT id, product_name, category, price, quantity, image, features FROM equipments");
        $products = [];
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
        return ['success' => true, 'message' => 'All products', 'data' => $products];
    }

    public function getProductById($id) {
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT id, product_name, category, price, quantity, image, features, description FROM equipments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return ['success' => true, 'message' => 'Product found', 'data' => $result->fetch_assoc()];
        } else {
            return ['success' => false, 'message' => 'Product not found'];
        }
    }
}