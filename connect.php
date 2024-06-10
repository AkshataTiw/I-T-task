<?php
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$gender = $_POST['gender'];
$address = $_POST['address'];
$phone = $_POST['phone'];
$dob = $_POST['dob'];
$volunteer_work = $_POST['volunteer_work'];
$event = $_POST['event'];
$comments = $_POST['comments'];
$updates = isset($_POST['updates']) ? 1 : 0; // Handle checkbox value correctly

// Create a connection
$conn = new mysqli('localhost', 'root', 'Akshata12', 'event_management1');

// Check connection
if ($conn->connect_error) {
    die('Connection Failed: ' . $conn->connect_error);
} else {
    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO event_registrations1 (first_name, last_name, email, gender, address, phone, dob, volunteer_work, event, comments, updates) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssssssi", $first_name, $last_name, $email, $gender, $address, $phone, $dob, $volunteer_work, $event, $comments, $updates);

    // Execute the statement
    $stmt->execute();
    echo "Registered successfully";

    // Close the statement and connection
    $stmt->close();
    $conn->close();
}
?>
