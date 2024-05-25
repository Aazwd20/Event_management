<!DOCTYPE html>
<html>
<head>

	<title>Settings Options</title>
	<style type="text/css">
		.container {
			width: 80%;
			margin: 0 auto;
			padding-top: 30px;
		}
		h2 {
			text-align: center;
			margin-bottom: 30px;
		}
		form {
			display: flex;
			flex-direction: column;
			align-items: center;
			margin-bottom: 30px;
		}
		label {
			font-size: 16px;
			font-family: Arial, sans-serif;
			margin-bottom: 10px;
		}
		input[type="text"],
		input[type="email"],
		input[type="password"] {
			padding: 10px;
			margin-bottom: 20px;
			border-radius: 5px;
			border: 1px solid #ccc;
			font-size: 16px;
			font-family: Arial, sans-serif;
			box-sizing: border-box;
			width: 100%;
		}
		input[type="submit"] {
			background-color: #007bff;
			color: #fff;
			padding: 10px 20px;
			border-radius: 5px;
			border: none;
			font-size: 16px;
			font-family: Arial, sans-serif;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<div class="container">
		<h2>Settings Options</h2>

		<!-- Settings Form -->
		<form action="#" method="POST">
			<label for="username-input">Username:</label>
			<input type="text" id="username-input" name="username" value="admin" required>
			<label for="email-input">Email:</label>
			<input type="email" id="email-input" name="email" value="admin@example.com" required>
			<label for="password-input">Password:</label>
			<input type="password" id="password-input" name="password" required>
			<label for="confirm-password-input">Confirm Password:</label>
			<input type="password" id="confirm-password-input" name="confirm-password" required>
			<input type="submit" value="Save Settings">
		</form>
	</div>
</body>
</html>