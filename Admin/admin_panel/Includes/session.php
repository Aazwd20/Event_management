<?php
	include 'includes/conn.php';
	session_start();

 
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM bookings WHERE id=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
 
?>