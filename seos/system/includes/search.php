<!DOCTYPE html>
<html>
<head>
	<title>Search Users</title>
</head>
<body>
	<h1>Search Users</h1>
	<form method="POST" action="">
		<label for="search">Search:</label>
		<input type="text" name="search" placeholder="Enter name, email or phone number">
		<button type="submit" name="submit">Search</button>
	</form>
	<br>
	<?php
		// Establish database connection
		$servername = "localhost";
		$username = "root";
		$password = "";
		$dbname = "seos_db";

		$conn = mysqli_connect($servername, $username, $password, $dbname);

		// Check connection
		if (!$conn) {
		  die("Connection failed: " . mysqli_connect_error());
		}

		// Process search form data
		if (isset($_POST['submit'])) {
			$search = mysqli_real_escape_string($conn, $_POST['search']);
			$sql = "SELECT * FROM users WHERE name LIKE '%$search%' OR email LIKE '%$search%' OR phone LIKE '%$search%'";
			$result = mysqli_query($conn, $sql);

			if (mysqli_num_rows($result) > 0) {
				echo "<table>";
				echo "<tr><th>ID</th><th>Name</th><th>Email</th><th>Phone</th></tr>";
				while($row = mysqli_fetch_assoc($result)) {
					echo "<tr><td>".$row['id']."</td><td>".$row['name']."</td><td>".$row['email']."</td><td>".$row['phone']."</td></tr>";
				}
				echo "</table>";
			} else {
				echo "No results found.";
			}
		}

		mysqli_close($conn);
	?>
</body>
</html>
