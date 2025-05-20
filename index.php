<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Patient List</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3">🧍➕ Patient List</h1>
      <a href="create.php" class="btn btn-primary">+ Add New Patient</a>
    </div>

    <table class="table table-hover table-bordered bg-white shadow-sm">
      <thead class="table-light">
        <tr>
          <th>Patient ID</th>
          <th>Full Name</th>
          <th>Contact Number</th>
          <th>Medical History</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
          <tr>
            <td><?php echo $patient['patientId']; ?></td>
            <td><?php echo $patient['patientName']; ?></td>
            <td><?php echo $patient['contactNumber']; ?></td>
            <td><?php echo $patient['medicalHistory']; ?></td>
            <td>
              <a href="./view.php?id=<?php echo $patient['patientId']; ?>" class="btn btn-sm btn-info">View</a>
              <a href="./edit.php?id=<?php echo $patient['patientId']; ?>" class="btn btn-sm btn-warning">Edit</a>
              <a href="./delete.php?id=<?php echo $patient['patientId']; ?>" class="btn btn-sm btn-danger">Delete</a>
            </td>
          </tr>
      </tbody>
    </table>
  </div>
</body>
</html>
