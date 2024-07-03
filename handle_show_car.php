<?php
session_start(); // Start the session

require_once("config.php");
$cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

$qry = "SELECT car.car_id,car.plate_id,car.brand,car.body,car.color,car.year,car.price_per_day,car.status,car.office_Id,car.image,office.city from car join office on car.office_Id=office.office_Id";

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
header("location:cars_show_for_user.php");
?>
