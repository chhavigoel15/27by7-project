<?php
$host = "localhost";  // Change if needed
$user = "root";       // MySQL username
$pass = "";           // MySQL password
$db   = "software_form"; // Database name

$conn = new mysqli($host, $user, $pass, $db);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// File upload handling
$fileName = "";
if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
    $targetDir = "uploads/";
    if (!is_dir($targetDir)) {
        mkdir($targetDir, 0777, true);
    }
    $fileName = time() . "_" . basename($_FILES["file"]["name"]);
    $targetFilePath = $targetDir . $fileName;
    move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath);
}

// Get form data
$fullName = $_POST['fullName'];
$email = $_POST['email'];
$company = $_POST['company'];
$phone = $_POST['phone'];
$solutionType = $_POST['solutionType'];
$requirements = $_POST['requirements'];
$budget = $_POST['budget'];
$timeline = $_POST['timeline'];

// Insert into database
$sql = "INSERT INTO submissions 
(fullName, email, company, phone, solutionType, requirements, budget, timeline, fileName) 
VALUES ('$fullName', '$email', '$company', '$phone', '$solutionType', '$requirements', '$budget', '$timeline', '$fileName')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["message" => "Form submitted successfully"]);
} else {
    echo json_encode(["error" => "Error: " . $conn->error]);
}

$conn->close();
?>
