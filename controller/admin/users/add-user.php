<?php
header("Content-Type: application/json");

require_once '../../../classes/db.php';
require_once '../../../classes/auth.php';
require_once '../../../classes/user.php';

$user = new User();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $username = strtolower(trim($_POST['username']));
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    $result = $user->addNewUser($name, $email, $phone, $username, $password, $role);
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}