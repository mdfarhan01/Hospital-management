<?php
include_once 'db_connect.php';

if (!isset($_GET['id'])) {
    die("Patient ID not provided.");
}

$patientId = $_GET['id'];

$sql = "SELECT * FROM `patient_management_table` WHERE `Patient ID` = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $patientId);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    die("Patient not found.");
}

$patient = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>View Patient</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card p-4 shadow-sm">
      <div class="row">
        <div class="col-md-4">
          <img src="https://via.placeholder.com/250x350" class="img-fluid rounded" alt="Patient Image">
        </div>
        <div class="col-md-8">
          <h3><?= htmlspecialchars($patient['Patient Name']) ?></h3>
          <p><strong>Patient ID:</strong> <?= htmlspecialchars($patient['Patient ID']) ?></p>
          <p><strong>Date of Birth:</strong> <?= htmlspecialchars($patient['Date of Birth']) ?></p>
          <p><strong>Gender:</strong> <?= htmlspecialchars($patient['Gender']) ?></p>
          <p><strong>Contact Number:</strong> <?= htmlspecialchars($patient['Contact Number']) ?></p>
          <p><strong>Email:</strong> <?= htmlspecialchars($patient['Email']) ?></p>
          <p><strong>Address:</strong> <?= htmlspecialchars($patient['Address']) ?></p>
          <p><strong>Medical History:</strong> <?= nl2br(htmlspecialchars($patient['Medical History'])) ?></p>
          <a href="./index.php" class="btn btn-secondary mt-3">← Back to List</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>
