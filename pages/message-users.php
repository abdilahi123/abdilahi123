<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link href="assets/style.css" rel="stylesheet">

    <title>Send Message Form</title>
</head>
<body>
    <h1>Send a Message</h1>
    <form action="send_message.php" method="post">
        <label for="user_id">User ID:</label>
        <input type="text" id="user_id" name="user_id" required><br><br>

        <label for="message_id">Message ID:</label>
        <input type="text" id="message_id" name="message_id" required><br><br>

        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Send Message">
    </form>
</body>
</html>
<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zantech";

// Create connection to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Receive data from the form
$user_id = $_POST['user_id'];
$message_id = $_POST['message_id'];
$name = $_POST['name'];
$message = $_POST['message'];

// Prepare the SQL query
$sql = "INSERT INTO message_user (user_id, message_id, name, message) VALUES ('$user_id', '$message_id', '$name', '$message')";

// Insert the data into the database
if ($conn->query($sql) === TRUE) {
    echo "Message sent successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the connection
$conn->close();
?>
