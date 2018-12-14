<?php
include_once "../lib/Ad.php";
session_start();

/*
Gets data of the new Ad
 */
if (isset($_POST['submit'])) {
   $product_name = $_POST['product_name'];
   $product_description = $_POST['product_description'];
   $price = $_POST['price'];
   $id = $_SESSION['id'];

   $object = new Ad($conn);
   $object->AddProduct($product_name, $product_description, $price, $id); // Add new Ad to database
}

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
            <form action="add_new_ad.php" method="POST" id="product-add-form">
               <div class="form-group">
                  <label for="title">Product name</label>
                  <input type="text" class="form-control" id="product_name" name="product_name">
               </div>
               <div class="form-group">
                  <label for="title">Product price</label>
                  <input type="text" class="form-control" id="price" name="price">
               </div>
               <div class="form-group">
                  <label for="new-post">Product description</label>
                  <textarea class="form-control textarea-new-post" type="text" id="product_description" name="product_description"></textarea>
               </div>
                  <button type="submit" class="btn btn-info btn-space-top" name="submit">Submit</button>
            </form>
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
