<?php
include('header.php');
session_start();
?>

<style>
    <?php include('style.css') ?>
</style>

<h2>Login</h2>

<form class="login" method="post" action="shop.php">
    <input type="text" placeholder="Your Name" name="user_name"><br><br>
    <input type="password" placeholder="Password" name="user_password"><br><br>
    <input type="submit" value="Submit" name="submit">
</form>