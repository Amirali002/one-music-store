<?php
$servername = "localhost";  
$username = "root";
$password = "";
$dbname = "nogan-web";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("اتصال به پایگاه داده ناموفق بود: " . $conn->connect_error);
} else {
    echo "✅ اتصال موفقیت‌آمیز بود!";
}
?>
