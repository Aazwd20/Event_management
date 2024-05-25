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
			width: calc(25% - 20px);
			background-color: #007bff;
			color: #fff;
			padding: 20px;
			border-radius: 5px;
			font-size: 18px;
			font-family: Arial, sans-serif;
			text-align: center;
		}
	</style>
</head>
<body>
<div class="container">
		<h2 style="text-align: left; font-size: 40px; color: var(--dark);">Dashboard</h2>

		<!-- Bar -->
		<div class="bar">
			<div class="bar-item">
				<p>Complete Events</p>
				<h3>60</h3>
			</div>
			<div class="bar-item">
				<p>Waiting</p>
				<h3>16</h3>
			</div>
			<div class="bar-item">
				<p>Paid</p>
				<h3>43</h3>
			</div>
			<div class="bar-item">
				<p>Booked</p>
				<h3>64</h3>
			</div>
		</div>
	</div>
</body>
</html>


