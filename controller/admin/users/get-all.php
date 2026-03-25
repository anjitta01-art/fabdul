<?php
header("Content-Type: application/json");

require_once '../../../classes/db.php';
require_once '../../../classes/auth.php';
require_once '../../../classes/user.php';

$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $user->getAllUsers();
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}