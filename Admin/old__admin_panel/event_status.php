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
  
	<?php include 'includes/header_nav.php'; ?>

<div class="container-fluid">
            <div class="row">
            <h2 style="text-align: left; font-size: 40px; ">Current Events</h2>

              <div class="col-md-12" id="box">
                <table class="table" >
                <thead>
                    <tr>
                      <th scope="col" id="head">#</th>
                      <th scope="col" id="head">Event Name</th>
                      <th scope="col" id="head">Date</th>
                      <th scope="col" id="head">Time</th>
                      <th scope="col" id="head">Location</th>
                      <th scope="col" id="head">Tickets Booked</th>
                      <th scope="col" id="head">Status</th>
                      <th scope="col" id="head">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Music Festival</td>
                      <td>October 15, 2023</td>
                      <td>12:00 PM - 11:00 PM</td>
                      <td>Central Park</td>
                      <td>10,000</td>
                      <td><a href="#" class="btn btn-danger btn-sm">Booked</a></td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td>Sports Tournament</td>
                      <td>June 30, 2023</td>
                      <td>8:00 AM - 5:00 PM</td>
                      <td>City Stadium</td>
                      <td>5,000</td>
                      <td><a href="#" class="btn btn-secondary btn-sm">Waiting</a></td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Tech Conference</td>
                      <td>May 15-16, 2023</td>
                      <td>9:00 AM - 6:00 PM</td>
                      <td>Convention Center</td>
                      <td>2,500</td>
                      <td><a href="#" class="btn btn-primary btn-sm">Paid</a></td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <script src="script.js"></script>
</body>
</html>