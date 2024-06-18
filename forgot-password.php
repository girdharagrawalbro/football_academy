<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | Chhattisgarh Football Academy</title>
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
                        <a class="btn" href="./contact.php">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="forgot">
        <div class="container">
        <!-- receive a link to create a new password via email -->
            <h1>Forgot Password</h1>
            <p>Please enter your email address. You will get your Username and Password.</p>
            <form action="#" method="post">
            <input type="email" name="email" placeholder="Email" required>
                <button type="submit" name="send">Send Reset Link</button>
            </form>
<br>
    <?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require './phpmailer/src/Exception.php';
    require './phpmailer/src/PHPMailer.php';
    require './phpmailer/src/SMTP.php';

  
    if(isset($_POST['send'])){
        $server = "localhost";
  $username = "root";
  $password = "";
  $database = "football_academy";
  
  $con = mysqli_connect($server,$username,$password,$database);

  if (!$con) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $email = $_POST['email'];
$sql = "SELECT * FROM `users` where email = '$email'";
        $result = mysqli_query($con,$sql);
        $num = mysqli_num_rows($result);
        if ($num == 1){

            $row=mysqli_fetch_array($result);

            // header('Location: ./send.php');
            $mail = new PHPMailer(true);

            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'jaynarayanagrawal123@gmail.com';
            $mail->Password = 'pzyiuuglznbngxml';
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
    
            $mail->setFrom('jaynarayanagrawal123@gmail.com');
            $mail->addAddress($_POST["email"]);
    
            $mail->isHTML(true);
    
            $mail->Subject = "Chhattisgarh Football Academy | Reset Password";
            // $mail->Body = "<b>Your Account details are -</b> <br> Username - " . $row['username'] . "<br> Password - " . $row['pass'];
$mail->Body = "<b>
Hi " .$row['name'] . ", <br>

Forget your password? <br>
Here is Your password - ".$row['pass']."
";
// We received a request to reset the password for your acccount. <br>
// To reset your password, click on the button below <br>
// <button>Reset Password</button> <br>
// Or copy and the URL into your browser: <br>
// <a></a></b>
            $mail->send();
    
            echo 
            "
            <script>
            alert('Sent successfully');
            document.location.href = './login.php';
            </script>
            ";
        }

            // echo "Username - " . $row['username'] . " | ";
            // echo "Password - " . $row['pass'];

        
        else {
            echo "User not found..";
        }
    }
?>
        </div>
    </section>

    <footer>
        <div class="footer-copyright">
            <h5>© Copyright All India Football Federation</h5>
        </div>
    </footer>
</body>
</html>




