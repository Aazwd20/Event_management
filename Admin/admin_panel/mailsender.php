<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

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
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    $stmt = $conn->prepare("SELECT status FROM bookings WHERE id=:bookingId");
    $stmt->bindParam(':bookingId', $bookingId);
    $stmt->execute();

    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if($row['status'] == 'Cancelled'){
        // echo 'rooro';
        // header('location: event_status.php');
        // Prepare the email message
    $message = "Booking ID: " . $bookingId . "\n";
    $message .= "Event Name: " . $eventName . "\n";
    $message .= "Organization Name: " . $orgName . "\n";
    $message .= "Event Type: " . $eventType . "\n";
    $message .= "Date: " . $date . "\n";
    $message .= "Time: " . $time . "\n";
    $message .= "Venue Type: " . $venueType . "\n";
    $message .= "Participants: " . $participants . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Status: " . $status . "\n";


    // Send the email
    try {
        // Load PHPMailer
        require 'C:/xampp/htdocs/event2/Web_Update01/event2/Admin/admin_panel/vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require 'C:/xampp/htdocs/event2/Web_Update01/event2/Admin/admin_panel/vendor/phpmailer/phpmailer/src/SMTP.php';
        require 'C:/xampp/htdocs/event2/Web_Update01/event2/Admin/admin_panel/vendor/phpmailer/phpmailer/src/Exception.php';

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        // Configure PHPMailer
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // Enable verbose debug output (set to 2 for more output)
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'malam201304@bscse.uiu.ac.bd'; // SMTP username
        $mail->Password = 'kfdbyhxefaxzbhow'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 465; // TCP port to connect to, use 587 for `PHPMailer::ENCRYPTION_STARTTLS` above

        // Set the sender and recipient email addresses
        $mail->setFrom('malam201304@bscse.uiu.ac.bd', 'fgadsg');
        $mail->addAddress($email, 'adf');

        // Set the email subject and body
        $mail->Subject = 'Event Booking Confirmation';
        $mail->Body = $message;

// Send the email
$mail->send();
echo 'Message has been sent';

// Update the booking status in the database
// $stmt = $conn->prepare("UPDATE bookings SET status='Approved' WHERE id=:bookingId");
// $stmt->bindParam(':bookingId', $bookingId);
// $stmt->execute();

// Redirect the user to the event status page
header('location: event_status.php');
} catch (Exception $e) {
echo 'Message could not be sent. Error: ', $mail->ErrorInfo;
}
}

   else if($row['status'] == 'Approved'){
            // Prepare the email message
    $message = "Booking ID: " . $bookingId . "\n";
    $message .= "Event Name: " . $eventName . "\n";
    $message .= "Organization Name: " . $orgName . "\n";
    $message .= "Event Type: " . $eventType . "\n";
    $message .= "Date: " . $date . "\n";
    $message .= "Time: " . $time . "\n";
    $message .= "Venue Type: " . $venueType . "\n";
    $message .= "Participants: " . $participants . "\n";
    $message .= "Email: " . $email . "\n";
    $message .= "Status: " . $status . "\n";
    $message .= "Reson: " . $comment . "\n";

    // Send the email
    try {
        // Load PHPMailer
        require 'C:/xampp/htdocs/event2/Web_Update01/event2/Admin/admin_panel/vendor/phpmailer/phpmailer/src/PHPMailer.php';
        require 'C:/xampp/htdocs/event2/Web_Update01/event2/Admin/admin_panel/vendor/phpmailer/phpmailer/src/SMTP.php';
        require 'C:/xampp/htdocs/event2/Web_Update01/event2/Admin/admin_panel/vendor/phpmailer/phpmailer/src/Exception.php';

        // Create a new PHPMailer instance
        $mail = new PHPMailer(true);

        // Configure PHPMailer
        $mail->isSMTP();
        $mail->SMTPDebug = 0; // Enable verbose debug output (set to 2 for more output)
        $mail->Host = 'smtp.gmail.com'; // Set the SMTP server to send through
        $mail->SMTPAuth = true; // Enable SMTP authentication
        $mail->Username = 'malam201304@bscse.uiu.ac.bd'; // SMTP username
        $mail->Password = 'kfdbyhxefaxzbhow'; // SMTP password
        $mail->SMTPSecure = 'ssl'; // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port = 465; // TCP port to connect to, use 587 for `PHPMailer::ENCRYPTION_STARTTLS` above

        // Set the sender and recipient email addresses
        $mail->setFrom('malam201304@bscse.uiu.ac.bd', 'fgadsg');
        $mail->addAddress($email, 'adf');

        // Set the email subject and body
        $mail->Subject = 'Event Booking Cancellation  ';
        $mail->Body = $message;

// Send the email
$mail->send();
echo 'Message has been sent';

Update the booking status in the database
$stmt = $conn->prepare("UPDATE bookings SET status='Cancelled' WHERE id=:bookingId");
$stmt->bindParam(':bookingId', $bookingId);
$stmt->execute();

// Redirect the user to the event status page
header('location: event_status.php');
} catch (Exception $e) {
echo 'Message could not be sent. Error: ', $mail->ErrorInfo;
}
    }

}
?>