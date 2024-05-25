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
// Retrieve the booking information from the database
if (isset($_GET['date'])) {
    $date = date('Y-m-d');
    $sql = "SELECT * FROM bookings WHERE status = 'Approved'";
    $result2 = mysqli_query($conn, $sql);
    if ($result2) {
        $date = $_GET['date'];
    }
    $sql = "SELECT * FROM bookings WHERE status = 'Approved'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $bookings = array();
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($bookings, $row);
        }
        echo json_encode(array('status' => 'success', 'data' => $bookings));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'No events on this date.'));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Invalid request.'));
}

