<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "softwareeng";
    $conn=mysqli_connect($servername,$username,$password,$dbname);
      if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
    if(isset($_POST['submit'])){
        if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['contact']) && !empty($_POST['address'])){
            $name=$_POST['name'];
            $email=$_POST['email'];
            $contact=$_POST['contact'];
            $address=$_POST['address'];

            $query="insert into settings(name,email,contact,address) values('$name','$email','$contact','$address')";
            $run=mysqli_query($conn,$query) or die(mysqli_error());
            if($run){
                echo '<script>alert("Form Submitted Successfully");window.location.href="settings.php";</script>';
            }
            else{
                echo '<script>alert("Form Submision Failed");window.location.href="settings.php";</script>';
            }
        }
        else{
            echo '<script>alert("All fields required");window.location.href="settings.php";</script>';
        }
    }
?>