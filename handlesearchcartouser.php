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

    // Search query logic
$query = "SELECT * FROM car 
          WHERE brand LIKE '%$search%' 
             OR body LIKE '%$search%'
             OR year LIKE '$search'
             OR price_per_day LIKE '$search'
             OR status LIKE '%$search%'
             -- OR office_Id LIKE '%$search%'
             OR plate_id LIKE '$search'
             OR color LIKE '%$search%'";


    $result = mysqli_query($cn, $query);

    if (!$result) {
        die('Query execution failed: ' . mysqli_error($cn));
    }

    $data = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    // Store data in the session
    $_SESSION['search_results'] = $data;

    // Debugging statements
    // var_dump($data);  // Check if $data has values

    // Close the database connection
    mysqli_close($cn);

    // Redirect to the search results page
    header("Location: search_results_user.php");
    exit();
}
?>
