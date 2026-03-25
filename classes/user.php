<?php

class User {
    private $db;
    private $auth;

    public function __construct() {
        $this->db =new DBConnection();
        $this->auth = new Auth();
    }

    public function getAllUsers() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            return ['success' => false, 'message' => 'Unauthorized'];
        }

        $conn = $this->db->getConnection();
        $result = $conn->query("SELECT id, name, email, role, status, created_at FROM users");
        $users = [];
        while ($row = $result->fetch_assoc()) {
            $users[] = $row;
        }
        return ['success' => true, 'message' => 'All users', 'data' => $users];
    }

    public function getUserById($id) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            return ['success' => false, 'message' => 'Unauthorized'];
        }

        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT id, name, email, username, phone, role, status, created_at, update_at FROM users WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return ['success' => true, 'message' => 'User found', 'data' => $result->fetch_assoc()];
        } else {
            return ['success' => false, 'message' => 'User not found'];
        }
    }

    public function adminUpdateUser($id, $name, $email, $username, $phone, $role) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            return ['success' => false, 'message' => 'Unauthorized'];
        }
        
        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("UPDATE users SET name = ?, email = ?, username = ?, phone = ?, role = ?, update_at = NOW() WHERE id = ?");
        $stmt->bind_param("sssssi", $name, $email, $username, $phone, $role, $id);
        if ($stmt->execute()) {
            return ['success' => true, 'message' => 'User updated successfully'];
        } else {
            return ['success' => false, 'message' => 'Failed to update user'];
        }
    }
}