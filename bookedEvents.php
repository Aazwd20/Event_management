<!doctype html>
<html lang="en">
 
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	  <!--Import Google Icon Font-->
	  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

	<title>Event Management</title>


	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css" media="screen">	
	 
	<link href="css/main.css" rel="stylesheet">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />

	<!-- font awesome cdn link  -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

	<!-- custom css file link  -->
	<link rel="stylesheet" href="css/style.css">
 
	
 
	<link rel="stylesheet" href="css/basic.css">
	<link href="css/style2.css" rel="stylesheet">
	<style>
  #table-container {
    display: inline-flex;
	float: center;
    background-color: #e6f0ec;
	color: black;
	margin-left:70px;
	 
  }
  table {
    border-collapse: collapse;
    width: 100%;
  }
  th, td {
    padding: 8px;
    text-align: left;
    border-bottom: 1px solid #ddd;
	border: 2px solid black;
  }
  th {
    background-color: #04AA6D;
    color: white;
	border: 2px solid black;
  }
  tr:hover {background-color:#f5f5f5;}
</style>

<script>
    function showBookings() {
      var xmlhttp = new XMLHttpRequest();
      xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
          var bookings = JSON.parse(this.responseText);
          var table = "<table><tr><th>Organization Name</th><th>Event Type</th><th>Date</th><th>Venue Type</th><th>Time</th></tr>";
for(var i = 0; i < bookings.length; i++) {
  var booking = bookings[i];
  table += "<tr><td>" + booking.org_name + "</td><td>" + booking.event_type + "</td><td>" + booking.date + "</td><td>" + booking.venue_type + "</td><td>" + booking.time + "</td></tr>";
}
table += "</table>";

          document.getElementById("table-container").innerHTML = table;
        }
      };
      xmlhttp.open("GET","http://localhost/event2/Web_Update01/event2/api_call/booking_api2.php",true);
      xmlhttp.send();
    }
    
    window.onload = function() {
      showBookings();
    };
  </script>
	
</head>

 
<body class="home">



<?php require 'includes/nav.php'; ?>
	<div id="introLoader" class="introLoading"></div>

	<div class="container-wrapper">

		<header id="header">
 

 

			
		</header>

		<div class="main-wrapper">
		
			<div class="hero" style="background-image:url('images/x.jpg');">
				<div class="container">

					<h1>Here is some booked event </h1>
					<p>Check the event. View booked date.Book your events.</p>
	   
				 

				</div>
				
			</div>


			

	  <!--sdk sdhflsdkfhdfhpdsohgpiudghdrpsogherghearoghwrgowrhjgwe4otghwearogherog -->
 

	  <!--sdk sdhflsdkfhdfhpdsohgpiudghdrpsogherghearoghwrgowrhjgwe4otghwearogherog -->
 
			
			<div class="bg-light pt-80 pb-80">
			
				<div class="container">
				
					<div class="row">
						
						<div class="col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
						
							<div class="section-title">
							
							<h5 style="text-align: center; color:#5d677a;font-weight: 400; font-family: 'Roboto', 'sans-serif';">Quick Check</h5>
							<h2 style="text-align: center; color:black;font-weight: 400; font-family: 'Montserrat', 'sans-serif';"> 
								<span style="color: black">Booked Events</span>
								</h2>
								
							</div>
 
 
  <div id="table-container"></div>
						
						</div>
					
					</div>
					
					<div class="row">
						
						<div class="col-md-12">
						
							<div class="recent-job-wrapper alt-stripe mr-0">
							<?php
							require 'constants/db_config.php';
							try {
                            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
                            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                            $stmt = $conn->prepare("SELECT * FROM bookings ORDER BY id DESC LIMIT 8");
                            $stmt->execute();
                            $result = $stmt->fetchAll();
  

                            foreach($result as $row) {
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
				 
										   
							$stmtb = $conn->prepare("SELECT * FROM bookings WHERE id = '1'");
                            $stmtb->execute();
                            $resultb = $stmtb->fetchAll();
							foreach($resultb as $rowb) {
							
								$full_name = $_POST['full_name'];
								
							}
							
							if ($venue_type == "venue1") {
							$sta = '<div class="job-label label label-success">
									Auditorium
									</div>';
											  
							}
							if ($venue_type == "venue2") {
							$sta = '<div class="job-label label label-danger">
									Class
									</div>';
											  
							}
							if ($venue_type == "venue1") {
							$sta = '<div class="job-label label label-warning">
									multi
									</div>';
											  
							}
							?>
							<!-- <a class="recent-job-item clearfix" target="_blank" href="explore-job.php?jobid=<?php echo $row['job_id']; ?>"> -->
							<div class="GridLex-grid-middle">
							<div class="GridLex-col-5_xs-12">
							<div class="job-position">
							<div class="image">
							<!-- <?php 
							// if ($complogo == null) {
							// print '<center><img alt="image"  src=""/></center>';
							// }else{
							// echo '<center><img alt="image" title="'.$thecompname.'" width="180" height="100" src="data:image/jpeg;base64,'.base64_encode($complogo).'"/></center>';	
							// }
							?> -->
							</div>
							<div class="content">
							<h4><?php echo "$org_name"; ?></h4>
							<p><?php echo "$full_name"; ?></p>
							</div>
							</div>
							</div>
							<div class="GridLex-col-5_xs-8_xss-12 mt-10-xss">
							<div class="job-location">
							<i class="fa fa-map-marker text-primary"></i> <?php echo "$venue_type" ?></strong> - <?php echo "$venue_type" ?>
							</div>
							</div>
							<div class="GridLex-col-2_xs-4_xss-12">
							<?php echo "$sta"; ?>
							<span class="font12 block spacing1 font400 text-center">Due - <?php echo "$date"; ?> <?php echo "$date"; ?>, <?php echo "$date"; ?></span>
							</div>
							</div>
							</a>
								
							<?php

                            }
	                        }catch(PDOException $e)
                            { 
                   
                             }
                             ?>
						



							
							</div>
							
						</div>
						
					</div>
					
				</div>
			
			</div>
			

<!-- --------------------------- Footer ------------------------------- -->
		
							
<?php require 'includes/footer.php'; ?>

				
<!-- ---------------------------Footer Close------------------------------- -->
			
 
			
		</div>


	</div>

<div id="back-to-top">
   <a href="#"><i class="ion-ios-arrow-up"></i></a>
</div>


<?php require 'dry_code/jsScript.php'; ?> 








</body>


</html>