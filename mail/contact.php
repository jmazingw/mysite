<?php
if(empty($_POST['name']) || empty($_POST['subject']) || empty($_POST['message']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
  http_response_code(500);
  echo json_encode(['message' => 'Sorry, there was a problem with your submission. Please complete the form and try again.']);
  exit();
}

$name = strip_tags(htmlspecialchars($_POST['name']));
$email = strip_tags(htmlspecialchars($_POST['email']));
$subject = strip_tags(htmlspecialchars($_POST['subject']));
$message = strip_tags(htmlspecialchars($_POST['message']));

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "forms";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  http_response_code(500);
  echo json_encode(['message' => 'Sorry, there was a problem with connecting to the database. Please try again later.']);
  exit();
}

$sql = "INSERT INTO formanswers (ANSname, ANSsubject, email, ANSmessage)
VALUES ('$name', '$subject', '$email', '$message')";

if ($conn->query($sql) === TRUE) {
  echo json_encode(['message' => 'Your message has been sent successfully']);
} else {
  http_response_code(500);
  echo json_encode(['message' => 'Sorry, there was a problem with inserting your data into the database. Please try again later.']);
}

$conn->close();
?>

