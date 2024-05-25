<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "event_management_uiu";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Retrieve data from the todays_event table
$sql = "SELECT * FROM todays_event";
$result = mysqli_query($conn, $sql);

?>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<!-- My CSS -->
	<link rel="stylesheet" href="style.css">
  <style>
    #box{
      display: flex;
    padding-left: 30px;
    align-content: center;
    justify-content: end;
    flex-direction: column;
    align-items: center;
    padding-top: 30px;
    overflow: hidden;
    }
    table th{    
      border: 1px solid #dee2e6;
      color: var(--dark);
    }
    #head{
      color: #fff;
      background-color: #343a40;
      /* background-color: #222d32; */
      border: 1px solid #ccc;
      padding: 8px;
      text-align: center;
      background-color: var(--dark);
      color: var(--grey);
    }
    table tr{
      color: var(--dark);
    }
    table td{
      border: 1px solid #dee2e6;
      color: var(--dark);
    }
    h2{
      text-align: left;
    font-size: 40px;
    padding-left: 30px;
    padding-top: 30px;
      color: var(--dark);
    }
    #user_image{
        height: 40px;
    width: 40px;
    border-radius: 50%;
    }
    #user{
    display: flex;
    align-items: center;
    
    flex-wrap: wrap;
    /* justify-content: space-evenly; */
    height: 75px;
}
    table tr td p{
        padding-left: 11px;
        padding-top: inherit;
}
    
  </style>
</head>
<body>
	<?php include 'includes/header_nav.php'; ?>

	<div class="container-fluid">
		<div class="row">
			<h2 style="text-align: left; font-size: 40px; ">Current Events</h2>
			<div class="col-md-12" id="box">
				<table class="table">
					<thead>
						<tr>
							<th scope="col" id="head">#</th>
							<th scope="col" id="head">Venue</th>
							<th scope="col" id="head">Capacity</th>
							<th scope="col" id="head">Date/Time</th>
							<th scope="col" id="head">Booked By</th>
							<th scope="col" id="head">Event Name</th>
						</tr>
					</thead>
					<tbody id="todays-bookings">
						<!-- This will be dynamically populated with AJAX data -->
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
$(document).ready(function() {
  $.ajax({
    url: 'todays_events.php?date=today',
    type: 'GET',
    dataType: 'json',
    success: function(response) {
      if (response.status == 'success') {
        var bookings = response.data;
        var rows = '';
        var id = 1;
        for (var i = 0; i < bookings.length; i++) {
          var booking = bookings[i];
          rows += '<tr>';
          rows += '<th scope="row">' + id + '</th>';
          rows += '<td>' + booking.venue_type + '</td>';
          rows += '<td>' + booking.participants + '</td>';
          rows += '<td>' + booking.date + ' <br> ' + booking.time + '</td>';
          rows += '<td><a href="#" class="btn btn-danger btn-sm" style = "background-color: #019a02;border-color: #007bff;"">' + booking.org_name + '</a></td>';
		  rows += '<td>' + booking.full_name + '</td>';
          rows += '</tr>';
          id++;
        }
        $('#todays-bookings').html(rows);
      } else {
        $('#todays-bookings').html('<tr><td colspan="6">' + response.message + '</td></tr>');
      }
    },
    error: function(xhr, status, error) {
      console.log('Error getting bookings from the database.');
    }
  });
});

	</script>
</body>

</html>