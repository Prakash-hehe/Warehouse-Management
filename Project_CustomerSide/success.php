<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'softwareeng';
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Assuming you're passing the total amount as a GET parameter
$totalAmount = isset($_GET['totalAmount']) ? $_GET['totalAmount'] : 0;

// Retrieve the cart items
$que = "SELECT * FROM cart WHERE quantity > 0";
$result = mysqli_query($conn, $que);

// Check if the query was successful
if (!$result) {
    // Query failed, handle the error
    echo "Error executing the query: " . mysqli_error($conn);
    exit; // Stop further execution
}

$paymentSuccessful = true;
if ($paymentSuccessful) {
  // Reset the quantity of all records in the cart table to 0
  $reset_query = "UPDATE cart SET quantity = 0";
  if (mysqli_query($conn, $reset_query)) {
      // Quantity reset successfully
  } else {
      // Error resetting quantity
      echo "Error updating quantity: " . mysqli_error($conn);
  }
} else {
  echo "Payment failed";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@forevolve/bootstrap-fiori@1.1.0/dist/bootstrap-fiori.min.css">
    <title>Payment Successful</title>
    <style>
        body {
            background-color: #f0f0f0;
            background-image: linear-gradient(to bottom right, #00C800, #008000);
            font-family: Arial, sans-serif;
        }

        .success-container {
            text-align: center;
            margin-top: 50px;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            animation: bounceIn 0.75s cubic-bezier(0.68, -0.55, 0.27, 1.55);
        }

        .success-icon {
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 5rem;
            color: #00C800;
        }

        .success-message {
            margin-top: 20px;
        }

        .continue-button {
            margin-top: 20px;
        }

        .continue-button a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .continue-button a:hover {
            background-color: #45a049;
        }

        .cart-items-table {
            background-color: white;
            color: black;
            border-collapse: collapse;
            padding: 10px;
            margin-top: 20px;
            margin-left: 550px;
        }

        .cart-items-table th, .cart-items-table td {
            border: 1px solid black;
            padding: 8px;
        }

        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.1);
            }
            60% {
                opacity: 1;
                transform: scale(1.2);
            }
            100% {
                transform: scale(1);
            }
        }
    </style>
</head>
<body>
    <div class="success-container">
        <div class="success-icon"></div>
        <div class="success-message">
            <h2>Payment Successful!</h2>
            <p>Thank you for your purchase.</p>
            <?php
            // Check if $totalAmount is set and not empty before displaying it
            if (isset($totalAmount) && $totalAmount !== '') {
                echo "<p>Total Amount Paid: $totalAmount ₹</p>";
            }
            ?>
            <h3>Cart Items:</h3>
            <table class="cart-items-table">
                <tr>
                    <th>Product Name</th>
                    <th>Quantity</th>
                    <th>Price/Kg</th>
                    <th>Total Price</th>
                </tr>
                <?php
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['productName']}</td>
                            <td>{$row['quantity']}</td>
                            <td>{$row['price']} ₹</td>
                            <td>{$row['total_price']} ₹</td>
                        </tr>";
                }
                ?>
            </table>
        </div>
        <div class="continue-button">
            <a href="cartpage.php">Continue Shopping</a>
        </div>
    </div>
</body>
</html>
<?php
// Close the database connection
mysqli_close($conn);
?>