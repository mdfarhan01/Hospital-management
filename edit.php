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
  <title>Edit Patient</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Edit Patient</h2>
    <form action="updated.php" method="POST" class="bg-white p-4 rounded shadow-sm">
      <input type="hidden" name="patientId" value="<?= htmlspecialchars($patient['Patient ID']) ?>">

      <div class="mb-3">
        <label for="patientName">Full Name</label>
        <input type="text" id="patientName" name="patientName" class="form-control" value="<?= htmlspecialchars($patient['Patient Name']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="dob">Date of Birth</label>
        <input type="date" id="dob" name="dob" class="form-control" value="<?= htmlspecialchars($patient['Date of Birth']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="gender">Gender</label>
        <select id="gender" name="gender" class="form-control" required>
          <option value="" disabled>Select gender</option>
          <option value="Male" <?= $patient['Gender'] === 'Male' ? 'selected' : '' ?>>Male</option>
          <option value="Female" <?= $patient['Gender'] === 'Female' ? 'selected' : '' ?>>Female</option>
          <option value="Other" <?= $patient['Gender'] === 'Other' ? 'selected' : '' ?>>Other</option>
        </select>
      </div>

      <div class="mb-3">
        <label for="contactNumber">Contact Number</label>
        <input type="tel" id="contactNumber" name="contactNumber" class="form-control" value="<?= htmlspecialchars($patient['Contact Number']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="email">Email Address</label>
        <input type="email" id="email" name="email" class="form-control" value="<?= htmlspecialchars($patient['Email']) ?>">
      </div>

      <div class="mb-3">
        <label for="address">Address</label>
        <textarea id="address" name="address" class="form-control" rows="3"><?= htmlspecialchars($patient['Address']) ?></textarea>
      </div>

      <div class="mb-3">
        <label for="medicalHistory">Medical History</label>
        <textarea id="medicalHistory" name="medicalHistory" class="form-control" rows="4"><?= htmlspecialchars($patient['Medical History']) ?></textarea>
      </div>

      <div class="mt-4">
        <button type="submit" class="btn btn-success">Update Patient</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
</body>
</html>
