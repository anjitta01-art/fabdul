<?php
header("Content-Type: application/json");

require_once '../../classes/db.php';
require_once '../../classes/auth.php';
require_once '../../classes/product.php';

$product = new Product();
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $category = trim($_POST['category']);
    $features = trim($_POST['features']);
    $description = trim($_POST['description']);
    $price = floatval($_POST['price']);
    $quantity = intval($_POST['quantity']);
    $image = $_FILES['image']['name'];

    // Handle file upload
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = '../../images/uploads/';
        $extension = pathinfo($image, PATHINFO_EXTENSION);
        $imgURL = uniqid() . '.' . $extension;
        $uploadFile = $uploadDir . $imgURL;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            $result = $product->addEquipment($name, $category, $features, $description, $price, $quantity, $imgURL);
            echo json_encode($result);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to move uploaded file']);
            exit;
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'No image uploaded or upload error']);
        exit;
    }
    
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}