<?php
include_once "config.php";
session_start();

class Ad {

   private $conn;
   public function __construct($conn) {
      $this->conn = $conn;
   }

   public function AddProduct($product_name, $product_description, $price, $id) {

      $st = $this->conn->prepare("INSERT INTO ads (product_name, product_description, price, user_id) VALUES (?, ?, ?, ?)");

      $st->bindParam(1, $product_name);
      $st->bindParam(2, $product_description);
      $st->bindParam(3, $price);
      $st->bindParam(4, $id);
      $st->execute();
   }

   public function getAllAds() {

      $st = $this->conn->prepare("SELECT * FROM ads");
      $st->execute();
      return $st->fetchAll(PDO::FETCH_ASSOC);

   }

   public function getOneAd($id) {

      $st = $this->conn->prepare("SELECT * FROM ads WHERE id = ?");
      $st->bindParam(1, $id);
      $st->execute();
      return $st->fetchAll(PDO::FETCH_ASSOC);

   }

   public function getUserAds($user_id) {

      $st = $this->conn->prepare("SELECT * FROM ads WHERE user_id = ?");
      $st->bindParam(1, $user_id);
      $st->execute();
      return $st->fetchAll(PDO::FETCH_ASSOC);

   }

}

 ?>
