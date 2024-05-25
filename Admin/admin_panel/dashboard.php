<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <style type="text/css">
		.container {
			width: 80%;
			margin: 0 auto;
			padding-top: 30px;
            min-width: fit-content;
			height: 85px;
			
		}
		h2 {
			text-align: center;
			margin-bottom: 30px;
		}
		.bar {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			align-items: center;
			margin-bottom: 30px;
			
		}
		.bar-item {
			width: calc(35% - 20px);
			background-color: #007bff;
			color: #fff;
			padding: 20px;
			border-radius: 20px;
			font-size: 18px;
			font-family: Arial, sans-serif;
			text-align: center;
			border: 10px solid #eee;
			height: 120px;
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

        ?>

		


<div class="container">
		<h2 style="text-align: left; font-size: 40px; color: var(--dark);">Dashboard</h2>

		<!-- Bar -->
		<div class="bar">
			<div class="bar-item">
			<p>Complete Events</p>
				
<?php
$completed =0;
$waiting =0;
$pending =0;
$cancled =0;
$denied =0;
$booked =0;
// SELECT (GETDATE()AS Date);
$date = "2023-04-30";
if (mysqli_num_rows($result) > 0) {
	$id = 1;
	while($row = mysqli_fetch_assoc($result)) {
		// $currentdate = GETDATE() AS Date;
		 if($row["date"]< $date){
			if ($row['status'] == 1 || $row['status'] == 'Approved'){
				$completed++;
				}
				else if ($row['status'] == 'Cancelled'){
					$cancled++;
	
				}
				else if ($row['status'] == 'Pending'){
					$pending++;
	
				}
		}else if ($row["date"]> $date){
			if ($row['status'] == 1 || $row['status'] == 'Approved'){
				$waiting++;
				}
				else if ($row['status'] == 'Cancelled'){
					$denied++;
	
				}
				else if ($row['status'] == 'Pending'){
					$booked++;
	
				}
			}

}
	
}echo "<h3>" .$completed. "</h3>";
echo "</div>";
echo '<div class="bar-item">';
echo '<p>Waiting</p>';
echo "<h3>".$pending."</h3>";
echo "</div>";
echo '<div class="bar-item">';
echo '<p>Cancled</p>';
echo "<h3>".$cancled."</h3>";
echo "</div>";
echo '<div class="bar-item">';
echo '<p>Waiting</p>';
echo "<h3>".$waiting."</h3>";
echo "</div>";
echo '<div class="bar-item">';
echo '<p>Denied</p>';
echo "<h3>".$denied."</h3>";
echo "</div>";
echo '<div class="bar-item">';
echo '<p>Booked</p>';
echo "<h3>".$booked."</h3>";


?>
				
			
			
				

				
			<!-- </div>
			<div class="bar-item">
				<p>Paid</p>
				<h3>43</h3>
			</div>
			<div class="bar-item">
				<p>Booked</p>
				<h3>64</h3> -->
			</div>
		</div>
	</div>
</body>
</html>


