<?php
session_start();
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!= true){
        header("location: ./login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Girdhar Agrawal</title>
    <link rel="stylesheet" href="./style.css">
    <link rel="stylesheet" href="nav-css.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
                        <a class="nav__link" href="./logout.php">Logout</a>
                    </li>
                    <li class="nav__item">
                        <a class="btn" href="./contact.php">Contact</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <section class="admin">
        <div class="outer">
                <div class="first">
                        <img src="./assest/bg.jpg" alt="">
                </div>
                <div class="second">
                    <div class="user-img">
                        <img src="./assest/2710240.png" alt="">
                    </div>
                    <div class="abo">
                        <div class="name">
                            <h1>Girdhar Agrawal</h1>
                        </div>
                        <div class="prof">
                            <br>
                            <h2>I'am <span class="autotype"></span> of CFA </h2> 
                            
                        </div>
                    </div>
              <div class="othdata">
                        <div class="ru">
                            <h2>Registered Student</h2>
                            <h2>
                                <?php

                      include("./dbconn.php");
                                $sql = "SELECT * FROM `users`" ;
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                echo $num;
                    ?>
                            </h2>
                        </div>
                        <div class="rc">
                            <h2>Contacted Persons</h2>
                            <h2>
                                <?php
                                $sql = "SELECT * FROM `contact`" ;
                                $result = mysqli_query($conn, $sql);
                                $num = mysqli_num_rows($result);
                                echo $num;
                                ?>
                            </h2>
                        </div>
                    </div>
                </div>
        </div>
    </section>
           <br>          
<section class="query-data" id="2">

    
    <div class="reg-data">
        <h1>Registered Student Data</h1>

        <form action="#2" method="post">

<div class="flex">
    <div>
        <h3>Filter -</h3>
    </div>
    <div>
        <label for="">Select Batch-Time </label>
                <select name="batchtime" id="">
                    <option value="0">select</option>
                        <option value="5-AM">5-AM</option>
                        <option value="6-AM">6 AM</option>
                  <option value="7-AM">7 AM</option>
                  <option value="5-PM">5 PM</option>
                  <option value="6-PM">6 PM</option>
                  <option value="7-PM">7 PM</option>
                    </select>
                </div>
                <div>
            <label for="">Select Gender </label>
            <select name="gender" id="">
                    <option value="0">select</option>
                        <option value="Male">Male</option> 
                        <option value="Female">Female</option> 


                </select>
                </div>
                <div>
                <input type="submit" value="Submit" name="submit" class="submit-btn">
                </div></div>
        </form>
<br>
<br>
<table>
    <thead>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Userame</th>
    <th>Email</th>
    <th>DOB</th>
    <th>Gender</th>
    <th>Batchtime</th>
    <th>Date-Time</th>
    <th>Edit</th>
    <th>Delete</th>
 </tr>
  </thead>
  <tbody>
    <?php
   
   

    if(isset($_POST['submit']) && (($_POST['gender']) || ($_POST['batchtime'])))
    {
        $gender = $_POST['gender'];
        $batchtime = $_POST['batchtime'];
        $sql = "SELECT * FROM `users` WHERE gender = '$gender' or batchtime = '$batchtime' ";
        
        get_Data($sql);
        
    }
    elseif(!isset($_POST['submit'])){
    $sql = "SELECT * FROM `users`" ;
    get_Data($sql);
    }
    elseif(isset($_POST['submit']) && (($_POST['gender'] == 0) || ($_POST['batchtime'] == 0))){
        $sql = "SELECT * FROM `users`" ;
    get_Data($sql);
    }

       
        function get_Data($sql){
            include("./dbconn.php");

            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result)>0)
            {

                while ($row=mysqli_fetch_array($result)){?>
             <tr>
              <td><?php echo $row['id']; ?></td>
              <td><?php echo $row['name']; ?></td>
              <td><?php echo $row['username']; ?></td>
              <td><?php echo $row['email']; ?></td>
              <td><?php echo $row['dob']; ?></td>
              <td><?php echo $row['gender']; ?></td>
              <td><?php echo $row['batchtime']; ?></td>
              <td><?php echo $row['dt']; ?></td>
      <td><a href="./update.php?id=<?php echo $row['id']; ?>" title="UPDATE"><i class="fa fa-edit" aria-hidden="true"></i></a></td>

              <td><a href="./delete-user.php?id=<?php echo $row['id']; ?>" title="DELETE"><i class="fa fa-trash" aria-hidden="true"></a></i></td>
        
          </tr>
           
            
       <?php } }}
        ?>
</tbody>
</table>
</div>

<div class="reg-data">
    <h1>Contacted Users Data</h1>

<table>
    <thead>
  <tr>
    <th>Id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Suggestion</th>
    <th>Date-Time</th>
    <th>Edit</th>
    <th>Delete</th>
 </tr>
  </thead>
  <tbody>
  <?php 
   while ($row=mysqli_fetch_array($result)){
                                 
                                        ?>
  <tr>
      <td><?php echo $row['id']; ?></td>
      <td><?php echo $row['name']; ?></td>
      <td><?php echo $row['email']; ?></td>
      <td><?php echo $row['suggestion']; ?></td>
      <td><?php echo $row['dt']; ?></td>
      <td><a href="./delete-contact.php?id=<?php echo $row['id']; ?>" title="DELETE"><i class="fa fa-trash" aria-hidden="true"></a></i></td>

  </tr>
   
<?php } ?>
</tbody>
</table>
</div>
</section>
    <footer>
        <div class="footer-copyright">
            <h5>© Copyright All India Football Federation</h5>
        </div>
    </footer>
</body>
<script src="https://unpkg.com/typed.js@2.1.0/dist/typed.umd.js"></script>
<script>
    var typed = new Typed(".autotype",{
        strings: ["Founder", "Managing Director"], typeSpeed: 150, backSpeed: 150, loop: true})
   
</script>

</html>