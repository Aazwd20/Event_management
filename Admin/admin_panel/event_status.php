<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Boxicons -->
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <!-- My CSS -->
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Popper.js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.3/umd/popper.min.js"></script>

    <!-- Bootstrap JavaScript -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


    <!-- Bootstrap -->


    <style>
    #box {
        display: flex;
        padding-left: 30px;
        align-content: center;
        justify-content: end;
        flex-direction: column;
        align-items: center;
        padding-top: 30px;
        overflow: hidden;
    }

    table th {
        border: 1px solid #dee2e6;
        color: var(--dark);
    }

    #head {
        color: #fff;
        background-color: #343a40;
        /* background-color: #222d32; */
        border: 1px solid #ccc;
        padding: 8px;
        text-align: center;
        background-color: var(--dark);
        color: var(--grey);
    }

    table tr {
        color: var(--dark);
    }

    table td {
        border: 1px solid #dee2e6;
        color: var(--dark);
    }

    h2 {
        text-align: left;
        font-size: 40px;
        padding-left: 30px;
        padding-top: 30px;
        color: var(--dark);
    }
    </style>
</head>

<body>

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

        // Retrieve data from the database
        $sql = "SELECT * FROM bookings ORDER BY id DESC";
        $result = mysqli_query($conn, $sql);



  
                        // Query the database to get the relevant boo/king information
// $booking_query = mysqli_query($conn, "SELECT * FROM bookings WHERE id = $booking_id");
// $booking = mysqli_fetch_assoc($booking_query);

    ?>

    <?php include 'includes/header_nav.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <h2 style="text-align: left; font-size: 40px; ">Requestd Events</h2>

            <div class="col-md-12" id="box">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" id="head">#</th>
                            <th scope="col" id="head">Event Name</th>
                            <th scope="col" id="head">Organiser/Club</th>
                            <th scope="col" id="head">Type Of Event</th>
                            <th scope="col" id="head">Date</th>
                            <th scope="col" id="head">Time</th>
                            <th scope="col" id="head">Expected Venue</th>
                            <th scope="col" id="head">Expected Participants</th>
                            <th scope="col" id="head">Email Address</th>
                            <th scope="col" id="head">Status</th>
                            <th scope="col" id="head">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
    // Loop through each row of data and create a new row in the table
    if (mysqli_num_rows($result) > 0) {
        $id = 1;
        while($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<th scope='row'>" . $id .  "</th>";
            echo "<td>" . $row["full_name"] . "</td>";
            echo "<td>" . $row["org_name"] . "</td>";
            echo "<td>" . $row["event_type"] . "</td>";
            echo "<td>" . $row["date"] . "</td>";
            echo "<td>" . $row["time"] . "</td>";
            echo "<td>" . $row["venue_type"] . "</td>";
            echo "<td>" . $row["participants"] . "</td>";
            echo "<td>" . $row["email"] . "</td>";
            $id++;
            if ($row['status'] == 1 || $row['status'] == 'Approved'){
                echo "<td>";
            echo "<a href='#' class='btn btn-danger btn-sm' style='background-color: #019a02;border-color: #007bff;'>Approved</a>";
            echo "</td>";
            

            }
            else if ($row['status'] == 'Cancelled'){
                echo "<td>";
            echo "<a href='#' class='btn btn-danger btn-sm' >Cancelled</a>";
            echo "</td>";

            }
           else{
            echo "<td>";
            echo "<a href='#' class='btn btn-danger btn-sm' style='background-color: #6c757d; border-color: #6c757d;' >Pending</a>";
            echo "</td>";
           }
            echo "<td>";
            echo "<a href='#' class='btn btn-primary btn-sm edit-btn' data-id='" . $row["id"] . "'>Edit</a>";
            echo "<a href='#' class='btn btn-danger btn-sm'>Delete</a>";
            echo "</td>";
            echo "</tr>";
             
        }
    } else {
        echo "<tr><td colspan='9'>No data found</td></tr>";
    }
