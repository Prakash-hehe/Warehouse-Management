<?php
require_once('D:\xampp\htdocs\se\settings_db.php');
$que="select * from settings where id=( SELECT MAX(id) FROM settings )";
$result=mysqli_query($conn,$que);


$link_to_profile = 'http://localhost/se/profile.php'; 
$link_to_settings = 'http://localhost/se/settings.php'; 
$link_to_mywarehouse = 'http://localhost/se/mywarehouse.php';
$link_to_edit = 'http://localhost/se/edit.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <title>Profile Page</title>

    <!-- Custom Css -->
    <!-- <link rel="stylesheet" href="profilepage.css"> -->
    <link href="profilepage.css?v=<?php echo time(); ?>" rel="stylesheet" type="text/css" />

    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <!-- Fetching account data from database -->
    <!-- open -->
    <?php $row=mysqli_fetch_assoc($result) ?>
    <!-- close -->
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Profile</h1>
        </div>

        <!-- Navbar -->
        <ul>
            <li>
                <a href="#search">
                <i class="fas fa-shopping-cart fa-2x"></i>
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

            <div class="name">
            <?= $row['name']; ?>
            </div>
            <div class="name_des">
                Ware House
            </div>
        </div>

        <div class="sidenav-url">
            <div class="url">
                <a href='<?php echo $link_to_profile; ?>' class="active">Profile</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href='<?php echo $link_to_mywarehouse; ?>' class="">My Warehouse</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href='<?php echo $link_to_edit; ?>' class="">Edit</a>
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
        <h2>IDENTITY</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <table>
                    <tbody>
                        <tr>
                            <td>Warehouse Name</td>
                            <td>:</td>
                            <td><?php echo $row['name']; ?> </td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><?php echo $row['email']; ?> </td>
                        </tr>
                        <tr>
                            <td>Contact number</td>
                            <td>:</td>
                            <td><?php echo $row['contact']; ?> </td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><?php echo $row['address']; ?> </td>
                        </tr>
                        <tr>
                            <td>House ID</td>
                            <td>:</td>
                            <td><?php echo $row['id']; ?> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <h2>Contact</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <div class="contact-card">
                    <img src="my pic.jpeg" alt="Profile Picture" class="avatar">
                    <h2>Golla Dhanush Kumar (Warehouse manager)</h2>
                    <p><i class="fas fa-envelope"></i> dhanushkumargolla@email.com</p>
                    <p><i class="fas fa-phone"></i>+91 7989267277</p>
                    <p><i class="fas fa-map-marker-alt"></i>srm ap univeristy amaravathi</p>

                </div>
            </div>
        </div>
    </div>
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3826.2221728901523!2d80.50523647349577!3d16.464284128744236!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a35f253b87d44b3%3A0x591c2967f32abc19!2sSRM%20UNIVERSITY%20AP%20ANDHRA%20PRADESH!5e0!3m2!1sen!2sin!4v1683625976568!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
    <!-- End -->
</body>
</html>