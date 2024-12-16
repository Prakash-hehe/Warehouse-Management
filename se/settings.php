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
    <title>Settings</title>
    <!-- Custom Css -->
    <link rel="stylesheet" href="settings.css">
    <style>
        input:focus{
            background-color: yellow;
        }
    </style>
    <!-- FontAwesome 5 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css">
</head>
<body>
    <!-- Navbar top -->
    <div class="navbar-top">
        <div class="title">
            <h1>Settings</h1>
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
                <a href='<?php echo $link_to_edit; ?>' class="">Edit</a>
                <hr align="center">
            </div>
            <div class="url">
                <a href='<?php echo $link_to_settings; ?>' class="active">Settings</a>
                <hr align="center">
            </div>
        </div>
    </div>
    <!-- End -->

    <!-- Main -->
    <div class="main">
        <h2>Details</h2>
        <div class="card">
            <div class="card-body">
                <i class="fa fa-pen fa-xs edit"></i>
                <form action="settings_db.php" method="POST">
                <table>
                    <tbody>
                        <tr>
                            <td>WareHouse Name</td>
                            <td>:</td>
                            <td><input type="text" name="name" placeholder="Neerukonda"></td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>:</td>
                            <td><input type="email" name="email" placeholder="neerukondawhservice@gmail.com"></td>
                        </tr>
                        <tr>
                            <td>Contact</td>
                            <td>:</td>
                            <td><input type="text" name="contact" placeholder="00000 00000"></td>
                        </tr>
                        <tr>
                            <td>Address</td>
                            <td>:</td>
                            <td><input type="text" name="address" placeholder="Nerukonda, Mangalgiri"></td>
                        </tr>
                        <tr>
                            <th><input type = "submit" value = "Submit Form" class="button" name="submit"/></th>
                            <th><input type = "reset" value = "Reset Form" class="button"/></th>
                        </tr>
                    </tbody>
                </table>
                </form>
            </div>
        </div>
        <div class="card" style="background-color:#EFFBDA;">
            <h6 style="color:blue;">© 2024 SE Project.</h6>
        </div>
    </div>
    <!-- End -->
</body>
</html>