<?php
header("Content-Type: application/json");

require_once '../../classes/db.php';
require_once '../../classes/auth.php';
require_once '../../classes/product.php';
require_once '../../classes/rent.php';

$rent = new Rent();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $itemId = trim($_POST['itemId']);
    $rentDate = trim($_POST['rentDate']);
    $returnDate = trim($_POST['returnDate']);
    $quantity = trim($_POST['rentQuantity']);

    $result = $rent->addNewRent($itemId, $rentDate, $returnDate, $quantity);
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}