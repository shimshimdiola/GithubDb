<?php
header("Access-Control-Allow-Origin: *");  // allow all origins
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");
header("Content-Type: application/json");

// DB connection
$host = "localhost";
$user = "root";   // default for XAMPP
$pass = "";       // empty by default
$db   = "mydb";

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . $conn->connect_error]);
    exit;
}

// Receive data
$username = $_POST["username"] ?? "";
$email    = $_POST["email"] ?? "";

if ($username == "" || $email == "") {
    echo json_encode(["status" => "error", "message" => "Missing input data"]);
    exit;
}

// Escape values
$username = $conn->real_escape_string($username);
$email    = $conn->real_escape_string($email);

// Insert query
$sql = "INSERT INTO users (username, email) VALUES ('$username', '$email')";
if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Saved: $username ($email)"]);
} else {
    echo json_encode(["status" => "error", "message" => $conn->error]);
}

$conn->close();
