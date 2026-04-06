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
        $result = $conn->query("SELECT id, name, email, role, status, created_at FROM users ORDER BY created_at DESC");
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

    public function addNewUser($name, $email, $phone, $username, $password, $role) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            return ['success' => false, 'message' => 'Unauthorized'];
        }

        $conn = $this->db->getConnection();
        if ($this->auth->emailTaken($email)) {
            return ['success' => false, 'message' => 'Email is already taken'];
        }
        if ($this->auth->usernameTaken($username)) {
            return ['success' => false, 'message' => 'Username is already taken'];
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, phone, username, password, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $phone, $username, $hashedPassword, $role);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return ['success' => true, 'message' => 'User added successful'];
        } else {
            return ['success' => false, 'message' => 'Add user failed: ' . $stmt->error];
        }
    }

    public function deleteUser($userID){
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            return ['success' => false, 'message' => 'Unauthorized'];
        }

        $loginUserId = $_SESSION['user_id'];

        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("DELETE FROM users WHERE id = ? AND id != ?");
        $stmt->bind_param("ii", $userID, $loginUserId);
        $stmt->execute();
        if ($stmt->affected_rows > 0) {
            return ['success' => true, 'message' => 'User deleted successfully'];
        } else {
            return ['success' => false, 'message' => 'Failed to delete user: ' . $stmt->error];
        }
    }

    public function getDetails() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        if (!isset($_SESSION['user_id'])) {
            return ['success' => false, 'message' => 'Unauthorized'];
        }
        $userId = $_SESSION['user_id'];

        $conn = $this->db->getConnection();
        $stmt = $conn->prepare("SELECT id, name, email, username, phone, role, created_at FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            return ['success' => true, 'message' => 'User found', 'data' => $result->fetch_assoc()];
        } else {
            return ['success' => false, 'message' => 'User not found'];
        }
    }

    public function changePassword($oldPassword, $newPassword) {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            return ['success' => false, 'message' => 'Unauthorized'];
        }

        if (strlen($newPassword) < 6) {
            return ['success' => false, 'message' => 'Password must be at least 6 characters'];
        }

        $userId = $_SESSION['user_id'];
        $conn = $this->db->getConnection();

        $stmt = $conn->prepare("SELECT password FROM users WHERE id = ?");
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            return ['success' => false, 'message' => 'Invalid user'];
        }
        $user = $result->fetch_assoc();

        if (!password_verify($oldPassword, $user['password'])) {
            return ['success' => false, 'message' => 'Old password incorrect'];
        }

        if (password_verify($newPassword, $user['password'])) {
            return ['success' => false, 'message' => 'New password must be different'];
        }

        $hashedNewPassword = password_hash($newPassword, PASSWORD_BCRYPT);

        $stmt = $conn->prepare("UPDATE users SET password = ? WHERE id = ?");
        $stmt->bind_param("si", $hashedNewPassword, $userId);
        if ($stmt->execute()) {
            session_regenerate_id(true);
            return ['success' => true, 'message' => 'Password changed successfully'];
        }

        return ['success' => false, 'message' => 'Failed to change password'];
    }
}