<?php
// Establish database connection
$host = 'localhost';
$username = 'your_database_username';
$password = 'your_database_password';
$dbname = 'your_database_name';
$conn = new mysqli($host, $username, $password, $dbname);

// Check for connection errors
if ($conn->connect_error) {
  die('Connection failed: ' . $conn->connect_error);
}

// Send query to retrieve data
$sql = 'SELECT name, email FROM your_table_name';
$result = $conn->query($sql);

// Check for query errors
if (!$result) {
  die('Query failed: ' . $conn->error);
}

// Build array of data
$data = array();
while ($row = $result->fetch_assoc()) {
  $data[] = $row;
}

// Close database connection
$conn->close();

// Return data as JSON object
header('Content-Type: application/json');
echo json_encode($data);
?>
