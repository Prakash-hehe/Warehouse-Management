
<!-- PHP STARTS -->
<?php
require_once('D:\xampp\htdocs\se\storage.php');
$que1="select * from pesticides";
$result1=mysqli_query($conn,$que1);
$que2="select * from fertilizers";
$result2=mysqli_query($conn,$que2);
$que3="select * from crops";
$result3=mysqli_query($conn,$que3);

$link_to_profile = 'http://localhost/se/profile.php'; 
$link_to_settings = 'http://localhost/se/settings.php'; 
$link_to_mywarehouse = 'http://localhost/se/mywarehouse.php';
$link_to_edit = 'http://localhost/se/edit.php';

?>
<!-- PHP ENDS -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Warehouse Page</title>

    <!-- Custom Css -->
    <link rel="stylesheet" href="mywarehouse.css">

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>SAW</h1>
            
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
            <?php
            require_once('D:\xampp\htdocs\se\settings_db.php');
            $que="select * from settings where id=( SELECT MAX(id) FROM settings )";
            $result=mysqli_query($conn,$que);
            $row=mysqli_fetch_assoc($result)
            ?>
            <div class="name">
            <?= $row['name']; ?>
            </div>
            <div class="name_des">
                Ware House
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href='<?php echo $link_to_profile; ?>' class="">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href='<?php echo $link_to_mywarehouse; ?>' class="active">My Warehouse</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href='<?php echo $link_to_edit; ?>' class="">Edit</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href='<?php echo $link_to_settings; ?>' class="">Settings</a>
                <hr align="center">
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>Pesticides</h2>
        <div class="card">
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <th bgcolor="#dfd9d9">Product Name</th>
                            <th bgcolor="#dfd9d9">Quantity(Quintal)</th>
                            <th bgcolor="#dfd9d9">Price/Quintal</th>
                            <th bgcolor="#dfd9d9">Ideal Temperature( &#8451;)</th>
                            <th bgcolor="#dfd9d9">Expiry Date( &#8451;)</th>
                            <th bgcolor="#dfd9d9">Pesticide Type</th>
                        </tr>
                        <tr>
                        <?php
                        while($row=mysqli_fetch_assoc($result1))
                        {
                        ?>
                        <!-- content here -->
                            <th bgcolor="#e1ebcc"><?php echo $row['name']; ?> </th>
                            <td><?php echo $row['quantity']; ?> </td>
                            <td><?php echo $row['price']; ?> </td>
                            <td><?php echo $row['ideal_temp']; ?> </td>
                            <td><?php echo $row['exp_date']; ?> </td>
                            <td><?php echo $row['pes_type']; ?> </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <h2>Fertilizers</h2>
        <div class="card">
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <th bgcolor="#dfd9d9">Product Name</th>
                            <th bgcolor="#dfd9d9">Quantity(Quintal)</th>
                            <th bgcolor="#dfd9d9">Price/Quintal</th>
                            <th bgcolor="#dfd9d9">Ideal Temperature( &#8451;)</th>
                            <th bgcolor="#dfd9d9">Expiry Date( &#8451;)</th>
                            <th bgcolor="#dfd9d9">Fertilizer Type</th>
                            <!-- <th></th>
                            <th>Exp.Date</th> -->
                        </tr>
                        <tr>
                        <?php
                        while($row=mysqli_fetch_assoc($result2))
                        {
                        ?>
                        <!-- content here -->
                            <th bgcolor="#e1ebcc"><?php echo $row['name']; ?> </th>
                            <td><?php echo $row['quantity']; ?> </td>
                            <td><?php echo $row['price']; ?> </td>
                            <td><?php echo $row['ideal_temp']; ?> </td>
                            <td><?php echo $row['exp_date']; ?> </td>
                            <td><?php echo $row['fer_type']; ?> </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <h2>Food Crops</h2>
        <div class="card">
            <div class="card-body">
                <table>
                    <tbody>
                        <tr>
                            <th bgcolor="#dfd9d9">Crop</th>
                            <th bgcolor="#dfd9d9">Quantity(Quintal)</th>
                            <th bgcolor="#dfd9d9">Price(Per Quintal)</th>
                            <th bgcolor="#dfd9d9">Ideal Temperature( &#8457;)</th>
                            <th bgcolor="#dfd9d9">Shell-Life</th>
                            <!-- <th></th>
                            <th>Exp.Date</th> -->
                        </tr>
                        <tr>
                        <?php
                        while($row=mysqli_fetch_assoc($result3))
                        {
                        ?>
                        <!-- content here -->
                            <th bgcolor="#e1ebcc"><?php echo $row['name']; ?> </th>
                            <td><?php echo $row['quantity']; ?> </td>
                            <td><?php echo $row['price']; ?> </td>
                            <td><?php echo $row['ideal_temp']; ?> </td>
                            <td><?php echo $row['shell_life']; ?> </td>
                        </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

        
    </div>
    <!-- End -->
</body>
</html>