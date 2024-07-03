<?php
session_start();

if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    $car = $_POST["car_id"];
    $office = $_POST["office_Id"];
    $reservation = $_POST["reservation_date"];
    $pickup = $_POST["pickup_date"];
    $return = $_POST["return_date"];
    $payment = $_POST["payment_status"];

    // Uncomment and complete the database connection part
    require_once("config.php");
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);
    // Query to get customer ID based on email
    $customerQuery = "SELECT customer_id FROM customer WHERE email = '$email'";
    $customerResult = mysqli_query($cn, $customerQuery);

    if ($customerResult && mysqli_num_rows($customerResult) > 0) {
        $customerData = mysqli_fetch_assoc($customerResult);
        $customer_id = $customerData['customer_id'];

        // Modify the SQL query to insert the new reservation data
        $qry = "INSERT INTO Reservations (customer_id, car_id, office_Id, reservation_date, pickup_date, return_date, payment_status)
                VALUES ('$customer_id', '$car', $office, '$reservation', '$pickup', '$return', '$payment')";

        $result = mysqli_query($cn, $qry);

        if ($result) {
            // Insertion successful
            // Update the status in the car table to "rented"
            $updateStatusQuery = "UPDATE car SET status = 'rented' WHERE car_id = '$car'";
            mysqli_query($cn, $updateStatusQuery);

            header("location:reservation.html");
        } else {
            // Insertion failed
            header("location:add_reservation.php?msg=error");
        }
    } else {
        // Customer not found
        header("location:add_reservation.php?msg=customer_not_found");
    }

    // Close the database connection
    mysqli_close($cn);
} else {
    // Redirect to user.php with a message for empty fields
    header("location:add_reservation.php?msg=empty_fields");
}
?>
