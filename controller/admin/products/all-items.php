<?php
header("Content-Type: application/json");

require_once '../../../classes/db.php';
require_once '../../../classes/auth.php';
require_once '../../../classes/product.php';

$product = new Product();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $searchString = isset($_GET['search']) ? $_GET['search'] : null;
    $category = isset($_GET['category']) ? $_GET['category'] : null;
    $result = $product->getAllProducts($searchString, $category);
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}