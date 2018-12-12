<?php
session_start();
include_once "../lib/Ad.php";

$id = $_GET['id'];

$object = new Ad($conn);
$object->getOneAd($id);

$ad = $object->getOneAd($id);

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
      <div class="row">
         <div class="col-md-6 offset-md-2">
            <div class="card mt-4">
               <img class="card-img-top img-fluid" src="http://placehold.it/900x400" alt="">
            <?php
               foreach ($ad as $val ) { ?>
               <div class="card-body">
                  <h3 class="card-title"><?php echo $val['product_name']; ?></h3>
                  <h4><span>€ </span><?php echo $val['price']; ?></h4>
                  <p class="card-text"><?php echo $val['product_description']; ?></p>
                  <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                  4.0 stars
               </div>
               <?php
               }
            ?>
            </div>
            <div class="card card-outline-secondary my-4">
               <div class="card-header">
                  Product Reviews
               </div>
               <div class="card-body">
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                  <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                  <hr>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                  <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                  <hr>
                  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Omnis et enim aperiam inventore, similique necessitatibus neque non! Doloribus, modi sapiente laboriosam aperiam fugiat laborum. Sequi mollitia, necessitatibus quae sint natus.</p>
                  <small class="text-muted">Posted by Anonymous on 3/1/17</small>
                  <hr>
                  <a href="#" class="btn btn-success">Leave a Review</a>
               </div>
            </div>
         </div>
         <div class="col-md-4">
            <?php
               if ($_SESSION['logged']) {
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
