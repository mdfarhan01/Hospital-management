
<?php 

include_once 'db_connect.php';

if (!isset($_GET['id'])) {
    die("Patient ID not provided.");
}

$patientId = $_GET['id'];

// Fetch patient data for display
$stmt = $conn->prepare("SELECT * FROM `patient_management_table` WHERE `Patient ID` = ?");
$stmt->bind_param("s", $patientId);
$stmt->execute();
$result = $stmt->get_result();
$patient = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Perform delete (soft delete: set a deleted flag, or hard delete)
    $deleteStmt = $conn->prepare("DELETE FROM `patient_management_table` WHERE `Patient ID` = ?");
    $deleteStmt->bind_param("s", $patientId);
    if ($deleteStmt->execute()) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error deleting patient: " . $conn->error;
        die();
    }
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete Patient</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <h3 class="card-title">Delete Patient</h3>
        <p><strong>Patient Name: <?= htmlspecialchars($patient['Patient Name'] ?? '') ?></strong></p>
        <form method="post">
          <button type="submit" class="btn btn-danger">Yes, Delete</button>
          <a href="index.php" class="btn btn-outline-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
</body>
</html>