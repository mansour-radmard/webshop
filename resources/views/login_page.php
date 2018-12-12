<?php
include_once "../lib/User.php";

if (isset($_POST['submit'])) {
   $username = $_POST['username'];
   $password = $_POST['password'];


   $object = new User($conn);
   $object->Login($username, $password);
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

   <div class="container login-wrapper">
      <div class="row">
         <div class="col-md-4 offset-md-4">
            <div class="item-box login-card">
               <div class="login-form">
                  <div class="panel">
                     <i class="fas fa-sign-in-alt login-icon"></i>
                     <h2>Sign In</h2>
                     <p>Please enter your username and password</p>
                  </div>
                  <form id="login" action="login_page.php" method="POST">
                     <div class="form-group">
                        <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                     </div>
                     <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                     </div>
                     <div class="forgot">
                        <a href="#">Forgot password?</a>
                     </div>
                     <div class="forgot">
                        <a href="sign_up.php">Sign up!</a>
                     </div>
                     <button type="submit" name="submit" class="btn btn-primary">Login</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>

<!-- Footer -->
<?php include "../includes/footer.php";?>

<!-- JS scripts -->
<?php include "../includes/scripts.php";?>

</body>

</html>
