<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve input data from form
    $full_name = $_POST['full_name'];
    $org_name = $_POST['org_name'];
    $contact_num = $_POST['contact_num'];
    $event_type = $_POST['event_type'];
    $email = $_POST['email'];
    $participants = $_POST['participants'];
    $date = $_POST['date'];
    $venue_type = $_POST['venue_type'];
    $time = $_POST['time'];
    $additional_details = $_POST['additional_details'];
    $support_name = $_POST['support_name'];
    $support_num = $_POST['support_num'];
    $booking_id = $_POST['booking_id'];

    // Upload image file if provided
    if (!empty($_FILES['image']['name'])) {
        $target_dir = __DIR__ . "/uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        $check = getimagesize($_FILES["image"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            $uploadOk = 0;
        }
        // Check file size
        if ($_FILES["image"]["size"] > 500000) {
            $uploadOk = 0;
        }
        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
            $uploadOk = 0;
        }
        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
                $image = $target_file;
            } else {
                echo "Sorry, there was an error uploading your file.";
                $image = "";
            }
        }
    } else {
        $image = "";
    }

    // Store input data in database
    $connection = mysqli_connect("localhost", "root", "", "event_management_uiu");
    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }


    $sql = "INSERT INTO bookings (full_name, org_name, contact_num, email, event_type, participants, date, venue_type, time, additional_details,support_name,support_num, image, booking_id) VALUES ('$full_name', '$org_name', '$contact_num', '$email', '$event_type', '$participants', '$date', '$venue_type', '$time', '$additional_details', '$support_name','$support_num','$image', '$booking_id')";
    if (mysqli_query($connection, $sql)) {
        echo "Booking placed successfully.Please wait for approval!";
        header("Location: book.php");
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($connection);
    }
    mysqli_close($connection);
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="css/style.css">

  <link rel="stylesheet" type="text/css" href="style2.css">
  <link rel="stylesheet" href="css/form.css">
  <title>UIU Event Management</title>
</head>

<body>
  <!-- Navigation Bar -->
  <?php require 'includes/nav.php'; ?>

  <section class="book-event" style="background-color: white;padding-top: 110px;">
    <div class="container">
      <div class="row">
        <div class="col-md-8 offset-md-2">
          
          <div class="content"> 
 
          <form action="#" method="POST" enctype="multipart/form-data">
            <div class="title"><h3>Book Now</h3></div>
              <div class="user-details">

                <div class="form-group">
                  <span class="details"  style="font-size: 16px;font-weight: 600;">Event Name</span>
                  <input type="text" name="full_name" class="form-control" placeholder="Event Name" required>
                </div>
                <div class="form-group">
                  <span class="details" style="font-size: 16px;font-weight: 600;">Organiser/Club</span>
                  <select class="form-control" name="org_name"  style="color: grey;border: 1px solid grey; width: 85%;height: 45px;border-radius: 4px;" required>
                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp;Select Organiser/Club Name</option>
                    <option value="Computer Club" style="color: black;font-weight: 600;">Computer Club</option>
                    <option value="Robotics Club" style="color: black;font-weight: 600;">Robotics Club</option>
                    <option value="UIU Photography Club" style="color: black;font-weight: 600;">UIU Photography Club</option>
                    <option value="Cultural Club" style="color: black;font-weight: 600;">Cultural Club</option>
                  </select>
                </div>
                <div class="form-group">
                  <span class="details "  style="font-size: 16px;font-weight: 600;">Contact Number</span>
                  <input type="tel" name="contact_num" class="form-control" placeholder="Your Phone Number" required>
                </div>
                <div class="form-group">
                  <span class="details"  style="font-size: 16px;font-weight: 600;">Select Type of Event</span>
                  <select class="form-control"name="event_type" style="color: grey;border: 1px solid grey; width: 85%;height: 45px;border-radius: 4px;" required>
                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp;Select Event Type</option>
                    <option value="Workshop" style="color: black;font-weight: 600;">Workshop</option>
                    <option value="Events" style="color: black;font-weight: 600;">Events</option>
                    <option value="Seminar" style="color: black;font-weight: 600;">Seminar</option>
                    <option value="Other" style="color: black;font-weight: 600;">Other</option>
                  </select>
                </div>
                <div class="form-group" >
                  <span class="details" style="font-size: 16px;font-weight: 600;">Email Address</span>
                  <input type="email" name="email" class="form-control" placeholder="Your Email" required>
                </div>
                <div class="form-group">
                  <span class="details" style="font-size: 16px;font-weight: 600;">Participants</span>
                  <input type="text" name="participants" class="form-control" placeholder="100-500" required>
                </div>
                <div class="form-group">
                  <span class="details" style="font-size: 16px;font-weight: 600;">Date</span>
                  <input type="date" name="date" class="form-control" placeholder="Event Date" required>
                </div>
                <div class="form-group">
                  <span class="details" style="font-size: 16px;font-weight: 600;">Select Venue</span>
                  <select class="form-control" name="venue_type" style="color: grey;border: 1px solid grey;width: 85%;height: 45px;border-radius: 4px;" required>
                    <option value="">&nbsp;&nbsp;&nbsp;&nbsp;Select Event Venue</option>
                    <option value="venue1" style="color: black;font-weight: 600;">Venue 1</option>
                    <option value="venue2" style="color: black;font-weight: 600;">Venue 2</option>
                    <option value="venue3" style="color: black;font-weight: 600;">Venue 3</option>
           
                  </select>
                </div>



                <div class="form-group">
                  <span class="details" style="font-size: 16px;font-weight: 600;">Time</span>
                  <input type="text" name="time" class="form-control" placeholder="10am - 7pm" required>
                </div>
                <div class="form-group">
                  <span class="details"  style="font-size: 16px;font-weight: 600;">One Additional Member</span>
                  <input type="text" name="support_name" class="form-control"  placeholder="Name" style="width: 41%;" required>
                  <input type="number" name="support_num" class="form-control" placeholder="Contact" style="width: 41%;" required>
                </div>
                <div class="form-group">
                  <span class="details" style="font-size: 16px;font-weight: 600;">Additional Details</span>
                  <textarea class="form-control" name="additional_details"  placeholder="Additional Details" style="min-width: 80vw;width: inheit;height: 100px;border: 2px solid lightgray;border-radius: 5px;" required></textarea>
                </div>

                
              </div>
              <div class="button">
              <input type="hidden" name="booking_id" value="<?php echo uniqid(); ?>">
              <input type="submit" value="Book Now" onclick="alert('Booking confirmed. Thank you for choosing us!');">
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- --------------------------- Footer ------------------------------- -->

  <?php require 'includes/footer.php'; ?>


  <!-- ---------------------------Footer Close------------------------------- -->
</body>

</html>