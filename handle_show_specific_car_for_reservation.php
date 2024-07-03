<?php
session_start(); // Start the session
if (isset($_GET['car_id']) && is_numeric($_GET['car_id']) && isset($_GET['office_Id']) && is_numeric($_GET['office_Id'])) {
    $car_id = $_GET['car_id'];
    $office_Id=$_GET['office_Id'];
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
    // var_dump($data);

    // Store data in the session
    $_SESSION['car_specicfic_for_reservation'] = $data;

    // Redirect to reservation.php
    header("location:add_reservation.php");
}
