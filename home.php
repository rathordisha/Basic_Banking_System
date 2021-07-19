             <!--****************** LOGIN FORM VALIDAITON *******************-->
<?php

include 'config.php';

error_reporting(0);

if(isset($_SESSION['username'])) {
  header("Location: welcome.php");
}

session_start();
                      
if(isset($_POST['submit'])) {
  $username = $_POST['username'];
  $email = $_POST['email'];

  $sql = "SELECT * FROM customers WHERE username='$username' AND email='$email'";
  $result = mysqli_query($conn, $sql);
  if($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    header("Location: welcome.php");
  } else {
    echo "<script>alert('Woops! Email or Username is wrong.')</script>";
  } 
}
?>
                         <!--************ HTML BEGINS ************-->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>TSF Bank</title>
  <link href="styles/home.css" rel="stylesheet" type="text/css" />
</head>

<body>
  <div class="header">
    <div class="inner-header">
      <div class="header-content">
        The Sparks Foundation
      </div>
    </div>
  </div>

  <div class="container">

    <div class="split left">
      <div class="transparent-box">
        <h1 style="color: white;">Welcome to TSF Bank!</h1>
        <div class="button" id="homeloginbutton">Login</div>
      </div>
    </div>

    <div class="split right">
      <div class="heading">
        <h1>About TSF</h1>
      </div>
      <ul>
        <li>Community of sharing knowledge</li>
        <li>Organize events, workshops etc.</li>
        <li>Helps freshers to enhance their skills</li>
        <li>Beginner friendly Internships</li>
        <li>Financial Assistance to deserving students</li>
      </ul>
      <img src="styles/img/logotsf.jpg" class="logo-img" alt="logo">
      <a href="https://www.linkedin.com/company/the-sparks-foundation/" target="_blank">Follow TSF on LinkedIn!!</a>
    </div>
  </div>
 
                       <!--******************** LOGIN FORM STRUCTURE********************-->

  <div class="popup">
    <form action="" method="POST" class="popup-content">
      <img src="styles/img/close big.png" class="close" alt="">
      <h1 id="h1">Login</h1>
      <div class="input">
        <img src="styles/img/user2.png">
        <input id ="fr" type="text" placeholder="Username" name="username" value="<?php echo $_POST['username']; ?>" required>
      </div>
        <div class="input">
          <img src="styles/img/lock-blue.png">
          <input id="fr" type="email" placeholder="Email" name="email" value="<?php echo $_POST['email']; ?>" required>
        </div>
        <button class="popuploginbtn" name="submit">Log in</button>  
        
    </form>
  </div>

  <script>
    
    document.getElementById("homeloginbutton").addEventListener("click",function(){
    document.querySelector(".popup").style.display= "flex";
})
 
  document.querySelector(".close").addEventListener("click",function(){
  document.querySelector(".popup").style.display= "none";
  document.getElementById('fr').reset();
})
    

  </script>


  <footer>
    <div class="footer-container">
      <p>
        <center>
          Copyright <span>&copy </span> TSF BANK | Disha Rathor | Insta id: earningblessings
        </center>
      </p>
    </div>
  </footer>

</body>

</html>