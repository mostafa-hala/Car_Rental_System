<?php
session_start();
if (!empty($_POST["Plate-Id"])) {
    $plate = $_POST["Plate-Id"];
    $brand = $_POST["Brand"];
    $body = $_POST["Body"];
    $color = $_POST["Color"];
    $year = $_POST["Year"];
    $price = $_POST["Price_Per_Day"];
    $status = $_POST["Status"];
    $office = $_POST["office_Id"];

    // Uncomment and complete the database connection part
    require_once("config.php");
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    // Correct the file name extraction
    $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
    $file_name = "images/cars/" . Date("YmdHms") . "." . $extension;

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $file_name)) {
        // Uncomment and modify the SQL query to insert the new car data
        $qry = "INSERT INTO car (plate_id, brand, body, color, image, year, price_per_day, status, office_Id) VALUES ('$plate', '$brand', '$body', '$color', '$file_name', '$year', '$price', '$status', '$office')";

        $result = mysqli_query($cn, $qry);

        if ($result) {
            // Insertion successful
            header("location:cars.html");
        } else {
            // Insertion failed
            header("location:add_car.php?msg=error");
        }
    } else {
        // File upload failed
        header("location:add_car.php?msg=file_upload_error");
    }

    // Close the database connection
    mysqli_close($cn);
} else {
    // Redirect to user.php with a message for empty fields
    header("location:add_car.php?msg=empty_fields");
}
?>
