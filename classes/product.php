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
}