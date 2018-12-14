<?php
include_once "config.php";
session_start();

/*
Ad class
 */
class Ad {

   // Databse connection
   private $conn;
   public function __construct($conn) {
      $this->conn = $conn;
   }

   // Adds new product
   public function AddProduct($product_name, $product_description, $price, $id) {

      $st = $this->conn->prepare("INSERT INTO ads (product_name, product_description, price, user_id) VALUES (?, ?, ?, ?)");
      $st->bindParam(1, $product_name);
      $st->bindParam(2, $product_description);
      $st->bindParam(3, $price);
      $st->bindParam(4, $id);
      $st->execute();

      header('Location: /webshop/resources/views/my_ads.php?id='.$id);

   }

   // Gets all ads saved in databse to output
   public function getAllAds() {

      $st = $this->conn->prepare("SELECT * FROM ads");
      $st->execute();
      return $st->fetchAll(PDO::FETCH_ASSOC);

   }

   // Gets one Ad to output with ant offers attached to it
   public function getOneAd($id) {

      $st = $this->conn->prepare("SELECT ads.id, ads.product_name, ads.product_description,
            ads.price, ads.date, users.first_name, users.last_name
            FROM ads
            LEFT JOIN users ON users.id = ads.user_id
            WHERE ads.id = ?");

      $st->bindParam(1, $id);
      $st->execute();
      $ad = $st->fetchAll(PDO::FETCH_ASSOC)[0];
      /**
      * the function to get all offers is called
      * and all offers are placed into array called offers
      **/
      $ad['offers'] = $this->getOffers($ad['id']);
      return $ad;

   }

   // Get offers attached to Ads
   protected function getOffers($adId) {

      $st = $this->conn->prepare("SELECT * FROM offers WHERE ad_id = ?");
      $st->bindParam(1, $adId);
      $st->execute();
      return $st->fetchAll(PDO::FETCH_ASSOC);

   }

   // Gets all Ads of a specific user
   public function getUserAds($user_id) {

      $st = $this->conn->prepare("SELECT * FROM ads WHERE user_id = ?");
      $st->bindParam(1, $user_id);
      $st->execute();
      return $st->fetchAll(PDO::FETCH_ASSOC);

   }

}

 ?>
