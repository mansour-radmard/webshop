<?php
include_once "../lib/User.php";

/*
Gets new user data
 */
if (isset($_POST['submit'])) {
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password2 = $_POST['password2'];

   $object = new User($conn);
   $object->Register($first_name, $last_name, $username, $email, $password); // Register new user
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
   <!-- Head links -->
   <?php include "../includes/head.php";?>

</head>

<body>
<?php include "../includes/navbar.php"?>

<div class="container">
   <div class="row">
      <div class="col-md-7 offset-md-3">
         <form class="text-center border border-light p-5 sign-up-form" action="sign_up.php" method="POST">
            <i class="fas fa-user-plus"></i>
            <p class="h4 mb-4">Sign up</p>
            <div class="form-row mb-4">
              <div class="col">
                  <input type="text" id="first_name" name="first_name" class="form-control" placeholder="First name" value="<?php echo $first_name; ?>" required>
              </div>
              <div class="col">
                  <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Last name" value="<?php echo $last_name; ?>" required>
              </div>
            </div>
            <div <?php if (isset($username_error)): ?> class="form_error" <?php endif ?> >
               <input type="text" id="username" name="username" class="form-control mb-4" placeholder="Username" required>
               <?php if (isset($username_error)): ?>
                  <span><?php echo $username_error; ?></span>
               <?php endif ?>
            </div>
            <div <?php if (isset($email_error)): ?> class="form_error" <?php endif ?> >
               <input type="email" id="email" name="email" class="form-control mb-4" placeholder="E-mail" required>
               <?php if (isset($email_error)): ?>
                  <span><?php echo $email_error; ?></span>
               <?php endif ?>
            </div>
            <div <?php if (isset($password_error)): ?> class="form_error" <?php endif ?> >
               <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>
               <?php if (isset($password_error)): ?>
                  <span><?php echo $password_error; ?></span>
               <?php endif ?>
            </div>
               <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
                  Retype your password
               </small>
               <input type="password" id="password2" name="password2" class="form-control mb-4" placeholder="Password" aria-describedby="defaultRegisterFormPasswordHelpBlock" required>
                  <button class="btn btn-info my-4 btn-block" type="submit" name="submit">Sign up</button>
               <hr>
               <p>By clicking
                  <em>Sign up</em> you agree to our
                  <a href="" target="_blank">terms of service</a> and
                   <a href="" target="_blank">terms of service</a>.
               </p>
         </form>
      </div>
   </div>
</div>

<!-- Footer -->
<?php include "../includes/footer.php";?>

<!-- JS scripts -->
<?php include "../includes/scripts.php";?>

</body>

</html>