?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal dialog for editing the booking -->


    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Booking</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm">
                        <!-- method="post" action="handle-form.php" -->
                        <input type="hidden" id="bookingId" name="bookingId">
                        <div class="form-group">
                            <label for="eventName">Event Name</label>
                            <input type="text" class="form-control" id="eventName" name="eventName">
                        </div>
                        <div class="form-group">
                            <label for="orgName">Organizer/Club</label>
                            <input type="text" class="form-control" id="orgName" name="orgName">
                        </div>
                        <div class="form-group">
                            <label for="eventType">Type Of Event</label>
                            <input type="text" class="form-control" id="eventType" name="eventType">
                        </div>
                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date">
                        </div>
                        <div class="form-group">
                            <label for="time">Time</label>
                            <input type="time" class="form-control" id="time" name="time">
                        </div> 

                         <div class="form-group">
                            <label for="venueType">Select Venue</label>
                            <input type="venueType" class="form-control" id="venueType" name="venueType">
                        </div>   




                        <div class="form-group">
                            <label for="participants">Expected Participants</label>
                            <input type="number" class="form-control" id="participants" name="participants">
                        </div>
                        <div class="form-group">
                            <label for="email">Email Address</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" id="status" name="status">
                                <option value="Pending">Pending</option>
                                <option value="Approved">Approved</option>
                                <option value="Cancelled">Cancelled</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="comment">Reason For Cancelletion (Optional)</label>
                            <input type="comment" class="form-control" id="comment" name="comment" style = 'height:90px;'>
                            
                        </div>
                        
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="saveButton" onclick="saveChanges()">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <script src="script.js"></script>


    <script>
    $(document).on('click', '.edit-btn', function() {
        var id = $(this).data('id');
        $.ajax({
            url: 'get_booking.php',
            type: 'GET',
            data: {
                id: id
            },
            ataType: 'json',
            success: function(data) {
                var booking = JSON.parse(data);
                $('#bookingId').val(booking.id);
                $('#eventName').val(booking.full_name);
                $('#orgName').val(booking.org_name);
                $('#eventType').val(booking.event_type);
                $('#date').val(booking.date);
                $('#time').val(booking.time);
                $('#venueType').val(booking.venue_type);
                $('#participants').val(booking.participants);
                $('#email').val(booking.email);
                $('#status').val(booking.status);
                $('#comment').val(booking.comment);
                $('#editModal').modal('show');
            },
            error: function(jqXHR, textStatus, errorThrown) {
                alert('Error getting booking information: ' + textStatus + ' - ' + errorThrown);
            }
        });
    });
    </script>

    <script>
    // Save changes button click event
    $('#saveButton').click(function() {

        // Get form data
        var bookingId = $('#bookingId').val();
        var eventName = $('#eventName').val();
        var orgName = $('#orgName').val();
        var eventType = $('#eventType').val();
        var date = $('#date').val();
        var time = $('#time').val();
        var venueType = $('#venueType').val();
        var participants = $('#participants').val();
        var email = $('#email').val();
        var status = $('#status').val();
        var comment = $('#comment').val();

        // Send AJAX request to update booking
        $.ajax({
            type: 'POST',
            url: 'update_booking.php',
            data: {
                bookingId: bookingId,
                eventName: eventName,
                orgName: orgName,
                eventType: eventType,
                date: date,
                time: time,
                venueType: venueType,
                participants: participants,
                email: email,
                status: (status == 'Approved' ) ? 1 : 0 ,// Set status value to 1 if "Approved" is selected, otherwise set to 0
                comment: comment
            },
            success: function(response) {
                // Handle success response
                // Reload page or update booking details on page
            },
            error: function(jqXHR, textStatus, errorThrown) {
                // Handle error response
            }
        });
    });

    $(document).ready(function() {

        // Add event listener to the saveButton
        $('#saveButton').click(function() {
            // Show confirmation message
            if (confirm("Are you sure you want to save changes?")) {
                // Trigger AJAX request to update the booking
                $.ajax({
                    url: 'update_booking.php',
                    type: 'POST',
                    data: $('#editForm').serialize(),
                    success: function(response) {
                        // Check if the error message exists and show it
                        if (response.error) {
                            $('#error-message').html(response.error).show();
                        } else {
                            // Show success message
                            alert("Booking updated successfully.");
                            // Close modal
                            $('#editModal').modal('hide');
                            // Reload the table
                            location.reload();
                        }
                    }
                });
            }
        });

    });


    function saveChanges() {
  // Get the values of the form inputs
  var bookingId = document.getElementById("bookingId").value;
  var eventName = document.getElementById("eventName").value;
  var orgName = document.getElementById("orgName").value;
  var eventType = document.getElementById("eventType").value;
  var date = document.getElementById("date").value;
  var time = document.getElementById("time").value;
  var venueType = document.getElementById("venueType").value;
  var participants = document.getElementById("participants").value;
  var email = document.getElementById("email").value;
  var status = document.getElementById("status").value;
  var comment = document.getElementById("comment").value;

  // Send an AJAX request to mailsender.php with the form data
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "mailsender.php", true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Handle the response from mailsender.php
      console.log(xhr.responseText);
    }
  };
  xhr.send("bookingId=" + bookingId + "&eventName=" + eventName + "&orgName=" + orgName + "&eventType=" + eventType + "&date=" + date + "&time=" + time + "&venueType=" + venueType + "&participants=" + participants + "&email=" + email + "&status=" + status + "&comment=" + comment);
}

    </script>


</body>

</html>