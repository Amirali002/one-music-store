<?php
include 'db.php';
include 'functions.php';
session_start();

if (!isset($_SESSION['user_id']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php?error=not_admin");
    exit();
}

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>پنل ادمین</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h2>پنل ادمین</h2>
        <table border="1">
            <tr>
                <th>ID</th>
                <th>نام محصول</th>
                <th>قیمت</th>
                <th>عملیات</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['name']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row['id']; ?>">ویرایش</a>
                    <a href="delete_product.php?id=<?php echo $row['id']; ?>">حذف</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
        <a href="add_product.php">افزودن محصول جدید</a>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>