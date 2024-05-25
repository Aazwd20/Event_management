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
    #user_image{
        height: 45px;
    width: 60px;

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
            <h2 style="text-align: left; font-size: 40px; ">Current Venues</h2>

              <div class="col-md-12" id="box">
                <table class="table" >
                <thead>
                    <tr>
                      <th scope="col" id="head">#</th>
                      <th scope="col" id="head">Venue</th>
                      <th scope="col" id="head">Capacity</th>
                      <th scope="col" id="head">Bookings</th>
                      <th scope="col" id="head">Hall Type</th>
                      <th scope="col" id="head">Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td id="user"><img src="img/user_1.jpg" alt=""id="user_image"><p>Room 123</p> </td>
                      <td>60-100</td>
                      <td>May 26, 2023 <br> 12:00 PM - 11:00 PM</td>
                      <td>Hall</td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">2</th>
                      <td id="user"><img src="img/user_2.jpg" alt=""id="user_image"><p>Room 401</p> </td>
                      <td>10-45</td>
                      <td>May 26, 2023 <br> 12:00 PM - 11:00 PM</td>
                      <td>Class</td>
                      <td>
                        <a href="#" class="btn btn-primary btn-sm">Edit</a>
                        <a href="#" class="btn btn-danger btn-sm">Delete</a>
                      </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td id="user"><img src="img/user_3.jpg" alt=""id="user_image"><p>Auditorium</p> </td>
                      <td>100-400</td>
                      <td>May 26, 2023 <br> 12:00 PM - 11:00 PM</td>
                      <td>Multipurpose</td>
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