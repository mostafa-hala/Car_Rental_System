<?php
session_start(); // Start the session

// Retrieve data from the session
$data = isset($_SESSION['cars_data']) ? $_SESSION['cars_data'] : array();
$userFirstName = isset($_SESSION['user_data']) ? $_SESSION['user_data'] : 'Guest';
// var_dump($data);
?>
<!DOCTYPE html>
<html lang="en" data-bs-theme="light">

<head>
    <script src="/docs/5.3/assets/js/color-modes.js"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>Product example · Bootstrap v5.3</title>
    <link href="assets/dist/css/bootstrap.min.css" rel="stylesheet">


   



    <style>
        .home-back {
            background-image: url("images/ryan-spencer-c-NEiPIxpYI-unsplash.jpg");
            /* background-attachment: fixed; */
            /* background-position: center; */
            background-repeat: no-repeat;
            background-size: cover;
        }

        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            width: 100%;
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }

        .btn-bd-primary {
            --bd-violet-bg: #712cf9;
            --bd-violet-rgb: 112.520718, 44.062154, 249.437846;

            --bs-btn-font-weight: 600;
            --bs-btn-color: var(--bs-white);
            --bs-btn-bg: var(--bd-violet-bg);
            --bs-btn-border-color: var(--bd-violet-bg);
            --bs-btn-hover-color: var(--bs-white);
            --bs-btn-hover-bg: #6528e0;
            --bs-btn-hover-border-color: #6528e0;
            --bs-btn-focus-shadow-rgb: var(--bd-violet-rgb);
            --bs-btn-active-color: var(--bs-btn-hover-color);
            --bs-btn-active-bg: #5a23c8;
            --bs-btn-active-border-color: #5a23c8;
        }

        .bd-mode-toggle {
            z-index: 1500;
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            display: block !important;
        }
    </style>
        <link href="navbars.css" rel="stylesheet">

