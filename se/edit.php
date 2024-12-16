<?php
require_once('D:\xampp\htdocs\se\settings_db.php');
$que="select * from settings where id=( SELECT MAX(id) FROM settings )";
$result=mysqli_query($conn,$que);
$link_to_profile = 'http://localhost/se/profile.php'; 
$link_to_settings = 'http://localhost/se/settings.php'; 
$link_to_mywarehouse = 'http://localhost/se/mywarehouse.php';
$link_to_edit = 'http://localhost/se/edit.php';

// Add item functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    // Check if the product name already exists
    $check_query = "SELECT * FROM $table WHERE name = '$name'";
    $check_result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        // Product with the same name already exists
        // Update the quantity
        $existing_row = mysqli_fetch_assoc($check_result);
        $new_quantity = $existing_row['quantity'] + $quantity;

        $update_query = "UPDATE $table SET quantity = $new_quantity WHERE name = '$name'";
        if (mysqli_query($conn, $update_query)) {
            echo "Quantity updated successfully";
        } else {
            echo "Error updating quantity: " . mysqli_error($conn);
        }
    } else {
        // Product doesn't exist, insert a new record
        // Existing code for adding a new item
    }
}

// Remove item functionality
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['remove'])) {
    $product_type = $_POST['remove_pro_type'];
    $name = $_POST['remove_name'];
    $remove_quantity = $_POST['remove_quantity'];

    switch ($product_type) {
        case 'pes':
            $table = 'pesticides';
            break;
        case 'fer':
            $table = 'fertilizers';
            break;
        case 'cro':
            $table = 'crops';
            break;
        default:
            echo "Invalid product type";
            exit;
    }

    // Get the current quantity for the specified product
    $sql = "SELECT quantity FROM $table WHERE name = '$name'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $current_quantity = $row['quantity'];

        // Check if the remove quantity is valid
        if ($current_quantity >= $remove_quantity) {
            $new_quantity = $current_quantity - $remove_quantity;

            // Update the quantity in the database
            $sql = "UPDATE $table SET quantity = $new_quantity WHERE name = '$name'";
            if (mysqli_query($conn, $sql)) {
                echo "Quantity updated successfully";
            } else {
                echo "Error updating quantity: " . mysqli_error($conn);
            }
        } else {
            echo "Invalid quantity to remove";
        }
    } else {
        echo "Product not found";
    }
}
?>

