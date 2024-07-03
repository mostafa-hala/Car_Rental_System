<?php
session_start();

if (!empty($_POST["reservation_id"])) {
    // Retrieve data from the form
    $reservation_id = $_POST["reservation_id"];
    $cust_is= $_POST["customer_id"];
    $car_id = $_POST["car_id"];
    $office_Id = $_POST["office_Id"];
    $reservation_date = $_POST["reservation_date"];
    $pickup_data = $_POST['pickup_date'];
    $return_date = $_POST["return_date"];
    $payment_status = $_POST["payment_status"];

    // Database connection
    require_once("config.php");
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    // Check the connection
    if (!$cn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Update the reservation record
    $updateQuery = "UPDATE Reservations SET 
        car_id='$car_id', 
        customer_id=$cust_is,
        office_Id='$office_Id', 
        reservation_date='$reservation_date', 
        return_date='$return_date', 
        pickup_date='$pickup_data',
        payment_status='$payment_status' 
        WHERE reservation_id='$reservation_id'";

    $updateResult = mysqli_query($cn, $updateQuery);

    // Check the update result
    if (!$updateResult) {
        die('Update query execution failed: ' . mysqli_error($cn));
    }

    // Retrieve data after update
    $selectQuery = "SELECT r.reservation_id, r.customer_id, r.car_id, r.office_Id, r.reservation_date, r.return_date, r.pickup_date, r.payment_status, c.image 
    FROM reservations r 
    JOIN car c ON c.car_id = r.car_id
    ";

    $selectResult = mysqli_query($cn, $selectQuery);

    if (!$selectResult) {
        die('SELECT query execution failed: ' . mysqli_error($cn));
    }

    $data = array();
    while ($row = mysqli_fetch_assoc($selectResult)) {
        $data[] = $row;
    }

    // Store data in the session
    $_SESSION['reservation_data'] = $data;

    // Close the database connection
    mysqli_close($cn);

    // Redirect to reservations_show.php after updating and retrieving the data
    header("Location: reservation_show.php");
    exit();
} else {
    echo "Invalid form data. Please go back and fill in all the required fields.";
}
?>
