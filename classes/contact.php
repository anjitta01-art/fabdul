<?php

class Contact extends DBConnection {
    public function addContactMessage($fullname, $email, $phone, $equipment, $message) {
        $conn = $this->getConnection();
        $stmt = $conn->prepare("INSERT INTO contact_us (fullname, email, phone, equipment, message) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $fullname, $email, $phone, $equipment, $message);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            return ['success' => true, 'message' => 'Message Sent'];
        } else {
            return ['success' => false, 'message' => 'Message failed: ' . $stmt->error];
        }
    }

    public function getAllMessages() {
        $conn = $this->getConnection();
        $result = $conn->query("SELECT * FROM contact_us ORDER BY created_at DESC");
        $messages = [];
        while ($row = $result->fetch_assoc()) {
            $messages[] = $row;
        }
        return ['success' => true, 'message' => 'All Messages', 'data' => $messages];
    }
}