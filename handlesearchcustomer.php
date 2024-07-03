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

    // Search query logic for customers
    $query = "SELECT * FROM customer 
              WHERE fname LIKE '%$search%' 
                 OR lname LIKE '%$search%'
                 OR email LIKE '%$search%'
                 OR bdate LIKE '$search'
                 OR country LIKE '$search'
                 OR city LIKE '$search'
                 OR gender LIKE '$search'
                 OR phone_number LIKE '$search'
                 OR customer_id LIKE '$search'";

    $result = mysqli_query($cn, $query);

    if (!$result) {
        die('Query execution failed: ' . mysqli_error($cn));
    }

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Store data in the session
    $_SESSION['search_results_customer'] = $data;

    // Debugging statements
    // var_dump($data);  // Check if $data has values

    // Close the database connection
    mysqli_close($cn);

    // Redirect to the search results page for customers
    header("Location: search_result_customer.php");
    exit();
}
?>
