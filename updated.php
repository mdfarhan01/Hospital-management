<?php
// Connect to the database
include_once 'db_connect.php';

// Check if form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve and sanitize POST data
    $patientId = trim($_POST['patientId']);
    $patientName = trim($_POST['patientName']);
    $dob = $_POST['dob'];
    $gender = $_POST['gender'];
    $contactNumber = trim($_POST['contactNumber']);
    $email = trim($_POST['email']);
    $address = trim($_POST['address']);
    $medicalHistory = trim($_POST['medicalHistory']);

    // Prepare SQL query to update the record
    $sql = "UPDATE `patient_management_table` 
            SET 
                `Patient Name` = ?, 
                `Date of Birth` = ?, 
                `Gender` = ?, 
                `Contact Number` = ?, 
                `Email` = ?, 
                `Address` = ?, 
                `Medical History` = ?
            WHERE `Patient ID` = ?";

    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssss", $patientName, $dob, $gender, $contactNumber, $email, $address, $medicalHistory, $patientId);

    // Execute and check
    if ($stmt->execute()) {
        // Success - redirect back to main list or success page
        header("Location: index.php?status=updated");
        exit();
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
} else {
    // If the request was not POST, deny access
    echo "Invalid request.";
}
?>
