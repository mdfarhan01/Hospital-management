<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include_once 'db_connect.php';

function clean_input($data) {
    return htmlspecialchars(stripslashes(trim($data)));
}

$required_fields = ['patientId', 'patientName', 'dob', 'gender', 'contactNumber', 'email', 'address', 'medicalHistory'];
$errors = [];

foreach ($required_fields as $field) {
    if (empty($_POST[$field])) {
        $errors[] = ucfirst($field) . " is required.";
    }
}

if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Invalid email format.";
}

if (!empty($errors)) {
    foreach ($errors as $error) {
        echo "<div class='alert alert-danger'>$error</div>";
    }
    exit;
}

// Clean inputs
$patientId = clean_input($_POST['patientId']);
$patientName = clean_input($_POST['patientName']);
$dob = clean_input($_POST['dob']);
$gender = clean_input($_POST['gender']);
$contactNumber = clean_input($_POST['contactNumber']);
$email = clean_input($_POST['email']);
$address = clean_input($_POST['address']);
$medicalHistory = clean_input($_POST['medicalHistory']);

// Insert into database
$sql = "INSERT INTO `patient_management_table` 
        (`Patient ID`, `Patient Name`, `Date of Birth`, `Gender`, `Contact Number`, `Email`, `Address`, `Medical History`) 
        VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

$stmt = $conn->prepare($sql);
$stmt->bind_param("ssssssss", $patientId, $patientName, $dob, $gender, $contactNumber, $email, $address, $medicalHistory);

if ($stmt->execute()) {
    header("Location: index.php");
    exit;
} else {
    echo "<div class='alert alert-danger'>Database error: " . $conn->error . "</div>";
}
?>
