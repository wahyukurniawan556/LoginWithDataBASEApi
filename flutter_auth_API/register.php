<?php
include 'db.php';

$input = json_decode(file_get_contents("php://input"), true);
$username = $input['username'];
$email = $input['email'];
$password = password_hash($input['password'], PASSWORD_DEFAULT);

$stmt = $pdo->prepare("INSERT INTO users (username, email, password) VALUES (?, ?, ?)");
if ($stmt->execute([$username, $email, $password])) {
    echo json_encode(['status' => 'success']);
} else {
    echo json_encode(['status' => 'error']);
}
?>
