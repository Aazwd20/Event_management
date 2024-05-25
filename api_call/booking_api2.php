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
              
    
               'org_name' => $row['org_name'],
              
             
               'event_type' => $row['event_type'],
    
               'date' => $row['date'],
               'venue_type' => $row['venue_type'],
               'time' => $row['time'],
            
           );
       }
       echo json_encode($response, JSON_PRETTY_PRINT);
   }
}
else{
    echo "connection error";
}
?>
