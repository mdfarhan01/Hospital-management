<?php
// error_reporting(E_ALL);
// ini_set('display_errors', 1);

include_once './get_data_from_db.php';

// if (!isset($get_data) || !is_array($get_data)) {
//     $get_data = [];
// }
?>
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
        <?php if (!empty($get_data)) : ?>
          <?php foreach ($get_data as $patient) : ?>
            <tr>
              <td><?= htmlspecialchars($patient['Patient ID'] ?? '') ?></td>
              <td><?= htmlspecialchars($patient['Patient Name'] ?? '') ?></td>
              <td><?= htmlspecialchars($patient['Contact Number'] ?? '') ?></td>
              <td><?= htmlspecialchars($patient['Medical History'] ?? '') ?></td>
              <td>
                <a href="./view.php?id=<?= urlencode($patient['Patient ID']) ?>" class="btn btn-sm btn-info">View</a>
                <a href="./edit.php?id=<?= urlencode($patient['Patient ID']) ?>" class="btn btn-sm btn-warning">Edit</a>
                <a href="./delete.php?id=<?= urlencode($patient['Patient ID']) ?>" class="btn btn-sm btn-danger">Delete</a>
              </td>
            </tr>
          <?php endforeach; ?>
        <?php else : ?>
          <tr><td colspan="5" class="text-center">No patients found in the database.</td></tr>
        <?php endif; ?>
      </tbody>
    </table>
  </div>
</body>
</html>
