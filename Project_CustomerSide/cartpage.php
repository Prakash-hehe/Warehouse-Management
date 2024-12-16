<?php
$servername = 'localhost';
$username = 'root';
$password = '';
$dbname = 'softwareeng';
$conn = mysqli_connect($servername, $username, $password, $dbname);

$que = "SELECT * FROM cart WHERE quantity > 0";
$result = mysqli_query($conn, $que);
?>

<!DOCTYPE html>
<html>
<head>
  <title>Order Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="orders.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    jQuery(document).ready(function() {
      // Handle "Clear Cart" button click event
      jQuery('#clearCartButton').click(function() {
        // Send an AJAX request to the PHP script
        jQuery.ajax({
          url: 'clear_cart.php',
          type: 'POST',
          success: function(response) {
            // Handle the response from the PHP script
            console.log(response);
            // Reload the page to update the cart
            location.reload();
          },
          error: function(xhr, status, error) {
            // Handle the error
            console.error('Error:', error);
          }
        });
      });
    });
  </script>
</head>
<body>
  <aside class="side-navigation">
    <?php
      $Q = "SELECT SUM(quantity) FROM cart WHERE quantity > 0";
      $R = mysqli_query($conn, $Q);
      $RR = mysqli_fetch_assoc($R);
    ?>
    <ul class="icons">
      <li><a href="profile.php"><i class="fas fa-user-circle"></i></a></li>
      <li><a href="settings.php"><i class="fas fa-cog"></i></a></li>
      <li class="beat"><a href="cartpage.php"><i class="fas fa-cart-arrow-down"></i><span class="cart-count"><?php echo $RR['SUM(quantity)']; ?></span></a></li>
      <li><a href="login.html" onclick="session(1)"><i class="fas fa-sign-out-alt"></i></a></li>
    </ul>
  </aside>

  <div class="top-navigation">
    <ul class="categories">
      <li><a href="vegetables.html"><i class="fas fa-carrot" style="color: #FFA500;"></i> Vegetables</a></li>
      <li><a href="fruits.html"><i class="fas fa-apple-alt" style="color: #ee3a09;"></i> Fruits</a></li>
      <li><a href="cereals.html"><i class="fas fa-utensils" style="color:#C0C0C0"></i> Cereals</a></li>
      <li><a href="pesticides.html"><i class="fas fa-bug"></i> Pesticides</a></li>
      <li><a href="fertilizers.html"><i class="fas fa-tractor" style="color: #367C2B;"></i> Fertilizers</a></li>
    </ul>
  </div>

  <div class="content">
    <div class="product-listing">
      <h2>Product Listing</h2>

      <!-- Delivery Options -->
      <div class="delivery_tables">
        <table>
          <tbody>
            <tr>
              <th bgcolor="#dfd9d9">Product Name</th>
              <th bgcolor="#dfd9d9">Quantity(KiloGram)</th>
              <th bgcolor="#dfd9d9">Price/Kg</th>
              <th bgcolor="#dfd9d9">Total price</th>
              <th bgcolor="#dfd9d9">Options</th>
            </tr>
            <?php while($row = mysqli_fetch_assoc($result)) { ?>
              <tr>
                <?php $itemname = $row['productName']; $itemprice = $row['price']; ?>
                <th bgcolor="#e1ebcc"><?php echo $row['productName']; ?> </th>
                <td><?php echo $row['quantity']; ?> </td>
                <td><?php echo $row['price']; ?> ₹</td>
                <td bgcolor="#e98968"><?php echo $row['total_price']; ?> ₹</td>
                <td><button id="Clear_Item" onclick="remove('<?php echo $itemname; ?>','<?php echo $itemprice; ?>')">Remove</button></td>
              </tr>
            <?php } ?>
          </tbody>
        </table>
        <?php
          $que = "SELECT SUM(total_price) FROM cart WHERE quantity > 0";
          $res = mysqli_query($conn, $que);
          $result = mysqli_fetch_assoc($res);
        ?>
        <br><br>
        <table class="paymentbar">
          <tr>
            <td>Total Amount</td>
            <td bgcolor="#f0881f"><?php echo $result['SUM(total_price)']; ?>₹ /-</td>
            <td>
              <button id="payButton" onclick="pay()">Pay Now</button>
              <button id="clearCartButton" onclick="clearCart()">Clear Cart</button>
            </td>
          </tr>
        </table>
      </div>
    </div>
  </div>

  <script>
    function session(a) {
      var formData = new FormData();
      formData.append('sessionId', a);

      // Send a POST request to the PHP script
      fetch('logout.php', {
        method: 'POST',
        body: formData
      })
      .then(function(response) {
        // Check if the response was successful
        if (response.ok) {
          return response.text(); // Return the response text
        } else {
          throw new Error('Request failed.'); // Throw an error
        }
      })        
      .then(function(responseData) {
        // Do something with the response data
        console.log(responseData);
        // Redirect to the login page
        window.location.href = 'login.html';
      })
      .catch(function(error) {
        // Handle any errors
        console.error('Error:', error);
      });
    }

  function clearCart() {
      // Add logic to clear the cart here
      console.log('Cart cleared');
    }
  function pay() {
  // Get the total amount from the server
  var totalAmount = <?php echo $result['SUM(total_price)']; ?>;

  // Display the total amount to the user
  var confirmPayment = confirm("Total Amount: " + totalAmount + " ₹\n\nProceed to payment?");

  if (confirmPayment) {
    // Prompt the user to enter the total amount
    var enteredAmount = prompt("Please enter the total amount to be paid:");

    // Check if the entered amount is valid and equal to the actual total amount
    if (enteredAmount === null || isNaN(enteredAmount)) {
      // Display an error message using a modal or alert
      if (enteredAmount === null) {
        alert("Payment canceled.");
      } else {
        alert("Invalid amount entered. Please enter a valid number.");
      }

      // Retry the payment process
      pay();
      return;
    }

    // Parse the entered amount as a float
    enteredAmount = parseFloat(enteredAmount);

    if (enteredAmount === totalAmount) {
      // Proceed with the payment options
      var paymentOption = prompt("Please select a payment option:\n1. Net Banking\n2. Google Pay\n3. PhonePe\n4. Paytm");

      // Check if a payment option was selected
      if (paymentOption && paymentOption >= 1 && paymentOption <= 4) {
        // Handle account number prompt for Net Banking
        var contactInfo;
        var isValidContactInfo = false;
        var retryAttempt = 0;

        do {
          if (paymentOption === '1') {
            if (retryAttempt === 0) {
              contactInfo = prompt("Please enter your 12-digit account number:");
            } else {
              var retryAccount = confirm("Invalid account number. Would you like to retry one more time?");
              if (retryAccount) {
                contactInfo = prompt("Please enter your 12-digit account number:");
              } else {
                alert("Payment canceled.");
                return;
              }
            }

            if (contactInfo && contactInfo.length === 12 && !isNaN(contactInfo)) {
              isValidContactInfo = true;
            } else {
              retryAttempt++;
            }
          } else {
            contactInfo = prompt("Please enter your email or 10-digit phone number:");
            if (contactInfo) {
              if (contactInfo.includes('@gmail.com') && contactInfo.length > 10) {
                isValidContactInfo = true;
              } else if (contactInfo.length === 10 && !isNaN(contactInfo)) {
                isValidContactInfo = true;
              } else {
                alert("Invalid email or phone number. Please try again.");
              }
            }
          }
        } while (!isValidContactInfo && retryAttempt < 2);

        if (!isValidContactInfo) {
          alert("Payment canceled due to invalid account number.");
          return;
        }

        // Confirm payment
        var confirmPayment = confirm("Confirm payment?");

        if (confirmPayment) {
          // Generate an OTP (you can use a random number or implement a more secure method)
          var otp = Math.floor(100000 + Math.random() * 900000);

          var isOtpValid = false;
          var otpRetryAttempt = 0;

          do {
            // Display the OTP to the user
            var otpConfirmation = prompt("Your OTP is: " + otp + "\nPlease confirm the OTP to proceed with the payment.");

            if (otpConfirmation === otp.toString()) {
              isOtpValid = true;
            } else {
              otpRetryAttempt++;
              if (otpRetryAttempt === 1) {
                var retryOtp = confirm("Incorrect OTP. Would you like to retry one more time?");
                if (!retryOtp) {
                  alert("Payment canceled.");
                  isOtpValid = true; // Exit the loop
                }
              } else {
                alert("Maximum retry attempt reached. Payment canceled.");
                isOtpValid = true; // Exit the loop
              }
            }
          } while (!isOtpValid && otpRetryAttempt < 2);

          if (isOtpValid && otpRetryAttempt < 2) {
            // Create a form data object
            var formData = new FormData();
            formData.append('totalAmount', totalAmount);
            formData.append('paymentOption', paymentOption);
            formData.append('contactInfo', contactInfo);

            // Send a POST request to the payment.php script
            fetch('payment.php', {
              method: 'POST',
              body: formData
            })
            .then(function(response) {
              // Check if the response was successful
              if (response.ok) {
                return response.text(); // Return the response text
              } else {
                throw new Error('Payment failed.'); // Throw an error
              }
            })
            .then(function(responseData) {
              // Check if the payment was successful
              if (responseData.includes('success')) {
                // Redirect to the success page with the total amount as a query parameter
                window.location.href = 'success.php?totalAmount=' + totalAmount;
              } else {
                alert(responseData); // Display the error message
                if (responseData.includes('Invalid contact information')) {
                  pay(); // Retry the payment process
                }
              }
            })
            .catch(function(error) {
              // Handle any errors
              console.error('Error:', error);
            });
          }
        } else {
          alert("Payment canceled.");
        }
      } else {
        alert("Invalid payment option selected.");
      }
    } else if (enteredAmount > totalAmount) {
      // Display the exceeded amount in red color
      var exceededAmount = enteredAmount - totalAmount;
      Swal.fire({
        icon: 'warning',
        title: 'Amount Exceeded ',
        html: 'The entered amount exceeds the actual total amount by <span style="color:red;">₹' + exceededAmount.toFixed(2) + '</span>. Please enter the correct amount.',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.close().then(() => {
              pay();
    });
        }
      });
    } else {
      // Display the remaining amount in red color
      var remainingAmount = totalAmount - enteredAmount;
      Swal.fire({
        icon: 'warning',
        title: 'Amount Insufficient',
        html: 'The entered amount is less than the actual total amount. You still need to pay <span style="color:red;">₹' + remainingAmount.toFixed(2) + '</span>.',
        confirmButtonText: 'OK'
      }).then((result) => {
        if (result.isConfirmed) {
          Swal.close().then(() => {
              pay();
    });
        }
      });
    }
  } else {
    alert("Payment canceled.");
  }
}

    // Remove an item
    function remove(a, b) {
      var formData = new FormData();
      formData.append('productName', a);
      formData.append('productPrice', b);

      // Send a POST request to the PHP script
      fetch('remove.php', {
        method: 'POST',
        body: formData
      })
      .then(function(response) {
        // Check if the response was successful
        if (response.ok) {
          return response.text(); // Return the response text
        } else {
          throw new Error('Request failed.'); // Throw an error
        }
      })
      .then(function(responseData) {
        // Do something with the response data
        console.log(responseData);
        // Redirect to the cart page
        window.location.href = 'cartpage.php';
      })
      .catch(function(error) {
        // Handle any errors
        console.error('Error:', error);
      });
    }
  </script>
</body>
</html>
