<?php
require_once 'db_connection.php';
include('partials/header.php');

// Fetch feedback data from the database
$sql = "SELECT f.feedback_id, f.rating, f.feedback_text, f.created_at, u.username 
        FROM feedback f 
        JOIN users u ON f.user_id = u.user_id 
        ORDER BY f.created_at DESC";
$result = $conn->query($sql);

if (!$result) {
    die("Query failed: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Feedback</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <style>
      body {
            background-color: #f8f9fa; /* Light background color */
        }
        .container {
            max-width: 1200px; /* Set max width for container */
            margin-top: 50px;
            padding: 20px; /* Add padding */
            background: #fff; /* White background for the table area */
            border-radius: 8px; /* Rounded corners */
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            margin-left: 300px;
        }
        h2 {
            margin-bottom: 20px; /* Space below the heading */
            color: #333; /* Dark color for the heading */
        }
        .feedback-table {
            width: 100%; /* Full width */
            margin: 20px 0; /* Space around the table */
        }
        .table {
            border-collapse: collapse; /* Collapse borders */
            width: 100%; /* Full width */
            margin: 0; /* Remove default margin */
        
        }
        .table th, .table td {
            border: 1px solid #dee2e6; /* Light gray border */
            padding: 15px; /* More padding for cells */
            text-align: center; /* Center align text */
        }
        .table th {
            background-color: #343a40;
            color: white; /* White text for the header */
        }
        .table td {
            background-color: #f9f9f9; /* Light gray background for table cells */
        }
        .table tr:hover td {
            background-color: #e9ecef; /* Slightly darker background on hover */
        }
    </style>
</head>
<body>
    <div class="container">
        <h2 class="mt-4">User Feedback</h2>
        <div class="feedback-table">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Feedback ID</th>
                        <th>User</th>
                        <th>Rating</th>
                        <th>Feedback Text</th>
                        <th>Created At</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if ($result->num_rows > 0): ?>
                        <?php while ($row = $result->fetch_assoc()): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($row['feedback_id']); ?></td>
                                <td><?php echo htmlspecialchars($row['username']); ?></td>
                                <td><?php echo htmlspecialchars($row['rating']); ?></td>
                                <td><?php echo htmlspecialchars($row['feedback_text']); ?></td>
                                <td><?php echo htmlspecialchars($row['created_at']); ?></td>
                            </tr>
                        <?php endwhile; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5">No feedback available.</td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="assets/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
$conn->close();
?>
