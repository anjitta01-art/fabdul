<?php

class Dashboard {
    private $db;

    public function __construct() {
        $this->db = new DBConnection();
    }

    public function getDashboardInfo() {
        $conn = $this->db->getConnection();

        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
            return ['success' => false, 'message' => 'Unauthorized'];
        }

        try {
            $stmt1 = $conn->prepare("SELECT COUNT(id) AS total_users FROM users");
            $stmt1->execute();
            $result1 = $stmt1->get_result()->fetch_assoc();
            $totalUsers = $result1['total_users'];
            $stmt1->close();

            $stmt2 = $conn->prepare("SELECT COUNT(id) AS total_equipment FROM equipments");
            $stmt2->execute();
            $result2 = $stmt2->get_result()->fetch_assoc();
            $totalEquipment = $result2['total_equipment'];
            $stmt2->close();

            $stmt3 = $conn->prepare("SELECT COUNT(id) AS active_rentals FROM rents WHERE returned_date IS NULL");
            $stmt3->execute();
            $result3 = $stmt3->get_result()->fetch_assoc();
            $activeRentals = $result3['active_rentals'];
            $stmt3->close();

            $stmt4 = $conn->prepare("SELECT SUM(GREATEST(DATEDIFF(returned_date, rent_date), 1) * rent_price) AS total_revenue FROM rents WHERE returned_date IS NOT NULL");
            $stmt4->execute();
            $result4 = $stmt4->get_result()->fetch_assoc();
            $totalRevenue = $result4['total_revenue'] ?? 0;
            $stmt4->close();

            return ['success' => true, 'message' => 'Dashboard info', 'data' => [ 'total_users' => $totalUsers, 'total_equipment' => $totalEquipment, 'active_rentals' => $activeRentals, 'total_revenue' => $totalRevenue]];

        } catch (Exception $e) {
            return ['success' => false, 'message' => $e->getMessage()];
        }
    }
}