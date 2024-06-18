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
        $sql = "SELECT * FROM `users` where `username` = '$name'" ;
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
        Welcome - <?php echo $row['name']; ?> | Chhattisgarh Football Academy</title>
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

    <section class="first-section" id="#home">
        <div class="contain">
            <div class="icons">

            </div>
            <div class="container">
                <div class="logo">
                    <img src="./assest/chhattisgarh football academy-logos_transparent.png" alt="">
                </div>
                <div class="head">
                    <div>
                        <h1>
                            CHHATTISGARH FOOTBALL ACADEMY
                        </h1>

                    </div>
                    <div>
                        <p>
                                <i class="fa fa-map-marker" style="font-size: 20px;margin-right: 10px;"></i> Mahadev ghat
                            Road, Bhatagaon, Raipur
                        </p>
                    </div>
                    <div class="b">
                        <h2>Welcome - <span><?php     echo $row['name']; ?></span></h2>
                    </div>
                    <div class="flex">
                        <style>
                            .first-section .contain .flex {
                                display: flex;
                                width:45%;
                                margin : 25px 0 0 0;
                                justify-content: space-between;
                            }
                            .first-section .contain .flex button{
                                padding:10px 20px;
                                color:white;
                                cursor: pointer;
                               background: transparent;
                               border:1px solid white;
                               border-radius:20px;
                               transition:.5s all ease;
                            }
                            .first-section .contain .flex button:hover{
                                background-color:blue;
                            }


                        </style>
                    <a href="./update.php?id=<?php echo $row['id']; ?>"> <button>Edit your Details</button></a>
                    <a href="./delete-user.php?id=<?php echo $row['id']; ?>"><button>Delete your Account</button></a>
                    </div>
            </div>
        </div>
    </section>
    <section class="second-section" id="about">
        
        
        <div class="data">
            
            <h1>--- Your Basic Detail ---</h1>
            <br>
            <div class="flex">
                <div>
            <h3>Name - <span> <?php echo $row['name']; ?></span> </h3>
            <br>

            <h3>Username - <span> <?php echo $row['username']; ?></span> </h3>
        </div>

        <div>
            <h3>DOB - <span> <?php echo $row['dob']; ?></span> </h3>
            <br>

            <h3>Gender - <span> <?php echo $row['gender']; ?></span> </h3>
        </div>
            <div>
                
            <h3>Batchtime - <span> <?php echo $row['batchtime']; ?></span> </h3>
            <br>
            
            <h3>E-Mail - <span> <?php echo $row['email']; ?></span> </h3>
            </div> 
            </div>
        </div>
        
    </section>
    <?php   }  ?>

    <footer>
        <div class="footer-copyright">
            <h5>© Copyright All India Football Federation</h5>
        </div>
    </footer>

 


</body>





<script src="/script.js"></script>

</html>