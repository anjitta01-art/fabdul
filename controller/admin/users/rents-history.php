<?php
header("Content-Type: application/json");

require_once '../../../classes/db.php';
require_once '../../../classes/auth.php';
require_once '../../../classes/product.php';
require_once '../../../classes/rent.php';

$rent = new Rent();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $userId = isset($_GET['id']) ? intval($_GET['id']) : 0;
    if ($userId <= 0) {
        echo json_encode(['success' => false, 'message' => 'Invalid user ID']);
        exit;
    }
    $result = $rent->getRentHistory($userId);
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}