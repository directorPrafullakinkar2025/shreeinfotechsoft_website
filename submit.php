<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Database connection details
$servername = "localhost";
$username = "shreeinfotechsof";       // or your cPanel DB username
$password = ",oSjcFMm,Rg;";           // or your DB password
$database = "shreeinfotechsof_company_info";
//local connection
// $servername = "localhost";
// $username = "root";       // or your cPanel DB username
// $password = "";           // or your DB password
// $database = "shreeinfotechsof_company_info";
// $port = 3306;

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Collect form data
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$mobile_no = $_POST['mobile_no'];
$course = $_POST['course'];
$training_mode = $_POST['training_mode'];
$message = $_POST['message'];

// Prepare SQL query
$sql = "INSERT INTO company_info (first_name, last_name, email, mobile_no, course, training_mode, message)
        VALUES ('$first_name','$last_name',  '$email', '$mobile_no', '$course', '$training_mode', '$message')";

// Execute and check
if ($conn->query($sql) === TRUE) {
    header("Location: /index.php");
exit();
} else {
    echo "❌ Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
