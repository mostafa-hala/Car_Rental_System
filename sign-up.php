<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
  <!-- <script src="assets/js/color-modes.js"></script> -->

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.118.2">
  <title>Sign-Up</title>

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
              <h2 class="fw-bold mb-5">Sign up now</h2>
                <?php
                if (!empty($_GET["msg"]) && $_GET["msg"] == "insert_error") {
                ?>

<h5 class="fw-bold mb-5">You have an error during inssertion try again</h5>

                <?php
                } elseif (!empty($_GET["msg"]) && $_GET["msg"] == "already_exist") {
                ?>
                <h5 class="fw-bold mb-5">already exsist go to login</h5>

                  


                <?php }
                ?>
              <form action="handle_signup.php" method="post">
                <!-- 2 column grid layout with text inputs for the first and last names -->
                <div class="row">
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example1" class="form-control" name="fname" required />
                      <label class="form-label" for="form3Example1">First name</label>
                    </div>
                  </div>
                  <div class="col-md-6 mb-4">
                    <div class="form-outline">
                      <input type="text" id="form3Example2" class="form-control" name="lname" required />
                      <label class="form-label" for="form3Example2">Last name</label>
                    </div>
                  </div>
                </div>

                <!-- Balance input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example3" class="form-control" name="balance" required />
                  <label class="form-label" for="form3Example3">Balance</label>
                </div>
                <!-- Email input -->
                <div class="form-outline mb-4">
                  <input type="email" id="form3Example3" class="form-control" name="email" required />
                  <label class="form-label" for="form3Example3">Email address</label>
                </div>

                <!-- Password input -->
                <div class="form-outline mb-4">
                  <input type="password" id="form3Example4" class="form-control" name="password" required />
                  <label class="form-label" for="form3Example4">Password</label>
                </div>
                <!-- bdate input -->
                <div class="form-outline mb-4">
                  <input type="date" id="form3Example4" class="form-control" name="bdate" required />
                  <label class="form-label" for="form3Example4">BirthDay</label>
                </div>
                <!-- country input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example4" class="form-control" name="country" required />
                  <label class="form-label" for="form3Example4">Country</label>
                </div>
                <!-- city input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example4" class="form-control" name="city" required />
                  <label class="form-label" for="form3Example4">City</label>
                </div>
                <!-- gender input -->
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example4" class="form-control" name="gender" required />
                  <label class="form-label" for="form3Example4">Gender</label>
                </div>
                <div class="form-outline mb-4">
                  <input type="text" id="form3Example4" class="form-control" name="phone_number" required />
                  <label class="form-label" for="form3Example4">Phone_number</label>
                </div>



                <!-- Submit button -->
                <div class="text-center">
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    Sign Up
                  </button>
                  <p>Already have an account?</p>
                  <button type="submit" class="btn btn-primary btn-block mb-4">
                    <a href="login.php" style="text-decoration: none; color:white;">
                      Login

                    </a>
                  </button>
                </div>


              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-6 mb-5 mb-lg-0">
          <img src="./images/back1.jpg" class="w-100 rounded-4 shadow-4" alt="" />
        </div>
      </div>
    </div>
    <!-- Jumbotron -->
  </section>
  <!-- Section: Design Block -->
  <script src="assets/dist/js/bootstrap.bundle.min.js"></script>
  <!-- <script src="reg-script.js"></script> -->

</body>

</html>