<?php
include 'db.php';
include 'functions.php';
checkLogin();

$product_id = $_GET['product_id'];
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="UTF-8">
    <title><?php echo $product['name']; ?></title>
    <link rel="stylesheet" href="../css/styles.css">
</head>
<body>
    <?php include 'header.php'; ?>

    <main>
        <h2><?php echo $product['name']; ?></h2>
        <p><?php echo $product['description']; ?></p>
        <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
        <p>قیمت: <?php echo $product['price']; ?> تومان</p>
        <form action="add_to_cart.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $product_id; ?>">
            <input type="submit" value="افزودن به سبد خرید">
        </form>
    </main>

    <?php include 'footer.php'; ?>
</body>
</html>