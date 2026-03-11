<?php

header("Content-Type: application/json");

require_once '../../classes/db.php';
require_once '../../classes/auth.php';

$auth = new Auth();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = strtolower(trim($_POST['username']));
    $password = trim($_POST['password']);
    $role = trim($_POST['role']);

    $result = $auth->login($username, $password, $role);
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}