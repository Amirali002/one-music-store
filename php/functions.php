<?php
function checkLogin() {
    session_start();
    if (!isset($_SESSION['user_id'])) {
        header("Location: login.php");
        exit();
    }
}

function checkAdmin() {
    if ($_SESSION['role'] != 'admin') {
        header("Location: login.php?error=not_admin");
        exit();
    }
}
?>