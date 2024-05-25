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

    #user_image {
        height: 45px;
        width: 60px;

    }

    #user {
        display: flex;
        align-items: center;

        flex-wrap: wrap;
        /* justify-content: space-evenly; */
        height: 75px;
    }

    table tr td p {
        padding-left: 11px;
        padding-top: inherit;
    }
    </style>
</head>

<body>

    <?php include 'includes/header_nav.php'; ?>

    <div class="container-fluid">
        <div class="row">
            <h2 style="text-align: left; font-size: 40px; ">Current Available Venues</h2>

            <div class="col-md-12" id="box">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" id="head">#</th>
                            <th scope="col" id="head">Room/Lab/Venue</th>
                            <th scope="col" id="head">Capacity</th>
                            <th scope="col" id="head">Free slot</th>
                            <th scope="col" id="head">Date</th>
                            <th scope="col" id="head">Venue Type</th>
                            <th scope="col" id="head">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
    // Database credentials
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "event_management_uiu";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to retrieve data from the abl_venue table
  
    $sql = "SELECT * FROM abl_venue where unique_id = 0 ";
    $result = $conn->query($sql);

    // Check if there are any results
    if ($result->num_rows > 0) {
        // Loop through the results and display each row in the table
        $id = 1;
        while($row = $result->fetch_assoc()) {
            if ($row['unique_id'] == 1) {
                echo "<tr>";
                echo "<th scope='row'>" . $row['id'] . "</th>";
                echo "<td>" . $row['venue'] . "</td>";
                echo "<td>" . $row['capacity'] . "</td>";
                echo "<td>" . $row['free_slot'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['venue_Type'] . "</td>";
                echo "<td>
                    <a href='#' class='btn btn-primary btn-sm'>Edit</a>
                    <a href='#' class='btn btn-danger btn-sm'>Delete</a>
                </td>";
                echo "</tr>";
            } else {
                echo "<tr>";
                echo "<th scope='row'>" . $id . "</th>";
                echo "<td>" . $row['venue'] . "</td>";
                echo "<td>" . $row['capacity'] . "</td>";
                echo "<td>" . $row['free_slot'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['venue_Type'] . "</td>";
                echo "<td>
                    <a href='#' class='btn btn-primary btn-sm'>Edit</a>
                    <a href='#' class='btn btn-danger btn-sm'>Delete</a>
                </td>";
                echo "</tr>";
                $id++;
            }
        }
    } else {
        // Display a message if there are no results
        echo "<tr><td colspan='7'>No venues found.</td></tr>";
    }

    // Close the database connection
    $conn->close();
?>


                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <script src="script.js"></script>
</body>

</html>