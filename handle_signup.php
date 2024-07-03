<?php
if (!empty($_POST["fname"]) && !empty($_POST["lname"]) && !empty($_POST["balance"]) &&
    !empty($_POST["email"]) && !empty($_POST["password"]) && !empty($_POST["bdate"]) &&
    !empty($_POST["country"]) && !empty($_POST["city"]) && !empty($_POST["gender"]) &&
    !empty($_POST["phone_number"])) {

    $fname = htmlspecialchars(trim($_POST["fname"]));
    $lname = htmlspecialchars(trim($_POST["lname"]));
    $balance = htmlspecialchars(trim($_POST["balance"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $password = md5($_POST["password"]);
    $bdate = $_POST["bdate"];
    $country = htmlspecialchars(trim($_POST["country"]));
    $city = htmlspecialchars(trim($_POST["city"]));
    $gender = htmlspecialchars(trim($_POST["gender"]));
    $phone_number = htmlspecialchars(trim($_POST["phone_number"]));

    require_once("config.php");
    $cn = mysqli_connect(DB_HOST, DB_USER_NAME, DB_USER_PW, DB_NAME);

    // Check if the email already exists in the customer table
    $existing_email_query = "SELECT email FROM customer WHERE email = '$email'";
    $existing_email_result = mysqli_query($cn, $existing_email_query);

    if (mysqli_num_rows($existing_email_result) == 0) {
        // Email is not in the customer table, so we can proceed with the insert
        $insert_query = "INSERT INTO customer (fname, lname, balance, email, password, bdate, country, city, gender, phone_number) VALUES ('$fname', '$lname', '$balance', '$email', '$password', '$bdate', '$country', '$city', '$gender', '$phone_number')";
        $result = mysqli_query($cn, $insert_query);

        if ($result) {
            // Registration successful, redirect to login page
            header("location: login.php");
        } else {
            // Insert failed, redirect to signup page with an error message
            header("location: sign-up.php?msg=insert_error");
        }
    } else {
        // Email already exists in the customer table, redirect to signup page with a message
        header("location: sign-up.php?msg=already_exist");
    }

    mysqli_close($cn);
} else {
    // Form fields are not complete, redirect to signup page with an error message
    header("location: sign-up.php?msg=empty_field");
}
?>
