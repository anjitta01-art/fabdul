<?php
header("Content-Type: application/json");

require_once '../../classes/db.php';
require_once '../../classes/dashboard.php';

$dashboard = new Dashboard();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $dashboard->getDashboardInfo();
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}