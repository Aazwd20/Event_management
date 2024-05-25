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
    $comment = $_POST['comment'];

    // Connect to the database
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Fetch previous venue type for the booking
    $query_prev_venue = "SELECT venue_type FROM bookings WHERE id=$bookingId";
    $result_prev_venue = mysqli_query($conn, $query_prev_venue);
    $prev_venue = mysqli_fetch_assoc($result_prev_venue)['venue_type'];

    // Update the booking in the database
    $query_update_booking = "UPDATE bookings SET full_name='$eventName', org_name='$orgName', event_type='$eventType', date='$date', time='$time', venue_type='$venueType', participants='$participants', email='$email', status='$status',comment='$comment' WHERE id=$bookingId";
    $result_update_booking = mysqli_query($conn, $query_update_booking);

    if($result_update_booking) {
        // Update unique_id for previous venue type to 0
        $query_update_prev_venue = "UPDATE abl_venue SET unique_id=0 WHERE venue='$prev_venue'";
        $result_update_prev_venue = mysqli_query($conn, $query_update_prev_venue);

        // Update unique_id for new venue type to 1
        $query_update_new_venue = "UPDATE abl_venue SET unique_id=1 WHERE venue='$venueType'";
        $result_update_new_venue = mysqli_query($conn, $query_update_new_venue);

        if($status == '0' || $status == 'Cancelled' || $status == 'Pending') {
            // Update unique_id for current venue type to 0
            $query_update_curr_venue = "UPDATE abl_venue SET unique_id=0 WHERE venue='$venueType'";
            $result_update_curr_venue = mysqli_query($conn, $query_update_curr_venue);
        
            // Fetch previous venue type for the booking
            $query_prev_venue = "SELECT venue_type FROM bookings WHERE id=$bookingId";
            $result_prev_venue = mysqli_query($conn, $query_prev_venue);
            $prev_venue = mysqli_fetch_assoc($result_prev_venue)['venue_type'];
        
            // Update venue_type to the previous value
            $query_update_venue_type = "UPDATE bookings SET venue_type='$prev_venue' WHERE id=$bookingId";
            $result_update_venue_type = mysqli_query($conn, $query_update_venue_type);
        
            if(!$result_update_curr_venue || !$result_update_venue_type) {
                echo "Error updating venue type";
            }
        }
        
        if(!$result_prev_venue || !$result_update_booking || !$result_update_prev_venue || !$result_update_new_venue) {
            echo "Error updating booking";
        } else {
            echo "Booking updated successfully";
        }
        
        // Close the database connection
        mysqli_close($conn);
    }
}
?>
