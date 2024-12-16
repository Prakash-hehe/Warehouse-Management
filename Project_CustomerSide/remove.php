<?php

$servername='localhost';
$username='root';
$password='';
$dbname = "softwareeng";
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
    die('Could not Connect MySql Server:' .mysql_error());
}
// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Retrieve the data sent from the JavaScript code
  $productName = $_POST['productName'];
  $productPrice=$_POST['productPrice'];

  $query="select quantity from cart where productName='$productName'";
  $res=mysqli_query($conn,$query);
  $quantity=mysqli_fetch_assoc($res);
  $val= $quantity['quantity']-1;
  $total_price=$val*$productPrice;

  $query = "UPDATE cart SET quantity='$val',total_price='$total_price' WHERE productName='" . $productName. "'";

  
  $run=mysqli_query($conn,$query) or die(mysqli_error());
  // Do something with the data (e.g., store it in a database)

  // Send a response back to the JavaScript code
  echo 'Data received successfully!';
} else {
  // Return an error response if the request method is not POST
  header('HTTP/1.1 400 Bad Request');
  echo 'Invalid request method.';
}
?>
