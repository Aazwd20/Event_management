<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_management_uiu";

if(isset($_POST['bookingId'])) {
    $bookingId = $_POST['bookingId'];
    $eventName = $_POST['eventName'];
    $orgName = $_POST['orgName'];
    $eventType = $_POST['eventType'];
    $date = $_POST['date'];
    $time = $_POST['time'];
    $venueType = $_POST['venueType'];
    $participants = $_POST['participants'];
    $email = $_POST['email'];
    $status = $_POST['status'];

    // Update the booking in the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $query = "UPDATE bookings SET full_name='$eventName', org_name='$orgName', event_type='$eventType', date='$date', time='$time', venue_type='$venueType', participants='$participants', email='$email', status='$status' WHERE id=$bookingId";
    $result = mysqli_query($conn, $query);

    if($result) {
        // Update the unique_id column in the abl_venue table based on the status and date conditions
        $query2 = "UPDATE abl_venue SET unique_id=";
        if ($status == 1 || $status == 'Approved' || strtotime($date) < time() && $venueType == $venueName) {
            $query2 .= "1";
            // Insert data into the booked_venue table
            $query3 = "INSERT INTO booked_venue (venue, capacity, date, time, booked_by) VALUES ('$venueType','$participants','$date', '$time','$eventName')";
        } else {
            $query2 .= "0";
            // Delete data from the booked_venue table
           
        }
        $query2 .= " WHERE venue='$venueType'";
        $result2 = mysqli_query($conn, $query2);
        $result3 = mysqli_query($conn, $query3);
        if($result2 && $result3) {
            // Pass success message to frontend
            echo json_encode(array('success' => true));
        } else {
            // Pass error message to frontend
            echo json_encode(array('error' => 'Venue unique ID or booking update failed.'));
        }
    } else {
        // Pass error message to frontend
        echo json_encode(array('error' => 'Booking update failed.'));
    }

    mysqli_close($conn);
}
?>
