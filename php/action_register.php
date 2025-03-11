<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $realname = $_POST['realname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $repassword = $_POST['repassword'];
    $email = $_POST['email'];

    if ($password !== $repassword) {
        echo "<script>alert('کلمه عبور و تکرار آن مطابقت ندارند!'); window.location.href='../register.html';</script>";
        exit();
    }

    $check_query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "<script>alert('این نام کاربری قبلاً ثبت شده است!'); window.location.href='../register.html';</script>";
        exit();
    }

    $hashed_password = password_hash($password, PASSWORD_BCRYPT);

    $sql = "INSERT INTO users (realname, username, password, email, role) VALUES (?, ?, ?, ?, 'user')";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssss", $realname, $username, $hashed_password, $email);

    if ($stmt->execute()) {
        echo "<script>alert('ثبت‌نام با موفقیت انجام شد! حالا وارد شوید.'); window.location.href='../login.html';</script>";
    } else {
        echo "<script>alert('خطا در ثبت نام! دوباره امتحان کنید.'); window.location.href='../register.html';</script>";
    }

    $stmt->close();
}

$conn->close();
?>
