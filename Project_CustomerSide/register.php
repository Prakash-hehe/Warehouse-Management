<?php
// Database connection code
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = "softwareeng";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die('Could not Connect MySql Server: ' . mysqli_error($conn));
}

// Form processing code
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['username']) || empty($_POST['FirstName']) || empty($_POST['LastName']) || empty($_POST['Email']) || empty($_POST['Gender']) || empty($_POST['DateOfBirth']) || empty($_POST['Phone']) || empty($_POST['Address']) || empty($_POST['password'])) {
        $response = array('status' => 'error', 'message' => 'All fields are required');
    } else {
        $uname = $_POST['username'];
        $fname = $_POST['FirstName'];
        $lname = $_POST['LastName'];
        $email = $_POST['Email'];
        $contact = $_POST['Phone'];
        $address = $_POST['Address'];
        $gender = $_POST['Gender'];
        $dob = $_POST['DateOfBirth'];
        $password = $_POST['password'];

        // Escape user input to prevent SQL injection
        $uname = mysqli_real_escape_string($conn, $uname);
        $fname = mysqli_real_escape_string($conn, $fname);
        $lname = mysqli_real_escape_string($conn, $lname);
        $email = mysqli_real_escape_string($conn, $email);
        $contact = mysqli_real_escape_string($conn, $contact);
        $address = mysqli_real_escape_string($conn, $address);
        $gender = mysqli_real_escape_string($conn, $gender);
        $dob = mysqli_real_escape_string($conn, $dob);
        $password = mysqli_real_escape_string($conn, $password);

        // Use prepared statements to execute the queries
        $query = "INSERT INTO customer_account (username, FirstName, LastName, Email, Address, Gender, Phone, DateOfBirth) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "ssssssss", $uname, $fname, $lname, $email, $address, $gender, $contact, $dob);
        if (mysqli_stmt_execute($stmt)) {
            $query = "INSERT INTO login (session, username, password) VALUES (1, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "ss", $uname, $password);
            if (mysqli_stmt_execute($stmt)) {
                $response = array('status' => 'success', 'message' => 'Form submitted successfully');
            } else {
                $response = array('status' => 'error', 'message' => 'Error inserting login data: ' . mysqli_error($conn));
            }
        } else {
            $response = array('status' => 'error', 'message' => 'Error inserting customer data: ' . mysqli_error($conn));
        }
        mysqli_stmt_close($stmt);
    }

    // Return the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
}

// Close the database connection
mysqli_close($conn);
?>