<?php
session_start(); // Start the session

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the search query from the form
    $search = $_POST["search"];

    // Database connection
    require_once("config.php");  // Assuming your configuration file is named config.php
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    // Check the connection
    if (!$cn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Sanitize the search query to prevent SQL injection
    $search = mysqli_real_escape_string($cn, $search);

    // Search query logic for reservations
    $query = "SELECT reservations.*, car.image,car.status
    FROM reservations
    JOIN car ON reservations.car_id = car.car_id
    WHERE reservations.reservation_id LIKE '$search'
       OR reservations.pickup_date LIKE '$search'
       OR reservations.return_date LIKE '$search'
       OR reservations.reservation_date LIKE '$search'
       OR reservations.payment_status LIKE '%$search%'";



    $result = mysqli_query($cn, $query);

    if (!$result) {
        die('Query execution failed: ' . mysqli_error($cn));
    }

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Store data in the session
    $_SESSION['search_results_reservation'] = $data;

    // Debugging statements
    var_dump($data);  // Check if $data has values

    // Close the database connection
    mysqli_close($cn);

    // Redirect to the search results page
    header("Location: search_result_rervation.php");
    exit();
}
?>
