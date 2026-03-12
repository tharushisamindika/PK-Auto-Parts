
<?php
$servername = 'localhost';
$dbname = 'pkholdin_production_db';
$username = 'pkholdin_dev';
$password = 'K@veesha2005#';

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
