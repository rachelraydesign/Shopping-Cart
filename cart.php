<?php
include('header.php');
include('connect.php');
session_start();
//var_dump($_POST);

if($_SESSION['cart'] == null) {
    $_SESSION['cart'] = array();
};
array_push($_SESSION['cart'], $_POST['product_id']);
?>

<?php
$sql = "SELECT * FROM products";
$stmt = $conn->query($sql);
$product = $_POST['product_id'];

while($row = $stmt->fetch()) {
    foreach ($_SESSION['cart'] as $product) {
        if ($row['product_id'] == $product) {
            ?>
            <div class="products">
                <?php echo '<img src="images/' . $row["product_image"] . '">'; ?>
                <div class="product_description">
                    <p><strong><?php echo $row['product_name']; ?></strong></p>
                    <p><?php echo $row['product_description']; ?></p>
                    <p><strong><?php echo '€' . $row['product_price']; ?></strong></p>
                </div>
            </div>
            <?php
        }
    }
}
?>