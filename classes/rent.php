<?php

class Rent {
    private $db;
    private $auth;
    private $item;

    public function __construct() {
        $this->db = new DBConnection();
        $this->auth = new Auth();
        $this->item = new Product();
    }

    public function addNewRent($productId, $rentDate, $returnDate, $quantity) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            return ['success' => false, 'message' => 'Login to place a rent'];
        }

        $userId = $_SESSION['user_id'];
        $product = $this->item->getProductById($productId);
        if (!$product['success']) {
            return ['success' => false, 'message' => 'Invalid item'];
        }
        $productData = $product['data'];
        if ($quantity > $productData['quantity']) {
            return ['success' => false, 'message' => 'Quantity higher than available stock'];
        }

        $today = date('Y-m-d');
        if ($rentDate < $today) {
            return ['success' => false, 'message' => 'Rent date cannot be in the past'];
        }
        if ($returnDate <= $rentDate) {
            return ['success' => false, 'message' => 'Return date must be after rent date'];
        }

        $days = (strtotime($returnDate) - strtotime($rentDate)) / (60 * 60 * 24);
        $rentPrice = $productData['price'];

        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("INSERT INTO rents (product_id, user_id, rent_date, return_date, quantity, rent_price) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("iissid", $productId, $userId, $rentDate, $returnDate, $quantity, $rentPrice);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $this->item->decreaseQuantity($productId, $quantity);
            return ['success' => true, 'message' => 'Rent placed successfully'];
        } else {
            return ['success' => false, 'message' => 'Failed to create rent: ' . $stmt->error];
        }
    }
}