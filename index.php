<?php
session_start();

if (isset($_SESSION['id'])) {
  header('location: user/');
}

?>
<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="assests/css/bootstrap.min.css">
  <link rel="stylesheet" href="assests/theme/theme.css">
  <title>Login | Note</title>
</head>

<body>

  <?php
  // include 'header.php';
  ?>


  <section class="vh-100">

    <div class="container py-5 h-100">
      <div class="row d-flex align-items-center justify-content-center h-100">
        <div class="col-md-8 col-lg-7 col-xl-6">
          <img src="assests/image/4957136.jpg" class="img-fluid" alt="Sample image">
        </div>
        <div class="col-md-7 col-lg-5 col-xl-5 offset-xl-1">
          <h1>KOPY NOTE | LOGIN</h1>
          <br>
          <form action="<?php $_SERVER['PHP_SELF']; ?>" method="POST">
            <!-- Email input -->
            <div class="form-outline mb-4">


              <input type="email" name="email" id="form1Example13" placeholder="Email address" class="form-control form-control-lg" />
            </div>

            <!-- Password input -->
            <div class="form-outline mb-4">
              <input type="password" name="password" id="form1Example23" placeholder="Password" class="form-control form-control-lg" />
            </div>

            <div class="d-flex justify-content-around align-items-center mb-4">
              <!-- Checkbox -->
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
                <label class="form-check-label" for="form1Example3"> Remember me </label>
              </div>
              <a href="forgot.php">Forgot password?</a>
              <a href="register.php">Create Account !</a>
            </div>

            <!-- Submit button -->
            <button name="login" type="submit" class="btn btn-primary btn-lg btn-block">Sign in</button>



          </form>
          <?php

include 'include/conn.php';
if (isset($_POST['login'])) {
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  // $password=md5(($conn,$_POST['password']));
  $password = md5($_POST['password']);

  $sql = "SELECT uid,name,email FROM kopy_user WHERE email= '{$email}' AND password='{$password}'";

  $result = mysqli_query($conn, $sql) or die("Query Failed");

  if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
      session_start();
      $_SESSION["id"] = $row['uid'];
      $_SESSION["name"] = $row['name'];
      header('location: user/');
    }
  } else {
    echo '<br>
    <div class="alert alert-warning alert-dismissible fade show" >
    <strong>Username & Password </strong>Not matched
     
    </button>
  </div>';
  }
}
?>
        </div>
      </div>
    </div>
  </section>
  <!-- Optional JavaScript; choose one of the two! -->

  <!-- Option 1: Bootstrap Bundle with Popper -->

</body>

</html>
