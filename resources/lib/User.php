<?php
include_once "config.php";
session_start();

class User {

   private $conn;
   public function __construct($conn) {
      $this->conn = $conn;
   }

   public function Login ($username, $password) {
      if (!empty($username) && !empty($password)) {
         $st = $this->conn->prepare("SELECT * FROM users WHERE username=? and password=SHA1(?)");
         $st->bindParam(1, $username);
         $st->bindParam(2, $password);
         $st->execute();

         if ($st->rowCount() == 1) {
            $row = $st->fetch(PDO::FETCH_ASSOC);
            $_SESSION['username'] = $row['username'];
            $_SESSION['first_name'] = $row['first_name'];
            $_SESSION['last_name'] = $row['last_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['logged'] = true;
            header('Location: ../../index.php');
         } else {
            echo "Incorrect username and password";
         }

      } else {
         echo "Please enter username and password";
      }
   }

   public function Register ($first_name, $last_name, $username, $email, $password) {

      $st = $this->conn->prepare("INSERT INTO users (first_name, last_name, username, email, password) VALUES (?, ?, ?, ?, SHA1(?))");

      $st->bindParam(1, $first_name);
      $st->bindParam(2, $last_name);
      $st->bindParam(3, $username);
      $st->bindParam(4, $email);
      $st->bindParam(5, $password);
      $st->execute();

   }

}

 ?>
