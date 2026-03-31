<?php
header("Content-Type: application/json");

require_once '../../classes/db.php';
require_once '../../classes/contact.php';

$mesages = new Contact();

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $result = $mesages->getAllMessages();
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}