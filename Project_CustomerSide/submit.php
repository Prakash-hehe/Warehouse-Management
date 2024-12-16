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
  $productId = $_POST['productId'];
  

  $query="select quantity,price from cart where productId='$productId'";
  $res=mysqli_query($conn,$query);
  $prores=mysqli_fetch_assoc($res);
  $quantity = $_POST['quantity']+$prores['quantity'];
  $totalprice=$quantity*$prores['price'];
  $query="update cart set quantity='$quantity',total_price='$totalprice' where productId='$productId'";
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
