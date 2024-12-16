<?php
    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "softwareeng";
    $conn=mysqli_connect($servername,$username,$password,"$dbname");
    if(!$conn){
          die('Could not Connect MySql Server:' .mysql_error());
        }
    if(isset($_POST['submit'])){
        if(!empty($_POST['pro_type'])){
            if($_POST['pro_type']=="pes"){   //Pesticides
                if(!empty($_POST['name']) && !empty($_POST['quantity']) && !empty($_POST['price']) && !empty($_POST['ideal_temp']) && !empty($_POST['exp_date']) && !empty($_POST['pes_type']) ){
                    $name=$_POST['name'];
                    $quantity=$_POST['quantity'];
                    $price=$_POST['price'];
                    $ideal_temp=$_POST['ideal_temp'];
                    $exp_date=$_POST['exp_date'];
                    $pes_type=$_POST['pes_type'];
    
                    $query="insert into pesticides(name,quantity,price,ideal_temp,exp_date,pes_type) values('$name','$quantity','$price','$ideal_temp','$exp_date','$pes_type')";
                    $run=mysqli_query($conn,$query) or die(mysqli_error());
                    if($run){
                        echo '<script>alert("Form Submitted Successfully");window.location.href="edit.php";</script>';
                    }
                    else{
                        echo '<script>alert("Form Submision Failed");window.location.href="edit.php";</script>';
                    }
                }
            }
            elseif($_POST['pro_type']=="fer"){ //Fertilizers
                if( !empty($_POST['name']) && !empty($_POST['quantity']) && !empty($_POST['price']) && !empty($_POST['ideal_temp']) && !empty($_POST['exp_date']) && !empty($_POST['fer_type']) ) {
                    $name=$_POST['name'];
                    $quantity=$_POST['quantity'];
                    $price=$_POST['price'];
                    $ideal_temp=$_POST['ideal_temp'];
                    $exp_date=$_POST['exp_date'];
                    $fer_type=$_POST['fer_type'];
    
                    $query="insert into fertilizers(name,quantity,price,ideal_temp,exp_date,fer_type) values('$name','$quantity','$price','$ideal_temp','$exp_date','$fer_type')";
                    $run=mysqli_query($conn,$query) or die(mysqli_error());
                    if($run){
                        echo '<script>alert("Form Submitted Successfully");window.location.href="edit.php";</script>';
                    }
                    else{
                        echo '<script>alert("Form Submision Failed");window.location.href="edit.php";</script>';
                    }
                }
            }
            elseif ($_POST['pro_type']=="cro") { //Crops
                if( !empty($_POST['name']) && !empty($_POST['quantity']) && !empty($_POST['price']) && !empty($_POST['ideal_temp']) && !empty($_POST['shell_life']) ) {
                    $name=$_POST['name'];
                    $quantity=$_POST['quantity'];
                    $price=$_POST['price'];
                    $ideal_temp=$_POST['ideal_temp'];
                    $shell_life=$_POST['shell_life'];
    
                    $query="insert into crops(name,quantity,price,ideal_temp,shell_life) values('$name','$quantity','$price','$ideal_temp','$shell_life')";
                    $run=mysqli_query($conn,$query) or die(mysqli_error());
                    if($run){
                        echo '<script>alert("Form Submitted Successfully");window.location.href="edit.php";</script>';
                    }
                    else{
                        echo '<script>alert("Form Submision Failed");window.location.href="edit.php";</script>';
                    }
                }
            }
            
        }
        else{
            echo '<script>alert("All fields required");window.location.href="edit.php";</script>';
        }
    }
?>