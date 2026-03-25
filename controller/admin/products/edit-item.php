<?php
header("Content-Type: application/json");

require_once '../../../classes/db.php';
require_once '../../../classes/auth.php';
require_once '../../../classes/product.php';

$product = new Product();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['product_name']);
    $category = trim($_POST['category']);
    $features = trim($_POST['features']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
    $image = isset($_FILES['image']) ? $_FILES['image']['name'] : null;
    $currentImage = trim($_POST['current_image']);
    $currentImageName = basename($currentImage);
    $id = intval($_POST['id']);
    $image = $image ? $image : $currentImageName;

    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
    $uploadDir = $_SERVER['DOCUMENT_ROOT'] . '/Fabdul/images/uploads/';
    $extension = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
    $imgURL = uniqid('', true) . '.' . $extension;
    $uploadFile = $uploadDir . $imgURL;

    if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
        $currentImagePath = $uploadDir . $currentImageName;
        if (file_exists($currentImagePath)) {
            unlink($currentImagePath);
        }
        $image = $imgURL;
    } else {
        echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file']);
        exit;
    }
}
    $result = $product->updateProduct($id, $name, $category, $features, $description, $price, $quantity, $image);
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}