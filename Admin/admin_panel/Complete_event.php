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
        $sql = "SELECT * FROM bookings WHERE date> 'GETDATE() AS Date'";
        $result = mysqli_query($conn, $sql);

        ?>
  
	<?php include 'includes/header_nav.php'; ?>

<div class="container-fluid">
            <div class="row">
            <h2 style="text-align: left; font-size: 40px; ">Completed Events</h2>

              <div class="col-md-12" id="box">
                <table class="table" >
                  <thead>
                    <tr>
                      <th scope="col" id="head">#</th>
                      <th scope="col"id="head">Event Name</th>
                      <th scope="col"id="head">Date</th>
                      <th scope="col"id="head">Time</th>
                      <th scope="col"id="head">Location</th>
                      <th scope="col"id="head">Number of participants</th>
                      <th scope="col"id="head">Event type</th>
                      <th scope="col"id="head">Actions</th>
                    </tr>
                  </thead>
                  <?php 
    // Loop through each row of data and create a new row in the table
    if (mysqli_num_rows($result) > 0) {
        $id = 1;
        while($row = mysqli_fetch_assoc($result)) {
          // $eventdate = $row["date"] ;
          // // echo "$eventdate";
          // // if ($eventdate< SELECT CAST(  )){

          
            
            if ($row['status'] == 1 || $row['status'] == 'Approved'){
                
              echo "<tr>";
              echo "<th scope='row'>" . $id .  "</th>";
              echo "<td>" . $row["full_name"] . "</td>";
              // echo "<td>" . $row["org_name"] . "</td>";
              
              echo "<td>" . $row["date"] . "</td>";
              echo "<td>" . $row["time"] . "</td>";
              echo "<td>" . $row["venue_type"] . "</td>";
              
              echo "<td>" . $row["participants"] . "</td>";
              echo "<td>" . $row["event_type"] . "</td>";
              
              
              // echo "<td>" . $row["email"] . "</td>";
              $id++;

              echo "<td>";
            echo "<a href='#' class='btn btn-primary btn-sm edit-btn' data-id='" . $row["id"] . "'>Edit</a>";
            echo "<a href='#' class='btn btn-danger btn-sm'>Delete</a>";
            echo "</td>";
            echo "</tr>";

            }
            
           
            
             
        }
    } else {
        echo "<tr><td colspan='9'>No data found</td></tr>";
    }
  // }
?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <script src="script.js"></script>
</body>
</html>