<?php
include('header.php');
include('connect.php');
include('User.php');
//Starting the Session
session_start();

$user_name = $_POST['user_name'];
$user_password = $_POST['user_password'];

$user = new User();
$user->Login($user_name, $user_password, $conn);

//Creating the Session
$value = $cookie;
$_SESSION["shopping_cart"] = $value;
echo $_SESSION["shopping_cart"];

//Creating the Cookie
if(isset($_COOKIE["customer"])){
    setcookie("customer", time(), time() + (86400 * 30), "/");
    $cookie = $_COOKIE["customer"];
    echo "No cookie";
}else{
    $cookie = $_COOKIE["customer"];
}echo $cookie;
?>

<?php
$sql = "SELECT * FROM products";
$stmt = $conn->query($sql);

while($row = $stmt->fetch()) {
//    echo $row["product_id"] . $row["product_name"]
//        . $row["product_description"] . $row["product_price"];
////var_dump($row);
    ?>
    <div class="shopping">
        <div class="products">
            <form method="post" action="cart.php?action=add&id=<?php echo $row["product_id"]?>">
                <?php echo '<img src="images/' .$row["product_image"] . '">';?>
                    <div class="product_description">
                        <?php echo '<input type="hidden" name="product_id" value="' . $row['product_id'] . '"/>'?>
                        <p><strong><?php echo $row['product_name']; ?></strong></p>
                        <p><?php echo $row['product_description']; ?></p>
                        <p><strong><?php echo '€' . $row['product_price']; ?></strong></p>
                        <input style="width: 60%;" type="submit" name="add">
                    </div>
            </form>
        </div>
    </div>
    <?php
}
?>