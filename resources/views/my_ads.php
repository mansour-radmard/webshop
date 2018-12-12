<?php
session_start();
include_once "../lib/Ad.php";

$id = $_GET['id'];

$object = new Ad($conn);
$object->getUserAds($id);

$ads = $object->getUserAds($id);

// echo "<pre>";
// var_dump($ads);
// exit();


?>

<!DOCTYPE html>
<html lang="en">

<head>
<!-- Head links -->
<?php include "../includes/head.php";?>

</head>

<body>
<!-- Navigation -->
<?php include "../includes/navbar.php";?>

   <div class="container">
      <!-- Jumbotron Header -->
      <header class="jumbotron my-4">
         <h1 class="display-3">Welcome to <span>e_bid!</span></h1>
         <!-- <img class="headder-img" src="/webshop/public/images/img-02.png" /> -->
         <p class="lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
         <a href="#" class="btn btn-primary btn-lg">Call to action!</a>
      </header>
      <!-- Page Features -->

      <div class="row text-center">
   <?php foreach ($ads as $ad) { ?>
         <div class="col-md-3">
            <div class="card">
               <img class="card-img-top" src="http://placehold.it/500x325" alt="">
               <div class="card-body">
                  <h5 class="card-title"><?php echo $ad['product_name']; ?></h5>
                  <h6 class="card-title">Price: <span>€ </span><?php echo $ad['price']; ?></h6>
                  <p class="card-text"><?php echo $ad['product_description']; ?></p>
               </div>
               <div class="card-footer">
                  <a href="/webshop/resources/views/product.php?id=<?php echo $ad['id'];?>" class="btn btn-primary">Find Out More!</a>
                  <a href="/webshop/resources/lib/delete_ad.php?id=<?php echo $ad['id'];?>"><button class="btn btn-danger">Delete</button></a>
               </div>
            </div>
         </div>
         <?php
         }
   ?>
      </div>
      <div class="row">
         <div class="col-md-12">
      <?php if ($_SESSION['logged']) {
            include "../includes/side-widget.php";
            }
      ?>
         </div>
      </div>
   </div>

<!-- Footer -->
<?php include "../includes/footer.php";?>

<!-- JS scripts -->
<?php include "../includes/scripts.php";?>

</body>

</html>
