<?php
session_start();

if (!empty($_POST["Plate-Id"])) {
    // Retrieve data from the form
    $plate = $_POST["Plate-Id"];
    $id = $_POST["car-Id"];
    $brand = $_POST["Brand"];
    $body = $_POST["Body"];
    $color = $_POST["Color"];
    $year = $_POST["Year"];
    $price = $_POST["Price_Per_Day"];
    $status = $_POST["Status"];
    $office = $_POST["office_Id"];

    // Database connection
    require_once("config.php");
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    // Check the connection
    if (!$cn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // File upload handling
    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $file_name = "images/cars/" . Date("YmdHms") . "." . $extension;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $file_name)) {
        // Update the car record
        $updateQuery = "UPDATE car SET 
            plate_id='$plate', 
            brand='$brand', 
            body='$body', 
            color='$color', 
            image='$file_name', 
            year='$year', 
            price_per_day='$price', 
            status='$status', 
            office_Id='$office' 
            WHERE car_id='$id'";

        $updateResult = mysqli_query($cn, $updateQuery);

        // Check the update result
        if (!$updateResult) {
            die('Update query execution failed: ' . mysqli_error($cn));
        }

        // Retrieve data after update
        $selectQuery = "SELECT * FROM car";
        $selectResult = mysqli_query($cn, $selectQuery);

        if (!$selectResult) {
            die('SELECT query execution failed: ' . mysqli_error($cn));
        }

        $data = array();
        while ($row = mysqli_fetch_assoc($selectResult)) {
            $data[] = $row;
        }

        // Store data in the session
        $_SESSION['car_data'] = $data;

        // Close the database connection
        mysqli_close($cn);

        // Redirect to cars_show.php after updating and retrieving the data
        header("Location: cars_show.php");
        exit();
    } else {
        echo "File upload failed. Please try again.";
    }
} else {
    echo "Invalid form data. Please go back and fill in all the required fields.";
}
?>
