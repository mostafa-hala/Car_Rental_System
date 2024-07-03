<?php
session_start(); // Start the session
if (isset($_GET['reservation_id']) && is_numeric($_GET['reservation_id'])) {
    $reservation_id = $_GET['reservation_id'];
    require_once("config.php");
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    $qry = "SELECT r.reservation_id, r.customer_id, r.car_id, r.office_Id, r.reservation_date, r.return_date, r.pickup_date, r.payment_status, c.image, c.status,cu.email 
        FROM reservations r 
        JOIN car c ON c.car_id = r.car_id
        JOIN customer cu ON cu.customer_id = r.customer_id
        WHERE r.reservation_id = $reservation_id
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
    $_SESSION['reservation_specicfic'] = $data;

    // Redirect to reservation.php
    header("location:edit_reservation.php");
}
