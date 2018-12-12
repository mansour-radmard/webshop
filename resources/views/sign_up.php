<?php
include_once "../lib/User.php";

if (isset($_POST['submit'])) {
   $first_name = $_POST['first_name'];
   $last_name = $_POST['last_name'];
   $username = $_POST['username'];
   $email = $_POST['email'];
   $password = $_POST['password'];
   $password2 = $_POST['password2'];


   $object = new User($conn);
   $object->Register($first_name, $last_name, $username, $email, $password);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <!-- Important meta tags -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <!-- Title -->
  <title>Blog</title>

  <!-- Favicon -->
  <link rel="shortcut icon" href="#">

  <!-- Google fonts -->
  <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:300i,400,400i,700,700i,800,800i|PT+Sans:400,700,700i" rel="stylesheet">

  <!-- Fontawesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.2/css/all.css" integrity="sha384-/rXc/GQVaYpyDdyxK+ecHPVYJSN9bmVFBvjA/9eOB+pb3F2w2N6fc5qB9Ew5yIns" crossorigin="anonymous">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

  <!-- Custom CSS -->
  <link rel="stylesheet" type="text/css" href="../../vendors/css/normalize.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/style.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/login.css">
  <link rel="stylesheet" type="text/css" href="../../public/css/queries.css">

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

<!-- JQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<!-- Bootstrap JS -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<!-- Custom JS -->
<script src="resources/js/custom.js"></script>

</body>

</html>
