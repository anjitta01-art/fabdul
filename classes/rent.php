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

    public function getCurrentRentHistory() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            return ['success' => false, 'message' => 'Login to view rent history'];
        }
        $userId = $_SESSION['user_id'];

        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT r.id, r.rent_date, r.return_date, r.quantity, r.rent_price, r.returned_date, e.product_name, e.category, e.features, e.image FROM rents AS r INNER JOIN equipments AS e  ON r.product_id = e.id WHERE r.user_id = ? AND r.returned_date IS NULL ORDER BY r.created_at DESC");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $rentDate = strtotime($row['rent_date']);
            $returnDate = strtotime($row['return_date']);
            $dayDiff = ($returnDate - $rentDate) / (60 * 60 * 24);
            $row['total_pay'] = $row['rent_price'] * $row['quantity'] * $dayDiff; 
            $products[] = $row;
        }
        return ['success' => true, 'message' => 'Rented Equipments', 'data' => $products];
    }

    public function returnItem($rentId) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            return ['success' => false, 'message' => 'Login to return item'];
        }
        $userId = $_SESSION['user_id'];

        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT product_id, quantity FROM rents WHERE id = ? AND user_id = ? LIMIT 1");
        $stmt->bind_param("ii", $rentId, $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            return ['success' => false, 'message' => 'Rent not found'];
        }

        $rent = $result->fetch_assoc();
        $productId = $rent['product_id'];
        $quantity = $rent['quantity'];
        $stmt = $conn->prepare("UPDATE rents SET returned_date = CURDATE() WHERE id = ? AND user_id = ?");
        $stmt->bind_param("ii", $rentId, $userId);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            $this->item->increaseQuantity($productId, $quantity);
            return ['success' => true, 'message' => 'Item returned successfully'];
        } else {
            return ['success' => false, 'message' => 'Failed to return item'];
        }
    }

    public function getReturnedRentHistory() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            return ['success' => false, 'message' => 'Login to view rent history'];
        }
        $userId = $_SESSION['user_id'];

        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT r.id, r.rent_date, r.return_date, r.quantity, r.rent_price, r.returned_date, e.product_name, e.category, e.features, e.image FROM rents AS r INNER JOIN equipments AS e  ON r.product_id = e.id WHERE r.user_id = ? AND r.returned_date IS NOT NULL ORDER BY r.created_at DESC");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $rentDate = strtotime($row['rent_date']);
            $returnDate = strtotime($row['return_date']);
            $dayDiff = ($returnDate - $rentDate) / (60 * 60 * 24);
            $row['total_pay'] = $row['rent_price'] * $row['quantity'] * $dayDiff; 
            $products[] = $row;
        }
        return ['success' => true, 'message' => 'Rented Equipments', 'data' => $products];
    }

    public function getRentHistory($renterID) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            return ['success' => false, 'message' => 'Unauthorized'];
        }
        $userId = $_SESSION['user_id'];

        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT r.id, r.rent_date, r.return_date, r.quantity, r.rent_price, r.returned_date, e.product_name, e.category, e.features, e.image FROM rents AS r INNER JOIN equipments AS e  ON r.product_id = e.id WHERE r.user_id = ? ORDER BY r.created_at DESC");
        $stmt->bind_param("i", $renterID);
        $stmt->execute();
        $result = $stmt->get_result();

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $rentDate = strtotime($row['rent_date']);
            $returnDate = strtotime($row['return_date']);
            $dayDiff = ($returnDate - $rentDate) / (60 * 60 * 24);
            $row['total_pay'] = $row['rent_price'] * $row['quantity'] * $dayDiff; 
            $products[] = $row;
        }
        return ['success' => true, 'message' => 'Rented Equipments', 'data' => $products];
    }

    public function getAllDueRents() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            return ['success' => false, 'message' => 'Unauthorized'];
        }

        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT r.rent_date, r.return_date, r.quantity, e.product_name, u.name, u.email, u.phone FROM rents AS r JOIN equipments AS e ON r.product_id = e.id JOIN users AS u ON r.user_id = u.id WHERE r.return_date < NOW() ORDER BY r.created_at DESC");
        if (!$stmt) {
            return ['success' => false, 'message' => "Connection Error"];
        }
        $stmt->execute();
        $result = $stmt->get_result();
        $rents = [];
        $todayDate = time();
        while ($row = $result->fetch_assoc()) {
            $returnDate = strtotime($row['return_date']);
            $noOfDueDays = floor(($todayDate - $returnDate) / (60 * 60 * 24));
            $row['due_days'] = $noOfDueDays;
            $rents[] = $row;
        }

        return ['success' => true, 'message' => 'Rented Equipments', 'data' => $rents];
    }
}