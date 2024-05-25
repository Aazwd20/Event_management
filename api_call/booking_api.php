<?php
$connection = mysqli_connect("localhost","root","","event_management_uiu");
if($connection){
   $sql = "SELECT * FROM bookings";
   $result = mysqli_query($connection,$sql);
   if($result){
       header('Content-type: application/json');
       $response = array();
       while($row = mysqli_fetch_assoc($result)){
           $response[] = array(
               'id' => $row['id'],
               'full_name' => $row['full_name'],
               'org_name' => $row['org_name'],
               'contact_num' => $row['contact_num'],
               'email' => $row['email'],
               'event_type' => $row['event_type'],
               'participants' => $row['participants'],
               'date' => $row['date'],
               'venue_type' => $row['venue_type'],
               'time' => $row['time'],
               'additional_details' => $row['additional_details'],
               'image' => $row['image'],
               'booking_id' => $row['booking_id']
           );
       }
       echo json_encode($response, JSON_PRETTY_PRINT);
   }
}
else{
    echo "connection error";
}
?>
