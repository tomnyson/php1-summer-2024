<?php
require_once 'vendor/autoload.php';

session_start();

$data = json_decode(file_get_contents('php://input'), true);
if (isset($data['credential'])) {
    $client = new Google_Client(['client_id' => '1059530540508-6pp5ldhk1i9qoounau8s6pdvmdhhlnok.apps.googleusercontent.com']);
    $payload = $client->verifyIdToken($data['credential']);
    if ($payload) {
        $_SESSION['user'] = $payload;
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false, 'message' => 'Invalid ID token']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'No credential received']);
}
