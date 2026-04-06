<?php
header("Content-Type: application/json");

require_once '../../classes/db.php';
require_once '../../classes/auth.php';
require_once '../../classes/user.php';

$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $oldPassword = trim($_POST['oldPassword']);
    $newPassword = trim($_POST['newPassword']);
    $result = $user->changePassword($oldPassword, $newPassword);
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}