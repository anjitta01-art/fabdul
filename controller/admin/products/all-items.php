<?php
header("Content-Type: application/json");

require_once '../../../classes/db.php';
require_once '../../../classes/auth.php';
require_once '../../../classes/product.php';

$product = new Product();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $product->getAllProducts();
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}