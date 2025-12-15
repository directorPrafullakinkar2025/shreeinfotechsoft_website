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


// -------------------- WhatsApp API Integration --------------------

// Your long-lived access token
$access_token = "EAALZCuBEMbskBQP6SbXU0begpbtAca9pJ5srALlI75txweoC0jJNVQC0Ucf31atFZAIncMTYmMvZBV6meTmFvNdbElqShlWfLjuewMnYaZBWzlpbqdXMDsqzqbIZABUbVzxbzbLJ3cKAjdHU8Dv7DgIxNneHCcdgC3ZB84OxnSnLg90QsIsFZAuYPObCeHt";
// $access_token = "EAALZCuBEMbskBQF9Eo7by1lCmW274oWNyk04WyckXWM5GqhqsyRZAgOBpydMGxCvMZCk2ZCCoktNM0vdOMDPHZBiA08ofjuZCz7iB1WROdRhDml7FF9WuMXEnC51pbYDxtl78UzJ26t5HmCSAg6xZBQGoogF7RgnHZAD7eezCCNXuzWtcodYgekIZC0xguPElKJShYpGTI1AdeMCICZBa8IKtHMyGGfXLVu2wWHzQ5wtIXKLTu9w6RUsXy38lEyhWlenRanKw1Wv9DnFLIef8RlcB4ywZDZD";
// Your WhatsApp Business Phone Number ID (from Meta)
$phone_number_id = "852243447980719";

// Prepare message
$wa_message = [
    "messaging_product" => "whatsapp",
    "to" => $mobile_no,
    "type" => "template",
    "template" => [
        "name" => "inst_form", // Your template name
        "language" => ["code" => "en_US"],
        "components" => [
            [
                "type" => "header",
                "parameters" => [
                    [
                        "type" => "image",
                        "image" => [
                            "link" => "https://images.unsplash.com/photo-1517430816045-df4b7de11d1d?w=800"
                        ]
                    ]
                ]
            ],
            [
                "type" => "body",
                "parameters" => [
                    ["type" => "text", "text" => $first_name],
                    ["type" => "text", "text" => $course]
                ]
            ]
        ]
    ]
];


// Initialize cURL
$ch = curl_init("https://graph.facebook.com/v22.0/$phone_number_id/messages");
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $access_token",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($wa_message));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($ch);
curl_close($ch);
echo "<pre>";
print_r($response);
echo "</pre>";

// Execute and check
if ($conn->query($sql) === TRUE) {
    // header("Location: /index.php");
// exit();
} else {
    echo "❌ Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
