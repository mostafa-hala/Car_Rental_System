<?php
session_start(); // Start the session
if (isset($_GET['car_id']) && is_numeric($_GET['car_id'])) {
    $car_id = $_GET['car_id'];
    require_once("config.php");
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    $qry = "SELECT car_id,plate_id,brand,body,color,year,price_per_day,status,office_Id,image from car where car_id=$car_id";

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
    $_SESSION['car_specicfic'] = $data;

    // Redirect to reservation.php
    header("location:edit_car.php");
}