<!-- Rest of the code remains the same -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit page</title>
    <!-- Custom Css -->
    <!-- <link rel="stylesheet" href="edit.css"> -->
    <link href="edit.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Manage Products</h1>
        </div>

        <!-- Navbar -->
        <ul>
            <li>
                <a href="#search">
                    <i class="fa fa-search fa-2x" title="Search"></i>
                </a>
            </li>
            <li>
                <a href="https://mail.google.com/mail/u/0/#inbox">
                    <span class="icon-count">2</span>
                    <i class="fa fa-envelope fa-2x"></i>
                </a>
            </li>
            <li>
                <a href="http://localhost/se/edit.php">
                    <span class="icon-count">1</span>
                    <i class="fa fa-plus-circle fa-2x" title="Requests"></i>
                </a>
            </li>
            <li>
                <a href="http://localhost/SE_HTML/">
                    <i class="fa fa-sign-out-alt fa-2x" title="Sign-out"></i>
                </a>
            </li>
        </ul>
        <!-- End -->
    </div>
    <!-- End -->

    <!-- Sidenav -->
    <div class="sidenav">
        <div class="profile">
            <img src="https://cdn2.iconfinder.com/data/icons/maki/100/warehouse-512.png" alt="" width="100" height="100">
            <?php $row=mysqli_fetch_assoc($result) ?>
            <div class="name">
            <?= $row['name']; ?>
            </div>
            <div class="name_des">
                Ware House
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href='<?php echo $link_to_profile; ?>' >Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href='<?php echo $link_to_mywarehouse; ?>' class="">My Warehouse</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href='<?php echo $link_to_edit; ?>' class="active">Edit</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href='<?php echo $link_to_settings; ?>'>Settings</a>
                <hr align="center">
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <div class="card">
            <div class="card-body">
                <form action="storage.php" method="POST">
                <table style="border-spacing: 15px;">
                    <tbody>
                        <tr><h2>Add Product</h2></tr>
                        <tr>
                            <th>Product type :</th>
                            <td><label><input type="radio" name="pro_type" id="pes" onclick="persticides_disable()" value="pes">Pesticides</label>
                            <label><input type="radio" name="pro_type" id="fer" onclick="fertilizers_disable()" value="fer">Fertilizers</label>
                            <label><input type="radio" name="pro_type" id="cro" onclick="crops_disable()" value="cro">Crops</label></td>
                        </tr>
                        <tr>
                            <th>Name :</th>
                            <td><input type="text" placeholder="Product Name" name="name"></td>
                        </tr>
                        <tr>
                            <th>Quantity :</th>
                            <td><input type="number" placeholder="In Quintal" name="quantity"></td>
                        </tr>
                        <tr>
                            <th>Price :</th>
                            <td><input type="number" placeholder="Per Quintal" name="price"></td>
                        </tr>
                        <tr>
                            <th>Ideal Temperature :</th>
                            <td><input type="text" placeholder="&#8457;" name="ideal_temp"></td>
                        </tr>
                        <tr>
                            <th>Shell-Life :</th>
                            <td><input type="number" placeholder="In Days" id="shell_life" name="shell_life"></td>
                        </tr>
                        <tr>
                            <th>Expiry Date :</th>
                            <td><input type="date" placeholder="YYYY-MM-DD" id="exp_date" name="exp_date"></td>
                        </tr>
                        <tr>
                            <th>Fertilizer Type :</th>
                            <td><input type="text" placeholder="Fertilizer..." id="fer_type" name="fer_type"></td>
                        </tr>
                        <tr>
                            <th>Pesticide Type :</th>
                            <td><input type="text" placeholder="Pesticide..." id="pes_type" name="pes_type"></td>
                        </tr>
                        <tr>
                            <th><input type = "submit" value = "Submit Form" name="submit" class="button"/></th>
                            <th><input type = "reset" value = "Reset Form" name="reset" class="button" onclick="enable()"/></th>
                        </tr>
                    </tbody>
                </table>
                </form>
                <!-- Script to disable inputs acoordingly -->
                <script>
                    function persticides_disable()
                    {
                       document.getElementById("fer_type").disabled = true;
                       document.getElementById("shell_life").disabled = true;
                       document.getElementById("pes_type").disabled = false;
                       document.getElementById("exp_date").disabled = false;
                   }
                   
                   function fertilizers_disable() {
                       document.getElementById("fer_type").disabled = false;
                       document.getElementById("shell_life").disabled = true;
                       document.getElementById("pes_type").disabled = true;
                       document.getElementById("exp_date").disabled = false;
                   }
                   function crops_disable() {
                       document.getElementById("fer_type").disabled = true;
                       document.getElementById("shell_life").disabled = false;
                       document.getElementById("pes_type").disabled = true;
                       document.getElementById("exp_date").disabled = true;
                   }
                   function enable() {
                       document.getElementById("fer_type").disabled = false;
                       document.getElementById("shell_life").disabled = false;
                       document.getElementById("pes_type").disabled = false;
                       document.getElementById("exp_date").disabled = false;
                   }
               </script>
               <!-- Script close -->
           </div>
       </div>
       <div class="card">
           <div class="card-body">
               <form method="POST">
               <table>
                   <tbody>
                       <tr><h2>Remove Product</h2></tr>
                       <tr>
                           <th>Product type :</th>
                           <td>
                               <label><input type="radio" name="remove_pro_type" value="pes" required>Pesticides</label>
                               <label><input type="radio" name="remove_pro_type" value="fer" required>Fertilizers</label>
                               <label><input type="radio" name="remove_pro_type" value="cro" required>Crops</label>
                           </td>
                       </tr>
                       <tr>
                           <th>Name :</th>
                           <td><input type="text" placeholder="Product Name" name="remove_name" required></td>
                       </tr>
                       <tr>
                           <th>Quantity :</th>
                           <td><input type="number" placeholder="In Quintal" name="remove_quantity" required></td>
                       </tr>
                       <tr>
                           <th><input type="submit" value="Remove" name="remove" class="button" /></th>
                           <th><input type="reset" value="Reset Form" class="button" /></th>
                       </tr>
                   </tbody>
               </table>
           </form>
           </div>
       </div>
   </div>
   <!-- End -->
</body>
</html>