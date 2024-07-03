<?php
session_start(); // Start the session
if (isset($_GET['customer_id']) && is_numeric($_GET['customer_id'])) {
    $customer_id = $_GET['customer_id'];

    // Include your configuration file
    require_once("config.php");

    // Create a database connection
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    // Check the connection
    if (!$cn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Construct the DELETE query
    $deleteQuery = "DELETE FROM customer WHERE customer_id=$customer_id";

    // Execute the DELETE query
    $deleteResult = mysqli_query($cn, $deleteQuery);

    // Check if the DELETE query executed successfully
    if (!$deleteResult) {
        die('DELETE query execution failed: ' . mysqli_error($cn));
    }

    // Construct the SELECT query to retrieve data after deletion
    $selectQuery = "SELECT * FROM customer where customer_id=$customer_id";

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
    $_SESSION['search_results_customer'] = $data;

    // Redirect to cars_show.php after deleting and retrieving the data
    header("Location: index.php");
    exit(); // Make sure to exit after the header redirect
} else {
    // Handle the case where customer_id is not set or not numeric
    echo "Invalid car ID. Please go back.";
    // Alternatively, you can redirect to an error page
    // header("Location: error.php");
    // exit();
}
?>