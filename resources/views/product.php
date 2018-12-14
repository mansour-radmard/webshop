<?php
session_start();
include_once "../lib/Ad.php";

$id = $_GET['id'];

$object = new Ad($conn);

/*
Gets one Ad to output
 */
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
               <div class="card-body">
                  <h2 class="card-title"><?php echo $ad['product_name']; ?></h2>
                  <h4>Asking price:</h4>
                  <h4><span>EUR </span><?php echo $ad['price']; ?></h4>
                  <p class="card-text"><?php echo $ad['product_description']; ?></p>
                  <span class="text-warning">&#9733; &#9733; &#9733; &#9733; &#9734;</span>
                  4.0 stars
               </div>
            </div>
            <div class="card card-outline-secondary my-4">
               <div class="card-header">
                  Offers made
               </div>
               <div class="card-body">
            <?php foreach ($ad['offers'] as $val) { ?>
                  <p><spa>€ </spa><?php echo $val['offer_price']; ?></p>
                  <small class="text-muted">By: <?php echo $val['first_name'] . " " . $val['last_name']; ?> <br />Bidded on <?php echo $val['date']; ?></small>
                  <hr>
                  <?php
                  }
            ?>
               </div>
            </div>
            <div class="card card-outline-secondary my-4">
               <div class="card-body">
                  <form action="../lib/add_offer.php" method="POST">
                     <div class="row">
                        <div class="col-md-6">
                           <span class="input-symbol-euro">
                              <input type="number" name="price" value="0" min="0" step="1"  />
                           </span>
                        </div>
                        <div class="col-md-6">
                           <input name="user_id" value="<?php echo $_SESSION['id']; ?>" hidden/>
                           <input name="id" value="<?php echo $id; ?>" hidden/>
                           <button type="submit" name="submit" class="btn btn-success">Make offer</button><br />
                        </div>
                     </div>
                  </form>
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
