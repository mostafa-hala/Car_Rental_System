<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <!-- <script src="assets/js/color-modes.js"></script> -->

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Login</title>

    <!-- <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/checkout/"> -->



    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3"> -->

    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">




    <!-- Custom styles for this template -->
    <!-- <link href="css/checkout.css" rel="stylesheet"> -->
</head>
<body>

   <!-- Section: Design Block -->
<section class="text-center text-lg-start">
    <style>
      .cascading-right {
        margin-right: -50px;
      }
  
      @media (max-width: 991.98px) {
        .cascading-right {
          margin-right: 0;
        }
      }
    </style>
  
    <!-- Jumbotron -->
    <div class="container py-4">
      <div class="row g-0 align-items-center">
        <div class="col-lg-6 mb-5 mb-lg-0">
          <div class="card cascading-right" style="
              background: hsla(0, 0%, 100%, 0.55);
              backdrop-filter: blur(30px);
              ">
            <div class="card-body p-5 shadow-5 text-center">
              <h2 class="fw-bold mb-5">Login now</h2>
              <?php
                if (!empty($_GET["msg"]) && $_GET["msg"] == "Invalid email or password") {
                ?>

<h5 class="fw-bold mb-5">Invalid email or password</h5>

                <?php
                } ?>
              <form method="post" action="handle_login.php">
                
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input required type="email" id="form3Example3" class="form-control" id="email" name="email" />
                  <p id="password"></p>
                  <label  class="form-label" for="form3Example3" >Email address</label>
                </div>
  
                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" required id="form3Example4" class="form-control" name="password" id="password"/>
                  <p id="password"></p>
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
  
                
  
                <!-- Submit button -->
                <button type="submit" class="btn btn-primary btn-block mb-4">
                  Login
                </button>
  
                <!-- Register buttons -->
                
                
              </form>
            </div>
          </div>
        </div>
  
        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="./images/back2.jpg" class="w-100 rounded-4 shadow-4"
            alt="" />
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block --> 
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <script src="js/login-script.js"></script>
</body>
</html>