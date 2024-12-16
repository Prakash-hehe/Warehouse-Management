<?php
    $servername = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'softwareeng';
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die('Could not connect to MySQL server: ' . mysqli_connect_error());
    }
    if (isset($_POST['submit'])) {
        $query = "SELECT username FROM login WHERE session='1'";
        $res = mysqli_query($conn, $query);
        $uname = mysqli_fetch_assoc($res);
        $username = $uname['username'];
        $updateQuery = "UPDATE customer_account SET ";

        // Check each field if it is provided and add it to the update query
        if (!empty($_POST['FirstName'])) {
            $fname = $_POST['FirstName'];
            $updateQuery ="update customer_account set FirstName='$fname' where username='$username'";
            $run = mysqli_query($conn, $updateQuery) or die(mysqli_error());
        }
        if (!empty($_POST['LastName'])) {
            $lname = $_POST['LastName'];
            $updateQuery ="update customer_account set LastName='$lname' where username='$username'";
            $run = mysqli_query($conn, $updateQuery) or die(mysqli_error());
        }
        if (!empty($_POST['Email'])) {
            $email = $_POST['Email'];
            $updateQuery ="update customer_account set Email='$email' where username='$username'";
            $run = mysqli_query($conn, $updateQuery) or die(mysqli_error());
        }
        if (!empty($_POST['Phone'])) {
            $Phone = $_POST['Phone'];
            $updateQuery ="update customer_account set Phone='$Phone' where username='$username'";
            $run = mysqli_query($conn, $updateQuery) or die(mysqli_error());
        }
        if (!empty($_POST['Address'])) {
            $address = $_POST['Address'];
            $updateQuery ="update customer_account set Address='$address' where username='$username'";
            $run = mysqli_query($conn, $updateQuery) or die(mysqli_error());
        }
        if (!empty($_POST['Gender'])) {
            $gender = $_POST['Gender'];
            $updateQuery ="update customer_account set Gender='$gender' where username='$username'";
            $run = mysqli_query($conn, $updateQuery) or die(mysqli_error());
        }
        if (!empty($_POST['DateOfBirth'])) {
            $DOB = $_POST['DateOfBirth'];
            $updateQuery ="update customer_account set DateOfBirth='$DOB' where username='$username'";
            $run = mysqli_query($conn, $updateQuery) or die(mysqli_error());
        }

        // Remove the trailing comma and space from the update query
        // $updateQuery = rtrim($updateQuery, ', ');

        // Add the WHERE clause based on the provided username
        // $updateQuery .= " WHERE username='" . $username . "'";
        // $run = mysqli_query($conn, $updateQuery) or die(mysqli_error());
        // if ($run) {
        echo '<script>alert("Form submitted successfully");window.location.href="settings.php";</script>';
        // } else {
        //     echo '<script>alert("Form submission failed");window.location.href="settings.php";</script>';
        // }
    }
?>
