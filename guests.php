<?php
// Replace the database credentials with your own
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'forms';

// Create connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to fetch all data from the database
$sql = "SELECT * FROM formanswers";
$result = $conn->query($sql);

// Check if there are any rows in the result set
if ($result->num_rows > 0) {
    // Output data of each row in an HTML table
    echo "<table><tr><th>ID</th><th>Name</th><th>Email</th><th>Subject</th><th>Message</th></tr>";
    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["ANSname"] . "</td><td>" . $row["email"] . "</td><td>" . $row["ANSsubject"] . "</td><td>" . $row["ANSmessage"] . "</td><tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

// Close connection
$conn->close();
?>
