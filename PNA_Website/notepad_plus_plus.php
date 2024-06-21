<?php
$servername = "localhost"; // Use "localhost" for local development
$username = "root"; // Default username for XAMPP is "root"
$password = "Zentorno!@#"; // Your MySQL root password
$dbname = "notepad_plus_plus";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind
$stmt = $conn->prepare("INSERT INTO orders (fullname, email, address, city, state, zip, country, payment_method, cardname, cardnumber, expdate, cvv) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssssssssss", $fullname, $email, $address, $city, $state, $zip, $country, $payment_method, $cardname, $cardnumber, $expdate, $cvv);

// Set parameters and execute
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$address = $_POST['address'];
$city = $_POST['city'];
$state = $_POST['state'];
$zip = $_POST['zip'];
$country = $_POST['country'];
$payment_method = $_POST['payment'];
$cardname = $_POST['cardname'];
$cardnumber = $_POST['cardnumber'];
$expdate = $_POST['expdate'];
$cvv = $_POST['cvv'];

if ($stmt->execute()) {
    echo "New record created successfully";
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
