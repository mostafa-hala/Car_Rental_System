<?php
session_start(); // Start the session
if (isset($_GET['customer_id']) && is_numeric($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];
    require_once("config.php");
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    $qry = "SELECT customer_id,fname,lname,balance,email,password,bdate,country,city,gender,phone_number from customer where customer_id=$customer_id";

    $result = mysqli_query($cn, $qry);

    if (!$result) {
        die('Query execution failed: ' . mysqli_error($cn));
    }

    $data = array();

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    mysqli_free_result($result);
    mysqli_close($cn);

    // Store data in the session
    $_SESSION['customer_specicfic'] = $data;

    // Redirect to reservation.php
    header("location:edit_customer.php");
}
