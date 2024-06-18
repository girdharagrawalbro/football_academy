<?php
session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
        header("location: ./login.php");
        exit;
    }
    $name = $_SESSION['username']
    ?>
    <?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "football_academy";
    
    $con = mysqli_connect($server,$username,$password,$database);

    if (!$con) {
        die("Connection failed: " . mysqli_connect_error());
    }
    // echo "Connected successfully";   
    
$ids = $_GET['id'];
$sql = "DELETE FROM contact WHERE `contact`.`id` = '$ids'";
mysqli_query($con, $sql);
 echo '<script type ="text/JavaScript">';  
echo 'alert("User Removed")';  
echo '</script>';  
header("location: ./admin.php");
    ?> 
