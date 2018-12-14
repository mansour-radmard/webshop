<?php
include_once "config.php";
session_start();

/*
Adds new offer to databese
 */
$id = $_POST['id'];
$user_id = $_POST['user_id'];
$price = $_POST['price'];
$first_name = $_SESSION['first_name'];
$last_name = $_SESSION['last_name'];

$sql = "INSERT INTO offers (`offer_price`, `ad_id`, `user_id`, `first_name`, `last_name`)
        VALUES ('$price', '$id', '$user_id', '$first_name', '$last_name')";

$conn->exec($sql);

header('Location: /webshop/resources/views/product.php?id='.$id);

?>
