<?php
session_start(); // Start the session

require_once("config.php");
$cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

$qry = "SELECT r.reservation_id, r.customer_id, r.car_id, r.office_Id, r.reservation_date,r.return_date, r.pickup_date, r.payment_status, c.image 
        FROM reservations r 
        JOIN car c ON c.car_id = r.car_id
        LIMIT 0, 1000";

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
$_SESSION['reservation_data'] = $data;

// Redirect to reservation.php
header("location:reservation_show.php");
?>
