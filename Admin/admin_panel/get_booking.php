<?php
    // Connect to the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "event_management_uiu";

    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Retrieve the booking information from the database
    $id = $_GET['id'];
    $sql = "SELECT * FROM bookings WHERE id = $id ORDER BY id DESC";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_assoc($result);
        echo json_encode($row);
    } else {
        echo 'Booking not found';
    }
?>
