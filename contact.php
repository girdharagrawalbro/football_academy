<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact-Us | Chhattisgarh Football Academy</title>
        <link rel="stylesheet" href="style.css">

    <link rel="stylesheet" href="nav-css.css">


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

                        <a class="nav__link" href="./signup.php">Signup</a>
                    </li>
                    <li class="nav__item">
                        <a class="btn" href="#">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
    
    <section class="contact-section" id="contact">
        <div class="hero-container">
            <h1>Contact Us</h1>
            <div class="container">

                <div class="col1">
                    <div class="address">
                        <div class="address-logo">
                            <img src="./assest/building.png" alt="">

                        </div>
                        <div class="address-content">
                            <h4>Address</h4>
                            <h3>Bhatgaon Road , Mahadeo ghat road
                                <br> Raipur
                            </h3>
                        </div>
                    </div>
                    <div class="mobile">
                        <div class="mobile-logo">
                            <img src="./assest/contact.png" alt="">

                        </div>
                        <div class="mobile-content">
                            <h4>Contact</h4>
                            <h3>
                                Email: girdharagrawalbro@gmail.com
                               <br><br> Mobile: 7909905038
                            </h3>
                        </div>
                    </div>
                </div>

                <div class="col2">
                    <form action="./contact.php" method="post">

                        <label for="name">Full Name</label><br>
                        <input type="text" name="name" id="name">
                        <br><br>

                        <label for="email">E-Mail</label><br>
                        <input type="email" name="email" id="">
                        <br>
                        <br>
                        <label for="comment">Any Comments</label><br>
                        <textarea id="" cols="86" rows="4" name="suggestion"></textarea>
                        <br>
                        <div class="con-sub-btn">

                            <button type="submit">Submit</button>
                            <br>
                            <br><p class="result">
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
        $email = $_POST['email'];
        $suggestion = $_POST['suggestion'];
        $existSql = "SELECT * FROM `contact` WHERE email = '$email'";
        $result = mysqli_query($con, $existSql);
        $numExistRows = mysqli_num_rows($result);
        if ($numExistRows > 0)
        {
          echo "Email Already Exists..";
        }
        else{
        $sql = "INSERT INTO `football_academy`.`contact` (`name`, `email`, `suggestion`, `dt`)VALUES ('$name', '$email','$suggestion', current_timestamp());";
        

                                    if($con->query($sql) == true)        {
                                        echo "Thanks <u>$name</u> for Contacting";
                                    }
                                    else{
                                        echo "Error:";
                                    }
                            
                                    $con->close();
                            
                                }
                            }
                            ?> 
       </p>                     
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </section>
    
    <footer>
        <div class="footer-copyright">
            <h5>© Copyright All India Football Federation</h5>
        </div>
    </footer>
</body>
</html>