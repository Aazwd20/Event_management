<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input data from form
    $email = $_POST['email'];
    $password = $_POST['password'];


  

    // Store input data in database
    $connection = mysqli_connect("localhost", "root", "", "event_management_uiu");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "SELECT * FROM users WHERE email = '$_POST[email]' AND password = '$_POST[password]'";
    if (mysqli_query($connection, $sql)) {
        echo "Login successful";
        header("Location: Admin/admin_panel/index.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
    exit();
}
?>
