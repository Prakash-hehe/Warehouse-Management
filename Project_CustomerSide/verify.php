
<?php
// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve user input from the form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Establish a database connection
    $host = 'localhost';
    $dbname = 'softwareeng';
    $username_db = 'root';
    $password_db = '';

    try {
        $db = new PDO("mysql:host=$host;dbname=$dbname", $username_db, $password_db);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Prepare the SQL query
        $stmt = $db->prepare("SELECT * FROM login WHERE username = :username");
        $stmt->bindParam(':username', $username);

        // Execute the query
        $stmt->execute();

        // Fetch the user data
        $user = $stmt->fetch();

        // Check if a user was found and the password matches
        if ($user && $password === $user['password']) {
            // Successful login
            $query="update login set session='1' where username='$username'";
            $servername = 'localhost';
            $username = 'root';
            $password = '';
            $dbname = 'softwareeng';
            $conn = mysqli_connect($servername, $username, $password, $dbname);
            $run = mysqli_query($conn, $query) or die(mysqli_error());

            echo '<script>alert("Login successful!"); window.location.href = "profile.php";</script>';
            exit();
        } else {
            // Invalid login credentials, display an error message
            echo '<script>alert("Invalid username or password.!"); window.location.href = "login.php";</script>';
        }
    } catch (PDOException $e) {
        // Display an error message
        echo "Database error: " . $e->getMessage();
    }
}
?>
