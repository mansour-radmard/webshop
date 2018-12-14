<?php
include_once "config.php";
session_start();

$id = $_GET['id'];

$sql = "DELETE FROM ads WHERE id=$id"; // Deletes Ad from user page
$conn->exec($sql);
header('Location: ../views/my_ads.php?id='.$_SESSION['id']  );

?>
