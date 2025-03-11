<?php
include 'db.php';
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (empty($username) || empty($password)) {
        echo "نام کاربری و رمز عبور نباید خالی باشند.";
        exit();
    }

    $sql = "SELECT id, realname, password, email, role FROM users WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $realname, $hashed_password, $email, $role);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['user_id'] = $id;
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $role;
            $_SESSION['realname'] = $realname;
            $_SESSION['email'] = $email;

            echo "success";
        } else {
            echo "نام کاربری یا رمز عبور اشتباه است.";
        }
    } else {
        echo "نام کاربری یافت نشد.";
    }

    $stmt->close();
}

$conn->close();
?>
