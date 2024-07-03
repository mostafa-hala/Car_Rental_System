<?php
session_start(); // Start the session

require_once("config.php");
$cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

$qry = "SELECT car_id,plate_id,brand,body,color,year,price_per_day,status,office_Id,image from car";

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
$_SESSION['car_data'] = $data;

// Redirect to reservation.php
header("location:cars_show_for_reservation.php");
?>
