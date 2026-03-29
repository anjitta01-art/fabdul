<?php

class Auth extends DBConnection {
    public function emailTaken($email) {
        $stmt = $this->getConnection()->prepare("SELECT id FROM users WHERE email = ?");
        if (!$stmt) return false;
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function usernameTaken($username) {
        $stmt = $this->getConnection()->prepare("SELECT id FROM users WHERE username = ?");
        if (!$stmt) return false;
        $stmt->bind_param("s", $username);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    private function isAdmin($userId) {
        $stmt = $this->getConnection()->prepare("SELECT role FROM users WHERE id = ?");
        if (!$stmt) return false;
        $stmt->bind_param("i", $userId);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows === 0) {
            return false;
        }
        $user = $result->fetch_assoc();
        return $user['role'] === 'admin';
    }

    public function register($name, $email, $phone, $username, $password, $role) {
        $conn = $this->getConnection();

        if ($this->emailTaken($email)) {
            return ['success' => false, 'message' => 'Email is already taken'];
        }

        if ($this->usernameTaken($username)) {
            return ['success' => false, 'message' => 'Username is already taken'];
        }

        $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
        $stmt = $conn->prepare("INSERT INTO users (name, email, phone, username, password, role) VALUES (?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("ssssss", $name, $email, $phone, $username, $hashedPassword, $role);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return ['success' => true, 'message' => 'Registration successful'];
        } else {
            return ['success' => false, 'message' => 'Registration failed: ' . $stmt->error];
        }
    }

    public function login($username, $password, $role) {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = ? OR email = ?");
        if (!$stmt) return ['success' => false, 'message' => 'Database error: ' . $conn->error];
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            return ['success' => false, 'message' => 'Invalid credentials'];
        }

        $user = $result->fetch_assoc();
        $hashedPassword = $user['password'];

        if (password_verify($password, $hashedPassword)) {
            if (!empty($role)) {
                $updateStmt = $conn->prepare("UPDATE users SET role = ? WHERE id = ?");
                $updateStmt->bind_param("si", $role, $user['id']);
                $updateStmt->execute();
            }
            
            session_start();
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['name'] = $user['name'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['role'] = $role;
            return ['success' => true, 'message' => 'Login successful', 'user' => [
                'name' => $user['name'],
                'email' => $user['email'],
                'username' => $user['username'],
                'role' => $role
            ]];
        } else {
            return ['success' => false, 'message' => 'Invalid login'];
        }
    }

    public function logout() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        session_unset();
        session_destroy();
    }
}