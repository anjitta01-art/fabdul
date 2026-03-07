<?php

class Auth extends DBConnection {
    private function emailTaken($email) {
        $stmt = $this->getConnection()->prepare("SELECT id FROM users WHERE email = ?");
        if (!$stmt) return false;
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();
        return $stmt->num_rows > 0;
    }

    public function register($name, $email, $phone, $username, $password, $role) {
        $conn = $this->getConnection();

        if ($this->emailTaken($email)) {
            return ['success' => false, 'message' => 'Email is already taken'];
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
}