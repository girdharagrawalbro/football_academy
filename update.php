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

        $sql = "SELECT * FROM `users` where `id` = '$ids'" ;
        $result = mysqli_query($con, $sql);
        while ($row=mysqli_fetch_array($result)){            
    ?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav-css.css">
    <title>
        Edit - <?php echo $row['name']; ?> | Chhattisgarh Football Academy</title>
</head>
</html>
<body>
    <header class="header">
        <div class="header__content">
            <a href="#" class="logo">
                <img class="logo__img" src="./assest/logo.png" alt="logo">
            </a>    
            <nav class="nav">
                <ul class="nav__list">
                    <a class="nav__link" href="#">Home</a>
                    <li class="nav__item">
                        <a class="nav__link" href="./about.php">About</a>
                    </li>
                                   <li class="nav__item">
                        <a class="nav__link" href="./logout.php">Logout</a>
                    </li>
                    <li class="nav__item">
                        <a class="btn" href="./contact.php">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    <br>
    <br>

    <div class="signup">
    <div class="top-container">

      <h1 class="head">Update your details...</h1>
      <br>
      <div class="container">
        <div class="col">
          <form action="# " method="post" class="login">
            <div class="flex">
              <div>
                <label for="name">Full Name</label><br>
                <input type="text" name="name" value=<?php echo $row['name']; ?>>
              </div>
              <div>
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="" value=<?php echo $row['dob']; ?>>
              </div>
            </div>
            <br>
            <div class="flex">
              <div>
                <label for="gender">Gender</label>
                <select name="gender" id="">
                  <option value="<?php echo $row['gender']; ?>">=<?php echo $row['gender']; ?></option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div>
                <label for="batch">Batch Time</label>
                <select name="batchtime" id="">
                  <option value="<?php echo $row['batchtime']; ?>">=<?php echo $row['batchtime']; ?></option>
                  <option value="5-AM">5 AM</option>
                  <option value="6-AM">6 AM</option>
                  <option value="7-AM">7 AM</option>
                  <option value="5-PM">5 PM</option>
                  <option value="6-PM">6 PM</option>
                  <option value="7-PM">7 PM</option>
              </select>
              </div>
            </div>
            <br>
            <label for="email">E-Mail</label><br>
            <input type="email" name="email" id="" value=<?php echo $row['email']; ?>>
            <br>
            <br>
            <label for="username" name="username">Username</label>
            <input type="text" name="username" id="" value=<?php echo $row['username'];?>>
            <br>
            <div class="submit-btn">
              <button type="submit">Update</button>
            </div>
          </form>
        </div>
    </div>  
    <br>
    <p class="result" style="text-align:center;">
      <?php
    if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "football_academy";
    
    $con = mysqli_connect($server,$username,$password,$database);
    
    if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
    }
    //echo "Connected successfully";
    
    $name = $_POST['name'];
    $dob  = $_POST['dob'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $user = $_POST['username'];
    $batchtime = $_POST['batchtime']; 
    
    $existSql = "SELECT * FROM `users` WHERE email = '$email' AND username = '$user'";
    $result = mysqli_query($con, $existSql);
    $numExistRows = mysqli_num_rows($result);
    if ($numExistRows > 0)
    {
    echo "Username or Email Already Exists..";
    }
    else{
    
    $sql = "UPDATE users SET `name` = '$name', `dob`='$dob', `gender`= '$gender',`batchtime`='$batchtime',`email`='$email',`username`='$username' WHERE `users`.`id` = '$ids';";
    
    if($con->query($sql) == true)        {  
    echo "Details Update Successful..";
    }
    else{
    echo "Error:";
    }
    $con->close();
    }
    
    
                     
                                     }}                                     ?>
    </p>
      <br>
</div>
    </div>
</div>
<footer>
    <div class="footer-copyright">
      <h5>© Copyright All India Football Federation</h5>
    </div>
  </footer>
</body>
<script src="./script.js"></script>
</html>