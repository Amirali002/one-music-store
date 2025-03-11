<?php
include 'db.php';
include 'functions.php';
checkLogin();

$product_id = $_GET['id'];
$sql = "DELETE FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$stmt->close();

header("Location: admin.php");
?>