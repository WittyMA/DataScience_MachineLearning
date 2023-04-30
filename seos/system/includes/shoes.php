<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Search Results</title>
</head>
<body>


    <?php
session_start();

include_once '../database/database_connection.php';
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
        if (isset($_GET['search'])) {
            $search = mysqli_real_escape_string($conn, $_GET['search']);
            $sql = "SELECT * FROM shoes WHERE name LIKE '%$search%'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Search Results:</h2>";
                echo "<ul>";
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<li>";
                    echo "<img src='images/".$row['image']."'>";
                    echo $row['name']."</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>No results found.</p>";
            }
        }

        mysqli_close($conn);
    ?>
</body>
</html>
