<?php
$servername='localhost';
$username='root';
$password='';
$dbname = "softwareeng";
$conn=mysqli_connect($servername,$username,$password,$dbname);
  if(!$conn){
      die('Could not Connect MySql Server:' .mysql_error());
    }
$que="select * from login where session='1'";
$res=mysqli_query($conn,$que);
$uname=mysqli_fetch_assoc($res);
$que = "select * from customer_account where username='" . $uname['username'] . "'";
$result=mysqli_query($conn,$que);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Profile Page</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link href="profile.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
</head>
<body>
  <aside class="side-navigation">
    <!-- <div class="profile-pic">
      <img src="my pic.jpg" alt="Profile Picture">
    </div> -->
    <?php
    $Q="SELECT SUM(quantity) FROM cart WHERE quantity>0";
    $R=mysqli_query($conn,$Q);
    $RR=mysqli_fetch_assoc($R);
    ?>
    <ul class="icons">
      <li><a href="profile.php"><i class="fas fa-user-circle"></i></i></a></li> <!-- Replace the class with the appropriate profile icon class -->
      <li><a href="settings.php"><i class="fas fa-cog"></i></a></li> <!-- Replace the class with the appropriate settings icon class -->
      <li class="beat"><a href="cartpage.php"><i class="fas fa-cart-arrow-down"></i><span class="cart-count"><?php echo $RR['SUM(quantity)']; ?></span></a></li> <!-- Replace the class with the appropriate settings icon class -->
      <li><a href="login.html" onclick="session(1)"><i class="fas fa-sign-out-alt"></i></a></li>
      
    </ul>
  </aside>
  
  
      <div class="top-navigation">
        <ul class="categories">
          <li><a href="vegetables.html"><i class="fas fa-carrot" style="color: #FFA500;"></i> Vegetables</a></li> <!-- Replace the class with the appropriate vegetable icon class -->
          <li><a href="fruits.html"><i class="fas fa-apple-alt" style="color: #ee3a09;"></i> Fruits</a></li> <!-- Replace the class with the appropriate fruit icon class -->
          <li><a href="cereals.html"><i class="fas fa-utensils" style="color:#C0C0C0"></i> Cereals</a></li> <!-- Replace the class with the appropriate cereal icon class -->
          <li><a href="pesticides.html"><i class="fas fa-bug"></i> Pesticides</a></li> <!-- Replace the class with the appropriate pesticide icon class -->
          <li><a href="fertilizers.html"><i class="fas fa-tractor" style="color: #367C2B;"></i> Fertilizers</a></li> <!-- Replace the class with the appropriate pesticide icon class -->
        </ul>
      </div>

    <div class="content">
      <div class="product-listing">
      <h2>Profile</h2>
      <?php $row=mysqli_fetch_assoc($result) ?>
      <table>
        <tbody>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><?php echo $row['FirstName']."\t".$row['LastName']; ?> </td>
            </tr>
            <tr>
                <td>Email</td>
                <td>:</td>
                <td><?php echo $row['Email']; ?> </td>
            </tr>
            <tr>
                <td>Contact number</td>
                <td>:</td>
                <td><?php echo $row['Phone']; ?> </td>
            </tr>
            <tr>
                <td>Address</td>
                <td>:</td>
                <td><?php echo $row['Address']; ?> </td>
            </tr>
            <tr>
                <td>Gender</td>
                <td>:</td>
                <td><?php echo $row['Gender']; ?> </td>
            </tr>
            <tr>
                <td>Date Of Birth</td>
                <td>:</td>
                <td><?php echo $row['DateOfBirth']; ?> </td>
            </tr>
            <tr>
                <td>User Name</td>
                <td>:</td>
                <td><?php echo $row['username']; ?> </td>
            </tr>
          </tbody>
        </table>
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

    </script>
</body>
</html>
