<?php
header("Content-Type: application/json");

require_once '../../classes/db.php';
require_once '../../classes/auth.php';
require_once '../../classes/product.php';
require_once '../../classes/rent.php';

$rent = new Rent();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $rentId = intval($_POST['id']);
    $review = trim($_POST['review']);
    $result = $rent->returnItem($rentId, $review);
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}