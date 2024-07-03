<?php
session_start();

if (!empty($_POST["customer_id"])) {
    // Retrieve data from the form
    $customer_id = $_POST["customer_id"];
    $fname = $_POST["fname"];
    $lname = $_POST["lname"];
    $balance = $_POST["balance"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $bdate = $_POST["bdate"];
    $country = $_POST["country"];
    $city = $_POST["city"];
    $gender = $_POST["gender"];
    $phone_number = $_POST["phone_number"];

    // Database connection
    require_once("config.php");
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    // Check the connection
    if (!$cn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the customer record
    $updateCustomerQuery = "UPDATE customer SET 
        fname='$fname', 
        lname='$lname', 
        balance='$balance', 
        email='$email', 
        password='$password', 
        bdate='$bdate', 
        country='$country', 
        city='$city', 
        gender='$gender', 
        phone_number='$phone_number' 
        WHERE customer_id='$customer_id'";

    $updateCustomerResult = mysqli_query($cn, $updateCustomerQuery);

    // Check the update result
    if (!$updateCustomerResult) {
        die('Update customer query execution failed: ' . mysqli_error($cn));
    }

    // Close the database connection
    mysqli_close($cn);

    // Redirect to reservations_show.php after updating
    header("Location: index.php");
    exit();
} else {
    echo "Invalid form data. Please go back and fill in all the required fields.";
}
?>
