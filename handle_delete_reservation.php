<?php
session_start(); // Start the session
if (isset($_GET['reservation_id']) && is_numeric($_GET['reservation_id'])) {
    $reservation_id = $_GET['reservation_id'];

    // Include your configuration file
    require_once("config.php");

    // Create a database connection
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    // Check the connection
    if (!$cn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct the DELETE query
    $deleteQuery = "DELETE FROM Reservations WHERE reservation_id=$reservation_id";

    // Execute the DELETE query
    $deleteResult = mysqli_query($cn, $deleteQuery);

    // Check if the DELETE query executed successfully
    if (!$deleteResult) {
        die('DELETE query execution failed: ' . mysqli_error($cn));
    }

    // Construct the SELECT query to retrieve data after deletion
    $selectQuery = "SELECT r.reservation_id, r.customer_id, r.car_id, r.office_Id, r.reservation_date,r.return_date, r.pickup_date, r.payment_status, c.image 
    FROM reservations r 
    JOIN car c ON c.car_id = r.car_id
    LIMIT 0, 1000";

    // Execute the SELECT query
    $selectResult = mysqli_query($cn, $selectQuery);

    // Check if the SELECT query executed successfully
    if (!$selectResult) {
        die('SELECT query execution failed: ' . mysqli_error($cn));
    }

    // Fetch the data after deletion
    $data = array();
    while ($row = mysqli_fetch_assoc($selectResult)) {
        $data[] = $row;
    }

    // Close the database connection
    mysqli_close($cn);

    // Store data in the session
    $_SESSION['reservation_data'] = $data;

    // Redirect to cars_show.php after deleting and retrieving the data
    header("location:reservation_show.php");
    exit(); // Make sure to exit after the header redirect
} else {
    // Handle the case where car_id is not set or not numeric
    echo "Invalid reservation ID. Please go back.";
    // Alternatively, you can redirect to an error page
    // header("Location: error.php");
    // exit();
}
?>
