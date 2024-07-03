<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = md5($_POST["password"]);

    // Database connection
    require_once("config.php");
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    // Check the connection
    if (!$cn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Check in the customer table
    $customerQuery = "SELECT * FROM customer WHERE email='$email' AND password='$password'";
    $customerResult = mysqli_query($cn, $customerQuery);

    if ($customerResult && mysqli_num_rows($customerResult) > 0) {
        // Customer login is successful
        $customerData = mysqli_fetch_assoc($customerResult);
        // $_SESSION["user_type"] = "customer";
        $_SESSION["user_data"] = $customerData;

        // Retrieve data of cars available in the same city
        // Retrieve data of cars available in the same city
        $customerCity = $customerData["city"];
        $carsQuery = "SELECT c.* FROM car c 
              JOIN office o ON c.office_Id = o.office_Id 
              WHERE o.city='$customerCity' AND c.status='active'";
        $carsResult = mysqli_query($cn, $carsQuery);

        $carsData = array();
        while ($row = mysqli_fetch_assoc($carsResult)) {
            $carsData[] = $row;
        }

        // Store car data in the session
        $_SESSION["cars_data"] = $carsData;

        // Redirect to home-page.php
        header("Location: home-page.php");
        exit();
    }

    // Check in the admin table
    $password = $_POST["password"];
    $adminQuery = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
    $adminResult = mysqli_query($cn, $adminQuery);

    if ($adminResult && mysqli_num_rows($adminResult) > 0) {
        // Admin login is successful
        // $_SESSION["user_type"] = "admin";
        header("Location: index.php");
        exit();
    }

    // If neither customer nor admin login is successful
    header("Location: login.php?msg=Invalid email or password");
    exit();
} else {
    // Redirect to login.php with an error message
    header("Location: login.php?msg=Invalid request");
    exit();
}
