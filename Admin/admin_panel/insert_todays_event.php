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

// Get today's date in the correct format
$today = date('Y-m-d');

// Delete all data from the todays_event table
mysqli_query($conn, "DELETE FROM todays_event");

// Select all data from the bookings table where the date matches today's date
$sql = "SELECT * FROM bookings WHERE date = '$today'";
$result = mysqli_query($conn, $sql);

// Loop through the results and insert them into the todays_event table
while ($row = mysqli_fetch_assoc($result)) {
    $venue = $row['venue'];
    $capacity = $row['capacity'];
    $date = $row['date'];
    $time = $row['time'];
    $booked_by = $row['booked_by'];
    $additional = $row['additional'];

    $insert_sql = "INSERT INTO todays_event (venue, capacity, date, time, booked_by, additional) 
                   VALUES ('$venue', '$capacity', '$date', '$time', '$booked_by', '$additional')";
    mysqli_query($conn, $insert_sql);
}

echo "Data updated successfully!";
?>
