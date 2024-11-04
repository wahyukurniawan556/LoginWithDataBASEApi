<?php
header("Content-Type: application/json; charset=UTF-8");
$headers = apache_request_headers();
$authHeader = isset($headers['Authorization']) ? $headers['Authorization'] : '';

if (!$authHeader || $authHeader !== 'Bearer your_token_here') {
    echo json_encode(['status' => 'error', 'message' => 'Missing or invalid authentication code']);
    exit;
}

// Ambil data JSON dari input
$input = json_decode(file_get_contents("php://input"), true);

if ($input === null) {
    echo json_encode(['status' => 'error', 'message' => 'No JSON data received']);
    exit;
}

$email = isset($input['email']) ? $input['email'] : null;
$password = isset($input['password']) ? $input['password'] : null;

if (empty($email) || empty($password)) {
    echo json_encode(['status' => 'error', 'message' => 'Email and password are required']);
    exit;
}

// Logika autentikasi (misal, verifikasi di database)
if ($email === "test@example.com" && $password === "12345") {
    echo json_encode(['status' => 'success', 'message' => 'Login successful']);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Invalid credentials']);
}
?>
