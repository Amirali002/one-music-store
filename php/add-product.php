<?php
include 'db.php';
include 'functions.php';
checkLogin();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "INSERT INTO products (name, description, price, image) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssds", $name, $description, $price, $image);
    $stmt->execute();
    $stmt->close();

    header("Location: admin.php");
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>افزودن محصول جدید</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h2>افزودن محصول جدید</h2>
        <form action="add_product.php" method="POST">
            <label for="name">نام محصول:</label>
            <input type="text" id="name" name="name" required><br>
            <label for="description">توضیحات:</label>
            <textarea id="description" name="description" required></textarea><br>
            <label for="price">قیمت:</label>
            <input type="number" id="price" name="price" required><br>
            <label for="image">تصویر (URL):</label>
            <input type="text" id="image" name="image" required><br>
            <input type="submit" value="افزودن محصول">
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>