<?php
header("Content-Type: application/json");

require_once '../classes/db.php';
require_once '../classes/contact.php';

$contact = new Contact();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $phone = trim($_POST['phone']);
    $equipmentType = strtolower(trim($_POST['equipmentType']));
    $message = trim($_POST['message']);

    $result = $contact->addContactMessage($fullname, $email, $phone, $equipmentType, $message);
    echo json_encode($result);
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}