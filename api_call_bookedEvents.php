<!doctype html>
<html lang="en">
<head>
  <title>Bookings</title>
  <script>
    function showBookings() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var bookings = JSON.parse(this.responseText);
          var table = "<table><tr><th>ID</th><th>Full Name</th><th>Organization Name</th><th>Contact Number</th><th>Email</th><th>Event Type</th><th>Participants</th><th>Date</th><th>Venue Type</th><th>Time</th><th>Additional Details</th><th>Image</th><th>Booking ID</th></tr>";
          for(var i = 0; i < bookings.length; i++) {
            var booking = bookings[i];
            table += "<tr><td>" + booking.id + "</td><td>" + booking.full_name + "</td><td>" + booking.org_name + "</td><td>" + booking.contact_num + "</td><td>" + booking.email + "</td><td>" + booking.event_type + "</td><td>" + booking.participants + "</td><td>" + booking.date + "</td><td>" + booking.venue_type + "</td><td>" + booking.time + "</td><td>" + booking.additional_details + "</td><td>" + booking.image + "</td><td>" + booking.booking_id + "</td></tr>";
          }
          table += "</table>";
          document.getElementById("table-container").innerHTML = table;
        }
      };
      xmlhttp.open("GET","http://localhost/event2/api_call/booking_api.php",true);
      xmlhttp.send();
    }
    
    window.onload = function() {
      showBookings();
    };
  </script>
</head>
<body>
  <h1>Bookings</h1>
  <div id="table-container"></div>
</body>
</html>
