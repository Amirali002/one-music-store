<?php
include 'db.php';
include 'functions.php';
checkLogin();

$product_id = $_GET['id'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image = $_POST['image'];

    $sql = "UPDATE products SET name = ?, description = ?, price = ?, image = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssdsi", $name, $description, $price, $image, $product_id);
    $stmt->execute();
    $stmt->close();

    header("Location: admin.php");
} else {
    $sql = "SELECT * FROM products WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $product_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $product = $result->fetch_assoc();
    $stmt->close();
}
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title>ویرایش محصول</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h2>ویرایش محصول</h2>
        <form action="edit_product.php?id=<?php echo $product_id; ?>" method="POST">
            <label for="name">نام محصول:</label>
            <input type="text" id="name" name="name" value="<?php echo $product['name']; ?>" required><br>
            <label for="description">توضیحات:</label>
            <textarea id="description" name="description" required><?php echo $product['description']; ?></textarea><br>
            <label for="price">قیمت:</label>
            <input type="number" id="price" name="price" value="<?php echo $product['price']; ?>" required><br>
            <label for="image">تصویر (URL):</label>
            <input type="text" id="image" name="image" value="<?php echo $product['image']; ?>" required><br>
            <input type="submit" value="بروزرسانی محصول">
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>