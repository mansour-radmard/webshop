<?php
include_once "config.php";
session_start();

$id = $_POST['id'];
$user_id = $_POST['user_id'];
$price = $_POST['price'];

echo $user_id . " " . $price . " " . $id;

$sql = "INSERT INTO offers (`offer_price`, `ad_id`, `user_id`) VALUES ('$price', '$id', '$user_id')";
$conn->exec($sql);
header('Location: ../views/product.php?id='.$id);


?>
