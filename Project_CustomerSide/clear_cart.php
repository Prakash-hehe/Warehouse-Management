<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'softwareeng';
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check if the connection is successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Update the rows where quantity > 0 to quantity = 0
$query = "UPDATE cart SET quantity = 0 WHERE quantity > 0";
$result = mysqli_query($conn, $query);

// Check if the update query was successful
if ($result) {
    echo "Rows updated successfully.";
} else {
    echo "Error updating rows: " . mysqli_error($conn);
}

// Close the database connection
mysqli_close($conn);
?>
