<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="nav-css.css">
    <title>Login | Chhattisgarh Football Academy</title>
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

                        <a class="nav__link" href="#">Login</a>
                    </li>
                    <li class="nav__item">

                        <a class="nav__link" href="./signup.php">Signup</a>
                    </li>
                    <li class="nav__item">
                        <a class="btn" href="./contact.php">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="login" id="popup-login">
        <div class="top-container">
            <h1 class="head">Login to your existing Account..</h1>
                <div class="col">
                    <form action="#" method="post" class="login">

                        <label for="username">Username</label><br>
                        <input type="text" name="username">
                        <br>
                        <br>
                        <label for="password">Password</label><br>
                        <input type="password" name="pass" id="">
                        <div class="forget">
                            <a href="./forgot-password.php">Forget Password ?</a>
                        </div>
                        <div class="submit-btn">
                            <button type="submit">Login</button>
                        </div>
                    </form>
                    <div class="new-user">
                        <p>New user?
                            <a href="./signup.php"> Sign Up</a>
                        </p>
                        <br>
<p class="result">
<?php
       if($_SERVER["REQUEST_METHOD"] == "POST"){
        $server = "localhost";
        $username = "root";
        $password = "";
        $database = "football_academy";
        
        $con = mysqli_connect($server,$username,$password,$database);
    
        if (!$con) {
            die("Connection failed: " . mysqli_connect_error());
        }
            //echo "Connected successfully";
    
            $user = $_POST['username'];
            $pass = $_POST['pass'];
        if($user == "admin" && $pass == "admin")
        {    session_start();
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user;          
            header('Location: ./admin.php');
        }
else{
            $sql = "SELECT * FROM users WHERE username='$user' AND pass='$pass'";
            $result = mysqli_query($con, $sql);
            $num = mysqli_num_rows($result);
            if ($num == 1)
            {
                $login = true;
                echo "You are Logged In...";
                session_start();
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $user;
                header('Location: ./welcome.php');
            }
            else{
             echo "Invalid Credentials...";
            }}
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
</html>