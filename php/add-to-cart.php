<?php
include 'db.php';
include 'functions.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php?error=not_logged_in");
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$sql = "INSERT INTO cart (user_id, product_id) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ii", $user_id, $product_id);
$stmt->execute();
$stmt->close();

header("Location: cart.php");
?>