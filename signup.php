<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="nav-css.css">
  <title>SignUp | Chhattisgarh Football Academy</title>
</head>

<body>
  <header class="header">
    <div class="header__content">
      <a href="#" class="logo">
        <img class="logo__img" src="./assest/logo.png" alt="logo">
      </a>

      <nav class="nav">
        <ul class="nav__list">
          <li class="nav__item">
            <a class="nav__link" href="./index.html">Home</a>
          </li>
          <li class="nav__item">
            <a class="nav__link" href="./about.php">About</a>
          </li>
          <li class="nav__item">

            <a class="nav__link" href="./login.php">Login</a>
          </li>
          <li class="nav__item">

            <a class="nav__link" href="#">Signup</a>
          </li>
          <li class="nav__item">
            <a class="btn" href="./contact.php">Contact</a>
          </li>
        </ul>
      </nav>
    </div>
  </header>

  <div class="signup">
    <div class="top-container">

      <h1 class="head">Join our Academy now..</h1>
      <div class="container">
        <div class="col">
          <form action="# " method="post" class="login">
            <div class="flex">
              <div>
                <label for="name">Full Name <span>*</span></label><br>
                <input type="text" name="name">
              </div>
              <div>
                <label for="dob">Date of Birth</label>
                <input type="date" name="dob" id="">
              </div>
            </div>
            <br>
            <div class="flex">
              <div>
                <label for="gender">Gender</label>
                <select name="gender" id="">
                  <option value="0">select</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
              </div>
              <div>
                <label for="batch">Batch Time <span>*</span></label>
                <select name="batchtime" id="">
                  <option value="0">select</option>
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
            <label for="email">E-Mail <span>*</span></label><br>
            <input type="email" name="email" id="">
            <br>
            <br>
            <label for="username" name="username">Username <span>*</span></label>
            <input type="text" name="username" id="">
            <br>
            <br>
            <div class="flex">
              <div> <label for="password">Password <span>*</span></label><br>
                <input type="password" name="pass" id="">
              </div>
              <div>
                <label for="cpassword">Confirm Password <span>*</span></label><br>
                <input type="password" name="cpass" id="">
              </div>
            </div>
            <div class="submit-btn">
              <button type="submit">Submit</button>
            </div>
          </form>
          <div class="new-user">
            <p>Already Registered?
              <a href="./login.php"> Login</a>
            </p>
            <p class="result">
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
            $pass = $_POST['pass'];
            $cpass =$_POST['cpass'];
            $batchtime = $_POST['batchtime']; 

        $existSql = "SELECT * FROM `users` WHERE email = '$email' AND username = '$user'";
        $result = mysqli_query($con, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0)
        {
          echo "Username or Email Already Exists..";
        }
        else{
            if($pass == $cpass){

            

      $sql = "INSERT INTO `users` (`name`, `dob`, `gender`,`batchtime`,`email`,`username`, `pass`) 
              VALUES ('$name','$dob','$gender','$batchtime','$email','$user','$pass');";

    }
    else{
      echo "Password doesn't match..";
    }}
    if($con->query($sql) == true)        {  
      echo "Registration Successful..";
    }
    else{
      echo "Error:";
    }
    $con->close();
  }
    
    
                             
                                                    ?>
            </p>
          </div>
        </div>
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