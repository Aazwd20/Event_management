<?php
// check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // get the form data
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

  // check if the status is cancelled
  if ($status === 'Cancelled') {
    // get the cancellation reason from the form data
    $comment = $_POST['comment'];

    // update the booking in the database with the cancellation reason
    // replace the following lines with your own code to update the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "event_management_uiu";

    // create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check if the connection was successful
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // prepare the SQL statement
    $sql = "UPDATE bookings SET event_name='$eventName', org_name='$orgName', event_type='$eventType', date='$date', time='$time', venue_type='$venueType', participants='$participants', email='$email', status='$status', comment='$comment' WHERE booking_id='$bookingId'";

    // execute the SQL statement
    if ($conn->query($sql) === TRUE) {
      // the booking was updated successfully
      echo "Booking updated successfully";
    } else {
      // there was an error updating the booking
      echo "Error updating booking: " . $conn->error;
    }

    // close the database connection
    $conn->close();
  } else {
    // update the booking in the database without the cancellation reason
    // replace the following lines with your own code to update the database
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "event_management_uiu";

    // create a new connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // check if the connection was successful
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    // prepare the SQL statement
    $sql = "UPDATE bookings SET event_name='$eventName', org_name='$orgName', event_type='$eventType', date='$date', time='$time', venue_type='$venueType', participants='$participants', email='$email', status='$status' WHERE booking_id='$bookingId'";

    // execute the SQL statement
    if ($conn->query($sql) === TRUE) {
      // the booking was updated successfully
      echo "Booking updated successfully";
    } else {
      // there was an error updating the booking
      echo "Error updating booking: " . $conn->error;
    }

    // close the database connection
    $conn->close();
  }
}
?>