</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark" aria-label="Eighth navbar example">
        <div class="container">
          <a class="navbar-brand" href="#"><img src="images/OIP.jpg" width="50" height="50" alt="">CarGo</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExample07">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Welcome, <?php echo $userFirstName["fname"]; ?>!</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="handlereservation_show_user.php?customer_id=<?= $userFirstName['customer_id'] ?>">Reservation</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php">logout</a>
              </li>
              
              
              
            </ul>
            <form class="d-flex" role="search" action="handlesearchcartouser.php" method="post">
            <input class="form-control me-2" type="search" placeholder="Search by car" aria-label="Search" name="search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
          </div>
        </div>
      </nav>
    <main>
        <div class="position-relative overflow-hidden  p-md-5  text-center  home-back">
            <div class="col-md-6 p-lg-5 mx-auto my-5 ">
                <h1 class="display-3 fw-bold" style="color: #49aeee;">Your Fav Car Rental System</h1>
                <h3 class="fw-normal  mb-3" style="color: #d1f4ff;">Build anything you want with Aperture</h3>
                <br>
                <div class="d-flex gap-3 justify-content-center lead fw-normal">
                    <a class="icon-link" href="handle_show_car.php" style="text-decoration: none; color: #d1f4ff;">
                        For Rent
                       
                    </a>
                </div>
            </div>
            <div class="product-device shadow-sm d-none d-md-block"></div>
            <div class="product-device product-device-2 shadow-sm d-none d-md-block"></div>
        </div>
        <div style="background:#030a1b ">
            <h3 style="text-align: center; color: #d1f4ff;">Suggested Cars For You</h3>
            <h6 style="text-align: center;color: #d1f4ff;">Fastest way to reserve</h6>
            <div class="container">

            
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php foreach ($data as $car) : ?>
            <div class="col">
                    
              <div class="card shadow-sm" style=" background-color: #042344;color: #d1f4ff;">
                <!-- Your card content here using $reservation data -->
                <img src="<?php echo $car['image']; ?>" class="bd-placeholder-img card-img-top" width="100%" height="225">
                <div class="d-flex gap-2 justify-content-center py-3">
                                    <?php if ($car["status"] == "rented") { ?>
                                        <button class="btn btn-danger rounded-pill px-3" type="button" disabled>
                                            <a href="#" style="text-decoration: none;color:#ffffff" >Rented</a>
                                        </button>
                                    <?php } elseif ($car["status"] == "active") { ?>
                                        <button class="btn btn-success rounded-pill px-3" type="button">
                                            <a href="handle_show_specific_car_for_reservation_for_user.php?car_id=<?= $car['car_id'] ?>&office_Id=<?= $car['office_Id'] ?>" style="text-decoration: none;color:#ffffff">Reserve</a>
                                        </button>
                                    <?php } else { ?>
                                        <button class="btn btn-danger rounded-pill px-3" type="button" disabled>
                                            <a href="#" style="text-decoration: none;color:#ffffff" >Out-Of-Sercive</a>
                                        </button>
                                    <?php } ?>

                                </div>
                <div class="card-body">
                  
                  <p class="card-text"><?php echo "Plate ID: " . $car['plate_id']; ?></p>
                  <p class="card-text"><?php echo "Brand: " .  $car['brand']; ?></p>
                  <p class="card-text"><?php echo "Body: " .  $car['body']; ?></p>
                  <p class="card-text"><?php echo "Color: " .  $car['color']; ?></p>
                  <p class="card-text"><?php echo "Price_Per_Day: " .  $car['price_per_day']; ?></p>
                  <p class="card-text"><?php echo "Status: " .  $car['status']; ?></p>
                
                </div>
              </div>
            </div>
          <?php endforeach; ?>
                
            </div>

            </div>
        </div>
        
        </div>
        <div class=" d-flex justify-flex-center flex-column align-items-center" style="background-color: #030a1b;">
            <h4 style=" text-align: center; margin-top: 35px;color: #d1f4ff;">All Cars</h4>
            <!-- <h6 style="text-align: center;">We have All Types Of Cars</h6> -->
            <h6 style="text-align: center;color: #d1f4ff;">Reserve your car worldwide!</h6>
            <div class="card" style="width: 18rem;background-color: #6f90c7;">
                <img class="card-img-top m-2" src="images/car.jpg" alt="Card image cap">
                <button type="button " class="btn btn-dark m-1 " style="background-color: #042344;"><a class="icon-link" href="handle_show_car.php" style="text-decoration: none; color: #d1f4ff;">
                        See All
                       
                    </a></button>
            </div>
        </div>





    </main>
    <div style="background-color: #6f90c7;">
        <footer class="container py-5" >
            <div class="row">
                <div class="col-12 col-md">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none" stroke="currentColor"
                        stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="d-block mb-2" role="img"
                        viewBox="0 0 24 24">
                        <title style="color: #030a1b;">Product</title>
                        <circle cx="12" cy="12" r="10"></circle>
                        <path
                            d="M14.31 8l5.74 9.94M9.69 8h11.48M7.38 12l5.74-9.94M9.69 16L3.95 6.06M14.31 16H2.83m13.79-4l-5.74 9.94">
                        </path>
                    </svg>
                    <small class="d-block mb-3 text-body-secondary" style="color: #030a1b;">© 2017–2023</small>
                </div>
                <div class="col-6 col-md">
                    <h5>Features</h5>
                    <ul class="list-unstyled text-small">
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Cool stuff</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Random feature</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Team feature</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Stuff for developers</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Another one</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Last time</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Resource name</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Resource</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Another resource</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Final resource</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>Resources</h5>
                    <ul class="list-unstyled text-small">
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Business</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Education</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Government</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Gaming</a></li>
                    </ul>
                </div>
                <div class="col-6 col-md">
                    <h5>About</h5>
                    <ul class="list-unstyled text-small">
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Team</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Locations</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Privacy</a></li>
                        <li><a style="color: #030a1b;" class=" text-decoration-none" href="#">Terms</a></li>
                    </ul>
                </div>
            </div>
        </footer>
    </div>
    
    <script src="bootstrap.bundle.min.js"></script>

</body>

</html>