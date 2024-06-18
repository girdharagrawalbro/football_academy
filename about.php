<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About-Us | Chhattisgarh Football Academy</title>
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
                        <a class="nav__link" href="#">About</a>
                    </li>
                    <li class="nav__item">

                        <a class="nav__link" href="./login.php">Login</a>
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

    <section class="about" id="about">
        <div class="contain">
            <h1>About Us</h1>
            <p>We are a bunch of Sports Enthusiasts who strongly believe that Sports can make a huge positive impact in
                each individual's life and our society overall. We believe that playing regularly and in a group is very
                vital for not only our health but also for an all round development of a child or a person. It not only
                develops a person's stamina or agility but adds to building other behavioral aspects like personality
                development, changing the perspective and developing a positive attitude, being a great team player,
                becoming more social and developing the fighting spirit to name the few. Before we forget to mention
                that the by-product of all these is a good health, disciplined life and a peaceful mind to handle the
                day today challenges calmly and more effectively.
            </p>
            <div class="data">
                <div class="other-data">
                    <h4>-- Batch Timings --</h4>
                    <p><br> <b>Morning</b>
                        <br>
                        5.00 AM - 6.00 AM / 6.00 AM - 7.00 AM <br> 7.00 AM - 8.00 AM
                        <br>
                        <br><b>Evening</b>
                        <br>
                        5.00 PM - 6.00 PM / 6.00 PM - 7.00 PM <br> 7.00 PM - 8.00 PM
                    </p>
                </div>
                <div class="other-data">
                    <h4>-- Other Data --</h4>

                    <h3>Founded</h3>
                    <h2>27 Nov 2023</h2>
                    <h3>President</h3>
                    <h2>Girdhar Agrawal</h2>
                    <h3>Players Registered</h3>
                    <h2><?php

include("./dbconn.php");
                                $sql = "SELECT * FROM `users`" ;
                                $result = mysqli_query($conn, $sql);
                                echo mysqli_num_rows($result);
                    ?></h2>
                </div>
            </div>
        </div>
    </section>
    <br><br>
    <br>
    <div class="above-footer">
        <img src="/assest/Indian-Football-Forward-Together-Line-B.jpg" alt="">
    </div>
    <footer>
        <div class="footer-copyright">
            <h5>© Copyright All India Football Federation</h5>
        </div>
    </footer>

</body>

</html>