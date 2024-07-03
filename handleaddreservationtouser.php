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
    $customerQuery = "SELECT * FROM customer WHERE email = '$email'";
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
            $customerCity = $customerData["city"];
            $carsQuery = "SELECT c.* FROM car c 
                  JOIN office o ON c.office_Id = o.office_Id 
                  WHERE o.city='$customerCity' AND c.status='active'";
            $carsResult = mysqli_query($cn, $carsQuery);
    
            $carsData = array();
            while ($row = mysqli_fetch_assoc($carsResult)) {
                $carsData[] = $row;
            }
    
            // Store car data in the session
            $_SESSION["cars_data"] = $carsData;
    
            // Redirect to home-page.php
            header("Location: home-page.php");
            exit();
        } else {
            // Insertion failed
            header("location:add_reservation_user.php");
        }
    }

    // Close the database connection
    mysqli_close($cn);
}
?>
